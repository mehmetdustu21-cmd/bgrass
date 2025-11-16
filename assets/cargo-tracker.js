/**
 * Cargo Tracker Animation - JavaScript Version
 * Bu versiyonu CSS animasyonu çalışmazsa kullanın
 */

(function() {
  'use strict';

  // Tüm moving class'lı road-wrap elementlerini bul
  function initCargoAnimation() {
    const movingRoads = document.querySelectorAll('.road-wrap.moving');

    movingRoads.forEach(function(road) {
      let position = 0;
      const speed = 0.5; // Pixel per frame
      const resetAt = -25; // Bir dash + gap kadar

      function animate() {
        // Pozisyonu güncelle
        position -= speed;

        // Reset pozisyona geldiğinde başa dön
        if (position <= resetAt) {
          position = 0;
        }

        // Transform uygula
        road.style.transform = 'translateX(' + position + 'px)';
        road.style.webkitTransform = 'translateX(' + position + 'px)';

        // Bir sonraki frame için devam et
        requestAnimationFrame(animate);
      }

      // Animasyonu başlat
      animate();
    });
  }

  // DOM yüklendikten sonra başlat
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCargoAnimation);
  } else {
    // DOM zaten hazırsa direkt başlat
    initCargoAnimation();
  }

  // Shopify theme editor için - dinamik olarak eklenen elementler için
  if (typeof Shopify !== 'undefined' && Shopify.designMode) {
    document.addEventListener('shopify:section:load', initCargoAnimation);
  }
})();
