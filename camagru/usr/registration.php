<?php
require "../model.php";
$username = $_GET['usr'];
$key = $_GET['key'];
if (($result = db_check('users', '*', 'username', $username)))
{
    if ($result[0]['active'] == 1)
    {
        echo "Your account is already active!";
        die();
    }
    if ($result[0]['key'] == $key)
    {
        db_update_usr('active', '1', $username);
        echo "Your account has been successfully activated!";
        $_SESSION['logd_on'] = 'ok';
        $_SESSION['user'] = $result[0]['username'];
        $_SESSION['email'] = $result[0]['email'];
        header('Refresh: 3; ../index.php');
    }
    else
        echo "An error has occurred, your account can't be activated!";
}

