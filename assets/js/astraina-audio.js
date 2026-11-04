/**
 * ASTRAINA COSMIC SOUND & TACTILE AUDIO ENGINE v9.3
 * Luxury Grade $500,000 Architecture: Samhain Obsidian & Cosmic Gold
 * Solfeggio 432 Hz Core + Full Volume Control (Up / Down / Set)
 */
class AstrainaAudioEngine {
    constructor() {
        this.ctx = null;
        this.isAmbientPlaying = false;
        this.masterGain = null;
        this.ambientNodes = [];
        this.howlAmbient = null;
        this.currentVolume = 0.65; // Базовая громкость 65%
        this.initPromise = null;
    }

    init() {
        if (this.initPromise) return this.initPromise;

        this.initPromise = new Promise((resolve) => {
            const AudioContextClass = window.AudioContext || window.webkitAudioContext;
            if (!this.ctx && AudioContextClass) {
                this.ctx = new AudioContextClass({ latencyHint: 'playback' });

                this.compressor = this.ctx.createDynamicsCompressor();
                this.compressor.threshold.setValueAtTime(-22, this.ctx.currentTime);
                this.compressor.knee.setValueAtTime(24, this.ctx.currentTime);
                this.compressor.ratio.setValueAtTime(4.5, this.ctx.currentTime);
                this.compressor.attack.setValueAtTime(0.015, this.ctx.currentTime);
                this.compressor.release.setValueAtTime(0.35, this.ctx.currentTime);

                this.masterGain = this.ctx.createGain();
                this.masterGain.gain.setValueAtTime(this.currentVolume, this.ctx.currentTime);

                this.compressor.connect(this.masterGain);
                this.masterGain.connect(this.ctx.destination);
            }

            if (this.ctx && this.ctx.state === 'suspended') {
                this.ctx.resume().then(() => resolve(true));
            } else {
                resolve(true);
            }
        });

        return this.initPromise;
    }

    /**
     * Установка точной громкости от 0.0 до 1.0
     */
    setVolume(value) {
        this.currentVolume = Math.max(0, Math.min(1, value));
        if (this.ctx && this.masterGain) {
            this.masterGain.gain.cancelScheduledValues(this.ctx.currentTime);
            this.masterGain.gain.linearRampToValueAtTime(this.currentVolume, this.ctx.currentTime + 0.1);
        }
        if (this.howlAmbient) {
            this.howlAmbient.volume(this.currentVolume);
        }
        return this.currentVolume;
    }

    volumeUp(step = 0.1) {
        return this.setVolume(this.currentVolume + step);
    }

    volumeDown(step = 0.1) {
        return this.setVolume(this.currentVolume - step);
    }

    getVolume() {
        return Math.round(this.currentVolume * 100);
    }

    async toggleCosmicAmbient(onStateChange) {
        await this.init();

        if (this.isAmbientPlaying) {
            this.stopCosmicAmbient();
            if (typeof onStateChange === 'function') onStateChange(false);
        } else {
            this.startCosmicAmbient();
            if (typeof onStateChange === 'function') onStateChange(true);
        }
    }

    startCosmicAmbient() {
        if (this.isAmbientPlaying) return;

        const ambientUrl = (window.ASTRAINA_CONFIG && window.ASTRAINA_CONFIG.ambient_url)
            ? window.ASTRAINA_CONFIG.ambient_url + 'astraina-solfeggio-432.mp3'
            : null;

        if (typeof Howl !== 'undefined' && ambientUrl) {
            this.howlAmbient = new Howl({
                src: [ambientUrl],
                html5: true,
                loop: true,
                volume: 0,
                onloaderror: () => this.startProceduralSolfeggio()
            });

            this.howlAmbient.play();
            this.howlAmbient.fade(0, this.currentVolume, 2500);
            this.isAmbientPlaying = true;
            return;
        }

        this.startProceduralSolfeggio();
    }

    startProceduralSolfeggio() {
        if (!this.ctx) return;
        const t = this.ctx.currentTime;
        this.ambientNodes = [];

        // 1. Ом-Суббас (108 Гц + 54 Гц)
        const subOsc = this.ctx.createOscillator();
        const subGain = this.ctx.createGain();
        subOsc.type = 'sine';
        subOsc.frequency.setValueAtTime(108, t);
        subGain.gain.setValueAtTime(0.0001, t);
        subGain.gain.exponentialRampToValueAtTime(0.25, t + 3.0);
        subOsc.connect(subGain);
        subGain.connect(this.compressor);
        subOsc.start(t);
        this.ambientNodes.push(subOsc, subGain);

        // 2. Бинауральная гармоника 432 Гц (Верди Ля)
        const osc432A = this.ctx.createOscillator();
        const osc432B = this.ctx.createOscillator();
        const gain432 = this.ctx.createGain();
        const filter432 = this.ctx.createBiquadFilter();

        osc432A.type = 'sine';
        osc432B.type = 'sine';
        osc432A.frequency.setValueAtTime(431.8, t);
        osc432B.frequency.setValueAtTime(432.2, t);

        filter432.type = 'lowpass';
        filter432.frequency.setValueAtTime(700, t);

        gain432.gain.setValueAtTime(0.0001, t);
        gain432.gain.exponentialRampToValueAtTime(0.15, t + 3.5);

        osc432A.connect(filter432);
        osc432B.connect(filter432);
        filter432.connect(gain432);
        gain432.connect(this.compressor);

        osc432A.start(t);
        osc432B.start(t);
        this.ambientNodes.push(osc432A, osc432B, filter432, gain432);

        // 3. 528 Гц (Частота Золотого Сечения)
        const osc528 = this.ctx.createOscillator();
        const gain528 = this.ctx.createGain();
        osc528.type = 'sine';
        osc528.frequency.setValueAtTime(528, t);
        gain528.gain.setValueAtTime(0.0001, t);
        gain528.gain.exponentialRampToValueAtTime(0.04, t + 4.0);

        osc528.connect(gain528);
        gain528.connect(this.compressor);
        osc528.start(t);
        this.ambientNodes.push(osc528, gain528);

        // 4. Дыхание космического ветра (16 сек)
        const bufferSize = this.ctx.sampleRate * 2;
        const noiseBuffer = this.ctx.createBuffer(1, bufferSize, this.ctx.sampleRate);
        const data = noiseBuffer.getChannelData(0);
        let b0 = 0, b1 = 0, b2 = 0;
        for (let i = 0; i < bufferSize; i++) {
            const white = Math.random() * 2 - 1;
            b0 = 0.99886 * b0 + white * 0.055;
            b1 = 0.99332 * b1 + white * 0.075;
            b2 = 0.96900 * b2 + white * 0.153;
            data[i] = (b0 + b1 + b2) * 0.035;
        }

        const noise = this.ctx.createBufferSource();
        noise.buffer = noiseBuffer;
        noise.loop = true;

        const bandFilter = this.ctx.createBiquadFilter();
        bandFilter.type = 'bandpass';
        bandFilter.frequency.setValueAtTime(280, t);
        bandFilter.Q.setValueAtTime(2.0, t);

        const breathGain = this.ctx.createGain();
        breathGain.gain.setValueAtTime(0.0001, t);
        breathGain.gain.exponentialRampToValueAtTime(0.07, t + 3.0);

        const lfo = this.ctx.createOscillator();
        const lfoGain = this.ctx.createGain();
        lfo.frequency.setValueAtTime(0.0625, t);
        lfoGain.gain.setValueAtTime(120, t);
        lfo.connect(bandFilter.frequency);
        lfo.start(t);

        noise.connect(bandFilter);
        bandFilter.connect(breathGain);
        breathGain.connect(this.compressor);
        noise.start(t);

        this.ambientNodes.push(noise, bandFilter, breathGain, lfo, lfoGain);
        this.isAmbientPlaying = true;
    }

    stopCosmicAmbient() {
        if (this.howlAmbient) {
            this.howlAmbient.fade(this.howlAmbient.volume(), 0, 2000);
            setTimeout(() => {
                if (this.howlAmbient) {
                    this.howlAmbient.stop();
                    this.howlAmbient = null;
                }
            }, 2100);
        }

        if (this.ctx && this.ambientNodes.length > 0) {
            const t = this.ctx.currentTime;
            this.ambientNodes.forEach(node => {
                if (node instanceof GainNode) {
                    try {
                        node.gain.cancelScheduledValues(t);
                        node.gain.setValueAtTime(node.gain.value, t);
                        node.gain.exponentialRampToValueAtTime(0.00001, t + 2.0);
                    } catch(e) {}
                }
            });

            setTimeout(() => {
                this.ambientNodes.forEach(n => {
                    try { if (typeof n.stop === 'function') n.stop(); } catch(e) {}
                    try { if (typeof n.disconnect === 'function') n.disconnect(); } catch(e) {}
                });
                this.ambientNodes = [];
            }, 2200);
        }

        this.isAmbientPlaying = false;
    }

    async playParchmentFlip() {
        await this.init();
        if (!this.ctx) return;
        const t = this.ctx.currentTime;
        const dur = 1.2;
        const bufLen = Math.floor(this.ctx.sampleRate * dur);
        const buf = this.ctx.createBuffer(1, bufLen, this.ctx.sampleRate);
        const ch = buf.getChannelData(0);

        for (let i = 0; i < bufLen; i++) {
            const p = i / bufLen;
            ch[i] = (Math.random() * 2 - 1) * Math.sin(p * Math.PI) * 0.12;
        }

        const src = this.ctx.createBufferSource();
        src.buffer = buf;

        const flt = this.ctx.createBiquadFilter();
        flt.type = 'bandpass';
        flt.frequency.setValueAtTime(1100, t);
        flt.frequency.exponentialRampToValueAtTime(280, t + dur);

        const gn = this.ctx.createGain();
        gn.gain.setValueAtTime(0.0001, t);
        gn.gain.exponentialRampToValueAtTime(0.18, t + 0.15);
        gn.gain.exponentialRampToValueAtTime(0.0001, t + dur);

        src.connect(flt);
        flt.connect(gn);
        gn.connect(this.compressor);
        src.start(t);
    }
}

window.astrainaAudio = new AstrainaAudioEngine();