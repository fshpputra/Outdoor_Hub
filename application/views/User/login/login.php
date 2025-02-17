<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MDBootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">

    <title><?= $title; ?></title>
    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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

                                <div class="text-center mb-5">
                                    <img src="<?= base_url('assets/user/image/logo_trans.png')?>"
                                         style="width: 185px;" alt="logo">
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <?php $this->session->unset_userdata('message'); ?>
                                <form action="<?= base_url('AuthUser')?>" method="post">
                                    <p>Please login to your account</p>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" id="form2Example11" class="form-control"
                                               placeholder="Email address" name="email" value="<?= set_value('email')?>"/>
                                        <label class="form-label" for="form2Example11">Email</label>
                                    </div>
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="form2Example22" class="form-control" name="password" value="<?= set_value('password')?>"/>
                                        <label class="form-label" for="form2Example22">Password</label>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Login</button>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <a href="<?= base_url('Signup')?>" class="btn btn-outline-danger">Create New</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="mb-0 me-2">Already have an account?</p>
                                        <a href="<?= base_url('Home')?>">Home</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Selamat Datang</h4>
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