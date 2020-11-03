<?php
include('phahome.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	
<title>Untitled Document</title>
<style>
		#side2{
		color: chartreuse;
		font-variant: small-caps;
		font-weight: bold;
	}
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
	  width: 180px;
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
		right: 100px;
		top: 150px;
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
	
</style>
</head>

<body>
	<script>openNav();</script>
	<div id="selection" class="options">
		<a id="box1" class="box" onclick="show1()">Show Details</a>
		<br>
		<a id="box2" class="box" onclick="show2()">Change Password</a>
		<br>
		<a id="box3" href="#" class="box" onclick="show3()">Change Ph no.</a>
		<br>
		<a id="box4" href="#" class="box" onclick="show4()">Change e-mail</a>
	</div>
	
		<div id="iframe" class="showwindow">
		<iframe src="showdetails.php" width="400px" height="230px" style="background-color: lightblue"></iframe>
		</div>  
	 
		<form id="pswchange" name="pswchange" action="phapswchange.php" onSubmit="return checkpsw()" method="post">



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

		<form id="phnochange" name="phnochange" action="phaphnchange.php" onSubmit="return checkphno()" method="post">



		<label for="oldphno">Old Phone no.</label><br>
		<input type="text" placeholder="Old Phone no." name="oldphno" required>
		<br>
		<label for="newphno">New Phone no.</label><br>
		<input type="text" placeholder="New phone no." name="newphno" required>
		<br>
		<label for="retypephno">Retype New password</label><br>
		<input type="text" placeholder="Confirm new ph no." name="retypephno" required>
		<br>

		<button type="submit" style="background-color: cornflowerblue;">Change Phone no.</button>
		</form>	
	
		<form id="mailchange" name="mailchange" action="phamailchange.php" onSubmit="return checkmail()" method="post">



		<label for="oldemail">Old Email</label><br>
		<input type="text" placeholder="Old e-Mail" name="oldemail" required>
		<br>
		<label for="newemail">New Email</label><br>
		<input type="text" placeholder="New Email" name="newemail" required>
		<br>
		<label for="retypeemail">Retype New Email</label><br>
		<input type="text" placeholder="Confirm new Email" name="retypeemail" required>
		<br>

		<button type="submit" style="background-color: cornflowerblue;">Change Email</button>
		</form>		
	
<a id="back" class="goback" onClick="location.reload()">&laquo;Go Back</a>
	
<script>
function show1(){

	document.getElementById('box1').style.position='fixed';
	document.getElementById('box1').style.left='620px';
	document.getElementById('box1').style.top='70px';
	document.getElementById('box1').style.borderTopLeftRadius='25px';
	document.getElementById('box1').style.borderBottomRightRadius='25px';
	document.getElementById('box1').style.backgroundColor='grey';
	document.getElementById('box1').style.color='black';
	document.getElementById('box2').style.display='none';
	document.getElementById('box3').style.display='none';
	document.getElementById('box4').style.display='none';
	document.getElementById('back').style.display='inline-block';
	document.getElementById('iframe').style.display='inline-block';

}

function show2(){

	document.getElementById('box2').style.position='fixed';
	document.getElementById('box2').style.left='620px';
	document.getElementById('box2').style.top='70px';
	document.getElementById('box2').style.borderTopLeftRadius='25px';
	document.getElementById('box2').style.borderBottomRightRadius='25px';
	document.getElementById('box2').style.backgroundColor='grey';
	document.getElementById('box2').style.color='black';
	document.getElementById('box1').style.display='none';
	document.getElementById('box3').style.display='none';
	document.getElementById('box4').style.display='none';
	document.getElementById('back').style.display='inline-block';
	document.getElementById('pswchange').style.display='inline-block';	

}
	
function show3(){

	document.getElementById('box3').style.position='fixed';
	document.getElementById('box3').style.left='620px';
	document.getElementById('box3').style.top='70px';
	document.getElementById('box3').style.borderTopLeftRadius='25px';
	document.getElementById('box3').style.borderBottomRightRadius='25px';
	document.getElementById('box3').style.backgroundColor='grey';
	document.getElementById('box3').style.color='black';
	document.getElementById('box1').style.display='none';
	document.getElementById('box2').style.display='none';
	document.getElementById('box4').style.display='none';
	document.getElementById('back').style.display='inline-block';
	document.getElementById('phnochange').style.display='inline-block';	

}
	
function show4(){

	document.getElementById('box4').style.position='fixed';
	document.getElementById('box4').style.left='620px';
	document.getElementById('box4').style.top='70px';
	document.getElementById('box4').style.borderTopLeftRadius='25px';
	document.getElementById('box4').style.borderBottomRightRadius='25px';
	document.getElementById('box4').style.backgroundColor='grey';
	document.getElementById('box4').style.color='black';
	document.getElementById('box1').style.display='none';
	document.getElementById('box2').style.display='none';
	document.getElementById('box3').style.display='none';
	document.getElementById('back').style.display='inline-block';
	document.getElementById('mailchange').style.display='inline-block';	

}
	
function checkpsw(){
	if(document.pswchange.newpassword.value!= document.pswchange.retypepassword.value)
	{
	alert("Password Fields do not match  !!");

	return false;
	}
			
}
	
function checkphno(){
	if(document.phnochange.newphno.value!= document.phnochange.retypephno.value)
	{
	alert("New Ph no. had a wrong confirmation !!");

	return false;
	}
			
}

function checkmail(){
	if(document.mailchange.newemail.value!= document.mailchange.retypeemail.value)
	{
	alert("New Email had a wrong confirmation !!");

	return false;
	}
			
}	

</script>
</body>
</html>