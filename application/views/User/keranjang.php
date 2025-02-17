<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(<?= base_url('assets/user/image/bg_3.jpg')?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('Home')?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Keranjang <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Keranjang Anda</h1>
            </div>
        </div>
    </div>
</section>

<!-- Program keranjang Disini -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form method="POST" action="<?= base_url('Home/Proses_Transaksi') ?>">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="text-left">Produk</th>
                                        <th scope="col" class="text-center">Harga</th>
                                        <th scope="col" class="text-center">Durasi</th>
                                        <th scope="col" class="text-center">Total</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($keranjang as $row) : ?>
                                        <tr>
                                            <td class="text-left">
                                                <div class="d-flex align-items-center ml-2">
                                                    <img src="<?= base_url('upload/produk/' . $row->imageProduk); ?>" alt="Tenda Camping" class="img-fluid rounded mr-3" style="width: 80px; height: 80px;">
                                                    <div>
                                                        <h5 class="mb-1"><?= $row->namaProduk; ?></h5>
                                                        <p class="mb-0 text-muted">Kapasitas: <?= $row->kapasitas; ?>, Warna: <?= $row->warna; ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">Rp.<?= number_format($row->hargaSewa); ?></td>
                                            <td class="text-center align-middle">
                                                <div class="input-group mx-auto" style="width: 120px;">
                                                    <input type="number" class="form-control text-center" name="jumlah[<?= $row->idProduk ?>]" value="1" min="1" max="30">
                                                </div>
                                            </td>
                                            <td class="text-center align-middle"></td>
                                            <td class="text-center align-middle">
                                                <a class="btn btn-danger btn-sm tombol-delete" href="<?= base_url('Home/Keranjang_delete/') . encrypt_url($row->idKeranjang); ?>"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="font-weight-bold">Subtotal</span>
                                                <span class="font-weight-bold" id="subtotal">Rp 0</span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="font-weight-bold">Diskon</span>
                                                <span class="font-weight-bold" id="discount">Rp 0</span>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <span class="font-weight-bold">Total</span>
                                                <span class="font-weight-bold text-warning" id="total">Rp 0</span>
                                            </div>
                                            <div class="text-right mt-3">
                                                <button type="submit" class="btn btn-warning btn-lg">
                                                    Proses Checkout <i class="fas fa-arrow-right ml-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById("keranjang").className += " active";
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cartTable = document.querySelector("table tbody");
        const subtotalElement = document.getElementById("subtotal");
        const discountElement = document.getElementById("discount");
        const totalElement = document.getElementById("total");

        function updateTotal() {
            let subtotal = 0;
            let discount = parseInt(discountElement?.textContent.replace(/[^0-9]/g, "")) || 0;

            cartTable.querySelectorAll("tr").forEach(row => {
                const priceElement = row.querySelector("td:nth-child(2)");
                const durationInput = row.querySelector("td:nth-child(3) input");
                const totalPerItemElement = row.querySelector("td:nth-child(4)");

                if (priceElement && durationInput && totalPerItemElement) {
                    const price = parseInt(priceElement.textContent.replace(/[^0-9]/g, "")) || 0;
                    const duration = parseInt(durationInput.value) || 1;

                    const total = price * duration;
                    totalPerItemElement.textContent = `Rp ${total.toLocaleString()}`;
                    subtotal += total;
                }
            });

            subtotalElement.textContent = `Rp ${subtotal.toLocaleString()}`;
            const finalTotal = subtotal - discount;
            totalElement.textContent = `Rp ${finalTotal.toLocaleString()}`;
        }

        cartTable.addEventListener("input", function (event) {
            if (event.target.tagName === "INPUT" && event.target.type === "number") {
                updateTotal();
            }
        });

        updateTotal();
    });

</script>
