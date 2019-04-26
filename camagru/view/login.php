
<?php 
session_start();
include "header.php";
if ($_SESSION['logd_on'] == 'ok')
    header('Location: /camagru/index.php');
?>
<!DOCTYPE html>
    <html>
    <body>
    <div id="login_passwd_header"></div>
    <br>
    <br>
    <div id="log-in"></div>
    <div class="form_login_usr">
    <fieldset id="groupe">
        <form>
            <br>
            <p id="log-hidden-usr"></p><br>
            <label for="username">Username</label><br>
            <input id="user-login" type="text" name="username" placeholder="Username" autofocus required><br>
            <label for="passwd">Password</label><br>
            <input id="passwd-login" type="password" name="passwd" placeholder="Password" required><br>
            <input type="submit" name="submit" value="Sign in!" onclick="checkForm(event)">
        </form>
        </fieldset>
        <a href="/camagru/view/forgotten_pwd.php">Forgot your password</a>
        <a href="/camagru/view/register.php">Sign up</a>
    </div>
    </body>
    <script type="text/javascript" src='../js/login.js'></script>
    </html>
