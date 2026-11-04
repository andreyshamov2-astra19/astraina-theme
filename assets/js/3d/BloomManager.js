/**
 * ASTRAINA Selective Bloom Manager ($500k Luxury Grade)
 * Isolates high-energy glow to Layer 1, keeping UI & coordinates razor-sharp.
 * Version: 9.4.0
 */

(function (window) {
    'use strict';

    const BLOOM_LAYER = 1;

    class BloomManager {
        constructor(renderer, scene, camera) {
            this.renderer = renderer;
            this.scene = scene;
            this.camera = camera;
            this.bloomLayer = new THREE.Layers();
            this.bloomLayer.set(BLOOM_LAYER);

            this.darkMaterial = new THREE.MeshBasicMaterial({ color: 0x000000 });
            this.materialsStash = new Map();

            this.initPasses();
        }

        initPasses() {
            const width = window.innerWidth;
            const height = window.innerHeight;

            // Рендер-таргет для свечения
            const renderTarget = new THREE.WebGLRenderTarget(width, height, {
                minFilter: THREE.LinearFilter,
                magFilter: THREE.LinearFilter,
                format: THREE.RGBAFormat,
                samples: 4
            });

            this.bloomComposer = new THREE.EffectComposer(this.renderer, renderTarget);
            this.bloomComposer.renderToScreen = false;

            const renderPass = new THREE.RenderPass(this.scene, this.camera);
            this.bloomComposer.addPass(renderPass);

            // UnrealBloomPass с сакральными параметрами сияния
            this.bloomPass = new THREE.UnrealBloomPass(
                new THREE.Vector2(width, height),
                2.1,  // Strength (ослепительное свечение)
                0.85, // Radius (плавный ареол)
                0.16  // Threshold (порог отсечения)
            );
            this.bloomComposer.addPass(this.bloomPass);

            // Финальный шейдер композитинга (Аддитивное сложение базы и блума)
            const finalShader = {
                uniforms: {
                    baseTexture: { value: null },
                    bloomTexture: { value: this.bloomComposer.renderTarget2.texture }
                },
                vertexShader: `
                    varying vec2 vUv;
                    void main() {
                        vUv = uv;
                        gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
                    }
                `,
                fragmentShader: `
                    uniform sampler2D baseTexture;
                    uniform sampler2D bloomTexture;
                    varying vec2 vUv;
                    void main() {
                        vec4 base = texture2D(baseTexture, vUv);
                        vec4 bloom = texture2D(bloomTexture, vUv);
                        gl_FragColor = base + bloom * 1.25;
                    }
                `
            };

            const finalPass = new THREE.ShaderPass(
                new THREE.ShaderMaterial({
                    uniforms: finalShader.uniforms,
                    vertexShader: finalShader.vertexShader,
                    fragmentShader: finalShader.fragmentShader,
                    defines: {}
                }),
                'baseTexture'
            );
            finalPass.needsSwap = true;

            this.finalComposer = new THREE.EffectComposer(this.renderer);
            this.finalComposer.addPass(renderPass);
            this.finalComposer.addPass(finalPass);
        }

        setSize(width, height) {
            this.bloomComposer.setSize(width, height);
            this.finalComposer.setSize(width, height);
            this.bloomPass.resolution.set(width, height);
        }

        render() {
            // 1. Затемняем все объекты, не принадлежащие слою Bloom
            this.scene.traverse((obj) => this.darkenNonBloom(obj));

            // 2. Рендерим светящуюся карту
            this.bloomComposer.render();

            // 3. Возвращаем оригинальные материалы
            this.scene.traverse((obj) => this.restoreMaterial(obj));

            // 4. Финальный композитный рендер с четким слоем 0
            this.finalComposer.render();
        }

        darkenNonBloom(obj) {
            if (obj.isMesh && !this.bloomLayer.test(obj.layers)) {
                this.materialsStash.set(obj.uuid, obj.material);
                obj.material = this.darkMaterial;
            }
        }

        restoreMaterial(obj) {
            if (this.materialsStash.has(obj.uuid)) {
                obj.material = this.materialsStash.get(obj.uuid);
                this.materialsStash.delete(obj.uuid);
            }
        }
    }

    window.AstraBloomManager = BloomManager;
})(window);