<?php
include_once('session-check.php');
include_once('../control/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Kapron Petshop</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../vendors/sb-admin2/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendors/sb-admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../vendors/sb-admin2/css/style.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Image Zoom -->
    <div id="lb-back">
        <div id="lb-img"></div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text"><i class="fa fa-circle-o-notch"></i> Kapron</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php sideActive('dashboard') ?>">
                <a class="nav-link" href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=dashboard">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Kategori -->
            <li class="nav-item <?php sideActive('kategori') ?>">
                <a class="nav-link" href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=kategori">
                    <i class="fa fa-fw fa-tag"></i>
                    <span>Kategori Barang</span></a>
            </li>

            <!-- Nav Item - Barang -->
            <li class="nav-item <?php sideActive('barang') ?>">
                <a class="nav-link" href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=barang">
                    <i class="fa fa-fw fa-shopping-bag"></i>
                    <span>Barang</span></a>
            </li>

            <!-- Nav Item - Metode Pembayaran -->
            <li class="nav-item <?php sideActive('payment-method') ?>">
                <a class="nav-link" href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=payment-method">
                    <i class="fa fa-fw fa-dollar"></i>
                    <span>Metode Pembayaran</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Transaksi
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php sideActive('transaksi-proses') ?>">
                <a class="nav-link" href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=transaksi-proses">
                    <i class="fa fa-fw fa-table"></i>
                    <span>Transaksi Dalam Proses</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php sideActive('transaksi') ?>">
                <a class="nav-link" href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=transaksi">
                    <i class="fa fa-fw fa-table"></i>
                    <span>Transaksi Selesai</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Customer
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php sideActive('customer') ?>">
                <a class="nav-link" href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=customer">
                    <i class="fa fa-fw fa-table"></i>
                    <span>Customer</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php sideActive('review') ?>">
                <a class="nav-link" href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=review">
                    <i class="fa fa-fw fa-table"></i>
                    <span>Review</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav d-flex w-100 pt-2 align-items-center justify-content-center">
                        <li class="nav-item ml-2">
                            <h1 class="h3 text-gray-800">Administrator Site</h1>
                        </li>
                        <li class="nav-item ml-auto">
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-download fa-sm text-white-50"></i> Cetak Laporan
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fa fa-sign-out fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <?php
                        // create an array of allowed pages
                        $allowedPages = array('dashboard', 'kategori', 'barang', 'payment-method', 'customer', 'transaksi', 'review', 'transaksi-proses');
                        // check if the page variable is set and check if it is the array of allowed pages
                        if (isset($_GET['page']) && in_array($_GET['page'], $allowedPages)) {
                            // first check that the file exists
                            if (file_exists($_GET['page'] . '.php')) {
                                // If all is well, we include the file
                                include_once $_GET['page'] . '.php';
                            } else {
                                // A little error message if the file does not exist
                                echo 'No such file exists';
                            }
                        } else {
                            // if things are not as they should be, we included the default page
                            if (file_exists('dashboard.php')) {
                                // include the default page
                                include_once 'dashboard.php';
                            } else {
                                // if the default page is missing, we have a problem and it needs to be fixed.
                                echo 'dashboard.php is missing. Please fix me.';
                            }
                        }
                        ?>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Kapron Petshop <script>
                                    document.write(new Date().getFullYear());
                                </script></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function confirmationDelete() {
                var conf = confirm('Apakah Anda yakin ingin menghapus data ini?');
                if (conf)
                    document.getElementById('form-id').submitObject.value = "hapus";
            }
        </script>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendors/jquery/jquery-3.2.1.min.js"></script>
        <script src="../vendors/bootstrap/popper.min.js"></script>
        <script src="../vendors/bootstrap/bootstrap.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendors/sb-admin2/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../vendors/sb-admin2/js/sb-admin-2.min.js"></script>
        <script src="../vendors/sb-admin2/js/script.js"></script>

        <!-- Page level plugins -->
        <script src="../vendors/sb-admin2/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendors/sb-admin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../vendors/sb-admin2/js/demo/datatables-demo.js"></script>

</body>

</html>