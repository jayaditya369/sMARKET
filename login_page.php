<?php
	ini_set( "display_errors", 0);

	session_start();

	$con=mysqli_connect("localhost","kakaral","Harika@12345");

	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}

	mysqli_select_db($con,"kakaral_wp1");

	$result=mysqli_query($con,"SELECT username,password FROM userdetails WHERE username='$_POST[uname]' && password='$_POST[psw]'");

	if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Wrong Login, Go back & try again')
        window.location.href='index.php';
        </SCRIPT>");
	}
	else
	{
		$_SESSION["access"]=1;
		$_SESSION["user"]=$_POST[uname];
		$_SESSION["n"]=2;
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Login Succesfull')
    window.location.href='homepage.php';
    </SCRIPT>");
		//header('Location: homepage.php');
    }

	mysqli_close($con);
?>