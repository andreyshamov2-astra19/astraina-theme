/**
 * ASTRAINA.COM — LUXURY 3D VISUAL ENGINE v9.4
 * Powers: 12 Zodiac Constellations, Faceted 3D Gems (Antares Ruby),
 * Living Astraina Muse (Idle & Gaze), Milky Way Cloud, Inner-Pages Starry Dome.
 */
(function() {
    'use strict';

    window.addEventListener('DOMContentLoaded', initAstraina3D);

    function initAstraina3D() {
        if (typeof THREE === 'undefined') {
            console.error('[Astraina 3D] Three.js not loaded. Retrying in 200ms...');
            setTimeout(initAstraina3D, 200);
            return;
        }

        // 1. Поиск или создание Canvas
        let canvas = document.getElementById('astraina-live-stars') || document.getElementById('ast-canvas-3d');
        if (!canvas) {
            canvas = document.createElement('canvas');
            canvas.id = 'astraina-live-stars';
            canvas.style.position = 'fixed';
            canvas.style.top = '0';
            canvas.style.left = '0';
            canvas.style.width = '100vw';
            canvas.style.height = '100vh';
            canvas.style.zIndex = '-1';
            canvas.style.pointerEvents = 'none';
            document.body.prepend(canvas);
        }

        // 2. Настройка Three.js сцены
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true, powerPreference: 'high-performance' });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 3000);
        camera.position.z = 800;

        // 3. Освещение для физических кристаллов
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.7);
        scene.add(ambientLight);

        const pointLight = new THREE.PointLight(0xF59E0B, 2.5, 1200);
        pointLight.position.set(0, 0, 300);
        scene.add(pointLight);

        const rubyLight = new THREE.PointLight(0xE11D48, 3.0, 800);
        rubyLight.position.set(0, 0, 150);
        scene.add(rubyLight);

        // 4. Генерация звездного купола (5 000 частиц)
        const starCount = 5000;
        const starGeo = new THREE.BufferGeometry();
        const starPos = new Float32Array(starCount * 3);
        const starColors = new Float32Array(starCount * 3);

        const palette = [
            new THREE.Color('#38BDF8'), // Голубые гиганты
            new THREE.Color('#FEF3C7'), // Бело-золотые звезды
            new THREE.Color('#FBBF24'), // Золотые карлики
            new THREE.Color('#FDA4AF')  // Рубиновые сверхгиганты
        ];

        for (let i = 0; i < starCount; i++) {
            const rad = 600 + Math.random() * 1400;
            const theta = Math.random() * Math.PI * 2;
            const phi = Math.acos((Math.random() * 2) - 1);

            starPos[i * 3]     = rad * Math.sin(phi) * Math.cos(theta);
            starPos[i * 3 + 1] = rad * Math.sin(phi) * Math.sin(theta);
            starPos[i * 3 + 2] = rad * Math.cos(phi);

            const c = palette[Math.floor(Math.random() * palette.length)];
            starColors[i * 3]     = c.r;
            starColors[i * 3 + 1] = c.g;
            starColors[i * 3 + 2] = c.b;
        }

        starGeo.setAttribute('position', new THREE.BufferAttribute(starPos, 3));
        starGeo.setAttribute('color', new THREE.BufferAttribute(starColors, 3));

        const starMat = new THREE.PointsMaterial({
            size: 2.2,
            vertexColors: true,
            transparent: true,
            opacity: 0.85
        });
        const starField = new THREE.Points(starGeo, starMat);
        scene.add(starField);

        // 5. Рукав Млечного Пути (2 500 теплых частиц внизу сцены)
        const mwCount = 2500;
        const mwGeo = new THREE.BufferGeometry();
        const mwPos = new Float32Array(mwCount * 3);
        const mwColors = new Float32Array(mwCount * 3);

        for (let i = 0; i < mwCount; i++) {
            const t = (Math.random() - 0.5) * 1600;
            const spreadY = (Math.random() - 0.5) * 250 - 280; // Смещение вниз
            const spreadZ = (Math.random() - 0.5) * 400 - 100;

            mwPos[i * 3]     = t;
            mwPos[i * 3 + 1] = spreadY + Math.sin(t * 0.003) * 80;
            mwPos[i * 3 + 2] = spreadZ;

            // Золотисто-фиолетовая градация
            const isGold = Math.random() > 0.4;
            mwColors[i * 3]     = isGold ? 0.96 : 0.45;
            mwColors[i * 3 + 1] = isGold ? 0.72 : 0.25;
            mwColors[i * 3 + 2] = isGold ? 0.20 : 0.90;
        }

        mwGeo.setAttribute('position', new THREE.BufferAttribute(mwPos, 3));
        mwGeo.setAttribute('color', new THREE.BufferAttribute(mwColors, 3));

        const mwMat = new THREE.PointsMaterial({
            size: 3.5,
            vertexColors: true,
            transparent: true,
            opacity: 0.55,
            blending: THREE.AdditiveBlending
        });
        const milkyWay = new THREE.Points(mwGeo, mwMat);
        scene.add(milkyWay);

        // 6. База 12 созвездий (золотые нити и координаты)
        const ZODIAC_DATA = {
            scorpio: {
                color: 0xE11D48,
                gemColor: 0xE11D48,
                stars: [
                    [0, 80, 0], [40, 110, 20], [80, 90, 10], [-40, 50, -10],
                    [-70, 0, -20], [-50, -60, -10], [-10, -110, 0], [40, -140, 20],
                    [70, -110, 30], [50, -80, 20]
                ],
                lines: [[0,1],[1,2],[0,3],[3,4],[4,5],[5,6],[6,7],[7,8],[8,9]],
                gemPos: [0, 80, 0] // Антарес (Сердце)
            },
            aries: {
                color: 0xF59E0B, gemColor: 0xF97316,
                stars: [[-100, 40, 0], [-20, 60, 10], [50, 40, 0], [100, 10, -10]],
                lines: [[0,1],[1,2],[2,3]],
                gemPos: [50, 40, 0] // Гамаль
            },
            taurus: {
                color: 0x10B981, gemColor: 0x10B981,
                stars: [[-80, 50, 0], [-30, 20, 10], [0, 0, 0], [40, 30, 10], [90, 80, 0], [-40, -40, -10]],
                lines: [[0,1],[1,2],[2,3],[3,4],[2,5]],
                gemPos: [0, 0, 0] // Альдебаран
            },
            gemini: {
                color: 0xFBBF24, gemColor: 0xFBBF24,
                stars: [[-60, 90, 0], [60, 90, 0], [-40, 0, 0], [40, 0, 0], [-50, -90, 0], [50, -90, 0]],
                lines: [[0,2],[1,3],[2,4],[3,5],[0,1],[2,3]],
                gemPos: [-60, 90, 0] // Кастор / Поллукс
            },
            cancer: {
                color: 0xE2E8F0, gemColor: 0xE2E8F0,
                stars: [[0, 40, 0], [0, -10, 0], [-50, -60, 0], [50, -60, 0]],
                lines: [[0,1],[1,2],[1,3]],
                gemPos: [0, -10, 0]
            },
            leo: {
                color: 0xF59E0B, gemColor: 0xF59E0B,
                stars: [[60, 40, 0], [80, 0, 0], [40, -40, 0], [-20, -50, 0], [-60, -20, 0], [-40, 30, 0], [20, 50, 0]],
                lines: [[0,1],[1,2],[2,3],[3,4],[4,5],[5,6],[6,0]],
                gemPos: [60, 40, 0] // Регул
            },
            virgo: {
                color: 0x3B82F6, gemColor: 0x3B82F6,
                stars: [[0, 70, 0], [-40, 20, 0], [40, 30, 0], [-20, -40, 0], [50, -50, 0], [0, -90, 0]],
                lines: [[0,1],[0,2],[1,3],[2,4],[3,5],[4,5]],
                gemPos: [50, -50, 0] // Спика
            },
            libra: {
                color: 0xF472B6, gemColor: 0xF472B6,
                stars: [[0, 60, 0], [-60, 0, 0], [60, 0, 0], [-30, -60, 0], [30, -60, 0]],
                lines: [[0,1],[0,2],[1,3],[2,4],[1,2]],
                gemPos: [0, 60, 0]
            },
            sagittarius: {
                color: 0x06B6D4, gemColor: 0x06B6D4,
                stars: [[-40, 50, 0], [20, 60, 0], [60, 20, 0], [10, -20, 0], [-50, -10, 0], [30, -60, 0]],
                lines: [[0,1],[1,2],[2,3],[3,4],[4,0],[2,5]],
                gemPos: [60, 20, 0]
            },
            capricorn: {
                color: 0x64748B, gemColor: 0x94A3B8,
                stars: [[-70, 30, 0], [0, 50, 0], [70, 20, 0], [40, -40, 0], [-40, -40, 0]],
                lines: [[0,1],[1,2],[2,3],[3,4],[4,0]],
                gemPos: [0, 50, 0]
            },
            aquarius: {
                color: 0x8B5CF6, gemColor: 0xA855F7,
                stars: [[-70, 40, 0], [-30, 50, 0], [20, 30, 0], [70, 40, 0], [-50, -10, 0], [-10, -20, 0], [40, -10, 0]],
                lines: [[0,1],[1,2],[2,3],[4,5],[5,6]],
                gemPos: [-30, 50, 0]
            },
            pisces: {
                color: 0x2DD4BF, gemColor: 0x2DD4BF,
                stars: [[-70, 60, 0], [-40, 0, 0], [0, -30, 0], [40, 0, 0], [70, 60, 0]],
                lines: [[0,1],[1,2],[2,3],[3,4]],
                gemPos: [0, -30, 0]
            }
        };

        // 7. Контейнер активного созвездия и 3D-самоцвета
        const constellationGroup = new THREE.Group();
        scene.add(constellationGroup);

        // 3D Кристалл (Октаэдр с фасеточными гранями)
        const gemGeometry = new THREE.OctahedronGeometry(18, 0);
        const gemMaterial = new THREE.MeshPhysicalMaterial({
            color: 0xE11D48,
            emissive: 0x4A0413,
            roughness: 0.1,
            metalness: 0.2,
            transmission: 0.9,
            ior: 1.77, // Корунд / Рубин
            transparent: true,
            opacity: 0.95
        });
        const crystalMesh = new THREE.Mesh(gemGeometry, gemMaterial);
        constellationGroup.add(crystalMesh);

        // Ореол кристалла (каркасный кристалл)
        const wireGeo = new THREE.OctahedronGeometry(22, 0);
        const wireMat = new THREE.MeshBasicMaterial({ color: 0xFBBF24, wireframe: true, transparent: true, opacity: 0.6 });
        const wireMesh = new THREE.Mesh(wireGeo, wireMat);
        crystalMesh.add(wireMesh);

        let linesMesh = null;
        let nodesPoints = null;

        function buildConstellation(signKey) {
            const data = ZODIAC_DATA[signKey] || ZODIAC_DATA['scorpio'];

            // Очистка старых нитей и звезд
            if (linesMesh) constellationGroup.remove(linesMesh);
            if (nodesPoints) constellationGroup.remove(nodesPoints);

            // 1. Позиция и цвет 3D кристалла
            crystalMesh.position.set(data.gemPos[0], data.gemPos[1], data.gemPos[2]);
            gemMaterial.color.setHex(data.gemColor);
            gemMaterial.emissive.setHex(data.color).multiplyScalar(0.2);
            rubyLight.color.setHex(data.gemColor);
            rubyLight.position.copy(crystalMesh.position);

            // 2. Звезды созвездия (узлы)
            const nodeGeo = new THREE.BufferGeometry();
            const nodePos = [];
            data.stars.forEach(pt => { nodePos.push(pt[0], pt[1], pt[2]); });
            nodeGeo.setAttribute('position', new THREE.Float32BufferAttribute(nodePos, 3));
            
            const nodeMat = new THREE.PointsMaterial({
                size: 8,
                color: 0xFEF3C7,
                transparent: true,
                opacity: 0.95
            });
            nodesPoints = new THREE.Points(nodeGeo, nodeMat);
            constellationGroup.add(nodesPoints);

            // 3. Золотые нити сакральной геометрии
            const linePositions = [];
            data.lines.forEach(pair => {
                const p1 = data.stars[pair[0]];
                const p2 = data.stars[pair[1]];
                linePositions.push(p1[0], p1[1], p1[2], p2[0], p2[1], p2[2]);
            });

            const lineGeo = new THREE.BufferGeometry();
            lineGeo.setAttribute('position', new THREE.Float32BufferAttribute(linePositions, 3));
            const lineMat = new THREE.LineBasicMaterial({
                color: 0xF59E0B,
                transparent: true,
                opacity: 0.75,
                linewidth: 2
            });
            linesMesh = new THREE.LineSegments(lineGeo, lineMat);
            constellationGroup.add(linesMesh);
        }

        // Инициализация созвездием Скорпиона по умолчанию
        buildConstellation('scorpio');

        // 8. Переключатель созвездий (слушаем клики по data-sign)
        document.querySelectorAll('[data-sign]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const sign = this.getAttribute('data-sign').toLowerCase();
                if (ZODIAC_DATA[sign]) {
                    buildConstellation(sign);
                }
            });
        });

        // 9. Оживление Девы (Living Astraina)
        const museImg = document.querySelector('.ast-muse-img') || document.querySelector('.muse-img') || document.querySelector('#ast-muse-container img');
        let mouseX = 0, mouseY = 0;
        let targetX = 0, targetY = 0;

        window.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX / window.innerWidth - 0.5) * 2;
            mouseY = (e.clientY / window.innerHeight - 0.5) * 2;
        });

        // 10. Главный анимационный цикл (60-120 FPS)
        let clock = new THREE.Clock();

        function animate() {
            requestAnimationFrame(animate);
            const t = clock.getElapsedTime();

            // Вращение кристалла
            crystalMesh.rotation.y = t * 0.8;
            crystalMesh.rotation.x = Math.sin(t * 0.5) * 0.3;
            wireMesh.rotation.y = -t * 0.4;

            // Пульсация света камня (сердце звезды)
            const pulse = 1.0 + Math.sin(t * 3.5) * 0.25;
            rubyLight.intensity = 2.5 * pulse;
            crystalMesh.scale.set(pulse, pulse, pulse);

            // Движение звездного неба и Млечного Пути
            starField.rotation.y = t * 0.015;
            milkyWay.rotation.y = t * 0.008;

            // Интерактивное парение Девы
            if (museImg) {
                targetX += (mouseX - targetX) * 0.05;
                targetY += (mouseY - targetY) * 0.05;
                const floatY = Math.sin(t * 1.6) * 7; // ±7px вертикально
                museImg.style.transform = `translate3d(${targetX * 12}px, ${floatY + targetY * 12}px, 0) rotate(${targetX * 1.5}deg)`;
            }

            // Мягкое следование сцены за курсором
            camera.position.x += (mouseX * 50 - camera.position.x) * 0.03;
            camera.position.y += (-mouseY * 40 - camera.position.y) * 0.03;
            camera.lookAt(0, 0, 0);

            renderer.render(scene, camera);
        }

        animate();

        // 11. Обработка ресайза окна
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });

        console.log('✧ [Astraina 3D Engine] Successfully wired to DOM elements.');
    }
})();