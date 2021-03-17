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
    $csv = file_get_contents('users.txt');
    $file = fopen("php://temp", 'r+');
    fputs($file,$csv);
    rewind($file);
    $users = [];
    while(($data = fgetcsv($file)) !== FALSE){
        $users[] = $data;
    }
    $loginFailed = TRUE;

    for($i = 0; $i < count($users); $i++){
        if(!isset($users[$i][0])){ //Error handling in case of bad pushes to the csv.
            continue;
        }
        else{
            if($_POST['username'] == $users[$i][0] && $_POST['password'] == $users[$i][1]){
                $_SESSION['name'] = $users[$i][2];
                $loginFailed = FALSE;
            }
        }
    }
    print_r($users);
    if($loginFailed == TRUE){
        $_SESSION['loginFail'] = TRUE;
        header("Location: index.php");
    }
    else{
        header("Location: game.php");
    }
        ?>
    </body>
</html>