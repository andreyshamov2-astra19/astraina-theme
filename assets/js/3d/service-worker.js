/**
 * ASTRAINA.COM — PWA ULTRA SERVICE WORKER
 * Offline Cache-First Strategy + Apple Web Push Support (iOS 16.4+)
 */
const CACHE_NAME = 'astraina-v9.4-cache';
const PRECACHE_ASSETS = [
    '/',
    '/manifest.json',
    '/wp-content/themes/astraina-theme/style.css',
    '/wp-content/themes/astraina-theme/assets/js/natal-wheel.js',
    '/wp-content/themes/astraina-theme/assets/js/synastry-radar.js',
    '/wp-content/themes/astraina-theme/assets/js/direct-checkout.js'
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(PRECACHE_ASSETS).catch((err) => {
                console.warn('Pre-cache non-fatal warning:', err);
            });
        }).then(() => self.skipWaiting())
    );
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((keys) => {
            return Promise.all(
                keys.map((key) => {
                    if (key !== CACHE_NAME) {
                        return caches.delete(key);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});

self.addEventListener('fetch', (event) => {
    if (event.request.method !== 'GET' || event.request.url.includes('/wp-json/')) {
        return;
    }

    event.respondWith(
        caches.match(event.request).then((cachedResponse) => {
            if (cachedResponse) {
                fetch(event.request).then((networkResponse) => {
                    if (networkResponse && networkResponse.status === 200) {
                        caches.open(CACHE_NAME).then((cache) => cache.put(event.request, networkResponse));
                    }
                }).catch(() => {});
                return cachedResponse;
            }
            return fetch(event.request).then((networkResponse) => {
                return networkResponse;
            }).catch(() => {});
        })
    );
});

self.addEventListener('push', (event) => {
    let payload = {
        title: 'ASTRAINA — Небесный Импульс',
        body: 'Начались новые лунные сутки. Откройте фолиант для синхронизации.',
        icon: '/wp-content/themes/astraina-theme/assets/icons/icon-192.png',
        badge: '/wp-content/themes/astraina-theme/assets/icons/icon-192.png',
        data: { url: '/astro-lunar/' }
    };

    if (event.data) {
        try {
            payload = Object.assign(payload, event.data.json());
        } catch (e) {
            payload.body = event.data.text();
        }
    }

    event.waitUntil(
        self.registration.showNotification(payload.title, {
            body: payload.body,
            icon: payload.icon,
            badge: payload.badge,
            data: payload.data
        })
    );
});

self.addEventListener('notificationclick', (event) => {
    event.notification.close();
    const targetUrl = event.notification.data ? event.notification.data.url : '/';
    event.waitUntil(
        clients.matchAll({ type: 'window' }).then((clientList) => {
            for (const client of clientList) {
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