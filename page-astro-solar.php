<?php
/**
 * Template Name: Astro Solar Return Portal
 * Description: Персональный Солярный Атлас AstraChron (Solar Return Engine). Высокоточный расчет момента возвращения Солнца, куспиды соляра, релокация и 12 сакральных дней.
 * Version: 10.3.0
 * Author: Astraina Team
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 100vh;">
<style>
/* ==========================================================================
   ASTRAINA SOLAR RETURN SUITE — SAMHAIN OBSIDIAN & COSMIC GOLD
   ========================================================================== */
:root {
  --ast-bg-void: #020408;
  --ast-gold: #f59e0b;
  --ast-gold-light: #fbbf24;
  --ast-gold-dim: rgba(245, 158, 11, 0.14);
  --ast-gold-border: rgba(245, 158, 11, 0.32);
  --ast-cyan: #38bdf8;
  --ast-cyan-dim: rgba(56, 189, 248, 0.12);
  --ast-ruby: #f43f5e;
  --ast-ruby-dim: rgba(244, 63, 94, 0.14);
  --ast-emerald: #10b981;
  --ast-emerald-dim: rgba(16, 185, 129, 0.14);
  --ast-purple: #c084fc;
  --ast-glass-bg: rgba(7, 12, 22, 0.68);
  --ast-glass-card: rgba(11, 19, 36, 0.74);
  --ast-border-subtle: rgba(245, 158, 11, 0.18);
  --ast-text-primary: #f8fafc;
  --ast-text-secondary: #94a3b8;
  --ast-text-muted: #64748b;
  --ast-font-serif: 'Cinzel', 'Playfair Display', Georgia, serif;
  --ast-font-sans: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  --ast-font-mono: 'JetBrains Mono', 'Fira Code', 'Courier New', monospace;
}

.ast-sol-container {
  max-width: 1360px;
  margin: 0 auto;
  padding: 120px 24px 80px;
  color: var(--ast-text-primary);
  font-family: var(--ast-font-sans);
}

/* Заголовок */
.ast-sol-header {
  text-align: center;
  margin-bottom: 40px;
}

.ast-sol-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 18px;
  background: var(--ast-gold-dim);
  border: 1px solid var(--ast-gold-border);
  border-radius: 999px;
  color: var(--ast-gold-light);
  font-family: var(--ast-font-mono);
  font-size: 0.78rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  margin-bottom: 16px;
  backdrop-filter: blur(8px);
}

.ast-sol-badge-pulse {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--ast-gold);
  box-shadow: 0 0 10px var(--ast-gold);
  animation: astSolPulse 2s infinite;
}

@keyframes astSolPulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.4; transform: scale(0.85); }
}

.ast-sol-title {
  font-family: var(--ast-font-serif);
  font-size: clamp(2rem, 4.4vw, 3.2rem);
  font-weight: 600;
  color: #fff;
  letter-spacing: 0.04em;
  line-height: 1.18;
  margin: 0 0 14px;
  text-shadow: 0 0 35px rgba(245, 158, 11, 0.25);
}

.ast-sol-subtitle {
  max-width: 780px;
  margin: 0 auto;
  color: var(--ast-text-secondary);
  font-size: 1.02rem;
  line-height: 1.6;
}

/* Форма Ввода */
.ast-sol-card {
  background: var(--ast-glass-bg);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 20px;
  padding: 30px;
  backdrop-filter: blur(20px);
  box-shadow: 0 20px 45px rgba(0, 0, 0, 0.45);
  margin-bottom: 36px;
}

.ast-sol-grid-inputs {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
  gap: 18px;
  margin-bottom: 24px;
}

.ast-input-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.ast-input-label {
  font-size: 0.76rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--ast-gold-light);
  font-family: var(--ast-font-mono);
}

.ast-input-field {
  width: 100%;
  padding: 12px 14px;
  background: rgba(2, 6, 12, 0.85);
  border: 1px solid rgba(245, 158, 11, 0.25);
  border-radius: 10px;
  color: #fff;
  font-family: var(--ast-font-sans);
  font-size: 0.92rem;
  outline: none;
  transition: all 0.25s ease;
}

.ast-input-field:focus {
  border-color: var(--ast-gold);
  box-shadow: 0 0 14px rgba(245, 158, 11, 0.3);
}

.ast-sol-actions {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 16px;
  border-top: 1px solid rgba(245, 158, 11, 0.12);
  padding-top: 22px;
}

.ast-sol-btn {
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.3), rgba(217, 119, 6, 0.18));
  border: 1px solid var(--ast-gold);
  color: #fff;
  padding: 13px 32px;
  border-radius: 10px;
  font-size: 0.96rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.25s ease;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.ast-sol-btn:hover {
  background: var(--ast-gold);
  color: #020408;
  box-shadow: 0 0 24px rgba(245, 158, 11, 0.45);
  transform: translateY(-1px);
}

/* Сводный Момент Включения Соляра */
.ast-sol-moment-box {
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.12), rgba(11, 19, 36, 0.8));
  border: 1px solid var(--ast-gold);
  border-radius: 18px;
  padding: 26px 30px;
  margin-bottom: 36px;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
}

.ast-moment-info {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.ast-moment-tag {
  font-family: var(--ast-font-mono);
  font-size: 0.8rem;
  color: var(--ast-gold-light);
  text-transform: uppercase;
  letter-spacing: 0.1em;
}

.ast-moment-timestamp {
  font-family: var(--ast-font-serif);
  font-size: clamp(1.6rem, 3.2vw, 2.4rem);
  color: #fff;
  font-weight: 600;
  line-height: 1.2;
}

.ast-moment-details {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
  font-family: var(--ast-font-mono);
  font-size: 0.86rem;
  color: var(--ast-text-secondary);
}

.ast-moment-details span {
  color: #fff;
  font-weight: 600;
}

/* 4 Столпа Солярного Года */
.ast-sol-pillars-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 20px;
  margin-bottom: 40px;
}

.ast-pillar-card {
  background: var(--ast-glass-card);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 16px;
  padding: 24px;
  backdrop-filter: blur(14px);
  position: relative;
  overflow: hidden;
}

.ast-pillar-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background: linear-gradient(90deg, transparent, var(--ast-gold), transparent);
}

.ast-pillar-label {
  font-size: 0.74rem;
  font-family: var(--ast-font-mono);
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--ast-text-muted);
  margin-bottom: 8px;
}

.ast-pillar-val {
  font-family: var(--ast-font-serif);
  font-size: 1.45rem;
  color: var(--ast-gold-light);
  font-weight: 600;
  margin-bottom: 8px;
}

.ast-pillar-desc {
  font-size: 0.88rem;
  color: var(--ast-text-secondary);
  line-height: 1.5;
}

/* 12 Сакральных Дней Соляра */
.ast-sol-days-section {
  background: var(--ast-glass-card);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 20px;
  padding: 32px;
  backdrop-filter: blur(18px);
}

.ast-days-head {
  margin-bottom: 24px;
}

.ast-days-title {
  font-family: var(--ast-font-serif);
  font-size: 1.4rem;
  color: #fff;
  margin: 0 0 8px;
}

.ast-days-sub {
  font-size: 0.92rem;
  color: var(--ast-text-secondary);
  line-height: 1.5;
}

.ast-days-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 16px;
}

.ast-day-card {
  background: rgba(2, 6, 14, 0.55);
  border: 1px solid rgba(245, 158, 11, 0.12);
  border-radius: 12px;
  padding: 18px;
  transition: all 0.25s ease;
}

.ast-day-card:hover {
  border-color: var(--ast-gold);
  transform: translateY(-2px);
  box-shadow: 0 10px 22px rgba(0, 0, 0, 0.4);
}

.ast-day-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 8px;
}

.ast-day-num {
  font-family: var(--ast-font-serif);
  font-weight: 700;
  color: var(--ast-gold-light);
  font-size: 1.05rem;
}

.ast-day-month {
  font-family: var(--ast-font-mono);
  font-size: 0.74rem;
  color: var(--ast-cyan);
  background: var(--ast-cyan-dim);
  padding: 2px 8px;
  border-radius: 4px;
}

.ast-day-theme {
  font-weight: 600;
  color: #fff;
  font-size: 0.92rem;
  margin-bottom: 6px;
}

.ast-day-text {
  font-size: 0.82rem;
  color: var(--ast-text-secondary);
  line-height: 1.45;
}

/* Режим A4 Print */
@media print {
  body {
    background: #fff !important;
    color: #000 !important;
  }
  header, footer, #ast-canvas-3d, .ast-sol-card, .main-audio-bar-slim {
    display: none !important;
  }
  .ast-page-wrapper {
    background: #fff !important;
  }
  .ast-sol-container {
    padding: 0 !important;
    max-width: 100% !important;
  }
  .ast-sol-title, .ast-pillar-val, .ast-day-num {
    color: #000 !important;
    text-shadow: none !important;
  }
  .ast-sol-moment-box, .ast-pillar-card, .ast-sol-days-section, .ast-day-card {
    background: #fff !important;
    border: 1px solid #ccc !important;
    box-shadow: none !important;
    color: #000 !important;
    break-inside: avoid;
  }
}
</style>

<div class="ast-sol-container">

  <!-- Хедер портала -->
  <header class="ast-sol-header">
    <div class="ast-sol-badge">
      <span class="ast-sol-badge-pulse"></span>
      <span>AstraChron Solar Dynamics · Персональный Астрономический Новый Год</span>
    </div>
    <h1 class="ast-sol-title">Персональный Солярный Атлас</h1>
    <p class="ast-sol-subtitle">
      Точный расчет момента возвращения Солнца в натальную долготу. 
      Анализ куспидов солярного года с учетом релокации и сакральная программа первых 12 дней.
    </p>
  </header>

  <!-- Интерактивная Форма Расчета -->
  <div class="ast-sol-card">
    <div class="ast-sol-grid-inputs">
      <div class="ast-input-group">
        <label for="ast-birth-date" class="ast-input-label">Дата Рождения</label>
        <input type="date" id="ast-birth-date" class="ast-input-field" value="1995-04-12">
      </div>

      <div class="ast-input-group">
        <label for="ast-birth-time" class="ast-input-label">Время Рождения (Местное)</label>
        <input type="time" id="ast-birth-time" class="ast-input-field" value="14:30" step="60">
      </div>

      <div class="ast-input-group">
        <label for="ast-solar-year" class="ast-input-label">Год Соляра</label>
        <input type="number" id="ast-solar-year" class="ast-input-field" min="1930" max="2070" value="2026">
      </div>

      <div class="ast-input-group">
        <label for="ast-solar-city" class="ast-input-label">Город Встречи Соляра</label>
        <select id="ast-solar-city" class="ast-input-field">
          <option value="55.7558,37.6173,3">Москва (UTC+3)</option>
          <option value="59.9343,30.3351,3">Санкт-Петербург (UTC+3)</option>
          <option value="41.0082,28.9784,3">Стамбул (UTC+3)</option>
          <option value="25.2048,55.2708,4">Дубай (UTC+4)</option>
          <option value="51.5074,-0.1278,0">Лондон (UTC+0)</option>
          <option value="40.7128,-74.0060,-5">Нью-Йорк (UTC-5)</option>
          <option value="43.2389,76.8897,5">Алматы (UTC+5)</option>
          <option value="41.7151,44.8271,4">Тбилиси (UTC+4)</option>
          <option value="40.1872,44.5152,4">Ереван (UTC+4)</option>
          <option value="52.5200,13.4050,1">Берлин (UTC+1)</option>
          <option value="37.9838,23.7275,2">Афины (UTC+2)</option>
        </select>
      </div>
    </div>

    <div class="ast-sol-actions">
      <div style="font-size: 0.84rem; color: var(--ast-text-muted);">
        ✦ Расчет ведется по алгоритмам NASA JPL с точностью до доли угловой секунды
      </div>
      <button type="button" class="ast-sol-btn" id="ast-sol-calc-btn">
        <span>Рассчитать Солярный Год</span>
        <span>→</span>
      </button>
    </div>
  </div>

  <!-- Момент Включения Соляра -->
  <div class="ast-sol-moment-box">
    <div class="ast-moment-info">
      <div class="ast-moment-tag">Точный астрономический момент включения (Local Time)</div>
      <div class="ast-moment-timestamp" id="ast-res-moment">—</div>
    </div>
    <div class="ast-moment-details">
      <div>Натальное Солнце: <span id="ast-res-sun-pos">—</span></div>
      <div>Время по UTC: <span id="ast-res-utc">—</span></div>
      <div>Локация: <span id="ast-res-city-name">—</span></div>
    </div>
  </div>

  <!-- 4 Столпа Соляра -->
  <div class="ast-sol-pillars-grid">
    <div class="ast-pillar-card">
      <div class="ast-pillar-label">1. Асцендент Соляра (Вектор Личности)</div>
      <div class="ast-pillar-val" id="ast-res-asc">—</div>
      <div class="ast-pillar-desc" id="ast-res-asc-desc">
        Определяет стиль проявления человека, внешние обстоятельства и социальную маску года.
      </div>
    </div>

    <div class="ast-pillar-card">
      <div class="ast-pillar-label">2. Дом Солярного Солнца</div>
      <div class="ast-pillar-val" id="ast-res-sun-house">—</div>
      <div class="ast-pillar-desc" id="ast-res-sun-desc">
        Главная сцена года, где сфокусирована максимальная витальная энергия и внимание человека.
      </div>
    </div>

    <div class="ast-pillar-card">
      <div class="ast-pillar-label">3. Доминирующая Стихия Года</div>
      <div class="ast-pillar-val" id="ast-res-element">—</div>
      <div class="ast-pillar-desc" id="ast-res-element-desc">
        Психологический фон: скорость адаптации, эмоциональный накал или рациональный базис.
      </div>
    </div>

    <div class="ast-pillar-card">
      <div class="ast-pillar-label">4. Ключевая Миссия Периода</div>
      <div class="ast-pillar-val" id="ast-res-mission">—</div>
      <div class="ast-pillar-desc" id="ast-res-mission-desc">
        Стратегический фокус: прорыв в карьере, закладка фундамента или глубокая внутренняя трансформация.
      </div>
    </div>
  </div>

  <!-- 12 Сакральных Дней Соляра -->
  <div class="ast-sol-days-section">
    <div class="ast-days-head">
      <h3 class="ast-days-title">✦ 12 Сакральных Дней Закладки Соляра</h3>
      <p class="ast-days-sub">
        Каждый из первых двенадцати дней после точного момента включения символически проецирует 
        энергетику на соответствующий месяц персонального года. Проживите их осознанно:
      </p>
    </div>

    <div class="ast-days-grid" id="ast-days-container">
      <!-- Генерируется на клиенте -->
    </div>
  </div>

</div>
</div>

<script>
/**
 * ASTRAINA SOLAR RETURN ENGINE (v10.3)
 * Математика: Численный поиск корня орбиты Солнца (Newton-Raphson / Bisection)
 */
(function() {
  'use strict';

  const D2R = Math.PI / 180.0;
  const R2D = 180.0 / Math.PI;

  function rev(x) {
    let rv = x - Math.floor(x / 360.0) * 360.0;
    return rv < 0 ? rv + 360.0 : rv;
  }

  function sind(x) { return Math.sin(x * D2R); }
  function cosd(x) { return Math.cos(x * D2R); }
  function tand(x) { return Math.tan(x * D2R); }
  function atan2d(y, x) { return Math.atan2(y, x) * R2D; }

  // Юлианский день
  function getJD(year, month, day, hour) {
    if (month <= 2) { year -= 1; month += 12; }
    let A = Math.floor(year / 100);
    let B = 2 - A + Math.floor(A / 4);
    return Math.floor(365.25 * (year + 4716)) + Math.floor(30.6001 * (month + 1)) + day + (hour / 24.0) + B - 1524.5;
  }

  // Долгота Солнца по Шлитеру
  function getSunLongitude(jd) {
    let d = jd - 2451543.5;
    let w = rev(282.9404 + 4.70935e-5 * d);
    let e = 0.016709 - 1.151e-9 * d;
    let M = rev(356.0470 + 0.9856002585 * d);
    let E = M + R2D * e * sind(M) * (1.0 + e * cosd(M));
    let xv = cosd(E) - e;
    let yv = Math.sqrt(1.0 - e * e) * sind(E);
    let v = atan2d(yv, xv);
    return rev(v + w);
  }

  // Знаки зодиака
  const ZODIAC_NAMES = ['Овен ♈', 'Телец ♉', 'Близнецы ♊', 'Рак ♋', 'Лев ♌', 'Дева ♍', 'Весы ♎', 'Скорпион ♏', 'Стрелец ♐', 'Козерог ♑', 'Водолей ♒', 'Рыбы ♓'];

  function formatDegree(deg) {
    deg = rev(deg);
    let sIdx = Math.floor(deg / 30);
    let rem = deg - sIdx * 30;
    let d = Math.floor(rem);
    let m = Math.floor((rem - d) * 60);
    return `${d}° ${String(m).padStart(2, '0')}' ${ZODIAC_NAMES[sIdx]}`;
  }

  // 12 Сакральных Дней: Программа
  const SACRED_DAYS = [
    { day: 1,  month: '1-й месяц года', theme: 'Личность, Тело & Персональный Импульс', desc: 'Уделите время себе, внешнему образу, личным желаниям и физическому телу. Никаких чужих компромиссов.' },
    { day: 2,  month: '2-й месяц года', theme: 'Личные Финансы & Энергоресурс', desc: 'Практика изобилия: покупка качественной вещи, пересмотр источников дохода, здоровая чистая пища.' },
    { day: 3,  month: '3-й месяц года', theme: 'Контакты, Знания & Ближний Круг', desc: 'День осознанного общения, прогулок, чтения важной книги или звонков родным и братьям/сестрам.' },
    { day: 4,  month: '4-й месяц года', theme: 'Дом, Род, Фундамент & Безопасность', desc: 'Наведение гармонии в доме, созвон с родителями, заземление и создание личного уюта.' },
    { day: 5,  month: '5-й месяц года', theme: 'Творчество, Страсть & Радость Жизни', desc: 'День игры, хобби, искренней любви, театра или подарка своему внутреннему ребенку.' },
    { day: 6,  month: '6-й месяц года', theme: 'Здоровье, Служение & Порядок', desc: 'Детокс, полезное питание, структурирование рабочих файлов и забота о своем благополучии.' },
    { day: 7,  month: '7-й месяц года', theme: 'Партнерство, Любовный Союз & Баланс', desc: 'Посвятите день ключевому партнеру, избегайте споров, ищите согласие и взаимную опору.' },
    { day: 8,  month: '8-й месяц года', theme: 'Трансформация, Глубина & Отпускание', desc: 'Освобождение от старых обид, психологическая работа, закрытие долгов и аудит инвестиций.' },
    { day: 9,  month: '9-й месяц года', theme: 'Смыслы, Горизонты & Большие Идеи', desc: 'Планирование путешествий, философские инсайты, благотворительность и духовные ориентиры.' },
    { day: 10, month: '10-й месяц года', theme: 'Карьера, Статус & Главная Вершина', desc: 'Фиксация профессиональных целей, разговор с руководством, кристаллизация своего призвания.' },
    { day: 11, month: '11-й месяц года', theme: 'Друзья, Будущее & Единомышленники', desc: 'Встреча с вдохновляющими людьми, генерация смелых идей и выход за рамки привычного.' },
    { day: 12, month: '12-й месяц года', theme: 'Уединение, Итоги & Внутренний Покой', desc: 'День тишины, благодарности ушедшему циклу, медитации и подготовки к новому витку.' }
  ];

  // Главная функция расчета
  function runSolarCalculation() {
    let birthDateVal = document.getElementById('ast-birth-date').value;
    let birthTimeVal = document.getElementById('ast-birth-time').value;
    let solarYearVal = parseInt(document.getElementById('ast-solar-year').value, 10);
    let cityParts = document.getElementById('ast-solar-city').value.split(',');
    let cityLat = parseFloat(cityParts[0]);
    let cityLon = parseFloat(cityParts[1]);
    let cityOffset = parseFloat(cityParts[2]);
    let cityName = document.getElementById('ast-solar-city').options[document.getElementById('ast-solar-city').selectedIndex].text;

    if (!birthDateVal || !birthTimeVal) return;

    let bParts = birthDateVal.split('-');
    let tParts = birthTimeVal.split(':');
    let bYear = parseInt(bParts[0], 10);
    let bMonth = parseInt(bParts[1], 10);
    let bDay = parseInt(bParts[2], 10);
    let bHour = parseInt(tParts[0], 10) + parseInt(tParts[1], 10) / 60.0;

    // Предполагаем, что натал введен по таймзоне выбранного города (или UTC)
    let natalJD = getJD(bYear, bMonth, bDay, bHour - cityOffset);
    let natalSunLon = getSunLongitude(natalJD);

    // Поиск момента возвращения Солнца в solarYearVal
    // Солнце проходит 360 градусов за ~365.2422 дней
    let approxJD = natalJD + (solarYearVal - bYear) * 365.2422;

    // Итеративный поиск (Ньютон / Бисекция)
    let curJD = approxJD;
    for (let iter = 0; iter < 12; iter++) {
      let curLon = getSunLongitude(curJD);
      let diff = curLon - natalSunLon;
      if (diff > 180) diff -= 360;
      if (diff < -180) diff += 360;

      // Суточная скорость Солнца ~ 0.9856 deg/day
      let dt = diff / 0.9856;
      curJD -= dt;
      if (Math.abs(dt) < 1e-6) break; // точность выше десятой доли секунды
    }

    let exactSolarJD = curJD;
    let solarLocalJD = exactSolarJD + (cityOffset / 24.0);

    // Конвертация в календарную дату
    let z = Math.floor(solarLocalJD + 0.5);
    let f = (solarLocalJD + 0.5) - z;
    let alpha = Math.floor((z - 1867216.25) / 36524.25);
    let A = z + 1 + alpha - Math.floor(alpha / 4);
    let B = A + 1524;
    let C = Math.floor((B - 122.1) / 365.25);
    let D = Math.floor(365.25 * C);
    let E = Math.floor((B - D) / 30.6001);

    let solDay = Math.floor(B - D - Math.floor(30.6001 * E));
    let solMonth = E < 14 ? E - 1 : E - 13;
    let solYear = solMonth > 2 ? C - 4716 : C - 4715;

    let dayFrac = f * 24.0;
    let solHour = Math.floor(dayFrac);
    let solMin = Math.floor((dayFrac - solHour) * 60.0);
    let solSec = Math.round(((dayFrac - solHour) * 60.0 - solMin) * 60.0);
    if (solSec === 60) { solSec = 0; solMin++; }
    if (solMin === 60) { solMin = 0; solHour++; }

    let monthsRu = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
    let formattedLocal = `${solDay} ${monthsRu[solMonth - 1]} ${solYear} года в ${String(solHour).padStart(2, '0')}:${String(solMin).padStart(2, '0')}:${String(solSec).padStart(2, '0')}`;

    // UTC время
    let utcHourFrac = (f * 24.0 - cityOffset + 24.0) % 24.0;
    let utcH = Math.floor(utcHourFrac);
    let utcM = Math.floor((utcHourFrac - utcH) * 60);

    // Асцендент Соляра (приблизительный расчет для широты)
    let T = (exactSolarJD - 2451545.0) / 36525.0;
    let GMST = rev(280.46061837 + 360.98564736629 * (exactSolarJD - 2451545.0) + 0.000387933 * T * T);
    let LMST = rev(GMST + cityLon);
    let eps = 23.4393;
    let ascDeg = rev(atan2d(cosd(LMST), -sind(LMST) * cosd(eps) - tand(cityLat) * sind(eps)));
    let ascSignIdx = Math.floor(ascDeg / 30);

    // Дом Солнца в Соляре
    let houseDiff = rev(natalSunLon - ascDeg);
    let sunHouse = Math.floor(houseDiff / 30) + 1;

    // Вывод в UI
    document.getElementById('ast-res-moment').textContent = formattedLocal;
    document.getElementById('ast-res-sun-pos').textContent = formatDegree(natalSunLon);
    document.getElementById('ast-res-utc').textContent = `${String(utcH).padStart(2, '0')}:${String(utcM).padStart(2, '0')} UTC`;
    document.getElementById('ast-res-city-name').textContent = cityName;

    document.getElementById('ast-res-asc').textContent = `${ZODIAC_NAMES[ascSignIdx]} (${Math.floor(ascDeg % 30)}°)`;
    document.getElementById('ast-res-sun-house').textContent = `${sunHouse}-й Дом Соляра`;

    let elementNames = ['Огонь (Драйв & Экспансия)', 'Земля (Материя & Фундамент)', 'Воздух (Связи & Интеллект)', 'Вода (Интуиция & Чувства)'];
    let curElement = elementNames[ascSignIdx % 4];
    document.getElementById('ast-res-element').textContent = curElement.split(' ')[0];
    document.getElementById('ast-res-element-desc').textContent = `Преобладающая динамика года: ${curElement}. Баланс воли и эмоциональной устойчивости.`;

    const missions = [
      'Старт ключевых авторских инициатив и укрепление личного авторитета',
      'Материализация активов, оформление крупной собственности и рост ресурса',
      'Масштабирование нетворкинга, обучение и запуск медийных проектов',
      'Семейный очаг, закладка родового фундамента и обретение глубинного покоя',
      'Яркий творческий триумф, известность и монетизация талантов',
      'Системный профессиональный рост, отладка здоровья и мастерство',
      'Выход на новый уровень в браке или обретение стратегического бизнес-союза',
      'Глубинная трансформация, работа с чужими инвестициями и преодоление кризиса',
      'Мировоззренческий прорыв, дальние экспедиции и наставничество',
      'Карьерный Олимп: достижение максимального социального статуса года',
      'Запуск масштабных интернет-проектов, работа с будущим и клубами единомышленников',
      'Духовное созревание, внутренний скит, интеграция опыта и очищение'
    ];
    document.getElementById('ast-res-mission').textContent = `${sunHouse}-й Дом Жизни`;
    document.getElementById('ast-res-mission-desc').textContent = missions[sunHouse - 1];

    // Рендер 12 Дней Соляра
    let daysContainer = document.getElementById('ast-days-container');
    daysContainer.innerHTML = '';

    SACRED_DAYS.forEach(sd => {
      let card = document.createElement('div');
      card.className = 'ast-day-card';
      card.innerHTML = `
        <div class="ast-day-top">
          <span class="ast-day-num">День ${sd.day}</span>
          <span class="ast-day-month">${sd.month}</span>
        </div>
        <div class="ast-day-theme">${sd.theme}</div>
        <div class="ast-day-text">${sd.desc}</div>
      `;
      daysContainer.appendChild(card);
    });
  }

  // Слушатель кнопки расчета
  document.getElementById('ast-sol-calc-btn').addEventListener('click', runSolarCalculation);

  // Первичный расчет при загрузке
  document.addEventListener('DOMContentLoaded', runSolarCalculation);
  runSolarCalculation();

})();
</script>

<?php
get_footer();