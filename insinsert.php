 <?php
    if(isset($_POST['I_ID']) && isset($_POST['I_NAME']) && isset($_POST['C_ID']) && isset($_POST['I_SALARY'])):
    $INS_ID = $_POST['I_ID'];
    $INS_NAME = $_POST['I_NAME'];
    $COURSE_ID = $_POST['C_ID'];
    $INS_SALARY = $_POST['I_SALARY'];

    $link = new mysqli('localhost','root','','sports_academy');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO INSTRUCTOR(INS_ID, INS_NAME, COURSE_ID, INS_SALARY) VALUES('".$INS_ID."', '".$INS_NAME."', '".$COURSE_ID."', '".$INS_SALARY."')";

      

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
