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
                            <th><button class="table-sort" data-sort="sort-name">Nama</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Email</button></th>
                            <th><button class="table-sort" data-sort="sort-name">Password</button></th>
                            <th><button class="table-sort" data-sort="sort-name">No Handphone</button></th>
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


<script>
    document.getElementById("nav-users").className += " active";

    $(document).ready(function() {
        $('#datatables').DataTable();
    });

</script>