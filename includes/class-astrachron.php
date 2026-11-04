<?php
/**
 * AstraChron core classes (calendar, psychomatrix, Astro-MBTI, biorhythms, low-precision ephemeris).
 *
 * @package AstrainaTheme
 */

namespace AstraChron\Calendar {

    if (!defined('ABSPATH')) { exit; }

    class ChronosEngine
    {
        /** Колесо Года: 8 праздников. Даты фиксированные (приближённые). */
        public static function getUpcomingEvents(int $year): array
        {
            $defs = [
                ['02-01', 'Имболк',      'Кельтская традиция',    'Пробуждение света и первых ростков: время намерений и очищения.'],
                ['03-20', 'Остара',      'Весеннее равноденствие', 'День равен ночи: баланс, обновление и посев замыслов.'],
                ['05-01', 'Белтейн',     'Кельтская традиция',    'Праздник огня и жизненной силы: расцвет, страсть, союзы.'],
                ['06-21', 'Лита',        'Летнее солнцестояние',  'Пик солнечной силы: самый длинный день года.'],
                ['08-01', 'Лугнасад',    'Кельтская традиция',    'Первый урожай: благодарность за плоды трудов.'],
                ['09-22', 'Мабон',       'Осеннее равноденствие', 'Второй урожай и равновесие: подведение итогов.'],
                ['11-01', 'Самайн',      'Кельтская традиция',    'Тонкая грань миров: память предков и завершение цикла.'],
                ['12-21', 'Юл',          'Зимнее солнцестояние',  'Самая долгая ночь и возвращение Солнца: рождение нового цикла.'],
            ];
            $events = [];
            foreach ($defs as $d) {
                $date = $year . '-' . $d[0];
                $events[] = [
                    'date'      => $date,
                    'timestamp' => (int) strtotime($date . ' 12:00:00 UTC'),
                    'name'      => $d[1],
                    'tradition' => $d[2],
                    'lead'      => $d[3],
                ];
            }
            return $events;
        }

        public static function buildIcs(array $events): string
        {
            $lines = ['BEGIN:VCALENDAR', 'VERSION:2.0', 'PRODID:-//ASTRAINA//Chronos Engine//RU', 'CALSCALE:GREGORIAN'];
            foreach ($events as $e) {
                $day = str_replace('-', '', $e['date']);
                $lines[] = 'BEGIN:VEVENT';
                $lines[] = 'UID:' . $day . '-' . md5($e['name']) . '@astraina.com';
                $lines[] = 'DTSTAMP:' . gmdate('Ymd\THis\Z');
                $lines[] = 'DTSTART;VALUE=DATE:' . $day;
                $lines[] = 'SUMMARY:' . self::esc($e['name']);
                $lines[] = 'DESCRIPTION:' . self::esc($e['lead']);
                $lines[] = 'END:VEVENT';
            }
            $lines[] = 'END:VCALENDAR';
            return implode("\r\n", $lines) . "\r\n";
        }

        private static function esc(string $s): string
        {
            return str_replace(["\\", ";", ",", "\n"], ["\\\\", "\;", "\\,", "\\n"], $s);
        }
    }
}

namespace AstraChron\Matrix {

    if (!defined('ABSPATH')) { exit; }

    class PythagorasMatrix
    {
        private const TITLES = [
            1 => 'Характер', 2 => 'Энергия', 3 => 'Познание',
            4 => 'Здоровье', 5 => 'Логика',  6 => 'Труд',
            7 => 'Удача',    8 => 'Долг',    9 => 'Память',
        ];

        private static function digitSum(int $n): int
        {
            return array_sum(array_map('intval', str_split((string) abs($n))));
        }

        /** @param string $birthDate Y-m-d */
        public static function calculate(string $birthDate): array
        {
            if (!preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $birthDate, $m)) {
                $m = [null, '1995', '10', '24'];
            }
            [$y, $mo, $d] = [$m[1], $m[2], $m[3]];
            $digits = str_split($d . $mo . $y);

            $first  = array_sum(array_map('intval', $digits));
            $second = self::digitSum($first);
            $third  = abs($first - 2 * (int) $d[0]);
            $fourth = self::digitSum($third);

            $all = array_merge($digits, str_split((string) $first), str_split((string) $second), str_split((string) $third), str_split((string) $fourth));
            $counts = array_fill(1, 9, 0);
            foreach ($all as $ch) {
                $n = (int) $ch;
                if ($n >= 1 && $n <= 9) { $counts[$n]++; }
            }

            $life = $first;
            while ($life > 9 && !in_array($life, [11, 22, 33], true)) {
                $life = self::digitSum($life);
            }

            $grid = [];
            foreach (self::TITLES as $k => $title) {
                $grid[$k] = ['title' => $title, 'count' => $counts[$k]];
            }

            return [
                'life_path_number' => $life,
                'working_numbers'  => [$first, $second, $third, $fourth],
                'matrix_counts'    => $counts,
                'grid_breakdown'   => $grid,
            ];
        }
    }

    class AstroMBTIBridge
    {
        private const TYPES = [
            'INTJ' => 'Стратег',          'INTP' => 'Исследователь',   'INFJ' => 'Хранитель Тайн',  'INFP' => 'Океанический Эмпат',
            'ENTJ' => 'Властелин Вершин', 'ENTP' => 'Провокатор Идей', 'ENFJ' => 'Наставник',       'ENFP' => 'Вдохновитель Душ',
            'ISTJ' => 'Хранитель Порядка', 'ISFJ' => 'Защитник',        'ESTJ' => 'Управитель',      'ESFJ' => 'Опора Общины',
            'ISTP' => 'Мастер Механизмов', 'ISFP' => 'Свободный Художник', 'ESTP' => 'Искатель Риска', 'ESFP' => 'Огонь Сцены',
        ];
        private const SIGNS = [
            'Овен' => ['Марс', 'Огонь'], 'Телец' => ['Венера', 'Земля'], 'Близнецы' => ['Меркурий', 'Воздух'],
            'Рак' => ['Луна', 'Вода'],   'Лев' => ['Солнце', 'Огонь'],   'Дева' => ['Меркурий', 'Земля'],
            'Весы' => ['Венера', 'Воздух'], 'Скорпион' => ['Плутон', 'Вода'], 'Стрелец' => ['Юпитер', 'Огонь'],
            'Козерог' => ['Сатурн', 'Земля'], 'Водолей' => ['Уран', 'Воздух'], 'Рыбы' => ['Нептун', 'Вода'],
        ];

        public static function synthesize(string $type, string $sign): array
        {
            $type  = strtoupper(preg_replace('/[^A-Za-z]/', '', $type));
            $title = self::TYPES[$type] ?? 'Неопределённый тип';
            [$ruler, $element] = self::SIGNS[$sign] ?? ['—', '—'];

            return [
                'type'            => $type,
                'archetype_title' => $type . ' — ' . $title,
                'ruler'           => $ruler,
                'element'         => $element,
                'synthesis_text'  => sprintf(
                    'Тип %s («%s») в знаке %s раскрывается через стихию «%s» под покровительством планеты %s: когнитивный стиль получает астрологический оттенок, который помогает точнее выбирать среду, ритм и способ действовать.',
                    $type, $title, $sign, mb_strtolower($element), $ruler
                ),
            ];
        }
    }
}

namespace AstraChron\Social {

    if (!defined('ABSPATH')) { exit; }

    class BiorhythmCalculator
    {
        /** @param string $birthDate Y-m-d */
        public static function calculate(string $birthDate, ?int $now = null): array
        {
            $birth = \DateTimeImmutable::createFromFormat('!Y-m-d', $birthDate, new \DateTimeZone('UTC'));
            $now   = $now ?? time();
            $today = (new \DateTimeImmutable('@' . $now))->setTimezone(new \DateTimeZone('UTC'))->setTime(0, 0);
            $days  = (int) $birth->diff($today)->format('%r%a');

            $cycle = static fn(int $period): float => round(sin(2 * M_PI * $days / $period) * 100, 1);

            return [
                'birth_date'   => $birth->format('Y-m-d'),
                'days_alive'   => $days,
                'physical'     => $cycle(23),
                'emotional'    => $cycle(28),
                'intellectual' => $cycle(33),
            ];
        }
    }
}

namespace AstraChron\Chart {

    if (!defined('ABSPATH')) { exit; }

    /**
     * Низкоточный расчёт (формулы П. Шлитера, ~1–2' для Солнца и планет, ~0.5° для Луны).
     * Это НЕ JPL DE440. Дома — равные от Асцендента.
     */
    class Ephemeris
    {
        public const SIGNS = ['Овен','Телец','Близнецы','Рак','Лев','Дева','Весы','Скорпион','Стрелец','Козерог','Водолей','Рыбы'];

        /** Небольшой справочник городов: [lat, lon, tz]. */
        public const CITIES = [
            'москва' => [55.7558, 37.6173, 3.0], 'санкт-петербург' => [59.9343, 30.3351, 3.0],
            'новосибирск' => [55.0084, 82.9357, 7.0], 'екатеринбург' => [56.8389, 60.6057, 5.0],
            'казань' => [55.7887, 49.1221, 3.0], 'нижний новгород' => [56.2965, 43.9361, 3.0],
            'самара' => [53.1959, 50.1002, 4.0], 'ростов-на-дону' => [47.2357, 39.7015, 3.0],
            'краснодар' => [45.0355, 38.9753, 3.0], 'владивосток' => [43.1155, 131.8855, 10.0],
            'минск' => [53.9045, 27.5615, 3.0], 'киев' => [50.4501, 30.5234, 2.0],
            'алматы' => [43.2389, 76.8897, 5.0], 'london' => [51.5074, -0.1278, 0.0],
            'new york' => [40.7128, -74.0060, -5.0],
        ];

        private static function norm(float $a): float { $a = fmod($a, 360.0); return $a < 0 ? $a + 360.0 : $a; }
        private static function rad(float $d): float { return deg2rad($d); }

        private static function kepler(float $M, float $e): float
        {
            $M = self::rad(self::norm($M));
            $E = $M + $e * sin($M) * (1 + $e * cos($M));
            for ($i = 0; $i < 12; $i++) {
                $dE = ($E - $e * sin($E) - $M) / (1 - $e * cos($E));
                $E -= $dE;
                if (abs($dE) < 1e-9) { break; }
            }
            return $E;
        }

        /** Орбитальные элементы: [N, i, w, a, e, M] на день $d (от 1999-12-31.0 UT). */
        private static function elements(string $body, float $d): array
        {
            switch ($body) {
                case 'sun':     return [0, 0, 282.9404 + 4.70935E-5 * $d, 1.0, 0.016709 - 1.151E-9 * $d, 356.0470 + 0.9856002585 * $d];
                case 'moon':    return [125.1228 - 0.0529538083 * $d, 5.1454, 318.0634 + 0.1643573223 * $d, 60.2666, 0.0549, 115.3654 + 13.0649929509 * $d];
                case 'mercury': return [48.3313 + 3.24587E-5 * $d, 7.0047 + 5.00E-8 * $d, 29.1241 + 1.01444E-5 * $d, 0.387098, 0.205635 + 5.59E-10 * $d, 168.6562 + 4.0923344368 * $d];
                case 'venus':   return [76.6799 + 2.46590E-5 * $d, 3.3946 + 2.75E-8 * $d, 54.8910 + 1.38374E-5 * $d, 0.723330, 0.006773 - 1.302E-9 * $d, 48.0052 + 1.6021302244 * $d];
                case 'mars':    return [49.5574 + 2.11081E-5 * $d, 1.8497 - 1.78E-8 * $d, 286.5016 + 2.92961E-5 * $d, 1.523688, 0.093405 + 2.516E-9 * $d, 18.6021 + 0.5240207766 * $d];
                case 'jupiter': return [100.4542 + 2.76854E-5 * $d, 1.3030 - 1.557E-7 * $d, 273.8777 + 1.64505E-5 * $d, 5.20256, 0.048498 + 4.469E-9 * $d, 19.8950 + 0.0830853001 * $d];
                case 'saturn':  return [113.6634 + 2.38980E-5 * $d, 2.4886 - 1.081E-7 * $d, 339.3939 + 2.97661E-5 * $d, 9.55475, 0.055546 - 9.499E-9 * $d, 316.9670 + 0.0334442282 * $d];
                case 'uranus':  return [74.0005 + 1.3978E-5 * $d, 0.7733 + 1.9E-8 * $d, 96.6612 + 3.0565E-5 * $d, 19.18171 - 1.55E-8 * $d, 0.047318 + 7.45E-9 * $d, 142.5905 + 0.011725806 * $d];
                case 'neptune': return [131.7806 + 3.0173E-5 * $d, 1.7700 - 2.55E-7 * $d, 272.8461 - 6.027E-6 * $d, 30.05826 + 3.313E-8 * $d, 0.008606 + 2.15E-9 * $d, 260.2471 + 0.005995147 * $d];
            }
            return [0, 0, 0, 1, 0, 0];
        }

        /** Возвращает [x, y, z, r, lon_helio_or_geo] в плоскости эклиптики для тела. */
        private static function position(string $body, float $d): array
        {
            [$N, $i, $w, $a, $e, $M] = self::elements($body, $d);
            $E  = self::kepler($M, $e);
            $xv = $a * (cos($E) - $e);
            $yv = $a * sqrt(1 - $e * $e) * sin($E);
            $v  = atan2($yv, $xv);
            $r  = sqrt($xv * $xv + $yv * $yv);
            $vw = $v + self::rad($w);
            $Nr = self::rad($N);
            $ir = self::rad($i);
            return [
                $r * (cos($Nr) * cos($vw) - sin($Nr) * sin($vw) * cos($ir)),
                $r * (sin($Nr) * cos($vw) + cos($Nr) * sin($vw) * cos($ir)),
                $r * sin($vw) * sin($ir),
                $r,
            ];
        }

        public static function longitudes(float $jd): array
        {
            $d  = $jd - 2451543.5;
            $T  = ($jd - 2451545.0) / 36525.0;
            $out = [];

            // Солнце (геоцентрическое)
            [$xs, $ys] = self::position('sun', $d);
            $out['sun'] = self::norm(rad2deg(atan2($ys, $xs)));

            // Луна с главными возмущениями
            [$xm, $ym] = self::position('moon', $d);
            $moon = rad2deg(atan2($ym, $xm));
            $Mm = self::norm(115.3654 + 13.0649929509 * $d);
            $Ms = self::norm(356.0470 + 0.9856002585 * $d);
            $Nm = 125.1228 - 0.0529538083 * $d;
            $Lm = $Mm + (318.0634 + 0.1643573223 * $d) + $Nm;
            $Ls = $Ms + (282.9404 + 4.70935E-5 * $d);
            $D  = $Lm - $Ls;
            $F  = $Lm - $Nm;
            $s  = static fn(float $x): float => sin(deg2rad($x));
            $moon += -1.274 * $s($Mm - 2 * $D) + 0.658 * $s(2 * $D) - 0.186 * $s($Ms) - 0.059 * $s(2 * $Mm - 2 * $D)
                   - 0.057 * $s($Mm - 2 * $D + $Ms) + 0.053 * $s($Mm + 2 * $D) + 0.046 * $s(2 * $D - $Ms)
                   + 0.041 * $s($Mm - $Ms) - 0.035 * $s($D) - 0.031 * $s($Mm + $Ms) - 0.015 * $s(2 * $F - 2 * $D)
                   + 0.011 * $s($Mm - 4 * $D);
            $out['moon'] = self::norm($moon);

            foreach (['mercury', 'venus', 'mars', 'jupiter', 'saturn', 'uranus', 'neptune'] as $p) {
                [$xh, $yh] = self::position($p, $d);
                $out[$p] = self::norm(rad2deg(atan2($yh + $ys, $xh + $xs)));
            }

            // Плутон: среднее движение (точность порядка градусов)
            $out['pluto'] = self::norm(251.45 + 0.00397 * ($jd - 2451545.0));

            // Северный (средний) узел
            $out['true_node'] = self::norm(125.04452 - 1934.136261 * $T);
            return $out;
        }

        public static function ascendantMc(float $jd, float $lat, float $lon): array
        {
            $T   = ($jd - 2451545.0) / 36525.0;
            $eps = self::rad(23.4392911 - 0.0130042 * $T);
            $th  = self::rad(self::norm(280.46061837 + 360.98564736629 * ($jd - 2451545.0) + $lon));
            $phi = self::rad($lat);
            $asc = rad2deg(atan2(cos($th), -(sin($th) * cos($eps) + tan($phi) * sin($eps))));
            $mc  = rad2deg(atan2(sin($th), cos($th) * cos($eps)));
            return [self::norm($asc), self::norm($mc)];
        }

        public static function signOf(float $lon): string { return self::SIGNS[(int) floor($lon / 30) % 12]; }

        public static function julianDay(int $unix): float { return $unix / 86400.0 + 2440587.5; }
    }
}
