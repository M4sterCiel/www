<?php

$DB_HOST     = "localhost";
$DB_USER     = "root";
$DB_PASSWORD = "logitech";
$DB_NAME     = "camagru"; 
$DB_DSN      = "mysql:host=$DB_HOST;dbname=$DB_NAME";
$DB_OPTIONS  = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );