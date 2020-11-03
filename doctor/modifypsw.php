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

$username=$_POST["name"];
$oldpassword=$_POST["oldpassword"];
$newpassword=$_POST["newpassword"];

$sql="SELECT password FROM user where password='$oldpassword' && name='$username'";

$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
if($result>0)
{
 mysqli_query($conn,"UPDATE user set password=' $newpassword' where name='$username'");
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

?>

