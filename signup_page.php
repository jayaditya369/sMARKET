<?php

if($_POST["psw"]==$_POST["psw1"] && $_POST["psw"]!="" && $_POST["uname"]!="")
{
	$con=mysqli_connect("localhost","kakaral","Harika@12345");
	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");

	$result=mysqli_query($con,"SELECT username FROM userdetails WHERE username='$_POST[uname]'");

	if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sql="INSERT INTO userdetails(username, password) VALUES('$_POST[uname]','$_POST[psw]')";

		if(!mysqli_query($con,$sql))
		{
			die('Error :'.mysqli_error($con));
		}

		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Registeration Succesfull')
    window.location.href='index.html';
    </SCRIPT>");
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Username Already Exists')
    window.location.href='index.html';
    </SCRIPT>");
	}

	mysqli_close($con);
}
else
{
	if($_POST["psw"]!=$_POST["psw1"])
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert(' Password Mismatch')
	window.location.href='index.html';
	</SCRIPT>");
	else
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert(' Invalid Username')
	window.location.href='index.html';
	</SCRIPT>");

}

?>