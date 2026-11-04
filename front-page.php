<?php
/**
 * ASTRAINA — Grand Celestial Portal (Front Page v9.7.3)
 * 5000 Particles 3D Canvas Dome · Ascending Milky Way Galactic Arc · Stately Levitating Muse Astraea
 * Pure Celestial Constellations with Sacred Gemstones
 * Slim Audio Deck (Ambient 432 Hz Solfeggio + 8 Efir Tracks) · 26 Live Observatory Portals
 * Architecture: Zero Runtime API · NASA JPL Bridge · Luxury Grade UI
 */
get_header(); ?>

<style id="astraina-main-player-css">
/* ==========================================================================
   ASTRAINA HERO MANIFESTO — 3-LINE SACRED INSCRIPTION (NO PILL, SAMHAIN GOLD)
   ========================================================================== */
.ast-hero-manifesto {
    display: block !important;
    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
    padding: 0 !important;
    margin: 0 0 22px 0 !important;
    max-width: 820px !important;
}

.ast-manifesto-title {
    display: flex !important;
    flex-direction: column !important;
    gap: 8px !important;
    margin: 0 !important;
    padding: 0 !important;
    font-family: 'Cinzel Decorative', 'Cormorant Garamond', 'Cinzel', serif !important;
    font-weight: 700 !important;
    line-height: 1.25 !important;
    letter-spacing: 0.05em !important;
    background: transparent !important;
    border: none !important;
}

.ast-manifesto-row {
    display: block !important;
    background: linear-gradient(135deg, #FEF3C7 0%, #F59E0B 45%, #FBBF24 85%, #D97706 100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    filter: drop-shadow(0 0 26px rgba(245, 158, 11, 0.38)) !important;
}

/* Строка 1: Имя */
.ast-row-name {
    font-size: 38px !important;
    letter-spacing: 0.06em !important;
}

/* Строка 2: Муза Звёздного Фолианта Атлантиды */
.ast-row-muse {
    font-size: 30px !important;
    font-weight: 600 !important;
    opacity: 0.96 !important;
    letter-spacing: 0.04em !important;
}

/* Строка 3: Твой проводник в мире звёздных нитей */
.ast-row-guide {
    font-size: 29px !important;
    font-weight: 500 !important;
    opacity: 0.94 !important;
    letter-spacing: 0.03em !important;
}

@media (max-width: 768px) {
    .ast-manifesto-title {
        gap: 6px !important;
    }
    .ast-row-name {
        font-size: 26px !important;
    }
    .ast-row-muse {
        font-size: 20px !important;
        line-height: 1.3 !important;
    }
    .ast-row-guide {
        font-size: 19px !important;
        line-height: 1.3 !important;
    }
}

/* ВЫРАВНИВАНИЕ КНОПКИ РАСЧЕТА И ТОНКОГО ПЛЕЕРА */
.natal-calc-btn-wrap {
    width: 100%;
    max-width: 580px;
    margin: 0 0 20px 0;
}
.btn-calc-main-stretched {
    width: 100% !important;
    max-width: 100% !important;
    box-sizing: border-box !important;
    padding: 15px 24px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-align: center !important;
}

/* ТОНКАЯ ПЛАШКА ПЛЕЕРА СТРОГО ПОД КНОПКОЙ */
.main-audio-bar-slim {
    width: 100%;
    box-sizing: border-box;
    margin-top: 10px;
    background: rgba(4, 8, 16, 0.92);
    border: 1px solid rgba(245, 158, 11, 0.3);
    border-radius: 10px;
    padding: 5px 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    height: 40px;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
}

.main-audio-group {
    display: flex;
    align-items: center;
    gap: 6px;
}

.btn-audio-pill {
    background: rgba(245, 158, 11, 0.08);
    border: 1px solid rgba(245, 158, 11, 0.28);
    color: #FDE68A;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
    white-space: nowrap;
    line-height: 1.4;
    font-family: var(--font-body, sans-serif);
}
.btn-audio-pill:hover {
    background: rgba(245, 158, 11, 0.2);
    border-color: #F59E0B;
}
.btn-audio-pill.active {
    background: #F59E0B;
    color: #020408;
    border-color: #F59E0B;
    box-shadow: 0 0 10px rgba(245, 158, 11, 0.4);
}

/* РАЗДЕЛИТЕЛЬ МЕЖДУ AMBIENT И ЭФИРОМ */
.audio-stream-divider {
    width: 1px;
    height: 18px;
    background: rgba(245, 158, 11, 0.25);
    margin: 0 4px;
}

.efir-nav-arrow {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(245, 158, 11, 0.25);
    color: #FBBF24;
    width: 22px;
    height: 24px;
    padding: 0;
    border-radius: 4px;
    font-size: 10px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}
.efir-nav-arrow:hover {
    background: rgba(245, 158, 11, 0.2);
    border-color: #F59E0B;
}

.btn-audio-kill {
    background: rgba(225, 29, 72, 0.1);
    border: 1px solid rgba(225, 29, 72, 0.35);
    color: #FDA4AF;
    padding: 4px 9px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
    cursor: pointer;
    margin-left: 2px;
    transition: all 0.2s ease;
    font-family: var(--font-body, sans-serif);
}
.btn-audio-kill:hover {
    background: rgba(225, 29, 72, 0.25);
    border-color: #E11D48;
    color: #FFFFFF;
}

.main-vol-ctrl {
    display: flex;
    align-items: center;
    gap: 6px;
}
.main-vol-slider {
    -webkit-appearance: none;
    appearance: none;
    width: 65px;
    height: 3px;
    border-radius: 2px;
    background: rgba(255, 255, 255, 0.2);
    outline: none;
}
.main-vol-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #F59E0B;
    cursor: pointer;
}
.main-vol-slider::-moz-range-thumb {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #F59E0B;
    cursor: pointer;
    border: none;
}
@media (max-width: 480px) {
    .main-audio-bar-slim {
        height: auto;
        flex-wrap: wrap;
        padding: 8px;
    }
}
</style>

<!-- 1. НЕБЕСНЫЙ ТИКЕР РЕАЛЬНОГО ВРЕМЕНИ -->
<section class="ast-ticker-wrap">
    <?php echo do_shortcode('[astro_ticker]'); ?>
</section>

<!-- 2. ХОЛСТ: 5 000 ЗВЕЗДНЫХ ЧАСТИЦ, ВОСХОДЯЩИЙ МЛЕЧНЫЙ ПУТЬ И СОЗВЕЗДИЯ С САМОЦВЕТАМИ -->
<canvas id="astraina-live-stars"></canvas>

<main class="ast-portal-main">

    <!-- 3. ГЕРОИЧЕСКАЯ СЕКЦИЯ: ASTRAINA И СОЗВЕЗДИЯ -->
    <section class="ast-hero-devi" id="astraina-oracle">
        <div class="ast-container">
            <div class="ast-hero-split">
                
                <!-- Левый блок: Текст, Растянутая кнопка + Тонкий пульт и Плашка камня -->
                <div class="ast-hero-left">
                    <div class="ast-hero-manifesto">
                        <h1 class="ast-manifesto-title">
                            <span class="ast-manifesto-row ast-row-name">Я Астраина,</span>
                            <span class="ast-manifesto-row ast-row-muse">Хранительница Звёздного Атласа Времён,</span>
                            <span class="ast-manifesto-row ast-row-guide">Твой проводник в мире звёздных нитей.</span>
                        </h1>
                    </div>

                    <p class="ast-devi-desc">
                        В этой обители оживают двенадцать вечных созвездий и сакральная мудрость небесных сфер. Позволь мне раскрыть узор твоей истинной судьбы, тайны кармических союзов и сокровенные ритмы лунных приливов.
                    </p>

                    <!-- Блок действий -->
                    <div class="ast-hero-actions">
                        <div class="natal-calc-btn-wrap">
                            <a href="<?php echo esc_url(home_url('/astro-chart/')); ?>" class="ast-btn-ruby btn-calc-main-stretched">
                                <span>Раскрыть натальную карту</span> →
                            </a>
                            
                            <!-- ТОНКАЯ ПЛАШКА АУДИОПЛЕЕРА ASTRAINA -->
                            <div class="main-audio-bar-slim" id="main-audio-bar">
                                <div class="main-audio-group">
                                    <button type="button" class="btn-audio-pill" id="main-btn-ambient" onclick="toggleMainAmbient()" title="Частоты исцеления 432 Гц">✦ Ambient</button>
                                    <div class="audio-stream-divider"></div>
                                    <button type="button" class="efir-nav-arrow" onclick="navMainEfir(-1)" title="Предыдущий трек">◄</button>
                                    <button type="button" class="btn-audio-pill" id="main-btn-efir" onclick="toggleMainEfir()" title="Космический Эфир">◈ Эфир</button>
                                    <button type="button" class="efir-nav-arrow" onclick="navMainEfir(1)" title="Следующий трек">►</button>
                                    <button type="button" class="btn-audio-kill" onclick="stopAllMainAudio()" title="Остановить все звуки">■ Стоп</button>
                                </div>
                                <div class="main-vol-ctrl">
                                    <input type="range" min="0" max="100" value="70" class="main-vol-slider" id="main-vol-slider" oninput="setMainVolume(this.value)" title="Громкость">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ПЛАШКА: САКРАЛЬНЫЙ КАМЕНЬ ЗНАКА И ВЫБОР СОЗВЕЗДИЙ -->
                    <div class="ast-sacred-gem-panel" id="ast-sacred-gem-panel">
                        <div class="ast-gem-header-row">
                            <span class="ast-gem-tag">САКРАЛЬНЫЙ МИНЕРАЛ:</span>
                        </div>
                        <h3 class="ast-gem-title" id="ast-gem-title">Рубин Антареса (α Scorpii)</h3>
                        <p class="ast-gem-desc" id="ast-gem-desc">
                            Огненное сердце трансформации. Очищает астральное поле, концентрирует волю и открывает врата интуиции Атлантиды.
                        </p>

                        <div class="ast-gem-zodiac-row">
                            <span class="ast-gem-zodiac-label">СФЕРА ЗНАКОВ:</span>
                            <div class="ast-gem-zodiac-btns" id="zodiac-selectors">
                                <button type="button" class="ast-z-btn" data-sign="aries" title="Овен — Хамаль (Гранат)">♈</button>
                                <button type="button" class="ast-z-btn" data-sign="taurus" title="Телец — Альдебаран (Опал)">♉</button>
                                <button type="button" class="ast-z-btn" data-sign="gemini" title="Близнецы — Поллукс (Бриллиант)">♊</button>
                                <button type="button" class="ast-z-btn" data-sign="cancer" title="Рак — Акубенс (Лунный камень)">♋</button>
                                <button type="button" class="ast-z-btn" data-sign="leo" title="Лев — Регул (Золото Солнца)">♌</button>
                                <button type="button" class="ast-z-btn" data-sign="virgo" title="Дева — Спика (Лазурный Алмаз)">♍</button>
                                <button type="button" class="ast-z-btn" data-sign="libra" title="Весы — Зубен (Изумруд)">♎</button>
                                <button type="button" class="ast-z-btn active" data-sign="scorpio" title="Скорпион — Антарес (Рубин)">♏</button>
                                <button type="button" class="ast-z-btn" data-sign="sagittarius" title="Стрелец — Каус (Янтарь)">♐</button>
                                <button type="button" class="ast-z-btn" data-sign="capricorn" title="Козерог — Денеб (Индиго)">♑</button>
                                <button type="button" class="ast-z-btn" data-sign="aquarius" title="Водолей — Садальсууд (Циан)">♒</button>
                                <button type="button" class="ast-z-btn" data-sign="pisces" title="Рыбы — Альриша (Аквамарин)">♓</button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Правый блок: Величественно парящая Дева-Муза -->
                <div class="ast-hero-right">
                    <div class="ast-devi-frame" id="ast-devi-target-box">
                        <div class="ast-devi-halo" id="ast-dynamic-halo"></div>
                        <div class="ast-devi-pedestal-glow"></div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/astraina-hero.png" alt="Astraina — Звёздная Муза" class="ast-devi-art" id="ast-devi-image-art">
                        <div class="ast-devi-badge-float">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/astraina-avatar.png" alt="Astraina" class="ast-float-avatar">
                            <div>
                                <div class="ast-float-title">Astraina в эфире</div>
                                <div class="ast-float-sub" id="ast-sub-status">Зодиак: Скорпион (Рубин)</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- 4. СЕТКА САКРАЛЬНЫХ ВРАТ (МОДУЛЕЙ ЯДРА) -->
    <section class="ast-modules-grid-section">
        <div class="ast-container">
            <div class="ast-section-header">
                <span class="ast-sub-tag">САКРАЛЬНАЯ ГЕОМЕТРИЯ</span>
                <h2 class="ast-section-title">Врата Звёздного Ядра</h2>
            </div>

            <div class="ast-grid">
                
                <a href="<?php echo esc_url(home_url('/astro-chart/')); ?>" class="ast-gate-card">
                    <div class="ast-gate-icon">☉</div>
                    <div class="ast-gate-body">
                        <h3>Натальный Атлас</h3>
                        <p>Истинные дома Плацидуса, кармические Лунные Узлы, Чёрная Луна Лилит и расчет аспектов NASA JPL.</p>
                        <span class="ast-gate-link">Открыть карту →</span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/astro-synastry/')); ?>" class="ast-gate-card">
                    <div class="ast-gate-icon">♀♂</div>
                    <div class="ast-gate-body">
                        <h3>Синастрия Гармонии</h3>
                        <p>Глубокий резонанс душ. 4 сакральные шкалы притяжения, кармические узлы судьбы и баланс стихий.</p>
                        <span class="ast-gate-link">Исследовать союз →</span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/astro-lunar/')); ?>" class="ast-gate-card">
                    <div class="ast-gate-icon">☽</div>
                    <div class="ast-gate-body">
                        <h3>Лунный Органайзер</h3>
                        <p>30 фаз и лунных суток по истинным восходам. Практики красоты, здоровья, финансов и преображения.</p>
                        <span class="ast-gate-link">Войти в ритм →</span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/astro-sky/')); ?>" class="ast-gate-card">
                    <div class="ast-gate-icon">✦</div>
                    <div class="ast-gate-body">
                        <h3>Купол Небосвода</h3>
                        <p>Звёздный атлас каталога HYG без внешних библиотек. Истинное положение созвездий над горизонтом.</p>
                        <span class="ast-gate-link">Взглянуть ввысь →</span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/astro-calendar/')); ?>" class="ast-gate-card">
                    <div class="ast-gate-icon">⌛</div>
                    <div class="ast-gate-body">
                        <h3>Хронос Времени</h3>
                        <p>Сетка элективных дат на столетие вперёд. Ретроградные петли планет и коридоры затмений.</p>
                        <span class="ast-gate-link">Смотреть календарь →</span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/pricing/')); ?>" class="ast-gate-card ast-card-vip">
                    <div class="ast-gate-icon">👑</div>
                    <div class="ast-gate-body">
                        <h3>Cosmic Pass & Pro</h3>
                        <p>Безлимитные расчеты, персональный соляр и профессиональное рабочее место «Ведунья Pro».</p>
                        <span class="ast-gate-link">Активировать Pass ($7.99) →</span>
                    </div>
                </a>

            </div>
        </div>
    </section>

</main>

<style>
#astraina-live-stars {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 1;
    pointer-events: none;
}

.ast-portal-main {
    position: relative;
    z-index: 2;
    min-height: 85vh;
    padding-bottom: 90px;
}

.ast-container {
    max-width: 1350px;
    margin: 0 auto;
    padding: 0 24px;
}

.ast-hero-devi {
    padding: 24px 0 50px;
    position: relative;
}

.ast-hero-split {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 50px;
}

.ast-hero-left {
    flex: 1.15;
    position: relative;
    z-index: 5;
}

.ast-hero-right {
    flex: 0.85;
    display: flex;
    justify-content: flex-end;
    position: relative;
    z-index: 5;
}

.ast-devi-desc {
    font-size: 1.02rem;
    line-height: 1.75;
    color: var(--ast-text-dim, #94A3B8);
    margin-bottom: 24px;
    max-width: 580px;
}

.ast-hero-actions {
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 580px;
    margin-bottom: 24px;
}

.ast-btn-ruby {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, #E11D48 0%, #9F1239 100%);
    color: #FFFFFF;
    padding: 13px 30px;
    border-radius: 40px;
    text-decoration: none;
    font-size: 12.5px;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    box-shadow: 0 0 25px rgba(225, 29, 72, 0.45);
    transition: all 0.3s ease;
    border: 1px solid rgba(254, 243, 199, 0.25);
    white-space: nowrap;
}

.ast-btn-ruby:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 35px rgba(225, 29, 72, 0.7);
    color: #FFFFFF;
}

.ast-sacred-gem-panel {
    background: rgba(8, 14, 26, 0.92);
    border: 1px solid rgba(245, 158, 11, 0.25);
    border-radius: 18px;
    padding: 16px 20px;
    max-width: 580px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
}

.ast-gem-header-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 4px;
}

.ast-gem-tag {
    font-family: monospace;
    font-size: 9.5px;
    letter-spacing: 1.5px;
    color: #F59E0B;
    text-transform: uppercase;
}

.ast-gem-title {
    font-family: 'Cinzel Decorative', serif;
    font-size: 1.22rem;
    color: #FFFFFF;
    margin: 0 0 6px 0;
    letter-spacing: 1px;
    transition: color 0.3s;
}

.ast-gem-desc {
    font-size: 0.88rem;
    line-height: 1.6;
    color: #CBD5E1;
    margin: 0 0 12px 0;
}

.ast-gem-zodiac-row {
    display: flex;
    align-items: center;
    gap: 10px;
    border-top: 1px solid rgba(245, 158, 11, 0.14);
    padding-top: 10px;
}

.ast-gem-zodiac-label {
    font-family: monospace;
    font-size: 9px;
    letter-spacing: 1.5px;
    color: #F59E0B;
    white-space: nowrap;
}

.ast-gem-zodiac-btns {
    display: flex;
    align-items: center;
    gap: 5px;
    overflow-x: auto;
    padding: 2px 0;
}

.ast-z-btn {
    background: transparent;
    border: 1px solid rgba(245, 158, 11, 0.18);
    color: #94A3B8;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    font-size: 13.5px;
    cursor: pointer;
    transition: all 0.25s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.ast-z-btn:hover {
    border-color: #F59E0B;
    color: #FFFFFF;
    transform: scale(1.15);
}

.ast-z-btn.active {
    border-color: #E11D48;
    color: #FFFFFF;
    background: rgba(225, 29, 72, 0.3);
    box-shadow: 0 0 12px rgba(225, 29, 72, 0.6);
    transform: scale(1.12);
}

.ast-devi-frame {
    position: relative;
    width: 100%;
    max-width: 460px;
    animation: astMuseLevitateCalm 7s ease-in-out infinite;
    transform-origin: center bottom;
}

@keyframes astMuseLevitateCalm {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-4px); }
}

.ast-devi-halo {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(225, 29, 72, 0.22) 0%, rgba(245, 158, 11, 0.08) 42%, transparent 70%);
    filter: blur(35px);
    z-index: 1;
    pointer-events: none;
    transition: background 1.2s ease;
    animation: astHaloPulseCalm 5s infinite ease-in-out;
}

@keyframes astHaloPulseCalm {
    0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.85; }
    50% { transform: translate(-50%, -50%) scale(1.03); opacity: 1; }
}

.ast-devi-pedestal-glow {
    position: absolute;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    height: 60px;
    background: radial-gradient(ellipse at center, rgba(245, 158, 11, 0.25) 0%, rgba(225, 29, 72, 0.12) 50%, transparent 75%);
    filter: blur(20px);
    z-index: 1;
    pointer-events: none;
}

.ast-devi-art {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 460px;
    height: auto;
    object-fit: contain;
    filter: drop-shadow(0 20px 35px rgba(0, 0, 0, 0.85)) drop-shadow(0 0 25px rgba(225, 29, 72, 0.25));
    display: block;
}

.ast-devi-badge-float {
    position: absolute;
    bottom: -15px;
    left: 0;
    z-index: 3;
    display: flex;
    align-items: center;
    gap: 14px;
    background: rgba(8, 14, 26, 0.94);
    border: 1px solid rgba(245, 158, 11, 0.3);
    border-radius: 50px;
    padding: 8px 22px 8px 8px;
    backdrop-filter: blur(16px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.7);
}

.ast-float-avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: 2px solid #F59E0B;
    object-fit: cover;
}

.ast-float-title {
    font-size: 12px;
    font-weight: 600;
    color: #FFFFFF;
}

.ast-float-sub {
    font-size: 10.5px;
    color: #F59E0B;
    font-family: monospace;
}

.ast-modules-grid-section { padding-top: 50px; }
.ast-section-header { text-align: center; margin-bottom: 45px; }
.ast-sub-tag {
    font-size: 11px;
    letter-spacing: 3px;
    color: #E11D48;
    text-transform: uppercase;
    font-family: monospace;
}
.ast-section-title {
    font-family: 'Cinzel Decorative', serif;
    font-size: 2.3rem;
    letter-spacing: 4px;
    color: #FFFFFF;
    margin-top: 10px;
}
.ast-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
    gap: 26px;
}
.ast-gate-card {
    background: rgba(8, 14, 26, 0.78);
    border: 1px solid rgba(245, 158, 11, 0.25);
    border-radius: 20px;
    padding: 34px 30px;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    display: flex;
    gap: 22px;
    backdrop-filter: blur(16px);
}
.ast-gate-card:hover {
    border-color: #E11D48;
    transform: translateY(-5px);
    box-shadow: 0 18px 40px rgba(2, 4, 8, 0.9), 0 0 30px rgba(225, 29, 72, 0.4);
}
.ast-gate-icon { font-size: 32px; color: #F59E0B; line-height: 1; }
.ast-gate-body h3 { font-family: 'Cinzel Decorative', serif; margin: 0 0 10px; font-size: 1.3rem; color: #FFFFFF; }
.ast-gate-body p { margin: 0 0 18px; color: #94A3B8; font-size: 0.94rem; line-height: 1.65; }
.ast-gate-link {
    font-size: 11.5px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #F59E0B;
    font-weight: 600;
    font-family: monospace;
    transition: color 0.3s;
}
.ast-gate-card:hover .ast-gate-link { color: #E11D48; }
.ast-card-vip {
    border-color: rgba(225, 29, 72, 0.4);
    background: linear-gradient(145deg, rgba(8, 14, 26, 0.92) 0%, rgba(225, 29, 72, 0.15) 100%);
}

@media (max-width: 900px) {
    .ast-hero-split {
        flex-direction: column-reverse;
        text-align: center;
        gap: 40px;
    }
    .ast-hero-right { justify-content: center; }
    .ast-devi-desc { margin: 0 auto 24px; }
    .ast-hero-actions { justify-content: center; margin-left: auto; margin-right: auto; }
    .ast-sacred-gem-panel { margin: 0 auto; }
    .ast-gem-zodiac-row { flex-direction: column; align-items: center; }
    .ast-devi-badge-float { left: 50%; transform: translateX(-50%); }
}
</style>

<!-- 5. ДВИЖОК: КАМНИ В СОЗВЕЗДИЯХ, МЛЕЧНЫЙ ПУТЬ И САКРАЛЬНЫЙ АУДИОПУЛЬТ -->
<script>
const ZODIAC_CONSTELLATIONS = {
    scorpio: {
        name: 'Скорпион', starName: 'Антарес (Рубин)', gemColor: '#E11D48', gemSecondary: '#FECDD3', chimeFreq: 864,
        gemFullName: 'Рубин Антареса (α Scorpii)',
        gemText: 'Огненное сердце трансформации. Очищает астральное поле, концентрирует волю и открывает врата интуиции Атлантиды.',
        nodes: [
            { id: 'acrab', rx: -0.14, ry: -0.22 }, { id: 'dschubba', rx: -0.11, ry: -0.16 },
            { id: 'pi_sco', rx: -0.15, ry: -0.10 }, { id: 'alniyat1', rx: -0.06, ry: -0.08 },
            { id: 'heart', rx: 0.00, ry: 0.00, isHeart: true }, { id: 'alniyat2', rx: 0.04, ry: 0.07 },
            { id: 'larawag', rx: 0.06, ry: 0.16 }, { id: 'mu_sco', rx: 0.04, ry: 0.24 },
            { id: 'sargas', rx: -0.02, ry: 0.31 }, { id: 'shaula', rx: -0.10, ry: 0.33 },
            { id: 'lesath', rx: -0.13, ry: 0.30 }
        ],
        edges: [
            ['acrab', 'dschubba'], ['dschubba', 'pi_sco'], ['dschubba', 'alniyat1'],
            ['alniyat1', 'heart'], ['heart', 'alniyat2'], ['alniyat2', 'larawag'],
            ['larawag', 'mu_sco'], ['mu_sco', 'sargas'], ['sargas', 'shaula'], ['shaula', 'lesath']
        ]
    },
    sagittarius: {
        name: 'Стрелец', starName: 'Каус (Янтарь)', gemColor: '#F59E0B', gemSecondary: '#FEF3C7', chimeFreq: 852,
        gemFullName: 'Имперский Топаз & Янтарь',
        gemText: 'Камень космической экспансии и высшей мудрости. Дарует ясность цели, щедрость духа и соединяет с полем изобилия Юпитера.',
        nodes: [
            { id: 'alnasl', rx: -0.16, ry: 0.04 }, { id: 'kaus_m', rx: -0.08, ry: -0.02 },
            { id: 'heart', rx: -0.07, ry: 0.12, isHeart: true }, { id: 'kaus_b', rx: -0.03, ry: -0.12 },
            { id: 'phi_sgr', rx: 0.05, ry: -0.04 }, { id: 'nunki', rx: 0.12, ry: -0.10 },
            { id: 'ascell', rx: 0.14, ry: 0.02 }
        ],
        edges: [
            ['alnasl', 'kaus_m'], ['kaus_m', 'heart'], ['kaus_m', 'kaus_b'],
            ['kaus_b', 'phi_sgr'], ['phi_sgr', 'nunki'], ['nunki', 'ascell'],
            ['ascell', 'heart'], ['phi_sgr', 'ascell']
        ]
    },
    capricorn: {
        name: 'Козерог', starName: 'Денеб (Индиго)', gemColor: '#6366F1', gemSecondary: '#C7D2FE', chimeFreq: 396,
        gemFullName: 'Сакральный Обсидиан & Индиго',
        gemText: 'Зеркало древней истины и несокрушимой структуры. Укореняет намерение, отсекает иллюзии и выстраивает мост сквозь века.',
        nodes: [
            { id: 'algedi', rx: -0.18, ry: -0.14 }, { id: 'dabih', rx: -0.16, ry: -0.06 },
            { id: 'heart', rx: 0.16, ry: -0.05, isHeart: true }, { id: 'nashira', rx: 0.12, ry: -0.02 },
            { id: 'omega_cap', rx: -0.04, ry: 0.18 }
        ],
        edges: [
            ['algedi', 'dabih'], ['dabih', 'omega_cap'], ['omega_cap', 'heart'],
            ['heart', 'nashira'], ['algedi', 'nashira']
        ]
    },
    aquarius: {
        name: 'Водолей', starName: 'Садальсууд (Циан)', gemColor: '#06B6D4', gemSecondary: '#CFFAFE', chimeFreq: 741,
        gemFullName: 'Циановый Сапфир & Аметист',
        gemText: 'Проводник космического озарения и свободной воли. Синхронизирует сознание с вибрациями будущего и гармонией Урана.',
        nodes: [
            { id: 'heart', rx: -0.05, ry: -0.12, isHeart: true }, { id: 'sadalmel', rx: 0.08, ry: -0.08 },
            { id: 'skat', rx: 0.14, ry: 0.18 }, { id: 'ankha', rx: -0.10, ry: 0.08 },
            { id: 'h_aqr', rx: 0.00, ry: 0.22 }
        ],
        edges: [
            ['heart', 'sadalmel'], ['heart', 'ankha'], ['sadalmel', 'skat'],
            ['ankha', 'h_aqr'], ['skat', 'h_aqr']
        ]
    },
    pisces: {
        name: 'Рыбы', starName: 'Альриша (Аквамарин)', gemColor: '#14B8A6', gemSecondary: '#CCFBF1', chimeFreq: 432,
        gemFullName: 'Аквамарин Мировой Бездны',
        gemText: 'Камень безусловной любви и океанического сострадания. Растворяет кармические узлы и соединяет с единым источником творения.',
        nodes: [
            { id: 'heart', rx: 0.00, ry: 0.18, isHeart: true }, { id: 'p_west', rx: -0.16, ry: -0.08 },
            { id: 'p_north', rx: 0.14, ry: -0.14 }, { id: 'knot_w', rx: -0.08, ry: 0.05 },
            { id: 'knot_n', rx: 0.06, ry: 0.02 }
        ],
        edges: [
            ['p_west', 'knot_w'], ['knot_w', 'heart'], ['heart', 'knot_n'], ['knot_n', 'p_north']
        ]
    },
    aries: {
        name: 'Овен', starName: 'Хамаль (Гранат)', gemColor: '#EF4444', gemSecondary: '#FEE2E2', chimeFreq: 963,
        gemFullName: 'Огненный Пироп & Алмаз',
        gemText: 'Изначальная искра творения. Пробуждает неукротимую витальную силу Марса, смелость первопроходца и пламя победы.',
        nodes: [
            { id: 'heart', rx: 0.06, ry: -0.08, isHeart: true }, { id: 'sheratan', rx: -0.04, ry: -0.02 },
            { id: 'mesarth', rx: -0.12, ry: 0.06 }, { id: 'botein', rx: 0.14, ry: -0.04 }
        ],
        edges: [
            ['botein', 'heart'], ['heart', 'sheratan'], ['sheratan', 'mesarth']
        ]
    },
    taurus: {
        name: 'Телец', starName: 'Альдебаран (Опал)', gemColor: '#F97316', gemSecondary: '#FFEDD5', chimeFreq: 528,
        gemFullName: 'Изумруд Венеры & Благородный Опал',
        gemText: 'Эликсир земного процветания и чувственной красоты. Гармонизирует материальный мир с сакральными законами Вселенной.',
        nodes: [
            { id: 'heart', rx: -0.02, ry: 0.02, isHeart: true }, { id: 'elnath', rx: 0.12, ry: -0.22 },
            { id: 'tianguan', rx: 0.18, ry: -0.08 }, { id: 'ain', rx: -0.06, ry: -0.06 },
            { id: 'pleiades', rx: -0.18, ry: -0.12 }
        ],
        edges: [
            ['heart', 'ain'], ['ain', 'pleiades'], ['heart', 'tianguan'], ['ain', 'elnath']
        ]
    },
    gemini: {
        name: 'Близнецы', starName: 'Поллукс (Бриллиант)', gemColor: '#38BDF8', gemSecondary: '#E0F2FE', chimeFreq: 639,
        gemFullName: 'Светящийся Бриллиант & Цитрин',
        gemText: 'Кристалл живой мысли и связи миров. Обостряет телепатическое восприятие, дар слова и гибкость познания бытия.',
        nodes: [
            { id: 'castor', rx: -0.08, ry: -0.20 }, { id: 'heart', rx: 0.02, ry: -0.16, isHeart: true },
            { id: 'alhena', rx: -0.12, ry: 0.18 }, { id: 'wasat', rx: -0.02, ry: 0.02 },
            { id: 'mebsuta', rx: -0.14, ry: -0.04 }
        ],
        edges: [
            ['castor', 'heart'], ['castor', 'mebsuta'], ['mebsuta', 'alhena'],
            ['heart', 'wasat'], ['wasat', 'alhena']
        ]
    },
    cancer: {
        name: 'Рак', starName: 'Акубенс (Лунный камень)', gemColor: '#E2E8F0', gemSecondary: '#FFFFFF', chimeFreq: 432,
        gemFullName: 'Лунный Селенит & Перламутр',
        gemText: 'Хранитель родовых тайн и глубокой душевной нежности. Защищает священное пространство сердца и сонастраивает с приливами Луны.',
        nodes: [
            { id: 'heart', rx: 0.08, ry: 0.08, isHeart: true }, { id: 'tarf', rx: -0.12, ry: 0.14 },
            { id: 'asellus_n', rx: 0.02, ry: -0.12 }, { id: 'asellus_a', rx: -0.02, ry: -0.02 }
        ],
        edges: [
            ['asellus_n', 'asellus_a'], ['asellus_a', 'tarf'], ['asellus_a', 'heart']
        ]
    },
    leo: {
        name: 'Лев', starName: 'Регул (Золото Солнца)', gemColor: '#FBBF24', gemSecondary: '#FEF3C7', chimeFreq: 528,
        gemFullName: 'Солнечный Хризолит & Янтарь',
        gemText: 'Царственное сияние чистого духа. Наделяет харизмой благородного лидера, щедростью сердца и несокрушимой уверенностью.',
        nodes: [
            { id: 'heart', rx: -0.14, ry: 0.12, isHeart: true }, { id: 'denebola', rx: 0.18, ry: -0.02 },
            { id: 'algieba', rx: -0.04, ry: -0.08 }, { id: 'zisma', rx: 0.08, ry: -0.04 },
            { id: 'adhafera', rx: -0.08, ry: -0.18 }
        ],
        edges: [
            ['heart', 'algieba'], ['algieba', 'adhafera'], ['algieba', 'zisma'],
            ['zisma', 'denebola'], ['denebola', 'heart']
        ]
    },
    virgo: {
        name: 'Дева', starName: 'Спика (Лазурь)', gemColor: '#60A5FA', gemSecondary: '#DBEAFE', chimeFreq: 741,
        gemFullName: 'Лазурит & Сапфир Музы',
        gemText: 'Священный кристалл жриц Атлантиды. Проявляет тонкие законы космоса в материи, дарует целительскую силу и совершенную точность.',
        nodes: [
            { id: 'heart', rx: 0.04, ry: 0.16, isHeart: true }, { id: 'porrima', rx: -0.08, ry: -0.04 },
            { id: 'vindem', rx: -0.04, ry: -0.20 }, { id: 'heze', rx: 0.12, ry: 0.06 },
            { id: 'zavijava', rx: -0.18, ry: -0.12 }
        ],
        edges: [
            ['zavijava', 'porrima'], ['porrima', 'vindem'], ['porrima', 'heart'], ['heart', 'heze']
        ]
    },
    libra: {
        name: 'Весы', starName: 'Зубен (Изумруд)', gemColor: '#10B981', gemSecondary: '#D1FAE5', chimeFreq: 639,
        gemFullName: 'Благородный Опал & Нефрит',
        gemText: 'Камень сакрального равновесия и высшей гармонии союзов. Притягивает истинное родство душ и восстанавливает мир во Вселенной.',
        nodes: [
            { id: 'heart', rx: -0.06, ry: -0.12, isHeart: true }, { id: 'z_gen', rx: -0.12, ry: 0.08 },
            { id: 'brachium', rx: 0.08, ry: 0.14 }, { id: 'z_kud', rx: 0.14, ry: -0.02 }
        ],
        edges: [
            ['heart', 'z_gen'], ['heart', 'z_kud'], ['z_gen', 'brachium'], ['z_kud', 'brachium']
        ]
    }
};

(function() {
    const canvas = document.getElementById('astraina-live-stars');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let w, h;

    function resize() {
        w = canvas.width = window.innerWidth;
        h = canvas.height = window.innerHeight;
    }
    window.addEventListener('resize', resize);
    resize();

    const STAR_COUNT = 3500;
    const stars = new Float32Array(STAR_COUNT * 4);
    for (let i = 0; i < STAR_COUNT; i++) {
        const i4 = i * 4;
        stars[i4] = Math.random() * w;
        stars[i4 + 1] = Math.random() * h;
        stars[i4 + 2] = Math.random() < 0.96 ? (Math.random() * 0.9 + 0.2) : (Math.random() * 1.8 + 1.0);
        stars[i4 + 3] = Math.random() * 0.02 + 0.005;
    }

    const MW_COUNT = 1800;
    const mwParticles = [];
    const mwColors = ['#4F46E5', '#818CF8', '#F59E0B', '#38BDF8', '#FDA4AF', '#FFFFFF'];

    for (let i = 0; i < MW_COUNT; i++) {
        mwParticles.push({
            prog: Math.random(),
            spread: (Math.random() - 0.5) * 160,
            size: Math.random() * 2.2 + 0.6,
            color: mwColors[Math.floor(Math.random() * mwColors.length)],
            alpha: Math.random() * 0.55 + 0.2,
            speed: Math.random() * 0.0004 + 0.0002
        });
    }

    let currentSignKey = 'scorpio';
    let currentConstellation = ZODIAC_CONSTELLATIONS[currentSignKey];
    let morphAlpha = 1.0;
    let pulse = 0;

    let targetMouseX = 0, targetMouseY = 0;
    let smoothMouseX = 0, smoothMouseY = 0;

    window.addEventListener('mousemove', (e) => {
        targetMouseX = (e.clientX - w / 2) * 0.02;
        targetMouseY = (e.clientY - h / 2) * 0.02;
    });

    window.switchZodiac = function(signKey) {
        if (!ZODIAC_CONSTELLATIONS[signKey]) return;
        currentSignKey = signKey;
        currentConstellation = ZODIAC_CONSTELLATIONS[signKey];
        morphAlpha = 0.0;

        if (window.playSolfeggioBell) {
            window.playSolfeggioBell(currentConstellation.chimeFreq || 864);
        }

        const statEl = document.getElementById('ast-sub-status');
        const haloEl = document.getElementById('ast-dynamic-halo');
        const titleEl = document.getElementById('ast-gem-title');
        const descEl = document.getElementById('ast-gem-desc');

        if (statEl) statEl.textContent = `Зодиак: ${currentConstellation.name} (${currentConstellation.starName})`;

        if (haloEl) {
            haloEl.style.background = `radial-gradient(circle, ${currentConstellation.gemColor}44 0%, rgba(245, 158, 11, 0.1) 40%, transparent 70%)`;
        }

        if (titleEl) titleEl.textContent = currentConstellation.gemFullName;
        if (descEl) descEl.textContent = currentConstellation.gemText;

        document.querySelectorAll('.ast-z-btn').forEach(b => {
            b.classList.toggle('active', b.getAttribute('data-sign') === signKey);
        });
    };

    document.querySelectorAll('.ast-z-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            window.switchZodiac(btn.getAttribute('data-sign'));
        });
    });

    function render() {
        ctx.clearRect(0, 0, w, h);

        pulse += 0.02;
        if (morphAlpha < 1.0) morphAlpha += 0.04;

        smoothMouseX += (targetMouseX - smoothMouseX) * 0.05;
        smoothMouseY += (targetMouseY - smoothMouseY) * 0.05;

        // 1. Млечный путь
        for (let i = 0; i < MW_COUNT; i++) {
            const p = mwParticles[i];
            p.prog += p.speed;
            if (p.prog > 1.0) p.prog = 0;

            const baseX = p.prog * (w + 240) - 120;
            const baseY = (h * 0.90) - p.prog * (h * 0.46) + Math.sin(p.prog * Math.PI * 1.8 + pulse) * 28;

            const px = baseX + smoothMouseX * 0.8;
            const py = baseY + p.spread + smoothMouseY * 0.8;

            ctx.save();
            ctx.globalAlpha = p.alpha * (0.8 + Math.sin(pulse * 1.5 + i) * 0.2);
            ctx.fillStyle = p.color;
            ctx.beginPath();
            ctx.arc(px, py, p.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }

        // 2. Звездный купол
        ctx.fillStyle = '#FFFFFF';
        for (let i = 0; i < STAR_COUNT; i++) {
            const i4 = i * 4;
            const px = stars[i4] + smoothMouseX * (stars[i4 + 2] * 0.2);
            const py = stars[i4 + 1] + smoothMouseY * (stars[i4 + 2] * 0.2);
            const pr = stars[i4 + 2];
            const a = 0.25 + Math.sin(pulse + i) * 0.25;

            ctx.globalAlpha = a;
            ctx.fillRect(px, py, pr, pr);
        }

        // 3. Созвездия
        const isDesktop = w > 900;
        const scale = Math.min(w, h) * (isDesktop ? 0.58 : 0.72);

        let cx, cy;
        const targetBox = document.getElementById('ast-devi-target-box');

        if (isDesktop && targetBox) {
            const boxRect = targetBox.getBoundingClientRect();
            cx = (boxRect.left - (scale * 0.24)) + smoothMouseX * 1.4;
            cy = (boxRect.top + boxRect.height * 0.16) + smoothMouseY * 1.4;
        } else {
            cx = (isDesktop ? w * 0.42 : w * 0.50) + smoothMouseX * 1.4;
            cy = (isDesktop ? h * 0.26 : h * 0.22) + smoothMouseY * 1.4;
        }

        const posMap = {};
        for (let node of currentConstellation.nodes) {
            posMap[node.id] = {
                x: cx + node.rx * scale,
                y: cy + node.ry * scale,
                node: node
            };
        }

        ctx.lineWidth = 1.3;
        for (let [fromId, toId] of currentConstellation.edges) {
            const p1 = posMap[fromId];
            const p2 = posMap[toId];
            if (!p1 || !p2) continue;

            const edgeGrad = ctx.createLinearGradient(p1.x, p1.y, p2.x, p2.y);
            edgeGrad.addColorStop(0, 'rgba(245, 158, 11, ' + (0.35 * morphAlpha) + ')');
            edgeGrad.addColorStop(0.5, currentConstellation.gemColor + Math.floor(morphAlpha * 200).toString(16).padStart(2, '0'));
            edgeGrad.addColorStop(1, 'rgba(245, 158, 11, ' + (0.35 * morphAlpha) + ')');

            ctx.beginPath();
            ctx.moveTo(p1.x, p1.y);
            ctx.lineTo(p2.x, p2.y);
            ctx.strokeStyle = edgeGrad;
            ctx.stroke();
        }

        // 4. Самоцветы
        for (let id in posMap) {
            const p = posMap[id];
            const n = p.node;

            if (n.isHeart) {
                const gemPulse = (Math.sin(pulse * 1.6) * 6.25 + 25) * morphAlpha;
                const auraPulse = (Math.sin(pulse * 1.6) * 22.5 + 94) * morphAlpha;

                const gradAura = ctx.createRadialGradient(p.x, p.y, 4, p.x, p.y, auraPulse);
                gradAura.addColorStop(0, currentConstellation.gemColor + '88');
                gradAura.addColorStop(0.4, currentConstellation.gemColor + '25');
                gradAura.addColorStop(1, 'transparent');
                ctx.fillStyle = gradAura;
                ctx.beginPath();
                ctx.arc(p.x, p.y, auraPulse, 0, Math.PI * 2);
                ctx.fill();

                ctx.strokeStyle = currentConstellation.gemSecondary || '#FFFFFF';
                ctx.lineWidth = 1.2;
                ctx.beginPath();
                ctx.moveTo(p.x - gemPulse * 3.1, p.y);
                ctx.lineTo(p.x + gemPulse * 3.1, p.y);
                ctx.moveTo(p.x, p.y - gemPulse * 3.1);
                ctx.lineTo(p.x, p.y + gemPulse * 3.1);
                ctx.stroke();

                ctx.save();
                ctx.translate(p.x, p.y);
                ctx.rotate(pulse * 0.4);
                ctx.strokeStyle = currentConstellation.gemColor;
                ctx.lineWidth = 1;
                ctx.strokeRect(-gemPulse * 0.65, -gemPulse * 0.65, gemPulse * 1.3, gemPulse * 1.3);
                ctx.restore();

                const gradCore = ctx.createRadialGradient(p.x, p.y, 2, p.x, p.y, gemPulse);
                gradCore.addColorStop(0, '#FFFFFF');
                gradCore.addColorStop(0.25, currentConstellation.gemSecondary || '#FEF3C7');
                gradCore.addColorStop(0.65, currentConstellation.gemColor);
                gradCore.addColorStop(1, 'rgba(0,0,0,0)');
                ctx.fillStyle = gradCore;
                ctx.beginPath();
                ctx.arc(p.x, p.y, gemPulse, 0, Math.PI * 2);
                ctx.fill();
            } else {
                const starTwinkle = (Math.sin(pulse * 2.2 + p.x) * 1.4 + 2.8) * morphAlpha;
                const starGrad = ctx.createRadialGradient(p.x, p.y, 1, p.x, p.y, starTwinkle * 2.0);
                starGrad.addColorStop(0, '#FFFFFF');
                starGrad.addColorStop(0.4, '#FEF3C7');
                starGrad.addColorStop(1, 'transparent');

                ctx.fillStyle = starGrad;
                ctx.beginPath();
                ctx.arc(p.x, p.y, starTwinkle * 2.0, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        ctx.globalAlpha = 1.0;
        requestAnimationFrame(render);
    }
    render();
})();

// Аудиоплеер
(function() {
    const efirTracks = [
        '/wp-content/uploads/astraina-audio/01.mp3',
        '/wp-content/uploads/astraina-audio/02.mp3',
        '/wp-content/uploads/astraina-audio/03.mp3',
        '/wp-content/uploads/astraina-audio/04.mp3',
        '/wp-content/uploads/astraina-audio/05.mp3',
        '/wp-content/uploads/astraina-audio/06.mp3',
        '/wp-content/uploads/astraina-audio/07.mp3',
        '/wp-content/uploads/astraina-audio/08.mp3'
    ];
    let efirIdx = 0;
    let efirPlayer = new Audio();
    let isEfirRunning = false;
    let curGain = 0.35;
    efirPlayer.volume = curGain;

    let audioCtx = null;
    let ambientTimer = null;
    let isAmbientRunning = false;

    function getAudioCtx() {
        if (!audioCtx) {
            const AC = window.AudioContext || window.webkitAudioContext;
            if (AC) audioCtx = new AC();
        }
        if (audioCtx && audioCtx.state === 'suspended') {
            audioCtx.resume();
        }
        return audioCtx;
    }

    window.playSolfeggioBell = function(customPitch = null) {
        try {
            const ctx = getAudioCtx();
            if (!ctx) return;
            const t = ctx.currentTime;
            const pitches = [432, 528, 639, 741, 852, 963];
            const pitch = customPitch || pitches[Math.floor(Math.random() * pitches.length)];

            const osc = ctx.createOscillator();
            const overtone = ctx.createOscillator();
            const gain = ctx.createGain();

            osc.type = 'sine';
            osc.frequency.setValueAtTime(pitch, t);

            overtone.type = 'sine';
            overtone.frequency.setValueAtTime(pitch * 2.756, t);

            const peakVol = Math.max(0.001, curGain * 0.35);
            gain.gain.setValueAtTime(0.0001, t);
            gain.gain.linearRampToValueAtTime(peakVol, t + 0.02);
            gain.gain.exponentialRampToValueAtTime(0.00001, t + 3.4);

            osc.connect(gain);
            overtone.connect(gain);
            gain.connect(ctx.destination);

            osc.start(t);
            overtone.start(t);
            osc.stop(t + 3.5);
            overtone.stop(t + 3.5);
        } catch(e) {}
    };

    function scheduleAmbientCycle() {
        if (!isAmbientRunning) return;
        const delay = Math.random() * 3000 + 4500;
        ambientTimer = setTimeout(() => {
            if (isAmbientRunning) {
                window.playSolfeggioBell();
                scheduleAmbientCycle();
            }
        }, delay);
    }

    window.toggleMainAmbient = function() {
        const btn = document.getElementById('main-btn-ambient');
        if (isAmbientRunning) {
            if (ambientTimer) {
                clearTimeout(ambientTimer);
                ambientTimer = null;
            }
            isAmbientRunning = false;
            if (btn) btn.classList.remove('active');
        } else {
            getAudioCtx();
            isAmbientRunning = true;
            if (btn) btn.classList.add('active');
            window.playSolfeggioBell(528);
            scheduleAmbientCycle();
        }
    };

    function playEfirTrack() {
        efirPlayer.src = efirTracks[efirIdx];
        efirPlayer.volume = curGain;
        efirPlayer.play().then(() => {
            isEfirRunning = true;
            const btn = document.getElementById('main-btn-efir');
            if (btn) btn.classList.add('active');
        }).catch(err => {
            console.log('Эфир ожидает действия пользователя');
        });
    }

    window.toggleMainEfir = function() {
        const btn = document.getElementById('main-btn-efir');
        if (isEfirRunning) {
            efirPlayer.pause();
            isEfirRunning = false;
            if (btn) btn.classList.remove('active');
        } else {
            playEfirTrack();
        }
    };

    efirPlayer.onended = function() {
        window.navMainEfir(1);
    };

    window.navMainEfir = function(dir) {
        efirIdx = (efirIdx + dir + efirTracks.length) % efirTracks.length;
        if (isEfirRunning) {
            playEfirTrack();
        }
    };

    window.stopAllMainAudio = function() {
        if (isEfirRunning) {
            efirPlayer.pause();
            isEfirRunning = false;
            const btnE = document.getElementById('main-btn-efir');
            if (btnE) btnE.classList.remove('active');
        }
        if (isAmbientRunning) {
            if (ambientTimer) {
                clearTimeout(ambientTimer);
                ambientTimer = null;
            }
            isAmbientRunning = false;
            const btnA = document.getElementById('main-btn-ambient');
            if (btnA) btnA.classList.remove('active');
        }
    };

    window.setMainVolume = function(val) {
        curGain = (val / 100) * 0.50;
        efirPlayer.volume = curGain;
    };
})();
</script>

<!-- =========================================================================
     ASTRAINA: ХРАМ 26 САКРАЛЬНЫХ ПОРТАЛОВ ОБСЕРВАТОРИИ
========================================================================= -->
<section id="observatory-portals" style="position: relative; z-index: 5; padding: 70px 20px 90px; max-width: 1280px; margin: 0 auto; font-family: 'Plus Jakarta Sans', sans-serif;">
    <div style="text-align: center; margin-bottom: 45px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; padding: 6px 18px; border-radius: 9999px; background: rgba(245, 158, 11, 0.08); border: 1px solid rgba(245, 158, 11, 0.25); color: #FBBF24; font-size: 11px; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; margin-bottom: 16px;">
            ✦ Архитектура Экосистемы ASTRAINA · Все 26 Порталов LIVE
        </div>
        <h2 style="font-family: 'Cinzel Decorative', serif; font-size: clamp(28px, 4.5vw, 46px); background: linear-gradient(135deg, #FFF7ED 0%, #FDE68A 50%, #D97706 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin: 0 0 16px;">
            Храм Небесных Кодов и Человеческих Связей
        </h2>
        <p style="color: #9CA3AF; font-size: clamp(14px, 2vw, 17px); max-width: 760px; margin: 0 auto; line-height: 1.6;">
            Каждый модуль — это автономный инструмент высокой точности: от физической астрометрии NASA JPL DE440 до юнгианских архетипов и B2B кабинетов мастеров.
        </p>

        <!-- ФИЛЬТР-ТАБЫ -->
        <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 10px; margin-top: 32px;">
            <button type="button" class="portal-tab-btn active" onclick="filterPortals('all', this)">✦ Все Порталы (26)</button>
            <button type="button" class="portal-tab-btn" onclick="filterPortals('sky', this)">🌌 Небосвод & Хронос (8)</button>
            <button type="button" class="portal-tab-btn" onclick="filterPortals('natal', this)">☉ Астрометрия & Душа (7)</button>
            <button type="button" class="portal-tab-btn" onclick="filterPortals('social', this)">💫 Социальный Эфир (6)</button>
            <button type="button" class="portal-tab-btn" onclick="filterPortals('eco', this)">✨ Экосистема & Доступ (5)</button>
        </div>
    </div>

    <!-- СЕТКА КАРТОЧЕК 26 ПОРТАЛОВ -->
    <div id="portals-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(290px, 1fr)); gap: 22px;">
        
        <!-- ==================== НЕБОСВОД & ХРОНОС (8) ==================== -->
        <a href="<?php echo esc_url(home_url('/astro-calendar/')); ?>" class="portal-card" data-cat="sky">
            <div>
                <div class="card-head">
                    <span class="card-icon">⏳</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Календарь Хронос</h3>
                <p class="card-desc">Столетняя матрица эфемерид JPL, фазы Луны, затмения, солнцестояния и экспорт .ICS в личные календари.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-lunar/')); ?>" class="portal-card" data-cat="sky">
            <div>
                <div class="card-head">
                    <span class="card-icon">☽</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Лунный Оракул и Сутки</h3>
                <p class="card-desc">1–30 истинные лунные сутки по восходу, фазы, стоянки в знаках и астро-прогрессбары для дел, здоровья и стрижек.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-today/')); ?>" class="portal-card" data-cat="sky">
            <div>
                <div class="card-head">
                    <span class="card-icon">📜</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">365 Дней в Истории</h3>
                <p class="card-desc">Астрономическая летопись на каждый день года: исторические события, небесные эпохи и мировые праздники 250 стран.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-sky/')); ?>" class="portal-card" data-cat="sky">
            <div>
                <div class="card-head">
                    <span class="card-icon">🌌</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">3D Купол Небосвода (8 920 зв.)</h3>
                <p class="card-desc">Автономный интерактивный 3D планетарий на базе каталога HYG. 8 920 звёзд до 6.5 mag и созвездия без внешних API.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-iss/')); ?>" class="portal-card" data-cat="sky">
            <div>
                <div class="card-head">
                    <span class="card-icon">🛰️</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Орбитальный трекер МКС</h3>
                <p class="card-desc">Клиентский расчет траектории Международной Космической Станции, прогноз видимых пролётов и календарный будильник.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-weather/')); ?>" class="portal-card" data-cat="sky">
            <div>
                <div class="card-head">
                    <span class="card-icon">⚡</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Погода Космоса & Kp</h3>
                <p class="card-desc">Прямой локальный кэш NOAA Space Weather: солнечные вспышки, геомагнитные возмущения и шкала персонального самочувствия.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-ephemeris/')); ?>" class="portal-card" data-cat="sky">
            <div>
                <div class="card-head">
                    <span class="card-icon">🪐</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Атлас 12 тел JPL DE440</h3>
                <p class="card-desc">Фундаментальные физические эфемериды NASA JPL: геоцентрические векторы, скорость движения, директность и задержка света.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-dso/')); ?>" class="portal-card" data-cat="sky">
            <div>
                <div class="card-head">
                    <span class="card-icon">🔭</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Атлас Мессье (DSO)</h3>
                <p class="card-desc">Полный сакральный каталог 110 шедевров далёкого космоса Мессье (M1–M110): туманности, скопления и галактики OpenNGC.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <!-- ==================== АСТРОМЕТРИЯ & ДУША (7) ==================== -->
        <a href="<?php echo esc_url(home_url('/astro-chart/')); ?>" class="portal-card" data-cat="natal">
            <div>
                <div class="card-head">
                    <span class="card-icon">☉</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Натальная Карта (JPL DE440)</h3>
                <p class="card-desc">Векторный рендер колеса Плацидус на реальных эфемеридах JPL: 10 планет, Хирон, Лилит, Узлы, аспекты и орбисы.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-synastry/')); ?>" class="portal-card" data-cat="natal">
            <div>
                <div class="card-head">
                    <span class="card-icon">⚭</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Синастрия Пар (4 шкалы)</h3>
                <p class="card-desc">Глубокий резонанс двух наталов: радар-чарт гармонии (Романтика, Дружба, Деловое партнёрство, Кармическая связь).</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-archetypes/')); ?>" class="portal-card" data-cat="natal">
            <div>
                <div class="card-head">
                    <span class="card-icon">🏛️</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">16 Архетипов Юнга & Звезды</h3>
                <p class="card-desc">Фундаментальный синтез типологии Карла Юнга с триадой Солнце-Луна-Асцендент. Фолиант на 5 глав глубинного психоанализа.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-human/')); ?>" class="portal-card" data-cat="natal">
            <div>
                <div class="card-head">
                    <span class="card-icon">💬</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Astro-to-Human Переводчик</h3>
                <p class="card-desc">Семантический транслятор аспектов на язык психоаналитики: суперсилы, теневые ловушки и возрастные кризисы.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-biorhythms/')); ?>" class="portal-card" data-cat="natal">
            <div>
                <div class="card-head">
                    <span class="card-icon">📈</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Биоритмический Резонанс</h3>
                <p class="card-desc">Математический синусоидальный расчет трёх фундаментальных биоритмов: физического (23д), эмоционального (28д) и ментального (33д).</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-numerology/')); ?>" class="portal-card" data-cat="natal">
            <div>
                <div class="card-head">
                    <span class="card-icon">🔢</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Матрица Нумерологии</h3>
                <p class="card-desc">Число Жизненного Пути, Сакральный Код Судьбы и классический квадрат Пифагора на основе точной астрономической даты.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-solar/')); ?>" class="portal-card" data-cat="natal">
            <div>
                <div class="card-head">
                    <span class="card-icon">☀️</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Персональный Соляр</h3>
                <p class="card-desc">Численный расчет точного возвращения Солнца с учетом релокации города и путеводитель по 12 Сакральным Дням Соляра.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <!-- ==================== СОЦИАЛЬНЫЙ ЭФИР (6) ==================== -->
        <a href="<?php echo esc_url(home_url('/astro-stories/')); ?>" class="portal-card" data-cat="social">
            <div>
                <div class="card-head">
                    <span class="card-icon">📱</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Stories Карточки 9:16</h3>
                <p class="card-desc">Микросервис на HTML5 Canvas: генерация вертикальных Stories 1080×1920 px (Триада, Лунный Оракул, Синастрия, Манифест).</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-feed/')); ?>" class="portal-card" data-cat="social">
            <div>
                <div class="card-head">
                    <span class="card-icon">💫</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Friends Transit Feed</h3>
                <p class="card-desc">Деликатная транзитная лента близких людей: уведомления о планетарных резонансах в реальном времени.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/astro-shadow/')); ?>" class="portal-card" data-cat="social">
            <div>
                <div class="card-head">
                    <span class="card-icon">👤</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Теневые Профили (Shadow)</h3>
                <p class="card-desc">Глубинная психоаналитика теневых точек: Чёрная Луна Лилит, Плутон, ретро-планеты и триггеры уязвимости в союзах.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/celebrity-charts/')); ?>" class="portal-card" data-cat="social">
            <div>
                <div class="card-head">
                    <span class="card-icon">👑</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Каталог Карт Гениев</h3>
                <p class="card-desc">Сверенная коллекция карт исторических личностей, визионеров, ученых и кумиров эпохи с экспресс-синастрией в 1 клик.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/time-capsule/')); ?>" class="portal-card" data-cat="social">
            <div>
                <div class="card-head">
                    <span class="card-icon">🗝️</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Капсула Времени</h3>
                <p class="card-desc">Запечатанное цифровое послание в будущее, которое расшифровывается и открывается строго в момент Полнолуния или Затмения.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/cosmic-rooms/')); ?>" class="portal-card" data-cat="social">
            <div>
                <div class="card-head">
                    <span class="card-icon">🔮</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Кластерные Круги</h3>
                <p class="card-desc">Динамические пространства общения людей с редкими астрологическими совпадениями (Стеллиумы, Восходящий Плутон).</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <!-- ==================== ЭКОСИСТЕМА & ДОСТУП (5) ==================== -->
        <a href="<?php echo esc_url(home_url('/vedunya-pro/')); ?>" class="portal-card" data-cat="eco">
            <div>
                <div class="card-head">
                    <span class="card-icon">✨</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Кабинет «Ведунья Pro» B2B</h3>
                <p class="card-desc">Рабочее место эксперта: Astro-CRM клиентов, White-Label PDF экспорт без сторонних брендов и прямая отправка в мессенджеры.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/download/')); ?>" class="portal-card" data-cat="eco">
            <div>
                <div class="card-head">
                    <span class="card-icon">📲</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Приложения (Android APK / iOS)</h3>
                <p class="card-desc">Закрытый клуб соавторов Android APK с формой обратной связи тестеров + официальный лист ожидания Apple App Store.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/pricing/')); ?>" class="portal-card" data-cat="eco">
            <div>
                <div class="card-head">
                    <span class="card-icon">💎</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Тарифы & Cosmic Pass PRO</h3>
                <p class="card-desc">Тарифные Врата: безлимитный доступ ко всем 26 астрометрическим расчетам, персональному соляру и глубоким слоям синастрии.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/privacy/')); ?>" class="portal-card" data-cat="eco">
            <div>
                <div class="card-head">
                    <span class="card-icon">🛡️</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Кодекс Суверенитета Данных</h3>
                <p class="card-desc">Архитектура Zero Cloud Store: персональные даты и координаты вычисляются локально и никогда не сохраняются на серверах.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

        <a href="<?php echo esc_url(home_url('/manifesto/')); ?>" class="portal-card" data-cat="eco">
            <div>
                <div class="card-head">
                    <span class="card-icon">🏛️</span>
                    <span class="card-tag tag-live">LIVE</span>
                </div>
                <h3 class="card-title">Сакральный Манифест</h3>
                <p class="card-desc">Философия синтеза астрометрии NASA JPL, свитков Атлантиды и глубинной психологии без суеверий и навязчивого маркетинга.</p>
            </div>
            <div class="card-foot"><span>Открыть Портал</span><span>→</span></div>
        </a>

    </div>
</section>

<style>
.portal-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-decoration: none;
    background: rgba(8, 14, 26, 0.78);
    border: 1px solid rgba(245, 158, 11, 0.22);
    border-radius: 18px;
    padding: 26px 22px;
    backdrop-filter: blur(16px);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 12px 30px rgba(0,0,0,0.5);
}
.portal-card:hover {
    border-color: rgba(245, 158, 11, 0.6) !important;
    transform: translateY(-5px);
    box-shadow: 0 20px 45px rgba(245, 158, 11, 0.18), 0 0 20px rgba(245, 158, 11, 0.12) !important;
}
.card-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 16px;
}
.card-icon {
    font-size: 32px;
    filter: drop-shadow(0 0 10px rgba(245, 158, 11, 0.3));
}
.card-tag {
    font-family: monospace;
    font-size: 10px;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 6px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
}
.tag-live {
    background: rgba(245, 158, 11, 0.12);
    border: 1px solid rgba(245, 158, 11, 0.35);
    color: #FBBF24;
}
.card-title {
    font-family: 'Cinzel Decorative', serif;
    font-size: 18px;
    color: #FDE68A;
    margin: 0 0 10px;
    line-height: 1.3;
}
.card-desc {
    color: #94A3B8;
    font-size: 13px;
    line-height: 1.55;
    margin: 0 0 18px;
}
.card-foot {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px solid rgba(255, 255, 255, 0.06);
    font-size: 12px;
    font-weight: 600;
    color: #F59E0B;
}

.portal-tab-btn {
    background: rgba(8, 14, 26, 0.85);
    border: 1px solid rgba(245, 158, 11, 0.2);
    color: #D1D5DB;
    padding: 10px 20px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.25s ease;
    backdrop-filter: blur(10px);
}
.portal-tab-btn.active, .portal-tab-btn:hover {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(225, 29, 72, 0.15));
    border-color: #F59E0B;
    color: #FBBF24;
    box-shadow: 0 0 20px rgba(245, 158, 11, 0.2);
}
</style>

<script>
function filterPortals(cat, btn) {
    document.querySelectorAll('.portal-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const cards = document.querySelectorAll('.portal-card');
    cards.forEach(card => {
        if (cat === 'all' || card.getAttribute('data-cat') === cat) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<?php get_footer(); ?>