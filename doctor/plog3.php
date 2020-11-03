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
	$bookdate = $_POST["monthselect"];
	$year = substr($bookdate, 0, 4);
	$month = substr($bookdate, 5);
	$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	//$result = mysqli_query( $conn, "SELECT MAX('medbill_id AS idmax'), MIN('medbill_id AS idmin') FROM medbill WHERE medbill_date='$bookdate'" );
	$idmin = 0;
	$result = mysqli_query( $conn, "SELECT MAX(medbill_id) FROM medbill WHERE YEAR(medbill_date) = '$year' AND MONTH(medbill_date) = '$month'" );
	
	$idmax = $result->fetch_array()[0] ;
	$result = mysqli_query( $conn, "SELECT MIN(medbill_id) FROM medbill WHERE YEAR(medbill_date) = '$year' AND MONTH(medbill_date) = '$month'" );
	$idmin = $result->fetch_array()[0] ;

	
		if( $idmin > 0 ){

	$totalamt = 0;
	$result = mysqli_query( $conn, "SELECT med_id,medicine, SUM(required_qty) AS sumqty, SUM(amount) AS sumamt FROM billingdata WHERE medbill_id >= '$idmin' AND medbill_id <= '$idmax' GROUP BY med_id" );
		echo "<table>";
		echo "<tr><th>Medicine</th><th>Quantity</th><th>Total Price</th></tr>";
	while ( $row = mysqli_fetch_array( $result ) ) {
		$amt=$row[ 'sumamt' ];
		$totalamt=$totalamt+$amt;
			echo "<tr><td>" . $row[ 'medicine' ] . "</td><td> " . $row[ 'sumqty' ] . "</td><td> " . $row[ 'sumamt' ] . "</td></tr>";
		}
		echo "</table>";
			echo '<br><label>DATE : </label>';
			echo '<label class="label1">'.date('l d/m/Y').'</label>';


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