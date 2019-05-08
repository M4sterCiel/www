<?php
require "../model.php";
session_start();

if ($_POST['delete'] == 'ok')
{
    db_delete_usr_picture($_SESSION['id'], $_POST['src']);
    fclose($_POST['src']);
    unlink($_POST['src']);
    echo "Picture deleted from DB and repository";
}
else
    echo "An Ajax error just occurred";