<?php
/**
 * Template Name: Astro-Biorhythms Atlas
 * Template Post Type: page
 *
 * ASTRAINA OBSERVATORY — BIORHYTHM ATLAS v10.2
 * Tri-Cyclic Sine Wave Calculator (Physical 23d, Emotional 28d, Intellectual 33d)
 * Zero Cloud Store · Universal Human Vitality Matrix
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
        .ast-bio-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .ast-bio-header {
            text-align: center;
            margin-bottom: 34px;
        }

        .ast-bio-badge {
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

        .ast-bio-title {
            font-family: 'Cinzel Decorative', 'Cinzel', serif;
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 700;
            background: linear-gradient(135deg, #FFF6D6 0%, #F59E0B 50%, #B45309 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0 0 12px 0;
            letter-spacing: 0.05em;
        }

        .ast-bio-desc {
            max-width: 700px;
            margin: 0 auto;
            color: #94A3B8;
            font-size: 15px;
            line-height: 1.6;
        }

        /* Карточка формы ввода */
        .ast-bio-form-card {
            background: rgba(8, 14, 26, 0.85);
            border: 1px solid rgba(245, 158, 11, 0.28);
            border-radius: 20px;
            padding: 26px;
            margin-bottom: 34px;
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.65);
        }

        .ast-bio-inputs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)) auto;
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

        .ast-bio-input {
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

        .ast-bio-input:focus {
            border-color: #F59E0B;
            box-shadow: 0 0 12px rgba(245, 158, 11, 0.25);
        }

        .ast-bio-calc-btn {
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

        .ast-bio-calc-btn:hover {
            background: linear-gradient(135deg, #FBBF24 0%, #F59E0B 100%);
            box-shadow: 0 0 15px rgba(245, 158, 11, 0.4);
            transform: translateY(-1px);
        }

        /* Блок 3-х главных шкал */
        .ast-bio-scores-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 34px;
        }

        .ast-score-card {
            background: rgba(8, 14, 26, 0.82);
            border-radius: 18px;
            padding: 22px;
            backdrop-filter: blur(16px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(245, 158, 11, 0.2);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .ast-sc-phy { border-color: rgba(225, 29, 72, 0.35); }
        .ast-sc-emo { border-color: rgba(16, 185, 129, 0.35); }
        .ast-sc-int { border-color: rgba(56, 189, 248, 0.35); }

        .ast-sc-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .ast-sc-name {
            font-family: 'Space Mono', monospace;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .ast-sc-phy .ast-sc-name { color: #FDA4AF; }
        .ast-sc-emo .ast-sc-name { color: #A7F3D0; }
        .ast-sc-int .ast-sc-name { color: #BAE6FD; }

        .ast-sc-days {
            font-family: 'Space Mono', monospace;
            font-size: 11px;
            color: #64748B;
        }

        .ast-sc-value-row {
            display: flex;
            align-items: baseline;
            gap: 8px;
            margin-bottom: 12px;
        }

        .ast-sc-val {
            font-family: 'Cinzel Decorative', serif;
            font-size: 38px;
            font-weight: 700;
        }

        .ast-sc-phy .ast-sc-val { color: #E11D48; }
        .ast-sc-emo .ast-sc-val { color: #10B981; }
        .ast-sc-int .ast-sc-val { color: #38BDF8; }

        .ast-sc-phase {
            font-family: 'Space Mono', monospace;
            font-size: 11.5px;
            padding: 3px 8px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.05);
        }

        /* Прогресс-бар */
        .ast-sc-bar-bg {
            height: 6px;
            background: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            position: relative;
            margin-bottom: 14px;
        }

        .ast-sc-bar-fill {
            position: absolute;
            top: 0;
            bottom: 0;
            border-radius: 3px;
            transition: width 0.4s ease;
        }

        .ast-sc-phy .ast-sc-bar-fill { background: linear-gradient(90deg, #9F1239, #E11D48); }
        .ast-sc-emo .ast-sc-bar-fill { background: linear-gradient(90deg, #047857, #10B981); }
        .ast-sc-int .ast-sc-bar-fill { background: linear-gradient(90deg, #0284C7, #38BDF8); }

        .ast-sc-advice {
            font-size: 12.5px;
            line-height: 1.5;
            color: #CBD5E1;
            margin: 0;
        }

        /* Контейнер интерактивного SVG-графика */
        .ast-bio-chart-card {
            background: rgba(8, 14, 26, 0.85);
            border: 1px solid rgba(245, 158, 11, 0.28);
            border-radius: 20px;
            padding: 26px;
            margin-bottom: 34px;
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.65);
        }

        .ast-chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 20px;
        }

        .ast-chart-title {
            font-family: 'Cinzel Decorative', serif;
            font-size: 15px;
            color: #FDE68A;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .ast-chart-legend {
            display: flex;
            gap: 16px;
            align-items: center;
            flex-wrap: wrap;
        }

        .ast-legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: 'Space Mono', monospace;
            font-size: 11px;
            color: #94A3B8;
        }

        .ast-legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .ast-svg-wrapper {
            width: 100%;
            overflow-x: auto;
            position: relative;
        }

        #ast-bio-svg {
            width: 100%;
            min-width: 780px;
            height: 320px;
            display: block;
        }

        /* Предупреждение о критических днях */
        .ast-critical-box {
            background: rgba(225, 29, 72, 0.08);
            border: 1px solid rgba(225, 29, 72, 0.3);
            border-radius: 14px;
            padding: 18px 22px;
            margin-top: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .ast-crit-icon {
            font-size: 26px;
            color: #E11D48;
        }

        .ast-crit-text {
            font-size: 13.5px;
            line-height: 1.5;
            color: #FDA4AF;
            margin: 0;
        }

        @media (max-width: 900px) {
            .ast-bio-scores-grid {
                grid-template-columns: 1fr;
            }
            .ast-bio-inputs-grid {
                grid-template-columns: 1fr;
            }
            .ast-bio-calc-btn {
                width: 100%;
            }
        }
    </style>

    <div class="ast-bio-container">

        <header class="ast-bio-header">
            <div class="ast-bio-badge">
                <span style="color: #38BDF8;">✦</span>
                <span>ASTRA-BIORHYTHM ENGINE · МАТРИЦА ЖИЗНЕННОЙ ЭНЕРГИИ</span>
            </div>
            <h1 class="ast-bio-title">Атлас Биоритмов Человека</h1>
            <p class="ast-bio-desc">
                Математический расчет синусоидальных фаз организма. Определение персональных пиков выносливости, эмоциональной устойчивости и критических дней смены циклов.
            </p>
        </header>

        <!-- 1. Панель ввода данных -->
        <div class="ast-bio-form-card">
            <div class="ast-bio-inputs-grid">
                <div class="ast-field-group">
                    <label class="ast-field-label">Дата Рождения Человека</label>
                    <input type="date" id="ast-bio-dob" class="ast-bio-input" value="1995-03-21">
                </div>
                <div class="ast-field-group">
                    <label class="ast-field-label">Дата Анализа</label>
                    <input type="date" id="ast-bio-target" class="ast-bio-input">
                </div>
                <button type="button" class="ast-bio-calc-btn" onclick="calculateBiorhythms()">РАССЧИТАТЬ ЦИКЛЫ ➔</button>
            </div>
        </div>

        <!-- 2. Три главных шкалы текущего состояния -->
        <div class="ast-bio-scores-grid">
            
            <!-- Физический цикл -->
            <div class="ast-score-card ast-sc-phy">
                <div>
                    <div class="ast-sc-top">
                        <span class="ast-sc-name">● Физический Цикл</span>
                        <span class="ast-sc-days">23 Дня</span>
                    </div>
                    <div class="ast-sc-value-row">
                        <span class="ast-sc-val" id="ast-phy-val">0%</span>
                        <span class="ast-sc-phase" id="ast-phy-phase">Анализ...</span>
                    </div>
                    <div class="ast-sc-bar-bg">
                        <div class="ast-sc-bar-fill" id="ast-phy-bar" style="width: 50%; left: 0;"></div>
                    </div>
                </div>
                <p class="ast-sc-advice" id="ast-phy-advice">Загрузка рекомендаций...</p>
            </div>

            <!-- Эмоциональный цикл -->
            <div class="ast-score-card ast-sc-emo">
                <div>
                    <div class="ast-sc-top">
                        <span class="ast-sc-name">● Эмоциональный Цикл</span>
                        <span class="ast-sc-days">28 Дней</span>
                    </div>
                    <div class="ast-sc-value-row">
                        <span class="ast-sc-val" id="ast-emo-val">0%</span>
                        <span class="ast-sc-phase" id="ast-emo-phase">Анализ...</span>
                    </div>
                    <div class="ast-sc-bar-bg">
                        <div class="ast-sc-bar-fill" id="ast-emo-bar" style="width: 50%; left: 0;"></div>
                    </div>
                </div>
                <p class="ast-sc-advice" id="ast-emo-advice">Загрузка рекомендаций...</p>
            </div>

            <!-- Интеллектуальный цикл -->
            <div class="ast-score-card ast-sc-int">
                <div>
                    <div class="ast-sc-top">
                        <span class="ast-sc-name">● Интеллектуальный Цикл</span>
                        <span class="ast-sc-days">33 Дня</span>
                    </div>
                    <div class="ast-sc-value-row">
                        <span class="ast-sc-val" id="ast-int-val">0%</span>
                        <span class="ast-sc-phase" id="ast-int-phase">Анализ...</span>
                    </div>
                    <div class="ast-sc-bar-bg">
                        <div class="ast-sc-bar-fill" id="ast-int-bar" style="width: 50%; left: 0;"></div>
                    </div>
                </div>
                <p class="ast-sc-advice" id="ast-int-advice">Загрузка рекомендаций...</p>
            </div>

        </div>

        <!-- 3. Интерактивный 30-дневный SVG график -->
        <div class="ast-bio-chart-card">
            <div class="ast-chart-header">
                <div class="ast-chart-title">Горизонт Колебаний (30 Дней: ±15 Дней от выбранной даты)</div>
                <div class="ast-chart-legend">
                    <div class="ast-legend-item">
                        <span class="ast-legend-dot" style="background: #E11D48;"></span>
                        <span>Физический (23д)</span>
                    </div>
                    <div class="ast-legend-item">
                        <span class="ast-legend-dot" style="background: #10B981;"></span>
                        <span>Эмоциональный (28д)</span>
                    </div>
                    <div class="ast-legend-item">
                        <span class="ast-legend-dot" style="background: #38BDF8;"></span>
                        <span>Интеллектуальный (33д)</span>
                    </div>
                </div>
            </div>

            <div class="ast-svg-wrapper">
                <svg id="ast-bio-svg" viewBox="0 0 900 320" preserveAspectRatio="none">
                    <!-- Разметка генерируется через JS -->
                </svg>
            </div>

            <!-- Предупреждение о критических днях -->
            <div class="ast-critical-box" id="ast-critical-alert" style="display: none;">
                <div class="ast-crit-icon">⚠️</div>
                <p class="ast-crit-text" id="ast-crit-msg">Обнаружены критические дни смены циклов.</p>
            </div>
        </div>

    </div>
</div>

<script>
(function() {
    // Инициализация сегодняшней даты
    const today = new Date();
    const todayStr = today.toISOString().split('T')[0];
    const targetInput = document.getElementById('ast-bio-target');
    const dobInput = document.getElementById('ast-bio-dob');

    targetInput.value = todayStr;

    // Восстановление из localStorage
    const savedDob = localStorage.getItem('ast_bio_dob');
    if (savedDob) {
        dobInput.value = savedDob;
    }

    function getCycleAdvice(val, type) {
        if (Math.abs(val) <= 10) {
            return '⚠️ КРИТИЧЕСКИЙ ДЕНЬ (0%): Точка смены фазы. Снижена концентрация, избегайте спешки и перегрузок.';
        }
        if (val > 50) {
            if (type === 'phy') return 'Фаза пика: идеальное время для высокоинтенсивного спорта, физической работы и выносливости.';
            if (type === 'emo') return 'Эмоциональный подъем: высокая харизма, время для публичных выступлений, романтики и вдохновения.';
            if (type === 'int') return 'Ясность ума: прекрасный период для изучения сложных дисциплин, кодинга, аудита и стратегий.';
        } else if (val > 0) {
            if (type === 'phy') return 'Восходящая фаза: силы прибавляются, хорошее время для старта умеренных тренировок.';
            if (type === 'emo') return 'Позитивный тонус: гармоничный контакт с окружающими, благоприятно для переговоров.';
            if (type === 'int') return 'Рабочий режим: мозг хорошо удерживает факты и решает текущие аналитические задачи.';
        } else if (val > -50) {
            if (type === 'phy') return 'Нисходящая фаза: распределяйте силы, избегайте переутомления, пейте больше воды.';
            if (type === 'emo') return 'Фаза накопления: потребность в спокойствии, не вступайте в эмоциональные споры.';
            if (type === 'int') return 'Рутинный период: занимайтесь наведением порядка, систематизацией, отложите резкие решения.';
        } else {
            if (type === 'phy') return 'Дно фазы: глубокая регенерация. Сон не менее 8 часов, показаны массаж, спа и покой.';
            if (type === 'emo') return 'Уязвимость: фокус на внутренней психологической безопасности и комфорте дома.';
            if (type === 'int') return 'Перезагрузка: возможна рассеянность. Проверяйте документы дважды перед отправкой.';
        }
    }

    function getPhaseLabel(val) {
        if (Math.abs(val) <= 10) return 'КРИТИЧЕСКИЙ';
        if (val > 50) return 'ПИК (+)';
        if (val > 0) return 'ПОДЪЕМ';
        if (val > -50) return 'СПАД';
        return 'МИНИМУМ (-)';
    }

    window.calculateBiorhythms = function() {
        const dobVal = dobInput.value;
        const targetVal = targetInput.value;

        if (!dobVal || !targetVal) return;

        localStorage.setItem('ast_bio_dob', dobVal);

        const dob = new Date(dobVal);
        const target = new Date(targetVal);

        // Разница в днях
        const diffMs = target.getTime() - dob.getTime();
        const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));

        if (diffDays < 0) {
            alert('Дата анализа не может быть раньше даты рождения Человека.');
            return;
        }

        // 1. Расчет значений для выбранного дня
        const phyVal = Math.round(Math.sin((2 * Math.PI * diffDays) / 23) * 100);
        const emoVal = Math.round(Math.sin((2 * Math.PI * diffDays) / 28) * 100);
        const intVal = Math.round(Math.sin((2 * Math.PI * diffDays) / 33) * 100);

        // Обновление карточек
        updateScoreCard('phy', phyVal);
        updateScoreCard('emo', emoVal);
        updateScoreCard('int', intVal);

        // 2. Построение 30-дневного графика
        renderBiorhythmChart(diffDays, target);
    };

    function updateScoreCard(type, val) {
        const valEl = document.getElementById(`ast-${type}-val`);
        const phaseEl = document.getElementById(`ast-${type}-phase`);
        const barEl = document.getElementById(`ast-${type}-bar`);
        const adviceEl = document.getElementById(`ast-${type}-advice`);

        valEl.textContent = (val > 0 ? '+' : '') + val + '%';
        phaseEl.textContent = getPhaseLabel(val);
        adviceEl.textContent = getCycleAdvice(val, type);

        // Нормализация для прогресс-бара (0-100%)
        const normWidth = Math.round((val + 100) / 2);
        barEl.style.width = normWidth + '%';
    }

    function renderBiorhythmChart(centerDays, targetDate) {
        const svg = document.getElementById('ast-bio-svg');
        svg.innerHTML = '';

        const width = 900;
        const height = 320;
        const midY = 160;
        const ampY = 120; // Амплитуда ±100%

        const daysSpan = 30; // 30 дней (от -15 до +14)
        const stepX = width / (daysSpan - 1);

        // Фоновая сетка: 0% линия, +100%, -100%
        let gridHtml = `
            <line x1="0" y1="${midY - ampY}" x2="${width}" y2="${midY - ampY}" stroke="rgba(255,255,255,0.06)" stroke-dasharray="4,4"/>
            <line x1="0" y1="${midY}" x2="${width}" y2="${midY}" stroke="rgba(245,158,11,0.25)" stroke-width="1.5"/>
            <line x1="0" y1="${midY + ampY}" x2="${width}" y2="${midY + ampY}" stroke="rgba(255,255,255,0.06)" stroke-dasharray="4,4"/>
            <text x="10" y="${midY - ampY + 14}" fill="#64748B" font-family="Space Mono" font-size="10">+100%</text>
            <text x="10" y="${midY - 6}" fill="#F59E0B" font-family="Space Mono" font-size="10">0%</text>
            <text x="10" y="${midY + ampY - 6}" fill="#64748B" font-family="Space Mono" font-size="10">-100%</text>
        `;

        let phyPath = '';
        let emoPath = '';
        let intPath = '';
        let criticalDays = [];

        for (let i = 0; i < daysSpan; i++) {
            const curDayOffset = i - 15;
            const curTotalDays = centerDays + curDayOffset;
            const x = i * stepX;

            const pVal = Math.sin((2 * Math.PI * curTotalDays) / 23);
            const eVal = Math.sin((2 * Math.PI * curTotalDays) / 28);
            const iVal = Math.sin((2 * Math.PI * curTotalDays) / 33);

            const py = midY - (pVal * ampY);
            const ey = midY - (eVal * ampY);
            const iy = midY - (iVal * ampY);

            if (i === 0) {
                phyPath += `M ${x} ${py}`;
                emoPath += `M ${x} ${ey}`;
                intPath += `M ${x} ${iy}`;
            } else {
                phyPath += ` L ${x} ${py}`;
                emoPath += ` L ${x} ${ey}`;
                intPath += ` L ${x} ${iy}`;
            }

            // Поиск критических точек (пересечение нуля в пределах 2-х дней)
            if (curDayOffset >= 0 && curDayOffset <= 14) {
                if (Math.abs(pVal) < 0.12) criticalDays.push(`Физический (${curDayOffset === 0 ? 'Сегодня' : '+' + curDayOffset + ' дн.'})`);
                if (Math.abs(eVal) < 0.12) criticalDays.push(`Эмоциональный (${curDayOffset === 0 ? 'Сегодня' : '+' + curDayOffset + ' дн.'})`);
                if (Math.abs(iVal) < 0.12) criticalDays.push(`Интеллектуальный (${curDayOffset === 0 ? 'Сегодня' : '+' + curDayOffset + ' дн.'})`);
            }

            // Вертикальная линия дней
            if (i % 3 === 0) {
                const dateObj = new Date(targetDate);
                dateObj.setDate(dateObj.getDate() + curDayOffset);
                const dStr = dateObj.getDate() + '.' + (dateObj.getMonth() + 1);
                gridHtml += `
                    <line x1="${x}" y1="20" x2="${x}" y2="300" stroke="rgba(255,255,255,0.04)"/>
                    <text x="${x}" y="315" fill="#64748B" font-family="Space Mono" font-size="9.5" text-anchor="middle">${dStr}</text>
                `;
            }
        }

        // Лазерная вертикальная линия сегодняшнего/целевого дня (i = 15)
        const targetX = 15 * stepX;
        gridHtml += `
            <line x1="${targetX}" y1="10" x2="${targetX}" y2="305" stroke="#F59E0B" stroke-width="2" stroke-dasharray="3,3"/>
            <rect x="${targetX - 35}" y="8" width="70" height="18" rx="4" fill="#F59E0B"/>
            <text x="${targetX}" y="21" fill="#020408" font-family="Space Mono" font-size="10" font-weight="bold" text-anchor="middle">ВЫБРАН</text>
        `;

        svg.innerHTML = gridHtml + `
            <path d="${phyPath}" fill="none" stroke="#E11D48" stroke-width="2.5" stroke-linecap="round" filter="drop-shadow(0 0 6px rgba(225,29,72,0.4))"/>
            <path d="${emoPath}" fill="none" stroke="#10B981" stroke-width="2.5" stroke-linecap="round" filter="drop-shadow(0 0 6px rgba(16,185,129,0.4))"/>
            <path d="${intPath}" fill="none" stroke="#38BDF8" stroke-width="2.5" stroke-linecap="round" filter="drop-shadow(0 0 6px rgba(56,189,248,0.4))"/>
        `;

        // Предупреждение о критических днях
        const critBox = document.getElementById('ast-critical-alert');
        const critMsg = document.getElementById('ast-crit-msg');
        if (criticalDays.length > 0) {
            critBox.style.display = 'flex';
            critMsg.innerHTML = '<strong>Внимание! Ближайшие критические дни смены фаз (0%):</strong> ' + criticalDays.join(', ') + '. В эти дни возможны спады концентрации и повышенная утомляемость.';
        } else {
            critBox.style.display = 'none';
        }
    }

    // Первый авто-расчет
    calculateBiorhythms();
})();
</script>

<?php
get_footer();