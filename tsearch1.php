<html>
<head>
<style>
h1{
	align-content: center;
	margin-left: 0px 30px;
	margin-top: 60px;
	align-items: center;

}
table, th,tr, td {
	margin-left: 50px;
	background-color: black;
	color: white;
    border: 0.5px solid blue;
    align-content: center;
    padding-right: 100px;
    padding-left: 75px;
    margin-bottom: 60px;
}

.btn_Continue{
	
	
	margin-top: 50px;
	
	    background-color: orange;  padding: 13px 23px; font-size: 12px; font-weight: bold;
    text-transform: uppercase; margin-top: -8px; margin-left: 600px;  vertical-align: middle;
    color: white;
}
.btn_Continue a{

	text-decoration: none;
}


.financity-header-right-button{
	float:right;
	margin-right: 50px;


}
.financity-navigation-background{
	background: black;
}
.financity-logo-inner{
	margin-top: 50px;

}
.financity-header-left-button{
    margin-top: 100px;
    background-color: #2d5fde; display: inline-block; padding: 13px 23px; font-size: 12px; font-weight: bold;
    text-transform: uppercase; margin-top: -8px; margin-left: 50px; border-radius: 3px; vertical-align: middle;
    color: white;
	float: center;
}
</style>
</head>
<body>
<?php
$host="localhost";
$user="root";
$password="";
$con= new mysqli($host,$user,$password,"sports_academy");
if ($con->connect_error) {
		    die("Connection failed: " . $con->connect_error);
		}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$tid=$_POST['TOUR_ID'];
	
	echo "	
                   
			<h1>User details of $tid is:</h1><br /><br />";
	$sql="select * from TOURNAMENT where TOUR_ID like '%$tid%' ";

				$result = $con->query($sql);

			if ($result->num_rows > 0) {
		    echo "<table><tr><th>TOUR_ID</th><th>PRIZE</th><th>MEMBER_ID</th></tr>";
		   		    while($row = $result->fetch_assoc()) {
		        echo "<tr><td>" . $row["TOUR_ID"]. "</td><td>" . $row["PRIZE"]. "</td><td>".$row["MEMBER_ID"]."</td></tr><br>";

		    }
		    echo "</table>";
		     echo "<button class=btn_Continue><a href='courses.html'>Back</a></button>";
		} else {
		    echo "Incorrect TOUR_ID  <br>";
		    echo "<a href='sign_in.html'>Try again</a>";
		}
		}

		$con->close();
?>
</body>
</html>
