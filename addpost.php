<?php

	session_start();

	$con=mysqli_connect("localhost","kakaral","Harika@12345");
	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");
		$n1=$_SESSION["n"];
		$j1="SELECT id FROM post";
		$res=mysqli_query($con,$j1);
		if($n1>0)
		{
			if (mysqli_num_rows($res) > 0)
			{
				$_SESSION['uid']=$_SESSION['uid']+1;
			}
			else {
				$_SESSION['uid']=1;
			}
			$sql= "INSERT INTO post(id,uname, type, work) VALUES('$_SESSION[uid]','$_SESSION[user]','$_POST[skill]','$_POST[wpost]')";
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
		else
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
	        window.alert(' Sorry, Your Post didnt published. You need to Upgrade your Account')
	        window.location.href='homepage.php';
	        </SCRIPT>");
		}

		mysqli_close($con);

?>