<?php 
session_start();
$_SESSION["visited_page"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include("session-check.php");
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
    <link href="../css/cart.css" rel="stylesheet">

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
                <li class="nav-item">
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
    <section class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-12 mb-4 mx-auto">
                <div class="card rounded shadow mb-4">
                    <div class="card-header">
                        <p class="m-0">20 Desember 2020</p>
                    </div>
                    <div class="card-body">
                        <div class="mx-5">
                            <div class="d-flex w-100">
                                <h5 class="text-dark">Status : <span class="text-info">Pesanan Selesai</span></h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row mx-5 d-inline-flex w-100">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 my-2">
                                <div class="media">
                                    <div class="d-flex">
                                        <img class="shadow" src="../img/product/product1.png" alt="">
                                    </div>
                                    <div class="media-body mr-3">
                                        <p class="text-dark">Whiskas Rasa Tuna [ 1.2kg ]</p>
                                        <p>dan 2 barang lainnya....</p>
                                    </div>
                                </div>
                            </div>
                            <span class="border-left col-1 d-block"> </span>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 align-self-center my-2">
                                <p class="py-1 my-1">Total Pembayaran</p>
                                <div class="d-flex w-100">
                                    <h5 id="text2">Rp 516.000</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer rounded-bottom bg-white">
                        <div>
                            <a href="checkout.php" class="btn btn-outline-info rounded-pill border-0"><i class="fa fa-eye"></i> Lihat Detail Pesanan</a>
                        </div>
                    </div>
                </div>
                <div class="card rounded shadow mb-4">
                    <div class="card-header">
                        <p class="m-0">20 Desember 2020</p>
                    </div>
                    <div class="card-body">
                        <div class="mx-5">
                            <div class="d-flex w-100">
                                <h5 class="text-dark">Status : <span class="text-success">Pembayaran diterima, Barang akan segera dikirimkan</span></h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row mx-5 d-inline-flex w-100">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 my-2">
                                <div class="media">
                                    <div class="d-flex">
                                        <img class="shadow" src="../img/product/product1.png" alt="">
                                    </div>
                                    <div class="media-body mr-3">
                                        <p class="text-dark">Whiskas Rasa Tuna [ 1.2kg ]</p>
                                        <p>dan 2 barang lainnya....</p>
                                    </div>
                                </div>
                            </div>
                            <span class="border-left col-1 d-block"> </span>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 align-self-center my-2">
                                <p class="py-1 my-1">Total Pembayaran</p>
                                <div class="d-flex w-100">
                                    <h5 id="text2">Rp 516.000</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer rounded-bottom bg-white">
                        <div>
                            <a href="checkout.php" class="btn btn-outline-info rounded-pill border-0"><i class="fa fa-eye"></i> Lihat Detail Pesanan</a>
                        </div>
                    </div>
                </div>
                <div class="card rounded shadow mb-4">
                    <div class="card-header">
                        <p class="m-0">20 Desember 2020</p>
                    </div>
                    <div class="card-body">
                        <div class="mx-5">
                            <div class="d-flex w-100">
                                <h5 class="text-dark">Status : <span class="text-warning">Pesanan Menunggu Pembayaran</span></h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row mx-5 d-inline-flex w-100">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 my-2">
                                <div class="media">
                                    <div class="d-flex">
                                        <img class="shadow" src="../img/product/product1.png" alt="">
                                    </div>
                                    <div class="media-body mr-3">
                                        <p class="text-dark">Whiskas Rasa Tuna [ 1.2kg ]</p>
                                        <p>dan 2 barang lainnya....</p>
                                    </div>
                                </div>
                            </div>
                            <span class="border-left col-1 d-block"> </span>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 align-self-center my-2">
                                <p class="py-1 my-1">Total Pembayaran</p>
                                <div class="d-flex w-100">
                                    <h5 id="text2">Rp 516.000</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer rounded-bottom bg-white">
                        <div>
                            <a href="checkout.php" class="btn btn-outline-info rounded-pill border-0"><i class="fa fa-eye"></i> Lihat Detail Pesanan</a>
                        </div>
                    </div>
                </div>
                <div class="card rounded shadow mb-4">
                    <div class="card-header">
                        <p class="m-0">20 Desember 2020</p>
                    </div>
                    <div class="card-body">
                        <div class="mx-5">
                            <div class="d-flex w-100">
                                <h5 class="text-dark">Status : <span class="text-danger">Pesanan Dibatalkan</span></h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row mx-5 d-inline-flex w-100">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 my-2">
                                <div class="media">
                                    <div class="d-flex">
                                        <img class="shadow" src="../img/product/product1.png" alt="">
                                    </div>
                                    <div class="media-body mr-3">
                                        <p class="text-dark">Whiskas Rasa Tuna [ 1.2kg ]</p>
                                        <p>dan 2 barang lainnya....</p>
                                    </div>
                                </div>
                            </div>
                            <span class="border-left col-1 d-block"> </span>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 align-self-center my-2">
                                <p class="py-1 my-1">Total Pembayaran</p>
                                <div class="d-flex w-100">
                                    <h5 id="text2">Rp 516.000</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer rounded-bottom bg-white">
                        <div>
                            <a href="checkout.php" class="btn btn-outline-info rounded-pill border-0"><i class="fa fa-eye"></i> Lihat Detail Pesanan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main End -->

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