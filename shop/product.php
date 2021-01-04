<?php 
session_start();
include_once('../control/koneksi.php');
$_SESSION["visited_page"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../vendors/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Private CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/album.css" rel="stylesheet">
    <link href="../css/product.css" rel="stylesheet">

    <!-- Custom fonts-->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat|Ubuntu' rel='stylesheet' type='text/css'>

    <title>Petshop Kapron</title>
</head>

<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="navProduct">
        <div class="collapse navbar-collapse" id="dropdownItem">
            <a class="navbar-brand" href="#"><i class="fa fa-circle-o-notch" style="font-size: 2rem;"></i> Kapron </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php"><i class="fa fa-home"></i> Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="product.php"><i class="fa fa-shopping-basket"></i> Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i> Keranjang</a>
                </li>
            </ul>
        </div>
        <?php include_once('template-btn-login.php') ?>
        <a class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#dropdownItem" aria-controls="dropdownItem" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
    </nav>

    <!-- Main -->
    <section class="mb-5" id="main">
        <div class="container-fluid">
            <div class="row align-content-center">

                <div class="col-xl-3 col-lg-4 col-md-5 pb-4 collapse show" id="sidebar">
                    <div class="sidebar-categories">
                        <div class="head">Kategori Produk</div>
                        <ul class="main-categories">
                            <li class="common-filter">
                                <form action="#" method="GET">
                                    <ul>
                                        <li class="filter-list form-check-inline">
                                            <input checked class="pixel-radio" type="checkbox" id="cbsemua" name="kategori" />
                                            <label for="cbsemua">
                                                Semua<span> (3600)</span>
                                            </label>
                                        </li>
                                        <li class="filter-list form-check-inline">
                                            <input class="pixel-radio" type="checkbox" id="cbmakanan" name="kategori" />
                                            <label for="cbmakanan">
                                                Makanan Peliharaan<span> (3600)</span>
                                            </label>
                                        </li>
                                        <li class="filter-list form-check-inline">
                                            <input class="pixel-radio" type="checkbox" id="cbkandang" name="kategori" />
                                            <label for="cbkandang">
                                                Kandang / Cage<span> (3600)</span>
                                            </label>
                                        </li>
                                        <li class="filter-list form-check-inline">
                                            <input class="pixel-radio" type="checkbox" id="cbobat" name="kategori" />
                                            <label for="cbobat">
                                                Obat dan Vitamin<span> (3600)</span>
                                            </label>
                                        </li>
                                        <li class="filter-list form-check-inline">
                                            <input class="pixel-radio" type="checkbox" id="cbmainan" name="kategori" />
                                            <label for="cbmainan">
                                                Mainan dan Aksesoris<span> (3600)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-filter">
                        <div class="top-filter-head">Filter Produk</div>
                        <div class="common-filter">
                            <div class="head">Order By</div>
                            <form action="#">
                                <ul>
                                    <li class="filter-list">
                                        <label for="ascending">
                                            <input class="pixel-radio" type="radio" id="ascending" name="orderby" />
                                            Ascending 
                                        </label>
                                    </li>
                                    <li class="filter-list">
                                        <label for="descending">
                                            <input class="pixel-radio" type="radio" id="descending" name="orderby" />
                                            Descending
                                        </label>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="common-filter">
                            <div class="head">Filter</div>
                            <form action="#">
                                <ul>
                                    <li class="filter-list">
                                        <label for="semua">
                                            <input checked class="pixel-radio" type="radio" id="semua" name="filter" />
                                            Default
                                        </label>
                                    </li>
                                    <li class="filter-list">
                                        <label for="nama">
                                            <input class="pixel-radio" type="radio" id="nama" name="filter" />
                                            Nama Produk
                                        </label>
                                    </li>
                                    <li class="filter-list">
                                        <label for="harga">
                                            <input class="pixel-radio" type="radio" id="harga" name="filter" />
                                            Harga Produk
                                        </label>
                                    </li>
                                    <li class="filter-list">
                                        <label for="waktu">
                                            <input class="pixel-radio" type="radio" id="waktu" name="filter" />
                                            Waktu
                                        </label>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-xl-9 col-lg-8 col-md-7" id="mainItem">
                    <!-- Start Filter Bar -->
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                        <form class="form-check-inline">
                            <input checked class="pixel-radio" name="btnFilter" id="btnFilter" value="btnFilter" type="checkbox" onclick="filterCollapse()" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-controls="sidebar"></input>
                            <span class="pt-1"><i class="fa fa-filter"></i> Filter Bar</span>
                        </form>
                        <form class="form-check-inline ml-auto">
                            <input class="form-control mr-1 d-flex" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary my-1 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- End Filter Bar -->

                    <!-- Start Item -->
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-12 d-flex align-items-stretch" name="productlist">
                                <div class="card shadow-sm text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="../img/product/product1.png" alt="" />
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button class="rounded" title="WhatsApp Kami!!">
                                                        <i class="fa fa-whatsapp"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" onclick="window.location.href='single-product.php'" title="Lihat Product">
                                                        <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" title="Tambahkan ke Keranjang">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Makanan Kucing</p>
                                        <h4 class="card-product__title">
                                            <a href="single-product.php">Whiskas Rasa Tuna [ 1.2kg ]</a>
                                        </h4>
                                        <p class="card-product__price"> Rp 60.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 d-flex align-items-stretch" name="productlist">
                                <div class="card shadow-sm text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="../img/product/product2.png" alt="" />
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button class="rounded" title="WhatsApp Kami!!">
                                                        <i class="fa fa-whatsapp"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" onclick="window.location.href='single-product.php'" title="Lihat Product">
                                                        <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" title="Tambahkan ke Keranjang">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Makanan Kucing</p>
                                        <h4 class="card-product__title">
                                            <a href="single-product.php">Whiskas Wet Food [ 85gr ]</a>
                                        </h4>
                                        <p class="card-product__price"> Rp 6.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 d-flex align-items-stretch" name="productlist">
                                <div class="card shadow-sm text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="../img/product/product3.png" alt="" />
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button class="rounded" title="WhatsApp Kami!!">
                                                        <i class="fa fa-whatsapp"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" onclick="window.location.href='single-product.php'" title="Lihat Product">
                                                        <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" title="Tambahkan ke Keranjang">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Kandang</p>
                                        <h4 class="card-product__title">
                                            <a href="single-product.php">Kandang Kucing/Anjing Besar</a>
                                        </h4>
                                        <p class="card-product__price"> Rp 450.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 d-flex align-items-stretch" name="productlist">
                                <div class="card shadow-sm text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="../img/product/product4.png" alt="" />
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button class="rounded" title="WhatsApp Kami!!">
                                                        <i class="fa fa-whatsapp"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" onclick="window.location.href='single-product.php'" title="Lihat Product">
                                                        <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" title="Tambahkan ke Keranjang">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Kandang</p>
                                        <h4 class="card-product__title">
                                            <a href="single-product.php">Kandang Kucing/Anjing Melingkar</a>
                                        </h4>
                                        <p class="card-product__price"> Rp 350.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 d-flex align-items-stretch" name="productlist">
                                <div class="card shadow-sm text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="../img/product/product5.png" alt="" />
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button class="rounded" title="WhatsApp Kami!!">
                                                        <i class="fa fa-whatsapp"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" onclick="window.location.href='single-product.php'" title="Lihat Product">
                                                        <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" title="Tambahkan ke Keranjang">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Vitamin</p>
                                        <h4 class="card-product__title">
                                            <a href="single-product.php">Me-O Cat Creamy Treats</a>
                                        </h4>
                                        <p class="card-product__price"> Rp 20.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 d-flex align-items-stretch" name="productlist">
                                <div class="card shadow-sm text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="../img/product/product6.png" alt="" />
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button class="rounded" title="WhatsApp Kami!!">
                                                        <i class="fa fa-whatsapp"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" onclick="window.location.href='single-product.php'" title="Lihat Product">
                                                        <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" title="Tambahkan ke Keranjang">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Vitamin</p>
                                        <h4 class="card-product__title">
                                            <a href="single-product.php">GNC Multivitamin Plus Chicken</a>
                                        </h4>
                                        <p class="card-product__price"> Rp 23.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 d-flex align-items-stretch" name="productlist">
                                <div class="card shadow-sm text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="../img/product/product7.png" alt="" />
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button class="rounded" title="WhatsApp Kami!!">
                                                        <i class="fa fa-whatsapp"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" onclick="window.location.href='single-product.php'" title="Lihat Product">
                                                        <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" title="Tambahkan ke Keranjang">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Aksesoris</p>
                                        <h4 class="card-product__title">
                                            <a href="single-product.php">Pajangan Kucing Lucu</a>
                                        </h4>
                                        <p class="card-product__price"> Rp 30.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 d-flex align-items-stretch" name="productlist">
                                <div class="card shadow-sm shadow-hover text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="../img/product/product8.png" alt="" />
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button class="rounded" title="WhatsApp Kami!!">
                                                        <i class="fa fa-whatsapp"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" onclick="window.location.href='single-product.php'" title="Lihat Product">
                                                        <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" title="Tambahkan ke Keranjang">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Mainan</p>
                                        <h4 class="card-product__title">
                                            <a href="single-product.php">Mainan Kucing Bulu-Bulu</a>
                                        </h4>
                                        <p class="card-product__price"> Rp 9.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 d-flex align-items-stretch" name="productlist">
                                <div class="card shadow-sm text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="../img/product/product1.png" alt="" />
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button class="rounded" title="WhatsApp Kami!!">
                                                        <i class="fa fa-whatsapp"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" onclick="window.location.href='single-product.php'" title="Lihat Product">
                                                        <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button class="rounded" title="Tambahkan ke Keranjang">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Makanan Kucing</p>
                                        <h4 class="card-product__title">
                                            <a href="single-product.php">Whiskas Rasa Tuna [ 1.2kg ]</a>
                                        </h4>
                                        <p class="card-product__price"> Rp 60.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Item -->
                </div>
            </div>
        </div>
    </section>
    <!-- Main End -->

    <!-- Site footer -->
    <footer class="site-footer">
        <div class="container-fluid footer-top">
            <div class="row mt-3">
                <div class="col-md-12 mb-1">
                    <ul class="social-icons mx-auto">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="whatsapp" href="#"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container-fluid">
                <div class="row d-flex">
                    <p class="soc-copyright col-lg-12 footer-text text-center mt-4">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved by Kapron Petshop
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Script Core -->
    <script src="../vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendors/bootstrap/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>

    <!-- jQuery Script Core -->
    <script src="../vendors/jquery/jquery-3.2.1.min.js"></script>

    <!-- Custom scripts -->
    <script src="../js/script.js"></script>
</body>

</html>