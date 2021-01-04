<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('../../control/koneksi.php');
include_once('../../control/function.php');

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
if (isset($_POST['edit2']) && isset($_POST["id2"]) && isset($_POST["idk2"]) && isset($_POST["nama2"]) && isset($_POST["harga2"])) {
    if (!empty($_POST["id2"] && $_POST["idk2"] && $_POST["nama2"] && $_POST["harga2"])) {
        $id = $_POST["id2"];
        $kategori = $_POST["idk2"];
        $nama = $_POST["nama2"];
        $harga = $_POST["harga2"];
        $warna = $_POST["warna2"];
        $ukuran = $_POST["ukuran2"];
        $berat = $_POST["berat2"];
        $desc = $_POST["desc2"];
        $desc2 = $_POST["descl2"];

        //image processing
        if (!empty($_FILES["file"]["name"])) {
            $filename = $_FILES["file"]["name"];
            $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
            $file_ext = substr($filename, strripos($filename, '.')); // get file name
            $filesize = $_FILES["file"]["size"];
            $allowed_file_types = array('.png', '.jpg', '.jpeg');

            if (in_array($file_ext, $allowed_file_types) && ($filesize < 20480000)) {
                // Rename file
                $waktu = date('Y-m-d-H-i-s');
                $newfilename = md5($file_basename) . '-' . $waktu . $file_ext;
                if (file_exists("../../img/product/" . $newfilename)) {
                    // file already exists error
                    echo "<script>
                            alert('Anda Telah Mengupload File ini!!');
                        </script>";
                    exit;
                } else {
                    // hapus foto lama
                    $sql = "SELECT product_image FROM tb_produk WHERE product_id = '$id'";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $hapusFile = "../../" . $row['product_image'];
                    if(!empty($row['product_image'])){
                        $hapusFile = "../../" . $row['product_image'];
                        unlink("$hapusFile");
                    }

                    // query update directory database
                    $img = "img/product/" . $newfilename;
                    $sql = "UPDATE tb_produk
                        SET product_image = '$img'
                        WHERE product_id  = '$id'";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

                    // move and compress image quality
                    if(compressImage($_FILES["file"]["tmp_name"], "../../img/product/" . $newfilename, 90)){
                        compressImage($_FILES["file"]["tmp_name"], "../../img/product/" . $newfilename, 90);
                    } else {
                        move_uploaded_file($_FILES["file"]["tmp_name"], "../../img/product/" . $newfilename);
                    }
                }
            } elseif (empty($file_basename)) {
                // file selection error
                echo "<script>
                    alert('Please select a file to upload.');
                </script>";
                exit;
            } elseif ($filesize > 20480000) {
                // file size error
                echo "<script>
                    alert('Gambar melebihi 20MB.');
                </script>";
                exit;
            } else {
                // file type error
                echo "" . implode(', ', $allowed_file_types);
                unlink($_FILES["file"]["tmp_name"]);
                echo "<script>
                    alert('Hanya boleh upload file berikut : '.png' '.jpg' '. jpeg'');
                </script>";
                exit;
            }
        }

        // query sql
        $sql = "UPDATE tb_produk
                SET product_type_id = '$kategori', product_name = '$nama', product_price = '$harga', product_color = '$warna', product_size = '$ukuran', product_weight = '$berat', product_short_description = '$desc', product_long_description = '$desc2'
                WHERE product_id = '$id';";
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                                <input type="text" class="form-control text-dark" id="id2" name="id2" value="<?= $_POST["id"]; ?>" readonly>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="idk2" class="text-dark">Kategori</label>
                            </div>
                            <div class="col-8 mb-3">
                                <select class="form-control rounded" name="idk2" id="idk2">
                                    <?php
                                    $query2 = "SELECT * FROM tb_kategori_produk";
                                    $hasil2 = mysqli_query($db, $query2);
                                    while ($row2 = mysqli_fetch_array($hasil2)) {
                                        $selected = ($row2[0] == $_POST["idk"]) ? 'selected="selected"' : '';
                                        echo "<option value='$row2[0]'" . $selected . ">$row2[1]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="nama2" class="text-dark">Nama Produk</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control text-dark" id="nama2" name="nama2" value="<?= $_POST["nama"]; ?>" placeholder="Nama Produk" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Produk'">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="harga2" class="text-dark">Harga</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="number" class="form-control text-dark" id="harga2" name="harga2" value="<?= $_POST["harga"]; ?>" placeholder="Harga" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Harga'">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="warna2" class="text-dark">Warna</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control text-dark" id="warna2" name="warna2" value="<?= $_POST["warna"]; ?>" placeholder="Warna" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Warna'">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="ukuran2" class="text-dark">Ukuran</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control text-dark" id="ukuran2" name="ukuran2" value="<?= $_POST["ukuran"]; ?>" placeholder="Ukuran" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ukuran'">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="berat2" class="text-dark">Berat</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="number" class="form-control text-dark" id="berat2" name="berat2" value="<?= $_POST["berat"]; ?>" placeholder="Berat (Gram)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Berat (Gram)'">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="desc2" class="text-dark">Deskripsi Singkat</label>
                            </div>
                            <div class="col-8 mb-3">
                                <textarea type="text" rows="3" cols="1" class="form-control text-dark" id="desc2" name="desc2" placeholder="Deskripsi Singkat (400 Karakter)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi Singkat (400 Karakter)'"><?= $_POST["desc"]; ?></textarea>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="descl2" class="text-dark">Deskripsi Lengkap</label>
                            </div>
                            <div class="col-8 mb-3">
                                <textarea type="text" rows="5" cols="1" class="form-control text-dark" id="descl2" name="descl2" placeholder="Deskripsi Panjang" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi Panjang'"><?= $_POST["descl"]; ?></textarea>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="logo" class="text-dark">Gambar Produk</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="file" class="form-control-file text-dark" id="file" name="file" accept=".png, .jpg, .jpeg">
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