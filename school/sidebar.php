
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
       <?php $home="adminpanel.php?user=".$_SESSION['user']."inst=".$_SESSION['institute_name'];?>
    <a href="<?php echo $home.'/home'?>" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="Admin" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
     <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo $home; ?>" class="d-block"><?php echo $_SESSION['user'];?></a>
        </div>
      </div>
      <!-- Sidebar user panel (optional) -->
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php $home="adminpanel.php?user=".$_SESSION['user']."inst=".$_SESSION['institute_name'];?>  
                <a href="<?php echo $home.'/home'?>" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="logout.php" class="nav-link active">
                 <i class="fa fa-sign-out nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Classrooms
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
              <li class="nav-item">
                <a href="class_form.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Classroom</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_classroom.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Classrooms</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="remove_classroom.php" class="nav-link">
                  <i class="fa fa-trash-o nav-icon" aria-hidden="true"></i>
                  <p>Remove Classrooms</p>
                </a>
              </li>    
            </ul>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Subjects
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_sub.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Subjects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-trash-o nav-icon"></i>
                  <p>Remove Subjects</p>
                </a>
              </li>
            </ul>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Forms
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="teacher_forms.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Teacher</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="student_form.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="moderator_form.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Admin</p>
                </a>
              </li>
            </ul>
          </li>    
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-info" aria-hidden="true"></i>
              <p>
                Information
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="search_teacher.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Search Teacher</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="search_student.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Search Students(Uname)</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="search_studentsid.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Search Students(SID)</p>
                </a>
              </li>    
            </ul>
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-trash-o" aria-hidden="true"></i>
              <p>
                 Remove Information
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="remove_teacher.php" class="nav-link">
                  <i class="fa fa-trash-o nav-icon"></i>
                  <p>Remove Teacher</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="remove_student.php" class="nav-link">
                  <i class="fa fa-trash-o nav-icon"></i>
                  <p>Remove Students</p>
                </a>
              </li>
            </ul>     
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Calendar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>