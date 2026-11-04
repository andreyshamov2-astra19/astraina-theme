<?php
/**
 * Template Name: Astro-to-Human Translator Portal
 * Description: Сакральный Семантический Переводчик AstraChron: перевод астрологических паттернов на язык психологии, карьеры, эмоционального интеллекта и соматики.
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
   ASTRAINA ASTRO-TO-HUMAN SUITE — SAMHAIN OBSIDIAN & COSMIC GOLD
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

.ast-hmn-container {
  max-width: 1320px;
  margin: 0 auto;
  padding: 120px 24px 80px;
  color: var(--ast-text-primary);
  font-family: var(--ast-font-sans);
}

/* Заголовок страницы */
.ast-hmn-header {
  text-align: center;
  margin-bottom: 44px;
}

.ast-hmn-badge {
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

.ast-hmn-badge-pulse {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--ast-gold);
  box-shadow: 0 0 10px var(--ast-gold);
  animation: astHmnPulse 2s infinite;
}

@keyframes astHmnPulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.4; transform: scale(0.85); }
}

.ast-hmn-title {
  font-family: var(--ast-font-serif);
  font-size: clamp(2rem, 4.2vw, 3.2rem);
  font-weight: 600;
  color: #fff;
  letter-spacing: 0.04em;
  line-height: 1.18;
  margin: 0 0 14px;
  text-shadow: 0 0 35px rgba(245, 158, 11, 0.25);
}

.ast-hmn-subtitle {
  max-width: 760px;
  margin: 0 auto;
  color: var(--ast-text-secondary);
  font-size: 1.02rem;
  line-height: 1.6;
}

/* Конструктор перевода */
.ast-hmn-constructor {
  background: var(--ast-glass-bg);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 20px;
  padding: 30px;
  backdrop-filter: blur(20px);
  box-shadow: 0 20px 45px rgba(0, 0, 0, 0.45);
  margin-bottom: 38px;
}

.ast-hmn-cons-title {
  font-family: var(--ast-font-serif);
  font-size: 1.25rem;
  color: var(--ast-gold-light);
  margin: 0 0 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.ast-hmn-selectors-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 16px;
  margin-bottom: 24px;
}

.ast-hmn-select-wrap {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.ast-hmn-label {
  font-size: 0.76rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--ast-text-muted);
  font-family: var(--ast-font-mono);
}

.ast-hmn-select {
  width: 100%;
  padding: 12px 14px;
  background: rgba(2, 6, 12, 0.85);
  border: 1px solid rgba(245, 158, 11, 0.25);
  border-radius: 10px;
  color: #fff;
  font-family: var(--ast-font-sans);
  font-size: 0.92rem;
  outline: none;
  cursor: pointer;
  transition: all 0.25s ease;
}

.ast-hmn-select:focus {
  border-color: var(--ast-gold);
  box-shadow: 0 0 14px rgba(245, 158, 11, 0.3);
}

.ast-hmn-actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 14px;
  border-top: 1px solid rgba(245, 158, 11, 0.12);
  padding-top: 20px;
}

.ast-hmn-btn {
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.25), rgba(217, 119, 6, 0.15));
  border: 1px solid var(--ast-gold);
  color: #fff;
  padding: 12px 28px;
  border-radius: 10px;
  font-size: 0.95rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.25s ease;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.ast-hmn-btn:hover {
  background: var(--ast-gold);
  color: #020408;
  box-shadow: 0 0 20px rgba(245, 158, 11, 0.45);
  transform: translateY(-1px);
}

.ast-hmn-preset-tags {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: wrap;
}

.ast-preset-tag {
  background: rgba(15, 23, 42, 0.6);
  border: 1px solid rgba(148, 163, 184, 0.15);
  padding: 6px 12px;
  border-radius: 6px;
  font-size: 0.78rem;
  color: var(--ast-text-secondary);
  cursor: pointer;
  transition: all 0.2s ease;
}

.ast-preset-tag:hover {
  border-color: var(--ast-gold-border);
  color: var(--ast-gold-light);
}

/* Карточки 4 Измерений Перевода */
.ast-hmn-results-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 22px;
  margin-bottom: 44px;
}

@media (max-width: 860px) {
  .ast-hmn-results-grid {
    grid-template-columns: 1fr;
  }
}

.ast-result-card {
  background: var(--ast-glass-card);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 18px;
  padding: 26px;
  backdrop-filter: blur(16px);
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}

.ast-result-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 3px;
}

.ast-card-psych::before { background: linear-gradient(90deg, transparent, var(--ast-purple), transparent); }
.ast-card-power::before { background: linear-gradient(90deg, transparent, var(--ast-emerald), transparent); }
.ast-card-shadow::before { background: linear-gradient(90deg, transparent, var(--ast-ruby), transparent); }
.ast-card-action::before { background: linear-gradient(90deg, transparent, var(--ast-cyan), transparent); }

.ast-res-head {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 14px;
}

.ast-res-icon {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
}

.ast-card-psych .ast-res-icon { background: rgba(192, 132, 252, 0.12); color: var(--ast-purple); border: 1px solid rgba(192, 132, 252, 0.25); }
.ast-card-power .ast-res-icon { background: var(--ast-emerald-dim); color: var(--ast-emerald); border: 1px solid rgba(16, 185, 129, 0.25); }
.ast-card-shadow .ast-res-icon { background: var(--ast-ruby-dim); color: var(--ast-ruby); border: 1px solid rgba(244, 63, 94, 0.25); }
.ast-card-action .ast-res-icon { background: var(--ast-cyan-dim); color: var(--ast-cyan); border: 1px solid rgba(56, 189, 248, 0.25); }

.ast-res-title {
  font-family: var(--ast-font-serif);
  font-size: 1.2rem;
  color: #fff;
  margin: 0;
}

.ast-res-tagline {
  font-size: 0.78rem;
  color: var(--ast-text-muted);
  text-transform: uppercase;
  letter-spacing: 0.06em;
}

.ast-res-body {
  font-size: 0.95rem;
  line-height: 1.65;
  color: var(--ast-text-secondary);
  flex: 1;
}

.ast-res-quote {
  margin-top: 18px;
  padding: 12px 14px;
  background: rgba(2, 6, 14, 0.45);
  border-left: 3px solid var(--ast-gold);
  border-radius: 4px;
  font-size: 0.88rem;
  color: var(--ast-gold-light);
  font-style: italic;
}

/* Секция Экспресс-Разборов Эпохи */
.ast-transits-section {
  background: var(--ast-glass-card);
  border: 1px solid var(--ast-border-subtle);
  border-radius: 20px;
  padding: 30px;
  backdrop-filter: blur(18px);
}

.ast-transits-title {
  font-family: var(--ast-font-serif);
  font-size: 1.35rem;
  color: #fff;
  margin: 0 0 8px;
}

.ast-transits-sub {
  font-size: 0.88rem;
  color: var(--ast-text-secondary);
  margin-bottom: 22px;
}

.ast-transits-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 16px;
}

.ast-transit-item {
  background: rgba(2, 6, 14, 0.55);
  border: 1px solid rgba(245, 158, 11, 0.12);
  border-radius: 12px;
  padding: 18px;
  cursor: pointer;
  transition: all 0.25s ease;
}

.ast-transit-item:hover {
  border-color: var(--ast-gold);
  transform: translateY(-2px);
  box-shadow: 0 10px 24px rgba(0, 0, 0, 0.4);
}

.ast-transit-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 8px;
}

.ast-transit-name {
  font-weight: 600;
  color: var(--ast-gold-light);
  font-size: 0.95rem;
}

.ast-transit-age {
  font-family: var(--ast-font-mono);
  font-size: 0.75rem;
  color: var(--ast-cyan);
  background: var(--ast-cyan-dim);
  padding: 2px 8px;
  border-radius: 4px;
}

.ast-transit-desc {
  font-size: 0.84rem;
  color: var(--ast-text-secondary);
  line-height: 1.5;
}

/* Режим A4 Print Safeguard */
@media print {
  body {
    background: #fff !important;
    color: #000 !important;
  }
  header, footer, #ast-canvas-3d, .ast-hmn-constructor, .ast-transits-section, .main-audio-bar-slim {
    display: none !important;
  }
  .ast-page-wrapper {
    background: #fff !important;
  }
  .ast-hmn-container {
    padding: 0 !important;
    max-width: 100% !important;
  }
  .ast-hmn-title {
    color: #000 !important;
    text-shadow: none !important;
  }
  .ast-result-card {
    background: #fff !important;
    border: 1px solid #ccc !important;
    color: #000 !important;
    box-shadow: none !important;
    page-break-inside: avoid;
  }
  .ast-res-title, .ast-res-body {
    color: #000 !important;
  }
  .ast-res-quote {
    background: #f4f4f4 !important;
    color: #111 !important;
    border-left-color: #000 !important;
  }
}
</style>

<div class="ast-hmn-container">

  <!-- Хедер портала -->
  <header class="ast-hmn-header">
    <div class="ast-hmn-badge">
      <span class="ast-hmn-badge-pulse"></span>
      <span>AstraChron Cognitive Core · Astro-to-Human Protocol</span>
    </div>
    <h1 class="ast-hmn-title">Astro-to-Human Переводчик</h1>
    <p class="ast-hmn-subtitle">
      Трансляция астрологических кодов на чистый язык современной психоаналитики, 
      эмоционального баланса, профессиональной реализации и телесных практик.
    </p>
  </header>

  <!-- Интерактивный Семантический Конструктор -->
  <div class="ast-hmn-constructor">
    <div class="ast-hmn-cons-title">
      <span>✦ Сконфигурируйте небесный код для перевода</span>
      <span style="font-size: 0.82rem; font-family: var(--ast-font-mono); color: var(--ast-text-muted);">Без архаичного эзотеризма</span>
    </div>

    <div class="ast-hmn-selectors-grid">
      <!-- Селектор Планеты -->
      <div class="ast-hmn-select-wrap">
        <label for="ast-sel-planet" class="ast-hmn-label">1. Небесный Архетип (Тело)</label>
        <select id="ast-sel-planet" class="ast-hmn-select">
          <option value="sun">☉ Солнце (Ядро Сознания & Воля)</option>
          <option value="moon">☽ Луна (Психика & Чувство Безопасности)</option>
          <option value="mercury">☿ Меркурий (Интеллект & Коммуникация)</option>
          <option value="venus">♀ Венера (Система Ценностей & Выбор)</option>
          <option value="mars">♂ Марс (Импульс Действия & Защита)</option>
          <option value="jupiter">♃ Юпитер (Масштаб, Философия & Удача)</option>
          <option value="saturn">♄ Сатурн (Дисциплина, Границы & Время)</option>
          <option value="uranus">♅ Уран (Инсайт, Свобода & Инновации)</option>
          <option value="neptune">♆ Нептун (Интуиция, Эмпатия & Воображение)</option>
          <option value="pluto">♇ Плутон (Трансформация, Власть & Ресурс)</option>
        </select>
      </div>

      <!-- Селектор Знака -->
      <div class="ast-hmn-select-wrap">
        <label for="ast-sel-sign" class="ast-hmn-label">2. Психотип Проявления (Знак)</label>
        <select id="ast-sel-sign" class="ast-hmn-select">
          <option value="aries">♈ Овен (Прямота, Инициатива, Скорость)</option>
          <option value="taurus">♉ Телец (Основательность, Материя, Покой)</option>
          <option value="gemini">♊ Близнецы (Любопытство, Сети, Адаптивность)</option>
          <option value="cancer">♋ Рак (Глубина, Забота, Родовая Память)</option>
          <option value="leo">♌ Лев (Творчество, Щедрость, Аутентичность)</option>
          <option value="virgo">♍ Дева (Анализ, Точность, Системная Польза)</option>
          <option value="libra">♎ Весы (Баланс, Дипломатия, Эстетика)</option>
          <option value="scorpio">♏ Скорпион (Проницательность, Кризис-Менеджмент)</option>
          <option value="sagittarius">♐ Стрелец (Вектор Смысла, Экспансия, Мудрость)</option>
          <option value="capricorn">♑ Козерог (Стратегия, Автономия, Достижения)</option>
          <option value="aquarius">♒ Водолей (Визионерство, Независимость, Идеи)</option>
          <option value="pisces">♓ Рыбы (Синтез, Тонкие Планы, Сострадание)</option>
        </select>
      </div>

      <!-- Селектор Дома -->
      <div class="ast-hmn-select-wrap">
        <label for="ast-sel-house" class="ast-hmn-label">3. Сфера Жизни (Дом)</label>
        <select id="ast-sel-house" class="ast-hmn-select">
          <option value="1">I Дом — Личность, Тело & Первое впечатление</option>
          <option value="2">II Дом — Личные Финансы, Ресурсность & Тело</option>
          <option value="3">III Дом — Ближнее Окружение, Навыки & Контакты</option>
          <option value="4">IV Дом — Фундамент, Семья & Личное Убежище</option>
          <option value="5">V Дом — Самовыражение, Радость & Авторство</option>
          <option value="6">VI Дом — Ежедневный Труд, Рутина & Здоровье</option>
          <option value="7">VII Дом — Партнерство Равных & Соглашения</option>
          <option value="8">VIII Дом — Крупные Чужие Ресурсы, Кризисы & Слияние</option>
          <option value="9">IX Дом — Мировоззрение, Преподавание & Горизонты</option>
          <option value="10">X Дом — Карьерный Олимп, Статус & Миссия</option>
          <option value="11">XI Дом — Сообщества, Будущее & Единомышленники</option>
          <option value="12">XII Дом — Внутренний Скит, Творчество & Подсознание</option>
        </select>
      </div>

      <!-- Селектор Динамики / Аспекта -->
      <div class="ast-hmn-select-wrap">
        <label for="ast-sel-aspect" class="ast-hmn-label">4. Энергетический Вектор</label>
        <select id="ast-sel-aspect" class="ast-hmn-select">
          <option value="harmonic">Гармоничный (Ресурсный поток / Дар)</option>
          <option value="dynamic">Динамичный (Вызов / Точка Роста / Трение)</option>
        </select>
      </div>
    </div>

    <div class="ast-hmn-actions">
      <div class="ast-hmn-preset-tags">
        <span style="font-size:0.75rem; color:var(--ast-text-muted);">Быстрые профили:</span>
        <button type="button" class="ast-preset-tag" data-p="mars" data-s="scorpio" data-h="8" data-a="dynamic">Марс в Скорпионе 8Д</button>
        <button type="button" class="ast-preset-tag" data-p="saturn" data-s="capricorn" data-h="10" data-a="harmonic">Сатурн в Козероге 10Д</button>
        <button type="button" class="ast-preset-tag" data-p="moon" data-s="cancer" data-h="4" data-a="harmonic">Луна в Раке 4Д</button>
        <button type="button" class="ast-preset-tag" data-p="mercury" data-s="aquarius" data-h="11" data-a="dynamic">Меркурий в Водолее 11Д</button>
      </div>

      <button type="button" class="ast-hmn-btn" id="ast-hmn-translate-btn">
        <span>Перевести на Человеческий</span>
        <span>→</span>
      </button>
    </div>
  </div>

  <!-- Результаты: 4 Ключевых Измерения -->
  <div class="ast-hmn-results-grid" id="ast-hmn-results">

    <!-- 1. Психика и Внутренний Драйв -->
    <div class="ast-result-card ast-card-psych">
      <div class="ast-res-head">
        <div class="ast-res-icon">🧠</div>
        <div>
          <h3 class="ast-res-title">Психологический Паттерн</h3>
          <div class="ast-res-tagline">Внутренняя механика сознания</div>
        </div>
      </div>
      <div class="ast-res-body" id="ast-out-psych">
        Загрузка интерпретации...
      </div>
      <div class="ast-res-quote" id="ast-quote-psych">
        «Осознание паттерна превращает автоматическую реакцию в осознанный выбор.»
      </div>
    </div>

    <!-- 2. Профессиональная Суперсила -->
    <div class="ast-result-card ast-card-power">
      <div class="ast-res-head">
        <div class="ast-res-icon">⚡</div>
        <div>
          <h3 class="ast-res-title">Суперсила & Капитализация</h3>
          <div class="ast-res-tagline">Где кроется ваше конкурентное преимущество</div>
        </div>
      </div>
      <div class="ast-res-body" id="ast-out-power">
        Загрузка интерпретации...
      </div>
      <div class="ast-res-quote" id="ast-quote-power">
        «Истинный талант не требует сверхусилий — он требует точного русла приложения.»
      </div>
    </div>

    <!-- 3. Теневая Ловушка & Риски Истощения -->
    <div class="ast-result-card ast-card-shadow">
      <div class="ast-res-head">
        <div class="ast-res-icon">🌑</div>
        <div>
          <h3 class="ast-res-title">Теневая Ловушка</h3>
          <div class="ast-res-tagline">Точки утечки энергии и триггеры выгорания</div>
        </div>
      </div>
      <div class="ast-res-body" id="ast-out-shadow">
        Загрузка интерпретации...
      </div>
      <div class="ast-res-quote" id="ast-quote-shadow">
        «Тень — это не враг, а законсервированная сила, требующая зрелого руководства.»
      </div>
    </div>

    <!-- 4. Практический Протокол Действий -->
    <div class="ast-result-card ast-card-action">
      <div class="ast-res-head">
        <div class="ast-res-icon">🎯</div>
        <div>
          <h3 class="ast-res-title">Протокол Декомпрессии</h3>
          <div class="ast-res-tagline">Телесные и ментальные действия в реальной жизни</div>
        </div>
      </div>
      <div class="ast-res-body" id="ast-out-action">
        Загрузка интерпретации...
      </div>
      <div class="ast-res-quote" id="ast-quote-action">
        «Любая космическая конфигурация шлифуется через привычки физического тела.»
      </div>
    </div>

  </div>

  <!-- Раздел: Великие Возрастные Переходы Человека -->
  <div class="ast-transits-section">
    <h3 class="ast-transits-title">Сакральные Возрастные Инициации (Великие Циклы)</h3>
    <p class="ast-transits-sub">
      Объективные этапы перестройки нейросети и жизненного вектора, через которые проходит каждый Человек:
    </p>

    <div class="ast-transits-grid">
      <div class="ast-transit-item" data-cycle="saturn-return">
        <div class="ast-transit-head">
          <span class="ast-transit-name">Первый Возврат Сатурна</span>
          <span class="ast-transit-age">28 – 30 лет</span>
        </div>
        <div class="ast-transit-desc">
          Экзамен на сепарацию и подлинную взрослость. Разрушение навязанных иллюзий, кристаллизация собственного авторитета и уход из чужих игр.
        </div>
      </div>

      <div class="ast-transit-item" data-cycle="uranus-opp">
        <div class="ast-transit-head">
          <span class="ast-transit-name">Оппозиция Урана («Кризис 40 лет»)</span>
          <span class="ast-transit-age">40 – 42 года</span>
        </div>
        <div class="ast-transit-desc">
          Вспышка экзистенциальной жажды свободы. Человек осознает конечность времени и сбрасывает чуждые социальные маски ради истинной самости.
        </div>
      </div>

      <div class="ast-transit-item" data-cycle="chiron-return">
        <div class="ast-transit-head">
          <span class="ast-transit-name">Возврат Хирона (Исцеление Мастера)</span>
          <span class="ast-transit-age">50 – 51 год</span>
        </div>
        <div class="ast-transit-desc">
          Интеграция глубочайших душевных ран. Переход из роли борца в статус Наставника, способного исцелять других прожитым опытом.
        </div>
      </div>

      <div class="ast-transit-item" data-cycle="second-saturn">
        <div class="ast-transit-head">
          <span class="ast-transit-name">Второй Возврат Сатурна</span>
          <span class="ast-transit-age">58 – 60 лет</span>
        </div>
        <div class="ast-transit-desc">
          Обретение монументального достоинства Старейшины. Подведение итогов социальной экспансии и кристаллизация чистого духовного наследия.
        </div>
      </div>
    </div>
  </div>

</div>
</div>

<script>
/**
 * ASTRAINA ASTRO-TO-HUMAN ENGINE (v10.3)
 * Семантический переводчик архетипов на язык психологии, соматики и стратегии.
 */
(function() {
  'use strict';

  // Психологическая матрица планет
  const PLANET_DATA = {
    sun: { name: 'Солнце', role: 'Ядро самости и витальная энергия', verb: 'Осознавать и светить' },
    moon: { name: 'Луна', role: 'Эмоциональный метаболизм и адаптация', verb: 'Чувствовать и оберегать' },
    mercury: { name: 'Меркурий', role: 'Когнитивные фильтры и нейронные связи', verb: 'Структурировать и передавать' },
    venus: { name: 'Венера', role: 'Шкала предпочтений и межличностный выбор', verb: 'Оценивать и гармонизировать' },
    mars: { name: 'Марс', role: 'Исполнительный волевой вектор и драйв', verb: 'Преодолевать и достигать' },
    jupiter: { name: 'Юпитер', role: 'Интегральная картина мира и доверие жизни', verb: 'Расширять и синтезировать' },
    saturn: { name: 'Сатурн', role: 'Структурная прочность и самодисциплина', verb: 'Кристаллизовать и сохранять' },
    uranus: { name: 'Уран', role: 'Внезапные озарения и выход из матрицы', verb: 'Реформировать и освобождать' },
    neptune: { name: 'Нептун', role: 'Трансперсональное восприятие и эмпатия', verb: 'Растворять и вдохновлять' },
    pluto: { name: 'Плутон', role: 'Регенерация через кризис и глубинная воля', verb: 'Трансформировать и перерождать' }
  };

  // Семантика знаков
  const SIGN_DATA = {
    aries: { name: 'Овне', style: 'через прямой импульс, высокую скорость и соревновательность', focus: 'быстрый старт' },
    taurus: { name: 'Тельце', style: 'через материальную устойчивость, гедонизм и тактильность', focus: 'накопление ресурса' },
    gemini: { name: 'Близнецах', style: 'через полифоничность интересов, легкость и обмен данными', focus: 'информационный поток' },
    cancer: { name: 'Раке', style: 'через глубинную эмоциональную привязанность и интуитивную защиту', focus: 'безопасность гнезда' },
    leo: { name: 'Льве', style: 'через персональную харизму, авторский почерк и признание', focus: 'яркое самовыражение' },
    virgo: { name: 'Деве', style: 'через оптимизацию процессов, критический анализ и сервис', focus: 'доведение до идеала' },
    libra: { name: 'Весах', style: 'через поиск эстетического баланса, переговоры и компромисс', focus: 'дипломатический консенсус' },
    scorpio: { name: 'Скорпионе', style: 'через предельное погружение в суть, кризис-контроль и невидимую власть', focus: 'трансформация глубины' },
    sagittarius: { name: 'Стрельце', style: 'через стратегическое визионерство, этику и расширение горизонтов', focus: 'глобальный ориентир' },
    capricorn: { name: 'Козероге', style: 'через железобетонную выдержку, статус и долгосрочный план', focus: 'вершина мастерства' },
    aquarius: { name: 'Водолее', style: 'через опережение своего времени, дружбу равных и нонконформизм', focus: 'будущее сообщества' },
    pisces: { name: 'Рыбах', style: 'через интуитивное слияние с потоком, сострадание и многомерные смыслы', focus: 'мистический синтез' }
  };

  // Сферы домов
  const HOUSE_DATA = {
    '1': 'в зоне персонального бренда, визитной карточки и первого шага навстречу миру',
    '2': 'в управлении личным энергетическим и финансовым фундаментом',
    '3': 'в повседневных контактах, интеллектуальных спринтах и ближнем круге',
    '4': 'в сакральном пространстве дома, родовых корней и внутренней тишины',
    '5': 'в поле чистого творчества, личных проектов, страсти и внутреннего ребенка',
    '6': 'в плоскости профессионального мастерства, инструментов и телесного здоровья',
    '7': 'в зеркале ключевых партнерств один-на-один и долгосрочных союзов',
    '8': 'в зоне высокого риска, чужого крупного капитала, психоанализа и перерождения',
    '9': 'в пространстве больших идей, глобальных путешествий, менторства и смыслов',
    '10': 'на вершине социального признания, персональной репутации и жизненного призвания',
    '11': 'в нетворкинге будущего, кругах единомышленников и масштабных проектах',
    '12': 'в сокровенном скиту подсознания, медитативных глубинах и закрытых системах'
  };

  // Генерация расшифровки
  function generateTranslation() {
    const planetKey = document.getElementById('ast-sel-planet').value;
    const signKey = document.getElementById('ast-sel-sign').value;
    const houseKey = document.getElementById('ast-sel-house').value;
    const aspectKey = document.getElementById('ast-sel-aspect').value;

    const p = PLANET_DATA[planetKey];
    const s = SIGN_DATA[signKey];
    const h = HOUSE_DATA[houseKey];
    const isHarmonic = aspectKey === 'harmonic';

    // 1. Психологический паттерн
    let psychText = `В структуре вашей психики функция <strong>«${p.name}»</strong> (${p.role.toLowerCase()}) действует строго ${s.style}. Человек интуитивно ощущает потребность развернуть эту энергию ${h}. `;
    if (isHarmonic) {
      psychText += `Внутренний импульс протекает естественно, без изнуряющей внутренней борьбы. Вы доверяете этой части своей природы и легко интегрируете её в повседневные решения.`;
    } else {
      psychText += `Присутствует внутреннее напряжение или сомнение: человек часто раскачивается между гиперответственностью и желанием дистанцироваться, что создает мощное топливо для личностной эволюции.`;
    }

    // 2. Суперсила
    let powerText = `Ваше конкурентное преимущество формируется там, где другие пасуют. Умение реализовывать архетип ${p.name} с фокусом на <strong>${s.focus}</strong> позволяет вам филигранно управлять ситуациями ${h}. `;
    if (isHarmonic) {
      powerText += `Люди считывают в вас природное спокойствие и органичный авторитет в этих вопросах. Ваш ресурс капитализируется через создание стабильных систем и красивых решений.`;
    } else {
      powerText += `Именно преодоление сложностей делает вас первоклассным стратегом. Вы способны совершать прорывы в экстремальных условиях, превращая стресс в кристальное хладнокровие.`;
    }

    // 3. Теневая ловушка
    let shadowText = `Теневой аспект проявляется, когда ресурс истощен. В этот момент фокус на ${s.focus} гипертрофируется: `;
    if (planetKey === 'mars') shadowText += `появляется скрытая пассивная агрессия или импульсивное сжигание мостов. `;
    else if (planetKey === 'saturn') shadowText += `включается синдром самозванца, эмоциональный холод и возведение глухих стен вокруг себя. `;
    else if (planetKey === 'moon') shadowText += `человек уходит в тревожное зависание, эмоциональное переедание или поиск виноватых вовне. `;
    else shadowText += `включается ментальная жвачка, перфекционизм или стремление всё контролировать в одиночку. `;
    shadowText += `Точка риска: распыление сил на борьбу с ветряными мельницами вместо ясной фиксации личных границ.`;

    // 4. Практический протокол
    let actionText = `Рекомендации для заземления и декомпрессии этой конфигурации:<br><br>`;
    actionText += `✦ <strong>Физическое тело:</strong> регулярные соматические практики, возвращающие контакт с опорой (ходьба, дыхание животом, массаж воротниковой зоны).<br>`;
    actionText += `✦ <strong>Информационная гигиена:</strong> исключить принятие решений на пике эмоционального импульса. Ввести обязательную паузу в 24 часа.<br>`;
    actionText += `✦ <strong>Профессиональный фокус:</strong> делегировать рутину, освободив время под главную функцию — ${p.verb.toLowerCase()} без оглядки на чужие ожидания.`;

    // Обновление DOM
    document.getElementById('ast-out-psych').innerHTML = psychText;
    document.getElementById('ast-out-power').innerHTML = powerText;
    document.getElementById('ast-out-shadow').innerHTML = shadowText;
    document.getElementById('ast-out-action').innerHTML = actionText;
  }

  // Слушатели быстрых пресетов
  document.querySelectorAll('.ast-preset-tag').forEach(tag => {
    tag.addEventListener('click', function() {
      document.getElementById('ast-sel-planet').value = this.dataset.p;
      document.getElementById('ast-sel-sign').value = this.dataset.s;
      document.getElementById('ast-sel-house').value = this.dataset.h;
      document.getElementById('ast-sel-aspect').value = this.dataset.a;
      generateTranslation();
    });
  });

  // Кнопка генерации
  document.getElementById('ast-hmn-translate-btn').addEventListener('click', generateTranslation);

  // Первичный запуск
  document.addEventListener('DOMContentLoaded', generateTranslation);
  generateTranslation();

})();
</script>

<?php
get_footer();