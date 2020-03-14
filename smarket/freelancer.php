<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
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
	
	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px)
	{
		span.psw
		{
			display: block;
			float: none;
		}
		.cancelbtn
		{
			width: 20%;
		}
	}
	/* Add Zoom Animation */
	.animate
	{
		-webkit-animation: animatezoom 0.6s;
		animation: animatezoom 0.6s
	}

	@-webkit-keyframes animatezoom
	{
		from {-webkit-transform: scale(0)} 
		to {-webkit-transform: scale(1)}
	}
  
	@keyframes animatezoom
	{
		from {transform: scale(0)} 
		to {transform: scale(1)}
	}
	/* The Close Button (x) */
	.close
	{
		position: absolute;
		right: 25px;
		top: 0;
		color: #000;
		font-size: 35px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus
	{
		color: red;
		cursor: pointer;
	}
	.model-content
	{
		background-color: #fefefe;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 1px solid #888;
		width: 30%; /* Could be more or less, depending on screen size */
	}
	/* The Modal (background) */
	.modal
	{
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		padding-top: 60px;
	}
	.container1
	{
		padding: 16px;
	}

	span.psw
	{
		float: right;
		padding-top: 16px;
	}
	/* Center the image and position the close button */
	.imgcontainer
	{
		text-align: center;
		margin: 24px 0 12px 0;
		position: relative;
	}

	/* Set a style for all buttons */
	button
	{
		background-color: #3A3AA1;
		
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 70%;
	}

	button:hover
	{
		background-color: #4545D4;
	}

	/* Extra styles for the cancel button */
	.cancelbtn
	{
		width: auto;
		padding: 10px 18px;
		background-color: #f44336;
	}
	input[type=text], input[type=password]
	{
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}
	</style>
</head>
<body>
	<img src="logo.png" alt="Avatar" class="avatar" align="top">
	<ul>
		<li><a span style="font-size:13.5px;cursor:pointer;left:0" onclick="openNav()">&#9776;</span></a></li>
		<li><a href="homepage.php" >HOME</a></li>
		<li><a class="active" href="freelancer.php">FREELANCERS</a></li>
		<li><a href="categories.php">CATEGORIES</a></li>
		<li><a href="myaccount.php">MY ACCOUNT</a></li>
	</ul>
	<div id="mySidenav" class="sidenav" >
		
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="about.php">About</a>
		<a href="services.php">Services</a>
		<a href="clients.php">Clients</a>
		<a href="Loginpage.html">Logout</a>
	</div>
	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	
	<button onclick="document.getElementById('fl').style.display='block'" style="width:auto;" >Register as FreeLancer</button>
	
	<div id="fl" class="modal">
		<center>
		<form class="model-content animate" action="freelancereg.php" method="post">
		
		<div class="imgcontainer">
			<span onclick="document.getElementById('fl').style.display='none'" class="close" title="Close Modal">&times;</span>
		</div>
		
		<div class="container1">
			<h2 style="color:#3A3AA1;"> REGISTER</h2>
			
			<!-- <p>Please fill in this details to create an account</p>
			<hr>
			-->
			<table>
			<tr>
				<td><label for="skill1"><b>Skill 1 :</b></label></td>
				<td><input type="text" placeholder="Enter Skill name" name="skill1"></td>
			</tr>
			<tr>
				<td><label for="skill2"><b>Skill 2 :</b></label></td>
				<td><input type="text" placeholder="Enter Skill name" name="skill2"></td>
			</tr>
			<tr>
				<td><label for="skill3"><b>Skill 3 :</b></label></td>
				<td><input type="text" placeholder="Enter Skill name" name="skill3"></td>
			</tr>
			</table>
			
			<!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->
				
			<button type="submit" class="signupbtn">Register</button>
			<br>
			
			<!-- <label><input type="checkbox" name="remember" style="margin-bottom:15px">Remember me</label> -->
		</div>
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
		
	
	</script>
</body>
</html>