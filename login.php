<!DOCTYPE html>
<html>
<head>
<title>Select Login Form</title>
<link rel="stylesheet" href="login1.css">
<?php include("headerslinks.php");?>
<style>
body{
	margin: 0;
    padding: 0;
    font-family: "Helvetica",sans-serif;
}
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
header {
      width: 100%;
      height: 10vh;
}
.logo {
      line-height: 60px;
      position: fixed;
      float: left;
      margin: 16px 46px;
      color: #fff;
      font-weight: bold;
      font-size: 20px;
      letter-spacing: 2px;
	  
}

nav {
      position: fixed;
      width: 100%;
      line-height: 60px;
	  z-index:100;
}
nav .logo img{
	height:75px;
}
nav ul {
      line-height: 60px;
      list-style: none;
      background: rgba(0, 0, 0, 0);
      overflow: hidden;
      color: #fff;
      padding: 0;
      text-align: right;
      margin: 0;
      padding-right: 40px;
      transition: 1s;
}

nav.black ul {
      background:black;
}

nav ul li {
      display: inline-block;
      padding: 16px 40px;;
}

nav ul li a {
      text-decoration: none;
      color: #fff;
      font-size: 16px;
	  text-transform:uppercase;
}

.menu-icon {
      line-height: 60px;
      width: 100%;
      background: #000;
      text-align: right;
      box-sizing: border-box;
      padding: 15px 24px;
      cursor: pointer;
      color: #fff;
      display: none;
}

@media(max-width: 786px) {

      .logo {
            position: fixed;
            top: 0;
            margin-top: 16px;
      }

      nav ul {
            max-height: 0px;
            background: #000;
      }

      nav.black ul {
            background: #000;
      }

      .showing {
            max-height: 34em;
      }

      nav ul li {
            box-sizing: border-box;
            width: 100%;
            padding: 24px;
            text-align: center;
      }

      .menu-icon {
            display: block;
      }

}
</style>
</head>
<body>
<?php include("menu.php");?>
<div class="sup">
<h1> Select Login Form</h1>
<hr>
<center>
<select id="list" name="list" onchange="myfun()">
<option value="" selected>Select</option>
<option value="Engineering College">Engineering College</option>
<option value="School">School</option>
<option value="Tutions/Private Tutors">Tutions/Private Tutors</option>
<option value="Faculty">Faculty</option>
<option value="Student">Student</option>
</select>
</center>
</div>
<script>
function myfun()
{
switch(document.getElementById("list").value){
case "Engineering College":
				window.location="clglogin.html";
				break;
case "School":
				window.location="schoollogin.html";
				break;
case "Tutions/Private Tutors":
				window.location="tutlogin.html";
				break;
case "Faculty":
				window.location="Facultylogin.html";
				break;				
case "Student":
				window.location="studlogin.html";
				break;
default:
		window.location="login.php";
		break;
}
	
}
</script>
</body>
</html>