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
if(isset($_POST['add']))
{
$medicine=$_POST["medname"];
$qty=$_POST["qty"];
$price=$_POST["price"];

	
$med_check_query = "SELECT * FROM medicine WHERE med='$medicine' LIMIT 1";
$result = mysqli_query($conn,$med_check_query);
$checkname = mysqli_fetch_assoc($result);
  if ($checkname) { // if medicine exists
	echo "<script>
		alert('Identical Medicine Found');
   </script>";
    
  }
  
	 else
	{
	
		
		$sql="INSERT INTO medicine (med, quantity, price)
		VALUES
		('$medicine','$qty','$price')";
		if(mysqli_query($conn,$sql)){
		echo '<script>';
		echo 'alert("Medicine added!!!");';
   		echo '</script>';
			
		}
		else
		{
		 echo "Error" . $sql . "<br/>" . $conn->error;
		}
		
	 }
}
mysqli_close($conn);
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<style>
		#side3 {
			color: chartreuse;
			font-variant: small-caps;
			font-weight: bold;
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
		}
	</style>
</head>

<body>

	<script>
		openNav();
	</script>

	<form id="addmed" name="addmed" method="post">




		
		<label for="medname">Medicine</label><br>
		<input type="text" placeholder="Enter medicine" name="medname" required>
		<br>
		<label for="qty">Quantity</label><br>
		<input type="number" placeholder="Enter Quantity" name="qty" required>
		<br>
		<label for="price">Price</label><br>
		<input type="number" placeholder="Enter Price" name="price" required>
		<br>


		<button type="submit" name="add" style="background-color: limegreen;">Add medicine</button>
	</form>
</body>
</html>