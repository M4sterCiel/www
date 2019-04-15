<?php
require "model.php";
$mail =  $_POST['email'];
$passwd = $_POST['passwd'];
$passwd = hash('whirlpool', $passwd);
$res = db_connect();
if (!$stmt = $res->query("SELECT * FROM users WHERE email LIKE '$mail'"))
    echo "An error has occured";
while($row = $stmt->fetch()) {
    if ($row["email"] != $mail)
        echo "Incorrect email or password!";
    if ($passwd == $row["password"])
    {
        $granted = 1;
        echo "Access granted!<br/>";
    }
}