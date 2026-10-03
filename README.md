# Pozitif Kitap & Kırtasiye - Web Platformu ve Online Tasarım Stüdyosu

Bu proje, **Pozitif Kitap & Kırtasiye** için geliştirdiğim kapsamlı bir kurumsal web platformu ve etkileşimli online tasarım stüdyosudur. Kullanıcıların kırtasiye ve kitap ürünlerini inceleyebileceği, kurumsal bilgi edinebileceği ve web tarayıcısı üzerinden özel tasarım yapıp kaydedebileceği modüler bir sistem olarak tasarladım.

---

## 📌 Proje Hakkında

Geleneksel bir tanıtım sitesinin ötesine geçerek, müşterilerin kendi defter kapağı, etiket veya kişiselleştirilmiş kırtasiye tasarımlarını tarayıcı üzerinde oluşturup sisteme kaydedebilecekleri bir **Online Tasarım Stüdyosu** entegre ettim. Sistem, kullanıcı kimlik doğrulamasından tasarım kaydetmeye, filtreli ürün kataloğundan profil yönetimine kadar uçtan uca çalışır durumdadır.

---

## 🚀 Öne Çıkan Özellikler

### 1. Etkileşimli Tasarım Stüdyosu (Fabric.js Tabanlı)
- **Kanvas Yönetimi:** Çizim alanında sürükle-bırak, boyutlandırma ve döndürme kontrolleri.
- **Bileşenler ve Şekiller:** Dikdörtgen, daire, üçgen ve çizgi gibi temel geometrik formlar.
- **Zengin Metin Editörü:** Başlık, alt başlık ve gövde metni ekleme; font ailesi, metin rengi ve stil düzenleme.
- **Görsel Yükleme:** Kullanıcının kendi cihazından kanvasa görsel yükleyebilmesi.
- **Hazır İkon ve Çıkartmalar:** Hızlı tasarım için kategorize edilmiş vektörel ikonlar.
- **Katman Kontrolü:** Objeleri öne getirme veya arkaya gönderme.
- **Kaydetme & İndirme:** Tasarımları yüksek çözünürlüklü PNG formatında sunucuya yükleme ve profil üzerinden indirme.

### 2. Kullanıcı & Profil Yönetimi
- Güvenli kayıt (`register.php`) ve oturum açma (`login.php`) altyapısı (`password_hash` & `password_verify`).
- Oturum (Session) tabanlı yetkilendirme ve güvenli çıkış (`logout.php`).
- Kullanıcıya özel profil paneli (`profil.php`):
  - Kaydedilen tüm tasarımların kartlar halinde listelenmesi.
  - Tasarımın oluşturulma tarihi ve önizlemesi.
  - Tasarımı tek tıkla silme (`delete_design.php`) veya indirme.

### 3. Dinamik Ürün Kataloğu
- Kategori bazlı anlık filtreleme (Kitap, Kırtasiye, Ofis, Sanatsal).
- JavaScript destekli gerçek zamanlı ürün arama kutusu.
- Duyarlı (responsive) ızgara görünümü ve modern ürün kartları.

### 4. Hibrit / Akıllı Veritabanı Mimarisi
Geliştirme ve test süreçlerini kolaylaştırmak amacıyla çift katmanlı PDO veritabanı yapısı kurdum:
- **MySQL (Varsayılan):** Canlı ve yerel XAMPP ortamı için tam MySQL desteği.
- **SQLite Fallback:** Eğer MySQL servisi kapalıysa veya yapılandırılmamışsa, sistem otomatik olarak yerel `includes/pozitif_db.sqlite` veritabanına geçiş yapar. Bu sayede proje hiçbir veritabanı ayarı yapmadan da klonlanıp anında test edilebilir.
- **Otomatik Şema Başlatıcı:** Gerekli tablolar (`users`, `designs`) ilk bağlantıda otomatik oluşturulur.

---

## 🛠️ Kullanılan Teknolojiler

| Alan | Teknoloji / Kütüphane | Açıklama |
| :--- | :--- | :--- |
| **Backend** | PHP 8.x | Saf (Vanilla) PHP mimarisi, modüler include yapısı |
| **Veritabanı** | MySQL / SQLite | PDO ile güvenli sorgular (Prepared Statements) |
| **Frontend** | HTML5, CSS3, JavaScript (ES6+) | Modern flexbox/grid, CSS değişkenleri |
| **Canvas Motoru** | Fabric.js (v5) | Vektörel ve interaktif kanvas manipülasyonu |
| **İkonlar & Font** | Font Awesome 6, Google Fonts | Outfit & Inter tipografisi |

---

## 📂 Proje Dizin Yapısı

```plaintext
Pozitif/
├── assets/                 # Proje görselleri ve tasarım varlıkları
│   ├── hero.png
│   └── stationery.png
├── css/
│   └── style.css           # Global tasarım sistemi ve responsive stiller
├── includes/
│   ├── db.php              # PDO bağlantı yöneticisi ve SQLite fallback
│   ├── header.php          # Dinamik üst menü ve kullanıcı oturum alanı
│   ├── footer.php          # Alt bilgi ve site bağlantıları
│   └── pozitif_db.sqlite   # Geliştirme ortamı SQLite veritabanı
├── index.php               # Ana sayfa ve kurumsal tanıtım
├── urunler.php             # Filtrelenebilir ürün kataloğu
├── tasarim.php             # Fabric.js online tasarım stüdyosu
├── save_design.php         # Kanvas çıktısını sunucuya kaydeden API
├── delete_design.php       # Tasarım silme işleyicisi
├── profil.php              # Kullanıcı paneli ve kaydedilen tasarımlar
├── login.php               # Kullanıcı giriş ekranı
├── register.php            # Yeni üye kayıt formu
├── logout.php              # Oturum sonlandırma
├── hakkimizda.php          # Kurumsal hakkımızda sayfası
├── iletisim.php            # İletişim formu ve mağaza bilgileri
├── create_demo_user.php    # Hızlı test için örnek kullanıcı oluşturucu
└── README.md               # Proje dokümantasyonu
```

---

## ⚙️ Kurulum ve Çalıştırma

Projeyi yerel makinenizde çalıştırmak için iki pratik yöntem bulunmaktadır:

### Yöntem 1: PHP Dahili Sunucusu ile Hızlı Başlangıç (Önerilen)
SQLite fallback özelliği sayesinde ekstra bir MySQL yapılandırmasına gerek kalmadan doğrudan çalıştırabilirsiniz:

1. Proje ana dizininde terminali açın:
   ```bash
   php -S localhost:8000
   ```
2. Tarayıcınızda açın:
   ```text
   http://localhost:8000
   ```

### Yöntem 2: XAMPP / WampServer ile Çalıştırma
1. Proje klasörünü `htdocs` (veya WAMP için `www`) dizinine kopyalayın.
2. Apache ve MySQL servislerini başlatın.
3. phpMyAdmin üzerinden `pozitif_db` adında boş bir veritabanı oluşturun (Tablolar ilk sayfa yüklemesinde otomatik oluşturulacaktır).
4. Farklı bir MySQL şifreniz varsa `includes/db.php` dosyasındaki `$username` ve `$password` alanlarını güncelleyin.
5. Tarayıcınızda `http://localhost/Pozitif/` adresine gidin.

### Test Kullanıcısı ile Giriş
Dilerseniz doğrudan `register.php` üzerinden yeni bir hesap açabilir veya test için terminalden demo kullanıcı oluşturabilirsiniz:
```bash
php create_demo_user.php
```

---

## 🔒 Güvenlik Yaklaşımı

- **SQL Injection Koruması:** Tüm veritabanı işlemlerinde PDO `prepare` ve `execute` yöntemleri kullanıldı.
- **Parola Güvenliği:** Kullanıcı şifreleri veritabanında asla düz metin olarak tutulmaz; PHP'nin güncel `PASSWORD_BCRYPT` algoritmasıyla hashlenerek saklanır.
- **XSS Koruması:** Kullanıcı girdileri ve ekrana basılan veriler `htmlspecialchars` ile filtrelenir.
- **Yetkilendirme:** Tasarım stüdyosu ve profil sayfaları oturum kontrolüyle güvence altına alınmıştır.

---

## 👤 Geliştirici

**Oğuzhan**  
Web Geliştirici & Tasarımcı  
*Sorularınız veya geri bildirimleriniz için iletişime geçebilirsiniz.*
