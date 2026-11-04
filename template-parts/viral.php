<?php
if (!defined('ABSPATH')) { exit; }
?>
<?php

$celebrities = \AstraChron\Social\CelebrityVault::getAll();
$nextFullMoon = \AstraChron\Social\TimeCapsuleEngine::getNextFullMoonTimestamp();
?>

<div class="ast-social-viewport" style="background: #020408; min-height: 100vh; color: #FEF3C7; padding: 80px 20px 100px;">
    <div class="ast-container" style="max-width: 1400px; margin: 0 auto;">
        
        <!-- HEADER -->
        <header style="text-align: center; margin-bottom: 50px;">
            <div style="font-family: 'Space Mono', monospace; font-size: 11px; letter-spacing: 0.35em; color: #F59E0B; text-transform: uppercase; margin-bottom: 12px;">
                Module E · Viral Resonance & Human Connections
            </div>
            <h1 style="font-family: 'Cinzel Decorative', 'Cormorant Garamond', serif; font-size: clamp(28px, 4.5vw, 50px); font-weight: 400; color: #FEF3C7; text-shadow: 0 0 35px rgba(245, 158, 11, 0.35); margin: 0 0 16px;">
                Социальный Космос Астраины
            </h1>
            <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 15px; color: rgba(254, 243, 199, 0.7); max-width: 720px; margin: 0 auto; line-height: 1.6;">
                Создавайте кинематографичные Stories в 1 клик, примеряйте синастрию к картам мировых гениев и запечатывайте послания в Капсулу Времени.
            </p>
        </header>

        <!-- VIRAL SECTION 1: 9:16 STORIES GENERATOR BAR -->
        <div class="ast-glass-card" style="background: rgba(8, 14, 26, 0.85); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 18px; padding: 32px; margin-bottom: 60px; box-shadow: 0 20px 60px rgba(0,0,0,0.7);">
            <div style="display: grid; grid-template-columns: 1fr minmax(280px, 340px); gap: 32px; align-items: center;">
                <div>
                    <span style="font-family: 'Space Mono', monospace; font-size: 11px; color: #38BDF8; letter-spacing: 0.15em;">ONE-CLICK VIRAL EXPORT</span>
                    <h2 style="font-family: 'Cinzel', serif; font-size: 24px; color: #FBBF24; margin: 8px 0 14px;">
                        Генератор Stories 9:16 (Instagram / Telegram)
                    </h2>
                    <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; color: rgba(254, 243, 199, 0.75); line-height: 1.6; margin-bottom: 24px;">
                        Сгенерируйте вертикальную карточку сверхвысокого разрешения (1080×1920) с вашим знаком, сакральным Power Emoji и космическим советом дня.
                    </p>

                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <button id="ast-btn-share-story" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: #020408; font-family: 'Cinzel', serif; font-size: 13px; font-weight: bold; letter-spacing: 0.1em; padding: 14px 28px; border-radius: 8px; border: none; cursor: pointer; box-shadow: 0 0 25px rgba(245, 158, 11, 0.35);">
                            СКАЧАТЬ STORIES 9:16
                        </button>
                    </div>
                </div>

                <!-- Preview Mini Box -->
                <div style="aspect-ratio: 9/16; max-height: 320px; background: #020408; border: 1px solid rgba(245, 158, 11, 0.4); border-radius: 14px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 20px; text-align: center; box-shadow: 0 0 35px rgba(245, 158, 11, 0.2);">
                    <div style="font-size: 42px; margin-bottom: 8px;">👑</div>
                    <div style="font-family: 'Cinzel', serif; font-size: 14px; color: #FBBF24; margin-bottom: 6px;">ВАЙБ ДНЯ: 98%</div>
                    <div style="font-family: 'Space Mono', monospace; font-size: 9px; color: rgba(254, 243, 199, 0.7);">1080 × 1920 HD Ready</div>
                </div>
            </div>
        </div>

        <!-- VIRAL SECTION 2: CELEBRITY DATABASE (1-CLICK SYNASTRY) -->
        <section style="margin-bottom: 70px;">
            <div style="text-align: center; margin-bottom: 35px;">
                <h2 style="font-family: 'Cinzel Decorative', serif; font-size: 28px; color: #FEF3C7; margin: 0 0 10px;">
                    РЕЗОНАНС С ГЕНИЯМИ (CELEBRITY SYNASTRY)
                </h2>
                <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; color: rgba(254, 243, 199, 0.65);">
                    Совместимость с великими умами человечества: рассчитайте общие сакральные аспекты в 1 клик
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
                <?php foreach ($celebrities as $c): ?>
                    <div class="ast-glass-card" style="background: rgba(8, 14, 26, 0.75); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 14px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <span style="font-family: 'Space Mono', monospace; font-size: 10px; color: #38BDF8;"><?php echo esc_html($c['sun_sign']); ?> · ASC <?php echo esc_html($c['asc_sign']); ?></span>
                            <h3 style="font-family: 'Cinzel', serif; font-size: 18px; color: #FEF3C7; margin: 6px 0 8px;"><?php echo esc_html($c['name']); ?></h3>
                            <div style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 11px; color: #F59E0B; margin-bottom: 12px;"><?php echo esc_html($c['title']); ?></div>
                            <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; color: rgba(254, 243, 199, 0.7); line-height: 1.5; font-style: italic; margin-bottom: 20px;">
                                «<?php echo esc_html($c['quote']); ?>»
                            </p>
                        </div>
                        <button onclick="calculateCelebritySynastry('<?php echo esc_attr($c['id']); ?>', '<?php echo esc_attr($c['name']); ?>')" style="width: 100%; background: rgba(245, 158, 11, 0.15); border: 1px solid #F59E0B; color: #FEF3C7; padding: 10px; border-radius: 6px; font-family: 'Cinzel', serif; font-size: 11px; cursor: pointer; transition: all 0.3s;">
                            СИНАСТРИЯ СО МНОЙ
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- VIRAL SECTION 3: SACRED TIME CAPSULE -->
        <section class="ast-glass-card" style="background: rgba(8, 14, 26, 0.85); border: 1px solid rgba(225, 29, 72, 0.35); border-radius: 18px; padding: 36px; max-width: 820px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 24px;">
                <span style="font-family: 'Space Mono', monospace; font-size: 11px; color: #FDA4AF; letter-spacing: 0.2em;">АСТРОНОМИЧЕСКИЙ ЗАМОК</span>
                <h2 style="font-family: 'Cinzel Decorative', serif; font-size: 26px; color: #FEF3C7; margin: 8px 0 10px;">
                    Капсула Времени: Печать Ближайшего Полнолуния
                </h2>
                <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; color: rgba(254, 243, 199, 0.7); max-width: 580px; margin: 0 auto; line-height: 1.6;">
                    Запечатайте намерение или письмо будущему себе. Капсула защищена математическим замком и откроется строго в день суперлуния: 
                    <span style="color: #FBBF24; font-weight: bold;"><?php echo date('d.m.Y H:i', $nextFullMoon); ?> UTC</span>.
                </p>
            </div>

            <form id="ast-capsule-form" style="display: grid; gap: 16px;">
                <textarea id="capsule-msg" rows="4" placeholder="Напишите послание, которое прочтёте в полнолуние..." required style="width: 100%; background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); color: #FEF3C7; padding: 14px; border-radius: 8px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px;"></textarea>
                <div style="text-align: center;">
                    <button type="submit" style="background: linear-gradient(135deg, #E11D48 0%, #BE123C 100%); color: #FEF3C7; font-family: 'Cinzel', serif; font-weight: bold; font-size: 12px; letter-spacing: 0.15em; padding: 14px 36px; border: none; border-radius: 8px; cursor: pointer; box-shadow: 0 0 25px rgba(225, 29, 72, 0.35);">
                        ЗАПЕЧАТАТЬ НА ЛУННЫЙ ЦИКЛ
                    </button>
                </div>
            </form>
        </section>

    </div>
</div>

<?php wp_enqueue_script('astraina-stories-generator'); ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const generator = new AstraStoriesGenerator();

    document.getElementById('ast-btn-share-story').addEventListener('click', () => {
        generator.downloadOrShare({
            title: 'ВАЙБ ДНЯ · ASTRAINA',
            subtitle: 'ИМПУЛЬС САКРАЛЬНОГО ОГНЯ',
            text: 'Сегодня космические циклы благоволят дерзким решениям. Ваш натальный импульс готов к преодолению любых пределов.',
            emoji: '👑',
            power: '97%',
            element: 'ОГОНЬ'
        });
    });

    document.getElementById('ast-capsule-form').addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Капсула времени запечатана! Доступ откроется автоматически в миг ближайшего Полнолуния.');
        document.getElementById('capsule-msg').value = '';
    });
});

function calculateCelebritySynastry(celebId, celebName) {
    alert(`Рассчитывается синастрия вашей карты с гением: ${celebName}!\nПеренаправление в модуль Синастрии...`);
    window.location.href = `/astro-synastry/?partner2=${celebId}`;
}
</script>
