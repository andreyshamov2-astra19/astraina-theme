<?php
/**
 * Template Name: Лунный Оракул и Сутки
 * Architecture: Samhain Obsidian & Cosmic Gold · Stacking Context Safeguard
 */
get_header(); ?>
<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 85vh; padding: 40px 20px 80px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <div style="text-align: center; margin-bottom: 35px;">
            <span style="font-family: monospace; font-size: 11px; color: #F59E0B; letter-spacing: 2px; text-transform: uppercase;">✦ ЛУННЫЙ ОРАКУЛ & ХРОНОС СУТОК</span>
            <h1 style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: clamp(26px, 4vw, 40px); margin: 12px 0;">Истинные Лунные Ритмы и Практики</h1>
            <p style="color: #94A3B8; max-width: 650px; margin: 0 auto; font-size: 15px;">Точный астрономический расчет фазы, освещенности диска, знака зодиака и сакральных лунных суток (1–30).</p>
        </div>

        <!-- КАРТОЧКА ТЕКУЩЕЙ ЛУНЫ -->
        <div style="background: rgba(8, 14, 26, 0.92); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 20px; padding: 35px; backdrop-filter: blur(16px); box-shadow: 0 20px 50px rgba(0,0,0,0.7); margin-bottom: 40px;">
            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-around; gap: 30px;">
                <div style="text-align: center;">
                    <div id="lunar-disc-visual" style="width: 130px; height: 130px; border-radius: 50%; margin: 0 auto 15px; box-shadow: 0 0 35px rgba(245, 158, 11, 0.35); border: 2px solid rgba(245, 158, 11, 0.5); display: flex; align-items: center; justify-content: center; font-size: 55px; color: #FDE68A;">☽</div>
                    <div id="lunar-phase-name" style="font-family: 'Cinzel Decorative', serif; font-size: 18px; color: #FBBF24; font-weight: 700;">Растущая Луна</div>
                    <div id="lunar-illumination" style="color: #94A3B8; font-size: 13px; font-family: monospace; margin-top: 5px;">Освещенность: 68%</div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px; flex: 1; max-width: 650px;">
                    <div style="background: rgba(2, 4, 8, 0.6); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 18px;">
                        <span style="font-size: 11px; color: #94A3B8; text-transform: uppercase; font-family: monospace;">Лунные Сутки</span>
                        <div id="lunar-day-num" style="font-size: 24px; color: #FFF; font-weight: 700; margin-top: 4px;">11 Лунный День</div>
                        <div id="lunar-symbol" style="font-size: 12px; color: #F59E0B; margin-top: 2px;">Символ: Корона, Меч</div>
                    </div>
                    <div style="background: rgba(2, 4, 8, 0.6); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 18px;">
                        <span style="font-size: 11px; color: #94A3B8; text-transform: uppercase; font-family: monospace;">Луна в Знаке</span>
                        <div id="lunar-zodiac-sign" style="font-size: 24px; color: #FFF; font-weight: 700; margin-top: 4px;">Лев ♌</div>
                        <div style="font-size: 12px; color: #38BDF8; margin-top: 2px;">Стихия: Огонь</div>
                    </div>
                    <div style="background: rgba(2, 4, 8, 0.6); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 18px;">
                        <span style="font-size: 11px; color: #94A3B8; text-transform: uppercase; font-family: monospace;">Энергетический Вектор</span>
                        <div style="font-size: 18px; color: #10B981; font-weight: 700; margin-top: 4px;">Благоприятный</div>
                        <div style="font-size: 12px; color: #94A3B8; margin-top: 2px;">Пик витальных сил</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4 САКРАЛЬНЫЕ СФЕРЫ РЕКОМЕНДАЦИЙ -->
        <h3 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; font-size: 22px; margin-bottom: 20px; text-align: center;">Астрологические Рекомендации на День</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px;">
            <div style="background: rgba(8, 14, 26, 0.85); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 16px; padding: 22px;">
                <h4 style="color: #F59E0B; margin: 0 0 10px; font-size: 16px;">💇 Стрижки и Красота</h4>
                <p style="color: #CBD5E1; font-size: 13.5px; line-height: 1.6; margin: 0;">Идеальное время для стрижки и ухода за волосами: лунный рост ускоряет укрепление фолликулов и наполняет волосы шелковистым блеском.</p>
            </div>
            <div style="background: rgba(8, 14, 26, 0.85); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 16px; padding: 22px;">
                <h4 style="color: #F59E0B; margin: 0 0 10px; font-size: 16px;">💼 Бизнес и Финансы</h4>
                <p style="color: #CBD5E1; font-size: 13.5px; line-height: 1.6; margin: 0;">Благоприятный период для заключения соглашений, публичных выступлений и смелых запусков. Финансовые потоки открыты для масштабирования.</p>
            </div>
            <div style="background: rgba(8, 14, 26, 0.85); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 16px; padding: 22px;">
                <h4 style="color: #F59E0B; margin: 0 0 10px; font-size: 16px;">🌿 Здоровье и Тело</h4>
                <p style="color: #CBD5E1; font-size: 13.5px; line-height: 1.6; margin: 0;">Рекомендуются физические нагрузки умеренной интенсивности, сауна и водные процедуры. Избегайте перегрузки сердечно-сосудистой системы.</p>
            </div>
            <div style="background: rgba(8, 14, 26, 0.85); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 16px; padding: 22px;">
                <h4 style="color: #F59E0B; margin: 0 0 10px; font-size: 16px;">🧘 Духовные Практики</h4>
                <p style="color: #CBD5E1; font-size: 13.5px; line-height: 1.6; margin: 0;">День концентрации намерения. Медитации на кристаллах кварца и работа с дыханием пранаямы принесут ясность ума и сонастройку с высшими сферами.</p>
            </div>
        </div>

    </div>
</div>

<script>
(function() {
    // Точный расчет синодического лунного цикла
    const now = new Date();
    const synodicMonth = 29.53058867;
    const knownNewMoon = new Date('2000-01-06T18:14:00Z').getTime();
    const diffDays = (now.getTime() - knownNewMoon) / (1000 * 60 * 60 * 24);
    const cyclePos = (diffDays % synodicMonth + synodicMonth) % synodicMonth;
    const illumination = Math.round((1 - Math.cos((cyclePos / synodicMonth) * 2 * Math.PI)) / 2 * 100);

    let phaseName = 'Новолуние';
    let moonIcon = '🌑';
    if (cyclePos > 1 && cyclePos < 7) { phaseName = 'Растущий Серп'; moonIcon = '🌒'; }
    else if (cyclePos >= 7 && cyclePos < 9) { phaseName = 'Первая Четверть'; moonIcon = '🌓'; }
    else if (cyclePos >= 9 && cyclePos < 14) { phaseName = 'Растущая Луна'; moonIcon = '🌔'; }
    else if (cyclePos >= 14 && cyclePos < 16) { phaseName = 'Полнолуние'; moonIcon = '🌕'; }
    else if (cyclePos >= 16 && cyclePos < 21) { phaseName = 'Убывающая Луна'; moonIcon = '🌖'; }
    else if (cyclePos >= 21 && cyclePos < 23) { phaseName = 'Последняя Четверть'; moonIcon = '🌗'; }
    else if (cyclePos >= 23 && cyclePos < 28.5) { phaseName = 'Стареющий Серп'; moonIcon = '🌘'; }

    const lunarDay = Math.floor(cyclePos) + 1;
    const zodiacs = ['Овен ♈', 'Телец ♉', 'Близнецы ♊', 'Рак ♋', 'Лев ♌', 'Дева ♍', 'Весы ♎', 'Скорпион ♏', 'Стрелец ♐', 'Козерог ♑', 'Водолей ♒', 'Рыбы ♓'];
    const zIdx = Math.floor(((diffDays * 13.176) % 360) / 30);
    const currentZodiac = zodiacs[(zIdx + 12) % 12];

    document.getElementById('lunar-disc-visual').textContent = moonIcon;
    document.getElementById('lunar-phase-name').textContent = phaseName;
    document.getElementById('lunar-illumination').textContent = 'Освещенность диска: ' + illumination + '%';
    document.getElementById('lunar-day-num').textContent = lunarDay + ' Лунный День';
    document.getElementById('lunar-zodiac-sign').textContent = currentZodiac;
})();
</script>
<?php get_footer(); ?>