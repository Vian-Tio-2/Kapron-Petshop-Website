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

    <title>Toko Kucing Barokah</title>
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
    <header class="masthead" style="background-image: url('img/about-cover.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>About Us</h1>
                        <span class="subheading">Informasi Umum Tentang Toko Kami</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Main Content -->
    <div class="container-fluid text-justify" id="main">
        <div class="row">
            <div class="col-lg-9 col-md-10 mx-auto">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>
            </div>
        </div>
        <div class="accordion col-lg-9 col-md-10 mx-auto">
            <br>
            <div class="accordion-header"><i class="fa fa-map"></i>&nbsp;&nbsp;Lokasi Toko</div>
            <div class="accordion-content">
                <!-- ================ contact section start ================= -->
                <section class="section-margin--small">
                    <div class="container">
                        <div class="mt-4">
                            <div id="map" style="height: 420px;"></div>
                            <script>
                                function initMap() {
                                    var uluru = {
                                        lat: -25.363,
                                        lng: 131.044
                                    };
                                    var grayStyles = [{
                                        featureType: "all",
                                        stylers: [{
                                            saturation: -90
                                        }, {
                                            lightness: 50
                                        }]
                                    }, {
                                        elementType: 'labels.text.fill',
                                        stylers: [{
                                            color: '#A3A3A3'
                                        }]
                                    }];
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        center: {
                                            lat: -31.197,
                                            lng: 150.744
                                        },
                                        zoom: 9,
                                        styles: grayStyles,
                                        scrollwheel: false
                                    });
                                }
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>

                            <div class="media contact-info mt-4">
                                <span class="contact-info__icon"><i class="fa fa-location-arrow"></i></span>
                                <div class="media-body">
                                    <h3>Politeknik Negeri Jember</h3>
                                    <p>Alamat: Lingkungan Panji, Tegalgede, Sumbersari, Jember Regency, East Java 68124</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ================ contact section end ================= -->
            </div>
            <br>
            <div class="accordion-header"><i class="fa fa-phone"></i>&nbsp;&nbsp;Contact</div>
            <div class="accordion-content">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fa fa-location-arrow"></i></span>
                            <div class="media-body">
                                <h3>Jember</h3>
                                <p>Politeknik Negeri Jember</p><br>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fa fa-phone"></i></span>
                            <div class="media-body">
                                <h3><a href="tel:#">+62 xxx xxxx xxxx</a></h3>
                                <p>Senin - Jumat | 9am - 6pm</p><br>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fa fa-envelope"></i></span>
                            <div class="media-body">
                                <h3><a href="mailto:#@gmail.com">#@gmail.com</a></h3>
                                <p>Kirimkan pertanyaan Anda kapan saja!</p><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form action="#/" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center text-md-right mt-3">
                                <button type="submit" class="btn btn-outline-dark button--active button-contactForm">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="accordion-header"><i class="fa fa-question"></i>&nbsp;&nbsp;FAQ</div>
            <div class="accordion-content">
                <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec
                    et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
            </div>
            <br>
        </div>
    </div>
    </div>

    <hr>

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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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

