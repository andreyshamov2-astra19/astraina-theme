/**
 * ASTRAINA Cosmos Engine (Heart of Scorpio & Star Field)
 * Antares Ruby Core: #E11D48, Star Gold: #F59E0B
 */
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('astraina-cosmos-canvas') || document.body;
    
    // Создаем защитный canvas, если не создан в HTML
    let canvas = document.getElementById('astraina-bg-canvas');
    if (!canvas) {
        canvas = document.createElement('canvas');
        canvas.id = 'astraina-bg-canvas';
        canvas.style.position = 'fixed';
        canvas.style.top = '0';
        canvas.style.left = '0';
        canvas.style.width = '100vw';
        canvas.style.height = '100vh';
        canvas.style.zIndex = '-1';
        canvas.style.pointerEvents = 'none';
        document.body.prepend(canvas);
    }

    const ctx = canvas.getContext('2d');
    let width = canvas.width = window.innerWidth;
    let height = canvas.height = window.innerHeight;

    window.addEventListener('resize', () => {
        width = canvas.width = window.innerWidth;
        height = canvas.height = window.innerHeight;
    });

    // 150 священных звездных узлов
    const stars = Array.from({ length: 160 }, () => ({
        x: Math.random() * width,
        y: Math.random() * height,
        radius: Math.random() * 1.5 + 0.3,
        alpha: Math.random() * 0.8 + 0.2,
        speed: Math.random() * 0.02 + 0.005,
        color: Math.random() > 0.85 ? '#E11D48' : (Math.random() > 0.5 ? '#F59E0B' : '#FFFFFF')
    }));

    let pulse = 0;

    function render() {
        ctx.fillStyle = '#020408';
        ctx.fillRect(0, 0, width, height);

        // Пульсация Рубинового Ядра Антареса в центре
        pulse += 0.02;
        const rubyGlow = Math.sin(pulse) * 40 + 120;
        const grad = ctx.createRadialGradient(width / 2, height / 2.2, 10, width / 2, height / 2.2, rubyGlow * 3.5);
        grad.addColorStop(0, 'rgba(225, 29, 72, 0.18)');
        grad.addColorStop(0.5, 'rgba(245, 158, 11, 0.04)');
        grad.addColorStop(1, 'transparent');
        ctx.fillStyle = grad;
        ctx.fillRect(0, 0, width, height);

        // Звездный купол
        for (let star of stars) {
            star.y -= star.speed * 10;
            if (star.y < 0) {
                star.y = height;
                star.x = Math.random() * width;
            }

            ctx.beginPath();
            ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
            ctx.fillStyle = star.color;
            ctx.globalAlpha = star.alpha * (0.6 + Math.sin(pulse + star.x) * 0.4);
            ctx.fill();
        }
        ctx.globalAlpha = 1.0;

        requestAnimationFrame(render);
    }

    render();
});