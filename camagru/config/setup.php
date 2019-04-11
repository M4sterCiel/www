<?php

require("database.php");

try {
    $connection = new PDO("mysql:host=$DB_HOST", $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);
    
    echo "Database and table users created successfully.";
    } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
    }