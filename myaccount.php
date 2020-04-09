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
		<li><a span style="font-size:13.5px;cursor:pointer;left:0" onclick="toggleNav()">&#9776;</span></a></li>
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
		<a href="logout.php">Logout</a>
	</div>
	<div id="main">
	        <br>
	        <?php
	        $con=mysqli_connect("localhost","kakaral","Harika@12345");
			if(!$con)
			{
				die('Error connecting to server :'.mysqli_error());
			}
			mysqli_select_db($con,"kakaral_wp1");
	        
	        $sql1="SELECT * FROM hired WHERE name='$_SESSION[user]'";
	        $r9 = $con->query($sql1);
	                if(mysqli_num_rows($r9)>0)
					{
					        echo '<b>Congrats '.$_SESSION[user].',<b> You had been hired by: ';
							while ($row3 = $r9->fetch_assoc())
							{
	                            $d1=$row3["hname"];
	                            echo $d1;
							}
							echo '<br><br>Soon, You will recieve a mail from the hiree.';
					}
					else
					{
					    
				        	echo "Hi ".$_SESSION["user"].", Welcome<br>";
			            
					}
			        
	        ?>
	        
	        
			<div id="upgrade">
				<form action="upgradeaccount.php" method="post">
				<input type="text" class="cbutton" placeholder="Enter coupon number" name="coupon">
				<button type="submit">upgrade</button>
				</form>
			</div>
			<br>
			
			<br>
			<div id="mbuttons">
				<button onclick="myposts()" style="width:auto;" >My Posts</button>
				<a href="deleteposts.php"><button>Delete All Published Posts</button></a>
				<button onclick="fdetails()">FreeLancing Account</button></a>
				<button onclick="upgradebox()">Upgrade Account</button>

			</div>
			<br><br>

			<div id="mp" class="modal">
				<center>
					<?php
					$con=mysqli_connect("localhost","kakaral","Harika@12345");
					if(!$con)
					{
						die('Error connecting to server :'.mysqli_error());
					}
					mysqli_select_db($con,"kakaral_wp1");
					$query = "SELECT * FROM post WHERE uname='$_SESSION[user]'";
					if ($result = $con->query($query))
					{
							while ($row = $result->fetch_assoc())
							{
									$field1name = $row["uname"];
									$field2name = $row["type"];
									$field3name = $row["work"];
									echo'
										<div class="row">
											<div class="column">
													<div class="posts">
															<form action="deleteparticularpost.php" method="post">
															<h3 id="postname">'.strtoupper("$field1name").' </h3>
															<table>
															<tr>
																<td><b>JOB</b></td><td>:</td>
																<td>'.$field2name.'</td>
															</tr>
															<tr>
																<td><b>WORK</b></td><td>:</td>
																<td>'.$field3name.'</td>
															</tr>
															</table>
															<br>
													</div>
											</div>
									</div> ';
							}
					}
					$con->close();
					?>

				</center>
			</div>

			<!--/* Freelancer Account data*/-->
			<div id="fdet" style="background-color:white; width: 400px; padding:8px; margin: 10px; float:right;">
				<center>
				<h3 style="background-color:lightgray; width:320px; padding:5px;">  FREELANCING ACCOUNT DETAILS</h3>
				<form action="myaccountreg.php" method="post">
					<?php
					$con=mysqli_connect("localhost","kakaral","Harika@12345");
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
					                        	<td><input type="text" name="fname" value="'.$field2name.'" required></td>
					                        </tr>
					                        <tr>
					                        	<td>DEGREE</td><td>:</td>
					                        	<td><input type="text" name="deg" value="'.$field3name.'" required></td>
					                        </tr>
					                        <tr>
					                        	<td>SKILLS</td><td>:</td>
					                           	<td><input type="text" name="skills" value="'.$field4name.'" required></td>
					                        </tr>
					                        <tr>
					                        	<td>PHONE</td><td>:</td>
					                        	<td><input type="text" pattern="[0-9]{10}" name="phone" value="'.$field5name.'" required></td>
					                        </tr>
					                        <tr>
					                           	<td>E-MAIL</td><td>:</td>
					                        	<td><input type="email" name="email" value="'.$field6name.'" required></td>
					                        </tr>
				                        </table>';
			                }
			       }
			       else
			       {
					    echo "First Register as FREELANCER";
			       }
			       $con->close();
			       ?>
				<br>
				<button type="submit" class="updatebutton" style="border-radius:24px;">UPDATE</button>
			    <br><br>
				</form>
				<a href="deletefreelanceraccount.php"><button style="border-radius:24px;">DELETE</button></a>
			    
			    </center>
			</div>

		<br>
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
		function upgradebox(){
			var element1 = document.getElementById('upgrade');
			if(element1.style.display=='block'){
					element1.style.display='none';
			}
			else {
				element1.style.display='block';
			}
		}
		function fdetails(){
			var element2 = document.getElementById('fdet');
			if(element2.style.display=='block'){
				element2.style.display='none';
			}
			else {
				element2.style.display='block';
			}
		}
		function myposts(){
			var element3 = document.getElementById('mp');
			if(element3.style.display=='block'){
				element3.style.display='none';
			}
			else {
				element3.style.display='block';
			}
		}
	</script>

</body>
</html>