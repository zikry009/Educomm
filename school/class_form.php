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
            <h1>Classroom Registration Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="adminpanel.php">Home</a></li>
              <li class="breadcrumb-item active">Add Classroom</li>
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
                <form role="form" method="post" action="class_form.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="Class Name">Class Name</label>
                    <input type="text" class="form-control" name="cname" placeholder="Enter Class Name(eg. Class 1A or Class 1B)" required>
                  </div>
                  <div class="form-group">
                    <label for="Student Capacity">Student Capacity</label>
                    <input type="text" class="form-control" name="scap" placeholder="Enter Student Capacity" required>
                  </div>
                    <div class="form-group">
                    <label for="Room No.">Room No.</label>
                    <input type="text" class="form-control" name="roomno"  placeholder="Enter Room No." required>
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
<div class="col-md-6"><div class="card-body">            
<?php if(isset($_POST["submit"]))
{
    $cn=$_POST["cname"];
    $sc=$_POST["scap"];
    $ro=$_POST["roomno"];
    $u=$_SESSION['user'];
    $i=$_SESSION['institute_name'];
    $insert="true";    
    $error=[];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,$i);
    $test=mysqli_query($con,"SELECT 1 FROM classroom");
    if(!$test)
    {
        $sql="CREATE TABLE classroom(id BIGINT(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,classname VARCHAR(255) NOT NULL ,studcapacity VARCHAR(4) NOT NULL ,roomno VARCHAR(4) NOT NULL)";
        mysqli_query($con,$sql);
    }
    else
    {    
        $sql="SELECT id FROM classroom WHERE classname='$cn'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>=1)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-warning"></i> Alert!</h5>Class Name already exists.</div>';
        }
        if(strlen($sc)>2)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-warning"></i> Alert!</h5>Student Capacity exceeds.</div>';
        }
    
        $sql="SELECT id FROM classroom WHERE roomno='$ro'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>=1)
        {
            $error[]='<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-warning"></i> Alert!</h5>Room No. already assigned.</div>';
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
        $sql="INSERT INTO classroom(classname,studcapacity,roomno) VALUES('$cn','$sc','$ro')";
        $sucess=mysqli_query($con,$sql);
        if($sucess)
        {
                     echo ' 
                    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-check"></i> Alert!</h5>
                  Successfully Added Classroom.
                </div> ';
        }
        else
        {
                echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                  Unable to Add Classroom.
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