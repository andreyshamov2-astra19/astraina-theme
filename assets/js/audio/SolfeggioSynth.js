/**
 * ASTRAINA 432 Hz Solfeggio Frequency Synthesizer
 * Pure Web Audio API · Triple Sine Oscillators with Binaural Micro-Detune.
 * Version: 9.4.0
 */

(function (window) {
    'use strict';

    class SolfeggioSynth {
        constructor(audioCtx, masterGain) {
            this.ctx = audioCtx;
            this.masterGain = masterGain;
            this.isPlaying = false;
            this.oscillators = [];
            this.synthGain = null;
        }

        start() {
            if (this.isPlaying || !this.ctx) return;

            this.synthGain = this.ctx.createGain();
            this.synthGain.gain.setValueAtTime(0.001, this.ctx.currentTime);
            this.synthGain.gain.exponentialRampToValueAtTime(0.35, this.ctx.currentTime + 3.0); // Мягкая атака 3 сек
            this.synthGain.connect(this.masterGain);

            // Тройной осциллятор 432 Гц с микро-биением (Бинауральный эффект)
            const frequencies = [432.0, 431.65, 432.35];

            this.oscillators = frequencies.map((freq) => {
                const osc = this.ctx.createOscillator();
                osc.type = 'sine';
                osc.frequency.setValueAtTime(freq, this.ctx.currentTime);
                osc.connect(this.synthGain);
                osc.start();
                return osc;
            });

            this.isPlaying = true;
        }

        stop() {
            if (!this.isPlaying || !this.synthGain) return;

            this.synthGain.gain.exponentialRampToValueAtTime(0.0001, this.ctx.currentTime + 2.0); // Затухание 2 сек
            setTimeout(() => {
                this.oscillators.forEach((osc) => {
                    try { osc.stop(); osc.disconnect(); } catch (e) {}
                });
                this.oscillators = [];
                if (this.synthGain) {
                    this.synthGain.disconnect();
                    this.synthGain = null;
                }
                this.isPlaying = false;
            }, 2100);
        }
    }

    window.AstraSolfeggioSynth = SolfeggioSynth;
})(window);