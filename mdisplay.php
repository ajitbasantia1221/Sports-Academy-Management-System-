<html>
<body>

<style>
table, th, td {
    border: 1px solid black;
}
</style>

<?php

$host="localhost";
$user="root";
$password="";
$dbh= new mysqli($host,$user,$password,"sports academy");
echo " Creating stored procedure<br/>";

$sql3="create procedure display1()    //display1() is stored procedure name
select * from member";
if($dbh->query($sql3)==TRUE){

echo "Procedure  created successfully<BR/>";
}

echo " Calling Stored Procedure<BR/>";
if ($result_set = $dbh->query("call display1()"))
   {
     echo "<table><tr><th>MEMBER_NAME</th><th>MEMBER_NAME</th>><th>MEMBER_PHONE</th>><th>Member_DOB</th></tr>";
      while($row=$result_set->fetch_assoc())
      {
      echo "<tr><td>" . $row["MEMBER_NAME"]. "</td><td>" . $row["MEMBER_NAME"]. "</td><td>" . $row["MEMBER_PHONE"]. "</td>><td>" . $row["Member_DOB"]. "</td></tr>";
      }
      echo "</table>";
      }
      else {
	  		    echo "0 results";
	  		}

	$dbh->close();
		?>

</body>
</html>