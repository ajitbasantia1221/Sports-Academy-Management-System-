 <?php
    if(isset($_POST['M_ID']) && isset($_POST['M_NAME']) && isset($_POST['M_PHONE']) && isset($_POST['M_DOB'])):
    $MEMBER_ID = $_POST['M_ID'];
    $MEMBER_NAME = $_POST['M_NAME'];
    $MEMBER_PHONE = $_POST['M_PHONE'];
    $MEMBER_DOB = $_POST['M_DOB'];

    $link = new mysqli('localhost','root','','sports_academy');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO MEMBER(MEMBER_ID, MEMBER_NAME, MEMBER_PHONE, MEMBER_DOB ) VALUES('".$MEMBER_ID."', '".$MEMBER_NAME."', '".$MEMBER_PHONE."','".$MEMBER_DOB."')";

      

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
