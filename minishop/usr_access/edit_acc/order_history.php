<!DOCTYPE html>
		<html>
		<head>
			<title src="../../img/logo42.ico">Mini42shop Articles</title>
			<link rel="stylesheet" href="../../style.css">
			<link id="logo" rel="shortcut icon" href="../../img/logo42.ico">
		</head>
		<body>
		<div class="user_area_header">
    <img class="logo" src="../../img/toplogo.png">
    <div class="usr_sections">
        <a href="edit_pass.php"> Edit Account  |  </a>
        <a href="del_acc.php">Destroy Account  |  </a>
		<a href="order_history.php">History</a>
    </div>
    <div class="home_sections" >
        <a href="../../index.php" id="back_home">Back to Home</a>
    </div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div id="scrollUp">
<a id="back_top" href="#logo"><img id="logo_top_img" src="../../img/back_to_top.png"/></a>
</div>
<?php
include ('../../includes/tools.php');
session_start();

	$user = $_SESSION['logd_usr'];
	$conn = db_connect();
	$query = "SELECT * FROM orders_items WHERE login = '$user'";
	if (!($result = mysqli_query($conn, $query)))
		die ("Error! Issues while showing orders!".mysqli_error($conn));
?>
		<table class="adm_art_tab">
		<th>Name product</th><th>Price</th>
<?php
	while ($array = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
			<tr>
				<td><?= htmlentities($array['name'], ENT_QUOTES) ?></td>
				<td><?= htmlentities($array['price'], ENT_QUOTES) ?></td>
			</tr>
<?php
	}
	
?>
<footer>
	<p>© 2019 MiniShop</p>
</footer>