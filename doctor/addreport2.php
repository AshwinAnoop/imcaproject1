<?php
include( 'dochome.php' );
if (isset($_POST['verifyid'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";
	$appid = $_POST["appno"];
		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$result = mysqli_query($conn,"SELECT booking.pid,patientinfo.pname FROM booking,patientinfo WHERE booking.app_id='$appid' AND booking.pid=patientinfo.pid");
		$row = mysqli_fetch_assoc( $result );
	echo "<script>
	 alert('Patient : ".$row['pname']."   >>ID : ".$row['pid']."');
	</script>";
	mysqli_close( $conn );
	
}
else if (isset($_POST['uploadrep'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";

	$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}	
$file = $_FILES['file'];
$file_name = $file['name'];
$file_type = $file ['type'];
$file_size = $file ['size'];
$file_path = $file ['tmp_name'];
		$appid=$_POST["appno"];
	$adddate=date("d-m-Y-hisa");
		$result = mysqli_query( $conn, "SELECT pid FROM booking WHERE app_id='$appid'" );
	$row = mysqli_fetch_assoc( $result);

	$pid=$row["pid"];
	$newfilename=$pid."_".$adddate."_".$file_name;
	if(move_uploaded_file($file_path,'C:\wamp64\www\myproject\reportfiles/'.$newfilename))
	{
			$sql="INSERT INTO report (app_id, filename)
		VALUES
		('$appid','$newfilename')";
			if(mysqli_query($conn,$sql)){
			
		echo "<script>
		alert('Record Added Sucessfully');
   		</script>";
			
		}
		else
		{
		 echo "Error" . $sql . "<br/>" . $conn->error;
		}
	}
	
}
?>
<!doctype html>
<html>
<head>
	
<meta charset="utf-8">
			<style>
		#nav4 {
			background-color: inherit;
			color: black;
			border-top-style: solid;
			border-left-style: solid;
			border-right-style: solid;
			border-color: red;
		}
		
		#nav1,
		#nav5,
		#nav3,
		#nav2 {
			border-bottom: solid;
			border-bottom-color: red;
		}
						label {
			color: black;
			font-weight: bold;
		}	
		.label1 {
			color: red;
			padding: 5px;
			background-color: black;
			font-size: large;
			
		}	
						form {
			position: absolute;
			bottom: 10px;
			right: 10px;
			width: 25%;
			height: 70%;
	
		}
.upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
	background-color: limegreen;
}
				input[type="file"] {
    display: none;
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
						input {
			width: 80%;
			padding: 10px 10px;
			margin: 4px 2px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
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
	</style>
<title>Untitled Document</title>
</head>

<body>
	<form id="addfile" name="addfile" enctype="multipart/form-data" action="" method="post">
		<label>Appointment ID :</label><br>
		<input type="number" id="inputappno" placeholder="Appointment no." name="appno" value="<?php echo isset($_POST['appno']) ? $_POST['appno'] : '' ?>" required ><br>
		<button type="submit" name="verifyid" style="background-color: cornflowerblue;">Verify</button>
<br><br><br>
<label for="file-upload" class="upload">
    Choose File...
</label>
<input id="file-upload" type="file" name="file">
	
		<button type="submit" name="uploadrep">Upload</button>
		</form>
	<a id="back" class="goback" onClick="document.location.href='reports.php'">&laquo;Go Back</a>
</body>
</html>