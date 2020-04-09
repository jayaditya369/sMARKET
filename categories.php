<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
	<link rel="stylesheet" href="responses.css">
</head>
<body>
	<a href="homepage.php"><img src="logo.png" alt="sMARKET" class="logo"></a>
	<ul>
		<li><a span style="font-size:13.5px;cursor:pointer;left:0" onclick="toggleNav()">&#9776;</span></a></li>
		<li><a href="homepage.php" >HOME</a></li>
		<li><a href="freelancer.php">FREELANCERS</a></li>
		<li><a class="active" href="categories.php">CATEGORIES</a></li>
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

			<button onclick="togglePost()">Post</button>
			<button onclick="toggleFreelancer()">Hired Lancers</button>

			<br><br>

			<div id="pr" class="modal">
				<center>
				<h3 style="background-color:lightgray; width:290px; padding:5px;">RESPONSES FOR YOUR POSTS</h3>
				<br>
				<table style="text-align:center; border:2px solid black;" cellpadding="5px">

						<?php
						$con=mysqli_connect("localhost","kakaral","Harika@12345");
						if(!$con)
						{
							die('Error connecting to server :'.mysqli_error());
						}
						mysqli_select_db($con,"kakaral_wp1");
						$q1 = "SELECT * FROM post WHERE uname='$_SESSION[user]'";
						if($r1 = $con->query($q1))
						{
							    
							echo '
								<tr>
									<th><b>POST<b></th>
									<th><b>USERNAME<b></th>
									<th><b>FULLNAME<b></th>
									<th><b>DEGREE<b></th>
									<th><b>SKILLS<b></th>
									<th><b>E-MAIL<b></th>
								</tr>';
						    while($row1 = $r1->fetch_assoc())
						    {
						        $sql = "SELECT * FROM response WHERE postid='$row1[id]'";
						        if ($result = $con->query($sql))
						        {

								    while ($row = $result->fetch_assoc())
								    {
										$field1name = $row1["type"];
										$field2name = $row["rname"];
										$field3name = $row["rfullname"];
										$field4name = $row["rdegree"];
										$field5name = $row["rskills"];
										$field6name = $row["remail"];
										echo '
													<tr>
														<td><b>'.$field1name.'<b></td>
														<td>'.$field2name.'</td>
														<td>'.$field3name.'</td>
														<td>'.$field4name.'</td>
														<td>'.$field5name.'</td>
														<td>'.$field6name.'</td>
													</tr>';
							        }
						        }
						    }
				    	            
					    }
				        $con->close();
				        ?>

			</table>
			<br><br>
		</center>
	</div>

	<div id="hl" class="modal2">
		<center>
		<h3 style="background-color:lightgray; width:240px; padding:5px;">HIRED LANCERS</h3>
		<br>
		<table style="text-align:center; border:2px solid black;" cellpadding="5px">

				<?php
				$con=mysqli_connect("localhost","kakaral","Harika@12345");
				if(!$con)
				{
					die('Error connecting to server :'.mysqli_error());
				}
				mysqli_select_db($con,"kakaral_wp1");
				$q1 = "SELECT * FROM hired WHERE hname='$_SESSION[user]'";
				if($r1 = $con->query($q1))
				{
				    
					echo '
						<tr>
							<th><b>USERNAME<b></th>
							<th><b>FULLNAME<b></th>
							<th><b>DEGREE<b></th>
							<th><b>SKILLS<b></th>
							<th><b>E-MAIL<b></th>
						</tr>';
				    
				    while($row1 = $r1->fetch_assoc())
				    {
				        $sql = "SELECT * FROM freelancers WHERE fullname='$row1[fullname]'";
				        if ($result = $con->query($sql))
				        {
								

					        while ($row = $result->fetch_assoc())
						    {
							    $field1name = $row["name"];
							    $field2name = $row["fullname"];
							    $field3name = $row["degree"];
							    $field4name = $row["skills"];
							    $field6name = $row["email"];
							    echo '
									<tr>
										<td>'.$field1name.'</td>
										<td>'.$field2name.'</td>
										<td>'.$field3name.'</td>
										<td>'.$field4name.'</td>
										<td>'.$field6name.'</td>
									</tr>';
						    }
					    }
				    }
			        
			    }
		    	$con->close();
			    ?>

	</table>
	<br><br>
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
		function toggleNav()
		{
			var element1 = document.getElementById('mySidenav');
			if(element1.style.width == "200px")
			{
				closeNav();
			}
			else
			{
				openNav();
			}
		}
		function togglePost()
		{
			var element2 = document.getElementById('pr');
			if(element2.style.display=='block')
			{
				element2.style.display='none';
			}
			else
			{
				element2.style.display='block';
			}
		}
		function toggleFreelancer()
		{
			var element3 = document.getElementById('hl');
			if(element3.style.display=='block')
			{
				element3.style.display='none';
			}
			else
			{
				element3.style.display='block';
			}
		}

	</script>
</body>
</html>