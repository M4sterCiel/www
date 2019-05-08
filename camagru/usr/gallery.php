<?php
require "../model.php";
session_start();

$content = trim(file_get_contents("php://input"));
$var = json_decode($content, true);

if ($var == 'first')
{
    $res = db_get_all_pictures();
    foreach ($res as $value) {
        $result = db_check('users', 'username', 'id', $value['user_id']);
        $tab2 = Array($value['id'], $value['pic_link'], $value['nb_like'], $result[0][0], $value['date']);
        $tab[] = $tab2;
    }
    echo json_encode($tab);
}
