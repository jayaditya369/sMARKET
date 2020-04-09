<?php

	session_start();

	$con=mysqli_connect("localhost","kakaral","Harika@12345");

	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");
	$query="SELECT id FROM post WHERE uname='$_SESSION[user]'";
	$result=mysqli_query($con,$query);
	if(mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		if($rg = $con->query($query))
		{
            while($row = $rg->fetch_assoc())
		    {
		    	$sq2="DELETE FROM response WHERE postid='$row[id]'";
		    	$r = $con->query($sq2);
		    }
		}
		$sql1="DELETE FROM post WHERE uname='$_SESSION[user]'";

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

?>