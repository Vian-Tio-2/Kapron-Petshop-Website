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
    if (!empty($_POST["id"] && $_POST["id2"])) {
        $id = $_POST["id"];
        $id2 = $_POST["id2"];

        // query sql
        $sql = "DELETE FROM tb_review WHERE customer_id = '$id' AND product_id = '$id2'";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    }
    if (!empty($_POST["id"] && $_POST["id2"])) {
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
