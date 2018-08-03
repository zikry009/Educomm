 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<p>HEllo</p>
<div>  <?php
$error=[];
$error[]="Please select proper fields";
$error[]="hi";
$e="hi";
$s=json_encode($error);
function validation_errors($error_msg){
 $error_message=<<<DELIMITER
 <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong>$error_msg
</div>
DELIMITER;
return $error_message;
}
$q=number_format("1234");
echo $q;
if(!empty($error))
			{
				foreach($error as $errors)
				{
					echo validation_errors($errors);
				}
			}
?>
</div>
<button onclick="myfun()">Hi</button>
<div id="id">HEllo</div>
Hey