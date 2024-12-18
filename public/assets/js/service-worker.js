const cacheName = 'v1';
const cacheAssets = [
  'http://localhost/fgi/public/',
  'http://localhost/fgi/public/index.html',
  'http://localhost/fgi/public/assets/css/style.css',
  'http://localhost/fgi/public/assets/js/app.js',
  'http://localhost/fgi/public/favicon.png',
  'http://localhost/fgi/public/home.html'
];
self.addEventListener('install', (e) => {
  e.waitUntil(
    caches.open(cacheName)
      .then(cache => {
        return cache.addAll(cacheAssets);
      })
  );
});
self.addEventListener('activate', (e) => {
  e.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== cacheName) {
            return caches.delete(cache);
          }
        })
      );
    })
  );
});
self.addEventListener('fetch', (e) => {
  e.respondWith(
    fetch(e.request).catch(() => caches.match(e.request))
  );
});