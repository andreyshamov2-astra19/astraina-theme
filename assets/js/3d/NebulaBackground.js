/**
 * ASTRAINA Volumetric GLSL Nebula Engine
 * 60-120 FPS Raymarched noise nebula with dynamic page-specific palettes.
 * Version: 9.4.0
 */

(function (window) {
    'use strict';

    const NEBULA_SHADERS = {
        vertex: `
            varying vec2 vUv;
            void main() {
                vUv = uv;
                gl_Position = vec4(position, 1.0);
            }
        `,
        fragment: `
            uniform float uTime;
            uniform vec2 uResolution;
            uniform vec3 uColorCore;
            uniform vec3 uColorDust;
            varying vec2 vUv;

            // Симплекс шум и fBm
            vec3 mod289(vec3 x) { return x - floor(x * (1.0 / 289.0)) * 289.0; }
            vec2 mod289(vec2 x) { return x - floor(x * (1.0 / 289.0)) * 289.0; }
            vec3 permute(vec3 x) { return mod289(((x*34.0)+1.0)*x); }

            float snoise(vec2 v) {
                const vec4 C = vec4(0.211324865405187, 0.366025403784439, -0.577350269189626, 0.024390243902439);
                vec2 i  = floor(v + dot(v, C.yy));
                vec2 x0 = v - i + dot(i, C.xx);
                vec2 i1 = (x0.x > x0.y) ? vec2(1.0, 0.0) : vec2(0.0, 1.0);
                vec4 x12 = x0.xyxy + C.xxzz;
                x12.xy -= i1;
                i = mod289(i);
                vec3 p = permute(permute(i.y + vec3(0.0, i1.y, 1.0)) + i.x + vec3(0.0, i1.x, 1.0));
                vec3 m = max(0.5 - vec3(dot(x0,x0), dot(x12.xy,x12.xy), dot(x12.zw,x12.zw)), 0.0);
                m = m*m; m = m*m;
                vec3 x = 2.0 * fract(p * C.www) - 1.0;
                vec3 h = abs(x) - 0.5;
                vec3 ox = floor(x + 0.5);
                vec3 a0 = x - ox;
                m *= 1.79284291400159 - 0.85373472095314 * (a0*a0 + h*h);
                vec3 g;
                g.x  = a0.x  * x0.x  + h.x  * x0.y;
                g.yz = a0.yz * x12.xz + h.yz * x12.yw;
                return 130.0 * dot(m, g);
            }

            float fbm(vec2 p) {
                float f = 0.0;
                f += 0.5000 * snoise(p); p *= 2.02;
                f += 0.2500 * snoise(p); p *= 2.03;
                f += 0.1250 * snoise(p); p *= 2.01;
                f += 0.0625 * snoise(p);
                return f;
            }

            void main() {
                vec2 uv = (gl_FragCoord.xy - 0.5 * uResolution.xy) / uResolution.y;
                float t = uTime * 0.035;

                // Газопылевые рукава Млечного Пути
                vec2 p = uv * 2.2;
                float q = fbm(p + vec2(t * 0.2, -t * 0.15));
                float r = fbm(p + 1.8 * q + vec2(0.1 * t, 0.15 * t));

                // Смешение спектрального ядра и обсидиановой космической пыли
                vec3 color = mix(vec3(0.008, 0.015, 0.03), uColorDust, clamp(r * 1.5, 0.0, 1.0));
                color = mix(color, uColorCore, clamp(pow(q, 2.5) * 1.8, 0.0, 1.0));

                // Мягкое виньетирование краев без черных паразитных полос
                float edgeMask = smoothstep(1.6, 0.2, length(uv));
                gl_FragColor = vec4(color * edgeMask, 0.82);
            }
        `
    };

    class NebulaBackground {
        constructor(scene) {
            this.scene = scene;
            this.uniforms = {
                uTime: { value: 0 },
                uResolution: { value: new THREE.Vector2(window.innerWidth, window.innerHeight) },
                uColorCore: { value: new THREE.Color(0xF59E0B) }, // Янтарное золото
                uColorDust: { value: new THREE.Color(0x0E1E38) }  // Глубокое индиго
            };

            this.createMesh();
        }

        createMesh() {
            // Полноэкранный фоновый квад на дальнем плане (Layer 0)
            const geometry = new THREE.PlaneGeometry(2, 2);
            this.material = new THREE.ShaderMaterial({
                vertexShader: NEBULA_SHADERS.vertex,
                fragmentShader: NEBULA_SHADERS.fragment,
                uniforms: this.uniforms,
                depthWrite: false,
                depthTest: false,
                transparent: true
            });

            this.mesh = new THREE.Mesh(geometry, this.material);
            this.mesh.layers.set(0); // Без блума для сохранения плавных полутонов
            this.scene.add(this.mesh);
        }

        setSize(width, height) {
            this.uniforms.uResolution.value.set(width, height);
        }

        update(time) {
            this.uniforms.uTime.value = time;
        }

        setPalette(coreHex, dustHex) {
            this.uniforms.uColorCore.value.setHex(coreHex);
            this.uniforms.uColorDust.value.setHex(dustHex);
        }
    }

    window.AstraNebulaBackground = NebulaBackground;
})(window);