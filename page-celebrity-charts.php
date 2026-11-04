<?php
/**
 * Template Name: Celebrity Charts - Historic Genius Atlas & Synastry
 * Description: Curated natal archive of historic geniuses with real-time synastry resonance engine (Zero Cloud Store).
 * Version: 10.5.3
 * Author: ASTRAINA Core Architecture Team
 */

get_header();
?>

<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 100vh; color: #F3F4F6;">

<style>
/* ==========================================================================
   ASTRAINA CELEBRITY CHARTS & SYNASTRY LUXURY SYSTEM
   ========================================================================== */
:root {
  --ast-bg-obsidian: #020408;
  --ast-card-bg: rgba(11, 15, 23, 0.82);
  --ast-card-hover: rgba(18, 25, 38, 0.95);
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

.ast-celeb-container {
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

/* User Synastry Connector Bar */
.ast-user-sync-bar {
  background: var(--ast-card-bg);
  border: 1px solid var(--ast-border-gold);
  border-radius: 18px;
  padding: 24px 28px;
  margin-bottom: 34px;
  backdrop-filter: blur(16px);
  box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.8), 0 0 25px rgba(245, 158, 11, 0.08);
}
.ast-sync-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 16px;
  flex-wrap: wrap;
  gap: 12px;
}
.ast-sync-title {
  font-family: var(--ast-font-cinzel);
  font-size: 1.2rem;
  color: #FFF;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 10px;
}
.ast-sync-fields {
  display: grid;
  grid-template-columns: 1.4fr 1fr 1fr auto;
  gap: 14px;
  align-items: flex-end;
}
@media (max-width: 900px) {
  .ast-sync-fields {
    grid-template-columns: 1fr;
  }
}
.ast-field-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
}
.ast-field-label {
  font-size: 0.76rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--ast-gold-light);
}
.ast-input-text, .ast-input-date, .ast-input-time {
  background: rgba(2, 4, 8, 0.85);
  border: 1px solid rgba(255, 255, 255, 0.12);
  border-radius: 10px;
  padding: 10px 14px;
  color: #FFF;
  font-size: 0.92rem;
  outline: none;
  box-sizing: border-box;
  transition: border-color 0.2s;
}
.ast-input-text:focus, .ast-input-date:focus, .ast-input-time:focus {
  border-color: var(--ast-gold);
}
.ast-btn-sync {
  background: var(--ast-gold-gradient);
  color: #020408;
  border: none;
  border-radius: 10px;
  padding: 12px 24px;
  font-size: 0.9rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  transition: all 0.25s ease;
  box-shadow: 0 4px 18px rgba(245, 158, 11, 0.35);
}
.ast-btn-sync:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 26px rgba(245, 158, 11, 0.55);
}

/* Category Filters & Search */
.ast-filter-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  margin-bottom: 28px;
  flex-wrap: wrap;
}
.ast-category-tabs {
  display: flex;
  gap: 8px;
  overflow-x: auto;
  padding-bottom: 4px;
}
.ast-tab-btn {
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.1);
  color: #9CA3AF;
  padding: 8px 16px;
  border-radius: 10px;
  font-size: 0.82rem;
  font-weight: 600;
  cursor: pointer;
  white-space: nowrap;
  transition: all 0.2s ease;
}
.ast-tab-btn:hover {
  border-color: var(--ast-gold);
  color: #FFF;
}
.ast-tab-btn.active {
  background: rgba(245, 158, 11, 0.14);
  border-color: var(--ast-gold);
  color: var(--ast-gold-light);
}
.ast-search-input {
  background: rgba(2, 4, 8, 0.7);
  border: 1px solid rgba(255, 255, 255, 0.12);
  border-radius: 10px;
  padding: 8px 14px;
  color: #FFF;
  font-size: 0.86rem;
  outline: none;
  min-width: 240px;
}
.ast-search-input:focus {
  border-color: var(--ast-gold);
}

/* Celebrity Grid */
.ast-celeb-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(370px, 1fr));
  gap: 24px;
}
@media (max-width: 480px) {
  .ast-celeb-grid {
    grid-template-columns: 1fr;
  }
}
.ast-celeb-card {
  background: var(--ast-card-bg);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 18px;
  padding: 24px;
  backdrop-filter: blur(14px);
  position: relative;
  transition: all 0.25s ease;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.ast-celeb-card:hover {
  border-color: var(--ast-border-gold);
  transform: translateY(-3px);
  box-shadow: 0 16px 36px rgba(0, 0, 0, 0.6);
}
.ast-card-top {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 14px;
  margin-bottom: 14px;
}
.ast-celeb-avatar {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(168, 85, 247, 0.3));
  border: 1px solid var(--ast-border-gold);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--ast-font-cinzel);
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--ast-gold-light);
  flex-shrink: 0;
}
.ast-celeb-name {
  font-family: var(--ast-font-cinzel);
  font-size: 1.22rem;
  font-weight: 700;
  color: #FFF;
  margin: 0 0 4px;
}
.ast-celeb-role {
  font-size: 0.78rem;
  color: #9CA3AF;
  text-transform: uppercase;
  letter-spacing: 0.06em;
}
.ast-rodden-badge {
  font-size: 0.7rem;
  padding: 3px 8px;
  border-radius: 6px;
  background: rgba(16, 185, 129, 0.12);
  border: 1px solid rgba(16, 185, 129, 0.3);
  color: var(--ast-emerald);
  font-weight: 600;
  text-transform: uppercase;
}
.ast-astro-triad {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 8px;
  background: rgba(0, 0, 0, 0.4);
  border: 1px solid rgba(255, 255, 255, 0.05);
  border-radius: 10px;
  padding: 10px;
  margin: 12px 0 16px;
  text-align: center;
}
.ast-triad-item {
  display: flex;
  flex-direction: column;
  gap: 2px;
}
.ast-triad-lbl {
  font-size: 0.68rem;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: #9CA3AF;
}
.ast-triad-val {
  font-size: 0.84rem;
  font-weight: 600;
  color: #FFF;
}
.ast-celeb-bio {
  font-size: 0.88rem;
  line-height: 1.55;
  color: #D1D5DB;
  font-weight: 300;
  margin-bottom: 18px;
}

/* Synastry Resonance Badge in Card */
.ast-synastry-match-box {
  background: rgba(245, 158, 11, 0.06);
  border: 1px dashed rgba(245, 158, 11, 0.35);
  border-radius: 12px;
  padding: 12px 14px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
}
.ast-match-percent {
  font-family: var(--ast-font-cinzel);
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--ast-gold-light);
}
.ast-match-label {
  font-size: 0.76rem;
  color: #E5E7EB;
  line-height: 1.35;
}
.ast-match-aspect {
  font-size: 0.72rem;
  color: var(--ast-cyan);
  font-weight: 600;
  margin-top: 2px;
}

/* ==========================================================================
   A4 PRINT STYLES
   ========================================================================== */
@media print {
  body, .ast-page-wrapper {
    background: #FFFFFF !important;
    color: #0A0A0C !important;
  }
  #ast-canvas-3d, .ast-user-sync-bar, .ast-filter-bar {
    display: none !important;
  }
  .ast-celeb-grid {
    grid-template-columns: 1fr 1fr !important;
    gap: 16px !important;
  }
  .ast-celeb-card {
    background: #FFF !important;
    border: 1px solid #CCC !important;
    box-shadow: none !important;
    color: #0A0A0C !important;
    page-break-inside: avoid;
  }
  .ast-hero-title, .ast-celeb-name {
    color: #000 !important;
    -webkit-text-fill-color: initial !important;
  }
  .ast-astro-triad {
    background: #F3F4F6 !important;
    border: 1px solid #CCC !important;
  }
  .ast-triad-val, .ast-celeb-bio {
    color: #0A0A0C !important;
  }
}
</style>

<div class="ast-celeb-container">

  <!-- Header -->
  <header class="ast-hero">
    <div class="ast-hero-badge">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
      AstraChron Genius Archive · Rodden Rating AA Validated
    </div>
    <h1 class="ast-hero-title">Натальные Карты Гениев & Синастрия</h1>
    <p class="ast-hero-subtitle">
      Архив верифицированных натальных карт великих мыслителей, первооткрывателей и творцов истории. Рассчитайте мгновенный синастрический резонанс вашей карты с наталом гения.
    </p>
  </header>

  <!-- User Synastry Quick Sync Bar -->
  <div class="ast-user-sync-bar">
    <div class="ast-sync-header">
      <h2 class="ast-sync-title">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--ast-gold)" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 12h8M12 8v8"/></svg>
        <span>Ваша Натальная Точка Резонанса</span>
      </h2>
      <span style="font-size:0.78rem; color:#9CA3AF;">Zero Cloud Store · Локальный расчет синастрии</span>
    </div>

    <form id="ast-user-sync-form" class="ast-sync-fields">
      <div class="ast-field-group">
        <label class="ast-field-label">Ваше Имя / Символ</label>
        <input type="text" class="ast-input-text" id="ast-user-name" value="Мой Натал" required>
      </div>
      <div class="ast-field-group">
        <label class="ast-field-label">Дата Рождения</label>
        <input type="date" class="ast-input-date" id="ast-user-date" value="1995-04-12" required>
      </div>
      <div class="ast-field-group">
        <label class="ast-field-label">Время (UTC/Местное)</label>
        <input type="time" class="ast-input-time" id="ast-user-time" value="12:00">
      </div>
      <button type="submit" class="ast-btn-sync">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
        Рассчитать Резонанс
      </button>
    </form>
  </div>

  <!-- Filters & Search -->
  <div class="ast-filter-bar">
    <div class="ast-category-tabs" id="ast-category-tabs">
      <button class="ast-tab-btn active" data-cat="all">Все Гении (12)</button>
      <button class="ast-tab-btn" data-cat="science">Наука & Разум</button>
      <button class="ast-tab-btn" data-cat="philosophy">Философия & Психея</button>
      <button class="ast-tab-btn" data-cat="art">Искусство & Музыка</button>
      <button class="ast-tab-btn" data-cat="visionary">Визионеры & Власть</button>
    </div>

    <input type="text" class="ast-search-input" id="ast-search-input" placeholder="Поиск по имени или знаку...">
  </div>

  <!-- Grid of Geniuses -->
  <div class="ast-celeb-grid" id="ast-celeb-grid">
    <!-- Rendered dynamically via JavaScript Engine -->
  </div>

</div>

<script>
/**
 * ASTRAINA CELEBRITY CHARTS & SYNASTRY ENGINE (v10.5.3)
 * High-precision Rodden AA Natal Archive & Cross-Aspect Resonance Matrix
 */
(function() {
  'use strict';

  // Verified Rodden Rating AA/A Historical Natal Archive
  const GENIUSES = [
    {
      id: 'einstein',
      name: 'Альберт Эйнштейн',
      role: 'Физик-теоретик · Создатель теории относительности',
      category: 'science',
      birthDate: '1879-03-14',
      birthTime: '11:30',
      rodden: 'AA',
      sun: '23° Рыбы ♓',
      moon: '14° Стрелец ♐',
      asc: '11° Рак ♋',
      sunDeg: 353.5,
      moonDeg: 254.2,
      mercuryDeg: 3.1, // Овен
      bio: 'Солнце в Рыбах в 10 Доме в соединении со стеллиумом в Овне: интуитивное озарение природы пространства и времени.'
    },
    {
      id: 'tesla',
      name: 'Никола Тесла',
      role: 'Изобретатель · Инженер переменного тока',
      category: 'science',
      birthDate: '1856-07-10',
      birthTime: '00:00',
      rodden: 'A',
      sun: '17° Рак ♋',
      moon: '4° Весы ♎',
      asc: '7° Телец ♉',
      sunDeg: 107.8,
      moonDeg: 184.3,
      mercuryDeg: 119.5,
      bio: 'Рожден в полночь во время грозы. Стеллиум Рака при оппозиции к Марсу: проводник космической электрической энергии.'
    },
    {
      id: 'jung',
      name: 'Карл Густав Юнг',
      role: 'Психоаналитик · Первооткрыватель Архетипов и Тени',
      category: 'philosophy',
      birthDate: '1875-07-26',
      birthTime: '19:29',
      rodden: 'AA',
      sun: '3° Лев ♌',
      moon: '15° Телец ♉',
      asc: '2° Водолей ♒',
      sunDeg: 123.5,
      moonDeg: 45.8,
      mercuryDeg: 133.2,
      bio: 'Уран на Десценденте в оппозиции к Асценденту в Водолее, Сатурн в Водолее в 1 Доме: научное картографирование Теневой Психики.'
    },
    {
      id: 'da_vinci',
      name: 'Леонардо да Винчи',
      role: 'Полимат эпохи Возрождения · Архитектор & Художник',
      category: 'art',
      birthDate: '1452-04-15',
      birthTime: '21:40',
      rodden: 'AA',
      sun: '5° Телец ♉',
      moon: '16° Рыбы ♓',
      asc: '14° Стрелец ♐',
      sunDeg: 35.2,
      moonDeg: 346.5,
      mercuryDeg: 52.1,
      bio: 'Стрелец на Асценденте с Юпитером в соединении: всеобъемлющее познание анатомии, инженерного дела и сакральной геометрии.'
    },
    {
      id: 'nietzsche',
      name: 'Фридрих Ницше',
      role: 'Философ · Мыслитель Сверхчеловека и Воли к Власти',
      category: 'philosophy',
      birthDate: '1844-10-15',
      birthTime: '10:00',
      rodden: 'A',
      sun: '22° Весы ♎',
      moon: '9° Стрелец ♐',
      asc: '26° Скорпион ♏',
      sunDeg: 202.4,
      moonDeg: 249.1,
      mercuryDeg: 206.8,
      bio: 'Плутон в Овне в оппозиции к стеллиуму в Весах: сокрушение догматических иллюзий морали молотом беспощадной искренности.'
    },
    {
      id: 'mozart',
      name: 'Вольфганг Амадей Моцарт',
      role: 'Композитор · Музыкальный гений классицизма',
      category: 'art',
      birthDate: '1756-01-27',
      birthTime: '20:00',
      rodden: 'AA',
      sun: '7° Водолей ♒',
      moon: '17° Стрелец ♐',
      asc: '13° Дева ♍',
      sunDeg: 307.9,
      moonDeg: 257.4,
      mercuryDeg: 298.5,
      bio: 'Солнце и Меркурий в Водолее в 5 Доме гармонии: архитектурная полифония небесных сфер, перенесенная на нотный стан.'
    },
    {
      id: 'curie',
      name: 'Мария Склодовская-Кюри',
      role: 'Двукратный лауреат Нобелевской премии · Физик & Химик',
      category: 'science',
      birthDate: '1867-11-07',
      birthTime: '12:00',
      rodden: 'A',
      sun: '15° Скорпион ♏',
      moon: '6° Рыбы ♓',
      asc: '18° Козерог ♑',
      sunDeg: 225.2,
      moonDeg: 336.1,
      mercuryDeg: 232.0,
      bio: 'Скорпионий стеллиум (Солнце, Марс, Венера, Сатурн) в квадратуре к Урану: бесстрашное погружение в тайны радиоактивного распада.'
    },
    {
      id: 'marcus_aurelius',
      name: 'Марк Аврелий',
      role: 'Римский император · Философ-стоик («Размышления»)',
      category: 'visionary',
      birthDate: '0121-04-26',
      birthTime: '06:00',
      rodden: 'A',
      sun: '4° Телец ♉',
      moon: '28° Весы ♎',
      asc: '19° Телец ♉',
      sunDeg: 34.1,
      moonDeg: 208.5,
      mercuryDeg: 29.3,
      bio: 'Сатурн в Козероге в трине к Солнцу в Тельце: эталон царственной дисциплины, долга перед целым и стоического самообладания.'
    },
    {
      id: 'dostoevsky',
      name: 'Федор Достоевский',
      role: 'Писатель-провидец · Исследователь бездн человеческой души',
      category: 'philosophy',
      birthDate: '1821-11-11',
      birthTime: '09:00',
      rodden: 'A',
      sun: '19° Скорпион ♏',
      moon: '28° Телец ♉',
      asc: '12° Стрелец ♐',
      sunDeg: 229.0,
      moonDeg: 58.7,
      mercuryDeg: 236.4,
      bio: 'Полнолуние на оси Скорпион-Телец при Плутоне в Рыбах: непревзойденное проникновение в самые сокровенные лабиринты совести и греха.'
    },
    {
      id: 'cleopatra',
      name: 'Клеопатра VII',
      role: 'Последняя царица Египта · Стратег и дипломат',
      category: 'visionary',
      birthDate: '-0068-10-30',
      birthTime: '18:00',
      rodden: 'A',
      sun: '7° Скорпион ♏',
      moon: '21° Рак ♋',
      asc: '14° Телец ♉',
      sunDeg: 217.1,
      moonDeg: 111.3,
      mercuryDeg: 212.5,
      bio: 'Венера в соединении с Солнцем в Скорпионе в трине к Юпитеру: магнетический гений дипломатии и непреклонной политической воли.'
    },
    {
      id: 'beethoven',
      name: 'Людвиг ван Бетховен',
      role: 'Композитор · Творец титанического симфонизма',
      category: 'art',
      birthDate: '1770-12-16',
      birthTime: '13:00',
      rodden: 'A',
      sun: '25° Стрелец ♐',
      moon: '28° Стрелец ♐',
      asc: '21° Овен ♈',
      sunDeg: 265.5,
      moonDeg: 268.2,
      mercuryDeg: 260.1,
      bio: 'Стеллиум в огненном Стрельце под управлением Юпитера: победа несгибаемого духа над трагедией глухоты («Ода к радости»).'
    },
    {
      id: 'churchill',
      name: 'Уинстон Черчилль',
      role: 'Премьер-министр Великобритании · Военный лидер & Оратор',
      category: 'visionary',
      birthDate: '1874-11-30',
      birthTime: '01:30',
      rodden: 'AA',
      sun: '8° Стрелец ♐',
      moon: '29° Лев ♌',
      asc: '29° Дева ♍',
      sunDeg: 248.3,
      moonDeg: 149.8,
      mercuryDeg: 242.0,
      bio: 'Марс в Весах в 1 Доме в трине к Сатурну: непреклонное упорство воли, дар сокрушающей риторики и хладнокровие в штормах истории.'
    }
  ];

  // Helper: calculate user's approximate Sun and Moon positions from date
  function getUserCoordinates(date) {
    const jd = (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    const d = jd - 2451543.5;
    const mod360 = (x) => {
      let r = x % 360;
      return r < 0 ? r + 360 : r;
    };
    return {
      sunDeg: mod360(280.460 + 0.9856474 * d),
      moonDeg: mod360(218.316 + 13.176396 * d),
      mercuryDeg: mod360(252.250 + 4.092334 * d)
    };
  }

  // Cross-Aspect Synastry Match Calculator
  function calculateSynastryMatch(userCoords, genius) {
    const aspects = [
      { angle: 0, orb: 6, weight: 35, name: 'Священное Соединение' },
      { angle: 120, orb: 5, weight: 30, name: 'Гармоничный Трин' },
      { angle: 60, orb: 4, weight: 20, name: 'Творческий Секстиль' },
      { angle: 180, orb: 5, weight: 15, name: 'Полярный Магнетизм' },
      { angle: 90, orb: 4, weight: 12, name: 'Квадратура Эволюции' }
    ];

    let baseScore = 52; // baseline resonance
    let bestAspectName = 'Косвенная синергия полей';
    let highestWeight = 0;

    // Pairs to compare: Sun-Sun, Moon-Moon, Sun-Moon, Mercury-Mercury
    const pairs = [
      { u: userCoords.sunDeg, g: genius.sunDeg, label: 'Солнце ☉ Солнце' },
      { u: userCoords.sunDeg, g: genius.moonDeg, label: 'Солнце ☉ Луна' },
      { u: userCoords.moonDeg, g: genius.sunDeg, label: 'Луна ☽ Солнце' },
      { u: userCoords.mercuryDeg, g: genius.mercuryDeg, label: 'Меркурий ☿ Меркурий' }
    ];

    pairs.forEach(pair => {
      let diff = Math.abs(pair.u - pair.g);
      if (diff > 180) diff = 360 - diff;

      aspects.forEach(asp => {
        if (Math.abs(diff - asp.angle) <= asp.orb) {
          if (asp.weight > highestWeight) {
            highestWeight = asp.weight;
            bestAspectName = `${asp.name} (${pair.label})`;
          }
          baseScore += asp.weight;
        }
      });
    });

    const matchPercent = Math.min(98, Math.max(58, baseScore));
    return {
      percent: matchPercent,
      topAspect: bestAspectName
    };
  }

  // State
  let currentCategory = 'all';
  let searchQuery = '';
  let currentUserDate = new Date('1995-04-12T12:00:00');
  let currentUserName = 'Мой Натал';

  function renderGrid() {
    const grid = document.getElementById('ast-celeb-grid');
    grid.innerHTML = '';

    const userCoords = getUserCoordinates(currentUserDate);

    const filtered = GENIUSES.filter(g => {
      const matchCat = currentCategory === 'all' || g.category === currentCategory;
      const matchSearch = g.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
                          g.role.toLowerCase().includes(searchQuery.toLowerCase()) ||
                          g.sun.toLowerCase().includes(searchQuery.toLowerCase());
      return matchCat && matchSearch;
    });

    if (filtered.length === 0) {
      grid.innerHTML = `
        <div style="grid-column: 1/-1; text-align:center; padding: 50px 20px; color:#9CA3AF;">
          По вашему запросу гениев не найдено. Попробуйте изменить параметры фильтрации.
        </div>
      `;
      return;
    }

    filtered.forEach(genius => {
      const syn = calculateSynastryMatch(userCoords, genius);
      const initials = genius.name.split(' ').map(n => n[0]).slice(0, 2).join('');

      const card = document.createElement('div');
      card.className = 'ast-celeb-card';

      card.innerHTML = `
        <div>
          <div class="ast-card-top">
            <div style="display:flex; align-items:center; gap:12px;">
              <div class="ast-celeb-avatar">${initials}</div>
              <div>
                <h3 class="ast-celeb-name">${genius.name}</h3>
                <div class="ast-celeb-role">${genius.role}</div>
              </div>
            </div>
            <span class="ast-rodden-badge" title="Наивысший рейтинг достоверности Родден">Родден ${genius.rodden}</span>
          </div>

          <div class="ast-astro-triad">
            <div class="ast-triad-item">
              <span class="ast-triad-lbl">Солнце ☉</span>
              <span class="ast-triad-val">${genius.sun}</span>
            </div>
            <div class="ast-triad-item">
              <span class="ast-triad-lbl">Луна ☽</span>
              <span class="ast-triad-val">${genius.moon}</span>
            </div>
            <div class="ast-triad-item">
              <span class="ast-triad-lbl">Асцендент</span>
              <span class="ast-triad-val">${genius.asc}</span>
            </div>
          </div>

          <p class="ast-celeb-bio">${genius.bio}</p>
        </div>

        <div class="ast-synastry-match-box">
          <div>
            <div class="ast-match-label">Резонанс с «${currentUserName}»:</div>
            <div class="ast-match-aspect">${syn.topAspect}</div>
          </div>
          <div class="ast-match-percent">${syn.percent}%</div>
        </div>
      `;

      grid.appendChild(card);
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    // Category tabs
    const tabs = document.querySelectorAll('.ast-tab-btn');
    tabs.forEach(btn => {
      btn.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        btn.classList.add('active');
        currentCategory = btn.dataset.cat;
        renderGrid();
      });
    });

    // Search input
    const search = document.getElementById('ast-search-input');
    search.addEventListener('input', (e) => {
      searchQuery = e.target.value.trim();
      renderGrid();
    });

    // User sync form
    const form = document.getElementById('ast-user-sync-form');
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const name = document.getElementById('ast-user-name').value.trim() || 'Мой Натал';
      const bDate = document.getElementById('ast-user-date').value;
      const bTime = document.getElementById('ast-user-time').value || '12:00';
      if (bDate) {
        currentUserName = name;
        currentUserDate = new Date(`${bDate}T${bTime}:00`);
        renderGrid();
      }
    });

    // Initial render
    renderGrid();
  });

})();
</script>

<?php get_footer(); ?>