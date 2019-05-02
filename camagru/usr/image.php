<?php
require "../model.php";
session_start();

$path_layer = "../img/" . $_POST['layer'];
$layer = imagecreatefrompng($path_layer);


$img = $_POST['image'];
$img = preg_replace('/ /', '+', $img);
$path = "../pictures/";

$image_parts = explode(";base64,", $img);

$image_en_base64 = base64_decode($image_parts[1]);
$file = $path . uniqid() . ".png";
file_put_contents($file, $image_en_base64);

$img_src = imagecreatefrompng($file);

imagecopy($img_src, $layer, 0, imagesy($img_src) - imagesy($layer), 0, 0, imagesx($layer), imagesy($layer));
imagepng($img_src, $file);

imagedestroy($img_src);
imagedestroy($layer);

$path_img = explode("/", $file);
db_insert_picture($_SESSION['user'], $path_img[2]);


echo $file;