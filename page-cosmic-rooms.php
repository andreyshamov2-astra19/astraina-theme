<?php
/**
 * Template Name: Cosmic Rooms - Planetary Transit Resonators
 * Description: Real-time planetary aspect rooms, harmonic frequency resonators, and collective insight ether.
 * Version: 10.5.5
 * Author: ASTRAINA Core Architecture Team
 */

get_header();
?>

<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 100vh; color: #F3F4F6;">

<style>
/* ==========================================================================
   ASTRAINA COSMIC ROOMS DESIGN SYSTEM
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
  --ast-purple: #A855F7;
  --ast-rose: #F43F5E;
  --ast-font-cinzel: 'Cinzel', serif;
  --ast-font-sans: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

.ast-rooms-container {
  max-width: 1280px;
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

/* Rooms Grid */
.ast-rooms-cluster {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 20px;
  margin-bottom: 36px;
}
.ast-room-card {
  background: var(--ast-card-bg);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 18px;
  padding: 22px;
  cursor: pointer;
  transition: all 0.25s ease;
  backdrop-filter: blur(12px);
  position: relative;
  overflow: hidden;
}
.ast-room-card:hover {
  border-color: var(--ast-border-gold);
  transform: translateY(-3px);
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.6);
}
.ast-room-card.active {
  border-color: var(--ast-gold);
  background: rgba(245, 158, 11, 0.08);
  box-shadow: 0 0 25px rgba(245, 158, 11, 0.25);
}
.ast-room-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 12px;
}
.ast-room-symbol {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.4rem;
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.1);
  color: var(--ast-gold-light);
}
.ast-room-online {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.76rem;
  color: var(--ast-emerald);
  font-weight: 600;
}
.ast-pulse-dot {
  width: 8px;
  height: 8px;
  background: var(--ast-emerald);
  border-radius: 50%;
  box-shadow: 0 0 8px var(--ast-emerald);
  animation: astPulse 2s infinite;
}
@keyframes astPulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.4; transform: scale(0.85); }
}
.ast-room-title {
  font-family: var(--ast-font-cinzel);
  font-size: 1.15rem;
  font-weight: 700;
  color: #FFF;
  margin: 0 0 6px;
}
.ast-room-theme {
  font-size: 0.8rem;
  color: var(--ast-gold-light);
  margin-bottom: 8px;
}
.ast-room-freq {
  font-size: 0.72rem;
  color: #9CA3AF;
  letter-spacing: 0.05em;
  text-transform: uppercase;
}

/* Active Room Sanctuary */
.ast-sanctuary {
  background: var(--ast-card-bg);
  border: 1px solid var(--ast-border-gold);
  border-radius: 24px;
  padding: 34px;
  backdrop-filter: blur(18px);
  box-shadow: 0 25px 60px rgba(0, 0, 0, 0.9);
  margin-bottom: 40px;
}
.ast-sanctuary-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 24px;
  flex-wrap: wrap;
  gap: 16px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  padding-bottom: 20px;
}
.ast-sanctuary-title {
  font-family: var(--ast-font-cinzel);
  font-size: 1.6rem;
  color: #FFF;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
}
.ast-audio-controls {
  display: flex;
  align-items: center;
  gap: 12px;
}
.ast-btn-tone {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid var(--ast-border-gold);
  color: var(--ast-gold-light);
  padding: 8px 18px;
  border-radius: 10px;
  font-size: 0.82rem;
  font-weight: 600;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.2s ease;
}
.ast-btn-tone:hover {
  background: rgba(245, 158, 11, 0.15);
  border-color: var(--ast-gold);
}
.ast-btn-tone.playing {
  background: var(--ast-gold-gradient);
  color: #020408;
  border-color: var(--ast-gold);
  font-weight: 700;
}

/* Sanctuary Layout */
.ast-sanctuary-layout {
  display: grid;
  grid-template-columns: 1fr 1.2fr;
  gap: 32px;
}
@media (max-width: 900px) {
  .ast-sanctuary-layout {
    grid-template-columns: 1fr;
  }
}
.ast-archetype-desc {
  font-size: 0.96rem;
  line-height: 1.65;
  color: #D1D5DB;
  font-weight: 300;
  margin-bottom: 20px;
}
.ast-key-mandate {
  background: rgba(245, 158, 11, 0.06);
  border: 1px dashed rgba(245, 158, 11, 0.3);
  border-radius: 14px;
  padding: 16px;
  margin-bottom: 20px;
}
.ast-mandate-title {
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--ast-gold-light);
  font-weight: 700;
  margin-bottom: 6px;
}
.ast-mandate-text {
  font-size: 0.9rem;
  line-height: 1.5;
  color: #FDE68A;
  margin: 0;
}

/* Feed / Reflections inside Room */
.ast-reflections-vault {
  display: flex;
  flex-direction: column;
  gap: 14px;
  max-height: 380px;
  overflow-y: auto;
  padding-right: 6px;
}
.ast-reflection-bubble {
  background: rgba(0, 0, 0, 0.35);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 12px;
  padding: 14px 16px;
  position: relative;
}
.ast-bubble-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 6px;
}
.ast-bubble-author {
  font-size: 0.82rem;
  font-weight: 600;
  color: var(--ast-gold-light);
}
.ast-bubble-time {
  font-size: 0.72rem;
  color: #9CA3AF;
}
.ast-bubble-body {
  font-size: 0.88rem;
  line-height: 1.5;
  color: #E5E7EB;
}

/* Send Reflection Form */
.ast-reflection-form {
  margin-top: 18px;
  display: flex;
  gap: 10px;
}
.ast-reflection-input {
  flex: 1;
  background: rgba(2, 4, 8, 0.8);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 10px;
  padding: 10px 14px;
  color: #FFF;
  font-size: 0.9rem;
  outline: none;
}
.ast-reflection-input:focus {
  border-color: var(--ast-gold);
}
.ast-btn-send {
  background: var(--ast-gold-gradient);
  color: #020408;
  border: none;
  border-radius: 10px;
  padding: 10px 20px;
  font-weight: 700;
  font-size: 0.88rem;
  cursor: pointer;
  white-space: nowrap;
  transition: all 0.2s;
}
.ast-btn-send:hover {
  transform: translateY(-1px);
}

/* ==========================================================================
   A4 PRINT STYLES
   ========================================================================== */
@media print {
  body, .ast-page-wrapper {
    background: #FFFFFF !important;
    color: #0A0A0C !important;
  }
  #ast-canvas-3d, .ast-audio-controls, .ast-reflection-form, .ast-rooms-cluster {
    display: none !important;
  }
  .ast-sanctuary {
    background: #FFF !important;
    border: 1px solid #CCC !important;
    box-shadow: none !important;
    color: #0A0A0C !important;
  }
  .ast-hero-title, .ast-sanctuary-title {
    color: #000 !important;
    -webkit-text-fill-color: initial !important;
  }
  .ast-reflection-bubble {
    background: #F3F4F6 !important;
    border: 1px solid #CCC !important;
    color: #0A0A0C !important;
  }
}
</style>

<div class="ast-rooms-container">

  <!-- Header -->
  <header class="ast-hero">
    <div class="ast-hero-badge">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24M14.83 9.17l4.24-4.24M14.83 14.83l4.24 4.24M9.17 14.83l-4.24 4.24"/></svg>
      AstraChron Resonance Mesh · Harmonic Binaural Oscillators
    </div>
    <h1 class="ast-hero-title">Аспектные Комнаты Резонанса</h1>
    <p class="ast-hero-subtitle">
      Онлайн-кластеры душ, проходящих через идентичные планетарные транзиты прямо сейчас. Настройтесь на гармоническую частоту планеты и синхронизируйте осознанность.
    </p>
  </header>

  <!-- Cluster Selector -->
  <div class="ast-rooms-cluster" id="ast-rooms-cluster">
    <!-- Rendered dynamically -->
  </div>

  <!-- Active Room Sanctuary -->
  <div class="ast-sanctuary" id="ast-sanctuary">
    <div class="ast-sanctuary-header">
      <div>
        <h2 class="ast-sanctuary-title" id="ast-room-title">
          <span id="ast-room-symbol" style="color:var(--ast-gold-light);">♇</span>
          <span id="ast-room-name">Обитель Плутона: Великая Трансформация</span>
        </h2>
        <div style="font-size:0.8rem; color:var(--ast-gold-light); margin-top:4px;" id="ast-room-subtitle">
          Транзиты Плутона к натальным планетам · Коридор перерождения
        </div>
      </div>

      <div class="ast-audio-controls">
        <button class="ast-btn-tone" id="ast-toggle-audio">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>
          <span id="ast-audio-label">Слушать Частоту (140.25 Гц)</span>
        </button>
      </div>
    </div>

    <div class="ast-sanctuary-layout">
      <!-- Left Column: Meaning & Mandate -->
      <div>
        <p class="ast-archetype-desc" id="ast-room-desc">
          Вы вошли в кластер глубоких тектонических изменений. Плутон безжалостно сжигает отжившее, чтобы высвободить скрытую алмазную мощь вашего истинного «Я».
        </p>

        <div class="ast-key-mandate">
          <div class="ast-mandate-title">Протокол Прохождения Транзита</div>
          <p class="ast-mandate-text" id="ast-room-mandate">
            Не держитесь за то, что уходит. Практикуйте радикальное принятие. Сила сейчас раскрывается не через контроль, а через способность возрождаться из пепла.
          </p>
        </div>

        <div style="font-size:0.78rem; color:#9CA3AF; display:flex; align-items:center; gap:8px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--ast-emerald)" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
          <span>Резонансный контур изолирован. Анонимный суверенитет Zero Cloud Store.</span>
        </div>
      </div>

      <!-- Right Column: Live Collective Feed -->
      <div>
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
          <span style="font-size:0.8rem; text-transform:uppercase; letter-spacing:0.06em; color:#9CA3AF;">Эфирные Откровения Соратников</span>
          <span style="font-size:0.75rem; color:var(--ast-emerald);" id="ast-presence-counter">24 души в потоке</span>
        </div>

        <div class="ast-reflections-vault" id="ast-reflections-vault">
          <!-- Populated dynamically -->
        </div>

        <form class="ast-reflection-form" id="ast-reflection-form">
          <input type="text" class="ast-reflection-input" id="ast-reflection-text" placeholder="Оставить анонимный след в эфире комнаты..." required>
          <button type="submit" class="ast-btn-send">Отправить</button>
        </form>
      </div>
    </div>
  </div>

</div>

<script>
/**
 * ASTRAINA COSMIC ROOMS & FREQUENCY HARMONIZER (v10.5.5)
 * Web Audio API Precision Planetary Tone Synthesizer & Local Resonance Mesh
 */
(function() {
  'use strict';

  const ROOMS = [
    {
      id: 'pluto',
      symbol: '♇',
      name: 'Обитель Плутона',
      theme: 'Великая Трансформация & Перерождение',
      freqHz: 140.25,
      freqLabel: '140.25 Гц · Частота Плутона',
      online: 38,
      desc: 'Вы вошли в кластер глубоких тектонических изменений. Плутон безжалостно сжигает отжившее, чтобы высвободить скрытую алмазную мощь вашего истинного «Я».',
      mandate: 'Не держитесь за то, что уходит. Практикуйте радикальное принятие. Сила сейчас раскрывается не через контроль, а через способность возрождаться из пепла.',
      starterReflections: [
        { author: 'Странник из Овна', time: '12 минут назад', text: 'Полное ощущение, что старая жизнь рассыпалась. Но внутри впервые за долгое время абсолютный покой.' },
        { author: 'Душа из Скорпиона', time: '1 час назад', text: 'Отпустил проект, за который держался три года. Дышать стало в сто раз легче.' }
      ]
    },
    {
      id: 'saturn',
      symbol: '♄',
      name: 'Цитадель Сатурна',
      theme: 'Возврат Сатурна · Зрелость & Границы',
      freqHz: 147.85,
      freqLabel: '147.85 Гц · Частота Сатурна',
      online: 52,
      desc: 'Пространство кристаллизации формы, испытания временем и обретения подлинного внутреннего стержня. Время детских иллюзий завершилось.',
      mandate: 'Опирайтесь на дисциплину и верность слову. Каждое принятое сейчас обязательство станет фундаментом на следующие 29.5 лет.',
      starterReflections: [
        { author: 'Натив Козерога', time: '24 минуты назад', text: '29 лет. Полная переоценка круга общения. Остались только те, с кем можно строить на века.' },
        { author: 'Путник Водолея', time: '3 часа назад', text: 'Тяжело, но эта тяжесть приятная — как вес настоящего крепкого фундамента.' }
      ]
    },
    {
      id: 'uranus',
      symbol: '♅',
      name: 'Чертог Урана',
      theme: 'Квантовый Прорыв & Освобождение',
      freqHz: 207.36,
      freqLabel: '207.36 Гц · Частота Урана',
      online: 29,
      desc: 'Зона электрических озарений, внезапных инсайтов и сокрушения оков привычной рутины. Старый сценарий больше не властен над вами.',
      mandate: 'Не бойтесь показаться нелогичным. Доверьтесь импульсу озарения. Смело делайте шаг в неизвестность.',
      starterReflections: [
        { author: 'Искатель Близнецов', time: '8 минут назад', text: 'Пришла идея, которая перевернула всё представление о моем деле. Записал за 5 минут!' },
        { author: 'Душа Стрельца', time: '40 минут назад', text: 'Внезапно захотелось сорваться и уехать за тысячу километров. И я еду.' }
      ]
    },
    {
      id: 'neptune',
      symbol: '♆',
      name: 'Океан Нептуна',
      theme: 'Мистика, Интуиция & Вещие Сны',
      freqHz: 211.44,
      freqLabel: '211.44 Гц · Частота Нептуна',
      online: 44,
      desc: 'Пространство растворения границ эго, мистических откровений и прямого контакта с коллективным бессознательным.',
      mandate: 'Отключите аналитический ум. Творите, медитируйте, записывайте сны. Вся правда сейчас приходит сквозь тишину.',
      starterReflections: [
        { author: 'Мистик Рыб', time: '15 минут назад', text: 'Приснился символ, который сегодня увидел в книге. Грань между мирами очень тонкая.' },
        { author: 'Душа Рака', time: '2 часа назад', text: 'Слушаю частоту и просто плачу от невероятной красоты мира.' }
      ]
    },
    {
      id: 'jupiter',
      symbol: '♃',
      name: 'Храм Юпитера',
      theme: 'Масштабирование & Золотой Горизонт',
      freqHz: 183.58,
      freqLabel: '183.58 Гц · Частота Юпитера',
      online: 33,
      desc: 'Кластер расширения возможностей, щедрости фортуны и выхода на новый социальный и духовный масштаб бытия.',
      mandate: 'Мыслите глобально. Делитесь знаниями и ресурсами. Закон отдачи работает с удесятеренной силой.',
      starterReflections: [
        { author: 'Лидер Льва', time: '5 минут назад', text: 'Подписали контракт, о котором даже не мечтали в прошлом году. Благодарность небу.' }
      ]
    }
  ];

  let currentRoom = ROOMS[0];
  let audioCtx = null;
  let oscillator = null;
  let gainNode = null;
  let isPlayingAudio = false;

  function initCluster() {
    const cluster = document.getElementById('ast-rooms-cluster');
    cluster.innerHTML = '';

    ROOMS.forEach(room => {
      const card = document.createElement('div');
      card.className = `ast-room-card ${room.id === currentRoom.id ? 'active' : ''}`;
      card.dataset.id = room.id;

      card.innerHTML = `
        <div class="ast-room-top">
          <div class="ast-room-symbol">${room.symbol}</div>
          <div class="ast-room-online">
            <span class="ast-pulse-dot"></span>
            <span>${room.online} в эфире</span>
          </div>
        </div>
        <div class="ast-room-title">${room.name}</div>
        <div class="ast-room-theme">${room.theme}</div>
        <div class="ast-room-freq">${room.freqLabel}</div>
      `;

      card.addEventListener('click', () => {
        switchRoom(room);
      });

      cluster.appendChild(card);
    });
  }

  function switchRoom(room) {
    if (isPlayingAudio) stopTone();
    currentRoom = room;

    document.querySelectorAll('.ast-room-card').forEach(c => {
      c.classList.toggle('active', c.dataset.id === room.id);
    });

    document.getElementById('ast-room-symbol').innerText = room.symbol;
    document.getElementById('ast-room-name').innerText = room.name + ': ' + room.theme;
    document.getElementById('ast-room-subtitle').innerText = room.freqLabel;
    document.getElementById('ast-audio-label').innerText = `Слушать Частоту (${room.freqHz} Гц)`;
    document.getElementById('ast-room-desc').innerText = room.desc;
    document.getElementById('ast-room-mandate').innerText = room.mandate;
    document.getElementById('ast-presence-counter').innerText = `${room.online} душ в потоке`;

    renderReflections();
  }

  function renderReflections() {
    const vault = document.getElementById('ast-reflections-vault');
    vault.innerHTML = '';

    const localKey = `ast_room_reflections_${currentRoom.id}`;
    let items = currentRoom.starterReflections;
    try {
      const stored = localStorage.getItem(localKey);
      if (stored) {
        items = [...JSON.parse(stored), ...currentRoom.starterReflections];
      }
    } catch(e) {}

    items.forEach(item => {
      const bubble = document.createElement('div');
      bubble.className = 'ast-reflection-bubble';
      bubble.innerHTML = `
        <div class="ast-bubble-top">
          <span class="ast-bubble-author">${item.author}</span>
          <span class="ast-bubble-time">${item.time}</span>
        </div>
        <div class="ast-bubble-body">${item.text}</div>
      `;
      vault.appendChild(bubble);
    });
  }

  // Web Audio Harmonic Synthesizer
  function startTone(freq) {
    try {
      const AudioContext = window.AudioContext || window.webkitAudioContext;
      audioCtx = new AudioContext();

      oscillator = audioCtx.createOscillator();
      gainNode = audioCtx.createGain();

      oscillator.type = 'sine';
      oscillator.frequency.setValueAtTime(freq, audioCtx.currentTime);

      // Smooth fade-in
      gainNode.gain.setValueAtTime(0, audioCtx.currentTime);
      gainNode.gain.linearRampToValueAtTime(0.12, audioCtx.currentTime + 1.2);

      oscillator.connect(gainNode);
      gainNode.connect(audioCtx.destination);
      oscillator.start();

      isPlayingAudio = true;
      const btn = document.getElementById('ast-toggle-audio');
      btn.classList.add('playing');
      document.getElementById('ast-audio-label').innerText = `Частота Активна (${freq} Гц) ⏸`;
    } catch(e) {
      console.warn('Audio Context failed', e);
    }
  }

  function stopTone() {
    if (gainNode && audioCtx) {
      gainNode.gain.linearRampToValueAtTime(0, audioCtx.currentTime + 0.5);
      setTimeout(() => {
        if (oscillator) oscillator.stop();
        if (audioCtx) audioCtx.close();
      }, 500);
    }
    isPlayingAudio = false;
    const btn = document.getElementById('ast-toggle-audio');
    btn.classList.remove('playing');
    document.getElementById('ast-audio-label').innerText = `Слушать Частоту (${currentRoom.freqHz} Гц)`;
  }

  document.addEventListener('DOMContentLoaded', () => {
    initCluster();
    switchRoom(ROOMS[0]);

    // Audio toggle
    document.getElementById('ast-toggle-audio').addEventListener('click', () => {
      if (!isPlayingAudio) {
        startTone(currentRoom.freqHz);
      } else {
        stopTone();
      }
    });

    // Form submission
    const form = document.getElementById('ast-reflection-form');
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const input = document.getElementById('ast-reflection-text');
      const val = input.value.trim();
      if (!val) return;

      const newPost = {
        author: 'Резонирующая Душа',
        time: 'Только что',
        text: val
      };

      const localKey = `ast_room_reflections_${currentRoom.id}`;
      let stored = [];
      try {
        const existing = localStorage.getItem(localKey);
        if (existing) stored = JSON.parse(existing);
      } catch(e) {}

      stored.unshift(newPost);
      try {
        localStorage.setItem(localKey, JSON.stringify(stored));
      } catch(e) {}

      input.value = '';
      renderReflections();
    });
  });

})();
</script>

<?php get_footer(); ?>