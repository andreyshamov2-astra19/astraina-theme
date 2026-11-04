<?php
/**
 * Template Name: Astro Shadow - Depth Psychology & Lilith Atlas
 * Description: Archetypal Shadow Self analysis engine, Black Moon Lilith, Pluto dynamics & unconscious triggers.
 * Version: 10.5.1
 * Author: ASTRAINA Core Architecture Team
 */

get_header();
?>

<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 100vh; color: #F3F4F6;">

<style>
/* ==========================================================================
   ASTRAINA SHADOW LUXURY DESIGN SYSTEM (Obsidian & Deep Amethyst)
   ========================================================================== */
:root {
  --ast-bg-obsidian: #020408;
  --ast-card-bg: rgba(10, 12, 20, 0.82);
  --ast-card-hover: rgba(17, 21, 34, 0.92);
  --ast-border-gold: rgba(245, 158, 11, 0.28);
  --ast-border-shadow: rgba(139, 92, 246, 0.32);
  --ast-gold: #F59E0B;
  --ast-gold-light: #FBBF24;
  --ast-gold-gradient: linear-gradient(135deg, #F59E0B 0%, #D97706 50%, #92400E 100%);
  --ast-violet: #8B5CF6;
  --ast-violet-deep: #4C1D95;
  --ast-crimson: #E11D48;
  --ast-cyan: #38BDF8;
  --ast-font-cinzel: 'Cinzel', serif;
  --ast-font-sans: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

.ast-shadow-container {
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
  background: rgba(139, 92, 246, 0.12);
  border: 1px solid var(--ast-border-shadow);
  border-radius: 9999px;
  font-size: 0.8rem;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: #C4B5FD;
  margin-bottom: 16px;
  backdrop-filter: blur(8px);
}
.ast-hero-title {
  font-family: var(--ast-font-cinzel);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  font-weight: 700;
  line-height: 1.15;
  background: linear-gradient(180deg, #FFFFFF 0%, #C4B5FD 45%, #F59E0B 90%);
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

/* Control & Birth Input Card */
.ast-input-card {
  background: var(--ast-card-bg);
  border: 1px solid var(--ast-border-shadow);
  border-radius: 20px;
  padding: 28px 32px;
  margin-bottom: 36px;
  backdrop-filter: blur(16px);
  box-shadow: 0 20px 50px -15px rgba(0, 0, 0, 0.8), 0 0 30px rgba(139, 92, 246, 0.08);
}
.ast-form-row {
  display: grid;
  grid-template-columns: 1.5fr 1fr 1fr auto;
  gap: 16px;
  align-items: flex-end;
}
@media (max-width: 900px) {
  .ast-form-row {
    grid-template-columns: 1fr;
  }
}
.ast-form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}
.ast-form-label {
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: #C4B5FD;
}
.ast-form-input {
  background: rgba(2, 4, 8, 0.85);
  border: 1px solid rgba(255, 255, 255, 0.12);
  border-radius: 10px;
  padding: 12px 14px;
  color: #FFF;
  font-size: 0.95rem;
  outline: none;
  box-sizing: border-box;
  transition: all 0.2s ease;
}
.ast-form-input:focus {
  border-color: var(--ast-violet);
  box-shadow: 0 0 12px rgba(139, 92, 246, 0.3);
}
.ast-btn-calc {
  background: linear-gradient(135deg, #8B5CF6 0%, #6D28D9 50%, #4C1D95 100%);
  color: #FFF;
  border: none;
  border-radius: 10px;
  padding: 12px 26px;
  font-size: 0.92rem;
  font-weight: 600;
  letter-spacing: 0.05em;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  transition: all 0.25s ease;
  box-shadow: 0 4px 20px rgba(109, 40, 217, 0.4);
}
.ast-btn-calc:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 28px rgba(139, 92, 246, 0.6);
}

/* Shadow Overview Grid */
.ast-shadow-dashboard {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  margin-bottom: 36px;
}
@media (max-width: 960px) {
  .ast-shadow-dashboard {
    grid-template-columns: 1fr;
  }
}
.ast-kpi-card {
  background: var(--ast-card-bg);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 18px;
  padding: 24px;
  backdrop-filter: blur(14px);
  position: relative;
  overflow: hidden;
  transition: all 0.25s ease;
}
.ast-kpi-card:hover {
  border-color: var(--ast-border-shadow);
  transform: translateY(-2px);
}
.ast-kpi-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background: linear-gradient(90deg, transparent, var(--ast-violet), transparent);
}
.ast-kpi-card.lilith::before {
  background: linear-gradient(90deg, transparent, var(--ast-crimson), transparent);
}
.ast-kpi-card.pluto::before {
  background: linear-gradient(90deg, transparent, var(--ast-gold), transparent);
}
.ast-kpi-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 12px;
}
.ast-kpi-title {
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: #9CA3AF;
}
.ast-kpi-glyph {
  font-size: 1.5rem;
  line-height: 1;
}
.ast-kpi-val {
  font-family: var(--ast-font-cinzel);
  font-size: 1.55rem;
  font-weight: 700;
  color: #FFF;
  margin-bottom: 6px;
}
.ast-kpi-sub {
  font-size: 0.84rem;
  color: #A78BFA;
}

/* Deep Shadow Analysis Pillars */
.ast-pillar-card {
  background: var(--ast-card-bg);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 20px;
  padding: 32px;
  margin-bottom: 24px;
  backdrop-filter: blur(16px);
  position: relative;
  transition: all 0.25s ease;
}
.ast-pillar-card:hover {
  border-color: var(--ast-border-gold);
}
.ast-pillar-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  margin-bottom: 20px;
  flex-wrap: wrap;
}
.ast-pillar-heading {
  font-family: var(--ast-font-cinzel);
  font-size: 1.4rem;
  font-weight: 700;
  color: #FFF;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 12px;
}
.ast-tag-badge {
  padding: 6px 14px;
  border-radius: 9999px;
  font-size: 0.74rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
}
.ast-tag-lilith {
  background: rgba(225, 29, 72, 0.12);
  color: #FDA4AF;
  border: 1px solid rgba(225, 29, 72, 0.3);
}
.ast-tag-pluto {
  background: rgba(139, 92, 246, 0.12);
  color: #DDD6FE;
  border: 1px solid rgba(139, 92, 246, 0.3);
}
.ast-tag-retro {
  background: rgba(245, 158, 11, 0.12);
  color: #FDE68A;
  border: 1px solid rgba(245, 158, 11, 0.3);
}

/* 4-Layer Shadow Decomposition Matrix */
.ast-shadow-matrix {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 18px;
  margin-top: 20px;
}
@media (max-width: 768px) {
  .ast-shadow-matrix {
    grid-template-columns: 1fr;
  }
}
.ast-matrix-cell {
  background: rgba(2, 4, 8, 0.55);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 14px;
  padding: 18px 20px;
  transition: all 0.2s ease;
}
.ast-matrix-cell:hover {
  border-color: rgba(139, 92, 246, 0.25);
  background: rgba(139, 92, 246, 0.03);
}
.ast-cell-title {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  font-weight: 600;
  margin-bottom: 10px;
}
.ast-cell-title.trigger { color: var(--ast-crimson); }
.ast-cell-title.trap { color: #FB923C; }
.ast-cell-title.gold { color: var(--ast-gold); }
.ast-cell-title.protocol { color: var(--ast-cyan); }
.ast-cell-desc {
  font-size: 0.92rem;
  line-height: 1.6;
  color: #D1D5DB;
  font-weight: 300;
}

/* Integration Protocol Box */
.ast-protocol-banner {
  background: linear-gradient(135deg, rgba(76, 29, 149, 0.2) 0%, rgba(2, 4, 8, 0.9) 100%);
  border: 1px solid var(--ast-border-shadow);
  border-radius: 18px;
  padding: 24px 28px;
  margin-top: 24px;
  display: flex;
  align-items: flex-start;
  gap: 16px;
}
.ast-protocol-banner svg {
  color: var(--ast-violet);
  flex-shrink: 0;
  margin-top: 3px;
}
.ast-protocol-text {
  font-size: 0.92rem;
  line-height: 1.6;
  color: #E5E7EB;
}

/* ==========================================================================
   A4 PRINT STYLES (Strict Safe-Guard)
   ========================================================================== */
@media print {
  body, .ast-page-wrapper {
    background: #FFFFFF !important;
    color: #0A0A0C !important;
  }
  #ast-canvas-3d, .ast-input-card, .ast-btn-calc {
    display: none !important;
  }
  .ast-kpi-card, .ast-pillar-card, .ast-matrix-cell {
    background: #FFFFFF !important;
    border: 1px solid #CCC !important;
    box-shadow: none !important;
    color: #0A0A0C !important;
    page-break-inside: avoid;
  }
  .ast-hero-title {
    color: #000000 !important;
    -webkit-text-fill-color: initial !important;
  }
  .ast-kpi-val, .ast-pillar-heading {
    color: #0A0A0C !important;
  }
  .ast-cell-desc {
    color: #374151 !important;
  }
}
</style>

<div class="ast-shadow-container">

  <!-- Header -->
  <header class="ast-hero">
    <div class="ast-hero-badge">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 0 0 20v-20z"/></svg>
      AstraChron Engine · Jungian Shadow & Lilith Atlas
    </div>
    <h1 class="ast-hero-title">Теневой Профиль & Точки Уязвимости</h1>
    <p class="ast-hero-subtitle">
      Юнгианский атлас глубинного бессознательного: расчет положения Черной Луны (Лилит), Плутона и ретроградных узлов натива. Трансформация подавленных триггеров в личный суверенитет и силу.
    </p>
  </header>

  <!-- Input Form (Zero Cloud Store) -->
  <div class="ast-input-card">
    <form id="ast-shadow-form">
      <div class="ast-form-row">
        <div class="ast-form-group">
          <label class="ast-form-label">Имя или Сакральный Знак Натива</label>
          <input type="text" class="ast-form-input" id="ast-native-name" value="Человек / Душа" required>
        </div>
        <div class="ast-form-group">
          <label class="ast-form-label">Дата Рождения</label>
          <input type="date" class="ast-form-input" id="ast-native-date" value="1995-10-24" required>
        </div>
        <div class="ast-form-group">
          <label class="ast-form-label">Время (UTC/Местное)</label>
          <input type="time" class="ast-form-input" id="ast-native-time" value="14:30">
        </div>
        <button type="submit" class="ast-btn-calc">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          Вскрыть Тень
        </button>
      </div>
    </form>
  </div>

  <!-- KPI Overview Dashboard -->
  <div class="ast-shadow-dashboard">
    <div class="ast-kpi-card lilith">
      <div class="ast-kpi-header">
        <span class="ast-kpi-title">Черная Луна (Лилит)</span>
        <span class="ast-kpi-glyph" style="color:var(--ast-crimson);">⚸</span>
      </div>
      <div class="ast-kpi-val" id="ast-kpi-lilith">18° Скорпион</div>
      <div class="ast-kpi-sub" id="ast-kpi-lilith-sub">Апогей Лунной Орбиты · Слепая Зона</div>
    </div>

    <div class="ast-kpi-card pluto">
      <div class="ast-kpi-header">
        <span class="ast-kpi-title">Плутон (Архитектор Тени)</span>
        <span class="ast-kpi-glyph" style="color:var(--ast-gold);">♇</span>
      </div>
      <div class="ast-kpi-val" id="ast-kpi-pluto">29° Скорпион</div>
      <div class="ast-kpi-sub" id="ast-kpi-pluto-sub">Коллективное Бессознательное</div>
    </div>

    <div class="ast-kpi-card">
      <div class="ast-kpi-header">
        <span class="ast-kpi-title">Инверсивные Узлы & Ретро</span>
        <span class="ast-kpi-glyph" style="color:var(--ast-violet);">☊</span>
      </div>
      <div class="ast-kpi-val" id="ast-kpi-retro">2 Ретро-Вектора</div>
      <div class="ast-kpi-sub" id="ast-kpi-retro-sub">Внутренняя Инверсия Энергии</div>
    </div>
  </div>

  <!-- Deep Shadow Pillars -->
  <div id="ast-shadow-pillars">
    <!-- Generated dynamically via JS Engine -->
  </div>

</div>

<script>
/**
 * ASTRAINA ASTRO-SHADOW CORE ENGINE (v10.5.1)
 * Zero Cloud Store · Jungian Archetypal Decoder & Mean Apogee Orbitals
 */
(function() {
  'use strict';

  const ZODIAC = [
    { name: 'Овен', symbol: '♈', en: 'Aries' },
    { name: 'Телец', symbol: '♉', en: 'Taurus' },
    { name: 'Близнецы', symbol: '♊', en: 'Gemini' },
    { name: 'Рак', symbol: '♋', en: 'Cancer' },
    { name: 'Лев', symbol: '♌', en: 'Leo' },
    { name: 'Дева', symbol: '♍', en: 'Virgo' },
    { name: 'Весы', symbol: '♎', en: 'Libra' },
    { name: 'Скорпион', symbol: '♏', en: 'Scorpio' },
    { name: 'Стрелец', symbol: '♐', en: 'Sagittarius' },
    { name: 'Козерог', symbol: '♑', en: 'Capricorn' },
    { name: 'Водолей', symbol: '♒', en: 'Aquarius' },
    { name: 'Рыбы', symbol: '♓', en: 'Pisces' }
  ];

  // Deep Shadow Knowledge Base for 12 Zodiac Lilith Placements
  const LILITH_ARCHETYPES = [
    {
      sign: 'Овен',
      archetype: 'Тень Бунтаря & Подавленная Ярость',
      trigger: 'Ощущение бессилия, подчинение чужой воле, запрет на открытую агрессию и лидерство.',
      trap: 'Вспышки неконтролируемого гнева, импульсивный самосаботаж или пассивная виктимность.',
      gold: 'Священный огонь первопроходца, абсолютное бесстрашие в кризисах и несокрушимый суверенитет.',
      protocol: 'Осознанно направлять импульсивную энергию в автономные проекты и интенсивный спорт без конкуренции.'
    },
    {
      sign: 'Телец',
      archetype: 'Тень Алчности & Страх Тотальной Нищеты',
      trigger: 'Угроза материальной стабильности, страх остаться без ресурсов или потерять физический комфорт.',
      trap: 'Патологическое накопительство, жадность, зависимость от телесных удовольствий или аскетическое самобичевание.',
      gold: 'Способность материализовать устойчивое изобилие из хаоса, глубокая витальность и заземление.',
      protocol: 'Разделять внутреннюю ценность личности и внешние активы; практиковать сознательное отпускание избыточного контроля.'
    },
    {
      sign: 'Близнецы',
      archetype: 'Тень Интеллектуального Обмана & Хаоса',
      trigger: 'Страх показаться некомпетентным, информационная изоляция или страх чужой манипуляции.',
      trap: 'Цинизм, расщепление внимания, язвительный сарказм, склонность ко лжи или страх глубины.',
      gold: 'Гениальная ясность синтеза сложнейших смыслов, способность раскрывать любые ментальные ловушки.',
      protocol: 'Фильтровать информационный поток; взращивать глубину концентрации вместо поверхностной полифонии.'
    },
    {
      sign: 'Рак',
      archetype: 'Тень Родовой Травмы & Эмоционального Шантажа',
      trigger: 'Угроза отвержения близкими, холодность в отношениях, страх эмоциональной уязвимости.',
      trap: 'Манипуляция чувством вины, инфантильная обидчивость, удушающая гиперопека или страх взросления.',
      gold: 'Мистическая эмпатия, непоколебимая родовая сила и способность быть целительным оазисом для других.',
      protocol: 'Сепарация от детских паттернов; установление суверенных эмоциональных границ без чувства вины.'
    },
    {
      sign: 'Лев',
      archetype: 'Тень Гордыни & Жажда Безусловного Преклонения',
      trigger: 'Игнорирование, обесценивание уникальности, нахождение в тени чужого успеха.',
      trap: 'Театральный нарциссизм, надменность, эгоцентризм либо парализующий страх проявиться на публике.',
      gold: 'Истинное королевское великодушие, способность щедро озарять других и подлинная харизма творца.',
      protocol: 'Творить ради самого сакрального акта творения, а не ради оваций и внешней валидации.'
    },
    {
      sign: 'Дева',
      archetype: 'Тень Перфекционизма & Ипохондрии',
      trigger: 'Беспорядок, хаос, физическая слабость, отсутствие точного контроля над деталями процесса.',
      trap: 'Изнуряющая внутренняя критика, педантизм, застревание в микроскопических ошибках, фобии болезней.',
      gold: 'Алхимическая точность разума, способность гармонизировать и исцелять сложнейшие нарушенные системы.',
      protocol: 'Принять священное несовершенство мира; заменить самобичевание на сострадательное мастерство.'
    },
    {
      sign: 'Весы',
      archetype: 'Тень Предательства & Конформизма',
      trigger: 'Одиночество, прямые открытые конфликты, необходимость жесткого выбора стороны.',
      trap: 'Потеря себя в партнере, лицемерие ради сохранения иллюзии мира, панический страх отвержения.',
      gold: 'Эталонное правосудие, способность соединять непримиримые полярности и создавать сакральную гармонию.',
      protocol: 'Быть честным в партнерстве; помнить, что открытая правда ценнее компромиссного мира.'
    },
    {
      sign: 'Скорпион',
      archetype: 'Тень Власти, Ревности & Танатоса',
      trigger: 'Потеря тотального контроля, предательство доверия, эмоциональное бессилие.',
      trap: 'Психологический садизм, ревность, разрушительная жажда мести, саморазрушение.',
      gold: 'Феноменальная способность возрождаться из пепла (Феникс), трансмутация глубочайшей боли в несокрушимую мудрость.',
      protocol: 'Отпустить потребность контролировать мысли других; сублимировать страсть в масштабную созидательную трансформацию.'
    },
    {
      sign: 'Стрелец',
      archetype: 'Тень Лжепророка & Догматизма',
      trigger: 'Столкновение с ограниченностью, сомнение других в авторитете натива, крушение идеалов.',
      trap: 'Фанатизм, высокомерие "духовного превосходства", навязывание своей картины мира, побег от реальности в иллюзии.',
      gold: 'Истинное стратегическое визионерство, способность вести народы к свету без фанатизма.',
      protocol: 'Уважать чужую картину мира; помнить, что истинная мудрость признает многообразие путей.'
    },
    {
      sign: 'Козерог',
      archetype: 'Тень Тирании & Эмоционального Окаменения',
      trigger: 'Хаос, социальный провал, страх показаться слабым или непрофессиональным.',
      trap: 'Холодный цинизм, эмоциональная черствость, превращение жизни в концлагерь правил, культ статуса.',
      gold: 'Великая архитектоника жизни, непоколебимая выдержка скалы и способность строить наследие на века.',
      protocol: 'Разрешить себе теплоту и уязвимость; осознать, что чувства не являются слабостью.'
    },
    {
      sign: 'Водолей',
      archetype: 'Тень Анархии & Тотального Отчуждения',
      trigger: 'Ограничение свободы, навязанные общественные рамки, принуждение к "нормальности".',
      trap: 'Асоциальный бунт ради бунта, эмоциональный холод, обесценивание человеческих привязанностей.',
      gold: 'Прорывное мышление опережающего время гения, способность закладывать основы будущего человечества.',
      protocol: 'Сохранять свободу духа внутри социума, служа общему благу через практические инновации.'
    },
    {
      sign: 'Рыбы',
      archetype: 'Тень Иллюзий, Жертвенности & Бегства',
      trigger: 'Жестокая материальная реальность, отсутствие магии, столкновение с бессердечием.',
      trap: 'Синдром жертвы, эскапизм в зависимости, потеря чувства реальности, фатализм.',
      gold: 'Космический океан интуиции, прямой канал к высшему бессознательному и божественное сострадание.',
      protocol: 'Заземлять духовные прозрения в материальные формы (искусство, тексты, осязаемая помощь).'
    }
  ];

  // Ephemeris Calculation for Mean Lunar Apogee (Lilith) & Pluto
  function calculateLilith(date) {
    const jd = (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    const d = jd - 2451543.5;
    // Mean Apogee of Moon orbit (Black Moon Lilith) formula
    let lilithLon = (280.460 + 0.11140408 * d + 40.66229) % 360;
    if (lilithLon < 0) lilithLon += 360;
    return lilithLon;
  }

  function calculatePluto(date) {
    const jd = (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    const d = jd - 2451543.5;
    let plutoLon = (238.929 + 0.003964 * d) % 360;
    if (plutoLon < 0) plutoLon += 360;
    return plutoLon;
  }

  function renderShadowProfile(name, birthDateStr, birthTimeStr) {
    const birthDate = new Date(`${birthDateStr}T${birthTimeStr || '12:00'}:00`);
    
    // Orbital coordinates
    const lilithDeg = calculateLilith(birthDate);
    const plutoDeg = calculatePluto(birthDate);

    const lilithSignIndex = Math.floor(lilithDeg / 30) % 12;
    const lilithSignDeg = Math.floor(lilithDeg % 30);
    const lilithData = LILITH_ARCHETYPES[lilithSignIndex];

    const plutoSignIndex = Math.floor(plutoDeg / 30) % 12;
    const plutoSignDeg = Math.floor(plutoDeg % 30);
    const plutoZodiac = ZODIAC[plutoSignIndex];

    // Update KPI Dashboard
    document.getElementById('ast-kpi-lilith').innerText = `${lilithSignDeg}° ${lilithData.sign}`;
    document.getElementById('ast-kpi-lilith-sub').innerText = `Черная Луна в ${lilithData.sign} · Слепая Зона`;

    document.getElementById('ast-kpi-pluto').innerText = `${plutoSignDeg}° ${plutoZodiac.name}`;
    document.getElementById('ast-kpi-pluto-sub').innerText = `Плутон в ${plutoZodiac.name} · Трансформатор`;

    // Render Pillars
    const container = document.getElementById('ast-shadow-pillars');
    container.innerHTML = `
      <!-- Pillar I: Black Moon Lilith -->
      <article class="ast-pillar-card">
        <div class="ast-pillar-top">
          <h2 class="ast-pillar-heading">
            <span style="color:var(--ast-crimson);">⚸</span>
            ${name}: Лилит в знаке ${lilithData.sign} — ${lilithData.archetype}
          </h2>
          <span class="ast-tag-badge ast-tag-lilith">Апогей Луны · Слепая Зона</span>
        </div>

        <p style="font-size: 0.98rem; line-height: 1.65; color: #D1D5DB; font-weight: 300;">
          Черная Луна представляет собой самую удаленную точку лунной орбиты — сакральный шлюз к вытесненным инстинктам. В знаке ${lilithData.sign} она формирует особую точку сверхчувствительности, где натив либо впадает в искушение гиперкомпенсации, либо блокирует свою первозданную мощь.
        </p>

        <div class="ast-shadow-matrix">
          <div class="ast-matrix-cell">
            <div class="ast-cell-title trigger">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
              Подсознательный Триггер
            </div>
            <div class="ast-cell-desc">${lilithData.trigger}</div>
          </div>

          <div class="ast-matrix-cell">
            <div class="ast-cell-title trap">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
              Теневая Ловушка & Саботаж
            </div>
            <div class="ast-cell-desc">${lilithData.trap}</div>
          </div>

          <div class="ast-matrix-cell">
            <div class="ast-cell-title gold">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              Золото Тени (Скрытая Сила)
            </div>
            <div class="ast-cell-desc">${lilithData.gold}</div>
          </div>

          <div class="ast-matrix-cell">
            <div class="ast-cell-title protocol">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
              Протокол Интеграции
            </div>
            <div class="ast-cell-desc">${lilithData.protocol}</div>
          </div>
        </div>

        <div class="ast-protocol-banner">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          <div class="ast-protocol-text">
            <strong>Ключ Трансмутации:</strong> Тень нельзя уничтожить или подавить — любая борьба с Лилит усиливает внутренний раскол. Признайте право этой энергии на существование, снимите с нее табу и дайте ей конструктивное русло. В момент осознания ваша уязвимость становится несокрушимым щитом.
          </div>
        </div>
      </article>

      <!-- Pillar II: Pluto Deep Metamorphic Core -->
      <article class="ast-pillar-card">
        <div class="ast-pillar-top">
          <h2 class="ast-pillar-heading">
            <span style="color:var(--ast-gold);">♇</span>
            Плутон в ${plutoZodiac.name}: Поколенческий Разлом & Коллективная Тень
          </h2>
          <span class="ast-tag-badge ast-tag-pluto">Владыка Недр & Регенерация</span>
        </div>

        <p style="font-size: 0.98rem; line-height: 1.65; color: #D1D5DB; font-weight: 300;">
          Плутон указывает на область тотальной перезагрузки натала, где человек обязан пройти символическую смерть старых паттернов ради обретения истинной духовной автономии. В знаке ${plutoZodiac.name} он учит натива не бояться кризисов, видя в них единственный путь к эволюционному скачку.
        </p>
      </article>
    `;
  }

  document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('ast-shadow-form');
    
    // Initial calculation
    renderShadowProfile('Человек / Душа', '1995-10-24', '14:30');

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const name = document.getElementById('ast-native-name').value.trim() || 'Человек / Душа';
      const bDate = document.getElementById('ast-native-date').value;
      const bTime = document.getElementById('ast-native-time').value || '12:00';
      if (bDate) {
        renderShadowProfile(name, bDate, bTime);
      }
    });
  });

})();
</script>

<?php get_footer(); ?>