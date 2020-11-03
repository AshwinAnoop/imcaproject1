<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id=$_POST["id"];
$username=$_POST["name"];


$sql = "DELETE FROM user WHERE id='$id' AND name='$username'";


	if (mysqli_query($conn, $sql)) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}


mysqli_close($conn);
?>