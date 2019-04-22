<?php include "header.php";?>
<!DOCTYPE html>
    <html>
    </head>
    <body>
    <div class="register-div">
    <form method="POST" class="form_register_usr">
        <br>
        <label id="first-label" for="username">Username</label><br>
        <input id="username" type="text" name="username" placeholder="Username" autofocus pattern="[A-Za-z]+" required><br>
        <label for="email">Email</label><br>
        <input id="reg-mail" type="email" name="email" placeholder="example@123.com" required="required"><br>
        <label for="passwd">Password</label><br>
        <input id="reg-passwd" type="password" name="passwd" placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required><br>
        <label for="passwd2">Confirm your password</label><br>
        <input id="reg-passwd2" type="password" name="passwd2" placeholder="Password" required><br>
        <label for="private-question">Choose your private question</label>
        <select name="private_question" id="private-quest">
            <option value="birth-city">What is the city you were born?</option>
            <option value="first-pet">What is the name of your first pet?</option>
            <option value="first-car">What was your fisrt car?</option>
        </select><br>
        <label for="private_answer">Your answer</label><br>
        <input id="reg-answer" type="text" name="private_answer" value="" placeholder="Type you answer" required><br>
        <input id="reg-ok-notif" type="radio" name="notification" checked required>Receive notifications <br>
        <input id="reg-no-notif" type="radio" name="notification">Do not receive notifications <br>
        <input type="submit" name="submit" value="Create my account" onclick="checkForm(event)">
    </form>
    <div id="register"></div>
    </div>
    <script type="text/javascript" src="../js/register.js"></script>
    </body>
    </html>