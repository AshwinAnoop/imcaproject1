<?php
include( 'phahome.php' );


?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<style>
		#side4 {
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

	<form id="change" name="change" action="changeprice1.php" method="post">



		<label for="idid">Select Medicine</label><br>
		<select name='medicine' id='selectboxid'><?php

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
    echo "<option value='" . $row['med'] . "'>" . $row['med'] ." ₹". $row['price'] ."</option>";
}
?></select>
		<br>
		
		<label for="price">New price</label><br>
		<input type="text" placeholder="Enter Price" name="price" required>
		<br>


		<button type="submit" name="changeprice" style="background-color: limegreen;">Change Price</button>
	</form>
</body>
</html>