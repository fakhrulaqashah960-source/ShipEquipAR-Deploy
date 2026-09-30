const CACHE_NAME = 'shipequipar-v3';

const STATIC_ASSETS = [
    '/manifest.json',
    '/icons/icon-192.png',
    '/icons/icon-512.png'
];

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => cache.addAll(STATIC_ASSETS))
            .then(() => self.skipWaiting())
    );
});

self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => cacheName !== CACHE_NAME)
                    .map(cacheName => caches.delete(cacheName))
            );
        })
        .then(() => self.clients.claim())
    );
});

self.addEventListener('fetch', event => {

    const request = event.request;

    // Jangan intercept POST / form submission
    if (request.method !== 'GET') {
        return;
    }

    const url = new URL(request.url);

    // Jangan intercept request dari domain lain
    if (url.origin !== self.location.origin) {
        return;
    }

    // Jangan intercept API / Laravel routes
    if (
        url.pathname.startsWith('/api/') ||
        url.pathname.startsWith('/login') ||
        url.pathname.startsWith('/logout') ||
        url.pathname.startsWith('/register') ||
        url.pathname.startsWith('/admin')
    ) {
        return;
    }

    // =====================================================
    // CACHE HANYA MANIFEST + ICON
    // =====================================================

    if (
        url.pathname === '/manifest.json' ||
        url.pathname === '/icons/icon-192.png' ||
        url.pathname === '/icons/icon-512.png'
    ) {
        event.respondWith(
            caches.match(request).then(cachedResponse => {
                return cachedResponse || fetch(request);
            })
        );

        return;
    }

    // =====================================================
    // SEMUA REQUEST LAIN TERUS KE SERVER
    // =====================================================

    // Jangan event.respondWith()
    // Browser akan handle request secara normal.
});