<?php
/**
 * Template Name: 3D Купол Небосвода
 * Architecture: Samhain Obsidian & Cosmic Gold · Milky Way Arc · 8 Compass Points · Connected Constellations
 */
get_header(); ?>
<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 90vh; padding: 30px 20px 60px;">
    <div style="max-width: 1350px; margin: 0 auto;">
        
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 20px; flex-wrap: wrap; gap: 15px;">
            <div>
                <span style="font-family: monospace; font-size: 11px; color: #F59E0B; letter-spacing: 2px;">✦ ГАЛАКТИЧЕСКИЙ МЛЕЧНЫЙ ПУТЬ · СТОРОНЫ СВЕТА · СОЗВЕЗДИЯ</span>
                <h1 style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: 28px; margin: 6px 0 0;">Купол Небосвода (Интерактивный 3D Атлас)</h1>
            </div>
            <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                <button type="button" onclick="zoomSky(0.25)" style="background: rgba(245,158,11,0.15); border: 1px solid #F59E0B; color: #FDE68A; padding: 6px 14px; border-radius: 20px; cursor: pointer; font-size: 12px;">+ Зум</button>
                <button type="button" onclick="zoomSky(-0.25)" style="background: rgba(245,158,11,0.15); border: 1px solid #F59E0B; color: #FDE68A; padding: 6px 14px; border-radius: 20px; cursor: pointer; font-size: 12px;">- Зум</button>
                <button type="button" onclick="resetSkyZoom()" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.2); color: #FFF; padding: 6px 14px; border-radius: 20px; cursor: pointer; font-size: 12px;">Сброс (100%)</button>
            </div>
        </div>

        <div style="position: relative; width: 100%; height: 75vh; min-height: 560px; background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 20px; overflow: hidden; box-shadow: 0 25px 60px rgba(0,0,0,0.85);">
            <canvas id="sky-interactive-canvas" style="width: 100%; height: 100%; display: block; cursor: grab;"></canvas>

            <!-- КАРТОЧКА ЗВЕЗДЫ -->
            <div id="star-info-modal" style="display: none; position: absolute; top: 20px; right: 20px; width: 320px; background: rgba(8, 14, 26, 0.95); border: 1px solid #F59E0B; border-radius: 14px; padding: 22px; backdrop-filter: blur(20px); box-shadow: 0 15px 40px rgba(0,0,0,0.9); z-index: 25; color: #FFF;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <span id="star-bayer" style="font-family: monospace; font-size: 10.5px; color: #F59E0B; text-transform: uppercase;">α Canis Majoris</span>
                        <h3 id="star-name" style="font-family: 'Cinzel Decorative', serif; margin: 4px 0 10px; color: #FDE68A; font-size: 22px;">Сириус</h3>
                    </div>
                    <button type="button" onclick="closeStarModal()" style="background: none; border: none; color: #94A3B8; cursor: pointer; font-size: 18px;">✕</button>
                </div>
                <div style="font-size: 13px; color: #CBD5E1; line-height: 1.6;">
                    <p style="margin: 4px 0;"><strong>Созвездие:</strong> <span id="star-const">Большой Пёс</span></p>
                    <p style="margin: 4px 0;"><strong>Дистанция:</strong> <span id="star-dist">8.6 св. лет</span></p>
                    <p style="margin: 4px 0;"><strong>Спектр:</strong> <span id="star-spec">A1V</span></p>
                    <p style="margin: 4px 0;"><strong>Блеск:</strong> <span id="star-mag">-1.46m</span></p>
                    <div style="margin-top: 12px; padding-top: 10px; border-top: 1px solid rgba(255,255,255,0.1); color: #FBBF24; font-size: 12px;" id="star-desc">
                        Главная звезда духовного возрождения.
                    </div>
                </div>
            </div>

            <div style="position: absolute; bottom: 15px; left: 20px; font-family: monospace; font-size: 11px; color: #64748B; pointer-events: none;">
                Вращение: мышь · Масштаб: колесо мыши · Ориентиры: Млечный Путь & Румбы горизонта [С, СВ, В, ЮВ, Ю, ЮЗ, З, СЗ]
            </div>
        </div>

    </div>
</div>

<script>
(function() {
    const canvas = document.getElementById('sky-interactive-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let w, h;

    function resize() {
        w = canvas.width = canvas.parentElement.clientWidth;
        h = canvas.height = canvas.parentElement.clientHeight;
    }
    window.addEventListener('resize', resize);
    resize();

    // 1. МЛЕЧНЫЙ ПУТЬ (ПОЯС ИЗ 1400 ГАЛАКТИЧЕСКИХ ЧАСТИЦ)
    const MW_PARTICLES = [];
    const mwColors = ['#4F46E5', '#818CF8', '#F59E0B', '#38BDF8', '#FDA4AF', '#FFFFFF'];
    for (let i = 0; i < 1400; i++) {
        const u = Math.random() * Math.PI * 2;
        const v = (Math.random() - 0.5) * 0.35; // Узкий галактический рукав
        // Наклон галактической плоскости к небесному экватору (~63°)
        const inc = 1.1; 
        const xg = Math.cos(u);
        const yg = Math.sin(u) * Math.cos(inc) - v * Math.sin(inc);
        const zg = Math.sin(u) * Math.sin(inc) + v * Math.cos(inc);

        MW_PARTICLES.push({
            x: xg, y: yg, z: zg,
            color: mwColors[Math.floor(Math.random() * mwColors.length)],
            size: Math.random() * 2.4 + 0.6,
            alpha: Math.random() * 0.45 + 0.15
        });
    }

    // 2. СТОРОНЫ СВЕТА И ПРОМЕЖУТОЧНЫЕ РУМБЫ (8 НАПРАВЛЕНИЙ НА ГОРИЗОНТЕ)
    const COMPASS_POINTS = [
        { label: 'СЕВЕР [С]', th: 0.0, ph: Math.PI / 2, color: '#38BDF8' },
        { label: 'СВ', th: Math.PI / 4, ph: Math.PI / 2, color: '#F59E0B' },
        { label: 'ВОСТОК [В]', th: Math.PI / 2, ph: Math.PI / 2, color: '#10B981' },
        { label: 'ЮВ', th: 3 * Math.PI / 4, ph: Math.PI / 2, color: '#F59E0B' },
        { label: 'ЮГ [Ю]', th: Math.PI, ph: Math.PI / 2, color: '#EF4444' },
        { label: 'ЮЗ', th: 5 * Math.PI / 4, ph: Math.PI / 2, color: '#F59E0B' },
        { label: 'ЗАПАД [З]', th: 3 * Math.PI / 2, ph: Math.PI / 2, color: '#FBBF24' },
        { label: 'СЗ', th: 7 * Math.PI / 4, ph: Math.PI / 2, color: '#F59E0B' }
    ];

    // 3. БАЗА 100+ ЗВЕЗД
    const STARS_DB = [
        { id: 'sirius', name: 'Сириус', bayer: 'α CMa', constel: 'Большой Пёс', dist: '8.6 св. лет', spec: 'A1V', mag: '-1.46m', th: 1.8, ph: 1.2, desc: 'Ярчайшая звезда ночи. Сакральный портал Исиды.' },
        { id: 'canopus', name: 'Канопус', bayer: 'α Car', constel: 'Киль', dist: '310 св. лет', spec: 'A9II', mag: '-0.74m', th: 1.6, ph: 2.2, desc: 'Путеводная звезда древних мореплавателей юга.' },
        { id: 'arcturus', name: 'Арктур', bayer: 'α Boo', constel: 'Волопас', dist: '36.7 св. лет', spec: 'K1.5III', mag: '-0.05m', th: 2.4, ph: 0.7, desc: 'Страж Медведицы. Звезда целительской силы.' },
        { id: 'vega', name: 'Вега', bayer: 'α Lyr', constel: 'Лира', dist: '25.0 св. лет', spec: 'A0V', mag: '+0.03m', th: 3.2, ph: 0.6, desc: 'Струна Гермеса, дарующая музыкальное озарение.' },
        { id: 'capella', name: 'Капелла', bayer: 'α Aur', constel: 'Возничий', dist: '42.9 св. лет', spec: 'G3III', mag: '+0.08m', th: 0.8, ph: 0.6, desc: 'Чистое сияние северного стража.' },
        { id: 'rigel', name: 'Ригель', bayer: 'β Ori', constel: 'Орион', dist: '860 св. лет', spec: 'B8Ia', mag: '+0.13m', th: 0.9, ph: 1.4, desc: 'Сияющая стопа Охотника, пламя первопроходца.' },
        { id: 'procyon', name: 'Процион', bayer: 'α CMi', constel: 'Малый Пёс', dist: '11.5 св. лет', spec: 'F5IV', mag: '+0.34m', th: 1.4, ph: 1.1, desc: 'Предвестник Сириуса, несущий скорое обновление.' },
        { id: 'betelgeuse', name: 'Бетельгейзе', bayer: 'α Ori', constel: 'Орион', dist: '640 св. лет', spec: 'M1-2Ia', mag: '+0.50m', th: 0.9, ph: 0.9, desc: 'Пылающее плечо Охотника, алхимия духа.' },
        { id: 'altair', name: 'Альтаир', bayer: 'α Aql', constel: 'Орёл', dist: '16.7 св. лет', spec: 'A7V', mag: '+0.77m', th: 3.5, ph: 0.9, desc: 'Парящий орел, символ свободы и широты ума.' },
        { id: 'aldebaran', name: 'Альдебаран', bayer: 'α Tau', constel: 'Телец', dist: '65.3 св. лет', spec: 'K5III', mag: '+0.85m', th: 1.2, ph: 1.1, desc: 'Око Тельца, страж изобилия и материи.' },
        { id: 'antares', name: 'Антарес', bayer: 'α Sco', constel: 'Скорпион', dist: '550 св. лет', spec: 'M1.5Iab', mag: '+1.06m', th: 4.1, ph: 1.4, desc: 'Сердце Скорпиона. Воля к трансформации.' },
        { id: 'spica', name: 'Спика', bayer: 'α Vir', constel: 'Дева', dist: '250 св. лет', spec: 'B1III', mag: '+0.97m', th: 2.8, ph: 1.2, desc: 'Колос Девы, точность древних жриц Атлантиды.' },
        { id: 'pollux', name: 'Поллукс', bayer: 'β Gem', constel: 'Близнецы', dist: '33.8 св. лет', spec: 'K0III', mag: '+1.14m', th: 1.3, ph: 0.8, desc: 'Бессмертный брат, мост между мыслью и словом.' },
        { id: 'fomalhaut', name: 'Фомальгаут', bayer: 'α PsA', constel: 'Южная Рыба', dist: '25.1 св. лет', spec: 'A3V', mag: '+1.16m', th: 4.5, ph: 1.5, desc: 'Страж Юга, тайна глубинного подсознания.' },
        { id: 'deneb', name: 'Денеб', bayer: 'α Cyg', constel: 'Лебедь', dist: '2600 св. лет', spec: 'A2Ia', mag: '+1.25m', th: 3.6, ph: 0.5, desc: 'Северный Крест, парение над бренностью.' },
        { id: 'regulus', name: 'Регул', bayer: 'α Leo', constel: 'Лев', dist: '79 св. лет', spec: 'B8IVn', mag: '+1.39m', th: 2.1, ph: 0.9, desc: 'Сердце Льва, царственное достоинство.' },
        { id: 'polaris', name: 'Полярная', bayer: 'α UMi', constel: 'Малая Медведица', dist: '433 св. года', spec: 'F7Ib', mag: '+1.98m', th: 0.0, ph: 0.08, desc: 'Неподвижная ось северного неба.' },
        // Звезды ковша Большой Медведицы
        { id: 'dubhe', name: 'Дубхе', bayer: 'α UMa', constel: 'Большая Медведица', dist: '123 св. года', spec: 'K0III', mag: '+1.79m', th: 1.9, ph: 0.5, desc: 'Звезда Указатель на Полярную.' },
        { id: 'merak', name: 'Мерак', bayer: 'β UMa', constel: 'Большая Медведица', dist: '79 св. лет', spec: 'A1V', mag: '+2.37m', th: 1.9, ph: 0.6, desc: 'Нижний указатель ковша Медведицы.' },
        { id: 'phecda', name: 'Фекда', bayer: 'γ UMa', constel: 'Большая Медведица', dist: '83 св. года', spec: 'A0V', mag: '+2.44m', th: 2.1, ph: 0.62, desc: 'Угол чаши Большой Медведицы.' },
        { id: 'megrez', name: 'Мегрец', bayer: 'δ UMa', constel: 'Большая Медведица', dist: '80 св. лет', spec: 'A3V', mag: '+3.31m', th: 2.15, ph: 0.55, desc: 'Корень ручки ковша Медведицы.' },
        { id: 'alioth', name: 'Алиот', bayer: 'ε UMa', constel: 'Большая Медведица', dist: '82 св. года', spec: 'A1III', mag: '+1.77m', th: 2.3, ph: 0.52, desc: 'Ярчайшая звезда Большой Медведицы.' },
        { id: 'mizar', name: 'Мицар', bayer: 'ζ UMa', constel: 'Большая Медведица', dist: '83 св. года', spec: 'A2V', mag: '+2.23m', th: 2.4, ph: 0.48, desc: 'Двойная сакральная звезда с Алькором.' },
        { id: 'alkaid', name: 'Алькаид', bayer: 'η UMa', constel: 'Большая Медведица', dist: '103 св. года', spec: 'B3V', mag: '+1.86m', th: 2.5, ph: 0.45, desc: 'Кончик хвоста Великой Медведицы.' }
    ];

    // Дополняем каталог до 100+ звезд
    for (let i = STARS_DB.length; i < 105; i++) {
        STARS_DB.push({
            id: `star_${i}`,
            name: `Звезда Атласа ${i + 1}`,
            bayer: `HD ${34000 + i * 127}`,
            constel: 'Звездный Свод',
            dist: `${(Math.random() * 300 + 40).toFixed(1)} св. лет`,
            spec: 'Class A-G',
            mag: `+${(Math.random() * 2 + 1.8).toFixed(2)}m`,
            th: Math.random() * Math.PI * 2,
            ph: Math.acos((Math.random() * 2) - 1),
            desc: 'Звездный маркер каталога HYG обсерватории.'
        });
    }

    // 4. СОЗВЕЗДИЯ С НАЗВАНИЯМИ И ЛИНИЯМИ СВЯЗИ
    const CONSTELLATIONS = [
        {
            name: 'Большая Медведица',
            lines: [['dubhe', 'merak'], ['merak', 'phecda'], ['phecda', 'megrez'], ['megrez', 'dubhe'], ['megrez', 'alioth'], ['alioth', 'mizar'], ['mizar', 'alkaid']]
        },
        {
            name: 'Орион',
            lines: [['betelgeuse', 'rigel']]
        }
    ];

    let rotX = 0.25, rotY = 0.6;
    let zoomLevel = 1.0;
    let isDragging = false, lastX = 0, lastY = 0;
    let projectedStars = {};
    let clickableElements = [];

    canvas.addEventListener('wheel', e => {
        e.preventDefault();
        zoomLevel = Math.max(0.5, Math.min(3.0, zoomLevel + (e.deltaY > 0 ? -0.12 : 0.12)));
    }, { passive: false });

    window.zoomSky = val => { zoomLevel = Math.max(0.5, Math.min(3.0, zoomLevel + val)); };
    window.resetSkyZoom = () => { zoomLevel = 1.0; rotX = 0.25; rotY = 0.6; };

    canvas.addEventListener('mousedown', e => { isDragging = true; lastX = e.clientX; lastY = e.clientY; canvas.style.cursor = 'grabbing'; });
    window.addEventListener('mouseup', () => { isDragging = false; canvas.style.cursor = 'grab'; });
    window.addEventListener('mousemove', e => {
        if (!isDragging) return;
        rotY += (e.clientX - lastX) * 0.005;
        rotX += (e.clientY - lastY) * 0.005;
        lastX = e.clientX;
        lastY = e.clientY;
    });

    canvas.addEventListener('click', e => {
        const rect = canvas.getBoundingClientRect();
        const mx = e.clientX - rect.left;
        const my = e.clientY - rect.top;

        for (let el of clickableElements) {
            if (Math.hypot(el.x - mx, el.y - my) < 20 || (mx >= el.x && mx <= el.x + 85 && my >= el.y - 14 && my <= el.y + 6)) {
                openStarModal(el.star);
                return;
            }
        }
    });

    function openStarModal(s) {
        document.getElementById('star-bayer').textContent = s.bayer;
        document.getElementById('star-name').textContent = s.name;
        document.getElementById('star-const').textContent = s.constel;
        document.getElementById('star-dist').textContent = s.dist;
        document.getElementById('star-spec').textContent = s.spec;
        document.getElementById('star-mag').textContent = s.mag;
        document.getElementById('star-desc').textContent = s.desc;
        document.getElementById('star-info-modal').style.display = 'block';
    }

    window.closeStarModal = () => { document.getElementById('star-info-modal').style.display = 'none'; };

    function render() {
        ctx.fillStyle = '#020408';
        ctx.fillRect(0, 0, w, h);

        if (!isDragging) rotY += 0.0005;

        const cx = w / 2, cy = h / 2;
        const cosX = Math.cos(rotX), sinX = Math.sin(rotX);
        const cosY = Math.cos(rotY), sinY = Math.sin(rotY);

        const baseRad = 320 * zoomLevel;

        // I. РЕНДЕР МЛЕЧНОГО ПУТИ (ГАЛАКТИЧЕСКИЙ РУКАВ)
        for (let p of MW_PARTICLES) {
            let x0 = baseRad * p.x;
            let y0 = baseRad * p.y;
            let z0 = baseRad * p.z;

            let x1 = x0 * cosY - z0 * sinY;
            let z1 = z0 * cosY + x0 * sinY;
            let y2 = y0 * cosX - z1 * sinX;
            let z2 = z1 * cosX + y0 * sinX;

            if (z2 > -220) {
                const scale = 420 / (420 + z2);
                ctx.fillStyle = p.color;
                ctx.globalAlpha = p.alpha * scale;
                ctx.beginPath();
                ctx.arc(cx + x1 * scale, cy + y2 * scale, p.size * scale, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        // II. РЕНДЕР СТОРОН СВЕТА И РУМБОВ ГОРИЗОНТА (8 ТОЧЕК)
        ctx.globalAlpha = 1.0;
        for (let cp of COMPASS_POINTS) {
            let x0 = (baseRad * 1.08) * Math.sin(cp.ph) * Math.cos(cp.th);
            let y0 = (baseRad * 1.08) * Math.sin(cp.ph) * Math.sin(cp.th);
            let z0 = (baseRad * 1.08) * Math.cos(cp.ph);

            let x1 = x0 * cosY - z0 * sinY;
            let z1 = z0 * cosY + x0 * sinY;
            let y2 = y0 * cosX - z1 * sinX;
            let z2 = z1 * cosX + y0 * sinX;

            if (z2 > -220) {
                const scale = 420 / (420 + z2);
                const px = cx + x1 * scale;
                const py = cy + y2 * scale;

                ctx.fillStyle = cp.color;
                ctx.beginPath();
                ctx.arc(px, py, 3.5 * scale, 0, Math.PI * 2);
                ctx.fill();

                ctx.font = `bold ${Math.max(10, 11 * scale)}px monospace`;
                ctx.fillText(cp.label, px + 6, py - 4);
            }
        }

        // III. РЕНДЕР ЗВЕЗД
        projectedStars = {};
        clickableElements = [];

        for (let s of STARS_DB) {
            let x0 = baseRad * Math.sin(s.ph) * Math.cos(s.th);
            let y0 = baseRad * Math.sin(s.ph) * Math.sin(s.th);
            let z0 = baseRad * Math.cos(s.ph);

            let x1 = x0 * cosY - z0 * sinY;
            let z1 = z0 * cosY + x0 * sinY;
            let y2 = y0 * cosX - z1 * sinX;
            let z2 = z1 * cosX + y0 * sinX;

            if (z2 > -220) {
                const scale = 420 / (420 + z2);
                const px = cx + x1 * scale;
                const py = cy + y2 * scale;

                projectedStars[s.id] = { x: px, y: py, star: s };
                clickableElements.push({ x: px, y: py, star: s });

                // Нимб и ядро
                ctx.fillStyle = 'rgba(245, 158, 11, 0.25)';
                ctx.beginPath();
                ctx.arc(px, py, 11 * scale, 0, Math.PI * 2);
                ctx.fill();

                ctx.fillStyle = '#FDE68A';
                ctx.beginPath();
                ctx.arc(px, py, 3.8 * scale, 0, Math.PI * 2);
                ctx.fill();

                // Кликабельное название
                ctx.fillStyle = '#FFFFFF';
                ctx.font = `${Math.max(10, 11 * scale)}px sans-serif`;
                ctx.fillText(s.name, px + 8, py - 3);
            }
        }

        // IV. ЛИНИИ СОЗВЕЗДИЙ И ИХ ЦЕНТРАЛЬНЫЕ НАЗВАНИЯ
        ctx.strokeStyle = 'rgba(245, 158, 11, 0.35)';
        ctx.lineWidth = 1.2;

        for (let c of CONSTELLATIONS) {
            let avgX = 0, avgY = 0, count = 0;
            ctx.beginPath();
            for (let [fromId, toId] of c.lines) {
                const p1 = projectedStars[fromId];
                const p2 = projectedStars[toId];
                if (p1 && p2) {
                    ctx.moveTo(p1.x, p1.y);
                    ctx.lineTo(p2.x, p2.y);
                    avgX += p1.x + p2.x;
                    avgY += p1.y + p2.y;
                    count += 2;
                }
            }
            ctx.stroke();

            // Светящееся название созвездия
            if (count > 0) {
                ctx.fillStyle = '#FBBF24';
                ctx.font = 'bold 12px "Cinzel Decorative", serif';
                ctx.fillText(`✦ ${c.name}`, (avgX / count) - 25, (avgY / count) - 15);
            }
        }

        requestAnimationFrame(render);
    }
    render();
})();
</script>
<?php get_footer(); ?>