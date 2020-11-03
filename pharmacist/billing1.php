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
	$medicineid=$_POST['medicineid'];
	$qty=$_POST['qty'];
	$total = 0;
	

	foreach($medicineid AS $key=>$value){
		$billid = $_SESSION['billid'];
		$medicineid1 = mysqli_real_escape_string($conn,$medicineid[$key]);
		$qty1 = mysqli_real_escape_string($conn,$qty[$key]);
		$sql = mysqli_query($conn,"SELECT * FROM medicine WHERE med_id='$medicineid1'");
		$row = mysqli_fetch_array($sql);
		$medicine1 = $row['med'];
		$price = $row['price'];
		$amount = $qty1*$price;

		$total= $total + $amount;


		$query="INSERT INTO billingdata (medbill_id, med_id, medicine, required_qty, amount)
		VALUES
		('$billid','$medicineid1','$medicine1','$qty1','$amount')";
		if(mysqli_query($conn,$query)){

		mysqli_query($conn,"UPDATE medicine SET quantity=quantity-'$qty1' WHERE med_id='$medicineid1'");


		header("Location: createpdf.php");	
			
		}
		else
		{
		 echo "Error" . $query . "<br/>" . $conn->error;
		}
		
		}
		$_SESSION['total']= $total;
	}

	

	
	mysqli_close( $conn );
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pharmacy Bill</title>
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
			
			var html = '<div><br>Medicine: <select name="medicineid[]">'+$('#selectboxid').html()+'</select> Quantity: <input type="number" name="qty[]">&nbsp;x</a></div>';


			
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
	<h1 align="center">Pharmacy Bill</h1>
	<b>Bill ID : <?php echo $_SESSION['billid'];?></b>
	<br><br>
	<form method="post" id="div2" >
		<div id="container">
			Medicine: <select name='medicineid[]' id='selectboxid'><?php

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
?></select> Quantity: <input type="number" name="qty[]">
			
			<a href="#" id="add" class="add">Add field</a>
			<br>
			</div>

		<input type="submit" class="inputsub" name="submit">
		</form>
	
</body>
</html>