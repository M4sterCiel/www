
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
    <div id="log-in"></div>
    <div class="form_login_usr">
        <form method="POST">
            <br>
            <label for="username">Username</label><br>
            <input id="user-login" type="text" name="username" value="" placeholder="Username" autofocus required><br>
            <label for="passwd">Password</label><br>
            <input id="passwd-login" type="password" name="passwd" value="" placeholder="Password" required><br>
            <input type="submit" name="submit" value="Enter" onclick="checkForm(event)">
        </form>
        <a href="forgotten_pwd.php"><input type="button" value="Forgot your password"></a>
        <a href="register.php"><input type="button" value="Sign up"></a>
    </div>
    </body>
    <script type="text/javascript" src='../js/login.js'></script>
    </html>
