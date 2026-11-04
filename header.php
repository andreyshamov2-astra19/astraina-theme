<?php
/**
 * ASTRAINA OBSERVATORY · MASTER HEADER (v14.0 LUXURY EDITION)
 * Samhain Obsidian (#020408) & Cosmic Gold (#F59E0B)
 * 
 * Architectural Features:
 * - Fixed Transparent Glassmorphism Navbar (backdrop-filter: blur(16px))
 * - Unified Modern Typography (100% Plus Jakarta Sans, zero serif)
 * - 4 Hero Locomotives (Daily Horoscope, Natal Atlas, Compatibility, 3D Sky)
 * - Full-screen Observatory Map Mega-Curtain (4 Sacred Columns, 26 Portals)
 * - Sanctuary Glass Capsule (Profile, WooCommerce Cart, Pricing, Privacy, B2B Vedunya Pro)
 * - Mobile Touch-Slide Drawer (85% width, zero horizontal drift)
 * - Hard Emergency Preloader (400ms killswitch)
 * - Blocked Folio Book (#ast-folio-wrapper) & Layer-Isolated Canvas (#ast-canvas-3d)
 * 
 * @package AstrainaTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

$site_url = home_url('/');
$current_lang = function_exists('ast_get_current_language') ? ast_get_current_language() : 'en';

// WooCommerce Cart Count Helper
$cart_count = 0;
if (function_exists('WC') && WC()->cart) {
    $cart_count = (int) WC()->cart->get_cart_contents_count();
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="ast-theme-dark">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#020408">
    <meta name="color-scheme" content="dark">

    <!-- Unified Luxury Typography: Plus Jakarta Sans (Strict Zero-Cinzel Standard) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

    <style id="ast-header-glass-core">
        :root {
            --ast-font-main: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --ast-bg-obsidian: #020408;
            --ast-gold-base: #F59E0B;
            --ast-gold-light: #FBBF24;
            --ast-gold-pale: #FEF3C7;
            --ast-border-gold: rgba(245, 158, 11, 0.16);
            --ast-border-gold-hover: rgba(245, 158, 11, 0.45);
            --ast-glass-navbar: rgba(2, 4, 8, 0.45);
            --ast-glass-card: rgba(6, 11, 20, 0.65);
            --ast-glass-curtain: rgba(2, 4, 8, 0.88);
            --ast-blur-navbar: 16px;
            --ast-blur-curtain: 28px;
            --ast-text-primary: #F8FAFC;
            --ast-text-muted: #94A3B8;
        }

        /* 1. Global Reset & Stacking Context */
        html, body {
            margin: 0;
            padding: 0;
            background-color: var(--ast-bg-obsidian);
            color: var(--ast-text-primary);
            font-family: var(--ast-font-main);
            font-feature-settings: "cv02", "cv03", "cv04", "cv11";
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
        }

        /* 2. Layer Isolation: Fixed 3D Sky Canvas */
        #ast-canvas-3d {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 0 !important;
            pointer-events: none !important;
        }

        /* 3. Interface Security: Block Unstable Folio Book */
        #ast-folio-wrapper,
        .ast-folio-book,
        .turn-page {
            display: none !important;
            opacity: 0 !important;
            pointer-events: none !important;
            visibility: hidden !important;
            height: 0 !important;
            width: 0 !important;
        }

        /* 4. Preloader with 400ms Cutoff */
        #ast-preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: #020408;
            z-index: 999999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.25s ease-out, visibility 0.25s ease-out;
        }

        .ast-preloader-monogram {
            position: relative;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ast-preloader-ring {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 2px solid rgba(245, 158, 11, 0.15);
            border-top-color: var(--ast-gold-base);
            animation: astPreloaderSpin 0.75s linear infinite;
        }

        .ast-preloader-symbol {
            color: var(--ast-gold-light);
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.05em;
            text-shadow: 0 0 16px rgba(245, 158, 11, 0.6);
            animation: astPreloaderPulse 1.2s ease-in-out infinite;
        }

        @keyframes astPreloaderSpin {
            to { transform: rotate(360deg); }
        }

        @keyframes astPreloaderPulse {
            0%, 100% { opacity: 0.6; transform: scale(0.95); }
            50% { opacity: 1; transform: scale(1.05); }
        }

        /* 5. Glassmorphism Top Navbar */
        .ast-navbar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 72px;
            z-index: 1000;
            background: var(--ast-glass-navbar);
            backdrop-filter: blur(var(--ast-blur-navbar));
            -webkit-backdrop-filter: blur(var(--ast-blur-navbar));
            border-bottom: 1px solid var(--ast-border-gold);
            display: flex;
            align-items: center;
            transition: background 0.3s ease, border-color 0.3s ease;
        }

        .ast-navbar-container {
            width: 100%;
            max-width: 1560px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
        }

        /* Brand Monogram */
        .ast-brand-link {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--ast-text-primary);
            flex-shrink: 0;
        }

        .ast-brand-logo-gem {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: radial-gradient(circle at 35% 35%, rgba(245, 158, 11, 0.25), rgba(2, 4, 8, 0.95));
            border: 1px solid var(--ast-border-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ast-gold-light);
            font-size: 16px;
            font-weight: 800;
            box-shadow: 0 0 14px rgba(245, 158, 11, 0.15);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease;
        }

        .ast-brand-link:hover .ast-brand-logo-gem {
            transform: scale(1.05);
            border-color: var(--ast-gold-base);
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.35);
        }

        .ast-brand-text {
            display: flex;
            flex-direction: column;
        }

        .ast-brand-name {
            font-size: 17px;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: #FFFFFF;
            line-height: 1.1;
        }

        .ast-brand-tagline {
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 0.24em;
            color: var(--ast-gold-base);
            text-transform: uppercase;
            margin-top: 2px;
        }

        /* 4 Sacred Locomotives (Desktop) */
        .ast-locomotives-nav {
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0 auto;
            padding: 0 16px;
        }

        .ast-nav-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.02em;
            color: #E2E8F0;
            text-decoration: none;
            background: transparent;
            border: 1px solid transparent;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            white-space: nowrap;
        }

        .ast-nav-pill-glyph {
            color: var(--ast-gold-base);
            font-size: 11px;
            transition: transform 0.25s ease;
        }

        .ast-nav-pill:hover {
            color: #FFFFFF;
            background: rgba(245, 158, 11, 0.08);
            border-color: rgba(245, 158, 11, 0.25);
            transform: translateY(-1px);
        }

        .ast-nav-pill:hover .ast-nav-pill-glyph {
            transform: scale(1.2);
            color: var(--ast-gold-light);
        }

        .ast-nav-pill.active {
            color: #FFFFFF;
            background: rgba(245, 158, 11, 0.12);
            border-color: var(--ast-border-gold-hover);
        }

        /* Right Segment Controls */
        .ast-right-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .ast-btn-capsule {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            height: 38px;
            padding: 0 15px;
            border-radius: 9px;
            font-size: 12.5px;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid var(--ast-border-gold);
            background: rgba(6, 11, 20, 0.55);
            color: #FFFFFF;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            box-sizing: border-box;
        }

        .ast-btn-capsule:hover {
            border-color: var(--ast-gold-base);
            background: rgba(245, 158, 11, 0.12);
            box-shadow: 0 0 16px rgba(245, 158, 11, 0.2);
            transform: translateY(-1px);
        }

        .ast-btn-capsule .ast-gold-spark {
            color: var(--ast-gold-light);
        }

        .ast-cart-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 18px;
            height: 18px;
            padding: 0 5px;
            border-radius: 9px;
            background: var(--ast-gold-base);
            color: #020408;
            font-size: 11px;
            font-weight: 800;
            line-height: 1;
            box-shadow: 0 0 8px rgba(245, 158, 11, 0.6);
            margin-left: 2px;
        }

        /* 6. Mega-Curtain: Observatory Map (4 Columns) */
        .ast-megamenu-curtain {
            position: fixed;
            top: 72px;
            left: 0;
            width: 100%;
            height: calc(100vh - 72px);
            background: var(--ast-glass-curtain);
            backdrop-filter: blur(var(--ast-blur-curtain));
            -webkit-backdrop-filter: blur(var(--ast-blur-curtain));
            border-bottom: 1px solid var(--ast-border-gold);
            z-index: 990;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform: translateY(-12px);
            transition: opacity 0.25s ease, transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.25s;
            overflow-y: auto;
            box-sizing: border-box;
            padding: 40px 24px 60px 24px;
        }

        .ast-megamenu-curtain.open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(0);
        }

        .ast-curtain-container {
            max-width: 1440px;
            margin: 0 auto;
        }

        .ast-curtain-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 24px;
            margin-bottom: 32px;
            border-bottom: 1px solid rgba(245, 158, 11, 0.12);
        }

        .ast-curtain-title {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
        }

        .ast-curtain-title span {
            color: var(--ast-gold-base);
        }

        .ast-curtain-close-btn {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: var(--ast-text-muted);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.2s ease;
        }

        .ast-curtain-close-btn:hover {
            color: #FFFFFF;
            border-color: var(--ast-gold-base);
            transform: scale(1.05);
        }

        .ast-curtain-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 32px;
        }

        .ast-curtain-col {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .ast-curtain-col-heading {
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--ast-gold-light);
            padding-bottom: 8px;
            border-bottom: 1px solid rgba(245, 158, 11, 0.14);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ast-portal-link {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 8px;
            text-decoration: none;
            color: #E2E8F0;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid transparent;
            transition: all 0.2s ease;
        }

        .ast-portal-link:hover {
            background: rgba(245, 158, 11, 0.08);
            border-color: rgba(245, 158, 11, 0.25);
            color: #FFFFFF;
            transform: translateX(4px);
        }

        .ast-portal-icon {
            color: var(--ast-gold-base);
            font-size: 14px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .ast-portal-meta {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .ast-portal-name {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.02em;
            line-height: 1.25;
        }

        .ast-portal-desc {
            font-size: 11px;
            font-weight: 400;
            color: var(--ast-text-muted);
            line-height: 1.35;
        }

        /* 7. Dropdown: Sanctuary / Обитель */
        .ast-sanctuary-wrapper {
            position: relative;
        }

        .ast-sanctuary-dropdown {
            position: absolute;
            top: calc(100% + 14px);
            right: 0;
            width: 290px;
            background: var(--ast-glass-card);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--ast-border-gold);
            border-radius: 12px;
            padding: 12px 0;
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.65), 0 0 20px rgba(245, 158, 11, 0.1);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform: translateY(-8px);
            transition: opacity 0.2s ease, transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.2s;
            z-index: 1002;
        }

        .ast-sanctuary-dropdown.open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(0);
        }

        .ast-dropdown-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 18px;
            text-decoration: none;
            color: #E2E8F0;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.15s ease;
        }

        .ast-dropdown-item:hover {
            background: rgba(245, 158, 11, 0.1);
            color: #FFFFFF;
            padding-left: 22px;
        }

        .ast-dropdown-item .ast-item-lead {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .ast-dropdown-item .ast-item-lead span {
            color: var(--ast-gold-base);
            font-size: 13px;
        }

        .ast-dropdown-divider {
            height: 1px;
            background: rgba(245, 158, 11, 0.12);
            margin: 8px 0;
        }

        .ast-dropdown-tag {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.08em;
            padding: 2px 7px;
            border-radius: 4px;
            background: rgba(245, 158, 11, 0.18);
            color: var(--ast-gold-light);
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        /* 8. Mobile Burger Button & Touch Drawer */
        .ast-burger-btn {
            display: none;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(6, 11, 20, 0.6);
            border: 1px solid var(--ast-border-gold);
            color: var(--ast-gold-light);
            align-items: center;
            justify-content: center;
            cursor: pointer;
            padding: 0;
        }

        .ast-burger-bars {
            display: flex;
            flex-direction: column;
            gap: 5px;
            width: 18px;
        }

        .ast-burger-bars span {
            display: block;
            height: 2px;
            background: #FFFFFF;
            border-radius: 1px;
            transition: transform 0.25s ease, opacity 0.25s ease;
        }

        .ast-mobile-drawer {
            position: fixed;
            top: 72px;
            right: 0;
            width: 86%;
            max-width: 380px;
            height: calc(100vh - 72px);
            background: rgba(2, 4, 8, 0.94);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            border-left: 1px solid var(--ast-border-gold);
            z-index: 995;
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            overflow-y: auto;
            box-sizing: border-box;
            padding: 24px 20px 48px 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .ast-mobile-drawer.open {
            transform: translateX(0);
        }

        .ast-drawer-backdrop {
            position: fixed;
            top: 72px;
            left: 0;
            width: 100vw;
            height: calc(100vh - 72px);
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            z-index: 994;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.25s ease, visibility 0.25s;
        }

        .ast-drawer-backdrop.open {
            opacity: 1;
            visibility: visible;
        }

        /* 9. Responsive Adjustments */
        @media (max-width: 1200px) {
            .ast-curtain-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 24px;
            }
        }

        @media (max-width: 1024px) {
            .ast-locomotives-nav {
                display: none;
            }
            .ast-burger-btn {
                display: flex;
            }
        }

        @media (max-width: 640px) {
            .ast-curtain-grid {
                grid-template-columns: 1fr;
            }
            .ast-brand-tagline {
                display: none;
            }
            .ast-btn-capsule span.ast-btn-label {
                display: none;
            }
            .ast-btn-capsule {
                padding: 0 10px;
            }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Hard Emergency Preloader (400ms Cutoff) -->
<div id="ast-preloader" aria-hidden="true">
    <div class="ast-preloader-monogram">
        <div class="ast-preloader-ring"></div>
        <div class="ast-preloader-symbol">✦</div>
    </div>
</div>

<!-- Layer Isolation: Fixed 3D Sky Canvas -->
<canvas id="ast-canvas-3d" aria-hidden="true"></canvas>

<!-- Security Safeguard: Block Unstable 3D Folio Book -->
<div id="ast-folio-wrapper" aria-hidden="true"></div>

<!-- Master Glassmorphism Navbar -->
<header class="ast-navbar-fixed" role="banner">
    <div class="ast-navbar-container">
        
        <!-- Brand Identity -->
        <a href="<?php echo esc_url($site_url); ?>" class="ast-brand-link" title="ASTRAINA Observatory">
            <div class="ast-brand-logo-gem">✦</div>
            <div class="ast-brand-text">
                <span class="ast-brand-name">ASTRAINA</span>
                <span class="ast-brand-tagline">JPL Astronomical Core</span>
            </div>
        </a>

        <!-- 4 Sacred Locomotives (Desktop Priority) -->
        <nav class="ast-locomotives-nav" role="navigation" aria-label="Sacred Locomotives">
            <a href="<?php echo esc_url($site_url . 'astro-lunar/'); ?>" class="ast-nav-pill">
                <span class="ast-nav-pill-glyph">✧</span>
                <span>Гороскоп Дня</span>
            </a>
            <a href="<?php echo esc_url($site_url . 'astro-chart/'); ?>" class="ast-nav-pill">
                <span class="ast-nav-pill-glyph">✧</span>
                <span>Натальный Атлас</span>
            </a>
            <a href="<?php echo esc_url($site_url . 'astro-synastry/'); ?>" class="ast-nav-pill">
                <span class="ast-nav-pill-glyph">✧</span>
                <span>Совместимость</span>
            </a>
            <a href="<?php echo esc_url($site_url . 'astro-sky/'); ?>" class="ast-nav-pill">
                <span class="ast-nav-pill-glyph">✧</span>
                <span>3D Купол</span>
            </a>
        </nav>

        <!-- Right Segment: Observatory Map & Sanctuary Capsule -->
        <div class="ast-right-controls">
            
            <!-- Mega-Curtain Toggle -->
            <button type="button" class="ast-btn-capsule" id="ast-megamenu-toggle" aria-expanded="false" aria-controls="ast-megamenu-curtain" title="Карта всех 26 порталов обсерватории">
                <span class="ast-gold-spark">✦</span>
                <span class="ast-btn-label">Карта Обсерватории</span>
            </button>

            <!-- Sanctuary Dropdown Wrapper -->
            <div class="ast-sanctuary-wrapper">
                <button type="button" class="ast-btn-capsule" id="ast-sanctuary-toggle" aria-expanded="false" aria-haspopup="true" title="Личная обитель и кабинет">
                    <span class="ast-gold-spark">☥</span>
                    <span class="ast-btn-label">Обитель</span>
                    <?php if ($cart_count > 0): ?>
                        <span class="ast-cart-badge" title="Товаров в корзине: <?php echo esc_attr($cart_count); ?>">
                            <?php echo esc_html($cart_count); ?>
                        </span>
                    <?php endif; ?>
                </button>

                <!-- Sanctuary Glass Dropdown -->
                <div class="ast-sanctuary-dropdown" id="ast-sanctuary-dropdown" role="menu">
                    <a href="<?php echo esc_url($site_url . 'astro-chart/?view=profile'); ?>" class="ast-dropdown-item" role="menuitem">
                        <span class="ast-item-lead">
                            <span>◈</span> Личный Кабинет
                        </span>
                        <span class="ast-dropdown-tag">Zero Cloud</span>
                    </a>
                    
                    <a href="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : $site_url . 'cart/'); ?>" class="ast-dropdown-item" role="menuitem">
                        <span class="ast-item-lead">
                            <span>🛒</span> Корзина Заказов
                        </span>
                        <?php if ($cart_count > 0): ?>
                            <span class="ast-cart-badge"><?php echo esc_html($cart_count); ?></span>
                        <?php endif; ?>
                    </a>

                    <a href="<?php echo esc_url($site_url . 'pricing/'); ?>" class="ast-dropdown-item" role="menuitem">
                        <span class="ast-item-lead">
                            <span>★</span> Cosmic Pass PRO
                        </span>
                        <span class="ast-dropdown-tag">$7.99</span>
                    </a>

                    <div class="ast-dropdown-divider"></div>

                    <a href="<?php echo esc_url($site_url . 'vedunya-pro/'); ?>" class="ast-dropdown-item" role="menuitem">
                        <span class="ast-item-lead">
                            <span>🔮</span> Кабинет Мастера (B2B)
                        </span>
                        <span class="ast-dropdown-tag">Pro</span>
                    </a>

                    <div class="ast-dropdown-divider"></div>

                    <a href="<?php echo esc_url($site_url . 'privacy/'); ?>" class="ast-dropdown-item" role="menuitem">
                        <span class="ast-item-lead">
                            <span>🛡️</span> Правовой Кодекс
                        </span>
                    </a>

                    <a href="<?php echo esc_url($site_url . 'manifesto/'); ?>" class="ast-dropdown-item" role="menuitem">
                        <span class="ast-item-lead">
                            <span>📜</span> Манифест Суверенитета
                        </span>
                    </a>
                </div>
            </div>

            <!-- Mobile Hamburger Button -->
            <button type="button" class="ast-burger-btn" id="ast-burger-btn" aria-label="Открыть мобильное меню" aria-expanded="false">
                <div class="ast-burger-bars">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
    </div>
</header>

<!-- Observatory Map Mega-Curtain (Full Screen, 4 Columns, 26 Portals) -->
<div class="ast-megamenu-curtain" id="ast-megamenu-curtain" role="dialog" aria-modal="true" aria-label="Карта Обсерватории">
    <div class="ast-curtain-container">
        
        <div class="ast-curtain-header">
            <h2 class="ast-curtain-title">
                <span>✦</span> Карта Обсерватории ASTRAINA · 26 Порталов
            </h2>
            <button type="button" class="ast-curtain-close-btn" id="ast-curtain-close" aria-label="Закрыть карту">✕</button>
        </div>

        <div class="ast-curtain-grid">
            
            <!-- Колонка 1: Небосвод & Хронос -->
            <div class="ast-curtain-col">
                <h3 class="ast-curtain-col-heading">
                    <span>✧</span> I. Небосвод & Хронос
                </h3>
                <a href="<?php echo esc_url($site_url . 'astro-calendar/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">⏱</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Календарь Хронос</span>
                        <span class="ast-portal-desc">Космические ритмы и транзиты</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-lunar/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">☽</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Лунный Оракул & День</span>
                        <span class="ast-portal-desc">Фазы Луны и рекомендации суток</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-today/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">📜</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">365 Дней в Истории</span>
                        <span class="ast-portal-desc">Летопись астрономии и космонавтики</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-sky/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">🌌</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">3D Купол Небосвода</span>
                        <span class="ast-portal-desc">Интерактивный планетарий 100+ звезд</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-iss/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">🛰</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Орбитальный Трекер МКС</span>
                        <span class="ast-portal-desc">Телеметрия полета в реальном времени</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-weather/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">⚡</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Погода Космоса & Kp</span>
                        <span class="ast-portal-desc">Солнечный ветер и геомагнитный индекс</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-ephemeris/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">⚝</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Эфемериды JPL DE440</span>
                        <span class="ast-portal-desc">Таблицы точных координат 12 тел</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-dso/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">🔭</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Атлас Мессье (DSO)</span>
                        <span class="ast-portal-desc">110 галактик и туманностей глубокого космоса</span>
                    </div>
                </a>
            </div>

            <!-- Колонка 2: Персонология & Душа -->
            <div class="ast-curtain-col">
                <h3 class="ast-curtain-col-heading">
                    <span>✧</span> II. Персонология & Душа
                </h3>
                <a href="<?php echo esc_url($site_url . 'astro-chart/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">❂</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Натальный Атлас JPL</span>
                        <span class="ast-portal-desc">Космограмма, Плацидус и Радар 1–10</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-synastry/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">☯</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Совместимость Пар</span>
                        <span class="ast-portal-desc">4 сакральные шкалы резонанса союза</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-archetypes/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">🎭</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">16 Архетипов Юнга</span>
                        <span class="ast-portal-desc">Диагностика бессознательного и тени</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-human/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">📖</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Astro-to-Human Словарь</span>
                        <span class="ast-portal-desc">Перевод астротерминов на язык жизни</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-biorhythms/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">〰</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Биоритмический Резонанс</span>
                        <span class="ast-portal-desc">Физическая, эмоция и интеллект-волны</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-numerology/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">🔢</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Матрица Нумерологии</span>
                        <span class="ast-portal-desc">Число жизненного пути и судьбы</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-solar/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">☉</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Персональный Соляр</span>
                        <span class="ast-portal-desc">Точный астрономический солярный год</span>
                    </div>
                </a>
            </div>

            <!-- Колонка 3: Социальный Эфир -->
            <div class="ast-curtain-col">
                <h3 class="ast-curtain-col-heading">
                    <span>✧</span> III. Социальный Эфир
                </h3>
                <a href="<?php echo esc_url($site_url . 'astro-stories/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">📱</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Stories Карточки 9:16</span>
                        <span class="ast-portal-desc">Генератор вирусной эстетики для соцсетей</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-feed/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">📡</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Friends Transit Feed</span>
                        <span class="ast-portal-desc">Транзитная лента резонанса друзей</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'astro-shadow/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">🌑</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Теневые Профили (Shadow)</span>
                        <span class="ast-portal-desc">Лилит, Плутон и подавленный потенциал</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'celebrity-charts/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">👑</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Каталог Карт Гениев</span>
                        <span class="ast-portal-desc">Наталы Эйнштейна, Теслы, Да Винчи</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'time-capsule/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">⌛</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Капсула Времени</span>
                        <span class="ast-portal-desc">Запечатанное послание в будущее</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'cosmic-rooms/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">🪐</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Кластерные Круги</span>
                        <span class="ast-portal-desc">Групповой синастрический резонанс</span>
                    </div>
                </a>
            </div>

            <!-- Колонка 4: Мастерам & Экосистема -->
            <div class="ast-curtain-col">
                <h3 class="ast-curtain-col-heading">
                    <span>✧</span> IV. Мастерам & Экосистема
                </h3>
                <a href="<?php echo esc_url($site_url . 'vedunya-pro/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">🔮</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Ведунья Pro (B2B Кабинет)</span>
                        <span class="ast-portal-desc">Рабочее место астролога, экспорт в WhatsApp</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'pricing/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">★</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Тарифные Врата & Pass</span>
                        <span class="ast-portal-desc">Cosmic Pass PRO ($7.99) и B2B лицензия</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'download/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">📥</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Мобильный Портал</span>
                        <span class="ast-portal-desc">PWA & Telegram WebApp экосистема</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'privacy/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">🛡</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Кодекс Суверенитета Данных</span>
                        <span class="ast-portal-desc">Zero Cloud архитектура и правовой щит</span>
                    </div>
                </a>
                <a href="<?php echo esc_url($site_url . 'manifesto/'); ?>" class="ast-portal-link">
                    <span class="ast-portal-icon">📜</span>
                    <div class="ast-portal-meta">
                        <span class="ast-portal-name">Сакральный Манифест</span>
                        <span class="ast-portal-desc">Философия чистого астрономического знания</span>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

<!-- Mobile Touch-Slide Drawer -->
<div class="ast-drawer-backdrop" id="ast-drawer-backdrop"></div>
<aside class="ast-mobile-drawer" id="ast-mobile-drawer" role="navigation" aria-label="Мобильное меню">
    <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid rgba(245,158,11,0.15); padding-bottom:14px;">
        <span style="font-weight:800; font-size:14px; letter-spacing:0.12em; color:var(--ast-gold-light); text-transform:uppercase;">Навигация</span>
        <button type="button" id="ast-drawer-close" style="background:none; border:none; color:#FFFFFF; font-size:18px; cursor:pointer;">✕</button>
    </div>

    <!-- 4 Локомотива -->
    <div style="display:flex; flex-direction:column; gap:8px;">
        <a href="<?php echo esc_url($site_url . 'astro-lunar/'); ?>" class="ast-nav-pill active" style="padding:10px 14px;">
            <span class="ast-nav-pill-glyph">✧</span> Гороскоп Дня
        </a>
        <a href="<?php echo esc_url($site_url . 'astro-chart/'); ?>" class="ast-nav-pill active" style="padding:10px 14px;">
            <span class="ast-nav-pill-glyph">✧</span> Натальный Атлас
        </a>
        <a href="<?php echo esc_url($site_url . 'astro-synastry/'); ?>" class="ast-nav-pill active" style="padding:10px 14px;">
            <span class="ast-nav-pill-glyph">✧</span> Совместимость
        </a>
        <a href="<?php echo esc_url($site_url . 'astro-sky/'); ?>" class="ast-nav-pill active" style="padding:10px 14px;">
            <span class="ast-nav-pill-glyph">✧</span> 3D Купол Небосвода
        </a>
    </div>

    <div class="ast-dropdown-divider"></div>

    <!-- Мобильные сервисы -->
    <div style="display:flex; flex-direction:column; gap:10px;">
        <a href="<?php echo esc_url($site_url . 'pricing/'); ?>" class="ast-btn-capsule" style="justify-content:center;">
            <span class="ast-gold-spark">★</span> Cosmic Pass PRO ($7.99)
        </a>
        <a href="<?php echo esc_url($site_url . 'vedunya-pro/'); ?>" class="ast-btn-capsule" style="justify-content:center;">
            <span class="ast-gold-spark">🔮</span> Кабинет Мастера (B2B)
        </a>
    </div>
</aside>

<!-- Safe Inclusion: Dynamic Live Ticker Engine -->
<?php
$ticker_engine_path = locate_template('includes/ticker-engine.php');
if ($ticker_engine_path && file_exists($ticker_engine_path)) {
    include_once $ticker_engine_path;
}
?>

<!-- Content Wrapper: Stacking Context Isolation -->
<div class="ast-page-wrapper" id="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 80vh;">

<script id="ast-header-script">
(function() {
    'use strict';

    // 1. Hard Emergency Preloader Cutoff (400ms Guaranteed)
    var preloader = document.getElementById('ast-preloader');
    if (preloader) {
        var hidePreloader = function() {
            preloader.style.opacity = '0';
            preloader.style.pointerEvents = 'none';
            setTimeout(function() {
                if (preloader.parentNode) {
                    preloader.parentNode.removeChild(preloader);
                }
            }, 250);
        };
        setTimeout(hidePreloader, 400);
        window.addEventListener('load', hidePreloader);
    }

    // 2. Elements Selection
    var megaToggle = document.getElementById('ast-megamenu-toggle');
    var megaCurtain = document.getElementById('ast-megamenu-curtain');
    var megaClose = document.getElementById('ast-curtain-close');

    var sanctToggle = document.getElementById('ast-sanctuary-toggle');
    var sanctDropdown = document.getElementById('ast-sanctuary-dropdown');

    var burgerBtn = document.getElementById('ast-burger-btn');
    var mobileDrawer = document.getElementById('ast-mobile-drawer');
    var drawerBackdrop = document.getElementById('ast-drawer-backdrop');
    var drawerClose = document.getElementById('ast-drawer-close');

    // 3. Mega-Curtain Handlers
    if (megaToggle && megaCurtain) {
        megaToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            var isOpen = megaCurtain.classList.toggle('open');
            megaToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            if (sanctDropdown) sanctDropdown.classList.remove('open');
        });

        if (megaClose) {
            megaClose.addEventListener('click', function() {
                megaCurtain.classList.remove('open');
                megaToggle.setAttribute('aria-expanded', 'false');
            });
        }
    }

    // 4. Sanctuary Dropdown Handlers
    if (sanctToggle && sanctDropdown) {
        sanctToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            var isOpen = sanctDropdown.classList.toggle('open');
            sanctToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            if (megaCurtain) megaCurtain.classList.remove('open');
        });
    }

    // 5. Mobile Drawer Handlers
    var closeDrawer = function() {
        if (mobileDrawer) mobileDrawer.classList.remove('open');
        if (drawerBackdrop) drawerBackdrop.classList.remove('open');
        if (burgerBtn) burgerBtn.setAttribute('aria-expanded', 'false');
    };

    if (burgerBtn && mobileDrawer) {
        burgerBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            mobileDrawer.classList.add('open');
            if (drawerBackdrop) drawerBackdrop.classList.add('open');
            burgerBtn.setAttribute('aria-expanded', 'true');
        });

        if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
        if (drawerBackdrop) drawerBackdrop.addEventListener('click', closeDrawer);
    }

    // 6. Global Click Outside & Escape Key Listeners
    document.addEventListener('click', function(e) {
        if (megaCurtain && !megaCurtain.contains(e.target) && e.target !== megaToggle) {
            megaCurtain.classList.remove('open');
            if (megaToggle) megaToggle.setAttribute('aria-expanded', 'false');
        }
        if (sanctDropdown && !sanctDropdown.contains(e.target) && e.target !== sanctToggle) {
            sanctDropdown.classList.remove('open');
            if (sanctToggle) sanctToggle.setAttribute('aria-expanded', 'false');
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (megaCurtain) megaCurtain.classList.remove('open');
            if (sanctDropdown) sanctDropdown.classList.remove('open');
            closeDrawer();
        }
    });

})();
</script>