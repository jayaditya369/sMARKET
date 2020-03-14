<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<style>
	body
	{
		font-family: Arial, Helvetica, sans-serif;
	}
	img.avatar
	{
		width: 20%;
		border-radius: 10%;
		
	}
	.active
	{
		background-color: #4545D4;
	}
	ul
	{
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #3A3AA1;
	}
	li
	{
		float: left;
		
	}
	li a
	{
		
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	li a:hover
	{
		background-color: #4545D4 ;
	}
	
	.sidenav
	{
		height: 100%;
		width: 0;
		position: fixed;
		z-index: 1;
		top: 1;
		left: 1;
		background-color: #3A3AA1;
		overflow-x: hidden;
		transition: 0.5s;
		padding-top: 60px;
	}
	.sidenav a
	{
		padding: 8px 8px 8px 32px;
		text-decoration: none;
		font-size: 18px;
		color: white;
		display: block;
		transition: 0.3s;
	}
	.sidenav a:hover
	{
		background-color: #4545D4 ;
		color: 
	}

	.sidenav .closebtn
	{
		position: absolute;
		top: 0;
		right: 5px;
		font-size: 30px;
		margin-left: 10px;
	}
	.sidenav .closebtn:hover
	{
		background-color: #3A3AA1;
		color: red;
	}
	@media screen and (max-height: 450px)
	{
		.sidenav {padding-top: 15px;}
		.sidenav a {font-size: 10px;}
	}
	
	
	/* CODE ONLY FOR HOMEPAGE */
	button
	{
		background-color: #3A3AA1;
		color: white;
		padding: 6px 10px;
		border: none;
		cursor: pointer;
		width: 12%;
	}
	button:hover
	{
		background-color: #4545D4;
	}

	div.writepost
	{
		/*
		align: center;
		position: relative;
		z-index: 1;
		width: 394px;
		height: 100px;
		background-color : #5A5AE7;
		*/
		
		display: none; /* Hidden by default */
		position: absolute; /* Stay in place */
		right: 8px;
		bottom: 10px;
		z-index: 1; /* Sit on top */
		width: 394px; /* Full width */
		height: 220px; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: #5A5AE7; /* Fallback color */
		padding-top: 60px;
		
	}
	/*.t
	{
		position: absolute;
		align: center;
		float: center;
	}
	.t1
	{
		position: relative;
		left:1;
		background-color: #ECECF4;
	}*/
	.writepost .close1
	{
		position: absolute;
		top: 0;
		right: 5px;
		font-size: 30px;
		margin-left: 10px;
	}
	.writepost .close1:hover
	{
		background-color: #5A5AE7;
		color: red;
	}
</style>
</head>
<body>
	
	<img src="logo.png" alt="Avatar" class="avatar" align="top">
	<ul>
		<li><a span style="font-size:13.5px;cursor:pointer;left:0" onclick="openNav()">&#9776;</span></a></li>
		<li><a class="active" href="homepage.php" >HOME</a></li>
		<li><a href="freelancer.php">FREELANCERS</a></li>
		<li><a href="categories.php">CATEGORIES</a></li>
		<li><a href="myaccount.php">MY ACCOUNT</a></li>
	</ul>
	<div id="mySidenav" class="sidenav" >
		
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="javascript:void(0)" onclick="openpost()">WritePost</a>
		<a href="services.php">Services</a>
		<a href="clients.php">Clients</a>
		<a href="about.php">About</a>
		<a href="help.php">Help</a>
		<a href="Loginpage.html">Logout</a>
	</div>
	<br>
	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<?php
		echo " Hello ".$_SESSION["user"].", Welcome to sMARKET<br>";
	?>
	<br>
	
	<div id="wp1" class="writepost">
	<center>
		<form class="p1" action="addpost.php" method="post">
			<a href="javascript:void(0)" class="close1" onclick="closepost()">&times;</a>
			<label style="color:white;">Type of Job : </label>
			<input type="text" placeholder="Type of Job" name="skill" required>
			<br><br>
			<textarea rows="7" cols="50" placeholder=" Write Post " name="wpost" required></textarea>
			<br><br>
			<button type="submit">Post</button>
		</form>
	</center>
	</div>
	
	<script>
		function openNav()
		{
			document.getElementById("mySidenav").style.width = "200px";
		}

		function closeNav()
		{
			document.getElementById("mySidenav").style.width = "0";
		}
		function openpost()
		{
			document.getElementById('wp1').style.display='block';
		}
		function closepost()
		{
			document.getElementById("wp1").style.display="none";
		}
		
	
	</script>
</body>
</html>