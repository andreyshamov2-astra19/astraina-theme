<?php
if (!defined('ABSPATH')) { exit; }
?>
<?php

$currentYear = (int) wp_date('Y');
$events = \AstraChron\Calendar\ChronosEngine::getUpcomingEvents($currentYear);
$matrixSample = \AstraChron\Matrix\PythagorasMatrix::calculate('1995-10-24');
$mbtiSample = \AstraChron\Matrix\AstroMBTIBridge::synthesize('INTJ', 'Скорпион');
?>

<div class="ast-chronos-viewport" style="background: #020408; min-height: 100vh; color: #FEF3C7; padding: 80px 20px 100px;">
    <div class="ast-container" style="max-width: 1400px; margin: 0 auto;">
        
        <!-- HEADER -->
        <header style="text-align: center; margin-bottom: 50px;">
            <div style="font-family: 'Space Mono', monospace; font-size: 11px; letter-spacing: 0.35em; color: #F59E0B; text-transform: uppercase; margin-bottom: 12px;">
                AstraChron Engine · Wheel of the Year & Sacred Matrix
            </div>
            <h1 style="font-family: 'Cinzel Decorative', 'Cormorant Garamond', serif; font-size: clamp(28px, 4.5vw, 50px); font-weight: 400; color: #FEF3C7; text-shadow: 0 0 35px rgba(245, 158, 11, 0.35); margin: 0 0 16px;">
                Календарь Хронос и Сакральная Матрица
            </h1>
            <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 15px; color: rgba(254, 243, 199, 0.7); max-width: 760px; margin: 0 auto; line-height: 1.6;">
                Синхронизация с 8 праздниками Колеса Года, ведическими циклами, нумерологической психоматрицей Пифагора и архетипами Астро-MBTI.
            </p>
        </header>

        <!-- SECTION 1: WHEEL OF THE YEAR (SACRED CALENDAR) -->
        <section style="margin-bottom: 70px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 14px;">
                <h2 style="font-family: 'Cinzel', serif; font-size: 22px; color: #FBBF24; margin: 0;">
                    КОЛЕСО ГОДА САМАЙНА (<?php echo $currentYear; ?>)
                </h2>
                <a href="<?php echo esc_url(rest_url('astro/v1/calendar/ics-all')); ?>" style="background: rgba(245, 158, 11, 0.15); border: 1px solid #F59E0B; color: #FEF3C7; padding: 8px 18px; border-radius: 6px; font-family: 'Space Mono', monospace; font-size: 11px; text-decoration: none;">
                    ЭКСПОРТ .ICS В APPLE / GOOGLE
                </a>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(290px, 1fr)); gap: 24px;">
                <?php foreach ($events as $ev): ?>
                    <div class="ast-glass-card" style="background: rgba(8, 14, 26, 0.75); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 14px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                                <span style="font-family: 'Space Mono', monospace; font-size: 10px; color: #38BDF8;"><?php echo esc_html($ev['tradition']); ?></span>
                                <span style="font-family: 'Space Mono', monospace; font-size: 11px; color: #F59E0B; font-weight: bold;"><?php echo esc_html(wp_date('d.m.Y', $ev['timestamp'])); ?></span>
                            </div>
                            <h3 style="font-family: 'Cinzel', serif; font-size: 17px; color: #FEF3C7; margin: 0 0 10px;"><?php echo esc_html($ev['name']); ?></h3>
                            <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; color: rgba(254, 243, 199, 0.75); line-height: 1.5; margin: 0 0 16px;">
                                <?php echo esc_html($ev['lead']); ?>
                            </p>
                        </div>
                        <button type="button" data-name="<?php echo esc_attr($ev['name']); ?>" data-lead="<?php echo esc_attr($ev['lead']); ?>" data-date="<?php echo esc_attr($ev['date']); ?>" onclick="downloadEventIcs(this.dataset.name, this.dataset.lead, this.dataset.date)" style="width: 100%; background: transparent; border: 1px solid rgba(245, 158, 11, 0.3); color: #FBBF24; padding: 8px; border-radius: 6px; font-family: 'Space Mono', monospace; font-size: 10px; cursor: pointer;">
                            + ДОБАВИТЬ В КАЛЕНДАРЬ
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- SECTION 2: PYTHAGOREAN PSYCHOMATRIX & ASTRO-MBTI (TWO COLUMNS) -->
        <div style="display: grid; grid-template-columns: minmax(320px, 1fr) minmax(320px, 1fr); gap: 36px; align-items: start;">
            
            <!-- PYTHAGORAS MATRIX -->
            <div class="ast-glass-card" style="background: rgba(8, 14, 26, 0.8); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 30px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                    <h3 style="font-family: 'Cinzel', serif; font-size: 18px; color: #FEF3C7; margin: 0;">
                        ПСИХОМАТРИЦА ПИФАГОРА
                    </h3>
                    <span style="font-family: 'Space Mono', monospace; font-size: 12px; color: #F59E0B;">ЧЖП: <?php echo $matrixSample['life_path_number']; ?></span>
                </div>
                <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; color: rgba(254, 243, 199, 0.65); margin-bottom: 20px;">
                    Расчёт 9 сакральных ячеек потенциала личности по дате рождения 24.10.1995.
                </p>

                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 24px;">
                    <?php for ($pos = 1; $pos <= 9; $pos++): $cell = (($pos - 1) % 3) * 3 + intdiv($pos - 1, 3) + 1; ?>
                        <div style="background: rgba(2, 4, 8, 0.8); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 8px; padding: 12px; text-align: center;">
                            <div style="font-family: 'Space Mono', monospace; font-size: 10px; color: #38BDF8; margin-bottom: 4px;">
                                <?php echo esc_html($matrixSample['grid_breakdown'][$cell]['title']); ?>
                            </div>
                            <div style="font-family: 'Cinzel', serif; font-size: 20px; color: #FBBF24; font-weight: bold;">
                                <?php 
                                    $cnt = $matrixSample['matrix_counts'][$cell];
                                    echo $cnt > 0 ? str_repeat((string)$cell, $cnt) : '—';
                                ?>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

                <div style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; color: rgba(254, 243, 199, 0.8); line-height: 1.6; background: rgba(2, 4, 8, 0.6); padding: 14px; border-radius: 8px; border-left: 2px solid #F59E0B;">
                    <strong>Число Жизненного Пути <?php echo $matrixSample['life_path_number']; ?>:</strong> Лидерский вектор глубинного познания, способность трансформировать кризис в эволюционную ступень.
                </div>
            </div>

            <!-- ASTRO-MBTI SYNTHESIZER -->
            <div class="ast-glass-card" style="background: rgba(8, 14, 26, 0.8); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 30px;">
                <span style="font-family: 'Space Mono', monospace; font-size: 10px; color: #FDA4AF; letter-spacing: 0.15em;">ЮНГИАНСКИЙ РЕЗОНАНС</span>
                <h3 style="font-family: 'Cinzel', serif; font-size: 18px; color: #FEF3C7; margin: 6px 0 16px;">
                    Астро-MBTI: <?php echo esc_html($mbtiSample['archetype_title']); ?>
                </h3>
                
                <div style="display: flex; gap: 14px; margin-bottom: 18px;">
                    <div style="background: rgba(2, 4, 8, 0.7); border: 1px solid rgba(245, 158, 11, 0.2); padding: 8px 14px; border-radius: 6px; font-family: 'Space Mono', monospace; font-size: 11px;">
                        <span style="color: rgba(254, 243, 199, 0.6);">Управитель:</span> <span style="color: #38BDF8;"><?php echo esc_html($mbtiSample['ruler']); ?></span>
                    </div>
                    <div style="background: rgba(2, 4, 8, 0.7); border: 1px solid rgba(245, 158, 11, 0.2); padding: 8px 14px; border-radius: 6px; font-family: 'Space Mono', monospace; font-size: 11px;">
                        <span style="color: rgba(254, 243, 199, 0.6);">Стихия:</span> <span style="color: #F59E0B;"><?php echo esc_html($mbtiSample['element']); ?></span>
                    </div>
                </div>

                <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; color: rgba(254, 243, 199, 0.85); line-height: 1.7; margin-bottom: 24px;">
                    <?php echo esc_html($mbtiSample['synthesis_text']); ?>
                </p>

                <div style="background: rgba(2, 4, 8, 0.6); padding: 18px; border-radius: 10px; border: 1px solid rgba(245, 158, 11, 0.15);">
                    <div style="font-family: 'Space Mono', monospace; font-size: 10px; color: #FBBF24; margin-bottom: 8px;">БЫСТРЫЙ ЭКСПРЕСС-ТЕСТ MBTI (4 ВОПРОСА):</div>
                    <select id="ast-mbti-selector" onchange="switchMbti(this.value)" style="width: 100%; background: #080E1A; border: 1px solid rgba(245, 158, 11, 0.3); color: #FEF3C7; padding: 10px; border-radius: 6px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px;">
                        <option value="INTJ">INTJ — Стратег (Сатурн / Уран)</option>
                        <option value="INTP">INTP — Исследователь (Меркурий / Уран)</option>
                        <option value="INFJ">INFJ — Хранитель Тайн (Нептун / Плутон)</option>
                        <option value="INFP">INFP — Океанический Эмпат (Луна / Нептун)</option>
                        <option value="ENTJ">ENTJ — Властелин Вершин (Солнце / Марс)</option>
                        <option value="ENFP">ENFP — Вдохновитель Душ (Юпитер / Венера)</option>
                    </select>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
function downloadEventIcs(name, desc, date) {
    const dt = date.replace(/-/g, '') + 'T120000Z';
    const icsContent = 
`BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//ASTRAINA//Chronos Engine//RU
BEGIN:VEVENT
UID:AST_${Date.now()}@astraina.com
DTSTAMP:${dt}
DTSTART:${dt}
DTEND:${dt}
SUMMARY:${name}
DESCRIPTION:${desc}
END:VEVENT
END:VCALENDAR`;

    const blob = new Blob([icsContent], { type: 'text/calendar;charset=utf-8' });
    const link = document.createElement('a');
    link.href = window.URL.createObjectURL(blob);
    link.download = `${name.replace(/\s+/g, '_')}.ics`;
    link.click();
}

function switchMbti(val) {
    alert(`Психотип переключен на: ${val}\nАрхетипическая проекция Солнца обновлена.`);
}
</script>
