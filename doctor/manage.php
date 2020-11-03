<?php
include('dochome.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

	
	.options {
	position: absolute;
	bottom: 10px;
	right: 0px;
	width: 25%;
	height: 50%;
	}
	
		.box{
  background-color: #111; 
  border: none;
  color: white;
  padding: 9px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 8px 2px;
  cursor: pointer;
  width: 160px;

 
		
	}
	
.box:hover
	{
		color: aqua;
		margin: 8px 10px;

	}
	
	.goback{
  background-color: tomato; 
  border: none;
  color: white;
  padding: 9px 25px;
  text-align: center;
  text-decoration: none;
  display: none;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
  position: fixed;
  right: 10px;
  bottom: 10px;
		
	}
	
	.showwindow{
		position: fixed;
		left: 300px;
		top: 130px;
		display: none;
	}
form {
	position: absolute;
	bottom: 10px;
	right: 10px;
	width: 25%;
	height: 70%;
	display: none;
	
	}
	
	input{
  width: 80%;
  padding: 10px 10px;
  margin: 4px 2px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
	}
	
	button{
  background-color: red; 
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
	label {
	color: black;
	font-weight: bold;
	}
	
	#side4 {
		color: chartreuse;
		font-variant: small-caps;
		font-weight: bold;
	}

</style>
</head>
<body>

  <script>openNav();</script>
 

	<div id="selection" class="options">
		<a id="box1" class="box" onclick="show1()">Show Users</a>
		<br>
		<a id="box2" href="#" class="box" onclick="show2()">Delete User</a>
		<br>
		<a id="box3" href="#" class="box" onclick="show3()">Modify Password</a>
	</div>
	
	<div id="iframe" class="showwindow">
		<iframe src="showuser.php" width="400px" height="450px" style="background-color: lightblue"></iframe>
	</div>  
	
	
	
	<form id="deleteform" name="deleteform" action="deleteuser.php" onSubmit="return checkname()"  method="post">

	<label for="id">User ID</label><br>
    <input type="text" placeholder="Enter ID" name="id" required>
	<br>
	<label for="name">Username</label><br>
    <input type="text" placeholder="Enter Username" name="name" required>
	<br>
	<label for="confirmname">Retype username</label><br>
    <input type="text" placeholder="Retype username" name="confirmname" required>
		<br>


    <button type="submit">Delete user</button>
</form>

	
	<form id="modifyform" name="modifyform" action="modifypsw.php" onSubmit="return checkpsw()" method="post">


	<label for="name">Username</label><br>
    <input type="text" placeholder="Enter Username" name="name" required>
	<br>
	<label for="oldpassword">Old password</label><br>
    <input type="password" placeholder="Old password" name="oldpassword" required>
	<br>
	<label for="newpassword">New password</label><br>
    <input type="password" placeholder="New password" name="newpassword" required>
	<br>
	<label for="retypepassword">Retype New password</label><br>
    <input type="password" placeholder="Retype password" name="retypepassword" required>
	<br>

    <button type="submit" style="background-color: cornflowerblue;">Change Password</button>
</form>	

<a id="back" class="goback" onClick="location.reload()">&laquo;Go Back</a>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
	

	
function show1(){
	closeNav();
	document.getElementById('box1').style.position='fixed';
	document.getElementById('box1').style.left='20px';
	document.getElementById('box1').style.top='70px';
	document.getElementById('box1').style.borderTopLeftRadius='25px';
	document.getElementById('box1').style.borderBottomRightRadius='25px';
	document.getElementById('box1').style.backgroundColor='grey';
	document.getElementById('box1').style.color='black';
	document.getElementById('box2').style.display='none';
	document.getElementById('box3').style.display='none';
	document.getElementById('back').style.display='inline-block';
	document.getElementById('iframe').style.display='inline-block';

}
	
function show2(){
	closeNav();
	document.getElementById('box2').style.position='fixed';
	document.getElementById('box2').style.left='20px';
	document.getElementById('box2').style.top='70px';
	document.getElementById('box2').style.borderTopLeftRadius='25px';
	document.getElementById('box2').style.borderBottomRightRadius='25px';
	document.getElementById('box2').style.backgroundColor='grey';
	document.getElementById('box2').style.color='black';
	document.getElementById('box1').style.display='none';
	document.getElementById('box3').style.display='none';
	document.getElementById('back').style.display='inline-block';
	document.getElementById('deleteform').style.display='inline-block';
	
}
	
function show3(){
	closeNav();
	document.getElementById('box3').style.position='fixed';
	document.getElementById('box3').style.left='20px';
	document.getElementById('box3').style.top='70px';
	document.getElementById('box3').style.borderTopLeftRadius='25px';
	document.getElementById('box3').style.borderBottomRightRadius='25px';
	document.getElementById('box3').style.backgroundColor='grey';
	document.getElementById('box3').style.color='black';
	document.getElementById('box2').style.display='none';
	document.getElementById('box1').style.display='none';
	document.getElementById('back').style.display='inline-block';
	document.getElementById('modifyform').style.display='inline-block';
	
}	
	
function checkname() 
{
	if(document.deleteform.name.value!= document.deleteform.confirmname.value)
	{
	alert("Username Fields do not match  !!");

	return false;
	}
		
}
function checkpsw(){
	if(document.modifyform.newpassword.value!= document.modifyform.retypepassword.value)
	{
	alert("Password Fields do not match  !!");

	return false;
	}
			
}
</script>
   
</body>
</html> 

