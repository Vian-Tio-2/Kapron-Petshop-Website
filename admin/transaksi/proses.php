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

if (isset($_POST['proses'])) {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];

        // query sql
        $sql = "UPDATE tb_order
                SET order_status = 'Pesanan Diproses'
                WHERE order_id = '$id';";
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
            alert('Gagal Update Data!!');
            window.location=" . "'" . $last_page . "'" . ";
			</script>";
    }
} elseif (isset($_POST['tolak'])) {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];

        // query sql
        $sql = "UPDATE tb_order
                SET order_status = 'Pesanan Ditolak'
                WHERE order_id = '$id';";
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
            alert('Gagal Update Data!!');
            window.location=" . "'" . $last_page . "'" . ";
			</script>";
    }
} elseif (isset($_POST['selesai'])) {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];

        // query sql
        $sql = "UPDATE tb_order
                SET order_status = 'Pesanan Selesai'
                WHERE order_id = '$id';";
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
            alert('Gagal Update Data!!');
            window.location=" . "'" . $last_page . "'" . ";
			</script>";
    }
} elseif (isset($_POST['batal'])) {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];

        // query sql
        $sql = "UPDATE tb_order
                SET order_status = 'Pesanan Dibatalkan'
                WHERE order_id = '$id';";
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
            alert('Gagal Update Data!!');
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
