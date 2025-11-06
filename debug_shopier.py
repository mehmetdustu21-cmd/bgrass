#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
Shopier HTML Yapısını Kontrol Eden Debug Script
"""

import sys
import subprocess

# Selenium'u kontrol et
try:
    from selenium import webdriver
    from selenium.webdriver.common.by import By
    from selenium.webdriver.chrome.service import Service
    from webdriver_manager.chrome import ChromeDriverManager
except ImportError:
    print("⚠️  Selenium kuruluyor...")
    subprocess.check_call([sys.executable, "-m", "pip", "install", "selenium", "webdriver-manager", "-q"])
    from selenium import webdriver
    from selenium.webdriver.common.by import By
    from selenium.webdriver.chrome.service import Service
    from webdriver_manager.chrome import ChromeDriverManager

import time

print("=" * 70)
print("🔍 SHOPIER HTML YAPI KONTROL ARACI")
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
print("2. Siparişler sayfasının tamamen yüklenmesini bekleyin")
print("3. Siparişlerinizi gördüğünüzden emin olun")
print("4. ENTER'a basın")
print("=" * 70)
print()

input("✅ Hazır olduğunuzda ENTER'a basın...\n")

print("\n" + "="*70)
print("🔍 HTML YAPISI KONTROL EDİLİYOR...")
print("="*70 + "\n")

time.sleep(2)

# Farklı selector'ları dene
selectors = [
    ('tr[role="row"]', 'CSS: tr[role="row"]'),
    ('tr', 'CSS: tr (tüm tr elementleri)'),
    ('table tbody tr', 'CSS: table tbody tr'),
    ('table tr', 'CSS: table tr'),
    ('.order-row', 'CSS: .order-row (class)'),
    ('.dataTables_wrapper tbody tr', 'CSS: DataTables tbody tr'),
    ('div[class*="order"]', 'CSS: div içinde "order" geçen'),
    ('div[class*="siparis"]', 'CSS: div içinde "siparis" geçen'),
]

print("📋 FARKLI SELECTOR'LAR DENENİYOR:\n")

for selector, description in selectors:
    try:
        elements = driver.find_elements(By.CSS_SELECTOR, selector)
        count = len(elements)

        if count > 0:
            print(f"✅ {description}")
            print(f"   Bulunan eleman sayısı: {count}")

            # İlk elementin içeriğini göster
            if count > 0:
                first_text = elements[0].text.strip()[:100]  # İlk 100 karakter
                print(f"   İlk elementin içeriği: {first_text}...")
            print()
        else:
            print(f"❌ {description} - Bulunamadı")
    except Exception as e:
        print(f"❌ {description} - Hata: {e}")

print("\n" + "="*70)
print("🔍 SAYFA KAYNAK KODUNU KONTROL EDİYORUZ...")
print("="*70 + "\n")

# Sayfa kaynağını Desktop'a kaydet
try:
    import os

    page_source = driver.page_source

    desktop_path = os.path.join(os.path.expanduser("~"), "Desktop")
    if not os.path.exists(desktop_path):
        desktop_path = os.path.expanduser("~")

    html_file = os.path.join(desktop_path, "shopier_page_source.html")

    with open(html_file, 'w', encoding='utf-8') as f:
        f.write(page_source)

    print(f"✅ Sayfa kaynağı kaydedildi: {html_file}")
    print("   Bu dosyayı not defteri ile açıp 'tbody' veya 'table' aratın!")

except Exception as e:
    print(f"❌ Kaynak kod kaydedilemedi: {e}")

print("\n" + "="*70)
print("🔍 TABLO ELEMENTLERINI ARIYORUZ...")
print("="*70 + "\n")

# Tablo elementlerini bul
try:
    tables = driver.find_elements(By.TAG_NAME, 'table')
    print(f"📊 Bulunan tablo sayısı: {len(tables)}")

    for i, table in enumerate(tables):
        print(f"\n--- Tablo {i+1} ---")

        # tbody var mı?
        try:
            tbody = table.find_element(By.TAG_NAME, 'tbody')
            rows = tbody.find_elements(By.TAG_NAME, 'tr')
            print(f"  tbody içinde {len(rows)} satır bulundu")

            if len(rows) > 0:
                print(f"  İlk satır class: {rows[0].get_attribute('class')}")
                print(f"  İlk satır role: {rows[0].get_attribute('role')}")
                print(f"  İlk satır id: {rows[0].get_attribute('id')}")
                print(f"  İlk satır içerik: {rows[0].text[:100]}")
        except:
            print("  tbody bulunamadı")

        # thead var mı?
        try:
            thead = table.find_element(By.TAG_NAME, 'thead')
            print(f"  thead bulundu")
        except:
            print("  thead bulunamadı")

except Exception as e:
    print(f"❌ Tablo kontrolü hatası: {e}")

print("\n" + "="*70)
print("🔍 XPATH İLE DENEMELER...")
print("="*70 + "\n")

xpath_selectors = [
    ('//tbody/tr', 'XPath: //tbody/tr'),
    ('//table//tr', 'XPath: //table//tr'),
    ('//tr[@role="row"]', 'XPath: //tr[@role="row"]'),
    ('//div[contains(@class, "order")]', 'XPath: div class içinde order'),
]

for xpath, description in xpath_selectors:
    try:
        elements = driver.find_elements(By.XPATH, xpath)
        count = len(elements)

        if count > 0:
            print(f"✅ {description}")
            print(f"   Bulunan: {count}")
        else:
            print(f"❌ {description} - Bulunamadı")
    except Exception as e:
        print(f"❌ {description} - Hata: {e}")

print("\n\n" + "="*70)
print("📸 EKRAN GÖRÜNTÜSÜ KAYDEDİLİYOR...")
print("="*70 + "\n")

try:
    screenshot_file = os.path.join(desktop_path, "shopier_screenshot.png")
    driver.save_screenshot(screenshot_file)
    print(f"✅ Ekran görüntüsü: {screenshot_file}")
except Exception as e:
    print(f"❌ Ekran görüntüsü alınamadı: {e}")

print("\n" + "="*70)
input("🔚 Tarayıcıyı kapatmak için ENTER'a basın...")
driver.quit()
print("✅ Kontrol tamamlandı")
