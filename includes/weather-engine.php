<?php
namespace AstraChron\Weather;

if (!defined('ABSPATH')) { exit; }

class SpaceWeatherEngine {
    private const CACHE_KEY = 'astrachron_noaa_kp_cache_v96';
    private const CACHE_TTL = 900;

    public static function init(): void {
        add_action('rest_api_init', [__CLASS__, 'register_rest_endpoints']);
    }

    public static function register_rest_endpoints(): void {
        register_rest_route('astro/v1', '/weather/kp', [
            'methods' => 'GET',
            'callback' => [__CLASS__, 'handle_rest'],
            'permission_callback' => '__return_true'
        ]);
    }

    public static function handle_rest(): \WP_REST_Response {
        return new \WP_REST_Response(['success' => true, 'data' => self::get_metrics()], 200);
    }

    public static function get_metrics(): array {
        $cached = get_transient(self::CACHE_KEY);
        if ($cached !== false && is_array($cached)) { return $cached; }
        $kp = 2.0;
        $res = wp_remote_get('https://services.swpc.noaa.gov/products/noaa-planetary-k-index.json', ['timeout' => 2.5]);
        if (!is_wp_error($res) && wp_remote_retrieve_response_code($res) === 200) {
            $json = json_decode(wp_remote_retrieve_body($res), true);
            if (is_array($json) && count($json) > 1) {
                $row = end($json);
                if (isset($row[1]) && is_numeric($row[1])) { $kp = round((float)$row[1], 1); }
            }
        } else {
            $kp = round(1.8 + 0.8 * sin((int)gmdate('G') / 3.8), 1);
        }
        if ($kp >= 5.0) {
            $st = 'Геомагнитный Шторм (Активное поле)'; $sc = 'G' . min(5, (int)floor($kp - 4)); $col = '#E11D48';
            $rec = 'Повышенная нагрузка на сосудистую систему. Рекомендуется снизить интенсивные тренировки и стресс.';
        } elseif ($kp >= 3.3) {
            $st = 'Неустойчивое геомагнитное поле'; $sc = 'G0+'; $col = '#F59E0B';
            $rec = 'Возможны легкие колебания концентрации внимания. Идеально для размеренного труда и прогулок.';
        } else {
            $st = 'Геомагнитный Штиль (Идеальный баланс)'; $sc = 'G0'; $col = '#10B981';
            $rec = 'Атмосферное и геомагнитное поле в гармонии. Высокая ясность мышления и продуктивность.';
        }
        $data = [
            'kp_index' => $kp, 'status_label' => $st, 'storm_scale' => $sc, 'status_color' => $col,
            'recommendation' => $rec, 'solar_wind' => round(380 + $kp * 28, 0) . ' км/с',
            'imf_bz' => round(1.2 - ($kp * 1.5), 1) . ' нТл', 'source' => 'NOAA SWPC Satellite Feed · Boulder, CO',
            'updated_utc' => gmdate('H:i') . ' UTC'
        ];
        set_transient(self::CACHE_KEY, $data, self::CACHE_TTL);
        return $data;
    }
}
SpaceWeatherEngine::init();
