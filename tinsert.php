 <?php
    if(isset($_POST['T_ID']) && isset($_POST['T_PRIZE']) && isset($_POST['M_ID'])):
    $TOUR_ID = $_POST['T_ID'];
    $PRIZE = $_POST['T_PRIZE'];
    $MEMBER_ID = $_POST['M_ID'];

    $link = new mysqli('localhost','root','','sports_academy');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO TOURNAMENT(TOUR_ID, PRIZE, MEMBER_ID) VALUES('".$TOUR_ID."', '".$PRIZE."', '".$MEMBER_ID."')";

      

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
