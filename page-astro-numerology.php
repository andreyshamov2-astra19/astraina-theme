<?php
/**
 * Template Name: Astro-Numerology Atlas
 * Template Post Type: page
 *
 * ASTRAINA OBSERVATORY — NUMEROLOGY & PYTHAGOREAN MATRIX v10.2
 * Life Path Number (1-9, Master Numbers 11, 22, 33) + 3x3 Psychomatrix
 * Zero Cloud Store · Universal Human Destiny Matrix
 *
 * @package AstrainaTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- БЕЗОПАСНАЯ ИЗОЛИРОВАННАЯ ОБЕРТКА КОНТЕНТА (z-index: 10) -->
<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; padding-top: 104px; padding-bottom: 90px;">

    <style>
        .ast-num-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .ast-num-header {
            text-align: center;
            margin-bottom: 34px;
        }

        .ast-num-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border-radius: 20px;
            background: rgba(8, 14, 26, 0.85);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: #FDE68A;
            font-family: 'Space Mono', monospace;
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .ast-num-title {
            font-family: 'Cinzel Decorative', 'Cinzel', serif;
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 700;
            background: linear-gradient(135deg, #FFF6D6 0%, #F59E0B 50%, #B45309 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0 0 12px 0;
            letter-spacing: 0.05em;
        }

        .ast-num-desc {
            max-width: 720px;
            margin: 0 auto;
            color: #94A3B8;
            font-size: 15px;
            line-height: 1.6;
        }

        /* Форма ввода */
        .ast-num-form-card {
            background: rgba(8, 14, 26, 0.85);
            border: 1px solid rgba(245, 158, 11, 0.28);
            border-radius: 20px;
            padding: 26px;
            margin-bottom: 34px;
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.65);
        }

        .ast-num-inputs-grid {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 18px;
            align-items: end;
        }

        .ast-field-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .ast-field-label {
            font-family: 'Space Mono', monospace;
            font-size: 11px;
            color: #FDE68A;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .ast-num-input {
            background: rgba(2, 4, 8, 0.85);
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 10px;
            padding: 12px 14px;
            color: #FEF3C7;
            font-family: 'Space Mono', monospace;
            font-size: 13.5px;
            outline: none;
            box-sizing: border-box;
            transition: border-color 0.2s ease;
        }

        .ast-num-input:focus {
            border-color: #F59E0B;
            box-shadow: 0 0 12px rgba(245, 158, 11, 0.25);
        }

        .ast-num-calc-btn {
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
            border: none;
            border-radius: 10px;
            padding: 13px 26px;
            color: #020408;
            font-family: 'Space Mono', monospace;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s ease;
            height: 44px;
            white-space: nowrap;
        }

        .ast-num-calc-btn:hover {
            background: linear-gradient(135deg, #FBBF24 0%, #F59E0B 100%);
            box-shadow: 0 0 15px rgba(245, 158, 11, 0.4);
            transform: translateY(-1px);
        }

        /* Блок главных чисел */
        .ast-main-numbers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 20px;
            margin-bottom: 34px;
        }

        .ast-num-card {
            background: rgba(8, 14, 26, 0.82);
            border-radius: 18px;
            padding: 24px;
            backdrop-filter: blur(16px);
            border: 1px solid rgba(245, 158, 11, 0.22);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .ast-num-circle {
            width: 82px;
            height: 82px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.2) 0%, rgba(8, 14, 26, 0.9) 100%);
            border: 2px solid #F59E0B;
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.35);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .ast-num-digit {
            font-family: 'Cinzel Decorative', serif;
            font-size: 32px;
            font-weight: 700;
            color: #FEF3C7;
            line-height: 1;
        }

        .ast-num-type-badge {
            font-family: 'Space Mono', monospace;
            font-size: 8.5px;
            color: #F59E0B;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .ast-num-info {
            flex: 1;
        }

        .ast-num-info-title {
            font-family: 'Cinzel Decorative', serif;
            font-size: 15px;
            color: #FDE68A;
            margin: 0 0 6px 0;
            letter-spacing: 0.5px;
        }

        .ast-num-info-archetype {
            font-family: 'Space Mono', monospace;
            font-size: 12px;
            color: #38BDF8;
            margin-bottom: 6px;
        }

        .ast-num-info-desc {
            font-size: 12.5px;
            color: #94A3B8;
            line-height: 1.5;
            margin: 0;
        }

        /* Раздел Психоматрицы Пифагора */
        .ast-matrix-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 26px;
            margin-bottom: 34px;
        }

        .ast-matrix-card {
            background: rgba(8, 14, 26, 0.85);
            border: 1px solid rgba(245, 158, 11, 0.28);
            border-radius: 20px;
            padding: 26px;
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.65);
        }

        .ast-sec-title {
            font-family: 'Cinzel Decorative', serif;
            font-size: 16px;
            color: #FDE68A;
            margin: 0 0 18px 0;
            letter-spacing: 1px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* 3x3 Сетка */
        .ast-pyth-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            aspect-ratio: 1 / 1;
            max-width: 440px;
            margin: 0 auto;
        }

        .ast-cell {
            background: rgba(2, 4, 8, 0.7);
            border: 1px solid rgba(245, 158, 11, 0.2);
            border-radius: 12px;
            padding: 12px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.25s ease;
            position: relative;
        }

        .ast-cell:hover {
            border-color: #F59E0B;
            box-shadow: 0 0 15px rgba(245, 158, 11, 0.25);
            transform: scale(1.02);
        }

        .ast-cell-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ast-cell-num {
            font-family: 'Space Mono', monospace;
            font-size: 11px;
            color: #64748B;
        }

        .ast-cell-name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 10px;
            color: #FDE68A;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .ast-cell-digits {
            font-family: 'Space Mono', monospace;
            font-size: 22px;
            font-weight: 700;
            color: #FEF3C7;
            text-align: center;
            margin: 8px 0;
            letter-spacing: 3px;
        }

        .ast-cell-empty {
            color: #334155;
            font-size: 15px;
        }

        .ast-cell-strength {
            font-family: 'Space Mono', monospace;
            font-size: 9.5px;
            text-align: center;
            padding: 2px 4px;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.05);
            color: #94A3B8;
        }

        /* Линии матрицы */
        .ast-lines-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .ast-line-item {
            background: rgba(2, 4, 8, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 12px;
            padding: 14px 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ast-line-title {
            font-family: 'Space Mono', monospace;
            font-size: 12px;
            color: #FEF3C7;
            margin-bottom: 4px;
        }

        .ast-line-sub {
            font-size: 11.5px;
            color: #64748B;
        }

        .ast-line-score-badge {
            font-family: 'Cinzel Decorative', serif;
            font-size: 20px;
            font-weight: 700;
            color: #38BDF8;
            padding-left: 14px;
        }

        @media (max-width: 900px) {
            .ast-matrix-section {
                grid-template-columns: 1fr;
            }
            .ast-num-inputs-grid {
                grid-template-columns: 1fr;
            }
            .ast-num-calc-btn {
                width: 100%;
            }
        }
    </style>

    <div class="ast-num-container">

        <header class="ast-num-header">
            <div class="ast-num-badge">
                <span style="color: #F59E0B;">✦</span>
                <span>ASTRA-NUMEROLOGY CORE · САКРАЛЬНАЯ МАТЕМАТИКА</span>
            </div>
            <h1 class="ast-num-title">Нумерологический Атлас Судьбы</h1>
            <p class="ast-num-desc">
                Декодирование вибрационных кодов Личности. Определение Числа Жизненного Пути, Мастер-Вибраций и расчет 9 силовых качеств по Психоматрице Пифагора.
            </p>
        </header>

        <!-- 1. Панель ввода -->
        <div class="ast-num-form-card">
            <div class="ast-num-inputs-grid">
                <div class="ast-field-group">
                    <label class="ast-field-label">Имя Человека (для Числа Имени)</label>
                    <input type="text" id="ast-num-name" class="ast-num-input" placeholder="Например: Александр" value="Астраина">
                </div>
                <div class="ast-field-group">
                    <label class="ast-field-label">Дата Рождения Человека</label>
                    <input type="date" id="ast-num-dob" class="ast-num-input" value="1995-03-21">
                </div>
                <button type="button" class="ast-num-calc-btn" onclick="calculateNumerology()">РАССЧИТАТЬ МАТРИЦУ ➔</button>
            </div>
        </div>

        <!-- 2. Главные вибрации -->
        <div class="ast-main-numbers-grid">
            
            <!-- Число Жизненного Пути -->
            <div class="ast-num-card">
                <div class="ast-num-circle">
                    <span class="ast-num-digit" id="ast-lp-digit">3</span>
                    <span class="ast-num-type-badge">ЧЖП</span>
                </div>
                <div class="ast-num-info">
                    <h3 class="ast-num-info-title">Число Жизненного Пути</h3>
                    <div class="ast-num-info-archetype" id="ast-lp-title">Архетип: Творец и Вдохновитель</div>
                    <p class="ast-num-info-desc" id="ast-lp-desc">Главный вектор эволюции души. Раскрывает врожденную миссию и сферу высшей самореализации.</p>
                </div>
            </div>

            <!-- Число Имени -->
            <div class="ast-num-card">
                <div class="ast-num-circle" style="border-color: #38BDF8; box-shadow: 0 0 20px rgba(56,189,248,0.35);">
                    <span class="ast-num-digit" id="ast-dest-digit" style="color: #BAE6FD;">7</span>
                    <span class="ast-num-type-badge" style="color: #38BDF8;">ИМЯ</span>
                </div>
                <div class="ast-num-info">
                    <h3 class="ast-num-info-title">Число Экспрессии (Имени)</h3>
                    <div class="ast-num-info-archetype" id="ast-dest-title" style="color: #38BDF8;">Архетип: Мыслитель и Мистик</div>
                    <p class="ast-num-info-desc" id="ast-dest-desc">Инструмент проявления в социуме: через какие качества и таланты Человек заявляет о себе миру.</p>
                </div>
            </div>

        </div>

        <!-- 3. Психоматрица Пифагора (Сетка 3x3) и Силовые Линии -->
        <div class="ast-matrix-section">
            
            <!-- Квадрат 3x3 -->
            <div class="ast-matrix-card">
                <h2 class="ast-sec-title">
                    <span style="color: #F59E0B;">◈</span>
                    <span>Психоматрица Пифагора (9 Качеств)</span>
                </h2>
                
                <div class="ast-pyth-grid" id="ast-pyth-grid">
                    <!-- Заполняется динамически -->
                </div>
            </div>

            <!-- Силовые линии матрицы -->
            <div class="ast-matrix-card">
                <h2 class="ast-sec-title">
                    <span style="color: #38BDF8;">◈</span>
                    <span>Баланс 8 Силовых Линий</span>
                </h2>

                <div class="ast-lines-list" id="ast-lines-list">
                    <!-- Заполняется динамически -->
                </div>
            </div>

        </div>

    </div>
</div>

<script>
(function() {
    const dobInput = document.getElementById('ast-num-dob');
    const nameInput = document.getElementById('ast-num-name');

    // Восстановление из localStorage
    const savedDob = localStorage.getItem('ast_num_dob');
    const savedName = localStorage.getItem('ast_num_name');
    if (savedDob) dobInput.value = savedDob;
    if (savedName) nameInput.value = savedName;

    // Описания Чисел Жизненного Пути
    const lifePathData = {
        1: { title: "Архетип: Первопроходец и Лидер", desc: "Путь автономности, инициативы и смелости. Призвание — вести за собой, создавать новые парадигмы и не зависеть от чужих оценок." },
        2: { title: "Архетип: Миротворец и Дипломат", desc: "Путь баланса, глубокой эмпатии и тонкого партнерства. Дар соединять противоположности и чувствовать скрытые течения в людях." },
        3: { title: "Архетип: Творец и Экспрессия", desc: "Путь самовыражения, слова, искусства и радости. Способность превращать идеи в яркие визуальные и смысловые образы." },
        4: { title: "Архетип: Архитектор и Фундамент", desc: "Путь методичного созидания, надежности и структуры. Умение материализовать самые сложные проекты в осязаемый результат." },
        5: { title: "Архетип: Искатель Свободы", desc: "Путь трансформаций, путешествий, познания мира и гибкости. Мастер перемен, способный легко адаптироваться к любым вызовам эпохи." },
        6: { title: "Архетип: Хранитель и Наставник", desc: "Путь служения, гармонии, красоты и безусловной поддержки. Создатель уюта, исцеляющей среды и этических стандартов." },
        7: { title: "Архетип: Мыслитель и Философ", desc: "Путь глубинной мудрости, исследования тайн вселенной и анализа. Умение видеть невидимое и докапываться до первопричин." },
        8: { title: "Архетип: Владыка Материи", desc: "Путь большого масштаба, стратегического управления и финансовой мощи. Способность управлять мощными потоками энергии." },
        9: { title: "Архетип: Гуманист и Мудрец", desc: "Путь глобального альтруизма, завершения циклов и духовного просвещения. Дар служить благу всего человечества." },
        11: { title: "Мастер-Число 11: Духовный Проводник", desc: "Сверхчувствительность, канал озарений и интуиции. Призвание — вдохновлять массы и нести свет трансформации сознания." },
        22: { title: "Мастер-Число 22: Великий Строитель", desc: "Способность воплощать масштабные духовные и планетарные концепции в конкретные физические монументы и системы." },
        33: { title: "Мастер-Число 33: Учитель Безусловной Любви", desc: "Высшее посвящение служения миру, исцеление сердец и трансляция сакральной космической гармонии." }
    };

    // Буквенно-числовая таблица (кириллица и латиница)
    function charToNum(ch) {
        ch = ch.toUpperCase();
        const map = {
            'А':1,'И':1,'С':1,'Ъ':1,'A':1,'J':1,'S':1,
            'Б':2,'Й':2,'Т':2,'Ы':2,'B':2,'K':2,'T':2,
            'В':3,'К':3,'У':3,'Ь':3,'C':3,'L':3,'U':3,
            'Г':4,'Л':4,'Ф':4,'Э':4,'D':4,'M':4,'V':4,
            'Д':5,'М':5,'Х':5,'Ю':5,'E':5,'N':5,'W':5,
            'Е':6,'Н':6,'Ц':6,'Я':6,'F':6,'O':6,'X':6,
            'Ё':7,'О':7,'Ч':7,'G':7,'P':7,'Y':7,
            'Ж':8,'П':8,'Ш':8,'H':8,'Q':8,'Z':8,
            'З':9,'Р':9,'Щ':9,'I':9,'R':9
        };
        return map[ch] || 0;
    }

    function reduceNum(n, allowMaster = true) {
        if (allowMaster && (n === 11 || n === 22 || n === 33)) return n;
        while (n > 9) {
            let sum = 0;
            String(n).split('').forEach(d => sum += parseInt(d));
            n = sum;
            if (allowMaster && (n === 11 || n === 22 || n === 33)) return n;
        }
        return n;
    }

    window.calculateNumerology = function() {
        const dobVal = dobInput.value;
        const nameVal = nameInput.value.trim();

        if (!dobVal) return;

        localStorage.setItem('ast_num_dob', dobVal);
        localStorage.setItem('ast_num_name', nameVal);

        const parts = dobVal.split('-');
        const y = parseInt(parts[0]);
        const m = parseInt(parts[1]);
        const d = parseInt(parts[2]);

        // 1. Расчет Числа Жизненного Пути
        const redD = reduceNum(d, false);
        const redM = reduceNum(m, false);
        const redY = reduceNum(y, false);
        const lpNum = reduceNum(redD + redM + redY, true);

        const lpInfo = lifePathData[lpNum] || lifePathData[reduceNum(lpNum, false)] || lifePathData[1];
        document.getElementById('ast-lp-digit').textContent = lpNum;
        document.getElementById('ast-lp-title').textContent = lpInfo.title;
        document.getElementById('ast-lp-desc').textContent = lpInfo.desc;

        // 2. Расчет Числа Имени
        let nameSum = 0;
        if (nameVal) {
            for (let c of nameVal) {
                nameSum += charToNum(c);
            }
        }
        const destNum = nameSum > 0 ? reduceNum(nameSum, true) : lpNum;
        const destInfo = lifePathData[destNum] || lifePathData[reduceNum(destNum, false)] || lifePathData[7];
        document.getElementById('ast-dest-digit').textContent = destNum;
        document.getElementById('ast-dest-title').textContent = destInfo.title;
        document.getElementById('ast-dest-desc').textContent = destInfo.desc;

        // 3. Расчет Психоматрицы Пифагора
        renderPythagoreanMatrix(d, m, y);
    };

    function renderPythagoreanMatrix(d, m, y) {
        // Формирование строки всех цифр даты рождения
        const dStr = (d < 10 ? '0' : '') + d;
        const mStr = (m < 10 ? '0' : '') + m;
        const yStr = String(y);
        const dateDigits = dStr + mStr + yStr;

        // Рабочие числа Пифагора
        // 1-е: сумма всех цифр даты
        let w1 = 0;
        for (let c of dateDigits) w1 += parseInt(c);

        // 2-е: сумма цифр 1-го числа
        let w2 = 0;
        for (let c of String(w1)) w2 += parseInt(c);

        // 3-е: 1-е число минус удвоенная первая значащая цифра дня
        const firstDigitOfDay = parseInt(dStr[0] !== '0' ? dStr[0] : dStr[1]);
        const w3 = w1 - (2 * firstDigitOfDay);

        // 4-е: сумма цифр 3-го числа
        let w4 = 0;
        for (let c of String(Math.abs(w3))) w4 += parseInt(c);

        // Общий пул цифр
        const allDigitsStr = dateDigits + String(w1) + String(w2) + String(w3) + String(w4);

        // Подсчет количества каждой цифры (от 1 до 9)
        const counts = { 1:0, 2:0, 3:0, 4:0, 5:0, 6:0, 7:0, 8:0, 9:0 };
        for (let c of allDigitsStr) {
            const digit = parseInt(c);
            if (digit >= 1 && digit <= 9) {
                counts[digit]++;
            }
        }

        // Данные ячеек матрицы
        const cellsMeta = [
            { num: 1, name: "Характер", desc: "Воля и лидерство" },
            { num: 4, name: "Здоровье", desc: "Физическая стать" },
            { num: 7, name: "Удача", desc: "Знак судьбы" },
            { num: 2, name: "Энергия", desc: "Биополе и контакт" },
            { num: 5, name: "Логика", desc: "Интуиция и расчет" },
            { num: 8, name: "Долг", desc: "Ответственность" },
            { num: 3, name: "Интерес", desc: "Науки и творчество" },
            { num: 6, name: "Труд", desc: "Мастерство рук" },
            { num: 9, name: "Память", desc: "Ясность интеллекта" }
        ];

        // Отрисовка сетки 3x3
        const gridEl = document.getElementById('ast-pyth-grid');
        gridEl.innerHTML = '';

        cellsMeta.forEach(meta => {
            const cnt = counts[meta.num];
            let digitsText = cnt > 0 ? String(meta.num).repeat(cnt) : '—';
            let strengthLabel = 'Норма';
            let badgeBg = 'rgba(255,255,255,0.05)';

            if (cnt === 0) {
                strengthLabel = 'Дефицит';
                badgeBg = 'rgba(225, 29, 72, 0.15); color: #FDA4AF';
            } else if (cnt >= 3) {
                strengthLabel = 'Избыток';
                badgeBg = 'rgba(245, 158, 11, 0.2); color: #FDE68A';
            }

            const cellDiv = document.createElement('div');
            cellDiv.className = 'ast-cell';
            cellDiv.innerHTML = `
                <div class="ast-cell-header">
                    <span class="ast-cell-num">${meta.num}</span>
                    <span class="ast-cell-name">${meta.name}</span>
                </div>
                <div class="ast-cell-digits ${cnt === 0 ? 'ast-cell-empty' : ''}">${digitsText}</div>
                <div class="ast-cell-strength" style="background: ${badgeBg};">${strengthLabel} (${cnt})</div>
            `;
            gridEl.appendChild(cellDiv);
        });

        // 4. Отрисовка силовых линий матрицы
        renderMatrixLines(counts);
    }

    function renderMatrixLines(c) {
        const lines = [
            { name: "Линия Целеустремленности (1-4-7)", val: c[1] + c[4] + c[7], sub: "Способность ставить задачи и достигать их вопреки препятствиям" },
            { name: "Линия Семьи и Дома (2-5-8)", val: c[2] + c[5] + c[8], sub: "Стремление к верности, созданию домашнего очага и надежных союзов" },
            { name: "Линия Стабильности и Привычек (3-6-9)", val: c[3] + c[6] + c[9], sub: "Опора на традиции, постоянство, бытовое спокойствие" },
            { name: "Столбец Самооценки (1-2-3)", val: c[1] + c[2] + c[3], sub: "Уверенность в своих талантах и ощущение личной значимости" },
            { name: "Столбец Быта и Финансов (4-5-6)", val: c[4] + c[5] + c[6], sub: "Практичность, управление бюджетом и материальная хватка" },
            { name: "Столбец Таланта (7-8-9)", val: c[7] + c[8] + c[9], sub: "Одаренность высшими способностями и оригинальность мышления" },
            { name: "Диагональ Темперамента (3-5-7)", val: c[3] + c[5] + c[7], sub: "Чувственность, страстность и сексуальная притягательность" },
            { name: "Диагональ Духовности (1-5-9)", val: c[1] + c[5] + c[9], sub: "Потребность в высших смыслах, связи с космосом и развитии души" }
        ];

        const linesEl = document.getElementById('ast-lines-list');
        linesEl.innerHTML = '';

        lines.forEach(line => {
            const item = document.createElement('div');
            item.className = 'ast-line-item';
            item.innerHTML = `
                <div>
                    <div class="ast-line-title">${line.name}</div>
                    <div class="ast-line-sub">${line.sub}</div>
                </div>
                <div class="ast-line-score-badge">${line.val}</div>
            `;
            linesEl.appendChild(item);
        });
    }

    // Первый авто-расчет
    calculateNumerology();
})();
</script>

<?php
get_footer();