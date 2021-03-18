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
        <?php
            session_start();
            $questionNum = $_SESSION['questionNumberInput'];
            if(isset($_SESSION['questionBank'])){
                $questionBank = $_SESSION['questionBank'];
                if($_POST['answers'] == $questionBank[$questionNum][6]){
                    $_SESSION['points'] = $_SESSION['points'] + $questionBank[$questionNum][0];
                    $_SESSION['answerFlag'] = 1;
                    header('Location: game.php');
                }
                else{
                    $_SESSION['points'] = $_SESSION['points'] - $questionBank[$questionNum][0];
                    $_SESSION['answerFlag'] = 0;
                    header('Location: game.php');
                }
            }
            else{
                header('Location: index.php');
            }
        ?>
        <img src = "jeopheader.jpg" alt = "header" id = "headerimg"/>
        
    </body>
</html>