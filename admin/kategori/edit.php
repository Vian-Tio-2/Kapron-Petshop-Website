<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once '../../control/koneksi.php';

if (isset($_SESSION["visited_page2"])) {
    $last_page = $_SESSION['visited_page2'];
} else {
    $last_page = "../index.php";
}

if (isset($_SESSION['adminid'])) {
    $user_check = $_SESSION['adminid'];

    $sql = "SELECT * FROM tb_admin WHERE id = '$user_check'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $count = mysqli_num_rows($result);

    if ($count != 1) {
        echo '<script>
            alert("Akun Tidak Valid");
            window.location="../login.php";
			</script>';
        exit();
    }
} else {
    echo '<script>
            window.location="../login.php";
			</script>';
    exit();
}

//SQL Edit
if (isset($_POST['edit2']) && isset($_POST["categoryName2"])) {
    if (!empty($_POST["id2"] && $_POST["categoryName2"])) {
        $id = $_POST["id2"];
        $name = $_POST["categoryName2"];
        $desc = $_POST["categoryDesc2"];

        // query sql
        $sql = "UPDATE tb_kategori_produk
                SET product_type_name = '$name', product_type_description = '$desc'
                WHERE product_type_id = '$id';";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
        
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Kapron Petshop</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../vendors/bootstrap/bootstrap.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Modal Edit -->
    <div class="modal fade" id="edit" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" enctype='multipart/form-data' method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalLongTitle">Edit Data Kategori Barang</h5>
                        <button type="button" onclick="location.href = '<?= $last_page; ?>';" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center">
                            <div class="col-4 mb-3">
                                <label for="id2" class="text-dark">ID</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control text-dark" name="id2" id="id2" value="<?= $_POST["id"]; ?>" readonly />
                            </div>
                            <div class="col-4 mb-3">
                                <label for="categoryName2" class="text-dark">Nama Kategori</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control text-dark" id="categoryName2" name="categoryName2" value="<?= $_POST["nama"]; ?>" placeholder="Nama Kategori" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Kategori'">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="categoryDesc2" class="text-dark">Deskripsi Kategori</label>
                            </div>
                            <div class="col-8 mb-3">
                                <textarea type="text" rows="5" cols="1" class="form-control text-dark" id="categoryDesc2" name="categoryDesc2" placeholder="Deskripsi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi'"><?= $_POST["desc"]; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="location.href = '<?= $last_page; ?>';" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id='edit2' name='edit2'>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="../../vendors/bootstrap/popper.min.js"></script>
    <script src="../../vendors/bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript">
        $('#edit').modal({
            show: true
        })
    </script>

</body>

</html>