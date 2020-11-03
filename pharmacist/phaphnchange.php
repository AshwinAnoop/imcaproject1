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

$loginname=$_SESSION['login_user'];
$oldphno=$_POST["oldphno"];
$newphno=$_POST["newphno"];


$sql="SELECT name,phno FROM user where name='$loginname'";

$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);


if($row["phno"]==$oldphno)
{
 mysqli_query($conn,"UPDATE user SET phno='$newphno' WHERE name='$loginname'");
 echo "<script>
	 alert('Phone no. updated Sucessfully....');
 	 window.history.back();
	</script>";
}
else{
	echo "<script>
	alert('Old Phone no. and Username shows no match!!!');
	window.history.back();
	</script>";
}


mysqli_close($conn);
?>

