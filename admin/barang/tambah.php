<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('../../control/function.php');
include_once('../../control/koneksi.php');

if (isset($_SESSION["visited_page2"])) {
    $last_page = $_SESSION['visited_page2'];
} else {
    $last_page = "../index.php";
}

if (isset($_POST['tambah'])) {
    if (!empty($_POST["kategori"] && $_POST["productName"] && $_POST["harga"])) {
        $category = $_POST["kategori"];
        $name = $_POST["productName"];
        $harga = $_POST["harga"];
        $warna = $_POST["warna"];
        $ukuran = $_POST["ukuran"];
        $berat = $_POST["berat"];
        $shortDesc = $_POST["shortDesc"];
        $longDesc = $_POST["longDesc"];
        $img;

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
                            window.location=" . "'" . $last_page . "'" . ";
                        </script>";
                    exit;
                } else {
                    // query update directory database
                    $img = "img/product/" . $newfilename;

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
                            window.location=" . "'" . $last_page . "'" . ";
                        </script>";
                    exit;
            } else {
                // file type error
                echo "" . implode(', ', $allowed_file_types);
                unlink($_FILES["file"]["tmp_name"]);
                echo "<script>
                            alert('Hanya boleh upload file berikut : '.png' '.jpg' '. jpeg'');
                            window.location=" . "'" . $last_page . "'" . ";
                        </script>";
                    exit;
            }
        } else {
            $img = '';
        }

        // query sql
        $sql = "INSERT INTO tb_produk (product_type_id , product_name, product_price, product_color, product_size, product_weight, product_short_description, product_long_description, product_image)
            VALUES ('$category', '$name', '$harga', '$warna', '$ukuran', '$berat', '$shortDesc', '$longDesc', '$img');";
        $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    }
    if (!empty($_POST["kategori"] && $_POST["productName"] && $_POST["harga"])) {
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
