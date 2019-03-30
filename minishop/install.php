<?php

    include ('includes/tools.php');
    include ('includes/tablesmaker.php');

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
