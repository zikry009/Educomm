<?php session_start();?>
<?php include("head.php");?>
<?php include("nav.php");?>
<?php include("sidebar.php");?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher Registration Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                 <?php $home="adminpanel.php?user=".$_SESSION['user']."inst=".$_SESSION['institute_name'];?>
              <li class="breadcrumb-item"><a href='<?php echo $home; ?>'>Home</a></li>
              <li class="breadcrumb-item active">Add Teacher</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registration Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form role="form" method="post" action="teacher_forms.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="First Name">First Name</label>
                    <input type="text" class="form-control"  name="f" placeholder="Enter First Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input type="text" class="form-control" name="l" placeholder="Enter Last Name" required>
                  </div>
                  <div class="form-group">
                      <label for="exampleInstituteName">InstituteName</label>
                        <input type="text" class="form-control" name="is" placeholder="Enter InstituteName" value="<?php echo $_SESSION['institute_name']?>" required readonly>
                   </div>
                     <div class="form-group">
                    <label for="exampleUsername">Username</label>
                    <input type="text" class="form-control"  name="us" placeholder="Enter Username" required>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  name="e" placeholder="Enter email" required>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" class="form-control" name="p" placeholder="Enter Password" required>
                  </div> 
                     <div class="form-group">
                    <label for="exampleInputPassword">Retype Password</label>
                    <input type="password" class="form-control" name="rp" placeholder="Enter Retype Password" required>
                  </div>
                    <div class="form-group">
                    <label for="exampleInputQualification">Qualification</label>
                    <input type="text" class="form-control" name="q" placeholder="Enter Qualification (eg. BCA,MCA or BE(CSE),ME(CSE))" required>
                  </div>  
                   <div class="form-group">
                    <label for="exampleInputMoblie">Moblie</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter Moblie no" required>
                  </div>  
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="g" required>
                        <option>Select</option>        
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input">
                    <label class="form-check-label" for="exampleCheck1">Confirm</label>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default float-right">Reset</button>     
                </div>
              </form>
              </div>
            </div><!--col-->
<div class="col-md-6"><div class="card-body">            
<?php if(isset($_POST["submit"]))
{
	$f=$_POST["f"];
	$l=$_POST["l"];
	$e=$_POST["e"];
	$us=$_POST["us"];
	$is=$_POST["is"];
	$g=$_POST["g"];
	$p1=$_POST["p"];
	$rp1=$_POST["rp"];
	$p=md5($_POST["p"]);
	$rp=md5($_POST["rp"]);
	$phone=$_POST["phone"];
	$q=strtoupper($_POST["q"]);
    $min=3;
	$pmin=6;
	$max=26;
    $u=$_SESSION['user'];
    $i=$_SESSION['institute_name'];
    $insert="true";    
    $error=[];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,$i);
    $test=mysqli_query($con,"SELECT 1 FROM teachers");
    if(!$test)
    {
        $sql="CREATE TABLE teachers(id BIGINT(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				fname VARCHAR(26) NOT NULL,lname VARCHAR(26) NOT NULL,idemail VARCHAR(255) NOT NULL,
				uname VARCHAR(26) NOT NULL,iname VARCHAR(255) NOT NULL,passwords TEXT NOT NULL,mobile VARCHAR(10) NOT NULL,gender VARCHAR(12) NOT NULL,qualification VARCHAR(255) NOT NULL)";
        mysqli_query($con,$sql);
    }
    else
    {    
        if(strlen($f)<$min)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-warning"></i> Alert!</h5>First Name cannot less than 3 characters.</div>';
        }
        if(strlen($f)>$max)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-warning"></i> Alert!</h5>First Name cannot greater than 26 characters.</div>';
        }
        if(preg_match('/\s/',$f))
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>First Name cannot contains whitespaces.</div>';
        }
        if(strlen($l)<$min)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-    hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Last Name cannot less than 3 characters.</div>';
        }
        if(strlen($l)>$max)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Last Name cannot greater than 26 characters.</div>';   
        }
        if(preg_match('/\s/',$l))
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Last Name cannot contains whitespaces.</div>';   
        }
        $result=mysqli_query($con,"SELECT id FROM teachers WHERE idemail='$e'");
        if(mysqli_num_rows($result)>=1)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Email id Already Exists.</div>'; 
        }
        if(preg_match('/\s/',$e))
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Email cannot contains whitespaces.</div>'; 
        }
        if(strlen($us)<$min)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Userame cannot less than 3 characters.</div>'; 
        }
        if(strlen($us)>$max)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Username cannot greater than 26 characters.</div>';
        }
        if(preg_match('/\s/',$us))
        {    
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Username cannot contains whitespaces.</div>';
        }
        $result=mysqli_query($con,"SELECT id FROM teachers WHERE uname='$us'");
        if(mysqli_num_rows($result)>=1)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>UserName Already Exists.</div>';
        }
        if($is!=$i)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Wrong Institute Name.</div>';
        }
        if(strlen($q)<$min)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Qualification cannot less than 3 characters.</div>';
        }
        if(strlen($p1)<$pmin)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Password must greater than 6 characters.</div>';   
        }
        if(preg_match('/\s/',$p1))
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Password cannot contains whitespaces.</div>';  
        }
        if($p!=$rp)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Password Fields Not Match.</div>';  
        }
        if(strlen($phone)!=10)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Please Enter Valid Mobile number(10 digits).</div>'; 
        }
        if(!empty($error))
        {
            $insert=false;
            foreach($error as $errors)
				{
					echo $errors;
				}
        }
    }
    if($insert)
    {
        $sql="INSERT INTO teachers(fname,lname,idemail,uname,iname,passwords,mobile,gender,qualification) VALUES('$f','$l','$e','$us','$is','$p','$phone','$g','$q')";
        $sucess=mysqli_query($con,$sql);
        if($sucess)
        {
                     echo ' 
                    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-check"></i> Alert!</h5>
                  Successfully Added Teacher.
                </div> ';
        }
        else
        {
                echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                  Unable to Add Teacher.
                </div>';
        }
    }
    
    mysqli_close($con);
    
}?>
            </div><!--col-->
            
          </div><!--row-->
        </div><!--container-->
        </div>
</section>      
</div>  <!-- Content Wrapper close -->
<?php include("footer.php");?>
<?php include("supportscript.php");?>
