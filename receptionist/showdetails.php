<!DOCTYPE html>
<html>
<head>
<title>...</title>
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

<?php
include('session.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
	
$getname=$_SESSION['login_user'];
$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}
$result = mysqli_query($conn,"SELECT * FROM user WHERE name='$getname'");
$row = mysqli_fetch_array($result);
	
 echo "<table>";
 echo "<tr><th>My ID</th><td>". $row['id'] . "</td></tr><tr><th>Name/Username</th><td>" . $row['name'] . "</td></tr><tr><th>E-Mail</th><td>" . $row['email'] . "</td></tr><tr><th>Phone No.</th><td>" . $row['phno'] . "</td></tr>"; 
 
 echo "</table>";

mysqli_close($conn);
?>
	
</body>
</html>