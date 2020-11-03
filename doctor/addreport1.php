<?php
include( 'dochome.php' );
if (isset($_POST['uploadrep'])){
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
	$adddate=date("d-m-Y");
		$result = mysqli_query( $conn, "SELECT app_id,pid FROM currentpatient WHERE num=1" );
	$row = mysqli_fetch_assoc( $result);
	$appid=$row["app_id"];
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
		<label style="font-size: larger;">		
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";

	$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$result = mysqli_query( $conn, "SELECT app_id,pname FROM currentpatient WHERE num=1" );
	$row = mysqli_fetch_assoc( $result);
		echo $row["app_id"]." - ".$row["pname"] ;
			mysqli_close( $conn );
		?>
</label><br><br><br>
<label for="file-upload" class="upload">
    Choose File...
</label>
<input id="file-upload" type="file" name="file">
	
		<button type="submit" name="uploadrep">Upload</button>
		</form>
	<a id="back" class="goback" onClick="document.location.href='reports.php'">&laquo;Go Back</a>
</body>
</html>