<?php
include_once('koneksi.php');

if (isset($_SESSION['userid'])) {
    $user_check = $_SESSION['userid'];

    $sql = "SELECT customer_id  FROM tb_customer WHERE customer_id  = '$user_check'";
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
