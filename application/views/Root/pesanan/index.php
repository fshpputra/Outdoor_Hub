<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Pesanan
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl ">
        <div class="mb-3 d-flex justify-content-end">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="<?= base_url('Root/Dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Pesanan</a></li>
            </ol>
        </div>
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="<?= base_url('Root/Pesanan')?>" class="nav-link active">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Root/Pesanan/detail_pesanan')?>" class="nav-link">Detail Pesanan</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div id="table-default" class="table-responsive">
                    <table class="table" id="datatables">
                        <thead>
                        <tr>
                            <th><button class="table-sort" data-sort="sort-name">Tanggal Transaksi</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Invoice</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Nama Pelanggan</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Email</button></th>
                            <th><button class="table-sort" data-sort="sort-name">No Handphone</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Total Harga</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Status Transaksi</button></th>
                        </tr>
                        </thead>
                        <tbody class="table-tbody">
                        <?php foreach($pesanan as $row):?>
                            <tr>
                                <td class="sort-name"><?= date('d-m-Y', strtotime($row->tanggal)); ?></td>
                                <td class="sort-name"><?= $row->invoice;?></td>
                                <td class="sort-name"><?= $row->nama;?></td>
                                <td class="sort-name"><?= $row->email;?></td>
                                <td class="sort-name"><?= $row->no_hp;?></td>
                                <td class="sort-name">Rp.<?= number_format($row->total_harga); ?></td>
                                <td class="sort-name"><?= $row->status;?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    document.getElementById("nav-pesanan").className += " active";

    $(document).ready(function() {
        $('#datatables').DataTable();
    });

</script>
