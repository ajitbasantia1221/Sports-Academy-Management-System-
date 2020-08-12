<!DOCTYPE html>
<html>
<head>
 <title>Table with database</title>
 <style>
  table 
  {
   border-collapse: collapse;
   width: 100%;
   color: black;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
   font-family:"courier";
   text-align: center;
  } 
  th 
  {
   background-color: olive;
   color: black;
  }
  h1{
    font-family: "Courier New";
    font-size: 50px;
     color: black;
  }
  tr:nth-child(even) {background-color: yellow; }
 </style>
</head>
<body style="background-color: mediumaquamarine">
  <h1>Contents of TOURNAMENT table are:</h1>
 <table>
 <tr>
  <th><br>TOUR_ID<br><br></th> 
  <th><br>PRIZE<br><br></th>
  <th><br>MEMBER_ID<br><br></th>
  
  <br><br>
 </tr>
 <?php

$host="localhost";
$user="root";
$password="";
$con= new mysqli($host,$user,$password,"sports_academy");
echo " Creating stored procedure<br/>";

$sql3="create procedure display() select * from tournament";
mysqli_query($con,$sql3);
echo "Procedure  created successfully<BR/>";


echo " Calling Stored Procedure<BR/>";
if ($result = mysqli_query($con,"call display()"))
   {
     
      while($row = mysqli_fetch_assoc($result))
      {
        echo "<table><tr><th>TOUR_ID</th><th>PRIZE</th><th>MEMBER_ID</th></tr>";
      echo "<tr><td>".$row["TOUR_ID"]."</td><td>".$row["PRIZE"]."</td><td>".$row["MEMBER_ID"]."</td></tr>";
      }
      echo "</table>";
      }
      else {
            echo "0 results";
        }

  $con->close();
    ?>
</table>
</body>
</html>