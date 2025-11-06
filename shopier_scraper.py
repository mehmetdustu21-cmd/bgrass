#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
Shopier Sipariş Bilgisi Toplama Scripti
Bu script Shopier satıcı panelinden sipariş bilgilerini toplar.
"""

import os
import time
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import NoSuchElementException, TimeoutException
from datetime import datetime

class ShopierScraper:
    def __init__(self):
        self.driver = None
        self.orders_data = []
        self.current_page = 1

    def setup_driver(self):
        """Selenium WebDriver'ı başlat"""
        print("🌐 Tarayıcı başlatılıyor...")
        options = webdriver.ChromeOptions()
        # options.add_argument('--headless')  # Tarayıcıyı görmek isterseniz bu satırı yorum yapın
        options.add_argument('--no-sandbox')
        options.add_argument('--disable-dev-shm-usage')
        options.add_argument('--start-maximized')

        try:
            self.driver = webdriver.Chrome(options=options)
        except:
            print("⚠️  Chrome bulunamadı, Firefox deneniyor...")
            self.driver = webdriver.Firefox()

        self.driver.maximize_window()

    def navigate_to_orders(self):
        """Shopier siparişler sayfasına git"""
        print("\n📍 Shopier siparişler sayfasına gidiliyor...")
        self.driver.get("https://www.shopier.com/m/orders.php")
        time.sleep(3)

    def wait_for_manual_login(self):
        """Kullanıcının manuel giriş yapmasını bekle"""
        print("\n" + "="*60)
        print("⏳ LÜTFEN SHOPIER'A GİRİŞ YAPIN")
        print("="*60)
        print("Giriş yaptıktan sonra siparişler sayfasında olduğunuzdan emin olun.")
        print("Hazır olduğunuzda ENTER tuşuna basın...")
        input()
        print("\n✅ Devam ediliyor...\n")
        time.sleep(2)

    def check_and_enable_arrived_view(self):
        """Gelimiş görünümünü kontrol et ve gerekirse aç"""
        print("🔍 Gelimiş görünümü kontrol ediliyor...")

        try:
            # Switchery elementini bul
            switchery = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.CLASS_NAME, "switchery"))
            )

            # Arka plan rengine göre açık olup olmadığını kontrol et
            style = switchery.get_attribute("style")

            # Yeşil renk kontrolü (rgb(0, 232, 186) veya benzer)
            if "rgb(0, 232, 186)" not in style and "rgb(100, 189, 99)" not in style:
                print("📋 Gelimiş görünümü kapalı, açılıyor...")
                switchery.click()
                time.sleep(2)
                print("✅ Gelimiş görünümü açıldı!")
            else:
                print("✅ Gelimiş görünümü zaten açık!")

        except Exception as e:
            print(f"⚠️  Gelimiş görünümü kontrolünde hata: {e}")
            print("Devam ediliyor...")

        time.sleep(2)

    def extract_order_info(self, order_element):
        """Tek bir sipariş kartından bilgileri çıkar"""
        try:
            # Ad Soyad
            fullname = order_element.find_element(By.ID, "buyer_fullname").text.strip()

            # Telefon
            phone = order_element.find_element(By.ID, "buyer_phone").text.strip()

            # E-posta
            email = order_element.find_element(By.ID, "buyer_email").text.strip()

            return {
                'fullname': fullname,
                'phone': phone,
                'email': email
            }
        except Exception as e:
            print(f"⚠️  Sipariş bilgisi çıkarılırken hata: {e}")
            return None

    def scrape_current_page(self):
        """Mevcut sayfadaki tüm siparişleri topla"""
        print(f"\n📄 Sayfa {self.current_page} işleniyor...")

        try:
            # Sayfanın yüklenmesini bekle
            time.sleep(3)

            # Tüm sipariş kartlarını bul
            # buyer_fullname ID'sine sahip tüm elementlerin parent container'larını bul
            order_cards = self.driver.find_elements(By.ID, "buyer_fullname")

            print(f"   Bulunan sipariş sayısı: {len(order_cards)}")

            for idx, card in enumerate(order_cards, 1):
                try:
                    # Parent container'ı bul
                    parent = card.find_element(By.XPATH, "./ancestor::div[contains(@class, 'col-lg-5')]")

                    # Bilgileri çıkar
                    order_info = self.extract_order_info(parent)

                    if order_info:
                        self.orders_data.append(order_info)
                        print(f"   ✓ Sipariş {idx}: {order_info['fullname']}")
                except Exception as e:
                    print(f"   ✗ Sipariş {idx} okunamadı: {e}")
                    continue

            print(f"✅ Sayfa {self.current_page} tamamlandı! Toplam: {len(order_cards)} sipariş işlendi.\n")

        except Exception as e:
            print(f"❌ Sayfa işlenirken hata: {e}")

    def go_to_next_page(self):
        """Sonraki sayfaya git"""
        try:
            # &gt;&gt;&gt; içeren link'i bul ve tıkla
            next_button = self.driver.find_element(
                By.XPATH,
                "//a[@class='page-link' and contains(@onclick, 'requestOrderByResponseType') and contains(text(), '>>>')]"
            )

            print(f"➡️  Sonraki sayfaya geçiliyor...")

            # JavaScript ile tıklama (daha güvenilir)
            self.driver.execute_script("arguments[0].click();", next_button)

            self.current_page += 1
            time.sleep(3)  # Sayfanın yüklenmesi için bekle

            return True

        except NoSuchElementException:
            print("ℹ️  Sonraki sayfa bulunamadı, tüm sayfalar tamamlandı!")
            return False
        except Exception as e:
            print(f"⚠️  Sonraki sayfaya geçerken hata: {e}")
            return False

    def display_results(self):
        """Toplanan verileri terminalde göster"""
        print("\n" + "="*80)
        print("📊 TOPLANAN SİPARİŞ BİLGİLERİ")
        print("="*80)

        for idx, order in enumerate(self.orders_data, 1):
            print(f"\n{idx}. Sipariş:")
            print(f"   Ad Soyad: {order['fullname']}")
            print(f"   Telefon : {order['phone']}")
            print(f"   E-posta : {order['email']}")

        print("\n" + "="*80)
        print(f"✅ Toplam {len(self.orders_data)} sipariş kaydedildi!")
        print("="*80 + "\n")

    def save_to_file(self):
        """Verileri masaüstüne .txt olarak kaydet"""
        desktop_path = os.path.join(os.path.expanduser("~"), "Desktop")

        # Eğer Desktop yoksa Home dizinine kaydet
        if not os.path.exists(desktop_path):
            desktop_path = os.path.expanduser("~")
            print("⚠️  Desktop klasörü bulunamadı, Home dizinine kaydediliyor...")

        timestamp = datetime.now().strftime("%Y%m%d_%H%M%S")
        filename = f"shopier_siparisler_{timestamp}.txt"
        filepath = os.path.join(desktop_path, filename)

        print(f"💾 Veriler kaydediliyor: {filepath}")

        try:
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write("="*80 + "\n")
                f.write("SHOPIER SİPARİŞ BİLGİLERİ\n")
                f.write(f"Tarih: {datetime.now().strftime('%d.%m.%Y %H:%M:%S')}\n")
                f.write(f"Toplam Sipariş: {len(self.orders_data)}\n")
                f.write("="*80 + "\n\n")

                for idx, order in enumerate(self.orders_data, 1):
                    f.write(f"{idx}. Sipariş:\n")
                    f.write(f"Ad Soyad: {order['fullname']}\n")
                    f.write(f"Telefon : {order['phone']}\n")
                    f.write(f"E-posta : {order['email']}\n")
                    f.write("-"*80 + "\n\n")

            print(f"✅ Veriler başarıyla kaydedildi: {filename}")

        except Exception as e:
            print(f"❌ Dosya kaydedilirken hata: {e}")

    def run(self):
        """Ana çalıştırma fonksiyonu"""
        try:
            # 1. Tarayıcıyı başlat
            self.setup_driver()

            # 2. Siparişler sayfasına git
            self.navigate_to_orders()

            # 3. Manuel giriş için bekle
            self.wait_for_manual_login()

            # 4. Gelimiş görünümünü kontrol et
            self.check_and_enable_arrived_view()

            # 5. Tüm sayfaları işle
            while True:
                self.scrape_current_page()

                # Sonraki sayfaya geç
                if not self.go_to_next_page():
                    break

                # Güvenlik için sayfa limiti (istenirse kaldırılabilir)
                if self.current_page > 100:  # Maksimum 100 sayfa
                    print("⚠️  Maksimum sayfa limitine ulaşıldı!")
                    break

            # 6. Sonuçları göster
            self.display_results()

            # 7. Dosyaya kaydet
            self.save_to_file()

        except Exception as e:
            print(f"\n❌ Hata oluştu: {e}")
            import traceback
            traceback.print_exc()

        finally:
            # Tarayıcıyı kapat
            print("\n🔚 İşlem tamamlandı. Tarayıcı kapatılıyor...")
            time.sleep(3)
            if self.driver:
                self.driver.quit()


def main():
    """Ana program"""
    print("\n" + "="*80)
    print("🛍️  SHOPIER SİPARİŞ BİLGİLERİ TOPLAMA ARACI")
    print("="*80 + "\n")

    scraper = ShopierScraper()
    scraper.run()

    print("\n✨ Program sonlandı. İyi günler!\n")


if __name__ == "__main__":
    main()
