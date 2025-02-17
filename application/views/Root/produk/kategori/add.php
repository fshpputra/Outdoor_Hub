<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Category Produk
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="mb-3 d-flex justify-content-end">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="<?= base_url('Root/Dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('Root/Produk/kategori') ?>">Category Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Add</a></li>
            </ol>
        </div>
        <form class="card" method="post" action="<?= base_url('Root/Produk/kategori_add')?>" enctype="multipart/form-data">
            <div class="card-header">
                <h3 class="card-title">Add</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">Nama Kategori</label>
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div>
                        <input type="text" class="form-control" aria-describedby="nama" placeholder="Contoh : Backpack"
                               name="nama" value="<?= set_value('nama')?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="image">Image</label>
                    <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                    <input type="file" class="form-control" id="image" name="image"
                           accept="image/jpg, image/jpeg, image/png, image/webp"
                           required>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary" id="b-submit" onclick="submitButton()">Tambah</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById("nav-produk").className += " active";
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $("#file-upload").change(function() {
        $("#file-name").text(this.files[0].name);
    });
</script>
<script>
    function submitButton() {
        document.getElementById("b-submit").className += " disabled";
    }
</script>
