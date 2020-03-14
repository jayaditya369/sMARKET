<?php

if($_POST["psw"]==$_POST["psw1"] && $_POST["psw"]!="" && $_POST["uname"]!="")
{
	$con=mysqli_connect("localhost","root","");
	if(!$con) 
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"smarket");

	$result=mysqli_query($con,"SELECT username FROM userdetails WHERE username='$_POST[uname]'");
	
	if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sql="INSERT INTO userdetails(username, password) VALUES('$_POST[uname]','$_POST[psw]')";
		
		if(!mysqli_query($con,$sql))
		{
			die('Error :'.mysqli_error());
		}
		echo "Registeration Successfull <br />";
		header('Location: loginpage.html');
	}
	else
	{
		echo "Username Already exists ! ";
		echo "<a href='loginpage.html'> Go back to login page </a>";
	}
	
	mysqli_close($con);
}
else
{
	if($_POST["psw"]!=$_POST["psw1"])
		echo "Password mismatch <br />";
	else
		echo "Invalid Username  <br />";
	
	echo "<a href='loginpage.html'> Go back to login page </a>";
}
/*
1) We shouldnt allow similar usernames. (Y)
2) make the go back to login page work. (Y)
3) We shouldnt allow null usernames and passwords.(Y)
*/
?>

