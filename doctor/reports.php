
<?php
include( 'dochome.php' );
?>

<!doctype html>
<html>
<head>
		<style>
		#nav4 {
			background-color: inherit;
			color: black;
			border-top-style: solid;
			border-left-style: solid;
			border-right-style: solid;
			border-color: red;
		}
		
		#nav1,
		#nav5,
		#nav3,
		#nav2 {
			border-bottom: solid;
			border-bottom-color: red;
		}
			
				.options {
			position: absolute;
			bottom: 10px;
			right: 0px;
			width: 25%;
			height: 50%;
		}
		
		.box {
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
		
		.box:hover {
			color: aqua;
			margin: 8px 10px;
		}
	
			</style>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
		<div id="selection" class="options">
		<a id="box1" class="box" onclick="show1()">Show Report</a>
		<br>
		<a id="box2" class="box" onclick="show2()">Add for current</a>
		<br>
		<a id="box3" class="box" onclick="show3()">Add for other</a>

		
	</div>
	<script>
				function show1(){
			
			location.replace("showreport.php");
		}
		function show2(){
			
			location.replace("addreport1.php");
		}
				function show3(){
			
			location.replace("addreport2.php");
		}
		
		</script>
	</body>
</html>