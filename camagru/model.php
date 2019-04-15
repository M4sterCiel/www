<?php


function db_connect() {
    require "config/database.php";

    static $database;

    if ($database === null){
        try {
            $database = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
            return $database;
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }
    else
        return $database;
}

?>
