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
	$bookdate = date("Y-m-d");
	$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$result = mysqli_query( $conn, "SELECT * FROM booking WHERE bookdate='$bookdate'" );
	$checkid = mysqli_num_rows ( $result );
	
		if( $checkid>0 ){
			$totalpt=0;
			$totalamt=0;
		echo "<table>";
		echo "<tr><th>Appointment ID</th><th>Patient ID</th><th>Payment Date</th><th>amount paid</th></tr>";
	while ( $row = mysqli_fetch_array( $result ) ) {
		$totalpt++;
		$amt=$row[ 'billamt' ];
		$totalamt=$totalamt+$amt;
			echo "<tr><td>" . $row[ 'app_id' ] . "</td><td> " . $row[ 'pid' ] . "</td><td> " . $row[ 'bookdate' ] . "</td><td>" . $row[ 'billamt' ] . "</td></tr>";
		}
		echo "</table>";
			echo '<br><label>DATE : </label>';
			echo '<label class="label1">'.date('l d/m/Y').'</label>';
			echo '<br><br><label>Total no of patients : </label>';
			echo '<label class="label1">'.$totalpt.'</label>';

			echo '<br><br><label>Total biling amount : </label>';
			echo '<label class="label1">'.$totalamt.'</label>';
		

	} else {
		echo '<script>';
		echo 'alert("no data found");';
		echo '</script>';
	}

	mysqli_close( $conn );
	?>
	

</body>
</html>