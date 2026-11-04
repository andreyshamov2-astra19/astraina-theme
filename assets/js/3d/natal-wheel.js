/**
 * ASTRAINA.COM — LUXURY NATAL WHEEL SVG RENDERER (Awwwards Grade)
 * Dynamic anti-collision planet layout, sacred aspects with neon pulse.
 */
class AstraNatalWheel {
    constructor(containerId, options = {}) {
        this.container = document.getElementById(containerId);
        if (!this.container) return;
        this.options = Object.assign({
            size: 800,
            theme: 'obsidian-gold',
            showAspects: true,
            interactive: true
        }, options);
        this.data = null;
        this.svg = null;
    }

    render(chartData) {
        this.data = chartData;
        this.container.innerHTML = '';

        const size = this.options.size;
        const center = size / 2;
        const radius = size * 0.46;
        const innerRadius = radius * 0.76;
        const centerHubRadius = radius * 0.38;

        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.setAttribute('viewBox', `0 0 ${size} ${size}`);
        svg.setAttribute('class', 'ast-natal-svg');
        svg.style.width = '100%';
        svg.style.height = '100%';
        svg.style.filter = 'drop-shadow(0 0 45px rgba(245, 158, 11, 0.12))';

        // Defs: Filters & Gradients
        svg.innerHTML = `
            <defs>
                <radialGradient id="astWheelBg" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="#020408" stop-opacity="0.95"/>
                    <stop offset="70%" stop-color="#080E1A" stop-opacity="0.88"/>
                    <stop offset="100%" stop-color="#020408" stop-opacity="0.98"/>
                </radialGradient>
                <filter id="astGoldGlow" x="-30%" y="-30%" width="160%" height="160%">
                    <feGaussianBlur stdDeviation="3.5" result="blur" />
                    <feMerge>
                        <feMergeNode in="blur"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>
                <filter id="astRubyPulse" x="-30%" y="-30%" width="160%" height="160%">
                    <feGaussianBlur stdDeviation="4.5" result="blur" />
                    <feMerge>
                        <feMergeNode in="blur"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>
            </defs>
            <circle cx="${center}" cy="${center}" r="${radius}" fill="url(#astWheelBg)" stroke="#F59E0B" stroke-width="1.2" stroke-opacity="0.35"/>
        `;

        const asc = chartData.houses ? chartData.houses[1] : 0.0;
        const rotOffset = asc; // Rotate wheel so ASC is at 180 deg (East on traditional chart) or 9 o'clock

        // 1. Draw 12 Zodiac Sectors
        const zodiacG = document.createElementNS('http://www.w3.org/2000/svg', 'g');
        zodiacG.setAttribute('class', 'ast-zodiac-ring');

        const signs = [
            { name: 'Овен', symbol: '♈', color: '#EF4444' },
            { name: 'Телец', symbol: '♉', color: '#10B981' },
            { name: 'Близнецы', symbol: '♊', color: '#FBBF24' },
            { name: 'Рак', symbol: '♋', color: '#38BDF8' },
            { name: 'Лев', symbol: '♌', color: '#F59E0B' },
            { name: 'Дева', symbol: '♍', color: '#10B981' },
            { name: 'Весы', symbol: '♎', color: '#38BDF8' },
            { name: 'Скорпион', symbol: '♏', color: '#E11D48' },
            { name: 'Стрелец', symbol: '♐', color: '#FBBF24' },
            { name: 'Козерог', symbol: '♑', color: '#64748B' },
            { name: 'Водолей', symbol: '♒', color: '#38BDF8' },
            { name: 'Рыбы', symbol: '♓', color: '#818CF8' }
        ];

        for (let i = 0; i < 12; i++) {
            const startAngle = i * 30;
            const endAngle = startAngle + 30;
            
            // Map degrees to screen coordinates with ASC at 180° (9 o'clock)
            const a1 = (180 - (startAngle - rotOffset)) * Math.PI / 180;
            const a2 = (180 - (endAngle - rotOffset)) * Math.PI / 180;

            const x1Out = center + radius * Math.cos(a1);
            const y1Out = center + radius * Math.sin(a1);
            const x2Out = center + radius * Math.cos(a2);
            const y2Out = center + radius * Math.sin(a2);

            const x1In = center + innerRadius * Math.cos(a1);
            const y1In = center + innerRadius * Math.sin(a1);
            const x2In = center + innerRadius * Math.cos(a2);
            const y2In = center + innerRadius * Math.sin(a2);

            const pathD = `M ${x1In} ${y1In} L ${x1Out} ${y1Out} A ${radius} ${radius} 0 0 0 ${x2Out} ${y2Out} L ${x2In} ${y2In} A ${innerRadius} ${innerRadius} 0 0 1 ${x1In} ${y1In} Z`;

            const sector = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            sector.setAttribute('d', pathD);
            sector.setAttribute('fill', i % 2 === 0 ? 'rgba(245, 158, 11, 0.03)' : 'rgba(8, 14, 26, 0.6)');
            sector.setAttribute('stroke', 'rgba(245, 158, 11, 0.2)');
            sector.setAttribute('stroke-width', '0.75');
            zodiacG.appendChild(sector);

            // Zodiac Symbol
            const midA = (180 - (startAngle + 15 - rotOffset)) * Math.PI / 180;
            const symR = (radius + innerRadius) / 2;
            const symX = center + symR * Math.cos(midA);
            const symY = center + symR * Math.sin(midA) + 5;

            const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            text.setAttribute('x', symX);
            text.setAttribute('y', symY);
            text.setAttribute('text-anchor', 'middle');
            text.setAttribute('fill', signs[i].color);
            text.setAttribute('font-size', '17');
            text.setAttribute('font-family', 'Cinzel, serif');
            text.setAttribute('opacity', '0.85');
            text.textContent = signs[i].symbol;
            zodiacG.appendChild(text);
        }
        svg.appendChild(zodiacG);

        // 2. House Cusps & Lines
        const housesG = document.createElementNS('http://www.w3.org/2000/svg', 'g');
        housesG.setAttribute('class', 'ast-houses-ring');

        if (chartData.houses) {
            for (let h = 1; h <= 12; h++) {
                const cuspLon = chartData.houses[h];
                const angleRad = (180 - (cuspLon - rotOffset)) * Math.PI / 180;

                const isMainAxis = (h === 1 || h === 7 || h === 10 || h === 4);
                const xOut = center + radius * Math.cos(angleRad);
                const yOut = center + radius * Math.sin(angleRad);
                const xIn  = center + centerHubRadius * Math.cos(angleRad);
                const yIn  = center + centerHubRadius * Math.sin(angleRad);

                const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                line.setAttribute('x1', xIn);
                line.setAttribute('y1', yIn);
                line.setAttribute('x2', xOut);
                line.setAttribute('y2', yOut);
                line.setAttribute('stroke', isMainAxis ? '#F59E0B' : 'rgba(254, 243, 199, 0.22)');
                line.setAttribute('stroke-width', isMainAxis ? '1.8' : '0.8');
                if (isMainAxis) {
                    line.setAttribute('filter', 'url(#astGoldGlow)');
                }
                housesG.appendChild(line);

                // House numbers inside hub
                const hNumR = centerHubRadius + 14;
                const hNumA = (180 - (cuspLon + 12 - rotOffset)) * Math.PI / 180;
                const hNumX = center + hNumR * Math.cos(hNumA);
                const hNumY = center + hNumR * Math.sin(hNumA) + 4;

                const hText = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                hText.setAttribute('x', hNumX);
                hText.setAttribute('y', hNumY);
                hText.setAttribute('text-anchor', 'middle');
                hText.setAttribute('fill', 'rgba(245, 158, 11, 0.7)');
                hText.setAttribute('font-size', '10');
                hText.setAttribute('font-family', 'Space Mono, monospace');
                hText.textContent = h.toString();
                housesG.appendChild(hText);
            }
        }
        svg.appendChild(housesG);

        // 3. Aspects (Geometric lines inside central circle)
        const aspectsG = document.createElementNS('http://www.w3.org/2000/svg', 'g');
        aspectsG.setAttribute('class', 'ast-aspects-lines');

        if (chartData.aspects && Array.isArray(chartData.aspects)) {
            chartData.aspects.forEach(asp => {
                const p1 = chartData.planets[asp.p1];
                const p2 = chartData.planets[asp.p2];
                if (!p1 || !p2) return;

                const a1 = (180 - (p1.lon - rotOffset)) * Math.PI / 180;
                const a2 = (180 - (p2.lon - rotOffset)) * Math.PI / 180;

                const x1 = center + centerHubRadius * Math.cos(a1);
                const y1 = center + centerHubRadius * Math.sin(a1);
                const x2 = center + centerHubRadius * Math.cos(a2);
                const y2 = center + centerHubRadius * Math.sin(a2);

                const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                line.setAttribute('x1', x1);
                line.setAttribute('y1', y1);
                line.setAttribute('x2', x2);
                line.setAttribute('y2', y2);
                line.setAttribute('stroke', asp.color || '#F59E0B');
                line.setAttribute('stroke-width', asp.nature === 'dynamic' ? '1.4' : '1.0');
                line.setAttribute('stroke-opacity', '0.65');
                line.setAttribute('stroke-dasharray', asp.nature === 'dynamic' ? '3,3' : 'none');
                line.classList.add('ast-aspect-wire');
                aspectsG.appendChild(line);
            });
        }
        svg.appendChild(aspectsG);

        // 4. Planet Points with Anti-Collision Radial Spread
        const planetsG = document.createElementNS('http://www.w3.org/2000/svg', 'g');
        planetsG.setAttribute('class', 'ast-planets-nodes');

        const planetGlyphs = {
            sun: '☉', moon: '☽', mercury: '☿', venus: '♀', mars: '♂',
            jupiter: '♃', saturn: '♄', uranus: '♅', neptune: '♆', pluto: '♇',
            true_node: '☊', chiron: '⚷', lilith: '⚸'
        };

        const sortedPlanets = Object.entries(chartData.planets || {})
            .map(([key, p]) => ({ key, ...p }))
            .sort((a, b) => a.lon - b.lon);

        // Anti-collision offset algorithm
        const planetR = innerRadius * 0.88;
        sortedPlanets.forEach((p, idx) => {
            let offsetR = planetR;
            if (idx > 0) {
                const prev = sortedPlanets[idx - 1];
                if (Math.abs(p.lon - prev.lon) < 5.0) {
                    offsetR = planetR - 22; // push inwards if crowded
                }
            }

            const pAngle = (180 - (p.lon - rotOffset)) * Math.PI / 180;
            const px = center + offsetR * Math.cos(pAngle);
            const py = center + offsetR * Math.sin(pAngle);

            const pGroup = document.createElementNS('http://www.w3.org/2000/svg', 'g');
            pGroup.setAttribute('class', 'ast-planet-pin');
            pGroup.setAttribute('data-planet', p.key);
            pGroup.style.cursor = 'pointer';

            const dot = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
            dot.setAttribute('cx', px);
            dot.setAttribute('cy', py);
            dot.setAttribute('r', '13');
            dot.setAttribute('fill', '#080E1A');
            dot.setAttribute('stroke', '#FBBF24');
            dot.setAttribute('stroke-width', '1.2');
            dot.setAttribute('filter', 'url(#astGoldGlow)');
            pGroup.appendChild(dot);

            const glyph = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            glyph.setAttribute('x', px);
            glyph.setAttribute('y', py + 4.5);
            glyph.setAttribute('text-anchor', 'middle');
            glyph.setAttribute('fill', '#FEF3C7');
            glyph.setAttribute('font-size', '13');
            glyph.setAttribute('font-family', 'Cinzel, serif');
            glyph.textContent = planetGlyphs[p.key] || '•';
            pGroup.appendChild(glyph);

            // Degree badge
            const degText = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            const degA = pAngle;
            const degDist = offsetR - 20;
            degText.setAttribute('x', center + degDist * Math.cos(degA));
            degText.setAttribute('y', center + degDist * Math.sin(degA) + 3);
            degText.setAttribute('text-anchor', 'middle');
            degText.setAttribute('fill', '#38BDF8');
            degText.setAttribute('font-size', '8');
            degText.setAttribute('font-family', 'Space Mono, monospace');
            degText.textContent = `${Math.floor(p.lon % 30)}°`;
            pGroup.appendChild(degText);

            planetsG.appendChild(pGroup);
        });
        svg.appendChild(planetsG);

        this.svg = svg;
        this.container.appendChild(svg);
    }
}
window.AstraNatalWheel = AstraNatalWheel;