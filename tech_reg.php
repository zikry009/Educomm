<!DOCTYPE html>
<html>
<head>
<title>Faculty Registration</title>
<link href="tech_reg1.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include("headerslinks.php");?>
</head>
<body>
<?php include("menu.php");?>
<div class="sup">
<form method="POST" action="tech_reg.php">
<?php
if(isset($_POST["submit"]))
{
	$con=mysqli_connect("localhost","root","");
	$f=$_POST["f"];
	$l=$_POST["l"];
	$e=$_POST["e"];
	$u=$_POST["u"];
	$i=$_POST["i"];
	$g=$_POST["g"];
	$p1=$_POST["p"];
	$rp1=$_POST["rp"];
	$p=md5($_POST["p"]);
	$rp=md5($_POST["rp"]);
	$phone=$_POST["phone"];
	$q=$_POST["q"];
	$error=[];
	function validation_errors($error_msg)
	{
	$error_message=<<<DELIMITER
	<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong>Warning!</strong>$error_msg
	</div>
DELIMITER;
	return $error_message;
}
	function reg($f,$l,$e,$u,$i,$p,$phone,$g,$con,$q)
	{
		mysqli_select_db($con,$i);
		$sql="INSERT INTO teachers(fname,lname,idemail,uname,iname,passwords,mobile,gender,qualification) VALUES('$f','$l','$e','$u','$i','$p','$phone','$g','$q')";
		$success=mysqli_query($con,$sql);
	return true;
}
	$insert=true;
	$min=3;
	$pmin=6;
	$max=26;
	if(!$con)
	{
	echo "error Occur";
	}
		$w=mysqli_select_db($con,$i);
			$test=mysqli_query($con,"SELECT 1 FROM teachers");
			if(!$test)
			{
				$sql="CREATE TABLE teachers(id BIGINT(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				fname VARCHAR(26) NOT NULL,lname VARCHAR(26) NOT NULL,idemail VARCHAR(255) NOT NULL,
				uname VARCHAR(26) NOT NULL,iname VARCHAR(255) NOT NULL,passwords TEXT NOT NULL,mobile VARCHAR(10) NOT NULL,gender VARCHAR(12) NOT NULL,qualification VARCHAR(255) NOT NULL)";
				mysqli_query($con,$sql);
			}
			if(strlen($f)<$min)
			{
				$error[]="First Name cannot less than 3 characters";
			}
			if(strlen($f)>$max)
			{
				$error[]="First Name cannot greater than 26 characters";
			}
			if(preg_match('/\s/',$f))
			{
				$error[]="First Name cannot contains whitespaces";
			}
			if(strlen($l)<$min)
			{
				$error[]="Last Name cannot less than 3 characters";
			}
			if(strlen($l)>$max)
			{
				$error[]="Last Name cannot greater than 26 characters";
			}
			if(preg_match('/\s/',$l))
			{
				$error[]="Last Name cannot contains whitespaces";
			}
			$result=mysqli_query($con,"SELECT id FROM teachers WHERE idemail='$e'");
			if(mysqli_num_rows($result)>=1)
			{
				$error[]="Email id Already Exists";
			}
			if(preg_match('/\s/',$e))
			{
				$error[]="Email cannot contains whitespaces";
			}
			if(strlen($u)<$min)
			{
				$error[]="Userame cannot less than 3 characters";
			}
			if(strlen($u)>$max)
			{
				$error[]="Username cannot greater than 26 characters";
			}
			if(preg_match('/\s/',$u))
			{
				$error[]="Username cannot contains whitespaces";
			}
			$result=mysqli_query($con,"SELECT id FROM teachers WHERE uname='$u'");
			if(mysqli_num_rows($result)>=1)
			{
				$error[]="UserName Already Exists";
			}
			if(!mysqli_select_db($con,$i))
			{
				$error[]="Your Institute not Register";
			}
			if(strlen($q)<$min){
				$error[]="Qualification cannot less than 3 characters";
			}
			if(strlen($p1)<$pmin)
			{
				$error[]="Password must greater than 6 characters";
			}
			if(preg_match('/\s/',$p1))
			{
				$error[]="Password cannot contains whitespaces";
			}
			if($p!=$rp)
			{
				$error[]="Password Fields Not Match";
			}
			
			if(strlen($phone)!=10)
			{
				$error[]="Please Enter Valid Mobile number";
			}
			if(!empty($error))
			{   $insert=false;
				foreach($error as $errors)
				{
					echo validation_errors($errors);
				}
				
			}
			if($insert)
			{  
				
				if(reg($f,$l,$e,$u,$i,$p,$phone,$g,$con,$q))
				{
					header("Location: login.php");
				}
			}
		
mysqli_close($con);
	
}
?>
<h1>Sign Up Free Here</h1>
<hr>
<p><input name="f" id="f" type="text" placeholder="First Name" required autofocus/>
<input name="l" id="l" type="text" placeholder="Last Name" required /><br/><p/>
<input name="e" id="e" type="email" placeholder="Email Address" required/><br/><p/>
<input name="u" id="u" type="text" placeholder="UserName" required/><br/><p/>
<input name="i" id="i" type="text" placeholder="Institute Name" required/><br/><p/>
<input name="q" id="q" type="text" placeholder="Qualification(eg. BCA,MCA or BE(CSE)" required/><br/><p/>
<input name="p" id="p" type="password" placeholder="Password" required/>
<input name="rp" id="rp" type="password" placeholder="Retype Password" required/><br/><p/>
<input name="phone" id="phone" type="text" maxlength="10" placeholder="Enter 10 digits mobile no."><br/><p/>
<input type="radio" name="g" id="m" value="Male"/>Male
<input type="radio" name="g" id="fe" value="Female"/>Female<br/><p/>
<input type="checkbox" name="c" id="c" required>Confirm<p/>
<input type="submit" value="Create Account" name="submit"><p/> 
</form>
</div>
</body>
</html>