 <?php
    if(isset($_POST['PN']) && isset($_POST['M_ID'])):
    $PHONE = $_POST['PN'];
    $MEMBER_ID = $_POST['M_ID'];


    $link = new mysqli('localhost','root','','sports_academy');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO CONTACT(PHONE, MEMBER_ID) VALUES('".$PHONE."', '".$MEMBER_ID."')";

      

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
