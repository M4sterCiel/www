<div id="homeheader">
    <img class="logo" src="img/toplogo.png">
    <div class="home_sections">
        <a href="index.php">Home   </a>
        <a href="shop.php">  Shop   </a>
		<a href="cart.php">Cart<?php
		echo "[".count($_SESSION['cart'])."]";?></a>
    </div>
    <div class="user_access">
        <?php
            if (!isset($_SESSION['logd_usr'])) {
                ?>
                <a href="usr_access/login.php">Login   </a>
                <a href="usr_access/register.php">   Register</a>
                <?php
            }
            else if (isset($_SESSION['logd_usr'])) {
                if (isset($_SESSION['isAdm']) AND $_SESSION['isAdm'] == 0) {
                    ?>
                    <a href="usr_access/usr_area.php"><?= htmlentities($_SESSION['logd_usr'], ENT_QUOTES) ?> area   </a>
                    <?php
                }
                ?>
                <a href="usr_access/logout.php">  Logout   </a>
                <?php
                if (isset($_SESSION['isAdm']) AND $_SESSION['isAdm'] == 1) {
                    ?><a href="usr_access/admin_area.php">    Admin Area</a><?php
                }
            }
        ?>
    </div>
</div>
