/**
 * ASTRAINA Master Hybrid Acoustic Engine ($500k Luxury Grade)
 * Howler.js 1.5h Sign Ambients + Web Audio 432 Hz Solfeggio & Spatial Chimes.
 * Version: 9.4.0
 */

(function (window) {
    'use strict';

    class AstraAudioEngine {
        constructor() {
            this.mode = 'ambient'; // 'ambient' | 'solfeggio' | 'muted'
            this.currentSign = 'scorpio';
            this.currentHowl = null;
            this.audioCtx = null;
            this.masterGain = null;
            this.filterNode = null;
            this.solfeggio = null;
            this.chimes = null;
            this.isInitialized = false;

            this.basePath = '/wp-content/uploads/astro-ambient/';
        }

        initContext() {
            if (this.isInitialized) return;

            const AudioContextClass = window.AudioContext || window.webkitAudioContext;
            if (AudioContextClass) {
                this.audioCtx = new AudioContextClass();

                // Динамический Low-Pass фильтр бездны
                this.filterNode = this.audioCtx.createBiquadFilter();
                this.filterNode.type = 'lowpass';
                this.filterNode.frequency.setValueAtTime(22000, this.audioCtx.currentTime);

                this.masterGain = this.audioCtx.createGain();
                this.masterGain.gain.setValueAtTime(0.75, this.audioCtx.currentTime);

                this.filterNode.connect(this.masterGain);
                this.masterGain.connect(this.audioCtx.destination);

                this.solfeggio = new window.AstraSolfeggioSynth(this.audioCtx, this.filterNode);
                this.chimes = new window.AstraSpatialChimes(this.audioCtx, this.filterNode);

                this.bindScrollFilter();
            }

            this.isInitialized = true;
        }

        bindScrollFilter() {
            // При прокрутке страницы глубже срез частот создает эффект погружения в космос
            window.addEventListener('scroll', () => {
                if (!this.filterNode || !this.audioCtx) return;
                const scrollY = window.scrollY;
                const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
                const ratio = Math.min(1, scrollY / (maxScroll || 1));

                // Плавный срез от 20 000 Гц до 1 200 Гц
                const targetFreq = 20000 - ratio * 18800;
                this.filterNode.frequency.setTargetAtTime(targetFreq, this.audioCtx.currentTime, 0.1);
            }, { passive: true });
        }

        playSignAmbient(signKey) {
            this.initContext();
            this.currentSign = signKey;

            if (this.mode === 'solfeggio') {
                return; // В режиме чистого 432 Гц внешние MP3 не включаются
            }

            const trackUrl = `${this.basePath}${signKey}.mp3`;

            // Плавное затухание старого трека (Crossfade 2.5s)
            if (this.currentHowl) {
                const oldHowl = this.currentHowl;
                oldHowl.fade(oldHowl.volume(), 0.0, 2500);
                setTimeout(() => { oldHowl.stop(); oldHowl.unload(); }, 2600);
            }

            if (typeof Howl !== 'undefined') {
                this.currentHowl = new Howl({
                    src: [trackUrl],
                    html5: true,
                    loop: true,
                    volume: 0.0,
                    onloaderror: () => {
                        // Если MP3 знака еще не загружен на сервер, включаем процедурный 432 Гц
                        this.solfeggio.start();
                    }
                });

                this.currentHowl.play();
                this.currentHowl.fade(0.0, 0.65, 2500);
            } else {
                this.solfeggio.start();
            }
        }

        toggleSolfeggioMode() {
            this.initContext();

            if (this.mode === 'solfeggio') {
                // Возврат в режим атмосферного эмбиента
                this.solfeggio.stop();
                this.mode = 'ambient';
                this.playSignAmbient(this.currentSign);
                return 'ambient';
            } else {
                // Переход в сакральный режим 432 Гц
                if (this.currentHowl) {
                    this.currentHowl.fade(this.currentHowl.volume(), 0.0, 1500);
                    setTimeout(() => this.currentHowl.stop(), 1600);
                }
                this.solfeggio.start();
                this.mode = 'solfeggio';
                return 'solfeggio';
            }
        }

        playStarChime(xNormalized = 0) {
            this.initContext();
            if (this.chimes) {
                this.chimes.play(xNormalized);
            }
        }
    }

    window.AstraAudioEngine = AstraAudioEngine;
})(window);