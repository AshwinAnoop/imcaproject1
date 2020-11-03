<?php

include( 'session.php' );

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body {
			font-family: "arial", sans-serif;
			background-image: url(img1.jpg);
			background-size: cover
		}
		
		.sidebar {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #111;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 60px;
		}
		
		.sidebar a {
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: #818181;
			display: block;
			transition: 0.3s;
		}
		
		.sidebar a:hover {
			color: #f1f1f1;
		}
		
		.sidebar .closebtn {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
		}
		
		.topnav {
			font-size: 20px;
			cursor: pointer;
			background-color: #111;
			color: white;
			padding: 10px 15px;
			border: none;
			float: left;
			display: block;
			text-align: center;
		}
		
		.topnav:hover {
			background-color: #444;
		}
		
		#main {
			transition: margin-left .25s;
			padding: 16px;
		}
	
		 a{
			text-decoration: none;
	
		}
	}
	</style>
</head>

<body>

	<div id="mySidebar" class="sidebar">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: red"><sup>x</sup></a>
		<p style="font-size: 30px; color: aqua; padding: 14px">Hey
			<?php $showname=$_SESSION['login_user'];echo $showname; ?>!</p>
		<a id="side1" href="billingreport.php">Billing report</a>
		<a id="side2" href="manage.php">Manage account</a>
		<a id="side3" href="addmed.php">Add Medicine</a>
		<a id="side4" href="changeprice.php">Change price</a>
		<a id="side5" href="logout.php">
			<font color="red">&lang;</font>Logout
			<font color="red">&rang;</font>
		</a>
	</div>

	<div id="main">
		<a id="nav1" class="topnav" onclick="openNav()">= Admin</a>
	
		<a id="nav2" class="topnav" href="billing.php">Billings</a>
		<a id="nav3" class="topnav" href="prescribe.php">Prescription</a>
		<a id="nav4" class="topnav" href="addstock.php">Add-Stock</a>
		<a id="nav5" class="topnav" href="stock.php">Inventory</a>


	</div>


	<script>
		function openNav() {
			document.getElementById( "mySidebar" ).style.width = "250px";
			document.getElementById( "main" ).style.marginLeft = "250px";
		}

		function closeNav() {
			document.getElementById( "mySidebar" ).style.width = "0";
			document.getElementById( "main" ).style.marginLeft = "0";
		}
	</script>

</body>
</html>