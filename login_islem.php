<?php
// login_islem.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Formdan gelen verileri alıyoruz
    $email = trim($_POST['email']);
    $sifre = trim($_POST['sifre']);

    $dogru_email = "efe.ersoy@ogr.sakarya.edu.tr"; 
    $dogru_sifre = "b251210104"; 

    // E-posta ve şifre doğrulaması
    if ($email === $dogru_email && $sifre === $dogru_sifre) {
        // Giriş Başarılı
?>
        <!DOCTYPE html>
        <html lang="tr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Hoşgeldiniz</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="text-center">
                <div class="alert alert-success shadow" role="alert" style="padding: 40px 60px;">
                    <h1 class="display-4 mb-3">Hoşgeldiniz <?php echo htmlspecialchars($sifre); ?></h1>
                    <p class="lead mb-4">Sisteme başarıyla giriş yaptınız.</p>
                    <a href="index.html" class="btn btn-outline-success">Ana Sayfaya Dön</a>
                </div>
            </div>
        </body>
        </html>
<?php
    } else {
        // Giriş Başarısız: Kullanıcıyı hata parametresiyle login sayfasına geri gönderiyoruz
        header("Location: login.html?hata=1");
        exit();
    }
} else {
    // Sayfaya direkt girilmesini engelle
    header("Location: login.html");
    exit();
}
?>