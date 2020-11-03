<?php
include( 'dochome.php' );


?>



<!doctype html>
<html>
<head>
	<style>
		#nav3 {
			background-color: inherit;
			color: black;
			border-top-style: solid;
			border-left-style: solid;
			border-right-style: solid;
			border-color: red;
		}
		
		#nav1,
		#nav5,
		#nav4,
		#nav2 {
			border-bottom: solid;
			border-bottom-color: red;
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
	<meta charset="utf-8">
	<title>Untitled Document</title>
</head>

<body>

	<div id="selection" class="options">
		<a id="box1" class="box" onclick="show1()">Show priscribed</a>
		<br>
		<a id="box2" class="box" onclick="openInNewTab('prescribe3.php');">Priscribe for current</a>
		<br>
		<a id="box3" class="box" onclick="show3()">Priscribe for others</a>


	</div>

	<form id="prepatient" name="prepatient" action="prescribe1.php" target="_blank" method="post">



		<label for="appno">Appointment No</label><br>
		<input type="number" id="inputappno" placeholder="Appointment no." name="appno" required>
		<br>


		<!--		<button type="submit" name="verifyid" style="background-color: red;">Verify</button>
-->
		<button type="submit" name="addpre" style="background-color: limegreen;">Add</button>
	</form>
	
	<form id="shwpatient" name="shwpatient" action="showprescribe.php" target="_blank" method="post">



		<label for="preno">Prescription No</label><br>
		<input type="number" id="inputpreno" placeholder="Prescription no." name="preno" required>
		<br>


		<!--		<button type="submit" name="verifyid" style="background-color: red;">Verify</button>
-->
		<button type="submit" name="shwpre" style="background-color: limegreen;">Show</button>
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
			document.getElementById( 'box3' ).style.display = 'none';
			document.getElementById( 'box2' ).style.display = 'none';
			document.getElementById( 'back' ).style.display = 'inline-block';
			document.getElementById( 'shwpatient' ).style.display = 'inline-block';

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

		function openInNewTab( url ) {
			var win = window.open( url, '_blank' );
			win.focus();
		}
	</script>
</body>
</html>