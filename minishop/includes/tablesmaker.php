<?php

    function tabmake_articles($conn)
    {
    $urb = "CREATE TABLE articles(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL UNIQUE,
    price DOUBLE UNSIGNED NOT NULL,
    img_link VARCHAR(2000) NOT NULL )";

        //Executer la requete
    $check = mysqli_query($conn, $urb) ? "Table articles created successfully\n" : "Error creating table: " . mysqli_error($conn)."\n";
    echo $check;
    ?><br><br><?php
        //Preparer la requete pour exec
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,"INSERT INTO articles (id, name, price, img_link) VALUES (?, ?, ?, ?)");
        //Type integer + Type Sting
    mysqli_stmt_bind_param($stmt, 'isis', $id, $name, $price, $img_link);

        //Categorie 1
		$id = 1;
		$name = "Doudoune à capuche luisante mi-longue";
		$price = 149;
		$img_link = "https://cdn.laredoute.com/products/641by641/a/f/d/afd1c2d80cb8c4b96fbf475ae350ebbf.jpg";
		mysqli_stmt_execute($stmt);
		$id = 2;
		$name = "Parka mi-longue peau de pêche";
		$price = 119;
		$img_link = "https://cdn.laredoute.com/products/641by641/d/c/2/dc2ef59155e8175fee635cd3dd58d81b.jpg";
		mysqli_stmt_execute($stmt);
		$id = 3;
		$name = "Parka courte à fermeture boutonnée";
		$price = 99.99;
		$img_link = "https://cdn.laredoute.com/products/641by641/3/e/9/3e94f0111629ce883a138104f4707ba3.jpg";
		mysqli_stmt_execute($stmt);
		$id = 4;
		$name = "Imperméable à capuche à carreaux mi-long";
		$price = 84.99;
		$img_link = "https://cdn.laredoute.com/products/641by641/6/b/5/6b5839e762b0483c769706623114655a.jpg";
		mysqli_stmt_execute($stmt);
	
		$id = 5;
		$name = "Veste en jean ex-boyfriend trucker, coupe droite";
		$price = 52.50;
		$img_link = "https://cdn.laredoute.com/products/641by641/9/c/b/9cb56594791b9f013ef7b3c55921e38b.jpg";
		mysqli_stmt_execute($stmt);
		$id = 6;
		$name = "Trench fluide en tissu gaufré";
		$price = 99;
		$img_link = "https://cdn.laredoute.com/products/641by641/d/5/2/d5218fa77a25d7d4929445da8bb4af23.jpg";
		mysqli_stmt_execute($stmt);
		$id = 7;
		$name = "Pull manches courtes, grosse maille coton";
		$price = 19.99;
		$img_link = "https://cdn.laredoute.com/products/641by641/e/5/5/e550d3e11c9d6061a78de86747fa85da.jpg";
		mysqli_stmt_execute($stmt);
		$id = 8;
		$name = "Pull, col rond, manches courtes, jacquard bicolore";
		$price = 42;
		$img_link = "https://cdn.laredoute.com/products/641by641/7/7/a/77aaa1795be1424ad6a7750be623b970.jpg";
		mysqli_stmt_execute($stmt);
	
		$id = 9;
		$name = "Pull col bateau en fine maille ajourée";
		$price = 59;
		$img_link = "https://cdn.laredoute.com/products/641by641/e/e/7/ee78581e7ecdba8ac598be59845c0e4f.jpg";
		mysqli_stmt_execute($stmt);
		$id = 10;
		$name = "Robe droite, mi-longue";
		$price = 65;
		$img_link = "https://cdn.laredoute.com/products/641by641/b/b/7/bb70a00d303e8ae2a53994841adec47f.jpg";
		mysqli_stmt_execute($stmt);
		$id = 11;
		$name = "Robe droite, mi-longue à pois";
		$price = 32;
		$img_link = "https://cdn.laredoute.com/products/641by641/3/5/6/356f06c59f0cc70df0c3194767e6b6d1.jpg";
		mysqli_stmt_execute($stmt);
		$id = 12;
		$name = "Robe en jean ligth";
		$price = 39.99;
		$img_link = "https://cdn.laredoute.com/products/641by641/5/f/1/5f1196623c84a96f417240243337dce6.jpg";
		mysqli_stmt_execute($stmt);
	
		$id = 13;
		$name = "Chemise imprimée, manches longues";
		$price = 89;
		$img_link = "https://cdn.laredoute.com/products/641by641/d/6/2/d6294c3b96073af8b077799783106143.jpg";
		mysqli_stmt_execute($stmt);
		$id = 14;
		$name = "Chemise en lin, col mao";
		$price = 69;
		$img_link = "https://cdn.laredoute.com/products/641by641/0/b/c/0bc426f24a1b64e44a5b8bfb539bbf54.jpg";
		mysqli_stmt_execute($stmt);
		$id = 15;
		$name = "Chemise imprimé graphique, manches longues";
		$price = 79;
		$img_link = "https://cdn.laredoute.com/products/641by641/a/0/f/a0fcf5602d8da9326022f431a0a3949b.jpg";
		mysqli_stmt_execute($stmt);
		$id = 16;
		$name = "Pantacourt droit";
		$price = 115.5;
		$img_link = "https://cdn.laredoute.com/products/641by641/7/b/6/7b6fd6654c7f804fd79bcebe27e8c676.jpg";
		mysqli_stmt_execute($stmt);
		$id = 17;
		$name = "Pantalon cigarette en Polyester et laine mélangée";
		$price = 41.99;
		$img_link = "https://cdn.laredoute.com/products/641by641/5/4/7/5470e42349d6ee8f8eda62f3c85c2b19.jpg";
		mysqli_stmt_execute($stmt);
		$id = 18;
		$name = "Pantalon droit costume";
		$price = 35.99;
		$img_link = "https://cdn.laredoute.com/products/641by641/d/e/e/deef6ee3662c5a7bf9dc458d5709a9b7.jpg";
		mysqli_stmt_execute($stmt);
	
		echo "Article records created successfully\n";
		mysqli_stmt_close($stmt);
		?><br><br><?php
		}


    function tabmake_categories($conn)
    {
        $usr = "CREATE TABLE categories(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(45) NOT NULL UNIQUE,
img_link VARCHAR(2000) NOT NULL
)";

        $check = mysqli_query($conn, $usr) ? "Table categories created successfully\n" : "Error creating table: " . mysqli_error($conn)."\n";
        echo $check;

        ?><br><br><?php

        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,"INSERT INTO categories (id, name, img_link) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'iss', $id, $name, $img_link);

        $id = 1;
        $name = "Manteaux";
        $img_link = "https://cdn.pixabay.com/photo/2016/03/31/19/28/clothes-1295049_960_720.png";
        mysqli_stmt_execute($stmt);
        $id = 2;
        $name = "Pulls";
        $img_link = "https://cdn.pixabay.com/photo/2016/03/31/19/21/clothes-1294931_960_720.png";
        mysqli_stmt_execute($stmt);
        $id = 3;
        $name = "Robes";
        $img_link = "https://cdn.pixabay.com/photo/2012/04/02/13/23/model-24481_960_720.png";
        mysqli_stmt_execute($stmt);
        $id = 4;
        $name = "Chemises";
        $img_link = "https://cdn.pixabay.com/photo/2016/03/31/19/24/clothes-1294978_960_720.png";
        mysqli_stmt_execute($stmt);
		$id = 5;
        $name = "Pantalons";
        $img_link = "https://cdn.pixabay.com/photo/2014/04/03/10/55/trousers-311729_960_720.png";
        mysqli_stmt_execute($stmt);
		$id = 6;
        $name = "Nos classiques";
        $img_link = "https://cdn.pixabay.com/photo/2018/04/13/11/13/silhouette-3316257_960_720.png";
        mysqli_stmt_execute($stmt);
        echo "Clothes records created successfully\n";
        mysqli_stmt_close($stmt);


        ?><br><br><?php
    }

    //Creation d'admin : admin/admin
    function tabmake_usr($conn)
    {
        $usr = "CREATE TABLE users(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
login VARCHAR(30) NOT NULL UNIQUE, 
password VARCHAR(255) NOT NULL,
isAdm TINYINT DEFAULT 0)";


        $check = mysqli_query($conn, $usr) ? "Table users created successfully\n" : "Error creating table: " . mysqli_error($conn)."\n";
        echo $check;
        ?><br><br><?php

        $pass = hash ('whirlpool', mysqli_real_escape_string($conn, 'admin'));
        $query = "INSERT INTO users (login, password, isAdm) VALUES ('admin', '$pass', 1)";
        $res = mysqli_query($conn, $query);
        if (!$res)
            die("Admin user not created: " . mysqli_connect_error());
        echo "Admin users created\n";
        ?><br><br><?php
    }

    function tabmake_product_category($conn)
    {
        $pc = "CREATE TABLE IF NOT EXISTS product_category (
product_id int(11) NOT NULL, 
category_id int(11) NOT NULL, 
PRIMARY KEY  (product_id, category_id))";

        $check = mysqli_query($conn, $pc) ? "Table product_category created successfully\n" : "Error creating table: " . mysqli_error($conn)."\n";
        echo $check;
        ?><br><br><?php
        $query = "INSERT INTO product_category (product_id, category_id) VALUES (1, 1), (2, 1), (3, 1), (4, 1), (5, 1), (6, 1), (7, 2), (8, 2), (9, 2), (10, 3), (11, 3), (12, 3), (13, 4), (14, 4), (15, 4), (16, 5), (17, 5), (18, 5), (17, 6), (2, 6), (8, 6), (13, 6)";
        $res = mysqli_query($conn, $query);
        if (!$res)
            die("Error: " . mysqli_connect_error());
        ?><br><br><?php

    }


    function tabmake_orders($conn)
    {

        $ord = "CREATE TABLE orders(
id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
login VARCHAR(45) NOT NULL,
total_price DOUBLE UNSIGNED NOT NULL)";

        $check = mysqli_query($conn, $ord) ? "Table orders created successfully" : "Error creating table: " . mysqli_error($conn);
        ?><br><br><?php
        echo $check;
    }

    function tabmake_orders_items($conn)
    {
        $ord_itm = "CREATE TABLE orders_items(
id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
order_id int NOT NULL,
login VARCHAR(45) NOT NULL,
product_id int NOT NULL,
name VARCHAR(45) NOT NULL,
price DOUBLE UNSIGNED NOT NULL,
quantity INT UNSIGNED NOT NULL DEFAULT 1)";

        $check = mysqli_query($conn, $ord_itm) ? "Table orders items created successfully" : "Error creating table: " . mysqli_error($conn);
        ?><br><br><?php
        echo $check;
    }
?>
