/**
 * ASTRAINA.COM — SMART PWA DIRECT INSTALL CONTROLLER
 * Detects iOS Safari vs Android and displays luxury glassmorphism install guidance.
 */
document.addEventListener('DOMContentLoaded', () => {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js').catch((err) => {
            console.log('SW registration note:', err);
        });
    }

    const isStandalone = window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true;
    if (isStandalone) {
        return;
    }

    const ua = window.navigator.userAgent;
    const isIOS = /iPad|iPhone|iPod/.test(ua) && !window.MSStream;
    const isSafari = /Safari/.test(ua) && !/CriOS|FxiOS|Chrome/.test(ua);

    setTimeout(() => {
        showPwaPrompt(isIOS && isSafari);
    }, 4000);

    function showPwaPrompt(isAppleSafari) {
        if (sessionStorage.getItem('ast_pwa_dismissed')) return;

        const banner = document.createElement('div');
        banner.id = 'ast-pwa-install-sheet';
        banner.style.position = 'fixed';
        banner.style.bottom = '20px';
        banner.style.left = '50%';
        banner.style.transform = 'translateX(-50%)';
        banner.style.width = 'calc(100% - 32px)';
        banner.style.maxWidth = '460px';
        banner.style.background = 'rgba(8, 14, 26, 0.94)';
        banner.style.border = '1px solid rgba(245, 158, 11, 0.4)';
        banner.style.borderRadius = '16px';
        banner.style.padding = '18px 22px';
        banner.style.backdropFilter = 'blur(20px)';
        banner.style.boxShadow = '0 15px 40px rgba(0, 0, 0, 0.8), 0 0 30px rgba(245, 158, 11, 0.2)';
        banner.style.zIndex = '99998';
        banner.style.color = '#FEF3C7';
        banner.style.fontFamily = "'Plus Jakarta Sans', sans-serif";

        const content = isAppleSafari ? `
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                <span style="font-family: 'Space Mono', monospace; font-size: 10px; color: #F59E0B; letter-spacing: 0.15em;">ДОБАВИТЬ В IPHONE</span>
                <button id="ast-pwa-close-btn" style="background: none; border: none; color: rgba(254, 243, 199, 0.5); font-size: 18px; cursor: pointer;">✕</button>
            </div>
            <div style="display: flex; gap: 14px; align-items: center;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: #020408; border: 1px solid rgba(245, 158, 11, 0.4); display: flex; align-items: center; justify-content: center; font-size: 22px; color: #FBBF24;">✦</div>
                <div style="flex: 1; font-size: 12px; line-height: 1.4; color: rgba(254, 243, 199, 0.85);">
                    Установите ASTRAINA без App Store: нажмите 
                    <span style="color: #38BDF8; font-weight: bold;">«Поделиться» [⎋]</span>, затем 
                    <span style="color: #FBBF24; font-weight: bold;">«На экран «Домой» [+]</span>.
                </div>
            </div>
        ` : `
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                <span style="font-family: 'Space Mono', monospace; font-size: 10px; color: #F59E0B; letter-spacing: 0.15em;">МОБИЛЬНОЕ ПРИЛОЖЕНИЕ</span>
                <button id="ast-pwa-close-btn" style="background: none; border: none; color: rgba(254, 243, 199, 0.5); font-size: 18px; cursor: pointer;">✕</button>
            </div>
            <div style="display: flex; gap: 14px; align-items: center;">
                <div style="width: 44px; height: 44px; border-radius: 10px; background: #020408; border: 1px solid rgba(245, 158, 11, 0.4); display: flex; align-items: center; justify-content: center; font-size: 22px; color: #FBBF24;">✦</div>
                <div style="flex: 1; font-size: 12px; line-height: 1.4; color: rgba(254, 243, 199, 0.85);">
                    Установите приложение ASTRAINA на экран вашего смартфона для прямого оффлайн-доступа.
                </div>
            </div>
            <div style="margin-top: 12px; display: flex; gap: 10px;">
                <a href="/download/" style="flex: 1; text-align: center; background: #F59E0B; color: #020408; padding: 8px; border-radius: 6px; font-family: 'Cinzel', serif; font-size: 11px; font-weight: bold; text-decoration: none;">СКАЧАТЬ .APK</a>
                <a href="/download/" style="flex: 1; text-align: center; background: rgba(245, 158, 11, 0.15); border: 1px solid #F59E0B; color: #FEF3C7; padding: 8px; border-radius: 6px; font-family: 'Cinzel', serif; font-size: 11px; text-decoration: none;">ИНСТРУКЦИЯ</a>
            </div>
        `;

        banner.innerHTML = content;
        document.body.appendChild(banner);

        document.getElementById('ast-pwa-close-btn').addEventListener('click', () => {
            banner.remove();
            sessionStorage.setItem('ast_pwa_dismissed', '1');
        });
    }
});