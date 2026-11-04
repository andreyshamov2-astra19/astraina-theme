<?php
/**
 * ASTRAINA MASTER THEME — HEADER ENGINE v9.4.0
 * Luxury Grade $500,000 Architecture: Samhain Obsidian & Cosmic Gold
 * Grand Folio Book with Sacred Atlantis Logo on all leaves · Zero Layout Shifts
 *
 * @package AstrainaTheme
 */
if (!defined('ABSPATH')) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="color-scheme" content="dark">
    <meta name="theme-color" content="#020408">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Montserrat:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            color-scheme: dark;
            --ast-bg: #020408;
            --ast-card: rgba(8, 14, 26, 0.78);
            --ast-ruby: #E11D48;
            --ast-ruby-glow: rgba(225, 29, 72, 0.45);
            --ast-gold: #F59E0B;
            --ast-gold-light: #FEF3C7;
            --ast-gold-bright: #FBBF24;
            --ast-border: rgba(245, 158, 11, 0.22);
            --ast-text: #E2E8F0;
            --ast-text-dim: #94A3B8;
            --font-title: 'Cinzel', Georgia, serif;
            --font-body: 'Plus Jakarta Sans', 'Montserrat', sans-serif;
            --font-mono: 'Space Mono', monospace;
        }

        html {
            background-color: #020408 !important;
            color-scheme: dark;
        }

        body {
            margin: 0 !important;
            padding: 0 !important;
            background-color: transparent !important;
            color: var(--ast-text);
            font-family: var(--font-body);
            min-height: 100vh;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            color-scheme: dark;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            -webkit-tap-highlight-color: transparent;
        }

        /* ЗВЕЗДНЫЙ КУПОЛ НА ВСЕХ СТРАНИЦАХ */
        #ast-canvas-3d {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 0 !important;
            pointer-events: none !important;
            display: block !important;
        }

        /* ПРОЗРАЧНОСТЬ КОНТЕНТНЫХ ОБЕРТОК — ЗВЕЗДЫ ВИДНЫ СКВОЗЬ СТЕКЛО */
        .site,
        #page,
        .site-content,
        #content,
        #primary,
        main,
        .ast-module-wrap,
        .ast-folio-page-content,
        .ast-container,
        .ast-card,
        .ast-box {
            position: relative;
            z-index: 2;
        }

        .ast-module-wrap,
        .ast-container {
            background: transparent !important;
        }

        /* HEADER & NAVIGATION */
        .ast-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(2, 4, 8, 0.92);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--ast-border);
            padding: 12px 24px;
        }

        .ast-header-inner {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .ast-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
        }

        .ast-brand-img {
            height: 44px;
            width: auto;
            filter: drop-shadow(0 0 12px var(--ast-ruby-glow));
            transition: transform 0.4s ease;
        }

        .ast-brand:hover .ast-brand-img {
            transform: scale(1.06) rotate(3deg);
        }

        .ast-brand-title {
            font-family: var(--font-title);
            font-size: 1.45rem;
            letter-spacing: 5px;
            color: #FFFFFF;
            line-height: 1.1;
            font-weight: 700;
        }

        .ast-brand-sub {
            font-family: var(--font-mono);
            font-size: 8.5px;
            letter-spacing: 2.5px;
            color: var(--ast-gold);
            text-transform: uppercase;
        }

        .ast-nav {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .ast-nav-link {
            font-size: 11.5px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--ast-text-dim);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            padding: 6px 0;
            font-weight: 500;
        }

        .ast-nav-link:hover, .ast-nav-link.active {
            color: var(--ast-gold-light);
            text-shadow: 0 0 10px rgba(245, 158, 11, 0.6);
        }

        .ast-nav-link:hover::after, .ast-nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--ast-ruby);
            box-shadow: 0 0 10px var(--ast-ruby);
        }

        .ast-header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .ast-lang-wrap {
            position: relative;
        }

        .ast-lang-btn {
            background: rgba(8, 14, 26, 0.85);
            border: 1px solid var(--ast-border);
            color: var(--ast-gold-light);
            padding: 7px 14px;
            border-radius: 20px;
            font-family: var(--font-mono);
            font-size: 11px;
            letter-spacing: 1.5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .ast-lang-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            background: rgba(8, 14, 26, 0.98);
            border: 1px solid var(--ast-border);
            border-radius: 12px;
            padding: 6px 0;
            min-width: 120px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.9);
            z-index: 1001;
        }

        .ast-lang-wrap:hover .ast-lang-menu {
            display: block;
        }

        .ast-lang-item {
            display: block;
            padding: 8px 16px;
            font-size: 11px;
            letter-spacing: 1px;
            color: var(--ast-text-dim);
            text-decoration: none;
            font-family: var(--font-mono);
        }

        .ast-lang-item:hover, .ast-lang-item.active {
            color: var(--ast-gold);
            background: rgba(245, 158, 11, 0.1);
        }

        .ast-devi-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 14px 5px 6px;
            background: rgba(8, 14, 26, 0.9);
            border: 1px solid var(--ast-border);
            border-radius: 30px;
            text-decoration: none;
        }

        .ast-devi-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1px solid var(--ast-gold);
            object-fit: cover;
        }

        .ast-devi-name {
            font-size: 11px;
            font-weight: 600;
            color: var(--ast-gold-light);
            letter-spacing: 1px;
        }

        .ast-devi-status {
            font-size: 9px;
            color: #10B981;
            display: flex;
            align-items: center;
            gap: 5px;
            font-family: var(--font-mono);
        }

        .ast-devi-dot {
            width: 6px;
            height: 6px;
            background: #10B981;
            border-radius: 50%;
            box-shadow: 0 0 8px #10B981;
        }

        /* СТИЛИ НЕОНОВОГО СВЕЧЕНИЯ НАТАЛЬНОЙ КАРТЫ */
        .ast-natal-svg, .ast-wheel-svg, svg[id*="wheel"], svg[id*="chart"], svg.ast-natal-chart {
            filter: drop-shadow(0 0 25px rgba(245, 158, 11, 0.25)) drop-shadow(0 0 45px rgba(225, 29, 72, 0.15));
            overflow: visible !important;
        }

        .ast-aspect-trine, line[data-type="trine"], line[data-type="sextile"] {
            stroke: #FBBF24 !important;
            filter: drop-shadow(0 0 6px rgba(251, 191, 36, 0.85)) !important;
        }

        .ast-aspect-square, line[data-type="square"], line[data-type="opposition"] {
            stroke: #E11D48 !important;
            filter: drop-shadow(0 0 8px rgba(225, 29, 72, 0.95)) !important;
        }

        .ast-planet-node circle {
            transition: all 0.3s ease;
        }

        .ast-planet-node:hover circle {
            r: 17px;
            stroke-width: 2.5px;
            filter: drop-shadow(0 0 12px var(--ast-gold-bright)) !important;
        }

        /* ========================================================
           3D-ФОЛИАНТ АТЛАНТИДЫ: УВЕЛИЧЕННЫЙ МОНУМЕНТАЛЬНЫЙ РАЗМЕР
           ======================================================== */
        #ast-folio-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 99999;
            pointer-events: none !important;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(2, 4, 8, 0.90) !important;
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            opacity: 0;
            transition: opacity 0.35s ease-out;
        }

        #ast-folio-wrapper.active {
            display: flex !important;
            opacity: 1;
            pointer-events: auto !important;
        }

        #ast-folio-wrapper.ast-folio-dissolve {
            opacity: 0 !important;
            pointer-events: none !important;
            transition: opacity 0.35s ease-out !important;
        }

        #ast-folio-wrapper.ast-folio-dissolve .ast-folio-book {
            transform: scale(1.02);
            filter: blur(4px);
            transition: transform 0.35s ease-out, filter 0.35s ease-out;
        }

        .ast-folio-viewport {
            perspective: 2800px;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        /* УВЕЛИЧЕННЫЙ РАЗМЕР КНИГИ: МАКСИМАЛЬНОЕ ЗАПОЛНЕНИЕ ЭКРАНА */
        .ast-folio-book {
            position: relative;
            width: min(95vw, 1320px);
            height: min(88vh, 760px);
            transform-style: preserve-3d;
            box-shadow: 0 45px 120px rgba(0, 0, 0, 0.98), 0 0 70px rgba(245, 158, 11, 0.16);
            border-radius: 14px;
            transition: opacity 0.3s ease, transform 0.3s ease, filter 0.3s ease;
        }

        .ast-folio-spine {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 36px;
            transform: translateX(-50%);
            background: linear-gradient(90deg, rgba(2,4,8,0.98) 0%, rgba(245,158,11,0.4) 50%, rgba(2,4,8,0.98) 100%);
            box-shadow: inset 0 0 15px rgba(0,0,0,0.95), 0 0 25px rgba(245, 158, 11, 0.25);
            z-index: 25;
            pointer-events: none;
        }

        .ast-folio-page-base {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 50%;
            background: linear-gradient(145deg, #070D1A 0%, #020408 100%);
            border: 1px solid var(--ast-border);
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .ast-base-left {
            left: 0;
            border-top-left-radius: 14px;
            border-bottom-left-radius: 14px;
            border-right: none;
        }

        .ast-base-right {
            right: 0;
            border-top-right-radius: 14px;
            border-bottom-right-radius: 14px;
            border-left: none;
        }

        .ast-folio-frame {
            border: 1px solid rgba(245, 158, 11, 0.22);
            width: 100%;
            height: 100%;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .ast-fc-corner {
            position: absolute;
            font-family: var(--font-mono);
            color: var(--ast-gold);
            font-size: 18px;
            line-height: 1;
            opacity: 0.75;
        }
        .ast-f-tl { top: -6px; left: -4px; }
        .ast-f-tr { top: -6px; right: -4px; }
        .ast-f-bl { bottom: -6px; left: -4px; }
        .ast-f-br { bottom: -6px; right: -4px; }

        .ast-folio-mid-content {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        /* КРУПНЫЙ СВЯЩЕННЫЙ ЛОГОТИП ASTRAINA ВМЕСТО МЕЛКОГО ТЕКСТА */
        .ast-folio-logo-img {
            max-width: 220px;
            height: auto;
            filter: drop-shadow(0 0 25px var(--ast-ruby-glow)) drop-shadow(0 0 45px rgba(245, 158, 11, 0.4));
            animation: astLogoAura 3.2s infinite ease-in-out;
            display: block;
        }

        @keyframes astLogoAura {
            0%, 100% {
                transform: scale(1);
                filter: drop-shadow(0 0 22px var(--ast-ruby-glow)) drop-shadow(0 0 35px rgba(245, 158, 11, 0.3));
            }
            50% {
                transform: scale(1.05);
                filter: drop-shadow(0 0 32px var(--ast-ruby)) drop-shadow(0 0 55px rgba(245, 158, 11, 0.55));
            }
        }

        .ast-folio-flipper {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            transform-origin: left center;
            transform-style: preserve-3d;
            transform: rotateY(0deg);
            z-index: 30;
            will-change: transform;
        }

        #ast-folio-wrapper.active .ast-folio-flipper {
            animation: astBookFlip 1.45s cubic-bezier(0.28, 0.85, 0.32, 1) forwards;
        }

        @keyframes astBookFlip {
            0% {
                transform: rotateY(0deg);
                box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            }
            50% {
                box-shadow: 0 50px 110px rgba(0,0,0,0.96), 0 0 75px rgba(245, 158, 11, 0.35);
            }
            100% {
                transform: rotateY(-180deg);
                box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            }
        }

        .ast-leaf-face {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border: 1px solid var(--ast-border);
        }

        .ast-leaf-front {
            transform: rotateY(0deg);
            background: linear-gradient(135deg, #091224 0%, #03060D 100%);
            border-top-right-radius: 14px;
            border-bottom-right-radius: 14px;
            border-left: none;
        }

        .ast-leaf-back {
            transform: rotateY(180deg);
            background: linear-gradient(-135deg, #091224 0%, #03060D 100%);
            border-top-left-radius: 14px;
            border-bottom-left-radius: 14px;
            border-right: none;
        }

        .ast-leaf-gold-edge {
            position: absolute;
            top: 0;
            right: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, #B45309 0%, #FEF3C7 50%, #F59E0B 100%);
            box-shadow: 0 0 20px var(--ast-gold-bright), 0 0 35px var(--ast-gold);
        }

        .ast-leaf-gold-edge-back {
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, #B45309 0%, #FEF3C7 50%, #F59E0B 100%);
            box-shadow: 0 0 20px var(--ast-gold-bright), 0 0 35px var(--ast-gold);
        }

        @media (max-width: 960px) {
            .ast-nav { display: none; }
            .ast-devi-info { display: none; }
            .ast-folio-book {
                width: 94vw;
                height: 75vh;
            }
            .ast-folio-page-base, .ast-leaf-face { padding: 20px; }
            .ast-folio-logo-img { max-width: 140px; }
        }
    </style>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ГЛОБАЛЬНЫЕ SVG ФИЛЬТРЫ НЕОНОВОГО СВЕЧЕНИЯ ДЛЯ ВСЕХ КАРТ И ДИАГРАММ -->
<svg style="position: absolute; width: 0; height: 0; overflow: hidden;" aria-hidden="true">
    <defs>
        <filter id="ast-glow-gold" x="-50%" y="-50%" width="200%" height="200%">
            <feGaussianBlur in="SourceGraphic" stdDeviation="4.5" result="blur" />
            <feMerge>
                <feMergeNode in="blur" />
                <feMergeNode in="SourceGraphic" />
            </feMerge>
        </filter>
        <filter id="ast-glow-ruby" x="-50%" y="-50%" width="200%" height="200%">
            <feGaussianBlur in="SourceGraphic" stdDeviation="5.5" result="blur" />
            <feMerge>
                <feMergeNode in="blur" />
                <feMergeNode in="SourceGraphic" />
            </feMerge>
        </filter>
        <filter id="ast-glow-cyan" x="-50%" y="-50%" width="200%" height="200%">
            <feGaussianBlur in="SourceGraphic" stdDeviation="4" result="blur" />
            <feMerge>
                <feMergeNode in="blur" />
                <feMergeNode in="SourceGraphic" />
            </feMerge>
        </filter>
    </defs>
</svg>

<!-- ЕДИНЫЙ ЗВЕЗДНЫЙ ХОЛСТ НА ВСЕХ СТРАНИЦАХ -->
<canvas id="ast-canvas-3d" aria-hidden="true"></canvas>

<!-- 3D ФОЛИАНТ АТЛАНТИДЫ (УВЕЛИЧЕННЫЙ ЛЮКСОВЫЙ РАЗВОРОТ С ЛОГОТИПОМ НА ВСЕХ СТРАНИЦАХ) -->
<div id="ast-folio-wrapper" aria-hidden="true">
    <div class="ast-folio-viewport">
        <div class="ast-folio-book">
            
            <div class="ast-folio-spine"></div>

            <!-- Левая базовая страница: Гербовый логотип -->
            <div class="ast-folio-page-base ast-base-left">
                <div class="ast-folio-frame">
                    <span class="ast-fc-corner ast-f-tl">╔</span>
                    <span class="ast-fc-corner ast-f-tr">╗</span>
                    <span class="ast-fc-corner ast-f-bl">╚</span>
                    <span class="ast-fc-corner ast-f-br">╝</span>
                    
                    <div class="ast-folio-mid-content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/astraina-logo.png" alt="ASTRAINA Logo" class="ast-folio-logo-img">
                    </div>
                </div>
            </div>

            <!-- Правая базовая страница: Гербовый логотип -->
            <div class="ast-folio-page-base ast-base-right">
                <div class="ast-folio-frame">
                    <span class="ast-fc-corner ast-f-tl">╔</span>
                    <span class="ast-fc-corner ast-f-tr">╗</span>
                    <span class="ast-fc-corner ast-f-bl">╚</span>
                    <span class="ast-fc-corner ast-f-br">╝</span>
                    
                    <div class="ast-folio-mid-content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/astraina-logo.png" alt="ASTRAINA Logo" class="ast-folio-logo-img">
                    </div>
                </div>
            </div>

            <!-- Переворачивающийся лист: лицо и оборот (Гербовые логотипы) -->
            <div class="ast-folio-flipper" id="ast-folio-turning-leaf">
                <div class="ast-leaf-face ast-leaf-front">
                    <div class="ast-leaf-gold-edge"></div>
                    <div class="ast-folio-frame">
                        <span class="ast-fc-corner ast-f-tl">╔</span>
                        <span class="ast-fc-corner ast-f-tr">╗</span>
                        <span class="ast-fc-corner ast-f-bl">╚</span>
                        <span class="ast-fc-corner ast-f-br">╝</span>

                        <div class="ast-folio-mid-content">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/astraina-logo.png" alt="ASTRAINA Logo" class="ast-folio-logo-img">
                        </div>
                    </div>
                </div>

                <div class="ast-leaf-face ast-leaf-back">
                    <div class="ast-leaf-gold-edge-back"></div>
                    <div class="ast-folio-frame">
                        <span class="ast-fc-corner ast-f-tl">╔</span>
                        <span class="ast-fc-corner ast-f-tr">╗</span>
                        <span class="ast-fc-corner ast-f-bl">╚</span>
                        <span class="ast-fc-corner ast-f-br">╝</span>

                        <div class="ast-folio-mid-content">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/astraina-logo.png" alt="ASTRAINA Logo" class="ast-folio-logo-img">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<header class="ast-header">
    <div class="ast-header-inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="ast-brand">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/astraina-logo.png" alt="ASTRAINA Logo" class="ast-brand-img">
            <div>
                <div class="ast-brand-title">ASTRAINA</div>
                
            </div>
        </a>

        <nav class="ast-nav">
            <a href="<?php echo esc_url(home_url('/astro-chart/')); ?>" class="ast-nav-link <?php echo is_page('astro-chart') ? 'active' : ''; ?>">Натальный Атлас</a>
            <a href="<?php echo esc_url(home_url('/astro-synastry/')); ?>" class="ast-nav-link <?php echo is_page('astro-synastry') ? 'active' : ''; ?>">Синастрия Пар</a>
            <a href="<?php echo esc_url(home_url('/astro-lunar/')); ?>" class="ast-nav-link <?php echo is_page('astro-lunar') ? 'active' : ''; ?>">Лунный Код</a>
            <a href="<?php echo esc_url(home_url('/astro-sky/')); ?>" class="ast-nav-link <?php echo is_page('astro-sky') ? 'active' : ''; ?>">Купол Неба</a>
            <a href="<?php echo esc_url(home_url('/astro-calendar/')); ?>" class="ast-nav-link <?php echo is_page('astro-calendar') ? 'active' : ''; ?>">Хронос</a>
        </nav>

        <div class="ast-header-right">
            <div class="ast-lang-wrap">
                <button type="button" class="ast-lang-btn">
                    <span>🌐 RU</span> <span style="font-size:9px; opacity:0.7;">▼</span>
                </button>
                <div class="ast-lang-menu">
                    <a href="?lang=ru" class="ast-lang-item active">RU · Русский</a>
                    <a href="?lang=en" class="ast-lang-item">EN · English</a>
                </div>
            </div>

            <a href="<?php echo esc_url(home_url('/')); ?>#astraina-oracle" class="ast-devi-pill">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/astraina-avatar.png" alt="Astraina" class="ast-devi-avatar">
                <div class="ast-devi-info">
                    <span class="ast-devi-name">Astraina</span>
                    <span class="ast-devi-status"><span class="ast-devi-dot"></span> В созвучии</span>
                </div>
            </a>
        </div>
    </div>
</header>