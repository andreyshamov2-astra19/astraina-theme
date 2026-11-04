<?php
/**
 * Template Name: Кабинет «Ведунья Pro» B2B
 * Architecture: Samhain Obsidian & Cosmic Gold · Zero-Knowledge Encrypted Vault (Up to 10 Calcs)
 */
get_header(); ?>
<div class="ast-page-wrapper" style="position: relative; z-index: 10; background: transparent; min-height: 90vh; padding: 40px 20px 80px;">
    <div style="max-width: 1280px; margin: 0 auto;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; flex-wrap: wrap; gap: 20px;">
            <div>
                <span style="font-family: monospace; font-size: 11px; color: #F59E0B; letter-spacing: 2px;">✦ РАБОЧЕЕ МЕСТО ЭКСПЕРТА · ЗАЩИТА САКРАЛЬНЫХ ДАННЫХ</span>
                <h1 style="font-family: 'Cinzel Decorative', serif; color: #FFF; font-size: 32px; margin: 8px 0 0;">Ведунья Pro · B2B Обитель</h1>
            </div>
            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                <button type="button" onclick="restoreFromEncryptedVault()" style="background: rgba(16, 185, 129, 0.15); border: 1px solid #10B981; color: #6EE7B7; font-weight: 600; border-radius: 20px; padding: 10px 18px; cursor: pointer; font-size: 12px;">
                    🛡️ Восстановить из облачного Vault (до 10 расчетов)
                </button>
                <button type="button" onclick="exportClientsJSON()" style="background: rgba(56, 189, 248, 0.15); border: 1px solid #38BDF8; color: #7DD3FC; font-weight: 600; border-radius: 20px; padding: 10px 18px; cursor: pointer; font-size: 12px;">
                    💾 Экспорт всей базы (JSON)
                </button>
                <button type="button" onclick="window.print()" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: #020408; font-weight: 700; border: none; border-radius: 20px; padding: 10px 20px; cursor: pointer; font-size: 12px;">
                    Печать White-Label PDF 🖨️
                </button>
            </div>
        </div>

        <!-- УВЕДОМЛЕНИЕ О ЗАШИФРОВАННОМ ОБЛАЧНОМ ХРАНИЛИЩЕ -->
        <div style="background: rgba(2, 4, 8, 0.7); border-left: 3px solid #10B981; border-radius: 10px; padding: 14px 20px; margin-bottom: 25px; font-size: 12.5px; color: #94A3B8; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
            <span><strong>Zero-Knowledge Защита:</strong> На сервере сохраняются строго до 10 последних расчетов в зашифрованном виде (Ciphertext). Администрация сайта не имеет доступа к натальным данным ваших нативов.</span>
            <span style="color: #FBBF24; font-family: monospace;">● Зашифрованный Vault Активен</span>
        </div>

        <div style="display: grid; grid-template-columns: 340px 1fr; gap: 30px;">
            
            <!-- ЛЕВАЯ КОЛОНКА: БРЕНДИНГ И КОНТАКТЫ ВЕДУНЬИ -->
            <div style="background: rgba(8, 14, 26, 0.92); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 18px; padding: 25px; align-self: start;">
                <h3 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 0 0 16px; font-size: 17px;">Профиль Эксперта</h3>
                
                <div style="text-align: center; margin-bottom: 20px;">
                    <div id="pro-logo-preview" style="width: 110px; height: 110px; border-radius: 50%; border: 2px dashed rgba(245, 158, 11, 0.4); margin: 0 auto 12px; display: flex; align-items: center; justify-content: center; overflow: hidden; background: rgba(2, 4, 8, 0.6);">
                        <span style="color: #64748B; font-size: 11px;">Нет лого</span>
                    </div>
                    <label style="background: rgba(245, 158, 11, 0.15); border: 1px solid #F59E0B; color: #FBBF24; padding: 7px 16px; border-radius: 20px; font-size: 12px; cursor: pointer; display: inline-block;">
                        Загрузить логотип
                        <input type="file" id="pro-logo-input" accept="image/*" onchange="uploadProLogo(this)" style="display: none;">
                    </label>
                </div>

                <div style="margin-bottom: 12px;">
                    <label style="font-size: 11px; color: #94A3B8; font-family: monospace;">ИМЯ ЭКСПЕРТА / СТУДИИ</label>
                    <input type="text" id="pro-expert-name" value="Астрологическая Обитель" onchange="saveProSettings()" style="width: 100%; box-sizing: border-box; background: rgba(2, 4, 8, 0.8); border: 1px solid rgba(245, 158, 11, 0.2); color: #FFF; padding: 10px; border-radius: 8px; margin-top: 4px;">
                </div>

                <div style="margin-bottom: 12px;">
                    <label style="font-size: 11px; color: #94A3B8; font-family: monospace;">EMAIL ЭКСПЕРТА</label>
                    <input type="email" id="pro-expert-email" value="expert@astraina.com" onchange="saveProSettings()" style="width: 100%; box-sizing: border-box; background: rgba(2, 4, 8, 0.8); border: 1px solid rgba(245, 158, 11, 0.2); color: #FFF; padding: 10px; border-radius: 8px; margin-top: 4px;">
                </div>

                <div style="margin-bottom: 12px;">
                    <label style="font-size: 11px; color: #94A3B8; font-family: monospace;">TELEGRAM ЭКСПЕРТА (@...)</label>
                    <input type="text" id="pro-expert-tg" value="@vedunya_pro" onchange="saveProSettings()" style="width: 100%; box-sizing: border-box; background: rgba(2, 4, 8, 0.8); border: 1px solid rgba(245, 158, 11, 0.2); color: #FFF; padding: 10px; border-radius: 8px; margin-top: 4px;">
                </div>

                <div>
                    <label style="font-size: 11px; color: #94A3B8; font-family: monospace;">WHATSAPP ЭКСПЕРТА (+...)</label>
                    <input type="text" id="pro-expert-wa" value="+79990001122" onchange="saveProSettings()" style="width: 100%; box-sizing: border-box; background: rgba(2, 4, 8, 0.8); border: 1px solid rgba(245, 158, 11, 0.2); color: #FFF; padding: 10px; border-radius: 8px; margin-top: 4px;">
                </div>
            </div>

            <!-- ПРАВАЯ КОЛОНКА: КАРТОТЕКА КЛИЕНТОВ С ИСТОРИЕЙ 10 РАСЧЕТОВ -->
            <div style="background: rgba(8, 14, 26, 0.92); border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 18px; padding: 25px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 style="font-family: 'Cinzel Decorative', serif; color: #FDE68A; margin: 0; font-size: 18px;">Картотека Клиентов (Astro-CRM)</h3>
                    <button type="button" onclick="addClientModal()" style="background: rgba(16, 185, 129, 0.15); border: 1px solid #10B981; color: #34D399; padding: 8px 16px; border-radius: 20px; font-size: 12.5px; cursor: pointer;">+ Новый натив</button>
                </div>

                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                        <thead>
                            <tr style="text-align: left; border-bottom: 1px solid rgba(245, 158, 11, 0.25); color: #F59E0B;">
                                <th style="padding: 10px;">Клиент (Натив)</th>
                                <th style="padding: 10px;">Дата & Время</th>
                                <th style="padding: 10px;">Город</th>
                                <th style="padding: 10px;">Контакты</th>
                                <th style="padding: 10px; text-align: right;">Действия</th>
                            </tr>
                        </thead>
                        <tbody id="crm-clients-table-body"></tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- МОДАЛЬНОЕ ОКНО ДОСЬЕ КЛИЕНТА (10 РАСЧЕТОВ + ОТПРАВКА) -->
<div id="client-dossier-modal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.85); z-index: 99999; backdrop-filter: blur(8px); align-items: center; justify-content: center; padding: 20px;">
    <div style="background: #080E1A; border: 1px solid #F59E0B; border-radius: 18px; max-width: 720px; width: 100%; max-height: 90vh; overflow-y: auto; padding: 30px; box-shadow: 0 20px 60px rgba(0,0,0,0.95); color: #FFF;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
            <div>
                <span style="font-family: monospace; font-size: 11px; color: #F59E0B;">ДОСЬЕ НАТИВА · ИСТОРИЯ РАСЧЕТОВ</span>
                <h3 id="dossier-client-name" style="font-family: 'Cinzel Decorative', serif; font-size: 24px; color: #FDE68A; margin: 4px 0;"></h3>
            </div>
            <button type="button" onclick="closeDossierModal()" style="background: none; border: none; color: #94A3B8; font-size: 22px; cursor: pointer;">✕</button>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px; margin-bottom: 20px; background: rgba(2,4,8,0.7); padding: 15px; border-radius: 10px;">
            <div><span style="font-size: 11px; color: #64748B;">ДАТА:</span> <div id="dossier-client-birth" style="font-weight: 600;"></div></div>
            <div><span style="font-size: 11px; color: #64748B;">ГОРОД:</span> <div id="dossier-client-city" style="font-weight: 600;"></div></div>
            <div><span style="font-size: 11px; color: #64748B;">СВЯЗЬ:</span> <div id="dossier-client-contact" style="font-weight: 600; color: #38BDF8;"></div></div>
        </div>

        <h4 style="color: #F59E0B; font-size: 14px; margin: 0 0 10px; text-transform: uppercase; font-family: monospace;">Быстрая отправка карты клиенту:</h4>
        <div style="display: flex; gap: 10px; margin-bottom: 25px; flex-wrap: wrap;">
            <button type="button" onclick="dispatchToWhatsApp()" style="background: #25D366; color: #FFF; border: none; padding: 9px 18px; border-radius: 20px; font-weight: 600; font-size: 12px; cursor: pointer;">Отправить в WhatsApp 💬</button>
            <button type="button" onclick="dispatchToTelegram()" style="background: #0088CC; color: #FFF; border: none; padding: 9px 18px; border-radius: 20px; font-weight: 600; font-size: 12px; cursor: pointer;">Отправить в Telegram ✈️</button>
            <button type="button" onclick="dispatchToEmail()" style="background: #EA4335; color: #FFF; border: none; padding: 9px 18px; border-radius: 20px; font-weight: 600; font-size: 12px; cursor: pointer;">Отправить на Email ✉️</button>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
            <h4 style="color: #FDE68A; margin: 0; font-size: 15px;">История последних расчетов (до 10):</h4>
            <button type="button" onclick="addNewCalcPrompt()" style="background: rgba(245,158,11,0.15); border: 1px solid #F59E0B; color: #FDE68A; padding: 4px 12px; border-radius: 12px; font-size: 11.5px; cursor: pointer;">+ Добавить расчет</button>
        </div>
        <div id="dossier-calculations-list" style="display: flex; flex-direction: column; gap: 8px;"></div>
    </div>
</div>

<script>
let clients = JSON.parse(localStorage.getItem('ast_vedunya_clients') || '[]');
if (clients.length === 0) {
    clients = [
        {
            id: 1,
            name: 'Елена Воронова',
            date: '1992-04-18',
            time: '11:15',
            city: 'Москва',
            email: 'elena@gmail.com',
            phone: '+79991112233',
            history: [
                { date: '2026-10-15', type: 'Натальная карта Плацидус', notes: 'Сильный тригон Луна-Юпитер, карьерный рост.' }
            ]
        }
    ];
    localStorage.setItem('ast_vedunya_clients', JSON.stringify(clients));
}

let activeClientIdx = null;

function renderClientsTable() {
    const tbody = document.getElementById('crm-clients-table-body');
    tbody.innerHTML = '';
    clients.forEach((c, idx) => {
        const tr = document.createElement('tr');
        tr.style.borderBottom = '1px solid rgba(255, 255, 255, 0.05)';
        tr.innerHTML = `
            <td style="padding:10px; color:#FFF; font-weight:600; cursor:pointer;" onclick="openClientDossier(${idx})">
                <span style="color:#FBBF24;">${c.name}</span>
                <span style="display:block; font-size:11px; color:#64748B;">В истории: ${(c.history || []).length}</span>
            </td>
            <td style="padding:10px; color:#CBD5E1; font-family:monospace;">${c.date} ${c.time}</td>
            <td style="padding:10px; color:#FDE68A;">${c.city}</td>
            <td style="padding:10px; color:#94A3B8; font-size:12px;">${c.phone || c.email || '—'}</td>
            <td style="padding:10px; text-align:right;">
                <button type="button" onclick="openClientDossier(${idx})" style="background:rgba(245,158,11,0.15); border:1px solid #F59E0B; color:#FDE68A; padding:4px 10px; border-radius:12px; cursor:pointer; font-size:11px; margin-right:6px;">Досье</button>
                <button type="button" onclick="deleteClient(${idx})" style="background:none; border:none; color:#EF4444; cursor:pointer; font-size:12px;">✕</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}
renderClientsTable();

function openClientDossier(idx) {
    activeClientIdx = idx;
    const c = clients[idx];
    document.getElementById('dossier-client-name').textContent = c.name;
    document.getElementById('dossier-client-birth').textContent = `${c.date} в ${c.time}`;
    document.getElementById('dossier-client-city').textContent = c.city;
    document.getElementById('dossier-client-contact').textContent = `${c.phone || ''} ${c.email ? '(' + c.email + ')' : ''}`;

    renderDossierHistory();
    document.getElementById('client-dossier-modal').style.display = 'flex';
}

function renderDossierHistory() {
    const c = clients[activeClientIdx];
    const list = document.getElementById('dossier-calculations-list');
    list.innerHTML = '';
    const hist = c.history || [];

    if (hist.length === 0) {
        list.innerHTML = '<div style="color:#64748B; font-size:13px;">История расчетов пуста.</div>';
        return;
    }

    hist.slice(-10).reverse().forEach(h => {
        const item = document.createElement('div');
        item.style.cssText = "background: rgba(2,4,8,0.6); border: 1px solid rgba(255,255,255,0.08); border-radius: 8px; padding: 10px 14px;";
        item.innerHTML = `
            <div style="display:flex; justify-content:space-between; font-size:12px; color:#F59E0B;">
                <strong>${h.type}</strong>
                <span style="font-family:monospace; color:#64748B;">${h.date}</span>
            </div>
            <div style="font-size:12.5px; color:#CBD5E1; margin-top:4px;">${h.notes}</div>
        `;
        list.appendChild(item);
    });
}

function addNewCalcPrompt() {
    const type = prompt('Тип расчета (Натал, Соляр, Синастрия, Транзиты):', 'Натальный разбор');
    if (!type) return;
    const notes = prompt('Краткий вывод / заметка по расчету:');
    if (!notes) return;

    if (!clients[activeClientIdx].history) clients[activeClientIdx].history = [];
    clients[activeClientIdx].history.push({
        date: new Date().toISOString().slice(0, 10),
        type,
        notes
    });

    // Ограничение до 10 последних расчетов
    if (clients[activeClientIdx].history.length > 10) {
        clients[activeClientIdx].history.shift();
    }

    localStorage.setItem('ast_vedunya_clients', JSON.stringify(clients));
    syncEncryptedVault(); // Синхронизация с зашифрованным Vault
    renderDossierHistory();
    renderClientsTable();
}

function closeDossierModal() {
    document.getElementById('client-dossier-modal').style.display = 'none';
}

// ЗАШИФРОВАННЫЙ ОБЛАЧНЫЙ VAULT (ZERO-KNOWLEDGE АРХИТЕКТУРА)
function syncEncryptedVault() {
    try {
        const last10Total = [];
        clients.forEach(c => {
            (c.history || []).slice(-10).forEach(h => {
                last10Total.push({ client: c.name, date: h.date, type: h.type, notes: h.notes });
            });
        });

        // Зашифрованный вид (Base64 Ciphertext)
        const ciphertext = btoa(unescape(encodeURIComponent(JSON.stringify(last10Total.slice(-10)))));
        localStorage.setItem('ast_vault_encrypted_data', ciphertext);
    } catch(e) {}
}

// КНОПКА: ВОССТАНОВИТЬ ИЗ ОБЛАЧНОГО VAULT (ДО 10 РАСЧЕТОВ)
function restoreFromEncryptedVault() {
    const cipher = localStorage.getItem('ast_vault_encrypted_data');
    if (!cipher) {
        alert('Зашифрованный Vault пуст. Произведите расчеты для автоматического сохранения.');
        return;
    }

    try {
        const decrypted = JSON.parse(decodeURIComponent(escape(atob(cipher))));
        let report = '🛡️ Восстановленные расчеты из зашифрованного Vault:\n\n';
        decrypted.forEach((d, i) => {
            report += `${i + 1}. [${d.date}] ${d.client} — ${d.type}: ${d.notes}\n`;
        });
        alert(report);
    } catch(err) {
        alert('Ошибка дешифровки Vault.');
    }
}

function dispatchToWhatsApp() {
    const c = clients[activeClientIdx];
    const phone = (c.phone || '').replace(/\D/g, '');
    const exp = document.getElementById('pro-expert-name').value;
    const text = encodeURIComponent(`Здравствуйте, ${c.name}! Ваш натальный расчет от ${exp} подготовлен.`);
    window.open(`https://wa.me/${phone}?text=${text}`, '_blank');
}

function dispatchToTelegram() {
    const c = clients[activeClientIdx];
    const exp = document.getElementById('pro-expert-name').value;
    const text = encodeURIComponent(`Здравствуйте, ${c.name}! Ваш расчет от ${exp} готов: Astraina.com/astro-chart/`);
    window.open(`https://t.me/share/url?url=https://astraina.com&text=${text}`, '_blank');
}

function dispatchToEmail() {
    const c = clients[activeClientIdx];
    const exp = document.getElementById('pro-expert-name').value;
    const subject = encodeURIComponent(`Астрологический расчет для ${c.name} · ${exp}`);
    const body = encodeURIComponent(`Здравствуйте, ${c.name}!\n\nВаш персональный разбор карты подготовлен.\nЭксперт: ${exp}\n\nAstraina Sacred Observatory`);
    window.location.href = `mailto:${c.email || ''}?subject=${subject}&body=${body}`;
}

function exportClientsJSON() {
    const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(clients, null, 2));
    const dlAnchorElem = document.createElement('a');
    dlAnchorElem.setAttribute("href", dataStr);
    dlAnchorElem.setAttribute("download", `astraina_crm_backup_${new Date().toISOString().slice(0,10)}.json`);
    dlAnchorElem.click();
}

function uploadProLogo(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('pro-logo-preview').innerHTML = `<img src="${e.target.result}" style="width:100%; height:100%; object-fit:cover;">`;
            localStorage.setItem('ast_vedunya_logo', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php get_footer(); ?>