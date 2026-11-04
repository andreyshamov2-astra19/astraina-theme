<?php
/**
 * Sky Module Viewport Template (Right Folio Page)
 * Interactive Celestial Sphere & Viewport HUD.
 */
?>
<div class="ast-sky-viewport-wrapper" id="ast-sky-viewport-wrapper">
    <!-- Компас сторон горизонта -->
    <div class="ast-sky-compass-ring" aria-hidden="true">
        <span class="ast-compass-point ast-cp-n">N</span>
        <span class="ast-compass-point ast-cp-e">E</span>
        <span class="ast-compass-point ast-cp-s">S</span>
        <span class="ast-compass-point ast-cp-w">W</span>
    </div>

    <!-- Информационный оверлей выбранной звезды или объекта -->
    <div class="ast-sky-hud-overlay" id="ast-sky-hud-overlay">
        <div class="ast-hud-title" id="ast-hud-target-name"><?php _e('Фокус: Антарес (α Scorpii)', 'astraina'); ?></div>
        <div class="ast-hud-details" id="ast-hud-target-details">
            RA: 16h 29m 24s · Dec: -26° 25' 55" · Mag: 0.96 · Спектр: M1.5Iab
        </div>
    </div>

    <!-- Индикатор активного режима AR -->
    <div class="ast-ar-badge" id="ast-ar-status-badge" style="display: none;">
        <span>⚲ AR SKY TRACKING ACTIVE</span>
    </div>
</div>