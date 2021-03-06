<?php
require "../model.php";
session_start();

$path_layer = "../img/" . $_POST['layer'];
$layer = imagecreatefrompng($path_layer);
$layer = imagescale($layer, 195);

$img = $_POST['image'];
$img = preg_replace('/ /', '+', $img);
$path = "../pictures/";
$image_parts = explode(";base64,", $img);

$image_en_base64 = base64_decode($image_parts[1]);

if ($image_parts[0] == 'data:image/jpeg')
{
    $file = $path . uniqid() . ".jpeg";
    file_put_contents($file, $image_en_base64);
    $img_src = imagecreatefromjpeg($file);
    $img_src = imagescale($img_src, 800);
}
else
{
    $file = $path . uniqid() . ".png";
    file_put_contents($file, $image_en_base64);
    $img_src = imagecreatefrompng($file);
    $img_src = imagescale($img_src, 800);
}

imagecopy($img_src, $layer, 0, 0, 0, 0, imagesx($layer), imagesy($layer));

if ($image_parts[0] == 'data:image/jpeg')
    imagejpeg($img_src, $file);
else
    imagepng($img_src, $file);


imagedestroy($img_src);
imagedestroy($layer);

db_insert_picture($_SESSION['id'], $file);

echo $file;