/**
 * ASTRAINA Living Muse Engine
 * Sinusoidal vertical levitation, ethereal displacement & interactive gaze.
 * Version: 9.4.0
 */

(function (window) {
    'use strict';

    class LivingAstraina {
        constructor() {
            this.container = document.getElementById('ast-muse-container');
            this.currentX = 0;
            this.currentY = 0;
            this.targetX = 0;
            this.targetY = 0;

            this.baseFloatAmplitude = 7.0; // Амплитуда парения ±7px
            this.floatSpeed = 1.4;         // Период дыхания

            this.bindEvents();
        }

        bindEvents() {
            // Интерактивный трекинг курсора мыши
            window.addEventListener('mousemove', (e) => {
                const normX = (e.clientX / window.innerWidth) * 2 - 1;
                const normY = (e.clientY / window.innerHeight) * 2 - 1;
                this.targetX = normX * 14; // Отклонение до 14px
                this.targetY = normY * 10;
            }, { passive: true });

            // Интерактивный трекинг гироскопа смартфона
            if (window.DeviceOrientationEvent) {
                window.addEventListener('deviceorientation', (e) => {
                    if (e.gamma !== null && e.beta !== null) {
                        this.targetX = (e.gamma / 45) * 16;
                        this.targetY = ((e.beta - 45) / 45) * 12;
                    }
                }, { passive: true });
            }
        }

        update(time, delta) {
            if (!this.container) return;

            // Мягкое демпфирование следования за курсором (Lerp 0.05)
            this.currentX += (this.targetX - this.currentX) * 0.05;
            this.currentY += (this.targetY - this.currentY) * 0.05;

            // Сакральная синусоида парения
            const levitation = Math.sin(time * this.floatSpeed) * this.baseFloatAmplitude;
            const tiltAngle = (this.currentX * 0.12).toFixed(2);

            // Аппаратная 3D-трансформация
            this.container.style.transform = `translate3d(${this.currentX.toFixed(2)}px, ${(levitation + this.currentY).toFixed(2)}px, 0) rotateZ(${tiltAngle}deg)`;
        }
    }

    window.AstraLivingAstraina = LivingAstraina;
})(window);