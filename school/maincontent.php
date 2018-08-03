
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Dashboard</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
              <?php $home="adminpanel.php?user=".$_SESSION['user']."inst=".$_SESSION['institute_name'];?>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $home.'/home'?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php $con=mysqli_connect("localhost","root","");
                    mysqli_select_db($con,"educomm");
                  $i=$_SESSION['institute_name'];
                  $d=0;
                  $sql="SELECT id FROM admins WHERE iname='$i'";
                  $result=mysqli_query($con,$sql);
                  $d=mysqli_num_rows($result);    
                     if($d==0)
                    {
                        echo $d;
                    }
                    else
                    {
                        echo $d ;
                    }?></h3>

                <p>Admins</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <?php 
                    mysqli_select_db($con,"");
                    $t=0;
                    $test=mysqli_select_db($con,$_SESSION['institute_name']);
                    if($test)
                    {        
                        $sql="SELECT id FROM teachers WHERE iname='$i'";
                        $result=mysqli_query($con,$sql);
                        if($result)
                        {    
                            $t=mysqli_num_rows($result);    
                        }
                     }?>
                <h3><?php if($t>=1){echo $t;}else{ echo $t;}?></h3>

                <p>Teachers</p>
              </div>
              <div class="icon">
                <i class="icon ion-ios-people"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  <?php 
                   $s=0;
                    mysqli_select_db($con,"");
                    $test=mysqli_select_db($con,$_SESSION['institute_name']);
                  if($test)
                  {
                    $sql="SELECT id FROM students WHERE iname='$i'";
                    $result=mysqli_query($con,$sql);
                      if($result)
                      {
                          $s=mysqli_num_rows($result); 
                      }
                       
                  }
                    ?>
                <h3><?php if($s>=1){echo $s;}else{ echo $s;}?></h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
            </div>
          </div>
            
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $_SESSION['institute_name'];?></h3>

                <p>Institude</p>
              </div>
              <div class="icon">
               <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
             <!-- Calendar -->
            <div class="card bg-success-gradient">
              <div class="card-header no-border">

                <h3 class="card-title">
                  <i class="fa fa-calendar"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                      <a href="pages/calendar.html" class="dropdown-item">Add new event</a>
                      <a href="pages/calendar.html" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="pages/calendar.html" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->