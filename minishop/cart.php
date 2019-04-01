<?php
    session_start();
    include ('includes/tools.php');

    function    del_order($id) {
        ?>
        <form class="art_block" action="order.php" method="post">
            <input type="hidden" name="art" value="<?php echo $id ?>">
            <input type="submit" name="order" value="del order">
        </form>
        <?php
    }

    function    confirm_order($total) {
        ?>
        <div>
            <form class="art_block_confirm" action="order.php" method="post">
                <input type="hidden" name="total" value="<?php echo htmlentities($total, ENT_QUOTES) ?>">
                <input type="submit" name="order" value="confirm order">
            </form>
        </div>
<?php
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title src="img/logo42.ico">Mini42shop Cart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/logo42.ico">
</head>
<body>

<?php include ('includes/menu.php'); ?>

<div class="cart">
    <?php
     $total = 0;
     $conn = db_connect();
     if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
         $new_array = array_count_values($_SESSION['cart']);
         foreach ($new_array as $item => $val) {
             $query = mysqli_query($conn, "SELECT * FROM articles where id='$item'");
             $art = mysqli_fetch_array($query, MYSQLI_ASSOC); ?>

             <div class="cart_block">
                 <img src="<?php echo $art['img_link']; ?>">
                 <p><?php echo "quantity " . $val; ?></p>
                 <p><?php echo $art['name']; ?></p>
                 <p><?php echo "Price: \xE2\x82\xAc " . $art['price'] * $val; ?></p><?php
                     del_order($art['id']);
                     $total += ($art['price'] * $val); ?>
             </div>
             <hr>
             <?php
         }
     }
     if (isset($_SESSION['cart']) AND !empty($_SESSION['cart'])) {
         ?>
            <div class="div_confirm_order">
                <p>
                    <?php echo "Total Amount: \xE2\x82\xAc " . $total; ?>
                </p>
            </div>
            <div class="div_confirm_order">
                <?php confirm_order($total); ?>
            </div>
</div>
<?php
     }
     else if (!isset($_SESSION['cart']) OR empty($_SESSION['cart'])) {
         ?>
         <div class="empty">
             <p>Your cart is empty!</p>
         </div>
         <?php
     }
    ?>
</div>
</div>
<div id="scrollUp">
<a id="back_page" href="index.php"><img id="logo_top_img" src="img/back-logo.svg"/></a>
</div>
<div id="scrollUp">
<a id="back_top" href="#logo"><img id="logo_top_img" src="img/back_to_top.png"/></a>
</div>
</body>
</html>
<footer>
	<p>© 2019 MiniShop</p>
</footer>
