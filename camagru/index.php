<?php require "header.php";?>


<?php
include "model.php";

$requete = db_connect()->query('SELECT * FROM users');
foreach($requete as $row) {
        echo $row['firstname']." ".$row['lastname']." ".$row['email']."<br />";
}
?>