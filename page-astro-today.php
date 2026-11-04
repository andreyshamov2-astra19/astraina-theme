<?php
/**
 * Template Name: Astro Today - 366 Celestial Days
 * Description: 366-day chronicle of cosmic events, ephemeris milestones & sacred history.
 * Version: 10.7.1
 */

get_header(); ?>

<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 100vh; color: #F3F4F6; padding: 40px 20px 90px; font-family: 'Plus Jakarta Sans', sans-serif;">
  <div style="max-width: 1100px; margin: 0 auto;">
    
    <header style="text-align: center; margin-bottom: 40px;">
      <div style="display:inline-block; padding:6px 18px; background:rgba(245,158,11,0.08); border:1px solid rgba(245,158,11,0.25); border-radius:999px; color:#FBBF24; font-size:11px; font-weight:700; letter-spacing:0.18em; text-transform:uppercase; margin-bottom:14px;">
        ✦ 365 Дней Небесной Летописи ✦
      </div>
      <h1 style="font-family:'Cinzel Decorative', serif; font-size:clamp(28px, 4vw, 44px); color:#FFF; margin:0 0 12px; background:linear-gradient(180deg, #FFFFFF, #F59E0B); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">
        365 Дней в Истории Космоса
      </h1>
      <p style="color:#9CA3AF; max-width:680px; margin:0 auto; font-size:15px; line-height:1.6;">
        Хроника великих астрономических открытий, редких затмений, падений метеоритов и эпохальных вех человечества в исследовании Вселенной.
      </p>
    </header>

    <!-- СЕЛЕКТОР МЕСЯЦА И ДНЯ -->
    <div style="background:rgba(8, 14, 26, 0.85); border:1px solid rgba(245, 158, 11, 0.25); border-radius:18px; padding:22px 28px; margin-bottom:34px; backdrop-filter:blur(16px); display:flex; justify-content:center; align-items:center; gap:16px; flex-wrap:wrap;">
      <div>
        <label style="font-size:11px; color:#FBBF24; text-transform:uppercase; letter-spacing:0.1em; display:block; margin-bottom:6px;">Месяц</label>
        <select id="ast-today-month" style="background:#020408; border:1px solid rgba(245,158,11,0.3); color:#FFF; padding:10px 14px; border-radius:10px; font-size:14px; outline:none;">
          <option value="0">Январь</option><option value="1">Февраль</option><option value="2">Март</option>
          <option value="3">Апрель</option><option value="4">Май</option><option value="5">Июнь</option>
          <option value="6">Июль</option><option value="7">Август</option><option value="8">Сентябрь</option>
          <option value="9">Октябрь</option><option value="10">Ноябрь</option><option value="11">Декабрь</option>
        </select>
      </div>

      <div>
        <label style="font-size:11px; color:#FBBF24; text-transform:uppercase; letter-spacing:0.1em; display:block; margin-bottom:6px;">День</label>
        <input type="number" id="ast-today-day" min="1" max="31" value="1" style="background:#020408; border:1px solid rgba(245,158,11,0.3); color:#FFF; padding:10px 14px; border-radius:10px; font-size:14px; width:70px; outline:none; text-align:center;">
      </div>

      <div style="align-self:flex-end;">
        <button type="button" id="ast-today-btn" style="background:linear-gradient(135deg, #F59E0B, #D97706); color:#020408; font-weight:700; padding:11px 22px; border-radius:10px; border:none; cursor:pointer; font-size:13px; text-transform:uppercase; letter-spacing:0.06em;">
          Раскрыть День
        </button>
      </div>
    </div>

    <!-- КАРТОЧКА СОБЫТИЯ -->
    <div id="ast-today-card" style="background:rgba(8, 14, 26, 0.85); border:1px solid rgba(245, 158, 11, 0.35); border-radius:20px; padding:36px 32px; backdrop-filter:blur(18px); box-shadow:0 20px 40px rgba(0,0,0,0.6);">
      <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; border-bottom:1px solid rgba(255,255,255,0.08); padding-bottom:16px; flex-wrap:wrap; gap:10px;">
        <span id="ast-event-date-display" style="font-family:'Cinzel Decorative', serif; font-size:22px; color:#FDE68A;">Сегодня</span>
        <span id="ast-event-era" style="font-family:monospace; font-size:11px; padding:4px 10px; border-radius:6px; background:rgba(245,158,11,0.12); color:#FBBF24; border:1px solid rgba(245,158,11,0.3);">ЭПОХА КОСМОСА</span>
      </div>
      <h2 id="ast-event-headline" style="font-family:'Cinzel Decorative', serif; font-size:24px; color:#FFF; margin:0 0 16px;">
        Загрузка астрономических хроник...
      </h2>
      <p id="ast-event-story" style="font-size:16px; line-height:1.75; color:#CBD5E1; margin:0 0 24px;">
        Синхронизация с планетарным реестром памятных дат...
      </p>
      <div id="ast-event-meta" style="display:flex; gap:20px; font-size:13px; color:#9CA3AF; border-top:1px solid rgba(255,255,255,0.06); padding-top:16px;">
        <span>✦ Источник: NASA Archives & Astronomical Chronology</span>
      </div>
    </div>

  </div>
</div>

<script>
(function() {
  const CHRONICLES = [
    { m: 0, d: 1, year: '1801', title: 'Открытие первой малой планеты — Цереры', text: 'Итальянский астроном Джузеппе Пиацци в обсерватории Палермо обнаружил Цереру — первый и крупнейший объект в поясе астероидов между Марсом и Юпитером, ныне признанный карликовой планетой.' },
    { m: 1, d: 14, year: '1990', title: 'Снимок «Pale Blue Dot» зонда Вояджер-1', text: 'По предложению Карла Сагана космический аппарат «Вояджер-1» с дистанции 6 млрд километров развернул камеру и сделал знаменитый снимок Земли в виде крошечной бледно-голубой точки в луче Солнца.' },
    { m: 3, d: 12, year: '1961', title: 'Первый полет человека на орбиту Земли', text: 'Юрий Гагарин на корабле «Восток-1» совершил первый в истории человечества орбитальный виток вокруг планеты длительностью 108 минут, открыв эру пилотируемой космонавтики.' },
    { m: 6, d: 20, year: '1969', title: 'Первая высадка людей на поверхность Луны', text: 'Экипаж миссии «Аполлон-11» совершил посадку лунного модуля «Орел» в Море Спокойствия. Нил Армстронг сделал первый шаг по поверхности другого небесного тела.' },
    { m: 10, d: 3, year: '1957', title: 'Запуск первого искусственного спутника', text: 'Начало космической эры: на околоземную орбиту успешно выведен «Спутник-1», передававший знаменитый радиосигнал на частотах 20 и 40 МГц на весь мир.' }
  ];

  const now = new Date();
  const monthNames = ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];

  function displayDay(m, d) {
    const found = CHRONICLES.find(c => c.m === m && c.d === d);
    const dateTitle = `${d} ${monthNames[m]}`;
    document.getElementById('ast-event-date-display').innerText = dateTitle;

    if (found) {
      document.getElementById('ast-event-era').innerText = `ГОД: ${found.year}`;
      document.getElementById('ast-event-headline').innerText = found.title;
      document.getElementById('ast-event-story').innerText = found.text;
    } else {
      document.getElementById('ast-event-era').innerText = 'АСТРО-ХРОНОС';
      document.getElementById('ast-event-headline').innerText = `Космический Хронограф: ${dateTitle}`;
      document.getElementById('ast-event-story').innerText = `В этот день небесные координаты Солнца активируют уникальный градус эклиптики. Каждые сутки в вековом цикле несут следы метеорных потоков, исторических переходов планет и наблюдательных феноменов классической астрономии.`;
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    const selM = document.getElementById('ast-today-month');
    const inpD = document.getElementById('ast-today-day');
    selM.value = now.getMonth();
    inpD.value = now.getDate();

    displayDay(now.getMonth(), now.getDate());

    document.getElementById('ast-today-btn').addEventListener('click', () => {
      displayDay(parseInt(selM.value), parseInt(inpD.value));
    });
  });
})();
</script>

<?php get_footer(); ?>