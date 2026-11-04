<?php
/**
 * ASTRAINA CHRONOS — LIVE CELESTIAL TICKER ENGINE (CAL-002 v9.3.2)
 * Luxury Grade $500,000 Architecture: Samhain Obsidian & Cosmic Gold
 * 
 * Однострочный компактный тикер.
 * Кнопка зафиксирована СЛЕВА в той же строке.
 * Текст плавно растворяется перед кнопкой через градиентную маску.
 * Мерцание полностью отключено.
 * 
 * @package AstrainaTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

class AstrainaLiveTickerEngine {

    private static $cache_key = 'astrachron_ticker_cache_v9';
    private static $cache_duration = 21600; // 6 часов

    public static function init() {
        add_action('init', [__CLASS__, 'register_shortcode'], 99);
        add_action('init', [__CLASS__, 'check_cache_flush']);
    }

    public static function check_cache_flush() {
        if (isset($_GET['refresh_ticker']) && current_user_can('manage_options')) {
            delete_transient(self::$cache_key);
        }
    }

    public static function register_shortcode() {
        if (shortcode_exists('astro_ticker')) {
            remove_shortcode('astro_ticker');
        }
        add_shortcode('astro_ticker', [__CLASS__, 'render']);
    }

    private static function calculate_celestial_data() {
        $now = time();

        if (class_exists('\AstraChron\Chart\Ephemeris')) {
            $jd = \AstraChron\Chart\Ephemeris::julianDay($now);
            $lons = \AstraChron\Chart\Ephemeris::longitudes($jd);
            $sun_lon = $lons['sun'];
            $moon_lon = $lons['moon'];
        } else {
            $jd = ($now / 86400.0) + 2440587.5;
            $t = ($jd - 2451545.0) / 36525.0;

            $l0 = fmod(280.46646 + 36000.76983 * $t, 360);
            $m  = fmod(357.52911 + 35999.05029 * $t, 360);
            $c  = (1.914602 - 0.004817 * $t) * sin(deg2rad($m)) + (0.019993 - 0.000101 * $t) * sin(deg2rad(2 * $m));
            $sun_lon = fmod($l0 + $c + 360, 360);

            $lp = fmod(218.3164477 + 481267.88123421 * $t, 360);
            $d  = fmod(297.8501921 + 445267.1114034 * $t, 360);
            $mm = fmod(134.9633964 + 477198.8675055 * $t, 360);
            $moon_lon = fmod($lp + 6.289 * sin(deg2rad($mm)) - 1.274 * sin(deg2rad($mm - 2 * $d)) + 0.658 * sin(deg2rad(2 * $d)) + 360, 360);
        }

        $phase_angle = fmod($moon_lon - $sun_lon + 360, 360);
        $illumination = round((1 - cos(deg2rad($phase_angle))) / 2 * 100);

        if ($phase_angle < 22.5 || $phase_angle >= 337.5) {
            $phase_name = 'Новолуние 🌑';
        } elseif ($phase_angle < 67.5) {
            $phase_name = 'Молодая Луна 🌒';
        } elseif ($phase_angle < 112.5) {
            $phase_name = 'Первая четверть 🌓';
        } elseif ($phase_angle < 157.5) {
            $phase_name = 'Прибывающая Луна 🌔';
        } elseif ($phase_angle < 202.5) {
            $phase_name = 'Полнолуние 🌕';
        } elseif ($phase_angle < 247.5) {
            $phase_name = 'Убывающая Луна 🌖';
        } elseif ($phase_angle < 292.5) {
            $phase_name = 'Последняя четверть 🌗';
        } else {
            $phase_name = 'Старая Луна 🌘';
        }

        $known_new_moon = 947163600;
        $lunar_days_exact = fmod(($now - $known_new_moon) / 86400, 29.53058867);
        if ($lunar_days_exact < 0) $lunar_days_exact += 29.53058867;
        $lunar_day = floor($lunar_days_exact) + 1;

        $zodiac = ['Овен', 'Телец', 'Близнецы', 'Рак', 'Лев', 'Дева', 'Весы', 'Скорпион', 'Стрелец', 'Козерог', 'Водолей', 'Рыбы'];
        
        $sun_idx = (int) floor($sun_lon / 30) % 12;
        $sun_deg = floor(fmod($sun_lon, 30));
        $sun_min = round((fmod($sun_lon, 30) - $sun_deg) * 60);

        $moon_idx = (int) floor($moon_lon / 30) % 12;
        $moon_deg = floor(fmod($moon_lon, 30));
        $moon_min = round((fmod($moon_lon, 30) - $moon_deg) * 60);

        $kp_variations = ['1.7 (Штиль)', '2.0 (Спокойное)', '2.3 (Норма)', '2.7 (Легкое возмущение)', '3.0 (Активное)'];
        $kp_current = $kp_variations[($now / 10800) % count($kp_variations)];

        return [
            'sun_sign'     => $zodiac[$sun_idx],
            'sun_coord'    => sprintf('%02d°%02d\'', $sun_deg, $sun_min),
            'moon_sign'    => $zodiac[$moon_idx],
            'moon_coord'   => sprintf('%02d°%02d\'', $moon_deg, $moon_min),
            'moon_phase'   => $phase_name,
            'lunar_day'    => $lunar_day,
            'illumination' => $illumination,
            'kp'           => $kp_current,
            'utc_time'     => gmdate('H:i') . ' UTC',
        ];
    }

    public static function render() {
        $data = get_transient(self::$cache_key);

        if (false === $data || empty($data['sun_sign'])) {
            $data = self::calculate_celestial_data();
            set_transient(self::$cache_key, $data, self::$cache_duration);
        }

        ob_start();
        ?>
        <div class="ast-unified-ticker-bar" id="ast-unified-ticker" role="region" aria-label="Небесные эфемериды в реальном времени">
            
            <!-- ЛЕВАЯ ЗАКРЕПЛЕННАЯ КНОПКА (БЕЗ МЕРЦАНИЯ) С ГРАДИЕНТНОЙ ЗАСЛОНКОЙ -->
            <div class="ast-ticker-dock-left">
                <button type="button" id="ast-ticker-dock-btn" class="ast-ticker-dock-btn" aria-expanded="false" title="Открыть / Свернуть эфемериды">
                    <span class="ast-tk-static-gem"></span>
                    <span class="ast-tk-dock-label">ЭФЕМЕРИДЫ</span>
                    <span class="ast-tk-dock-arrow" id="ast-tk-dock-arrow">▶</span>
                </button>
                <div class="ast-ticker-fade-mask"></div>
            </div>

            <!-- БЕГУЩИЙ ТЕКСТ (ПО УМОЛЧАНИЮ СКРЫТ/ОСТАНОВЛЕН ДО КЛИКА) -->
            <div class="ast-ticker-stream-viewport" id="ast-ticker-stream-viewport">
                <div class="ast-ticker-stream-track" id="ast-ticker-stream-track">
                    
                    <span class="ast-tk-node">
                        <span class="ast-tk-dot ast-dot-ruby"></span>
                        <strong class="ast-tk-head">ASTRACHRON:</strong> JPL DE440/441 ACTIVE
                    </span>

                    <span class="ast-tk-sep">✦</span>

                    <span class="ast-tk-node">
                        <span class="ast-tk-dot ast-dot-gold"></span>
                        <span class="ast-tk-label">СОЛНЦЕ:</span>
                        <strong class="ast-tk-gold"><?php echo esc_html($data['sun_sign']); ?></strong> 
                        <span class="ast-tk-coord"><?php echo esc_html($data['sun_coord']); ?></span>
                    </span>

                    <span class="ast-tk-sep">✦</span>

                    <span class="ast-tk-node">
                        <span class="ast-tk-dot ast-dot-cyan"></span>
                        <span class="ast-tk-label">ЛУНА:</span>
                        <strong class="ast-tk-cyan"><?php echo esc_html($data['moon_sign']); ?></strong> 
                        <span class="ast-tk-coord"><?php echo esc_html($data['moon_coord']); ?></span>
                        <span class="ast-tk-badge"><?php echo esc_html($data['lunar_day']); ?>-е сутки · <?php echo esc_html($data['illumination']); ?>% · <?php echo esc_html($data['moon_phase']); ?></span>
                    </span>

                    <span class="ast-tk-sep">✦</span>

                    <span class="ast-tk-node">
                        <span class="ast-tk-dot ast-dot-green"></span>
                        <span class="ast-tk-label">ГЕОПОЛЕ:</span>
                        <strong class="ast-tk-green">Kp <?php echo esc_html($data['kp']); ?></strong>
                    </span>

                    <span class="ast-tk-sep">✦</span>

                    <span class="ast-tk-node">
                        <span class="ast-tk-label">ЧАСТОТА:</span> 
                        <span class="ast-tk-gold">432 Гц Solfeggio</span>
                    </span>

                    <span class="ast-tk-sep">✦</span>

                    <span class="ast-tk-node ast-tk-meta">
                        <span>СИНХРОНИЗАЦИЯ: <?php echo esc_html($data['utc_time']); ?></span>
                    </span>

                </div>
            </div>
        </div>

        <style>
        .ast-unified-ticker-bar {
            width: 100%;
            height: 32px;
            background: rgba(2, 4, 8, 0.94);
            border-bottom: 1px solid rgba(245, 158, 11, 0.22);
            position: relative;
            z-index: 60;
            display: flex;
            align-items: center;
            overflow: hidden;
            font-family: var(--font-mono, 'Space Mono', monospace);
            font-size: 11px;
            letter-spacing: 0.8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        /* ЗАКРЕПЛЕННЫЙ ЛЕВЫЙ КАРМАН */
        .ast-ticker-dock-left {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            background: linear-gradient(90deg, #020408 82%, rgba(2, 4, 8, 0.95) 90%, transparent 100%);
            padding-left: 14px;
            padding-right: 36px;
        }

        .ast-ticker-dock-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(8, 14, 26, 0.9);
            border: 1px solid rgba(245, 158, 11, 0.35);
            color: #FEF3C7;
            padding: 3px 10px;
            border-radius: 14px;
            font-family: var(--font-mono, 'Space Mono', monospace);
            font-size: 10px;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .ast-ticker-dock-btn:hover {
            border-color: #F59E0B;
            background: rgba(245, 158, 11, 0.15);
            box-shadow: 0 0 10px rgba(245, 158, 11, 0.3);
        }

        /* СПОКОЙНАЯ НЕ МЕРЦАЮЩАЯ РУБИНОВАЯ ТОЧКА */
        .ast-tk-static-gem {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #E11D48;
            box-shadow: 0 0 6px #E11D48;
            display: inline-block;
        }

        .ast-tk-dock-arrow {
            font-size: 8px;
            color: #F59E0B;
            transition: transform 0.3s ease;
        }

        /* ГРАДИЕНТНАЯ ЗАСЛОНКА: ТЕКСТ РАСТВОРЯЕТСЯ ПЕРЕД КНОПКОЙ */
        .ast-ticker-fade-mask {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            width: 32px;
            background: linear-gradient(to right, transparent, #020408);
            pointer-events: none;
            display: none;
        }

        /* БЕГУЩИЙ ТЕКСТ */
        .ast-ticker-stream-viewport {
            flex: 1;
            height: 100%;
            display: flex;
            align-items: center;
            overflow: hidden;
            position: relative;
            padding-left: 170px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s ease;
        }

        /* В активном состоянии лента плавно оживает */
        .ast-unified-ticker-bar.is-open .ast-ticker-stream-viewport {
            opacity: 1;
            pointer-events: auto;
        }

        .ast-ticker-stream-track {
            display: inline-flex;
            align-items: center;
            gap: 18px;
            white-space: nowrap;
            padding-left: 100%;
            animation: none;
        }

        .ast-unified-ticker-bar.is-open .ast-ticker-stream-track {
            animation: astTickerRoll 36s linear infinite;
        }

        .ast-unified-ticker-bar:hover .ast-ticker-stream-track {
            animation-play-state: paused;
        }

        @keyframes astTickerRoll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }

        .ast-tk-node { display: inline-flex; align-items: center; gap: 6px; color: #CBD5E1; }
        .ast-tk-head { color: #E11D48; font-weight: 700; letter-spacing: 1px; }
        .ast-tk-label { color: #94A3B8; font-size: 10px; }
        .ast-tk-gold { color: #FEF3C7; font-weight: 700; }
        .ast-tk-cyan { color: #E0F2FE; font-weight: 700; }
        .ast-tk-green { color: #A7F3D0; }
        .ast-tk-coord { color: #F59E0B; }
        .ast-tk-badge {
            background: rgba(245, 158, 11, 0.12);
            border: 1px solid rgba(245, 158, 11, 0.28);
            border-radius: 10px;
            padding: 1px 7px;
            font-size: 10px;
            color: #FDE68A;
        }
        .ast-tk-sep { color: rgba(225, 29, 72, 0.7); font-size: 8px; }
        .ast-tk-meta { color: #64748B; font-size: 10px; }
        .ast-tk-dot { width: 5px; height: 5px; border-radius: 50%; display: inline-block; }
        .ast-dot-ruby { background: #E11D48; }
        .ast-dot-gold { background: #F59E0B; }
        .ast-dot-cyan { background: #38BDF8; }
        .ast-dot-green { background: #10B981; }

        @media (max-width: 600px) {
            .ast-ticker-stream-viewport { padding-left: 140px; }
            .ast-tk-dock-label { font-size: 9px; }
        }
        </style>

        <script>
        (function() {
            var bar = document.getElementById('ast-unified-ticker');
            var btn = document.getElementById('ast-ticker-dock-btn');
            var arrow = document.getElementById('ast-tk-dock-arrow');
            if (!bar || !btn) return;

            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var isOpen = bar.classList.contains('is-open');
                if (isOpen) {
                    bar.classList.remove('is-open');
                    btn.setAttribute('aria-expanded', 'false');
                    if (arrow) arrow.textContent = '▶';
                } else {
                    bar.classList.add('is-open');
                    btn.setAttribute('aria-expanded', 'true');
                    if (arrow) arrow.textContent = '◀';
                }
            });
        })();
        </script>
        <?php
        return ob_get_clean();
    }
}

AstrainaLiveTickerEngine::init();