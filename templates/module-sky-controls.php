<?php
/**
 * Sky Module Controls Template (Left Folio Page)
 * Observatory time, coordinates & AR sensor toggles.
 */
?>
<div class="ast-sky-controls-panel">
    
    <div class="ast-form-section">
        <h4 class="ast-control-title"><?php _e('Бортовые Координаты', 'astraina'); ?></h4>
        <div class="ast-geo-badge-row">
            <span class="ast-geo-chip" id="ast-geo-current-lat">55.7558° N</span>
            <span class="ast-geo-chip" id="ast-geo-current-lng">37.6173° E</span>
            <button type="button" class="ast-geo-btn" id="ast-geo-locate-btn">📍 <?php _e('Моё небо', 'astraina'); ?></button>
        </div>
    </div>

    <div class="ast-form-section">
        <h4 class="ast-control-title"><?php _e('Оптический Масштаб (LOD Зум)', 'astraina'); ?></h4>
        <div class="ast-slider-wrap">
            <input type="range" min="20" max="75" value="50" class="ast-range-slider" id="ast-sky-zoom-slider">
            <div class="ast-slider-labels">
                <span>Обзор (5k)</span>
                <span>Телескоп (120k)</span>
            </div>
        </div>
    </div>

    <div class="ast-form-section">
        <h4 class="ast-control-title"><?php _e('Режимы Небосвода', 'astraina'); ?></h4>
        <div class="ast-toggle-grid">
            <label class="ast-checkbox-label">
                <input type="checkbox" id="ast-toggle-threads" checked>
                <span><?php _e('Золотые нити созвездий', 'astraina'); ?></span>
            </label>
            <label class="ast-checkbox-label">
                <input type="checkbox" id="ast-toggle-ecliptic" checked>
                <span><?php _e('Линия эклиптики', 'astraina'); ?></span>
            </label>
            <label class="ast-checkbox-label">
                <input type="checkbox" id="ast-toggle-messier" checked>
                <span><?php _e('Объекты Мессье (DSO)', 'astraina'); ?></span>
            </label>
        </div>
    </div>

    <div class="ast-form-action-row">
        <button type="button" class="ast-luxury-btn" id="ast-btn-toggle-ar">
            <span class="ast-btn-icon">⚲</span> <?php _e('Включить Мобильный Гироскоп (AR)', 'astraina'); ?>
        </button>
    </div>

</div>