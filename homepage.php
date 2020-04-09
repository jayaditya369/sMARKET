<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="homepage.css">
	<style>
</style>
</head>
<body>

	<img src="logo.png" alt="sMARKET" class="logo">
	<ul>
		<li><a span style="font-size:13.5px;cursor:pointer;left:0" onclick="toggleNav()">&#9776;</span></a></li>
		<li><a class="active" href="homepage.php" >HOME</a></li>
		<li><a href="freelancer.php">FREELANCERS</a></li>
		<li><a href="categories.php">CATEGORIES</a></li>
		<li><a href="myaccount.php" style="float:right;">MY ACCOUNT</a></li>
	</ul>

	<div id="mySidenav" class="sidenav" >
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="javascript:void(0)" onclick="openpost()">WritePost</a>
		<a href="services.php">Services</a>
		<a href="help.php">Help</a>
		<a href="developers.php">Developers</a>
		<a href="logout.php">Logout</a>
	</div>

	<div id="main">
			<br>
			<?php
					echo " Hello ".$_SESSION["user"].", Welcome to sMARKET<br>";
			?>
	<br>


		<!-- Posts Gallery Grid -->
		<?php
		$con=mysqli_connect("localhost","kakaral","Harika@12345");
		if(!$con)
		{
			die('Error connecting to server :'.mysqli_error());
		}
		mysqli_select_db($con,"kakaral_wp1");
		$query = "SELECT * FROM post";
		if ($result = $con->query($query))
		{
				while ($row = $result->fetch_assoc())
				{
						$f1= $row["id"];
						$field1name = $row["uname"];
						$field2name = $row["type"];
						$field3name = $row["work"];
						echo'
							<div class="row">
								<div class="column">
										<div class="posts">

												<h3 id="postname">'.strtoupper("$field1name").' </h3>
												<table>
												<tr>
													<td><b>JOB</b></td><td>:</td>
													<td>'."$field2name".'</td>
												</tr>
												<tr>
													<td><b>WORK</b></td><td>:</td>
													<td>'."$field3name".'</td>
												</tr>
												</table>
												<form method="post" action="respond.php">
    												<input type="hidden" name="postid" value="'.$f1.'">
														<button type="submit" style="float:right;">RESPOND</button>
												</form>
												<br><br>
										</div>
								</div>
						</div> ';
				}
		}
		$con->close();
		?>

		<div id="wp1" class="writepost">
		<center>
			<form class="p1" action="addpost.php" method="post">
				<h3>WRITE POST</h3>
				<span href="javascript:void(0)" class="close1" onclick="closepost()">&times;</span>
				<!--<label style="color:white;">Type of Job : </label>-->
				<input type="text" placeholder="Type of Job" name="skill" required>
				<br><br>
				<textarea align=center rows="5" cols="42" placeholder=" Write Post " name="wpost" required></textarea>
				<br><br>
				<button type="submit">Publish</button>
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
		function openpost()
		{
			document.getElementById('wp1').style.display='block';
		}
		function closepost()
		{
			document.getElementById("wp1").style.display="none";
		}
        function toggleNav()
        {
            var element = document.getElementById("mySidenav");
            if(element.style.width=="200px")
            {
                closeNav();
            }
            else
            {
                openNav();
            }
        }

	</script>
</body>
</html>