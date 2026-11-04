/**
 * ASTRAINA SERVICE WORKER ULTRA (PRD v9.0)
 * Высокопроизводительный санкционно-независимый PWA-движок.
 * Кэширование, сетевая отказоустойчивость, Web Push Notifications (iOS 16.4+ / Android).
 *
 * @package AstrainaCore
 * @version 9.0.2
 */

const CACHE_NAME = 'astraina-core-v9.0.2';
const OFFLINE_FALLBACK_URL = '/';

const PRECACHE_ASSETS = [
    '/',
    '/wp-content/themes/astraina-theme/style.css',
    '/wp-content/themes/astraina-theme/assets/images/favicon.ico',
    '/manifest.json'
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return Promise.allSettled(
                PRECACHE_ASSETS.map((asset) => cache.add(asset).catch(() => {}))
            );
        }).then(() => self.skipWaiting())
    );
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (cacheName !== CACHE_NAME) {
                        return caches.delete(cacheName);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});

self.addEventListener('fetch', (event) => {
    const request = event.request;

    if (request.method !== 'GET') {
        return;
    }

    if (!request.url.startsWith('http://') && !request.url.startsWith('https://')) {
        return;
    }

    const url = new URL(request.url);

    if (
        url.pathname.includes('/wp-admin') ||
        url.pathname.includes('/wp-login.php') ||
        url.search.includes('preview=true')
    ) {
        return;
    }

    if (request.mode === 'navigate') {
        event.respondWith(
            fetch(request)
                .then((networkResponse) => {
                    if (networkResponse && networkResponse.status === 200) {
                        const copy = networkResponse.clone();
                        caches.open(CACHE_NAME).then((cache) => cache.put(request, copy)).catch(() => {});
                    }
                    return networkResponse;
                })
                .catch(async () => {
                    const cachedPage = await caches.match(request);
                    if (cachedPage) return cachedPage;

                    const fallbackShell = await caches.match(OFFLINE_FALLBACK_URL);
                    if (fallbackShell) return fallbackShell;

                    return new Response(
                        '<!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><title>ASTRAINA</title><style>body{background:#020408;color:#FEF3C7;font-family:sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;text-align:center;}</style></head><body><div><h2 style="color:#F59E0B;">ASTRAINA</h2><p>Соединение со звездным сервером восстанавливается...</p></div></body></html>',
                        {
                            status: 200,
                            headers: { 'Content-Type': 'text/html; charset=utf-8' }
                        }
                    );
                })
        );
        return;
    }

    event.respondWith(
        caches.match(request).then((cachedResponse) => {
            if (cachedResponse) {
                fetch(request).then((networkResponse) => {
                    if (networkResponse && networkResponse.status === 200) {
                        const copy = networkResponse.clone();
                        caches.open(CACHE_NAME).then((cache) => cache.put(request, copy)).catch(() => {});
                    }
                }).catch(() => {});
                return cachedResponse;
            }

            return fetch(request).then((networkResponse) => {
                if (networkResponse && (networkResponse.status === 200 || networkResponse.type === 'opaque')) {
                    const copy = networkResponse.clone();
                    caches.open(CACHE_NAME).then((cache) => cache.put(request, copy)).catch(() => {});
                }
                return networkResponse;
            }).catch(() => {
                return new Response('', { status: 404, statusText: 'Not Found Offline' });
            });
        }).catch(() => {
            return new Response('', { status: 500, statusText: 'SW Storage Error' });
        })
    );
});

self.addEventListener('push', (event) => {
    let payload = {
        title: 'ASTRAINA · Звёздный Оракул',
        body: 'Астрономическое событие зафиксировано на куполе.',
        icon: '/wp-content/themes/astraina-theme/assets/images/icon-192.png',
        badge: '/wp-content/themes/astraina-theme/assets/images/badge.png',
        url: '/'
    };

    if (event.data) {
        try {
            payload = Object.assign(payload, event.data.json());
        } catch (e) {
            payload.body = event.data.text();
        }
    }

    const options = {
        body: payload.body,
        icon: payload.icon,
        badge: payload.badge,
        data: { url: payload.url },
        vibrate: [100, 50, 100],
        actions: [{ action: 'open', title: 'Открыть Фолиант' }]
    };

    event.waitUntil(self.registration.showNotification(payload.title, options));
});

self.addEventListener('notificationclick', (event) => {
    event.notification.close();
    const targetUrl = (event.notification.data && event.notification.data.url) ? event.notification.data.url : '/';

    event.waitUntil(
        clients.matchAll({ type: 'window', includeUncontrolled: true }).then((clientList) => {
            for (let i = 0; i < clientList.length; i++) {
                const client = clientList[i];
                if (client.url.includes(targetUrl) && 'focus' in client) {
                    return client.focus();
                }
            }
            if (clients.openWindow) {
                return clients.openWindow(targetUrl);
            }
        })
    );
});