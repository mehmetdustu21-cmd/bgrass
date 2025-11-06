# Shopier Sipariş Bilgisi Toplama Aracı

Bu araç, Shopier satıcı panelinizden sipariş bilgilerini otomatik olarak toplar ve bir txt dosyasına kaydeder.

## 🚀 Kurulum

### 1. Python Bağımlılıklarını Yükleyin

```bash
pip install -r requirements.txt
```

### 2. Chrome WebDriver Kurulumu

Selenium için Chrome WebDriver gereklidir:

**Linux:**
```bash
# Chrome tarayıcı yoksa:
wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
sudo dpkg -i google-chrome-stable_current_amd64.deb

# ChromeDriver otomatik yönetimi için:
pip install webdriver-manager
```

**macOS:**
```bash
brew install chromedriver
```

**Windows:**
- [ChromeDriver İndirme Sayfası](https://chromedriver.chromium.org/downloads)

## 📖 Kullanım

```bash
python3 shopier_scraper.py
```

### İşlem Adımları:

1. **Script başlatılır** ve tarayıcı açılır
2. **Shopier giriş sayfası** açılır
3. **Manuel giriş yapın** - Kullanıcı adı ve şifrenizle giriş yapın
4. **Enter'a basın** - Terminal'de Enter tuşuna basarak devam edin
5. **Otomatik işlem** - Script tüm sayfaları tarar ve bilgileri toplar
6. **Sonuç** - Masaüstünüze `shopier_siparisler_YYYYMMDD_HHMMSS.txt` dosyası kaydedilir

## 📋 Toplanan Bilgiler

Her sipariş için aşağıdaki bilgiler toplanır:
- 👤 Ad Soyad
- 📞 Telefon Numarası
- 📧 E-posta Adresi

## ⚙️ Özellikler

- ✅ Otomatik "Gelimiş Görünümü" kontrolü ve aktivasyonu
- ✅ Çoklu sayfa desteği (pagination)
- ✅ Her sayfada 25 sipariş işleme
- ✅ Terminal'de canlı ilerleme takibi
- ✅ Otomatik dosya kaydetme (Desktop)
- ✅ UTF-8 Türkçe karakter desteği

## 🛠️ Sorun Giderme

### Chrome Bulunamadı Hatası
Script otomatik olarak Firefox'a geçer. Alternatif olarak:
```bash
# Ubuntu/Debian
sudo apt-get install chromium-browser

# Fedora
sudo dnf install chromium
```

### Selenium Hatası
```bash
pip install --upgrade selenium
```

### WebDriver Hatası
```bash
pip install webdriver-manager
```

## 📝 Notlar

- Script maksimum 100 sayfa işleyecek şekilde sınırlandırılmıştır (güvenlik)
- Bu limiti değiştirmek için `shopier_scraper.py` dosyasındaki `if self.current_page > 100:` satırını düzenleyin
- Headless mode (tarayıcısız) çalıştırmak için script içindeki `# options.add_argument('--headless')` satırının başındaki # işaretini kaldırın

## 🔒 Güvenlik

- Giriş bilgileriniz script tarafından saklanmaz
- Manuel giriş yapmanız istenir
- Verileriniz sadece yerel masaüstünüze kaydedilir

## 📄 Lisans

Bu araç eğitim ve kişisel kullanım amaçlıdır.