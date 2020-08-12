 <?php
    if(isset($_POST['C_ID']) && isset($_POST['C_HEAD']) && isset($_POST['C_FEE'])):
    $COURSE_ID = $_POST['C_ID'];
    $COURSE_HEAD = $_POST['C_HEAD'];
    $COURSE_FEE = $_POST['C_FEE'];

    $link = new mysqli('localhost','root','','sports_academy');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO COURSE(COURSE_ID, COURSE_HEAD, COURSE_FEE) VALUES('".$COURSE_ID."', '".$COURSE_HEAD."', '".$COURSE_FEE."')";

      

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
