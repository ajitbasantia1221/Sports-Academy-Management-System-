        <?php

$host="localhost";
$user="root";
$password="";
$con= new mysqli($host,$user,$password,"sports_academy");      // here mysql is the database name
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$a=$_POST['t1'];

	if($a!="")
		{
			$sql1 = "select * from tournament_loc where LOC_ID='$a'";
			$result = mysqli_query($con,$sql1);
			if(mysqli_num_rows($result)>0){
			$sql3="delete from tournament_loc where LOC_ID='$a'";   // student is the table name
			mysqli_query($con,$sql3);
			echo "Location Deleted Successfully";
		}else{
			echo "$a does not Exist!";
		}
			}else{
				echo "Location_ID Field is Empty";
			}

$con->close();
 }
?>