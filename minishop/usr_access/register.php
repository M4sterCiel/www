<?php
    session_start();
    include ('../includes/tools.php');
    function    account_created() {
?>
        <!DOCTYPE html>
        <html><head></head>
        <body>
        <div class="container">
            <div class="alert-success_register">
                <p>Account successfully created.</p>
            </div>
        </div>
        </body>
        </html>
        <?php
    }

    function    account_already_taken() {
        ?>
        <!DOCTYPE html>
        <html><head></head>
        <body>
        <div class="container">
            <div class="alert-fail">
                <p>The username you have chosen already exists! Please try choosing another one.</p>
            </div>
        </div>
        </body>
        </html>
        <?php
    }

    function    display_error() {
        ?>
        <!DOCTYPE html>
        <html><head></head>
        <body>
        <div class="container">
            <div class="alert-fail">
                <p>The username and password are not valid!</p>
                <p>please try again.</p>
            </div>

            </a>
        </div>
        </body>
        </html>
        <?php
    }

    if (isset($_POST['login']) AND $_POST['login'] && isset($_POST['passwd']) AND $_POST['passwd'] && isset($_POST['submit']) && $_POST['submit'] === "OK")
    {
        $conn = db_connect();
        $post_log = db_security($conn, $_POST['login']);
        $hashed = hash('whirlpool', db_security($conn, $_POST['passwd']));
        $query = "INSERT INTO users (login, password) VALUES ('$post_log', '$hashed')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            account_created();
            $_SESSION['logd_usr'] = $post_log;
            $_SESSION['isAdm'] = 0;
            mysqli_close($conn);
        }
        else {
            account_already_taken();
            mysqli_close($conn);
        }
    }
    else if (isset($_POST['submit']) AND $_POST['submit'] === "OK")
        display_error();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div id="register_passwd_header">
        <a href="../index.php"><button>Home</button></a>
    </div>
    <form method="POST" class="form_register_usr">
        <p>Choose a login and a password:</p>
        <input type="text" name="login" value="" placeholder="login">
        <input type="password" name="passwd" value="" placeholder="password">
        <input type="submit" name="submit" value="OK"/>
    </form>
</body>
</html>
