<?php
require "../model.php";
session_start();

if (empty($_SESSION['user']))
    echo "unlog";
else{
    $content = trim(file_get_contents("php://input"));
    $var = json_decode($content, true);
    $res = db_check_likes($_SESSION['id'], $content);
    if (($res == false))
        db_add_likes($_SESSION['id'], $content);
    else
        db_del_likes($_SESSION['id'], $content);
    $nblike = db_get_pic_likes($content);
    echo $nblike[0]['nb_like'];
}
