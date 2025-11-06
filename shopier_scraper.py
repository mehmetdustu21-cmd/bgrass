#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
Shopier Sipariş Bilgisi Toplama Scripti - Final Versiyon
Bu script Shopier satıcı panelinden sipariş bilgilerini toplar.
"""

import sys
import subprocess
import os

# Gerekli kütüphaneleri kontrol et ve kur
def check_and_install_packages():
    """Gerekli Python paketlerini kontrol et ve yoksa kur"""
    required_packages = {
        'selenium': 'selenium',
        'pandas': 'pandas',
        'openpyxl': 'openpyxl',
        'webdriver_manager': 'webdriver-manager'
    }

    missing_packages = []

    for package, pip_name in required_packages.items():
        try:
            __import__(package)
        except ImportError:
            missing_packages.append(pip_name)

    if missing_packages:
        print("⚠️  Eksik paketler bulundu:", ', '.join(missing_packages))
        print("📦 Paketler otomatik olarak kuruluyor...\n")

        for package in missing_packages:
            try:
                subprocess.check_call([sys.executable, "-m", "pip", "install", package, "-q"])
                print(f"✅ {package} kuruldu")
            except subprocess.CalledProcessError:
                print(f"❌ {package} kurulamadı! Manuel olarak kurun: pip install {package}")
                sys.exit(1)

        print("\n✅ Tüm paketler hazır!\n")

# Paketleri kontrol et
check_and_install_packages()

# Şimdi import'ları yap
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
import pandas as pd
import time
import re

print("=" * 70)
print("🚀 SHOPIER MÜŞTERİ BİLGİLERİ ÇEKME ARACI - FİNAL VERSİYON")
print("=" * 70)
print()

options = webdriver.ChromeOptions()
options.add_argument('--start-maximized')
options.add_argument('--disable-blink-features=AutomationControlled')

print("⏳ Chrome başlatılıyor...")
driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()), options=options)

driver.get('https://www.shopier.com/m/orders.php')

print("✅ Chrome açıldı")
print()
print("=" * 70)
print("📋 TALİMATLAR:")
print("=" * 70)
print("1. Shopier'e giriş yapın")
print("2. CAPTCHA varsa manuel olarak çözün")
print("3. Siparişler sayfasının tamamen yüklenmesini bekleyin")
print("4. Hazır olduğunuzda buraya geri gelin ve ENTER'a basın")
print("=" * 70)
print()

input("✅ Hazır olduğunuzda ENTER'a basın...\n")

musteriler = []
sayfa_no = 1
toplam_siparis = 0
basarisiz = 0

try:
    while True:
        print(f"\n{'='*70}")
        print(f"📄 SAYFA {sayfa_no} İŞLENİYOR")
        print(f"{'='*70}")

        time.sleep(3)

        try:
            wait = WebDriverWait(driver, 10)
            wait.until(EC.presence_of_element_located((By.TAG_NAME, "tbody")))

            # Tablo satırlarını bul - DOĞRU SELECTOR!
            siparis_satirlari = driver.find_elements(By.CSS_SELECTOR, 'tr[role="row"]')

            # İlk satır başlık olabilir, onu çıkar
            if len(siparis_satirlari) > 0:
                # İlk satırın sipariş numarası var mı kontrol et
                try:
                    ilk_hucre = siparis_satirlari[0].find_elements(By.TAG_NAME, 'td')
                    if ilk_hucre and 'sipariş' in ilk_hucre[0].text.lower():
                        siparis_satirlari = siparis_satirlari[1:]  # Başlığı atla
                except:
                    pass

            siparis_sayisi = len(siparis_satirlari)

            if siparis_sayisi == 0:
                print("❌ Hiç sipariş satırı bulunamadı!")
                break

            print(f"✅ {siparis_sayisi} sipariş satırı bulundu")

        except Exception as e:
            print(f"❌ Sipariş satırları bulunamadı: {e}")
            break

        # Her siparişi işle
        for i in range(siparis_sayisi):
            try:
                # Her iterasyonda satırları yeniden bul
                siparis_satirlari = driver.find_elements(By.CSS_SELECTOR, 'tr[role="row"]')

                # Başlık satırını tekrar atla
                try:
                    ilk_hucre = siparis_satirlari[0].find_elements(By.TAG_NAME, 'td')
                    if ilk_hucre and 'sipariş' in ilk_hucre[0].text.lower():
                        siparis_satirlari = siparis_satirlari[1:]
                except:
                    pass

                if i >= len(siparis_satirlari):
                    continue

                satir = siparis_satirlari[i]

                # Satıra tıkla (detayları aç)
                try:
                    driver.execute_script("arguments[0].scrollIntoView({block: 'center'});", satir)
                    time.sleep(0.5)

                    # Tablo satırına tıklamak için, satırın içindeki bir elemente tıklayabiliriz
                    driver.execute_script("arguments[0].click();", satir)
                    time.sleep(2)

                except Exception as e:
                    print(f"  ⚠️  [{i+1}] Satıra tıklanamadı: {e}")
                    continue

                # Müşteri bilgilerini çek
                try:
                    musteri_data = {}

                    # Sipariş numarasını satırdan al (tıklamadan önce)
                    try:
                        siparis_no_element = satir.find_element(By.TAG_NAME, 'span')
                        siparis_no_text = siparis_no_element.text.strip()
                        # Sadece rakamları al
                        siparis_no = re.sub(r'[^\d]', '', siparis_no_text)
                        musteri_data['Sipariş No'] = siparis_no if siparis_no else f"S-{toplam_siparis + 1}"
                    except:
                        musteri_data['Sipariş No'] = f"S-{toplam_siparis + 1}"

                    # Detaylar açıldıktan sonra bilgileri al
                    try:
                        # Müşteri adı
                        musteri_adi = driver.find_element(By.XPATH, '//*[contains(text(), "Müşteri:")]/following-sibling::*[1] | //*[text()="Müşteri:"]/parent::*/following-sibling::*[1]').text.strip()
                        musteri_data['Müşteri Adı'] = musteri_adi
                    except:
                        musteri_data['Müşteri Adı'] = "Bilinmiyor"

                    # Telefon
                    try:
                        telefon = driver.find_element(By.XPATH, '//*[contains(text(), "Telefon:")]/following-sibling::*[1] | //div[text()="Telefon:"]/parent::*/following-sibling::*[1]').text.strip()
                        # Telefonu temizle
                        telefon_temiz = re.sub(r'[^\d+\s]', '', telefon).strip()
                        musteri_data['Telefon'] = telefon_temiz
                    except:
                        musteri_data['Telefon'] = ""

                    # Email
                    try:
                        email = driver.find_element(By.XPATH, '//*[contains(text(), "E-posta:") or contains(text(), "Email:")]/following-sibling::*[1] | //div[text()="E-posta:"]/parent::*/following-sibling::*[1]').text.strip()
                        musteri_data['Email'] = email
                    except:
                        musteri_data['Email'] = ""

                    # Adres
                    try:
                        adres = driver.find_element(By.XPATH, '//*[contains(text(), "Adres:")]/following-sibling::*[1] | //div[text()="Adres:"]/parent::*/following-sibling::*[1]').text.strip()
                        musteri_data['Adres'] = adres
                    except:
                        musteri_data['Adres'] = ""

                    # Veriyi kaydet
                    if musteri_data.get('Telefon') or musteri_data.get('Email'):
                        musteriler.append(musteri_data)
                        toplam_siparis += 1
                        print(f"  ✅ [{toplam_siparis}] {musteri_data.get('Sipariş No')} - {musteri_data.get('Müşteri Adı', 'N/A')} - {musteri_data.get('Telefon', 'N/A')}")
                    else:
                        basarisiz += 1
                        print(f"  ⚠️  [{i+1}] Telefon/email bulunamadı, atlandı")

                except Exception as e:
                    basarisiz += 1
                    print(f"  ❌ [{i+1}] Müşteri bilgisi alınamadı: {e}")

                # Detayları kapat (tekrar tıkla)
                try:
                    driver.execute_script("arguments[0].click();", satir)
                    time.sleep(0.5)
                except:
                    pass

            except Exception as e:
                print(f"  ❌ Sipariş işlenemedi: {e}")
                basarisiz += 1
                continue

        # Sayfa özeti
        print(f"\n📊 Sayfa {sayfa_no} Özeti:")
        print(f"   ✅ Başarılı: {toplam_siparis}")
        print(f"   ❌ Başarısız: {basarisiz}")

        # Sonraki sayfaya geç
        try:
            # Pagination butonunu bul
            ileri_buton = None

            try:
                # ">" veya "İleri" içeren buton
                ileri_buton = driver.find_element(By.XPATH, '//button[contains(text(), ">") or contains(text(), "İleri") or contains(@aria-label, "next")]')
            except:
                pass

            if not ileri_buton:
                try:
                    # Pagination'daki son buton
                    ileri_buton = driver.find_element(By.XPATH, '//nav[@aria-label="pagination navigation"]//button[last()]')
                except:
                    pass

            if ileri_buton and ileri_buton.is_enabled() and 'disabled' not in ileri_buton.get_attribute('class'):
                print(f"\n⏩ Sonraki sayfaya geçiliyor...")
                driver.execute_script("arguments[0].click();", ileri_buton)
                time.sleep(3)
                sayfa_no += 1
            else:
                print("\n🎉 SON SAYFAYA ULAŞILDI!")
                break

        except Exception as e:
            print(f"\n🎉 Son sayfa (pagination bulunamadı)")
            break

except KeyboardInterrupt:
    print("\n\n⚠️  Kullanıcı tarafından durduruldu (Ctrl+C)")

except Exception as e:
    print(f"\n\n❌ Beklenmeyen hata: {e}")
    import traceback
    traceback.print_exc()

finally:
    print(f"\n{'='*70}")
    print("💾 SONUÇLAR KAYDEDİLİYOR...")
    print(f"{'='*70}")

    if len(musteriler) > 0:
        df = pd.DataFrame(musteriler)

        print(f"\n📋 Toplam sipariş: {len(musteriler)}")

        # Tekrar edenleri temizle
        df_unique = df.drop_duplicates(subset=['Telefon'], keep='first')

        print(f"👥 Tekil müşteri: {len(df_unique)}")

        # Desktop yolunu bul
        desktop_path = os.path.join(os.path.expanduser("~"), "Desktop")

        # Eğer Desktop yoksa Documents'e veya Home'a kaydet
        if not os.path.exists(desktop_path):
            desktop_path = os.path.join(os.path.expanduser("~"), "Documents")
            if not os.path.exists(desktop_path):
                desktop_path = os.path.expanduser("~")
                print("⚠️  Desktop bulunamadı, Home dizinine kaydediliyor...")
            else:
                print("⚠️  Desktop bulunamadı, Documents dizinine kaydediliyor...")

        # Excel'e kaydet
        dosya_adi = f'shopier_musteriler_{time.strftime("%Y%m%d_%H%M%S")}.xlsx'
        dosya_yolu = os.path.join(desktop_path, dosya_adi)

        df_unique.to_excel(dosya_yolu, index=False, engine='openpyxl')

        print(f"\n✅ BAŞARILI!")
        print(f"📁 Dosya: {dosya_adi}")
        print(f"📍 Konum: {desktop_path}")

        # İstatistikler
        print(f"\n{'='*70}")
        print("📊 İSTATİSTİKLER")
        print(f"{'='*70}")
        print(f"✅ Başarılı: {toplam_siparis}")
        print(f"❌ Başarısız: {basarisiz}")
        print(f"📄 İşlenen sayfa: {sayfa_no}")
        print(f"📧 Email sayısı: {df_unique['Email'].notna().sum()}")
        print(f"📱 Telefon sayısı: {df_unique['Telefon'].notna().sum()}")
        print(f"{'='*70}")

        # Örnek veriler göster
        print(f"\n📋 İlk 5 Müşteri:")
        print(df_unique.head().to_string(index=False))

    else:
        print("\n⚠️  Hiç veri çekilemedi!")
        print("⚠️  Kontrol edin:")
        print("   1. Shopier'e giriş yaptınız mı?")
        print("   2. Siparişler sayfasında mısınız?")
        print("   3. Sayfada sipariş var mı?")

    print("\n" + "="*70)
    input("🔚 Tarayıcıyı kapatmak için ENTER'a basın...")
    driver.quit()
    print("✅ Program sonlandı")
