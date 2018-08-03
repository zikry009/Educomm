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
            <h1>Remove Student Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <?php $home="adminpanel.php?user=".$_SESSION['user']."inst=".$_SESSION['institute_name'];?>
              <li class="breadcrumb-item"><a href="<?php echo $home; ?>">Home</a></li>
              <li class="breadcrumb-item active">Remove Student</li>
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
                <h3 class="card-title">Remove Form By Username</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form role="form" method="post" action="remove_student.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="User Name">Enter Username</label>
                    <input type="text" class="form-control" name="uname" placeholder="Enter Username" required>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input">
                    <label class="form-check-label"  for="exampleCheck1">Confirm</label>
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
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Remove Form By StudentID</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form role="form" method="post" action="remove_student.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="sid">Enter StudentID</label>
                    <input type="text" class="form-control" name="sid" placeholder="Enter StudentID" required>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input">
                    <label class="form-check-label"  for="exampleCheck1">Confirm</label>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit2" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default float-right">Reset</button>     
                </div>
              </form>
              </div>
            </div><!--col-->
<div class="col-md-6"><div class="card-body">            
<?php if(isset($_POST["submit"]))
{
    $un=$_POST["uname"];
    $u=$_SESSION['user'];
    $i=$_SESSION['institute_name'];
    $insert="true";    
    $error=[];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,$i);
    $test=mysqli_query($con,"SELECT 1 FROM students");
    if(!$test)
    {
       $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-warning"></i> Alert!</h5>No Student has been added.</div>';  
        $error[]='<div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-info"></i> Alert!</h5>
                  Go to Add Student to Add Student.
                </div';
         if(!empty($error))
         {
            $insert=false;
             foreach($error as $errors)
				{
					echo $errors;
				}
        }
    }
   else
   {       
    $sql="SELECT id FROM students WHERE uname='$un'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==0)
    {
        $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-warning"></i> Alert!</h5>Username not exists or not register in Student form.</div>';
        
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
          $sql="DELETE FROM students WHERE uname='$un'";
        $sucess=mysqli_query($con,$sql);
        if($sucess)
        {
                     echo ' 
                    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-check"></i> Alert!</h5>
               Student Remove successfully.
                </div> ';
            
        }
        else
        {
                echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                  Unable to Student.
                </div>';
        }
    }
    
    mysqli_close($con);
    
}?>
            </div><!--col-->
    </div>
    
    <div class="col-md-6"><div class="card-body">            
<?php if(isset($_POST["submit2"]))
{
    $sid=$_POST["sid"];
    $u=$_SESSION['user'];
    $i=$_SESSION['institute_name'];
    $insert="true";    
    $error=[];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,$i);
    $test=mysqli_query($con,"SELECT 1 FROM students");
    if(!$test)
    {
       $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-warning"></i> Alert!</h5>No Student has been added.</div>';  
        $error[]='<div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-info"></i> Alert!</h5>
                  Go to Add Student to Add Student.
                </div';
         if(!empty($error))
         {
            $insert=false;
             foreach($error as $errors)
				{
					echo $errors;
				}
        }
    }
   else
   {       
    $sql="SELECT id FROM students WHERE sid='$sid'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==0)
    {
        $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-warning"></i> Alert!</h5>StudentID not exists or not register in Student form.</div>';
        
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
          $sql="DELETE FROM students WHERE sid='$sid'";
        $sucess=mysqli_query($con,$sql);
        if($sucess)
        {
                     echo ' 
                    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-check"></i> Alert!</h5>
               Student Remove successfully.
                </div> ';
            
        }
        else
        {
                echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                  Unable to Student.
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