<?php include "header.php";?>
<!DOCTYPE html>
    <html>
    <body>
    <br>
    <br>
    <fieldset id="groupe">
    <form method="POST" class="form_forgotten_usr">
        <div id="forgotten-div" class="forgotten-div"></div><br>
        <label for="username">Username</label><br>
        <input id="usr-fpwd" type="text" name="username" placeholder="Username" autofocus required><br>
        <label for="private_question">Select the private question</label><br>
        <select name="private_question" id="private-quest">
            <option value="birth-city">What is the city you were born?</option>
            <option value="first-pet">What is the name of your first pet?</option>
            <option value="first-car">What was the fisrt car you had?</option>
        </select><br>
        <label for="private_answer">Your answer</label><br>
        <input id="answer-pwd" type="text" name="private_answer" value="" placeholder="Type your answer" required><br>
        <input type="submit" name="submit" value="Send initialization mail" onclick="checkForm(event)">
    </form>
    </fieldset>
    <script type="text/javascript" src="/camagru/js/forgotten_pwd.js"></script>
    </body>
    </html>