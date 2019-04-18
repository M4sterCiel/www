<?php
session_start();
require "model.php";
$new_user = array(
    "id" => NULL,
    "firstname" => $_POST['fname'],
    "lastname" => $_POST['lname'],
    "email" => hash('whirlpool', $_POST['email']),
    "password" => $_POST['passwd'],
    "private_question" => $_POST['question'],
    "private_answer" => $_POST['answer'],
    "notif" => $_POST['notif'],
    "date" => CURRENT_TIMESTAMP
);
$sql = sprintf(
    "INSERT INTO %s (%s) values (%s)",
    "users",
    implode(", ", array_keys($new_user)),
    ":" . implode(", :", array_keys($new_user))
);
echo $sql;
$statement = db_connect()->prepare($sql);
$statement->execute($new_user);
echo "fini!";
/* "INSERT INTO users (id, firstname, lastname, email, password, private_question, private_answer, notif, date) VALUES (NULL, '$fname', '$lname', '$mail', '$passwd', '$question', '$answer', '$notif', CURRENT_TIMESTAMP)";

if (!$stmt = $res->query("SELECT * FROM users WHERE email LIKE '$mail'"))
    echo "An error has occured";
while($row = $stmt->fetch()) {
    if ($mail == $row["email"])
    {
        echo "You already have an account!<br/>";
        die();
    }
echo $sql;
if ($res->exec($sql) === false)
    echo "An error has occured";
else
    echo "User created in database";
}
 */