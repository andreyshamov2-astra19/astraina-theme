/**
 * ASTRAINA.COM — VIRAL STORIES 9:16 CANVAS GENERATOR
 * High-resolution 1080x1920 export for Instagram / Telegram / TikTok with Web Share API.
 */
class AstraStoriesGenerator {
    constructor() {
        this.canvas = document.createElement('canvas');
        this.canvas.width = 1080;
        this.canvas.height = 1920;
        this.ctx = this.canvas.getContext('2d');
    }

    async generateStory(data = {}) {
        const ctx = this.ctx;
        const w = 1080;
        const h = 1920;

        // 1. Background Gradient (Deep Obsidian & Cosmic Indigo)
        const bgGrad = ctx.createRadialGradient(w/2, h/2, 200, w/2, h/2, 1100);
        bgGrad.addColorStop(0, '#080E1A');
        bgGrad.addColorStop(0.65, '#020408');
        bgGrad.addColorStop(1, '#010204');
        ctx.fillStyle = bgGrad;
        ctx.fillRect(0, 0, w, h);

        // 2. Sacred Constellation Stardust Grid
        ctx.fillStyle = 'rgba(254, 243, 199, 0.45)';
        for (let i = 0; i < 180; i++) {
            const sx = (Math.sin(i * 99) * 0.5 + 0.5) * w;
            const sy = (Math.cos(i * 33) * 0.5 + 0.5) * h;
            const sr = (i % 3 === 0) ? 2.5 : 1.2;
            ctx.beginPath();
            ctx.arc(sx, sy, sr, 0, Math.PI * 2);
            ctx.fill();
        }

        // 3. Gold Decorative Border
        ctx.strokeStyle = 'rgba(245, 158, 11, 0.35)';
        ctx.lineWidth = 4;
        ctx.strokeRect(60, 60, w - 120, h - 120);

        ctx.strokeStyle = '#F59E0B';
        ctx.lineWidth = 1.5;
        ctx.strokeRect(74, 74, w - 148, h - 148);

        // 4. Header: ASTRAINA Top Brand
        ctx.fillStyle = '#F59E0B';
        ctx.font = '700 24px "Space Mono", monospace';
        ctx.textAlign = 'center';
        ctx.letterSpacing = '8px';
        ctx.fillText('ASTRAINA.COM · CELESTIAL PULSE', w / 2, 160);

        // 5. Central Glowing Ruby / Gold Seal
        const sealY = 420;
        const radialSeal = ctx.createRadialGradient(w/2, sealY, 10, w/2, sealY, 180);
        radialSeal.addColorStop(0, 'rgba(225, 29, 72, 0.4)');
        radialSeal.addColorStop(0.5, 'rgba(245, 158, 11, 0.15)');
        radialSeal.addColorStop(1, 'rgba(2, 4, 8, 0)');
        ctx.fillStyle = radialSeal;
        ctx.beginPath();
        ctx.arc(w/2, sealY, 180, 0, Math.PI * 2);
        ctx.fill();

        // Power Emoji & Zodiac
        ctx.font = '110px serif';
        ctx.fillText(data.emoji || '✨', w / 2, sealY + 38);

        // 6. Sign / Subject Title
        ctx.fillStyle = '#FEF3C7';
        ctx.font = '600 58px "Cinzel", Georgia, serif';
        ctx.fillText(data.title || 'ВАЙБ ДНЯ · СКОРПИОН', w / 2, 700);

        // 7. Human Astrological Insight Box
        const boxX = 110;
        const boxY = 780;
        const boxW = w - 220;
        const boxH = 680;

        ctx.fillStyle = 'rgba(8, 14, 26, 0.75)';
        ctx.strokeStyle = 'rgba(245, 158, 11, 0.25)';
        ctx.lineWidth = 2;
        ctx.roundRect(boxX, boxY, boxW, boxH, 24);
        ctx.fill();
        ctx.stroke();

        // Card Tagline
        ctx.fillStyle = '#38BDF8';
        ctx.font = '700 26px "Space Mono", monospace';
        ctx.fillText(data.subtitle || 'САКРАЛЬНЫЙ СОВЕТ ЗВЁЗД', w / 2, boxY + 80);

        // Multi-line Text Body
        ctx.fillStyle = 'rgba(254, 243, 199, 0.9)';
        ctx.font = '36px "Plus Jakarta Sans", sans-serif';
        const quoteText = data.text || 'Сегодня Солнце и Марс активируют первозданный огонь воли. Не соглашайтесь на компромиссы со своей миссией. Доверяйте интуиции глубже, чем чужим советам.';
        this.wrapText(ctx, quoteText, w / 2, boxY + 180, boxW - 100, 56);

        // Bottom Affinity / Energy Bar
        ctx.fillStyle = '#FBBF24';
        ctx.font = '700 30px "Space Mono", monospace';
        ctx.fillText(`ЭНЕРГИЯ ДНЯ: ${data.power || '94%'} · СТИХИЯ: ${data.element || 'ОГОНЬ'}`, w / 2, boxY + boxH - 60);

        // 8. Footer Call to Action
        ctx.fillStyle = 'rgba(254, 243, 199, 0.6)';
        ctx.font = '24px "Plus Jakarta Sans", sans-serif';
        ctx.fillText('Построй свой сакральный атлас на', w / 2, h - 160);

        ctx.fillStyle = '#FEF3C7';
        ctx.font = '700 32px "Space Mono", monospace';
        ctx.fillText('ASTRAINA.COM', w / 2, h - 110);

        return this.canvas.toDataURL('image/png');
    }

    wrapText(ctx, text, x, y, maxWidth, lineHeight) {
        const words = text.split(' ');
        let line = '';
        for (let n = 0; n < words.length; n++) {
            const testLine = line + words[n] + ' ';
            const metrics = ctx.measureText(testLine);
            if (metrics.width > maxWidth && n > 0) {
                ctx.fillText(line, x, y);
                line = words[n] + ' ';
                y += lineHeight;
            } else {
                line = testLine;
            }
        }
        ctx.fillText(line, x, y);
    }

    async downloadOrShare(data) {
        const imgUrl = await this.generateStory(data);
        const link = document.createElement('a');
        link.download = `astraina-story-${Date.now()}.png`;
        link.href = imgUrl;

        // If Web Share API supports image files
        if (navigator.canShare && navigator.canShare({ files: [] })) {
            const blob = await (await fetch(imgUrl)).blob();
            const file = new File([blob], 'astraina-story.png', { type: 'image/png' });
            try {
                await navigator.share({
                    files: [file],
                    title: 'ASTRAINA Story',
                    text: 'Мой звёздный импульс на ASTRAINA.COM'
                });
                return;
            } catch (e) {
                // User dismissed or failed, fallback to direct download
            }
        }
        link.click();
    }
}
window.AstraStoriesGenerator = AstraStoriesGenerator;