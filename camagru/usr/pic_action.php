<?php
require "../model.php";
session_start();
if ($_POST['delete'] == 'ok')
{
    echo $_POST['src'];
    $path = "../" . $_POST['src'];
    fclose($path);
    if (unlink(realpath($path)) == true)
        echo "File deleted";
    else
        echo "Couldn't delete file";
}

if ($_POST['save'] == 'ok')
{
    $path = "../" . $_POST['src'];
    db_insert_picture($_SESSION['id'], $path);
    echo "Picture saved in DB";
}