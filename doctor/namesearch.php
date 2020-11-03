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
			width: 800px;
			text-align: center;
			border-collapse: collapse;
		}
		
		table.bluedesign td,
		table.bluedesign th {
			border: 1px solid #555555;
			padding: 5px 10px;
		}
		
		table.bluedesign tbody td {
			font-size: 17px;
			font-weight: bold;
			color: #FFFFFF;
		}
		
		table.bluedesign td:nth-child(even) {
			background: #398AA4;
		}
		
		table.bluedesign thead {
			background: #398AA4;
			border-bottom: 10px solid #398AA4;
		}
		
		table.bluedesign thead th {
			font-size: 20px;
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


	$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}

	$searchname = $_POST[ 'pname' ];
	$searchname = preg_replace( "#[^a-z]#i", "", $searchname );




	$sql = "SELECT * FROM patientinfo WHERE pname LIKE '%$searchname%'";
	if ( mysqli_query( $conn, $sql ) ) {
		$result = mysqli_query( $conn, $sql );
		$count = mysqli_num_rows( $result );
		if ( $count == 0 ) {
			echo '<script>';
			echo 'alert("No search result found try another Name.");';
			echo '</script>';

		} else {
			echo "<table class='bluedesign'>
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Phno</th>

</tr>
</thead>
<tbody>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				$id = $row[ 'pid' ];
				$name = $row[ 'pname' ];
				$phno = $row[ 'pphno' ];

				echo "
<tr>
<td>$id</td>
<td>$name</td>
<td>$phno</td>

</tr>";
			}
			echo "</tbody>
</table>";
		}

	} else {
		echo "Error" . $sql . "<br/>" . $conn->error;
	}

	?>

</body>
</html>