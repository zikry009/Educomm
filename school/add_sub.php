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
            <h1>Subject Registration Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <?php $home="adminpanel.php?user=".$_SESSION['user']."inst=".$_SESSION['institute_name'];?>
              <li class="breadcrumb-item"><a href="<?php echo $home; ?>">Home</a></li>
              <li class="breadcrumb-item active">Add Subject</li>
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
                <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="Class Name">Class Name</label>
                    <input type="text" class="form-control" name="cname" placeholder="Enter Class Name(eg. Class 1A or Class 1B)" required>
                  </div>
                  <div class="form-group">
                    <label>Total Subject</label>
                    <select class="form-control" id="num" name="tsub" required onchange="myfun()">
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
                         <div id="sub">
                         </div>     
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
        </div><!--col-->
          </div>
        </div>
        </div>
</section>      
</div>  <!-- Content Wrapper close -->
<script>
function myfun()
{
    var a=document.getElementById("num").value;
    var a1=Number(a);
    var b=new Array(a);
    var c=document.getElementById("sub");
    while(c.hasChildNodes()){c.removeChild(c.lastChild);}
    for(i=0;i<a1;i++)
        {
             b[i]=document.createElement("INPUT");
             b[i].setAttribute("type","text");
             b[i].setAttribute("placeholder","Enter Subject Name");
             b[i].setAttribute("name","sub"+i);
            c.appendChild(b[i]);
        }
    
    
}
</script>
<?php include("footer.php");?>
<?php include("supportscript.php");?>
