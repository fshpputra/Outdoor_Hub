<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Pengiriman
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
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Pengiriman</a></li>
            </ol>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="table-default" class="table-responsive">
                    <table class="table" id="datatables">
                        <thead>
                        <tr>
                            <th><button class="table-sort" data-sort="sort-name">Tanggal Pengiriman</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Invoice</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Nama Pelanggan</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Email</button></th>
                            <th><button class="table-sort" data-sort="sort-name">No Handphone</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Alamat</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Status Pengiriman</button></th>
                        </tr>
                        </thead>
                        <tbody class="table-tbody">
                        <?php foreach($pengiriman as $row):?>
                            <tr>
                                <td class="sort-name"><?= date('d-m-Y', strtotime($row->tanggalPengiriman)); ?></td>
                                <td class="sort-name"><?= $row->invoice;?></td>
                                <td class="sort-name"><?= $row->nama;?></td>
                                <td class="sort-name"><?= $row->email;?></td>
                                <td class="sort-name"><?= $row->no_hp;?></td>
                                <td class="sort-name"><?= $row->alamatPengiriman;?></td>
                                <td class="sort-name">Rp.<?= number_format($row->jumlah); ?></td>
                                <td class="sort-name"><?= $row->statusPengiriman;?></td>
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
    document.getElementById("nav-pengiriman").className += " active";

    $(document).ready(function() {
        $('#datatables').DataTable();
    });

</script>


