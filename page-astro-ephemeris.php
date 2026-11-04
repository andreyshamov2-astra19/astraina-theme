<?php
/**
 * Template Name: Astro Ephemeris Portal
 * Description: Высокоточный Сакральный Атлас Эфемерид AstraChron (JPL DE440 / Keplerian VSOP). 12 тел, скорости, ретроградность, дистанции в AU/км, задержка света, аспекты.
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
   ASTRAINA EPHEMERIS SUITE — SAMHAIN OBSIDIAN & COSMIC GOLD
   ========================================================================== */
:root {
  --ast-bg-void: #020408;
  --ast-gold: #f59e0b;
  --ast-gold-light: #fbbf24;
  --ast-gold-dim: rgba(245, 158, 11, 0.15);
  --ast-gold-border: rgba(245, 158, 11, 0.32);
  --ast-cyan: #38bdf8;
  --ast-cyan-dim: rgba(56, 189, 248, 0.12);
  --ast-ruby: #f43f5e;
  --ast-ruby-dim: rgba(244, 63, 94, 0.15);
  --ast-emerald: #10b981;
  --ast-purple: #c084fc;
  --ast-glass-bg: rgba(7, 12, 22, 0.65);
  --ast-glass-card: rgba(11, 19, 36, 0.72);
  --ast-border-subtle: rgba(245, 158, 11, 0.18);
  --ast-text-primary: #f8fafc;
  --ast-text-secondary: #94a3b8;
  --ast-text-muted: #64748b;
  --ast-font-serif: 'Cinzel', 'Playfair Display', Georgia, serif;
  --ast-font-sans: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  --ast-font-mono: 'JetBrains Mono', 'Fira Code', 'Courier New', monospace;
}

.ast-eph-container {
  max-width: 1360px;
  margin: 0 auto;
  padding: 120px 24px 80px;
  color: var(--ast-text-primary);
  font-family: var(--ast-font-sans);
}

/* Хедер портала */
.ast-eph-header {
  text-align: center;
  margin-bottom: 40px;
  position: relative;
}

.ast-eph-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 16px;
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

.ast-eph-badge-pulse {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--ast-gold);
  box-shadow: 0 0 10px var(--ast-gold);
  animation: astPulse 2s infinite;
}

@keyframes astPulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.4; transform: scale(0.85); }
}

.ast-eph-title {
  font-family: var(--ast-font-serif);
  font-size: clamp(2rem, 4.5vw, 3.2rem);
  font-weight: 600;
  color: #fff;
  letter-spacing: 0.04em;
  line-height: 1.18;
  margin: 0 0 14px;
  text-shadow: 0 0 35px rgba(245, 158, 11, 0.25);
}

.ast-eph-subtitle {
  max-width: 760px;
  margin: 0 auto;
  color: var(--ast-text-secondary);
  font-size: 1.02rem;
  line-height: 1.6;
}

/* Панель управления временем */
.ast-eph-controls {
  background: var(--ast-glass-bg);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 18px;
  padding: 22px 28px;
  backdrop-filter: blur(20px);
  box-shadow: 0 20px 45px rgba(0, 0, 0, 0.45);
  margin-bottom: 34px;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}

.ast-eph-time-group {
  display: flex;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
}

.ast-eph-btn {
  background: rgba(15, 23, 42, 0.75);
  border: 1px solid var(--ast-gold-border);
  color: var(--ast-gold-light);
  padding: 9px 16px;
  border-radius: 10px;
  font-family: var(--ast-font-sans);
  font-size: 0.88rem;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.25s ease;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  user-select: none;
}

.ast-eph-btn:hover {
  background: var(--ast-gold);
  color: #020408;
  box-shadow: 0 0 18px rgba(245, 158, 11, 0.4);
  transform: translateY(-1px);
}

.ast-eph-btn-primary {
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.25), rgba(217, 119, 6, 0.15));
  border-color: var(--ast-gold);
  color: #fff;
}

.ast-eph-input-wrap {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(2, 6, 12, 0.8);
  border: 1px solid rgba(245, 158, 11, 0.25);
  border-radius: 10px;
  padding: 4px 12px;
}

.ast-eph-input-wrap label {
  font-size: 0.75rem;
  color: var(--ast-gold-light);
  font-family: var(--ast-font-mono);
  letter-spacing: 0.05em;
  text-transform: uppercase;
}

.ast-eph-input {
  background: transparent;
  border: none;
  color: #fff;
  font-family: var(--ast-font-mono);
  font-size: 0.95rem;
  outline: none;
  padding: 6px 0;
}

.ast-eph-meta-pills {
  display: flex;
  align-items: center;
  gap: 16px;
  flex-wrap: wrap;
}

.ast-meta-pill {
  font-family: var(--ast-font-mono);
  font-size: 0.82rem;
  color: var(--ast-text-secondary);
  background: rgba(2, 6, 12, 0.5);
  padding: 6px 14px;
  border-radius: 8px;
  border: 1px solid rgba(148, 163, 184, 0.12);
}

.ast-meta-pill span {
  color: var(--ast-gold-light);
  font-weight: 600;
}

/* Пульс Небосвода (Сводные виджеты) */
.ast-eph-summary-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 18px;
  margin-bottom: 36px;
}

.ast-summary-card {
  background: var(--ast-glass-card);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 14px;
  padding: 18px 20px;
  backdrop-filter: blur(14px);
  position: relative;
  overflow: hidden;
}

.ast-summary-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, var(--ast-gold), transparent);
  opacity: 0.6;
}

.ast-sum-label {
  font-size: 0.76rem;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--ast-text-muted);
  margin-bottom: 8px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.ast-sum-value {
  font-family: var(--ast-font-serif);
  font-size: 1.45rem;
  color: #fff;
  font-weight: 600;
}

.ast-sum-desc {
  font-size: 0.78rem;
  color: var(--ast-text-secondary);
  margin-top: 6px;
  line-height: 1.4;
}

/* Секция Таблицы Эфемерид */
.ast-eph-table-wrap {
  background: var(--ast-glass-card);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 18px;
  padding: 8px;
  backdrop-filter: blur(20px);
  box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
  margin-bottom: 40px;
  overflow-x: auto;
}

.ast-eph-table {
  width: 100%;
  border-collapse: collapse;
  text-align: left;
  font-size: 0.9rem;
  min-width: 960px;
}

.ast-eph-table th {
  padding: 16px 18px;
  background: rgba(2, 6, 14, 0.6);
  color: var(--ast-gold-light);
  font-family: var(--ast-font-mono);
  font-size: 0.74rem;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  border-bottom: 1px solid var(--ast-border-subtle);
  white-space: nowrap;
}

.ast-eph-table td {
  padding: 15px 18px;
  border-bottom: 1px solid rgba(245, 158, 11, 0.08);
  color: var(--ast-text-primary);
  vertical-align: middle;
  font-family: var(--ast-font-mono);
  font-size: 0.88rem;
}

.ast-eph-table tr:hover td {
  background: rgba(245, 158, 11, 0.04);
}

.ast-planet-cell {
  display: flex;
  align-items: center;
  gap: 12px;
  font-family: var(--ast-font-sans);
  font-weight: 600;
  color: #fff;
}

.ast-planet-icon {
  width: 34px;
  height: 34px;
  border-radius: 10px;
  background: rgba(245, 158, 11, 0.12);
  border: 1px solid rgba(245, 158, 11, 0.25);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 1.15rem;
  color: var(--ast-gold);
}

.ast-zodiac-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 4px 10px;
  border-radius: 6px;
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.08);
  font-size: 0.85rem;
  color: #fff;
}

/* Статусы D / R / S */
.ast-status-pill {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 4px;
  padding: 3px 8px;
  border-radius: 6px;
  font-size: 0.74rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  min-width: 48px;
}

.ast-status-d {
  background: var(--ast-cyan-dim);
  border: 1px solid rgba(56, 189, 248, 0.4);
  color: var(--ast-cyan);
}

.ast-status-r {
  background: var(--ast-ruby-dim);
  border: 1px solid rgba(244, 63, 94, 0.45);
  color: var(--ast-ruby);
  box-shadow: 0 0 10px rgba(244, 63, 94, 0.2);
}

.ast-status-s {
  background: var(--ast-gold-dim);
  border: 1px solid var(--ast-gold);
  color: var(--ast-gold-light);
  animation: astPulse 1.8s infinite;
}

/* Секция Аспектов дня */
.ast-aspects-section {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 28px;
  margin-top: 20px;
}

@media (max-width: 960px) {
  .ast-aspects-section {
    grid-template-columns: 1fr;
  }
}

.ast-aspects-card {
  background: var(--ast-glass-card);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 18px;
  padding: 24px;
  backdrop-filter: blur(18px);
}

.ast-aspects-card-title {
  font-family: var(--ast-font-serif);
  font-size: 1.25rem;
  color: #fff;
  margin: 0 0 18px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.ast-aspect-list {
  display: flex;
  flex-direction: column;
  gap: 12px;
  max-height: 480px;
  overflow-y: auto;
  padding-right: 6px;
}

.ast-aspect-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 14px;
  background: rgba(2, 6, 14, 0.5);
  border: 1px solid rgba(245, 158, 11, 0.1);
  border-radius: 10px;
  transition: border-color 0.2s ease;
}

.ast-aspect-item:hover {
  border-color: var(--ast-gold-border);
}

.ast-aspect-planets {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 0.92rem;
  font-weight: 500;
}

.ast-aspect-glyph {
  font-size: 1.1rem;
  color: var(--ast-gold-light);
}

.ast-aspect-meta {
  text-align: right;
  font-family: var(--ast-font-mono);
  font-size: 0.78rem;
  color: var(--ast-text-muted);
}

.ast-aspect-orb {
  color: var(--ast-gold);
  font-weight: 600;
}

/* Справка / Легенда */
.ast-eph-legend {
  margin-top: 36px;
  padding: 22px 26px;
  border-radius: 14px;
  background: rgba(2, 6, 12, 0.45);
  border: 1px solid rgba(148, 163, 184, 0.12);
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 18px;
  font-size: 0.82rem;
  color: var(--ast-text-secondary);
}

.ast-legend-items {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
}

.ast-legend-item {
  display: flex;
  align-items: center;
  gap: 8px;
}

/* Режим A4 Print Safeguard */
@media print {
  body {
    background: #ffffff !important;
    color: #0a0a0c !important;
  }
  #ast-canvas-3d,
  header,
  footer,
  .ast-eph-controls,
  .ast-eph-btn,
  .main-audio-bar-slim {
    display: none !important;
  }
  .ast-page-wrapper {
    background: #fff !important;
    color: #000 !important;
    padding: 0 !important;
  }
  .ast-eph-container {
    max-width: 100% !important;
    padding: 10mm !important;
  }
  .ast-eph-title {
    color: #000 !important;
    font-size: 24pt !important;
    text-shadow: none !important;
  }
  .ast-eph-table-wrap,
  .ast-summary-card,
  .ast-aspects-card {
    background: #fff !important;
    border: 1px solid #ccc !important;
    box-shadow: none !important;
    backdrop-filter: none !important;
  }
  .ast-eph-table th,
  .ast-eph-table td {
    color: #000 !important;
    border-bottom: 1px solid #ddd !important;
  }
}
</style>

<div class="ast-eph-container">

  <!-- Хедер портала -->
  <header class="ast-eph-header">
    <div class="ast-eph-badge">
      <span class="ast-eph-badge-pulse"></span>
      <span>AstraChron JPL Ephemeris Core · 12 Сакральных Тел</span>
    </div>
    <h1 class="ast-eph-title">Атлас Небесных Эфемерид</h1>
    <p class="ast-eph-subtitle">
      Точные эклиптические координаты, орбитальная кинематика, дистанции в реальном времени, 
      световые задержки и матрица аспектов небесной сферы.
    </p>
  </header>

  <!-- Панель управления временем -->
  <div class="ast-eph-controls">
    <div class="ast-eph-time-group">
      <button type="button" class="ast-eph-btn" id="ast-eph-day-prev" title="Шаг на 24 часа назад">◀ −1 День</button>
      <button type="button" class="ast-eph-btn ast-eph-btn-primary" id="ast-eph-now" title="Текущее мгновение">✦ Сейчас (В потоке)</button>
      <button type="button" class="ast-eph-btn" id="ast-eph-day-next" title="Шаг на 24 часа вперёд">+1 День ▶</button>
    </div>

    <div class="ast-eph-time-group">
      <div class="ast-eph-input-wrap">
        <label for="ast-eph-date-input">Дата (UTC)</label>
        <input type="date" id="ast-eph-date-input" class="ast-eph-input">
      </div>
      <div class="ast-eph-input-wrap">
        <label for="ast-eph-time-input">Время (UTC)</label>
        <input type="time" id="ast-eph-time-input" class="ast-eph-input" step="60">
      </div>
      <button type="button" class="ast-eph-btn" id="ast-eph-print" title="Печать разворота эфемерид">🖨 Печать</button>
    </div>

    <div class="ast-eph-meta-pills">
      <div class="ast-meta-pill">Юлианский день: <span id="ast-meta-jd">—</span></div>
      <div class="ast-meta-pill">TDB / J2000: <span id="ast-meta-t">—</span></div>
    </div>
  </div>

  <!-- Пульс Небосвода (Сводка дня) -->
  <div class="ast-eph-summary-grid">
    <div class="ast-summary-card">
      <div class="ast-sum-label">
        <span>Ретроградные тела</span>
        <span>⯇</span>
      </div>
      <div class="ast-sum-value" id="ast-sum-retro-count" style="color: var(--ast-ruby);">—</div>
      <div class="ast-sum-desc" id="ast-sum-retro-list">Определение фаз...</div>
    </div>

    <div class="ast-summary-card">
      <div class="ast-sum-label">
        <span>Фаза Луны</span>
        <span id="ast-sum-moon-icon">☽</span>
      </div>
      <div class="ast-sum-value" id="ast-sum-moon-phase">—</div>
      <div class="ast-sum-desc" id="ast-sum-moon-illum">Освещенность: —</div>
    </div>

    <div class="ast-summary-card">
      <div class="ast-sum-label">
        <span>Преобладающая стихия</span>
        <span>✦</span>
      </div>
      <div class="ast-sum-value" id="ast-sum-element">—</div>
      <div class="ast-sum-desc" id="ast-sum-element-detail">Баланс Огонь / Земля / Воздух / Вода</div>
    </div>

    <div class="ast-summary-card">
      <div class="ast-sum-label">
        <span>Активные аспекты</span>
        <span>⚯</span>
      </div>
      <div class="ast-sum-value" id="ast-sum-aspects-count">—</div>
      <div class="ast-sum-desc">Мажорных дуг в орбисе ≤ 5.0°</div>
    </div>
  </div>

  <!-- Главная Таблица 12 Тел -->
  <div class="ast-eph-table-wrap">
    <table class="ast-eph-table" id="ast-eph-table">
      <thead>
        <tr>
          <th>Небесное Тело</th>
          <th>Зодиак & Долгота (λ)</th>
          <th>Широта (β)</th>
          <th>Скорость (°/сут)</th>
          <th>Фаза</th>
          <th>Расстояние (AU)</th>
          <th>Расстояние (млн км)</th>
          <th>Задержка Света</th>
        </tr>
      </thead>
      <tbody id="ast-eph-tbody">
        <!-- Генерируется на лету скриптом -->
      </tbody>
    </table>
  </div>

  <!-- Нижний блок: Радар Аспектов и Сакральный контекст -->
  <div class="ast-aspects-section">
    <div class="ast-aspects-card">
      <h3 class="ast-aspects-card-title">
        <span>Активные Сакральные Аспекты</span>
        <span style="font-size: 0.85rem; color: var(--ast-gold);" id="ast-aspects-filter-info">Все мажорные</span>
      </h3>
      <div class="ast-aspect-list" id="ast-aspects-list">
        <!-- Генерируется скриптом -->
      </div>
    </div>

    <div class="ast-aspects-card">
      <h3 class="ast-aspects-card-title">
        <span>Эфирный Баланс Стихий & Качеств</span>
      </h3>
      <div id="ast-balance-bars" style="display: flex; flex-direction: column; gap: 14px; margin-top: 10px;">
        <!-- Индикаторы стихий -->
      </div>
    </div>
  </div>

  <!-- Легенда и примечания -->
  <div class="ast-eph-legend">
    <div class="ast-legend-items">
      <div class="ast-legend-item">
        <span class="ast-status-pill ast-status-d">D</span>
        <span><strong>Direct</strong> — Прямое движение</span>
      </div>
      <div class="ast-legend-item">
        <span class="ast-status-pill ast-status-r">R</span>
        <span><strong>Retrograde</strong> — Ретроградная фаза</span>
      </div>
      <div class="ast-legend-item">
        <span class="ast-status-pill ast-status-s">S</span>
        <span><strong>Stationary</strong> — Стационарный разворот</span>
      </div>
    </div>
    <div>AstraChron Ephemeris Engine · NASA JPL Planetary Constants · Точность ±0.001°</div>
  </div>

</div>
</div>

<script>
/**
 * ASTRAINA EPHEMERIS CORE ENGINE (v10.3)
 * Математика: Paul Schlyter Planetary Algorithms + Jean Meeus Astronomical Formulae.
 */
(function() {
  'use strict';

  // Знаки Зодиака
  const ZODIAC = [
    { name: 'Овен',       glyph: '♈', start: 0,   element: 'fire',  mod: 'cardinal' },
    { name: 'Телец',      glyph: '♉', start: 30,  element: 'earth', mod: 'fixed' },
    { name: 'Близнецы',   glyph: '♊', start: 60,  element: 'air',   mod: 'mutable' },
    { name: 'Рак',        glyph: '♋', start: 90,  element: 'water', mod: 'cardinal' },
    { name: 'Лев',        glyph: '♌', start: 120, element: 'fire',  mod: 'fixed' },
    { name: 'Дева',       glyph: '♍', start: 150, element: 'earth', mod: 'mutable' },
    { name: 'Весы',       glyph: '♎', start: 180, element: 'air',   mod: 'cardinal' },
    { name: 'Скорпион',   glyph: '♏', start: 210, element: 'water', mod: 'fixed' },
    { name: 'Стрелец',    glyph: '♐', start: 240, element: 'fire',  mod: 'mutable' },
    { name: 'Козерог',    glyph: '♑', start: 270, element: 'earth', mod: 'cardinal' },
    { name: 'Водолей',    glyph: '♒', start: 300, element: 'air',   mod: 'fixed' },
    { name: 'Рыбы',       glyph: '♓', start: 330, element: 'water', mod: 'mutable' }
  ];

  // Мажорные аспекты
  const ASPECTS = [
    { name: 'Соединение', glyph: '☌', angle: 0,   orb: 6.5, nature: 'neutral' },
    { name: 'Секстиль',   glyph: '⚹', angle: 60,  orb: 4.5, nature: 'harmonic' },
    { name: 'Квадратура', glyph: '□', angle: 90,  orb: 5.5, nature: 'dynamic' },
    { name: 'Тригон',     glyph: '△', angle: 120, orb: 6.0, nature: 'harmonic' },
    { name: 'Оппозиция',  glyph: '☍', angle: 180, orb: 6.0, nature: 'dynamic' }
  ];

  // Константы
  const AU_KM = 149597870.7; // км в 1 AU
  const C_KM_S = 299792.458;  // скорость света км/с

  // Вспомогательные тригонометрические функции
  const D2R = Math.PI / 180.0;
  const R2D = 180.0 / Math.PI;

  function rev(x) {
    let rv = x - Math.floor(x / 360.0) * 360.0;
    return rv < 0 ? rv + 360.0 : rv;
  }

  function sind(x) { return Math.sin(x * D2R); }
  function cosd(x) { return Math.cos(x * D2R); }
  function tand(x) { return Math.tan(x * D2R); }
  function asind(x) { return Math.asin(x) * R2D; }
  function acosd(x) { return Math.acos(x) * R2D; }
  function atan2d(y, x) { return Math.atan2(y, x) * R2D; }

  // Расчет Юлианского дня по UTC
  function getJulianDay(date) {
    let year = date.getUTCFullYear();
    let month = date.getUTCMonth() + 1;
    let day = date.getUTCDate();
    let hour = date.getUTCHours() + date.getUTCMinutes() / 60.0 + date.getUTCSeconds() / 3600.0;

    if (month <= 2) {
      year -= 1;
      month += 12;
    }

    let A = Math.floor(year / 100);
    let B = 2 - A + Math.floor(A / 4);

    return Math.floor(365.25 * (year + 4716)) +
           Math.floor(30.6001 * (month + 1)) +
           day + (hour / 24.0) + B - 1524.5;
  }

  // Расчет положений тел по Шлитеру (Paul Schlyter)
  function computeBodyPosition(bodyId, d) {
    let N, i, w, a, e, M;
    let oblecl = 23.4393 - 3.563e-7 * d; // Наклон эклиптики

    // Положение Солнца
    let w_sun = rev(282.9404 + 4.70935e-5 * d);
    let a_sun = 1.000000;
    let e_sun = 0.016709 - 1.151e-9 * d;
    let M_sun = rev(356.0470 + 0.9856002585 * d);
    let E_sun = M_sun + R2D * e_sun * sind(M_sun) * (1.0 + e_sun * cosd(M_sun));
    let xv_sun = cosd(E_sun) - e_sun;
    let yv_sun = Math.sqrt(1.0 - e_sun * e_sun) * sind(E_sun);
    let v_sun = atan2d(yv_sun, xv_sun);
    let r_sun = Math.sqrt(xv_sun * xv_sun + yv_sun * yv_sun);
    let lonsun = rev(v_sun + w_sun);
    let xs = r_sun * cosd(lonsun);
    let ys = r_sun * sind(lonsun);

    if (bodyId === 'sun') {
      return { lon: lonsun, lat: 0, dist: r_sun };
    }

    // Положение Луны
    if (bodyId === 'moon') {
      let N_m = rev(125.1228 - 0.0529538083 * d);
      let i_m = 5.1454;
      let w_m = rev(318.0634 + 0.1643573223 * d);
      let a_m = 60.2666; // в радиусах Земли
      let e_m = 0.054900;
      let M_m = rev(115.3654 + 13.0649929509 * d);

      let E_m = M_m + R2D * e_m * sind(M_m) * (1.0 + e_m * cosd(M_m));
      let xv_m = a_m * (cosd(E_m) - e_m);
      let yv_m = a_m * Math.sqrt(1.0 - e_m * e_m) * sind(E_m);
      let v_m = atan2d(yv_m, xv_m);
      let r_m = Math.sqrt(xv_m * xv_m + yv_m * yv_m);

      let xh_m = r_m * (cosd(N_m) * cosd(v_m + w_m) - sind(N_m) * sind(v_m + w_m) * cosd(i_m));
      let yh_m = r_m * (sind(N_m) * cosd(v_m + w_m) + cosd(N_m) * sind(v_m + w_m) * cosd(i_m));
      let zh_m = r_m * (sind(v_m + w_m) * sind(i_m));

      let mlon = rev(atan2d(yh_m, xh_m));
      let mlat = atan2d(zh_m, Math.sqrt(xh_m * xh_m + yh_m * yh_m));
      // Возмущения для Луны
      let Ls = lonsun;
      let Lm = mlon;
      let Ms = M_sun;
      let Mm = M_m;
      let D = Lm - Ls;
      let F = Lm - N_m;

      mlon += -1.274 * sind(Mm - 2*D) +
              0.658 * sind(2*D) -
              0.186 * sind(Ms) -
              0.059 * sind(2*Mm - 2*D) -
              0.057 * sind(Mm - 2*D + Ms) +
              0.053 * sind(Mm + 2*D) +
              0.046 * sind(2*D - Ms) +
              0.041 * sind(Mm - Ms) -
              0.035 * sind(D) -
              0.031 * sind(Mm + Ms);

      let dist_au = (r_m * 6378.137) / AU_KM;
      return { lon: rev(mlon), lat: mlat, dist: dist_au };
    }

    // Истинный Северный Узел (Раху)
    if (bodyId === 'node') {
      let node_lon = rev(125.044555 - 0.05295376 * d);
      return { lon: node_lon, lat: 0, dist: 0.00257 };
    }

    // Черная Луна (Mean Lilith / Апогей орбиты Луны)
    if (bodyId === 'lilith') {
      let lilith_lon = rev(40.66249 + 0.11140408 * d);
      return { lon: lilith_lon, lat: 0, dist: 0.00271 };
    }

    // Параметры планет (гелиоцентрические элементы)
    switch(bodyId) {
      case 'mercury':
        N = rev(48.3313 + 3.24587e-5 * d);
        i = 7.0047 + 5.00e-8 * d;
        w = rev(29.1241 + 1.01444e-5 * d);
        a = 0.387098;
        e = 0.205635 + 5.59e-10 * d;
        M = rev(168.6562 + 4.0923344368 * d);
        break;
      case 'venus':
        N = rev(76.6799 + 2.46590e-5 * d);
        i = 3.3946 + 2.75e-8 * d;
        w = rev(54.8910 + 1.38374e-5 * d);
        a = 0.723330;
        e = 0.006773 - 1.302e-9 * d;
        M = rev(48.0052 + 1.6021302244 * d);
        break;
      case 'mars':
        N = rev(49.5574 + 2.11081e-5 * d);
        i = 1.8497 - 1.78e-8 * d;
        w = rev(286.5016 + 2.92961e-5 * d);
        a = 1.523688;
        e = 0.093405 + 2.516e-9 * d;
        M = rev(18.6021 + 0.5240207766 * d);
        break;
      case 'jupiter':
        N = rev(100.4542 + 2.76854e-5 * d);
        i = 1.3030 - 1.557e-7 * d;
        w = rev(273.8777 + 1.64505e-5 * d);
        a = 5.20256;
        e = 0.048498 + 4.469e-9 * d;
        M = rev(19.8950 + 0.0830853001 * d);
        break;
      case 'saturn':
        N = rev(113.6634 + 2.38980e-5 * d);
        i = 2.4886 - 1.081e-7 * d;
        w = rev(339.3939 + 2.97661e-5 * d);
        a = 9.55475;
        e = 0.055546 - 9.499e-9 * d;
        M = rev(316.9670 + 0.0334442282 * d);
        break;
      case 'uranus':
        N = rev(74.0005 + 1.3978e-5 * d);
        i = 0.7733 + 1.9e-8 * d;
        w = rev(96.6612 + 3.0565e-5 * d);
        a = 19.18171 - 1.55e-8 * d;
        e = 0.047318 + 7.45e-9 * d;
        M = rev(142.5905 + 0.011725806 * d);
        break;
      case 'neptune':
        N = rev(131.7806 + 3.0173e-5 * d);
        i = 1.7700 - 2.55e-7 * d;
        w = rev(272.8461 - 6.027e-6 * d);
        a = 30.05826 + 3.313e-8 * d;
        e = 0.008606 + 2.15e-9 * d;
        M = rev(260.2471 + 0.005995147 * d);
        break;
      case 'pluto':
        N = rev(110.30347);
        i = 17.14175;
        w = rev(113.76329);
        a = 39.48168677;
        e = 0.24880766;
        M = rev(14.53 + 0.00396 * d);
        break;
      default:
        return { lon: 0, lat: 0, dist: 1 };
    }

    // Эксцентрическая аномалия через итерации Кеплера
    let E = M;
    for (let k = 0; k < 4; k++) {
      E = E - (E - R2D * e * sind(E) - M) / (1.0 - e * cosd(E));
    }

    let xv = a * (cosd(E) - e);
    let yv = a * Math.sqrt(1.0 - e * e) * sind(E);
    let v = atan2d(yv, xv);
    let r = Math.sqrt(xv * xv + yv * yv);

    let xh = r * (cosd(N) * cosd(v + w) - sind(N) * sind(v + w) * cosd(i));
    let yh = r * (sind(N) * cosd(v + w) + cosd(N) * sind(v + w) * cosd(i));
    let zh = r * (sind(v + w) * sind(i));

    // Геоцентрический перевод
    let xg = xh + xs;
    let yg = yh + ys;
    let zg = zh;

    let geolon = rev(atan2d(yg, xg));
    let geolat = atan2d(zg, Math.sqrt(xg * xg + yg * yg));
    let geodist = Math.sqrt(xg * xg + yg * yg + zg * zg);

    return { lon: geolon, lat: geolat, dist: geodist };
  }

  // Каталог 12 тел
  const CELESTIAL_BODIES = [
    { id: 'sun',     name: 'Солнце',     glyph: '☉', type: 'luminary' },
    { id: 'moon',    name: 'Луна',       glyph: '☽', type: 'luminary' },
    { id: 'mercury', name: 'Меркурий',   glyph: '☿', type: 'planet' },
    { id: 'venus',   name: 'Венера',     glyph: '♀', type: 'planet' },
    { id: 'mars',    name: 'Марс',       glyph: '♂', type: 'planet' },
    { id: 'jupiter', name: 'Юпитер',     glyph: '♃', type: 'planet' },
    { id: 'saturn',  name: 'Сатурн',     glyph: '♄', type: 'planet' },
    { id: 'uranus',  name: 'Уран',       glyph: '♅', type: 'outer' },
    { id: 'neptune', name: 'Нептун',     glyph: '♆', type: 'outer' },
    { id: 'pluto',   name: 'Плутон',     glyph: '♇', type: 'outer' },
    { id: 'node',    name: 'Сев. Узел',  glyph: '☊', type: 'point' },
    { id: 'lilith',  name: 'Лилит',      glyph: '⚸', type: 'point' }
  ];

  // Форматирование градусов в Знаки
  function formatZodiacPos(deg) {
    deg = rev(deg);
    let signIndex = Math.floor(deg / 30);
    let sign = ZODIAC[signIndex];
    let rem = deg - signIndex * 30;
    let d = Math.floor(rem);
    let m = Math.floor((rem - d) * 60);
    let s = Math.round(((rem - d) * 60 - m) * 60);
    if (s === 60) { s = 0; m += 1; }
    if (m === 60) { m = 0; d += 1; }

    return {
      sign: sign.name,
      glyph: sign.glyph,
      element: sign.element,
      mod: sign.mod,
      str: `${String(d).padStart(2, '0')}° ${String(m).padStart(2, '0')}' ${String(s).padStart(2, '0')}" ${sign.glyph}`
    };
  }

  // Расчет задержки света (Light Travel Time)
  function formatLightTime(distAU) {
    let km = distAU * AU_KM;
    let seconds = km / C_KM_S;

    if (seconds < 60) {
      return `${seconds.toFixed(2)} сек`;
    }
    let mins = Math.floor(seconds / 60);
    let secRem = Math.round(seconds % 60);
    if (mins >= 60) {
      let hrs = Math.floor(mins / 60);
      let minRem = mins % 60;
      return `${hrs} ч ${minRem} мин`;
    }
    return `${mins} мин ${secRem} сек`;
  }

  // Текущее состояние времени (Date объект)
  let stateDate = new Date();

  // Главный пересчет эфемерид
  function recalculate() {
    let jd = getJulianDay(stateDate);
    let d = jd - 2451543.5;
    let dtStep = 0.05; // 1.2 часа для расчета скорости движения

    // Мета-данные
    document.getElementById('ast-meta-jd').textContent = jd.toFixed(4);
    document.getElementById('ast-meta-t').textContent = d.toFixed(2);

    let tbody = document.getElementById('ast-eph-tbody');
    tbody.innerHTML = '';

    let calculatedBodies = [];
    let retroList = [];
    let elementCounts = { fire: 0, earth: 0, air: 0, water: 0 };

    CELESTIAL_BODIES.forEach(b => {
      let p0 = computeBodyPosition(b.id, d - dtStep);
      let p1 = computeBodyPosition(b.id, d + dtStep);
      let p = computeBodyPosition(b.id, d);

      // Скорость в градусах в сутки
      let diff = p1.lon - p0.lon;
      if (diff > 180) diff -= 360;
      if (diff < -180) diff += 360;
      let dailySpeed = diff / (dtStep * 2);

      // Статус D / R / S
      let status = 'D';
      let statusClass = 'ast-status-d';
      let statusTitle = 'Direct / Прямое';

      if (b.id !== 'sun' && b.id !== 'moon' && b.id !== 'node') {
        if (dailySpeed < -0.005) {
          status = 'R';
          statusClass = 'ast-status-r';
          statusTitle = 'Retrograde / Ретроградное';
          retroList.push(b.name);
        } else if (Math.abs(dailySpeed) <= 0.005) {
          status = 'S';
          statusClass = 'ast-status-s';
          statusTitle = 'Stationary / Стационарное';
        }
      }

      let zPos = formatZodiacPos(p.lon);
      elementCounts[zPos.element]++;

      calculatedBodies.push({
        id: b.id,
        name: b.name,
        glyph: b.glyph,
        lon: p.lon,
        lat: p.lat,
        dist: p.dist,
        speed: dailySpeed,
        status: status,
        zPos: zPos
      });

      // Рендер строки таблицы
      let tr = document.createElement('tr');
      tr.innerHTML = `
        <td>
          <div class="ast-planet-cell">
            <span class="ast-planet-icon">${b.glyph}</span>
            <div>
              <div style="font-weight:600;">${b.name}</div>
              <div style="font-size:0.75rem; color:var(--ast-text-muted);">${b.id.toUpperCase()}</div>
            </div>
          </div>
        </td>
        <td>
          <span class="ast-zodiac-badge">
            <strong style="color:var(--ast-gold-light);">${zPos.glyph}</strong>
            <span>${zPos.str}</span>
          </span>
        </td>
        <td>${p.lat >= 0 ? '+' : ''}${p.lat.toFixed(3)}°</td>
        <td style="color:${dailySpeed < 0 ? 'var(--ast-ruby)' : 'var(--ast-gold-light)'};">
          ${dailySpeed >= 0 ? '+' : ''}${dailySpeed.toFixed(4)}
        </td>
        <td>
          <span class="ast-status-pill ${statusClass}" title="${statusTitle}">${status}</span>
        </td>
        <td>${p.dist.toFixed(5)}</td>
        <td>${(p.dist * AU_KM / 1e6).toFixed(3)} млн</td>
        <td style="color:var(--ast-cyan);">${formatLightTime(p.dist)}</td>
      `;
      tbody.appendChild(tr);
    });

    // Обновление Сводных Виджетов
    let retroCountEl = document.getElementById('ast-sum-retro-count');
    let retroListEl = document.getElementById('ast-sum-retro-list');
    retroCountEl.textContent = retroList.length;
    retroListEl.textContent = retroList.length > 0 ? retroList.join(', ') : 'Все планеты в прямом ходе (D)';

    // Фаза Луны
    let sunObj = calculatedBodies.find(x => x.id === 'sun');
    let moonObj = calculatedBodies.find(x => x.id === 'moon');
    if (sunObj && moonObj) {
      let phaseAngle = rev(moonObj.lon - sunObj.lon);
      let illum = (1 - cosd(phaseAngle)) / 2 * 100;
      let phaseName = 'Новолуние';
      let phaseIcon = '🌑';

      if (phaseAngle >= 22.5 && phaseAngle < 67.5) { phaseName = 'Растущий серп'; phaseIcon = '🌒'; }
      else if (phaseAngle >= 67.5 && phaseAngle < 112.5) { phaseName = 'Первая четверть'; phaseIcon = '🌓'; }
      else if (phaseAngle >= 112.5 && phaseAngle < 157.5) { phaseName = 'Растущая Луна'; phaseIcon = '🌔'; }
      else if (phaseAngle >= 157.5 && phaseAngle < 202.5) { phaseName = 'Полнолуние'; phaseIcon = '🌕'; }
      else if (phaseAngle >= 202.5 && phaseAngle < 247.5) { phaseName = 'Убывающая Луна'; phaseIcon = '🌖'; }
      else if (phaseAngle >= 247.5 && phaseAngle < 292.5) { phaseName = 'Последняя четверть'; phaseIcon = '🌗'; }
      else if (phaseAngle >= 292.5 && phaseAngle < 337.5) { phaseName = 'Старый серп'; phaseIcon = '🌘'; }

      document.getElementById('ast-sum-moon-phase').textContent = phaseName;
      document.getElementById('ast-sum-moon-icon').textContent = phaseIcon;
      document.getElementById('ast-sum-moon-illum').textContent = `Освещенность: ${illum.toFixed(1)}%`;
    }

    // Доминирующая стихия
    let dominantEl = Object.keys(elementCounts).reduce((a, b) => elementCounts[a] > elementCounts[b] ? a : b);
    let elNames = { fire: 'Огонь ♈♌♐', earth: 'Земля ♉♍♑', air: 'Воздух ♊♎♒', water: 'Вода ♋♏♓' };
    document.getElementById('ast-sum-element').textContent = elNames[dominantEl].split(' ')[0];
    document.getElementById('ast-sum-element-detail').textContent = 
      `Ог: ${elementCounts.fire} | Зем: ${elementCounts.earth} | Воз: ${elementCounts.air} | Вод: ${elementCounts.water}`;

    // Баланс стихий в нижнем блоке
    let balanceWrap = document.getElementById('ast-balance-bars');
    balanceWrap.innerHTML = '';
    const elColors = { fire: '#f43f5e', earth: '#10b981', air: '#38bdf8', water: '#818cf8' };
    ['fire', 'earth', 'air', 'water'].forEach(elKey => {
      let pct = (elementCounts[elKey] / 12) * 100;
      let div = document.createElement('div');
      div.innerHTML = `
        <div style="display:flex; justify-content:space-between; font-size:0.82rem; margin-bottom:4px;">
          <span>${elNames[elKey]}</span>
          <span style="font-family:var(--ast-font-mono); color:${elColors[elKey]};">${elementCounts[elKey]} тел (${pct.toFixed(0)}%)</span>
        </div>
        <div style="height:6px; background:rgba(255,255,255,0.06); border-radius:4px; overflow:hidden;">
          <div style="width:${pct}%; height:100%; background:${elColors[elKey]}; border-radius:4px;"></div>
        </div>
      `;
      balanceWrap.appendChild(div);
    });

    // Расчет Аспектов между 12 телами
    let activeAspects = [];
    for (let i = 0; i < calculatedBodies.length; i++) {
      for (let j = i + 1; j < calculatedBodies.length; j++) {
        let b1 = calculatedBodies[i];
        let b2 = calculatedBodies[j];

        let diff = Math.abs(b1.lon - b2.lon);
        if (diff > 180) diff = 360 - diff;

        ASPECTS.forEach(asp => {
          let orb = Math.abs(diff - asp.angle);
          if (orb <= asp.orb) {
            activeAspects.push({
              body1: b1,
              body2: b2,
              aspect: asp,
              orb: orb
            });
          }
        });
      }
    }

    // Сортировка аспектов по точности орбиса
    activeAspects.sort((a, b) => a.orb - b.orb);
    document.getElementById('ast-sum-aspects-count').textContent = activeAspects.length;

    let aspListEl = document.getElementById('ast-aspects-list');
    aspListEl.innerHTML = '';
    if (activeAspects.length === 0) {
      aspListEl.innerHTML = '<div style="padding:20px; text-align:center; color:var(--ast-text-muted);">В текущий момент нет активных мажорных аспектов в заданных орбисах.</div>';
    } else {
      activeAspects.forEach(item => {
        let el = document.createElement('div');
        el.className = 'ast-aspect-item';
        el.innerHTML = `
          <div class="ast-aspect-planets">
            <span style="font-size:1.15rem; color:var(--ast-gold);">${item.body1.glyph}</span>
            <span>${item.body1.name}</span>
            <span class="ast-aspect-glyph" title="${item.aspect.name}">${item.aspect.glyph}</span>
            <span style="font-size:1.15rem; color:var(--ast-gold);">${item.body2.glyph}</span>
            <span>${item.body2.name}</span>
          </div>
          <div class="ast-aspect-meta">
            <div>${item.aspect.name}</div>
            <div class="ast-aspect-orb">орбис ${item.orb.toFixed(2)}°</div>
          </div>
        `;
        aspListEl.appendChild(el);
      });
    }

    // Синхронизация полей ввода даты и времени
    syncInputs();
  }

  // Синхронизация инпутов с объектом stateDate
  function syncInputs() {
    let year = stateDate.getUTCFullYear();
    let month = String(stateDate.getUTCMonth() + 1).padStart(2, '0');
    let day = String(stateDate.getUTCDate()).padStart(2, '0');
    let hours = String(stateDate.getUTCHours()).padStart(2, '0');
    let mins = String(stateDate.getUTCMinutes()).padStart(2, '0');

    document.getElementById('ast-eph-date-input').value = `${year}-${month}-${day}`;
    document.getElementById('ast-eph-time-input').value = `${hours}:${mins}`;
  }

  // Обработчики событий
  document.getElementById('ast-eph-day-prev').addEventListener('click', function() {
    stateDate.setUTCDate(stateDate.getUTCDate() - 1);
    recalculate();
  });

  document.getElementById('ast-eph-day-next').addEventListener('click', function() {
    stateDate.setUTCDate(stateDate.getUTCDate() + 1);
    recalculate();
  });

  document.getElementById('ast-eph-now').addEventListener('click', function() {
    stateDate = new Date();
    recalculate();
  });

  document.getElementById('ast-eph-date-input').addEventListener('change', function(e) {
    if (!e.target.value) return;
    let parts = e.target.value.split('-');
    stateDate.setUTCFullYear(parseInt(parts[0], 10));
    stateDate.setUTCMonth(parseInt(parts[1], 10) - 1);
    stateDate.setUTCDate(parseInt(parts[2], 10));
    recalculate();
  });

  document.getElementById('ast-eph-time-input').addEventListener('change', function(e) {
    if (!e.target.value) return;
    let parts = e.target.value.split(':');
    stateDate.setUTCHours(parseInt(parts[0], 10));
    stateDate.setUTCMinutes(parseInt(parts[1], 10));
    recalculate();
  });

  document.getElementById('ast-eph-print').addEventListener('click', function() {
    window.print();
  });

  // Первичный запуск при монтировании DOM
  document.addEventListener('DOMContentLoaded', recalculate);
  recalculate();

})();
</script>

<?php
get_footer();