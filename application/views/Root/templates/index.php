<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $title; ?></title>
    <script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="/stats/js/script.js"></script>
    <meta name="msapplication-TileColor" content="" />
    <meta name="theme-color" content="" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <link rel="icon" href="<?= base_url('assets/img/ico/im.png')?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?= base_url('assets/img/ico/im.png')?>" type="image/x-icon" />

    <!-- CSS files -->
    <link href="<?= base_url('assets/')?>dist/css/tabler.min.css?1684106145" rel="stylesheet" />
    <link href="<?= base_url('assets/')?>dist/css/tabler-flags.min.css?1684106145" rel="stylesheet" />
    <link href="<?= base_url('assets/')?>dist/css/tabler-payments.min.css?1684106145" rel="stylesheet" />
    <link href="<?= base_url('assets/')?>dist/css/tabler-vendors.min.css?1684106145" rel="stylesheet" />
    <link href="<?= base_url('assets/')?>dist/css/demo.min.css?1684106145" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- DATATABLES -->
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }
    </style>

    <script>
    function loading(status) {
        if (status) {
            $("#loadingStat").css("display", "flex")
        } else {
            $("#loadingStat").css("display", "none")
        }
    }
    </script>
</head>

<body>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <?php $this->session->unset_userdata('flash-success'); ?>
    <?php $this->session->unset_userdata('flash-error'); ?>
    <script src="<?= base_url('assets/')?>dist/js/demo-theme.min.js?1684106145"></script>
    <div class="page page-center" id="loadingStat" style="display: none">
        <div class="container container-slim py-4">
            <div class="text-center">
                <div class="mb-3">
                    <a href="." class="navbar-brand navbar-brand-autodark"><img
                            src="<?= base_url('assets/user/image/logo_trans.png')?>" height="36" alt=""></a>
                </div>
                <div class="text-muted mb-3">Preparing application</div>
                <div class="progress progress-sm">
                    <div class="progress-bar progress-bar-indeterminate"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="<?= base_url('Root/Dashboard')?>">
                        <img src="<?= base_url('assets/user/image/logo_trans.png')?>" height="100" alt="Tabler"
                            class="navbar-brand-image">
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">

                    <div class="d-none d-md-flex">
                        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                            </svg>
                        </a>
                        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path
                                    d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                            </svg>
                        </a>

                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <div class="d-none d-xl-block ps-2">
                                <div><?= $users->nama_root?></div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="<?= base_url('AuthRoot/logout')?>" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item" id="nav-dashboard">
                                <a class="nav-link" href="<?= base_url('Root/Dashboard')?>">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Dashboard
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item" id="nav-users">
                                <a class="nav-link" href="<?= base_url('Root/User')?>">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-users-group" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Users
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item dropdown" id="nav-produk">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('Produk') ?>" data-bs-toggle="dropdown">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Ikon Produk -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-backpack"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 6v-1a2 2 0 1 1 4 0v1" />
                                    <path d="M10 6h4a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2z" />
                                    <path d="M10 12h4" />
                                </svg>
                            </span>
                                    <span class="nav-link-title">Produk</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('Root/Produk/kategori')?>" id="nav-categoryProduk">
                                            Category Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('Root/Token/tokenBonus')?>" id="nav-listProduk">
                                            List Produk
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item" id="nav-pesanan">
                                <a class="nav-link" href="<?= base_url('Pesanan') ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="6" cy="19" r="2" />
                                    <circle cx="17" cy="19" r="2" />
                                    <path d="M17 17h-11v-14h-2" />
                                    <path d="M6 5l14 1l-1 7h-13" />
                                </svg>
                            </span>
                                    <span class="nav-link-title">Pesanan</span>
                                </a>
                            </li>


                            <li class="nav-item" id="nav-pembayaran">
                                <a class="nav-link" href="<?= base_url('Pembayaran') ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <rect x="3" y="5" width="18" height="14" rx="3" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                    <line x1="7" y1="15" x2="7.01" y2="15" />
                                    <line x1="11" y1="15" x2="13" y2="15" />
                                </svg>
                            </span>
                                    <span class="nav-link-title">Pembayaran</span>
                                </a>
                            </li>

                            <li class="nav-item" id="nav-pengiriman">
                                <a class="nav-link" href="<?= base_url('Pengiriman') ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="7" cy="17" r="2" />
                                    <circle cx="17" cy="17" r="2" />
                                    <path d="M5 17h-2v-6h2" />
                                    <path d="M22 15v2h-3" />
                                    <path d="M5 11v-4a1 1 0 0 1 1 -1h9v10h-9a1 1 0 0 1 -1 -1z" />
                                    <path d="M15 6h4l3 5v4h-3" />
                                </svg>
                            </span>
                                    <span class="nav-link-title">Pengiriman</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <!-- Page header -->

            <?php $this->load->view($view_name); ?>


            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2025
                                    <a href="." class="link-secondary">Outdoor Hub</a>.
                                    All rights reserved.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets/')?>dist/js/tabler.min.js?1684106145" defer></script>
    <script src="<?= base_url('assets/')?>dist/js/demo.min.js?1684106145" defer></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Myscript -->
    <script src="<?= base_url(); ?>assets/dist/js/myscript.js"></script>
    <script>
    $(document).ajaxStart(function() {
        loading(true)
    });

    $(document).ajaxStop(function() {
        loading(false)
    });
    </script>
</body>

</html>