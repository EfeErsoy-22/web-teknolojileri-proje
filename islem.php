<?php
// islem.php

// Sayfaya form doldurulmadan doğrudan girilmesini engelliyoruz
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Formdan gelen verileri alıyoruz
    // Eğer bir alan boş gelirse 'Belirtilmedi' yaz
    $isim = isset($_POST['isim']) ? $_POST['isim'] : 'Belirtilmedi';
    $email = isset($_POST['email']) ? $_POST['email'] : 'Belirtilmedi';
    $konu = isset($_POST['konu']) ? $_POST['konu'] : 'Belirtilmedi';
    $cinsiyet = isset($_POST['cinsiyet']) ? $_POST['cinsiyet'] : 'Belirtilmedi';
    $mesaj = isset($_POST['mesaj']) ? $_POST['mesaj'] : 'Belirtilmedi';

    // Güvenlik (XSS) Önlemi
    $isim = htmlspecialchars($isim);
    $email = htmlspecialchars($email);
    $konu = htmlspecialchars($konu);
    $cinsiyet = htmlspecialchars($cinsiyet);
    $mesaj = htmlspecialchars($mesaj);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efe Ersoy - Form Sonucu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white text-center">
                        <h3 class="mb-0">Mesajınız Başarıyla İletildi</h3>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title text-center mb-4">Gönderilen Bilgiler:</h5>
                        
                        <table class="table table-bordered table-striped mt-3">
                            <tr>
                                <th style="width: 30%;">İsim Soyisim</th>
                                <td><?php echo $isim; ?></td>
                            </tr>
                            <tr>
                                <th>E-posta</th>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <th>Konu</th>
                                <td><?php echo $konu; ?></td>
                            </tr>
                            <tr>
                                <th>Cinsiyet</th>
                                <td><?php echo $cinsiyet; ?></td>
                            </tr>
                            <tr>
                                <th>Mesaj</th>
                                <td><?php echo nl2br($mesaj); ?></td>
                            </tr>
                        </table>
                        
                        <div class="text-center mt-4">
                            <a href="iletisim.html" class="btn btn-outline-dark">İletişim Sayfasına Geri Dön</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php
} else {
    // Eğer biri islem.php'ye URL çubuğundan direkt yazarak girmeye çalışırsa:
    echo "<h2 style='color:red; text-align:center; margin-top:50px;'>Hata: Bu sayfaya doğrudan erişim izniniz yok. Lütfen iletişim formunu kullanın.</h2>";
}
?>