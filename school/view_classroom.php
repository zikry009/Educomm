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
            <h1>View CLassrooms</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <?php $home="adminpanel.php?user=".$_SESSION['user']."inst=".$_SESSION['institute_name'];?>
              <li class="breadcrumb-item"><a href="<?php echo $home; ?>">Home</a></li>
              <li class="breadcrumb-item active">View Classrooms</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content --
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Classrooms Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php $u=$_SESSION['user'];
                     $i=$_SESSION['institute_name'];
                $insert=true;
                     $con=mysqli_connect("localhost","root","");
                     mysqli_select_db($con,$i);
                    $test=mysqli_query($con,"SELECT 1 FROM classroom");
                    if(!$test)
                    {
                        $insert=false;
                        echo '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-warning"></i> Alert!</h5>No Classrooms has been added.</div>';
                    }
                if($insert)
                {    
                  $result=mysqli_query($con,"SELECT * FROM classroom");
                    if(mysqli_num_rows($result)>=1)
                    {  
                        echo '<table  class="table table-responsive table-hover">';
                        echo '<thead>
                        <tr>
                        <th>Class Name</th>
                        <th>Student Capacity</th>
                        <th>Room No.</th>
                        </tr>
                        </thead>
                        <tbody>';
                        while($row=mysqli_fetch_array($result))
                        {
                            echo '<tr><td>'.$row['classname'].'</td><td>'.$row['studcapacity'].'</td><td>'.$row['roomno'].'</td></tr>';
                        }
                          echo '</tbody>
                                <tfoot>
                                <tr>
                            <th>Class Name</th>
                            <th>Student Capacity</th>
                            <th>Room No.</th>
                            </tr>
                            </tfoot>
                            </table>';
                    }
                    else
                    {
                         echo '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-warning"></i> Alert!</h5>No Classrooms has been added.</div>';
                    }
               } 
                mysqli_close($con);?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>  <!-- Content Wrapper close -->
<?php include("footer.php");?>
<?php include("supportscript.php");?>
  
  