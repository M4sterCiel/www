<?php
    session_start();
    include ('includes/tools.php');
    function    add_order($id, $idcateg, $categ) {
        ?>
        <form class="art_block" action="order.php" method="post">
            <input type="hidden" name="art" value="<?= htmlentities($id, ENT_QUOTES) ?>">
            <input type="hidden" name="idcateg" value="<?= htmlentities($idcateg, ENT_QUOTES) ?>">
            <input type="hidden" name="categ" value="<?= htmlentities($categ, ENT_QUOTES) ?>">
            <input type="submit" name="order" value="add to cart">
        </form>
        <?php
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title src="img/logo42.ico">Mini42shop RUSH</title>
    <link rel="stylesheet" href="style.css">
    <a name="logo"><link rel="shortcut icon" href="img/logo42.ico"></a>
</head>
<body>
<?php include('includes/menu.php'); ?>
<div class="articles">
    <?php
        $conn = db_connect();
        $categ = db_security($conn, $_POST['categ']);
        $idcateg = db_security($conn, $_POST['idcateg']);
        $query = "select * from articles where id in (select product_id from product_category where category_id=$idcateg)";
        if (!($qry = mysqli_query($conn, $query)))
            die ("Error!" . mysqli_connect_error());
        while ($query = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
            ?>
            <div class="art_block">
                <img src="<?= htmlentities($query['img_link'], ENT_QUOTES) ?>" alt="Image" title="Image">
                <p><?= htmlentities($categ, ENT_QUOTES) ?></p>
                <p><?= htmlentities($query['name'], ENT_QUOTES) ?></p>
                <p><?php echo "&euro;".htmlentities($query['price'], ENT_QUOTES); ?></p>
                <p><?php add_order($query['id'], $idcateg, $categ); ?></p>
            </div>
            <?php
        }
		?>
<div id="scrollUp">
<a id="back_page" href="shop.php"><img id="logo_top_img" src="img/back-logo.svg"/></a>
</div>
</div>
</div>
<div id="scrollUp">
<a id="back_top" href="#logo"><img id="logo_top_img" src="img/back_to_top.png"/></a>
</div>
</body>
</html>
