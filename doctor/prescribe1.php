<?php
include('session.php');

$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";


		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
if (isset($_POST['submitstatus'])){
	$appid2=$_SESSION['appid'];
	
	$comment = $_POST['commentarea'];
	$sql="INSERT INTO prescription (app_id,comments)
		VALUES
		('$appid2','$comment')";
			if(mysqli_query($conn,$sql)){
				unset ($_SESSION['appid']);
				$lastid = mysqli_insert_id($conn);
				$_SESSION['lastpreid'] = $lastid;
				header("Location: prescribe2.php");
				exit();
			
		}
		else
		{
		 echo "Error" . $sql . "<br/>" . $conn->error;
		}
}



	$appidtest = $_POST["appno"];
	$_SESSION['appid'] = $appidtest;
	$appid = $appidtest;
	
	$result = mysqli_query($conn,"SELECT booking.pid,patientinfo.pname FROM booking,patientinfo WHERE booking.app_id='$appid' AND booking.pid=patientinfo.pid");
		$row = mysqli_fetch_assoc( $result );
$pname=$row['pname'];
$_SESSION['prename'] = $pname;
$pid=$row['pid'];	
	


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>prescribe</title>
	<style>
				body {

	background-image: url(img2.jpg);
	background-size: cover
	}
				.inputsub{
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
	</style>
</head>

<body>
	<h1 align="center">Prescription Form</h1>
	<b>Patient : <?php echo $pname;?><br>ID : <?php echo $pid ;?></b>
		<form id="div1" method="post"><b>Current status:</b><br> <textarea name="commentarea" rows="5" cols="50" placeholder="Enter status/summary"></textarea><br><input type="submit" id="sub1" class="inputsub" name="submitstatus"></form>
	
</body>
</html>