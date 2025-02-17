<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(<?= base_url('assets/user/image/bg_3.jpg')?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('Home')?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Gear <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Pilih Alat yang ingin disewa</h1>
            </div>
        </div>
    </div>
</section>

<div class="container mt-4">

    <div class="row mb-4">
        <div class="col-md-2">
            <select class="form-control">
                <option selected>Filter Kategori</option>
                <option value="1">Tenda</option>
                <option value="2">Backpack</option>
                <option value="3">Matras</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option selected>Filter Harga</option>
                <option value="1">Termurah</option>
                <option value="2">Termahal</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option selected>Filter Rating</option>
                <option value="1">4+ Bintang</option>
                <option value="2">3+ Bintang</option>
            </select>
        </div>
        <div class="col-md-6 mx-auto">
            <div class="input-group rounded">
                <input type="text" class="form-control rounded-pill" placeholder="Cari peralatan outdoor...">
            </div>
        </div>
    </div>
</div>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <?php foreach ($list as $row) : ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end" style="background-image: url('<?= base_url('upload/produk/' . $row->imageProduk); ?>');">
                        </div>
                        <div class="text">
                            <h2 class="mb-0"><a href="#"><?= $row->namaProduk; ?></a></h2>
                            <div class="d-flex mb-3">
                                <span class="cat"><?= $row->nama_kategori; ?></span>
                                <p class="price ml-auto">Rp.<?= number_format($row->hargaSewa); ?> <span>/Hari</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block">
                                <a href="<?= base_url('Home/Keranjang_add/'.encrypt_url($row->idProduk))?>" class="btn btn-warning py-2 mr-1">Book now</a>
                                <a href="<?= base_url('Home/Gear_detail/'). encrypt_url($row->idProduk);?>" class="btn btn-secondary py-2 ml-1">Details</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    document.getElementById("gear").className += " active";
</script>
