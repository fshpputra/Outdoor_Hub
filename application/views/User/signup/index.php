<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $title; ?></title>
    <meta name="msapplication-TileColor" content="" />
    <meta name="theme-color" content="" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <link rel="icon" href="<?= base_url('assets/img/ico/i.png') ?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?= base_url('assets/img/ico/i.png') ?>" type="image/x-icon" />

    <!-- CSS files -->
    <link href="<?= base_url('assets/') ?>dist/css/tabler.min.css?1684106145" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>dist/css/tabler-flags.min.css?1684106145" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>dist/css/tabler-payments.min.css?1684106145" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>dist/css/tabler-vendors.min.css?1684106145" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>dist/css/demo.min.css?1684106145" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="<?= base_url('assets/') ?>dist/js/demo-theme.min.js?1684106145"></script>

    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img
                        src="<?= base_url('assets/') ?>img/logo/ima.png" height="100" alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Register to your account</h2>
                    <?= $this->session->flashdata('message'); ?>
                    <?php $this->session->unset_userdata('message'); ?>
                    <form action="<?= base_url('Signup') ?>" method="post" autocomplete="off" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            <input type="nama" class="form-control" autocomplete="off" name="nama"
                                value="<?= set_value('nama') ?>" placeholder="Masukkan nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            <input type="email" class="form-control" autocomplete="off" name="email"
                                value="<?= set_value('email') ?>" placeholder="Masukkan Email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
                            <input type="date" class="form-control" autocomplete="off" name="ttl"
                                value="<?= set_value('ttl') ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Handphone</label>
                            <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                            <input type="number" class="form-control" autocomplete="off" name="no_hp"
                                value="<?= set_value('no_hp') ?>" placeholder="Masukan No Handphone">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" placeholder="Your password"
                                    autocomplete="off" id="passw" name="password">
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"
                                        onclick="seePass()">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                        </div>
                    </form>
                    <div class="text-center text-muted mt-3">
                        Already have account? <a href="<?= base_url('AuthUser') ?>" tabindex="-1">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets/') ?>dist/js/tabler.min.js?1684106145" defer></script>
    <script src="<?= base_url('assets/') ?>dist/js/demo.min.js?1684106145" defer></script>

    <script>
        function seePass() {
            var x = document.getElementById("passw");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
