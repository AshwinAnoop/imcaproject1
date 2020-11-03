<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysqli_error());
}

 mysqli_query($conn,"UPDATE medbatch SET stockstatus='1' WHERE CURDATE()>expiry ");



mysqli_close($conn);
?>
