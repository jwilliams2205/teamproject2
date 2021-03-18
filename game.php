<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Jeopardy! - Game</title>
        <link type = "text/css" rel = "stylesheet" href = "styles.css"/>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    </head>
    <body>
        <?php
            session_start();
            $_SESSION['qFlag'] = FALSE;
        ?>
        <img src = "jeopheader.jpg" alt = "header" id = "headerimg"/>
        <?php
            include 'common.php';
            $_SESSION['questionBank'] = populateQuestions();
            if(!isset($_SESSION['points'])){
                $_SESSION['points'] = 0;
                echo '<h2>You currently have 0 points.</h2>';
            }
            else{
                echo '<h2>You have ' . $_SESSION['points'] . ' points!</h2>';
            }
            if(isset($_SESSION['answerFlag'])){
                if($_SESSION['answerFlag'] == 0){
                    echo '<h2>Sorry, wrong answer</h2>, you lose points.</h2>';
                }
                else{
                    echo '<h2>Correct! Enjoy your new points!</h2>';
                }
            }
        ?>
        <div id = "questionMaster">
            <div class = "questionSection">
                <div class = "question">
                    <span class = "qText category">
                        <strong>Time For an App</strong>
                    </span>
                </div>
                <div class = "question">
                    <span class = "qText category">
                        <strong>Just Some Random Facts</strong>
                    </span>
                </div>
                <div class = "question">
                    <span class = "qText category">
                        <strong>What a Dive!</strong>
                    </span>
                </div>
                <div class = "question">
                    <span class = "qText category">
                        <strong>What's in the -atic?</strong>
                    </span>
                </div>
                <div class = "question">
                    <span class = "qText category">
                        <strong>Guitars</strong>
                    </span>
                </div>
            </div>
            <?php populateGameRow(1,100);
                populateGameRow(2,200);
                populateGameRow(3,300);
                populateGameRow(4,400);
                populateGameRow(5,500);
                ?>
        </div>
        <div class = "clearDiv"></div>
        <?php
            if($_SESSION['qFlag']==TRUE){
                echo "<h2>You have already answered this question, please choose another</h2>";
            }
        ?>
        <form action = "game-submit.php" method = "POST">
            <fieldset>
                <legend>Choose a Question by inputing the number of your question that follows the 'Q'</legend>
                <label for = "questionNumberInput"><strong>Q:</strong>
                <input type = "text" name = "questionNumberInput" size = "2" max = "2">
                <input type = "submit" value = "Let's see what your question is..">
            </fieldset>
        </form>
    </body>
</html>