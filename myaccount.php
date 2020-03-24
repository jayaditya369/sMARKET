<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
	<link rel="stylesheet" href="myaccount.css">
</head>
<body>
	<a href="homepage.php"><img src="logo.png" alt="sMARKET" class="logo"></a>
	<ul>
		<li><a span style="font-size:13.5px;cursor:pointer;left:0" onclick="openNav()">&#9776;</span></a></li>
		<li><a href="homepage.php" >HOME</a></li>
		<li><a href="freelancer.php">FREELANCERS</a></li>
		<li><a href="categories.php">CATEGORIES</a></li>
		<li><a class="active" href="myaccount.php" style="float:right;">MY ACCOUNT</a></li>
	</ul>
	<div id="mySidenav" class="sidenav" >

		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="services.php">Services</a>
		<a href="help.php">Help</a>
		<a href="developers.php">Developers</a>
		<a href="Loginpage.html">Logout</a>
	</div>
	<div id="main">
			<div id="upgrade">
				<form action="upgradeaccount.php" method="post">
				<input type="text" class="cbutton" placeholder="Enter coupon number" name="coupon">
				<button type="submit">upgrade</button>
				</form>
			</div>
			<br>
			<?php
					echo "Hi ".$_SESSION["user"].", Welcome<br>";
			?>
			<br><br>
			<div id="mbuttons">
			<a href="deleteposts.php"><button>Delete All Published Posts</button></a>
			<a href="deletefreelanceraccount.php"><button> Delete FreeLancing Account</button></a>
			<button>Apply for Coupon</button>
			<button>My Posts</button>

			</div>
			<br><br>

			<div id="fdet" style="background-color:white; width: 400px; padding:8px;">
				<center>
				<h3 style="background-color:lightgray; width:320px; padding:5px;">  FREELANCING ACCOUNT DETAILS</h3>
				<form action="myaccountreg.php" method="post">
					<?php
					$con=mysqli_connect("localhost","root","");
					if(!$con)
					{
						die('Error connecting to server :'.mysqli_error());
					}
					mysqli_select_db($con,"kakaral_wp1");
					$sql = "SELECT * FROM freelancers WHERE name='{$_SESSION['user']}'";
					$result = mysqli_query($con, $sql);
					if (mysqli_num_rows($result) > 0)
					{
							while($row = mysqli_fetch_assoc($result))
							{
									$field2name = $row["fullname"];
									$field3name = $row["degree"];
									$field4name = $row["skills"];
									$field5name = $row["phone"];
									$field6name = $row["email"];
									echo '
				<table>
					<tr>
						<td>FULL NAME</td><td>:</td>
						<td><input type="text" name="fname" value="'.$field2name.'"></td>
					</tr>
					<tr>
						<td>DEGREE</td><td>:</td>
						<td><input type="text" name="deg" value="'.$field3name.'"></td>
					</tr>
					<tr>
						<td>SKILLS</td><td>:</td>
						<td><input type="text" name="skills" value="'.$field4name.'"></td>
					</tr>
					<tr>
						<td>PHONE</td><td>:</td>
						<td><input type="text" pattern="[0-9]{10}" name="phone" value="'.$field5name.'"></td>
					</tr>
					<tr>
						<td>E-MAIL</td><td>:</td>
						<td><input type="email" name="email" value="'.$field6name.'"></td>
					</tr>
				</table>';
			}
			}
			else {
					echo "First Register as FREELANCER";
			}
			$con->close();
			?>
				<br><br>
				<button type="submit" style="border-radius:24px;">save details</button>
			</form>
			</center>
			</div>

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
