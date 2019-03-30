<?php
    /* etablie la connection a sql */
    function    sql_attach() {
        $conn = mysqli_connect("localhost:3306", "root", "samsung");
        if (!$conn)
            die ("Connection failed: " . mysqli_connect_error());
        echo "Connected successfully\n";
        ?><br><br><?php
        return ($conn);
    }

    /* creation de la db */
    function    db_make($conn) {
        $dbname = "rush00";
        $query = "DROP database if exists $dbname;";
        if (mysqli_query($conn, $query))
            echo "DB deleted";
        else
            echo "Error during delet-process";
        $sql = "CREATE DATABASE $dbname";
        $check = mysqli_query($conn, $sql) ? "Database created successfully\n" : "Error creating database: " . mysqli_error($conn);
        echo $check;
        ?><br><br><?php
        return ($conn);
    }

    /* connection a la db*/
    function    db_connect() {
        static $conn;

        if (!isset($conn))
            if (!($conn = mysqli_connect("localhost:3306", "root", "samsung", "rush00")))
                die ("Connection failed: " . mysqli_error($conn));
        return ($conn);
    }

    /* parse la request pour mysql */
    function    db_security($conn, $string) {
        if(ctype_digit($string))
            $string = intval($string);
        else {
            /*mysql_real_escape_string — Protège une commande SQL de la présence de caractères spéciaux*/
            $string = mysqli_real_escape_string($conn, $string);
            $string = addcslashes($string, '%_');
        }
        return ($string);
    }
?>
