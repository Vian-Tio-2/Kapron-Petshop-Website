<?php
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM tb_customer WHERE customer_id  = '$userid'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['customer_name'];
    $userimage = $row['customer_image'];
    if (empty($userimage)) {
        $userimage = 'img/undraw_profile.svg';
    }
}

?>

<ul class="navbar-nav">
    <?php if (!isset($userid)): ?>
        <li class="nav-item dropdown no-arrow align-self-center">
            <a class="btn px-3 py-2 rounded-pill border-0" href="../login.php"><i class="fa fa-sign-in"></i> Login</a>
        </li>
    <?php else: ?>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline"><?=strtok($username, " ");?></span>
                <img class="rounded-circle border" src="../<?=$userimage?>" style="object-fit: cover; height: 2rem; width: 2rem;">
                <span class="mr-2 d-lg-none d-md-inline d-sm-inline d-xs-inline"><?=strtok($username, " ");?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../user-profile.php">
                    <i class="fa fa-user fa-fw mr-2"></i> Profile
                </a>
                <a class="dropdown-item" href="purchase-history.php">
                    <i class="fa fa-history fa-fw mr-2"></i> Histori Pembelian
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fa fa-sign-out fa-fw mr-2"></i> Logout
                </a>
            </div>
        </li>
    <?php endif;?>
</ul>