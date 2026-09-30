const CACHE_NAME = 'shipequipar-v1';

const STATIC_ASSETS = [
    '/manifest.json',
    '/icons/icon-192.png',
    '/icons/icon-512.png'
];

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(STATIC_ASSETS);
            })
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

    // Jangan cache POST / form submission
    if (request.method !== 'GET') {
        return;
    }

    const url = new URL(request.url);

    // Jangan cache API / Laravel dynamic request
    if (
        url.pathname.startsWith('/api/') ||
        url.pathname.startsWith('/login') ||
        url.pathname.startsWith('/logout') ||
        url.pathname.startsWith('/register') ||
        url.pathname.startsWith('/admin')
    ) {
        return;
    }

    // Cache static assets
    if (
        url.pathname.startsWith('/build/') ||
        url.pathname.startsWith('/css/') ||
        url.pathname.startsWith('/js/') ||
        url.pathname.startsWith('/icons/')
    ) {
        event.respondWith(
            caches.match(request).then(cachedResponse => {

                const networkFetch = fetch(request)
                    .then(response => {

                        if (
                            response &&
                            response.status === 200 &&
                            response.type === 'basic'
                        ) {
                            const responseClone = response.clone();

                            caches.open(CACHE_NAME)
                                .then(cache => {
                                    cache.put(request, responseClone);
                                });
                        }

                        return response;
                    });

                return cachedResponse || networkFetch;
            })
        );

        return;
    }

    // Untuk halaman Laravel:
    // Network first supaya data user sentiasa terbaru
    event.respondWith(
        fetch(request)
            .then(response => {

                if (
                    response &&
                    response.status === 200 &&
                    response.type === 'basic'
                ) {
                    const responseClone = response.clone();

                    caches.open(CACHE_NAME)
                        .then(cache => {
                            cache.put(request, responseClone);
                        });
                }

                return response;
            })
            .catch(() => {
                return caches.match(request);
            })
    );
});