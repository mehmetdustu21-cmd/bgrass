<?php
session_start();

if (!isset($_SESSION['fast-admin']) || $_SESSION['fast-admin'] !== true) {
    header("Location: fast-login.php");
    exit;
}

require_once '../inc/brain.php';
date_default_timezone_set('Europe/Istanbul');



if (isset($_POST['update_iban_info'])) {
    $asama1 = $_POST['asama1'];
    $asama2 = $_POST['asama2'];
    $asama3 = $_POST['asama3'];
    $asama4 = $_POST['asama4'];

    $stmt = $pdo->prepare("UPDATE tutar SET asama1 = ?, asama2 = ?, asama3 = ?, asama4 = ? WHERE id = 1");
    
    try {
        $stmt->execute([$asama1, $asama2, $asama3, $asama4]);
        echo json_encode(['success' => true, 'message' => 'Aşama tutar bilgileri başarıyla güncellendi.']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Veritabanı hatası: ' . $e->getMessage()]);
    }
    exit;
}

if (isset($_GET['get_iban_info'])) {
    $stmt = $pdo->query("SELECT asama1, asama2, asama3, asama4 FROM tutar WHERE id = 1");
    $iban_info = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($iban_info);
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
  <title>Francis | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/vendor.min.css" rel="stylesheet">
    <link href="css/app.min.css" rel="stylesheet">
    <link href="css/jquery-jvectormap.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/locale/bootstrap-table-tr-TR.min.js"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/extensions/export/bootstrap-table-export.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
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
        <li class="breadcrumb-item active">Tutar Ayarları</li>
      </ul>

      <h1 class="page-header">Tutar Ayarları <small>[Gelişmiş Ayarlar]</small></h1>
      <p>Tutar bilgilerinizi düzenleyin.</p>

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
                            <h5>Tutar Bilgilerini Güncelle</h5>
                        </div>
                        <p class="text-white-50 mb-3">Aşamalar için tutar bilgisi tanımlayın bilgilerini girerek kaydedin.</p>
                      <form id="ibanUpdateForm" class="mt-auto">
                        <div class="mb-3">
                            <label for="asama4" class="form-label">Aşama 1</label>
                            <input type="text" class="form-control" id="asama4" name="asama4" required>
                        </div>
                        <div class="mb-3">
                            <label for="asama1" class="form-label">Aşama 2</label>
                            <input type="text" class="form-control" id="asama1" name="asama1" required>
                        </div>
                        <div class="mb-3">
                            <label for="asama2" class="form-label">Aşama 3</label>
                            <input type="text" class="form-control" id="asama2" name="asama2" required>
                        </div>
                        <div class="mb-3">
                            <label for="asama3" class="form-label">Aşama 4</label>
                            <input type="text" class="form-control" id="asama3" name="asama3" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Bilgileri Güncelle</button>
                    </form>
                    </div>
                    <div class="card-arrow"><div class="card-arrow-top-left"></div><div class="card-arrow-top-right"></div><div class="card-arrow-bottom-left"></div><div class="card-arrow-bottom-right"></div></div>
                </div>
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

function getIbanInfo() {
    $.get('', { get_iban_info: true }, function (res) {
        if (res) {
            $('#asama1').val(res.asama1);
            $('#asama2').val(res.asama2);
            $('#asama3').val(res.asama3);
            $('#asama4').val(res.asama4);
        }
    }, 'json');
}


$('#ibanUpdateForm').on('submit', function(e) {
    e.preventDefault();
    
    const formData = {
        update_iban_info: true,
        asama1: $('#asama1').val(),
        asama2: $('#asama2').val(),
        asama3: $('#asama3').val(),
        asama4: $('#asama4').val()
    };

    $.post('', formData, function(res) {
        if (res.success) {
            showToast("💰 " + res.message); 
        } else {
            showToast("⚠️ " + res.message);
        }
    }, 'json');
});

getIbanInfo();
  </script>
	<script src="js/vendor.min.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/app.min.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/dashboard.demo.js" type="efade36a53868317824a3d21-text/javascript"></script>
  <script src="js/rocket-loader.min.js" data-cf-settings="efade36a53868317824a3d21-|49" defer=""></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body></html>