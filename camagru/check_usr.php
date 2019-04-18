<?php
session_start();
require "model.php";
$mail =  $_POST['email'];
$passwd = $_POST['passwd'];
$passwd = hash('whirlpool', $passwd);
if ($result = db_check('users', '*', 'email', $_POST['email']))
{
    if ($result[0]['password'] == $passwd)
    {
        echo "Access granted!";
        $_SESSION['logd_on'] = 'ok';
        $_SESSION['user'] = $result[0]['firstname'] . " " . $result[0]['lastname'];
        $_SESSION['email'] = $result[0]['email'];
    }
    else
        echo "Incorrect email or password!";
}
