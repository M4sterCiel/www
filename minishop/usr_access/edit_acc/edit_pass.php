<?php
session_start();
include ('../../includes/tools.php');

function    pass_changed() {
?>
		<div class="container_chpass">
			<div class="alert-success_changed">
				<p>Password changed!</p>
			</div>
		</div>
<?php
}

function    wrong_credentials() {
?>
		<div class="container_chpass">
			<div class="alert-fail">
				<p>Wrong Login or password</p>
			</div>
		</div>
<?php
}

function    change_pass() {
	if (isset($_POST['submit']) AND $_POST['submit'] == "change password" AND $_POST['login'] === $_SESSION['logd_usr'] AND $_POST['login']  AND $_POST['oldpasswd']  AND $_POST['newpasswd'])
	{
		$conn = db_connect();
		$login = db_security($conn, $_POST['login']);
		$oldpass = db_security($conn, $_POST['oldpasswd']);
		$newpass = db_security($conn, $_POST['newpasswd']);
		$oldhashed = hash('whirlpool', mysqli_real_escape_string($conn, $oldpass));
		$newhashed = hash('whirlpool', mysqli_real_escape_string($conn, $newpass));
		$query = "SELECT * FROM users WHERE login='$login' AND password='$oldhashed'";
		if (!($res = mysqli_query($conn, $query)))
			die ("Error!" . mysqli_connect_error());
		$array = mysqli_fetch_row($res);
		if ($array[0] < 1)
			wrong_credentials();
		else {
			$query = "update users set password='$newhashed' WHERE login='$login' and password='$oldhashed'";
			$res = mysqli_query($conn, $query);
			if (!$res)
				die ("Error!" . mysqli_connect_error());
			pass_changed();
		}
	}
	else if (isset($_POST['login']) AND isset($_POST['oldpasswd']) AND isset($_POST['newpasswd']) AND $_POST['submit'] == "change password" AND $_POST['login'] !== $_SESSION['logd_usr'])
		wrong_credentials();
	else if (isset($_POST['submit']) AND $_POST['submit'] === "change password" AND (!$_POST['login']  OR !$_POST['oldpasswd']  OR !$_POST['newpasswd']))
		wrong_credentials();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title src="../../img/logo42.ico">Mini42shop Change Password</title>
	<link rel="stylesheet" href="../../style.css">
	<link rel="shortcut icon" href="../../img/logo42.ico">
</head>
<body>
<div>
	<div id="change_passwd_header">
		<a href="../../index.php"><button>Home</button></a>
	</div>
	<form method="post" class="form_change_passwd">
		<input type="text" name="login" value="" placeholder="login">
		<input type="password" name="oldpasswd" value="" placeholder="actual password">
		<input type="password" name="newpasswd" value="" placeholder="new password">
		<input type="submit" name="submit" value="change password">
	</form>
	<?php change_pass(); ?>
</div>
</body>
</html>
<footer>
	<p>© 2019 MiniShop</p>
</footer>