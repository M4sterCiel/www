<?php

$host       = "localhost";
$username   = "root";
$password   = "logitech";
$dbname     = "camagru"; 
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

try {
$connection = new PDO("mysql:host=$host", $username, $password, $options);
$sql = file_get_contents("data/init.sql");
$connection->exec($sql);

echo "Database and table users created successfully.";
} catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}