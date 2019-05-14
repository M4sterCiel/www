<?php
session_start();
require "../model.php";
if ($_POST['passwd'] != $_POST['passwd2'])
{
    echo "✗	Incorrect password!";
    die();
}
$passwd = $_POST['passwd'];
$passwd = hash('whirlpool', $passwd);
if ($result = db_check('users', '*', 'email', $_SESSION['email']))
{
    if ($result[0]['password'] == $passwd)
    {
        $res = db_get_usr_picture($_SESSION['id']);
        foreach ($res as $value)
        {
            unlink($value['pic_link']);
            db_delete_usr_picture($_SESSION['id'], $value['pic_link']);
        }
        db_delete_usr($_SESSION['email']);
        echo "✓ Your account have been deleted successfully!";
        header('Refresh: 3; logout.php');
    }
    else
        echo "✗	Incorrect password!";
}
else
    echo "✗	An error has occured!";
