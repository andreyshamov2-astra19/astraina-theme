/**
 * ASTRAINA MASTER THEME — WHEEL RENDERER (LUXURY GRADE)
 * Векторный рендерер натального колеса с неоновым свечением и сакральной астролябией.
 * 
 * @package AstrainaTheme
 */

window.AstrainaWheel = (function() {
    'use strict';

    const ZODIAC_SIGNS = [
        { name: 'Овен', symbol: '♈', start: 0, element: 'fire', color: '#F59E0B' },
        { name: 'Телец', symbol: '♉', start: 30, element: 'earth', color: '#10B981' },
        { name: 'Близнецы', symbol: '♊', start: 60, element: 'air', color: '#38BDF8' },
        { name: 'Рак', symbol: '♋', start: 90, element: 'water', color: '#818CF8' },
        { name: 'Лев', symbol: '♌', start: 120, element: 'fire', color: '#FBBF24' },
        { name: 'Дева', symbol: '♍', start: 150, element: 'earth', color: '#34D399' },
        { name: 'Весы', symbol: '♎', start: 180, element: 'air', color: '#38BDF8' },
        { name: 'Скорпион', symbol: '♏', start: 210, element: 'water', color: '#E11D48' },
        { name: 'Стрелец', symbol: '♐', start: 240, element: 'fire', color: '#F59E0B' },
        { name: 'Козерог', symbol: '♑', start: 270, element: 'earth', color: '#059669' },
        { name: 'Водолей', symbol: '♒', start: 300, element: 'air', color: '#0EA5E9' },
        { name: 'Рыбы', symbol: '♓', start: 330, element: 'water', color: '#A855F7' }
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

    function describeArc(x, y, radius, startAngle, endAngle) {
        const start = polarToCartesian(x, y, radius, endAngle);
        const end = polarToCartesian(x, y, radius, startAngle);
        const largeArcFlag = endAngle - startAngle <= 180 ? '0' : '1';
        return ['M', start.x, start.y, 'A', radius, radius, 0, largeArcFlag, 0, end.x, end.y].join(' ');
    }

    return {
        render: function(containerId, chartData) {
            const container = document.getElementById(containerId);
            if (!container) return;

            const size = 700;
            const center = size / 2;
            const rOuter = 310;
            const rZodiacInner = 265;
            const rHousesInner = 205;
            const rCore = 80;

            const ascOffset = (chartData && chartData.points && chartData.points.Ascendant) ? chartData.points.Ascendant : 0;

            let svg = `
            <svg viewBox="0 0 ${size} ${size}" width="100%" height="100%" class="ast-natal-svg" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <!-- НЕОНОВЫЕ ФИЛЬТРЫ СВЕЧЕНИЯ -->
                    <filter id="ast-glow-gold" x="-50%" y="-50%" width="200%" height="200%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="4" result="blur" />
                        <feMerge>
                            <feMergeNode in="blur" />
                            <feMergeNode in="SourceGraphic" />
                        </feMerge>
                    </filter>
                    
                    <filter id="ast-glow-ruby" x="-50%" y="-50%" width="200%" height="200%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />
                        <feMerge>
                            <feMergeNode in="blur" />
                            <feMergeNode in="SourceGraphic" />
                        </feMerge>
                    </filter>

                    <radialGradient id="ast-core-grad" cx="50%" cy="50%" r="50%">
                        <stop offset="0%" stop-color="#E11D48" stop-opacity="0.35" />
                        <stop offset="50%" stop-color="#F59E0B" stop-opacity="0.15" />
                        <stop offset="100%" stop-color="#020408" stop-opacity="0.9" />
                    </radialGradient>
                </defs>

                <!-- ВНЕШНИЙ ЗАЩИТНЫЙ ОБОД И ГРАДУСНАЯ ШКАЛА -->
                <circle cx="${center}" cy="${center}" r="${rOuter + 8}" fill="#020408" stroke="rgba(245, 158, 11, 0.3)" stroke-width="1.5" />
                <circle cx="${center}" cy="${center}" r="${rOuter}" fill="rgba(8, 14, 26, 0.7)" stroke="rgba(245, 158, 11, 0.6)" stroke-width="2" filter="url(#ast-glow-gold)" />
                <circle cx="${center}" cy="${center}" r="${rZodiacInner}" fill="none" stroke="rgba(245, 158, 11, 0.25)" stroke-width="1" />
                <circle cx="${center}" cy="${center}" r="${rHousesInner}" fill="rgba(2, 4, 8, 0.6)" stroke="rgba(245, 158, 11, 0.18)" stroke-width="1" />
            `;

            // 1. СЕКТОРА 12 ЗНАКОВ ЗОДИАКА С ЦВЕТНЫМ СИЯНИЕМ
            ZODIAC_SIGNS.forEach((sign, i) => {
                const startAngle = (sign.start - ascOffset + 360) % 360;
                const endAngle = (startAngle + 30) % 360;
                const midAngle = (startAngle + 15) % 360;
                
                const posSymbol = polarToCartesian(center, center, (rOuter + rZodiacInner) / 2, midAngle);
                const rayStart = polarToCartesian(center, center, rZodiacInner, startAngle);
                const rayEnd = polarToCartesian(center, center, rOuter, startAngle);

                svg += `
                <!-- Луч разделитель -->
                <line x1="${rayStart.x}" y1="${rayStart.y}" x2="${rayEnd.x}" y2="${rayEnd.y}" stroke="rgba(245, 158, 11, 0.35)" stroke-width="1" />
                
                <!-- Символ знака с мягким свечением -->
                <text x="${posSymbol.x}" y="${posSymbol.y}" font-family="sans-serif" font-size="19" fill="${sign.color}" text-anchor="middle" dominant-baseline="central" filter="url(#ast-glow-gold)" style="cursor:pointer;">
                    ${sign.symbol}
                </text>
                `;
            });

            // 2. ГРАДУСНЫЕ МИКРО-ЗАСЕЧКИ (360°)
            for (let deg = 0; deg < 360; deg += 5) {
                const angle = (deg - ascOffset + 360) % 360;
                const isTen = deg % 10 === 0;
                const len = isTen ? 6 : 3;
                const p1 = polarToCartesian(center, center, rOuter, angle);
                const p2 = polarToCartesian(center, center, rOuter - len, angle);
                svg += `<line x1="${p1.x}" y1="${p1.y}" x2="${p2.x}" y2="${p2.y}" stroke="${isTen ? 'rgba(251, 191, 36, 0.6)' : 'rgba(245, 158, 11, 0.25)'}" stroke-width="1" />`;
            }

            // 3. ДОМА ГОРОСКОПА (ПЛАЦИДУС)
            if (chartData && chartData.houses) {
                chartData.houses.forEach((cusp, idx) => {
                    const houseAngle = (cusp - ascOffset + 360) % 360;
                    const pStart = polarToCartesian(center, center, rCore, houseAngle);
                    const pEnd = polarToCartesian(center, center, rZodiacInner, houseAngle);
                    const isMainAxis = (idx === 0 || idx === 3 || idx === 6 || idx === 9); // ASC, IC, DSC, MC

                    svg += `
                    <line x1="${pStart.x}" y1="${pStart.y}" x2="${pEnd.x}" y2="${pEnd.y}" 
                          stroke="${isMainAxis ? '#E11D48' : 'rgba(245, 158, 11, 0.25)'}" 
                          stroke-width="${isMainAxis ? '2' : '1'}" 
                          stroke-dasharray="${isMainAxis ? 'none' : '3,3'}"
                          ${isMainAxis ? 'filter="url(#ast-glow-ruby)"' : ''} />
                    `;
                });
            }

            // 4. НЕОНОВЫЕ ЛУЧИ АСПЕКТОВ (ЗОЛОТО = ТРИНЫ/СЕКСТИЛИ, РУБИН = КВАДРАТЫ/ОППОЗИЦИИ)
            if (chartData && chartData.aspects && chartData.planets) {
                chartData.aspects.forEach(asp => {
                    const p1Data = chartData.planets[asp.body1];
                    const p2Data = chartData.planets[asp.body2];
                    if (!p1Data || !p2Data) return;

                    const a1 = (p1Data.lon - ascOffset + 360) % 360;
                    const a2 = (p2Data.lon - ascOffset + 360) % 360;
                    const pt1 = polarToCartesian(center, center, rHousesInner - 12, a1);
                    const pt2 = polarToCartesian(center, center, rHousesInner - 12, a2);

                    let color = 'rgba(251, 191, 36, 0.6)';
                    let filter = 'url(#ast-glow-gold)';

                    if (asp.type === 'square' || asp.type === 'opposition') {
                        color = 'rgba(225, 29, 72, 0.8)';
                        filter = 'url(#ast-glow-ruby)';
                    } else if (asp.type === 'trine' || asp.type === 'sextile') {
                        color = 'rgba(251, 191, 36, 0.85)';
                        filter = 'url(#ast-glow-gold)';
                    }

                    svg += `
                    <line x1="${pt1.x}" y1="${pt1.y}" x2="${pt2.x}" y2="${pt2.y}" 
                          stroke="${color}" stroke-width="1.3" filter="${filter}" class="ast-aspect-line" />
                    `;
                });
            }

            // 5. САМХЕЙНСКАЯ АСТРОЛЯБИЯ В СЕРДЦЕ КАРТЫ
            svg += `
            <circle cx="${center}" cy="${center}" r="${rCore}" fill="url(#ast-core-grad)" stroke="rgba(245, 158, 11, 0.4)" stroke-width="1.5" />
            <circle cx="${center}" cy="${center}" r="${rCore - 20}" fill="none" stroke="rgba(225, 29, 72, 0.4)" stroke-width="1" stroke-dasharray="4,4" />
            <circle cx="${center}" cy="${center}" r="${rCore - 40}" fill="none" stroke="rgba(245, 158, 11, 0.3)" stroke-width="1" />
            <text x="${center}" y="${center}" font-family="Cinzel, serif" font-size="24" fill="#FFFFFF" text-anchor="middle" dominant-baseline="central" filter="url(#ast-glow-gold)">
                ✦
            </text>
            `;

            // 6. СИЯЮЩИЕ ПЛАНЕТЫ С ГЛИФАМИ И ПОДСКАЗКАМИ
            if (chartData && chartData.planets) {
                Object.keys(chartData.planets).forEach(key => {
                    const pl = chartData.planets[key];
                    const cfg = PLANET_SYMBOLS[key] || { glyph: '•', name: key, color: '#FFFFFF' };
                    const plAngle = (pl.lon - ascOffset + 360) % 360;
                    const pos = polarToCartesian(center, center, rHousesInner - 12, plAngle);

                    svg += `
                    <g class="ast-planet-node" style="cursor:pointer;" data-planet="${cfg.name}" data-degree="${pl.degree.toFixed(2)}°">
                        <circle cx="${pos.x}" cy="${pos.y}" r="14" fill="#020408" stroke="${cfg.color}" stroke-width="1.8" filter="url(#ast-glow-gold)" />
                        <text x="${pos.x}" y="${pos.y}" font-family="sans-serif" font-size="13" font-weight="bold" fill="${cfg.color}" text-anchor="middle" dominant-baseline="central">
                            ${cfg.glyph}
                        </text>
                    </g>
                    `;
                });
            }

            svg += `</svg>`;
            container.innerHTML = svg;
        }
    };
})();