<?php
    session_start();
    include ('includes/tools.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php include ('includes/menu.php'); ?>
<div class="shop">
    <?php
        $conn = db_connect();
        if (!($qry = mysqli_query($conn, "SELECT * FROM categories")))
            die ("Error" . mysqli_connect_error());
        while ($query = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
    ?>
            <div class="art_block">
                <img src="<?= htmlentities($query['img_link'], ENT_QUOTES) ?>" alt="Image" title="Image">
                <form action="articles.php" method="post">
                    <input type="hidden" name="idcateg" value="<?= htmlentities($query['id'], ENT_QUOTES) ?>">
                    <input type="submit" name="categ" value="<?= htmlentities($query['name'], ENT_QUOTES) ?>">
                </form>
            </div>
<?php
        }
?>
</div>
</body>
</html>
