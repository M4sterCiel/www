<?php
    session_start();
    session_destroy();
    header('Location: /camagru/index.php');
?>