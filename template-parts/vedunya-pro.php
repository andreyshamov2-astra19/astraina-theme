<?php
if (!defined('ABSPATH')) { exit; }
?>

<div class="ast-vedunya-viewport" style="background: #020408; min-height: 100vh; color: #FEF3C7; padding: 80px 20px 100px;">
    <div class="ast-container" style="max-width: 1400px; margin: 0 auto;">
        
        <header style="margin-bottom: 40px; display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 20px;">
            <div>
                <div style="font-family: 'Space Mono', monospace; font-size: 11px; letter-spacing: 0.35em; color: #FDA4AF; text-transform: uppercase; margin-bottom: 8px;">
                    ASTRAINA B2B WORKSUITE · WHITE-LABEL ENGINE
                </div>
                <h1 style="font-family: 'Cinzel Decorative', serif; font-size: clamp(26px, 3.5vw, 42px); color: #FEF3C7; margin: 0;">
                    Рабочее Место: Ведунья Pro
                </h1>
            </div>
            <div style="background: rgba(225, 29, 72, 0.15); border: 1px solid #E11D48; padding: 8px 16px; border-radius: 8px; font-family: 'Space Mono', monospace; font-size: 11px; color: #FDA4AF;">
                ЛИЦЕНЗИЯ АКТИВНА · ВЕРСИЯ PRO
            </div>
        </header>

        <div style="display: grid; grid-template-columns: minmax(320px, 450px) 1fr; gap: 32px; align-items: start;">
            
            <div class="ast-glass-card" style="background: rgba(8, 14, 26, 0.75); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 26px;">
                <h3 style="font-family: 'Cinzel', serif; font-size: 17px; color: #FBBF24; margin: 0 0 16px;">
                    WHITE-LABEL РЕКВИЗИТЫ МАСТЕРА
                </h3>
                <p style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; color: rgba(254, 243, 199, 0.65); line-height: 1.5; margin-bottom: 20px;">
                    Эти данные будут напечатаны на титульном листе 20-страничных PDF отчетов для ваших клиентов вместо бренда ASTRAINA.
                </p>

                <form id="ast-whitelabel-form" style="display: grid; gap: 14px;">
                    <div>
                        <label style="display: block; font-family: 'Space Mono', monospace; font-size: 10px; color: #F59E0B; margin-bottom: 4px;">ИМЯ АСТРОЛОГА / ШКОЛЫ</label>
                        <input type="text" id="wl-name" value="Академия Сакральной Астрологии" style="width: 100%; background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); color: #FEF3C7; padding: 10px; border-radius: 6px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px;">
                    </div>
                    <div>
                        <label style="display: block; font-family: 'Space Mono', monospace; font-size: 10px; color: #F59E0B; margin-bottom: 4px;">КОНТАКТНЫЙ TELEGRAM / WHATSAPP</label>
                        <input type="text" id="wl-contact" value="@sacred_astro_master" style="width: 100%; background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); color: #FEF3C7; padding: 10px; border-radius: 6px; font-family: 'Space Mono', monospace; font-size: 12px;">
                    </div>
                    <div>
                        <label style="display: block; font-family: 'Space Mono', monospace; font-size: 10px; color: #F59E0B; margin-bottom: 4px;">ПЕРСОНАЛЬНОЕ НАПУТСТВИЕ КЛИЕНТУ</label>
                        <textarea id="wl-note" rows="3" style="width: 100%; background: #020408; border: 1px solid rgba(245, 158, 11, 0.3); color: #FEF3C7; padding: 10px; border-radius: 6px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px;">Пусть свет небесных сфер осветит ваш истинный путь реализации.</textarea>
                    </div>
                    <button type="button" onclick="alert('White-Label профиль успешно сохранён!')" style="background: rgba(245, 158, 11, 0.2); border: 1px solid #F59E0B; color: #FBBF24; padding: 10px; border-radius: 6px; font-family: 'Cinzel', serif; font-size: 11px; cursor: pointer;">
                        СОХРАНИТЬ РЕКВИЗИТЫ
                    </button>
                </form>
            </div>

            <div class="ast-glass-card" style="background: rgba(8, 14, 26, 0.75); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 26px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 style="font-family: 'Cinzel', serif; font-size: 17px; color: #FEF3C7; margin: 0;">
                        РЕЕСТР КЛИЕНТОВ (ASTRO-CRM)
                    </h3>
                    <button onclick="addNewClientPrompt()" style="background: #F59E0B; color: #020408; border: none; padding: 6px 14px; border-radius: 6px; font-family: 'Cinzel', serif; font-size: 11px; font-weight: bold; cursor: pointer;">
                        + НОВЫЙ КЛИЕНТ
                    </button>
                </div>

                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; font-family: 'Space Mono', monospace; font-size: 12px; text-align: left;">
                        <thead>
                            <tr style="border-bottom: 1px solid rgba(245, 158, 11, 0.25); color: #38BDF8;">
                                <th style="padding: 10px 8px;">КЛИЕНТ</th>
                                <th style="padding: 10px 8px;">ДАТА РОЖДЕНИЯ</th>
                                <th style="padding: 10px 8px;">ГОРОД</th>
                                <th style="padding: 10px 8px;">ДЕЙСТВИЯ</th>
                            </tr>
                        </thead>
                        <tbody id="ast-crm-table-body">
                            <tr style="border-bottom: 1px solid rgba(245, 158, 11, 0.1);">
                                <td style="padding: 12px 8px; color: #FEF3C7; font-weight: bold;">Виктория Воронова</td>
                                <td style="padding: 12px 8px;">14.07.1994 06:20</td>
                                <td style="padding: 12px 8px;">Москва</td>
                                <td style="padding: 12px 8px;">
                                    <button onclick="generateClientPdf('Виктория Воронова', '14.07.1994')" style="background: rgba(56, 189, 248, 0.15); border: 1px solid #38BDF8; color: #38BDF8; padding: 4px 10px; border-radius: 4px; font-size: 10px; cursor: pointer;">
                                        ЭКСПОРТ PDF
                                    </button>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid rgba(245, 158, 11, 0.1);">
                                <td style="padding: 12px 8px; color: #FEF3C7; font-weight: bold;">Константин Белов</td>
                                <td style="padding: 12px 8px;">29.11.1988 19:40</td>
                                <td style="padding: 12px 8px;">Санкт-Петербург</td>
                                <td style="padding: 12px 8px;">
                                    <button onclick="generateClientPdf('Константин Белов', '29.11.1988')" style="background: rgba(56, 189, 248, 0.15); border: 1px solid #38BDF8; color: #38BDF8; padding: 4px 10px; border-radius: 4px; font-size: 10px; cursor: pointer;">
                                        ЭКСПОРТ PDF
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
function addNewClientPrompt() {
    const name = prompt('Введите имя клиента:');
    if (!name) return;
    const date = prompt('Введите дату и время рождения (ДД.ММ.ГГГГ ЧЧ:ММ):', '01.01.1990 12:00');
    const city = prompt('Введите город рождения:', 'Москва');

    const tbody = document.getElementById('ast-crm-table-body');
    const tr = document.createElement('tr');
    tr.style.borderBottom = '1px solid rgba(245, 158, 11, 0.1)';
    tr.innerHTML = `
        <td style="padding: 12px 8px; color: #FEF3C7; font-weight: bold;">${name}</td>
        <td style="padding: 12px 8px;">${date}</td>
        <td style="padding: 12px 8px;">${city}</td>
        <td style="padding: 12px 8px;">
            <button onclick="generateClientPdf('${name}', '${date}')" style="background: rgba(56, 189, 248, 0.15); border: 1px solid #38BDF8; color: #38BDF8; padding: 4px 10px; border-radius: 4px; font-size: 10px; cursor: pointer;">
                ЭКСПОРТ PDF
            </button>
        </td>
    `;
    tbody.appendChild(tr);
}

function generateClientPdf(name, date) {
    const masterName = document.getElementById('wl-name').value;
    const masterContact = document.getElementById('wl-contact').value;
    alert(`Генерация White-Label PDF отчёта для клиента: ${name} (${date})\nБрендирование мастера: ${masterName} [${masterContact}]\nГотово к печати и сохранению.`);
    window.print();
}
</script>
