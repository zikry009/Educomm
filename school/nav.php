<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
          <?php $home="adminpanel.php?user=".$_SESSION['user']."inst=".$_SESSION['institute_name'];?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $home.'/home'?>" class="nav-link">Home</a>
      </li>
    <li class="nav-item d-none d-sm-inline-block">
     <a href="logout.php" class="nav-link">
         <i class="fa fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </nav>