<?php
session_start();
require_once '../inc/brain.php';

$username = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $password_hash = md5($password);

    $stmt = $pdo->prepare("SELECT * FROM yetkili WHERE yetkiliadi = ? AND parola_hash = ?");
    $stmt->execute([$username, $password_hash]);

    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['fast-admin'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Kullanıcı adı veya şifre yanlış!";
    }
}
?>

<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <title>Fast Login | Fast Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/vendor.min.css" rel="stylesheet" />
    <link href="css/app.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="css/jquery-jvectormap.css" rel="stylesheet" />
    <link href="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.css" rel="stylesheet" />
</head>
<body class="pace-done pace-top app-init">
    <div id="app" class="app app-full-height app-without-header">
        <div class="login">
            <div class="login-content">
                <form method="POST">
                    <img src="../forimages/fastpanel.png" style="width:100%;">
                    <br>
                    <br>
                    <?php if ($error): ?>
                        <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Kullanıcı Adı <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control form-control-lg bg-inverse bg-opacity-5" value="<?= htmlspecialchars($username) ?>" placeholder="">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <label class="form-label">Şifre <span class="text-danger">*</span></label>
                        </div>
                        <input type="password" name="password" class="form-control form-control-lg bg-inverse bg-opacity-5" value="" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Giriş Yap</button>
                    <div class="text-center text-inverse text-opacity-50">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
