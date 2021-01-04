<?php

//pembanding string pada input option untuk gender
function optionSelected($str = '')
{
    global $usergender;
    if (!strcmp($usergender, $str)) {
        echo "selected";
    }
}

//pembanding string pada sidebar admin page
function sideActive($str = '')
{
    if (!strcmp($_GET['page'], $str)) {
        echo "active";
    }
}

// Compress image
function compressImage($source, $destination, $quality)
{

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
    }

    if(!empty( $image && $destination && $quality)){
        imagejpeg($image, $destination, $quality);
        return true;
    } else {
        return false;
    }


}

//Warna Text Status
function warnaText($text){
    if(!strcmp("Pesanan Selesai", $text)){
        return "class = 'text-success font-weight-bold'";
    } elseif (!strcmp("Pesanan Diproses", $text)) {
        return "class = 'text-info font-weight-bold'";
    } elseif (!strcmp("Pesanan Dibatalkan", $text)) {
        return "class = 'text-warning font-weight-bold'";
    } else {
        return "class = 'text-danger font-weight-bold'";
    }
}