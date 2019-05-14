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
        return 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_insert_picture($user_id, $path) {
    try {
        $sql = "INSERT INTO `gallery` VALUES (NULL, '$user_id', '$path', 0, CURRENT_TIMESTAMP)";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_get_usr_picture($user_id) {
    try {
        $sql = "SELECT * FROM `gallery` WHERE `user_id` LIKE '$user_id' ORDER BY `id` DESC LIMIT 6";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_get_reload_usr_picture($user_id, $last) {
    try {
        $sql = "SELECT * FROM `gallery` WHERE `user_id` LIKE '$user_id' AND `id` < '$last' ORDER BY `id` DESC LIMIT 6";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_get_picture($picture) {
    try {
        $sql = "SELECT * FROM `gallery` WHERE `id` LIKE '$picture'";
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

function db_del_all_usr_picture($id, $src) {
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
        $sql = "SELECT * FROM `gallery` ORDER BY `id` DESC LIMIT 5";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_get_reload_pictures($last) {
    try {
        $sql = "SELECT * FROM `gallery` WHERE `id` < '$last' ORDER BY `id` DESC LIMIT 5";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_get_comments($pic) {
    try {
        $sql = "SELECT * FROM `comments` WHERE `picture_id` = '$pic' ORDER BY `date`";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_check_likes($user, $picture){
    try {
        $sql = "SELECT * FROM `likes` WHERE `user_id` LIKE '$user' AND `picture_id` LIKE '$picture'";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $result = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_add_likes($user, $picture){
    try {
        $sql = "INSERT INTO `likes` VALUES (NULL, '$user', '$picture')";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        $sql2 = "UPDATE `gallery` set nb_like = nb_like+1 WHERE `id` LIKE '$picture'";
        $stmt2 = db_connect()->prepare($sql2);
        $stmt2->execute();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_get_pic_likes($picture){
    try {
        $sql = "SELECT * FROM `gallery` WHERE `id` LIKE '$picture'";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_del_likes($user, $picture){
    try {
        $sql = "DELETE FROM `likes` WHERE `user_id` LIKE '$user' AND `picture_id` LIKE '$picture'";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
        $sql2 = "UPDATE `gallery` set nb_like = nb_like-1 WHERE `id` LIKE '$picture'";
        $stmt2 = db_connect()->prepare($sql2);
        $stmt2->execute();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_add_comment($user, $username, $picture, $text){
    try {
        $sql = "INSERT INTO `comments` VALUES (NULL, :user, :username, :picture, :text, CURRENT_TIMESTAMP)";
        $stmt = db_connect()->prepare($sql);
        $stmt->bindParam(':user', $user, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':picture', $picture, PDO::PARAM_INT);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

function db_update_comments($field, $var, $user_id){
    try {
        $sql = "UPDATE comments SET `$field` = '$var' WHERE `user_id` LIKE '$user_id'";
        $stmt = db_connect()->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        return 'Connexion échouée : ' . $e->getMessage();
    }
}
?>
