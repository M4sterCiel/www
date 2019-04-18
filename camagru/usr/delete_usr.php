<?php
session_start();
require "../model.php";
if ($_POST['passwd'] != $_POST['passwd2'])
{
    echo "Incorrect password!";
    die();
}
$passwd = $_POST['passwd'];
$passwd = hash('whirlpool', $passwd);
if ($result = db_check('users', '*', 'email', $_SESSION['email']))
{
    if ($result[0]['password'] == $passwd)
    {
        db_delete_usr($_SESSION['email']);
        echo "Your account have been deleted successfully!";
        header('Refresh: 3; logout.php');
    }
    else
        echo "Incorrect password!";
}
