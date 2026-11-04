/**
 * ASTRAINA Master Application Bootstrapper ($500k Luxury Grade)
 * Version: 9.4.0
 */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // 1. Инициализация Звукового Ядра
    if (window.AstraAudioEngine) {
        window.astrainaAudio = new window.AstraAudioEngine();
    }

    // 2. Инициализация 3D WebGL ядра
    if (typeof THREE !== 'undefined' && window.AstraEngine3D) {
        window.astraina3D = new window.AstraEngine3D();

        if (window.AstraConstellationDome) {
            window.astrainaDome = new window.AstraConstellationDome(window.astraina3D.scene);
        }
        if (window.AstraPlanetariumLOD) {
            window.astrainaPlanetarium = new window.AstraPlanetariumLOD(
                window.astraina3D.scene,
                window.astraina3D.camera
            );
        }
    }

    // 3. Интерактивный селектор 12 Знаков Зодиака (Смена 3D + Музыка знака)
    const zodiacButtons = document.querySelectorAll('.ast-zodiac-btn');
    zodiacButtons.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            zodiacButtons.forEach((b) => b.classList.remove('ast-active-sign'));
            btn.classList.add('ast-active-sign');

            const sign = btn.getAttribute('data-sign');

            // 3D обновления
            if (window.astraina3D) window.astraina3D.setSign(sign);
            if (window.astrainaDome) window.astrainaDome.setSign(sign);

            // Акустические обновления
            if (window.astrainaAudio) {
                window.astrainaAudio.playSignAmbient(sign);
                const rect = btn.getBoundingClientRect();
                const xNorm = (rect.left / window.innerWidth) * 2 - 1;
                window.astrainaAudio.playStarChime(xNorm);
            }

            const dockBadge = document.getElementById('ast-dock-sign');
            if (dockBadge) dockBadge.textContent = sign.toUpperCase();
        });
    });

    // 4. Кнопка переключения звука (Ambient / 432 Hz Solfeggio)
    const audioBtn = document.getElementById('ast-audio-toggle-btn');
    if (audioBtn && window.astrainaAudio) {
        audioBtn.addEventListener('click', () => {
            const currentMode = window.astrainaAudio.toggleSolfeggioMode();
            const label = audioBtn.querySelector('.ast-audio-label');
            if (label) {
                label.textContent = currentMode === 'solfeggio' ? '432 Hz ACTIVE' : 'AMBIENT';
            }
            audioBtn.classList.toggle('ast-audio-active', currentMode === 'solfeggio');
        });
    }

    // 5. Инструменты модуля «Купол Неба» (/astro-sky/)
    const zoomSlider = document.getElementById('ast-sky-zoom-slider');
    if (zoomSlider && window.astraina3D) {
        zoomSlider.addEventListener('input', (e) => {
            const fov = parseFloat(e.target.value);
            window.astraina3D.camera.fov = fov;
            window.astraina3D.camera.updateProjectionMatrix();
        });
    }

    const arToggleBtn = document.getElementById('ast-btn-toggle-ar');
    const arBadge = document.getElementById('ast-ar-status-badge');
    if (arToggleBtn && window.astrainaPlanetarium) {
        arToggleBtn.addEventListener('click', () => {
            const active = window.astrainaPlanetarium.toggleAR();
            if (arBadge) arBadge.style.display = active ? 'block' : 'none';
            arToggleBtn.classList.toggle('ast-btn-active', active);
        });
    }

    // 6. Подсказка PWA для пользователей iOS
    const isIos = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    const isStandalone = window.navigator.standalone === true;
    const pwaModal = document.getElementById('ast-ios-pwa-modal');
    const pwaCloseBtn = document.getElementById('ast-pwa-close-btn');

    if (isIos && !isStandalone && pwaModal) {
        setTimeout(() => { pwaModal.style.display = 'block'; }, 3500);
        if (pwaCloseBtn) {
            pwaCloseBtn.addEventListener('click', () => { pwaModal.style.display = 'none'; });
        }
    }
});