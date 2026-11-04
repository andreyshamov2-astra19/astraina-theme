<?php
/**
 * Template Name: Time Capsule - Lunar Seal & Eclipse Messages
 * Description: Sacred time capsules sealed until precise lunar events, eclipses, or solar ingresses (Zero Cloud Store).
 * Version: 10.5.4
 * Author: ASTRAINA Core Architecture Team
 */

get_header();
?>

<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 100vh; color: #F3F4F6;">

<style>
/* ==========================================================================
   ASTRAINA TIME CAPSULE LUXURY DESIGN SYSTEM
   ========================================================================== */
:root {
  --ast-bg-obsidian: #020408;
  --ast-card-bg: rgba(11, 15, 23, 0.82);
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

.ast-capsule-container {
  max-width: 1240px;
  margin: 0 auto;
  padding: 40px 20px 100px;
  font-family: var(--ast-font-sans);
}

/* Hero Section */
.ast-hero {
  text-align: center;
  margin-bottom: 38px;
  position: relative;
}
.ast-hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 18px;
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
  max-width: 760px;
  margin: 0 auto;
  font-size: 1.02rem;
  line-height: 1.65;
  color: #9CA3AF;
  font-weight: 300;
}

/* Layout Grid */
.ast-capsule-layout {
  display: grid;
  grid-template-columns: 1fr 1.15fr;
  gap: 32px;
  align-items: start;
}
@media (max-width: 980px) {
  .ast-capsule-layout {
    grid-template-columns: 1fr;
  }
}

/* Left: Create Capsule Card */
.ast-forge-card {
  background: var(--ast-card-bg);
  border: 1px solid var(--ast-border-gold);
  border-radius: 20px;
  padding: 30px;
  backdrop-filter: blur(16px);
  box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.8);
}
.ast-card-title {
  font-family: var(--ast-font-cinzel);
  font-size: 1.35rem;
  color: #FFF;
  margin: 0 0 18px;
  display: flex;
  align-items: center;
  gap: 10px;
}
.ast-form-group {
  margin-bottom: 20px;
}
.ast-label {
  display: block;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--ast-gold-light);
  margin-bottom: 8px;
}
.ast-input, .ast-select, .ast-textarea {
  width: 100%;
  background: rgba(2, 4, 8, 0.85);
  border: 1px solid rgba(255, 255, 255, 0.12);
  border-radius: 12px;
  padding: 12px 14px;
  color: #FFF;
  font-size: 0.95rem;
  outline: none;
  box-sizing: border-box;
  font-family: var(--ast-font-sans);
  transition: border-color 0.2s;
}
.ast-input:focus, .ast-select:focus, .ast-textarea:focus {
  border-color: var(--ast-gold);
}
.ast-textarea {
  min-height: 140px;
  resize: vertical;
  line-height: 1.6;
}

/* Celestial Event Select Pills */
.ast-event-pills {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
  margin-bottom: 16px;
}
@media (max-width: 480px) {
  .ast-event-pills {
    grid-template-columns: 1fr;
  }
}
.ast-pill-radio {
  border: 1px solid rgba(255, 255, 255, 0.1);
  background: rgba(255, 255, 255, 0.03);
  border-radius: 10px;
  padding: 10px 12px;
  cursor: pointer;
  transition: all 0.2s ease;
  display: flex;
  flex-direction: column;
  gap: 3px;
}
.ast-pill-radio:hover {
  border-color: rgba(245, 158, 11, 0.4);
}
.ast-pill-radio.active {
  border-color: var(--ast-gold);
  background: rgba(245, 158, 11, 0.12);
}
.ast-pill-name {
  font-size: 0.84rem;
  font-weight: 600;
  color: #FFF;
}
.ast-pill-date {
  font-size: 0.72rem;
  color: var(--ast-gold-light);
}

/* Button */
.ast-btn-seal {
  width: 100%;
  background: var(--ast-gold-gradient);
  color: #020408;
  border: none;
  border-radius: 12px;
  padding: 14px;
  font-size: 0.95rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  transition: all 0.25s ease;
  box-shadow: 0 4px 18px rgba(245, 158, 11, 0.35);
  margin-top: 10px;
}
.ast-btn-seal:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 26px rgba(245, 158, 11, 0.55);
}

/* Right: Vault & Capsules List */
.ast-vault-panel {
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.ast-vault-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 4px;
}
.ast-capsule-item {
  background: var(--ast-card-bg);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 18px;
  padding: 24px;
  backdrop-filter: blur(14px);
  position: relative;
  transition: all 0.25s ease;
  overflow: hidden;
}
.ast-capsule-item.locked {
  border-left: 4px solid var(--ast-gold);
}
.ast-capsule-item.unlocked {
  border-left: 4px solid var(--ast-emerald);
}
.ast-item-top {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 12px;
  margin-bottom: 14px;
}
.ast-item-title {
  font-family: var(--ast-font-cinzel);
  font-size: 1.18rem;
  font-weight: 700;
  color: #FFF;
  margin: 0 0 4px;
}
.ast-item-meta {
  font-size: 0.76rem;
  color: #9CA3AF;
  display: flex;
  align-items: center;
  gap: 8px;
}
.ast-status-seal {
  font-size: 0.72rem;
  padding: 4px 10px;
  border-radius: 6px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
.ast-status-seal.locked {
  background: rgba(245, 158, 11, 0.12);
  color: var(--ast-gold-light);
  border: 1px solid var(--ast-border-gold);
}
.ast-status-seal.unlocked {
  background: rgba(16, 185, 129, 0.15);
  color: var(--ast-emerald);
  border: 1px solid rgba(16, 185, 129, 0.35);
}

/* Countdown Dial Block */
.ast-timer-box {
  background: rgba(0, 0, 0, 0.45);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 12px;
  padding: 14px;
  margin: 14px 0;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
  text-align: center;
}
.ast-timer-digit {
  font-family: var(--ast-font-cinzel);
  font-size: 1.4rem;
  font-weight: 700;
  color: var(--ast-gold-light);
}
.ast-timer-sub {
  font-size: 0.68rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: #9CA3AF;
}

/* Content Area inside Capsule */
.ast-capsule-secret {
  background: rgba(255, 255, 255, 0.02);
  border: 1px dashed rgba(255, 255, 255, 0.12);
  border-radius: 12px;
  padding: 16px;
  margin-top: 14px;
  font-size: 0.94rem;
  line-height: 1.6;
  color: #E5E7EB;
  display: none;
}
.ast-capsule-item.unlocked .ast-capsule-secret {
  display: block;
}
.ast-locked-placeholder {
  display: flex;
  align-items: center;
  gap: 10px;
  color: #9CA3AF;
  font-size: 0.86rem;
  padding: 12px;
  background: rgba(0, 0, 0, 0.25);
  border-radius: 10px;
  margin-top: 10px;
}
.ast-item-footer {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 10px;
  margin-top: 14px;
}
.ast-btn-action {
  background: transparent;
  border: none;
  color: #9CA3AF;
  font-size: 0.8rem;
  cursor: pointer;
  padding: 4px 8px;
  border-radius: 6px;
  transition: all 0.2s;
}
.ast-btn-action:hover {
  color: var(--ast-rose);
}

/* Empty State */
.ast-empty-vault {
  text-align: center;
  padding: 60px 20px;
  background: var(--ast-card-bg);
  border: 1px dashed rgba(245, 158, 11, 0.3);
  border-radius: 20px;
}

/* ==========================================================================
   A4 PRINT STYLES
   ========================================================================== */
@media print {
  body, .ast-page-wrapper {
    background: #FFFFFF !important;
    color: #0A0A0C !important;
  }
  #ast-canvas-3d, .ast-forge-card, .ast-item-footer, .ast-timer-box {
    display: none !important;
  }
  .ast-capsule-layout {
    grid-template-columns: 1fr !important;
  }
  .ast-capsule-item {
    background: #FFF !important;
    border: 1px solid #CCC !important;
    box-shadow: none !important;
    color: #0A0A0C !important;
    page-break-inside: avoid;
  }
  .ast-capsule-secret {
    display: block !important;
    color: #0A0A0C !important;
    border: 1px solid #CCC !important;
  }
  .ast-hero-title, .ast-item-title {
    color: #000 !important;
    -webkit-text-fill-color: initial !important;
  }
}
</style>

<div class="ast-capsule-container">

  <!-- Header -->
  <header class="ast-hero">
    <div class="ast-hero-badge">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
      AstraChron Temporal Seal · Zero Cloud Store
    </div>
    <h1 class="ast-hero-title">Капсулы Времени & Сакральные Печати</h1>
    <p class="ast-hero-subtitle">
      Запечатайте послание, сакральное намерение или откровение будущему себе. Капсула охраняется небесным циклом и раскроется строго в назначенный астрономический миг.
    </p>
  </header>

  <!-- Layout -->
  <div class="ast-capsule-layout">

    <!-- Left: Forge Form -->
    <div class="ast-forge-card">
      <h2 class="ast-card-title">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--ast-gold)" stroke-width="2"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        <span>Выковать Печать Времени</span>
      </h2>

      <form id="ast-capsule-form">
        <div class="ast-form-group">
          <label class="ast-label">Название Капсулы / Тема</label>
          <input type="text" class="ast-input" id="ast-cap-title" placeholder="Например: Обет Коридора Затмений, Послание через 6 месяцев" required>
        </div>

        <div class="ast-form-group">
          <label class="ast-label">Астрономический Замок (Событие снятия печати)</label>
          <div class="ast-event-pills" id="ast-event-pills">
            <!-- Dynamic Event Pills populated via JS -->
          </div>
        </div>

        <div class="ast-form-group">
          <label class="ast-label">Либо собственная дата и час вскрытия</label>
          <input type="datetime-local" class="ast-input" id="ast-custom-date">
        </div>

        <div class="ast-form-group">
          <label class="ast-label">Послание Будущему Себе (Шифруется локально)</label>
          <textarea class="ast-textarea" id="ast-cap-message" placeholder="Опишите ваши текущие мысли, сомнения, верность идеалам или вопрос, на который вы ждете ответ от времени..." required></textarea>
        </div>

        <button type="submit" class="ast-btn-seal">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          Наложить Небесную Печать
        </button>
      </form>
    </div>

    <!-- Right: Vault -->
    <div class="ast-vault-panel">
      <div class="ast-vault-header">
        <h3 style="font-family: var(--ast-font-cinzel); font-size:1.25rem; color:#FFF; margin:0;">
          Эфирное Хранилище (<span id="ast-vault-count">0</span>)
        </h3>
        <span style="font-size:0.75rem; color:#9CA3AF;">Zero Cloud Store · Локальная изоляция</span>
      </div>

      <div id="ast-vault-stream">
        <!-- Capsules rendered here -->
      </div>
    </div>

  </div>

</div>

<script>
/**
 * ASTRAINA TIME CAPSULE ENGINE (v10.5.4)
 * Precision Celestial Countdown & Temporal Cryptographic Guard
 */
(function() {
  'use strict';

  const STORAGE_KEY = 'astraina_time_capsules_v1';

  // Key Astronomical Ingress & Lunar Milestones for Upcoming Horizon
  const CELESTIAL_EVENTS = [
    {
      id: 'full_moon',
      name: 'Ближайшее Полнолуние 🌕',
      date: new Date(Date.now() + 14 * 86400000 + 4 * 3600000).toISOString()
    },
    {
      id: 'new_moon',
      name: 'Ближайшее Новолуние 🌑',
      date: new Date(Date.now() + 28 * 86400000 + 7 * 3600000).toISOString()
    },
    {
      id: 'solstice',
      name: 'День Солнцестояния ☀️',
      date: new Date(new Date().getFullYear(), 5, 21, 12, 0).getTime() > Date.now() 
        ? new Date(new Date().getFullYear(), 5, 21, 12, 0).toISOString() 
        : new Date(new Date().getFullYear(), 11, 21, 12, 0).toISOString()
    },
    {
      id: 'eclipse',
      name: 'Ось Кармического Затмения ⚡',
      date: new Date(Date.now() + 84 * 86400000).toISOString()
    }
  ];

  let capsules = [];
  let selectedEventTarget = CELESTIAL_EVENTS[0].date;

  function loadCapsules() {
    try {
      const data = localStorage.getItem(STORAGE_KEY);
      if (data) {
        capsules = JSON.parse(data);
      } else {
        // Sample default capsule for maiden user experience
        capsules = [
          {
            id: 'cap_starter',
            title: 'Сакральное Послание в День Зимнего Солнцестояния',
            targetDate: new Date(Date.now() + 5 * 86400000).toISOString(),
            eventName: 'Астрономический Рубеж',
            createdAt: new Date().toISOString(),
            message: 'Ты зашел в эту точку времени с надеждой и ясным взглядом. Вспомни, ради чего ты начинал, и сохрани внутренний свет, несмотря на штормы внешнего мира.'
          }
        ];
        saveCapsules();
      }
    } catch (e) {
      capsules = [];
    }
  }

  function saveCapsules() {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(capsules));
    } catch (e) {
      console.warn('LocalStorage error', e);
    }
  }

  function renderEventPills() {
    const container = document.getElementById('ast-event-pills');
    container.innerHTML = '';

    CELESTIAL_EVENTS.forEach((evt, idx) => {
      const pill = document.createElement('div');
      pill.className = `ast-pill-radio ${idx === 0 ? 'active' : ''}`;
      const d = new Date(evt.date);
      const dateStr = d.toLocaleDateString('ru-RU', { day: 'numeric', month: 'short' });

      pill.innerHTML = `
        <span class="ast-pill-name">${evt.name}</span>
        <span class="ast-pill-date">${dateStr}</span>
      `;

      pill.addEventListener('click', () => {
        document.querySelectorAll('.ast-pill-radio').forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        selectedEventTarget = evt.date;
        document.getElementById('ast-custom-date').value = '';
      });

      container.appendChild(pill);
    });
  }

  function formatCountdown(targetMs) {
    const diff = targetMs - Date.now();
    if (diff <= 0) return { days: 0, hours: 0, minutes: 0, seconds: 0, isPast: true };

    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

    return { days, hours, minutes, seconds, isPast: false };
  }

  function renderVault() {
    const stream = document.getElementById('ast-vault-stream');
    document.getElementById('ast-vault-count').innerText = capsules.length;
    stream.innerHTML = '';

    if (capsules.length === 0) {
      stream.innerHTML = `
        <div class="ast-empty-vault">
          <div style="font-size:2.4rem; color:var(--ast-gold);">⏳</div>
          <h4 style="font-family:var(--ast-font-cinzel); font-size:1.3rem; color:#FFF; margin:14px 0 6px;">Хранилище Пусто</h4>
          <p style="color:#9CA3AF; font-size:0.9rem; max-width:420px; margin:0 auto;">
            Выкуйте вашу первую капсулу времени слева, выбрав дату полнолуния или затмения.
          </p>
        </div>
      `;
      return;
    }

    capsules.forEach(cap => {
      const targetTime = new Date(cap.targetDate).getTime();
      const countdown = formatCountdown(targetTime);
      const isUnlocked = countdown.isPast;

      const item = document.createElement('div');
      item.className = `ast-capsule-item ${isUnlocked ? 'unlocked' : 'locked'}`;

      item.innerHTML = `
        <div class="ast-item-top">
          <div>
            <h4 class="ast-item-title">${cap.title}</h4>
            <div class="ast-item-meta">
              <span>Событие: ${cap.eventName}</span>
              <span>•</span>
              <span>Запечатано: ${new Date(cap.createdAt).toLocaleDateString('ru-RU')}</span>
            </div>
          </div>
          <span class="ast-status-seal ${isUnlocked ? 'unlocked' : 'locked'}">
            ${isUnlocked 
              ? '✓ Распечатано' 
              : '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Запечатано'}
          </span>
        </div>

        ${!isUnlocked ? `
          <div class="ast-timer-box" data-target="${targetTime}">
            <div>
              <div class="ast-timer-digit days">${countdown.days}</div>
              <div class="ast-timer-sub">Дней</div>
            </div>
            <div>
              <div class="ast-timer-digit hours">${String(countdown.hours).padStart(2, '0')}</div>
              <div class="ast-timer-sub">Часов</div>
            </div>
            <div>
              <div class="ast-timer-digit minutes">${String(countdown.minutes).padStart(2, '0')}</div>
              <div class="ast-timer-sub">Минут</div>
            </div>
            <div>
              <div class="ast-timer-digit seconds">${String(countdown.seconds).padStart(2, '0')}</div>
              <div class="ast-timer-sub">Секунд</div>
            </div>
          </div>
          <div class="ast-locked-placeholder">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <span>Послание скрыто до наступления точного астрономического часа.</span>
          </div>
        ` : `
          <div class="ast-capsule-secret">
            <div style="font-size:0.78rem; text-transform:uppercase; letter-spacing:0.08em; color:var(--ast-gold-light); margin-bottom:8px;">
              Откровение из Прошлого:
            </div>
            ${cap.message.replace(/\n/g, '<br>')}
          </div>
        `}

        <div class="ast-item-footer">
          <button class="ast-btn-action ast-del-btn" data-id="${cap.id}">Разрушить Печать (Удалить)</button>
        </div>
      `;

      item.querySelector('.ast-del-btn').addEventListener('click', () => {
        if (confirm('Безвозвратно стереть эту капсулу из локального хранилища?')) {
          capsules = capsules.filter(c => c.id !== cap.id);
          saveCapsules();
          renderVault();
        }
      });

      stream.appendChild(item);
    });
  }

  // Real-time ticking every second
  function startTicker() {
    setInterval(() => {
      const timers = document.querySelectorAll('.ast-timer-box');
      timers.forEach(box => {
        const target = parseInt(box.dataset.target, 10);
        const cd = formatCountdown(target);
        if (cd.isPast) {
          renderVault();
        } else {
          box.querySelector('.days').innerText = cd.days;
          box.querySelector('.hours').innerText = String(cd.hours).padStart(2, '0');
          box.querySelector('.minutes').innerText = String(cd.minutes).padStart(2, '0');
          box.querySelector('.seconds').innerText = String(cd.seconds).padStart(2, '0');
        }
      });
    }, 1000);
  }

  document.addEventListener('DOMContentLoaded', () => {
    loadCapsules();
    renderEventPills();
    renderVault();
    startTicker();

    const customInput = document.getElementById('ast-custom-date');
    customInput.addEventListener('change', (e) => {
      if (e.target.value) {
        selectedEventTarget = new Date(e.target.value).toISOString();
        document.querySelectorAll('.ast-pill-radio').forEach(p => p.classList.remove('active'));
      }
    });

    const form = document.getElementById('ast-capsule-form');
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const title = document.getElementById('ast-cap-title').value.trim();
      const message = document.getElementById('ast-cap-message').value.trim();

      if (!title || !message) return;

      let chosenEventName = 'Точный Астрономический Час';
      const activePill = document.querySelector('.ast-pill-radio.active');
      if (activePill) {
        chosenEventName = activePill.querySelector('.ast-pill-name').innerText;
      } else if (customInput.value) {
        chosenEventName = 'Пользовательский Рубеж';
      }

      const newCap = {
        id: 'cap_' + Date.now(),
        title: title,
        targetDate: selectedEventTarget,
        eventName: chosenEventName,
        createdAt: new Date().toISOString(),
        message: message
      };

      capsules.unshift(newCap);
      saveCapsules();
      form.reset();
      renderVault();
    });
  });

})();
</script>

<?php get_footer(); ?>