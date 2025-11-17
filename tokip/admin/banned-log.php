<?php
session_start();

if (!isset($_SESSION['fast-admin']) || $_SESSION['fast-admin'] !== true) {
    header("Location: fast-login.php");
    exit;
}

require_once '../inc/brain.php';
date_default_timezone_set('Europe/Istanbul');
$saat = date('H:i');

if (isset($_GET['get_banned_logs'])) {
    $stmt = $pdo->query("SELECT ip_address, banned_at FROM banned ORDER BY banned_at DESC");
    $bannedLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($bannedLogs);
    exit;
}

if (isset($_POST['unban_ip'])) {
    $ip = $_POST['unban_ip'];
    $stmt = $pdo->prepare("DELETE FROM banned WHERE ip_address = ?");
    $success = $stmt->execute([$ip]);

    echo json_encode(['success' => $success]);
    exit;
}


try {
    $stmt = $pdo->query("SELECT * FROM yetkili LIMIT 1");
    $yetkili = $stmt->fetch();

    if ($yetkili) {
        $id = $yetkili['id'];
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


<!DOCTYPE html><html lang="en" data-bs-theme="dark"><head>
	<meta charset="utf-8">
	<title>Marco | Dashboard</title>
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
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/locale/bootstrap-table-tr-TR.min.js"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/extensions/export/bootstrap-table-export.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
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
        <li class="breadcrumb-item active">Banlı Loglar</li>
    </ul>

    <h1 class="page-header">Banlı Loglar <small>[Detaylı Yönetim]</small></h1>
    <p>Sitenizdeki yasaklı log verilerini kontrol etmenize olanak tanır.</p>
    <style>
    .fixed-table-border {
        display: none !important;
    }

    .copyable-card:hover {
        text-decoration: underline dotted;
    }

    .marked-row {
        background-color:rgb(173, 81, 81) !important;
    }
    .table-fixed {
    table-layout: fixed;
    width: 100%;
    }
    
    .btn-sm {
        padding: 0.25rem 0.4rem;
        font-size: 0.75rem;
    }
    .btn {
        white-space: nowrap;
        min-width: 60px; 
    }

    #ozelMesajModal .modal-dialog {
    position: fixed;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
    margin: 0 !important;
    max-width: 500px;
    width: 90%;
    }



    th, td {
    white-space: nowrap;
    }

    .modal-backdrop.show {
        z-index: 1050 !important;
    }
    .modal.show {
        z-index: 1060 !important;
    }
    .modal-dialog {
        margin: 1.75rem auto;
        max-width: 500px;
    }
    .modal.show .modal-dialog {
        display: flex;
        align-items: center;
        min-height: calc(100vh - 1rem);
    }



    th:nth-child(1), td:nth-child(1) { width: 6%; }  
    th:nth-child(2), td:nth-child(2) { width: 10%; } 
    th:nth-child(3), td:nth-child(3) { width: 10%; }  
    th:nth-child(4), td:nth-child(4) { width: 14%; } 
    th:nth-child(5), td:nth-child(5) { width: 8%; }  
    th:nth-child(6), td:nth-child(6) { width: 8%; }  
    th:nth-child(7), td:nth-child(7) { width: 10%; }  
    th:nth-child(8), td:nth-child(8) { width: 24%; } 

    td > div.d-flex {
        overflow-x: auto;
        max-width: 100%;
    }


    @media (max-width: 768px) {
        table.table-fixed {
            table-layout: auto !important;
        }
    }
    </style>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1080;">
    <div id="banToast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
        <div class="toast-body" id="banToastBody"></div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Kapat"></button>
        </div>
    </div>
    </div>



  <div id="bannedLogTable" class="mb-5">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table 
                    class="table table-bordered table-hover table-fixed" style="min-width: 600px;"
                    data-toggle="table"
                    data-pagination="true"
                    data-show-fullscreen="false"
                    data-sortable="true"
                    data-show-export="true"
                    data-export-types="['csv', 'excel', 'pdf']"
                    data-height="auto"
                    data-locale="tr-TR"
                    data-sort-class="table-active"
                >
                    <thead class="table-dark">
                        <tr>
                            <th data-field="ip_address" data-sortable="true">IP Adresi</th>
                            <th data-field="banned_at" data-sortable="true">Ban Tarihi</th>
                            <th data-field="actions">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
    </div>
</div>
<script>
function loadBannedLogs() {
    $.getJSON('?get_banned_logs=1', function(data) {
        const tbody = $('#bannedLogTable tbody');
        tbody.empty();

        if (!data.length) {
            tbody.html(`<tr><td colspan="3" class="text-center">Banlanan IP bulunmamaktadır.</td></tr>`);
            return;
        }

        data.forEach(log => {
            let row = `
                <tr>
                    <td>${log.ip_address}</td>
                    <td>${log.banned_at}</td>
                    <td>
                        <button class="btn btn-sm btn-success btn-unban" data-ip="${log.ip_address}">
                            Ban Kaldır
                        </button>
                    </td>
                </tr>
            `;
            tbody.append(row);
        });
    });
}
function showToast(message, bgClass = 'bg-primary') {
    const toastEl = document.getElementById('banToast');
    const toastBody = document.getElementById('banToastBody');

    toastBody.textContent = message;
    toastEl.className = `toast align-items-center text-white ${bgClass} border-0`;

    const toast = new bootstrap.Toast(toastEl);
    toast.show();
}

$(document).on('click', '.btn-unban', function() {
    const ip = $(this).data('ip');
    $.post('', {unban_ip: ip}, function(response) {
        if (response.success) {
            showToast(`${ip} adresindeki ban kaldırıldı.`, 'bg-success');
            loadBannedLogs();
        } else {
            showToast(`${ip} adresindeki ban kaldırılamadı!`, 'bg-danger');
        }
    }, 'json');
});

$(document).ready(function() {
    loadBannedLogs();
});



</script>
	<script src="js/vendor.min.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/app.min.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/dashboard.demo.js" type="efade36a53868317824a3d21-text/javascript"></script>
    <script src="js/rocket-loader.min.js" data-cf-settings="efade36a53868317824a3d21-|49" defer=""></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body></html>