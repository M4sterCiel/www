<?php
require "../model.php";
session_start();
if ($_POST['delete'] == 'ok')
{
    $path = $_POST['src'];
    db_delete_usr_picture($_SESSION['id'], $path);
    fclose($path);
    if (unlink(realpath($path)) == true)
        echo "File deleted";
    else
        echo "Couldn't delete file";
}

if ($_POST['save'] == 'ok')
{
    echo "Picture saved in DB";
}