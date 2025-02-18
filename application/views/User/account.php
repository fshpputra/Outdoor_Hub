<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(<?= base_url('assets/user/image/bg_3.jpg')?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('Home')?>">Home<i class="ion-ios-arrow-forward"></i></a></span> <span>Account <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Account</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light d-flex justify-content-center align-items-center ftco-animate">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row no-gutters shadow rounded p-1">
                    <!-- Form Profil Akun -->
                    <div class="col-md-12 d-flex align-items-center">
                        <form action="#" class="request-form ftco-animate bg-light p-4 rounded w-100">
                            <h2 class="text-center text-dark">Profil Akun</h2>
                            <div class="form-group">
                                <label class="label text-dark">Nama</label>
                                <input type="text" class="form-control" placeholder="Nama Lengkap" value="<?= $akun->nama;?>">
                            </div>
                            <div class="form-group">
                                <label class="label text-dark">No. Telepon</label>
                                <input type="tel" class="form-control" placeholder="Nomor Telepon" value="<?= $akun->no_hp;?>">
                            </div>
                            <div class="form-group">
                                <label class="label text-dark">Email</label>
                                <input type="email" class="form-control" placeholder="Masukkan Email Anda" value="<?= $akun->email;?>">
                            </div>
                            <?php
                            $dec       = new Opensslencryptdecrypt;
                            $newpass  = $dec->decrypt($akun->password);
                            ?>
                            <div class="form-group">
                                <label class="label text-dark">Password</label>
                                <input type="password" class="form-control" placeholder="" value="<?= $newpass;?>">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Simpan Perubahan" class="btn btn-secondary py-3 px-4">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bagian Pesanan Saya -->
<section class="ftco-section bg-light ftco-animate">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row no-gutters shadow rounded p-4">
                    <h2 class="text-center text-dark mb-4">Pesanan Saya</h2>
                    <?php foreach ($detail as $invoice => $row): ?>
                        <!-- Daftar Pesanan -->
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Pesanan <?= $row['invoice']; ?></h5>
                                    <p class="card-text"><strong>Tanggal Pesan:</strong> <?= $row['tanggal']; ?></p>
                                    <p class="card-text"><strong>Status:</strong> <?= $row['status']; ?></p>
                                    <button class="btn btn-secondary btn-sm" data-toggle="collapse" data-target="#detailPesanan<?= $invoice; ?>">Lihat Detail</button>
                                    <div id="detailPesanan<?= $invoice; ?>" class="collapse mt-3">
                                        <p><strong>Detail Pesanan:</strong></p>
                                        <ul>
                                            <?php foreach ($row['items'] as $item): ?>
                                                <li><?= $item['namaProduk']; ?> - <?= $item['jumlah']; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <p><strong>Total Harga:</strong> Rp.<?= number_format($row['total_harga']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
