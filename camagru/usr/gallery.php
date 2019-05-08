<?php
require "../model.php";
session_start();

$content = trim(file_get_contents("php://input"));
$var = json_decode($content, true);

if ($var == 'first')
{
    $res = db_get_all_pictures();
    foreach ($res as $value) {
        $tab2 = Array($value['id'], $value['pic_link'], $value['nb_like'], $value['user_id']);
        $tab[] = $tab2;
    }
    echo json_encode($tab);
}
else
{
    $res = db_check('users', 'username', 'id', $var);
    
    echo json_encode($res[0]);
}
