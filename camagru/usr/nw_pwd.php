<?php
session_start();
require "../model.php";
if ($_SESSION['logd_on'] == 'ok')
{
    if ($_POST['nwpwd'] != $_POST['nwpwd2'])
    {
        echo "Incorrect password... It has to be identical.";
        die();
    }
    if ($result = db_check('users', '*', 'username', $_SESSION['user']))
    {
        if ($result[0]['password'] == hash('whirlpool', $_POST['nwpwd']))
        {
            echo "Error! Enter a different password from the old one.";
            die();
        }
        else {
            db_update_usr('password', hash('whirlpool', $_POST['nwpwd']), $_SESSION['user']);
            db_update_usr('key', NULL, $_SESSION['user']);
            echo "Your password has been updated successfully!";
        }
    }
}
else
{
    echo "An error has occured!";
    die();
}