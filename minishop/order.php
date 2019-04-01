<?php
    session_start();
    include ('includes/tools.php');

    if (isset($_POST['order']) AND $_POST['order'] === "add to cart" AND isset($_POST['art']) AND $_POST['art'] AND isset($_POST['idcateg']) AND $_POST['idcateg'] AND isset($_POST['categ']) AND $_POST['categ'])
    {
        if (!isset($_SESSION['cart']))
            $_SESSION['cart'] = array();
        $_SESSION['cart'][] = $_POST['art'];
        $conn = db_connect();
        $post_idcateg = db_security($conn, $_POST['idcateg']);
        $post_categ = db_security($conn, $_POST['categ']);
        ?>
        <!DOCTYPE html>
        <html><head><link rel="stylesheet" href="style.css"></head><body>
        <div class="alert-success">
            <p>Your order has been added to your cart.</p>
                <ul>
                    <li><form action="articles.php" method="post">
                            <input type="hidden" name="idcateg" value="<?php echo $post_idcateg; ?>">
                            <input type="submit" name="categ" value="<?php echo $post_categ; ?>"></form></li>
                    <li><a href="cart.php"><button>Cart</button></a></li>
                </ul>
        </div></body></html>
        <?php
    }
    else if (isset($_POST['order']) AND $_POST['order'] === "del order" AND isset($_SESSION['cart']) AND isset($_POST['art']) AND $_POST['art'])
    {
        $key = array_search($_POST['art'], $_SESSION['cart']);
        unset($_SESSION['cart'][$key]);
        header('Location: cart.php');
    }
    else if (isset($_POST['order']) AND $_POST['order'] === "confirm order" AND isset($_SESSION['cart']) 
        AND isset($_SESSION['logd_usr']) AND $_SESSION['cart'] AND $_SESSION['logd_usr'])
    {
        $conn = db_connect();
        $slogin = db_security($conn, $_SESSION['logd_usr']);
        $total_price = db_security($conn, $_POST['total']);
        $sql = "INSERT INTO orders (login, total_price) VALUES ('$slogin', $total_price)";
        if (mysqli_query($conn, $sql))
            $order_id = mysqli_insert_id($conn);
        foreach ($_SESSION['cart'] as $item_id) {
            $query = mysqli_query($conn, "SELECT * FROM articles WHERE id='$item_id'");
            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $name = $row['name'];
            $price = $row['price'];
            $array = array_count_values($_SESSION['cart']);
            $item_count = $array[$item_id];
            $sql = "INSERT INTO orders_items (order_id, login, product_id, name, price, quantity) VALUES ($order_id, '$slogin', $item_id, '$name', $price, $item_count)";
            $res = mysqli_query($conn, $sql);
            if ($item_count > 1)
                while ($item_count > 0) {
                    if (($key = array_search($item_id, $_SESSION['cart'])) !== false)
                        unset($_SESSION['cart'][$key]);
                    $item_count--;
                }
        }
        unset($_SESSION['cart']);
        header('Location: index.php');
    }
    else if (!(isset( $_SESSION['logd_usr']) AND isset($_POST['order']) AND $_POST['order'] == "confirm order")) {
        ?>
        <!DOCTYPE html>
        <html>
        <head><link rel="stylesheet" href="style.css"></head>
        <body class="main">
        <div class="container_order">
            <div class="alert-fail">
            <p>Error!</p>    
            <p>Please, login</p>
                <a href="usr_access/login.php"><button>Login</button></a>
                <a href="usr_access/register.php"><button>Register</button></a>
            </div>
		</div>
		<div id="scrollUp">
		<a id="back_top" href="#logo"><img id="logo_top_img" src="img/back_to_top.png"/></a>
		</div>

        </body>
        </html><?php
    }
?>
<footer>
	<p>© 2019 MiniShop</p>
</footer>
