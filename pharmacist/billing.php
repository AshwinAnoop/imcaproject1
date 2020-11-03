<?php
include( 'phahome.php' );

/*$servername = "localhost";
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
mysqli_close($conn);*/
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<style>
		#nav2 {
			background-color: inherit;
			color: black;
			border-top-style: solid;
			border-left-style: solid;
			border-right-style: solid;
			border-color: red;
		}
		
		#nav1,
		#nav3,
		#nav4,
		#nav5 {
			border-bottom: solid;
			border-bottom-color: red;
		}
		
		form {
			position: absolute;
			bottom: 10px;
			right: 10px;
			width: 25%;
			height: 70%;
			/*display: none;*/
		}
		
		input {
			width: 80%;
			padding: 10px 10px;
			margin: 4px 2px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		
		button {
			background-color: red;
			border: none;
			color: white;
			padding: 9px 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 14px;
			margin: 4px 2px;
			cursor: pointer;
		}
		
		label {
			color: black;
			font-weight: bold;
		}
	</style>
</head>

<body>



	<form id="bill" name="bill" action="billingstart.php" target="_blank" method="post">




		
		<label for="custname">Patient Name</label><br>
		<input type="text" placeholder="Enter Name" name="custname" required>
		<br>


		<button type="submit" name="startbill" style="background-color: limegreen;">Start Billing</button>
	</form>
</body>
</html>