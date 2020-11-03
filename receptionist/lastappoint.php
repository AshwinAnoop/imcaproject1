<?php
include('session.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
	

$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}

$app_id = $_SESSION['lastid'];

$result = mysqli_query($conn,"SELECT * FROM booking WHERE app_id='$app_id'");
$row = mysqli_fetch_array($result);
	
 echo "<table>";
 echo "<tr><th>Appointment ID</th><td>". $row['app_id'] . "</td></tr><tr><th>Patient ID</th><td>" . $row['pid'] .  "</td></tr><tr><th>Booking On</th><td>" . $row['bookdate'] ."</td></tr><tr><th>Time of booking</th><td>" . $row['time'] ."</td></tr>"; 
 
 echo "</table>";

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>

<style>
table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  /*width: 100%;*/
}
td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

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


	
</body>
</html>