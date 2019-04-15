<?php
require "model.php";
echo $_POST['email']."<br/>";
echo $_POST['passwd']."\n";
$mail =  $_POST['email'];
$passwd = $_POST['passwd'];
$passwd = hash('whirlpool', $passwd);
try {
    $res = db_connect();
    $stmt = $res->query("SELECT * FROM users WHERE email LIKE '$mail'");
}
catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
while($row = $stmt->fetch()) {
    if ($passwd == $row["password"])
    {
        echo "Bravo, c'est le bon mdp!<br/>";
    }
}