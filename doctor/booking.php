<?php
include( 'dochome.php' );

?>
<!doctype html>
<html>
<head>

	<style>
		#nav2 {
			background-color: inherit;
			color: black;
			border-top-style: solid;
			border-left-style: solid;
			border-right-style: solid;
			border-color: red;
		}
		
		#nav1,
		#nav3,
		#nav4,
		#nav5 {
			border-bottom: solid;
			border-bottom-color: red;
		}
		#tableview{
			
			position: fixed;
			left: 280px;
			top: 120px;
			background-color: lightblue;
			height: 400px;
			width: 630px;
		}
				.refresh {
			background-color: tomato;
			border: none;
			color: white;
			padding: 9px 25px;
			text-align: center;
			text-decoration: none;
			
			font-size: 14px;
			margin: 4px 2px;
			cursor: pointer;
			position: fixed;
			right: 10px;
			bottom: 10px;
		}
		.div1 {
			position: absolute;
			bottom: 10px;
			right: 10px;
			width: 25%;
			height: 70%;
	
		}
		label {
			color: black;
			font-weight: bold;
		}	
		.label1 {
			color: red;
			padding: 5px;
			background-color: black;
			font-size: large;
			
		}	
	</style>
</head>

<body>
	<iframe id="tableview" src="bookingtable.php" height="200" width="300"></iframe>
		<div class="div1">	
	<label>Current patient</label><br><br>
	<label class="label1" ><?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";

	$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$result = mysqli_query( $conn, "SELECT pid,pname FROM currentpatient WHERE num=1" );
	$row = mysqli_fetch_assoc( $result);
		echo $row["pid"]." - ".$row["pname"] ;
			mysqli_close( $conn );
		?></label><br>
			</div>

		<a class="refresh" onClick="location.reload(true)">&infin; Refresh Page</a>
	

</body>
</html>