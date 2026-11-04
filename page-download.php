<?php
/**
 * Template Name: Astraina Mobile Direct D2C Portal
 * Template Post Type: page
 * 
 * Visionary Mobile Distribution:
 * - Android: Exclusive Early Beta & Co-Creation Access (Full Core v9.0)
 * - Apple iOS: Official App Store Launch Waitlist & TestFlight Beta
 * - Dual Storage: Database persistence + Instant Admin Email Notification
 * 
 * Samhain Obsidian & Cosmic Gold. $50,000 Luxury Grade.
 */

get_header();

// Путь к установочному файлу Android APK на сервере
$apk_download_url = home_url('/wp-content/uploads/astraina-latest.apk');

// Email администратора сайта для мгновенных уведомлений
$admin_email = get_option('admin_email');

// Уведомления форм
$feedback_notice = '';
$feedback_status = '';
$ios_waitlist_notice = '';
$ios_waitlist_status = '';

// 1. Обработка формы отзыва от Android Бета-тестеров (Соавторов)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ast_beta_feedback_submit'])) {
    if (check_admin_referer('ast_feedback_action', 'ast_feedback_nonce')) {
        $fb_name    = sanitize_text_field($_POST['fb_name'] ?? '');
        $fb_contact = sanitize_text_field($_POST['fb_contact'] ?? '');
        $fb_message = sanitize_textarea_field($_POST['fb_message'] ?? '');

        if (!empty($fb_message)) {
            // Сохранение в базу данных
            $feedback_list = get_option('astraina_beta_feedback', []);
            if (!is_array($feedback_list)) {
                $feedback_list = [];
            }
            $user_ip = sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? '');
            $current_date = current_time('d.m.Y H:i');

            $feedback_list[] = [
                'name'    => $fb_name ?: 'Анонимный исследователь',
                'contact' => $fb_contact,
                'message' => $fb_message,
                'created' => $current_date,
                'ip'      => $user_ip
            ];
            update_option('astraina_beta_feedback', $feedback_list, false);

            // Мгновенное дублирование на Email администратора
            if (is_email($admin_email)) {
                $mail_subject = "✦ [ASTRAINA] Новый отклик от Соавтора Android Beta";
                $mail_body = "Вам поступил новый отзыв от участника раннего тестирования ASTRAINA Core:\n\n";
                $mail_body .= "Имя / Псевдоним: " . ($fb_name ?: 'Не указано') . "\n";
                $mail_body .= "Контакт для связи: " . ($fb_contact ?: 'Не указан') . "\n";
                $mail_body .= "Дата отправки: " . $current_date . "\n";
                $mail_body .= "IP-адрес: " . $user_ip . "\n\n";
                $mail_body .= "Сообщение:\n" . $fb_message . "\n\n";
                $mail_body .= "--------------------------------------------------\n";
                $mail_body .= "Сообщение сохранено в базе данных сайта astraina.com";

                $headers = ['Content-Type: text/plain; charset=UTF-8'];
                wp_mail($admin_email, $mail_subject, $mail_body, $headers);
            }

            $feedback_status = 'success';
            $feedback_notice = 'Благодарим за ваш вклад в создание ASTRAINA! Ваше послание передано инженерам проекта.';
        } else {
            $feedback_status = 'error';
            $feedback_notice = 'Пожалуйста, напишите ваши впечатления или найденные пожелания перед отправкой.';
        }
    }
}

// 2. Обработка подписки на уведомление о релизе в Apple App Store
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ast_ios_waitlist_submit'])) {
    if (check_admin_referer('ast_ios_waitlist_action', 'ast_ios_nonce')) {
        $email = sanitize_email($_POST['ast_ios_email'] ?? '');
        if (is_email($email)) {
            // Сохранение в базу данных
            $waitlist = get_option('astraina_ios_waitlist', []);
            if (!is_array($waitlist)) {
                $waitlist = [];
            }
            $exists = false;
            foreach ($waitlist as $entry) {
                if (($entry['email'] ?? '') === $email) {
                    $exists = true;
                    break;
                }
            }
            
            $user_ip = sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? '');
            $current_date = current_time('d.m.Y H:i');

            if (!$exists) {
                $waitlist[] = [
                    'email'   => $email,
                    'created' => $current_date,
                    'ip'      => $user_ip
                ];
                update_option('astraina_ios_waitlist', $waitlist, false);
            }

            // Мгновенное дублирование на Email администратора
            if (is_email($admin_email)) {
                $mail_subject = "✦ [ASTRAINA] Новая подписка на релиз в Apple App Store";
                $mail_body = "Новый пользователь подписался на лист ожидания премьеры ASTRAINA в App Store:\n\n";
                $mail_body .= "Email подписчика: " . $email . "\n";
                $mail_body .= "Дата добавления: " . $current_date . "\n";
                $mail_body .= "IP-адрес: " . $user_ip . "\n\n";
                $mail_body .= "--------------------------------------------------\n";
                $mail_body .= "Контакт внесен в реестр ожидания в базе данных astraina.com";

                $headers = ['Content-Type: text/plain; charset=UTF-8'];
                wp_mail($admin_email, $mail_subject, $mail_body, $headers);
            }

            $ios_waitlist_status = 'success';
            $ios_waitlist_notice = 'Вы успешно внесены в список ожидания. Мы пришлем приглашение сразу при выходе приложения в App Store.';
        } else {
            $ios_waitlist_status = 'error';
            $ios_waitlist_notice = 'Пожалуйста, введите корректный адрес электронной почты.';
        }
    }
}
?>

<div class="ast-download-viewport" style="background: #020408; min-height: 100vh; color: #FEF3C7; padding: 70px 20px 100px;">
    <div class="ast-container" style="max-width: 1240px; margin: 0 auto;">
        
        <!-- HEADER -->
        <header style="text-align: center; margin-bottom: 55px;">
            <div style="font-family: 'Space Mono', monospace; font-size: 11px; letter-spacing: 0.35em; color: #F59E0B; text-transform: uppercase; margin-bottom: 12px;">
                Direct Access · Astraina Core v9.0
            </div>
            <h1 style="font-family: 'Cinzel Decorative', serif; font-size: clamp(28px, 4vw, 48px); font-weight: 400; color: #FEF3C7; text-shadow: 0 0 40px rgba(245, 158, 11, 0.4); margin: 0 0 16px;">
                Обсерватория в Вашей Ладони
            </h1>
            <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 15px; color: rgba(254, 243, 199, 0.75); max-width: 720px; margin: 0 auto; line-height: 1.6;">
                Мы шлифуем каждую грань небесной механики NASA JPL и эстетики Атлантиды. Примите участие в рождении совершенного проводника по космосу и человеческим связям.
            </p>
        </header>

        <!-- ПЛАТФОРМЕННЫЙ ГРИД: ANDROID И IOS -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 32px; align-items: stretch; margin-bottom: 60px;">
            
            <!-- КАРТОЧКА 1: ANDROID EARLY BETA & СОАВТОРСТВО -->
            <div id="platform-card-android" class="ast-glass-card" style="background: rgba(8, 14, 26, 0.8); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 18px; padding: 36px 30px; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.3s; position: relative;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                        <span style="font-family: 'Space Mono', monospace; font-size: 11px; color: #38BDF8; letter-spacing: 0.2em;">ANDROID EDITION</span>
                        <span style="background: rgba(245, 158, 11, 0.15); border: 1px solid #F59E0B; padding: 3px 12px; border-radius: 20px; font-family: 'Space Mono', monospace; font-size: 10px; color: #FBBF24;">
                            РАННИЙ ДОСТУП · BETA
                        </span>
                    </div>

                    <h3 style="font-family: 'Cinzel', serif; font-size: 24px; color: #FEF3C7; margin: 0 0 12px;">
                        Станьте Соавтором Проекта
                    </h3>

                    <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; color: rgba(254, 243, 199, 0.8); line-height: 1.6; margin-bottom: 20px;">
                        Мы создаем бескомпромиссный продукт высочайшего уровня. До официальной мировой премьеры в Google Play мы открываем прямой доступ к полноценному ядру платформы для первых исследователей.
                    </p>

                    <div style="background: rgba(2, 4, 8, 0.6); border-left: 2px solid #F59E0B; padding: 14px; margin-bottom: 24px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; color: rgba(254, 243, 199, 0.9); line-height: 1.6;">
                        «Скачайте сборку раннего доступа, испытайте мощь живого 3D-небосвода и поделитесь своими ощущениями. Ваш отклик поможет нам отшлифовать финальные штрихи великого произведения».
                    </div>

                    <ul style="list-style: none; padding: 0; margin: 0 0 26px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; color: rgba(254, 243, 199, 0.85); line-height: 2;">
                        <li>✓ Полнофункциональный доступ к эфемеридам NASA JPL</li>
                        <li>✓ Интерактивная сцена 12 созвездий (60 FPS)</li>
                        <li>✓ Прямая сборка без посредников: ~18 МБ</li>
                    </ul>
                </div>

                <div>
                    <a href="<?php echo esc_url($apk_download_url); ?>" download style="display: block; text-align: center; background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: #020408; padding: 15px; border-radius: 8px; font-family: 'Cinzel', serif; font-size: 13px; font-weight: bold; letter-spacing: 0.1em; text-decoration: none; box-shadow: 0 0 25px rgba(245, 158, 11, 0.35); transition: all 0.3s; margin-bottom: 12px;">
                        СКАЧАТЬ СБОРКУ .APK (БЕТА)
                    </a>
                    
                    <button onclick="toggleFeedbackModal(true)" style="width: 100%; background: transparent; border: 1px solid rgba(245, 158, 11, 0.35); color: #FBBF24; padding: 12px; border-radius: 8px; font-family: 'Cinzel', serif; font-size: 11px; letter-spacing: 0.1em; cursor: pointer; transition: all 0.3s;">
                        ✦ ОСТАВИТЬ ОТЗЫВ / ПРЕДЛОЖЕНИЕ
                    </button>
                </div>
            </div>

            <!-- КАРТОЧКА 2: APPLE IOS WAITLIST -->
            <div id="platform-card-ios" class="ast-glass-card" style="background: rgba(8, 14, 26, 0.8); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 18px; padding: 36px 30px; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.3s;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                        <span style="font-family: 'Space Mono', monospace; font-size: 11px; color: #FDA4AF; letter-spacing: 0.2em;">APPLE IOS</span>
                        <span style="background: rgba(225, 29, 72, 0.15); border: 1px solid #E11D48; padding: 3px 12px; border-radius: 20px; font-family: 'Space Mono', monospace; font-size: 10px; color: #FDA4AF;">
                            APP STORE SOON
                        </span>
                    </div>

                    <h3 style="font-family: 'Cinzel', serif; font-size: 24px; color: #FEF3C7; margin: 0 0 12px;">
                        Apple App Store
                    </h3>
                    <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; color: rgba(254, 243, 199, 0.8); line-height: 1.6; margin-bottom: 24px;">
                        Версия для iPhone и iPad проходит финальную калибровку и готовится к размещению в App Store. Оставьте ваш Email — мы уведомим вас в момент запуска и откроем ранний вход в TestFlight.
                    </p>

                    <?php if (!empty($ios_waitlist_notice)): ?>
                        <div style="background: <?php echo $ios_waitlist_status === 'success' ? 'rgba(37, 211, 102, 0.15)' : 'rgba(225, 29, 72, 0.15)'; ?>; border: 1px solid <?php echo $ios_waitlist_status === 'success' ? '#25D366' : '#E11D48'; ?>; border-radius: 8px; padding: 12px 14px; margin-bottom: 20px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; color: #FEF3C7;">
                            ✦ <?php echo esc_html($ios_waitlist_notice); ?>
                        </div>
                    <?php endif; ?>

                    <div style="background: #020408; border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 12px; padding: 20px; margin-bottom: 24px;">
                        <div style="font-family: 'Space Mono', monospace; font-size: 10px; color: #F59E0B; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 10px;">
                            ЛИСТ ОЖИДАНИЯ ПРЕМЬЕРЫ
                        </div>

                        <form method="post" style="display: grid; gap: 10px;">
                            <?php wp_nonce_field('ast_ios_waitlist_action', 'ast_ios_nonce'); ?>
                            <input type="email" name="ast_ios_email" required placeholder="Введите ваш Email" style="width: 100%; box-sizing: border-box; background: #080E1A; border: 1px solid rgba(245, 158, 11, 0.3); color: #FEF3C7; padding: 12px 14px; border-radius: 6px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px;">
                            
                            <button type="submit" name="ast_ios_waitlist_submit" value="1" style="width: 100%; background: rgba(245, 158, 11, 0.15); border: 1px solid #F59E0B; color: #FBBF24; padding: 12px; border-radius: 6px; font-family: 'Cinzel', serif; font-size: 11px; letter-spacing: 0.1em; cursor: pointer; font-weight: bold; transition: all 0.3s;">
                                УВЕДОМИТЬ О ВЫХОДЕ В APP STORE
                            </button>
                        </form>
                    </div>
                </div>

                <div style="font-family: 'Space Mono', monospace; font-size: 10px; color: rgba(254, 243, 199, 0.5); text-align: center;">
                    Подписчики первыми получат персональный ключ к закрытой бета-программе TestFlight
                </div>
            </div>

        </div>

        <!-- МОСТ ДЛЯ ДЕСКТОПА: QR-КОД -->
        <section class="ast-glass-card" style="background: rgba(8, 14, 26, 0.65); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 18px; padding: 36px; text-align: center; max-width: 680px; margin: 0 auto;">
            <div style="font-family: 'Space Mono', monospace; font-size: 11px; color: #F59E0B; letter-spacing: 0.25em; text-transform: uppercase; margin-bottom: 10px;">
                ✦ МОБИЛЬНЫЙ QR-МОСТ ✦
            </div>
            <h3 style="font-family: 'Cinzel', serif; font-size: 20px; color: #FEF3C7; margin: 0 0 12px;">
                Откройте на смартфоне в 1 клик
            </h3>
            <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; color: rgba(254, 243, 199, 0.7); max-width: 480px; margin: 0 auto 24px; line-height: 1.5;">
                Наведите камеру смартфона на этот QR-код для мгновенного перехода к загрузке приложения.
            </p>

            <div style="display: inline-block; background: #FEF3C7; padding: 14px; border-radius: 12px; box-shadow: 0 0 35px rgba(245, 158, 11, 0.3);">
                <canvas id="ast-qr-canvas" width="160" height="160" style="display: block;"></canvas>
            </div>
        </section>

    </div>
</div>

<!-- МОДАЛЬНОЕ ОКНО: ФОРМА ОБРАТНОЙ СВЯЗИ СОАВТОРА (BETA FEEDBACK) -->
<div id="ast-feedback-modal" style="display: <?php echo !empty($feedback_notice) ? 'flex' : 'none'; ?>; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(2, 4, 8, 0.85); backdrop-filter: blur(12px); z-index: 99999; align-items: center; justify-content: center; padding: 20px; box-sizing: border-box;">
    <div class="ast-glass-card" style="background: #080E1A; border: 1px solid #F59E0B; border-radius: 18px; padding: 34px; max-width: 540px; width: 100%; box-shadow: 0 0 50px rgba(245, 158, 11, 0.3); position: relative;">
        
        <button onclick="toggleFeedbackModal(false)" style="position: absolute; top: 16px; right: 18px; background: transparent; border: none; color: #FDA4AF; font-size: 20px; cursor: pointer;">✕</button>

        <div style="font-family: 'Space Mono', monospace; font-size: 10px; color: #38BDF8; letter-spacing: 0.25em; text-transform: uppercase; margin-bottom: 8px;">
            КЛУБ СОАВТОРОВ ASTRAINA
        </div>
        <h3 style="font-family: 'Cinzel Decorative', serif; font-size: 22px; color: #FEF3C7; margin: 0 0 10px;">
            Ваш Вклад в Совершенство
        </h3>
        <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; color: rgba(254, 243, 199, 0.7); line-height: 1.5; margin-bottom: 20px;">
            Поделитесь вашими мыслями: что отозвалось глубже всего, какие элементы интерфейса хотелось бы улучшить, или какие небесные явления вы хотите видеть в следующем релизе.
        </p>

        <?php if (!empty($feedback_notice)): ?>
            <div style="background: <?php echo $feedback_status === 'success' ? 'rgba(37, 211, 102, 0.15)' : 'rgba(225, 29, 72, 0.15)'; ?>; border: 1px solid <?php echo $feedback_status === 'success' ? '#25D366' : '#E11D48'; ?>; border-radius: 8px; padding: 12px; margin-bottom: 18px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; color: #FEF3C7;">
                ✦ <?php echo esc_html($feedback_notice); ?>
            </div>
        <?php endif; ?>

        <form method="post" style="display: grid; gap: 12px;">
            <?php wp_nonce_field('ast_feedback_action', 'ast_feedback_nonce'); ?>
            
            <div>
                <label style="display: block; font-family: 'Space Mono', monospace; font-size: 9px; color: #F59E0B; margin-bottom: 4px;">ВАШЕ ИМЯ (ИЛИ ПСЕВДОНИМ)</label>
                <input type="text" name="fb_name" placeholder="Александр" style="width: 100%; box-sizing: border-box; background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); color: #FEF3C7; padding: 10px; border-radius: 6px; font-size: 13px;">
            </div>

            <div>
                <label style="display: block; font-family: 'Space Mono', monospace; font-size: 9px; color: #38BDF8; margin-bottom: 4px;">КОНТАКТ ДЛЯ СВЯЗИ (TELEGRAM ИЛИ EMAIL)</label>
                <input type="text" name="fb_contact" placeholder="@username или mail@example.com" style="width: 100%; box-sizing: border-box; background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); color: #FEF3C7; padding: 10px; border-radius: 6px; font-size: 12px; font-family: 'Space Mono', monospace;">
            </div>

            <div>
                <label style="display: block; font-family: 'Space Mono', monospace; font-size: 9px; color: #F59E0B; margin-bottom: 4px;">ВАШИ ВПЕЧАТЛЕНИЯ И ПОЖЕЛАНИЯ *</label>
                <textarea name="fb_message" rows="4" required placeholder="Опишите ваши впечатления от бета-версии, эргономики карты или точности расчетов..." style="width: 100%; box-sizing: border-box; background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); color: #FEF3C7; padding: 10px; border-radius: 6px; font-size: 12px; font-family: 'Plus Jakarta Sans', sans-serif; line-height: 1.5;"></textarea>
            </div>

            <button type="submit" name="ast_beta_feedback_submit" value="1" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: #020408; border: none; padding: 12px; border-radius: 6px; font-family: 'Cinzel', serif; font-size: 12px; font-weight: bold; letter-spacing: 0.1em; cursor: pointer; box-shadow: 0 0 20px rgba(245, 158, 11, 0.4);">
                ОТПРАВИТЬ ПОСЛАНИЕ ИНЖЕНЕРАМ
            </button>
        </form>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ua = navigator.userAgent || navigator.vendor || window.opera;
    const isIOS = /iPad|iPhone|iPod/.test(ua) && !window.MSStream;
    const isAndroid = /android/i.test(ua);

    const cardAndroid = document.getElementById('platform-card-android');
    const cardIos = document.getElementById('platform-card-ios');

    if (isIOS && cardIos) {
        cardIos.style.border = '2px solid #F59E0B';
        cardIos.style.boxShadow = '0 0 40px rgba(245, 158, 11, 0.3)';
    } else if (isAndroid && cardAndroid) {
        cardAndroid.style.border = '2px solid #F59E0B';
        cardAndroid.style.boxShadow = '0 0 40px rgba(245, 158, 11, 0.3)';
    }

    renderQrCodeToCanvas('ast-qr-canvas', window.location.href);
});

function toggleFeedbackModal(show) {
    const modal = document.getElementById('ast-feedback-modal');
    if (modal) {
        modal.style.display = show ? 'flex' : 'none';
    }
}

function renderQrCodeToCanvas(canvasId, text) {
    const canvas = document.getElementById(canvasId);
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    
    const qrImg = new Image();
    qrImg.crossOrigin = "anonymous";
    qrImg.onload = function() {
        ctx.drawImage(qrImg, 0, 0, 160, 160);
    };
    qrImg.src = 'https://api.qrserver.com/v1/create-qr-code/?size=160x160&color=020408&bgcolor=FEF3C7&data=' + encodeURIComponent(text);
}
</script>

<?php
get_footer();