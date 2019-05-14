<?php
require "../model.php";
session_start();
$content = trim(file_get_contents("php://input"));
$var = json_decode($content, true);

$res = db_check("users", "*", "id", $_SESSION['id']);

if ($var == 'first')
{
    echo json_encode($res[0]);
}

if ($var == 'notif')
{
    $data = 1;
    if ($res[0]['notif'] == 1)
        $data = 0;
    db_update_usr("notif", $data, $res[0][1]);
}

if ($var == 'password')
{
    $key = md5(microtime(TRUE)*100000);
    db_update_usr('key', $key, $res[0]['username']);
    $key = "usr=".$_SESSION['user']."&key=".$key;
    echo ($key);
}

if ($var['username'] == "usr")
{
    if ($var['value'] == '' || strlen($var['value']) < 4)
    {
        echo "✘ Please, enter a correct username";
        die();
    }
    if ($result = db_check('users', '*', 'username', $var['value']))
    {
        echo "✘ This username already exists";
        die();
    }
    if (preg_match('/\s/', $var['value']))
    {
        echo "✘ Username must not contain whitespaces";
        die();
    }
    db_update_usr('username', $var['value'], $res[0]['username']);
    db_update_comments('username', $var['value'], $_SESSION['id']);
    $_SESSION['user'] = $var['value'];
}

if ($var['email'] == "mail")
{
    if ($result = db_check('users', '*', 'email', $var['value']))
    {
        echo "✘ This email already exists";
        die();
    }
    if ($var['value'] == '' || strstr($var['value'], '@') == false)
    {
        echo "✘ Please, enter a correct e-mail address";
        die();
    }
    db_update_usr('email', $var['value'], $res[0]['username']);
}