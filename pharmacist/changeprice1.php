<?php
include('session.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysqli_error());
}

$newprice=$_POST['price'];
$medicine=$_POST["medicine"];



 mysqli_query($conn,"UPDATE medicine SET price='$newprice' WHERE med='$medicine'");
 echo "<script>
	 alert('Price Updated');
 	 window.history.back();
	</script>";


mysqli_close($conn);
?>

