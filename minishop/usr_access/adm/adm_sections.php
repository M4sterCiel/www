<?php

include ('../../includes/tools.php');
session_start();

function    display_delete_categ()
{
	if (isset($_GET['submit1']) AND $_GET['submit1'] === 'Show' AND isset($_GET['idcateg']) AND $_GET['idcateg'])
	{
		$conn = db_connect();
		$idcateg = db_security($conn, $_GET['idcateg']);

		$subquery1 = "select * from articles";
		$subquery2 = "select * from articles where id in (select product_id from product_category where category_id=$idcateg)";

		$query = ($idcateg == '*') ? $subquery1 : $subquery2;

		if (!($res = mysqli_query($conn, $query)))
			die ("Error!".mysqli_error($conn));
?>
			<table class="adm_sect_tab">
				<th>Image</th><th>Name</th><th>Price</th>
<?php if ($idcateg != '*')
			{
?>
	<th>Remove</th><?php
			}
?>
<?php
		while ($array = mysqli_fetch_array($res, MYSQLI_ASSOC))
		{
?>
					<tr>
						<td><img src="<?= htmlentities($array['img_link'], ENT_QUOTES) ?>"></td>
						<td><?= htmlentities($array['name'], ENT_QUOTES) ?></td>
						<td><?php echo "\xE2\x82\xAc ".htmlentities($array['price'], ENT_QUOTES); ?></td>
<?php if ($idcateg != '*')
		{
?>
							<td>
								<form method="get">
									<input type="hidden" name="art_id" value="<?= htmlentities($array['id'], ENT_QUOTES) ?>">
									<input type="submit" name="del_sub" value="delete">
								</form>
							</td>
<?php
		}
?>
					</tr>
<?php
		}
?>
			</table>
<?php
	}
	if (isset($_GET['submit2']) AND $_GET['submit2'] == 'Delete category' AND isset($_GET['idcateg']) AND $_GET['idcateg'])
	{
		$conn = db_connect();
		$idcateg = db_security($conn, $_GET['idcateg']);
		$query1 = ($idcateg == '*') ? "delete from product_category" : "delete from product_category where category_id=$idcateg";
		$query2 = ($idcateg == '*') ? "delete from categories": "delete from categories where id=$idcateg";
		if (!($res1 = mysqli_query($conn, $query1)) OR !($res2 = mysqli_query($conn, $query2)))
			die ("Error!".mysqli_error($conn));
		else
			header('Location: adm_sections.php');
	}
	if (isset($_GET['submit3']) AND $_GET['submit3'] === 'Remove items' AND isset($_GET['idcateg']) AND $_GET['idcateg'])
	{
		$conn = db_connect();
		$idcateg = db_security($conn, $_GET['idcateg']);
		$query1 = ($idcateg == '*') ? "delete from product_category" : "delete from product_category where category_id=$idcateg";
		if (!($res1 = mysqli_query($conn, $query1)))
			die ("Error!".mysqli_error($conn));
		else
			header('Location: adm_sections.php');
	}
}



function delete_item_from_category()
{
	if (isset($_GET['del_sub']) && $_GET['del_sub'] == "delete" AND isset($_GET['art_id']) AND $_GET['art_id'])
	{
		$conn = db_connect();
		$id = db_security($conn, $_GET['art_id']);
		$query = "delete from product_category where product_id=$id";
		if (!($res = mysqli_query($conn, $query)))
			die ("Error!".mysqli_error($conn));
		else
			header('Location: adm_sections.php');
	}
}


function edit_categ()
{
	if (isset($_GET['submit4'] ) AND $_GET['submit4'] == 'Edit category' AND isset($_GET['idcateg']) AND $_GET['idcateg'] != '*')
	{
		$conn = db_connect();
		$id = db_security($conn, $_GET['idcateg']);
		$query = "select * from categories where id=$id";
		if (!($res = mysqli_query($conn, $query)))
			die ("Error!".mysqli_error($conn));
		$array = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
			<form method="get">
				<input type="hidden" name="id" value="<?= htmlentities($id, ENT_QUOTES) ?>">
				<input type="text" name="name" value="" placeholder="<?php echo "name = " .  htmlentities($array['name'], ENT_QUOTES); ?>" style="width: 30%">
				<input type="url" name="image" value="" placeholder="url">
				<input type="submit" name="submit" value="confirm_edit">
			</form><br><br><br><br>
<?php
	}
	if (isset($_GET['submit']) AND $_GET['submit'] == "confirm_edit" AND isset($_GET['id']) AND $_GET['id'])
	{
		$conn = db_connect();
		$id = db_security($conn, $_GET['id']);
		$name = db_security($conn, $_GET['name']);
		$img = db_security($conn, $_GET['image']);
		if (!empty($name))
		{
			$query = "update categories set name='$name' where id='$id'";
			if (!($res = mysqli_query($conn, $query)))
				die ("Error: category name modification!".mysqli_error($conn));

		}
		if (!empty($img))
		{
			$query = "update categories set image='$img' where id='$id'";
			if (!($res = mysqli_query($conn, $query)))
				die ("Error: category image modification!".mysqli_error($conn));
		}
		else
			header('Location: adm_sections.php');
	}
}

function    create_categ() {
	if (isset($_GET['create_categ']) AND $_GET['create_categ'] == "create category")
	{
?>
			<form method="get" class="create_category">
				<input type="text" name="new_categ_name" value="" placeholder="category name"><br>
				<input type="url" name="new_categ_img" value="" placeholder="image url"><br>
				<input type="submit" name="confirm_categ" value="confirm creation"><br>
			</form>
<?php
	}
	if (isset($_GET['confirm_categ']) AND $_GET['confirm_categ'] == "confirm creation" AND
		isset($_GET['new_categ_name']) AND $_GET['new_categ_name'] AND isset($_GET['new_categ_img']) AND $_GET['new_categ_img'])
	{
		$conn = db_connect();
		$categ_name = db_security($conn, $_GET['new_categ_name']);
		$link = db_security($conn, $_GET['new_categ_img']);
		$query = "insert into categories (name, img_link) values ('$categ_name', '$link')";
		if (!($res = mysqli_query($conn, $query)))
			die ("Error!" . mysqli_error($conn));
		else
			header('Location: adm_sections.php');
	}

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
			<title src="../../img/logo42.ico">Mini42shop Sections</title>
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
			<br>
			<form method="get" onclick="">
				<table class="adm_sect_tab"><tr>
						<td><label>All<input type="radio" name="idcateg" value="*"></label></td>
<?php
	$conn = db_connect();
	$query = "select id, name from categories";
	if (!($res = mysqli_query($conn, $query)))
		die ("Error!" . mysqli_error($conn));
	while ($array = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
		?><td><label><?= htmlentities($array['name'], ENT_QUOTES) ?><input type="radio" name="idcateg" value="<?= htmlentities($array['id'], ENT_QUOTES) ?>"></label></td><?php
	}
?>
					</tr>
				</table>
				<br><br>
				<div class="sections_options">
					<input type="submit" name="submit1" value="Show">
					<input type="submit" name="submit2" value="Delete category">
					<input type="submit" name="submit4" value="Edit category">
					<input type="submit" name="submit3" value="Remove items">
					<input type="submit" name="create_categ" value="create category">
				</div>

			</form>

			<?php display_delete_categ(); ?>
			<?php delete_item_from_category(); ?>
			<?php create_categ(); ?>
			<?php edit_categ(); ?>

		</div>
		<div id="scrollUp">
		<a id="back_top" href="#logo"><img id="logo_top_img" src="../../img/back_to_top.png"/></a>
		</div>

		</body>
		</html>
<?php
}
?>
