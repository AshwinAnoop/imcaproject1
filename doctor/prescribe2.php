<?php
include('session.php');
if (isset($_POST['submit']))
	{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";

		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$medicine=$_POST['medicine'];
	$qty=$_POST['qty'];
	$dose=$_POST['dose'];
	

	foreach($medicine AS $key=>$value){
		$preid = $_SESSION['lastpreid'];
		$medicine1 = mysqli_real_escape_string($conn,$value);
		$qty1 = mysqli_real_escape_string($conn,$qty[$key]);
		$dose1 = mysqli_real_escape_string($conn,$dose[$key]);
		$query="INSERT INTO dosage (pre_id, med_id, medqty, intake)
		VALUES
		('$preid','$medicine1','$qty1','$dose1')";
		if(mysqli_query($conn,$query)){
		header("Location: createpdf.php");	
			
		}
		else
		{
		 echo "Error" . $query . "<br/>" . $conn->error;
		}
		
		}

	}

	

	
	mysqli_close( $conn );
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Prescription</title>
	<style>
		body {

	background-image: url(img2.jpg);
	background-size: cover
	}
		.add{
			text-decoration: none;
			color: green;
			font-weight: bold;
		}
				.del{
			text-decoration: none;
			color: red;
			font-weight: bold;
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
	<script src="jquery-3.5.0.min.js"></script>
	<script>
		
		$(document).ready(function(e){
			
			var html = '<div><br>Medicine: <select name="medicine[]">'+$('#selectboxid').html()+'</select> Quantity: <input type="number" name="qty[]"> Dosage: <textarea rows="2" cols="30" type="text" placeholder="enter comments..." name="dose[]"></textarea><a href="#" id="remove" class="del">&nbsp;x</a></div>';


			
			//add row
			$("#add").click(function(e){
				$("#container").append(html);
			});
			
			//remove row
			$("#container").on('click','#remove',function(e){
				$(this).parent('div').remove();
			});
			
			
		});
	</script>
</head>

<body>
	<h1 align="center">Prescription Form</h1>
	<b>Prescription ID : <?php echo $_SESSION['lastpreid']."/".$_SESSION['prename'];unset ($_SESSION['prename']);?></b>
	<br><br>
	<form method="post" id="div2" >
		<div id="container">
			Medicine: <select name='medicine[]' id='selectboxid'><?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";


$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}

$sql = "SELECT * FROM medicine ORDER BY med";
$result = mysqli_query($conn,$sql);


while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['med_id'] . "'>" . $row['med'] . " QTY  >> ". $row['quantity']."</option>";
}
?></select> Quantity: <input type="number" name="qty[]"> Dosage: <textarea rows="2" cols="30" type="text" placeholder="enter comments..." name="dose[]"></textarea>
			
			<a href="#" id="add" class="add">Add field</a>
			<br>
			</div>

		<input type="submit" class="inputsub" name="submit">
		</form>
	
</body>
</html>