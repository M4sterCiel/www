<?php
session_start();
require "model.php";
$granted = 0;
$mail =  $_POST['email'];
$passwd = $_POST['passwd'];
$passwd = hash('whirlpool', $passwd);
$res = db_connect();
if (!$stmt = $res->query("SELECT * FROM users WHERE email LIKE '$mail'"))
    echo "An error has occured";
while($row = $stmt->fetch()) {
    if ($passwd == $row["password"])
    {
        $granted = 1;
        echo "Access granted!<br/>";
        $_SESSION['logd_on'] = 'ok';
        $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
    }
}
if ($granted == 0)
    echo "Incorrect email or password!";