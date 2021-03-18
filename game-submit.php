<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Jeopardy! - Question</title>
        <link type = "text/css" rel = "stylesheet" href = "styles.css"/>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    </head>
    <body>
        <img src = "jeopheader.jpg" alt = "header" id = "headerimg"/>
        <?php
            session_start();
            $questionNum = $_POST['questionNumberInput']-1;
            $_SESSION['questionNumberInput'] = $questionNum;
            if(isset($_SESSION['questionBank'])){
                $questionBank = $_SESSION['questionBank'];
                if($_SESSION['questionBank'][$questionNum][7]==1){
                    $_SESSION['qFlag'] = TRUE;
                    header("Location: game.php");
                }
                else{
                    echo '
                    <h2>Question: ' . $questionBank[$questionNum][1] .'</h2>
                    <form action = "question-submit.php" method = "POST">
                        <fieldset>
                            <legend>Select the correct answer -- What is?</legend>
                            <label for = "A"><strong>' . $questionBank[$questionNum][2] . '</strong></label>
                            <input type = radio name = "answers" value = "A"/></br></br>
                            <label for = "A"><strong>' . $questionBank[$questionNum][3] . '</strong></label>
                            <input type = radio name = "answers" value = "B"/></br></br>
                            <label for = "A"><strong>' . $questionBank[$questionNum][4] . '</strong></label>
                            <input type = radio name = "answers" value = "C"/></br></br>
                            <label for = "A"><strong>' . $questionBank[$questionNum][5] . '</strong></label>
                            <input type = radio name = "answers" value = "D"/></br></br>
                            <input type = "submit" value = "Check Answer"/>
                        </fieldset>
                    </form>
                ';
                }
            }
            else{
                header('Location: index.php');
            }
        ?>
    </body>
</html>