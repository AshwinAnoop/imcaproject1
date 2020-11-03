<?php
include('session.php');
?>
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}
$result = mysqli_query($conn,"SELECT * FROM user");
 echo "<table>";
 echo "<tr><th>ID</th><th>NAME</th><th>E-MAIL</th><th>PH NO.</th></tr>"; 
 while($row = mysqli_fetch_array($result))
          {
          echo "<tr><td>" . $row['id'] . "</td><td> " . $row['name'] . "</td><td>" . $row['email'] . "</td><td> " . $row['phno'] . "</td></tr>"; 
          }
 echo "</table>";

mysqli_close($conn);
?>
	
</body>
</html>