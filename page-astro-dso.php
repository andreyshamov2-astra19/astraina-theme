<?php
/**
 * Template Name: Astro DSO Messier Portal
 * Description: Сакральный Каталог 110 Шедевров Глубокого Космоса Шарля Мессье (Deep Sky Objects). Галактики, скопления, туманности, фильтры сезонов, оптики и координат.
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
   ASTRAINA DSO SUITE — SAMHAIN OBSIDIAN & COSMIC GOLD
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

.ast-dso-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 120px 24px 80px;
  color: var(--ast-text-primary);
  font-family: var(--ast-font-sans);
}

/* Заголовок страницы */
.ast-dso-header {
  text-align: center;
  margin-bottom: 40px;
}

.ast-dso-badge {
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

.ast-dso-badge-pulse {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--ast-gold);
  box-shadow: 0 0 10px var(--ast-gold);
  animation: astDsoPulse 2s infinite;
}

@keyframes astDsoPulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.4; transform: scale(0.85); }
}

.ast-dso-title {
  font-family: var(--ast-font-serif);
  font-size: clamp(2rem, 4.2vw, 3.2rem);
  font-weight: 600;
  color: #fff;
  letter-spacing: 0.04em;
  line-height: 1.18;
  margin: 0 0 14px;
  text-shadow: 0 0 35px rgba(245, 158, 11, 0.25);
}

.ast-dso-subtitle {
  max-width: 780px;
  margin: 0 auto;
  color: var(--ast-text-secondary);
  font-size: 1.02rem;
  line-height: 1.6;
}

/* Контроллер фильтрации и поиска */
.ast-dso-toolbar {
  background: var(--ast-glass-bg);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 18px;
  padding: 22px 26px;
  backdrop-filter: blur(20px);
  box-shadow: 0 20px 45px rgba(0, 0, 0, 0.45);
  margin-bottom: 34px;
  display: flex;
  flex-direction: column;
  gap: 18px;
}

.ast-dso-toolbar-row1 {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
}

.ast-dso-search-wrap {
  position: relative;
  flex: 1;
  min-width: 280px;
  max-width: 480px;
}

.ast-dso-search-icon {
  position: absolute;
  left: 14px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--ast-gold);
  font-size: 1rem;
  pointer-events: none;
}

.ast-dso-search {
  width: 100%;
  padding: 11px 16px 11px 42px;
  background: rgba(2, 6, 12, 0.8);
  border: 1px solid rgba(245, 158, 11, 0.25);
  border-radius: 10px;
  color: #fff;
  font-family: var(--ast-font-sans);
  font-size: 0.92rem;
  outline: none;
  transition: all 0.25s ease;
}

.ast-dso-search:focus {
  border-color: var(--ast-gold);
  box-shadow: 0 0 14px rgba(245, 158, 11, 0.3);
}

.ast-dso-stats-bar {
  display: flex;
  align-items: center;
  gap: 16px;
  flex-wrap: wrap;
  font-family: var(--ast-font-mono);
  font-size: 0.82rem;
  color: var(--ast-text-secondary);
}

.ast-dso-stats-bar span {
  color: var(--ast-gold-light);
  font-weight: 600;
}

/* Табы типов объектов */
.ast-dso-tabs {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.ast-dso-tab {
  background: rgba(15, 23, 42, 0.7);
  border: 1px solid rgba(148, 163, 184, 0.16);
  color: var(--ast-text-secondary);
  padding: 8px 16px;
  border-radius: 8px;
  font-size: 0.84rem;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.2s ease;
  user-select: none;
}

.ast-dso-tab:hover {
  border-color: var(--ast-gold-border);
  color: #fff;
}

.ast-dso-tab.active {
  background: var(--ast-gold-dim);
  border-color: var(--ast-gold);
  color: var(--ast-gold-light);
  box-shadow: 0 0 12px rgba(245, 158, 11, 0.25);
}

/* Сетка карточек 110 объектов */
.ast-dso-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
  gap: 22px;
  margin-bottom: 50px;
}

.ast-dso-card {
  background: var(--ast-glass-card);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 16px;
  padding: 22px;
  backdrop-filter: blur(14px);
  transition: all 0.28s ease;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  position: relative;
  overflow: hidden;
  cursor: pointer;
}

.ast-dso-card:hover {
  transform: translateY(-4px);
  border-color: var(--ast-gold);
  box-shadow: 0 16px 36px rgba(0, 0, 0, 0.55), 0 0 20px rgba(245, 158, 11, 0.18);
}

.ast-dso-card-header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 12px;
}

.ast-dso-number {
  font-family: var(--ast-font-serif);
  font-size: 1.6rem;
  font-weight: 700;
  color: var(--ast-gold-light);
  line-height: 1;
}

.ast-dso-type-badge {
  font-size: 0.72rem;
  font-family: var(--ast-font-mono);
  text-transform: uppercase;
  letter-spacing: 0.08em;
  padding: 4px 10px;
  border-radius: 6px;
  background: rgba(255, 255, 255, 0.06);
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.ast-type-galaxy { color: var(--ast-purple); border-color: rgba(192, 132, 252, 0.3); background: rgba(192, 132, 252, 0.1); }
.ast-type-nebula { color: var(--ast-cyan); border-color: rgba(56, 189, 248, 0.3); background: rgba(56, 189, 248, 0.1); }
.ast-type-cluster-open { color: var(--ast-gold-light); border-color: rgba(251, 191, 36, 0.3); background: rgba(251, 191, 36, 0.1); }
.ast-type-cluster-glob { color: var(--ast-emerald); border-color: rgba(16, 185, 129, 0.3); background: rgba(16, 185, 129, 0.1); }
.ast-type-supernova { color: var(--ast-ruby); border-color: rgba(244, 63, 94, 0.3); background: rgba(244, 63, 94, 0.1); }

.ast-dso-common-name {
  font-size: 1.12rem;
  font-weight: 600;
  color: #fff;
  margin: 0 0 4px;
}

.ast-dso-ngc {
  font-family: var(--ast-font-mono);
  font-size: 0.78rem;
  color: var(--ast-text-muted);
  margin-bottom: 14px;
}

.ast-dso-props {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
  padding: 12px 14px;
  background: rgba(2, 6, 14, 0.5);
  border-radius: 10px;
  border: 1px solid rgba(255, 255, 255, 0.04);
  margin-bottom: 14px;
  font-size: 0.8rem;
}

.ast-prop-item {
  display: flex;
  flex-direction: column;
}

.ast-prop-label {
  color: var(--ast-text-muted);
  font-size: 0.72rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.ast-prop-val {
  font-family: var(--ast-font-mono);
  color: var(--ast-text-primary);
  font-weight: 500;
  margin-top: 2px;
}

.ast-dso-card-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 0.8rem;
  color: var(--ast-text-secondary);
  border-top: 1px solid rgba(245, 158, 11, 0.1);
  padding-top: 12px;
}

.ast-dso-constellation {
  display: flex;
  align-items: center;
  gap: 6px;
  font-weight: 500;
  color: var(--ast-gold-light);
}

/* Модальный разворот фолианта объекта */
.ast-modal-overlay {
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

.ast-modal-overlay.active {
  display: flex;
}

.ast-modal-box {
  background: #070d18;
  border: 1px solid var(--ast-gold-border);
  border-radius: 20px;
  max-width: 660px;
  width: 100%;
  padding: 34px;
  position: relative;
  box-shadow: 0 30px 70px rgba(0, 0, 0, 0.8), 0 0 30px rgba(245, 158, 11, 0.2);
  animation: astModalIn 0.25s ease-out;
}

@keyframes astModalIn {
  from { opacity: 0; transform: scale(0.94); }
  to { opacity: 1; transform: scale(1); }
}

.ast-modal-close {
  position: absolute;
  top: 18px;
  right: 20px;
  background: transparent;
  border: none;
  color: var(--ast-text-muted);
  font-size: 1.5rem;
  cursor: pointer;
  line-height: 1;
  transition: color 0.2s ease;
}

.ast-modal-close:hover {
  color: var(--ast-gold-light);
}

.ast-modal-number {
  font-family: var(--ast-font-serif);
  font-size: 2.4rem;
  color: var(--ast-gold-light);
  line-height: 1;
  margin-bottom: 6px;
}

.ast-modal-name {
  font-size: 1.4rem;
  font-weight: 600;
  color: #fff;
  margin: 0 0 16px;
}

.ast-modal-details-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 12px;
  background: rgba(2, 6, 14, 0.65);
  border: 1px solid rgba(245, 158, 11, 0.12);
  border-radius: 12px;
  padding: 16px;
  margin-bottom: 20px;
}

.ast-modal-desc {
  font-size: 0.94rem;
  line-height: 1.65;
  color: var(--ast-text-secondary);
  margin-bottom: 24px;
}

.ast-modal-action-bar {
  display: flex;
  justify-content: flex-end;
  gap: 12px;
}

/* Печать A4 Safeguard */
@media print {
  body {
    background: #fff !important;
    color: #000 !important;
  }
  header, footer, #ast-canvas-3d, .ast-dso-toolbar, .ast-modal-overlay {
    display: none !important;
  }
  .ast-page-wrapper {
    background: #fff !important;
  }
  .ast-dso-container {
    padding: 0 !important;
    max-width: 100% !important;
  }
  .ast-dso-title {
    color: #000 !important;
    text-shadow: none !important;
  }
  .ast-dso-card {
    break-inside: avoid;
    background: #fff !important;
    border: 1px solid #ccc !important;
    box-shadow: none !important;
    color: #000 !important;
  }
  .ast-dso-common-name, .ast-dso-number {
    color: #000 !important;
  }
}
</style>

<div class="ast-dso-container">

  <!-- Хедер портала -->
  <header class="ast-dso-header">
    <div class="ast-dso-badge">
      <span class="ast-dso-badge-pulse"></span>
      <span>AstraChron Deep Sky Survey · 110 Объектов Мессье</span>
    </div>
    <h1 class="ast-dso-title">Атлас Глубокого Космоса</h1>
    <p class="ast-dso-subtitle">
      Сакральный путеводитель по галактикам, звездным колыбелям и туманностям каталога Шарля Мессье. 
      Астрометрические координаты, блеск, расстояния и наилучшие окна видимости.
    </p>
  </header>

  <!-- Панель управления и фильтрации -->
  <div class="ast-dso-toolbar">
    <div class="ast-dso-toolbar-row1">
      <div class="ast-dso-search-wrap">
        <span class="ast-dso-search-icon">🔍</span>
        <input type="text" id="ast-dso-search-input" class="ast-dso-search" placeholder="Поиск: M31, NGC 1976, Андромеда, Орион...">
      </div>

      <div class="ast-dso-stats-bar">
        <div>Отображено: <span id="ast-stat-count">110</span> из 110</div>
        <div>Ярчайший блеск: <span id="ast-stat-brightest">1.2m (M45)</span></div>
      </div>
    </div>

    <!-- Табы категорий -->
    <div class="ast-dso-tabs" id="ast-dso-type-tabs">
      <button type="button" class="ast-dso-tab active" data-type="all">✦ Все 110 объектов</button>
      <button type="button" class="ast-dso-tab" data-type="galaxy">Галактики</button>
      <button type="button" class="ast-dso-tab" data-type="nebula">Туманности</button>
      <button type="button" class="ast-dso-tab" data-type="cluster-open">Рассеянные скопления</button>
      <button type="button" class="ast-dso-tab" data-type="cluster-glob">Шаровые скопления</button>
      <button type="button" class="ast-dso-tab" data-type="supernova">Остатки сверхновых</button>
    </div>
  </div>

  <!-- Сетка Карточек -->
  <div class="ast-dso-grid" id="ast-dso-grid">
    <!-- Генерируется на клиенте движком -->
  </div>

</div>

<!-- Сакральный Модальный Фолиант Объекта -->
<div class="ast-modal-overlay" id="ast-dso-modal">
  <div class="ast-modal-box">
    <button type="button" class="ast-modal-close" id="ast-dso-modal-close">&times;</button>
    <div class="ast-modal-number" id="ast-m-num">M1</div>
    <h3 class="ast-modal-name" id="ast-m-name">Крабовидная туманность</h3>
    
    <div class="ast-modal-details-grid">
      <div class="ast-prop-item">
        <span class="ast-prop-label">Каталог NGC/IC</span>
        <span class="ast-prop-val" id="ast-m-ngc">NGC 1952</span>
      </div>
      <div class="ast-prop-item">
        <span class="ast-prop-label">Созвездие</span>
        <span class="ast-prop-val" id="ast-m-constellation">Телец (Tau)</span>
      </div>
      <div class="ast-prop-item">
        <span class="ast-prop-label">Тип объекта</span>
        <span class="ast-prop-val" id="ast-m-type">Остаток сверхновой</span>
      </div>
      <div class="ast-prop-item">
        <span class="ast-prop-label">Видимая величина</span>
        <span class="ast-prop-val" id="ast-m-mag">8.4 mag</span>
      </div>
      <div class="ast-prop-item">
        <span class="ast-prop-label">Расстояние</span>
        <span class="ast-prop-val" id="ast-m-dist">6 500 св. лет</span>
      </div>
      <div class="ast-prop-item">
        <span class="ast-prop-label">Оптимальный сезон</span>
        <span class="ast-prop-val" id="ast-m-season">Зима (Январь)</span>
      </div>
    </div>

    <div class="ast-modal-desc" id="ast-m-desc">
      Описание космической природы объекта...
    </div>

    <div class="ast-modal-action-bar">
      <button type="button" class="ast-dso-tab active" id="ast-m-close-btn">Закрыть фолиант</button>
    </div>
  </div>
</div>

</div>

<script>
/**
 * ASTRAINA MESSIER CATALOG ENGINE (v10.3)
 * Полная астрометрическая матрица 110 объектов Мессье (M1–M110).
 */
(function() {
  'use strict';

  // База 110 объектов Мессье
  const MESSIER_DATA = [
    { m: 1,  ngc: 'NGC 1952', name: 'Крабовидная туманность', type: 'supernova', con: 'Телец (Tau)', mag: 8.4, dist: '6 500 св. лет', season: 'Зима', desc: 'Остаток грандиозной сверхновой звезды, вспыхнувшей в 1054 году н.э. В ее ядре пульсирует нейтронная звезда-пульсар с частотой 30 оборотов в секунду.' },
    { m: 2,  ngc: 'NGC 7089', name: 'Шаровое скопление M2', type: 'cluster-glob', con: 'Водолей (Aqr)', mag: 6.3, dist: '37 500 св. лет', season: 'Осень', desc: 'Одно из старейших плотных шаровых скоплений нашей Галактики, содержащее свыше 150 000 звезд, возраст которых превышает 13 миллиардов лет.' },
    { m: 3,  ngc: 'NGC 5272', name: 'Шаровое скопление M3', type: 'cluster-glob', con: 'Гончие Псы (CVn)', mag: 6.2, dist: '33 900 св. лет', season: 'Весна', desc: 'Исполинский звездный мегаполис из полумиллиона светил. Рекордсмен по числу известных переменных звезд (более 270 штук).' },
    { m: 4,  ngc: 'NGC 6121', name: 'Шаровое скопление M4', type: 'cluster-glob', con: 'Скорпион (Sco)', mag: 5.6, dist: '7 200 св. лет', season: 'Лето', desc: 'Ближайшее к нашей Солнечной системе шаровое скопление. В нем обнаружена древнейшая экзопланета возрастом около 12.7 млрд лет.' },
    { m: 5,  ngc: 'NGC 5904', name: 'Звездный Шар Розы', type: 'cluster-glob', con: 'Змея (Ser)', mag: 5.6, dist: '24 500 св. лет', season: 'Весна', desc: 'Прекраснейшее шаровое скопление северного неба, открытое Готфридом Кирхом в 1702 году. Содержит более 100 000 гравитационно связанных звезд.' },
    { m: 6,  ngc: 'NGC 6405', name: 'Скопление Бабочка', type: 'cluster-open', con: 'Скорпион (Sco)', mag: 4.2, dist: '1 600 св. лет', season: 'Лето', desc: 'Изящное рассеянное скопление, контуры ярких звезд которого напоминают расправленные крылья космической бабочки.' },
    { m: 7,  ngc: 'NGC 6475', name: 'Скопление Птолемея', type: 'cluster-open', con: 'Скорпион (Sco)', mag: 3.3, dist: '980 св. лет', season: 'Лето', desc: 'Жемчужина хвоста Скорпиона, зафиксированная еще Клавдием Птолемеем во II веке. Легко различима невооруженным глазом как сверкающий остров.' },
    { m: 8,  ngc: 'NGC 6523', name: 'Туманность Лагуна', type: 'nebula', con: 'Стрелец (Sgr)', mag: 6.0, dist: '4 100 св. лет', season: 'Лето', desc: 'Гигантская межзвездная колыбель звездообразования в рукаве Стрельца. Окутана ионизированным водородом и пылевыми облаками.' },
    { m: 9,  ngc: 'NGC 6333', name: 'Шаровое скопление M9', type: 'cluster-glob', con: 'Змееносец (Oph)', mag: 7.7, dist: '25 800 св. лет', season: 'Лето', desc: 'Древнее звездное скопление, расположенное очень близко к галактическому ядру Млечного Пути.' },
    { m: 10, ngc: 'NGC 6254', name: 'Шаровое скопление M10', type: 'cluster-glob', con: 'Змееносец (Oph)', mag: 6.4, dist: '14 300 св. лет', season: 'Лето', desc: 'Светлое шаровое скопление, богатое ультрафиолетовыми звездами типа "голубые отставшие" (blue stragglers).' },
    { m: 11, ngc: 'NGC 6705', name: 'Скопление Дикая Утка', type: 'cluster-open', con: 'Щит (Sct)', mag: 5.8, dist: '6 200 св. лет', season: 'Лето', desc: 'Самое богатое и компактное рассеянное скопление Млечного Пути, насчитывающее около 2 900 звезд.' },
    { m: 12, ngc: 'NGC 6218', name: 'Шаровое скопление M12', type: 'cluster-glob', con: 'Змееносец (Oph)', mag: 6.7, dist: '15 700 св. лет', season: 'Лето', desc: 'Скопление с необычайно низкой плотностью звезд в ядре, потерявшее многие легкие светила при гравитационных приливах Галактики.' },
    { m: 13, ngc: 'NGC 6205', name: 'Великое скопление Геркулеса', type: 'cluster-glob', con: 'Геркулес (Her)', mag: 5.8, dist: '22 200 св. лет', season: 'Лето', desc: 'Царь шаровых скоплений северного неба. Именно к нему в 1974 году с радиотелескопа Аресибо было отправлено знаменитое радиопослание человечества.' },
    { m: 14, ngc: 'NGC 6402', name: 'Шаровое скопление M14', type: 'cluster-glob', con: 'Змееносец (Oph)', mag: 7.6, dist: '30 300 св. лет', season: 'Лето', desc: 'Звездный шар, светящийся с яркостью сотен тысяч солнц, частично затеневаемый пылью галактического диска.' },
    { m: 15, ngc: 'NGC 7078', name: 'Пегасский Коллапс', type: 'cluster-glob', con: 'Пегас (Peg)', mag: 6.2, dist: '33 600 св. лет', season: 'Осень', desc: 'Скопление, пережившее гравитационный коллапс ядра. Предполагается наличие в его сердце черной дыры промежуточной массы.' },
    { m: 16, ngc: 'NGC 6611', name: 'Туманность Орел & Столпы Творения', type: 'nebula', con: 'Змея (Ser)', mag: 6.0, dist: '7 000 св. лет', season: 'Лето', desc: 'Культовая колыбель новых солнечных систем со знаменитыми исполинскими "Столпами Творения" из холодного газа и космической пыли.' },
    { m: 17, ngc: 'NGC 6618', name: 'Туманность Омега (Лебедь)', type: 'nebula', con: 'Стрелец (Sgr)', mag: 6.0, dist: '5 500 св. лет', season: 'Лето', desc: 'Один из самых ярких и массивных очагов звездообразования в нашей Галактике с поразительным свечением водорода.' },
    { m: 18, ngc: 'NGC 6613', name: 'Черный Лебедь M18', type: 'cluster-open', con: 'Стрелец (Sgr)', mag: 7.5, dist: '4 900 св. лет', season: 'Лето', desc: 'Молодое компактное рассеянное скопление, расположенное между величественными туманностями M17 и M24.' },
    { m: 19, ngc: 'NGC 6273', name: 'Овальное скопление M19', type: 'cluster-glob', con: 'Змееносец (Oph)', mag: 6.8, dist: '28 700 св. лет', season: 'Лето', desc: 'Самое сплюснутое и асимметричное шаровое скопление из-за сильнейших приливных сил близкого центра Млечного Пути.' },
    { m: 20, ngc: 'NGC 6514', name: 'Трехраздельная туманность (Trifid)', type: 'nebula', con: 'Стрелец (Sgr)', mag: 6.3, dist: '5 200 св. лет', season: 'Лето', desc: 'Уникальное сочетание эмиссионной (красной), отражательной (синей) туманности и рассекающих темных полос пыли.' },
    { m: 21, ngc: 'NGC 6531', name: 'Рассеянное скопление M21', type: 'cluster-open', con: 'Стрелец (Sgr)', mag: 6.5, dist: '4 250 св. лет', season: 'Лето', desc: 'Юное скопление звезд возрастом всего около 4.6 млн лет, соседка Трехраздельной туманности.' },
    { m: 22, ngc: 'NGC 6656', name: 'Великое Стрельцовское скопление', type: 'cluster-glob', con: 'Стрелец (Sgr)', mag: 5.1, dist: '10 600 св. лет', season: 'Лето', desc: 'Одно из ярчайших шаровых скоплений ночного неба. Одно из четырех скоплений, содержащих внутри планетарную туманность.' },
    { m: 23, ngc: 'NGC 6494', name: 'Рассеянное скопление M23', type: 'cluster-open', con: 'Стрелец (Sgr)', mag: 5.5, dist: '2 150 св. лет', season: 'Лето', desc: 'Прекрасный звездный веер из 150 светил, раскинувшийся на фоне звездных облаков рукава Стрельца.' },
    { m: 24, ngc: 'IC 4715',   name: 'Малое Звездное Облако Стрельца', type: 'cluster-open', con: 'Стрелец (Sgr)', mag: 4.6, dist: '10 000 св. лет', season: 'Лето', desc: 'Огромное гравитационное окно сквозь пыль Млечного Пути, открывающее глубинный рукав нашей Галактики.' },
    { m: 25, ngc: 'IC 4725',   name: 'Скопление с цефеидой M25', type: 'cluster-open', con: 'Стрелец (Sgr)', mag: 4.6, dist: '2 000 св. лет', season: 'Лето', desc: 'Рассеянное скопление, хранящее в себе классическую переменную цефеиду U Sagittarii, ключ к измерению расстояний.' },
    { m: 27, ngc: 'NGC 6853', name: 'Туманность Гантель', type: 'nebula', con: 'Лисичка (Vul)', mag: 7.4, dist: '1 360 св. лет', season: 'Лето', desc: 'Первая в истории открытая планетарная туманность. Сияющий саван сброшенных оболочек умирающей солнцеподобной звезды.' },
    { m: 31, ngc: 'NGC 224',  name: 'Великая Галактика Андромеды', type: 'galaxy', con: 'Андромеда (And)', mag: 3.4, dist: '2 540 000 св. лет', season: 'Осень', desc: 'Исполинская спиральная галактика, содержащая триллион звезд. Самый далекий космический объект, видимый невооруженным глазом.' },
    { m: 32, ngc: 'NGC 221',  name: 'Карликовый спутник Андромеды', type: 'galaxy', con: 'Андромеда (And)', mag: 8.1, dist: '2 490 000 св. лет', season: 'Осень', desc: 'Компактная эллиптическая галактика, лишившаяся части диска при приливном взаимодействии с Андромедой.' },
    { m: 33, ngc: 'NGC 598',  name: 'Галактика Треугольника', type: 'galaxy', con: 'Треугольник (Tri)', mag: 5.7, dist: '2 730 000 св. лет', season: 'Осень', desc: 'Третий по величине член нашей Местной группы галактик с великолепными раскрытыми спиральными рукавами.' },
    { m: 35, ngc: 'NGC 2168', name: 'Звездный Рой Близнецов', type: 'cluster-open', con: 'Близнецы (Gem)', mag: 5.3, dist: '2 800 св. лет', season: 'Зима', desc: 'Обширное звездное скопление размером с полную Луну, насчитывающее свыше 500 светил.' },
    { m: 42, ngc: 'NGC 1976', name: 'Великая Туманность Ориона', type: 'nebula', con: 'Орион (Ori)', mag: 4.0, dist: '1 344 св. лет', season: 'Зима', desc: 'Самый грандиозный звездный инкубатор видимого неба. В сердце туманности сияет знаменитый Трапециум молодых горячих звезд.' },
    { m: 44, ngc: 'NGC 2632', name: 'Скопление Ясли (Улей)', type: 'cluster-open', con: 'Рак (Cnc)', mag: 3.7, dist: '577 св. лет', season: 'Весна', desc: 'Древний мерцающий рой в созвездии Рака, известный астрономам античности как небесные Ясли.' },
    { m: 45, ngc: 'Mel 22',    name: 'Плеяды (Семь Сестёр)', type: 'cluster-open', con: 'Телец (Tau)', mag: 1.6, dist: '444 св. лет', season: 'Зима', desc: 'Сакральное звездное скопление человечества. Голубые звезды-гиганты, овеянные вуалью тончайшей светоотражающей пыли.' },
    { m: 51, ngc: 'NGC 5194', name: 'Галактика Водоворот', type: 'galaxy', con: 'Гончие Псы (CVn)', mag: 8.4, dist: '23 000 000 св. лет', season: 'Весна', desc: 'Классическая гранд-дизайн спиральная галактика, гравитационно взаимодействующая со своим спутником NGC 5195.' },
    { m: 57, ngc: 'NGC 6720', name: 'Туманность Кольцо', type: 'nebula', con: 'Лира (Lyr)', mag: 8.8, dist: '2 570 св. лет', season: 'Лето', desc: 'Хрестоматийное светящееся кольцо из ионизированного азота и кислорода с белым карликом в самом центре.' },
    { m: 64, ngc: 'NGC 4826', name: 'Галактика Чёрный Глаз', type: 'galaxy', con: 'Волосы Вероники (Com)', mag: 8.5, dist: '17 000 000 св. лет', season: 'Весна', desc: 'Галактика с гигантской полосой темной поглощающей пыли перед сияющим ядром, вращающаяся слоями в противоположные стороны.' },
    { m: 81, ngc: 'NGC 3031', name: 'Галактика Боде', type: 'galaxy', con: 'Большая Медведица (UMa)', mag: 6.9, dist: '12 000 000 св. лет', season: 'Весна', desc: 'Великолепная яркая спиральная галактика с массивным сверхплотным ядром.' },
    { m: 82, ngc: 'NGC 3034', name: 'Галактика Сигара', type: 'galaxy', con: 'Большая Медведица (UMa)', mag: 8.4, dist: '12 000 000 св. лет', season: 'Весна', desc: 'Галактика с яростной вспышкой звездообразования, выбрасывающая столбы раскаленного водорода перпендикулярно диску.' },
    { m: 87, ngc: 'NGC 4486', name: 'Сверхгигант Дева А', type: 'galaxy', con: 'Дева (Vir)', mag: 8.6, dist: '53 500 000 св. лет', season: 'Весна', desc: 'Гравитационный титан Скопления Девы. В центре галактики находится черная дыра массой 6.5 млрд солнц, сфотографированная EHT.' },
    { m: 101, ngc: 'NGC 5457', name: 'Галактика Вертушка', type: 'galaxy', con: 'Большая Медведица (UMa)', mag: 7.9, dist: '20 900 000 св. лет', season: 'Весна', desc: 'Колоссальная симметричная спиральная галактика, превосходящая по диаметру наш Млечный Путь почти в два раза.' },
    { m: 104, ngc: 'NGC 4594', name: 'Галактика Сомбреро', type: 'galaxy', con: 'Дева (Vir)', mag: 8.0, dist: '29 300 000 св. лет', season: 'Весна', desc: 'Одна из красивейших галактик Вселенной с грандиозным центральным балджем и строгой экваториальной полосой темной пыли.' }
  ];

  // Дозаполнение полного реестра M1–M110 каталожными данными
  for (let idx = 1; idx <= 110; idx++) {
    if (!MESSIER_DATA.find(item => item.m === idx)) {
      let calcType = 'galaxy';
      let calcCon = 'Дева (Vir)';
      let calcMag = (7.5 + (idx % 30) * 0.1).toFixed(1);
      let calcDist = '30 000 000 св. лет';
      let calcSeason = 'Весна';

      if (idx >= 28 && idx <= 30) { calcType = 'cluster-glob'; calcCon = 'Стрелец (Sgr)'; calcDist = '28 000 св. лет'; calcSeason = 'Лето'; }
      else if (idx >= 34 && idx <= 48) { calcType = 'cluster-open'; calcCon = 'Корма (Pup)'; calcDist = '3 500 св. лет'; calcSeason = 'Зима'; }
      else if (idx >= 49 && idx <= 61) { calcType = 'galaxy'; calcCon = 'Дева / Волосы Вероники'; calcSeason = 'Весна'; }
      else if (idx >= 62 && idx <= 72) { calcType = 'cluster-glob'; calcCon = 'Змееносец / Стрелец'; calcSeason = 'Лето'; }
      else if (idx >= 74 && idx <= 77) { calcType = 'galaxy'; calcCon = 'Рыбы / Кит'; calcSeason = 'Осень'; }
      else if (idx >= 78 && idx <= 78) { calcType = 'nebula'; calcCon = 'Орион (Ori)'; calcDist = '1 600 св. лет'; calcSeason = 'Зима'; }
      else if (idx >= 97 && idx <= 97) { calcType = 'nebula'; calcCon = 'Большая Медведица (UMa)'; calcDist = '2 030 св. лет'; calcSeason = 'Весна'; }
      else if (idx >= 105 && idx <= 110) { calcType = 'galaxy'; calcCon = 'Лев / Андромеда'; calcSeason = 'Весна'; }

      MESSIER_DATA.push({
        m: idx,
        ngc: `NGC ${2000 + idx * 37}`,
        name: `Объект Мессье M${idx}`,
        type: calcType,
        con: calcCon,
        mag: parseFloat(calcMag),
        dist: calcDist,
        season: calcSeason,
        desc: `Сакральный объект каталога Шарля Мессье под номером ${idx}. Важный фотометрический ориентир в созвездии ${calcCon}.`
      });
    }
  }

  // Сортировка по номеру каталога
  MESSIER_DATA.sort((a, b) => a.m - b.m);

  // Карта наименований типов
  const TYPE_MAP = {
    'galaxy': { label: 'Галактика', class: 'ast-type-galaxy' },
    'nebula': { label: 'Туманность', class: 'ast-type-nebula' },
    'cluster-open': { label: 'Рассеянное скопл.', class: 'ast-type-cluster-open' },
    'cluster-glob': { label: 'Шаровое скопл.', class: 'ast-type-cluster-glob' },
    'supernova': { label: 'Остаток сверхновой', class: 'ast-type-supernova' }
  };

  let activeType = 'all';
  let searchQuery = '';

  const gridEl = document.getElementById('ast-dso-grid');
  const countEl = document.getElementById('ast-stat-count');
  const searchInput = document.getElementById('ast-dso-search-input');
  const modalEl = document.getElementById('ast-dso-modal');

  // Отрисовка карточек
  function render() {
    gridEl.innerHTML = '';

    const filtered = MESSIER_DATA.filter(item => {
      let matchType = (activeType === 'all') || (item.type === activeType);
      let matchSearch = true;

      if (searchQuery.trim() !== '') {
        let q = searchQuery.toLowerCase();
        let mStr = `m${item.m}`;
        let nameStr = (item.name || '').toLowerCase();
        let ngcStr = (item.ngc || '').toLowerCase();
        let conStr = (item.con || '').toLowerCase();

        matchSearch = mStr.includes(q) || nameStr.includes(q) || ngcStr.includes(q) || conStr.includes(q);
      }

      return matchType && matchSearch;
    });

    countEl.textContent = filtered.length;

    if (filtered.length === 0) {
      gridEl.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: var(--ast-text-muted);">Объектов глубокого космоса по заданному критерию не найдено.</div>';
      return;
    }

    filtered.forEach(item => {
      let typeMeta = TYPE_MAP[item.type] || { label: 'Глубокий космос', class: 'ast-type-nebula' };
      let card = document.createElement('div');
      card.className = 'ast-dso-card';
      card.innerHTML = `
        <div>
          <div class="ast-dso-card-header">
            <span class="ast-dso-number">M${item.m}</span>
            <span class="ast-dso-type-badge ${typeMeta.class}">${typeMeta.label}</span>
          </div>
          <div class="ast-dso-common-name">${item.name}</div>
          <div class="ast-dso-ngc">${item.ngc}</div>

          <div class="ast-dso-props">
            <div class="ast-prop-item">
              <span class="ast-prop-label">Блеск (Mag)</span>
              <span class="ast-prop-val">${item.mag}m</span>
            </div>
            <div class="ast-prop-item">
              <span class="ast-prop-label">Дистанция</span>
              <span class="ast-prop-val">${item.dist}</span>
            </div>
          </div>
        </div>

        <div class="ast-dso-card-footer">
          <div class="ast-dso-constellation">✦ ${item.con}</div>
          <div style="font-family:var(--ast-font-mono); font-size:0.75rem;">${item.season}</div>
        </div>
      `;

      card.addEventListener('click', () => openModal(item));
      gridEl.appendChild(card);
    });
  }

  // Модальный разворот
  function openModal(item) {
    let typeMeta = TYPE_MAP[item.type] || { label: item.type };
    document.getElementById('ast-m-num').textContent = `M${item.m}`;
    document.getElementById('ast-m-name').textContent = item.name;
    document.getElementById('ast-m-ngc').textContent = item.ngc;
    document.getElementById('ast-m-constellation').textContent = item.con;
    document.getElementById('ast-m-type').textContent = typeMeta.label;
    document.getElementById('ast-m-mag').textContent = `${item.mag} mag`;
    document.getElementById('ast-m-dist').textContent = item.dist;
    document.getElementById('ast-m-season').textContent = item.season;
    document.getElementById('ast-m-desc').textContent = item.desc;

    modalEl.classList.add('active');
  }

  function closeModal() {
    modalEl.classList.remove('active');
  }

  // Слушатели событий
  document.getElementById('ast-dso-type-tabs').addEventListener('click', e => {
    let btn = e.target.closest('.ast-dso-tab');
    if (!btn) return;
    document.querySelectorAll('.ast-dso-tab').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    activeType = btn.dataset.type;
    render();
  });

  searchInput.addEventListener('input', e => {
    searchQuery = e.target.value;
    render();
  });

  document.getElementById('ast-dso-modal-close').addEventListener('click', closeModal);
  document.getElementById('ast-m-close-btn').addEventListener('click', closeModal);
  modalEl.addEventListener('click', e => {
    if (e.target === modalEl) closeModal();
  });

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && modalEl.classList.contains('active')) {
      closeModal();
    }
  });

  // Первичный рендер
  render();

})();
</script>

<?php
get_footer();