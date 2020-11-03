<?php
include( 'session.php' );
?>
<!DOCTYPE html>
<html>
<head>

	<style>
		.goback {
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
		
		table {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}
		
		td,
		th {
			border: 1px solid #ddd;
			padding: 8px;
		}
		
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		
		tr:hover {
			background-color: #ddd;
		}
		
		th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: dimgray;
			color: white;
		}
	</style>
</head>

<body>

	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";
	$bookdate = $_POST[ 'date' ];
	$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$result = mysqli_query( $conn, "SELECT * FROM booking WHERE bookdate='$bookdate'" );
	$checkid = mysqli_num_rows ( $result );
	
		if( $checkid>0 ){
			
		echo "<table>";
		echo "<tr><th>Appointment ID</th><th>Patient ID</th><th>Payment Date</th><th>amount paid</th></tr>";
	while ( $row = mysqli_fetch_array( $result ) ) {
			echo "<tr><td>" . $row[ 'app_id' ] . "</td><td> " . $row[ 'pid' ] . "</td><td> " . $row[ 'bookdate' ] . "</td><td>" . $row[ 'billamt' ] . "</td></tr>";
		}
		echo "</table>";

	} else {
		echo '<script>';
		echo 'alert("no data found");';
		echo '</script>';
	}

	mysqli_close( $conn );
	?>
	<a id="back" class="goback" onClick="history.go(-1)">&laquo;Go Back</a>
</body>
</html>