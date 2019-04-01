<?php
    include ('includes/tools.php');
    include ('includes/tablesmaker.php');
    if (isset($_POST['submit']) && $_POST['submit'] === "START")
    {
        header('location: index.php');
    }

    $conn = sql_attach();
    db_make($conn);
    $conn = db_connect();
    tabmake_articles($conn);
    tabmake_categories($conn);
    tabmake_product_category($conn);
    tabmake_usr($conn);
    tabmake_orders($conn);
    tabmake_orders_items($conn);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <header>
      <title src="img/logo42.ico">Mini42shop Index</title>
      <link rel="stylesheet" href="style.css">
      <link rel="shortcut icon" href="img/logo42.ico">
    </header>
    <body class="inst">
        <form class="redirection" method="POST" action="install.php">
            <input type="submit" name="submit" value="START"/>
        </form>
    </body>
</html>


