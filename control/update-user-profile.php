<?php

include_once('koneksi.php');
session_start();
$userid = $_SESSION['userid'];

if (!empty($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $gender = $_REQUEST['jeniskelamin'];
    $phone = $_REQUEST['telephone'];
    $address = $_REQUEST['alamat'];
} else {
    echo '<script>alert("Nama tidak Boleh Kosong")
            window.location="../user-profile.php";
            </script>';
    exit();
}

if (!empty($name)) {
    $sql = "UPDATE tb_customer 
            SET customer_name = '$name' , email = '$email' , gender = '$gender' , phone_number = '$phone' , address = '$address'
            WHERE customer_id = '$userid'";
    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    echo '<script>
            window.location="../user-profile.php";
            </script>';
} else {
    echo '<script>
			alert("Nama tidak boleh kosong!!");
			window.location="../user-profile.php";
			</script>';
}
