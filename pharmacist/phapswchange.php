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
$oldpassword=$_POST["oldpassword"];
$newpassword=$_POST["newpassword"];


$sql="SELECT name,password FROM user where name='$loginname'";

$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);


if($row["password"]==$oldpassword)
{
 mysqli_query($conn,"UPDATE user SET password='$newpassword' WHERE name='$loginname'");
 echo "<script>
	 alert('Password updated Sucessfully....');
 	 window.history.back();
	</script>";
}
else{
	echo "<script>
	alert('Old Password and Username shows no match!!!');
	window.history.back();
	</script>";
}


mysqli_close($conn);
?>

