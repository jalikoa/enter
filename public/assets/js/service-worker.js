const cacheName = 'v1';
const cacheAssets = [
  'https://1228-197-136-187-86.ngrok-free.app/fgi/public/',
  'https://1228-197-136-187-86.ngrok-free.app/fgi/public/index.html',
  'https://1228-197-136-187-86.ngrok-free.app/fgi/public/assets/css/style.css',
  'https://1228-197-136-187-86.ngrok-free.app/fgi/public/assets/js/app.js',
  'https://1228-197-136-187-86.ngrok-free.app/fgi/public/favicon.png',
  'https://1228-197-136-187-86.ngrok-free.app/fgi/public/home.html'
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