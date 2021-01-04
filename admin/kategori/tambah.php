<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('../../control/koneksi.php');

if (isset($_SESSION["visited_page2"])) {
    $last_page = $_SESSION['visited_page2'];
} else {
    $last_page = "../index.php";
}

if (isset($_POST['tambah'])) {
    if (!empty($_POST["categoryName"])) {
        $name = $_POST["categoryName"];
        $desc = $_POST["categoryDesc"];

        // query sql
        $sql = "INSERT INTO tb_kategori_produk (product_type_name , product_type_description)
            VALUES ('$name', '$desc');";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    }
    if (!empty($_POST["categoryName"])) {
        if ($query) {
            echo "<script>
                window.location=" . "'" . $last_page . "'" . ";
			    </script>";
        } else {
            echo "Error :" . $sql . "<br>" . mysqli_error($db);
        }

        mysqli_close($db);
    } else {
        echo "<script>
            alert('Data Tidak Boleh Kosong!!');
            window.location=" . "'" . $last_page . "'" . ";
			</script>";
    }
} else {
    echo "<script>
            alert('Aksi Illegal!!');
            window.location=" . "'" . $last_page . "'" . ";
			</script>";
    exit();
}
