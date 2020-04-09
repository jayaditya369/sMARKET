<?php
session_start();

	$con=mysqli_connect("localhost","kakaral","Harika@12345");
	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");
  $r1 = mysqli_query($con,"SELECT name,fullname FROM freelancers WHERE fullname='$_POST[postfullname]' && name='$_SESSION[user]'");
  if(mysqli_fetch_array($r1,MYSQLI_ASSOC))
  {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('You cant hire yourself!')
    window.location.href='freelancer.php';
    </SCRIPT>");
  }
  else {

      $result=mysqli_query($con,"SELECT hname, fullname FROM hired WHERE fullname='$_POST[postfullname]' && hname='$_SESSION[user]'");
      if(mysqli_fetch_array($result,MYSQLI_ASSOC))
    	{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Already Hired')
        window.location.href='homepage.php';
        </SCRIPT>");
      }
      else
      {

			     $sql= "INSERT INTO hired (hname, name, fullname) VALUES('$_SESSION[user]','$_POST[postname]', '$_POST[postfullname]')";
			     if(!mysqli_query($con,$sql))
			     {
				         die('Error :'.mysqli_error($con));
			     }
			     echo ("<SCRIPT LANGUAGE='JavaScript'>
	         window.alert(' Succesfully Hired')
	         window.location.href='homepage.php';
	         </SCRIPT>");
      }
	}

			mysqli_close($con);
?>