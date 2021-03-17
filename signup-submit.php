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
            $file = fopen('users.txt','a');
            $data = array(
                $_POST['username'],
                $_POST['password'],
                $_POST['name']
            );
            $csv = file_get_contents('users.txt');
            $file = fopen("php://temp", 'r+');
            fputs($file,$csv);
            rewind($file);
            $users = [];
            while(($data = fgetcsv($file)) !== FALSE){
                $users[] = $data;
            }
            $signupFail = FALSE;
            for($i = 0; $i < count($users); $i++){
                if(!isset($users[$i][0])){ //Error handling in case of bad pushes to the csv.
                    continue;
                }
                elseif($_POST['username'] == $users[$i][0]){
                        $signupFail = TRUE;
                        header("Location: signup.php");
                }
                else{
                    continue;
                }
            }
            header("Location: index.php");
            fputcsv($file,$data);
            fclose($file);
        ?>
    </body>
</html>