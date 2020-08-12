<?php

// php code to search data in mysql database and set it in input text

if(isset($_POST['search']))
{
    // id to search
    $user_id = $_POST['user_id'];
    
    // connect to mysql
    $connect = mysqli_connect("localhost", "root", "","ceramics");
    
    // mysql search query
    $query = "SELECT * FROM user WHERE user_id = '$user_id'";
    
    $result = mysqli_query($connect, $query);
    
    // if id exist 
    // show data in inputs
    
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $uname = $row['uname'];
        $address = $row['address'];
        $contact_no = $row['contact_no'];
      }  
         
    }
    
    // if the id not exist
    // show a message and clear inputs
    else {
        echo "Undefined ID";
        $uname = "";
        $address = "";
        $contact_no= "";
    }
    mysqli_free_result($result);
    mysqli_close($connect);
}
    
    else {
            $uname = "";
             $address = "";
           $contact_no= "";
    }

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

    <form action="user_search.php" method="post">

        user id:<input type="text" name="user_id"><br><br>

        uname:<input type="text" name="uname" value="<?php echo $uname;?>"><br>
<br>

        address:<input type="address" name="address" value="<?php echo $address;?>"><br><br>

        contact:<input type="contact" name="contact" value="<?php echo $contact_no;?>"><br><br>

        <input type="submit" name="search" value="Find">

           </form>

    </body>

</html>