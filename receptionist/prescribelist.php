<?php
include( 'session.php' );
?>
<!DOCTYPE html>
<html>
<head>

	<style>

		
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
				
		label {
			color: black;
			font-weight: bold;
			padding: 8px 4px;
			font-size: large;
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
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";
	$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}

	$result = mysqli_query($conn,"SELECT booking.pid,prescription.pre_id FROM booking,prescription WHERE prescription.app_id=booking.app_id ORDER BY pre_id DESC
  LIMIT 10");



		echo "<table>";
		echo "<tr><th>Patient ID</th><th>prescription ID</th></tr>";
	while ( $row = mysqli_fetch_array( $result ) ) { 

					echo "<tr><td>" . $row[ 'pid' ] . "</td><td> " . $row[ 'pre_id' ] . "</td></tr>";

	}

	mysqli_close( $conn );
	?>
</body>
</html>