<?php
include( 'rechome.php' );

if (isset($_POST['patient1'])) {
    //allot action
	$allotp=$_POST['currpatient'];
	$_SESSION['alloted']=$allotp;
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";

		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$result = mysqli_query($conn,"SELECT booking.pid,patientinfo.pname FROM booking,patientinfo WHERE booking.app_id='$allotp' AND booking.pid=patientinfo.pid");
	$row = mysqli_fetch_assoc( $result );
	$allotid = $row['pid'];
	$allotname = $row['pname'];
	mysqli_query($conn,"UPDATE currentpatient SET pid='$allotid', pname='$allotname', app_id='$allotp' WHERE num=1");
	echo "<script>
	 alert('".$allotname." has been sucessfully alloted\\nNow you can change the status of this ID no as completed');

	</script>";
	mysqli_close( $conn );
	
} else if (isset($_POST['patient2'])) {
    //complete action
	$allotp=$_POST['currpatient'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";

		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	if($allotp=$_SESSION['alloted']){
   mysqli_query($conn,"UPDATE booking SET status=1 WHERE app_id='$allotp'");
			echo "<script>
	 alert('Status Updated');

	</script>";
	}

	
		mysqli_close( $conn );

} else if (isset($_POST['patient3'])){
    //alert action
				echo "<script>
	 alert('Alert patient with ID ".$_POST['nextpatient']."');

	</script>";
}
?>
<!doctype html>
<html>
<head>

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
		#tableview{
			
			position: fixed;
			left: 280px;
			top: 120px;
			background-color: lightblue;
			height: 400px;
			width: 630px;
		}
		form {
			position: absolute;
			bottom: 10px;
			right: 10px;
			width: 25%;
			height: 70%;
		
		}
		
		select {
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
			padding: 8px 4px;
		}
		
	</style>
</head>

<body>
	<iframe id="tableview" src="bookingtable.php" height="200" width="300"></iframe>
		<form name="details" action="" method="post">



		<label for="currpatient">Patient INSIDE</label><br>
		
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$bookdate = date("Y-m-d");

$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}

$sql = "SELECT booking.app_id, booking.pid, patientinfo.pname FROM booking,patientinfo  WHERE bookdate='$bookdate' AND status=0 AND booking.pid=patientinfo.pid";
$result = mysqli_query($conn,$sql);

echo "<select name='currpatient'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['app_id'] . "'>" . $row['pid'] . " - ". $row['pname']."</option>";
}
echo "</select>";
mysqli_close( $conn );
?>


			<br>
		<button type="submit" name="patient1"  style="background-color: cornflowerblue;">Allot</button>
		<button type="submit" name="patient2"  style="background-color: limegreen;">Complete</button>
			<br>
					<label for="nextpatient">Next Patient</label><br>
			<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$bookdate = date("Y-m-d");

$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}

$sql = "SELECT booking.pid, patientinfo.pname FROM booking,patientinfo  WHERE bookdate='$bookdate' AND status=0 AND booking.pid=patientinfo.pid";
$result = mysqli_query($conn,$sql);

echo "<select name='nextpatient'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['pid'] . "'>" . $row['pid'] . " - ". $row['pname']."</option>";
}
echo "</select>";
mysqli_close( $conn );
?>
				<br>
		<button type="submit" name="patient3"  style="background-color: tomato;">Alert Patient</button>
			<br>
			
	</form>
	
		

</body>
</html>