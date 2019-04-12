<?php include "header.php";?>
<!DOCTYPE html>
    <html>
    </head>
    <body>
    <div id="login_passwd_header"></div>
    <br>
    <br>
    <form method="POST" class="form_login_usr">
        <input type="email" name="email" value="" placeholder="example@123.com"><br>
        <input type="password" name="passwd" value="" placeholder="password"><br>
        <input id="submit-login" type="submit" name="submit" value="OK">
    </form>
    <a href="forgotten_pwd.php"><input type="button" value="Forgot your password"></a><br>
    <a href="register.php"><input type="button" value="Sign up"></a>
    <script type="text/javascript" src="login.js"></script>
    </body>
    <?php require 'footer.php';?>
    </html>
