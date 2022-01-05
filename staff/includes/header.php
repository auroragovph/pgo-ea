<?php
session_start();
error_reporting(0);
include('./includes/dbconnection.php');
if (strlen($_SESSION['eaid']==0)) {
  header('location:logout.php');
  }

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ADMIN | PAGE</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
<!--   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 --></head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-black">
    <div class="container mr-15">
      <a href="index3.html" class="navbar-brand ">
       <!--  <img src="../img/logo1.png" alt="AURORA" class="brand-image img-circle elevation-3"
             style="opacity: 10"> -->
     <span class="brand-text font-weight-light">
                 <?php
                     $adid=$_SESSION['eaid'];
                     $ret=mysqli_query($con,"select name, level, office from users where id='$adid'");
                     $row=mysqli_fetch_array($ret);
                     $name=$row['name'];
                     $level=$row['level'];
                     $office=$row['office'];
                     ?> 
   <!-- -<?php  echo $row['office'];?>   -->     
  </span>
      </a>

      <!-- Left navbar links -->
      <ul class="navbar-nav ">
      <li class="nav-item">
       <form class="form-inline mr-3" name="search" method="post" action="track.php">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar btn-outline-danger text-red" name="searchdata" type="search" placeholder="Tracking Number" aria-label="Search" autofocus="">
          <div class="input-group-append">
            <button class=" btn btn-block btn-xs  btn-outline-danger" name="search" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        </li>
       </ul>

      <!-- SEARCH FORM -->
 

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
                 
      </form>
        <li class="nav-item d-none d-sm-inline-block mr-3">
          <a href="dashboard.php" class="nav-link"><i class="fa fa-home"></i>HOME</a>
        </li>

           <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle ml-15"> <i class="fa fa-user"></i> MANAGE SCHOLAR</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
             <li class="nav-item">
                <a href="add_scholar.php" class="nav-link active dropdown-item" style="height: 6%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
                  <i class="fa fa-plus nav-icon"></i>
                 ADD SCHOLARS
                </a>
              </li>
             <!--  <li class="nav-item">
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
              </li> -->
                <li class="nav-item">
                <a href="scholar.php" class="nav-link active dropdown-item" style="height: 6%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
                  <i class="fa fa-question nav-icon"></i>
                  VERIFY SCHOLAR
                </a>
              </li>
               <li class="nav-item" style="height: 6%;
                      background: rgba(); ">
                <a href="preregistered.php" class="nav-link active dropdown-item" s>
                  <i class="fa fa-users nav-icon"></i>
                  All SCHOLAR
                </a>
              </li>
               <li class="nav-item">
                <a href="old.php" class="nav-link active dropdown-item" style="height: 6%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
                  <i class="far fa-circle nav-icon"></i>
                 OLD DATA
                </a>
              </li>

          </ul>
        </li>
           <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-book"></i> SETTINGS</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-15 bg-light-gray">

               <li class="nav-item">
            <a href="address.php" class="nav-link active" style="height: 6%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
              <i class="nav-icon fa fa-plus"></i>
             ADDRESS
              </a>
          </li>

          <!--   <li class="nav-item">
            <a target="_blank" href="https://docs.google.com/spreadsheets/d/1cRfmG8AlI9AZgiRjPk0Q1sEduerzYobv44peFCzbvhk/edit#gid=992247671" class="nav-link active">
              <i class="nav-icon fa fa-cloud"></i>
              <p>
              GOOGLE FORM
               
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="attach.php" class="nav-link active" style="height: 6%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
              <i class="nav-icon fa fa-pen"></i>
            ATTACHED
             </a>
          </li>
            <li class="nav-item">
            <a href="/csv2/upload.php" class="nav-link active" target="_blank" style="height: 6%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
              <i class="nav-icon fas fa-database"></i>
               UPLOAD CSV
              </a>
          </li>
            <li class="nav-item">
            <a href="export.php" class="nav-link active" target="_blank" style="height: 6%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
              <i class="nav-icon fas fa-arrow-down"></i>
              EXPORT
             </a>
          </li>
           <li class="nav-item">
            <a href="print1.php" class="nav-link active" target="_blank" style="height: 6%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
              <i class="nav-icon fas fa-print"></i>
               PRINT PAYROLL
               </a>
          </li>
          <hr class="card-success card-outline" >
          <li class="nav-item">
            <a href="gallery.php" class="nav-link active" target="_blank" style="height: 6%;
                      background: transparent; ">
              <i class="nav-icon fas fa-book"></i>
               GALLERY
               </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
              class="fas fa-th-large"></i>
              DASHBOARD
               </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link active" target="_blank" style="height: 6%;
                      background: transparent; ">
              <i class="nav-icon fas fa-power-off"></i>
               LOG OUT
               </a>
          </li>

          
              
          </ul>
        </li>



          

          
             

       
          <li class="nav-item">
        </li>

        
      </ul>
    </div>

  </nav>

   <aside class="control-sidebar control-sidebar-left">
    <!-- Control sidebar content goes here -->
    <div class="p-1">
     
         <div class="col-lg-12" >
            <div class="card" >
              <div class="card-header" style="height: 6%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
                <h5 class="card-title m-0">DASHBOARD</h5>
              </div>
              <div class="card-body">
                <?php $query1=mysqli_query($con,"Select * from tblappointment ");
            $scholar=mysqli_num_rows($query1);?>
               <button type="button" class="btn btn-block btn-xs  btn-outline-danger">
                <h4><?php echo $scholar;?></h4>
                   <p>TOTAL SCHOLARS</p></button>

                <?php $query1=mysqli_query($con,"Select * from tblappointment where status= '1' and old= '' ");
            $ases=mysqli_num_rows($query1);?>
               <button type="button" class="btn btn-block btn-xs  btn-outline-danger">
                <h3><?php echo $ases;?></h3>
                    <p>FOR ASSESMENT</p></button>

                     <?php $query1=mysqli_query($con,"Select * from tblappointment where status= '2' ");
            $ases=mysqli_num_rows($query1);?>
               <button type="button" class="btn btn-block btn-xs  btn-outline-danger">
                <h3><?php echo $ases;?></h3>
                    <p>PENDING</p></button>

                     <?php $query1=mysqli_query($con,"Select * from tblappointment where status= '3' ");
            $ases=mysqli_num_rows($query1);?>
               <button type="button" class="btn btn-block btn-xs  btn-outline-danger">
                <h3><?php echo $ases;?></h3>
                    <p>DISAPPROVED</p></button>

                     <?php $query1=mysqli_query($con,"Select * from tblappointment where status= '4' and old= ''  ");
            $ases=mysqli_num_rows($query1);?>
               <button type="button" class="btn btn-block btn-xs  btn-outline-danger">
                <h3><?php echo $ases;?></h3>
                    <p>APPROVED</p></button>

                    <?php $query1=mysqli_query($con,"Select * from tblappointment where status= 'CLAIMED' ");
            $ases=mysqli_num_rows($query1);?>
               <button type="button" class="btn btn-block btn-sm btn-outline-success">
                <h3><?php echo $ases;?></h3>
                    <p>CLAIMED</p></button>

                    <!--  <?php $query1=mysqli_query($con,"Select * from tblappointment where status= 'CLAIMED' ");
            $ases=mysqli_num_rows($query1);?>
               <button type="button" class="btn btn-block btn-sm btn-outline-success">
                <h3><?php echo $ases;?></h3>
                    <p>TOTAL AMOUNT</p></button> -->

                  
              </div>
            </div>

          
          </div>


    </div>
  </aside>













  