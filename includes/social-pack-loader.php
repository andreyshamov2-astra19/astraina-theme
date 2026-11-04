<?php
/**
 * AstraChron Social & Viral Module Bridge: [astro_social], [astro_biorhythms], biorhythm REST.
 */
if (!defined('ABSPATH')) { exit; }

add_action('rest_api_init', function () {
    register_rest_route('astro/v1', '/social/biorhythms', [
        'methods'             => 'GET',
        'callback'            => 'astrachron_handle_biorhythm_calc',
        'permission_callback' => '__return_true'
    ]);
});

function astrachron_handle_biorhythm_calc(\WP_REST_Request $request): \WP_REST_Response
{
    $birthDate = sanitize_text_field((string) ($request->get_param('birth_date') ?: '1995-10-24'));
    $parsed    = \DateTimeImmutable::createFromFormat('!Y-m-d', $birthDate);
    if (!$parsed || $parsed->format('Y-m-d') !== $birthDate || $parsed > new \DateTimeImmutable('today')) {
        return new \WP_REST_Response(['success' => false, 'message' => 'Неверная дата рождения (Y-m-d).'], 400);
    }
    $res = \AstraChron\Social\BiorhythmCalculator::calculate($birthDate);

    return new \WP_REST_Response([
        'success' => true,
        'data'    => $res
    ], 200);
}

// Shortcode [astro_social]
add_shortcode('astro_social', function () {
    ob_start();
    get_template_part('template-parts/viral');
    return ob_get_clean();
});

// Shortcode [astro_biorhythms]
add_shortcode('astro_biorhythms', function () {
    return '<div class="ast-biorhythms-container" data-birth="1995-10-24"></div>';
});