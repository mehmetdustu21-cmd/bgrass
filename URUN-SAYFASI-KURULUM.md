# Ürün Sayfasında Cargo Tracker Kullanımı

## Sorun Neydi?

❌ `cargo-tracker.liquid` order tracking için yapılmış → `status` parametresine göre animasyon açılıp kapanıyor

❌ Ürün sayfasında `status` parametresi yok → Default olarak `preparing` oluyor → **Animasyon çalışmıyor!**

## ✅ Çözüm

Ürün sayfası için özel bir snippet hazırladım: **`cargo-tracker-product.liquid`**

Bu snippet'te **her zaman TÜM animasyonlar aktif** (test.html'deki Test 3 gibi)

---

## 📦 Kurulum Adımları

### 1. Shopify Admin'e Girin
```
Online Store → Themes → Actions → Edit code
```

### 2. Dosyaları Yükleyin

**A. CSS dosyası** (zaten yüklediyseniz atlayın):
- Sol menüden `Assets` klasörüne tıklayın
- `Add a new asset` → Upload files
- `assets/cargo-tracker.css` dosyasını seçin

**B. Ürün sayfası snippet'i** (YENİ):
- Sol menüden `Snippets` klasörüne tıklayın
- `Add a new snippet` → Snippet name: `cargo-tracker-product`
- `snippets/cargo-tracker-product.liquid` dosyasının içeriğini kopyala yapıştır

### 3. Ürün Sayfasına Ekleyin

**A. Product template dosyasını bulun:**
```
Sections → main-product.liquid
VEYA
Templates → product.liquid
```

**B. Snippet'i istediğiniz yere ekleyin:**

Örneğin, ürün başlığından sonra:

```liquid
<div class="product__title">
  <h1>{{ product.title }}</h1>
</div>

{%- render 'cargo-tracker-product' -%}

<div class="product__price">
  {{ product.price | money }}
</div>
```

VEYA ürün açıklamasından önce:

```liquid
<div class="product__description">
  {%- render 'cargo-tracker-product' -%}

  {{ product.description }}
</div>
```

**C. Kaydet ve Test Et:**
1. Sağ üstten `Save` butonuna tıklayın
2. Bir ürün sayfasını açın
3. **Animasyonlu cargo tracker'ı göreceksiniz!**

---

## 🎨 Özelleştirme

### Tarihleri Değiştirmek

`cargo-tracker-product.liquid` dosyasında:

```liquid
{% assign shipping_start = today | plus: 172800 | date: '%d %B' %}   {# 2 gün sonra #}
{% assign shipping_end = today | plus: 432000 | date: '%d %B' %}     {# 5 gün sonra #}
{% assign delivery_start = today | plus: 432000 | date: '%d %B' %}   {# 5 gün sonra #}
{% assign delivery_end = today | plus: 604800 | date: '%d %B' %}     {# 7 gün sonra #}
```

Saniye cinsinden değerler:
- 86400 = 1 gün
- 172800 = 2 gün
- 259200 = 3 gün
- 432000 = 5 gün
- 604800 = 7 gün

### Metinleri Değiştirmek

```liquid
<div class="cargo-text">Sipariş verildi</div>        → İstediğiniz metni yazın
<div class="cargo-text">Gönderildi</div>             → İstediğiniz metni yazın
<div class="cargo-text">Teslim edildi</div>          → İstediğiniz metni yazın
```

### Animasyon Hızını Değiştirmek

`cargo-tracker.css` dosyasında:

```css
.road-wrap.moving {
  animation: dashMove 0.8s linear infinite;  /* 0.8s → daha büyük yapın (yavaş), daha küçük (hızlı) */
}
```

---

## 🐛 Hala Çalışmıyorsa?

### 1. CSS Yüklenmiş mi Kontrol Edin

Ürün sayfasında **sağ tıklayın → View Page Source** → Ctrl+F ile arayın:

```
cargo-tracker.css
```

Bulamadıysanız: `cargo-tracker-product.liquid` dosyasının EN BAŞINDA şu satır olmalı:

```liquid
{{ 'cargo-tracker.css' | asset_url | stylesheet_tag }}
```

### 2. Class'lar Doğru mu?

Ürün sayfasında **F12** → Elements → Ctrl+F ile arayın:

```html
<div class="road-wrap moving">
```

`moving` class'ı varsa CSS doğru, yoksa snippet dosyası düzgün yüklenmemiş.

### 3. JavaScript Versiyonunu Kullanın

Eğer CSS animasyonu hala çalışmıyorsa:

**A.** `assets/cargo-tracker.js` dosyasını yükleyin

**B.** `cargo-tracker-product.liquid` dosyasının başına ekleyin:

```liquid
{{ 'cargo-tracker.css' | asset_url | stylesheet_tag }}
{{ 'cargo-tracker.js' | asset_url | script_tag }}
```

### 4. Cache Temizleyin

```
1. Ctrl + Shift + R (Hard refresh)
2. Shopify Admin → Online Store → Themes → Actions → Preview
3. Incognito/Private window'da açın
```

---

## 📋 Özet

| Dosya | Konum | Ne İşe Yarar? |
|-------|-------|---------------|
| `cargo-tracker.css` | Assets | Animasyon stilleri (zorunlu) |
| `cargo-tracker-product.liquid` | Snippets | Ürün sayfası versiyonu (her zaman animasyonlu) |
| `cargo-tracker.liquid` | Snippets | Order tracking versiyonu (status parametreli) |
| `cargo-tracker.js` | Assets | JavaScript alternatifi (opsiyonel) |

**Ürün sayfasında kullanın:**
```liquid
{%- render 'cargo-tracker-product' -%}
```

**Order tracking sayfasında kullanın:**
```liquid
{%- render 'cargo-tracker', status: 'shipping' -%}
```

---

## 🎯 Hızlı Test

1. `test.html` dosyasını açın → Animasyon çalışıyor mu?
   - ✅ EVET → CSS doğru, Shopify'da yükleme sorunu
   - ❌ HAYIR → JavaScript versiyonunu kullan

2. Shopify ürün sayfasında F12 → Console'a yapıştır:
```javascript
const moving = document.querySelector('.road-wrap.moving');
console.log('Element var mı?:', moving);
console.log('Animation:', window.getComputedStyle(moving).animation);
```

3. Sonucu buraya yapıştır, birlikte analiz edelim!
