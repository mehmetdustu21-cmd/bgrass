# Shopify Cargo Tracker

Shopify için animasyonlu kargo takip komponenti.

## 🚀 Hızlı Başlangıç

### Ürün Sayfasında Kullanım (Önerilen)

**Detaylı kurulum için:** [URUN-SAYFASI-KURULUM.md](./URUN-SAYFASI-KURULUM.md) dosyasını okuyun.

1. `assets/cargo-tracker.css` → Assets klasörüne yükleyin
2. `snippets/cargo-tracker-product.liquid` → Snippets klasörüne yükleyin
3. Ürün sayfanıza ekleyin:

```liquid
{%- render 'cargo-tracker-product' -%}
```

**Bu versiyonda her zaman TÜM animasyonlar aktif!** (test.html Test 3 gibi)

---

## Kurulum

### 1. Dosyaları Yükleme

**Shopify Admin'e gidin:**
1. Online Store → Themes → Actions → Edit code
2. `assets/cargo-tracker.css` dosyasını Assets klasörüne yükleyin
3. Kullanım senaryonuza göre snippet seçin:
   - **Ürün sayfası için:** `snippets/cargo-tracker-product.liquid`
   - **Order tracking için:** `snippets/cargo-tracker.liquid`

### 2. Kullanım

#### A. Ürün Sayfasında (Her zaman animasyonlu)

```liquid
{%- render 'cargo-tracker-product' -%}
```

#### B. Order Tracking Sayfasında (Status parametreli)

```liquid
{% render 'cargo-tracker', status: 'shipping' %}
```

### Durum Parametreleri

- `preparing` - Sipariş verildi (ilk durum)
- `shipping` - Gönderildi (animasyon aktif)
- `delivered` - Teslim edildi (tüm adımlar tamamlandı)

### Örnekler

```liquid
<!-- Hazırlanıyor -->
{% render 'cargo-tracker', status: 'preparing' %}

<!-- Kargoya verildi (animasyon aktif) -->
{% render 'cargo-tracker', status: 'shipping' %}

<!-- Teslim edildi -->
{% render 'cargo-tracker', status: 'delivered' %}
```

## Özellikler

- ✅ Sonsuz döngü animasyonu
- ✅ Responsive tasarım
- ✅ Otomatik tarih hesaplama
- ✅ GPU acceleration
- ✅ Cross-browser uyumluluğu
- ✅ JavaScript alternatifi mevcut

## 🔧 Sorun Giderme

### Animasyon Çalışmıyorsa

#### 1. Test HTML ile Lokal Test
`test.html` dosyasını tarayıcınızda açın:
```bash
# Dosyayı çift tıklayarak açın veya:
open test.html  # Mac
start test.html # Windows
```

- **Çizgiler hareket ediyorsa:** CSS doğru çalışıyor, Shopify'da yükleme sorunu var
- **Çizgiler hareket etmiyorsa:** Tarayıcı uyumluluk problemi

#### 2. Shopify'da Kontrol Listesi

**A. CSS Yüklenmiş mi kontrol edin:**
```liquid
{{ 'cargo-tracker.css' | asset_url | stylesheet_tag }}
```
Bu satır cargo-tracker.liquid dosyasının EN BAŞINDA olmalı.

**B. Browser Console'u Açın (F12):**
- Console sekmesine gidin
- CSS yükleme hatası var mı kontrol edin
- Network sekmesinde cargo-tracker.css dosyası yükleniyor mu bakın

**C. Class'lar Doğru Uygulanmış mı:**
Sayfada sağ tıklayıp "Inspect Element" yapın:
```html
<!-- moving class'ı olmalı -->
<div class="road-wrap moving">
```

#### 3. JavaScript Versiyonunu Kullanın

CSS animasyonu çalışmıyorsa JavaScript versiyonunu aktif edin:

**Adım 1:** `assets/cargo-tracker.js` dosyasını Assets klasörüne yükleyin

**Adım 2:** `cargo-tracker.liquid` dosyasında comment'i kaldırın:

```liquid
{{ 'cargo-tracker.css' | asset_url | stylesheet_tag }}

{%comment%}
  JavaScript animasyon versiyonu - CSS çalışmazsa aktif edin
  {{ 'cargo-tracker.js' | asset_url | script_tag }}
{% endcomment %}
```

Şu hale getirin:
```liquid
{{ 'cargo-tracker.css' | asset_url | stylesheet_tag }}
{{ 'cargo-tracker.js' | asset_url | script_tag }}
```

#### 4. Cache Temizleme

Shopify cache'i temizleyin:
1. Ctrl+Shift+R (Hard Refresh)
2. Shopify Admin'de Theme → Customize → Save
3. Incognito/Private window'da test edin

#### 5. Tema Çakışması Kontrolü

Bazı temalar CSS'i override edebilir. Console'da şunu çalıştırın:

```javascript
const moving = document.querySelector('.road-wrap.moving');
console.log(window.getComputedStyle(moving).animation);
```

- `none` döndürüyorsa: Başka bir CSS animasyonu eziyor
- `dashMove` gösteriyorsa: Animasyon çalışıyor

## Yapılan İyileştirmeler

### v2.0 - Shopify Optimization

1. **GPU Acceleration eklendi:**
   - `will-change: transform`
   - `backface-visibility: hidden`
   - `translateZ(0)` 3D transform

2. **WebKit prefix'leri eklendi:**
   - `-webkit-animation`
   - `-webkit-transform`
   - `-webkit-backface-visibility`

3. **JavaScript alternatifi:**
   - `requestAnimationFrame` kullanımı
   - Shopify theme editor desteği
   - Daha yumuşak animasyon

### v1.0 - İlk Versiyon

1. **Daha belirgin hareket**: Dash boyutu 12px → 15px
2. **Daha hızlı animasyon**: 1.5s → 0.8s
3. **Seamless döngü**: translateX değeri dash + gap'e eşit (-25px)
4. **Daha fazla dash**: 12 → 18 span elementi

## Teknik Detaylar

### CSS Versiyonu
- Dash genişliği: 15px
- Dash arası boşluk: 10px
- Animasyon süresi: 0.8s
- Hareket mesafesi: -25px (15px + 10px)
- GPU acceleration: Aktif
- Browser support: Chrome, Firefox, Safari, Edge

### JavaScript Versiyonu
- FPS: ~60 (requestAnimationFrame)
- Hareket hızı: 0.5px/frame
- Reset mesafesi: -25px
- Shopify theme editor uyumlu

## Dosya Yapısı

```
assets/
  ├── cargo-tracker.css            # Ana CSS dosyası (zorunlu)
  └── cargo-tracker.js             # JavaScript alternatifi (opsiyonel)

snippets/
  ├── cargo-tracker-product.liquid # Ürün sayfası versiyonu (her zaman animasyonlu) ⭐
  └── cargo-tracker.liquid         # Order tracking versiyonu (status parametreli)

test.html                          # Lokal test dosyası
URUN-SAYFASI-KURULUM.md           # Ürün sayfası kurulum kılavuzu
```

## Lisans

MIT License - İstediğiniz gibi kullanabilirsiniz.
