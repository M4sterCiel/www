<?php
    session_start();
    include ('../includes/tools.php');
    if (isset($_SESSION['isAdm']) AND $_SESSION['isAdm'] != 1) {
        header('HTTP/1.0 401 Unauthorized');
        echo "<html><body>You don't have rights to see this page!</body></html>\n";
        ?><a href="../index.php">Home</a><?php
    }
    else {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title src="../../img/logo42.ico">Mini42shop Admin Area</title>
            <link rel="stylesheet" href="../style.css">
            <link rel="shortcut icon" href="../img/logo42.ico">
        </head>
        <body>
        <div class="user_area_header">
            <img class="logo" src="../img/toplogo.png">
            <div class="usr_sections">
                <a href="adm/adm_articles.php"> Articles | </a>
                <a href="adm/adm_sections.php"> Sections | </a>
                <a href="adm/adm_users.php">Users | </a>
                <a href="adm/adm_orders.php">Orders</a>
            </div>
            <div class="home_sections">
                <a href="../index.php">Home</a>
            </div>
		</div>
	<div class="home_img"><span style="display:table;margin:0 auto;font-size:22px">Welcome to your administration area,
select a category from the navigation tab to start editing the database!</span>
	<img src="https://s3.amazonaws.com/ionic-marketplace/sqlite-crud-offline-mobile-app/banner.png"></div>
        </body>
        </html>
        <?php
    }
?>
<footer>
	<p>© 2019 MiniShop</p>
</footer>