<?php
    session_start();
    session_destroy();
    header('Location: ../index.php');
?>
<footer>
	<p>© 2019 MiniShop</p>
</footer>