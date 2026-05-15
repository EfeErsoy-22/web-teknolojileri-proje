document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("iletisimFormu");
    const btnTemizle = document.getElementById("btn-temizle");
    const btnGonderNative = document.getElementById("btn-gonder-native");

    // 1. Formu Temizleme İşlemi
    btnTemizle.addEventListener("click", function() {
        form.reset();
    });

    // 2. Native JS ile Doğrulama İşlemi
    btnGonderNative.addEventListener("click", function() {
        let hataMesaji = "";
        
        // Formdaki değerleri alıp başındaki/sonundaki boşlukları siler
        const isim = document.getElementById("isim").value.trim();
        const email = document.getElementById("email").value.trim();
        const konu = document.getElementById("konu").value;
        const mesaj = document.getElementById("mesaj").value.trim();
        const onay = document.getElementById("onay").checked;

        // İsim kontrolü
        if (isim === "") {
            hataMesaji += "• Lütfen adınızı ve soyadınızı girin.\n";
        }
        
        // E-posta format kontrolü (Regex kullanarak içinde @ ve . var mı diye bakıyoruz)
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "") {
            hataMesaji += "• Lütfen e-posta adresinizi girin.\n";
        } else if (!emailRegex.test(email)) {
            hataMesaji += "• Lütfen geçerli bir e-posta adresi girin (Örn: ad@domain.com).\n";
        }

        // Konu seçimi kontrolü
        if (konu === "") {
            hataMesaji += "• Lütfen açılır menüden bir konu seçin.\n";
        }

        // Mesaj kontrolü
        if (mesaj === "") {
            hataMesaji += "• Lütfen mesajınızı yazın.\n";
        }

        // Onay kutusu kontrolü
        if (!onay) {
            hataMesaji += "• Lütfen veri işleme onay kutusunu işaretleyin.\n";
        }

        // Sonuç: Hata varsa Alert ile göster, hata yoksa PHP sayfasına gönder
        if (hataMesaji !== "") {
            alert("Lütfen formdaki eksiklikleri giderin:\n\n" + hataMesaji);
        } else {
            // Her şey tamamsa formu çalıştır ve PHP'ye gönder
            form.submit();
        }
    });
});