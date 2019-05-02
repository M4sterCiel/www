<?php
require "../model.php";

$layer = $_POST['layer'];
$layer = imagecreatefrompng($layer);
$img = $_POST['image'];
$img = preg_replace('/ /', '+', $img);
/* $img = base64_decode($img);
$size = getimagesize($layer);
imagecopy($img, $layer, 0, 0, 0, 0, $size[0], $size[1]);
//$img = base64_encode($img);
$file = fopen("newfile.png");
file_put_contents($file, $img);
echo $img; */

$path = "camagru/";

$image_parts = explode(";base64,", $img);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_en_base64 = base64_decode($image_parts[1]);
$file = "newfile.png";

file_put_contents($file, $image_en_base64);