<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Jeopardy! - Sign Up</title>
        <link type = "text/css" rel = "stylesheet" href = "styles.css"/>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    </head>
    <body>
        <?php
            session_start();
        ?>
        <img src = "jeopheader.jpg" alt = "header" id = "headerimg"/>
        <?php
            if(isset($_SESSION['signupFail'])){
                
                if($_SESSION['signupFail'] == TRUE){
                    echo "<h2>User exists, create a unique username.</h2>";
                }
            }
        ?>
        <form action = "signup-submit.php" method = "POST">
            <fieldset>
                <legend>Sign Up!</legend>
                <label for = "username"><strong>Username:</strong></label>
                <input type = "text" size = "16" name = "username"/></br>
                <label for = "password"><strong>Password:</strong></label>
                <input type = "password" size = "16" name = "password"/></br>
                <label for = "Name"><strong>Name:</strong></label>
                <input type = "text" size = "16" name = "name"/></br>
                <input type = "submit" value = "Login"/>
            </fieldset>
        </form>
    </body>
</html>