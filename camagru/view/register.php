<?php include "header.php";?>
<!DOCTYPE html>
    <html>
    <body>
    <p id="register-div"></p>
    <form class="form_register_usr">
        <br>
        <label id="first-label" for="username">Username</label><br>
        <input id="username" type="text" name="username" placeholder="Username" autofocus required>
        <p class="hidden-reg" id="reg-hidden-usr"></p><br>
        <label for="email">Email</label><br>
        <input id="reg-mail" type="email" name="email" placeholder="example@123.com" required>
        <p class="hidden-reg" id="reg-hidden-mail"></p><br>
        <label for="passwd">Password</label><br>
        <label id="reg-pattern" for="passwd">(UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)</label>
        <input id="reg-passwd" type="password" name="passwd" placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required><br>
        <label for="passwd2">Confirm your password</label><br>
        <input id="reg-passwd2" type="password" name="passwd2" placeholder="Password" required>
        <p class="hidden-reg" id="reg-hidden-pwd"></p><br>
        <label for="private-question">Choose your private question</label>
        <select name="private_question" id="private-quest">
            <option value="birth-city">What is the city you were born?</option>
            <option value="first-pet">What is the name of your first pet?</option>
            <option value="first-car">What was your fisrt car?</option>
        </select><br>
        <label for="private_answer">Your answer</label><br>
        <input id="reg-answer" type="text" name="private_answer" value="" placeholder="Type you answer" required>
        <p class="hidden-reg" id="reg-hidden-answer"></p><br>
        <input id="reg-ok-notif" type="radio" name="notification" checked>Receive notifications <br>
        <input id="reg-no-notif" type="radio" name="notification">Do not receive notifications <br>
        <input id="reg-submit" type="submit" name="" value="Create my account" style="width">
    </form>
    <script type="text/javascript" src="../js/register.js"></script>
    </body>
    </html>