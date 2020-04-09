<?php
session_start();

	$con=mysqli_connect("localhost","kakaral","Harika@12345");
	if(!$con)
	{
		die('Error connecting to server :'.mysqli_error());
	}
	mysqli_select_db($con,"kakaral_wp1");
    $r1 = mysqli_query($con,"SELECT id, uname FROM post WHERE id='$_POST[postid]' && uname='$_SESSION[user]'");
     $r2 = mysqli_query($con, "SELECT fullname FROM freelancers WHERE name='$_SESSION[user]'");
    if(mysqli_fetch_array($r1,MYSQLI_ASSOC))
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You cant Respond to your own post!')
        window.location.href='homepage.php';
        </SCRIPT>");
    }
    else if(!mysqli_fetch_array($r2,MYSQLI_ASSOC))
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert(' First Register as FreeLancer! ')
        window.location.href='freelancer.php';
        </SCRIPT>");
    }
    else
    {

        $result=mysqli_query($con,"SELECT postid, rname FROM response WHERE postid='$_POST[postid]' && rname='$_SESSION[user]'");
        if(mysqli_fetch_array($result,MYSQLI_ASSOC))
    	{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Already Submitted')
            window.location.href='homepage.php';
            </SCRIPT>");
        }
        else
        {
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

		    $sql= "INSERT INTO response (postid, rname, rfullname, rdegree, rskills, rphone, remail) VALUES('$_POST[postid]','$_SESSION[user]','$_SESSION[fullname]','$_SESSION[degree]','$_SESSION[skills]','$_SESSION[phone]','$_SESSION[email]')";
			 if(!mysqli_query($con,$sql))
			 {
		         die('Error :'.mysqli_error($con));
			 }
			 echo ("<SCRIPT LANGUAGE='JavaScript'>
	         window.alert(' Response Submitted')
	         window.location.href='homepage.php';
	         </SCRIPT>");
        }
	}

			mysqli_close($con);
?>