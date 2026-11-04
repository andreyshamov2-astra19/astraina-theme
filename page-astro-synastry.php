<?php
/**
 * Template Name: Astra Synastry Module (Синастрия Пар)
 * Template Post Type: page
 * 
 * Two-Partner Input · 4 Sacred Scales of Compatibility · Deep Resonant Synergy
 * Terminology: «Партнер» & «Другой Партнер» (Strict Canonical Standard)
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 100vh;">
<main class="astraina-container" style="padding-top: 35px; padding-bottom: 80px; max-width: 1240px; margin: 0 auto; padding-left: 20px; padding-right: 20px;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(245,158,11,0.2); padding-bottom: 14px; margin-bottom: 28px; flex-wrap: wrap; gap: 10px;">
        <a href="<?php echo esc_url(home_url('/')); ?>" style="font-family: var(--font-title, 'Cinzel', serif); font-size: 13px; text-transform: uppercase; letter-spacing: 0.15em; color: #FEF3C7; text-decoration: none;">
            ← Вернуться к Фолианту
        </a>
        <span style="font-family: var(--font-mono, 'Space Mono', monospace); font-size: 11px; color: #E11D48;">
            AstraChron Engine · Расчет 4 Сакральных Шкал Совместимости
        </span>
    </div>

    <article class="astraina-chart-wrapper" style="background: rgba(8, 14, 26, 0.85); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 20px; padding: clamp(20px, 4vw, 40px); backdrop-filter: blur(20px); box-shadow: 0 20px 50px rgba(0, 0, 0, 0.75);">
        <h1 style="font-family: var(--font-title, 'Cinzel Decorative', serif); font-size: clamp(24px, 4vw, 38px); color: #FEF3C7; text-align: center; margin-bottom: 10px; font-weight: 700;">
            Синастрия Гармонии: Союз Двух Душ
        </h1>
        <p style="text-align: center; color: #9CA3AF; font-size: 0.95rem; margin-bottom: 35px; max-width: 680px; margin-left: auto; margin-right: auto; line-height: 1.6;">
            Введите астрономические данные рождения обоих участников союза для вычисления резонанса по 4 сакральным шкалам бытия.
        </p>

        <form id="synastry-dual-form" onsubmit="event.preventDefault(); window.calculateAstrainaSynastry();">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 26px; margin-bottom: 30px;">
                
                <!-- ПАРТНЕР -->
                <div style="background: rgba(4, 8, 16, 0.9); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 16px; padding: 24px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 18px; border-bottom: 1px solid rgba(245,158,11,0.2); padding-bottom: 12px;">
                        <span style="font-size: 22px; color: #F59E0B;">☉</span>
                        <h3 style="font-family: var(--font-title, 'Cinzel', serif); font-size: 1.25rem; color: #FFFFFF; margin: 0; font-weight: 700;">Партнер</h3>
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label for="p1_name" style="display: block; font-size: 11px; color: #F59E0B; text-transform: uppercase; margin-bottom: 6px; font-family: var(--font-mono, monospace);">Имя Партнера</label>
                        <input type="text" id="p1_name" value="Александр" required style="width: 100%; box-sizing: border-box; padding: 11px 14px; background: rgba(2,4,8,0.95); border: 1px solid rgba(245,158,11,0.3); border-radius: 8px; color: #FEF3C7; font-size: 14px; outline: none;">
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label for="p1_date" style="display: block; font-size: 11px; color: #F59E0B; text-transform: uppercase; margin-bottom: 6px; font-family: var(--font-mono, monospace);">Дата рождения</label>
                        <input type="date" id="p1_date" value="1992-07-15" required style="width: 100%; box-sizing: border-box; padding: 11px 14px; background: rgba(2,4,8,0.95); border: 1px solid rgba(245,158,11,0.3); border-radius: 8px; color: #FEF3C7; font-size: 14px; outline: none; font-family: var(--font-mono, monospace);">
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label for="p1_time" style="display: block; font-size: 11px; color: #F59E0B; text-transform: uppercase; margin-bottom: 6px; font-family: var(--font-mono, monospace);">Время рождения</label>
                        <input type="time" id="p1_time" value="14:30" required style="width: 100%; box-sizing: border-box; padding: 11px 14px; background: rgba(2,4,8,0.95); border: 1px solid rgba(245,158,11,0.3); border-radius: 8px; color: #FEF3C7; font-size: 14px; outline: none; font-family: var(--font-mono, monospace);">
                    </div>

                    <div>
                        <label for="p1_city" style="display: block; font-size: 11px; color: #F59E0B; text-transform: uppercase; margin-bottom: 6px; font-family: var(--font-mono, monospace);">Город рождения</label>
                        <input type="text" id="p1_city" value="Москва" required style="width: 100%; box-sizing: border-box; padding: 11px 14px; background: rgba(2,4,8,0.95); border: 1px solid rgba(245,158,11,0.3); border-radius: 8px; color: #FEF3C7; font-size: 14px; outline: none;">
                    </div>
                </div>

                <!-- ДРУГОЙ ПАРТНЕР -->
                <div style="background: rgba(4, 8, 16, 0.9); border: 1px solid rgba(225, 29, 72, 0.35); border-radius: 16px; padding: 24px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 18px; border-bottom: 1px solid rgba(225,29,72,0.25); padding-bottom: 12px;">
                        <span style="font-size: 22px; color: #E11D48;">☽</span>
                        <h3 style="font-family: var(--font-title, 'Cinzel', serif); font-size: 1.25rem; color: #FFFFFF; margin: 0; font-weight: 700;">Партнер</h3>
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label for="p2_name" style="display: block; font-size: 11px; color: #FDA4AF; text-transform: uppercase; margin-bottom: 6px; font-family: var(--font-mono, monospace);">Имя Другого Партнера</label>
                        <input type="text" id="p2_name" value="Елена" required style="width: 100%; box-sizing: border-box; padding: 11px 14px; background: rgba(2,4,8,0.95); border: 1px solid rgba(225,29,72,0.35); border-radius: 8px; color: #FEF3C7; font-size: 14px; outline: none;">
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label for="p2_date" style="display: block; font-size: 11px; color: #FDA4AF; text-transform: uppercase; margin-bottom: 6px; font-family: var(--font-mono, monospace);">Дата рождения</label>
                        <input type="date" id="p2_date" value="1995-10-31" required style="width: 100%; box-sizing: border-box; padding: 11px 14px; background: rgba(2,4,8,0.95); border: 1px solid rgba(225,29,72,0.35); border-radius: 8px; color: #FEF3C7; font-size: 14px; outline: none; font-family: var(--font-mono, monospace);">
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label for="p2_time" style="display: block; font-size: 11px; color: #FDA4AF; text-transform: uppercase; margin-bottom: 6px; font-family: var(--font-mono, monospace);">Время рождения</label>
                        <input type="time" id="p2_time" value="09:15" required style="width: 100%; box-sizing: border-box; padding: 11px 14px; background: rgba(2,4,8,0.95); border: 1px solid rgba(225,29,72,0.35); border-radius: 8px; color: #FEF3C7; font-size: 14px; outline: none; font-family: var(--font-mono, monospace);">
                    </div>

                    <div>
                        <label for="p2_city" style="display: block; font-size: 11px; color: #FDA4AF; text-transform: uppercase; margin-bottom: 6px; font-family: var(--font-mono, monospace);">Город рождения</label>
                        <input type="text" id="p2_city" value="Санкт-Петербург" required style="width: 100%; box-sizing: border-box; padding: 11px 14px; background: rgba(2,4,8,0.95); border: 1px solid rgba(225,29,72,0.35); border-radius: 8px; color: #FEF3C7; font-size: 14px; outline: none;">
                    </div>
                </div>

            </div>

            <div style="text-align: center; margin-bottom: 35px;">
                <button type="submit" id="syn-calc-btn" class="btn-astraina" style="cursor: pointer; padding: 16px 42px; font-size: 0.98rem; font-weight: 700; background: linear-gradient(135deg, #E11D48 0%, #9F1239 100%); border: 1px solid rgba(254,243,199,0.3); border-radius: 9999px; color: #FFFFFF; box-shadow: 0 4px 25px rgba(225,29,72,0.5); letter-spacing: 0.08em; text-transform: uppercase;">
                    <span id="syn-btn-text">Рассчитать Синастрию Совместимости</span> ✦
                </button>
            </div>
        </form>

        <div id="synastry-results-area" style="display: none;">
            
            <h2 style="font-family: var(--font-title, 'Cinzel Decorative', serif); font-size: clamp(20px, 3.2vw, 30px); color: #FFFFFF; text-align: center; margin-bottom: 24px;">
                Резонанс Совместимости: <span id="syn-pair-names" style="color:var(--ast-gold, #F59E0B);">Партнер & Другой Партнер</span>
            </h2>

            <!-- 4 Сакральные Шкалы -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 35px;">
                
                <div class="ast-scale-card">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <span style="color:#FDA4AF; font-weight:600; font-size:13px;">Романтический Резонанс (♀+♂)</span>
                        <span id="score-passion" style="font-family:var(--font-mono, monospace); color:#E11D48; font-weight:bold;">88%</span>
                    </div>
                    <div class="ast-prog-track"><div id="bar-passion" class="ast-prog-fill" style="width: 88%; background: #E11D48;"></div></div>
                </div>

                <div class="ast-scale-card">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <span style="color:#CFFAFE; font-weight:600; font-size:13px;">Эмоциональная Гармония (☽+☉)</span>
                        <span id="score-emotion" style="font-family:var(--font-mono, monospace); color:#38BDF8; font-weight:bold;">92%</span>
                    </div>
                    <div class="ast-prog-track"><div id="bar-emotion" class="ast-prog-fill" style="width: 92%; background: #38BDF8;"></div></div>
                </div>

                <div class="ast-scale-card">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <span style="color:#FEF3C7; font-weight:600; font-size:13px;">Интеллектуальное Созвучие (☿+♃)</span>
                        <span id="score-mind" style="font-family:var(--font-mono, monospace); color:#F59E0B; font-weight:bold;">76%</span>
                    </div>
                    <div class="ast-prog-track"><div id="bar-mind" class="ast-prog-fill" style="width: 76%; background: #F59E0B;"></div></div>
                </div>

                <div class="ast-scale-card">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <span style="color:#C7D2FE; font-weight:600; font-size:13px;">Кармическая Связь (♄+☊)</span>
                        <span id="score-karma" style="font-family:var(--font-mono, monospace); color:#6366F1; font-weight:bold;">85%</span>
                    </div>
                    <div class="ast-prog-track"><div id="bar-karma" class="ast-prog-fill" style="width: 85%; background: #6366F1;"></div></div>
                </div>

            </div>

            <div id="synastry-detailed-text" style="display: flex; flex-direction: column; gap: 20px;">
            </div>

        </div>

    </article>
</main>
</div>

<style>
.ast-scale-card {
    background: rgba(8, 14, 26, 0.85);
    border: 1px solid var(--ast-border, rgba(245, 158, 11, 0.22));
    border-radius: 14px;
    padding: 20px;
    backdrop-filter: blur(12px);
}
.ast-prog-track {
    width: 100%;
    height: 8px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 6px;
    overflow: hidden;
}
.ast-prog-fill {
    height: 100%;
    border-radius: 6px;
    transition: width 1s ease;
}
</style>

<script>
window.calculateAstrainaSynastry = function() {
    const p1Name = document.getElementById('p1_name').value || 'Партнер';
    const p2Name = document.getElementById('p2_name').value || 'Другой Партнер';
    const p1Date = document.getElementById('p1_date').value;
    const p2Date = document.getElementById('p2_date').value;
    const btn = document.getElementById('syn-btn-text');

    if (!p1Date || !p2Date) return;

    btn.innerText = 'Вычисление синастрических аспектов...';

    const d1 = new Date(p1Date).getTime();
    const d2 = new Date(p2Date).getTime();
    const diffDays = Math.abs(d1 - d2) / (1000 * 3600 * 24);

    const passion = Math.min(96, Math.max(62, Math.round(75 + 20 * Math.sin(diffDays * 0.05))));
    const emotion = Math.min(98, Math.max(58, Math.round(78 + 18 * Math.cos(diffDays * 0.04))));
    const mind = Math.min(94, Math.max(60, Math.round(72 + 22 * Math.sin(diffDays * 0.03))));
    const karma = Math.min(95, Math.max(65, Math.round(80 + 15 * Math.cos(diffDays * 0.02))));

    document.getElementById('syn-pair-names').textContent = `${p1Name} & ${p2Name}`;
    document.getElementById('score-passion').textContent = `${passion}%`;
    document.getElementById('bar-passion').style.width = `${passion}%`;

    document.getElementById('score-emotion').textContent = `${emotion}%`;
    document.getElementById('bar-emotion').style.width = `${emotion}%`;

    document.getElementById('score-mind').textContent = `${mind}%`;
    document.getElementById('bar-mind').style.width = `${mind}%`;

    document.getElementById('score-karma').textContent = `${karma}%`;
    document.getElementById('bar-karma').style.width = `${karma}%`;

    const textContainer = document.getElementById('synastry-detailed-text');
    textContainer.innerHTML = `
        <div class="ast-scale-card" style="border-left: 4px solid #E11D48;">
            <h4 style="font-family:var(--font-title, 'Cinzel', serif); color:#FFFFFF; margin-bottom:8px; font-size:1.2rem;">
                Чувственный Магнетизм (Венера ♀ — Марс ♂)
            </h4>
            <p style="font-size:0.95rem; line-height:1.7; color:var(--ast-text-dim, #94A3B8);">
                Между <strong>${p1Name}</strong> и <strong>${p2Name}</strong> наблюдается мощное первичное притяжение. Энергии планет создают устойчивый сексуальный импульс и взаимное эстетическое влечение. Вы ощущаете интерес друг к другу буквально на физическом уровне.
            </p>
        </div>

        <div class="ast-scale-card" style="border-left: 4px solid #38BDF8;">
            <h4 style="font-family:var(--font-title, 'Cinzel', serif); color:#FFFFFF; margin-bottom:8px; font-size:1.2rem;">
                Эмоциональный Комфорт и Дом (Луна ☽ — Солнце ☉)
            </h4>
            <p style="font-size:0.95rem; line-height:1.7; color:var(--ast-text-dim, #94A3B8);">
                Совпадение эмоциональных биоритмов составляет ${emotion}%. Вам легко молчать рядом друг с другом, не испытывая неловкости. Другой Партнер инстинктивно считывает смену вашего настроения и способен предоставить необходимую поддержку.
            </p>
        </div>

        <div class="ast-scale-card" style="border-left: 4px solid #6366F1;">
            <h4 style="font-family:var(--font-title, 'Cinzel', serif); color:#FFFFFF; margin-bottom:8px; font-size:1.2rem;">
                Кармический Урок и Перспектива Союза
            </h4>
            <p style="font-size:0.95rem; line-height:1.7; color:var(--ast-text-dim, #94A3B8);">
                Связь Лунных Узлов и высших планет указывает на то, что встреча не случайна. Вы пришли в жизнь друг друга, чтобы помочь раскрыть заблокированные стороны характера и научиться безусловному доверию.
            </p>
        </div>
    `;

    document.getElementById('synastry-results-area').style.display = 'block';
    btn.innerText = 'Рассчитать Синастрию Совместимости';

    window.scrollTo({
        top: document.getElementById('synastry-results-area').offsetTop - 90,
        behavior: 'smooth'
    });
};
</script>

<?php get_footer(); ?>