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
            wait.until(EC.presence_of_element_located((By.TAG_NAME, "body")))

            # Sipariş kartlarını bul - buyer_fullname ID'sine sahip elementler
            # Her buyer_fullname bir sipariş kartını temsil eder
            siparis_kartlari = driver.find_elements(By.ID, 'buyer_fullname')

            siparis_sayisi = len(siparis_kartlari)

            if siparis_sayisi == 0:
                print("❌ Hiç sipariş bulunamadı!")
                print("⚠️  Lütfen siparişler sayfasında olduğunuzdan emin olun.")
                break

            print(f"✅ {siparis_sayisi} sipariş bulundu")

        except Exception as e:
            print(f"❌ Sipariş kartları bulunamadı: {e}")
            break

        # Her siparişi işle
        for i in range(siparis_sayisi):
            try:
                # Her iterasyonda sipariş kartlarını yeniden bul
                siparis_kartlari = driver.find_elements(By.ID, 'buyer_fullname')

                if i >= len(siparis_kartlari):
                    continue

                kart = siparis_kartlari[i]

                # Müşteri bilgilerini çek
                try:
                    musteri_data = {}

                    # Müşteri adı (buyer_fullname elementinden)
                    try:
                        musteri_adi = kart.text.strip()
                        musteri_data['Müşteri Adı'] = musteri_adi if musteri_adi else "Bilinmiyor"
                    except:
                        musteri_data['Müşteri Adı'] = "Bilinmiyor"

                    # Parent container'ı bul (aynı sipariş kartı içindeki diğer bilgiler için)
                    try:
                        parent_container = kart.find_element(By.XPATH, './ancestor::div[contains(@class, "col-lg-5") or contains(@class, "col-sm-5")][1]')
                    except:
                        # Alternatif: daha genel parent
                        try:
                            parent_container = kart.find_element(By.XPATH, './ancestor::div[3]')
                        except:
                            parent_container = driver  # Tüm sayfadan ara

                    # Telefon - parent container içinde buyer_phone ID'sini ara
                    try:
                        telefon_element = parent_container.find_element(By.ID, 'buyer_phone')
                        telefon = telefon_element.text.strip()
                        # Telefonu temizle
                        telefon_temiz = re.sub(r'[^\d+\s]', '', telefon).strip()
                        musteri_data['Telefon'] = telefon_temiz
                    except:
                        musteri_data['Telefon'] = ""

                    # Email - parent container içinde buyer_email ID'sini ara
                    try:
                        email_element = parent_container.find_element(By.ID, 'buyer_email')
                        email = email_element.text.strip()
                        musteri_data['Email'] = email
                    except:
                        musteri_data['Email'] = ""

                    # Adres - parent container içinde buyer_address ID'sini ara
                    try:
                        adres_element = parent_container.find_element(By.ID, 'buyer_address')
                        adres = adres_element.text.strip()
                        musteri_data['Adres'] = adres
                    except:
                        musteri_data['Adres'] = ""

                    # Sipariş numarası
                    try:
                        # Parent içinde sipariş numarasını ara
                        siparis_no_element = parent_container.find_element(By.XPATH, './/span[contains(text(), "#") or contains(@class, "order")]')
                        siparis_no_text = siparis_no_element.text.strip()
                        siparis_no = re.sub(r'[^\d]', '', siparis_no_text)
                        musteri_data['Sipariş No'] = siparis_no if siparis_no else f"S-{toplam_siparis + 1}"
                    except:
                        musteri_data['Sipariş No'] = f"S-{toplam_siparis + 1}"

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
            # Pagination butonunu bul - farklı yöntemler dene
            ileri_buton = None

            # Yöntem 1: ">>>" veya benzeri metinli link/buton
            try:
                ileri_buton = driver.find_element(By.XPATH, '//a[contains(text(), ">>>") or contains(text(), "İleri") or contains(text(), "Next")]')
            except:
                pass

            # Yöntem 2: Buton elementi
            if not ileri_buton:
                try:
                    ileri_buton = driver.find_element(By.XPATH, '//button[contains(text(), ">") or contains(text(), "İleri") or contains(@aria-label, "next")]')
                except:
                    pass

            # Yöntem 3: Pagination içindeki son element
            if not ileri_buton:
                try:
                    ileri_buton = driver.find_element(By.XPATH, '//ul[contains(@class, "pagination")]//a[contains(text(), ">")]')
                except:
                    pass

            if ileri_buton and ileri_buton.is_enabled():
                # Disabled olup olmadığını kontrol et
                parent_li = None
                try:
                    parent_li = ileri_buton.find_element(By.XPATH, './parent::li')
                except:
                    pass

                if parent_li and 'disabled' in parent_li.get_attribute('class'):
                    print("\n🎉 SON SAYFAYA ULAŞILDI!")
                    break

                print(f"\n⏩ Sonraki sayfaya geçiliyor...")
                driver.execute_script("arguments[0].scrollIntoView();", ileri_buton)
                time.sleep(1)
                driver.execute_script("arguments[0].click();", ileri_buton)
                time.sleep(4)  # Sayfanın yüklenmesi için bekle
                sayfa_no += 1
            else:
                print("\n🎉 SON SAYFAYA ULAŞILDI!")
                break

        except Exception as e:
            print(f"\n🎉 Son sayfa (pagination bulunamadı: {e})")
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
