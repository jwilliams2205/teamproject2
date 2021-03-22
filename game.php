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
            if(!isset($_SESSION['qFlag'])){
                $_SESSION['qFlag'] = FALSE;
            }
        ?>
        <img src = "jeopheader.jpg" alt = "header" id = "headerimg"/>
        <?php

        /*
            This php block assumes that all questions are answered. It takes the question bank that exists in the session and
            checks for any questions that have not been answered.
        */
            $allAnswered = TRUE;
            for($i = 0; $i < count($_SESSION['questionBank']); $i++){
                if($_SESSION['questionBank'][$i][7]==0){
                    $allAnswered = FALSE;
                }
            }
        /*
            If all the questions are answered, it stores the players name and points in an array, then pushes it to our leaderboard.txt csv.
            Afterwards, it initiates the sequencing for the game ending, which also displays the leaderboard.
        */
            if($allAnswered == TRUE){
                $scores = array(
                    $_SESSION['name'], $_SESSION['points']
                );
                $file = fopen("leaderboard.txt",'a+');
                fputcsv($file,$scores);
                rewind($file);
                $sortedLeaderboard = [];
                while (($line = fgetcsv($file)) !== FALSE) {
                    $sortedLeaderboard[$line[0]] = $line[1]; 
                  }
                  fclose($file);
                arsort($sortedLeaderboard);
                if(isset($_SESSION['points'])){
                    echo '<h2>GAME OVER! THANK YOU FOR PLAYING! YOUR FINAL SCORE IS ' . $_SESSION['points'] . '! SEE THE LEADERBOARD BELOW!</h2>';
                }

                echo '<div id = "leaderboard">';
                echo "<strong><p>Leaderboard:</p></strong><br>";
                foreach($sortedLeaderboard as $leaderboardName => $leaderboardValue) {
                    echo '<p>'. $leaderboardName . " scored " . $leaderboardValue . " points.</p>";
                    echo "<br>";
                  }
                echo '</div>';
            }
        ?>

        <?php
        /*
            Populates the session question bank from the function that exists in common.php. All functions are flagged as unanswered.
        */
            include 'common.php';
            if(!isset($_SESSION['questionBank'])){
                $_SESSION['questionBank'] = populateQuestions();
            }
            if(!isset($_SESSION['points'])){
                $_SESSION['points'] = 0;
                echo '<h2>You currently have 0 points.</h2>';
            }
            else{
                echo '<h2>You have ' . $_SESSION['points'] . ' points!</h2>';
            }
            if(isset($_SESSION['answerFlag'])){
                if($_SESSION['answerFlag'] == 0){
                    echo '<h2>Sorry, wrong answer, you lose points.</h2>';
                }
                else{
                    echo '<h2>Correct! Enjoy your new points!</h2>';
                }
            }
            if($_SESSION['qFlag']==TRUE){
                echo "<h3><strong>You have already answered this question, please choose another</strong></h3>";
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
            <?php
            /*
                populateGameRow(startIndex,points) -- calls function to create the question numbers for each row and their given points.
            */ 
                populateGameRow(1,100);
                populateGameRow(2,200);
                populateGameRow(3,300);
                populateGameRow(4,400);
                populateGameRow(5,500);
                ?>
        </div>
        <div class = "clearDiv"></div>
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