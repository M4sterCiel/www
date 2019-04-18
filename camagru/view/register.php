<?php include "header.php";?>
<!DOCTYPE html>
    <html>
    </head>
    <body>
    <div id="login_passwd_header">
    </div>
    <br>
    <br>
    <form method="POST" class="form_register_usr">
        <label for="username">username</label><br>
        <input id="username" type="text" name="username" placeholder="Username" autofocus required pattern="[A-Za-z]+"><br>
        <label for="email">Email</label><br>
        <input id="reg-mail" type="email" name="email" placeholder="example@123.com" required="required"><br>
        <label for="passwd">Password</label><br>
        <input id="reg-passwd" type="password" name="passwd" placeholder="password" required><br>
        <label for="passwd2">Confirm your password</label><br>
        <input id="reg-passwd2" type="password" name="passwd2" placeholder="password" required><br>
        <select name="private_question" id="private-quest">
            <option value="birth-city">What is the city you were born?</option>
            <option value="first-pet">What is the name of your first pet?</option>
            <option value="first-car">What was your fisrt car?</option>
        </select><br>
        <label for="private_answer">Your answer</label><br>
        <input id="reg-answer" type="text" name="private_answer" value="" placeholder="Answer" required><br>
        <input id="reg-ok-notif" type="radio" name="notification" required>Receive notifications <br>
        <input id="reg-no-notif" type="radio" name="notification">Do not receive notifications <br>
        <button type="submit" name="submit" value="OK" onclick="checkForm(event)">Create my account</button>
    </form>
    <div id="register"></div>
    <script type="text/javascript" src="../js/register.js"></script>
    </body>
    </html>