const cacheName = 'v1';
const cacheAssets = [
  '../../',
  '../../index.html',
  '../../assets/css/style.css',
  '../../assets/js/app.js',
  '../../favicon.png',
  '../../home.html'
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