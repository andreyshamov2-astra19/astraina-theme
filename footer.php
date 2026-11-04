<?php
/**
 * ASTRAINA — Universal Master Footer
 * 4 Columns Navigation Matrix · 26 Observatory Portals
 * Clean Obsidian & Cosmic Gold Theme · No Technical Clutter
 * Version: 11.0.0
 */
?>

<footer class="ast-site-footer" style="position: relative; z-index: 10; background: linear-gradient(180deg, rgba(2, 4, 8, 0.6) 0%, #020408 100%); border-top: 1px solid rgba(245, 158, 11, 0.2); padding: 60px 20px 40px; font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif; color: #9CA3AF;">
    <div style="max-width: 1280px; margin: 0 auto;">
        
        <!-- СЕТКА ИЗ 4 КОЛОНОК НИЖНЕГО МЕНЮ (ВСЕ 26 ПОРТАЛОВ) -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 36px; margin-bottom: 50px;">
            
            <!-- КОЛОНКА 1: НЕБОСВОД & ХРОНОС (8 ПОРТАЛОВ) -->
            <div>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #F59E0B; font-size: 15px; margin: 0 0 18px; letter-spacing: 0.08em; text-transform: uppercase;">
                    Небосвод & Хронос
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                    <li><a href="<?php echo esc_url(home_url('/astro-calendar/')); ?>" class="ast-footer-link">Календарь Хронос</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-lunar/')); ?>" class="ast-footer-link">Лунный Оракул и Сутки</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-today/')); ?>" class="ast-footer-link">365 Дней в Истории</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-sky/')); ?>" class="ast-footer-link">3D Купол Небосвода (8 920 зв.)</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-iss/')); ?>" class="ast-footer-link">Орбитальный трекер МКС</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-weather/')); ?>" class="ast-footer-link">Погода Космоса & Kp</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-ephemeris/')); ?>" class="ast-footer-link">Атлас 12 тел JPL DE440</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-dso/')); ?>" class="ast-footer-link">Атлас Мессье (DSO)</a></li>
                </ul>
            </div>

            <!-- КОЛОНКА 2: АСТРОМЕТРИЯ & ДУША (7 ПОРТАЛОВ) -->
            <div>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #F59E0B; font-size: 15px; margin: 0 0 18px; letter-spacing: 0.08em; text-transform: uppercase;">
                    Астрометрия & Душа
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                    <li><a href="<?php echo esc_url(home_url('/astro-chart/')); ?>" class="ast-footer-link">Натальная Карта (JPL DE440)</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-synastry/')); ?>" class="ast-footer-link">Синастрия Пар (4 шкалы)</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-archetypes/')); ?>" class="ast-footer-link">16 Архетипов Юнга & Звезды</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-human/')); ?>" class="ast-footer-link">Astro-to-Human Переводчик</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-biorhythms/')); ?>" class="ast-footer-link">Биоритмический Резонанс</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-numerology/')); ?>" class="ast-footer-link">Матрица Нумерологии</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-solar/')); ?>" class="ast-footer-link">Персональный Соляр</a></li>
                </ul>
            </div>

            <!-- КОЛОНКА 3: СОЦИАЛЬНЫЙ ЭФИР (6 ПОРТАЛОВ) -->
            <div>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #F59E0B; font-size: 15px; margin: 0 0 18px; letter-spacing: 0.08em; text-transform: uppercase;">
                    Социальный Эфир
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                    <li><a href="<?php echo esc_url(home_url('/astro-stories/')); ?>" class="ast-footer-link">Stories Карточки 9:16</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-feed/')); ?>" class="ast-footer-link">Friends Transit Feed</a></li>
                    <li><a href="<?php echo esc_url(home_url('/astro-shadow/')); ?>" class="ast-footer-link">Теневые Профили (Shadow)</a></li>
                    <li><a href="<?php echo esc_url(home_url('/celebrity-charts/')); ?>" class="ast-footer-link">Каталог Карт Гениев</a></li>
                    <li><a href="<?php echo esc_url(home_url('/time-capsule/')); ?>" class="ast-footer-link">Капсула Времени</a></li>
                    <li><a href="<?php echo esc_url(home_url('/cosmic-rooms/')); ?>" class="ast-footer-link">Кластерные Круги</a></li>
                </ul>
            </div>

            <!-- КОЛОНКА 4: ЭКОСИСТЕМА & ДОСТУП (5 ПОРТАЛОВ + ПРОДУКТЫ) -->
            <div>
                <h4 style="font-family: 'Cinzel Decorative', serif; color: #F59E0B; font-size: 15px; margin: 0 0 18px; letter-spacing: 0.08em; text-transform: uppercase;">
                    Экосистема & Доступ
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                    <li><a href="<?php echo esc_url(home_url('/vedunya-pro/')); ?>" class="ast-footer-link">Кабинет «Ведунья Pro» B2B</a></li>
                    <li><a href="<?php echo esc_url(home_url('/download/')); ?>" class="ast-footer-link">Приложения (Android APK / iOS)</a></li>
                    <li><a href="<?php echo esc_url(home_url('/pricing/')); ?>" class="ast-footer-link">Тарифные Врата & Cosmic Pass</a></li>
                    <li><a href="<?php echo esc_url(home_url('/privacy/')); ?>" class="ast-footer-link">Кодекс Приватности Данных</a></li>
                    <li><a href="<?php echo esc_url(home_url('/manifesto/')); ?>" class="ast-footer-link">Манифест Сакральности</a></li>
                    <li><a href="<?php echo esc_url(home_url('/checkout/?add-to-cart=40')); ?>" class="ast-footer-link" style="color:#FBBF24;">✦ Cosmic Pass PRO ($7.99)</a></li>
                </ul>
            </div>

        </div>

        <!-- ЛИНИЯ РАЗДЕЛА И САКРАЛЬНЫЙ КОПИРАЙТ -->
        <div style="border-top: 1px solid rgba(255, 255, 255, 0.08); padding-top: 24px; text-align: center;">
            <p style="margin: 0; font-size: 13px; color: #6B7280; letter-spacing: 0.04em;">
                © 2026 <strong style="color: #E5E7EB; font-weight: 600;">Astraina.com</strong>. Все права защищены сакральным суверенитетом. Zero Cloud Store Architecture.
            </p>
        </div>

    </div>
</footer>

<style>
.ast-footer-link {
    color: #94A3B8;
    text-decoration: none;
    font-size: 13.5px;
    line-height: 1.5;
    transition: all 0.2s ease;
    display: inline-block;
}
.ast-footer-link:hover {
    color: #FBBF24;
    transform: translateX(3px);
}
</style>

<!-- ЗАЩИТНЫЙ КОНТЕЙНЕР 3D-ФОЛИАНТА (ARCHITECTURAL SAFEGUARD RULE #3) -->
<div id="ast-folio-wrapper" style="display: none !important; pointer-events: none !important; opacity: 0; position: fixed; inset: 0; z-index: 999999;"></div>

<?php wp_footer(); ?>
</body>
</html>