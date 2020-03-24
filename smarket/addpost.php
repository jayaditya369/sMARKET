<?php

	session_start();

	$con=mysqli_connect("localhost","root","");
	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");
		$n1=$_SESSION["n"];

		if($n1>0)
		{
			$sql= "INSERT INTO post(uname, type, work) VALUES('$_SESSION[user]','$_POST[skill]','$_POST[wpost]')";
			$n1= $n1-1;
			$_SESSION["n"] = $n1;
			if(!mysqli_query($con,$sql))
			{
				die('Error :'.mysqli_error());
			}
			echo ("<SCRIPT LANGUAGE='JavaScript'>
	    window.alert(' Post Published')
	    window.location.href='homepage.php';
	    </SCRIPT>");
		}
		else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
	    window.alert(' Sorry, Your Post didnt published. You need to Upgrade your Account')
	    window.location.href='homepage.php';
	    </SCRIPT>");
		}

			mysqli_close($con);


/*
1) We shouldnt allow similar usernames. (Y)
2) make the go back to login page work. (Y)
3) We shouldnt allow null usernames and passwords.(Y)
*/
?>
