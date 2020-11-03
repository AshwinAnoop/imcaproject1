<?php
include( 'session.php' );
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>

	<style>
		table.bluedesign {
			border: 4px solid #555555;
			background-color: #555555;
			width: 600px;
			text-align: center;
			border-collapse: collapse;
		}
		
		table.bluedesign td,
		table.bluedesign th {
			border: 1px solid #555555;
			padding: 5px 10px;
		}
		
		table.bluedesign tbody td {
			font-size: 15px;
			font-weight: bold;
			color: #FFFFFF;
		}
		
		table.bluedesign tr:nth-child(even) {
			background: #398AA4;
		}
		
		table.bluedesign thead {
			background: #398AA4;
			border-bottom: 10px solid #398AA4;
		}
		
		table.bluedesign thead th {
			font-size: 18px;
			font-weight: bold;
			color: #FFFFFF;
			text-align: left;
			border-left: 2px solid #398AA4;
		}
		
		table.bluedesign thead th:first-child {
			border-left: none;
		}
		
		table.bluedesign tfoot td {
			font-size: 13px;
		}
		
		table.bluedesign tfoot .links {
			text-align: right;
		}
		
		table.bluedesign tfoot .links a {
			display: inline-block;
			background: #FFFFFF;
			color: #398AA4;
			padding: 2px 8px;
			border-radius: 5px;
		}
	</style>
</head>

<body>

	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";
	$bookdate = date("Y-m-d");
	$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$result = mysqli_query( $conn, "SELECT booking.app_id, booking.pid, booking.status, patientinfo.pname FROM booking,patientinfo  WHERE bookdate='$bookdate' AND booking.pid=patientinfo.pid" );
		$checkid = mysqli_num_rows ( $result );
		$i = 1;
		if( $checkid>0 ){
			
		echo "<table class='bluedesign'>";
		echo "<tr><th>Token id</th><th>Appointment ID</th><th>Patient ID</th><th>Patient name</th><th>Status</th></tr>";
	while ( $row = mysqli_fetch_array( $result ) ) {
			if($row[ 'status'] == 0)
			{
				$status="open";
			}
		else{
			$status="completed";
		}
			echo "<tr><td>" . $i. "</td><td>" . $row[ 'app_id' ] . "</td><td> " . $row[ 'pid' ] . "</td><td> " . $row[ 'pname' ] . "</td><td> " . $status . "</td></tr>";
		$i=$i+1;
	
		}
		echo "</table>";

	} else {
		echo '<script>';
		echo 'alert("no data found");';
		echo '</script>';
	}

	mysqli_close( $conn );
	?>
</body>
</html>