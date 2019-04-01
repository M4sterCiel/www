<?php
session_start();
include ('../../includes/tools.php');

function    delete_order() {
	if (isset($_GET['delete_order']) AND $_GET['delete_order'] == "delete order" AND $_GET['order_id'] AND isset($_GET['order_id']))
	{
		$conn = db_connect();
		$orderid = db_security($conn, $_GET['order_id']);
		$query1 = "delete from orders_items where order_id=$orderid";
		$query2 = "delete from orders where id=$orderid";
		$res1 = mysqli_query($conn, $query1);
		$res2 = mysqli_query($conn, $query2);
		if ($res1 === false OR $res2 === false)
			die ("Error!" . mysqli_error($conn));
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
			<title src="../../img/logo42.ico">Mini42shop Orders</title>
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
<?php
	$conn = db_connect();
	$query = "select * from orders";
	if (!($res = mysqli_query($conn, $query)))
		die ("Error!" . mysqli_error($conn));
	else {
?>
				<table border="2px solid black" class="adm_orders">
					<th>User</th>
					<th>Total</th>
<?php
		while ($array = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
?>
					<tr>
						<td><?= htmlentities($array['login'], ENT_QUOTES) ?></td>
						<td><?= htmlentities($array['total_price'], ENT_QUOTES) ?> &euro;</td>
						<td>
							<table border="2px solid black" class="adm_itemsorders">
							<th>Article name</th>
							<th>Unit price</th>
							<th>Quantity</th>
<?php
			$conn = db_connect();
			$login = db_security($conn, $array['login']);
			$orderid = db_security($conn, $array['id']);
			$query1 = "select * from orders_items where login='$login' and order_id=$orderid";
			if (!($res1 = mysqli_query($conn, $query1)))
				die ("Error!" . mysqli_error($conn));
			while ($array1 = mysqli_fetch_assoc($res1)) {
?>
							<tr>
								<td><?= htmlentities($array1['name'], ENT_QUOTES) ?></td>
								<td><?= htmlentities($array1['price'], ENT_QUOTES) ?> &euro;</td>
								<td><?= htmlentities($array1['quantity'], ENT_QUOTES) ?></td>
							</tr>
<?php
			}
?>
							</table>
						</td>
						<td>
						<form method="get">
							<input type="hidden" name="order_id" value="<?=htmlentities($orderid, ENT_QUOTES) ?>">
							<input type="submit" name="delete_order" value="delete order">
						<?php delete_order(); ?>
						</form>
						</td>
					</tr>
<?php
		}
?>
				</table>
<?php
	}
?>
		</div>
		<div id="scrollUp">
		<a id="back_top" href="#logo"><img id="logo_top_img" src="../../img/back_to_top.png"/></a>
		</div>
</body>
</html>
<?php
}
?>
