<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(<?= base_url('assets/user/image/bg_3.jpg')?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('Home/Keranjang')?>">Keranjang <i class="ion-ios-arrow-forward"></i></a></span> <span>Checkout <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Checkout</h1>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Section -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning">
                        <h4 class="mb-0 text-white">Metode Pengambilan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <p class="text-danger font-weight-bold">
                                * Tanggal pengiriman atau tanggal pengambilan ke store bisa di kirimkan atau di ambil -1 hari sebelum tanggal mulai.
                            </p>
                            <div class="form-group mt-3">
                                <label for="startDate">Tanggal Mulai</label>
                                <input type="date" id="startDate" name="tanggal_mulai" class="form-control">
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="pickup" name="delivery_method" value="pickup" class="custom-control-input" checked>
                                <label class="custom-control-label" for="pickup">Ambil Sendiri (Pickup)</label>
                            </div>
                            <div class="custom-control custom-radio mt-2">
                                <input type="radio" id="delivery" name="delivery_method" value="delivery" class="custom-control-input">
                                <label class="custom-control-label" for="delivery">Antar ke Alamat (Delivery)</label>
                            </div>
                        </div>
                        <div id="deliveryAddress" class="mt-3" style="display: none;">
                            <div class="form-group">
                                <label for="address">Alamat Lengkap</label>
                                <textarea id="address" name="address" class="form-control" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="distance">Ongkos</label>
                                <input type="number" id="distance" name="delivery_cost" class="form-control" placeholder="FREE DELIVERY" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <?php foreach ($pesanan as $row) : ?>
                    <div class="card shadow-sm">
                        <div class="card-header bg-warning">
                            <h4 class="mb-0 text-white">Rincian Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>Rp.<?= number_format($row->total_harga); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Biaya Pengiriman</span>
                                <span id="deliveryCost">Rp.0</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Total</span>
                                <span class="font-weight-bold text-warning" id="totalCost">Rp.<?= number_format($row->total_harga); ?></span>
                            </div>
                            <input type="hidden" id="total_price" name="total_price" value="<?= $row->total_harga; ?>">
                            <input type="hidden" id="order_id" name="order_id" value="<?= $row->invoice; ?>">
                            <input type="hidden" id="id" name="id" value="<?= $row->idPesanan; ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8 text-right">
                <button id="checkoutButton" class="btn btn-warning btn-lg">Proses Pembayaran <i class="fas fa-arrow-right ml-2"></i></button>
            </div>
        </div>
    </div>
</section>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-QFYceXSuSUvOEbpG">
</script>
<script>
    document.getElementById("keranjang").className += " active";
</script>

<script>
    $(document).ready(function () {
        $('input[name="delivery_method"]').change(function () {
            if ($(this).val() === 'delivery') {
                $('#deliveryAddress').show();
            } else {
                $('#deliveryAddress').hide();
            }
        });

        $('#checkoutButton').click(function () {
            let totalHarga = $('#total_price').val();
            let orderID = $('#order_id').val();
            let id = $('#id').val();
            let deliveryMethod = $('input[name="delivery_method"]:checked').val();
            let address = deliveryMethod === 'delivery' ? $('#address').val() : null;
            let tanggalMulai = $("#startDate").val();

            $.ajax({
                url: "<?= base_url('Home/Process_payment') ?>",
                method: "POST",
                data: {
                    order_id: orderID,
                    id: id,
                    total_price: totalHarga,
                    delivery_method: deliveryMethod,
                    address: address,
                    tanggal_mulai: tanggalMulai
                },
                dataType: "json", // Pastikan respons diolah sebagai JSON
                success: function (response) {
                    if (response.snapToken) {
                        snap.pay(response.snapToken, {
                            onSuccess: function (result) {
                                alert("Pembayaran berhasil!");
                                window.location.href = "<?= base_url('Home/Account') ?>";
                            },
                            onPending: function (result) {
                                alert("Menunggu pembayaran...");
                            },
                            onError: function (result) {
                                alert("Pembayaran gagal!");
                            }
                        });
                    } else {
                        alert("snapToken tidak ditemukan dalam response.");
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    alert("Terjadi kesalahan dalam proses pembayaran.");
                }
            });

        });
    });
</script>
