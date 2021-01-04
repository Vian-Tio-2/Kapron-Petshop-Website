<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include_once('../control/koneksi.php');

if (isset($_SESSION['adminid'])) {
    $user_check = $_SESSION['adminid'];

    $sql = "SELECT * FROM tb_admin WHERE id = '$user_check'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $count = mysqli_num_rows($result);

    if ($count != 1) {
        echo '<script>
            alert("Akun Tidak Valid");
            window.location="login.php";
			</script>';
        exit();
    }
} else {
   echo '<script>
            window.location="login.php";
			</script>';
   exit();
}
