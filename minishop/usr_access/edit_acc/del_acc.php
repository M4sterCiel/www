<?php
session_start();
include ('../../includes/tools.php');

function    wrong_credentials() {
?>
		<div class="container_chpass">
			<div class="alert-fail">
				<p>Wrong Login or password</p>
			</div>
		</div>
<?php
}

function    delete_acc() {
	if (isset($_POST['submit']) AND $_POST['submit'] == "delete account" AND $_POST['login'] AND $_POST['passwd'] AND $_SESSION['logd_usr'] === $_POST['login'])
	{
		$conn = db_connect();
		$login = db_security($conn, $_POST['login']);
		$pass = db_security($conn, $_POST['passwd']);
		$hashed = hash('whirlpool', mysqli_real_escape_string($conn, $pass));
		$query = "SELECT * FROM users WHERE login='$login' AND password='$hashed'";
		if (!($res = mysqli_query($conn, $query)))
			die ("Error!" . mysqli_connect_error());
		$array = mysqli_fetch_row($res);
		if ($array[0] < 1)
			wrong_credentials();
		else
		{
			$query = "delete from users where password='$hashed' and login='$login'";
			$res = mysqli_query($conn, $query);
			if (!$res)
				die ("Error!" . mysqli_connect_error());
			session_destroy();
			header('Location: ../../index.php');
		}
	}
	else if (isset($_POST['login']) AND isset($_POST['passwd']) AND $_POST['submit'] == "delete account" AND $_POST['login'] !== $_SESSION['logd_usr'])
		wrong_credentials();
	else if (isset($_POST['submit']) AND $_POST['submit'] == "delete account" AND (!$_POST['login']  OR !$_POST['passwd']))
		wrong_credentials();      
}
?>

<!DOCTYPE html>
<html>
<head>
	<title src="../../img/logo42.ico">Mini42shop Delete Account</title>
	<link rel="stylesheet" href="../../style.css">
	<link rel="shortcut icon" href="../../img/logo42.ico">
</head>

<body>
<div>
	<div id="delete_passwd_header">
		<a href="../../index.php"><button>Home</button></a>
	</div>
	<form method="post" class="form_delete_passwd">
		<input type="text" name="login" value="" placeholder="login"><br><br>
		<input type="password" name="passwd" value="" placeholder="password"><br><br>
		<input type="submit" name="submit" value="delete account">
	</form>
	<?php delete_acc(); ?>
</div>
</body>
</html>
<footer>
	<p>© 2019 MiniShop</p>
</footer>