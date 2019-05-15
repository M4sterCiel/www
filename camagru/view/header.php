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
                echo "<li><a id=\"main-btn\" href=\"/camagru/view/camera.php\">Take a picture</a></li>";
            else
                echo "<li><a id=\"main-btn\" href=\"#\" onclick=\"noLogin()\">Take a picture</a></li>";
                ?>
            <li><a href="/camagru/index.php">Home</a></li>
            <?php
            if ($_SESSION['logd_on'] == 'ok')
            {
                echo "<li class=\"nav-right\"><a href=\"/camagru/view/logout.php\">Logout</a></li>";
                echo "<li class=\"nav-right\"><a href=\"\">Account</a>
                <ul class=\"niveau1\">
                    <li><a href=\"/camagru/view/profile.php\">See my pictures</a></li>
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
        <div id="hidden-div-header"></div>
    </nav>
    <script type="text/javascript" src="/camagru/js/noLogin.js"></script>
</header>
<div class="footer">
    <p style="display:inline;margin-right:4%;">Author: ralleman</p>
    <p style="display:inline;margin-right:4%;">Contact: ralleman@student.42.fr</p>
    <p style="display:inline;margin-right:4%;">© Camagru 2019</p>
</div>