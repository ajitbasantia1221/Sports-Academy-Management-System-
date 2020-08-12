<!DOCTYPE html>
<html>
<head>
 <title>Stored Customer</title>
 <style>
  b{
    font-size: 30px;
    font-family: 'Arial';
    padding: 2px;
    text-align: center;
}
  table 
  {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
   font-family:"Verdana";
   font-weight: bold;
   text-align: center;
   
  } 
  th 
  {
   background-color: skyblue;
   color: white;
   
  }
  h1{
    font-family: "times new roman";
    font-size: 50px;
    border: 9px solid grey;
    border-radius: 17px;
     color: slategrey;
  }
  td{
    padding: 12px;
    font-family: "Verdana";
  
  }
  tr:nth-child(even) {background-color: #f2f2f2; 
    border-radius: 14px;}
 </style>
</head>
<body style="background-color: lavender">
  <h1><center><font style="border:9px solid grey"> STORED PROCEDURE /\/ MEMBER TABLE </font></center></h1>
 <table>
 <tr>
 <th><br>MEMBER_ID<br><br></th> 
  <th><br>MEMBER_NAME<br><br></th> 
  <th><br>MEMBER_PHONE<br><br></th>
  <th><br>MEMBER_DOB<br><br></th>
  <th><br>AGE<br><br></th>
  <br><br>
 </tr>
  <?php
$con = mysqli_connect("localhost", "root", "", "sports_academy");
echo " <b><center>Creating Stored Procedure...</center></b>";

  if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
  } 

  $sql = "CREATE PROCEDURE GetAge() SELECT *, year(current_date())-year(Member_DOB) as age from MEMBER";
  mysqli_query($con,$sql);
  echo "<b><center>Procedure  Created Successfully.</center></b>";
  echo "<b><center>Calling Stored Procedure!!!</center></b>";
  if ($result = mysqli_query($con,"CALL GetAge()"))
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["MEMBER_ID"]. "</td><td>" . $row["MEMBER_NAME"]. "</td><td>" . $row["PHONE"]. "</td><td>" . $row["MEMBER_DOB"]. "</td><td>" . $row["AGE"]. "</td></tr>";
    }
    echo "</table>";
    }
else 
  { 
    echo "0 results"; 
  }
$con->close();
?>
</table>
</body>
</html>