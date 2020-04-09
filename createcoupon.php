<?php

	session_start();

	$con=mysqli_connect("localhost","kakaral","Harika@12345");

	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");
	$result=mysqli_query($con,"SELECT num FROM coupons WHERE name='$_SESSION[user]'");
	if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sql="INSERT INTO coupons(id, num, name) VALUES('$_POST[id]', '$_POST[num]','$_SESSION[user]')";

		if(!mysqli_query($con,$sql))
		{
			die('Error :'.mysqli_error($con));
		}
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Coupon Created Succesfully')
    window.location.href='freelancer.php';
    </SCRIPT>");
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' You cant create coupons')
    window.location.href='freelancer.php';
    </SCRIPT>");
	}

	mysqli_close($con);
?>