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
  <h1>Contents of MEMBER table are:</h1>
 <table>
 <tr>
  <th><br>MEMBER_ID<br><br></th> 
  <th><br>MEMBER_NAME<br><br></th>
  <th><br>MEMBER_PHONE<br><br></th>
  <th><br>Member_DOB<br><br></th>
  <br><br>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "sports_academy");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT MEMBER_ID, MEMBER_NAME, PHONE, MEMBER_DOB FROM member";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["MEMBER_ID"]. "</td><td>" .$row["MEMBER_NAME"]. "</td><td>"
    . $row["PHONE"]. "</td><td>" . $row["MEMBER_DOB"]. "</td></tr>";
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