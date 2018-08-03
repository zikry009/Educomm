<html>
<head>
<title>Student Registration</title>
<link href="stud_reg.css" rel="stylesheet">
<script type="text/javascript">
function myfun()
{
	var a=document.getElementById("p").value;
	var b=document.getElementById("rp").value;
	var c=document.getElementById("phone").value;
	if(a.length<6)
	{
		alert("Password must greater than 6");
	}
	if(b!=a)
	{
		alert("Password Not Match");
	}
	if(c.length>10 || c.length<10)
	{
		alert("Mobile number entered is invalid");
	}
}
</script>
</head>
<body>
<div class="sup">
<form method="POST" action="">
<h1>Sign Up Free Here</h1>
<hr>
<input name="f" id="f" type="text" placeholder="First Name" required autofocus/>
<input name="l" id="l" type="text" placeholder="Last Name" required /><br/><p/>
<input name="e" id="e" type="email" placeholder="Email Address" required/><br/><p/>
<input name="u" id="u" type="text" placeholder="UserName" required/><br/><p/>
<input name="i" id="i" type="text" placeholder="Institute Name" required/><br/><p/>
<input name="p" id="p" type="password" placeholder="Password" required/>
<input name="rp" id="rp" type="password" placeholder="Retype Password" required/><br/><p/>
<input name="std" id="std" type="text" placeholder="Enter Standard">
<input name="enrol" id="enrol" type="text" placeholder="Enter Enrollment No."><br/><p/>
<input name="phone" id="phone" type="text" maxlength="10" placeholder="Enter 10 digits mobile no."><br/><p/>
<input type="radio" name="g" id="m" value="Male"/>Male
<input type="radio" name="g" id="fe" value="Female"/>Female<br/><p/>
<input type="checkbox" name="c" id="c" required>Confirm<p/>
<input type="submit" value="Create Account" onclick="myfun()">
<a href="reg.html">Main Registration type</a>  
<a href="#">Go Home</a>
</form>
</div>
</body>
</html>