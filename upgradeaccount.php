<?php
	session_start();

	$con=mysqli_connect("localhost","kakaral","Harika@12345");

	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}

	mysqli_select_db($con,"kakaral_wp1");

	$result=mysqli_query($con,"SELECT num FROM coupons WHERE num='$_POST[coupon]'");

	if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Coupon')
    window.location.href='myaccount.php';
    </SCRIPT>");
	}
	else
	{

		$num=$_POST["coupon"];
		$n1=mysqli_query($con,"DELETE FROM coupons WHERE num='$num'");
		if(!mysqli_fetch_array($n1,MYSQLI_ASSOC))
		{
			$_SESSION["n"]=10;
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    	window.alert(' Coupon added Succesfully')
    	window.location.href='myaccount.php';
    	</SCRIPT>");
		}
		else {
			$_SESSION["n"]=10;
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    	window.alert(' Coupon added Succesfully.')
    	window.location.href='myaccount.php';
    	</SCRIPT>");
		}
  }

	mysqli_close($con);
?>