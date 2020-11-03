<?php
include( 'dochome.php' );
if (isset($_POST['showrep'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";
	$pid = $_POST["ppid"];
		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$sql = "SELECT * FROM report WHERE filename LIKE '$pid%'";
		if ( mysqli_query( $conn, $sql ) ) {
		$result = mysqli_query( $conn, $sql );
		$count = mysqli_num_rows( $result );
		if ( $count == 0 ) {
			echo '<script>';
			echo 'alert("No search result found try another ID.");';
			echo '</script>';

		} 
			 else {
			echo "<table class='paleBlueRows'>
<thead>
<tr>
<th>Filename</th>
<th>App. ID</th>
<th>View</th>

</tr>
</thead>
<tbody>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				$appid = $row[ 'app_id' ];
				$filename = $row[ 'filename' ];
				

				echo "
<tr>
<td>$filename</td>
<td>$appid</td>
<td><form method='post' action='openreport.php' target='_blank'><button type='submit' name='showrep' value='$filename' style='padding: 4px; margin: 0px; background-color: black;'>Open file</button></form></td>

</tr>";
			}
			echo "</tbody>
</table>";
		}

	mysqli_close( $conn );
		}
}
?>
<!doctype html>
<html>
<head>
	
<meta charset="utf-8">
			<style>
		#nav4 {
			background-color: inherit;
			color: black;
			border-top-style: solid;
			border-left-style: solid;
			border-right-style: solid;
			border-color: red;
		}
		
		#nav1,
		#nav5,
		#nav3,
		#nav2 {
			border-bottom: solid;
			border-bottom-color: red;
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
						.form1 {
			position: absolute;
			bottom: 10px;
			right: 10px;
			width: 25%;
			height: 70%;
	
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
						input {
			width: 80%;
			padding: 10px 10px;
			margin: 4px 2px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}	
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
				table.paleBlueRows {
  font-family: "Times New Roman", Times, serif;
  border: 1px solid #FFFFFF;
  width: 500px;
 
  text-align: center;
  border-collapse: collapse;
					position: absolute;
					margin-left: 150px;
					margin-top: 100px;
					background-color: white;
}
table.paleBlueRows td, table.paleBlueRows th {
  border: 1px solid #FFFFFF;
  padding: 3px 2px;
}
table.paleBlueRows tbody td {
  font-size: 13px;
}
table.paleBlueRows tr:nth-child(even) {
  background: #D0E4F5;
}
table.paleBlueRows thead {
  background: #0B6FA4;
  border-bottom: 5px solid #FFFFFF;
}
table.paleBlueRows thead th {
  font-size: 17px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #FFFFFF;
}
table.paleBlueRows thead th:first-child {
  border-left: none;
}

table.paleBlueRows tfoot td {
  font-size: 14px;
}
	</style>
<title>Untitled Document</title>
</head>

<body>
	<form class="form1" id="addfile" name="addfile" enctype="multipart/form-data" action="" method="post">
		<label>Patient ID :</label><br>
		<input type="number" id="ppid" placeholder="Enter ID" name="ppid" value="<?php echo isset($_POST['ppid']) ? $_POST['ppid'] : '' ?>" required ><br>
		<button type="submit" name="showrep" style="background-color: limegreen">Show</button>

		</form>
	<a id="back" class="goback" onClick="document.location.href='reports.php'">&laquo;Go Back</a>
	
</body>
</html>