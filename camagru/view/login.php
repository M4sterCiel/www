
<?php 
session_start();
include "header.php";
?>
<!DOCTYPE html>
    <html>
    </head>
    <body>
    <div id="login_passwd_header"></div>
    <br>
    <br>
    <form method="POST" class="form_login_usr">
        <input id="user-login" type="text" name="username" value="" placeholder="Username" autofocus><br>
        <input id="passwd-login" type="password" name="passwd" value="" placeholder="password"><br>
        <input type="submit" name="submit" value="Enter" onclick="checkForm(event)">
    </form>
    <a href="forgotten_pwd.php"><input type="button" value="Forgot your password"></a><br>
    <a href="register.php"><input type="button" value="Sign up"></a>
    <div id="log-in"></div>
    </body>
    <script type="text/javascript" src='../js/login.js'></script>
    </html>
