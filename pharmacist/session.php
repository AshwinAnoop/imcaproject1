
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$conn = new mysqli($servername, $username, $password, $dbname);


session_start();

$user_check=$_SESSION['login_user'];

$result=mysqli_query($conn,"select name from user where name='$user_check'");
$row = mysqli_fetch_assoc($result);
$login_session =$row['name'];
if(!isset($login_session)){
echo "<script>
		alert('access denied');
   </script>";
mysqli_close($conn);

header('Location: phalogin.php'); 
}
?>

