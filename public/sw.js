const CACHE_NAME = 'shipequipar-v2';

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

    // Hanya handle request dari domain sendiri
    if (url.origin !== self.location.origin) {
        return;
    }

    // Jangan cache API / Laravel dynamic routes
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
    // STATIC ASSETS
    // =====================================================

    if (
        url.pathname.startsWith('/build/') ||
        url.pathname.startsWith('/css/') ||
        url.pathname.startsWith('/js/') ||
        url.pathname.startsWith('/icons/')
    ) {
        event.respondWith(
            caches.match(request)
                .then(cachedResponse => {

                    if (cachedResponse) {
                        return cachedResponse;
                    }

                    return fetch(request)
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
                            return new Response(
                                'Offline - resource tidak tersedia.',
                                {
                                    status: 503,
                                    statusText: 'Service Unavailable',
                                    headers: {
                                        'Content-Type': 'text/plain; charset=utf-8'
                                    }
                                }
                            );
                        });
                })
        );

        return;
    }

    // =====================================================
    // LARAVEL PAGES
    // =====================================================

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

                return caches.match(request)
                    .then(cachedResponse => {

                        if (cachedResponse) {
                            return cachedResponse;
                        }

                        return new Response(
                            'Offline - halaman tidak tersedia.',
                            {
                                status: 503,
                                statusText: 'Service Unavailable',
                                headers: {
                                    'Content-Type': 'text/plain; charset=utf-8'
                                }
                            }
                        );
                    });
            })
    );
});