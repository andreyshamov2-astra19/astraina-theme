/**
 * ASTRAINA Sacred Constellation Dome ($500k Luxury Grade)
 * 12 Zodiac Constellations with animated gold threads & star ignition sequence.
 * Version: 9.4.0
 */

(function (window) {
    'use strict';

    // Сакральные координаты созвездий (RA в градусах, Dec в градусах)
    const ZODIAC_CONSTELLATIONS = {
        aries: {
            name: 'Aries',
            stars: [
                { id: 'alpha', ra: 31.79, dec: 23.46, mag: 2.01, name: 'Hamal' },
                { id: 'beta',  ra: 28.66, dec: 20.81, mag: 2.64, name: 'Sheratan' },
                { id: 'gamma', ra: 28.50, dec: 19.29, mag: 3.88, name: 'Mesarthim' },
                { id: '41_ari',ra: 41.29, dec: 27.26, mag: 3.61, name: 'Bharani' }
            ],
            lines: [[0, 1], [1, 2], [0, 3]]
        },
        taurus: {
            name: 'Taurus',
            stars: [
                { id: 'alpha', ra: 68.98, dec: 16.51, mag: 0.85, name: 'Aldebaran' },
                { id: 'beta',  ra: 81.57, dec: 28.61, mag: 1.65, name: 'Elnath' },
                { id: 'zeta',  ra: 84.41, dec: 21.14, mag: 2.97, name: 'Tianguan' },
                { id: 'theta', ra: 67.14, dec: 15.63, mag: 3.41, name: 'Hyades Core' },
                { id: 'lambda',ra: 60.15, dec: 12.49, mag: 3.47, name: 'Lambda Tauri' }
            ],
            lines: [[0, 3], [3, 4], [0, 1], [0, 2]]
        },
        gemini: {
            name: 'Gemini',
            stars: [
                { id: 'alpha', ra: 113.65, dec: 31.89, mag: 1.58, name: 'Castor' },
                { id: 'beta',  ra: 116.33, dec: 28.03, mag: 1.16, name: 'Pollux' },
                { id: 'gamma', ra: 99.43,  dec: 16.40, mag: 1.93, name: 'Alhena' },
                { id: 'mu',    ra: 95.74,  dec: 22.51, mag: 2.87, name: 'Tejat' },
                { id: 'xi',    ra: 98.80,  dec: 12.90, mag: 3.35, name: 'Alzirr' }
            ],
            lines: [[0, 1], [0, 3], [1, 2], [3, 4], [2, 4]]
        },
        cancer: {
            name: 'Cancer',
            stars: [
                { id: 'beta',  ra: 124.13, dec: 9.19,  mag: 3.53, name: 'Tarf' },
                { id: 'delta', ra: 131.17, dec: 18.15, mag: 3.94, name: 'Asellus Australis' },
                { id: 'gamma', ra: 130.83, dec: 21.47, mag: 4.66, name: 'Asellus Borealis' },
                { id: 'iota',  ra: 134.84, dec: 28.76, mag: 4.03, name: 'Iota Cancri' },
                { id: 'alpha', ra: 134.57, dec: 11.86, mag: 4.26, name: 'Acubens' }
            ],
            lines: [[0, 1], [1, 2], [2, 3], [1, 4]]
        },
        leo: {
            name: 'Leo',
            stars: [
                { id: 'alpha', ra: 152.09, dec: 11.97, mag: 1.36, name: 'Regulus' },
                { id: 'gamma', ra: 155.05, dec: 19.84, mag: 2.01, name: 'Algieba' },
                { id: 'beta',  ra: 177.26, dec: 14.57, mag: 2.14, name: 'Denebola' },
                { id: 'delta', ra: 168.53, dec: 20.52, mag: 2.56, name: 'Zosma' },
                { id: 'epsilon',ra:147.66, dec: 23.77, mag: 2.97, name: 'Ras Elased' }
            ],
            lines: [[0, 1], [1, 4], [1, 3], [3, 2], [0, 2]]
        },
        virgo: {
            name: 'Virgo',
            stars: [
                { id: 'alpha', ra: 201.30, dec: -11.16, mag: 0.98, name: 'Spica' },
                { id: 'gamma', ra: 190.42, dec: -1.45,  mag: 2.74, name: 'Porrima' },
                { id: 'epsilon',ra:195.60, dec: 10.96,  mag: 2.85, name: 'Vindemiatrix' },
                { id: 'zeta',  ra: 203.90, dec: -0.60,  mag: 3.38, name: 'Heze' },
                { id: 'delta', ra: 193.90, dec: 3.40,   mag: 3.38, name: 'Minelauva' }
            ],
            lines: [[0, 1], [1, 4], [4, 2], [2, 3], [0, 3]]
        },
        libra: {
            name: 'Libra',
            stars: [
                { id: 'beta',  ra: 229.25, dec: -9.38,  mag: 2.61, name: 'Zubeneschamali' },
                { id: 'alpha', ra: 222.72, dec: -16.04, mag: 2.75, name: 'Zubenelgenubi' },
                { id: 'sigma', ra: 226.04, dec: -25.28, mag: 3.25, name: 'Brachium' },
                { id: 'upsilon',ra:234.21, dec: -28.13, mag: 3.60, name: 'Upsilon Lib' }
            ],
            lines: [[0, 1], [1, 2], [2, 3], [0, 2]]
        },
        scorpio: {
            name: 'Scorpio',
            stars: [
                { id: 'alpha', ra: 247.35, dec: -26.43, mag: 0.96, name: 'Antares (Ruby)' },
                { id: 'beta',  ra: 241.36, dec: -19.81, mag: 2.62, name: 'Acrab' },
                { id: 'delta', ra: 240.08, dec: -22.62, mag: 2.29, name: 'Dschubba' },
                { id: 'pi',    ra: 239.71, dec: -26.11, mag: 2.89, name: 'Fang' },
                { id: 'epsilon',ra:250.42, dec: -34.29, mag: 2.29, name: 'Larawag' },
                { id: 'theta', ra: 264.33, dec: -42.99, mag: 1.86, name: 'Sargas' },
                { id: 'lambda',ra: 263.40, dec: -37.10, mag: 1.62, name: 'Shaula' }
            ],
            lines: [[1, 2], [2, 3], [2, 0], [0, 4], [4, 5], [5, 6]]
        },
        sagittarius: {
            name: 'Sagittarius',
            stars: [
                { id: 'epsilon',ra:276.04, dec: -34.38, mag: 1.79, name: 'Kaus Australis' },
                { id: 'sigma', ra: 283.82, dec: -26.30, mag: 2.05, name: 'Nunki' },
                { id: 'delta', ra: 275.24, dec: -29.83, mag: 2.72, name: 'Kaus Media' },
                { id: 'lambda',ra: 276.99, dec: -25.42, mag: 2.82, name: 'Kaus Borealis' },
                { id: 'zeta',  ra: 285.65, dec: -29.88, mag: 2.60, name: 'Ascella' }
            ],
            lines: [[0, 2], [2, 3], [3, 1], [1, 4], [4, 0], [2, 4]]
        },
        capricorn: {
            name: 'Capricorn',
            stars: [
                { id: 'delta', ra: 326.76, dec: -16.13, mag: 2.85, name: 'Deneb Algedi' },
                { id: 'beta',  ra: 305.25, dec: -14.78, mag: 3.05, name: 'Dabih' },
                { id: 'alpha', ra: 304.39, dec: -12.54, mag: 3.58, name: 'Algedi' },
                { id: 'gamma', ra: 325.04, dec: -16.66, mag: 3.69, name: 'Nashira' },
                { id: 'zeta',  ra: 323.36, dec: -22.41, mag: 3.77, name: 'Yan' }
            ],
            lines: [[2, 1], [1, 4], [4, 0], [0, 3], [2, 3]]
        },
        aquarius: {
            name: 'Aquarius',
            stars: [
                { id: 'beta',  ra: 323.79, dec: -5.57,  mag: 2.90, name: 'Sadalsuud' },
                { id: 'alpha', ra: 331.45, dec: -0.32,  mag: 2.95, name: 'Sadalmelik' },
                { id: 'delta', ra: 343.94, dec: -15.82, mag: 3.27, name: 'Skat' },
                { id: 'gamma', ra: 335.41, dec: -1.39,  mag: 3.86, name: 'Sadachbia' },
                { id: 'zeta',  ra: 337.19, dec: -0.02,  mag: 3.65, name: 'Zeta Aquarii' }
            ],
            lines: [[0, 1], [1, 3], [3, 4], [3, 2]]
        },
        pisces: {
            name: 'Pisces',
            stars: [
                { id: 'eta',   ra: 22.87,  dec: 15.35, mag: 3.62, name: 'Alpherg' },
                { id: 'gamma', ra: 349.25, dec: 3.28,  mag: 3.70, name: 'Gamma Piscium' },
                { id: 'alpha', ra: 30.51,  dec: 2.76,  mag: 3.82, name: 'Alrescha' },
                { id: 'omega', ra: 359.81, dec: 6.86,  mag: 4.03, name: 'Omega Piscium' },
                { id: 'iota',  ra: 353.96, dec: 5.62,  mag: 4.13, name: 'Iota Piscium' }
            ],
            lines: [[2, 0], [2, 1], [1, 3], [3, 4]]
        }
    };

    class ConstellationDome {
        constructor(scene) {
            this.scene = scene;
            this.radius = 180;
            this.group = new THREE.Group();
            this.group.name = 'ast-constellation-dome';
            this.activeConstellation = 'scorpio';

            this.linesMesh = null;
            this.starsMesh = null;

            this.init();
            this.scene.add(this.group);
        }

        init() {
            this.renderConstellation(this.activeConstellation);
        }

        raDecToVector3(raDeg, decDeg, r) {
            const raRad = (raDeg * Math.PI) / 180;
            const decRad = (decDeg * Math.PI) / 180;
            return new THREE.Vector3(
                r * Math.cos(decRad) * Math.cos(raRad),
                r * Math.sin(decRad),
                r * Math.cos(decRad) * Math.sin(raRad)
            );
        }

        renderConstellation(signKey) {
            const data = ZODIAC_CONSTELLATIONS[signKey] || ZODIAC_CONSTELLATIONS.scorpio;
            this.activeConstellation = signKey;

            // Очистка старой геометрии
            while (this.group.children.length > 0) {
                const obj = this.group.children[0];
                this.group.remove(obj);
                if (obj.geometry) obj.geometry.dispose();
                if (obj.material) obj.material.dispose();
            }

            const starPositions = [];
            const starColors = [];
            const linePositions = [];

            // 1. Построение сакральных звезд
            data.stars.forEach((star) => {
                const pos = this.raDecToVector3(star.ra, star.dec, this.radius);
                starPositions.push(pos.x, pos.y, pos.z);

                // Антарес — спектральный рубин, остальные — благородное самайнское золото
                if (signKey === 'scorpio' && star.name.includes('Antares')) {
                    starColors.push(0.88, 0.11, 0.28);
                } else {
                    starColors.push(0.98, 0.75, 0.14);
                }
            });

            const starGeo = new THREE.BufferGeometry();
            starGeo.setAttribute('position', new THREE.Float32BufferAttribute(starPositions, 3));
            starGeo.setAttribute('color', new THREE.Float32BufferAttribute(starColors, 3));

            const starMat = new THREE.PointsMaterial({
                size: 4.8,
                vertexColors: true,
                transparent: true,
                opacity: 0.95,
                blending: THREE.AdditiveBlending
            });

            this.starsMesh = new THREE.Points(starGeo, starMat);
            this.starsMesh.layers.enable(1); // Включаем в селективный Bloom
            this.group.add(this.starsMesh);

            // 2. Построение золотых нитей сакральной геометрии
            data.lines.forEach((pair) => {
                const p1 = this.raDecToVector3(data.stars[pair[0]].ra, data.stars[pair[0]].dec, this.radius);
                const p2 = this.raDecToVector3(data.stars[pair[1]].ra, data.stars[pair[1]].dec, this.radius);
                linePositions.push(p1.x, p1.y, p1.z, p2.x, p2.y, p2.z);
            });

            const lineGeo = new THREE.BufferGeometry();
            lineGeo.setAttribute('position', new THREE.Float32BufferAttribute(linePositions, 3));

            const lineMat = new THREE.LineBasicMaterial({
                color: 0xF59E0B,
                transparent: true,
                opacity: 0.65,
                linewidth: 1.5,
                blending: THREE.AdditiveBlending
            });

            this.linesMesh = new THREE.LineSegments(lineGeo, lineMat);
            this.linesMesh.layers.enable(1); // Золотые нити сияют неоном
            this.group.add(this.linesMesh);
        }

        setSign(signKey) {
            if (signKey === this.activeConstellation) return;
            this.renderConstellation(signKey);
        }

        update(time) {
            // Мягкое космическое покачивание купола
            this.group.rotation.y = time * 0.015;
            this.group.rotation.x = Math.sin(time * 0.01) * 0.05;
        }
    }

    window.AstraConstellationDome = ConstellationDome;
})(window);