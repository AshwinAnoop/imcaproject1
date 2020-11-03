<?php
include('rechome.php');
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
$name=$_POST["pname"];
$email=$_POST["pemail"];
$phno=$_POST["pphno"];
$gender=$_POST["gender"];
$dob=$_POST["pdob"];
$address=$_POST["paddr"];
$place=$_POST["pplace"];
	
$name_check_query = "SELECT * FROM patientinfo WHERE pname='$name' AND pphno='$phno' AND pdob='$dob' LIMIT 1";
$result = mysqli_query($conn,$name_check_query);
$checkname = mysqli_fetch_assoc($result);
  if ($checkname) { // if patient exists
    if ($checkname['pname'] === $name && $checkname['pphno'] === $phno && $checkname['pdob'] === $dob) {
	echo "<script>
		alert('Identical patient found with same DOB and ph no.');
   </script>";
    }


	  

  }
  
	 else
	{
	
		
		$sql="INSERT INTO patientinfo (pname, pemail, pphno, pgender, pdob, paddress, pplace)
		VALUES
		('$name','$email','$phno','$gender','$dob','$address','$place')";
		if(mysqli_query($conn,$sql)){
			 $last_id = mysqli_insert_id($conn);
		echo '<script>';
		echo 'alert("Patient added!!!   Patient ID : '.$last_id.'");';
   		echo '</script>';
			
		}
		else
		{
		 echo "Error" . $sql . "<br/>" . $conn->error;
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

input[type=text], input[type=email], input[type=number], input[type=date]{
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
	
	#side1{
		color: chartreuse;
		font-variant: small-caps;
		font-weight: bold;
	}

</style>
</head>
<body>
	
 <script>openNav();</script>
</div>
<form action="" method="post">


	<label for="pname">Name</label><br>
    <input type="text" placeholder="Enter Name" name="pname" required>
	<br>
	<label for="pemail">Email</label><br>
    <input type="email" placeholder="Enter Mail ID" name="pemail" >
		<br>
	<label for="pphno">Phone Number</label><br>
    <input type="number" placeholder="Enter Ph no." name="pphno" required>
		<br>
	<label for="gender">Gender</label><br>
	<input type="radio" name="gender" value="male" required><label style="color: black;">Male</label>
	
	<input type="radio" name="gender" value="female" required><label style="color: black">Female</label>
	
	<input type="radio" name="gender" value="others" required><label style="color: black">Others</label>
	<br>	
	
	<label for="pdob">Date Of Birth</label><br>
    <input type="date" name="pdob" required>
		<br>
	<label for="paddr">Address</label><br>
    <input type="text" placeholder="House name/no." name="paddr">
	<br>
	<label for="pplace">Locality</label><br>
    <input type="text" placeholder="Enter Place" name="pplace">
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

