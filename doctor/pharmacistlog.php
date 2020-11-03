<?php
include('dochome.php');
?>
<!DOCTYPE html>
<html>
<head>
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
		#side1 {
		color: chartreuse;
		font-variant: small-caps;
		font-weight: bold;
	}
			form {
			position: absolute;
			bottom: 10px;
			right: 10px;
			width: 25%;
			height: 70%;
			display: none;
		}
		
		input {
			width: 80%;
			padding: 10px 10px;
			margin: 4px 2px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		
		button {
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
		<a id="box1" href="plog1.php" target="_blank" class="box" >Today's Report</a>
		<br>
		<a id="box2" href="#" class="box" onclick="show2()">Daywise Report</a>
		<br>
		<a id="box3" href="#" class="box" onclick="show3()">Monthly Report</a>
	</div>
		<form id="datelist" name="datelist" action="plog2.php" target="_blank" method="post">



		<label for="date">Select Date</label><br>
		<input type="date" name="date" required>
		<br>


		<button type="submit" style="background-color: limegreen;">Get list</button>
	</form>
			<form id="monthlylist" name="monthlylist" action="plog3.php" target="_blank" method="post">



		<label for="monthselect">Select Month</label><br>
		<input type="month" name="monthselect" required>
		<br>


		<button type="submit" style="background-color: limegreen;">Get list</button>
	</form>
	
	<a id="back" class="goback" onClick="location.reload()">&laquo;Go Back</a>

<script>
	function show2(){

	document.getElementById('box2').style.position='fixed';
	document.getElementById( 'box2' ).style.left = '650px';
	document.getElementById( 'box2' ).style.top = '70px';
	document.getElementById('box2').style.borderTopLeftRadius='25px';
	document.getElementById('box2').style.borderBottomRightRadius='25px';
	document.getElementById('box2').style.backgroundColor='grey';
	document.getElementById('box2').style.color='black';
	document.getElementById('box1').style.display='none';
	document.getElementById('box3').style.display='none';
	document.getElementById('back').style.display='inline-block';
	document.getElementById( 'datelist' ).style.display = 'inline-block';
	
}
	
		function show3(){

	document.getElementById('box3').style.position='fixed';
	document.getElementById( 'box3' ).style.left = '650px';
	document.getElementById( 'box3' ).style.top = '70px';
	document.getElementById('box3').style.borderTopLeftRadius='25px';
	document.getElementById('box3').style.borderBottomRightRadius='25px';
	document.getElementById('box3').style.backgroundColor='grey';
	document.getElementById('box3').style.color='black';
	document.getElementById('box1').style.display='none';
	document.getElementById('box2').style.display='none';
	document.getElementById('back').style.display='inline-block';
	document.getElementById( 'monthlylist' ).style.display = 'inline-block';
	
}
	</script>
	</body>
	
	
</html> 