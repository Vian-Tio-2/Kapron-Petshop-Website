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

if (isset($_POST['hapus'])) {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];

        // hapus foto lama
        $sql = "SELECT payment_method_image FROM tb_payment_method WHERE payment_method_id = '$id'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $hapusFile = "../../" . $row['payment_method_image'];
        if (!empty($row['payment_method_image'])) {
            unlink("$hapusFile");
        }

        // query sql
        $sql = "DELETE FROM tb_payment_method WHERE payment_method_id = '$id'";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    }
    if (!empty($_POST["id"])) {
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
            alert('Gagal Hapus Data!!');
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
