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
        ?>
        <img src = "jeopheader.jpg" alt = "header" id = "headerimg"/>
        <?php
            include 'common.php';
            $_SESSION['questionBank'] = populateQuestions();
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
        <form action = "questionSubmit" method = "POST">
            <fieldset>
                <legend>Choose a Question by inputing the number of your question that follows the 'Q'</legend>
                <label for = "questionNumberInput"><strong>Q:</strong>
                <input type = "text" size = "2" max = "2">
                <input type = "submit" value = "Let's see what your question is..">
            </fieldset>
        </form>
    </body>
</html>