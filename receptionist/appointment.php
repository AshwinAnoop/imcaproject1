<?php
include( 'rechome.php' );

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$conn = new mysqli( $servername, $username, $password, $dbname );
if ( !$conn ) {
	die( 'Connection Failed' . mysqli_error() );
}

if ( isset( $_POST[ 'checkrecord' ] ) ) {
	$idid = $_POST[ "idid" ];
	$bookdate = $_POST[ "bookdate" ];
	$_SESSION[ 'idid' ] = $idid;
	$_SESSION[ 'bookdate' ] = $bookdate;

	$id_check_query = "SELECT * FROM booking WHERE pid='$idid' AND ( bookdate >= (SELECT DATE_SUB('$bookdate', INTERVAL 15 DAY))) AND billamt<>0";
	$result = mysqli_query( $conn, $id_check_query );
	$checkid = mysqli_fetch_assoc( $result );
	if ( $checkid ) { // if record exists
		$_SESSION[ 'bookamt' ] = "0";
		header( "Location:gettoken.php" );


	} else {
		$_SESSION[ 'bookamt' ] = "300";
		header( "Location:gettoken.php" );

	}

}


mysqli_close( $conn );
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
		#nav2,
		#nav4,
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
		
		.showwindow {
			position: fixed;
			right: 100px;
			top: 150px;
			display: none;
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
	</style>
</head>

<body>

	<div id="selection" class="options">
		<a id="box1" class="box" onclick="show1()">Get token</a>
		<br>
		<a id="box2" class="box" onclick="show2()">Daywise list</a>
		<br>
		<a id="box3" class="box" onclick="show3()">Last Booking</a>
		<br>

	</div>
	<div id="iframe2" class="showwindow">
		<iframe src="lastappoint.php" width="400px" height="230px" style="background-color: lightblue"></iframe>
	</div>
	<form id="tokenform" name="tokenform" action="" method="post">



		<label for="idid">Patient ID</label><br>
		<input type="number" placeholder="Enter Id" name="idid" required>
		<br>
		<label for="bookdate">Appointment Date</label><br>
		<input type="date" name="bookdate" required>
		<br>


		<button type="submit" name="checkrecord" style="background-color: limegreen;">Suggest Booking Amount</button>
	</form>
	<form id="tokenlist" name="tokenlist" action="daywiselist.php" method="post">



		<label for="date">Select Date</label><br>
		<input type="date" name="date" required>
		<br>


		<button type="submit" style="background-color: limegreen;">Get list</button>
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
			document.getElementById( 'tokenform' ).style.display = 'inline-block';


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
			document.getElementById( 'tokenlist' ).style.display = 'inline-block';

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
			document.getElementById( 'iframe2' ).style.display = 'inline-block';

		}
	</script>
</body>
</html>