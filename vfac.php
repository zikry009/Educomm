<?php
	if(isset($_POST["submit"]))
	{	
		$i=$_POST["institute_name"];
		$u=$_POST["username"];
		$p=md5($_POST["password"]);
		$con=mysqli_connect("localhost","root","");
		$w=mysqli_select_db($con,$i);
		if(!$w)
		{	
			echo "<script>alert('Your institute is not register');
			window.location='schoollogin.html';</script>";
		}
		else
		{
			$result=mysqli_query($con,"SELECT id FROM teacher where uname='$u' and passwords='$p'");
			$row=mysqli_num_rows($result);
			if($row==0||$row>1)
			{
			   echo "<script>alert('Username or Password is incorrect');
			   window.location='schoollogin.html';</script>";
			  
			}
			
			if($row==1)
			{	$_SESSION['user']=$u;
				if(isset($_SESSION['user']))
				{
					$_SESSION['institute_name']=$i;
					echo "<script>
					window.location='#'</script>";
				}
			}
		}
	}
?>