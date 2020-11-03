<?php
include( 'phahome.php' );

if (isset($_POST['showstock'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";

		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$sql = "SELECT * FROM medicine ORDER BY quantity ASC";
		if ( mysqli_query( $conn, $sql ) ) {
		$result = mysqli_query( $conn, $sql );
		$count = mysqli_num_rows( $result );
		if ( $count == 0 ) {
			echo '<script>';
			echo 'alert("No search result found");';
			echo '</script>';

		} 
			 else {
			echo "<table class='paleBlueRows'>
<thead>
<tr>
<th>medicine</th>
<th>Stock(Qty)</th>
<th>Price</th>
<th>Expiry</th>

</tr>
</thead>
<tbody>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				$med = $row[ 'med' ];
				$qty = $row[ 'quantity' ];
				$price = $row[ 'price' ];
				$exp = $row[ 'expiry' ];

				echo "
<tr>
<td>$med</td>
<td>$qty</td>
<td>$price</td>
<td>$exp</td>

</tr>";
			}
			echo "</tbody>
</table>";
		}

	mysqli_close( $conn );
		}
}
if (isset($_POST['showstockexp'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";

		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$sql = "SELECT * FROM medicine ORDER BY expiry ASC";
		if ( mysqli_query( $conn, $sql ) ) {
		$result = mysqli_query( $conn, $sql );
		$count = mysqli_num_rows( $result );
		if ( $count == 0 ) {
			echo '<script>';
			echo 'alert("No search result found");';
			echo '</script>';

		} 
			 else {
			echo "<table class='paleBlueRows'>
<thead>
<tr>
<th>medicine</th>
<th>Stock(Qty)</th>
<th>Price</th>
<th>Expiry</th>

</tr>
</thead>
<tbody>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				$med = $row[ 'med' ];
				$qty = $row[ 'quantity' ];
				$price = $row[ 'price' ];
				$exp = $row[ 'expiry' ];

				

				echo "
<tr>
<td>$med</td>
<td>$qty</td>
<td>$price</td>
<td>$exp</td>
</tr>";
			}
			echo "</tbody>
</table>";
		}

	mysqli_close( $conn );
		}
}
if (isset($_POST['medstock'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";
	$medicine = $_POST['medicine'];

		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$sql = "SELECT * FROM medbatch WHERE med_id = '$medicine' AND stockstatus = '0' ORDER BY expiry ASC";
		if ( mysqli_query( $conn, $sql ) ) {
		$result = mysqli_query( $conn, $sql );
		$count = mysqli_num_rows( $result );
		if ( $count == 0 ) {
			echo '<script>';
			echo 'alert("No search result found");';
			echo '</script>';

		} 
			 else {
			echo "<table class='paleBlueRows'>
<thead>
<tr>
<th>Stock(Qty)</th>

<th>Expiry</th>

</tr>
</thead>
<tbody>";
			while ( $row = mysqli_fetch_array( $result ) ) {
			
				$qty = $row[ 'bundle_qty' ];
				
				$exp = $row[ 'expiry' ];

				echo "
<tr>
<td>$qty</td>
<td>$exp</td>

</tr>";
			}
			echo "</tbody>
</table>";
		}

	mysqli_close( $conn );
		}
}

if (isset($_POST['showexpstock'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";
	

		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}
	$sql = "SELECT medbatch.med_id, medicine.med, medbatch.bundle_qty, medbatch.expiry FROM medbatch, medicine WHERE medbatch.med_id = medicine.med_id AND medbatch.stockstatus = '1' ORDER BY medbatch.expiry DESC";
		if ( mysqli_query( $conn, $sql ) ) {
		$result = mysqli_query( $conn, $sql );
		$count = mysqli_num_rows( $result );
		if ( $count == 0 ) {
			echo '<script>';
			echo 'alert("No search result found");';
			echo '</script>';

		} 
			 else {
			echo "<table class='paleBlueRows'>
<thead>
<tr>
<th>Medicine</th>
<th>Stock(Qty)</th>

<th>Expiry</th>

</tr>
</thead>
<tbody>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				$med = $row[ 'med' ];
				$qty = $row[ 'bundle_qty' ];
				
				$exp = $row[ 'expiry' ];

				echo "
<tr>
<td>$med</td>
<td>$qty</td>
<td>$exp</td>

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
		#nav5 {
			background-color: inherit;
			color: black;
			border-top-style: solid;
			border-left-style: solid;
			border-right-style: solid;
			border-color: red;
		}
		
		#nav1,
		#nav2,
		#nav3,
		#nav4 {
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
			display: none;
	
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
		
				.options {
			position: absolute;
			bottom: 10px;
			right: 0px;
			width: 25%;
			height: 50%;
		}
					select {
			width: 45%;
			padding: 5px 5px;
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
			display: none;
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
		<div id="selection" class="options">
		<a id="box1" class="box" onclick="show1()">All stock</a>
		<br>
		<a id="box2" class="box" onclick="show2()">Specific Stock</a>
		<br>
		<a id="box3" class="box" onclick="show3()">Expired Stock</a>

	</div>
	<form class="form1" id="stockdetails" name="stockdetails" enctype="multipart/form-data" action="" method="post">

		<button type="submit" name="showstock" style="background-color: limegreen">Filter By Stock</button>


		<button type="submit" name="showstockexp" style="background-color: limegreen">Filter By Expiry</button>

		</form>

		<form class="form1" id="specificstock" name="specificstock" enctype="multipart/form-data" action="" method="post">

		Medicine: <select name='medicine' id='selectboxid'><?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";


$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}

$sql = "SELECT * FROM medicine ORDER BY med";
$result = mysqli_query($conn,$sql);


while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['med_id'] . "'>" . $row['med'] ."</option>";
}
?></select> 	

		<button type="submit" name="medstock" style="background-color: limegreen">Get Batch Info</button>


		</form>


<form class="form1" id="expstock" name="expstock" enctype="multipart/form-data" action="" method="post">

		<button type="submit" name="showexpstock" style="background-color: limegreen">Show Expired Medicines</button>


		</form>


	<a id="back" class="goback" onClick="document.location.href='stock.php'">&laquo;Go Back</a>
	<script type="text/javascript">
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
			document.getElementById( 'stockdetails' ).style.display = 'inline-block';

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
			document.getElementById( 'specificstock' ).style.display = 'inline-block';
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
			document.getElementById( 'expstock' ).style.display = 'inline-block';
		}
	</script>
</body>
</html>