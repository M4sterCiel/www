<?php

require("database.php");

try {
    $con = new PDO("mysql:host=$DB_HOST", $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
    $sql = file_get_contents("data/init.sql");
    $con->exec($sql);
    
    echo "Database and table users created successfully.";
    header('Refresh: 3; ../index.php');
    } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
    }
    ?>
