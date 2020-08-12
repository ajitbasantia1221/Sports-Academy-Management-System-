<?php

// php code to search data in mysql database and set it in input text

if(isset($_POST['search']))
{
    // id to search
    $MEMBER_ID = $_POST['M_ID'];
    
    // connect to mysql
    $connect = mysqli_connect("localhost", "root", "","ceramics");
    
    // mysql search query
    $query = "SELECT * FROM MEMBER WHERE MEMBER_ID = '$MEMBER_ID'";
    
    $result = mysqli_query($connect, $query);
    
    // if id exist 
    // show data in inputs
    
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $MEMBER_NAME = $row['MEMBER_NAME'];
        $MEMBER_PHONE = $row['MEMBER_PHONE'];
        $Member_DOB = $row['Member_DOB'];
      }  
         
    }
    
    // if the id not exist
    // show a message and clear inputs
    else {
        echo "Undefined ID";
        $MEMBER_NAME = $row['MEMBER_NAME'];
        $MEMBER_PHONE = $row['MEMBER_PHONE'];
        $Member_DOB = $row['Member_DOB'];
    }
    mysqli_free_result($result);
    mysqli_close($connect);
}
    
    else {
            $MEMBER_NAME = $row['MEMBER_NAME'];
        $MEMBER_PHONE = $row['MEMBER_PHONE'];
        $Member_DOB = $row['Member_DOB'];

// in the first time inputs are empty

?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP FIND DATA </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

    <form action="member_search.php" method="post">

        MEMBER_ID:<input type="text" name="MEMBER_ID"><br><br>

        MEMBER_NAME:<input type="text" name="MEMBER_NAME" value="<?php echo $MEMBER_NAME;?>"><br>
<br>

        MEMBER_PHONE:<input type="text" name="MEMBER_PHONE" value="<?php echo $MEMBER_PHONE;?>"><br><br>

        Member_DOB:<input type="date" name="Member_DOB" value="<?php echo $Member_DOB;?>"><br><br>

        <input type="submit" name="search" value="Find">

           </form>

    </body>

</html>