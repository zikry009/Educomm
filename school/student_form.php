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
            <h1>Student Registration Form</h1>
          </div>
          <div class="col-sm-6">
               <?php $home="adminpanel.php?user=".$_SESSION['user']."inst=".$_SESSION['institute_name'];?>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href='<?php echo $home;?>'>Home</a></li>
              <li class="breadcrumb-item active">Add Student</li>
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
                <form role="form" method="post" action="student_form.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="First Name">First Name</label>
                    <input type="text" class="form-control" name="f" placeholder="Enter First Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input type="text" class="form-control" name="l" placeholder="Enter Last Name" required>
                  </div>
                  <div class="form-group">
                      <label for="exampleInstituteName">Institute Name</label>
                        <input type="text" class="form-control" name="is" placeholder="Enter Institute Name" value="<?php echo $_SESSION['institute_name']?>" required readonly>
                   </div>
                     <div class="form-group">
                    <label for="exampleUsername">Username</label>
                    <input type="text" class="form-control" name="us" placeholder="Enter Username" required>
                  </div>
                    <div class="form-group">
                    <label for="exampleStudentID">StudentID</label>
                    <input type="text" class="form-control" name="sid" placeholder="Enter StudentID" required>
                  </div>
                    <div class="form-group">
                    <label for="exampleInputAddress1">Address</label>
                        <textarea rows="5" name="add" class="form-control" cols="10" placeholder="Enter Address" required></textarea>
                  </div> 
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="e" placeholder="Enter email(if any)">
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
                    <label for="exampleInputClass">Class</label>
                    <input type="text" class="form-control" name="class" placeholder="Enter Class(eg Class 1A or Class 1B)" required>
                  </div>  
                    <div class="form-group">
                    <label>Total Subject</label>
                      <select class="form-control"  name="tos" required>
                      <option value="">Select<option>        
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                      <div class="form-group">
                    <label for="exampleInputMoblie">Student Moblie</label>
                    <input type="text" class="form-control" name="sp" placeholder="Enter Student Moblie no" required>
                  </div>  
                       <div class="form-group">
                    <label for="exampleInputParentMoblie">Parent Moblie</label>
                    <input type="text" class="form-control" name="pp" placeholder="Enter Parent Moblie no" required>
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
            </div>
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
	$phone=$_POST["sp"];
	$pphone=$_POST["pp"];
    $c=$_POST["class"];
    $sid=$_POST["sid"];
    $tos=$_POST["tos"];
    $add=$_POST["add"];
    $min=3;
	$pmin=6;
	$max=26;
    $u=$_SESSION['user'];
    $i=$_SESSION['institute_name'];
    $insert="true";    
    $error=[];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,$i);
    $test=mysqli_query($con,"SELECT 1 FROM students");
    if(!$test)
    {
        $sql="CREATE TABLE students (id BIGINT(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,fname VARCHAR(26) NOT NULL,lname VARCHAR(26) NOT NULL , iname VARCHAR(255) NOT NULL,uname VARCHAR(26) NOT NULL,sid VARCHAR(255) NOT NULL UNIQUE KEY,address TEXT NOT NULL,idemail VARCHAR(255) NOT NULL,passwords TEXT NOT NULL,class VARCHAR(255) NOT NULL,tos VARCHAR(2) NOT NULL,mobile VARCHAR(10) NOT NULL,pmobile VARCHAR(10) NOT NULL,gender VARCHAR(20) NOT NULL)";
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
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria- hidden="true">&times;</button>
                   <h5><i class="icon fa fa-warning"></i> Alert!</h5>First Name cannot greater than 26 characters.</div>';
        }
        if(preg_match('/\s/',$f))
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>First Name cannot contains whitespaces.</div>';
        }
        if(strlen($l)<$min)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
        $result=mysqli_query($con,"SELECT id FROM students WHERE idemail='$e'");
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
        $result=mysqli_query($con,"SELECT id FROM students WHERE uname='$us'");
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
        $result=mysqli_query($con,"SELECT id FROM students WHERE sid='$sid'");
        if(mysqli_num_rows($result)>=1)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>StudentID Already Exists.</div>';
        }
        if(strlen($add)<15)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Please Enter Full Address.</div>';
        }
        if(strlen($tos)>3)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Total Subject cannot greater than 2 digits.</div>';
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
       if(strlen($pphone)!=10)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Please Enter Valid Parent Mobile number(10 digits).</div>'; 
        }
        if($phone==$pphone)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Student Moblie No. and Parent cannot be same.</div>'; 
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
        $sql="INSERT INTO students(fname,lname,iname,uname,sid,address,idemail,passwords,class,tos,mobile,pmobile,gender) VALUES('$f','$l','$is','$us','$sid','$add','$e','$p','$c','$tos','$phone','$pphone','$g')";
        $sucess=mysqli_query($con,$sql);
        if($sucess)
        {
                     echo ' 
                    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-check"></i> Alert!</h5>
                  Successfully Added Student.
                </div> ';
        }
        else
        {
                echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                  Unable to Add Student.
                </div>';
        }
    }
    
    mysqli_close($con);
    
}?>
            </div><!--col-->
          </div>
        </div>
    </div>
</section>      
</div>  <!-- Content Wrapper close -->
<?php include("supportscript.php");?>