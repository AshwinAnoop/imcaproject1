<?php
include( 'rechome.php' );
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
		#nav2,
		#nav3,
		#nav5 {
			border-bottom: solid;
			border-bottom-color: red;
		}
		.options {
			position: absolute;
			bottom: 10px;
			right: 0px;
			width: 25%;
			height: 50%;
		}
		
		.box {
			background-color: #111;
			border: none;
			color: white;
			padding: 9px 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 20px;
			margin: 8px 2px;
			cursor: pointer;
			width: 180px;
		}
		
		.box:hover {
			color: aqua;
			margin: 8px 10px;
		}
		
		form {
			position: absolute;
			bottom: 10px;
			right: 10px;
			width: 25%;
			height: 70%;
			display: none;
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
		

				.goback {
			background-color: tomato;
			border: none;
			color: white;
			padding: 9px 25px;
			text-align: center;
			text-decoration: none;
			display: none;
			font-size: 14px;
			margin: 4px 2px;
			cursor: pointer;
			position: fixed;
			right: 10px;
			bottom: 10px;
		}
		
	</style>
</head>

<body>
		<div id="selection" class="options">
		<a id="box1" class="box" onclick="show1()">Prescription List</a>
		<br>
		<a id="box2" class="box" onclick="show2()">Use Patient ID</a>
		<br>
		<a id="box3" class="box" onclick="show3()">Use Prescription ID</a>

	</div>

	<form id="prelist" name="prelist" action="prescribelist.php" target="_blank" method="post">



		<label for="date">Click below to get last 10 prescriptions</label><br>

		<br>


		<button type="submit" style="background-color: limegreen;">Get list</button>
	</form>


	<form id="prepatient1" name="prepatient1" action="prescribe2.php" target="_blank" method="post">



		<label for="patientid">Patient ID</label><br>
		<input type="number" id="inputpid" placeholder="Patient id" name="patientid" required>
		<br>



		<button type="submit" name="showpre2" style="background-color: limegreen;">Show Prescription</button>
	</form>


	<form id="prepatient" name="prepatient" action="showprescribe1.php" target="_blank" method="post">



		<label for="preno">Prescription No</label><br>
		<input type="number" id="inputpreno" placeholder="priscription no." name="preno" required>
		<br>



		<button type="submit" name="showpre3" style="background-color: limegreen;">Show Prescription</button>
	</form>

	<a id="back" class="goback" onClick="location.reload()">&laquo;Go Back</a>
	<script>

					function show1() {

			document.getElementById( 'box1' ).style.position = 'fixed';
			document.getElementById( 'box1' ).style.left = '620px';
			document.getElementById( 'box1' ).style.top = '70px';
			document.getElementById( 'box1' ).style.borderTopLeftRadius = '25px';
			document.getElementById( 'box1' ).style.borderBottomRightRadius = '25px';
			document.getElementById( 'box1' ).style.backgroundColor = 'grey';
			document.getElementById( 'box1' ).style.color = 'black';
			document.getElementById( 'box2' ).style.display = 'none';
			document.getElementById( 'box3' ).style.display = 'none';
			document.getElementById( 'back' ).style.display = 'inline-block';
			document.getElementById( 'prelist' ).style.display = 'inline-block';

		}
				function show2() {

			document.getElementById( 'box2' ).style.position = 'fixed';
			document.getElementById( 'box2' ).style.left = '620px';
			document.getElementById( 'box2' ).style.top = '70px';
			document.getElementById( 'box2' ).style.borderTopLeftRadius = '25px';
			document.getElementById( 'box2' ).style.borderBottomRightRadius = '25px';
			document.getElementById( 'box2' ).style.backgroundColor = 'grey';
			document.getElementById( 'box2' ).style.color = 'black';
			document.getElementById( 'box1' ).style.display = 'none';
			document.getElementById( 'box3' ).style.display = 'none';
			document.getElementById( 'back' ).style.display = 'inline-block';
			document.getElementById( 'prepatient1' ).style.display = 'inline-block';

		}

				function show3() {

			document.getElementById( 'box3' ).style.position = 'fixed';
			document.getElementById( 'box3' ).style.left = '620px';
			document.getElementById( 'box3' ).style.top = '70px';
			document.getElementById( 'box3' ).style.borderTopLeftRadius = '25px';
			document.getElementById( 'box3' ).style.borderBottomRightRadius = '25px';
			document.getElementById( 'box3' ).style.backgroundColor = 'grey';
			document.getElementById( 'box3' ).style.color = 'black';
			document.getElementById( 'box1' ).style.display = 'none';
			document.getElementById( 'box2' ).style.display = 'none';
			document.getElementById( 'back' ).style.display = 'inline-block';
			document.getElementById( 'prepatient' ).style.display = 'inline-block';

		}

	</script>
</body>
</html>