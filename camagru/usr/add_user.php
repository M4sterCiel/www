<?php
session_start();
require "../model.php";
if ($_POST['passwd'] != $_POST['passwd2'])
{
    echo "Wrong password!";
    die();
}
if (($result = db_check('users', '*', 'email', $_POST['email']) && empty($result)) || ($result = db_check('users', '*', 'username', $_POST['username']) && empty($result)))
{
    echo "You already have an account";
    die();
}
try {
$new_user = array(
    "id" => NULL,
    "username" => $_POST['username'],
    "email" => $_POST['email'],
    "password" => hash('whirlpool', $_POST['passwd']),
    "private_question" => $_POST['question'],
    "private_answer" => $_POST['answer'],
    "notif" => $_POST['notif'],
);
$sql = sprintf(
    "INSERT INTO %s (%s) values (%s)",
    "users",
    implode(", ", array_keys($new_user)),
    ":" . implode(", :", array_keys($new_user))
);
$statement = db_connect()->prepare($sql);
$statement->execute($new_user);
$key = md5(microtime(TRUE)*100000);
db_update_usr('key', $key, $_POST['username']);
echo "<div id=\"register-ok\">An email has been sent with the activation link!<div><br>";
$_SESSION['user'] = $_POST['username'];
$_SESSION['logd_on'] = 'ok';
$_SESSION['email'] = $_POST['email'];
}
catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
$subject = "Activate your account";
$header = "From: registration@camagru.com";
$message = "Welcome to Camagru,

To activate your account, please follow the link below or copy/paste it in your browser.

http://localhost:8080/camagru/usr/registration.php?usr=" . urlencode($_POST['username']) . "&key=" . urlencode($key) . "

--------------------------------
This is an automatic mail system, please do not answer this mail.";
if (mail($_POST['email'], $subject, $message, $header) == false)
    echo "Mail not delivered";