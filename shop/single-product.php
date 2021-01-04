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

    <!-- Single Product Area -->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner mb-5">
                <div class="col-lg-5 col-md-8 d-flex align-items-stretch mt-4 ml-auto mr-auto">
                    <div class="shadow">
                        <img class="img-fluid" src="../img/product/product1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 d-flex align-items-stretch mt-4">
                    <div class="s_product_text ml-1">
                        <h3>Whiskas Rasa Tuna [ 1.2kg ]</h3>
                        <h2> Rp 60.000</h2>
                        <ul class="list">
                            <li><a class="active"><span>Category</span> : Makanan</a></li>
                            <li><a><span>Stock</span> : Ready</a></li>
                        </ul>
                        <p class="text-justify">Whiskas Adult 1 – 6 Tahun Setelah menginjak 10 – 12 bulan, tambahkan makanan kucing dewasa WHISKAS 1+ sebagai campuran WHISKAS Junior guna melengkapi kebutuhan gizinya yang semakin kompleks. Sebagai hewan karnivora, kucing memerlukan
                            protein 3,5 kali lipat lebih banyak serta berbagai elemen penting lainnya agar tetap sehat.
                        </p>
                        <div class="product_count d-flex">
                            <label class="my-auto" for="qty">Quantity:</label>
                            <a class="btn btn-sm btn-outline-secondary" onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;"><i class="fa fa-angle-left"></i></a>
                            <input type="text" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                            <a class="btn btn-sm btn-outline-dark" onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"><i class="fa fa-angle-right"></i></a>
                            <a class="btn btn-sm btn-primary ml-auto"><i class="fa fa-shopping-cart"></i> <i class="fa fa-plus" style="font-size: smaller;"></i> Tambahkan Ke Keranjang</a>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="cart.php" class="btn btn-lg btn-primary d-flex rounded mt-3 align-items-center"><i class="fa fa-shopping-cart ml-auto mr-3"></i><span class="mr-auto"> Beli Sekarang</span></a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-lg btn-outline-green d-flex rounded mt-3 align-items-center"><i class="fa fa-whatsapp ml-auto mr-3"></i><span class="mr-auto"> Chat Penjual</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Description Area -->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="btn-sm btn-outline-primary nav-link shadow" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="btn-sm btn-outline-primary nav-link shadow active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade text-justify pl-5 pr-5" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos quas velit laborum voluptatem distinctio reprehenderit quasi enim nesciunt, magni commodi delectus ab quod. A vero aut culpa soluta provident ratione.Lorem, ipsum dolor
                        sit amet consectetur adipisicing elit. Quos quas velit laborum voluptatem distinctio reprehenderit quasi enim nesciunt, magni commodi delectus ab quod. A vero aut culpa soluta provident ratione.Lorem, ipsum dolor sit amet consectetur
                        adipisicing elit. Quos quas velit laborum voluptatem distinctio reprehenderit quasi enim nesciunt, magni commodi delectus ab quod. A vero aut culpa soluta provident ratione.Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Quos quas velit laborum voluptatem distinctio reprehenderit quasi enim nesciunt, magni commodi delectus ab quod. A vero aut culpa soluta provident ratione.</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos quas velit laborum voluptatem distinctio reprehenderit quasi enim nesciunt, magni commodi delectus ab quod. A vero aut culpa soluta provident ratione.Lorem, ipsum dolor
                        sit amet consectetur adipisicing elit. Quos quas velit laborum voluptatem distinctio reprehenderit quasi enim nesciunt, magni commodi delectus ab quod. A vero aut culpa soluta provident ratione.</p>
                </div>
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate mb-4">
                                <div class="col-12">
                                    <div class="box_total">
                                        <h5>Overall Rating</h5>
                                        <h4>5.0</h4>
                                        <h6>(03 Reviews)</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="review_list">
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="../img/product/review-1.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>M. Iqbal</h4>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="../img/product/review-2.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Budi S.</h4>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="../img/product/review-3.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Shinta</h4>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                            <i class="fa fa-star mr-1 text-warning"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <div class="box_total">
                                    <h5>Tambahkan Review</h5>
                                </div>
                                <p>Penilaian Anda:</p>
                                <div class="form-group">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="Sangat Bagus">5 stars</label>

                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="Bagus">4 stars</label>

                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="Biasa">3 stars</label>

                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="Buruk">2 stars</label>

                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="Sangat Buruk">1 star</label>
                                    </div>
                                </div>

                                <form action="#/" class="form-contact form-review mt-3">
                                    <div class="form-group">
                                        <textarea class="form-control different-control w-100" name="textarea" id="textarea" cols="30" rows="5" placeholder="Tulis Review"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline-secondary mt-3"><i class="fa fa-send-o"></i> Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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