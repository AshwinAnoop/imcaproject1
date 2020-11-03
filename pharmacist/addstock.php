<?php
include('phahome.php');
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
	$exp=$_POST['expiry'];
	

	foreach($medicine AS $key=>$value){
		
		$medicine1 = mysqli_real_escape_string($conn,$value);
		$qty1 = mysqli_real_escape_string($conn,$qty[$key]);
		$expiry = mysqli_real_escape_string($conn,$exp[$key]);
		
		mysqli_query($conn,"INSERT INTO medbatch (med_id, bundle_qty, expiry)
		VALUES
		('$medicine1','$qty1','$expiry')");
		$query="UPDATE medicine SET quantity = quantity+'$qty1' WHERE med_id = '$medicine1'";
		if(mysqli_query($conn,$query)){
	echo "<script>
		alert('New Stock Added');
   </script>";

    	
			
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
<title>Add-stock</title>
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
		#nav2,
		#nav3,
		#nav5 {
			border-bottom: solid;
			border-bottom-color: red;
		}
			body {

		background-image: url(img1.jpg);
		background-size: cover
		}

			select {
			width: 45%;
			padding: 5px 5px;
			margin: 4px 2px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

			.med_div{
				margin-left: 50px;
			}
					.inputlayout {
			width: 15%;
			padding: 5px 5px;
			margin: 4px 2px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
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
			
			var html = '<div class="med_div"><br>Medicine: <select name="medicine[]">'+$('#selectboxid').html()+'</select> Quantity: <input type="number" class="inputlayout" name="qty[]"></textarea>Expiry :<input type="date" name="expiry[]" class="inputlayout" required><a href="#" id="remove" class="del">&nbsp;x</a></div>';


			
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
<br>
<br>
<br>
	<form method="post" id="div2" >
		<div id="container" class="med_div">
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
?></select> Quantity: <input type="number" class="inputlayout" name="qty[]"></textarea>Expiry :<input type="date" class="inputlayout" name="expiry[]" required>
			
			<a href="#" id="add" class="add">Add field</a>
			<br>
			</div>

		<input type="submit" class="inputsub" name="submit">
		</form>
	
</body>
</html>