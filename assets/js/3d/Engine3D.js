/**
 * ASTRAINA Master 3D Engine ($500k Luxury Grade)
 * Orchestrates Scene Graph, Selective Bloom, PBR Crystals, Nebulae & Living Muse.
 * Version: 9.4.0
 */

(function (window) {
    'use strict';

    class Engine3D {
        constructor() {
            this.canvas = document.getElementById('ast-canvas-3d');
            if (!this.canvas) return;

            this.clock = new THREE.Clock();
            this.initRenderer();
            this.initScene();
            this.initModules();
            this.bindEvents();

            this.animate = this.animate.bind(this);
            requestAnimationFrame(this.animate);
        }

        initRenderer() {
            this.renderer = new THREE.WebGLRenderer({
                canvas: this.canvas,
                antialias: false,
                alpha: true,
                powerPreference: 'high-performance',
                stencil: false,
                depth: true
            });

            this.renderer.setSize(window.innerWidth, window.innerHeight);
            this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
            this.renderer.toneMapping = THREE.ACESFilmicToneMapping;
            this.renderer.toneMappingExposure = 1.15;
        }

        initScene() {
            this.scene = new THREE.Scene();
            this.camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.1, 2000);
            this.camera.position.set(0, 0, 18);

            // Освещение сцены для сакральных PBR-материалов
            const ambient = new THREE.AmbientLight(0xFFFFFF, 0.35);
            ambient.layers.enable(0);
            ambient.layers.enable(1);
            this.scene.add(ambient);

            const keyLight = new THREE.DirectionalLight(0xFEF3C7, 1.8);
            keyLight.position.set(10, 15, 12);
            keyLight.layers.enable(0);
            keyLight.layers.enable(1);
            this.scene.add(keyLight);
        }

        initModules() {
            // Менеджер селективного свечения
            this.bloomManager = new window.AstraBloomManager(this.renderer, this.scene, this.camera);

            // Объемная шейдерная туманность
            this.nebula = new window.AstraNebulaBackground(this.scene);

            // Кристалл Антареса и камни знаков
            this.crystal = new window.AstraCrystalPBR(this.scene);
            this.crystal.setPosition(0, 0, -2);

            // Оживление Девы-Музы
            this.livingMuse = new window.AstraLivingAstraina();
        }

        bindEvents() {
            window.addEventListener('resize', () => {
                const w = window.innerWidth;
                const h = window.innerHeight;
                this.camera.aspect = w / h;
                this.camera.updateProjectionMatrix();
                this.renderer.setSize(w, h);
                this.bloomManager.setSize(w, h);
                this.nebula.setSize(w, h);
            }, { passive: true });
        }

        animate() {
            requestAnimationFrame(this.animate);

            const delta = this.clock.getDelta();
            const time = this.clock.getElapsedTime();

            // Обновление подсистем
            this.nebula.update(time);
            this.crystal.update(time, delta);
            this.livingMuse.update(time, delta);

            // Финальный селективный рендер
            this.bloomManager.render();
        }

        setSign(signKey) {
            if (this.crystal) {
                this.crystal.setSign(signKey);
            }
        }
    }

    window.AstraEngine3D = Engine3D;
})(window);