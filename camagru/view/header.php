<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="/camagru/style.css">
        <meta charset="UTF-8">
        <meta name="Description" content="Camagru">
        <meta title="Camagru">
        <meta name="viewport" content="width=device-width, user-scalable=yes">
</head>
<header>
    <nav>
        <ul>
            <?php
            if ($_SESSION['logd_on'] == 'ok')
                echo "<li><a href=\"/camagru/camera.php\">Take a picture</a></li>";
            else
                echo "<li><a href=\"#\">Take a picture</a></li>";
                ?>
            <li><a href="/camagru/index.php">Home</a></li>
            <?php
            if ($_SESSION['logd_on'] == 'ok')
            {
                echo "<li class=\"nav-right\"><a href=\"/camagru/view/logout.php\">Logout</a></li>";
                echo "<li class=\"nav-right\"><a href=\"\">Account</a>
                <ul class=\"niveau1\">
                    <li><a href=\"\">See my profile</a></li>
                    <li><a href=\"/camagru/view/edit_profile.php\">Edit my profile</a></li>
                    <li><a href=\"/camagru/view/delete.php\">Delete my account</a></li>";
            }
            else
            {
                echo "<li class=\"nav-right\"><a href=\"/camagru/view/login.php\">Login</a></li>";
                echo "<li class=\"nav-right\"><a href=\"/camagru/view/register.php\">Sign up</a>";
            }
            ?>
        </ul>
    </nav>
</header>
<div class="footer">© Camagru 2019</div>