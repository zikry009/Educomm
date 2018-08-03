<!DOCTYPE html>
<html>
<head>
<title>Select Registration type</title>
<link rel="stylesheet" href="reg1.css">
<?php include("headerslinks.php");?>
<style>
nav ul li a:hover{
	background-color:white;
	color:black;
	cursor:pointer;
	display:block;
	padding:0px 12px;
	margin:2px;
	text-decoration:none;
	border:1px solid white;
}
</style>
</head>
<body>
<?php include("menu.php");?>
<div class="sup">
<h1> Select Registration Form</h1>
<hr>
<center>
<select id="list" name="list" onchange="myfun()">
<option value="" selected>Select</option>
<option value="Faculty">Faculty</option>
<option value="Admin">Admin</option>
</select>
</center>
</div>
<script>
function myfun()
{
switch(document.getElementById("list").value){
case "Faculty":
				window.location="tech_reg.php";
				break;
case "Admin":
				window.location="admin_reg.php";
				break;
default:
		window.location="reg.html";
		break;
}
	
}
</script>
</body>
</html>