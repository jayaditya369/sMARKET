<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
	<link rel="stylesheet" href="addcoupon.css">
</head>
<body>
	<a href="homepage.php"><img src="logo.png" alt="sMARKET" class="logo"></a>
	<ul>
		<li><a class="active" span style="font-size:13.5px;cursor:pointer;left:0" onclick="openNav()">&#9776;</span></a></li>
		<li><a href="homepage.php" >HOME</a></li>
		<li><a href="freelancer.php">FREELANCERS</a></li>
		<li><a href="categories.php">CATEGORIES</a></li>
		<li><a href="myaccount.php" style="float:right;">MY ACCOUNT</a></li>
	</ul>
	<div id="mySidenav" class="sidenav" >
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="services.php">Services</a>
		<a href="help.php">Help</a>
		<a href="developers.php">Developers</a>
		<a href="index.html">Logout</a>
	</div>
	<div id="main">
			<br>
			<?php
					echo " Hello ".$_SESSION["user"].", Welcome<br>";
			?>
			<form action="createcoupon.php" method="post">
				<input type="text" placeholder="Enter id" name="id">
				<input type="text" placeholder="Enter Coupon" name="num">
				<button type="submit">Create</button>
			</form>
			<br><br>
	</div>
	<script>
		function openNav()
		{
			document.getElementById("mySidenav").style.width = "200px";
			document.getElementById("main").style.marginLeft = "200px";
		}

		function closeNav()
		{
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("main").style.marginLeft= "0";
		}

		var modal = document.getElementById('wp1');

	</script>
</body>
</html>