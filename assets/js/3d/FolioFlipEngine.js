/**
 * ASTRAINA Folio & 3D Flip Engine ($500k Luxury Grade)
 * Version: 9.4.0
 */

(function (window, document) {
    'use strict';

    class FolioFlipEngine {
        constructor() {
            this.overlay = document.getElementById('ast-folio-leaf-overlay');
            this.turningLeaf = document.getElementById('ast-folio-turning-leaf');
            this.audioCtx = null;
            this.isAnimating = false;
            this.durationMs = 550;

            this.init();
        }

        init() {
            if (!this.overlay || !this.turningLeaf) return;
            this.unlockPointerEvents();
            this.bindNavigationTransitions();
        }

        unlockPointerEvents() {
            this.overlay.classList.remove('ast-turning-active');
            this.overlay.style.pointerEvents = 'none';
            this.overlay.style.display = 'none';
            this.isAnimating = false;
        }

        ensureAudioContext() {
            if (!this.audioCtx) {
                const AudioContextClass = window.AudioContext || window.webkitAudioContext;
                if (AudioContextClass) {
                    this.audioCtx = new AudioContextClass();
                }
            }
            if (this.audioCtx && this.audioCtx.state === 'suspended') {
                this.audioCtx.resume();
            }
        }

        playParchmentRustle() {
            try {
                this.ensureAudioContext();
                if (!this.audioCtx) return;

                const bufferSize = this.audioCtx.sampleRate * 0.45;
                const noiseBuffer = this.audioCtx.createBuffer(1, bufferSize, this.audioCtx.sampleRate);
                const output = noiseBuffer.getChannelData(0);

                let b0 = 0, b1 = 0, b2 = 0;
                for (let i = 0; i < bufferSize; i++) {
                    const white = Math.random() * 2 - 1;
                    b0 = 0.99886 * b0 + white * 0.0555179;
                    b1 = 0.99332 * b1 + white * 0.0750759;
                    b2 = 0.96900 * b2 + white * 0.1538520;
                    output[i] = (b0 + b1 + b2) * 0.12;
                }

                const whiteNoise = this.audioCtx.createBufferSource();
                whiteNoise.buffer = noiseBuffer;

                const filter = this.audioCtx.createBiquadFilter();
                filter.type = 'bandpass';
                filter.frequency.setValueAtTime(850, this.audioCtx.currentTime);
                filter.Q.setValueAtTime(1.8, this.audioCtx.currentTime);
                filter.frequency.exponentialRampToValueAtTime(350, this.audioCtx.currentTime + 0.45);

                const gainNode = this.audioCtx.createGain();
                gainNode.gain.setValueAtTime(0.001, this.audioCtx.currentTime);
                gainNode.gain.linearRampToValueAtTime(0.25, this.audioCtx.currentTime + 0.08);
                gainNode.gain.exponentialRampToValueAtTime(0.001, this.audioCtx.currentTime + 0.45);

                whiteNoise.connect(filter);
                filter.connect(gainNode);
                gainNode.connect(this.audioCtx.destination);

                whiteNoise.start();
                whiteNoise.stop(this.audioCtx.currentTime + 0.45);
            } catch (err) {}
        }

        flipPage(onMidpointCallback) {
            if (this.isAnimating) return;
            this.isAnimating = true;

            this.playParchmentRustle();

            this.overlay.style.display = 'flex';
            this.overlay.classList.add('ast-turning-active');

            this.turningLeaf.style.transition = 'none';
            this.turningLeaf.style.transform = 'rotateY(0deg)';
            void this.turningLeaf.offsetHeight;

            this.turningLeaf.style.transition = `transform ${this.durationMs}ms cubic-bezier(0.645, 0.045, 0.355, 1.000)`;
            this.turningLeaf.style.transform = 'rotateY(-180deg)';

            setTimeout(() => {
                if (typeof onMidpointCallback === 'function') {
                    onMidpointCallback();
                }
            }, this.durationMs * 0.5);

            setTimeout(() => {
                this.unlockPointerEvents();
            }, this.durationMs + 40);
        }

        bindNavigationTransitions() {
            const internalLinks = document.querySelectorAll('.ast-nav-item, .ast-brand-anchor');
            internalLinks.forEach((link) => {
                link.addEventListener('click', (e) => {
                    const targetUrl = link.getAttribute('href');
                    if (!targetUrl || targetUrl.startsWith('#') || targetUrl.includes('javascript:')) return;
                    if (link.target === '_blank' || e.metaKey || e.ctrlKey) return;

                    e.preventDefault();
                    this.flipPage(() => {
                        window.location.href = targetUrl;
                    });
                });
            });
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        window.astrainaFolioEngine = new FolioFlipEngine();
    });

})(window, document);