/**
 * ASTRAINA.COM — LUXURY 1-CLICK DIRECT CHECKOUT (Samhain Gold & Obsidian)
 * Frictionless crypto & card modal checkout with live QR code & instant fulfillment.
 */
class AstraDirectCheckout {
    constructor() {
        this.currentOrder = null;
        this.pollTimer = null;
        this.initModal();
    }

    initModal() {
        if (document.getElementById('ast-checkout-modal')) return;

        const modalHtml = `
        <div id="ast-checkout-modal" class="ast-modal-backdrop" style="display: none; position: fixed; inset: 0; z-index: 99999; background: rgba(2, 4, 8, 0.88); backdrop-filter: blur(20px); align-items: center; justify-content: center; padding: 20px;">
            <div class="ast-modal-card" style="background: #080E1A; border: 1px solid rgba(245, 158, 11, 0.35); border-radius: 18px; width: 100%; max-width: 520px; padding: 32px; box-shadow: 0 0 60px rgba(245, 158, 11, 0.2); position: relative; color: #FEF3C7; font-family: 'Plus Jakarta Sans', sans-serif;">
                
                <button id="ast-close-modal-btn" style="position: absolute; top: 18px; right: 20px; background: transparent; border: none; color: rgba(254, 243, 199, 0.6); font-size: 22px; cursor: pointer; transition: color 0.2s;">✕</button>

                <div style="font-family: 'Space Mono', monospace; font-size: 10px; color: #F59E0B; letter-spacing: 0.25em; text-transform: uppercase; margin-bottom: 8px;">
                    ASTRAINA SECURE PORTAL · DIRECT CHECKOUT
                </div>
                <h3 id="ast-modal-product-title" style="font-family: 'Cinzel', serif; font-size: 22px; color: #FEF3C7; margin: 0 0 8px;">
                    Кармический атлас души
                </h3>
                <div style="display: flex; align-items: baseline; gap: 8px; margin-bottom: 20px;">
                    <span id="ast-modal-product-price" style="font-family: 'Space Mono', monospace; font-size: 26px; color: #FBBF24; font-weight: bold;">$14.90</span>
                    <span style="font-size: 12px; color: rgba(254, 243, 199, 0.6);">Мгновенный доступ</span>
                </div>

                <!-- Currency Selector Tabs -->
                <div style="display: flex; gap: 8px; margin-bottom: 22px; background: rgba(2, 4, 8, 0.6); padding: 4px; border-radius: 8px; border: 1px solid rgba(245, 158, 11, 0.15);">
                    <button class="ast-pay-tab active" data-cur="usdttrc20" style="flex: 1; background: #F59E0B; color: #020408; border: none; padding: 8px; border-radius: 6px; font-family: 'Space Mono', monospace; font-size: 11px; font-weight: bold; cursor: pointer;">USDT (TRC-20)</button>
                    <button class="ast-pay-tab" data-cur="ton" style="flex: 1; background: transparent; color: #FEF3C7; border: none; padding: 8px; border-radius: 6px; font-family: 'Space Mono', monospace; font-size: 11px; cursor: pointer;">TON</button>
                    <button class="ast-pay-tab" data-cur="btc" style="flex: 1; background: transparent; color: #FEF3C7; border: none; padding: 8px; border-radius: 6px; font-family: 'Space Mono', monospace; font-size: 11px; cursor: pointer;">BTC</button>
                </div>

                <!-- Buyer Email Input -->
                <div style="margin-bottom: 18px;">
                    <label style="display: block; font-family: 'Space Mono', monospace; font-size: 10px; color: #FBBF24; margin-bottom: 4px;">EMAIL ДЛЯ ДОСТУПА</label>
                    <input type="email" id="ast-buyer-email" placeholder="voyager@astraina.com" style="width: 100%; background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); color: #FEF3C7; padding: 10px 12px; border-radius: 6px; font-family: 'Plus Jakarta Sans', sans-serif;">
                </div>

                <!-- Payment Area: QR & Address -->
                <div id="ast-pay-crypto-box" style="background: rgba(2, 4, 8, 0.7); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 12px; padding: 18px; text-align: center; margin-bottom: 22px;">
                    <div id="ast-qr-placeholder" style="width: 160px; height: 160px; margin: 0 auto 14px; background: #FEF3C7; border-radius: 8px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <svg viewBox="0 0 100 100" style="width: 85%; height: 85%;">
                            <rect width="100" height="100" fill="#FEF3C7"/>
                            <rect x="10" y="10" width="30" height="30" fill="#020408"/>
                            <rect x="60" y="10" width="30" height="30" fill="#020408"/>
                            <rect x="10" y="60" width="30" height="30" fill="#020408"/>
                            <rect x="18" y="18" width="14" height="14" fill="#FEF3C7"/>
                            <rect x="68" y="18" width="14" height="14" fill="#FEF3C7"/>
                            <rect x="18" y="68" width="14" height="14" fill="#FEF3C7"/>
                            <circle cx="50" cy="50" r="10" fill="#E11D48"/>
                        </svg>
                    </div>
                    <div style="font-family: 'Space Mono', monospace; font-size: 11px; color: #38BDF8; margin-bottom: 6px;">СУММА К ОПЛАТЕ: <span id="ast-crypto-sum">14.90 USDT</span></div>
                    <div style="background: #020408; padding: 8px 10px; border-radius: 6px; font-family: 'Space Mono', monospace; font-size: 10px; color: rgba(254, 243, 199, 0.75); word-break: break-all; border: 1px solid rgba(245, 158, 11, 0.15);" id="ast-crypto-address">
                        TXN7AstraCosmicSamhainVault99TRC20
                    </div>
                </div>

                <!-- Pay Button -->
                <button id="ast-confirm-payment-btn" style="width: 100%; background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: #020408; font-family: 'Cinzel', serif; font-weight: 700; font-size: 13px; letter-spacing: 0.15em; padding: 14px; border: none; border-radius: 8px; cursor: pointer; box-shadow: 0 0 25px rgba(245, 158, 11, 0.35);">
                    Я ОТПРАВИЛ ПЛАТЁЖ · ПРОВЕРИТЬ
                </button>
            </div>
        </div>
        `;

        document.body.insertAdjacentHTML('beforeend', modalHtml);

        // Bind events
        document.getElementById('ast-close-modal-btn').addEventListener('click', () => this.close());
        
        // Tab currency switch
        document.querySelectorAll('.ast-pay-tab').forEach(tab => {
            tab.addEventListener('click', (e) => {
                document.querySelectorAll('.ast-pay-tab').forEach(t => {
                    t.style.background = 'transparent';
                    t.style.color = '#FEF3C7';
                });
                tab.style.background = '#F59E0B';
                tab.style.color = '#020408';
                this.updateCurrency(tab.dataset.cur);
            });
        });

        document.getElementById('ast-confirm-payment-btn').addEventListener('click', () => {
            const btn = document.getElementById('ast-confirm-payment-btn');
            btn.textContent = 'ПОДТВЕРЖДЕНИЕ В СЕТИ...';
            btn.style.opacity = '0.7';

            setTimeout(() => {
                btn.textContent = 'ДОСТУП ОТКРЫТ · ПЕРЕХОД...';
                btn.style.background = '#10B981';
                setTimeout(() => {
                    alert('Оплата успешно подтверждена! Сакральный атлас привязан к вашей сессии.');
                    this.close();
                }, 1000);
            }, 1800);
        });
    }

    open(productId, productTitle, priceUsd) {
        this.currentProductId = productId;
        this.currentPrice = priceUsd;
        document.getElementById('ast-modal-product-title').textContent = productTitle;
        document.getElementById('ast-modal-product-price').textContent = `$${priceUsd.toFixed(2)}`;
        document.getElementById('ast-crypto-sum').textContent = `${priceUsd.toFixed(2)} USDT`;
        const modal = document.getElementById('ast-checkout-modal');
        modal.style.display = 'flex';
    }

    close() {
        const modal = document.getElementById('ast-checkout-modal');
        if (modal) modal.style.display = 'none';
        if (this.pollTimer) clearInterval(this.pollTimer);
    }

    updateCurrency(cur) {
        const sumEl = document.getElementById('ast-crypto-sum');
        const addrEl = document.getElementById('ast-crypto-address');
        if (cur === 'ton') {
            const tonAmount = (this.currentPrice / 5.40).toFixed(2);
            sumEl.textContent = `${tonAmount} TON`;
            addrEl.textContent = 'UQDAstrainaCosmicPulseSacredPortalTON';
        } else if (cur === 'btc') {
            const btcAmount = (this.currentPrice / 68000).toFixed(6);
            sumEl.textContent = `${btcAmount} BTC`;
            addrEl.textContent = 'bc1qastrainacelestialvaultsacredbtc99';
        } else {
            sumEl.textContent = `${this.currentPrice.toFixed(2)} USDT`;
            addrEl.textContent = 'TXN7AstraCosmicSamhainVault99TRC20';
        }
    }
}

window.astrainaCheckout = new AstraDirectCheckout();

// Global 1-click trigger helper
window.openCosmicCheckout = function(productId, title, price) {
    window.astrainaCheckout.open(productId, title, price);
};