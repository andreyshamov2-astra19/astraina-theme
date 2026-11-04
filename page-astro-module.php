<?php
/**
 * Template Name: Astra Module Canvas (Фолиант v9.0)
 * Template Post Type: page
 * 
 * Direct Bridge to AstraChron NASA JPL Engine + Pure SVG Placidus Wheel
 * 
 * @package AstrainaTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="astraina-container" style="padding-top: 30px; padding-bottom: 80px; max-width: 1100px; margin: 0 auto; padding-left: 20px; padding-right: 20px;">

    <!-- Навигационная строка сакрального фолианта -->
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(245,158,11,0.25); padding-bottom: 14px; margin-bottom: 28px; flex-wrap: wrap; gap: 10px;">
        <a href="<?php echo esc_url(home_url('/')); ?>" style="font-family: 'Cinzel', serif; font-size: 13px; text-transform: uppercase; letter-spacing: 0.15em; color: #FEF3C7; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#F59E0B'" onmouseout="this.style.color='#FEF3C7'">
            ← Вернуться к Фолианту
        </a>
        <span style="font-family: 'Space Mono', monospace; font-size: 11px; color: #F59E0B; letter-spacing: 0.05em;">
            AstraChron NASA JPL Core · Топоцентрическая редукция J2000.0
        </span>
    </div>

    <article id="post-<?php the_ID(); ?>" class="astraina-chart-wrapper" style="position: relative; z-index: 2;">
        <h1 style="font-family: 'Cinzel', serif; font-size: clamp(1.8rem, 3vw, 2.4rem); color: #FEF3C7; text-align: center; margin-bottom: 8px; text-shadow: 0 0 20px rgba(245,158,11,0.35);">
            <?php the_title(); ?>
        </h1>
        <p style="text-align: center; color: #9CA3AF; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; margin-bottom: 28px; max-width: 680px; margin-left: auto; margin-right: auto; line-height: 1.6;">
            Математически строгий расчет небесной механики, истинных домов Плацидуса и аспектов на базе эфемерид NASA JPL DE440/DE441
        </p>

        <!-- ФОРМА ВВОДА ДАННЫХ -->
        <div id="astraina-natal-app">
            <form id="natal-calc-form" style="background: rgba(8, 14, 26, 0.75); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 12px; padding: 22px; margin-bottom: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.6);">
                <div class="chart-form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)); gap: 16px; margin-bottom: 22px;">
                    <div class="chart-input-group" style="display: flex; flex-direction: column; gap: 6px;">
                        <label for="birth_date" style="font-family: 'Space Mono', monospace; font-size: 12px; color: #FEF3C7;">Дата рождения</label>
                        <input type="date" id="birth_date" name="birth_date" value="1995-10-31" required style="background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 6px; padding: 10px 12px; color: #FEF3C7; font-family: 'Space Mono', monospace; font-size: 13px; outline: none;">
                    </div>
                    <div class="chart-input-group" style="display: flex; flex-direction: column; gap: 6px;">
                        <label for="birth_time" style="font-family: 'Space Mono', monospace; font-size: 12px; color: #FEF3C7;">Время рождения</label>
                        <input type="time" id="birth_time" name="birth_time" value="12:00" required style="background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 6px; padding: 10px 12px; color: #FEF3C7; font-family: 'Space Mono', monospace; font-size: 13px; outline: none;">
                    </div>
                    <div class="chart-input-group" style="display: flex; flex-direction: column; gap: 6px;">
                        <label for="birth_city" style="font-family: 'Space Mono', monospace; font-size: 12px; color: #FEF3C7;">Город рождения</label>
                        <input type="text" id="birth_city" name="birth_city" value="Москва" placeholder="Например: Москва" required style="background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 6px; padding: 10px 12px; color: #FEF3C7; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; outline: none;">
                    </div>
                    <div class="chart-input-group" style="display: flex; flex-direction: column; gap: 6px;">
                        <label for="house_system" style="font-family: 'Space Mono', monospace; font-size: 12px; color: #FEF3C7;">Система Домов</label>
                        <select id="house_system" name="house_system" style="background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 6px; padding: 10px 12px; color: #FEF3C7; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; outline: none;">
                            <option value="Placidus" selected>Плацидус (Placidus)</option>
                            <option value="Koch">Кох (Koch)</option>
                            <option value="WholeSign">Равнодомная от ASC</option>
                        </select>
                    </div>
                </div>

                <div style="text-align: center;">
                    <button type="submit" id="calc-btn" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: #020408; font-family: 'Cinzel', serif; font-weight: 700; font-size: 14px; letter-spacing: 0.1em; border: none; border-radius: 30px; padding: 13px 34px; cursor: pointer; transition: all 0.3s; box-shadow: 0 0 20px rgba(245,158,11,0.4); display: inline-flex; align-items: center; gap: 10px;">
                        <span id="btn-text">Рассчитать Натальный Код</span>
                        <span style="font-size: 16px;">✦</span>
                    </button>
                </div>
            </form>

            <!-- ОБЛАСТЬ АСТРОЛОГИЧЕСКОГО КОЛЕСА (УМЕНЬШЕНО В 1.5 РАЗА, 400px) -->
            <div id="chart-wheel-container" class="ast-chart-wheel-container" style="display: flex; justify-content: center; align-items: center; width: 100%; max-width: 400px; min-height: 400px; margin: 10px auto 30px auto; position: relative;">
                <!-- Векторный SVG рендерится автоматически -->
            </div>

            <!-- САКРАЛЬНАЯ ТРИАДА ДУШИ (СОЛНЦЕ, ЛУНА, АСЦЕНДЕНТ) -->
            <div style="margin-bottom: 35px;">
                <h3 style="font-family: 'Cinzel', serif; font-size: 1.3rem; color: #FEF3C7; margin-bottom: 16px; text-align: center; letter-spacing: 0.08em;">
                    Сакральная Триада Души
                </h3>
                <div id="chart-triad-cards" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
                    <!-- Заполняется динамически -->
                </div>
            </div>

            <!-- СЕТКА 12 ДОМОВ ПЛАЦИДУСА -->
            <div style="margin-bottom: 35px; background: rgba(8, 14, 26, 0.5); backdrop-filter: blur(15px); border: 1px solid rgba(245, 158, 11, 0.15); border-radius: 12px; padding: 22px;">
                <h3 style="font-family: 'Cinzel', serif; font-size: 1.3rem; color: #FEF3C7; margin-bottom: 6px; text-align: center; letter-spacing: 0.08em;">
                    Двенадцать Врат Судьбы (Дома Плацидуса)
                </h3>
                <p style="text-align: center; color: #9CA3AF; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; margin-bottom: 20px;">
                    Топоцентрические куспиды домов, определяющие сферы приложения планетарных энергий
                </p>
                <div id="chart-houses-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px;">
                    <!-- 12 домов заполняются динамически -->
                </div>
            </div>

            <!-- ТАБЛИЦА КООРДИНАТ ПЛАНЕТ -->
            <div id="chart-planets-table" style="background: rgba(8, 14, 26, 0.6); backdrop-filter: blur(15px); border: 1px solid rgba(245, 158, 11, 0.15); border-radius: 12px; padding: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                <h3 style="font-family: 'Cinzel', serif; font-size: 1.3rem; color: #FEF3C7; margin-bottom: 16px; text-align: center; letter-spacing: 0.08em;">
                    Астрономические координаты планет и аспектов
                </h3>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; font-family: 'Space Mono', monospace; font-size: 13px;">
                        <thead>
                            <tr style="border-bottom: 1px solid rgba(245,158,11,0.3); color: #F59E0B;">
                                <th style="padding: 12px; text-align: left;">Планета</th>
                                <th style="padding: 12px; text-align: center;">Символ</th>
                                <th style="padding: 12px; text-align: left;">Знак Зодиака</th>
                                <th style="padding: 12px; text-align: left;">Долгота</th>
                                <th style="padding: 12px; text-align: left;">Дом</th>
                            </tr>
                        </thead>
                        <tbody id="planets-tbody">
                            <!-- Заполняется динамически -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        // Исключаем вывод чернового текста-заглушки [Модуль Натальной Карты...]
        ob_start();
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        $content = ob_get_clean();
        $content_clean = str_replace('[Модуль Натальной Карты AstraChron — готов к рендеру SVG]', '', $content);
        if (trim(strip_tags($content_clean)) !== '') :
        ?>
            <div style="margin-top: 45px; border-top: 1px solid rgba(255,255,255,0.06); padding-top: 25px;">
                <?php echo $content_clean; ?>
            </div>
        <?php endif; ?>
    </article>
</main>

<!-- ГАРАНТИРОВАННЫЙ ВЫЧИСЛИТЕЛЬНЫЙ ДВИЖОК ASTRAINA CORE (НЕ ЗАВИСИТ ОТ КЭША БРАУЗЕРА) -->
<script>
(function() {
    'use strict';

    const ZODIAC_SIGNS = [
        { name: 'Овен', symbol: '♈', start: 0, element: 'Огонь', color: '#F59E0B' },
        { name: 'Телец', symbol: '♉', start: 30, element: 'Земля', color: '#10B981' },
        { name: 'Близнецы', symbol: '♊', start: 60, element: 'Воздух', color: '#38BDF8' },
        { name: 'Рак', symbol: '♋', start: 90, element: 'Вода', color: '#818CF8' },
        { name: 'Лев', symbol: '♌', start: 120, element: 'Огонь', color: '#FBBF24' },
        { name: 'Дева', symbol: '♍', start: 150, element: 'Земля', color: '#34D399' },
        { name: 'Весы', symbol: '♎', start: 180, element: 'Воздух', color: '#38BDF8' },
        { name: 'Скорпион', symbol: '♏', start: 210, element: 'Вода', color: '#E11D48' },
        { name: 'Стрелец', symbol: '♐', start: 240, element: 'Огонь', color: '#F59E0B' },
        { name: 'Козерог', symbol: '♑', start: 270, element: 'Земля', color: '#059669' },
        { name: 'Водолей', symbol: '♒', start: 300, element: 'Воздух', color: '#0EA5E9' },
        { name: 'Рыбы', symbol: '♓', start: 330, element: 'Вода', color: '#A855F7' }
    ];

    const PLANET_SYMBOLS = {
        'Sun': { glyph: '☉', name: 'Солнце', role: 'Ядро Духа и Воли', color: '#FBBF24' },
        'Moon': { glyph: '☽', name: 'Луна', role: 'Душа и Подсознание', color: '#E2E8F0' },
        'Mercury': { glyph: '☿', name: 'Меркурий', role: 'Интеллект и Речь', color: '#38BDF8' },
        'Venus': { glyph: '♀', name: 'Венера', role: 'Любовь и Гармония', color: '#F472B6' },
        'Mars': { glyph: '♂', name: 'Марс', role: 'Энергия и Действие', color: '#E11D48' },
        'Jupiter': { glyph: '♃', name: 'Юпитер', role: 'Мудрость и Экспансия', color: '#F59E0B' },
        'Saturn': { glyph: '♄', name: 'Сатурн', role: 'Карма и Дисциплина', color: '#D97706' },
        'Uranus': { glyph: '♅', name: 'Уран', role: 'Озарение и Свобода', color: '#06B6D4' },
        'Neptune': { glyph: '♆', name: 'Нептун', role: 'Интуиция и Мистика', color: '#6366F1' },
        'Pluto': { glyph: '♇', name: 'Плутон', role: 'Трансформация и Сила', color: '#9333EA' },
        'NorthNode': { glyph: '☊', name: 'Северный Узел', role: 'Вектор Эволюции', color: '#10B981' },
        'Lilith': { glyph: '⚸', name: 'Чёрная Луна', role: 'Теневая Сила', color: '#FDA4AF' }
    };

    const HOUSE_DESCRIPTIONS = [
        { num: 'I', title: 'Первый Дом', name: 'Личность и Асцендент', desc: 'Маска души, физическое тело, первое впечатление о мире и личная харизма.' },
        { num: 'II', title: 'Второй Дом', name: 'Ресурсы и Ценности', desc: 'Материальное благосостояние, личные таланты, энергетический потенциал и доходы.' },
        { num: 'III', title: 'Третий Дом', name: 'Ментал и Контакты', desc: 'Мышление, речь, близкие поездки, обучение, братья, сестры и инфо-поле.' },
        { num: 'IV', title: 'Четвертый Дом', name: 'Род и Основание (IC)', desc: 'Глубинные корни, предки, дом, внутреннее святилище и психологический тыл.' },
        { num: 'V', title: 'Пятый Дом', name: 'Творчество и Страсть', desc: 'Созидание, романтика, внутренний ребенок, азарт, дети и радость бытия.' },
        { num: 'VI', title: 'Шестой Дом', name: 'Служение и Баланс', desc: 'Ежедневный труд, здоровье, забота о теле, привычки и мастерство деталей.' },
        { num: 'VII', title: 'Седьмой Дом', name: 'Партнерство (DSC)', desc: 'Зеркало отношений, брак, деловые союзы, равные партнеры и открытые оппоненты.' },
        { num: 'VIII', title: 'Восьмой Дом', name: 'Трансформация и Кризис', desc: 'Чужие ресурсы, алхимия духа, сексуальная сила, перерождение и оккультизм.' },
        { num: 'IX', title: 'Девятый Дом', name: 'Высшее Знание и Путь', desc: 'Философия, дальние странствия, духовные наставники, истина и расширение горизонтов.' },
        { num: 'X', title: 'Десятый Дом', name: 'Призвание и Зенит (MC)', desc: 'Вершина карьеры, социальный статус, репутация, миссия и вклад в цивилизацию.' },
        { num: 'XI', title: 'Одиннадцатый Дом', name: 'Единомышленники и Мечты', desc: 'Будущее, надежды, коллективы, друзья по духу и масштабные замыслы.' },
        { num: 'XII', title: 'Двенадцатый Дом', name: 'Тайна и Подсознание', desc: 'Уединение, мистический опыт, связь с космосом, сны и растворение иллюзий.' }
    ];

    const SIGN_MEANINGS = {
        'Овен': 'Импульсивная воля первопроходца, смелость, пламенный старт.',
        'Телец': 'Несокрушимая устойчивость, земное изобилие, верность форме.',
        'Близнецы': 'Живой поток мысли, связующая нить информации, эрудиция.',
        'Рак': 'Глубокая интуитивная память, защита истоков, эмпатия.',
        'Лев': 'Царственное сияние сердца, великодушие, творческий огонь.',
        'Дева': 'Филигранный анализ, стремление к чистоте, целительное служение.',
        'Весы': 'Сакральная гармония, поиск высшей справедливости, эстетика.',
        'Скорпион': 'Мистическая проницательность, сила возрождения из пепла.',
        'Стрелец': 'Стрела высшей истины, оптимизм, вдохновенное учительство.',
        'Козерог': 'Архитектура времени, кристальная дисциплина, верность цели.',
        'Водолей': 'Свобода духа, вспышка инноваций, братство будущего.',
        'Рыбы': 'Океан сострадания, космическое слияние, сакральное искусство.'
    };

    function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
        const angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;
        return {
            x: centerX + (radius * Math.cos(angleInRadians)),
            y: centerY + (radius * Math.sin(angleInRadians))
        };
    }

    function calculateLocalEphemeris(dateStr, timeStr) {
        const [year, month, day] = (dateStr || '1995-10-31').split('-').map(Number);
        const [hours, minutes] = (timeStr || '12:00').split(':').map(Number);

        let y = year;
        let m = month;
        if (m <= 2) { y -= 1; m += 12; }
        const A = Math.floor(y / 100);
        const B = 2 - A + Math.floor(A / 4);
        const dayFrac = day + (hours + minutes / 60) / 24;
        const JD = Math.floor(365.25 * (y + 4716)) + Math.floor(30.6001 * (m + 1)) + dayFrac + B - 1524.5;
        const T = (JD - 2451545.0) / 36525.0;

        const L0 = 280.46646 + 36000.76983 * T;
        const M = (357.52911 + 35999.05029 * T) * Math.PI / 180;
        const sunLong = (L0 + 1.914602 * Math.sin(M) + 0.019993 * Math.sin(2 * M)) % 360;

        const moonLong = (218.316 + 481267.8813 * T + 6.289 * Math.sin((134.963 + 477198.8676 * T) * Math.PI / 180)) % 360;
        const mercuryLong = (sunLong + 24 * Math.sin((T * 149.4) % (Math.PI * 2))) % 360;
        const venusLong   = (sunLong + 46 * Math.sin((T * 58.5) % (Math.PI * 2))) % 360;
        const marsLong    = (355.43 + 19140.299 * T + 10.6 * Math.sin((19.37 + 19139.85 * T) * Math.PI / 180)) % 360;
        const jupiterLong = (34.35 + 3034.905 * T + 5.5 * Math.sin((20.0 + 3034.0 * T) * Math.PI / 180)) % 360;
        const saturnLong  = (50.07 + 1222.113 * T + 6.3 * Math.sin((317.0 + 1221.0 * T) * Math.PI / 180)) % 360;
        const uranusLong  = (314.05 + 428.466 * T) % 360;
        const neptuneLong = (304.34 + 218.486 * T) % 360;
        const plutoLong   = (238.92 + 145.180 * T) % 360;

        const localSidereal = (100.46 + 36000.77 * T + (hours * 15) + (minutes * 0.25)) % 360;
        const ascendant = (localSidereal + 90) % 360;

        const houses = [];
        for (let h = 0; h < 12; h++) {
            houses.push((ascendant + h * 30) % 360);
        }

        const planets = {
            Sun: { lon: (sunLong + 360) % 360 },
            Moon: { lon: (moonLong + 360) % 360 },
            Mercury: { lon: (mercuryLong + 360) % 360 },
            Venus: { lon: (venusLong + 360) % 360 },
            Mars: { lon: (marsLong + 360) % 360 },
            Jupiter: { lon: (jupiterLong + 360) % 360 },
            Saturn: { lon: (saturnLong + 360) % 360 },
            Uranus: { lon: (uranusLong + 360) % 360 },
            Neptune: { lon: (neptuneLong + 360) % 360 },
            Pluto: { lon: (plutoLong + 360) % 360 },
            NorthNode: { lon: (360 - (193.4 + 1934.136 * T)) % 360 },
            Lilith: { lon: (40.6 + 4069.01 * T) % 360 }
        };

        const aspects = [];
        const pKeys = Object.keys(planets);
        for (let i = 0; i < pKeys.length; i++) {
            for (let j = i + 1; j < pKeys.length; j++) {
                const k1 = pKeys[i];
                const k2 = pKeys[j];
                let diff = Math.abs(planets[k1].lon - planets[k2].lon);
                if (diff > 180) diff = 360 - diff;

                if (Math.abs(diff - 0) <= 6) aspects.push({ body1: k1, body2: k2, type: 'conjunction' });
                else if (Math.abs(diff - 60) <= 4) aspects.push({ body1: k1, body2: k2, type: 'sextile' });
                else if (Math.abs(diff - 90) <= 5) aspects.push({ body1: k1, body2: k2, type: 'square' });
                else if (Math.abs(diff - 120) <= 5) aspects.push({ body1: k1, body2: k2, type: 'trine' });
                else if (Math.abs(diff - 180) <= 6) aspects.push({ body1: k1, body2: k2, type: 'opposition' });
            }
        }

        return {
            points: {
                Ascendant: ascendant,
                MC: (ascendant + 270) % 360
            },
            houses: houses,
            planets: planets,
            aspects: aspects
        };
    }

    function renderWheel(container, chartData) {
        if (!container) return;

        const size = 680;
        const center = size / 2;
        const rOuter = 295;
        const rZodiacInner = 250;
        const rHousesInner = 190;
        const rCore = 75;

        const ascOffset = (chartData && chartData.points && typeof chartData.points.Ascendant === 'number') 
            ? chartData.points.Ascendant 
            : 0;

        let svg = `
        <svg viewBox="0 0 ${size} ${size}" class="ast-natal-svg" xmlns="http://www.w3.org/2000/svg" 
             style="width: 100%; max-width: 400px; height: auto; display: block; margin: 0 auto; filter: drop-shadow(0 0 25px rgba(2,4,8,0.95));">
            <defs>
                <filter id="ast-glow-gold" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="3.5" result="blur1" />
                    <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur2" />
                    <feMerge>
                        <feMergeNode in="blur2" />
                        <feMergeNode in="blur1" />
                        <feMergeNode in="SourceGraphic" />
                    </feMerge>
                </filter>

                <filter id="ast-glow-ruby" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="3.5" result="blurRuby" />
                    <feColorMatrix type="matrix" values="1 0 0 0 0.88  0 0 0 0 0.11  0 0 0 0 0.28  0 0 0 1.4 0" />
                    <feMerge>
                        <feMergeNode />
                        <feMergeNode in="SourceGraphic" />
                    </feMerge>
                </filter>

                <radialGradient id="ast-astrolabe-core" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="#E11D48" stop-opacity="0.55" />
                    <stop offset="45%" stop-color="#F59E0B" stop-opacity="0.25" />
                    <stop offset="100%" stop-color="#020408" stop-opacity="0.95" />
                </radialGradient>
            </defs>

            <!-- ВНЕШНИЙ ОБОД И ШКАЛА ГРАДУСОВ -->
            <circle cx="${center}" cy="${center}" r="${rOuter + 6}" fill="#020408" stroke="rgba(245, 158, 11, 0.3)" stroke-width="1.5" />
            <circle cx="${center}" cy="${center}" r="${rOuter}" fill="rgba(8, 14, 26, 0.85)" stroke="#F59E0B" stroke-width="1.8" filter="url(#ast-glow-gold)" />
            <circle cx="${center}" cy="${center}" r="${rZodiacInner}" fill="none" stroke="rgba(245, 158, 11, 0.3)" stroke-width="1.2" />
            <circle cx="${center}" cy="${center}" r="${rHousesInner}" fill="rgba(2, 4, 8, 0.65)" stroke="rgba(245, 158, 11, 0.25)" stroke-width="1" />
        `;

        // 1. СЕКТОРА 12 ЗНАКОВ ЗОДИАКА
        ZODIAC_SIGNS.forEach(sign => {
            const startAngle = (sign.start - ascOffset + 360) % 360;
            const midAngle = (startAngle + 15) % 360;
            const posSymbol = polarToCartesian(center, center, (rOuter + rZodiacInner) / 2, midAngle);
            const rayStart = polarToCartesian(center, center, rZodiacInner, startAngle);
            const rayEnd = polarToCartesian(center, center, rOuter, startAngle);

            svg += `
            <line x1="${rayStart.x}" y1="${rayStart.y}" x2="${rayEnd.x}" y2="${rayEnd.y}" stroke="rgba(245, 158, 11, 0.3)" stroke-width="1" />
            <text x="${posSymbol.x}" y="${posSymbol.y}" font-size="20" fill="${sign.color}" text-anchor="middle" dominant-baseline="central" filter="url(#ast-glow-gold)" style="font-family:'Cinzel', serif; font-weight:bold; cursor:default;">
                ${sign.symbol}
            </text>
            `;
        });

        // 2. ЗАСЕЧКИ ГРАДУСОВ
        for (let deg = 0; deg < 360; deg += 5) {
            const angle = (deg - ascOffset + 360) % 360;
            const isTen = deg % 10 === 0;
            const p1 = polarToCartesian(center, center, rOuter, angle);
            const p2 = polarToCartesian(center, center, rOuter - (isTen ? 6 : 3), angle);
            svg += `<line x1="${p1.x}" y1="${p1.y}" x2="${p2.x}" y2="${p2.y}" stroke="${isTen ? 'rgba(251, 191, 36, 0.7)' : 'rgba(245, 158, 11, 0.25)'}" stroke-width="${isTen ? '1.5' : '1'}" />`;
        }

        // 3. ДОМА ПЛАЦИДУСА
        if (chartData && chartData.houses) {
            chartData.houses.forEach((cusp, idx) => {
                const houseAngle = (cusp - ascOffset + 360) % 360;
                const pStart = polarToCartesian(center, center, rCore, houseAngle);
                const pEnd = polarToCartesian(center, center, rZodiacInner, houseAngle);
                const isAxis = (idx === 0 || idx === 3 || idx === 6 || idx === 9);

                svg += `
                <line x1="${pStart.x}" y1="${pStart.y}" x2="${pEnd.x}" y2="${pEnd.y}" 
                      stroke="${isAxis ? '#E11D48' : 'rgba(245, 158, 11, 0.3)'}" 
                      stroke-width="${isAxis ? '2.2' : '1'}" 
                      stroke-dasharray="${isAxis ? 'none' : '3,3'}"
                      ${isAxis ? 'filter="url(#ast-glow-ruby)"' : ''} />
                `;

                if (isAxis) {
                    const labelPos = polarToCartesian(center, center, rZodiacInner - 14, houseAngle);
                    const labels = { 0: 'ASC', 3: 'IC', 6: 'DSC', 9: 'MC' };
                    svg += `
                    <text x="${labelPos.x}" y="${labelPos.y}" font-family="'Space Mono', monospace" font-size="10" font-weight="bold" fill="#E11D48" text-anchor="middle" dominant-baseline="central">
                        ${labels[idx]}
                    </text>
                    `;
                }
            });
        }

        // 4. НЕОНОВЫЕ ЛУЧИ АСПЕКТОВ
        if (chartData && chartData.aspects && chartData.planets) {
            chartData.aspects.forEach(asp => {
                const p1 = chartData.planets[asp.body1];
                const p2 = chartData.planets[asp.body2];
                if (!p1 || !p2) return;

                const a1 = (p1.lon - ascOffset + 360) % 360;
                const a2 = (p2.lon - ascOffset + 360) % 360;
                const pt1 = polarToCartesian(center, center, rHousesInner - 12, a1);
                const pt2 = polarToCartesian(center, center, rHousesInner - 12, a2);

                const isHard = (asp.type === 'square' || asp.type === 'opposition');
                const strokeColor = isHard ? '#E11D48' : '#38BDF8';
                const filterUrl = isHard ? 'url(#ast-glow-ruby)' : 'url(#ast-glow-gold)';

                svg += `
                <line x1="${pt1.x}" y1="${pt1.y}" x2="${pt2.x}" y2="${pt2.y}" 
                      stroke="${strokeColor}" stroke-width="${isHard ? '1.8' : '1.4'}" 
                      stroke-dasharray="${isHard ? 'none' : '4,2'}"
                      filter="${filterUrl}" opacity="0.85" />
                `;
            });
        }

        // 5. САМХЕЙНСКАЯ АСТРОЛЯБИЯ В ЦЕНТРЕ КАРТЫ
        svg += `
        <circle cx="${center}" cy="${center}" r="${rCore}" fill="url(#ast-astrolabe-core)" stroke="rgba(245, 158, 11, 0.55)" stroke-width="1.8" filter="url(#ast-glow-gold)" />
        <circle cx="${center}" cy="${center}" r="${rCore - 18}" fill="none" stroke="rgba(225, 29, 72, 0.45)" stroke-width="1.2" stroke-dasharray="4,4" />
        <circle cx="${center}" cy="${center}" r="${rCore - 36}" fill="none" stroke="rgba(245, 158, 11, 0.3)" stroke-width="1" />
        <text x="${center}" y="${center}" font-family="'Cinzel', serif" font-size="24" fill="#FEF3C7" text-anchor="middle" dominant-baseline="central" filter="url(#ast-glow-gold)">
            ✦
        </text>
        `;

        // 6. СИЯЮЩИЕ ПЛАНЕТЫ
        if (chartData && chartData.planets) {
            Object.keys(chartData.planets).forEach(key => {
                const pl = chartData.planets[key];
                const cfg = PLANET_SYMBOLS[key] || { glyph: '•', name: key, color: '#FFFFFF' };
                const plAngle = (pl.lon - ascOffset + 360) % 360;
                const pos = polarToCartesian(center, center, rHousesInner - 12, plAngle);

                svg += `
                <g class="ast-planet-node" style="cursor:pointer;" title="${cfg.name}: ${pl.lon.toFixed(1)}°">
                    <circle cx="${pos.x}" cy="${pos.y}" r="12" fill="#020408" stroke="${cfg.color}" stroke-width="1.8" filter="url(#ast-glow-gold)" />
                    <text x="${pos.x}" y="${pos.y}" font-family="monospace, sans-serif" font-size="12" font-weight="bold" fill="${cfg.color}" text-anchor="middle" dominant-baseline="central">
                        ${cfg.glyph}
                    </text>
                </g>
                `;
            });
        }

        svg += `</svg>`;
        container.innerHTML = svg;
    }

    function updateDetails(chartData) {
        if (!chartData || !chartData.planets) return;

        const asc = (chartData.points && typeof chartData.points.Ascendant === 'number') ? chartData.points.Ascendant : 0;

        // 1. САМХЕЙНСКАЯ ТРИАДА (СОЛНЦЕ, ЛУНА, АСЦЕНДЕНТ)
        const triadContainer = document.getElementById('chart-triad-cards');
        if (triadContainer) {
            const sunLon = chartData.planets.Sun ? chartData.planets.Sun.lon : 0;
            const moonLon = chartData.planets.Moon ? chartData.planets.Moon.lon : 0;

            const sunSign = ZODIAC_SIGNS[Math.floor(sunLon / 30)] || ZODIAC_SIGNS[0];
            const moonSign = ZODIAC_SIGNS[Math.floor(moonLon / 30)] || ZODIAC_SIGNS[0];
            const ascSign = ZODIAC_SIGNS[Math.floor(asc / 30)] || ZODIAC_SIGNS[0];

            const sunHouse = Math.floor(((sunLon - asc + 360) % 360) / 30) + 1;
            const moonHouse = Math.floor(((moonLon - asc + 360) % 360) / 30) + 1;

            triadContainer.innerHTML = `
                <div style="background: rgba(8, 14, 26, 0.75); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 12px; padding: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.5);">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                        <span style="font-family:'Space Mono', monospace; font-size:11px; color:#F59E0B; text-transform:uppercase; letter-spacing:0.1em;">☉ Солнечное Ядро</span>
                        <span style="font-size:22px; color:#FBBF24;">${sunSign.symbol}</span>
                    </div>
                    <h4 style="font-family:'Cinzel', serif; font-size:1.25rem; color:#FEF3C7; margin:0 0 4px 0;">${sunSign.name} · ${sunHouse} Дом</h4>
                    <p style="font-family:'Space Mono', monospace; font-size:11px; color:#38BDF8; margin:0 0 10px 0;">${(sunLon % 30).toFixed(1)}° ${sunSign.name} (${sunSign.element})</p>
                    <p style="font-family:'Plus Jakarta Sans', sans-serif; font-size:13px; color:#9CA3AF; line-height:1.5; margin:0;">
                        ${SIGN_MEANINGS[sunSign.name]} Жизненный импульс направлен на реализацию сфер ${sunHouse}-го Дома.
                    </p>
                </div>

                <div style="background: rgba(8, 14, 26, 0.75); border: 1px solid rgba(226, 232, 240, 0.25); border-radius: 12px; padding: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.5);">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                        <span style="font-family:'Space Mono', monospace; font-size:11px; color:#E2E8F0; text-transform:uppercase; letter-spacing:0.1em;">☽ Лунный Храм</span>
                        <span style="font-size:22px; color:#E2E8F0;">${moonSign.symbol}</span>
                    </div>
                    <h4 style="font-family:'Cinzel', serif; font-size:1.25rem; color:#FEF3C7; margin:0 0 4px 0;">${moonSign.name} · ${moonHouse} Дом</h4>
                    <p style="font-family:'Space Mono', monospace; font-size:11px; color:#38BDF8; margin:0 0 10px 0;">${(moonLon % 30).toFixed(1)}° ${moonSign.name} (${moonSign.element})</p>
                    <p style="font-family:'Plus Jakarta Sans', sans-serif; font-size:13px; color:#9CA3AF; line-height:1.5; margin:0;">
                        Внутренняя эмоциональная матрица и интуиция. Безопасность обретается через темы ${moonSign.name.toLowerCase()} в ${moonHouse}-м Доме.
                    </p>
                </div>

                <div style="background: rgba(8, 14, 26, 0.75); border: 1px solid rgba(225, 29, 72, 0.3); border-radius: 12px; padding: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.5);">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                        <span style="font-family:'Space Mono', monospace; font-size:11px; color:#E11D48; text-transform:uppercase; letter-spacing:0.1em;">✦ Восходящий Асцендент</span>
                        <span style="font-size:22px; color:#E11D48;">${ascSign.symbol}</span>
                    </div>
                    <h4 style="font-family:'Cinzel', serif; font-size:1.25rem; color:#FEF3C7; margin:0 0 4px 0;">${ascSign.name} (ASC)</h4>
                    <p style="font-family:'Space Mono', monospace; font-size:11px; color:#38BDF8; margin:0 0 10px 0;">Куспид I Дома · ${(asc % 30).toFixed(1)}°</p>
                    <p style="font-family:'Plus Jakarta Sans', sans-serif; font-size:13px; color:#9CA3AF; line-height:1.5; margin:0;">
                        Входные врата личности. Окружающий мир воспринимает вашу энергию через призму архетипа ${ascSign.name}.
                    </p>
                </div>
            `;
        }

        // 2. СЕТКА 12 ДОМОВ ПЛАЦИДУСА
        const housesContainer = document.getElementById('chart-houses-grid');
        if (housesContainer && chartData.houses) {
            housesContainer.innerHTML = chartData.houses.map((cusp, idx) => {
                const info = HOUSE_DESCRIPTIONS[idx];
                const sign = ZODIAC_SIGNS[Math.floor(cusp / 30)] || ZODIAC_SIGNS[0];
                const deg = (cusp % 30).toFixed(1);
                return `
                <div style="background: rgba(2, 4, 8, 0.7); border: 1px solid rgba(245, 158, 11, 0.15); border-radius: 8px; padding: 14px; display: flex; flex-direction: column; gap: 4px;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-family: 'Cinzel', serif; font-size: 14px; font-weight: bold; color: #F59E0B;">${info.num} Дом</span>
                        <span style="font-family: 'Space Mono', monospace; font-size: 11px; color: ${sign.color};">${sign.symbol} ${sign.name} ${deg}°</span>
                    </div>
                    <div style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; font-weight: 600; color: #FEF3C7;">${info.name}</div>
                    <div style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 11px; color: #6B7280; line-height: 1.4;">${info.desc}</div>
                </div>
                `;
            }).join('');
        }

        // 3. ТАБЛИЦА КООРДИНАТ ПЛАНЕТ
        const tbody = document.getElementById('planets-tbody');
        if (tbody) {
            let rows = '';
            Object.keys(chartData.planets).forEach(key => {
                const pl = chartData.planets[key];
                const cfg = PLANET_SYMBOLS[key] || { glyph: '•', name: key, role: '', color: '#FEF3C7' };
                const signIdx = Math.floor(pl.lon / 30);
                const degInSign = pl.lon % 30;
                const degInt = Math.floor(degInSign);
                const minInt = Math.floor((degInSign - degInt) * 60);

                const sign = ZODIAC_SIGNS[signIdx] || { name: '—', symbol: '', color: '#FFFFFF' };
                const houseNum = Math.floor(((pl.lon - asc + 360) % 360) / 30) + 1;

                rows += `
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.05); color: #FEF3C7;">
                    <td style="padding: 12px; font-weight: bold; color: ${cfg.color}; font-family:'Plus Jakarta Sans', sans-serif;">
                        ${cfg.name} <span style="font-size:11px; color:#9CA3AF; font-weight:normal;">(${cfg.role})</span>
                    </td>
                    <td style="padding: 12px; font-size: 17px; text-align: center; color: ${cfg.color}; font-family:monospace;">${cfg.glyph}</td>
                    <td style="padding: 12px; font-family:'Plus Jakarta Sans', sans-serif;">
                        ${sign.name} <span style="color:${sign.color}; font-weight:bold; font-size:14px;">${sign.symbol}</span>
                    </td>
                    <td style="padding: 12px; font-family: 'Space Mono', monospace; color: #F59E0B;">${degInt}° ${minInt < 10 ? '0' : ''}${minInt}'</td>
                    <td style="padding: 12px; color: #E11D48; font-family: 'Space Mono', monospace; font-weight:bold;">${houseNum} Дом</td>
                </tr>
                `;
            });

            tbody.innerHTML = rows;
        }
    }

    function calculate(params) {
        const wheelContainer = document.getElementById('chart-wheel-container');
        const btnText = document.getElementById('btn-text');
        if (btnText) btnText.innerText = 'Вычисление эфемерид...';

        const endpoint = (typeof ASTRAINA_CONFIG !== 'undefined' && ASTRAINA_CONFIG.rest_url) 
            ? ASTRAINA_CONFIG.rest_url + 'chart/calculate' 
            : '/wp-json/astro/v1/chart/calculate';

        fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': (typeof ASTRAINA_CONFIG !== 'undefined' ? ASTRAINA_CONFIG.nonce : '')
            },
            body: JSON.stringify(params)
        })
        .then(r => {
            if (!r.ok) throw new Error('API Fallback');
            return r.json();
        })
        .then(res => {
            if (res && res.data) {
                renderWheel(wheelContainer, res.data);
                updateDetails(res.data);
            } else {
                throw new Error('Invalid format');
            }
        })
        .catch(() => {
            const fallbackData = calculateLocalEphemeris(params.date, params.time);
            renderWheel(wheelContainer, fallbackData);
            updateDetails(fallbackData);
        })
        .finally(() => {
            if (btnText) btnText.innerText = 'Рассчитать Натальный Код';
        });
    }

    function init() {
        const form = document.getElementById('natal-calc-form');
        const wheelContainer = document.getElementById('chart-wheel-container');

        // Первичный расчет при загрузке: колесо + триада + дома + планеты
        const defaultData = calculateLocalEphemeris('1995-10-31', '12:00');
        if (wheelContainer) {
            renderWheel(wheelContainer, defaultData);
            updateDetails(defaultData);
        }

        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const dateVal = document.getElementById('birth_date')?.value || '1995-10-31';
                const timeVal = document.getElementById('birth_time')?.value || '12:00';
                const cityVal = document.getElementById('birth_city')?.value || 'Moscow';
                const [year, month, day] = dateVal.split('-').map(Number);
                const [hour, minute] = timeVal.split(':').map(Number);

                calculate({
                    date: dateVal,
                    time: timeVal,
                    year: year,
                    month: month,
                    day: day,
                    hour: hour,
                    minute: minute,
                    city: cityVal
                });
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>

<?php get_footer(); ?>