<?php
session_start();
include ('../../includes/tools.php');

function    delete_usr_order($usr) {
	$conn = db_connect();
	$query1 = "delete from orders_items where login='$usr'";
	$query2 = "delete from orders where login='$usr'";
	$res1 = mysqli_query($conn, $query1);
	$res2 = mysqli_query($conn, $query2);
	if ($res1 === false OR $res2 === false)
		die ("Error!" . mysqli_error($conn));
	else
	{
		$url=$_SERVER['REQUEST_URI'];
		header("Location: adm_users.php");
	}
}

function    delete_usr() {
	if (isset($_GET['del_usr']) AND $_GET['del_usr'] == "delete user" AND $_GET['id_usr'] AND isset($_GET['id_usr']) AND $_GET['login_usr'] AND isset($_GET['login_usr']))
	{
		$conn = db_connect();
		$id = db_security($conn, $_GET['id_usr']);
		$login = db_security($conn, $_GET['login_usr']);
		delete_usr_order($login);
		$query = "delete from users where id=$id";
		if (!($res = mysqli_query($conn, $query)))
			die ("Error!" . mysqli_error($conn));
		else
		{
			$url=$_SERVER['REQUEST_URI'];
			header("Location: adm_users.php");
		}
	}
}

function    edit_usr() {
	if (isset($_GET['edit_usr']) AND $_GET['edit_usr'] == "edit user" AND $_GET['id_usr'] AND isset($_GET['id_usr']))
	{
		$conn = db_connect();
		$id = db_security($conn, $_GET['id_usr']);
		$query = "select * from users where id=$id";
		if (!($res = mysqli_query($conn, $query)))
			die ("Error !" . mysqli_error($conn));
		$array = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
				<form method="get" class="adm_edit_usr">
					<input type="hidden" name="id_usr" value="<?= htmlentities($id, ENT_QUOTES) ?>">
					<input type="text" name="form_login_usr" value="" placeholder="<?= htmlentities($array['login'], ENT_QUOTES) ?>">
					<input type="text" name="form_passwd_usr" value="" placeholder="type new password">
					<input type="submit" name="edit_usr" value="confirm">
				</form>
<?php
	}
	if (isset($_GET['edit_usr']) AND $_GET['edit_usr'] == "confirm" AND $_GET['id_usr'] AND isset($_GET['id_usr']))
	{
		$conn = db_connect();
		$id = db_security($conn, $_GET['id_usr']);
		$login = db_security($conn, $_GET['form_login_usr']);
		$passwd = $_GET['form_passwd_usr'];
		if (!empty($login)) {
			$query = "update users set login='$login' where id=$id";
			if (!($res = mysqli_query($conn, $query)))
				echo("Error updating user login!" .  mysqli_error($conn));
			else
			{
				$url=$_SERVER['REQUEST_URI'];
				header("Location: adm_users.php");
			}
		}
		if (!empty($passwd)) {
			$pass = hash('whirlpool', db_security($conn, $passwd));
			$query = "update users set password='$pass' where id=$id";
			if (!($res = mysqli_query($conn, $query)))
				echo("Error updating user login!" . mysqli_error($conn));
			else
			{
				$url=$_SERVER['REQUEST_URI'];
				header("Location: adm_users.php");
			}
		}
	}
}

function    add_remove_admin() {
	if (isset($_POST['add_admin']) AND $_POST['add_admin'] == "Admin or Not" AND $_POST['id_usr'] AND isset($_POST['id_usr']))
	{
		$conn = db_connect();
		$id = db_security($conn, $_POST['id_usr']);
		if (intval($_POST['isAdm']) === 1) {
			$query = "update users set isAdm=0 where id=$id";
			$res = mysqli_query($conn, $query);
			if (!$res)
				die ("Error !".mysqli_error($conn));
		}
		else {
			$query = "update users set isAdm=1 where id=$id";
			$res = mysqli_query($conn, $query);
			if (!$res)
				die ("Error !".mysqli_error($conn));
		}
	}
	else if (isset($_POST['id_usr']) AND $_POST['id_usr'] == 1)
		echo "Impossible to modify it";
}

function    show_users() {
	$conn = db_connect();
	$query = "select * from users";
	if (!($res = mysqli_query($conn, $query)))
		die ("Error!" . mysqli_error($conn));
?>
		<table class="adm_user_tab">
			<th> Id</th>
			<th> User Login </th>
			<th> Admin </th>
<?php
	while ($array = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
?>
					<tr>
						<td><?= htmlentities($array['id'], ENT_QUOTES) ?></td>
						<td><?= htmlentities($array['login'], ENT_QUOTES) ?></td>
						<td><?= htmlentities($array['isAdm'] , ENT_QUOTES) ?></td>
						<td>
<?php
		if ($array['id'] != 1 OR ($array['id'] == 1 AND $array['login'] == "admin" AND isset($_SESSION['logd_usr']) AND
			$_SESSION['logd_usr'] == "admin" AND isset($_SESSION['isAdm']) AND $_SESSION['isAdm'] == 1))
		{
?>
							<form method="get">
								<input type="hidden" name="id_usr" value="<?= htmlentities($array['id'], ENT_QUOTES) ?>">
								<input type="submit" name="edit_usr" value="edit user">
							</form>
<?php
		}
?>
						</td>
						<td>
<?php
		if ($array['id'] != 1 AND $array['login'] != "admin")
		{
?>
								<form method="get">
									<input type="hidden" name="id_usr" value="<?= htmlentities($array['id'], ENT_QUOTES) ?>">
									<input type="hidden" name="login_usr" value="<?= htmlentities($array['login'], ENT_QUOTES) ?>">
									<input type="submit" name="del_usr" value="delete user">
								</form>
<?php
		}
?>

						</td>
						<td>
<?php if ($array['id'] != 1)
		{
?>
							<form method="post">
								<input type="hidden" name="id_usr" value="<?= htmlentities($array['id'], ENT_QUOTES) ?>">
								<input type="hidden" name="isAdm" value="<?= htmlentities($array['isAdm'], ENT_QUOTES) ?>">
								<input type="submit" name="add_admin" value="Admin or Not">
							</form>
<?php
		}
?>
						</td>
					</tr>
<?php
	}
?>
		</table>
<?php
}

function create_user()
{
?>
		<form method="get">
			<input type="submit" name="create_user" value="create user" style="margin-left: 15%; width: 150px; font-size: 20px; margin-top: 50px;">
		</form><br>
<?php
	if (isset($_GET['create_user']) AND $_GET['create_user'] == "create user") {
?>
			<br><br><br>
			<form method="post" class="adm_user_tab">
				<input type="text" name="login" value="" placeholder="username">
				<input type="password" name="pw" value="" placeholder="pw">
				<input type="number" min="0" max="1" name="isAdmin" value="" placeholder="isAdmin">
				<input type="submit" name="confirm_user" value="confirm creation">
			</form>
<?php
	}
	if (isset($_POST['confirm_user']) AND $_POST['confirm_user'] == "confirm creation") {
		$conn = db_connect();
		$login = db_security($conn, $_POST['login']);
		$pass = $_POST['pw'];
		$isAdmin = intval(db_security($conn, $_POST['isAdmin']));

		if (($isAdmin ===1 OR $isAdmin === 0) AND !empty($login) AND !empty($pass)) {
			$pw = hash('whirlpool', db_security($conn, $pass));
			$query = "insert into users (login, password, isAdm) values ('$login', '$pw', $isAdmin)";
			if (!($res = mysqli_query($conn, $query)))
				die ("Error: user creation!" . mysqli_error($conn));
			else
			{
				$url=$_SERVER['REQUEST_URI'];
				header("Location: adm_users.php");
			}
		}
		else
			echo "Wrong from compilation!";
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
			<title src="../../img/logo42.ico">Mini42shop Users</title>
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
		</div>
		<div id="scrollUp">
		<a id="back_top" href="#logo"><img id="logo_top_img" src="../../img/back_to_top.png"/></a>
		</div>
		<?php show_users(); ?>
		<?php delete_usr(); ?>
		<?php edit_usr(); ?>
		<?php create_user(); ?>
		<?php add_remove_admin(); ?>
		</body>
		</html>
<?php
}
?>
<footer>
	<p>© 2019 MiniShop</p>
</footer>