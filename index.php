<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Jeopardy! - Login</title>
        <link type = "text/css" rel = "stylesheet" href = "styles.css"/>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    </head>
    <body>
        <?php
            session_start();
        ?>
        <img src = "jeopheader.jpg" alt = "header" id = "headerimg"/>
        <?php
            if(isset($_SESSION['loginFail'])){
                //Notification to the user their Username and password isn not correct. 
                //The flag is checked and unset so future login attempts/signins do not show this message unless the error is repeated.
                if($_SESSION['loginFail'] == TRUE){
                    echo "<h2>Incorrect username and password combination, please try again.</h2>";
                    $_SESSION['loginFail'] = FALSE;
                }
            }
        ?>
        <form action = "login-submit.php" method = "POST">
            <fieldset>
                <legend>Sign in!</legend>
                <label for = "username"><strong>Username:</strong></label>
                <input type = "text" size = "16" name = "username"/></br>
                <label for = "password"><strong>Password:</strong></label>
                <input type = "password" size = "16" name = "password"/></br>
                <input type = "submit" value = "Login"/>
            </fieldset>
        </form>
        <a href = "signup.php">Click here to create an account</a>
    </body>
</html>