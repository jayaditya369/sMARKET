<?php

	session_start();

	$con=mysqli_connect("localhost","kakaral","Harika@12345");

	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");
	$result=mysqli_query($con,"SELECT name FROM freelancers WHERE name='$_SESSION[user]'");
	if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sql="INSERT INTO freelancers(name, fullname, degree, skills, phone, email) VALUES('$_SESSION[user]', '$_POST[fname]', '$_POST[deg]','$_POST[skills]','$_POST[phone]', '$_POST[email]' )";
		$_SESSION['fullname'] = $_POST['fname'];
		$_SESSION['degree'] = $_POST['deg'];
		$_SESSION['skills'] = $_POST['skills'];
		$_SESSION['phone'] = $_POST['phone'];
		$_SESSION['email'] = $_POST['email'];
		if(!mysqli_query($con,$sql))
		{
			die('Error :'.mysqli_error($con));
		}
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Your FreeLancer Registeration Succesfull')
    window.location.href='freelancer.php';
    </SCRIPT>");
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' You cant Register Multiple times')
    window.location.href='freelancer.php';
    </SCRIPT>");
	}

	mysqli_close($con);
?>