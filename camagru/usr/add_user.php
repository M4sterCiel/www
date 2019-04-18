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
echo "Successfully registered!";
$_SESSION['user'] = $_POST['username'];
$_SESSION['logd_on'] = 'ok';
$_SESSION['email'] = $_POST['email'];
}
catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
