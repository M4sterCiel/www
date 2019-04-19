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

function db_check($table, $field, $comp1, $comp2) {
    try {
        $sql = "SELECT $field FROM $table WHERE $comp1 LIKE '$comp2'";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $result = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_delete_usr($mail) {
    try {
        $sql = "DELETE FROM users WHERE email LIKE '$mail'";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_update_usr($field, $var, $user) {
    try {
        $sql = "UPDATE users SET `$field` = '$var' WHERE username LIKE '$user'";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

?>
