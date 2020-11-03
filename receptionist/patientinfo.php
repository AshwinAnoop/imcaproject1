<?php
include( 'rechome.php' );
if ( isset( $_POST[ 'getinfo' ] ) ) {
	$idid = $_POST[ 'idid' ];
	$_SESSION[ 'idid' ] = $idid;


}

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
		
		.showwindow {
			position: fixed;
			right: 100px;
			top: 150px;
			display: none;
		}
	</style>
</head>

<body>
	<script>
		openNav();
	</script>
	<div id="selection" class="options">
		<a id="box1" class="box" onclick="show1()">Get Info By ID</a>
		<br>
		<a id="box2" class="box" onclick="show2()">Search Name</a>
		<br>
		<a id="box3" class="box" onclick="show3()">Search Ph no.</a>

		
	</div>
	<form id="idinfo" name="idinfo" action="" method="post">



		<label for="idid">Patient ID</label><br>
		<input type="text" placeholder="Enter Id" name="idid" required >
		<br>


		<button type="submit" name="getinfo" onClick="openframe()" style="background-color: limegreen;">Get Info</button>
	</form>
		<form id="nameinfo" name="nameinfo" action="namesearch.php" target="_blank" method="post">



		<label for="pname">Patient Name</label><br>
		<input type="text" placeholder="Search Name" name="pname" required >
		<br>


		<button type="submit" name="searchname" style="background-color: limegreen;">Search</button>
	</form>
		<form id="numinfo" name="numinfo" action="numsearch.php" target="_blank" method="post">



		<label for="pnumber">Patient Phone No.</label><br>
		<input type="number" placeholder="Search PH no." name="pnumber" required >
		<br>


		<button type="submit" name="searchnum" style="background-color: limegreen;">Search</button>
	</form>
	<div id="iframe" class="showwindow">
		<iframe src="idinfo.php" width="500px" height="380px" style="background-color: lightblue" ;></iframe>
	</div>
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
			document.getElementById( 'idinfo' ).style.display = 'inline-block';

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
			document.getElementById( 'nameinfo' ).style.display = 'inline-block';

		}
		function show3() {
			document.getElementById( 'box3' ).style.position = 'fixed';
			document.getElementById( 'box3' ).style.left = '620px';
			document.getElementById( 'box3' ).style.top = '70px';
			document.getElementById( 'box3' ).style.borderTopLeftRadius = '25px';
			document.getElementById( 'box3' ).style.borderBottomRightRadius = '25px';
			document.getElementById( 'box3' ).style.backgroundColor = 'grey';
			document.getElementById( 'box3' ).style.color = 'black';
			document.getElementById( 'box2' ).style.display = 'none';
			document.getElementById( 'box1' ).style.display = 'none';
			document.getElementById( 'back' ).style.display = 'inline-block';
			document.getElementById( 'numinfo' ).style.display = 'inline-block';

		}
		function openframe() {
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
			document.getElementById( 'idinfo' ).style.display = 'none';
			document.getElementById( 'iframe' ).style.display = 'inline-block';
			
			

		}
	</script>
</body>
</html>