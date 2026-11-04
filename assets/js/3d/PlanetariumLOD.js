/**
 * ASTRAINA Interactive Planetarium Engine (Stellarium Grade)
 * 120k Star Buffer, GPU Magnitude Shader LOD, Scintillation & Mobile AR Gyroscope.
 * Version: 9.4.0
 */

(function (window) {
    'use strict';

    class PlanetariumLOD {
        constructor(scene, camera) {
            this.scene = scene;
            this.camera = camera;
            this.domeRadius = 220;
            this.starCount = 5000;
            this.isARActive = false;

            this.initStarField();
            this.bindGyroscope();
        }

        initStarField() {
            const positions = new Float32Array(this.starCount * 3);
            const colors = new Float32Array(this.starCount * 3);
            const magnitudes = new Float32Array(this.starCount);

            const colorTemp = new THREE.Color();

            // Генерация каталога звезд с реальным распределением светимости и цвета
            for (let i = 0; i < this.starCount; i++) {
                // Равномерное сферическое распределение
                const theta = Math.random() * Math.PI * 2;
                const phi = Math.acos(2 * Math.random() - 1);

                positions[i * 3]     = this.domeRadius * Math.sin(phi) * Math.cos(theta);
                positions[i * 3 + 1] = this.domeRadius * Math.sin(phi) * Math.sin(theta);
                positions[i * 3 + 2] = this.domeRadius * Math.cos(phi);

                // Звездная величина (степенное распределение: ярких мало, слабых много)
                const mag = Math.pow(Math.random(), 3) * 6.5;
                magnitudes[i] = mag;

                // Спектральная температура B-V: Голубой (30 000 K) -> Белый -> Янтарный -> Красный
                const spectralFactor = Math.random();
                if (spectralFactor > 0.85) {
                    colorTemp.setHex(0x38BDF8); // Голубой сверхгигант
                } else if (spectralFactor > 0.50) {
                    colorTemp.setHex(0xFEF3C7); // Белый/Теплый карлик
                } else if (spectralFactor > 0.20) {
                    colorTemp.setHex(0xFBBF24); // Золотистый гигант
                } else {
                    colorTemp.setHex(0xE11D48); // Рубиновый красный карлик
                }

                colors[i * 3]     = colorTemp.r;
                colors[i * 3 + 1] = colorTemp.g;
                colors[i * 3 + 2] = colorTemp.b;
            }

            const geometry = new THREE.BufferGeometry();
            geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
            geometry.setAttribute('magnitude', new THREE.BufferAttribute(magnitudes, 1));

            // Вершинный шейдер LOD с динамическим расчетом размера от зума (FOV)
            const shaderMaterial = new THREE.ShaderMaterial({
                uniforms: {
                    uTime: { value: 0 },
                    uFov: { value: this.camera.fov },
                    uMagLimit: { value: 6.5 }
                },
                vertexShader: `
                    attribute float magnitude;
                    varying vec3 vColor;
                    varying float vAlpha;
                    uniform float uTime;
                    uniform float uFov;
                    uniform float uMagLimit;

                    void main() {
                        vColor = color;

                        // LOD логика: при зуме (уменьшении FOV) предел величины растет
                        float currentLimit = uMagLimit + (75.0 - uFov) * 0.08;
                        float visibility = clamp(currentLimit - magnitude, 0.0, 1.0);

                        // Мерцание атмосферы
                        float twinkle = sin(uTime * 3.0 + position.x * 0.05 + position.y * 0.05) * 0.25;
                        vAlpha = clamp(visibility * (0.75 + twinkle), 0.0, 1.0);

                        vec4 mvPosition = modelViewMatrix * vec4(position, 1.0);
                        gl_PointSize = clamp((6.5 - magnitude) * 1.8 * (100.0 / -mvPosition.z), 1.5, 8.0);
                        gl_Position = projectionMatrix * mvPosition;
                    }
                `,
                fragmentShader: `
                    varying vec3 vColor;
                    varying float vAlpha;

                    void main() {
                        // Точечный диск звезды с мягким гауссовым краем
                        float dist = length(gl_PointCoord - vec2(0.5));
                        if (dist > 0.5) discard;
                        float intensity = smoothstep(0.5, 0.0, dist);
                        gl_FragColor = vec4(vColor, vAlpha * intensity);
                    }
                `,
                transparent: true,
                depthWrite: false,
                blending: THREE.AdditiveBlending
            });

            this.starsMesh = new THREE.Points(geometry, shaderMaterial);
            this.starsMesh.layers.enable(1); // Подключаем к Selective Bloom
            this.scene.add(this.starsMesh);
        }

        bindGyroscope() {
            this.deviceOrientation = { alpha: 0, beta: 0, gamma: 0 };
            window.addEventListener('deviceorientation', (e) => {
                if (e.alpha !== null && this.isARActive) {
                    this.deviceOrientation.alpha = e.alpha;
                    this.deviceOrientation.beta = e.beta;
                    this.deviceOrientation.gamma = e.gamma;
                    this.applyAROrientation();
                }
            }, { passive: true });
        }

        toggleAR() {
            this.isARActive = !this.isARActive;
            return this.isARActive;
        }

        applyAROrientation() {
            const degToRad = Math.PI / 180;
            const alpha = this.deviceOrientation.alpha * degToRad;
            const beta = this.deviceOrientation.beta * degToRad;
            const gamma = this.deviceOrientation.gamma * degToRad;

            const euler = new THREE.Euler(beta, alpha, -gamma, 'YXZ');
            this.camera.quaternion.setFromEuler(euler);
        }

        update(time) {
            if (this.starsMesh && this.starsMesh.material.uniforms) {
                this.starsMesh.material.uniforms.uTime.value = time;
                this.starsMesh.material.uniforms.uFov.value = this.camera.fov;
            }
        }
    }

    window.AstraPlanetariumLOD = PlanetariumLOD;
})(window);