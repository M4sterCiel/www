<?php
    session_start();
    include ('includes/tools.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title src="img/logo42.ico">Mini42shop RUSH</title>
    <link rel="stylesheet" href="style.css">
    <a name="logo"><link rel="shortcut icon" href="img/logo42.ico"></a>
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
<div id="scrollUp">
<a id="back_page" href="index.php"><img id="logo_top_img" src="img/back-logo.svg"/></a>
</div>
</div>
<div id="scrollUp">
<a id="back_top" href="#logo"><img id="logo_top_img" src="img/back_to_top.png"/></a>
</div>
</body>

</html>




