<?php
session_start();
require "../model.php";
$user =  $_POST['user'];
$passwd = $_POST['passwd'];
$passwd = hash('whirlpool', $passwd);
if (($result = db_check('users', '*', 'username', $_POST['user'])))
{
    if ($result[0]['password'] == $passwd && $result[0]['active'] == 1)
    {
        echo "✓ Access granted!";
        $_SESSION['logd_on'] = 'ok';
        $_SESSION['user'] = $result[0]['username'];
        $_SESSION['email'] = $result[0]['email'];
    }
    else if ($result[0]['password'] == $passwd && $result[0]['active'] == 0)
    {
        echo "Your account is not active yet, please review your mails and follow the link to activate it.";
    }
    else
        echo "✗ Incorrect username or password!";
}
else
    echo "✗ Incorrect username or password!";
