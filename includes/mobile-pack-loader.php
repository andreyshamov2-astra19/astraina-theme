<?php
/**
 * AstraChron Mobile & B2B Module Bridge: version check, [astro_download], [vedunya_pro].
 */
if (!defined('ABSPATH')) { exit; }

add_action('rest_api_init', function () {
    register_rest_route('astro/v1', '/app/version', [
        'methods'             => 'GET',
        'callback'            => 'astrachron_handle_app_version_check',
        'permission_callback' => '__return_true'
    ]);
});

function astrachron_handle_app_version_check(): \WP_REST_Response
{
    return new \WP_REST_Response([
        'latest_version' => '9.4.0',
        'build_number'   => 940,
        'release_date'   => '2026-11-01',
        'apk_url'        => home_url('/downloads/astraina-latest.apk'),
        'changelog'      => [
            'ru' => 'Интеграция 12 созвездий, прямой расчёт JPL DE440 и сакральный радар синастрии.',
            'en' => '12 Constellations integration, JPL DE440 direct calculation, and sacred synastry radar.'
        ],
        'sha256'         => 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855',
        'force_update'   => false
    ], 200);
}

// Shortcode [astro_download]
add_shortcode('astro_download', function () {
    ob_start();
    get_template_part('template-parts/download');
    return ob_get_clean();
});

// Shortcode [vedunya_pro]
add_shortcode('vedunya_pro', function () {
    ob_start();
    get_template_part('template-parts/vedunya-pro');
    return ob_get_clean();
});