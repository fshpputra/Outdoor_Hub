<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MDBootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">

    <style>
        .gradient-custom-2 {
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }
        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
</head>
<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="<?= base_url('assets/user/image/logo_trans.png')?>"
                                         style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Join The Outdoor Hub</h4>
                                </div>
                                    <p>Create your account</p>
                                    <?= $this->session->flashdata('message'); ?>
                                    <?php $this->session->unset_userdata('message'); ?>
                                    <form action="<?= base_url('Signup')?>" method="post">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="registerName" class="form-control" placeholder="Full Name" name="nama" value="<?= set_value('nama')?>"/>
                                        <label class="form-label" for="registerName">Full Name</label>
                                    </div>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="form-outline mb-4">
                                        <input type="email" id="registerEmail" class="form-control" placeholder="Email address" name="email" value="<?= set_value('email')?>"/>
                                        <label class="form-label" for="registerEmail">Email</label>
                                    </div>
                                        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="form-outline mb-4">
                                        <input type="number" id="registerPhone" class="form-control" placeholder="Phone Numer" name="no_hp" value="<?= set_value('no_hp')?>"/>
                                        <label class="form-label" for="registerPhone">Nomer Handphone</label>
                                    </div>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="registerPassword" class="form-control" placeholder="Password" name="password" value="<?= set_value('password')?>"/>
                                        <label class="form-label" for="registerPassword">Password</label>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Register</button>
                                    </div>
                                    </form>
                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Already have an account?</p>
                                        <a href="<?= base_url('AuthUser')?>" class="btn btn-outline-primary">Login</a>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Bergabunglah dengan kami</h4>
                                <p class="small mb-0">OutdoorHub adalah penyedia layanan sewa alat-alat outdoor terbaik untuk petualangan Anda. Kami menyediakan berbagai peralatan berkualitas tinggi untuk hiking, camping, dan kegiatan outdoor lainnya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- MDBootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

</body>
</html>
