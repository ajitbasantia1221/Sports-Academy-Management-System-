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
   font-family:"COURIER";
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
  <h1>Contents of INSTRUCTOR table are:</h1>
 <table>
 <tr>
  <th><br>INS_ID<br><br></th> 
  <th><br>INS_NAME<br><br></th>
  <th><br>COURSE_ID<br><br></th>
  <th><br>INS_SALARY<br><br></th>
  <th><br>ENTRY_TIME<br><br></th>
  <br><br>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "sports_academy");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT INS_ID, INS_NAME, COURSE_ID, INS_SALARY, ENTRY_TIME FROM instructor";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["INS_ID"]. "</td><td>" .$row["INS_NAME"]. "</td><td>"
    . $row["COURSE_ID"]. "</td><td>" . $row["INS_SALARY"]. "</td><td>" . $row["ENTRY_TIME"]. "</td></tr>";
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