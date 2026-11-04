/**
 * ASTRAINA COSMIC SOUND & TACTILE AUDIO ENGINE v9.2
 * Luxury Grade $500,000 Architecture: Samhain Obsidian & Cosmic Gold
 * Hybrid: Howler.js Hi-Fi Stream + Studio Web Audio API Fallback (432Hz Solfeggio)
 */
class AstrainaAudioEngine {
    constructor() {
        this.ctx = null;
        this.isAmbientPlaying = false;
        this.masterGain = null;
        this.ambientNodes = [];
        this.howlAmbient = null;
        this.isMuted = false;
        this.baseVolume = 0.65;
        this.initPromise = null;
    }

    /**
     * Инициализация аудио-контекста по первому взаимодействию
     */
    init() {
        if (this.initPromise) return this.initPromise;

        this.initPromise = new Promise((resolve) => {
            const AudioContextClass = window.AudioContext || window.webkitAudioContext;
            if (!this.ctx && AudioContextClass) {
                this.ctx = new AudioContextClass({ latencyHint: 'playback' });

                // Мастер-компрессор лампового окраса (SSL-style soft knee)
                this.compressor = this.ctx.createDynamicsCompressor();
                this.compressor.threshold.setValueAtTime(-22, this.ctx.currentTime);
                this.compressor.knee.setValueAtTime(24, this.ctx.currentTime);
                this.compressor.ratio.setValueAtTime(4.5, this.ctx.currentTime);
                this.compressor.attack.setValueAtTime(0.015, this.ctx.currentTime);
                this.compressor.release.setValueAtTime(0.35, this.ctx.currentTime);

                // Мастер-фейдер громкости
                this.masterGain = this.ctx.createGain();
                this.masterGain.gain.setValueAtTime(this.baseVolume, this.ctx.currentTime);

                // Теплый полочный фильтр верхов (убирает цифровой песок выше 12 кГц)
                this.airShelf = this.ctx.createBiquadFilter();
                this.airShelf.type = 'lowshelf';
                this.airShelf.frequency.setValueAtTime(140, this.ctx.currentTime);
                this.airShelf.gain.setValueAtTime(3.5, this.ctx.currentTime);

                this.compressor.connect(this.airShelf);
                this.airShelf.connect(this.masterGain);
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
     * Переключатель фонового амбиента (Кнопка в шапке / футере)
     */
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

    /**
     * Запуск 1.5-часового Hi-Fi полотна (через Howler) с процедурным 432 Гц Solfeggio бэкапом
     */
    startCosmicAmbient() {
        if (this.isAmbientPlaying) return;

        // 1. Попытка запустить Hi-Fi запись через Howler.js (если есть внешний файл)
        const ambientUrl = (window.ASTRAINA_CONFIG && window.ASTRAINA_CONFIG.ambient_url)
            ? window.ASTRAINA_CONFIG.ambient_url + 'astraina-solfeggio-432.mp3'
            : null;

        if (typeof Howl !== 'undefined' && ambientUrl) {
            this.howlAmbient = new Howl({
                src: [ambientUrl, ambientUrl.replace('.mp3', '.ogg')],
                html5: true,
                loop: true,
                volume: 0,
                onloaderror: () => {
                    console.log('[Astraina Audio] Streaming file fallback to Procedural 432Hz Core.');
                    this.startProceduralSolfeggio();
                }
            });

            this.howlAmbient.play();
            this.howlAmbient.fade(0, this.baseVolume, 2500); // Кроссфейд 2.5 секунды
            this.isAmbientPlaying = true;
            return;
        }

        // 2. Если Howler-файл не загружен — запускается роскошный процедурный Solfeggio Core
        this.startProceduralSolfeggio();
    }

    /**
     * Студийный многослойный Solfeggio-генератор (432 Гц + 528 Гц + ОМ-суббас 108 Гц)
     */
    startProceduralSolfeggio() {
        if (!this.ctx) return;
        const t = this.ctx.currentTime;
        this.ambientNodes = [];

        // А. Ом-Суббас (108 Гц + 54 Гц)
        const subOsc = this.ctx.createOscillator();
        const subGain = this.ctx.createGain();
        subOsc.type = 'sine';
        subOsc.frequency.setValueAtTime(108, t);
        subGain.gain.setValueAtTime(0.0001, t);
        subGain.gain.exponentialRampToValueAtTime(0.22, t + 3.0);
        subOsc.connect(subGain);
        subGain.connect(this.compressor);
        subOsc.start(t);
        this.ambientNodes.push(subOsc, subGain);

        // Б. Сакральная пара 432 Гц (Верди Ля) с микро-хорусом (детюн 0.4 Гц)
        const osc432A = this.ctx.createOscillator();
        const osc432B = this.ctx.createOscillator();
        const gain432 = this.ctx.createGain();
        const filter432 = this.ctx.createBiquadFilter();

        osc432A.type = 'sine';
        osc432B.type = 'sine';
        osc432A.frequency.setValueAtTime(431.8, t);
        osc432B.frequency.setValueAtTime(432.2, t);

        filter432.type = 'lowpass';
        filter432.frequency.setValueAtTime(680, t);
        filter432.Q.setValueAtTime(2.0, t);

        gain432.gain.setValueAtTime(0.0001, t);
        gain432.gain.exponentialRampToValueAtTime(0.14, t + 4.0);

        osc432A.connect(filter432);
        osc432B.connect(filter432);
        filter432.connect(gain432);
        gain432.connect(this.compressor);

        osc432A.start(t);
        osc432B.start(t);
        this.ambientNodes.push(osc432A, osc432B, filter432, gain432);

        // В. 528 Гц (Частота Чудес и Золотого Сечения) — мягкая обертоновая гармоника
        const osc528 = this.ctx.createOscillator();
        const gain528 = this.ctx.createGain();
        osc528.type = 'sine';
        osc528.frequency.setValueAtTime(528, t);
        gain528.gain.setValueAtTime(0.0001, t);
        gain528.gain.exponentialRampToValueAtTime(0.045, t + 5.0);

        osc528.connect(gain528);
        gain528.connect(this.compressor);
        osc528.start(t);
        this.ambientNodes.push(osc528, gain528);

        // Г. Космическое дыхание (Розовый шум через плавающий LFO 16 секунд)
        const bufferSize = this.ctx.sampleRate * 2;
        const noiseBuffer = this.ctx.createBuffer(1, bufferSize, this.ctx.sampleRate);
        const data = noiseBuffer.getChannelData(0);
        let b0 = 0, b1 = 0, b2 = 0, b3 = 0, b4 = 0, b5 = 0, b6 = 0;
        for (let i = 0; i < bufferSize; i++) {
            const white = Math.random() * 2 - 1;
            b0 = 0.99886 * b0 + white * 0.0555179;
            b1 = 0.99332 * b1 + white * 0.0750759;
            b2 = 0.96900 * b2 + white * 0.1538520;
            b3 = 0.86650 * b3 + white * 0.3104856;
            b4 = 0.55000 * b4 + white * 0.5329522;
            b5 = -0.7616 * b5 - white * 0.0168980;
            data[i] = (b0 + b1 + b2 + b3 + b4 + b5 + b6 + white * 0.5362) * 0.035;
            b6 = white * 0.115926;
        }

        const noise = this.ctx.createBufferSource();
        noise.buffer = noiseBuffer;
        noise.loop = true;

        const bandFilter = this.ctx.createBiquadFilter();
        bandFilter.type = 'bandpass';
        bandFilter.frequency.setValueAtTime(280, t);
        bandFilter.Q.setValueAtTime(1.8, t);

        const breathGain = this.ctx.createGain();
        breathGain.gain.setValueAtTime(0.0001, t);
        breathGain.gain.exponentialRampToValueAtTime(0.07, t + 4.0);

        // LFO со сверхмедленным периодом (16 сек)
        const lfo = this.ctx.createOscillator();
        const lfoGain = this.ctx.createGain();
        lfo.frequency.setValueAtTime(0.0625, t);
        lfoGain.gain.setValueAtTime(140, t);

        lfo.connect(bandFilter.frequency);
        lfo.start(t);

        noise.connect(bandFilter);
        bandFilter.connect(breathGain);
        breathGain.connect(this.compressor);
        noise.start(t);

        this.ambientNodes.push(noise, bandFilter, breathGain, lfo, lfoGain);
        this.isAmbientPlaying = true;
    }

    /**
     * Остановка амбиента с плавным затуханием (2.5 сек)
     */
    stopCosmicAmbient() {
        if (this.howlAmbient) {
            this.howlAmbient.fade(this.howlAmbient.volume(), 0, 2500);
            setTimeout(() => {
                if (this.howlAmbient) {
                    this.howlAmbient.stop();
                    this.howlAmbient.unload();
                    this.howlAmbient = null;
                }
            }, 2600);
        }

        if (this.ctx && this.ambientNodes.length > 0) {
            const t = this.ctx.currentTime;
            this.ambientNodes.forEach(node => {
                if (node instanceof GainNode) {
                    try {
                        node.gain.cancelScheduledValues(t);
                        node.gain.setValueAtTime(node.gain.value, t);
                        node.gain.exponentialRampToValueAtTime(0.00001, t + 2.5);
                    } catch(e) {}
                }
            });

            setTimeout(() => {
                this.ambientNodes.forEach(n => {
                    try { if (typeof n.stop === 'function') n.stop(); } catch(e) {}
                    try { if (typeof n.disconnect === 'function') n.disconnect(); } catch(e) {}
                });
                this.ambientNodes = [];
            }, 2600);
        }

        this.isAmbientPlaying = false;
    }

    /**
     * Кристаллический отклик зодиакального камня (Crystal Bell Resonance)
     * @param {number} freq Частота ноты (по умолчанию Резонанс Рубина 864 Гц)
     */
    async playCrystalResonance(freq = 864) {
        await this.init();
        if (!this.ctx) return;
        const t = this.ctx.currentTime;

        // Двухоператорный FM-синтез поющей кристаллической чаши
        const carrier = this.ctx.createOscillator();
        const mod = this.ctx.createOscillator();
        const modGain = this.ctx.createGain();
        const gain = this.ctx.createGain();

        carrier.type = 'sine';
        carrier.frequency.setValueAtTime(freq, t);

        mod.type = 'sine';
        mod.frequency.setValueAtTime(freq * 2.76, t); // Золотой обертон

        modGain.gain.setValueAtTime(freq * 0.8, t);
        modGain.gain.exponentialRampToValueAtTime(0.01, t + 1.8);

        gain.gain.setValueAtTime(0.0001, t);
        gain.gain.linearRampToValueAtTime(0.18, t + 0.02);
        gain.gain.exponentialRampToValueAtTime(0.00001, t + 2.4);

        mod.connect(carrier.frequency);
        carrier.connect(gain);
        gain.connect(this.compressor);

        mod.start(t);
        carrier.start(t);
        mod.stop(t + 2.5);
        carrier.stop(t + 2.5);
    }

    /**
     * Шелест древнего пергамента (разворот свитка)
     */
    async playParchmentFlip() {
        await this.init();
        if (!this.ctx) return;
        const t = this.ctx.currentTime;
        const dur = 1.35;
        const bufLen = Math.floor(this.ctx.sampleRate * dur);
        const buf = this.ctx.createBuffer(1, bufLen, this.ctx.sampleRate);
        const ch = buf.getChannelData(0);

        let b0 = 0, b1 = 0, b2 = 0;
        for (let i = 0; i < bufLen; i++) {
            const w = Math.random() * 2 - 1;
            b0 = 0.99886 * b0 + w * 0.0555179;
            b1 = 0.99332 * b1 + w * 0.0750759;
            b2 = 0.96900 * b2 + w * 0.1538520;
            const progress = i / bufLen;
            const envelope = Math.sin(progress * Math.PI) * (1.0 + 0.25 * Math.sin(progress * 4 * Math.PI));
            ch[i] = (b0 + b1 + b2) * 0.12 * envelope;
        }

        const source = this.ctx.createBufferSource();
        source.buffer = buf;

        const flt = this.ctx.createBiquadFilter();
        flt.type = 'bandpass';
        flt.frequency.setValueAtTime(1250, t);
        flt.frequency.exponentialRampToValueAtTime(310, t + dur);
        flt.Q.setValueAtTime(2.2, t);

        const gn = this.ctx.createGain();
        gn.gain.setValueAtTime(0.0001, t);
        gn.gain.exponentialRampToValueAtTime(0.2, t + 0.15);
        gn.gain.exponentialRampToValueAtTime(0.0001, t + dur);

        source.connect(flt);
        flt.connect(gn);
        gn.connect(this.compressor);

        source.start(t);
    }
}

window.astrainaAudio = new AstrainaAudioEngine();