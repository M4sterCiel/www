<?php

include ('../../includes/tools.php');
session_start();

function    create_article() {
?>
		<form method="get" class="create_art">
			<input type="submit" name="create_article" value="create article">
		</form>
<?php
	if (isset($_GET['create_article']) AND $_GET['create_article'] == "create article") {
?>
			<form method="get" class="create_art">
				<input type="text" name="new_art_categ" value="" placeholder="category1 category2 ...">
				<input type="text" name="new_art_name" value="" placeholder="name">
				<input type="text" name="new_art_price" value="" placeholder="price">
				<input type="url" name="new_art_img" value="" placeholder="image url">
				<input type="submit" name="confirm_article" value="confirm article">
			</form>
<?php
	}
	if (isset($_GET['confirm_article']) AND $_GET['confirm_article'] == "confirm article" AND isset($_GET['new_art_categ']) AND
		$_GET['new_art_categ'] AND $_GET['new_art_name'] AND isset($_GET['new_art_name']) AND $_GET['new_art_price'] AND
		isset($_GET['new_art_price']) AND $_GET['new_art_img'] AND isset($_GET['new_art_img']))
	{
		$conn = db_connect();
		$name = db_security($conn, $_GET['new_art_name']);
		$categ = explode (" ", db_security($conn, $_GET['new_art_categ']));
		$link = db_security($conn, $_GET['new_art_img']);
		$price = db_security($conn, $_GET['new_art_price']);
		$flag = 0;
		$last_id = null;
		foreach ($categ as $namecateg) {
			$query = "select id from categories where name='$namecateg'";
			$res = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
			if (!isset($row['id']))
				echo "Category " . $namecateg . " not existing! Please create it first.";
			else {
				$idcateg = $row['id'];
				if ($flag === 0) {
					$query = "insert into articles (name, price, img_link) values ('$name', $price, '$link')";
					if (!($res = mysqli_query($conn, $query)))
						die ("Error!" . mysqli_connect_error());
					$last_id = mysqli_insert_id($conn);
					$flag = 1;
				}
				if (isset($last_id)) {
					$query = "insert into product_category (product_id, category_id) values ($last_id, $idcateg)";
					if (!($res = mysqli_query($conn, $query)))
						die ("Error!" . mysqli_error($conn));
				}
			}
		}
	}
}

function    edit_article() {
	if (isset($_GET['edit_art']) AND $_GET['edit_art'] == "edit article" AND $_GET['edit_art_id'] AND isset($_GET['edit_art_id']))
	{
		$conn = db_connect();
		$id = db_security($conn, $_GET['edit_art_id']);
		$query = "select * from articles where id='$id'";
		if (!($res = mysqli_query($conn, $query)))
			die ("Error: editing article!" . mysqli_error($conn));
		$array = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
			<form method="get" class="edit_art">
				<input type="hidden" name="id" value="<?= htmlentities($id, ENT_QUOTES) ?>">
				<input type="text" name="name" value="" placeholder="<?= htmlentities($array['name'], ENT_QUOTES) ?>">
				<input type="number" name="price" value="" placeholder="<?= htmlentities($array['price'], ENT_QUOTES) ?>">
				<input type="url" name="image" value="" placeholder="url">
				<input type="submit" name="submit" value="confirm">
			</form>
<?php
	}
	if (isset($_GET['submit']) AND $_GET['submit'] == "confirm") {
		$conn = db_connect();
		$id = db_security($conn, $_GET['id']);
		$name= db_security($conn, $_GET['name']);
		$price = db_security($conn, $_GET['price']);
		$img = db_security($conn, $_GET['image']);
		if (!empty($name)) {
			$query = "update articles set name='$name' where id=$id";
			if (!($res = mysqli_query($conn, $query)))
				die ("Error!".mysqli_error($conn));
		}
		if (!empty($price)) {
			$query = "update articles set price=$price where id=$id";
			if (!($res = mysqli_query($conn, $query)))
				die ("Error!".mysqli_error($conn));
		}
		if (!empty($img)) {
			$query = "update articles set img_link='$img' where id=$id";
			if (!($res = mysqli_query($conn, $query)))
				die ("Error!".mysqli_error($conn));
		}
	}
}

function    delete_article() {
	if (isset($_GET['del_art']) AND $_GET['del_art'] == "delete article" AND $_GET['del_art_id'] AND isset($_GET['del_art_id']))
	{
		$conn = db_connect();
		$id = db_security($conn, $_GET['del_art_id']);
		$query1 = "delete from product_category where product_id=$id";
		$query2 = "delete from articles where id=$id";
		if (!($res1 = mysqli_query($conn, $query1)) OR !($res2 = mysqli_query($conn, $query2)))
			die ("Error!".mysqli_error($conn));
	}
}

function    add_article_category() {
	if (isset($_GET['add_art_categ']) AND $_GET['add_art_categ'] AND isset($_GET['edit_categ_art_id']) AND $_GET['edit_categ_art_id'])
	{
		$conn = db_connect();
		$idprod = db_security($conn, $_GET['edit_categ_art_id']);
?>
			<form method="get" class="add_art_categ">
				<input type="hidden" name="art_id" value="<?= htmlentities($idprod, ENT_QUOTES) ?>">
				<input type="text" name="add_art_categs" value="" placeholder="category1 category2 ...">
				<input type="submit" name="add_categ_confirm" value="confirm">
			</form>
<?php
	}
	if (isset($_GET['add_art_categs']) AND $_GET['add_art_categs'] AND isset($_GET['add_categ_confirm']) AND $_GET['add_categ_confirm'] AND isset($_GET['art_id']) AND $_GET['art_id'])
	{
		$conn = db_connect();
		$idprod = db_security($conn, $_GET['art_id']);
		$categ = explode(" ", db_security($conn, $_GET['add_art_categs']));
		foreach ($categ as $namecateg)
		{
			$query = "select id from categories where name='$namecateg'";
			if (!($res = mysqli_query($conn, $query)))
				die ("Error!".mysqli_error($conn));
			$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

			if (!isset($row['id']))
				echo "Category " . $namecateg . " not existing! Please create it first.";
			else {
				$idcateg = $row['id'];
				$query = "insert into product_category (product_id, category_id) values ($idprod, $idcateg)";
				if (!($res = mysqli_query($conn, $query)))
					die ("Error!" . mysqli_error($conn));
			}
		}
	}
}

function    display_articles() {
	$conn = db_connect();
	$query = "select * from articles";
	if (!($result = mysqli_query($conn, $query)))
		die ("Error! Issues while showing articles!".mysqli_error($conn));
?>
		<table class="adm_art_tab">
		<th>id</th><th></th><th>name</th><th>price</th>
<?php
	while ($array = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
			<tr>
				<td><?= htmlentities($array['id'], ENT_QUOTES) ?></td>
				<td><img src="<?= htmlentities($array['img_link'], ENT_QUOTES) ?>"></td>
				<td><?= htmlentities($array['name'], ENT_QUOTES) ?></td>
				<td><?= htmlentities($array['price'], ENT_QUOTES) ?></td>
				<td><form method="get">
						<input type="hidden" name="del_art_id" value="<?= htmlentities($array['id'], ENT_QUOTES) ?>">
						<input type="submit" name="del_art" value="delete article">
					 </form></td>
				<td><form method="get">
						<input type="hidden" name="edit_art_id" value="<?= htmlentities( $array['id'], ENT_QUOTES) ?>">
						<input type="submit" name="edit_art" value="edit article">
					</form></td>
				<td><form method="get">
						<input type="hidden" name="edit_categ_art_id" value="<?= htmlentities($array['id'], ENT_QUOTES) ?>">
						<input type="submit" name="add_art_categ" value="add category">
					</form></td>
			</tr>
<?php
	}
?>
		</table>
<?php
}

if ($_SESSION['isAdm'] != 1) {
	header('HTTP/1.0 401 Unauthorized');
	echo "<html><body>You don't have rights to see this page!</body></html>\n";
	?><a href="../../index.php"> | Home</a><?php
}
else {
?>
		<!DOCTYPE html>
		<html>
		<head>
			<title src="../../img/logo42.ico">Mini42shop Articles</title>
			<link rel="stylesheet" href="../../style.css">
			<a name="logo"><link rel="shortcut icon" href="../../img/logo42.ico" src="../../img/logo42.ico"></a>
		</head>
		<body>
		<div class="user_area_header">
			<img class="logo" src="../../img/toplogo.png">
			<div class="usr_sections">
				<a href="adm_articles.php"> Articles | </a>
				<a href="adm_sections.php"> Sections | </a>
				<a href="adm_users.php">Users | </a>
				<a href="adm_orders.php">Orders</a>
			</div>
			<div class="home_sections">
				<a href="../admin_area.php">Admin Area</a>
				<a href="../../index.php"> | Home</a>
			</div>
		</div>
			<div>
				<?php create_article(); ?>
			</div>
			<div>
				<?php edit_article(); ?>
			</div>
			<div>
				<?php delete_article(); ?>
			</div>
			<div>
				<?php add_article_category(); ?>
			</div>
		<div class="display_art">
			<?php display_articles(); ?>
		</div>
		<div id="scrollUp">
			<a id="back_top" href="#logo"><img id="logo_top_img" src="../../img/back_to_top.png"/></a>
		</div>

		</body>
		</html>
<?php
}
?>


