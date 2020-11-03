<?php
include( 'rechome.php' );
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$conn = new mysqli( $servername, $username, $password, $dbname );
if ( !$conn ) {
	die( 'Connection Failed' . mysqli_error() );
}


if ( isset( $_POST[ 'generatetoken' ] ) )
{
	
	$id = $_POST[ "idid" ];
	$bookdate = $_POST[ "bookdate" ];
	$bookamt = $_POST[ "bookamt" ]; 
	date_default_timezone_set('Asia/Calcutta');
	$currdate = date("Y-m-d");
	$currtime =	date("H:i:s");
	$recid=$_SESSION["login_id"];
    $status=0;
		$sql="INSERT INTO booking ( pid, bookdate, billamt, date, time,rec_id,status)
		VALUES
		('$id','$bookdate','$bookamt','$currdate','$currtime','$recid','$status')";
		if(mysqli_query($conn,$sql)){
			 $last_id = mysqli_insert_id($conn);
			$_SESSION['lastid'] = $last_id;

			
		}
		else
		{
		 echo "Error" . $sql . "<br/>" . $conn->error;
		}
}
?>
<!doctype html>
<html>
<head>

	<style>
		#nav3 {
			background-color: inherit;
			color: black;
			border-top-style: solid;
			border-left-style: solid;
			border-right-style: solid;
			border-color: red;
		}
		
		#nav1,
		#nav2,
		#nav4,
		#nav5 {
			border-bottom: solid;
			border-bottom-color: red;
		}
		
		.options {
			position: absolute;
			bottom: 10px;
			right: 0px;
			width: 25%;
			height: 50%;
		}
		
		.box {
			background-color: #111;
			border: none;
			color: white;
			padding: 9px 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 20px;
			margin: 8px 2px;
			cursor: pointer;
			width: 180px;
		}
		
		.box:hover {
			color: aqua;
			margin: 8px 10px;
		}
		
		.goback {
			background-color: tomato;
			border: none;
			color: white;
			padding: 9px 25px;
			text-align: center;
			text-decoration: none;
			font-size: 14px;
			margin: 4px 2px;
			cursor: pointer;
			position: fixed;
			right: 10px;
			bottom: 10px;
		}
		
		form {
			position: absolute;
			bottom: 10px;
			right: 10px;
			width: 25%;
			height: 70%;
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


	<form id="tokenform" name="tokenform" action="" method="post">



		<label for="idid">Patient ID</label><br>
		<input type="number" placeholder="Enter Id" name="idid" value="<?php echo isset($_SESSION['idid']) ? $_SESSION['idid'] : '' ?>" required>
		<br>
		<label for="bookdate">Appointment Date</label><br>
		<input type="date" name="bookdate" value="<?php echo isset($_SESSION['bookdate']) ? $_SESSION['bookdate'] : '' ?>" required>
		<br>
		<label for="bookamt">Amount</label><br>
		<input type="number" placeholder="Amount to pay" name="bookamt" value="<?php echo isset($_SESSION['bookamt']) ? $_SESSION['bookamt'] : '' ?>" required>

		<button type="submit" name="generatetoken" style="background-color: limegreen;"><b>Get token</b></button>
	</form>



	<a id="back" class="goback" onClick="history.go(-2);">&laquo;Go Back</a>
	<?php
	unset( $_SESSION[ 'bookamt' ] );
	unset( $_SESSION[ 'bookdate' ] );
	unset( $_SESSION[ 'idid' ] );
	?>

</body>
</html>