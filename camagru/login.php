<?php include "header.php";?>
<!DOCTYPE html>
    <html>
    </head>
    <body>
    <div id="login_passwd_header"></div>
    <br>
    <br>
    <form method="POST" class="form_login_usr">
        <input id="mail-login" type="mail" name="email" value="" placeholder="example@123.com"><br>
        <input id="passwd-login" type="password" name="passwd" value="" placeholder="password"><br>
        <button type="submit" id="submit-login" name="submit" value="OK" onclick="checkForm(event)">OK</button>
    </form>
    <a href="forgotten_pwd.php"><input type="button" value="Forgot your password"></a><br>
    <a href="register.php"><input type="button" value="Sign up"></a>
    <div id="blabla"></div>
    </body>
    <script type="text/javascript" src='login.js'></script>
    <?php require 'footer.php';?>
    </html>
