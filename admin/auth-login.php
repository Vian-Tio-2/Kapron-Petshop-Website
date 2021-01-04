<?php
include_once('../control/koneksi.php');
session_start();

if (!empty($_REQUEST['username'] && $_REQUEST['password'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, md5($_POST['password']));

        $sql = "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);

        $count = mysqli_num_rows($result);

        // If result matched $username and $password, table row must be 1 row

        if ($count == 1) {
            echo '<script>
			        window.location="index.php";
			        </script>';
            $_SESSION['adminid'] = $row['id'];
        } else {
            echo '<script>
            alert("Username atau Password Salah!!");
            window.location="index.php";
			</script>';
        }
    }
} else {
    echo '<script>
			alert("Username dan Password tidak boleh kosong!!");
			window.location="login.php";
			</script>';
}
