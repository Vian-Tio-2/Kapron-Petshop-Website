<?php 
session_start();
include_once('control/koneksi.php');
$_SESSION["visited_page"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="vendors/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Private CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/album.css" rel="stylesheet">

    <!-- Custom fonts-->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat|Ubuntu' rel='stylesheet' type='text/css'>

    <title>Petshop Kapron</title>
</head>

<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <a class="navbar-brand" href="#"><i class="fa fa-circle-o-notch" style="font-size: 2rem;"></i> Kapron </a>
        <a class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#dropdownItem" aria-controls="dropdownItem" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <div class="collapse navbar-collapse" id="dropdownItem">
            <ul class="navbar-nav mr-auto ml-3">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop/product.php"><i class="fa fa-shopping-basket"></i> Produk</a>
                </li>
                <!-- Alternatif Menu Akun
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> Akun
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuAccount">
                        <a class="nav-link ml-2" href="login.php"><i class="fa fa-sign-in"></i> Login</a>
                        <a class="nav-link ml-2" href="#"><i class="fa fa-user-circle-o"></i> Pengaturan</a>
                    </div>
                </li>
                -->
                <li class="nav-item">
                    <a class="nav-link" href="shop/cart.php"><i class="fa fa-shopping-cart"></i> Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php"><i class="fa fa-info-circle"></i> About</a>
                </li>
            </ul>
            <?php include_once('template-btn-login.php') ?>
            <!-- Night Mode
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-3">
                    <a class="nav-link"><i class="fa fa-moon-o" style="font-size: 1.25rem;">&nbsp;</i><label class="switch">
                        <input type="checkbox" name="btnDarkMode" id="btnDarkMode" onclick="nightMode()"> 
                        <span class="slider round"></span></label></a>

                </li>
            </ul>
            -->
        </div>
    </nav>


    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-cover.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Kapron Petshop</h1>
                        <span class="subheading">Peliharaan Anda Senang Kami Dapat Uang</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Main Content -->
    <main role="main">

        <div class="py-5 bg-light" id=main-body>
            <div class="container-fluid" id="main">
                <h2>Produk Kami</h2>
                <div id="features" class="justify-content-center">
                    <div class="row">
                        <div class="feature-box col-lg-4">
                            <i class="feature-icon-shield fa fa-shield fa-5x"></i>
                            <h4>Berkualitas</h4>
                            <p>Terjamin, Terlengkap, dan Terpercaya</p>
                        </div>
                        <div class="feature-box col-lg-4">
                            <i class="feature-icon-dollar fa fa-dollar fa-5x"></i>
                            <h4>Harga Bersaing</h4>
                            <p>Belanja Online Tanpa Takut Mahal</p>
                        </div>
                        <div class="feature-box col-lg-4">
                            <i class="feature-icon-heart fa fa-heartbeat fa-5x"></i>
                            <h4>Kesukaan Peliharaan</h4>
                            <p>Temukan Cinta Untuk Peliharaan Kesayangan Anda</p>
                        </div>
                    </div>
                </div>
                <p id="text-colour" class="lead text-justify"> Ingin mencari merek makanan kucing yang berkualitas? Tapi, inginnya dengan harga miring tanpa mengesampingkan nutrisi kucing kesayanganmu? Yuk, lihat rekomendasinya di sini! </p>
                <p>
                    <a href="#album" class="btn btn-custom btn-primary my-2 rounded mr-2 shadow" style="text-decoration:none"><i class="fa fa-search-plus"></i> Lihat Selengkapnya</a>
                    <a href="about.php" class="btn btn-custom btn-outline-info my-2 rounded" style="text-decoration:none"><i class="fa fa-location-arrow"></i> Lokasi Toko Kami</a>
                </p>
            </div>



            <div class="album container-fluid" id="album">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 mr-auto">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-light">
                            <div class="col-lg-3 d-flex">
                                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                    <title>Makanan Peliharaan</title>
                                    <image href="img/thumb-pet-food.png" height="100%" width="100%"/>
                                </svg>
                            </div>
                            <div class="col-lg-9 p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">Makanan</strong>
                                <h3 class="mb-0">Makanan Peliharaan</h3>
                                <div class="mb-1 text-muted">Nov 16</div>
                                <p class="card-text mb-auto">Makanan Peliharaan adalah makanan khusus yang diberikan dan dikonsumsi oleh hewan peliharaan domestik maupun non-domestik.</p>
                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" onclick="location.href='shop/product.php'" class="btn btn-sm btn-outline-primary rounded mr-1"><i class="fa fa-search"></i> Lihat Produk</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-12 ml-auto">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-light">
                            <div class="col-lg-3 d-flex">
                                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                    <title>Kandang</title>
                                    <image href="img/thumb-pet-cage.png" height="100%" width="100%"/>
                                </svg>
                            </div>
                            <div class="col-lg-9 p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-warning">Cage</strong>
                                <h3 class="mb-0">Kandang</h3>
                                <div class="mb-1 text-muted">Nov 16</div>
                                <p class="card-text mb-auto">Tersedia berbagai macam ukuran, bahan, dan jenis kandang untuk hewan peliharaan kesayangan anda.</p>
                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" onclick="location.href='shop/product.php'" class="btn btn-sm btn-outline-warning rounded mr-1"><i class="fa fa-search"></i> Lihat Produk</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-12 mr-auto">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-light">
                            <div class="col-lg-3 d-flex">
                                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                    <title>Obat dan Vitamin</title>
                                    <image href="img/thumb-pet-medicine.png" height="100%" width="100%"/>
                                </svg>
                            </div>
                            <div class="col-lg-9 p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-success">Obat</strong>
                                <h3 class="mb-0">Obat dan Vitamin</h3>
                                <div class="mb-1 text-muted">Nov 16</div>
                                <p class="card-text mb-auto">Obat dan Vitamin khusus untuk merawat, mengobati, dan menjaga metabolisme hewan kesayangan anda.</p>
                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" onclick="location.href='shop/product.php'" class="btn btn-sm btn-outline-success rounded mr-1"><i class="fa fa-search"></i> Lihat Produk</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-12 ml-auto">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-light">
                            <div class="col-lg-3 d-flex">
                                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                    <title>Mainan dan Aksesoris Peliharaan</title>
                                    <image href="img/thumb-pet-toy.png" height="100%" width="100%"/>
                                </svg>
                            </div>
                            <div class="col-lg-9 p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-info">Item and Other</strong>
                                <h3 class="mb-0">Mainan dan Aksesoris Peliharaan</h3>
                                <div class="mb-1 text-muted">Nov 16</div>
                                <p class="card-text mb-auto">Temukan aksesoris dan mainan agar hewan kesayangan anda tidak bosan, didesign khusus agar disukai oleh hewan peliharaan.</p>
                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" onclick="location.href='shop/product.php'" class="btn btn-sm btn-outline-info rounded mr-1"><i class="fa fa-search"></i> Lihat Produk</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials -->

        <section class="colored-section gradient-colour" id="testimonials">
            <div id="testimonial-carousel" class="carousel slide" data-ride="false">
                <div class="carousel-inner">
                    <div class="carousel-item active container-fluid">
                        <h2 class="testimonial-text">Tadinya Saya tidak dapat mengendus kucing lain untuk menunjukkan Cinta. Namun saya telah mendapatkan obatnya di Kapron Petshop. Meooww.</h2>
                        <img class="testimonial-image" src="img/cat-img.jpg" alt="cat-profile">
                        <em>Pebbles, Surabaya</em>
                    </div>
                    <div class="carousel-item container-fluid">
                        <h2 class="testimonial-text">Kucing saya dulu sangat kesepian, Namun berkat adanya Kapron Petshop, Saya rasa sekarang dia telah menemukan cinta dalam hidupnya.</h2>
                        <img class="testimonial-image" src="img/lady-img.jpg" alt="lady-profile">
                        <em>Beverly, Bali</em>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

        </section>

    </main>

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
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Script Core -->
    <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendors/bootstrap/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>

    <!-- jQuery Script Core -->
    <script src="vendors/jquery/jquery-3.2.1.min.js"></script>

    <!-- Custom scripts -->
    <script src="js/script.js"></script>
</body>

</html>