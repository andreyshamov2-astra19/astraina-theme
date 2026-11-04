/**
 * ASTRAINA Spatial Crystal Star Chimes
 * High-resonance celestial bells (972 Hz & 1164 Hz) with Stereo Panning.
 * Version: 9.4.0
 */

(function (window) {
    'use strict';

    class SpatialChimes {
        constructor(audioCtx, masterGain) {
            this.ctx = audioCtx;
            this.masterGain = masterGain;
        }

        play(xNormalized = 0) {
            if (!this.ctx) return;
            if (this.ctx.state === 'suspended') {
                this.ctx.resume();
            }

            const now = this.ctx.currentTime;

            // Стерео панорамирование (от -1.0 слева до +1.0 справа)
            const panner = this.ctx.createStereoPanner ? this.ctx.createStereoPanner() : null;
            if (panner) {
                panner.pan.setValueAtTime(Math.max(-1, Math.min(1, xNormalized)), now);
            }

            const gain = this.ctx.createGain();
            gain.gain.setValueAtTime(0.001, now);
            gain.gain.linearRampToValueAtTime(0.18, now + 0.02);
            gain.gain.exponentialRampToValueAtTime(0.0001, now + 1.8);

            // Кристаллические частоты: 972 Гц и терция 1164 Гц
            const osc1 = this.ctx.createOscillator();
            const osc2 = this.ctx.createOscillator();
            osc1.type = 'sine';
            osc2.type = 'sine';
            osc1.frequency.setValueAtTime(972, now);
            osc2.frequency.setValueAtTime(1164, now);

            if (panner) {
                osc1.connect(gain);
                osc2.connect(gain);
                gain.connect(panner);
                panner.connect(this.masterGain);
            } else {
                osc1.connect(gain);
                osc2.connect(gain);
                gain.connect(this.masterGain);
            }

            osc1.start(now);
            osc2.start(now);
            osc1.stop(now + 1.85);
            osc2.stop(now + 1.85);
        }
    }

    window.AstraSpatialChimes = SpatialChimes;
})(window);