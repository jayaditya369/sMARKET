<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
	<link rel="stylesheet" href="developers.css">
</head>
<body>
	<a href="homepage.php"><img src="logo.png" alt="sMARKET" class="logo"></a>
	<ul>
		<li><a class="active" span style="font-size:13.5px;cursor:pointer;left:0" onclick="toggleNav()">&#9776;</span></a></li>
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
		<a href="logout.php">Logout</a>
	</div>
	<div id="main">
			<br>
			<center><h1 style="padding:5px; background-color:gray; color:white; width: 230px; ">DEVELOPERS</h1></center>
			<div class="row">
				<div class="column">
					<div class="lancers">
							<center>
							<h3 class="name">DEEKSHITA DEVANA</h3>
							110020867<br>
							Masters of Applied Computing<br>
							<b>University of Windsor</b><br>
							devana@uwindsor.ca<br><br>

							<a href="https://www.linkedin.com/in/dikshitha-devana-a42a59117/"><button style="float:right">Contact</button></a>
							</center>
							<br><br>
					</div>
				</div>
				<div class="column">
					<div class="lancers">
							<center>
							<h3 class="name">HARDIKA DAVE</h3>
							110024185<br>
							Masters of Applied Computing<br>
							<b>University of Windsor</b><br>
							dave91@uwindsor.ca<br><br>

							<a href="https://www.linkedin.com/in/hardika-dave-715a5a187"><button style="float:right">Contact</button></a>
							</center>
							<br><br>
					</div>
				</div>
				<div class="column">
					<div class="lancers">
							<center>
							<h3 class="name">JAYADITYA KAKARALA</h3>
							110026622<br>
							Masters of Applied Computing<br>
							<b>University of Windsor</b><br>
							kakaral@uwindsor.ca<br><br>

							<a href="https://www.linkedin.com/in/jayaditya-kakarala-6153b0107/"><button style="float:right">Contact</button></a>
							</center>
							<br><br>
					</div>
				</div>
				<div class="column">
					<div class="lancers">
							<center>
							<h3 class="name">PHANEENDRA GUDIKANDULA</h3>
							110005945<br>
							Masters of Applied Computing<br>
							<b>University of Windsor</b><br>
							gudikan@uwindsor.ca<br><br>

							<a href="https://www.linkedin.com/in/phaneendra-gudikandula-a30103b8/" ><button style="float:right">Contact</button></a>
							</center>
							<br><br>
					</div>
				</div>
			</div>


			<br><br><br><br>
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
        function toggleNav() {
            var element = document.getElementById("mySidenav");
            if (element.style.width == "200px")
		    {
                closeNav();
            } else
		    {
                openNav();
            }
		}

	</script>
</body>
</html>