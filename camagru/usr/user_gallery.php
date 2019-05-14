<?php
require "../model.php";
session_start();

$content = trim(file_get_contents("php://input"));
$var = json_decode($content, true);

if ($var == 'first')
{
    $res = db_get_usr_picture($_SESSION['id']);

    foreach ($res as $value) {
        $comment = db_get_comments($value['id']);
        $tab2 = Array($value['id'], $value['pic_link']);

        if (!empty($comment))
            $tab2[] = $comment;
        $tab[] = $tab2;
    }
    echo json_encode($tab);
}

else
{
    $res = db_get_reload_usr_picture($_SESSION['id'], $var);

    foreach ($res as $value) {
        $comment = db_get_comments($value['id']);
        $tab2 = Array($value['id'], $value['pic_link']);

        if (!empty($comment))
            $tab2[] = $comment;
        $tab[] = $tab2;
    }
    echo json_encode($tab);
}