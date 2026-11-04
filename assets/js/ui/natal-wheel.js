/**
 * ASTRAINA MASTER THEME — NATAL WHEEL PRO
 * Неоновая сакральная астролябия, расчет аспектов и векторная визуализация.
 *
 * @package AstrainaTheme
 */

window.AstrainaNatalWheel = (function() {
    'use strict';

    const ZODIAC_SIGNS = [
        { name: 'Овен', symbol: '♈', start: 0, color: '#F59E0B' },
        { name: 'Телец', symbol: '♉', start: 30, color: '#10B981' },
        { name: 'Близнецы', symbol: '♊', start: 60, color: '#38BDF8' },
        { name: 'Рак', symbol: '♋', start: 90, color: '#818CF8' },
        { name: 'Лев', symbol: '♌', start: 120, color: '#FBBF24' },
        { name: 'Дева', symbol: '♍', start: 150, color: '#34D399' },
        { name: 'Весы', symbol: '♎', start: 180, color: '#38BDF8' },
        { name: 'Скорпион', symbol: '♏', start: 210, color: '#E11D48' },
        { name: 'Стрелец', symbol: '♐', start: 240, color: '#F59E0B' },
        { name: 'Козерог', symbol: '♑', start: 270, color: '#059669' },
        { name: 'Водолей', symbol: '♒', start: 300, color: '#0EA5E9' },
        { name: 'Рыбы', symbol: '♓', start: 330, color: '#A855F7' }
    ];

    const PLANET_SYMBOLS = {
        'Sun': { glyph: '☉', name: 'Солнце', color: '#FBBF24' },
        'Moon': { glyph: '☽', name: 'Луна', color: '#E2E8F0' },
        'Mercury': { glyph: '☿', name: 'Меркурий', color: '#38BDF8' },
        'Venus': { glyph: '♀', name: 'Венера', color: '#F472B6' },
        'Mars': { glyph: '♂', name: 'Марс', color: '#E11D48' },
        'Jupiter': { glyph: '♃', name: 'Юпитер', color: '#F59E0B' },
        'Saturn': { glyph: '♄', name: 'Сатурн', color: '#D97706' },
        'Uranus': { glyph: '♅', name: 'Уран', color: '#06B6D4' },
        'Neptune': { glyph: '♆', name: 'Нептун', color: '#6366F1' },
        'Pluto': { glyph: '♇', name: 'Плутон', color: '#9333EA' },
        'NorthNode': { glyph: '☊', name: 'Северный Узел', color: '#10B981' },
        'Lilith': { glyph: '⚸', name: 'Чёрная Луна', color: '#FDA4AF' }
    };

    function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
        const angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;
        return {
            x: centerX + (radius * Math.cos(angleInRadians)),
            y: centerY + (radius * Math.sin(angleInRadians))
        };
    }

    function renderWheel(container, chartData) {
        if (!container) return;

        const size = 680;
        const center = size / 2;
        const rOuter = 300;
        const rZodiacInner = 255;
        const rHousesInner = 195;
        const rCore = 75;

        const ascOffset = (chartData && chartData.points && chartData.points.Ascendant) ? chartData.points.Ascendant : 0;

        let svg = `
        <svg viewBox="0 0 ${size} ${size}" width="100%" height="100%" class="ast-natal-svg" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <radialGradient id="ast-astrolabe-core" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="#E11D48" stop-opacity="0.4" />
                    <stop offset="60%" stop-color="#F59E0B" stop-opacity="0.18" />
                    <stop offset="100%" stop-color="#020408" stop-opacity="0.95" />
                </radialGradient>
            </defs>

            <!-- ВНЕШНИЙ ОБОД И ШКАЛА ГРАДУСОВ -->
            <circle cx="${center}" cy="${center}" r="${rOuter + 6}" fill="#020408" stroke="rgba(245, 158, 11, 0.35)" stroke-width="1.5" />
            <circle cx="${center}" cy="${center}" r="${rOuter}" fill="rgba(8, 14, 26, 0.85)" stroke="rgba(245, 158, 11, 0.7)" stroke-width="2" filter="url(#ast-glow-gold)" />
            <circle cx="${center}" cy="${center}" r="${rZodiacInner}" fill="none" stroke="rgba(245, 158, 11, 0.3)" stroke-width="1" />
            <circle cx="${center}" cy="${center}" r="${rHousesInner}" fill="rgba(2, 4, 8, 0.65)" stroke="rgba(245, 158, 11, 0.2)" stroke-width="1" />
        `;

        // 1. СЕКТОРА 12 ЗНАКОВ ЗОДИАКА С НЕОНОВОЙ ПОДСВЕТКОЙ
        ZODIAC_SIGNS.forEach(sign => {
            const startAngle = (sign.start - ascOffset + 360) % 360;
            const midAngle = (startAngle + 15) % 360;
            const posSymbol = polarToCartesian(center, center, (rOuter + rZodiacInner) / 2, midAngle);
            const rayStart = polarToCartesian(center, center, rZodiacInner, startAngle);
            const rayEnd = polarToCartesian(center, center, rOuter, startAngle);

            svg += `
            <line x1="${rayStart.x}" y1="${rayStart.y}" x2="${rayEnd.x}" y2="${rayEnd.y}" stroke="rgba(245, 158, 11, 0.3)" stroke-width="1" />
            <text x="${posSymbol.x}" y="${posSymbol.y}" font-size="19" fill="${sign.color}" text-anchor="middle" dominant-baseline="central" filter="url(#ast-glow-gold)" style="cursor:pointer; font-family:sans-serif;">
                ${sign.symbol}
            </text>
            `;
        });

        // 2. ЗАСЕЧКИ КАЖДЫЕ 5 ГРАДУСОВ
        for (let deg = 0; deg < 360; deg += 5) {
            const angle = (deg - ascOffset + 360) % 360;
            const isTen = deg % 10 === 0;
            const p1 = polarToCartesian(center, center, rOuter, angle);
            const p2 = polarToCartesian(center, center, rOuter - (isTen ? 6 : 3), angle);
            svg += `<line x1="${p1.x}" y1="${p1.y}" x2="${p2.x}" y2="${p2.y}" stroke="${isTen ? 'rgba(251, 191, 36, 0.6)' : 'rgba(245, 158, 11, 0.25)'}" stroke-width="1" />`;
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
                      stroke="${isAxis ? '#E11D48' : 'rgba(245, 158, 11, 0.22)'}" 
                      stroke-width="${isAxis ? '2' : '1'}" 
                      stroke-dasharray="${isAxis ? 'none' : '3,3'}"
                      ${isAxis ? 'filter="url(#ast-glow-ruby)"' : ''} />
                `;
            });
        }

        // 4. НЕОНОВЫЕ ЛУЧИ АСПЕКТОВ (ТРИНЫ = ЗОЛОТО, КВАДРАТЫ = РУБИН)
        if (chartData && chartData.aspects && chartData.planets) {
            chartData.aspects.forEach(asp => {
                const p1 = chartData.planets[asp.body1];
                const p2 = chartData.planets[asp.body2];
                if (!p1 || !p2) return;

                const a1 = (p1.lon - ascOffset + 360) % 360;
                const a2 = (p2.lon - ascOffset + 360) % 360;
                const pt1 = polarToCartesian(center, center, rHousesInner - 10, a1);
                const pt2 = polarToCartesian(center, center, rHousesInner - 10, a2);

                const isHard = (asp.type === 'square' || asp.type === 'opposition');
                const strokeColor = isHard ? '#E11D48' : '#FBBF24';
                const filterUrl = isHard ? 'url(#ast-glow-ruby)' : 'url(#ast-glow-gold)';

                svg += `
                <line x1="${pt1.x}" y1="${pt1.y}" x2="${pt2.x}" y2="${pt2.y}" 
                      stroke="${strokeColor}" stroke-width="${isHard ? '1.8' : '1.4'}" 
                      filter="${filterUrl}" opacity="0.85" />
                `;
            });
        }

        // 5. САМХЕЙНСКАЯ АСТРОЛЯБИЯ В ЦЕНТРЕ КАРТЫ
        svg += `
        <circle cx="${center}" cy="${center}" r="${rCore}" fill="url(#ast-astrolabe-core)" stroke="rgba(245, 158, 11, 0.45)" stroke-width="1.5" />
        <circle cx="${center}" cy="${center}" r="${rCore - 18}" fill="none" stroke="rgba(225, 29, 72, 0.35)" stroke-width="1" stroke-dasharray="4,4" />
        <circle cx="${center}" cy="${center}" r="${rCore - 36}" fill="none" stroke="rgba(245, 158, 11, 0.3)" stroke-width="1" />
        <text x="${center}" y="${center}" font-family="Cinzel, serif" font-size="22" fill="#FFFFFF" text-anchor="middle" dominant-baseline="central" filter="url(#ast-glow-gold)">
            ✦
        </text>
        `;

        // 6. СИЯЮЩИЕ ПЛАНЕТЫ
        if (chartData && chartData.planets) {
            Object.keys(chartData.planets).forEach(key => {
                const pl = chartData.planets[key];
                const cfg = PLANET_SYMBOLS[key] || { glyph: '•', name: key, color: '#FFFFFF' };
                const plAngle = (pl.lon - ascOffset + 360) % 360;
                const pos = polarToCartesian(center, center, rHousesInner - 10, plAngle);

                svg += `
                <g class="ast-planet-node" style="cursor:pointer;" title="${cfg.name}: ${pl.degree ? pl.degree.toFixed(1) : ''}°">
                    <circle cx="${pos.x}" cy="${pos.y}" r="13" fill="#020408" stroke="${cfg.color}" stroke-width="1.8" filter="url(#ast-glow-gold)" />
                    <text x="${pos.x}" y="${pos.y}" font-family="sans-serif" font-size="12" font-weight="bold" fill="${cfg.color}" text-anchor="middle" dominant-baseline="central">
                        ${cfg.glyph}
                    </text>
                </g>
                `;
            });
        }

        svg += `</svg>`;
        container.innerHTML = svg;
    }

    // Автоматическая инициализация формы натала при загрузке страницы
    function init() {
        const form = document.getElementById('ast-chart-form') || document.querySelector('form[data-astro="chart"]');
        const wheelContainer = document.getElementById('ast-natal-wheel') || document.getElementById('natal-wheel-canvas') || document.querySelector('.ast-chart-wheel-container');

        // Демо-данные для первичной отрисовки, чтобы карта никогда не была пустой
        const initialData = {
            points: { Ascendant: 148.5 },
            houses: [148.5, 175.2, 204.1, 237.4, 271.8, 305.2, 328.5, 355.2, 24.1, 57.4, 91.8, 125.2],
            planets: {
                Sun: { lon: 226.4, degree: 16.4 },
                Moon: { lon: 218.1, degree: 8.1 },
                Mercury: { lon: 242.3, degree: 2.3 },
                Venus: { lon: 201.8, degree: 21.8 },
                Mars: { lon: 359.8, degree: 29.8 },
                Jupiter: { lon: 58.4, degree: 28.4 },
                Saturn: { lon: 268.2, degree: 28.2 },
                Uranus: { lon: 269.1, degree: 29.1 },
                Neptune: { lon: 278.4, degree: 8.4 },
                Pluto: { lon: 222.1, degree: 12.1 },
                NorthNode: { lon: 342.1, degree: 12.1 },
                Lilith: { lon: 142.5, degree: 22.5 }
            },
            aspects: [
                { body1: 'Sun', body2: 'Moon', type: 'conjunction' },
                { body1: 'Sun', body2: 'Mars', type: 'trine' },
                { body1: 'Venus', body2: 'Jupiter', type: 'opposition' },
                { body1: 'Mars', body2: 'Saturn', type: 'square' },
                { body1: 'Mercury', body2: 'Neptune', type: 'sextile' }
            ]
        };

        if (wheelContainer) {
            renderWheel(wheelContainer, initialData);
        }

        if (form && wheelContainer) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const btn = form.querySelector('button[type="submit"]');
                if (btn) btn.classList.add('loading');

                const formData = new FormData(form);
                const payload = {
                    year: parseInt(formData.get('year') || 1990, 10),
                    month: parseInt(formData.get('month') || 1, 10),
                    day: parseInt(formData.get('day') || 1, 10),
                    hour: parseInt(formData.get('hour') || 12, 10),
                    minute: parseInt(formData.get('minute') || 0, 10),
                    city: formData.get('city') || 'Moscow'
                };

                const endpoint = (typeof ASTRAINA_CONFIG !== 'undefined' && ASTRAINA_CONFIG.rest_url) 
                    ? ASTRAINA_CONFIG.rest_url + 'chart/calculate' 
                    : '/wp-json/astro/v1/chart/calculate';

                fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-WP-Nonce': (typeof ASTRAINA_CONFIG !== 'undefined' ? ASTRAINA_CONFIG.nonce : '')
                    },
                    body: JSON.stringify(payload)
                })
                .then(r => r.json())
                .then(res => {
                    if (btn) btn.classList.remove('loading');
                    if (res && res.data) {
                        renderWheel(wheelContainer, res.data);
                    }
                })
                .catch(() => {
                    if (btn) btn.classList.remove('loading');
                });
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    return {
        render: renderWheel,
        refresh: init
    };
})();