<?php
require "../model.php";
if ($_POST['user'] == '')
{
    echo "✘ Incorrect username!";
    die();
}
if ($result = db_check('users', '*', 'username', $_POST['user']))
{
    if ($_POST['question'] != $result[0]['private_question'])
    {
        echo "✘ Incorrect Question/answer...";
        die();
    }
    if (trim(strtolower($result[0]['private_answer'])) == trim(strtolower($_POST['answer'])))
    {
        $key = md5(microtime(TRUE)*100000);
        db_update_usr('key', $key, $_POST['user']);
        $subject = "Camagru | Reset your password";
        $header = "From: password@camagru.com";
        $message = "Dear " . $_POST['user'] . ",

To reset your password, please follow the link below or copy/paste it in your browser.

http://localhost:8080/camagru/view/reset_pwd.php?usr=" . urlencode($_POST['user']) . "&key=" . urlencode($key) . "

--------------------------------
This is an automatic mail system, please do not answer this mail.";
        if (mail($result[0]['email'], $subject, $message, $header) == false)
            echo "✘ Mail not delivered";
        else
            echo "✔ An email has been sent to you with the procedure to re-initialize your password!";
    }
    else
    {
        echo "✘ Incorrect Question/answer...";
    }
}
else
    echo "✘ Incorrect username!";
