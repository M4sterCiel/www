<?php
require "../model.php";
session_start();

if (empty($_SESSION['user']))
    echo "unlog";
else {
    $content = trim(file_get_contents("php://input"));
    $var = json_decode($content, true);
    db_add_comment($_SESSION['id'], $_SESSION['user'], $var['picture'], $var['text']);
    echo ($_SESSION['user'].": ".$var['text']);

    $res = db_get_picture($var['picture']);
    if ($_SESSION['id'] != $res[0]['user_id']) {
        $result = db_check('users', '*', 'id', $res[0]['user_id']);
        if ($result[0]['notif'] == 1)
        {
            $mail = $result[0]['email'];
            $subject = "Picture's notification";
            $header = "From: no-reply@camagru.com";
            $message = "Dear ".$result[0]['username'].",

One of your pictures just received a comment from ".$_SESSION['user'].". If you want to review it, connect to : http://localhost:8080/camagru/index.php 

--------------------------------
This is an automatic mail system, please do not answer this mail.";

            mail($mail, $subject, $message, $header);
        }
    }
}

