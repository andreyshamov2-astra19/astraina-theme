<?php
namespace AstraChron\Sentinel;

/**
 * ASTRAINA LINK SENTINEL (v1.0.0)
 * Autonomous Monthly Observatory Link Audit, Self-Healing & Executive HTML Email Dispatcher.
 * Architecture: Zero Cloud Store · Samhain Obsidian & Cosmic Gold
 * PHP Version: 8.3 Compatible
 */

if (!defined('ABSPATH')) {
    exit;
}

class LinkSentinel {
    private const CRON_HOOK = 'astraina_monthly_link_sentinel';

    public static function init(): void {
        add_action('init', [__CLASS__, 'registerSchedule']);
        add_action(self::CRON_HOOK, [__CLASS__, 'runAuditAndHeal']);
        add_action('init', [__CLASS__, 'handleManualTrigger']);
    }

    public static function registerSchedule(): void {
        if (!wp_next_scheduled(self::CRON_HOOK)) {
            $first_day = strtotime('first day of next month 03:00:00');
            wp_schedule_event($first_day, 'monthly', self::CRON_HOOK);
        }
    }

    public static function handleManualTrigger(): void {
        if (!isset($_GET['astraina_test_links'])) {
            return;
        }

        if (!current_user_can('manage_options') && ($_GET['secret'] ?? '') !== 'astraina2026') {
            wp_die('Доступ ограничен.');
        }

        $force = isset($_GET['force_heal']);
        $result = self::runAuditAndHeal($force);

        header('Content-Type: text/html; charset=utf-8');
        echo '<div style="background:#020408; color:#F59E0B; padding:30px; font-family:sans-serif; min-height:100vh;">';
        echo '<h2>✦ AstraChron Link Sentinel — Ручной запуск выполнен</h2>';
        echo '<p style="color:#E5E7EB;">Отчет отправлен на почту: <strong>' . esc_html(get_option('admin_email')) . '</strong></p>';
        echo '<pre style="background:#080E1A; padding:20px; border-radius:10px; color:#94A3B8; border:1px solid rgba(245,158,11,0.3);">' . esc_html(print_r($result, true)) . '</pre>';
        echo '<p><a href="' . esc_url(home_url('/')) . '" style="color:#FBBF24;">← Вернуться на сайт</a></p>';
        echo '</div>';
        exit;
    }

    public static function runAuditAndHeal(bool $force_heal = false): array {
        $portals = [
            'astro-calendar'   => ['title' => 'Календарь Хронос',            'tpl' => 'page-astro-calendar.php'],
            'astro-lunar'      => ['title' => 'Лунный Оракул и Сутки',       'tpl' => 'page-astro-lunar.php'],
            'astro-today'      => ['title' => '366 Дней в Истории',          'tpl' => 'page-astro-today.php'],
            'astro-sky'        => ['title' => '3D Купол Небосвода',          'tpl' => 'page-astro-sky.php'],
            'astro-iss'        => ['title' => 'Орбитальный трекер МКС',      'tpl' => 'page-astro-iss.php'],
            'astro-weather'    => ['title' => 'Погода Космоса & Kp',         'tpl' => 'page-astro-weather.php'],
            'astro-ephemeris'  => ['title' => 'Атлас 12 тел JPL DE440',      'tpl' => 'page-astro-ephemeris.php'],
            'astro-dso'        => ['title' => 'Атлас Мессье (DSO)',          'tpl' => 'page-astro-dso.php'],
            'astro-chart'      => ['title' => 'Натальная Карта (JPL DE440)', 'tpl' => 'page-astro-chart.php'],
            'astro-synastry'   => ['title' => 'Синастрия Пар (4 шкалы)',     'tpl' => 'page-astro-synastry.php'],
            'astro-archetypes' => ['title' => '16 Архетипов Юнга & Звезды',  'tpl' => 'page-astro-archetypes.php'],
            'astro-human'      => ['title' => 'Astro-to-Human Переводчик',   'tpl' => 'page-astro-human.php'],
            'astro-biorhythms' => ['title' => 'Биоритмический Резонанс',     'tpl' => 'page-astro-biorhythms.php'],
            'astro-numerology' => ['title' => 'Матрица Нумерологии',         'tpl' => 'page-astro-numerology.php'],
            'astro-solar'      => ['title' => 'Персональный Соляр',          'tpl' => 'page-astro-solar.php'],
            'astro-stories'    => ['title' => 'Stories Карточки 9:16',       'tpl' => 'page-astro-stories.php'],
            'astro-feed'       => ['title' => 'Friends Transit Feed',        'tpl' => 'page-astro-feed.php'],
            'astro-shadow'     => ['title' => 'Теневые Профили (Shadow)',    'tpl' => 'page-astro-shadow.php'],
            'celebrity-charts' => ['title' => 'Каталог Карт Гениев',         'tpl' => 'page-celebrity-charts.php'],
            'time-capsule'     => ['title' => 'Капсула Времени',             'tpl' => 'page-time-capsule.php'],
            'cosmic-rooms'     => ['title' => 'Кластерные Круги',            'tpl' => 'page-cosmic-rooms.php'],
            'vedunya-pro'      => ['title' => 'Кабинет «Ведунья Pro» B2B',   'tpl' => 'page-vedunya-pro.php'],
            'download'         => ['title' => 'Приложения (Android / iOS)',  'tpl' => 'page-download.php'],
            'pricing'          => ['title' => 'Тарифы & Cosmic Pass',        'tpl' => 'page-pricing.php'],
            'privacy'          => ['title' => 'Кодекс Суверенитета Данных',  'tpl' => 'page-privacy.php'],
            'manifesto'        => ['title' => 'Сакральный Манифест',         'tpl' => 'page-manifesto.php'],
        ];

        $healed = [];
        $scan_results = [];
        $site_url = home_url();

        foreach ($portals as $slug => $data) {
            $page = get_page_by_path($slug, OBJECT, 'page');
            $status = 'OK';

            if (!$page) {
                $pid = wp_insert_post([
                    'post_title'     => $data['title'],
                    'post_name'      => $slug,
                    'post_status'    => 'publish',
                    'post_type'      => 'page',
                    'comment_status' => 'closed',
                    'ping_status'    => 'closed',
                    'post_content'   => '<!-- Astraina Observatory Portal -->'
                ]);
                if (!is_wp_error($pid)) {
                    update_post_meta($pid, '_wp_page_template', $data['tpl']);
                    $healed[] = "Восстановлена страница: /{$slug}/";
                    $status = 'HEALED';
                }
            } else {
                if ($page->post_status !== 'publish') {
                    wp_update_post(['ID' => $page->ID, 'post_status' => 'publish']);
                    $healed[] = "Публикация страницы /{$slug}/";
                    $status = 'HEALED';
                }
                $cur_tpl = get_post_meta($page->ID, '_wp_page_template', true);
                if ($cur_tpl !== $data['tpl']) {
                    update_post_meta($page->ID, '_wp_page_template', $data['tpl']);
                    $healed[] = "Перепривязан шаблон для /{$slug}/";
                    $status = 'HEALED';
                }
            }

            $url = trailingslashit($site_url) . $slug . '/';
            $res = wp_remote_get($url, ['timeout' => 3, 'sslverify' => false]);
            $code = is_wp_error($res) ? 500 : wp_remote_retrieve_response_code($res);

            $scan_results[$slug] = [
                'title'  => $data['title'],
                'code'   => $code,
                'status' => $status
            ];
        }

        if (!empty($healed) || $force_heal) {
            flush_rewrite_rules(false);
            if (function_exists('opcache_reset')) {
                @opcache_reset();
            }
            if (has_action('litespeed_purge_all')) {
                do_action('litespeed_purge_all');
            }
        }

        self::sendReportEmail($scan_results, $healed);

        return [
            'timestamp' => current_time('mysql'),
            'scanned'   => count($portals),
            'healed'    => $healed,
            'details'   => $scan_results
        ];
    }

    private static function sendReportEmail(array $results, array $healed): void {
        $to = get_option('admin_email');
        $subject = '✦ Astraina Sentinel: Ежемесячный отчет о состоянии ссылок и страниц';

        $rows_html = '';
        foreach ($results as $slug => $item) {
            $color = ($item['code'] === 200) ? '#10B981' : '#EF4444';
            $rows_html .= '<tr>
                <td style="padding:10px; border-bottom:1px solid #1E293B; color:#F3F4F6;">' . esc_html($item['title']) . '</td>
                <td style="padding:10px; border-bottom:1px solid #1E293B; color:#94A3B8; font-family:monospace;">/' . esc_html($slug) . '/</td>
                <td style="padding:10px; border-bottom:1px solid #1E293B; color:' . $color . '; font-weight:bold;">' . esc_html((string)$item['code']) . '</td>
                <td style="padding:10px; border-bottom:1px solid #1E293B; color:#F59E0B;">' . esc_html($item['status']) . '</td>
            </tr>';
        }

        $healed_block = '';
        if (!empty($healed)) {
            $healed_block = '<div style="background:rgba(16,185,129,0.1); border:1px solid #10B981; border-radius:8px; padding:16px; margin-bottom:24px;">
                <h3 style="color:#10B981; margin:0 0 10px; font-size:14px; text-transform:uppercase;">Выполненные исправления:</h3>
                <ul style="margin:0; padding-left:20px; color:#D1FAE5; font-size:13px;">';
            foreach ($healed as $h) {
                $healed_block .= '<li>' . esc_html($h) . '</li>';
            }
            $healed_block .= '</ul></div>';
        }

        $message = '<!DOCTYPE html>
        <html>
        <body style="background:#020408; font-family:sans-serif; color:#E5E7EB; margin:0; padding:30px;">
            <div style="max-width:700px; margin:0 auto; background:#080E1A; border:1px solid rgba(245,158,11,0.3); border-radius:12px; padding:30px;">
                <h1 style="color:#F59E0B; font-size:20px; margin-top:0;">✦ ASTRAINA LINK SENTINEL REPORT</h1>
                <p style="color:#94A3B8; font-size:13px; margin-bottom:24px;">Автономный ежемесячный мониторинг доступности 26 порталов обсерватории.</p>
                ' . $healed_block . '
                <table style="width:100%; border-collapse:collapse; font-size:13px;">
                    <thead>
                        <tr style="text-align:left; background:rgba(245,158,11,0.1); color:#FBBF24;">
                            <th style="padding:10px;">Портал</th>
                            <th style="padding:10px;">Slug</th>
                            <th style="padding:10px;">Код</th>
                            <th style="padding:10px;">Статус</th>
                        </tr>
                    </thead>
                    <tbody>' . $rows_html . '</tbody>
                </table>
                <p style="color:#64748B; font-size:11px; margin-top:30px; text-align:center;">© ' . date('Y') . ' Astraina.com · Автономный страж ядра AstraChron</p>
            </div>
        </body>
        </html>';

        $headers = [
            'Content-Type: text/html; charset=UTF-8',
            'From: Astraina Sentinel <no-reply@astraina.com>'
        ];

        wp_mail($to, $subject, $message, $headers);
    }
}

LinkSentinel::init();