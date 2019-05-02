<?php
require "../model.php";

$layer = "../img/" . $_POST['layer'];
$layer = imagecreatefrompng($layer);
$img = $_POST['image'];
$img = preg_replace('/ /', '+', $img);
$path = "../pictures/";
$image_parts = explode(";base64,", $img);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_en_base64 = base64_decode($image_parts[1]);
$file = $path . uniqid() . ".png";
file_put_contents($file, $image_en_base64);
/* $img_src = imagecreatefrompng($file);
$size_layer = getimagesize($layer);
$size_img = getimagesize($img_src);
imagecopyresampled($img_src, $layer, 0, 0, 0, 0, $size_img[0], $size_img[1], $size_layer[0], $size_layer[1]);
imagepng($img_src, $file); */


/* $path = "../pictures/";

$image_parts = explode(";base64,", $img);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_en_base64 = base64_decode($image_parts[1]);
$file = $path . uniqid() . ".png";

file_put_contents($file, $image_en_base64); */
echo $file;