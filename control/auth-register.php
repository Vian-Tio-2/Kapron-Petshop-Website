<?php

include_once('koneksi.php');
session_start();

if (!empty($_REQUEST['name'] && $_REQUEST['email'] && $_REQUEST['password'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT); // hash password
}

if (!empty($name && $email && $password)) {
    $sql = "INSERT INTO tb_customer (customer_name, login_id , login_password, email)
            VALUES ('$name', '$email', '$password_hash', '$email');";
    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    echo '<script>alert("Akun berhasil didaftarkan")
            window.location="../login.php";
            </script>';
} else {
    echo '<script>
			alert("Data tidak boleh kosong!!");
			window.location="../login.php";
			</script>';
}
