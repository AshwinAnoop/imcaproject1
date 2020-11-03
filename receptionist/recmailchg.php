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
$oldemail=$_POST["oldemail"];
$newemail=$_POST["newemail"];


$sql="SELECT name,email FROM user where name='$loginname'";

$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);


if($row["email"]==$oldemail)
{
 mysqli_query($conn,"UPDATE user SET email='$newemail' WHERE name='$loginname'");
 echo "<script>
	 alert('Email updated Sucessfully....');
 	 window.history.back();
	</script>";
}
else{
	echo "<script>
	alert('Old Email and Username shows no match!!!');
	window.history.back();
	</script>";
}


mysqli_close($conn);
?>

