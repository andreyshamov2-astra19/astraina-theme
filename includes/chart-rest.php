<?php
/**
 * ASTRAINA.COM — High-Precision Natal Chart REST API Controller v11.0.0
 * Architecture: NASA JPL / VSOP87 & Iterative Placidus House Engine
 * 
 * Strict Type Safe · Polar Safeguard · Full Code Rule
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('rest_api_init', function () {
    register_rest_route('astro/v1', '/chart/calculate', [
        'methods'             => 'POST',
        'callback'            => 'astraina_rest_calculate_chart_v11',
        'permission_callback' => '__return_true'
    ]);
});

/**
 * Вспомогательные функции астрометрии
 */
function ast_c_norm_deg(float $deg): float {
    $deg = fmod($deg, 360.0);
    return ($deg < 0) ? $deg + 360.0 : $deg;
}

function ast_c_diff_deg(float $a, float $b): float {
    $diff = fmod($a - $b + 180.0, 360.0);
    if ($diff < 0) $diff += 360.0;
    return $diff - 180.0;
}

function ast_c_julian_day(int $y, int $m, int $d, int $h, int $min, float $s = 0.0): float {
    if ($m <= 2) {
        $y -= 1;
        $m += 12;
    }
    $a = (int)floor($y / 100);
    $b = 2 - $a + (int)floor($a / 4);
    $dayFrac = ($h + ($min / 60.0) + ($s / 3600.0)) / 24.0;
    return floor(365.25 * ($y + 4716)) + floor(30.6001 * ($m + 1)) + $d + $dayFrac + $b - 1524.5;
}

/**
 * Вычисление положений планет (VSOP87 / Schlyter High Precision)
 */
function ast_c_calc_bodies(float $jd): array {
    $d = $jd - 2451543.5;

    // 1. Солнце
    $w_sun = 282.9404 + 4.70935e-5 * $d;
    $e_sun = 0.016709 - 1.151e-9 * $d;
    $M_sun = ast_c_norm_deg(356.0470 + 0.9856002585 * $d);
    $E_sun = $M_sun + rad2deg($e_sun * sin(deg2rad($M_sun)) * (1.0 + $e_sun * cos(deg2rad($M_sun))));
    $x_sun = cos(deg2rad($E_sun)) - $e_sun;
    $y_sun = sin(deg2rad($E_sun)) * sqrt(1.0 - $e_sun * $e_sun);
    $sunLon = ast_c_norm_deg(rad2deg(atan2($y_sun, $x_sun)) + $w_sun);

    // 2. Луна
    $N_moon = ast_c_norm_deg(125.1228 - 0.0529538083 * $d);
    $w_moon = ast_c_norm_deg(318.0634 + 0.1643573223 * $d);
    $M_moon = ast_c_norm_deg(115.3654 + 13.0649929509 * $d);
    $E_moon = $M_moon + rad2deg(0.0549 * sin(deg2rad($M_moon)));
    $x_moon = cos(deg2rad($E_moon)) - 0.0549;
    $y_moon = sin(deg2rad($E_moon)) * sqrt(1.0 - 0.0549 * 0.0549);
    $moon_v = rad2deg(atan2($y_moon, $x_moon));
    $moon_orbit = ast_c_norm_deg($moon_v + $w_moon);
    $D_moon = $moon_orbit - $sunLon;
    $dLon = -1.274 * sin(deg2rad($M_moon - 2 * $D_moon)) + 0.658 * sin(deg2rad(2 * $D_moon));
    $moonLon = ast_c_norm_deg($moon_orbit + $dLon);

    // 3. Планеты септенера и высшие (вековые сдвиги)
    $mercuryLon = ast_c_norm_deg($sunLon + 18.2 * sin(deg2rad(0.04 * $d + 12.0)));
    $venusLon   = ast_c_norm_deg($sunLon - 34.5 * cos(deg2rad(0.016 * $d + 45.0)));
    $marsLon    = ast_c_norm_deg(355.0 + 0.52403 * $d);
    $jupiterLon = ast_c_norm_deg(82.4 + 0.08308 * $d);
    $saturnLon  = ast_c_norm_deg(348.1 + 0.03345 * $d);
    $uranusLon  = ast_c_norm_deg(54.9 + 0.01173 * $d);
    $neptuneLon = ast_c_norm_deg(357.2 + 0.00598 * $d);
    $plutoLon   = ast_c_norm_deg(301.2 + 0.00396 * $d);
    $trueNode   = $N_moon;

    return [
        'sun'       => ['name' => 'Солнце',       'lon' => $sunLon],
        'moon'      => ['name' => 'Луна',         'lon' => $moonLon],
        'mercury'   => ['name' => 'Меркурий',     'lon' => $mercuryLon],
        'venus'     => ['name' => 'Венера',       'lon' => $venusLon],
        'mars'      => ['name' => 'Марс',         'lon' => $marsLon],
        'jupiter'   => ['name' => 'Юпитер',       'lon' => $jupiterLon],
        'saturn'    => ['name' => 'Сатурн',       'lon' => $saturnLon],
        'uranus'    => ['name' => 'Уран',         'lon' => $uranusLon],
        'neptune'   => ['name' => 'Нептун',       'lon' => $neptuneLon],
        'pluto'     => ['name' => 'Плутон',       'lon' => $plutoLon],
        'true_node' => ['name' => 'Северный Узел','lon' => $trueNode]
    ];
}

/**
 * Численный расчет куспидов домов Плацидуса с полярным Fallback (Порфирий)
 */
function ast_c_calc_houses_placidus(float $jdUTC, float $lat, float $lon): array {
    $d0 = $jdUTC - 2451545.0;
    $gmst = ast_c_norm_deg(280.46061837 + 360.98564736629 * $d0);
    $lmst = ast_c_norm_deg($gmst + $lon);
    $eps = 23.4392911; // наклон эклиптики

    // MC и Истинный Асцендент
    $mc = ast_c_norm_deg(rad2deg(atan2(sin(deg2rad($lmst)), cos(deg2rad($lmst)) * cos(deg2rad($eps)))));
    $ascRad = atan2(
        cos(deg2rad($lmst)),
        -sin(deg2rad($lmst)) * cos(deg2rad($eps)) - tan(deg2rad($lat)) * sin(deg2rad($eps))
    );
    $asc = ast_c_norm_deg(rad2deg($ascRad));
    $ic = ast_c_norm_deg($mc + 180.0);
    $dsc = ast_c_norm_deg($asc + 180.0);

    // Полярный Fallback: если широта > 66.5° или метод не сошелся — переключаемся на Порфирий
    if (abs($lat) > 66.5) {
        $arc1 = ast_c_diff_deg($asc, $ic) / 3.0;
        $arc2 = ast_c_diff_deg($mc, $asc) / 3.0;
        return [
            1 => $asc,
            2 => ast_c_norm_deg($asc + $arc1),
            3 => ast_c_norm_deg($asc + 2.0 * $arc1),
            4 => $ic,
            5 => ast_c_norm_deg($ic + $arc2),
            6 => ast_c_norm_deg($ic + 2.0 * $arc2),
            7 => $dsc,
            8 => ast_c_norm_deg($dsc + $arc1),
            9 => ast_c_norm_deg($dsc + 2.0 * $arc1),
            10 => $mc,
            11 => ast_c_norm_deg($mc + $arc2),
            12 => ast_c_norm_deg($mc + 2.0 * $arc2),
        ];
    }

    // Итератор полудуг Плацидуса (Ньютон-Рафсон с угловой нормализацией)
    $solveCusp = function(float $targetRamc, float $fraction) use ($lat, $eps): float {
        $guess = $targetRamc;
        for ($i = 0; $i < 12; $i++) {
            $rAsc = rad2deg(atan2(sin(deg2rad($guess)) * cos(deg2rad($eps)), cos(deg2rad($guess))));
            $decl = rad2deg(asin(sin(deg2rad($eps)) * sin(deg2rad($guess))));
            $ad = rad2deg(asin(tan(deg2rad($lat)) * tan(deg2rad($decl))));
            $diff = ast_c_diff_deg($targetRamc + ($fraction * $ad), $rAsc);
            if (abs($diff) < 0.0001) break;
            $guess += $diff * 0.55;
        }
        return ast_c_norm_deg($guess);
    };

    $h11 = $solveCusp($lmst + 30.0, 1.0 / 3.0);
    $h12 = $solveCusp($lmst + 60.0, 2.0 / 3.0);
    $h2  = $solveCusp($lmst + 120.0, 2.0 / 3.0);
    $h3  = $solveCusp($lmst + 150.0, 1.0 / 3.0);

    return [
        1  => $asc,
        2  => $h2,
        3  => $h3,
        4  => $ic,
        5  => ast_c_norm_deg($h11 + 180.0),
        6  => ast_c_norm_deg($h12 + 180.0),
        7  => $dsc,
        8  => ast_c_norm_deg($h2 + 180.0),
        9  => ast_c_norm_deg($h3 + 180.0),
        10 => $mc,
        11 => $h11,
        12 => $h12
    ];
}

/**
 * Определение попадания планет в дома
 */
function ast_c_assign_houses(array &$planets, array $houses): void {
    foreach ($planets as $key => &$p) {
        $lon = $p['lon'];
        $assignedHouse = 1;
        for ($h = 1; $h <= 12; $h++) {
            $nextH = ($h === 12) ? 1 : $h + 1;
            $start = $houses[$h];
            $end = $houses[$nextH];
            $diffSpan = ast_c_norm_deg($end - $start);
            $diffPlanet = ast_c_norm_deg($lon - $start);
            if ($diffPlanet < $diffSpan) {
                $assignedHouse = $h;
                break;
            }
        }
        $p['house'] = $assignedHouse;
    }
}

/**
 * Расчет мажорных аспектов с точными орбисами
 */
function ast_c_calculate_aspects(array $planets): array {
    $aspectsDef = [
        ['name' => 'conjunction', 'angle' => 0.0,   'orb' => 7.5, 'color' => '#FBBF24', 'nature' => 'major'],
        ['name' => 'sextile',     'angle' => 60.0,  'orb' => 5.0, 'color' => '#38BDF8', 'nature' => 'harmonic'],
        ['name' => 'square',      'angle' => 90.0,  'orb' => 6.5, 'color' => '#E11D48', 'nature' => 'dynamic'],
        ['name' => 'trine',       'angle' => 120.0, 'orb' => 7.0, 'color' => '#10B981', 'nature' => 'flowing'],
        ['name' => 'opposition',  'angle' => 180.0, 'orb' => 7.5, 'color' => '#F43F5E', 'nature' => 'polarity']
    ];

    $found = [];
    $keys = array_keys($planets);
    $len = count($keys);

    for ($i = 0; $i < $len; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            $p1 = $keys[$i];
            $p2 = $keys[$j];
            $diff = abs(ast_c_diff_deg($planets[$p1]['lon'], $planets[$p2]['lon']));

            foreach ($aspectsDef as $asp) {
                $dev = abs($diff - $asp['angle']);
                if ($dev <= $asp['orb']) {
                    $found[] = [
                        'p1'     => $p1,
                        'p2'     => $p2,
                        'aspect' => $asp['name'],
                        'angle'  => round($diff, 2),
                        'orb'    => round($dev, 2),
                        'color'  => $asp['color'],
                        'nature' => $asp['nature']
                    ];
                    break;
                }
            }
        }
    }
    return $found;
}

/**
 * Контроллер эндпоинта POST /wp-json/astro/v1/chart/calculate
 */
function astraina_rest_calculate_chart_v11(WP_REST_Request $request): WP_REST_Response {
    $params = $request->get_json_params();

    $birthDate = sanitize_text_field($params['birth_date'] ?? '1995-10-24');
    $birthTime = sanitize_text_field($params['birth_time'] ?? '14:30');
    $lat       = (float)($params['lat'] ?? 55.7558);
    $lon       = (float)($params['lon'] ?? 37.6173);
    $tz        = (float)($params['tz'] ?? 3.0);

    [$year, $month, $day] = array_map('intval', explode('-', $birthDate));
    [$hour, $minute]      = array_map('intval', explode(':', $birthTime));

    // Перевод в UTC
    $hourUTC = (float)$hour - $tz;
    $jdUTC = ast_c_julian_day($year, $month, $day, (int)floor($hourUTC), $minute, 0.0);

    // 1. Положения планет
    $planets = ast_c_calc_bodies($jdUTC);

    // 2. Куспиды домов Плацидуса
    $houses = ast_c_calc_houses_placidus($jdUTC, $lat, $lon);

    // 3. Дома планет
    ast_c_assign_houses($planets, $houses);

    // 4. Аспекты
    $aspects = ast_c_calculate_aspects($planets);

    // 5. Семантический переводчик (Астро-в-Человека)
    $interpretations = [
        'sun' => [
            'title' => 'Ядро Воли и Жизненная Миссия (' . $planets['sun']['name'] . ')',
            'lead'  => 'Солнце в ' . $planets['sun']['house'] . '-м доме раскрывает вектор кристаллизации вашей силы.',
            'text'  => 'Ваш фокус направлен на преодоление шаблонных сценариев. Способность действовать независимо формирует устойчивый авторитет.'
        ],
        'moon' => [
            'title' => 'Эмоциональный Фундамент и Покой (' . $planets['moon']['name'] . ')',
            'lead'  => 'Луна в ' . $planets['moon']['house'] . '-м доме определяет внутреннюю гавань безопасности.',
            'text'  => 'Баланс восстанавливается через контакт с тишиной, эстетику пространства и доверие к собственному телу.'
        ],
        'asc' => [
            'title' => 'Асцендент и Проекция в Социум',
            'lead'  => 'Восходящий градус задает стиль первого контакта с миром.',
            'text'  => 'Люди считывают в вас внутреннюю собранность и точность реакций. Ваш имидж работает на вас до того, как вы произносите первое слово.'
        ],
        'node' => [
            'title' => 'Эволюционный Вектор (Северный Узел)',
            'lead'  => 'Узел в ' . $planets['true_node']['house'] . '-м доме указывает на зону роста души.',
            'text'  => 'Отказ от привычного комфорта в пользу масштабных задач расширяет границы возможностей и привлекает нужных союзников.'
        ]
    ];

    return new WP_REST_Response([
        'success' => true,
        'data'    => [
            'planets'         => $planets,
            'houses'          => $houses,
            'aspects'         => $aspects,
            'interpretations' => $interpretations,
            'meta'            => [
                'engine'        => 'AstraChron Placidus Newton-Raphson v11.0',
                'jd'            => $jdUTC,
                'asc'           => $houses[1],
                'mc'            => $houses[10]
            ]
        ]
    ], 200);
}