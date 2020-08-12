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
   font-family:"COURIER";
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
  tr:nth-child(odd) {background-color: yellow; }
 </style>
</head>
<body style="background-color: mediumaquamarine" background="display.jpg">
  <h1>Contents of TOURNAMENT_LOC table are:</h1>
 <table>
 <tr>
  <th><br>LOCATION_ID<br><br></th> 
  <th><br>LOCATION_NAME<br><br></th>
  <th><br>LOCATION_AREA<br><br></th>
  <th><br>TOUR_ID<br><br></th>
  <br><br>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "sports_academy");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT LOC_ID, LOC_NAME, LOC_AREA, TOUR_ID FROM tournament_loc";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["LOC_ID"]. "</td><td>" .$row["LOC_NAME"]. "</td><td>"
    . $row["LOC_AREA"]. "</td><td>" . $row["TOUR_ID"]. "</td></tr>";
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