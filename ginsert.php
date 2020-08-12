 <?php
    if(isset($_POST['G_ID']) && isset($_POST['G_NAME']) && isset($_POST['G_FEE'])):
    $GAME_ID = $_POST['G_ID'];
    $GAME_NAME = $_POST['G_NAME'];
    $GAME_FEE = $_POST['G_FEE'];

    $link = new mysqli('localhost','root','','sports_academy');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO GAMES(GAME_ID, GAME_NAME, GAME_FEE) VALUES('".$GAME_ID."', '".$GAME_NAME."', '".$GAME_FEE."')";

      

    $result = $link->query($sql3); 

    if($result > 0):
        echo 'Successfully posted';
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    endif; 
    ?>
