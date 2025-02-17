<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(<?= base_url('assets/user/image/bg_3.jpg')?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animat pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('Home/Gear')?>">Gear <i class="ion-ios-arrow-forward"></i></a></span> <span>Detail Gear <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Detail Gear</h1>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5">
    <div class="row">
        <?php foreach ($list as $row) : ?>
        <div class="col-md-6">
            <img src="<?= base_url('upload/produk/' . $row->imageProduk); ?>" class="img-fluid rounded" alt="Tenda Camping">
        </div>
        <div class="col-md-6">
            <h2><?= $row->namaProduk; ?></h2>
            <p><strong>Kode:</strong> <?= $row->kodeProduk; ?></p>
            <p><strong>Harga:</strong> Rp.<?= number_format($row->hargaSewa); ?>/Hari</p>
            <p><strong>Deskripsi:</strong> <?= $row->deskripsi; ?></p>
            <p><strong>Gambar Terbaru:</strong> <?= date('d-m-Y', strtotime($row->updateAt)); ?></p>
            <h4>Spesifikasi:</h4>
            <ul>
                <li>Kapasitas: <?= $row->kapasitas; ?></li>
                <li>Warna: <?= $row->warna; ?></li>
                <li>Brand: <?= $row->merk; ?></li>
                <li>Kondisi : <?= $row->kondisi; ?></li>
            </ul>
            <a href="<?= base_url('Home/Keranjang_add/'.encrypt_url($row->idProduk))?>" class="btn btn-secondary py-2 mr-1">Masukan Keranjang</a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="mt-5">
        <h3>Ulasan Pelanggan</h3>
        <div class="border p-3 mb-3">
            <strong>Rizky</strong>
            <p>⭐⭐⭐⭐⭐</p>
            <p>Tenda sangat nyaman dan mudah dipasang!</p>
        </div>
        <div class="border p-3">
            <strong>Ani</strong>
            <p>⭐⭐⭐⭐</p>
            <p>Kualitas bagus, tapi agak berat untuk dibawa hiking.</p>
        </div>
    </div>
    <br>
</div>
<script>
    document.getElementById("gear").className += " active";
</script>
