<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eaid']==0)) {
  header('location:logout.php');
  }

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WElCOME | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
 
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" name="search" method="post" action="track.php">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="searchdata" type="search" placeholder="Tracking Number" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" name="search" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

    <!-- Right navbar links -->
   <!--  <ul class="navbar-nav ml-auto">
     <?php
               $ret1=mysqli_query($con,"select ID,fname,lname,mname,ApplyDate,file from  tblappointment where Status=''");
             $num=mysqli_num_rows($ret1);

           ?>  
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $num;?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">You have <?php echo $num;?> Notification</span>
          <div class="dropdown-divider"></div>
          <?php if($num>0){
                    while($result=mysqli_fetch_array($ret1))
                     {
            ?>
             <div class="dropdown-divider"></div>
           
       
           <a class="dropdown-item" href="view-appointment.php?viewid=<?php echo $result['ID'];?>">
            <div class="media">
              <img src="uploads/<?php echo $result['file']; ?>" alt="User Avatar" class="img-size-50 img-square mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                    New Scholar received from<br /> <?php echo $result['fname'];?> <?php echo $result['lname'];?><br> Apply Date:<br><?php echo $result['ApplyDate'];?>
                  <span class="float-right text-sm text-warning"><i class="fas fa-book"></i></span>
                </h3>
                <div class="dropdown-divider"></div>
              </div>
            </div></a>
              





          <?php }} else {?>
    <a class="dropdown-item" href="all-appointment.php">No New Scholar Received</a>
        <?php } ?>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul> -->
  </nav>



   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../image/aurora_logo.png" alt="A Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">e_Assis v2</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <!--  <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">
                    <?php
                     $adid=$_SESSION['eaid'];
                     $ret=mysqli_query($con,"select name, level from users where id='$adid'");
                     $row=mysqli_fetch_array($ret);
                     $name=$row['name'];
                     $level=$row['level'];
                     ?> 
          <a href="#" class="d-block"><?php  echo $row['name'];?></a>
             <a href="#" class="d-block"><?php  echo $row['level'];?></a></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                DASHBOARD
               
              </p>
            </a>
          </li>
      
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                MANAGE SCHOLARS
                <i class="fas fa-angle-left right"></i>
          
              </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                <a href="add_scholar.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD SCHOLARS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="approved_scholar.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>APROVED SCHOLARS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="disapproved_scholar.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DISAPROVED SCHOLARS</p>
                </a>
              </li>
         
             
             
            </ul>
          </li>

            <li class="nav-item">
            <a href="logout.php" class="nav-link active">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
               LOGOUT
               
              </p>
            </a>
          </li>
 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- /.navbar -->


<aside class="control-sidebar control-sidebar-dark">
  <BR>
  <BR>
    <!-- Control sidebar content goes here -->
    <!-- <br>
    <div class="p-10"> -->
      <!--  <div class="card-header">
            
                <center>
                <div class="card-tools"> -->
                   <!--   <button type="button" data-toggle="modal" data-target="#photo" class="btn btn-block bg-gradient-success"><i class="fa fa-book"></i> UPDATE PHOTO</button> -->
                   <!--   <br>
                      <br>
             
                 <a href="logout.php" >  <button type="button"  class="btn btn-block bg-gradient-success"><i class="fa fa-power-off"></i> LOG OUT</button></a>
                 
                </div>
              </center>
              </div> -->
              

    <!-- </div> -->
  </aside>