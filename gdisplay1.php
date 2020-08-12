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
  <h1>Contents of GAMES table are:</h1>
 <table>
 <tr>
  <th><br>GAME_ID<br><br></th> 
  <th><br>GAME_NAME<br><br></th>
  <th><br>GAME_FEE<br><br></th>
  
  <br><br>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "sports_academy");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT GAME_ID, GAME_NAME, GAME_FEE FROM games";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["GAME_ID"]. "</td><td>" .$row["GAME_NAME"]. "</td><td>"
    . $row["GAME_FEE"]. "</td></tr>";
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