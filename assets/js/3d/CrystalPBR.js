/**
 * ASTRAINA Physical Gemstone Engine (PBR / Transmission)
 * Optical Refraction (IOR 1.77), Caustic Glints & Living Core
 * Version: 9.4.0
 */

(function (window) {
    'use strict';

    const GEM_SPECS = {
        aries:       { name: 'Diamond',       color: 0xE2E8F0, ior: 2.42, roughness: 0.02, dispersion: 0.08 },
        taurus:      { name: 'Emerald',       color: 0x10B981, ior: 1.58, roughness: 0.04, dispersion: 0.04 },
        gemini:      { name: 'Citrine',       color: 0xFBBF24, ior: 1.55, roughness: 0.03, dispersion: 0.03 },
        cancer:      { name: 'Moonstone',     color: 0xCBD5E1, ior: 1.52, roughness: 0.08, dispersion: 0.05 },
        leo:         { name: 'Solar Amber',   color: 0xF59E0B, ior: 1.54, roughness: 0.05, dispersion: 0.04 },
        virgo:       { name: 'Sapphire',      color: 0x3B82F6, ior: 1.77, roughness: 0.03, dispersion: 0.05 },
        libra:       { name: 'Rose Quartz',   color: 0xF472B6, ior: 1.54, roughness: 0.04, dispersion: 0.03 },
        scorpio:     { name: 'Antares Ruby',  color: 0xE11D48, ior: 1.77, roughness: 0.03, dispersion: 0.07 },
        sagittarius: { name: 'Topaz / Lapis', color: 0x06B6D4, ior: 1.62, roughness: 0.04, dispersion: 0.04 },
        capricorn:   { name: 'Black Onyx',    color: 0x475569, ior: 1.65, roughness: 0.06, dispersion: 0.02 },
        aquarius:    { name: 'Amethyst',      color: 0xA855F7, ior: 1.55, roughness: 0.03, dispersion: 0.05 },
        pisces:      { name: 'Aquamarine',    color: 0x38BDF8, ior: 1.57, roughness: 0.02, dispersion: 0.06 }
    };

    class CrystalPBR {
        constructor(scene) {
            this.scene = scene;
            this.currentSign = 'scorpio';
            this.group = new THREE.Group();
            this.group.name = 'ast-sacred-gemstone-cluster';

            this.createGemstone();
            this.createInternalPulsar();
            this.scene.add(this.group);
        }

        createGemstone() {
            const spec = GEM_SPECS[this.currentSign];

            // Математически ограненная форма: Двойной октаэдр с усечением
            this.geometry = new THREE.OctahedronGeometry(2.4, 1);

            this.material = new THREE.MeshPhysicalMaterial({
                color: spec.color,
                emissive: spec.color,
                emissiveIntensity: 0.25,
                metalness: 0.0,
                roughness: spec.roughness,
                transmission: 0.96,
                thickness: 2.2,
                ior: spec.ior,
                transparent: true,
                opacity: 1.0,
                specularIntensity: 1.0,
                specularColor: 0xFEF3C7
            });

            this.mesh = new THREE.Mesh(this.geometry, this.material);
            this.mesh.layers.enable(0);
            this.mesh.layers.enable(1); // Отправляем в Selective Bloom
            this.group.add(this.mesh);

            // Тонкие золотые сакральные ребра огранки
            const wireGeo = new THREE.WireframeGeometry(this.geometry);
            const wireMat = new THREE.LineBasicMaterial({
                color: 0xFBBF24,
                transparent: true,
                opacity: 0.45
            });
            this.wireframe = new THREE.LineSegments(wireGeo, wireMat);
            this.wireframe.layers.enable(1);
            this.group.add(this.wireframe);
        }

        createInternalPulsar() {
            const spec = GEM_SPECS[this.currentSign];

            // Пульсирующее квантовое сердце кристалла
            this.coreLight = new THREE.PointLight(spec.color, 4.0, 35, 1.8);
            this.coreLight.position.set(0, 0, 0);
            this.coreLight.layers.enable(1);
            this.group.add(this.coreLight);

            // Крошечное сингулярное микро-ядро
            const coreGeo = new THREE.SphereGeometry(0.35, 16, 16);
            const coreMat = new THREE.MeshBasicMaterial({ color: 0xFFFFFF });
            this.coreSphere = new THREE.Mesh(coreGeo, coreMat);
            this.coreSphere.layers.enable(1);
            this.group.add(this.coreSphere);
        }

        setSign(signKey) {
            if (!GEM_SPECS[signKey] || signKey === this.currentSign) return;
            this.currentSign = signKey;
            const spec = GEM_SPECS[signKey];

            this.material.color.setHex(spec.color);
            this.material.emissive.setHex(spec.color);
            this.material.ior = spec.ior;
            this.material.roughness = spec.roughness;
            this.coreLight.color.setHex(spec.color);
        }

        update(time, delta) {
            // Вращение кристалла по осям сакральной геометрии
            this.mesh.rotation.y += delta * 0.4;
            this.mesh.rotation.x = Math.sin(time * 0.5) * 0.15;
            this.wireframe.rotation.copy(this.mesh.rotation);

            // Синусоидальное сердцебиение пульсара
            const pulse = 1.0 + Math.sin(time * 3.2) * 0.28;
            this.coreLight.intensity = 3.5 * pulse;
            this.coreSphere.scale.setScalar(pulse);
            this.material.emissiveIntensity = 0.2 + (pulse - 1.0) * 0.35;
        }

        setPosition(x, y, z) {
            this.group.position.set(x, y, z);
        }
    }

    window.AstraCrystalPBR = CrystalPBR;
})(window);