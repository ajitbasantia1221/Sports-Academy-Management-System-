 <?php
    if(isset($_POST['LOC_ID']) && isset($_POST['LOC_NAME']) && isset($_POST['LOC_AREA']) && isset($_POST['TOUR_ID'])):
    $LOC_ID = $_POST['LOC_ID'];
    $LOC_NAME = $_POST['LOC_NAME'];
    $LOC_AREA = $_POST['LOC_AREA'];
    $TOUR_ID = $_POST['TOUR_ID'];

    $link = new mysqli('localhost','root','','sports_academy');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO TOURNAMENT_LOC(LOC_ID, LOC_NAME, LOC_AREA, TOUR_ID ) VALUES('".$LOC_ID."', '".$LOC_NAME."', '".$LOC_AREA."','".$TOUR_ID."')";

      

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
