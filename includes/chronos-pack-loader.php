<?php
/**
 * AstraChron Calendar & Matrix Module Bridge: [astro_calendar], [astro_matrix], REST + ICS.
 */
if (!defined('ABSPATH')) { exit; }

add_action('rest_api_init', function () {
    register_rest_route('astro/v1', '/calendar/events', [
        'methods'             => 'GET',
        'callback'            => 'astrachron_handle_calendar_events',
        'permission_callback' => '__return_true'
    ]);
    register_rest_route('astro/v1', '/calendar/ics-all', [
        'methods'             => 'GET',
        'callback'            => 'astrachron_handle_calendar_ics',
        'permission_callback' => '__return_true'
    ]);
});

function astrachron_handle_calendar_ics(\WP_REST_Request $request)
{
    $year = max(1900, min(2200, (int) ($request->get_param('year') ?: wp_date('Y'))));
    $ics  = \AstraChron\Calendar\ChronosEngine::buildIcs(\AstraChron\Calendar\ChronosEngine::getUpcomingEvents($year));
    add_filter('rest_pre_serve_request', function ($served) use ($ics) {
        header('Content-Type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename="astraina-wheel-of-year.ics"');
        echo $ics;
        return true;
    });
    return new \WP_REST_Response(null, 200);
}

function astrachron_handle_calendar_events(\WP_REST_Request $request): \WP_REST_Response
{
    $year = (int) ($request->get_param('year') ?: wp_date('Y'));
    $year = max(1900, min(2200, $year));
    $events = \AstraChron\Calendar\ChronosEngine::getUpcomingEvents($year);

    return new \WP_REST_Response([
        'success' => true,
        'year'    => $year,
        'events'  => $events
    ], 200);
}

// Shortcode [astro_calendar]
add_shortcode('astro_calendar', function () {
    ob_start();
    get_template_part('template-parts/calendar');
    return ob_get_clean();
});

// Shortcode [astro_matrix]
add_shortcode('astro_matrix', function () {
    ob_start();
    get_template_part('template-parts/calendar');
    return ob_get_clean();
});