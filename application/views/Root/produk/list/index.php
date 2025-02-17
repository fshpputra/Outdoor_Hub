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
    <div class="container-xl ">
        <div class="mb-3 d-flex justify-content-end">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="<?= base_url('Root/Dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">List Produk</a></li>
            </ol>
        </div>
        <div class="mb-3">
            <a href="<?= base_url('Root/Produk/list_add')?>" class="btn btn-facebook  btn-icon" aria-label="RSS">
                <!-- Download SVG icon from http://tabler-icons.io/i/rss -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div id="table-default" class="table-responsive">
                    <table class="table" id="datatables">
                        <thead>
                        <tr>
                            <th><button class="table-sort" data-sort="sort-name">Nama Produk</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Kode Produk</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Brand</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Kondisi</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Stok</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Harga Sewa</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Warna</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Kapasitas</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Kategori</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Action</button></th>
                        </tr>
                        </thead>
                        <tbody class="table-tbody">
                        <?php foreach($list as $row):?>
                            <tr>
                                <td class="sort-name"><?= $row->namaProduk;?></td>
                                <td class="sort-name"><?= $row->kodeProduk;?></td>
                                <td class="sort-name"><?= $row->merk;?></td>
                                <td class="sort-name"><?= $row->kondisi;?></td>
                                <td class="sort-name"><?= $row->stok;?></td>
                                <td class="sort-name"><?= number_format($row->hargaSewa);?></td>
                                <td class="sort-name"><?= $row->warna;?></td>
                                <td class="sort-name"><?= $row->kapasitas;?></td>
                                <td class="sort-name"><?= $row->nama_kategori;?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-icon btn-teal w-100"
                                           href="<?= base_url('Root/Produk/list_edit/') . encrypt_url($row->idProduk); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-pencil-minus"
                                                 width="24" height="24" viewBox="0 0 24 24"
                                                 stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                </path>
                                                <path
                                                    d="M8 20l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4h4z">
                                                </path>
                                                <path d="M13.5 6.5l4 4"></path>
                                                <path d="M16 18h4"></path>
                                            </svg>
                                        </a>
                                        <a class="btn btn-icon btn-red w-100 tombol-delete"
                                           href="<?= base_url('Root/Produk/list_delete/') . encrypt_url($row->idProduk); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-trash" width="24"
                                                 height="24" viewBox="0 0 24 24" stroke-width="2"
                                                 stroke="currentColor" fill="none" stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                </path>
                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                <path
                                                    d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12">
                                                </path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
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
    document.getElementById("nav-produk").className += " active";

    $(document).ready(function() {
        $('#datatables').DataTable();
    });
</script>


