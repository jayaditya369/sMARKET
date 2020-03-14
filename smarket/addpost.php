<?php

	session_start();
	
	$con=mysqli_connect("localhost","root","");
	if(!$con) 
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"smarket");

	
		$sql= "INSERT INTO post(uname, type, work) VALUES('$_SESSION[user]','$_POST[skill]','$_POST[wpost]')";
		
		if(!mysqli_query($con,$sql))
		{
			die('Error :'.mysqli_error());
		}
		echo " Added Successfully <br />";
		header('Location: homepage.php');
	
	
	mysqli_close($con);


/*
1) We shouldnt allow similar usernames. (Y)
2) make the go back to login page work. (Y)
3) We shouldnt allow null usernames and passwords.(Y)
*/
?>

