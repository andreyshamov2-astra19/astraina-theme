/**
 * ASTRAINA.COM — SACRED SYNASTRY RADAR & BI-WHEEL (Awwwards $500k Grade)
 * Visualizing 4 Sacred Resonance Scales with SVG Polygon Glow & Cross-Aspect Highlights.
 */
class AstraSynastryRadar {
    constructor(containerId) {
        this.container = document.getElementById(containerId);
    }

    render(scales) {
        if (!this.container) return;
        this.container.innerHTML = '';

        const size = 360;
        const center = size / 2;
        const radius = size * 0.40;

        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.setAttribute('viewBox', `0 0 ${size} ${size}`);
        svg.style.width = '100%';
        svg.style.height = '100%';
        svg.style.filter = 'drop-shadow(0 0 30px rgba(245, 158, 11, 0.18))';

        svg.innerHTML = `
            <defs>
                <radialGradient id="astRadarBg" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="#080E1A" stop-opacity="0.9"/>
                    <stop offset="100%" stop-color="#020408" stop-opacity="0.95"/>
                </radialGradient>
                <linearGradient id="astRadarPoly" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#F59E0B" stop-opacity="0.55"/>
                    <stop offset="100%" stop-color="#E11D48" stop-opacity="0.45"/>
                </linearGradient>
            </defs>
            <circle cx="${center}" cy="${center}" r="${radius}" fill="url(#astRadarBg)" stroke="rgba(245, 158, 11, 0.3)" stroke-width="1"/>
        `;

        // 4 Axes: Top (Romance), Right (Intellect), Bottom (Karmic), Left (Emotional)
        const axes = [
            { key: 'romance',   label: 'РОМАНТИКА',   angle: -Math.PI / 2, val: scales.romance || 50 },
            { key: 'intellect', label: 'ИНТЕЛЛЕКТ',   angle: 0,            val: scales.intellect || 50 },
            { key: 'karmic',    label: 'КАРМА',       angle: Math.PI / 2,  val: scales.karmic || 50 },
            { key: 'emotional', label: 'БЫТ / ДУША',  angle: Math.PI,      val: scales.emotional || 50 }
        ];

        // Draw concentric guide circles (25%, 50%, 75%, 100%)
        [0.25, 0.5, 0.75, 1.0].forEach(level => {
            const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
            circle.setAttribute('cx', center);
            circle.setAttribute('cy', center);
            circle.setAttribute('r', radius * level);
            circle.setAttribute('fill', 'none');
            circle.setAttribute('stroke', 'rgba(245, 158, 11, 0.12)');
            circle.setAttribute('stroke-dasharray', level === 1.0 ? 'none' : '3,3');
            svg.appendChild(circle);
        });

        // Draw axis lines and labels
        axes.forEach(ax => {
            const x2 = center + radius * Math.cos(ax.angle);
            const y2 = center + radius * Math.sin(ax.angle);

            const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line.setAttribute('x1', center);
            line.setAttribute('y1', center);
            line.setAttribute('x2', x2);
            line.setAttribute('y2', y2);
            line.setAttribute('stroke', 'rgba(245, 158, 11, 0.25)');
            line.setAttribute('stroke-width', '1');
            svg.appendChild(line);

            // Label
            const lx = center + (radius + 24) * Math.cos(ax.angle);
            const ly = center + (radius + 24) * Math.sin(ax.angle) + 4;
            const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            text.setAttribute('x', lx);
            text.setAttribute('y', ly);
            text.setAttribute('text-anchor', 'middle');
            text.setAttribute('fill', '#FEF3C7');
            text.setAttribute('font-family', 'Space Mono, monospace');
            text.setAttribute('font-size', '9');
            text.setAttribute('letter-spacing', '0.1em');
            text.textContent = `${ax.label} ${ax.val}%`;
            svg.appendChild(text);
        });

        // Construct Data Polygon
        const points = axes.map(ax => {
            const dist = radius * (ax.val / 100.0);
            const x = center + dist * Math.cos(ax.angle);
            const y = center + dist * Math.sin(ax.angle);
            return `${x},${y}`;
        }).join(' ');

        const polygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
        polygon.setAttribute('points', points);
        polygon.setAttribute('fill', 'url(#astRadarPoly)');
        polygon.setAttribute('stroke', '#FBBF24');
        polygon.setAttribute('stroke-width', '2');
        polygon.style.transition = 'all 0.8s ease-out';
        svg.appendChild(polygon);

        // Glowing Vertices
        axes.forEach(ax => {
            const dist = radius * (ax.val / 100.0);
            const vx = center + dist * Math.cos(ax.angle);
            const vy = center + dist * Math.sin(ax.angle);

            const dot = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
            dot.setAttribute('cx', vx);
            dot.setAttribute('cy', vy);
            dot.setAttribute('r', '4.5');
            dot.setAttribute('fill', '#38BDF8');
            dot.setAttribute('stroke', '#FEF3C7');
            dot.setAttribute('stroke-width', '1.5');
            svg.appendChild(dot);
        });

        this.container.appendChild(svg);
    }
}
window.AstraSynastryRadar = AstraSynastryRadar;