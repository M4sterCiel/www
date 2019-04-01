<?php
    session_start();
    include ('includes/tools.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title src="img/logo42.ico">Mini42shop Index</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/logo42.ico">
</head>
<body>
<?php include ('includes/menu.php'); ?>
<div class="shop-button-home">
	<a id="shop-button" href="shop.php">Acceder a notre boutique</a>
</div>
<div class="home_img">
<img class="mySlides" src="https://cdn.pixabay.com/photo/2017/08/03/15/26/beautiful-2576840_960_720.jpg">
<img class="mySlides" src="https://cdn.pixabay.com/photo/2016/03/27/19/57/cold-1284028_960_720.jpg">
<img class="mySlides" src="https://cdn.pixabay.com/photo/2017/08/01/08/29/people-2563491_960_720.jpg">
<img class="mySlides" src="https://cdn.pixabay.com/photo/2016/03/27/19/57/cold-1284029_960_720.jpg">
	</div>
	<script>
var myIndex = 0;
carousel();

function carousel() {
 var i;
 var x = document.getElementsByClassName("mySlides");
 for (i = 0; i < x.length; i++) {
   x[i].style.display = "none";
 }
 myIndex++;
 if (myIndex > x.length) {myIndex = 1}
 x[myIndex-1].style.display = "block";
 setTimeout(carousel, 9000);
}
</script>
</body>
</html>
<footer>
	<p>© 2019 MiniShop</p>
</footer>
