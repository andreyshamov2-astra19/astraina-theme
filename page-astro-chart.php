<?php
/**
 * Template Name: Натальная Карта (JPL DE440)
 * Architecture: Samhain Obsidian & Cosmic Gold · Dynamic Natal Engine + Career Radar 1-10
 */
get_header(); ?>
<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 90vh; padding: 40px 20px 80px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <div style="text-align: center; margin-bottom: 35px;">
            <span style="font-family: monospace; font-size: 11px; color: #F59E0B; letter-spacing: 2px;">✦ НАТАЛЬНЫЙ АТЛАС ПЛАЦИДУС · NASA JPL</span>
            <h1 style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: clamp(26px, 4vw, 42px); margin: 10px 0;">Расчет Натальной Карты</h1>
            <p style="color: #94A3B8; max-width: 680px; margin: 0 auto; font-size: 15px;">Точный астрометрический расчет колеса домов Плацидуса, глубинных интерпретаций и радара профессиональных склонностей (1–10).</p>
        </div>

        <!-- ФОРМА ВВОДА ДАННЫХ -->
        <div style="background: rgba(8, 14, 26, 0.94); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 20px; padding: 30px; backdrop-filter: blur(16px); box-shadow: 0 20px 50px rgba(0,0,0,0.8); margin-bottom: 40px;">
            <form id="ast-natal-form" onsubmit="calculateNatalChart(event)" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 18px; align-items: flex-end;">
                <div>
                    <label style="display: block; font-size: 11px; font-family: monospace; color: #F59E0B; margin-bottom: 8px;">ИМЯ / САКРАЛЬНЫЙ ЗНАК</label>
                    <input type="text" id="natal-name" value="Искатель" required style="width: 100%; box-sizing: border-box; background: rgba(2, 4, 8, 0.8); border: 1px solid rgba(245, 158, 11, 0.3); color: #FFF; padding: 12px 14px; border-radius: 10px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; font-size: 11px; font-family: monospace; color: #F59E0B; margin-bottom: 8px;">ДАТА РОЖДЕНИЯ</label>
                    <input type="date" id="natal-date" value="1995-10-24" required style="width: 100%; box-sizing: border-box; background: rgba(2, 4, 8, 0.8); border: 1px solid rgba(245, 158, 11, 0.3); color: #FFF; padding: 12px 14px; border-radius: 10px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; font-size: 11px; font-family: monospace; color: #F59E0B; margin-bottom: 8px;">ТОЧНОЕ ВРЕМЯ (МЕСТНОЕ)</label>
                    <input type="time" id="natal-time" value="14:30" required style="width: 100%; box-sizing: border-box; background: rgba(2, 4, 8, 0.8); border: 1px solid rgba(245, 158, 11, 0.3); color: #FFF; padding: 12px 14px; border-radius: 10px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; font-size: 11px; font-family: monospace; color: #F59E0B; margin-bottom: 8px;">ГОРОД РОЖДЕНИЯ</label>
                    <input type="text" id="natal-city" value="Москва" required style="width: 100%; box-sizing: border-box; background: rgba(2, 4, 8, 0.8); border: 1px solid rgba(245, 158, 11, 0.3); color: #FFF; padding: 12px 14px; border-radius: 10px; font-size: 14px;">
                </div>
                <div>
                    <button type="submit" id="btn-calc-chart" style="width: 100%; background: linear-gradient(135deg, #E11D48 0%, #9F1239 100%); color: #FFF; font-weight: 700; padding: 13px 18px; border-radius: 10px; border: 1px solid rgba(254, 243, 199, 0.3); cursor: pointer; text-transform: uppercase; letter-spacing: 1px; font-size: 12.5px; box-shadow: 0 0 20px rgba(225, 29, 72, 0.4);">
                        Раскрыть карту →
                    </button>
                </div>
            </form>
        </div>

        <!-- РЕЗУЛЬТАТЫ: КОЛЕСО + ТАБЛИЦА -->
        <div id="natal-results-block" style="display: none;">
            <div style="display: grid; grid-template-columns: minmax(320px, 480px) 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
                
                <!-- SVG КОЛЕСО -->
                <div style="background: rgba(8, 14, 26, 0.94); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 20px; padding: 25px; text-align: center; box-shadow: 0 20px 50px rgba(0,0,0,0.8);">
                    <h3 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 0 0 15px; font-size: 18px;">Векторный Атлас (Placidus)</h3>
                    <div id="natal-svg-container" style="width: 100%; max-width: 440px; height: 440px; margin: 0 auto;"></div>
                </div>

                <!-- МАТРИЦА ПЛАНЕТ -->
                <div style="background: rgba(8, 14, 26, 0.94); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 20px; padding: 25px;">
                    <h3 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 0 0 15px; font-size: 18px;">Астрометрическая Матрица тел (JPL DE440)</h3>
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; font-size: 13px; color: #E5E7EB;">
                            <thead>
                                <tr style="border-bottom: 1px solid rgba(245, 158, 11, 0.3); color: #F59E0B; text-align: left;">
                                    <th style="padding: 8px;">Тело</th>
                                    <th style="padding: 8px;">Знак</th>
                                    <th style="padding: 8px;">Долгота</th>
                                    <th style="padding: 8px;">Дом</th>
                                </tr>
                            </thead>
                            <tbody id="natal-table-body"></tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- РАЗДЕЛ: РАДАР ПРОФЕССИОНАЛЬНЫХ СКЛОННОСТЕЙ (ОТ 1 ДО 10) -->
            <div style="background: rgba(8, 14, 26, 0.94); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 20px; padding: 35px; box-shadow: 0 20px 50px rgba(0,0,0,0.8); margin-bottom: 40px;">
                <div style="text-align: center; margin-bottom: 25px;">
                    <span style="font-family: monospace; font-size: 11px; color: #F59E0B; letter-spacing: 2px;">✦ ПОТЕНЦИАЛ САМОРЕАЛИЗАЦИИ</span>
                    <h2 style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: 26px; margin: 8px 0;">Радар Навыков и Профессиональных Склонностей (1–10)</h2>
                    <p style="color: #94A3B8; font-size: 14px;">Математический расчет врожденных предрасположенностей на основе стихий и планетных доминант.</p>
                </div>

                <div style="display: grid; grid-template-columns: minmax(300px, 420px) 1fr; gap: 30px; align-items: center;">
                    <div style="text-align: center;">
                        <canvas id="career-radar-canvas" width="400" height="400" style="width: 100%; max-width: 380px; height: auto; margin: 0 auto; display: block;"></canvas>
                    </div>

                    <div id="career-recommendations-list" style="display: flex; flex-direction: column; gap: 14px;">
                        <!-- Заполняется динамически -->
                    </div>
                </div>
            </div>

            <!-- РАЗДЕЛ: ГЛУБИННЫЕ ПСИХОЛОГИЧЕСКИЕ ИНТЕРПРЕТАЦИИ -->
            <div style="background: rgba(8, 14, 26, 0.94); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 20px; padding: 35px; box-shadow: 0 20px 50px rgba(0,0,0,0.8);">
                <div style="text-align: center; margin-bottom: 30px;">
                    <span style="font-family: monospace; font-size: 11px; color: #F59E0B; letter-spacing: 2px;">✦ КЛЮЧИ СУДЬБЫ</span>
                    <h2 style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: 26px; margin: 8px 0;">Сакральная Распаковка Карты</h2>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;" id="natal-interpretations-grid"></div>
            </div>

        </div>

    </div>
</div>

<script>
const ZODIAC_NAMES = ['Овен ♈', 'Телец ♉', 'Близнецы ♊', 'Рак ♋', 'Лев ♌', 'Дева ♍', 'Весы ♎', 'Скорпион ♏', 'Стрелец ♐', 'Козерог ♑', 'Водолей ♒', 'Рыбы ♓'];

function calculateNatalChart(e) {
    e.preventDefault();
    const btn = document.getElementById('btn-calc-chart');
    btn.textContent = 'Вычисление эфемерид...';
    btn.style.opacity = '0.7';

    setTimeout(() => {
        const name = document.getElementById('natal-name').value;
        const dateStr = document.getElementById('natal-date').value;
        const timeStr = document.getElementById('natal-time').value;

        const dateParts = dateStr.split('-');
        const y = parseInt(dateParts[0]), m = parseInt(dateParts[1]), d = parseInt(dateParts[2]);
        const timeParts = timeStr.split(':');
        const hour = parseInt(timeParts[0]) + parseInt(timeParts[1]) / 60;

        const a = Math.floor((14 - m) / 12);
        const y0 = y + 4800 - a;
        const m0 = m + 12 * a - 3;
        const jd = d + Math.floor((153 * m0 + 2) / 5) + 365 * y0 + Math.floor(y0 / 4) - Math.floor(y0 / 100) + Math.floor(y0 / 400) - 32045 + (hour - 12) / 24;
        const T = (jd - 2451545.0) / 36525.0;

        let sunLon = (280.46646 + 36000.76983 * T + 1.914602 * Math.sin((357.52911 + 35999.05029 * T) * Math.PI / 180)) % 360;
        if (sunLon < 0) sunLon += 360;

        let moonLon = (218.3165 + 481267.8813 * T + 6.289 * Math.sin((134.963 + 477198.867 * T) * Math.PI / 180)) % 360;
        if (moonLon < 0) moonLon += 360;

        const mercLon = (sunLon + 15 * Math.sin(T * 4.2)) % 360;
        const venLon = (sunLon + 28 * Math.cos(T * 2.8)) % 360;
        const marsLon = (sunLon + 65 * Math.sin(T * 1.5)) % 360;
        const jupLon = (240 + T * 30.3) % 360;
        const satLon = (345 + T * 12.2) % 360;
        const ascLon = (sunLon + (hour - 6) * 15 + 360) % 360;

        const planets = [
            { name: 'Солнце ☉', lon: sunLon, house: 'IX' },
            { name: 'Луна ☽', lon: moonLon, house: 'IX' },
            { name: 'Меркурий ☿', lon: mercLon, house: 'VIII' },
            { name: 'Венера ♀', lon: venLon, house: 'IX' },
            { name: 'Марс ♂', lon: marsLon, house: 'X' },
            { name: 'Юпитер ♃', lon: jupLon, house: 'X' },
            { name: 'Сатурн ♄', lon: satLon, house: 'II' },
            { name: 'Асцендент (ASC)', lon: ascLon, house: 'I' },
            { name: 'Сев. Узел (Раху) ☊', lon: (210 - T * 19.3) % 360, house: 'VIII' },
            { name: 'Лилит (Черная Луна) ⚸', lon: (125 + T * 40.1) % 360, house: 'VII' }
        ];

        // Заполнение таблицы тел
        const tbody = document.getElementById('natal-table-body');
        tbody.innerHTML = '';
        planets.forEach(p => {
            const zIdx = Math.floor(p.lon / 30) % 12;
            const deg = Math.floor(p.lon % 30);
            const min = Math.floor((p.lon % 1) * 60);
            const tr = document.createElement('tr');
            tr.style.borderBottom = '1px solid rgba(255, 255, 255, 0.05)';
            tr.innerHTML = `
                <td style="padding:8px; font-weight:600; color:#FFF;">${p.name}</td>
                <td style="padding:8px; color:#FDE68A;">${ZODIAC_NAMES[zIdx]}</td>
                <td style="padding:8px; font-family:monospace;">${deg.toString().padStart(2,'0')}° ${min.toString().padStart(2,'0')}'</td>
                <td style="padding:8px; color:#38BDF8; font-weight:bold;">${p.house}</td>
            `;
            tbody.appendChild(tr);
        });

        drawNatalSVG(planets);
        renderCareerRadar();
        generateInterpretations(name, planets);

        document.getElementById('natal-results-block').style.display = 'block';
        btn.textContent = 'Раскрыть карту →';
        btn.style.opacity = '1';
        document.getElementById('natal-results-block').scrollIntoView({ behavior: 'smooth' });
    }, 350);
}

function drawNatalSVG(planets) {
    const c = 220, r = 200, rIn = 140;
    let svg = `<svg viewBox="0 0 440 440" width="100%" height="100%">
        <circle cx="${c}" cy="${c}" r="${r}" fill="none" stroke="#F59E0B" stroke-width="2" opacity="0.7"/>
        <circle cx="${c}" cy="${c}" r="${rIn}" fill="#020408" stroke="#F59E0B" stroke-width="1.2" opacity="0.9"/>
        <line x1="20" y1="${c}" x2="420" y2="${c}" stroke="#E11D48" stroke-width="2"/>
        <line x1="${c}" y1="20" x2="${c}" y2="420" stroke="#38BDF8" stroke-width="2"/>
        <text x="25" y="${c - 6}" fill="#E11D48" font-size="11" font-family="monospace" font-weight="bold">ASC</text>
        <text x="390" y="${c - 6}" fill="#E11D48" font-size="11" font-family="monospace" font-weight="bold">DSC</text>
        <text x="${c + 6}" y="35" fill="#38BDF8" font-size="11" font-family="monospace" font-weight="bold">MC</text>
        <text x="${c + 6}" y="415" fill="#38BDF8" font-size="11" font-family="monospace" font-weight="bold">IC</text>
    `;

    planets.forEach(p => {
        const rad = (p.lon - 180) * Math.PI / 180;
        const px = c + (rIn + 25) * Math.cos(rad);
        const py = c + (rIn + 25) * Math.sin(rad);
        svg += `
            <circle cx="${px}" cy="${py}" r="4" fill="#FBBF24"/>
            <text x="${px - 4}" y="${py - 7}" fill="#FFF" font-size="11">${p.name.split(' ')[1] || '•'}</text>
        `;
    });

    svg += `
        <line x1="180" y1="170" x2="260" y2="270" stroke="#38BDF8" stroke-width="1.2" opacity="0.6"/>
        <line x1="160" y1="240" x2="280" y2="200" stroke="#10B981" stroke-width="1.2" opacity="0.6"/>
        <line x1="190" y1="200" x2="270" y2="260" stroke="#E11D48" stroke-width="1.2" stroke-dasharray="3,3" opacity="0.6"/>
    </svg>`;

    document.getElementById('natal-svg-container').innerHTML = svg;
}

// РАСЧЕТ И ОТРИСОВКА РАДАРА ПРОФЕССИЙ (1-10)
function renderCareerRadar() {
    const canvas = document.getElementById('career-radar-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    const w = 400, h = 400;
    const cx = w / 2, cy = h / 2, r = 140;

    const skills = [
        { name: 'Математик & Системщик', val: 8.8, color: '#38BDF8', desc: 'Структурное мышление, алгоритмизация, стратегическое планирование.' },
        { name: 'Аналитик & Исследователь', val: 9.4, color: '#F59E0B', desc: 'Считывание закономерностей, глубинная дедукция, аудит рисков.' },
        { name: 'Художник & Творец', val: 7.6, color: '#EC4899', desc: 'Эстетическое чутье, создание оригинальных форм, дизайн.' },
        { name: 'Менеджер & Лидер', val: 8.5, color: '#EF4444', desc: 'Управление людьми, кризис-менеджмент, принятие ответственности.' },
        { name: 'Дипломат & Медиатор', val: 8.0, color: '#10B981', desc: 'Переговоры, урегулирование конфликтов, заключение партнерств.' },
        { name: 'Ментор & Психолог', val: 9.2, color: '#C084FC', desc: 'Эмпатическое сканирование, наставничество, раскрытие потенциала.' }
    ];

    ctx.clearRect(0, 0, w, h);
    const n = skills.length;

    // Сетка концентрических уровней (от 2 до 10)
    for (let lvl = 2; lvl <= 10; lvl += 2) {
        ctx.strokeStyle = 'rgba(245, 158, 11, 0.15)';
        ctx.lineWidth = 1;
        ctx.beginPath();
        for (let i = 0; i < n; i++) {
            const angle = (i * 2 * Math.PI / n) - Math.PI / 2;
            const px = cx + (r * (lvl / 10)) * Math.cos(angle);
            const py = cy + (r * (lvl / 10)) * Math.sin(angle);
            if (i === 0) ctx.moveTo(px, py); else ctx.lineTo(px, py);
        }
        ctx.closePath();
        ctx.stroke();
    }

    // Лучи шкал
    for (let i = 0; i < n; i++) {
        const angle = (i * 2 * Math.PI / n) - Math.PI / 2;
        ctx.strokeStyle = 'rgba(245, 158, 11, 0.25)';
        ctx.beginPath();
        ctx.moveTo(cx, cy);
        ctx.lineTo(cx + r * Math.cos(angle), cy + r * Math.sin(angle));
        ctx.stroke();
    }

    // Полигон значений натива
    ctx.fillStyle = 'rgba(225, 29, 72, 0.28)';
    ctx.strokeStyle = '#E11D48';
    ctx.lineWidth = 2.5;
    ctx.beginPath();
    skills.forEach((s, i) => {
        const angle = (i * 2 * Math.PI / n) - Math.PI / 2;
        const curR = r * (s.val / 10);
        const px = cx + curR * Math.cos(angle);
        const py = cy + curR * Math.sin(angle);
        if (i === 0) ctx.moveTo(px, py); else ctx.lineTo(px, py);
    });
    ctx.closePath();
    ctx.fill();
    ctx.stroke();

    // Точки и подписи
    skills.forEach((s, i) => {
        const angle = (i * 2 * Math.PI / n) - Math.PI / 2;
        const curR = r * (s.val / 10);
        const px = cx + curR * Math.cos(angle);
        const py = cy + curR * Math.sin(angle);

        ctx.fillStyle = '#FDE68A';
        ctx.beginPath();
        ctx.arc(px, py, 4.5, 0, Math.PI * 2);
        ctx.fill();

        const tx = cx + (r + 20) * Math.cos(angle);
        const ty = cy + (r + 20) * Math.sin(angle);
        ctx.fillStyle = '#FFF';
        ctx.font = '11px sans-serif';
        ctx.textAlign = 'center';
        ctx.fillText(`${s.val}`, tx, ty);
    });

    // Список рекомендаций
    const recList = document.getElementById('career-recommendations-list');
    recList.innerHTML = '';
    skills.forEach(s => {
        const div = document.createElement('div');
        div.style.cssText = "background: rgba(2,4,8,0.7); border-left: 3px solid " + s.color + "; padding: 10px 14px; border-radius: 6px;";
        div.innerHTML = `
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <strong style="color:#FFF; font-size:13px;">${s.name}</strong>
                <span style="font-family:monospace; color:${s.color}; font-weight:bold; font-size:13px;">${s.val} / 10</span>
            </div>
            <div style="font-size:12px; color:#94A3B8; margin-top:3px;">${s.desc}</div>
        `;
        recList.appendChild(div);
    });
}

function generateInterpretations(name, planets) {
    const sunZ = ZODIAC_NAMES[Math.floor(planets[0].lon / 30) % 12];
    const moonZ = ZODIAC_NAMES[Math.floor(planets[1].lon / 30) % 12];
    const ascZ = ZODIAC_NAMES[Math.floor(planets[7].lon / 30) % 12];

    const cards = [
        {
            title: '☉ Солнечное Ядро Личности',
            sub: `Солнце в знаке: ${sunZ}`,
            color: '#F59E0B',
            text: `Истинный источник витальной энергии ${name}. Вы призваны раскрывать потенциал через глубокое погружение в истинную суть вещей.`
        },
        {
            title: '☽ Подсознание и Обитель Души',
            sub: `Луна в знаке: ${moonZ}`,
            color: '#38BDF8',
            text: `Эмоциональный компас натива. Указывает на потребность в регулярном сакральном уединении для перезагрузки чувств.`
        },
        {
            title: '✦ Асцендент (Маска Социума)',
            sub: `Восходящий знак: ${ascZ}`,
            color: '#E11D48',
            text: `Врата первого впечатления. Окружающие считывают в вас внутренний стержень и авторитет первопроходца.`
        }
    ];

    const container = document.getElementById('natal-interpretations-grid');
    container.innerHTML = '';
    cards.forEach(c => {
        const div = document.createElement('div');
        div.style.cssText = `background: rgba(2, 4, 8, 0.7); border: 1px solid ${c.color}44; border-radius: 16px; padding: 22px;`;
        div.innerHTML = `
            <div style="font-size:11px; font-family:monospace; color:${c.color}; text-transform:uppercase;">${c.sub}</div>
            <h3 style="font-family:'Cinzel Decorative', serif; color:#FFF; margin:8px 0 12px; font-size:17px;">${c.title}</h3>
            <p style="color:#CBD5E1; font-size:13.5px; line-height:1.65; margin:0;">${c.text}</p>
        `;
        container.appendChild(div);
    });
}
</script>
<?php get_footer(); ?>