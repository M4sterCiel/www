<?php
session_start();
if ($_POST['data'] == 'username')
{
    db_update_usr('username', $_POST['nwname'], $_SESSION['user']);
    $_SESSION['user'] = $_POST['nwname'];
    echo "Your username has been updated!";
}
if ($_POST['data'] == 'email')
{

}
