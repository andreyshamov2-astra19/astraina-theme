<?php
/**
 * Template Name: Astro Stories 9:16 Viral Generator
 * Description: Виральный генератор сакральных Stories 9:16 (1080x1920 Canvas PNG) в стиле Samhain Obsidian & Cosmic Gold. Триада, Лунный Оракул, Синастрия, автономный Cosmic Share Hub и экспорт в буфер обмена.
 * Version: 11.0.0
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
   ASTRAINA STORIES GENERATOR — SAMHAIN OBSIDIAN & COSMIC GOLD
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
  --ast-purple: #c084fc;
  --ast-emerald: #10b981;
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

.ast-str-container {
  max-width: 1360px;
  margin: 0 auto;
  padding: 120px 24px 80px;
  color: var(--ast-text-primary);
  font-family: var(--ast-font-sans);
}

.ast-str-header {
  text-align: center;
  margin-bottom: 40px;
}

.ast-str-badge {
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

.ast-str-badge-pulse {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--ast-gold);
  box-shadow: 0 0 10px var(--ast-gold);
  animation: astStrPulse 2s infinite;
}

@keyframes astStrPulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.4; transform: scale(0.85); }
}

.ast-str-title {
  font-family: var(--ast-font-serif);
  font-size: clamp(2rem, 4.4vw, 3.2rem);
  font-weight: 600;
  color: #fff;
  letter-spacing: 0.04em;
  line-height: 1.18;
  margin: 0 0 14px;
  text-shadow: 0 0 35px rgba(245, 158, 11, 0.25);
}

.ast-str-subtitle {
  max-width: 780px;
  margin: 0 auto;
  color: var(--ast-text-secondary);
  font-size: 1.02rem;
  line-height: 1.6;
}

.ast-str-studio {
  display: grid;
  grid-template-columns: 460px 1fr;
  gap: 36px;
  align-items: start;
}

@media (max-width: 1024px) {
  .ast-str-studio {
    grid-template-columns: 1fr;
  }
}

.ast-str-preview-pane {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: sticky;
  top: 100px;
}

.ast-phone-mockup {
  width: 330px;
  height: 586px;
  border-radius: 36px;
  border: 4px solid rgba(245, 158, 11, 0.4);
  box-shadow: 0 25px 60px rgba(0, 0, 0, 0.8), 0 0 30px rgba(245, 158, 11, 0.25);
  overflow: hidden;
  position: relative;
  background: #020408;
}

.ast-phone-notch {
  position: absolute;
  top: 10px;
  left: 50%;
  transform: translateX(-50%);
  width: 90px;
  height: 18px;
  background: #000;
  border-radius: 10px;
  z-index: 20;
}

#ast-render-canvas {
  width: 100%;
  height: 100%;
  display: block;
}

.ast-str-actions {
  display: flex;
  gap: 12px;
  margin-top: 24px;
  width: 100%;
  max-width: 330px;
}

.ast-str-btn {
  flex: 1;
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.25), rgba(217, 119, 6, 0.15));
  border: 1px solid var(--ast-gold);
  color: #fff;
  padding: 12px 16px;
  border-radius: 10px;
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.25s ease;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
}

.ast-str-btn:hover {
  background: var(--ast-gold);
  color: #020408;
  box-shadow: 0 0 20px rgba(245, 158, 11, 0.45);
  transform: translateY(-1px);
}

.ast-str-btn-alt {
  background: rgba(15, 23, 42, 0.8);
  border-color: rgba(245, 158, 11, 0.3);
  color: var(--ast-gold-light);
}

.ast-str-controls-pane {
  background: var(--ast-glass-card);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 22px;
  padding: 32px;
  backdrop-filter: blur(20px);
  box-shadow: 0 20px 45px rgba(0, 0, 0, 0.45);
  display: flex;
  flex-direction: column;
  gap: 26px;
}

.ast-ctrl-section-title {
  font-family: var(--ast-font-serif);
  font-size: 1.15rem;
  color: var(--ast-gold-light);
  margin: 0 0 14px;
}

.ast-format-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
  gap: 12px;
}

.ast-format-card {
  background: rgba(2, 6, 14, 0.6);
  border: 1px solid rgba(245, 158, 11, 0.15);
  border-radius: 12px;
  padding: 14px;
  cursor: pointer;
  transition: all 0.22s ease;
  text-align: left;
}

.ast-format-card:hover {
  border-color: var(--ast-gold-border);
}

.ast-format-card.active {
  background: var(--ast-gold-dim);
  border-color: var(--ast-gold);
  box-shadow: 0 0 16px rgba(245, 158, 11, 0.2);
}

.ast-fmt-name {
  font-weight: 600;
  font-size: 0.9rem;
  color: #fff;
  margin-bottom: 4px;
}

.ast-fmt-desc {
  font-size: 0.76rem;
  color: var(--ast-text-muted);
}

.ast-themes-flex {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}

.ast-theme-pill {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(2, 6, 14, 0.6);
  border: 1px solid rgba(148, 163, 184, 0.18);
  padding: 8px 14px;
  border-radius: 8px;
  font-size: 0.82rem;
  color: var(--ast-text-secondary);
  cursor: pointer;
  transition: all 0.2s ease;
}

.ast-theme-pill.active {
  border-color: var(--ast-gold);
  color: #fff;
  background: rgba(245, 158, 11, 0.1);
}

.ast-theme-dot {
  width: 12px;
  height: 12px;
  border-radius: 50%;
}

.ast-inputs-flow {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.ast-str-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.ast-str-label {
  font-size: 0.76rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--ast-gold-light);
  font-family: var(--ast-font-mono);
}

.ast-str-input, .ast-str-select {
  width: 100%;
  padding: 11px 14px;
  background: rgba(2, 6, 12, 0.85);
  border: 1px solid rgba(245, 158, 11, 0.25);
  border-radius: 10px;
  color: #fff;
  font-family: var(--ast-font-sans);
  font-size: 0.92rem;
  outline: none;
  transition: all 0.25s ease;
}

.ast-str-input:focus, .ast-str-select:focus {
  border-color: var(--ast-gold);
  box-shadow: 0 0 14px rgba(245, 158, 11, 0.3);
}

/* ==========================================================================
   COSMIC SHARE HUB (MODAL)
   ========================================================================== */
.ast-share-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: rgba(2, 4, 8, 0.82);
  backdrop-filter: blur(16px);
  z-index: 9999;
  display: none;
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.ast-share-overlay.active {
  display: flex;
}

.ast-share-box {
  background: #070d18;
  border: 1px solid var(--ast-gold-border);
  border-radius: 20px;
  max-width: 520px;
  width: 100%;
  padding: 30px;
  position: relative;
  box-shadow: 0 30px 70px rgba(0, 0, 0, 0.8), 0 0 30px rgba(245, 158, 11, 0.2);
  animation: astShareIn 0.25s ease-out;
}

@keyframes astShareIn {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
}

.ast-share-close {
  position: absolute;
  top: 18px;
  right: 20px;
  background: transparent;
  border: none;
  color: var(--ast-text-muted);
  font-size: 1.5rem;
  cursor: pointer;
  line-height: 1;
}

.ast-share-close:hover {
  color: var(--ast-gold-light);
}

.ast-share-title {
  font-family: var(--ast-font-serif);
  font-size: 1.5rem;
  color: #fff;
  margin: 0 0 8px;
}

.ast-share-desc {
  font-size: 0.88rem;
  color: var(--ast-text-secondary);
  margin-bottom: 22px;
}

.ast-share-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
  margin-bottom: 20px;
}

.ast-share-tile {
  background: rgba(2, 6, 14, 0.65);
  border: 1px solid rgba(245, 158, 11, 0.16);
  border-radius: 12px;
  padding: 14px;
  display: flex;
  align-items: center;
  gap: 10px;
  color: #fff;
  font-size: 0.88rem;
  font-weight: 500;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.2s ease;
}

.ast-share-tile:hover {
  border-color: var(--ast-gold);
  background: var(--ast-gold-dim);
  color: var(--ast-gold-light);
  transform: translateY(-2px);
}

.ast-share-tile-icon {
  font-size: 1.25rem;
}

.ast-toast-notice {
  display: none;
  margin-top: 14px;
  padding: 10px 14px;
  background: rgba(16, 185, 129, 0.15);
  border: 1px solid var(--ast-emerald);
  border-radius: 8px;
  color: var(--ast-emerald);
  font-size: 0.84rem;
  text-align: center;
}

.ast-toast-notice.active {
  display: block;
}

@media print {
  body { background: #fff !important; color: #000 !important; }
  header, footer, #ast-canvas-3d, .ast-str-controls-pane, .ast-str-actions, .ast-share-overlay { display: none !important; }
  .ast-str-container { padding: 0 !important; }
  .ast-phone-mockup { border: 1px solid #ccc !important; box-shadow: none !important; }
}
</style>

<div class="ast-str-container">

  <header class="ast-str-header">
    <div class="ast-str-badge">
      <span class="ast-str-badge-pulse"></span>
      <span>AstraChron Visual Engine · Ultra HD 1080×1920 (9:16)</span>
    </div>
    <h1 class="ast-str-title">Генератор Сакральных Stories</h1>
    <p class="ast-str-subtitle">
      Создание эстетичных космических постеров для социальных сетей. 
      Моментальный экспорт в высоком разрешении без водяных знаков и сжатия.
    </p>
  </header>

  <div class="ast-str-studio">

    <!-- Превью Смартфона -->
    <div class="ast-str-preview-pane">
      <div class="ast-phone-mockup">
        <div class="ast-phone-notch"></div>
        <canvas id="ast-render-canvas" width="1080" height="1920"></canvas>
      </div>

      <div class="ast-str-actions">
        <button type="button" class="ast-str-btn" id="ast-btn-download">
          <span>⬇ Скачать PNG</span>
        </button>
        <button type="button" class="ast-str-btn ast-str-btn-alt" id="ast-btn-share">
          <span>✦ Поделиться</span>
        </button>
      </div>
    </div>

    <!-- Пульт Управления -->
    <div class="ast-str-controls-pane">

      <div>
        <h3 class="ast-ctrl-section-title">1. Сакральный Формат Stories</h3>
        <div class="ast-format-grid" id="ast-format-selector">
          <div class="ast-format-card active" data-format="triad">
            <div class="ast-fmt-name">✦ Космическая Триада</div>
            <div class="ast-fmt-desc">Солнце ☉, Луна ☽ и Асцендент ↑</div>
          </div>
          <div class="ast-format-card" data-format="lunar">
            <div class="ast-fmt-name">☽ Лунный Оракул</div>
            <div class="ast-fmt-desc">Реальная фаза, знак дня и совет</div>
          </div>
          <div class="ast-format-card" data-format="synastry">
            <div class="ast-fmt-name">⚯ Резонанс Душ</div>
            <div class="ast-fmt-desc">Партнер и Другой Партнер</div>
          </div>
          <div class="ast-format-card" data-format="manifesto">
            <div class="ast-fmt-name">📜 Эфирный Манифест</div>
            <div class="ast-fmt-desc">Персональная цитата и транзит дня</div>
          </div>
        </div>
      </div>

      <div>
        <h3 class="ast-ctrl-section-title">2. Палитра Эфира</h3>
        <div class="ast-themes-flex" id="ast-theme-selector">
          <div class="ast-theme-pill active" data-theme="obsidian">
            <span class="ast-theme-dot" style="background: #f59e0b;"></span>
            <span>Obsidian Gold</span>
          </div>
          <div class="ast-theme-pill" data-theme="amethyst">
            <span class="ast-theme-dot" style="background: #c084fc;"></span>
            <span>Amethyst Night</span>
          </div>
          <div class="ast-theme-pill" data-theme="emerald">
            <span class="ast-theme-dot" style="background: #10b981;"></span>
            <span>Emerald Orbit</span>
          </div>
          <div class="ast-theme-pill" data-theme="ruby">
            <span class="ast-theme-dot" style="background: #f43f5e;"></span>
            <span>Ruby Eclipse</span>
          </div>
        </div>
      </div>

      <div class="ast-inputs-flow" id="ast-dynamic-inputs">

        <div class="ast-str-group">
          <label for="ast-inp-name" class="ast-str-label">Имя Натива / Никнейм</label>
          <input type="text" id="ast-inp-name" class="ast-str-input" value="Астральный Странник" maxlength="28">
        </div>

        <!-- Триада -->
        <div id="ast-fields-triad" class="ast-inputs-flow">
          <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap: 10px;">
            <div class="ast-str-group">
              <label for="ast-sel-sun" class="ast-str-label">Солнце ☉</label>
              <select id="ast-sel-sun" class="ast-str-select">
                <option value="Овен ♈">Овен ♈</option>
                <option value="Телец ♉">Телец ♉</option>
                <option value="Близнецы ♊">Близнецы ♊</option>
                <option value="Рак ♋">Рак ♋</option>
                <option value="Лев ♌" selected>Лев ♌</option>
                <option value="Дева ♍">Дева ♍</option>
                <option value="Весы ♎">Весы ♎</option>
                <option value="Скорпион ♏">Скорпион ♏</option>
                <option value="Стрелец ♐">Стрелец ♐</option>
                <option value="Козерог ♑">Козерог ♑</option>
                <option value="Водолей ♒">Водолей ♒</option>
                <option value="Рыбы ♓">Рыбы ♓</option>
              </select>
            </div>

            <div class="ast-str-group">
              <label for="ast-sel-moon" class="ast-str-label">Луна ☽</label>
              <select id="ast-sel-moon" class="ast-str-select">
                <option value="Овен ♈">Овен ♈</option>
                <option value="Телец ♉">Телец ♉</option>
                <option value="Близнецы ♊">Близнецы ♊</option>
                <option value="Рак ♋">Рак ♋</option>
                <option value="Лев ♌">Лев ♌</option>
                <option value="Дева ♍">Дева ♍</option>
                <option value="Весы ♎">Весы ♎</option>
                <option value="Скорпион ♏" selected>Скорпион ♏</option>
                <option value="Стрелец ♐">Стрелец ♐</option>
                <option value="Козерог ♑">Козерог ♑</option>
                <option value="Водолей ♒">Водолей ♒</option>
                <option value="Рыбы ♓">Рыбы ♓</option>
              </select>
            </div>

            <div class="ast-str-group">
              <label for="ast-sel-asc" class="ast-str-label">Асцендент ↑</label>
              <select id="ast-sel-asc" class="ast-str-select">
                <option value="Овен ♈">Овен ♈</option>
                <option value="Телец ♉">Телец ♉</option>
                <option value="Близнецы ♊">Близнецы ♊</option>
                <option value="Рак ♋">Рак ♋</option>
                <option value="Лев ♌">Лев ♌</option>
                <option value="Дева ♍">Дева ♍</option>
                <option value="Весы ♎">Весы ♎</option>
                <option value="Скорпион ♏">Скорпион ♏</option>
                <option value="Стрелец ♐" selected>Стрелец ♐</option>
                <option value="Козерог ♑">Козерог ♑</option>
                <option value="Водолей ♒">Водолей ♒</option>
                <option value="Рыбы ♓">Рыбы ♓</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Синастрия: Партнер и Другой Партнер -->
        <div id="ast-fields-synastry" class="ast-inputs-flow" style="display: none;">
          <div class="ast-str-group">
            <label for="ast-inp-partner" class="ast-str-label">Имя: Другой Партнер</label>
            <input type="text" id="ast-inp-partner" class="ast-str-input" value="Другой Партнер">
          </div>
          <div class="ast-str-group">
            <label for="ast-inp-harmony" class="ast-str-label">Индекс Созвучия (%)</label>
            <input type="range" id="ast-inp-harmony" min="60" max="99" value="94" style="accent-color: var(--ast-gold);">
            <div style="font-family:var(--ast-font-mono); color:var(--ast-gold-light); font-size:0.85rem;" id="ast-val-harmony">94%</div>
          </div>
        </div>

        <div class="ast-str-group">
          <label for="ast-inp-quote" class="ast-str-label">Сакральное Послание</label>
          <input type="text" id="ast-inp-quote" class="ast-str-input" value="Звёзды не диктуют судьбу — они освещают наш суверенный путь." maxlength="85">
        </div>

      </div>

    </div>

  </div>

</div>

<!-- Модальное окно шеринга -->
<div class="ast-share-overlay" id="ast-share-modal">
  <div class="ast-share-box">
    <button type="button" class="ast-share-close" id="ast-share-close-btn">&times;</button>
    <h3 class="ast-share-title">Поделиться Разворотом</h3>
    <p class="ast-share-desc">Выберите удобный способ отправить сакральную Story или скопируйте изображение прямо в буфер обмена:</p>

    <div class="ast-share-grid">
      <div class="ast-share-tile" id="ast-share-copy-img">
        <span class="ast-share-tile-icon">📋</span>
        <span>Скопировать Story (в буфер)</span>
      </div>

      <a class="ast-share-tile" id="ast-share-tg" href="#" target="_blank" rel="noopener">
        <span class="ast-share-tile-icon">✈️</span>
        <span>Telegram</span>
      </a>

      <a class="ast-share-tile" id="ast-share-wa" href="#" target="_blank" rel="noopener">
        <span class="ast-share-tile-icon">💬</span>
        <span>WhatsApp</span>
      </a>

      <a class="ast-share-tile" id="ast-share-vk" href="#" target="_blank" rel="noopener">
        <span class="ast-share-tile-icon">🔵</span>
        <span>ВКонтакте</span>
      </a>

      <div class="ast-share-tile" id="ast-share-copy-link">
        <span class="ast-share-tile-icon">🔗</span>
        <span>Скопировать ссылку</span>
      </div>

      <div class="ast-share-tile" id="ast-share-download-modal">
        <span class="ast-share-tile-icon">⬇</span>
        <span>Сохранить PNG</span>
      </div>
    </div>

    <div class="ast-toast-notice" id="ast-share-toast">✓ Скопировано в буфер обмена!</div>
  </div>
</div>

</div>

<script>
/**
 * ASTRAINA STORIES CANVAS & SHARE HUB ENGINE (v11.0.0)
 * Астрономическая математика расчета лунных суток, фазы и истинного положения Луны
 */
(function() {
  'use strict';

  const canvas = document.getElementById('ast-render-canvas');
  const ctx = canvas.getContext('2d');
  const shareModal = document.getElementById('ast-share-modal');
  const toastNotice = document.getElementById('ast-share-toast');

  let currentFormat = 'triad';
  let currentTheme = 'obsidian';

  const PALETTES = {
    obsidian: {
      bgTop: '#020408',
      bgBottom: '#0d1527',
      primary: '#f59e0b',
      accent: '#fbbf24',
      subtle: 'rgba(245, 158, 11, 0.25)',
      cardBg: 'rgba(7, 13, 26, 0.85)'
    },
    amethyst: {
      bgTop: '#030208',
      bgBottom: '#1a0d2e',
      primary: '#c084fc',
      accent: '#e879f9',
      subtle: 'rgba(192, 132, 252, 0.25)',
      cardBg: 'rgba(19, 10, 36, 0.85)'
    },
    emerald: {
      bgTop: '#010805',
      bgBottom: '#072418',
      primary: '#10b981',
      accent: '#34d399',
      subtle: 'rgba(16, 185, 129, 0.25)',
      cardBg: 'rgba(4, 24, 17, 0.85)'
    },
    ruby: {
      bgTop: '#080103',
      bgBottom: '#280711',
      primary: '#f43f5e',
      accent: '#fb7185',
      subtle: 'rgba(244, 63, 94, 0.25)',
      cardBg: 'rgba(28, 7, 14, 0.85)'
    }
  };

  const ZODIAC_SIGNS = [
    { name: 'Овне', symbol: '♈' },
    { name: 'Тельце', symbol: '♉' },
    { name: 'Близнецах', symbol: '♊' },
    { name: 'Раке', symbol: '♋' },
    { name: 'Льве', symbol: '♌' },
    { name: 'Деве', symbol: '♍' },
    { name: 'Весах', symbol: '♎' },
    { name: 'Скорпионе', symbol: '♏' },
    { name: 'Стрельце', symbol: '♐' },
    { name: 'Козероге', symbol: '♑' },
    { name: 'Водолее', symbol: '♒' },
    { name: 'Рыбах', symbol: '♓' }
  ];

  // Математический расчет реальной астрономической Луны на текущую дату
  function getAstronomicMoon() {
    const now = new Date();
    const jd = (now.getTime() / 86400000) - (now.getTimezoneOffset() / 1440) + 2440587.5;
    const d = jd - 2451543.5;
    const T = (jd - 2451545.0) / 36525.0;

    // Долгота Солнца
    const L0 = 280.46646 + 36000.76983 * T;
    const M = (357.52911 + 35999.05029 * T) * Math.PI / 180;
    const sunLong = (L0 + 1.914602 * Math.sin(M) + 0.019993 * Math.sin(2 * M)) % 360;

    // Долгота Луны
    const moonLong = (218.316 + 481267.8813 * T + 6.289 * Math.sin((134.963 + 477198.8676 * T) * Math.PI / 180)) % 360;
    const normMoon = (moonLong + 360) % 360;
    const normSun = (sunLong + 360) % 360;

    // Фазовый угол
    let phaseAngle = (normMoon - normSun + 360) % 360;
    let illum = Math.round((1 - Math.cos(phaseAngle * Math.PI / 180)) / 2 * 100);

    // Номер лунных суток
    const knownNewMoon = 947163600;
    let lDayFrac = ((now.getTime() / 1000 - knownNewMoon) / 86400) % 29.53058867;
    if (lDayFrac < 0) lDayFrac += 29.53058867;
    let lDay = Math.floor(lDayFrac) + 1;

    let phaseName = 'Новолуние';
    let phaseEmoji = '🌑';

    if (phaseAngle >= 22.5 && phaseAngle < 67.5) {
      phaseName = 'Растущий Серп'; phaseEmoji = '🌒';
    } else if (phaseAngle >= 67.5 && phaseAngle < 112.5) {
      phaseName = 'Первая Четверть'; phaseEmoji = '🌓';
    } else if (phaseAngle >= 112.5 && phaseAngle < 157.5) {
      phaseName = 'Прибывающая Луна'; phaseEmoji = '🌔';
    } else if (phaseAngle >= 157.5 && phaseAngle < 202.5) {
      phaseName = 'Полнолуние'; phaseEmoji = '🌕';
    } else if (phaseAngle >= 202.5 && phaseAngle < 247.5) {
      phaseName = 'Убывающая Луна'; phaseEmoji = '🌖';
    } else if (phaseAngle >= 247.5 && phaseAngle < 292.5) {
      phaseName = 'Последняя Четверть'; phaseEmoji = '🌗';
    } else if (phaseAngle >= 292.5 && phaseAngle < 337.5) {
      phaseName = 'Старая Луна'; phaseEmoji = '🌘';
    }

    const signIdx = Math.floor(normMoon / 30);
    const moonSign = ZODIAC_SIGNS[signIdx] || ZODIAC_SIGNS[0];

    return {
      phaseName,
      phaseEmoji,
      illum,
      lDay,
      signName: moonSign.name,
      signSymbol: moonSign.symbol
    };
  }

  function drawBackground(p) {
    let grad = ctx.createLinearGradient(0, 0, 0, 1920);
    grad.addColorStop(0, p.bgTop);
    grad.addColorStop(1, p.bgBottom);
    ctx.fillStyle = grad;
    ctx.fillRect(0, 0, 1080, 1920);

    let radGrad = ctx.createRadialGradient(540, 960, 50, 540, 960, 680);
    radGrad.addColorStop(0, p.subtle);
    radGrad.addColorStop(1, 'transparent');
    ctx.fillStyle = radGrad;
    ctx.fillRect(0, 0, 1080, 1920);

    ctx.save();
    ctx.strokeStyle = p.subtle;
    ctx.lineWidth = 1.5;

    ctx.beginPath();
    ctx.arc(540, 960, 420, 0, Math.PI * 2);
    ctx.stroke();

    ctx.beginPath();
    ctx.arc(540, 960, 320, 0, Math.PI * 2);
    ctx.setLineDash([8, 12]);
    ctx.stroke();
    ctx.restore();

    ctx.fillStyle = '#ffffff';
    let seed = 42;
    function pseudoRand() {
      seed = (seed * 9301 + 49297) % 233280;
      return seed / 233280;
    }
    for (let i = 0; i < 90; i++) {
      let x = pseudoRand() * 1080;
      let y = pseudoRand() * 1920;
      let r = pseudoRand() * 1.8 + 0.5;
      ctx.globalAlpha = pseudoRand() * 0.7 + 0.3;
      ctx.beginPath();
      ctx.arc(x, y, r, 0, Math.PI * 2);
      ctx.fill();
    }
    ctx.globalAlpha = 1.0;

    ctx.strokeStyle = p.primary;
    ctx.lineWidth = 2;
    ctx.strokeRect(54, 70, 972, 1780);

    ctx.strokeStyle = p.subtle;
    ctx.lineWidth = 1;
    ctx.strokeRect(66, 82, 948, 1756);
  }

  function renderStory() {
    let p = PALETTES[currentTheme];
    let name = document.getElementById('ast-inp-name').value || 'Астральный Странник';
    let quote = document.getElementById('ast-inp-quote').value || '';

    ctx.clearRect(0, 0, 1080, 1920);
    drawBackground(p);

    ctx.textAlign = 'center';
    ctx.fillStyle = p.accent;
    ctx.font = '600 24px "JetBrains Mono", monospace';
    ctx.fillText('ASTRAINA OBSERVATORY', 540, 170);

    ctx.fillStyle = 'rgba(255, 255, 255, 0.4)';
    ctx.font = '400 18px "Inter", sans-serif';
    ctx.fillText('SACRED CELESTIAL ATLAS', 540, 205);

    ctx.strokeStyle = p.subtle;
    ctx.lineWidth = 1.5;
    ctx.beginPath();
    ctx.moveTo(420, 240);
    ctx.lineTo(660, 240);
    ctx.stroke();

    ctx.fillStyle = '#ffffff';
    ctx.font = '600 44px "Cinzel", "Playfair Display", serif';
    ctx.fillText(name.toUpperCase(), 540, 320);

    if (currentFormat === 'triad') {
      let sun = document.getElementById('ast-sel-sun').value;
      let moon = document.getElementById('ast-sel-moon').value;
      let asc = document.getElementById('ast-sel-asc').value;

      ctx.fillStyle = p.primary;
      ctx.font = '500 22px "JetBrains Mono", monospace';
      ctx.fillText('КОСМИЧЕСКАЯ ТРИАДА ДУШИ', 540, 480);

      let cards = [
        { label: 'СОЛНЦЕ ☉ · ЯДРО ВОЛИ', val: sun, y: 550 },
        { label: 'ЛУНА ☽ · ГЛУБИННАЯ ПСИХИКА', val: moon, y: 790 },
        { label: 'АСЦЕНДЕНТ ↑ · СОЦИАЛЬНЫЙ СТИЛЬ', val: asc, y: 1030 }
      ];

      cards.forEach(c => {
        ctx.fillStyle = p.cardBg;
        ctx.strokeStyle = p.subtle;
        ctx.lineWidth = 1.5;
        roundRect(ctx, 160, c.y, 760, 190, 20, true, true);

        ctx.fillStyle = p.accent;
        ctx.font = '600 20px "JetBrains Mono", monospace';
        ctx.fillText(c.label, 540, c.y + 60);

        ctx.fillStyle = '#ffffff';
        ctx.font = '700 52px "Cinzel", serif';
        ctx.fillText(c.val, 540, c.y + 135);
      });

    } else if (currentFormat === 'synastry') {
      let partner = document.getElementById('ast-inp-partner').value || 'Другой Партнер';
      let harmony = document.getElementById('ast-inp-harmony').value || 94;

      ctx.fillStyle = p.primary;
      ctx.font = '500 22px "JetBrains Mono", monospace';
      ctx.fillText('СИНАСТРИЧЕСКИЙ РЕЗОНАНС ДУШ', 540, 520);

      ctx.fillStyle = p.cardBg;
      ctx.strokeStyle = p.subtle;
      roundRect(ctx, 160, 600, 760, 200, 24, true, true);

      ctx.fillStyle = '#ffffff';
      ctx.font = '600 36px "Cinzel", serif';
      ctx.fillText(name, 540, 665);

      ctx.fillStyle = p.accent;
      ctx.font = '700 32px "Cinzel", serif';
      ctx.fillText('✦ ⚯ ✦', 540, 715);

      ctx.fillStyle = '#ffffff';
      ctx.font = '600 36px "Cinzel", serif';
      ctx.fillText(partner, 540, 765);

      ctx.fillStyle = p.primary;
      ctx.font = '700 140px "Cinzel", serif';
      ctx.fillText(`${harmony}%`, 540, 1020);

      ctx.fillStyle = 'rgba(255, 255, 255, 0.7)';
      ctx.font = '500 22px "JetBrains Mono", monospace';
      ctx.fillText('САКРАЛЬНОЕ СОЗВУЧИЕ ПАРЫ', 540, 1080);

    } else if (currentFormat === 'lunar') {
      const realMoon = getAstronomicMoon();

      ctx.fillStyle = p.primary;
      ctx.font = '500 22px "JetBrains Mono", monospace';
      ctx.fillText(`ЛУННЫЙ ОРАКУЛ · ${realMoon.lDay}-Е СУТКИ`, 540, 540);

      ctx.fillStyle = p.accent;
      ctx.font = '700 130px "Cinzel", serif';
      ctx.fillText(realMoon.phaseEmoji, 540, 720);

      ctx.fillStyle = '#ffffff';
      ctx.font = '600 44px "Cinzel", serif';
      ctx.fillText(`${realMoon.phaseName.toUpperCase()} В ${realMoon.signName.toUpperCase()} ${realMoon.signSymbol}`, 540, 830);

      ctx.fillStyle = p.cardBg;
      ctx.strokeStyle = p.subtle;
      roundRect(ctx, 160, 910, 760, 240, 20, true, true);

      ctx.fillStyle = p.accent;
      ctx.font = '600 22px "JetBrains Mono", monospace';
      ctx.fillText(`ОСВЕЩЁННОСТЬ: ${realMoon.illum}%`, 540, 975);

      ctx.fillStyle = 'rgba(255, 255, 255, 0.85)';
      ctx.font = '400 26px "Inter", sans-serif';
      ctx.fillText('Время концентрации внутренней силы,', 540, 1035);
      ctx.fillText('открытия интуиции и кристаллизации пути.', 540, 1075);

    } else if (currentFormat === 'manifesto') {
      ctx.fillStyle = p.primary;
      ctx.font = '500 22px "JetBrains Mono", monospace';
      ctx.fillText('ЭФИРНЫЙ МАНИФЕСТ ДНЯ', 540, 560);

      ctx.fillStyle = p.accent;
      ctx.font = '700 90px "Cinzel", serif';
      ctx.fillText('« ✦ »', 540, 700);

      ctx.fillStyle = p.cardBg;
      ctx.strokeStyle = p.subtle;
      roundRect(ctx, 140, 780, 800, 360, 24, true, true);

      ctx.fillStyle = '#ffffff';
      ctx.font = 'italic 500 32px "Playfair Display", serif';
      wrapText(ctx, `«${quote}»`, 540, 890, 700, 48);
    }

    if (currentFormat !== 'manifesto' && quote) {
      ctx.fillStyle = 'rgba(255, 255, 255, 0.75)';
      ctx.font = 'italic 400 24px "Playfair Display", serif';
      wrapText(ctx, `«${quote}»`, 540, 1440, 760, 38);
    }

    ctx.fillStyle = p.primary;
    ctx.font = '600 20px "JetBrains Mono", monospace';
    ctx.fillText('ASTRAINA.COM · ПОРТАЛ ОБСЕРВАТОРИИ', 540, 1720);

    ctx.fillStyle = 'rgba(255, 255, 255, 0.35)';
    ctx.font = '400 16px "Inter", sans-serif';
    ctx.fillText('NASA JPL Planetary Mechanics · Zero Cloud Privacy', 540, 1755);
  }

  function roundRect(ctx, x, y, width, height, radius, fill, stroke) {
    ctx.beginPath();
    ctx.moveTo(x + radius, y);
    ctx.lineTo(x + width - radius, y);
    ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
    ctx.lineTo(x + width, y + height - radius);
    ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
    ctx.lineTo(x + radius, y + height);
    ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
    ctx.lineTo(x, y + radius);
    ctx.quadraticCurveTo(x, y, x + radius, y);
    ctx.closePath();
    if (fill) ctx.fill();
    if (stroke) ctx.stroke();
  }

  function wrapText(ctx, text, x, y, maxWidth, lineHeight) {
    let words = text.split(' ');
    let line = '';
    let curY = y;
    for (let n = 0; n < words.length; n++) {
      let testLine = line + words[n] + ' ';
      let metrics = ctx.measureText(testLine);
      let testWidth = metrics.width;
      if (testWidth > maxWidth && n > 0) {
        ctx.fillText(line.trim(), x, curY);
        line = words[n] + ' ';
        curY += lineHeight;
      } else {
        line = testLine;
      }
    }
    ctx.fillText(line.trim(), x, curY);
  }

  function showToast(msg) {
    toastNotice.textContent = msg || '✓ Выполнено успешно!';
    toastNotice.classList.add('active');
    setTimeout(() => toastNotice.classList.remove('active'), 2500);
  }

  function downloadPNG() {
    let link = document.createElement('a');
    link.download = `astraina-story-${currentFormat}-${Date.now()}.png`;
    link.href = canvas.toDataURL('image/png', 1.0);
    link.click();
  }

  function openShareModal() {
    let currentUrl = encodeURIComponent(window.location.href);
    let shareText = encodeURIComponent('Мой сакральный космический разворот в Обсерватории Astraina:');

    document.getElementById('ast-share-tg').href = `https://t.me/share/url?url=${currentUrl}&text=${shareText}`;
    document.getElementById('ast-share-wa').href = `https://api.whatsapp.com/send?text=${shareText}%20${currentUrl}`;
    document.getElementById('ast-share-vk').href = `https://vk.com/share.php?url=${currentUrl}&title=${shareText}`;

    shareModal.classList.add('active');
  }

  function closeShareModal() {
    shareModal.classList.remove('active');
  }

  async function copyImageToClipboard() {
    if (canvas.toBlob && navigator.clipboard && window.ClipboardItem) {
      try {
        canvas.toBlob(async function(blob) {
          try {
            await navigator.clipboard.write([
              new ClipboardItem({ 'image/png': blob })
            ]);
            showToast('✓ Story скопирована! Вставьте её (Ctrl+V) в любой чат');
          } catch (e) {
            downloadPNG();
            showToast('✓ Story сохранена на устройство!');
          }
        });
      } catch (err) {
        downloadPNG();
      }
    } else {
      downloadPNG();
      showToast('✓ Story сохранена на устройство!');
    }
  }

  document.getElementById('ast-btn-share').addEventListener('click', async function() {
    if (navigator.share && navigator.canShare && canvas.toBlob) {
      canvas.toBlob(async function(blob) {
        if (!blob) {
          openShareModal();
          return;
        }
        let file = new File([blob], 'astraina-story.png', { type: 'image/png' });
        if (navigator.canShare({ files: [file] })) {
          try {
            await navigator.share({
              title: 'Astraina Sacred Story',
              text: 'Мой сакральный космический разворот в Обсерватории Astraina',
              files: [file]
            });
            return;
          } catch (err) {
            if (err.name !== 'AbortError') openShareModal();
            return;
          }
        } else {
          openShareModal();
        }
      });
    } else {
      openShareModal();
    }
  });

  document.getElementById('ast-share-close-btn').addEventListener('click', closeShareModal);
  shareModal.addEventListener('click', function(e) {
    if (e.target === shareModal) closeShareModal();
  });

  document.getElementById('ast-share-copy-img').addEventListener('click', copyImageToClipboard);

  document.getElementById('ast-share-copy-link').addEventListener('click', function() {
    if (navigator.clipboard) {
      navigator.clipboard.writeText(window.location.href);
      showToast('✓ Ссылка скопирована в буфер обмена!');
    }
  });

  document.getElementById('ast-share-download-modal').addEventListener('click', function() {
    downloadPNG();
    showToast('✓ Загрузка Story начата!');
  });

  document.getElementById('ast-btn-download').addEventListener('click', downloadPNG);

  document.getElementById('ast-format-selector').addEventListener('click', function(e) {
    let card = e.target.closest('.ast-format-card');
    if (!card) return;
    document.querySelectorAll('.ast-format-card').forEach(c => c.classList.remove('active'));
    card.classList.add('active');
    currentFormat = card.dataset.format;

    document.getElementById('ast-fields-triad').style.display = (currentFormat === 'triad') ? 'flex' : 'none';
    document.getElementById('ast-fields-synastry').style.display = (currentFormat === 'synastry') ? 'flex' : 'none';

    renderStory();
  });

  document.getElementById('ast-theme-selector').addEventListener('click', function(e) {
    let pill = e.target.closest('.ast-theme-pill');
    if (!pill) return;
    document.querySelectorAll('.ast-theme-pill').forEach(p => p.classList.remove('active'));
    pill.classList.add('active');
    currentTheme = pill.dataset.theme;
    renderStory();
  });

  ['ast-inp-name', 'ast-sel-sun', 'ast-sel-moon', 'ast-sel-asc', 'ast-inp-partner', 'ast-inp-quote'].forEach(id => {
    let el = document.getElementById(id);
    if (el) {
      el.addEventListener('input', renderStory);
      el.addEventListener('change', renderStory);
    }
  });

  document.getElementById('ast-inp-harmony').addEventListener('input', function(e) {
    document.getElementById('ast-val-harmony').textContent = `${e.target.value}%`;
    renderStory();
  });

  document.addEventListener('DOMContentLoaded', renderStory);
  renderStory();

})();
</script>

<?php
get_footer();