<?php
include('dochome.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmanage";
$conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn)
{
    die('Connection Failed'.mysqli_error());
}
if(isset($_POST['register']))
{
$name=$_POST["name"];
$email=$_POST["email"];
$phno=$_POST["phno"];
$designation=$_POST["designation"];
$psw=$_POST["psw"];
$user_check_query = "SELECT * FROM user WHERE name='$name' OR email='$email' OR phno='$phno' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['name'] === $name) {
	echo "<script>
		alert('Username already exists');
   </script>";
    }

    elseif ($user['email'] === $email) {
     
				echo "<script>
		alert('Email already exists');
		</script>";
    }
	  
    elseif ($user['phno'] === $phno) {
    
		echo "<script>
		alert('Phone Number already exists');
   </script>";
    }
  }
  
	 else
	{
	if ($name != $psw) 
		{
		
		echo "<script>
		alert('password invalid');
   		</script>";
		}
	else
		{
		$sql="INSERT INTO user (name, email, phno, designation, password)
		VALUES
		('$name','$email','$phno','$designation','$psw')";
		if(mysqli_query($conn,$sql)){
			
		echo "<script>
		alert('Record Added Sucessfully');
   		</script>";
			
		}
		else
		{
		 echo "Error" . $sql . "<br/>" . $conn->error;
		}
		}
	 }
}
mysqli_close($conn);
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

form {
	position: absolute;
	bottom: 10px;
	right: 10px;
	width: 25%;
	height: 70%;
	
	
	}
label {
	color: darkturquoise;
	font-weight: bold;
	}

input[type=text], input[type=email], input[type=number], input[type=password]{
  width: 80%;
  padding: 10px 10px;
  margin: 4px 2px;
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
  margin: 4px 2px;
  cursor: pointer;
		
	}
	
	.reset {background-color: #f44336;}
	
	#side3{
		color: chartreuse;
		font-variant: small-caps;
		font-weight: bold;
	}
}
</style>
</head>
<body>
	
 <script>openNav();</script>
</div>
<form action="" method="post">

	<label for="designation">Designation</label><br><br>
	<input type="radio" name="designation" value="receptionist" required><label style="color: black;">Receptionist</label>
	<br>
	<input type="radio" name="designation" value="pharmacist" required><label style="color: black">Pharmacist</label>
	<br>	
	<br>
	<label for="name">Username</label><br>
    <input type="text" placeholder="Enter Username" name="name" required>
	<br>
	<label for="email">Email</label><br>
    <input type="email" placeholder="Enter Mail ID" name="email" required>
		<br>
	<label for="phno">Phone Number</label><br>
    <input type="number" placeholder="Enter Ph no." name="phno" required>
		<br>
    <label for="psw">Password</label>
	    <br>
    <input type="password" placeholder="Retype Username" name="psw" required>
        <br>
    <button type="submit" name="register">Register</button>
	<button type="reset" class="reset">Reset</button>
	  <br>
</form>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 

