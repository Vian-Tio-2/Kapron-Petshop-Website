<?php
session_start();
include_once('koneksi.php');
include_once('function.php');
if (!empty($_SESSION['userid'] && $_POST['submit'])) {
    $userid = $_SESSION['userid'];
} else {
    header("Location: ../user-profile.php"); /* Redirect browser */
    exit();
}

// Upload and Rename File

if (isset($_POST['submit'])) {
    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
    $file_ext = substr($filename, strripos($filename, '.')); // get file name
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.png', '.jpg', '.jpeg');

    if (in_array($file_ext, $allowed_file_types) && ($filesize < 20480000)) {
        // Rename file
        $waktu = date('Y-m-d-H-i-s');
        $newfilename = $userid . '-' . md5($file_basename) . '-' . $waktu . $file_ext;
        if (file_exists("../img/user-profile/" . $newfilename)) {
            // file already exists error
            echo '<script>alert("Anda telah mengupload file ini")
                window.location="../user-profile.php";
                </script>';
        } else {
            // hapus foto lama
            $sql = "SELECT customer_image  FROM tb_customer WHERE customer_id  = '$userid'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $hapusFile = "../" . $row['customer_image'];
            unlink("$hapusFile");

            // query update directory database
            $db_img = "img/user-profile/" . $newfilename;
            $sql = "UPDATE tb_customer
            SET customer_image = '$db_img'
            WHERE customer_id = '$userid'";
            $query = mysqli_query($db, $sql) or die(mysqli_error($db));

            // move and compress image quality
            if(compressImage($_FILES["file"]["tmp_name"], "../img/user-profile/" . $newfilename, 80)){
                compressImage($_FILES["file"]["tmp_name"], "../img/user-profile/" . $newfilename, 80);
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], "../img/user-profile/" . $newfilename);
            }
            echo '<script>
                window.location="../user-profile.php";
                </script>';
        }
    } elseif (empty($file_basename)) {
        // file selection error
        echo '<script>alert("Please select a file to upload.")
            window.location="../user-profile.php";
            </script>';
    } elseif ($filesize > 20480000) {
        // file size error
        echo '<script>alert("File tidak boleh lebih dari 20MB.")
            window.location="../user-profile.php";
            </script>';
    } else {
        // file type error
        echo "" . implode(', ', $allowed_file_types);
        unlink($_FILES["file"]["tmp_name"]);
        echo "<script>
                alert('Hanya boleh upload file berikut : '.png' '.jpg' '. jpeg'')
                window.location='../user-profile.php';
            </script>";
    }
} else {
    echo "<script>
                alert('Illegal Activity'')
                window.location='../user-profile.php';
            </script>";
}
