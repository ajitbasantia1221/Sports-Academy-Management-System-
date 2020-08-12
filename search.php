<?php


if(isset($_POST['search']))
{
    // id to search
    $MEMBER_ID = $_POST['M_ID'];
    
    // connect to mysql
    $connect = mysqli_connect("localhost", "root", "","art_gallery");
    
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
        $MEMBER_NAME = "";
        $MEMBER_PHONE= "";
        $Member_DOB= "";
    }
    mysqli_free_result($result);
    mysqli_close($connect);
}
    
    else {
        $MEMBER_NAME = "";
        $MEMBER_PHONE= "";
        $Member_DOB= "";
    }

// in the first time inputs are empty

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: black;
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding: 16px;
    background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=text] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #F0F0F4;
}

input[type=text]:focus, input[type=text]:focus {
    background: white;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.6;
}

.registerbtn:hover {
    opacity: 1;
}

a {
    color: dodgerblue;
}

.signin {
    background-color: #ffffff;
    text-align: center;
}
</style>
</head>
<body>

<form ACTION="msearch.php"METHOD="POST">
  <div class="container">
    <center><h1 style="color:#3366cc" size="30";>SEARCH DATA</h1></center>
    <hr>

    <label for="M_ID"><b> ID</b></label>
    <input type="text" placeholder="Enter Member ID" name="M_ID">

    <label for="M_NAME"><b>GNAME</b></label>
    <input type="text" placeholder="Gallery Name" name="M_NAME" value="<?php echo $gname;?>">

    <label for="LOCATION"><b>GLOCATION</b></label>
    <input type="text" placeholder="GLOCATION" name="LOCATION"  value="<?php echo $location;?>">
    <hr>

    <button type="submit" class="registerbtn" name="search" value="Find">SEARCH</button>
    <button type="reset" class="registerbtn">RESET</button>
  </div>
</form>

</body>
</html>