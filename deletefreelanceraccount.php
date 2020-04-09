<?php

	session_start();

	$con=mysqli_connect("localhost","kakaral","Harika@12345");

	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");
	$result=mysqli_query($con,"SELECT name FROM freelancers WHERE name='$_SESSION[user]'");
	if(mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$a1=$_SESSION['user'];
        
        $sql2 = mysqli_query($con,"DELETE FROM hired WHERE name='$a1'");
        
		$sql1="DELETE FROM freelancers WHERE name='$a1'";
		/*$sql="UPDATE freelancers SET name='$a2' fullname='$a3', degree='$a4', skills='$a5', phone='$a6', email='$a7' WHERE name='$a1'";*/

		if(!mysqli_query($con,$sql1))
		{
			die('Error :'.mysqli_error($con));
		}
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Your FreeLancer Account Deleted')
    window.location.href='myaccount.php';
    </SCRIPT>");
	}
	else {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' You dont have Freelancer Account')
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