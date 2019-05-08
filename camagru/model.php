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

function db_insert_picture($user_id, $path) {
    try {
        $sql = "INSERT INTO `gallery` VALUES (NULL, '$user_id', '$path', NULL, CURRENT_TIMESTAMP)";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_get_usr_picture($user_id) {
    try {
        $sql = "SELECT * FROM `gallery` WHERE `user_id` LIKE '$user_id'";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_delete_usr_picture($id, $src) {
    try {
        $sql = "DELETE FROM `gallery` WHERE `pic_link` = '$src' AND `user_id` = '$id'";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_get_all_pictures() {
    try {
        $sql = "SELECT * FROM `gallery` ORDER BY `date` DESC LIMIT 5";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_get_reload_pictures($last) {
    try {
        $sql = "SELECT * FROM `gallery` WHERE `id` < '$last' ORDER BY `date` DESC LIMIT 5";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

?>
