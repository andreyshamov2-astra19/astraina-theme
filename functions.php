<?php
/**
 * ASTRAINA MASTER THEME — FUNCTIONS & SCRIPTS ENGINE v9.2
 * Luxury Grade $500,000 Architecture: Samhain Obsidian & Cosmic Gold
 *
 * @package AstrainaTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_obj = wp_get_theme();
define('ASTRAINA_VERSION', $theme_obj->get('Version') ?: '9.4.2');

/**
 * 1. БЕЗОПАСНАЯ АВТОЗАГРУЗКА ВСЕХ КЛАССОВ И МОДУЛЕЙ ИЗ INCLUDES/
 */
$includes_dir = get_template_directory() . '/includes/';
if (is_dir($includes_dir)) {
    foreach (glob($includes_dir . '*.php') as $inc_file) {
        require_once $inc_file;
    }
}

/**
 * 2. БАЗОВАЯ НАСТРОЙКА ТЕМЫ
 */
function astraina_setup_theme() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
}
add_action('after_setup_theme', 'astraina_setup_theme');

/**
 * 3. ГЛОБАЛЬНЫЙ ФИЛЬТР: ЗВЕЗДНЫЙ 3D-КУПОЛ ВКЛЮЧЕН НА ВСЕХ СТРАНИЦАХ
 */
add_filter('astraina_enable_3d', '__return_true');

/**
 * 4. ПОДКЛЮЧЕНИЕ СКРИПТОВ И СТИЛЕЙ
 */
function astraina_enqueue_scripts() {
    $uri = get_template_directory_uri();
    $ver = ASTRAINA_VERSION;

    // Стили темы
    wp_enqueue_style('astraina-core', get_stylesheet_uri(), [], $ver);

    if (file_exists(get_template_directory() . '/assets/css/modules.css')) {
        wp_enqueue_style('astraina-modules', $uri . '/assets/css/modules.css', ['astraina-core'], $ver);
    }

    // Three.js (основа для купола, кристаллов и Млечного Пути)
    if (file_exists(get_template_directory() . '/assets/js/vendor/three.min.js')) {
        wp_enqueue_script('three-core', $uri . '/assets/js/vendor/three.min.js', [], 'r128', false);
    }

    // GSAP
    if (file_exists(get_template_directory() . '/assets/js/vendor/gsap.min.js')) {
        wp_enqueue_script('gsap-core', $uri . '/assets/js/vendor/gsap.min.js', [], '3.12.2', true);
    }

    // Howler.js для безупречного аудио
    if (file_exists(get_template_directory() . '/assets/js/vendor/howler.min.js')) {
        wp_enqueue_script('howler-core', $uri . '/assets/js/vendor/howler.min.js', [], '2.2.3', true);
    }

    // Люксовый аудио-движок Astraina (Web Audio API 432 Hz + Howler)
    $audio_script_path = get_template_directory() . '/assets/js/audio/astraina-audio.js';
    if (file_exists($audio_script_path)) {
        wp_enqueue_script('astraina-audio', $uri . '/assets/js/audio/astraina-audio.js', ['howler-core'], $ver, true);
    }

    // Скрипт натальной карты (natal-wheel)
    $wheel_script = file_exists(get_template_directory() . '/assets/js/ui/natal-wheel.js') 
        ? $uri . '/assets/js/ui/natal-wheel.js' 
        : (file_exists(get_template_directory() . '/assets/js/ui/WheelRenderer.js') ? $uri . '/assets/js/ui/WheelRenderer.js' : '');

    if ($wheel_script) {
        wp_enqueue_script('natal-wheel', $wheel_script, [], $ver, true);
    }

    // Stories Generator и Direct Checkout
    if (file_exists(get_template_directory() . '/assets/js/ui/stories-generator.js')) {
        wp_enqueue_script('stories-generator', $uri . '/assets/js/ui/stories-generator.js', [], $ver, true);
    }
    if (file_exists(get_template_directory() . '/assets/js/ui/direct-checkout.js')) {
        wp_enqueue_script('direct-checkout', $uri . '/assets/js/ui/direct-checkout.js', [], $ver, true);
    }

    // Глобальная конфигурация для фронтенда
    $localize_handle = wp_script_is('three-core', 'registered') ? 'three-core' : 'astraina-core';
    wp_localize_script($localize_handle, 'ASTRAINA_CONFIG', [
        'rest_url'      => esc_url_raw(rest_url('astro/v1/')),
        'nonce'         => wp_create_nonce('wp_rest'),
        'theme_url'     => $uri,
        'ambient_url'   => content_url('/uploads/astro-ambient/'),
        'current_lang'  => isset($_GET['lang']) && $_GET['lang'] === 'en' ? 'en' : 'ru',
        'is_front'      => is_front_page(),
        'wc_checkout'   => function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/')
    ]);
}
add_action('wp_enqueue_scripts', 'astraina_enqueue_scripts');

/**
 * 5. РАЗДАЧА SERVICE WORKER ЧЕРЕЗ КОРНЕВОЙ ЭНДПОИНТ
 */
function astraina_service_worker_rewrite() {
    add_rewrite_rule('^service-worker\.js$', 'index.php?ast_sw=1', 'top');
}
add_action('init', 'astraina_service_worker_rewrite');

function astraina_query_vars($vars) {
    $vars[] = 'ast_sw';
    return $vars;
}
add_filter('query_vars', 'astraina_query_vars');

function astraina_serve_service_worker() {
    if (get_query_var('ast_sw')) {
        $sw_file = get_template_directory() . '/assets/js/service-worker.js';
        if (file_exists($sw_file)) {
            header('Content-Type: application/javascript; charset=utf-8');
            header('Service-Worker-Allowed: /');
            header('Cache-Control: no-cache, no-store, must-revalidate');
            readfile($sw_file);
            exit;
        }
    }
}
add_action('template_redirect', 'astraina_serve_service_worker');

/**
 * 6. ОТКЛЮЧЕНИЕ СТАНДАРТНОГО БЛОАТА И ЭМОДЗИ
 */
function astraina_clean_head() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'astraina_clean_head');

/**
 * ASTRAINA Direct Favicon Injector
 */
add_action('wp_head', 'astraina_inject_brand_favicons', 1);
function astraina_inject_brand_favicons(): void {
    echo '<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=' . filemtime(ABSPATH . 'favicon-32x32.png') . '">' . "\n";
    echo '<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=' . filemtime(ABSPATH . 'favicon-16x16.png') . '">' . "\n";
    echo '<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=' . filemtime(ABSPATH . 'apple-touch-icon.png') . '">' . "\n";
}
