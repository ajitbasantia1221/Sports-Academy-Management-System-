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
  tr:nth-child(even) { }
 </style>
</head>
<body style="background-color: mediumaquamarine" background="display.jpg">
  <h1>Contents of TOURNAMENT table are:</h1>
 <table>
 <tr>
  <th><br>TOUR_ID<br><br></th> 
  <th><br>PRIZE<br><br></th>
  <th><br>MEMBER_ID<br><br></th>
  
  <br><br>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "sports_academy");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT TOUR_ID, PRIZE, MEMBER_ID FROM tournament";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["TOUR_ID"]. "</td><td>" .$row["PRIZE"]. "</td><td>"
    . $row["MEMBER_ID"]. "</td></tr>";
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