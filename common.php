<?php

    function populateQuestions(){
        $BIGQUESTIONARRAY = array(
            /*
                Structure for the arrays go as follows ->
                    [0] = point value
                    [1] = Question String
                    [2] = Option A
                    [3] = Option B
                    [4] = Option C
                    [5] = Option D
                    [6] = Correct Option
                    [7] = 0 or 1 if question has or has not yet been clicked.
            */
            //TIME FOR AN APP CATEGORY       
            array(
                100,'Launched in 2012 this dating app now has people swiping in 190 countries & in more than 40 languages','Bumble','Tinder','AOL Instant Messenger','Google Plus','B',0
            ),
            array(
                200,'You can listen to your favorite music & DJs from across the nation on this free radio streaming app','iHeartRadio','Napster','MySpace','Youtube','A',0
            ),

            array(
                300,'Hey can you loan me 50 bucks? Better yet can you transfer it to me using this app owned by PayPal?','CashApp','Zelle','MoneyMover','Venmo','D',0
            ),

            array(
                400,'The world\'s largest professional network it\'s like Facebook but for finding jobs & making business connections','Google Plus','LinkedIn','Handshake','MySpace','B',0
            ),

            array(
                500,'Can\'t get to Costco or some of your local retailers? Grab the carrot & use this app that sends shoppers for you','LeaveIt','eBay','DoorDash','Instacart','D',0
            ),

            //FIVE FACTS CATEGORY

            array(
                100,'In the 1960s this U.S. port city was the place where Haight became love & the Dead Grateful','San Fransisco','Rome','Napoli','Kansas City','A',0
            ),

            array(
                200,'2020 obituaries of football Hall of Famer Fred Dean noted he was 68 & had 13 of these 3 generations removed from him','Uncles','Sisters','Brothers','Great Grandchildren','D',0
            ),

            array(
                300,'Paid $200K to play this Untouchables role if De Niro said no, Bob Hoskins asked \'You got any more films you don\'t want me to be in?\'','Al Capone','Scarface','The Mask','Batman','A',0
            ),

            array(
                400,'Straight out of sci-fi the pharyngeal jaws on this type of eel enable it to eat prey whole','Slippery Eel','Snipe Eel','Moray Eel','Sushi Eel','C',0
            ),

            array(
                500,'This war started in 1337 & ended in 1453','The Seven Days War','The One Hundred Sixteen Years War','The Five Thousand Two Hundred Weeks War','The Hundred Years War','D',0
            ),

            //WHAT A DIVE CATEGORY

            array(
                100,'You are the projectile in the name of this dive with your knees pulled to the chest for maximum splash','Jackknife','Bellyflop','Swan','Cannonball','D',0
            ),

            array(
                200,'This dive named for a pocket blade involves touching your feet in the air','Jackknife','Bellyflop','Swan','Cannonball','A',0
            ),

            array(
                300,'This Mexican city is famous for its clavadistas or cliff divers','Mexico City','Acapuclo','Tijuana','Madagascar','B',0
            ),

            array(
                400,'Your arms stick out to either side when you start this dive named for a waterfowl','Jackknife','Bellyflop','Swan','Cannonball','C',0
            ),

            array(
                500,'Someone who profits or a backwards somersault that lands feet first into the water','Gainer','Reverse Gainer','Painer','Explainer','A',0
            ),

            // -ATIC CATEGORY

            array(
                100,'The MCU stands for Marvel this Universe','Cuadratic','Catylitic','Cinematic','Please don\'t get this wrong','C',0
            ),

            array(
                200,'This is a strong-smelling ingredient like garlic that can be a flavor base in cooking','Pnuematic','Charismatic','Autocratic','Aromatic','D',0
            ),

            array(
                300,'This word describes medical conditions that are caused or heightened by one\'s mental or emotional state','Illmatic','Psychosomatic','Pragmatic','Lost in the Attic','B',0
            ),

            array(
                400,'This basic type of blueprint or diagram uses symbols','Democratic','Prismatic','Kinematic','Schematic','D',0
            ),

            array(
                500,'If you\'re a practical person you may be described by this other P word','Prostatic','Pragmatic','Prelatic','Polychromatic','B',0
            ),

            //GUITARS CATEGORY

            array(
                100,'The long narrow part of a guitar that carries the strings from the body to the headstock has this anatomical name','Bridge','Strings','Neck','Fret','C',0
            ),

            array(
                200,'Don\'t worry we\'re sure you know this word for the strips of metal embedded in a guitar\'s fingerboard','Strings','Fret','Tuning Knob','Body','B',0
            ),

            array(
                300,'A guitar\'s strings are set to E-A-D-G-B-E in standard this','Time','Pitch','Tempo','Tuning','D',0
            ),

            array(
                400,'Guitarists use picks also known by this other P word','Pluckers',"Plackers",'Plectrum','Plactrum','C',0
            ),

            array(
                500,'This type of clamp raises the pitch of a guitar\'s strings','Capo','Wrench','Vice','Chompers','A',0
            )
        );
        return $BIGQUESTIONARRAY;
    }

    /* Populate Game Row
        Logic ->
            game.php calls this function for each game row.
            Questions numbered from start index + ($i * 6)
            ie first row has $startIndex of 1, therefore the question numbers in the row are:
                (1+0*5) = 1, (1+1*5) = 6, (1+2*5) = 11, so on until the row is filled for all 5 columns in the row ending with 21
    */
    function populateGameRow($startIndex, $prize){
        echo '<div class = "questionSection">';
        for($i = 0; $i < 5; $i++){
            echo '<div class = "question">
                        <span class = "qText">
                        <strong>Q '. ($startIndex+($i*5)) . '<br>$' . $prize .'</strong>
                        </span>
                </div>';
        }
        echo '</div>';
    }
?>
