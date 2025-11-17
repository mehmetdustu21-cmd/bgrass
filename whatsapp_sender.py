#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
WhatsApp Toplu Mesaj Gönderme Scripti
Excel dosyasından müşteri bilgilerini okur ve WhatsApp'tan mesaj gönderir
"""

import sys
import subprocess
import os
import time

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
from selenium.webdriver.common.keys import Keys
from webdriver_manager.chrome import ChromeDriverManager
import pandas as pd
from urllib.parse import quote

print("=" * 70)
print("📱 WHATSAPP TOPLU MESAJ GÖNDERME ARACI")
print("=" * 70)
print()

# Excel dosyasını seç
print("📂 Excel dosyasını seçin...")
print()
excel_path = input("Excel dosyasının tam yolunu yapıştırın (örn: C:\\Users\\Ahmet\\Desktop\\shopier_musteriler_20251106_180348.xlsx):\n").strip().strip('"')

if not os.path.exists(excel_path):
    print(f"❌ Dosya bulunamadı: {excel_path}")
    sys.exit(1)

print(f"✅ Dosya bulundu: {excel_path}\n")

# Excel'i oku
try:
    df = pd.read_excel(excel_path)
    print(f"📊 Toplam {len(df)} müşteri bulundu")
    print(f"   Kolonlar: {', '.join(df.columns)}\n")
except Exception as e:
    print(f"❌ Excel okunamadı: {e}")
    sys.exit(1)

# Mesaj şablonunu al
print("=" * 70)
print("📝 MESAJ ŞABLONU")
print("=" * 70)
print("Göndermek istediğiniz mesajı yazın.")
print("Özel alanlar kullanabilirsiniz:")
print("  {ad} - Müşteri adı")
print("  {telefon} - Telefon numarası")
print("  {email} - E-posta")
print()
print("Örnek: Merhaba {ad}, yeni kampanyamız hakkında bilgi vermek istedik...")
print()

mesaj_sablonu = input("Mesajınız:\n")

if not mesaj_sablonu:
    print("❌ Mesaj boş olamaz!")
    sys.exit(1)

print()
print("=" * 70)
print("⚙️ AYARLAR")
print("=" * 70)

try:
    baslangic = int(input("Kaçıncı müşteriden başlansın? (1-den başlar): ") or "1")
    bitis = int(input(f"Kaçıncı müşteriye kadar? (max {len(df)}): ") or str(len(df)))
    bekleme = int(input("Her mesaj arası kaç saniye beklensin? (önerilen: 5-10): ") or "5")
except ValueError:
    print("❌ Geçersiz sayı!")
    sys.exit(1)

# Chrome başlat
print()
print("=" * 70)
print("🌐 WhatsApp Web açılıyor...")
print("=" * 70)

options = webdriver.ChromeOptions()
options.add_argument('--start-maximized')
options.add_argument('--disable-blink-features=AutomationControlled')
options.add_argument('--user-data-dir=./whatsapp_profile')  # Oturum kaydetmek için

driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()), options=options)

driver.get('https://web.whatsapp.com')

print()
print("=" * 70)
print("📱 WHATSAPP'A GİRİŞ YAPIN")
print("=" * 70)
print("1. Telefonunuzla QR kodu okutun")
print("2. WhatsApp Web'e giriş yapın")
print("3. Ana sayfa yüklenene kadar bekleyin")
print("=" * 70)
print()

input("✅ WhatsApp'a giriş yaptıktan sonra ENTER'a basın...\n")

# WhatsApp'ın yüklenmesini bekle
try:
    WebDriverWait(driver, 30).until(
        EC.presence_of_element_located((By.XPATH, '//div[@contenteditable="true"][@data-tab="3"]'))
    )
    print("✅ WhatsApp Web hazır!\n")
except:
    print("⚠️  WhatsApp tam yüklenmedi ama devam ediliyor...\n")

time.sleep(2)

# Mesaj göndermeye başla
print("=" * 70)
print("📤 MESAJ GÖNDERME BAŞLIYOR")
print("=" * 70)
print()

gonderilen = 0
basarisiz = 0
atlanan = 0

# Baslangic ve bitis index'lerini ayarla
start_idx = baslangic - 1
end_idx = min(bitis, len(df))

for idx in range(start_idx, end_idx):
    row = df.iloc[idx]

    try:
        # Telefon numarasını al
        telefon = str(row.get('Telefon', '')).strip()

        if not telefon or telefon == 'nan' or telefon == '':
            print(f"⚠️  [{idx+1}] Telefon numarası yok, atlanıyor...")
            atlanan += 1
            continue

        # Telefonu temizle (sadece rakamlar)
        telefon = ''.join(filter(str.isdigit, telefon))

        if len(telefon) < 10:
            print(f"⚠️  [{idx+1}] Geçersiz telefon: {telefon}, atlanıyor...")
            atlanan += 1
            continue

        # Türkiye için 90 ekle (yoksa)
        if not telefon.startswith('90'):
            telefon = '90' + telefon

        # Müşteri adı
        ad = str(row.get('Müşteri Adı', 'Değerli Müşterimiz')).strip()
        email = str(row.get('Email', '')).strip()

        # Mesajı özelleştir
        mesaj = mesaj_sablonu.format(
            ad=ad,
            telefon=telefon,
            email=email
        )

        # WhatsApp URL oluştur
        mesaj_encoded = quote(mesaj)
        whatsapp_url = f"https://web.whatsapp.com/send?phone={telefon}&text={mesaj_encoded}"

        print(f"📤 [{idx+1}/{end_idx}] {ad} - {telefon}")

        # URL'e git
        driver.get(whatsapp_url)

        # Sayfanın yüklenmesini bekle
        time.sleep(3)

        try:
            # Mesaj kutusunu bekle ve Enter'a bas
            wait = WebDriverWait(driver, 15)

            # Mesaj gönder butonunu bul ve tıkla
            send_button = wait.until(
                EC.presence_of_element_located((By.XPATH, '//button[@aria-label="Send" or @aria-label="Gönder" or span[@data-icon="send"]]'))
            )

            time.sleep(1)
            send_button.click()

            print(f"   ✅ Gönderildi!\n")
            gonderilen += 1

            # Bekleme süresi
            time.sleep(bekleme)

        except Exception as e:
            print(f"   ❌ Gönderilemedi: {e}\n")
            basarisiz += 1
            time.sleep(2)

    except Exception as e:
        print(f"❌ [{idx+1}] Hata: {e}\n")
        basarisiz += 1
        continue

# Özet
print()
print("=" * 70)
print("📊 ÖZET")
print("=" * 70)
print(f"✅ Gönderilen: {gonderilen}")
print(f"❌ Başarısız: {basarisiz}")
print(f"⚠️  Atlanan: {atlanan}")
print(f"📊 Toplam: {end_idx - start_idx}")
print("=" * 70)

input("\n🔚 Tarayıcıyı kapatmak için ENTER'a basın...")
driver.quit()
print("✅ Program sonlandı")
