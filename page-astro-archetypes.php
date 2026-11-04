<?php
/**
 * Template Name: 16 Архетипов Юнга & Звезды
 * Architecture: Samhain Obsidian & Cosmic Gold · Interactive Diagnostic Quiz + 16 Profiles
 */
get_header(); ?>
<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 85vh; padding: 40px 20px 80px;">
    <div style="max-width: 1250px; margin: 0 auto;">
        
        <div style="text-align: center; margin-bottom: 35px;">
            <span style="font-family: monospace; font-size: 11px; color: #F59E0B; letter-spacing: 2px;">✦ ГЛУБИННАЯ АСТРОПСИХОЛОГИЯ КАРЛА ЮНГА</span>
            <h1 style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: 34px; margin: 12px 0;">Атлас 16 Архетипов и Тест Сакрального Кода</h1>
            <p style="color: #94A3B8; max-width: 720px; margin: 0 auto; font-size: 15px;">Пройдите глубинное юнгианское тестирование, определите персональный Архетип Души, зафиксируйте его в профиле и подключите к астрологическим транзитам.</p>
        </div>

        <!-- МОДУЛЬ ОПРОСНИКА ЮНГА -->
        <div id="quiz-container" style="background: rgba(8, 14, 26, 0.94); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 20px; padding: 35px; margin-bottom: 50px; box-shadow: 0 20px 50px rgba(0,0,0,0.85);">
            <div id="quiz-intro-box" style="text-align: center;">
                <span style="font-size: 40px;">🏛️</span>
                <h3 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; font-size: 24px; margin: 12px 0;">Диагностика Ведущего Архетипа</h3>
                <p style="color: #CBD5E1; max-width: 600px; margin: 0 auto 24px; font-size: 14.5px; line-height: 1.6;">
                    8 ключевых вопросов по дихотомиям Юнга: Энергия, Восприятие, Принятие Решений и Жизненный Ритм.
                </p>
                <button type="button" onclick="startArchetypeQuiz()" style="background: linear-gradient(135deg, #E11D48 0%, #9F1239 100%); color: #FFF; font-weight: 700; border: none; padding: 14px 32px; border-radius: 30px; cursor: pointer; text-transform: uppercase; font-size: 13px; letter-spacing: 1px; box-shadow: 0 0 25px rgba(225,29,72,0.4);">
                    Начать тестирование →
                </button>
            </div>

            <div id="quiz-step-box" style="display: none;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <span id="quiz-progress-text" style="font-family: monospace; font-size: 12px; color: #F59E0B;">ВОПРОС 1 ИЗ 8</span>
                    <div style="width: 200px; height: 6px; background: rgba(255,255,255,0.1); border-radius: 3px; overflow: hidden;">
                        <div id="quiz-progress-bar" style="width: 12.5%; height: 100%; background: #F59E0B; transition: width 0.3s;"></div>
                    </div>
                </div>
                <h3 id="quiz-question-title" style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: 20px; margin-bottom: 25px; line-height: 1.4;"></h3>
                <div id="quiz-options-container" style="display: flex; flex-direction: column; gap: 14px;"></div>
            </div>

            <!-- РЕЗУЛЬТАТ ТЕСТИРОВАНИЯ -->
            <div id="quiz-result-box" style="display: none; text-align: center;">
                <span id="res-icon" style="font-size: 50px;">🔮</span>
                <span style="display: block; font-family: monospace; font-size: 11px; color: #F59E0B; letter-spacing: 2px; margin-top: 10px;">ВАШ САКРАЛЬНЫЙ АРХЕТИП ДУШИ</span>
                <h2 id="res-title" style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; font-size: 30px; margin: 8px 0 16px;">Маг / Алхимик</h2>
                <div id="res-desc" style="max-width: 680px; margin: 0 auto 25px; color: #CBD5E1; font-size: 14.5px; line-height: 1.7; text-align: left; background: rgba(2,4,8,0.7); padding: 22px; border-radius: 14px; border: 1px solid rgba(245,158,11,0.2);"></div>
                <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
                    <button type="button" onclick="saveArchetypeToProfile()" style="background: #10B981; color: #020408; font-weight: 700; border: none; padding: 12px 24px; border-radius: 20px; cursor: pointer; font-size: 13px;">✓ Зафиксировать в Профиле</button>
                    <button type="button" onclick="startArchetypeQuiz()" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #FFF; padding: 12px 24px; border-radius: 20px; cursor: pointer; font-size: 13px;">Пройти заново ↻</button>
                </div>
            </div>
        </div>

        <!-- СЕТКА ВСЕХ 16 АРХЕТИПОВ -->
        <h3 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; font-size: 24px; margin-bottom: 25px; text-align: center;">Атлас 16 Юнгианских Архетипов</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">🔮</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">1. Маг (Magician)</h4>
                <span style="font-size: 11px; color: #E11D48; font-family: monospace;">Скорпион · Плутон</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Преобразует невидимые энергии, переплавляет кризис в абсолютную силу духа.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">⚡</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">2. Бунтарь (Rebel)</h4>
                <span style="font-size: 11px; color: #38BDF8; font-family: monospace;">Водолей · Уран</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Ломает догмы, пробуждает новаторство и защищает право на свободную мысль.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">👑</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">3. Правитель (Ruler)</h4>
                <span style="font-size: 11px; color: #F59E0B; font-family: monospace;">Козерог · Сатурн</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Архитектор систем и порядка, несущий ответственность за процветание структуры.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">🎨</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">4. Творец (Creator)</h4>
                <span style="font-size: 11px; color: #FBBF24; font-family: monospace;">Лев · Солнце</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Овеществляет замыслы души в осязаемые произведения искусства и идеи.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">⚔️</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">5. Герой (Hero)</h4>
                <span style="font-size: 11px; color: #EF4444; font-family: monospace;">Овен · Марс</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Действует на острие воли, преодолевает страх и прокладывает путь остальным.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">🧭</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">6. Искатель (Seeker)</h4>
                <span style="font-size: 11px; color: #10B981; font-family: monospace;">Стрелец · Юпитер</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Странник в поисках высшей истины, расширяющий горизонты сознания.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">📖</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">7. Мудрец (Sage)</h4>
                <span style="font-size: 11px; color: #60A5FA; font-family: monospace;">Дева · Меркурий</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Хранитель чистого знания, отделяющий иллюзии от фундаментальных законов.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">🌹</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">8. Любовник (Lover)</h4>
                <span style="font-size: 11px; color: #EC4899; font-family: monospace;">Весы · Венера</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Проводник эстетики, тонкой эмпатии и сакрального резонанса сердец.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">🛡️</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">9. Заботливый (Caregiver)</h4>
                <span style="font-size: 11px; color: #34D399; font-family: monospace;">Рак · Луна</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Создает пространство психологической защиты, исцеления и заботы.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">🎭</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">10. Шут (Jester)</h4>
                <span style="font-size: 11px; color: #FDE047; font-family: monospace;">Близнецы · Меркурий</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Разрушает пафос через юмор и легкость, возвращая вкус к настоящему мигу.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">🤝</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">11. Славный Малый (Everyman)</h4>
                <span style="font-size: 11px; color: #A3E635; font-family: monospace;">Телец · Венера</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Надежная опора круга, ценящая равенство, верность и земной труд.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">🕊️</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">12. Невинный (Innocent)</h4>
                <span style="font-size: 11px; color: #93C5FD; font-family: monospace;">Рыбы · Нептун</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Хранит первозданную чистоту веры и мистическое единство со Вселенной.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">⚗️</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">13. Алхимик (Alchemist)</h4>
                <span style="font-size: 11px; color: #C084FC; font-family: monospace;">Скорпион-Овен</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Соединяет стихии Огня и Воды для получения философского золота духа.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">👁️</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">14. Провидец (Visionary)</h4>
                <span style="font-size: 11px; color: #38BDF8; font-family: monospace;">Водолей-Стрелец</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Считывает квантовые вероятности грядущих эпох и вдохновляет цивилизацию.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">🏛️</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">15. Страж (Guardian)</h4>
                <span style="font-size: 11px; color: #F59E0B; font-family: monospace;">Козерог-Телец</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Оберегает родовые корни, моральные устои и сакральные заветы древних.</p>
            </div>
            <div class="arch-card" style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 22px;">
                <span style="font-size: 28px;">🌠</span>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 8px 0 4px;">16. Пилигрим (Pilgrim)</h4>
                <span style="font-size: 11px; color: #F472B6; font-family: monospace;">Близнецы-Рыбы</span>
                <p style="color: #94A3B8; font-size: 13px; line-height: 1.6; margin-top: 10px;">Неутомимый странник тонких миров, связующий земное бытие с песней сфер.</p>
            </div>
        </div>

    </div>
</div>

<script>
const QUIZ_QUESTIONS = [
    {
        q: "1. Каким способом вы естественнее всего восстанавливаете психический ресурс?",
        options: [
            { text: "В тишине, глубоком уединении и размышлениях (Интроверсия)", score: { mag: 2, sage: 2, alch: 1 } },
            { text: "В динамичном диалоге, совместном действии и среди единомышленников (Экстраверсия)", score: { hero: 2, creator: 2, rebel: 1 } }
        ]
    },
    {
        q: "2. На что вы в первую очередь опираетесь при восприятии новой информации?",
        options: [
            { text: "На скрытые взаимосвязи, интуитивные вспышки и будущее видение (Интуиция)", score: { mag: 2, vision: 2, seeker: 1 } },
            { text: "На конкретные осязаемые факты, опыт и текущую реальность (Сенсорика)", score: { ruler: 2, guardian: 2, everyman: 1 } }
        ]
    },
    {
        q: "3. Что является вашим главным мерилом при принятии судьбоносных решений?",
        options: [
            { text: "Беспристрастная логика, объективная целесообразность и принципы (Логика)", score: { ruler: 2, sage: 2, rebel: 1 } },
            { text: "Голос сердца, гармония отношений и этический резонанс (Чувство)", score: { lover: 2, caregiver: 2, innocent: 2 } }
        ]
    },
    {
        q: "4. Какой стиль жизни дает вам наибольшее ощущение внутренней силы?",
        options: [
            { text: "Четкая структура, выверенные планы и предсказуемый порядок (Суждение)", score: { ruler: 2, guardian: 2, hero: 1 } },
            { text: "Спонтанный поток, гибкая адаптация и свобода маневра (Восприятие)", score: { jester: 2, pilgrim: 2, rebel: 2 } }
        ]
    },
    {
        q: "5. Какова ваша типичная реакция на глубокий кризис?",
        options: [
            { text: "Иду внутрь кризиса, чтобы переплавить его в источник радикальной силы", score: { mag: 3, alch: 3 } },
            { text: "Ломаю старые правила и создаю принципиально новую парадигму", score: { rebel: 3, vision: 2 } }
        ]
    },
    {
        q: "6. Что для вас важнее всего в профессиональной деятельности?",
        options: [
            { text: "Оставить уникальный авторский след, воплотив смелое видение", score: { creator: 3, hero: 2 } },
            { text: "Постичь истинную суть вещей и передать структурированное знание", score: { sage: 3, seeker: 2 } }
        ]
    },
    {
        q: "7. Какое качество в отношениях вы цените превыше всего?",
        options: [
            { text: "Глубокий сакральный резонанс, страсть и эмоциональную преданность", score: { lover: 3, caregiver: 2 } },
            { text: "Честность, взаимную надежность и равную ответственность", score: { everyman: 2, guardian: 2 } }
        ]
    },
    {
        q: "8. В чем вы видите свое высшее предназначение?",
        options: [
            { text: "Пробуждать сознание людей и открывать им неизведанные горизонты", score: { vision: 3, pilgrim: 2, seeker: 2 } },
            { text: "Создавать надежную опору, порядок и защиту для близких и мира", score: { ruler: 2, guardian: 2, caregiver: 2 } }
        ]
    }
];

let curQ = 0;
let userScores = {};

function startArchetypeQuiz() {
    curQ = 0;
    userScores = {};
    document.getElementById('quiz-intro-box').style.display = 'none';
    document.getElementById('quiz-result-box').style.display = 'none';
    document.getElementById('quiz-step-box').style.display = 'block';
    renderQuizQuestion();
}

function renderQuizQuestion() {
    const qData = QUIZ_QUESTIONS[curQ];
    document.getElementById('quiz-progress-text').textContent = `ВОПРОС ${curQ + 1} ИЗ ${QUIZ_QUESTIONS.length}`;
    document.getElementById('quiz-progress-bar').style.width = `${((curQ + 1) / QUIZ_QUESTIONS.length) * 100}%`;
    document.getElementById('quiz-question-title').textContent = qData.q;

    const optContainer = document.getElementById('quiz-options-container');
    optContainer.innerHTML = '';

    qData.options.forEach((opt, idx) => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.style.cssText = "background: rgba(2, 4, 8, 0.8); border: 1px solid rgba(245, 158, 11, 0.3); color: #FFF; padding: 16px 20px; border-radius: 12px; text-align: left; cursor: pointer; font-size: 14px; transition: all 0.2s; line-height: 1.5;";
        btn.innerHTML = `<span style="color:#F59E0B; font-weight:bold; margin-right:10px;">${idx === 0 ? 'А)' : 'Б)'}</span> ${opt.text}`;
        btn.onmouseover = () => { btn.style.borderColor = '#F59E0B'; btn.style.background = 'rgba(245,158,11,0.15)'; };
        btn.onmouseout = () => { btn.style.borderColor = 'rgba(245, 158, 11, 0.3)'; btn.style.background = 'rgba(2, 4, 8, 0.8)'; };
        btn.onclick = () => selectQuizAnswer(opt.score);
        optContainer.appendChild(btn);
    });
}

function selectQuizAnswer(score) {
    for (let k in score) {
        userScores[k] = (userScores[k] || 0) + score[k];
    }
    curQ++;
    if (curQ < QUIZ_QUESTIONS.length) {
        renderQuizQuestion();
    } else {
        finishQuiz();
    }
}

function finishQuiz() {
    document.getElementById('quiz-step-box').style.display = 'none';
    let topArch = 'mag';
    let maxS = -1;
    for (let k in userScores) {
        if (userScores[k] > maxS) {
            maxS = userScores[k];
            topArch = k;
        }
    }

    const archData = {
        mag: { title: 'Маг / Алхимик', icon: '🔮', desc: 'Вы обладаете врожденной способностью видеть скрытые пружины реальности. Ваш дар — переплавлять любые психологические и жизненные кризисы в точки квантового роста. Вы соединяете научную глубину с мистической интуицией.' },
        rebel: { title: 'Бунтарь / Провидец', icon: '⚡', desc: 'Вам претит слепое следование архаичным канонам. Ваша миссия — разрушать закостеневшие ментальные структуры и открывать человечеству коридоры будущего.' },
        ruler: { title: 'Правитель / Архитектор', icon: '👑', desc: 'Прирожденный строитель прочных систем. Вы берете ответственность там, где другие пасуют, и умеете объединять людей ради реализации масштабных долговременных целей.' },
        creator: { title: 'Творец / Гений', icon: '🎨', desc: 'Ваша главная витальная потребность — материализация непреходящей красоты и оригинальных смыслов. Вы не приемлете серости и наполняете мир авторским стилем.' },
        hero: { title: 'Герой / Победитель', icon: '⚔️', desc: 'Неукротимая воля к победе над хаосом. Вы раскрываетесь ярче всего в моменты вызовов, защищая высшие идеалы чести и справедливости.' },
        sage: { title: 'Мудрец / Хранитель Знаний', icon: '📖', desc: 'Ваш ум препарирует любые заблуждения. Вы стремитесь к безупречной кристальной истине и умеете передавать сакральное знание без искажений.' },
        lover: { title: 'Любовник / Эстет', icon: '🌹', desc: 'Вы сонастроены с сердцем мира. Ваша сила — в искусстве построения глубочайших гармоничных союзов и преображении пространства через любовь.' },
        vision: { title: 'Провидец / Квантовый Визионер', icon: '👁️', desc: 'Ваше сознание опережает календарное время. Вы интуитивно считываете тренды грядущих десятилетий и направляете ход истории.' }
    };

    const res = archData[topArch] || archData.mag;
    document.getElementById('res-icon').textContent = res.icon;
    document.getElementById('res-title').textContent = res.title;
    document.getElementById('res-desc').innerHTML = `
        <p><strong>✦ Сущностная Энергия:</strong> ${res.desc}</p>
        <p style="margin-top:10px; color:#FBBF24;"><strong>✦ Рекомендация для Гороскопа:</strong> Ваш архетип соединен с ритмами Сатурна и Плутона. В транзитах натальной карты вам следует обращать особое внимание на аспекты высших планет.</p>
    `;
    document.getElementById('quiz-result-box').style.display = 'block';

    localStorage.setItem('ast_user_archetype', JSON.stringify({ key: topArch, title: res.title, icon: res.icon, date: new Date().toISOString() }));
}

function saveArchetypeToProfile() {
    alert('Архетип успешно зафиксирован в вашем сакральном профиле!');
}
</script>
<?php get_footer(); ?>