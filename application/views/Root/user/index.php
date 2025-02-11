<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    List Users
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
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Users</a></li>
            </ol>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="table-default" class="table-responsive">
                    <table class="table" id="datatables">
                        <thead>
                        <tr>
                            <th><button class="table-sort" data-sort="sort-name">Create</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Nama</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Email</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Password</button></th>
                            <th><button class="table-sort" data-sort="sort-name">No Handphone</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Alamat</button></th>
                        </tr>
                        </thead>
                        <tbody class="table-tbody">
                        <?php foreach($list as $row):?>
                            <?php
                            $dec       = new Opensslencryptdecrypt;
                            $newpass  = $dec->decrypt($row->password);
                            ?>
                            <tr>
                                <td class="sort-name"><?= $row->nama;?></td>
                                <td class="sort-name"><?= $row->email;?></td>
                                <td class="sort-name"><?= $newpass;?></td>
                                <td class="sort-name"><?= $row->no_hp;?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal modal-blur fade" id="modal_log" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Log Subscribe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th><button class="table-sort" data-sort="sort-name">Actived</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Token</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Reseller</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Subscribe</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Expired</button></th>
                        </tr>
                        </thead>
                        <tbody class="table-tbody" id="draw_log">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("nav-users").className += " active";

    $(document).ready(function() {
        $('#datatables').DataTable();
    });

</script>