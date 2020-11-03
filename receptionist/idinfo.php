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
//if ($_SERVER['REQUEST_METHOD'] === 'POST')
//{
$id = $_SESSION['idid'];
//$id = $_POST['idid'];

$result = mysqli_query($conn,"SELECT * FROM patientinfo WHERE pid='$id'");
$row = mysqli_fetch_array($result);
	
 echo "<table>";
 echo "<tr><th>ID</th><td>". $row['pid'] . "</td></tr><tr><th>Name</th><td>" . $row['pname'] .  "</td></tr><tr><th>Gender</th><td>" . $row['pgender'] .  "</td></tr><tr><th>DOB</th><td>" . $row['pdob'] .  "</td></tr><tr><th>Address</th><td>" . $row['paddress'] .  "</td></tr><tr><th>Locality</th><td>" . $row['pplace'] . "</td></tr><tr><th>E-Mail</th><td>" . $row['pemail'] . "</td></tr><tr><th>Phone No.</th><td>" . $row['pphno'] . "</td></tr>"; 
 
 echo "</table>";
//}
unset($_SESSION['idid']);
mysqli_close($conn);
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