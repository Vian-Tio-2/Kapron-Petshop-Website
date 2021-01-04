<?php
session_start();
include_once 'control/koneksi.php';
$_SESSION["visited_page"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include_once 'control/session-check.php';

//Info
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];

    $sql = "SELECT * FROM tb_customer WHERE customer_id  = '$userid'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $username = $row['customer_name'];
    $useremail = $row['email'];
    $usergender = $row['gender'];
    $userphone = $row['phone_number'];
    $useraddress = $row['address'];

    $userimage = $row['customer_image'];
    if (empty($userimage)) {
        $userimage = 'img/undraw_profile.svg';
    }
}

//pembanding option
include_once 'control/function.php';
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
    <link href="css/user.css" rel="stylesheet">
    <link href="css/avatar.css" rel="stylesheet">

    <!-- Custom fonts-->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat|Ubuntu' rel='stylesheet' type='text/css'>

    <title>Petshop Kapron</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navUser">
        <div class="collapse navbar-collapse" id="dropdownItem">
            <a class="navbar-brand" href="#"><i class="fa fa-circle-o-notch" style="font-size: 2rem;"></i> Kapron </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop/product.php"><i class="fa fa-shopping-basket"></i> Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop/cart.php"><i class="fa fa-shopping-cart"></i> Keranjang</a>
                </li>
            </ul>
        </div>
        <?php include_once 'template-btn-login.php' ?>
        <a class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#dropdownItem" aria-controls="dropdownItem" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
    </nav>

    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-12 d-inline-flex align-items-stretch px-0">
                    <div class="card shadow rounded w-100 bg-nice border-0">
                        <div class="card-body">
                            <form action="control/update-user-photo.php" enctype="multipart/form-data" method="post">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input  id="file" name="file" type="file" accept=".png, .jpg, .jpeg" />
                                        <label for="file"></label>
                                    </div>
                                    <div class="avatar-preview shadow bg-dark">
                                        <div id="imagePreview" style="background-image: url(<?= $userimage; ?>);">
                                        </div>
                                    </div>
                                </div>
                                <button id="Submit" name="submit" type="submit" value="Submit" class="btn btn-sm btn-primary form-control mt-n5">Upload Foto</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-12 align-items-stretch px-0">
                    <div class="login_form_inner border">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item ml-auto mr-4 mb-5">
                                <a class="btn-sm btn-outline-primary nav-link shadow active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true"><i class="fa fa-user"></i> Profil</a>
                            </li>
                            <li class="nav-item mr-auto ml-4 mb-5">
                                <a class="btn-sm btn-outline-primary nav-link shadow" id="create-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false"><i class="fa fa-edit"></i> Edit</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <h3>Informasi Data Diri</h3>
                                <div class="konten">
                                    <table class="table text-justify">
                                        <tr>
                                            <td width="160px">
                                                <span class="font-weight-bolder">Nama</span>
                                            </td>
                                            <td>
                                                <span><?= $username; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="font-weight-bolder">Email</span>
                                            </td>
                                            <td>
                                                <span><?= $useremail; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="font-weight-bolder">Jenis Kelamin</span>
                                            </td>
                                            <td>
                                                <span><?= $usergender; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="font-weight-bolder">No Telephone</span>
                                            </td>
                                            <td>
                                                <span>0<?= $userphone; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="font-weight-bolder">Alamat</span>
                                            </td>
                                            <td>
                                                <span><?= $useraddress; ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="create-tab">
                                <h3>Edit Data Diri</h3>
                                <form class="row login_form" action="control/update-user-profile.php" method="POST" id="contactForm">
                                    <div class="col-md-12 form-group form-check-inline">
                                        <label for="name" class="font-weight-bolder mr-4" style="font-size: 17px;">Nama&nbsp;&nbsp;&nbsp;</label>
                                        <input type="text" class="form-control text-dark" value="<?= $username; ?>" id="name" name="name" placeholder="Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap'">
                                    </div>
                                    <div class="col-md-12 form-group form-check-inline">
                                        <label for="email" class="font-weight-bolder mr-4" style="font-size: 17px;">Email&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="text" class="form-control text-dark" value="<?= $useremail; ?>" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                    </div>
                                    <div class="col-md-12 form-group form-check-inline">
                                        <label for="jeniskelamin" class="font-weight-bolder mr-4" style="font-size: 17px;">Gender&nbsp;</label>
                                        <select class="form-control rounded" name="jeniskelamin" id="jeniskelamin">
                                            <option value="" <?php optionSelected("") ?> disabled hidden>Jenis Kelamin</option>
                                            <option value="Perempuan" <?php optionSelected("Perempuan") ?>>Perempuan</option>
                                            <option value="Laki-Laki" <?php optionSelected("Laki-Laki") ?>>Laki-Laki</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group form-check-inline">
                                        <label for="telephone" class="font-weight-bolder mr-4" style="font-size: 17px;">Phone&nbsp;&nbsp;&nbsp;</label>
                                        <input type="text" class="form-control text-dark" value="<?= $userphone; ?>" id="telephone" name="telephone" placeholder="Nomor Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Telephone'">
                                    </div>
                                    <div class="col-md-12 form-group form-check-inline">
                                        <label for="alamat" class="font-weight-bolder mr-4" style="font-size: 17px;">Alamat&nbsp;</label>
                                        <input type="text" class="form-control text-dark" value="<?= $useraddress; ?>" id="alamat" name="alamat" placeholder="Alamat Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Lengkap'">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <button type="submit" value="submit" class="btn btn-primary form-control">Update Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    <button class="btn btn-primary rounded" type="button" data-dismiss="modal">Batal</button>
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
    <script src="js/avatar.js"></script>
</body>

</html>