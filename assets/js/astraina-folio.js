/**
 * ASTRAINA 3D FOLIO PAGE TURN CONTROLLER
 * Реалистичный разворот книги с шёпотом пергамента и плавным переходом
 */
document.addEventListener('DOMContentLoaded', () => {
    const book = document.getElementById('astraina-book');
    const rightPage = document.getElementById('folio-right-page');
    const leftPage = document.getElementById('folio-left-page');
    const shadowOverlay = document.getElementById('folio-turn-shadow');

    // Перехват кликов по внутренним главам фолианта
    document.querySelectorAll('.folio-turn-trigger').forEach(link => {
        link.addEventListener('click', (e) => {
            const destinationUrl = link.getAttribute('href');
            if (!destinationUrl || destinationUrl.startsWith('#')) return;

            e.preventDefault();

            // 1. Запуск звука перелистывания пергамента
            if (window.astrainaAudio) {
                window.astrainaAudio.playParchmentFlip();
            }

            // 2. Анимация 3D переворота
            if (rightPage && shadowOverlay) {
                rightPage.classList.add('flipping-active');
                shadowOverlay.style.opacity = '1';

                setTimeout(() => {
                    shadowOverlay.style.opacity = '0';
                }, 400);

                // 3. Бесшовный переход после завершения физики листа
                setTimeout(() => {
                    window.location.href = destinationUrl;
                }, 600);
            } else {
                window.location.href = destinationUrl;
            }
        });
    });

    // Привязка кнопки космического звука в шапке
    const soundToggle = document.getElementById('cosmic-sound-toggle');
    if (soundToggle) {
        soundToggle.addEventListener('click', () => {
            if (window.astrainaAudio) {
                window.astrainaAudio.toggleCosmicAmbient((isActive) => {
                    const textSpan = soundToggle.querySelector('.sound-state-text');
                    const pulseDot = soundToggle.querySelector('.sound-dot');
                    if (isActive) {
                        if (textSpan) textSpan.innerText = 'Космос 432 Гц Звучит';
                        if (pulseDot) pulseDot.className = 'sound-dot w-2 h-2 rounded-full bg-[#E11D48] animate-ping';
                    } else {
                        if (textSpan) textSpan.innerText = 'Включить Космос';
                        if (pulseDot) pulseDot.className = 'sound-dot w-2 h-2 rounded-full bg-[#9CA3AF]';
                    }
                });
            }
        });
    }
});