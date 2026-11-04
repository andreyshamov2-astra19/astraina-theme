<?php
/**
 * Template Name: Manifesto - Sacred Observatory Principles
 * Description: The Sacred Manifesto and 7 Pillars of Astraina Observatory (Zero Cloud Store).
 * Version: 10.5.6
 * Author: ASTRAINA Core Architecture Team
 */

get_header();
?>

<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 100vh; color: #F3F4F6;">

<style>
/* ==========================================================================
   ASTRAINA SACRED MANIFESTO LUXURY DESIGN SYSTEM
   ========================================================================== */
:root {
  --ast-bg-obsidian: #020408;
  --ast-card-bg: rgba(11, 15, 23, 0.85);
  --ast-border-gold: rgba(245, 158, 11, 0.28);
  --ast-border-gold-bright: rgba(245, 158, 11, 0.7);
  --ast-gold: #F59E0B;
  --ast-gold-light: #FBBF24;
  --ast-gold-gradient: linear-gradient(135deg, #F59E0B 0%, #D97706 50%, #92400E 100%);
  --ast-cyan: #38BDF8;
  --ast-emerald: #10B981;
  --ast-purple: #A855F7;
  --ast-font-cinzel: 'Cinzel', serif;
  --ast-font-sans: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

.ast-manifesto-container {
  max-width: 920px;
  margin: 0 auto;
  padding: 50px 24px 120px;
  font-family: var(--ast-font-sans);
}

/* Header */
.ast-hero {
  text-align: center;
  margin-bottom: 50px;
  position: relative;
}
.ast-hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 20px;
  background: rgba(245, 158, 11, 0.08);
  border: 1px solid var(--ast-border-gold);
  border-radius: 9999px;
  font-size: 0.8rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--ast-gold-light);
  margin-bottom: 20px;
  backdrop-filter: blur(8px);
}
.ast-hero-title {
  font-family: var(--ast-font-cinzel);
  font-size: clamp(2.2rem, 5vw, 3.8rem);
  font-weight: 700;
  line-height: 1.15;
  background: linear-gradient(180deg, #FFFFFF 0%, #F59E0B 75%, #B45309 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin: 0 0 18px;
  letter-spacing: 0.04em;
}
.ast-hero-motto {
  font-family: var(--ast-font-cinzel);
  font-size: 1.15rem;
  letter-spacing: 0.08em;
  color: #D1D5DB;
  font-style: italic;
  margin: 0 auto;
  max-width: 680px;
  line-height: 1.6;
}

/* Manifesto Parchment Card */
.ast-manifesto-parchment {
  background: var(--ast-card-bg);
  border: 1px solid var(--ast-border-gold);
  border-radius: 24px;
  padding: 48px;
  backdrop-filter: blur(20px);
  box-shadow: 0 25px 60px rgba(0, 0, 0, 0.9), 0 0 40px rgba(245, 158, 11, 0.08);
  position: relative;
}
@media (max-width: 640px) {
  .ast-manifesto-parchment {
    padding: 28px 20px;
  }
}

/* Prologue */
.ast-prologue {
  font-size: 1.12rem;
  line-height: 1.8;
  color: #E5E7EB;
  margin-bottom: 40px;
  padding-bottom: 30px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}
.ast-prologue p {
  margin: 0 0 16px;
}
.ast-prologue p:first-child::first-letter {
  font-family: var(--ast-font-cinzel);
  font-size: 3.4rem;
  float: left;
  line-height: 0.85;
  margin-right: 14px;
  color: var(--ast-gold-light);
  font-weight: 700;
}

/* 7 Pillars */
.ast-pillar-item {
  margin-bottom: 36px;
  position: relative;
  padding-left: 28px;
  border-left: 2px solid rgba(245, 158, 11, 0.3);
  transition: border-color 0.3s ease;
}
.ast-pillar-item:hover {
  border-left-color: var(--ast-gold);
}
.ast-pillar-num {
  font-family: var(--ast-font-cinzel);
  font-size: 0.85rem;
  color: var(--ast-gold-light);
  letter-spacing: 0.15em;
  text-transform: uppercase;
  margin-bottom: 4px;
}
.ast-pillar-title {
  font-family: var(--ast-font-cinzel);
  font-size: 1.35rem;
  font-weight: 700;
  color: #FFF;
  margin: 0 0 10px;
  letter-spacing: 0.02em;
}
.ast-pillar-text {
  font-size: 0.98rem;
  line-height: 1.7;
  color: #9CA3AF;
  margin: 0;
  font-weight: 300;
}
.ast-pillar-text strong {
  color: #F3F4F6;
  font-weight: 600;
}

/* Oath of Resonance Section */
.ast-oath-box {
  margin-top: 48px;
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.08) 0%, rgba(11, 15, 23, 0.9) 100%);
  border: 1px dashed rgba(245, 158, 11, 0.4);
  border-radius: 18px;
  padding: 32px;
  text-align: center;
}
.ast-oath-title {
  font-family: var(--ast-font-cinzel);
  font-size: 1.3rem;
  color: #FFF;
  margin: 0 0 10px;
}
.ast-oath-desc {
  font-size: 0.92rem;
  color: #9CA3AF;
  max-width: 580px;
  margin: 0 auto 24px;
  line-height: 1.6;
}
.ast-seal-form {
  display: flex;
  justify-content: center;
  gap: 12px;
  max-width: 460px;
  margin: 0 auto;
  flex-wrap: wrap;
}
.ast-seal-input {
  flex: 1;
  min-width: 220px;
  background: rgba(2, 4, 8, 0.85);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 10px;
  padding: 12px 16px;
  color: #FFF;
  font-size: 0.95rem;
  outline: none;
  text-align: center;
}
.ast-seal-input:focus {
  border-color: var(--ast-gold);
}
.ast-btn-seal {
  background: var(--ast-gold-gradient);
  color: #020408;
  border: none;
  border-radius: 10px;
  padding: 12px 24px;
  font-weight: 700;
  font-size: 0.92rem;
  cursor: pointer;
  transition: all 0.25s ease;
  box-shadow: 0 4px 18px rgba(245, 158, 11, 0.35);
}
.ast-btn-seal:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 26px rgba(245, 158, 11, 0.55);
}

/* Certificate Result */
.ast-certificate {
  display: none;
  background: rgba(0, 0, 0, 0.6);
  border: 1px solid var(--ast-gold);
  border-radius: 14px;
  padding: 20px;
  margin-top: 20px;
  text-align: center;
}
.ast-cert-badge {
  font-size: 0.76rem;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  color: var(--ast-emerald);
  margin-bottom: 6px;
}
.ast-cert-name {
  font-family: var(--ast-font-cinzel);
  font-size: 1.4rem;
  font-weight: 700;
  color: var(--ast-gold-light);
}
.ast-cert-hash {
  font-size: 0.72rem;
  font-family: monospace;
  color: #9CA3AF;
  margin-top: 6px;
}

/* Print Controls */
.ast-manifesto-actions {
  display: flex;
  justify-content: center;
  gap: 16px;
  margin-top: 36px;
}
.ast-btn-print {
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.12);
  color: #E5E7EB;
  padding: 10px 22px;
  border-radius: 10px;
  font-size: 0.86rem;
  font-weight: 600;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.2s ease;
}
.ast-btn-print:hover {
  border-color: var(--ast-gold);
  color: var(--ast-gold-light);
}

/* ==========================================================================
   A4 PRINT STYLES
   ========================================================================== */
@media print {
  body, .ast-page-wrapper {
    background: #FFFFFF !important;
    color: #0A0A0C !important;
  }
  #ast-canvas-3d, .ast-manifesto-actions, .ast-seal-form, .ast-hero-badge {
    display: none !important;
  }
  .ast-manifesto-parchment {
    background: #FFF !important;
    border: none !important;
    box-shadow: none !important;
    padding: 0 !important;
    color: #0A0A0C !important;
  }
  .ast-hero-title {
    color: #000 !important;
    -webkit-text-fill-color: initial !important;
  }
  .ast-pillar-title, .ast-pillar-text strong {
    color: #000 !important;
  }
  .ast-pillar-text {
    color: #333 !important;
  }
  .ast-pillar-item {
    border-left-color: #666 !important;
    page-break-inside: avoid;
  }
  .ast-oath-box {
    background: #F3F4F6 !important;
    border: 1px solid #CCC !important;
    color: #000 !important;
  }
  .ast-cert-name {
    color: #000 !important;
  }
}
</style>

<div class="ast-manifesto-container">

  <!-- Header -->
  <header class="ast-hero">
    <div class="ast-hero-badge">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
      Astraina Observatory Codex · v10.5
    </div>
    <h1 class="ast-hero-title">Сакральный Манифест Обсерватории</h1>
    <p class="ast-hero-motto">
      «A global guide to the cosmos, cultures and human connections»
    </p>
  </header>

  <!-- Parchment -->
  <main class="ast-manifesto-parchment">
    
    <div class="ast-prologue">
      <p>
        Мы стоим на переломе эпох — между холодным прагматизмом алгоритмов и вечной тягой человеческого духа к созерцанию бесконечного. Тысячелетиями небосвод был не просто физическим пространством, но зеркалом, в котором цивилизации искали смысл, гармонию и исток своей воли.
      </p>
      <p>
        ASTRAINA рождена как обитель чистого созерцания — независимая обсерватория нового тысячелетия, объединяющая математическую строгость орбитальной астрофизики и глубинную психоаналитику человеческой души. Мы провозглашаем семь нерушимых столпов нашего присутствия в мировом эфире:
      </p>
    </div>

    <!-- 7 Pillars -->
    <div class="ast-pillars-list">
      
      <div class="ast-pillar-item">
        <div class="ast-pillar-num">Столп I</div>
        <h2 class="ast-pillar-title">Суверенитет Души & Zero Cloud Store</h2>
        <p class="ast-pillar-text">
          Ваша натальная карта и личные откровения принадлежат только вам. Мы категорически отвергаем торговлю персональными судьбами. Вычисления производятся локально на вашем устройстве. Никаких скрытых облачных хранилищ, никаких следящих профилей.
        </p>
      </div>

      <div class="ast-pillar-item">
        <div class="ast-pillar-num">Столп II</div>
        <h2 class="ast-pillar-title">Синтез Астрофизики NASA и Глубинной Психологии</h2>
        <p class="ast-pillar-text">
          Мы отвергаем примитивные суеверия газетных гороскопов. Ядро AstraChron базируется на эфемеридах <strong>NASA JPL DE440/DE441</strong> и шведских формулах Schlyter, переводя движение небесных тел на строгий язык юнгианских архетипов и психоанализа.
        </p>
      </div>

      <div class="ast-pillar-item">
        <div class="ast-pillar-num">Столп III</div>
        <h2 class="ast-pillar-title">Внедогматичность & Гендерный Суверенитет</h2>
        <p class="ast-pillar-text">
          Космос не знает искусственных социальных рамок и бинарных шаблонов. Перед лицом вечности существует только <strong>Душа, Человек, Натив</strong> и уникальная траектория раскрытия его творческого и духовного потенциала.
        </p>
      </div>

      <div class="ast-pillar-item">
        <div class="ast-pillar-num">Столп IV</div>
        <h2 class="ast-pillar-title">Хронос как Ткань Осознанности</h2>
        <p class="ast-pillar-text">
          Время — это не линейная гонка к выгоранию, а циклический танец фаз, солнцестояний и планетарных приливов. Мы возвращаем человеку способность дышать в унисон с естественными космическими ритмами.
        </p>
      </div>

      <div class="ast-pillar-item">
        <div class="ast-pillar-num">Столп V</div>
        <h2 class="ast-pillar-title">Эстетика Сакрального Обсидиана</h2>
        <p class="ast-pillar-text">
          Истинное знание требует благородной формы. Наша визуальная система (Samhain Obsidian & Cosmic Gold) создана как цифровое святилище, свободное от кричащего визуального шума потребительского интернета.
        </p>
      </div>

      <div class="ast-pillar-item">
        <div class="ast-pillar-num">Столп VI</div>
        <h2 class="ast-pillar-title">Синергия Сердец & Резонанс Полей</h2>
        <p class="ast-pillar-text">
          Синастрия в нашей философии — это не инструмент оценки совместимости, а сакральная карта взаимопонимания. Мы помогаем видеть в партнере не объект проекций, а вселенную, с которой вы добровольно вступили в гравитационный танец.
        </p>
      </div>

      <div class="ast-pillar-item">
        <div class="ast-pillar-num">Столп VII</div>
        <h2 class="ast-pillar-title">Верность Вечности & Хранение Мудрости</h2>
        <p class="ast-pillar-text">
          Через Капсулы Времени, сакральные эфемериды и атлас исторических гениев мы связываем воедино прошлое, настоящее и грядущее, напоминая каждому страннику: <strong>ты есть часть непрерывного потока вселенной</strong>.
        </p>
      </div>

    </div>

    <!-- Interactive Seal of Oath -->
    <div class="ast-oath-box">
      <h3 class="ast-oath-title">Скрепить Резонанс с Манифестом</h3>
      <p class="ast-oath-desc">
        Впишите ваше имя или сакральный псевдоним, чтобы принять принципы Обсерватории и зафиксировать криптографическую печать в вашем локальном реестре.
      </p>
      
      <form class="ast-seal-form" id="ast-manifesto-form">
        <input type="text" class="ast-seal-input" id="ast-manifesto-name" placeholder="Ваше имя / Инициалы" required>
        <button type="submit" class="ast-btn-seal">Наложить Печать</button>
      </form>

      <div class="ast-certificate" id="ast-certificate">
        <div class="ast-cert-badge">✓ Печать Созерцателя Активирована</div>
        <div class="ast-cert-name" id="ast-cert-name-val">Странник Эфира</div>
        <div class="ast-cert-hash" id="ast-cert-hash-val">AST-SEAL-8842-OBSIDIAN</div>
      </div>
    </div>

    <!-- Actions -->
    <div class="ast-manifesto-actions">
      <button class="ast-btn-print" onclick="window.print()">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
        Распечатать Пергамент (A4)
      </button>
    </div>

  </main>

</div>

<script>
/**
 * ASTRAINA SACRED MANIFESTO CONTROLLER (v10.5.6)
 * Zero Cloud Store Local Cryptographic Seal Engine
 */
(function() {
  'use strict';

  const STORAGE_KEY = 'astraina_manifesto_seal_v1';

  function checkExistingSeal() {
    try {
      const data = localStorage.getItem(STORAGE_KEY);
      if (data) {
        const parsed = JSON.parse(data);
        showCertificate(parsed.name, parsed.hash);
      }
    } catch(e) {}
  }

  function generateHash(str) {
    let hash = 0;
    for (let i = 0; i < str.length; i++) {
      hash = ((hash << 5) - hash) + str.charCodeAt(i);
      hash |= 0;
    }
    const hex = Math.abs(hash).toString(16).toUpperCase();
    return `ASTRA-SEAL-${hex}-${Date.now().toString().slice(-4)}`;
  }

  function showCertificate(name, hash) {
    document.getElementById('ast-manifesto-form').style.display = 'none';
    const cert = document.getElementById('ast-certificate');
    document.getElementById('ast-cert-name-val').innerText = name;
    document.getElementById('ast-cert-hash-val').innerText = hash;
    cert.style.display = 'block';
  }

  document.addEventListener('DOMContentLoaded', () => {
    checkExistingSeal();

    const form = document.getElementById('ast-manifesto-form');
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const name = document.getElementById('ast-manifesto-name').value.trim();
      if (!name) return;

      const hash = generateHash(name);
      const sealData = {
        name: name,
        hash: hash,
        timestamp: new Date().toISOString()
      };

      try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(sealData));
      } catch(e) {}

      showCertificate(name, hash);
    });
  });

})();
</script>

<?php get_footer(); ?>