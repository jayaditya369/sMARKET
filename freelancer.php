<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="freelancer.css">
</head>
<body>
	<a href="homepage.php"><img src="logo.png" alt="sMARKET" class="logo"></a>
	<ul>
		<li><a span style="font-size:13.5px;cursor:pointer;left:0" onclick="toggleNav()">&#9776;</span></a></li>
		<li><a href="homepage.php" >HOME</a></li>
		<li><a class="active" href="freelancer.php">FREELANCERS</a></li>
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
			<?php
					echo " Hello ".$_SESSION["user"].", Welcome<br>";
			?>
			<br>
			<button onclick="document.getElementById('fl').style.display='block'" style="width:auto;" >Register as FreeLancer</button>
			<br><br>

			<!-- Portfolio FreeLancers Grid -->
			<div class="row">
				<?php
				$con=mysqli_connect("localhost","kakaral","Harika@12345");
				if(!$con)
				{
					die('Error connecting to server :'.mysqli_error());
				}
				mysqli_select_db($con,"kakaral_wp1");
				$query = "SELECT * FROM freelancers";
				if ($result = $con->query($query))
				{
						while ($row = $result->fetch_assoc())
						{
								$field1name = $row["name"];
								$field2name = $row["fullname"];
								$field3name = $row["degree"];
								$field4name = $row["skills"];
								$field5name = $row["phone"];
								$field6name = $row["email"];
								echo'
  									<div class="column">
    										<div class="lancers">
														<center>
      											<h3 class="freelancername">'.strtoupper("$field2name").' </h3>
														<table>
														<tr>
															<td><b>DEGREE</b></td><td>:</td>
      												<td>'.strtoupper("$field3name").'</td>
														</tr>
														<tr>
															<td><b>SKILLS</b></td><td>:</td>
															<td>'.strtoupper("$field4name").'</td>
														</tr>
														<tr>
															<td><b>EMAIL</b></td><td>:</td>
															<td>'.$field6name.'</td>
														</tr>
														</table>
                                                        <br>
														<form method="post" action="hire.php">
														    <input type="hidden" name="postname" value="'.$field1name.'">
		    												<input type="hidden" name="postfullname" value="'.$field2name.'">
																<button type="submit" style="float:right;">HIRE</button>
														</form>
														</center>
														<br><br>
    										</div>
  										</div> ';
						}
				}
				$con->close();
				?>
		  </div>

	<div id="fl" class="modal">
		<center>
		<form class="regbox animate" action="freelancereg.php" method="post">
			<span onclick="document.getElementById('fl').style.display='none'" class="close" title="Close">&times;</span>
			<h2> REGISTER</h2>
			<input type="text" placeholder="Enter Full name" name="fname" required>
			<input type="text" placeholder="Highest Degree" name="deg" required>
			<input type="text" placeholder="Enter Skills" name="skills" required>
			<input type="text" pattern="[0-9]{10}" placeholder="Mobile number" name="phone" required>
			<input type="email" placeholder="e-mail" name="email" required>
			<button type="submit" class="signupbtn">Register</button>
			<br>
		</form>
		</center>
	</div>
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