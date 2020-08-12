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
   font-size: 30px;
   text-align: left;
   font-family:"courier";
   text-align: center;
  } 
  th 
  {
   
   color: black;
  }
  h1{
    font-family: "Courier New";
    font-size: 50px;
     color: black;
  }
  tr:nth-child(odd) { }
 </style>
</head>
<body style="background-color: mediumaquamarine" background="display.jpg">
  <h1>Contents of COURSE table are:</h1>
 <table>
 <tr>
  <th><br>COURSE_ID<br><br></th> 
  <th><br>COURSE_HEAD<br><br></th>
  <th><br>COURSE_FEE<br><br></th>
  
  <br><br>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "sports_academy");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT COURSE_ID, COURSE_HEAD, COURSE_FEE FROM course";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["COURSE_ID"]. "</td><td>" .$row["COURSE_HEAD"]. "</td><td>"
    . $row["COURSE_FEE"]. "</td></tr>";
    }
    echo "</table>";
   
    }
else 
  { 
    echo "0 results"; 
  }
$conn->close();
?>
</table>
</body>
</html>