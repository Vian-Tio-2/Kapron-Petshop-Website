<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="vendors/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Private CSS -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Custom fonts-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat|Ubuntu' rel='stylesheet' type='text/css'>

    <title>Petshop Kapron</title>
</head>

<body>
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img src="img/Login-Kanan.png" class="mt-5">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner shadow">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item ml-auto mr-4 mb-5">
                                <a class="btn-sm btn-outline-primary nav-link shadow active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true"><i class="fa fa-user"></i> Login</a>
                            </li>
                            <li class="nav-item mr-auto ml-4 mb-5">
                                <a class="btn-sm btn-outline-primary nav-link shadow" id="create-tab" data-toggle="tab" href="#create" role="tab" aria-controls="create" aria-selected="false"><i class="fa fa-user-plus"></i> Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <h3>login</h3>
                                <form class="row login_form" method="post" action="control/auth-login.php" id="contactForm">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control text-dark" id="username" name="username" placeholder="Username / Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username / Email'">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="password" class="form-control text-dark" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="creat_account">
                                            <input type="checkbox" id="remember" name="selector">
                                            <label for="remember">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <button class="btn btn-primary form-control" type="submit" >Masuk</button>
                                        <a href="index.php">Kembali ke Home Screen</a>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="create" role="tabpanel" aria-labelledby="create-tab">
                                <h3>Sign Up</h3>
                                <form class="row login_form" method="post" action="control/auth-register.php" id="contactForm">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="text-dark form-control" id="name" name="name" placeholder="Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap'">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="text-dark form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="password" class="text-dark form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <button type="submit" value="submit" class="form-control btn btn-primary">Buat Akun</button>
                                        <a href="index.php">Kembali ke Home Screen</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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