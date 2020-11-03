<?php
include( 'expirycheck.php' );
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}

if(isset($_POST['submit']))
{
$name = $_POST['name'];
$password = $_POST['psw'];
$designation="pharmacist";


$sql="SELECT id,name, password, designation FROM user WHERE name = '$name'";
$result = mysqli_query($conn,$sql)or die( mysqli_error($conn));

$row = mysqli_fetch_array($result);

if($row["designation"] == $designation){
	if($row["name"]==$name && $row["password"]==$password)
	{
	$_SESSION['login_user']=$name;
	$_SESSION['login_id']=$row["id"];
	header("location:phahome.php");
	} 
	else{ 

		echo "<script>
					alert('Wrong Credentials!');

			  </script>";
		}
  }
	else{ 

		echo "<script>
					alert('You need to be a pharmacist!');

			  </script>";
		}
}
mysqli_close($conn);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	body {
	font-family: "Lato", sans-serif;
	background-image: url(img1.jpg);
	background-size: cover
	}
	form {
	position: absolute;
	bottom: 10px;
	right: 10px;
	width: 25%;
	height: 40%;
	background-color: #403D3D;
	
	}
	
	img.avatar {
	  width: 100%;
  		
	}
	input[type=text], input[type=password] {
  width: 80%;
  padding: 10px 10px;
  margin: 5px 15px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
	}
	button{
  background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 9px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 3px 15px;
  cursor: pointer;
		
	}
	
	.goback {background-color: #f44336;}

</style>
</head>

<body>
	<div style="position: absolute; right: 10px; width: 25%;height: 60%; background-color: #000000">
    <img src="../images/phaavatar.jpg" alt="PharmacyAvatar" class="avatar" align="right">
    <p style="color: aqua; text-align: center;position: relative;  "><font size="4"><strong>Pharmacist</strong> Login</font></p>
	</div>
	<form action="" method="post">
  


    <label for="name"><font color="#FFFFFF"><strong>Username</strong></font></label><br>
    <input type="text" placeholder="Enter Username" name="name" required>
	<br>
    <label for="psw"><font color="#FFFFFF"><b>Password</b></font></label>
	  <br>
    <input type="password" placeholder="Enter Password" name="psw" required>
        <br>
    <button type="submit" name="submit">Login</button>
	  <br>
    <label>
      <input type="checkbox" checked="checked" name="remember"><font color="#FFFFFF"> Remember me</font>
    </label>


  <div style="background-color:#403D3D">
    <button type="button" class="goback" onClick="window.location.href='../index.html'">&laquo; Go back</button>
	 
  </div>
</form>

</body>
</html>
