<?php
/**
 * Template Name: Astro Feed - Orbit Transit Timeline
 * Description: Personalized transit resonance feed & close circle monitor (Zero Cloud Store).
 * Version: 10.5.2
 * Author: ASTRAINA Core Architecture Team
 */

get_header();
?>

<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 100vh; color: #F3F4F6;">

<style>
/* ==========================================================================
   ASTRAINA LUXURY DESIGN SYSTEM - ASTRO FEED
   ========================================================================== */
:root {
  --ast-bg-obsidian: #020408;
  --ast-card-bg: rgba(11, 15, 23, 0.78);
  --ast-card-hover: rgba(18, 24, 38, 0.90);
  --ast-border-gold: rgba(245, 158, 11, 0.28);
  --ast-border-gold-bright: rgba(245, 158, 11, 0.65);
  --ast-gold: #F59E0B;
  --ast-gold-light: #FBBF24;
  --ast-gold-gradient: linear-gradient(135deg, #F59E0B 0%, #D97706 50%, #92400E 100%);
  --ast-cyan: #38BDF8;
  --ast-emerald: #10B981;
  --ast-rose: #F43F5E;
  --ast-purple: #A855F7;
  --ast-font-cinzel: 'Cinzel', serif;
  --ast-font-sans: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

.ast-feed-container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 40px 20px 100px;
  font-family: var(--ast-font-sans);
}

/* Эфирный Заголовок */
.ast-hero {
  text-align: center;
  margin-bottom: 36px;
  position: relative;
}
.ast-hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 16px;
  background: rgba(245, 158, 11, 0.08);
  border: 1px solid var(--ast-border-gold);
  border-radius: 9999px;
  font-size: 0.8rem;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--ast-gold-light);
  margin-bottom: 16px;
  backdrop-filter: blur(8px);
}
.ast-hero-title {
  font-family: var(--ast-font-cinzel);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  font-weight: 700;
  line-height: 1.15;
  background: linear-gradient(180deg, #FFFFFF 0%, #F59E0B 75%, #B45309 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin: 0 0 14px;
  letter-spacing: 0.03em;
}
.ast-hero-subtitle {
  max-width: 740px;
  margin: 0 auto;
  font-size: 1.02rem;
  line-height: 1.6;
  color: #9CA3AF;
  font-weight: 300;
}

/* Панель Управления и Zero Cloud Индикатор */
.ast-control-bar {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  background: var(--ast-card-bg);
  border: 1px solid var(--ast-border-gold);
  border-radius: 16px;
  padding: 18px 24px;
  margin-bottom: 32px;
  backdrop-filter: blur(16px);
  box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.7);
}
.ast-bar-actions {
  display: flex;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
}
.ast-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 20px;
  font-size: 0.88rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  border-radius: 10px;
  cursor: pointer;
  transition: all 0.25s ease;
  border: none;
  outline: none;
  text-decoration: none;
}
.ast-btn-gold {
  background: var(--ast-gold-gradient);
  color: #020408;
  box-shadow: 0 4px 18px rgba(245, 158, 11, 0.35);
}
.ast-btn-gold:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 26px rgba(245, 158, 11, 0.55);
  color: #000;
}
.ast-btn-outline {
  background: rgba(255, 255, 255, 0.04);
  color: #E5E7EB;
  border: 1px solid rgba(255, 255, 255, 0.12);
}
.ast-btn-outline:hover {
  border-color: var(--ast-gold);
  color: var(--ast-gold-light);
  background: rgba(245, 158, 11, 0.06);
}
.ast-privacy-badge {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.8rem;
  color: #9CA3AF;
}
.ast-privacy-badge svg {
  color: var(--ast-emerald);
}

/* Дата-Навигатор */
.ast-date-strip {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  overflow-x: auto;
  padding: 8px 0 24px;
  margin-bottom: 24px;
  scrollbar-width: thin;
}
.ast-date-pill {
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-width: 90px;
  padding: 10px 14px;
  background: rgba(11, 15, 23, 0.6);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.25s ease;
  color: #9CA3AF;
}
.ast-date-pill:hover {
  border-color: rgba(245, 158, 11, 0.4);
  background: rgba(245, 158, 11, 0.05);
  color: #FFF;
}
.ast-date-pill.active {
  background: rgba(245, 158, 11, 0.14);
  border-color: var(--ast-gold);
  color: var(--ast-gold-light);
  box-shadow: 0 0 16px rgba(245, 158, 11, 0.2);
}
.ast-date-pill .ast-pill-dow {
  font-size: 0.72rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
}
.ast-date-pill .ast-pill-day {
  font-size: 1.25rem;
  font-weight: 700;
  font-family: var(--ast-font-cinzel);
  margin-top: 2px;
}

/* Сетка Портала: Круг (Слева) и Живая Лента (Справа) */
.ast-feed-grid {
  display: grid;
  grid-template-columns: 340px 1fr;
  gap: 28px;
  align-items: start;
}
@media (max-width: 1024px) {
  .ast-feed-grid {
    grid-template-columns: 1fr;
  }
}

/* Сайдбар Круга */
.ast-circle-panel {
  background: var(--ast-card-bg);
  border: 1px solid var(--ast-border-gold);
  border-radius: 18px;
  padding: 24px;
  backdrop-filter: blur(16px);
  position: sticky;
  top: 30px;
}
.ast-panel-title {
  font-family: var(--ast-font-cinzel);
  font-size: 1.25rem;
  font-weight: 600;
  color: #FFF;
  margin: 0 0 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.ast-circle-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-height: 520px;
  overflow-y: auto;
  padding-right: 4px;
}
.ast-person-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 14px;
  background: rgba(255, 255, 255, 0.02);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.2s ease;
}
.ast-person-item:hover {
  border-color: var(--ast-border-gold);
  background: rgba(245, 158, 11, 0.05);
}
.ast-person-item.selected {
  border-color: var(--ast-gold);
  background: rgba(245, 158, 11, 0.12);
}
.ast-person-info {
  display: flex;
  align-items: center;
  gap: 12px;
}
.ast-person-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.05rem;
  font-weight: 700;
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(217, 119, 6, 0.4));
  border: 1px solid var(--ast-border-gold);
  color: var(--ast-gold-light);
  flex-shrink: 0;
}
.ast-person-name {
  font-weight: 600;
  font-size: 0.95rem;
  color: #FFF;
}
.ast-person-tag {
  font-size: 0.72rem;
  color: #9CA3AF;
  text-transform: uppercase;
  letter-spacing: 0.06em;
}
.ast-person-del {
  background: transparent;
  border: none;
  color: #6B7280;
  cursor: pointer;
  padding: 4px;
  border-radius: 6px;
  transition: color 0.2s;
}
.ast-person-del:hover {
  color: var(--ast-rose);
}

/* Радар дня */
.ast-daily-radar {
  background: linear-gradient(135deg, rgba(17, 24, 39, 0.9) 0%, rgba(245, 158, 11, 0.05) 100%);
  border: 1px solid var(--ast-border-gold);
  border-radius: 18px;
  padding: 24px 28px;
  margin-bottom: 24px;
  position: relative;
  overflow: hidden;
}
.ast-radar-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  margin-bottom: 14px;
  flex-wrap: wrap;
}
.ast-radar-heading {
  font-family: var(--ast-font-cinzel);
  font-size: 1.35rem;
  font-weight: 700;
  color: #FFF;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 10px;
}
.ast-radar-status {
  padding: 6px 14px;
  border-radius: 9999px;
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.08em;
  text-transform: uppercase;
}
.ast-radar-status.flow {
  background: rgba(16, 185, 129, 0.15);
  color: var(--ast-emerald);
  border: 1px solid rgba(16, 185, 129, 0.35);
}
.ast-radar-status.friction {
  background: rgba(244, 63, 94, 0.15);
  color: var(--ast-rose);
  border: 1px solid rgba(244, 63, 94, 0.35);
}
.ast-radar-status.transformation {
  background: rgba(168, 85, 247, 0.15);
  color: var(--ast-purple);
  border: 1px solid rgba(168, 85, 247, 0.35);
}
.ast-radar-body {
  font-size: 0.96rem;
  line-height: 1.65;
  color: #D1D5DB;
  font-weight: 300;
}

/* Карточки Транзитной Ленты */
.ast-feed-stream {
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.ast-event-card {
  background: var(--ast-card-bg);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 18px;
  padding: 24px;
  position: relative;
  transition: all 0.25s ease;
  backdrop-filter: blur(12px);
}
.ast-event-card:hover {
  border-color: var(--ast-border-gold);
  transform: translateY(-2px);
  box-shadow: 0 16px 36px rgba(0, 0, 0, 0.5);
}
.ast-event-card.alert-friction {
  border-left: 4px solid var(--ast-rose);
}
.ast-event-card.alert-flow {
  border-left: 4px solid var(--ast-emerald);
}
.ast-event-card.alert-shift {
  border-left: 4px solid var(--ast-gold);
}
.ast-event-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 16px;
  gap: 12px;
  flex-wrap: wrap;
}
.ast-event-native {
  display: flex;
  align-items: center;
  gap: 12px;
}
.ast-event-badge {
  font-size: 0.72rem;
  padding: 4px 10px;
  border-radius: 6px;
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 0.05em;
  background: rgba(255, 255, 255, 0.05);
  color: #9CA3AF;
  border: 1px solid rgba(255, 255, 255, 0.08);
}
.ast-aspect-formula {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 8px 16px;
  background: rgba(0, 0, 0, 0.45);
  border: 1px solid rgba(245, 158, 11, 0.2);
  border-radius: 12px;
  font-family: var(--ast-font-cinzel);
  font-size: 1.05rem;
  color: #FFF;
}
.ast-aspect-formula .ast-transit-body {
  color: var(--ast-gold-light);
  font-weight: 700;
}
.ast-aspect-formula .ast-aspect-symbol {
  color: var(--ast-cyan);
  font-size: 1.2rem;
}
.ast-aspect-formula .ast-natal-body {
  color: #E5E7EB;
  font-weight: 700;
}
.ast-event-desc {
  font-size: 0.94rem;
  line-height: 1.6;
  color: #D1D5DB;
  margin: 14px 0 16px;
}
.ast-advice-box {
  background: rgba(245, 158, 11, 0.05);
  border: 1px dashed rgba(245, 158, 11, 0.3);
  border-radius: 12px;
  padding: 14px 16px;
  font-size: 0.88rem;
  line-height: 1.5;
  color: #FDE68A;
  display: flex;
  align-items: flex-start;
  gap: 10px;
}

/* Пустое состояние */
.ast-empty-state {
  text-align: center;
  padding: 60px 20px;
  background: var(--ast-card-bg);
  border: 1px dashed rgba(245, 158, 11, 0.3);
  border-radius: 18px;
}
.ast-empty-title {
  font-family: var(--ast-font-cinzel);
  font-size: 1.4rem;
  color: #FFF;
  margin: 14px 0 8px;
}
.ast-empty-desc {
  color: #9CA3AF;
  max-width: 480px;
  margin: 0 auto 20px;
  font-size: 0.92rem;
}

/* Модальное окно */
.ast-modal-overlay {
  position: fixed;
  inset: 0;
  background: rgba(2, 4, 8, 0.88);
  backdrop-filter: blur(12px);
  z-index: 99999;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s ease;
}
.ast-modal-overlay.active {
  opacity: 1;
  pointer-events: auto;
}
.ast-modal-card {
  background: #0B0F17;
  border: 1px solid var(--ast-gold);
  border-radius: 20px;
  width: 100%;
  max-width: 520px;
  padding: 32px;
  box-shadow: 0 25px 60px rgba(0, 0, 0, 0.9), 0 0 35px rgba(245, 158, 11, 0.15);
  transform: translateY(20px);
  transition: transform 0.3s ease;
}
.ast-modal-overlay.active .ast-modal-card {
  transform: translateY(0);
}
.ast-modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 24px;
}
.ast-modal-title {
  font-family: var(--ast-font-cinzel);
  font-size: 1.4rem;
  color: #FFF;
  margin: 0;
}
.ast-modal-close {
  background: transparent;
  border: none;
  color: #9CA3AF;
  font-size: 1.5rem;
  cursor: pointer;
  line-height: 1;
}
.ast-form-group {
  margin-bottom: 18px;
}
.ast-form-label {
  display: block;
  font-size: 0.82rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--ast-gold-light);
  margin-bottom: 8px;
}
.ast-form-input, .ast-form-select {
  width: 100%;
  background: rgba(2, 4, 8, 0.8);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 10px;
  padding: 12px 14px;
  color: #FFF;
  font-size: 0.95rem;
  outline: none;
  box-sizing: border-box;
  transition: border-color 0.2s;
}
.ast-form-input:focus, .ast-form-select:focus {
  border-color: var(--ast-gold);
}
.ast-form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 14px;
}

/* ==========================================================================
   A4 PRINT STYLES
   ========================================================================== */
@media print {
  body, .ast-page-wrapper {
    background: #FFFFFF !important;
    color: #0A0A0C !important;
  }
  #ast-canvas-3d, .ast-control-bar, .ast-date-strip, .ast-modal-overlay, .ast-btn {
    display: none !important;
  }
  .ast-feed-grid {
    grid-template-columns: 1fr !important;
  }
  .ast-circle-panel, .ast-daily-radar, .ast-event-card {
    background: #FFF !important;
    border: 1px solid #CCC !important;
    box-shadow: none !important;
    color: #0A0A0C !important;
    page-break-inside: avoid;
  }
  .ast-hero-title {
    color: #000 !important;
    -webkit-text-fill-color: initial !important;
  }
  .ast-aspect-formula {
    background: #F3F4F6 !important;
    border: 1px solid #CCC !important;
    color: #000 !important;
  }
}
</style>

<div class="ast-feed-container">
  
  <!-- Заголовок Портала -->
  <header class="ast-hero">
    <div class="ast-hero-badge">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2v20M2 12h20"/></svg>
      NASA JPL Ephemeris · Resonance Radar
    </div>
    <h1 class="ast-hero-title">Эфирная Лента Транзитов</h1>
    <p class="ast-hero-subtitle">
      Мониторинг планетарных влияний и психологических резонансов для круга ваших близких в реальном времени. Локальный суверенитет Zero Cloud Store: натальные данные не покидают память вашего устройства.
    </p>
  </header>

  <!-- Панель инструментов -->
  <div class="ast-control-bar">
    <div class="ast-privacy-badge">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
      <span>Zero Cloud Store · Данные изолированы в LocalStorage браузера</span>
    </div>

    <div class="ast-bar-actions">
      <button class="ast-btn ast-btn-outline" onclick="window.print()">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
        Экспорт A4
      </button>
      <button class="ast-btn ast-btn-outline" id="ast-export-json-btn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
        Бэкап JSON
      </button>
      <button class="ast-btn ast-btn-gold" id="ast-open-add-modal">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Добавить Душу в Круг
      </button>
    </div>
  </div>

  <!-- Селектор дат -->
  <div class="ast-date-strip" id="ast-date-strip"></div>

  <!-- Основная рабочая сетка -->
  <div class="ast-feed-grid">
    
    <!-- Сайдбар: Мой круг -->
    <aside class="ast-circle-panel">
      <div class="ast-panel-title">
        <span>Мой Круг (<span id="ast-circle-count">0</span>)</span>
        <span style="font-size:0.75rem; color:var(--ast-gold); cursor:pointer;" id="ast-select-all-btn">Все сразу</span>
      </div>
      <div class="ast-circle-list" id="ast-circle-list"></div>
    </aside>

    <!-- Основная лента событий и радар -->
    <main class="ast-feed-content">
      
      <div class="ast-daily-radar" id="ast-daily-radar">
        <div class="ast-radar-top">
          <h2 class="ast-radar-heading">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--ast-gold)" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
            <span id="ast-radar-title">Радар Эфира: Расчет состояния...</span>
          </h2>
          <div class="ast-radar-status flow" id="ast-radar-badge">Золотой Поток</div>
        </div>
        <div class="ast-radar-body" id="ast-radar-desc">
          Анализ совокупного космического резонанса для вашего круга на выбранную дату...
        </div>
      </div>

      <div class="ast-feed-stream" id="ast-feed-stream"></div>

    </main>

  </div>

</div>

<!-- Модальное окно добавления Души в Круг -->
<div class="ast-modal-overlay" id="ast-modal-overlay">
  <div class="ast-modal-card">
    <div class="ast-modal-header">
      <h3 class="ast-modal-title">Принять в Эфирный Круг</h3>
      <button class="ast-modal-close" id="ast-close-modal">&times;</button>
    </div>
    <form id="ast-add-person-form">
      <div class="ast-form-group">
        <label class="ast-form-label">Имя или Сакральное Обозначение</label>
        <input type="text" class="ast-form-input" id="ast-input-name" placeholder="Например: Любимый Человек, Соратник, Я" required>
      </div>

      <div class="ast-form-row">
        <div class="ast-form-group">
          <label class="ast-form-label">Дата Рождения</label>
          <input type="date" class="ast-form-input" id="ast-input-date" required>
        </div>
        <div class="ast-form-group">
          <label class="ast-form-label">Время (если известно)</label>
          <input type="time" class="ast-form-input" id="ast-input-time" value="12:00">
        </div>
      </div>

      <div class="ast-form-group">
        <label class="ast-form-label">Роль / Тип Связи</label>
        <select class="ast-form-select" id="ast-input-tag">
          <option value="Партнер / Любовь">Партнер / Любовь</option>
          <option value="Семья / Род">Семья / Род</option>
          <option value="Соратник / Бизнес">Соратник / Бизнес</option>
          <option value="Друг / Единомышленник">Друг / Единомышленник</option>
          <option value="Наставник / Проводник">Наставник / Проводник</option>
          <option value="Мой Натал (Я)">Мой Натал (Я)</option>
        </select>
      </div>

      <div style="display:flex; justify-content:flex-end; gap:12px; margin-top:24px;">
        <button type="button" class="ast-btn ast-btn-outline" id="ast-cancel-modal">Отмена</button>
        <button type="submit" class="ast-btn ast-btn-gold">Активировать Резонанс</button>
      </div>
    </form>
  </div>
</div>

<script>
/**
 * ASTRAINA ASTRO-FEED CORE ENGINE (v10.5.2)
 * Zero Cloud Store · Local-First Orbitals & Aspect Resonance Detector
 */
(function() {
  'use strict';

  const STORAGE_KEY = 'astraina_circle_feed_v1';

  const DEFAULT_CIRCLE = [
    {
      id: 'demo_1',
      name: 'Мой Натал (Я)',
      birthDate: '1995-04-12',
      birthTime: '08:30',
      tag: 'Мой Натал (Я)'
    },
    {
      id: 'demo_2',
      name: 'Партнер I',
      birthDate: '1996-09-24',
      birthTime: '18:45',
      tag: 'Партнер / Любовь'
    }
  ];

  const BODIES = {
    Sun: { name: 'Солнце', symbol: '☉', cycle: 365.25 },
    Moon: { name: 'Луна', symbol: '☽', cycle: 27.32 },
    Mercury: { name: 'Меркурий', symbol: '☿', cycle: 87.97 },
    Venus: { name: 'Венера', symbol: '♀', cycle: 224.7 },
    Mars: { name: 'Марс', symbol: '♂', cycle: 686.98 },
    Jupiter: { name: 'Юпитер', symbol: '♃', cycle: 4332.59 },
    Saturn: { name: 'Сатурн', symbol: '♄', cycle: 10759.22 },
    Uranus: { name: 'Уран', symbol: '♅', cycle: 30685.4 },
    Neptune: { name: 'Нептун', symbol: '♆', cycle: 60189.0 },
    Pluto: { name: 'Плутон', symbol: '♇', cycle: 90560.0 }
  };

  const ASPECTS = [
    { type: 'conjunction', symbol: '☌', angle: 0, orb: 5, label: 'Соединение (Инициация)' },
    { type: 'opposition', symbol: '☍', angle: 180, orb: 4.5, label: 'Оппозиция (Полярность)' },
    { type: 'trine', symbol: '△', angle: 120, orb: 4.5, label: 'Трин (Золотой Поток)' },
    { type: 'square', symbol: '□', angle: 90, orb: 4, label: 'Квадратура (Турбулентность)' },
    { type: 'sextile', symbol: '⚹', angle: 60, orb: 3.5, label: 'Секстиль (Возможность)' }
  ];

  const ZODIAC = [
    { name: 'Овен', symbol: '♈' }, { name: 'Телец', symbol: '♉' },
    { name: 'Близнецы', symbol: '♊' }, { name: 'Рак', symbol: '♋' },
    { name: 'Лев', symbol: '♌' }, { name: 'Дева', symbol: '♍' },
    { name: 'Весы', symbol: '♎' }, { name: 'Скорпион', symbol: '♏' },
    { name: 'Стрелец', symbol: '♐' }, { name: 'Козерог', symbol: '♑' },
    { name: 'Водолей', symbol: '♒' }, { name: 'Рыбы', symbol: '♓' }
  ];

  let circle = [];
  let selectedPersonId = 'all';
  let selectedDate = new Date();

  function loadCircle() {
    try {
      const data = localStorage.getItem(STORAGE_KEY);
      if (data) {
        circle = JSON.parse(data);
      } else {
        circle = DEFAULT_CIRCLE;
        saveCircle();
      }
    } catch (e) {
      circle = DEFAULT_CIRCLE;
    }
  }

  function saveCircle() {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(circle));
    } catch (e) {
      console.warn('LocalStorage error', e);
    }
  }

  function getJulianDate(date) {
    return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
  }

  function getPlanetaryLongitudes(date) {
    const jd = getJulianDate(date);
    const d = jd - 2451543.5;

    const mod360 = (x) => {
      let r = x % 360;
      return r < 0 ? r + 360 : r;
    };

    return {
      Sun: mod360(280.460 + 0.9856474 * d),
      Moon: mod360(218.316 + 13.176396 * d),
      Mercury: mod360(252.250 + 4.092334 * d),
      Venus: mod360(181.980 + 1.602130 * d),
      Mars: mod360(355.433 + 0.524033 * d),
      Jupiter: mod360(34.351 + 0.083085 * d),
      Saturn: mod360(50.077 + 0.033444 * d),
      Uranus: mod360(314.055 + 0.011728 * d),
      Neptune: mod360(304.349 + 0.005981 * d),
      Pluto: mod360(238.929 + 0.003964 * d)
    };
  }

  function findTransits(natalDate, transitDate) {
    const natalPos = getPlanetaryLongitudes(natalDate);
    const transitPos = getPlanetaryLongitudes(transitDate);
    const detected = [];
    const activeTransitPlanets = ['Moon', 'Sun', 'Mars', 'Venus', 'Mercury', 'Jupiter', 'Saturn'];

    activeTransitPlanets.forEach(tKey => {
      const tDeg = transitPos[tKey];

      Object.keys(BODIES).forEach(nKey => {
        const nDeg = natalPos[nKey];
        let diff = Math.abs(tDeg - nDeg);
        if (diff > 180) diff = 360 - diff;

        ASPECTS.forEach(asp => {
          if (Math.abs(diff - asp.angle) <= asp.orb) {
            detected.push({
              transitBody: BODIES[tKey],
              natalBody: BODIES[nKey],
              aspect: asp,
              orbDiff: Math.abs(diff - asp.angle).toFixed(1),
              tDeg: tDeg,
              nDeg: nDeg
            });
          }
        });
      });
    });

    return detected;
  }

  function interpretTransit(item, personName) {
    const t = item.transitBody.name;
    const n = item.natalBody.name;
    const asp = item.aspect.type;

    let tone = 'flow';
    let title = '';
    let narrative = '';
    let advice = '';

    if (asp === 'trine' || asp === 'sextile') {
      tone = 'flow';
      title = `${t} в гармонии с натальным ${n}`;
      narrative = `Период естественной синергии и психоэмоционального раскрытия. Энергия ${t} мягко питает внутренний потенциал (${n}), устраняя барьеры во взаимопонимании.`;
      advice = `Идеальный момент для искреннего душевного диалога с ${personName}, совместного творчества, договоренностей и укрепления доверия.`;
    } else if (asp === 'square' || asp === 'opposition') {
      tone = 'friction';
      title = `${t} в напряженном контакте с ${n}`;
      narrative = `Зона повышенной чувствительности и внутренней компрессии. Возможна острая реакция на критику, ощущение нехватки личного пространства или эмоциональное переутомление.`;
      advice = `Проявите максимальную деликатность. Избегайте резких требований и споров. Дайте ${personName} возможность восстановить ресурс без давления.`;
    } else {
      tone = 'shift';
      title = `Соединение: ${t} активирует натальный ${n}`;
      narrative = `Мощная перезагрузка личного цикла. Новые инсайты, фокусировка воли и кристаллизация целей. Сильный прилив энергии.`;
      advice = `Поддержите начинания ${personName}. Отличное время для мозговых штурмов и совместного планирования будущего.`;
    }

    return { tone, title, narrative, advice };
  }

  function renderDateStrip() {
    const container = document.getElementById('ast-date-strip');
    container.innerHTML = '';
    const now = new Date();
    const dows = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'];
    const months = ['янв', 'фев', 'мар', 'апр', 'мая', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек'];

    for (let i = -2; i <= 4; i++) {
      const d = new Date(now.getFullYear(), now.getMonth(), now.getDate() + i);
      const isSelected = d.toDateString() === selectedDate.toDateString();

      const pill = document.createElement('div');
      pill.className = `ast-date-pill ${isSelected ? 'active' : ''}`;
      pill.innerHTML = `
        <span class="ast-pill-dow">${i === 0 ? 'Сегодня' : dows[d.getDay()]}</span>
        <span class="ast-pill-day">${d.getDate()}</span>
        <span style="font-size:0.7rem; opacity:0.8;">${months[d.getMonth()]}</span>
      `;
      pill.addEventListener('click', () => {
        selectedDate = d;
        renderDateStrip();
        renderFeed();
      });
      container.appendChild(pill);
    }
  }

  function renderCircleList() {
    const list = document.getElementById('ast-circle-list');
    document.getElementById('ast-circle-count').innerText = circle.length;
    list.innerHTML = '';

    circle.forEach(p => {
      const isSelected = selectedPersonId === p.id;
      const item = document.createElement('div');
      item.className = `ast-person-item ${isSelected ? 'selected' : ''}`;
      const initials = p.name.trim().charAt(0).toUpperCase();

      item.innerHTML = `
        <div class="ast-person-info">
          <div class="ast-person-avatar">${initials}</div>
          <div>
            <div class="ast-person-name">${p.name}</div>
            <div class="ast-person-tag">${p.tag}</div>
          </div>
        </div>
        <button class="ast-person-del" title="Удалить из Круга" data-id="${p.id}">&times;</button>
      `;

      item.querySelector('.ast-person-info').addEventListener('click', () => {
        selectedPersonId = p.id;
        renderCircleList();
        renderFeed();
      });

      item.querySelector('.ast-person-del').addEventListener('click', (e) => {
        e.stopPropagation();
        deletePerson(p.id);
      });

      list.appendChild(item);
    });
  }

  function renderFeed() {
    const stream = document.getElementById('ast-feed-stream');
    stream.innerHTML = '';

    const targetPeople = selectedPersonId === 'all' 
      ? circle 
      : circle.filter(p => p.id === selectedPersonId);

    if (circle.length === 0) {
      stream.innerHTML = `
        <div class="ast-empty-state">
          <div style="font-size: 2.5rem; color: var(--ast-gold);">✦</div>
          <h3 class="ast-empty-title">Эфирный Круг пуст</h3>
          <p class="ast-empty-desc">Добавьте близких людей, партнеров или свой собственный натал, чтобы активировать персональный радар резонансов.</p>
          <button class="ast-btn ast-btn-gold" onclick="document.getElementById('ast-open-add-modal').click()">Добавить Персону</button>
        </div>
      `;
      updateRadarSummary([], 0, 0);
      return;
    }

    let allTransitsCollected = [];
    let frictionCount = 0;
    let flowCount = 0;

    targetPeople.forEach(person => {
      const birthDT = new Date(`${person.birthDate}T${person.birthTime || '12:00'}:00`);
      const transits = findTransits(birthDT, selectedDate);

      transits.forEach(tr => {
        const decoded = interpretTransit(tr, person.name);
        if (decoded.tone === 'friction') frictionCount++;
        if (decoded.tone === 'flow') flowCount++;

        allTransitsCollected.push({
          person: person,
          transit: tr,
          decoded: decoded
        });
      });
    });

    allTransitsCollected.sort((a, b) => {
      const weight = { friction: 3, shift: 2, flow: 1 };
      return weight[b.decoded.tone] - weight[a.decoded.tone];
    });

    if (allTransitsCollected.length === 0) {
      stream.innerHTML = `
        <div class="ast-empty-state">
          <div style="font-size: 2rem; color: var(--ast-cyan);">☽</div>
          <h3 class="ast-empty-title">Гармоничный Небесный Штиль</h3>
          <p class="ast-empty-desc">На выбранную дату для указанных наталов мажорных резонансов с низким орбисом не зафиксировано. День внутреннего равновесия и стабильности.</p>
        </div>
      `;
    } else {
      allTransitsCollected.forEach(item => {
        const tr = item.transit;
        const dec = item.decoded;
        const p = item.person;

        const card = document.createElement('div');
        card.className = `ast-event-card alert-${dec.tone}`;
        
        card.innerHTML = `
          <div class="ast-event-header">
            <div class="ast-event-native">
              <span style="font-weight:700; color:#FFF;">${p.name}</span>
              <span class="ast-event-badge">${p.tag}</span>
            </div>
            <div class="ast-aspect-formula">
              <span class="ast-transit-body">${tr.transitBody.symbol} ${tr.transitBody.name}</span>
              <span class="ast-aspect-symbol">${tr.aspect.symbol}</span>
              <span class="ast-natal-body">Натал ${tr.natalBody.symbol} ${tr.natalBody.name}</span>
            </div>
          </div>

          <h4 style="font-size:1.1rem; color:#FFF; margin:0 0 8px; font-family:var(--ast-font-cinzel);">
            ${dec.title}
          </h4>

          <p class="ast-event-desc">${dec.narrative}</p>

          <div class="ast-advice-box">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
            <div>
              <strong>Протокол взаимодействия:</strong> ${dec.advice}
            </div>
          </div>
        `;

        stream.appendChild(card);
      });
    }

    updateRadarSummary(allTransitsCollected, flowCount, frictionCount);
  }

  function updateRadarSummary(events, flowCount, frictionCount) {
    const titleEl = document.getElementById('ast-radar-title');
    const badgeEl = document.getElementById('ast-radar-badge');
    const descEl = document.getElementById('ast-radar-desc');
    const dateStr = selectedDate.toLocaleDateString('ru-RU', { day: 'numeric', month: 'long', year: 'numeric' });

    if (events.length === 0) {
      titleEl.innerText = `Эфир на ${dateStr}: Нейтральный баланс`;
      badgeEl.className = 'ast-radar-status flow';
      badgeEl.innerText = 'Штиль';
      descEl.innerText = `Фоновые транзиты не создают острых углов. Оптимальное время для планомерного труда, медитации и глубокого отдыха без внешних стрессоров.`;
      return;
    }

    if (frictionCount > flowCount) {
      titleEl.innerText = `Эфир на ${dateStr}: Турбулентный фокус`;
      badgeEl.className = 'ast-radar-status friction';
      badgeEl.innerText = 'Тектонический Сдвиг';
      descEl.innerText = `В круге зафиксировано ${frictionCount} напряженных резонансов. День требует осознанности: снизьте градус ожиданий, избегайте резких дедлайнов и практикуйте бережное активное слушание.`;
    } else if (flowCount >= frictionCount && flowCount > 0) {
      titleEl.innerText = `Эфир на ${dateStr}: Созидательный резонанс`;
      badgeEl.className = 'ast-radar-status flow';
      badgeEl.innerText = 'Золотой Поток';
      descEl.innerText = `Преобладают ${flowCount} гармоничных тринов и секстилей. Психологический климат благоприятствует теплым встречам, вдохновению, финансовым договоренностям и глубокой душевной близости.`;
    } else {
      titleEl.innerText = `Эфир на ${dateStr}: Точка Перезагрузки`;
      badgeEl.className = 'ast-radar-status transformation';
      badgeEl.innerText = 'Трансформация';
      descEl.innerText = `Активны мощные соединения. В круге назревают качественные личностные трансформации и смены жизненных ориентиров.`;
    }
  }

  function deletePerson(id) {
    if (confirm('Удалить эту душу из вашего локального круга?')) {
      circle = circle.filter(p => p.id !== id);
      if (selectedPersonId === id) selectedPersonId = 'all';
      saveCircle();
      renderCircleList();
      renderFeed();
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    loadCircle();
    renderDateStrip();
    renderCircleList();
    renderFeed();

    document.getElementById('ast-select-all-btn').addEventListener('click', () => {
      selectedPersonId = 'all';
      renderCircleList();
      renderFeed();
    });

    const modal = document.getElementById('ast-modal-overlay');
    const openBtn = document.getElementById('ast-open-add-modal');
    const closeBtn = document.getElementById('ast-close-modal');
    const cancelBtn = document.getElementById('ast-cancel-modal');
    const addForm = document.getElementById('ast-add-person-form');

    const openModal = () => modal.classList.add('active');
    const closeModal = () => {
      modal.classList.remove('active');
      addForm.reset();
    };

    openBtn.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
      if (e.target === modal) closeModal();
    });

    addForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const name = document.getElementById('ast-input-name').value.trim();
      const bDate = document.getElementById('ast-input-date').value;
      const bTime = document.getElementById('ast-input-time').value || '12:00';
      const tag = document.getElementById('ast-input-tag').value;

      if (!name || !bDate) return;

      const newPerson = {
        id: 'user_' + Date.now(),
        name: name,
        birthDate: bDate,
        birthTime: bTime,
        tag: tag
      };

      circle.push(newPerson);
      saveCircle();
      closeModal();
      renderCircleList();
      renderFeed();
    });

    document.getElementById('ast-export-json-btn').addEventListener('click', () => {
      const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(circle, null, 2));
      const dlAnchor = document.createElement('a');
      dlAnchor.setAttribute("href", dataStr);
      dlAnchor.setAttribute("download", `astraina_circle_backup_${new Date().toISOString().slice(0,10)}.json`);
      document.body.appendChild(dlAnchor);
      dlAnchor.click();
      dlAnchor.remove();
    });
  });

})();
</script>

<?php get_footer(); ?>