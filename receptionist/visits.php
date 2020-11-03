<?php
include( 'rechome.php' );


?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<style>
		#side2 {
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

	<form id="idinfo" name="idinfo" action="visitview.php" method="post">



		<label for="idid">Patient ID</label><br>
		<input type="text" placeholder="Enter Id" name="idid" required>
		<br>


		<button type="submit" name="getinfo" style="background-color: limegreen;">Get Info</button>
	</form>
</body>
</html>