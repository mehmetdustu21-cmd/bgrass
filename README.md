# Shopify Cargo Tracker

Shopify için animasyonlu kargo takip komponenti.

## Kurulum

### 1. Dosyaları Yükleme

- `assets/cargo-tracker.css` dosyasını Shopify temanızın `assets` klasörüne yükleyin
- `snippets/cargo-tracker.liquid` dosyasını Shopify temanızın `snippets` klasörüne yükleyin

### 2. Kullanım

Herhangi bir Liquid dosyasında snippet'i dahil edin:

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
- ✅ Kolay özelleştirme

## Yapılan Düzeltmeler

### Animasyon Sorunları Çözüldü

1. **Daha belirgin hareket**: Dash boyutu 12px → 15px
2. **Daha hızlı animasyon**: 1.5s → 0.8s
3. **Seamless döngü**: translateX değeri dash + gap'e eşit (-25px)
4. **Daha fazla dash**: 12 → 18 span elementi
5. **Sola hareket**: translateX pozitif yerine negatif (sağa doğru görsel efekt)

### Teknik Detaylar

- Dash genişliği: 15px
- Dash arası boşluk: 10px
- Animasyon süresi: 0.8s
- Hareket mesafesi: -25px (15px + 10px)

Bu sayede animasyon kesintisiz ve akıcı çalışır.
