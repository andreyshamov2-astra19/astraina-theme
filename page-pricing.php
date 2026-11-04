<?php
/**
 * Template Name: Тарифные Врата
 * Architecture: Samhain Obsidian & Cosmic Gold · Billing Switcher (Month / Annual - 2 Mo Free)
 */
get_header(); ?>
<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 90vh; padding: 50px 20px 90px; color: #E5E7EB;">
    <div style="max-width: 1250px; margin: 0 auto;">
        
        <div style="text-align: center; margin-bottom: 45px;">
            <span style="font-family: monospace; font-size: 11px; color: #F59E0B; letter-spacing: 2px; text-transform: uppercase;">✦ ДОСТУП К АСТРОМЕТРИЧЕСКОМУ ЯДРУ ASTRAINA</span>
            <h1 style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: clamp(28px, 4.5vw, 46px); margin: 12px 0;">Тарифные Врата Обсерватории</h1>
            <p style="color: #94A3B8; max-width: 740px; margin: 0 auto 30px; font-size: 15.5px; line-height: 1.6;">
                От открытого академического познания до постоянного сопровождения натальной карты и B2B кабинета астрологов.
            </p>

            <!-- ИНТЕРАКТИВНЫЙ ПЕРЕКЛЮЧАТЕЛЬ БИЛЛИНГА -->
            <div style="display: inline-flex; align-items: center; gap: 15px; background: rgba(8, 14, 26, 0.95); border: 1px solid rgba(245, 158, 11, 0.35); padding: 8px 18px; border-radius: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.6);">
                <span id="tab-month-label" style="font-size: 13.5px; font-weight: 700; color: #FBBF24; cursor: pointer;" onclick="setBillingCycle('month')">Ежемесячно</span>
                <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                    <input type="checkbox" id="billing-toggle-input" onchange="toggleBillingCycle(this.checked)" style="opacity: 0; width: 0; height: 0;">
                    <span style="position: absolute; cursor: pointer; inset: 0; background-color: rgba(255,255,255,0.15); transition: .3s; border-radius: 34px; border: 1px solid rgba(245,158,11,0.4);" id="toggle-slider"></span>
                </label>
                <span id="tab-year-label" style="font-size: 13.5px; font-weight: 600; color: #94A3B8; cursor: pointer; display: flex; align-items: center; gap: 8px;" onclick="setBillingCycle('year')">
                    Оплата за 1 год
                    <span style="background: linear-gradient(135deg, #10B981 0%, #059669 100%); color: #FFF; font-size: 10.5px; font-weight: 800; padding: 3px 8px; border-radius: 12px; letter-spacing: 0.5px; text-transform: uppercase;">2 месяца в подарок 🎁</span>
                </span>
            </div>
        </div>

        <!-- СЕТКА ТАРИФОВ -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; margin-bottom: 60px;">
            
            <!-- ТАРИФ 1: ИСКАТЕЛЬ (FREE) -->
            <div style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 20px; padding: 35px; backdrop-filter: blur(16px); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <span style="font-family: monospace; font-size: 11px; color: #94A3B8; letter-spacing: 1px;">ГОСТЕВОЙ ДОСТУП</span>
                    <h3 style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: 26px; margin: 8px 0 14px;">Искатель (Free)</h3>
                    <div style="font-size: 32px; font-weight: 700; color: #FDE68A; margin-bottom: 20px;">$0 <span style="font-size: 14px; color: #94A3B8; font-weight: normal;">/ навсегда</span></div>
                    <ul style="list-style: none; padding: 0; margin: 0 0 25px; display: flex; flex-direction: column; gap: 12px; font-size: 13.5px; color: #CBD5E1;">
                        <li>✔ Расчет Натальной карты Placidus (NASA JPL DE440)</li>
                        <li>✔ Лунный Оракул и 1–30 сутки с фазами и практиками</li>
                        <li>✔ 3D Купол Небосвода с Млечным Путем и 8 сторонами света</li>
                        <li>✔ Орбитальный трекер МКС в реальном времени (без API)</li>
                        <li>✔ Экспресс-тестирование 16 Архетипов Карла Юнга</li>
                        <li>✔ Полный суверенитет данных Zero Cloud Store</li>
                    </ul>
                </div>
                <a href="/astro-chart/" style="display: block; text-align: center; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.25); color: #FFF; padding: 13px; border-radius: 30px; text-decoration: none; font-weight: 600; font-size: 13px;">Открыть обсерваторию →</a>
            </div>

            <!-- ТАРИФ 2: COSMIC PASS PRO (ХИТ С ПЕРЕКЛЮЧЕНИЕМ) -->
            <div style="background: linear-gradient(145deg, rgba(8, 14, 26, 0.95) 0%, rgba(225, 29, 72, 0.18) 100%); border: 2px solid #F59E0B; border-radius: 20px; padding: 35px; backdrop-filter: blur(16px); display: flex; flex-direction: column; justify-content: space-between; position: relative; box-shadow: 0 0 40px rgba(245, 158, 11, 0.2);">
                <div style="position: absolute; top: -13px; left: 50%; transform: translateX(-50%); background: #F59E0B; color: #020408; font-size: 10px; font-weight: 800; padding: 4px 14px; border-radius: 20px; letter-spacing: 1.5px; text-transform: uppercase;">РЕКОМЕНДОВАНО</div>
                <div>
                    <span style="font-family: monospace; font-size: 11px; color: #F59E0B; letter-spacing: 1px;">ПОЛНОЕ СОПРОВОЖДЕНИЕ</span>
                    <h3 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; font-size: 26px; margin: 8px 0 14px;">Cosmic Pass PRO</h3>
                    
                    <div style="margin-bottom: 20px;">
                        <div id="cosmic-price-val" style="font-size: 34px; font-weight: 700; color: #FFF; display: inline-block;">$7.99</div>
                        <span id="cosmic-period-label" style="font-size: 14px; color: #94A3B8;">/ месяц</span>
                        <div id="cosmic-subtext" style="font-size: 11.5px; color: #10B981; margin-top: 4px; display: none;">Экономия $15.98 (Оплачиваете 10 мес. вместо 12)</div>
                    </div>

                    <ul style="list-style: none; padding: 0; margin: 0 0 25px; display: flex; flex-direction: column; gap: 12px; font-size: 13.5px; color: #FFF;">
                        <li>★ <strong>Постоянная привязка натала к кабинету</strong> (User Vault — без повторного ввода данных)</li>
                        <li>★ <strong>Ежедневный транзитный гороскоп на 4 дня:</strong> вчера, сегодня, завтра и +2 дня с персональными аспектами</li>
                        <li>★ <strong>Радар профессиональных склонностей (1–10):</strong> Математик, Аналитик, Художник, Менеджер, Дипломат, Ментор с карьерными рекомендациями</li>
                        <li>★ <strong>Интеграция Архетипа Души</strong> в интерпретации транзитов</li>
                        <li>★ Персональный расчет Соляра и совместимости Синастрии</li>
                        <li>★ Безлимитный доступ ко всем 26 порталам обсерватории</li>
                    </ul>
                </div>
                <a id="btn-cosmic-checkout" href="/checkout/?add-to-cart=40" style="display: block; text-align: center; background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: #020408; padding: 14px; border-radius: 30px; text-decoration: none; font-weight: 700; font-size: 13.5px; box-shadow: 0 0 25px rgba(245, 158, 11, 0.4);">Активировать Cosmic Pass PRO →</a>
            </div>

            <!-- ТАРИФ 3: ВЕДУНЬЯ PRO (B2B С ПЕРЕКЛЮЧЕНИЕМ) -->
            <div style="background: rgba(8, 14, 26, 0.88); border: 1px solid rgba(245, 158, 11, 0.4); border-radius: 20px; padding: 35px; backdrop-filter: blur(16px); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <span style="font-family: monospace; font-size: 11px; color: #38BDF8; letter-spacing: 1px;">ПРОФЕССИОНАЛЬНОЕ РАБОЧЕЕ МЕСТО</span>
                    <h3 style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: 26px; margin: 8px 0 14px;">Ведунья Pro B2B</h3>
                    
                    <div style="margin-bottom: 20px;">
                        <div id="vedunya-price-val" style="font-size: 34px; font-weight: 700; color: #38BDF8; display: inline-block;">$29.99</div>
                        <span id="vedunya-period-label" style="font-size: 14px; color: #94A3B8;">/ месяц</span>
                        <div id="vedunya-subtext" style="font-size: 11.5px; color: #10B981; margin-top: 4px; display: none;">Экономия $59.98 (Оплачиваете 10 мес. вместо 12)</div>
                    </div>

                    <ul style="list-style: none; padding: 0; margin: 0 0 25px; display: flex; flex-direction: column; gap: 12px; font-size: 13.5px; color: #CBD5E1;">
                        <li>✔ <strong>Astro-CRM база клиентов:</strong> быстрый поиск и фильтрация</li>
                        <li>✔ <strong>Досье натива:</strong> хранение истории 10 последних расчетов</li>
                        <li>✔ <strong>Зашифрованный Vault (до 10 расчетов):</strong> восстановление базы при очистке браузера</li>
                        <li>✔ <strong>Отправка отчетов в 1 клик:</strong> WhatsApp, Telegram и Email</li>
                        <li>✔ <strong>White-Label брендинг:</strong> загрузка личного логотипа и контактов</li>
                        <li>✔ <strong>Брендированная печать в PDF</strong> без копирайтов платформы</li>
                    </ul>
                </div>
                <a id="btn-vedunya-checkout" href="/checkout/?add-to-cart=45" style="display: block; text-align: center; background: rgba(56, 189, 248, 0.15); border: 1px solid #38BDF8; color: #7DD3FC; padding: 13px; border-radius: 30px; text-decoration: none; font-weight: 700; font-size: 13px;">Войти в кабинет эксперта →</a>
            </div>

        </div>

    </div>
</div>

<style>
#toggle-slider:before {
    position: absolute; content: ""; height: 18px; width: 18px; left: 3px; bottom: 3px;
    background-color: #F59E0B; transition: .3s; border-radius: 50%;
}
#billing-toggle-input:checked + #toggle-slider { background-color: rgba(245, 158, 11, 0.3); }
#billing-toggle-input:checked + #toggle-slider:before { transform: translateX(24px); }
</style>

<script>
function setBillingCycle(mode) {
    const isAnnual = (mode === 'year');
    document.getElementById('billing-toggle-input').checked = isAnnual;
    toggleBillingCycle(isAnnual);
}

function toggleBillingCycle(isAnnual) {
    const monthLbl = document.getElementById('tab-month-label');
    const yearLbl = document.getElementById('tab-year-label');

    const cosmicPrice = document.getElementById('cosmic-price-val');
    const cosmicPeriod = document.getElementById('cosmic-period-label');
    const cosmicSub = document.getElementById('cosmic-subtext');
    const cosmicBtn = document.getElementById('btn-cosmic-checkout');

    const vedunyaPrice = document.getElementById('vedunya-price-val');
    const vedunyaPeriod = document.getElementById('vedunya-period-label');
    const vedunyaSub = document.getElementById('vedunya-subtext');
    const vedunyaBtn = document.getElementById('btn-vedunya-checkout');

    if (isAnnual) {
        monthLbl.style.color = '#94A3B8';
        monthLbl.style.fontWeight = '600';
        yearLbl.style.color = '#FBBF24';
        yearLbl.style.fontWeight = '700';

        // 10 месяцев оплата (2 месяца бесплатно)
        cosmicPrice.textContent = '$79.90';
        cosmicPeriod.textContent = '/ год ($6.65/мес)';
        cosmicSub.style.display = 'block';
        cosmicBtn.href = '/checkout/?add-to-cart=41';

        vedunyaPrice.textContent = '$299.90';
        vedunyaPeriod.textContent = '/ год ($24.99/мес)';
        vedunyaSub.style.display = 'block';
        vedunyaBtn.href = '/checkout/?add-to-cart=46';
    } else {
        monthLbl.style.color = '#FBBF24';
        monthLbl.style.fontWeight = '700';
        yearLbl.style.color = '#94A3B8';
        yearLbl.style.fontWeight = '600';

        cosmicPrice.textContent = '$7.99';
        cosmicPeriod.textContent = '/ месяц';
        cosmicSub.style.display = 'none';
        cosmicBtn.href = '/checkout/?add-to-cart=40';

        vedunyaPrice.textContent = '$29.99';
        vedunyaPeriod.textContent = '/ месяц';
        vedunyaSub.style.display = 'none';
        vedunyaBtn.href = '/checkout/?add-to-cart=45';
    }
}
</script>
<?php get_footer(); ?>