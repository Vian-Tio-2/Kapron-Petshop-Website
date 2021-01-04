<?php

include_once('koneksi.php');
session_start();

if(isset($_SESSION["visited_page"])){
    $last_page = $_SESSION['visited_page'];
} else {
    $last_page = "../home.php";
}

if (!empty($_REQUEST['username'] && $_REQUEST['password'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $sql = "SELECT * FROM tb_customer WHERE login_id  = '$username'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);

        $count = mysqli_num_rows($result);

        // If result matched $username and $password, table row must be 1 row

        if ($count == 1) {

            if (password_verify($password, $row['login_password'])) {
                echo "<script>
			        window.location="."'".$last_page."'".";
			        </script>";
                $_SESSION['userid'] = $row['customer_id'];
                $_SESSION['username'] = $row['customer_name'];
                $_SESSION['userimage'] = $row['customer_image'];
            } else {
                echo '<script>
			        alert("Password salah");
			        window.location="../login.php";
			        </script>';
            }
        } else {
            echo '<script>
			alert("Username tidak ada, silahkan register!!");
			window.location="../login.php";
			</script>';
        }
    }
} else {
    echo '<script>
            alert("Username dan Password tidak boleh kosong!!");
			window.location="../login.php";
			</script>';
}
