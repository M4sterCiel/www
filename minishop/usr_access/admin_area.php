<?php
    session_start();
    include ('../includes/tools.php');
    if (isset($_SESSION['isAdm']) AND $_SESSION['isAdm'] != 1) {
        header('HTTP/1.0 401 Unauthorized');
        echo "<html><body>You don't have rights to see this page!</body></html>\n";
        ?><a href="../index.php">Home</a><?php
    }
    else
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Admin Area</title>
            <link rel="stylesheet" href="../style.css">
        </head>
        <body>
        <div class="user_area_header">
            <img class="logo" src="../img/logo.png">
            <div class="usr_sections">
            </div>
            <div class="home_sections">
                <a href="../index.php">Home</a>
            </div>
        </div>
        </body>
        </html>
        <?php
    }
?>