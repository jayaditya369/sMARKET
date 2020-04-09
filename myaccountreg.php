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
		$a3=$_POST['fname'];
		$a4=$_POST['deg'];
		$a5=$_POST['skills'];
		$a6=$_POST['phone'];
		$a7=$_POST['email'];
		$sql1="DELETE FROM freelancers WHERE name='$a1'";
		$sql2="INSERT INTO freelancers(name, fullname, degree, skills, phone, email) VALUES('$a1', '$a3', '$a4','$a5','$a6', '$a7' )";
		if(!(mysqli_query($con,$sql1)&&mysqli_query($con,$sql2)))
		{
			die('Error :'.mysqli_error($con));
		}
		$q1 = "SELECT * FROM freelancers WHERE name='$_SESSION[user]'";
            if ($r = $con->query($q1))
      		{
      			while ($row = $r->fetch_assoc())
      			{
                    $_SESSION['fullname'] = $row['fullname'];
            		$_SESSION['degree'] = $row['degree'];
            		$_SESSION['skills'] = $row['skills'];
            		$_SESSION['phone'] = $row['phone'];
            		$_SESSION['email'] = $row['email'];
                }
            }
        $sql3="UPDATE hired SET fullname='$_SESSION[fullname]' WHERE name='$_SESSION[user]'";
        $sql4 = mysqli_query($con,$sql3);
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(' Your FreeLancer Account update Succesfull')
        window.location.href='myaccount.php';
        </SCRIPT>");
	}
	else {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Nothing to Save')
        window.location.href='myaccount.php';
        </SCRIPT>");
	}


	mysqli_close($con);
?>