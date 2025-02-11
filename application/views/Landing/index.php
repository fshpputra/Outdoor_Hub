<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outdoor Hub</title>
    <link rel="stylesheet" href="style.css">
    <link href="<?= base_url('assets/')?>user/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<!-- Navigation -->
<header>
    <nav>
        <div class="logo">
            <img src="<?= base_url('assets/')?>user/image/logo_trans.png" alt="Logo" class="navbar-logo">
        </div>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Produk</a></li>
            <li><a href="">Tentang</a></li>
            <li><a href="">Login</a></li>
        </ul>
    </nav>
</header>

<!-- Search Bar Section -->
<section class="search-section" style="background-image: url('<?= base_url('assets/')?>user/image/bgsearch.jpg');">
    <div class="search-container">
        <input type="text" placeholder="Cari produk...">
        <button>Search</button>
    </div>
</section>

<!-- Home Page -->
<main id="home">
    <!-- Categories Section -->
    <section class="categories">
        <h2>Kategori Produk</h2>
        <div class="category-grid">
            <a href="produk.html?category=tenda" class="category-item">
                <img src="<?= base_url('assets/')?>user/image/bgsearch.jpg" alt="Tenda" class="category-img">
                <p>Peralatan Tenda</p>
            </a>
            <a href="produk.html?category=backpack" class="category-item">
                <img src="<?= base_url('assets/')?>user/image/bgsearch.jpg" alt="Backpack" class="category-img">
                <p>Backpack</p>
            </a>
            <a href="produk.html?category=outdoor-set" class="category-item">
                <img src="<?= base_url('assets/')?>user/image/bgsearch.jpg" alt="Outdoor Set" class="category-img">
                <p>Outdoor Set</p>
            </a>
            <a href="produk.html?category=footwear" class="category-item">
                <img src="<?= base_url('assets/')?>user/image/bgsearch.jpg" alt="Footwear" class="category-img">
                <p>Footwear</p>
            </a>
            <a href="produk.html?category=jacket" class="category-item">
                <img src="<?= base_url('assets/')?>user/image/bgsearch.jpg" alt="Jacket" class="category-img">
                <p>Jacket</p>
            </a>
            <a href="produk.html?category=cooking-set" class="category-item">
                <img src="<?= base_url('assets/')?>user/image/bgsearch.jpg" alt="Cooking Set" class="category-img">
                <p>Cooking Set</p>
            </a>
        </div>
        <a href="produk.html" class="btn-see-all">Lihat Semua Produk</a>
    </section>

    <!-- Recommended Camping Items Section -->
    <section class="recommended">
        <h2>Rekomendasi Produk Camping</h2>
        <div class="recommendation-grid">
            <div class="recommendation-item">
                <img src="<?= base_url('assets/')?>user/image/bgsearch.jpg" alt="Produk 1" class="recommendation-img">
                <p>Produk Camping 1</p>
            </div>
            <div class="recommendation-item">
                <img src="<?= base_url('assets/')?>user/image/bgsearch.jpg" alt="Produk 2" class="recommendation-img">
                <p>Produk Camping 2</p>
            </div>
            <div class="recommendation-item">
                <img src="<?= base_url('assets/')?>user/image/bgsearch.jpg" alt="Produk 3" class="recommendation-img">
                <p>Produk Camping 3</p>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h4>Basecamp</h4>
            <p>Jl. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</p>
        </div>
        <div class="footer-section">
            <h4>Hubungi Kami</h4>
            <p><a href="https://wa.me/123456789"><i class="fab fa-whatsapp"></i> WA: 083121092001</a></p>
            <p><a href="mailto:info@outdoorhub.com"><i class="fas fa-envelope"></i> Email: info@outdoorhub.com</a></p>
        </div>
        <div class="footer-section">
            <h4>Informasi</h4>
            <p><a href="tentang.html">Tentang</a></p>
            <p><a href="akun.html">Akun</a></p>
        </div>
        <div class="footer-section">
            <h4>Media Sosial</h4>
            <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
    <div class="footer-bottom">
        <p class="copyright">Outdoor Hub @2024. All right reserved outdoorhub.co.id</p>
    </div>
</footer>


</body>
</html>

