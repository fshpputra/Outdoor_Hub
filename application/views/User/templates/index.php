<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/animate.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/aos.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
<div class="flash-dataError" data-flashdatax="<?= $this->session->flashdata('flash-error'); ?>"></div>
<?php $this->session->unset_userdata('flash-success'); ?>
<?php $this->session->unset_userdata('flash-error'); ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <img src="<?= base_url('assets/user/image/logo_trans.png')?>"
             style="width: 50px;" alt="logo">
        <a class="navbar-brand" href="<?= base_url('Home')?>">Outdoor<span>Hub</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" id="home"><a href="<?= base_url('Home')?>" class="nav-link" >Home</a></li>
                <li class="nav-item" id="gear"><a href="<?= base_url('Home/Gear')?>" class="nav-link" >Gear</a></li>
                <li class="nav-item" id="about"><a href="<?= base_url('Home/About')?>" class="nav-link" >About</a></li>
                <li class="nav-item" id="kontak"><a href="<?= base_url('Home/Contact')?>" class="nav-link">Contact</a></li>
                <?php if($users == NULL):?>
                    <li class="nav-item"><a href="<?= base_url('AuthUser')?>" class="nav-link">Login</a></li>
                <?php else:?>
                <li class="nav-item" id="keranjang"><a href="<?= base_url('Home/Keranjang')?>" class="nav-link">Keranjang</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link btn btn-warning dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('Home/Account')?>">Account</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('AuthUser/logout') ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<?php $this->load->view($view_name); ?>

<footer class="ftco-footer bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Kolom 1: Logo & Deskripsi -->
            <div class="col-md-3">
                <h5 class="fw-bold"><a href="#" class="text-white text-decoration-none">Outdoor<span>Hub</span></a></h5>
                <p class="small">OutdoorHub adalah penyedia layanan sewa alat outdoor terbaik untuk petualangan Anda.</p>
                <div>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Informasi -->
            <div class="col-md-3">
                <h6 class="fw-bold">Information</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-white text-decoration-none">About</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Services</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Terms & Conditions</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Customer Support -->
            <div class="col-md-3">
                <h6 class="fw-bold">Customer Support</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Payment Options</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Booking Tips</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contact Us</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Kontak -->
            <div class="col-md-3">
                <h6 class="fw-bold">Have Questions?</h6>
                <ul class="list-unstyled small">
                    <li><i class="fas fa-map-marker-alt me-2"></i> Universitas Komputer Indonesia, Jl. Dipati Ukur No.112-116, Bandung</li>
                    <li><i class="fas fa-phone me-2"></i> (022) 2504119</li>
                    <li><i class="fas fa-envelope me-2"></i> info.support@outdoorhub.com</li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center small mt-3">
            <p class="mb-0">&copy; <script>document.write(new Date().getFullYear());</script> OutdoorHub. All rights reserved.</p>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([-6.887024, 107.615101], 16); // Koordinat UNIKOM

    // Tambahkan tile layer dari OSM
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Tambahkan marker untuk UNIKOM
    L.marker([-6.887024, 107.615101]).addTo(map)
        .bindPopup("<b>Universitas Komputer Indonesia</b><br>Jl. Dipati Ukur No.112-116, Bandung.")
        .openPopup();
</script>

<script src="<?= base_url('assets/')?>user/js/jquery.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/popper.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/jquery.easing.1.3.js"></script>
<script src="<?= base_url('assets/')?>user/js/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/jquery.stellar.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/aos.js"></script>
<script src="<?= base_url('assets/')?>user/js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url('assets/')?>user/js/jquery.timepicker.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/scrollax.min.js"></script>
<script src="<?= base_url('assets/')?>user/js/google-map.js"></script>
<script src="<?= base_url('assets/')?>user/js/main.js"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="<?= base_url(); ?>assets/dist/js/myscript.js"></script>

</body>
</html>
