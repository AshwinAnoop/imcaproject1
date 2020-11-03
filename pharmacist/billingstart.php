<?php
include( 'phahome.php' );

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysqli_error());
}
if(isset($_POST['startbill']))
{
	$customer=$_POST["custname"];
	date_default_timezone_set('Asia/Calcutta');
	$currdate = date("Y-m-d");
	$currtime =	date("H:i:s");
		
		$sql="INSERT INTO medbill (customer, medbill_date, medbill_time)
		VALUES
		('$customer','$currdate','$currtime')";
		if(mysqli_query($conn,$sql)){

				$medbill_id = mysqli_insert_id($conn);
				$_SESSION['billid'] = $medbill_id;
				header("Location: billing1.php");

				exit();
			
		}
		else
		{
		 echo "Error" . $sql . "<br/>" . $conn->error;
		}
}
mysqli_close($conn);
?>