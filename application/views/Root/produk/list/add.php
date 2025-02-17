<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    List Produk
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
                <li class="breadcrumb-item"><a href="<?= base_url('Root/Produk/list') ?>">List Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit</a></li>
            </ol>
        </div>
        <form class="card" method="post" action="<?= base_url('Root/Produk/list_add')?>" enctype="multipart/form-data">
            <div class="card-header">
                <h3 class="card-title">Add</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">Nama Produk</label>
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div>
                        <input type="text" class="form-control" aria-describedby="nama" placeholder="Contoh : Backpack"
                               name="nama" value="<?= set_value('nama')?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Kode Produk</label>
                    <?= form_error('code', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" aria-describedby="code" id="code" placeholder="Contoh : GEAR-XXXXX"
                               name="code" value="<?= set_value('code') ?>">
                        <button class="btn btn-secondary" type="button" onclick="generateCODE()">Generate!</button>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required">Brand</label>
                    <?= form_error('brand', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div>
                        <input type="text" class="form-control" aria-describedby="brand" placeholder="Contoh : Nike"
                               name="brand" value="<?= set_value('brand')?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Kondisi</label>
                    <?= form_error('grade', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div>
                        <input type="text" class="form-control" aria-describedby="grade" placeholder="Contoh : Kondisi Bagus"
                               name="grade" value="<?= set_value('grade')?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Stok</label>
                    <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div>
                        <input type="number" class="form-control" aria-describedby="stok" placeholder="Contoh : 100"
                               name="stok" value="<?= set_value('stok')?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Harga Sewa</label>
                    <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div>
                        <input type="text" class="form-control" aria-describedby="harga" id="tanpa-rupiahA" placeholder="Contoh : 50,000"
                               name="harga" value="<?= set_value('harga')?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Warna</label>
                    <?= form_error('warna', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div>
                        <input type="text" class="form-control" aria-describedby="warna" placeholder="Contoh : Kuning"
                               name="warna" value="<?= set_value('warna')?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Kapasitas</label>
                    <?= form_error('kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div>
                        <input type="text" class="form-control" aria-describedby="kapasitas" placeholder="Contoh : 2 Orang"
                               name="kapasitas" value="<?= set_value('kapasitas')?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Kategori</label>
                    <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div>
                        <select class="form-select ps-12" aria-label="Select example" name="kategori">
                            <option value="">Select Kategori</option>
                            <?php foreach($category as $row):?>
                                <?php if($row->idKategori):?>
                                    <option value="<?= $row->idKategori?>" <?= set_value('kategori') == $row->idKategori ? 'selected' : '' ?>><?= $row->nama_kategori?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Deskripsi</label>
                    <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div>
                        <textarea class="form-control" name="deskripsi"></textarea>
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
<script>
    function makeid(length) {
        var result = '';
        var characters = '0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() *
                charactersLength));
        }
        return result;
    }
    function generateCODE() {
        var generate = makeid(5);
        document.getElementById("code").value = "GEAR-" + generate;
    }
</script>

