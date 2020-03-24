<?php

	session_start();

	$con=mysqli_connect("localhost","root","");

	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");
	$result=mysqli_query($con,"SELECT uname FROM post WHERE uname='$_SESSION[user]'");
	if(mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$a1=$_SESSION['user'];

		$sql1="DELETE FROM post WHERE uname='$a1'";

		if(!mysqli_query($con,$sql1))
		{
			die('Error :'.mysqli_error($con));
		}
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Your Posts have been deleted')
    window.location.href='myaccount.php';
    </SCRIPT>");
	}
	else {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' You didnt posted yet!')
    window.location.href='myaccount.php';
    </SCRIPT>");
	}


	mysqli_close($con);

/*
1) We shouldnt allow similar usernames. (Y)
2) make the go back to login page work. (Y)
3) We shouldnt allow null usernames and passwords.(Y)
*/
?>
