<link href="admin_css.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="sup">
<?php if(isset($_POST["submit"]))
{
	$f=$_POST["f"];
	$l=$_POST["l"];
	$min=3;
	$i=array();
	$h="h@.comm";
if ( preg_match('/\s/',$h) )
{
    echo "yes $h contain whitespace";  
} 
if (count(explode(' ', $h)) > 1) {
  echo "whitespace";
}
	if(strlen($f)<$min)
	{
			$i[]="ERRoR";
	}
	if(strlen($l)<$min)
	{
				$i[]="ERRoR";
	}
	$q=json_encode($i);
	
	if(!empty($i))
	{
	foreach($i as $w)
	{
		echo $w;
	}
	}
	

	
}
?>
<form method="POST" action="newd.php">
<h1>Sign Up Free Here</h1>
<hr>
<p><input name="f" id="f" type="text" placeholder="First Name" required autofocus/>
<input name="l" id="l" type="text" placeholder="Last Name" required/><br/></p>
<input type="submit" name="submit" value="Create Account"><p/>
</form>
</div>