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
                <li class="nav-item active">
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
            <div class="col-xl-8 col-lg-12 mb-5">
                <div class="card rounded shadow mb-5">
                    <div class="card-header">
                        <h4 class="text-center">Konfirmasi Data Diri</h4>
                    </div>
                    <div class="card-body">
                        <div class="row px-4 py-2">
                            <div class="col-6 d-inline-flex">
                                <h4><i class="fa fa-user-circle-o fa-2x text-secondary pt-2"></i></h4>
                                <div class="row pl-3">
                                    <div class="col-12 text-dark">
                                        <p class="m-0 p-0">Markocop bin Suaeb</p>
                                    </div>
                                    <div class="col-12 text-dark">
                                        <p class="m-0 p-0">+62 812 3215 5462</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-inline-flex">
                                <h4><i class="fa fa-map-marker fa-2x text-secondary pt-2"></i></h4>
                                <div class="row pl-3">
                                    <div class="col-12 text-secondary">
                                        <p class="m-0 p-0 mb-1">Alamat Pengiriman</p>
                                    </div>
                                    <div class="col-12 text-dark">
                                        <p class="m-0 p-0">Lingkungan Panji, Tegalgede, Sumbersari, Jember Regency, Jawa Timur [ 68124 ]</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-inline-flex w-100">
                            <a href="../user-profile.php" class="px-4 mx-auto btn btn-outline-secondary rounded-pill border-0"><i class="fa fa-pencil mr-1"></i> Ubah Data</a>
                        </div>
                    </div>
                </div>
                <div class="card rounded shadow">
                    <div class="card-header">
                        <h4 class="text-center">Pilih Product</h4>
                    </div>
                    <div class="card-body">
                        <section class="cart_area">
                            <div class="container-fluid">
                                <div class="cart_inner">
                                    <div class="table">
                                        <table class="table-responsive">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Produk</th>
                                                    <th scope="col">Harga Barang</th>
                                                    <th scope="col">Kuantitas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <div class="d-flex align-items-center">
                                                                <input checked class="pixel-radio mr-5" name="btnBarang1" id="btnBarang1" type="checkbox"></input>
                                                                <label for="btnBarang1"><img class="shadow" src="../img/product/product1.png" alt=""></label>
                                                            </div>
                                                            <div class="media-body">
                                                                <p>Whiskas Rasa Tuna [ 1.2kg ]</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-dark">Rp 60.000</h5>
                                                    </td>
                                                    <td>
                                                        <div class="product_count">
                                                            <input type="text" name="qty" id="sst1" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                                            <button onclick="var result = document.getElementById('sst1'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase" type="button"><i class="fa fa-sort-up"></i></button>
                                                            <button onclick="var result = document.getElementById('sst1'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;" class="reduced" type="button"><i class="fa fa-sort-down"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <div class="d-flex align-items-center">
                                                                <input checked class="pixel-radio mr-5" name="btnBarang2" id="btnBarang2" type="checkbox"></input>
                                                                <label for="btnBarang2">
                                                                    <img class="shadow" src="img/product/product2.png" alt="">
                                                                </label>
                                                            </div>
                                                            <div class="media-body">
                                                                <p>Whiskas Wet Food [ 85gr ]</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-dark">Rp 6.000</h5>
                                                    </td>
                                                    <td>
                                                        <div class="product_count">
                                                            <input type="text" name="qty" id="sst2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                                            <button onclick="var result = document.getElementById('sst2'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase" type="button"><i class="fa fa-sort-up"></i></button>
                                                            <button onclick="var result = document.getElementById('sst2'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;" class="reduced" type="button"><i class="fa fa-sort-down"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <div class="d-flex align-items-center">
                                                                <input checked class="pixel-radio mr-5" name="btnBarang3" id="btnBarang3" type="checkbox"></input>
                                                                <label for="btnBarang3">
                                                                    <img class="shadow" src="../img/product/product3.png" alt="">
                                                                </label>
                                                            </div>
                                                            <div class="media-body">
                                                                <p>Kandang Kucing/Anjing Besar</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-dark">Rp 450.000</h5>
                                                    </td>
                                                    <td>
                                                        <div class="product_count">
                                                            <input type="text" name="qty" id="sst3" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                                            <button onclick="var result = document.getElementById('sst3'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase" type="button"><i class="fa fa-sort-up"></i></button>
                                                            <button onclick="var result = document.getElementById('sst3'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;" class="reduced" type="button"><i class="fa fa-sort-down"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 mb-4">
                <div class="card rounded shadow">
                    <div class="card-header">
                        <h4 class="text-center">Metode Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body shadow-sm rounded d-flex mb-3" id="card-bank">
                            <label for="bank-ovo"><img src="../img/bank/logo-ovo.png" class="bank-icon rounded-circle"> OVO Cash</label>
                            <input checked class="pixel-radio ml-auto align-self-center mb-3" name="bank" id="bank-ovo" type="radio"></input>
                        </div>
                        <div class="card-body shadow-sm rounded d-flex mb-3" id="card-bank">
                            <label for="bank-mandiri"><img src="../img/bank/logo-mandiri.png" class="bank-icon rounded-circle"> Transfer Bank Mandiri</label>
                            <input class="pixel-radio ml-auto align-self-center mb-3" name="bank" id="bank-mandiri" type="radio"></input>
                        </div>
                        <div class="card-body shadow-sm rounded d-flex mb-3" id="card-bank">
                            <label for="bank-bni"><img src="../img/bank/logo-bni.png" class="bank-icon rounded-circle"> Transfer Bank BNI</label>
                            <input class="pixel-radio ml-auto align-self-center mb-3" name="bank" id="bank-bni" type="radio"></input>
                        </div>
                        <hr>
                        <div class="cart-bottom">
                            <div class="row w-100">
                                <div class="col-6 pl-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Total Harga</p>
                                        </div>
                                        <div class="col-12">
                                            <h5>Rp 516.000</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 align-self-center d-inline-flex p-0">
                                    <a class="btn btn-primary rounded-pill ml-auto text-uppercase shadow d-inline-flex" href="checkout.php"><i class="fa fa-shopping-bag mr-2 pt-1"></i> Bayar</a>
                                </div>
                            </div>
                        </div>
                    </div>
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