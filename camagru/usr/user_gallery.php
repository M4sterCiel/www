<?php
require "../model.php";
session_start();

$i = 0;
$res = db_get_usr_picture($_SESSION['id']);

foreach ($res as $value) {
    $tab2 = Array($value['id'], $value['pic_link']);
    $tab[] = $tab2;
}
echo json_encode($tab);