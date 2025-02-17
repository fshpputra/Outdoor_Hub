<div class="hero-wrap ftco-degree-bg" style="background-image: url(<?= base_url('assets/user/image/bg_1.jpg')?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4">Fast &amp; Easy Way To Rent Outdoor Gear</h1>
                    <p style="font-size: 18px;">Temukan berbagai alat outdoor berkualitas tinggi untuk petualangan Anda. Mulai dari tenda, sepatu hiking, hingga peralatan camping.</p>

                    </a>
                    <a href="<?= base_url('Home/Gear')?>" class="btn btn-warning py-3 px-4">Explore Gear Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Featured Outdoor Gear</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    <?php foreach ($list as $row) : ?>
                        <div class="item">
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
                    <!-- Tambahkan item lainnya -->
                </div>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Services</span>
                <h2 class="mb-3">Our Premium Services</h2>
            </div>
        </div>
        <div class="row">

            <!-- Alat Camping Lengkap -->
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-campground text-light fa-3x"></i>
                    </div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Complete Camping Gear</h3>
                        <p>Kami menyediakan perlengkapan camping lengkap, dari tenda hingga peralatan memasak, untuk pengalaman outdoor yang nyaman.</p>
                    </div>
                </div>
            </div>

            <!-- Barang Dijamin Bagus -->
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-check-circle text-light fa-3x"></i>
                    </div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Guaranteed Quality</h3>
                        <p>Semua barang dalam kondisi prima dan sesuai deskripsi, memastikan kenyamanan dan keamanan saat digunakan.</p>
                    </div>
                </div>
            </div>

            <!-- Delivery -->
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-truck text-light fa-3x"></i>
                    </div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Fast & Reliable Delivery</h3>
                        <p>Kami menawarkan layanan antar jemput perlengkapan ke lokasi Anda, cepat dan tepat waktu.</p>
                    </div>
                </div>
            </div>

            <!-- Layanan Tambahan: Dukungan 24/7 -->
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-headset text-light fa-3x"></i>
                    </div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">24/7 Customer Support</h3>
                        <p>Tim kami siap membantu kapan saja jika Anda memiliki pertanyaan atau kendala saat menggunakan layanan kami.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="ftco-counter ftco-section img bg-light" id="section-counter">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="50">0</strong>
                        <span>Total <br>Category Gear</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="1090">0</strong>
                        <span>Total <br>Gear</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="2590">0</strong>
                        <span>Happy <br>Customers</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text d-flex align-items-center">
                        <strong class="number" data-number="67">0</strong>
                        <span>Total <br>Rent Outdoor Gear</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById("home").className += " active";
</script>
