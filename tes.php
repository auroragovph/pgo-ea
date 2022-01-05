<?php

include('dbconnection.php');
include 'main.php';


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

  <title>e_Assis| KIOSK</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
</head>
<body class="hold-transition login-page " style="height: 100%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
<div class="wrapper">


 

  <!-- Content Wrapper. Contains page content -->
 <div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>e_ASSIS </b> v2</a>
  </div>
  <!-- /.login-logo -->
  <div class="card"><br>
  <center><img src="image/aurora_logo.png" alt="User Avatar" class="img-circle" width="40%"></center>
    <div class="card-body login-card-body">
      <p class="login-box-msg">ENTER THE VALID TRACKING NUMBER</p>
      

 <?php echo  @$msg;?>
    
   

      <div class="social-auth-links text-center mb-3">
          <form class="form-inline ml-5" name="search" method="post" action="thank-you.php">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="searchdata" type="search" placeholder="Tracking Number" aria-label="Search" required="">
          <div class="input-group-append">
            <button class="btn btn-primary btn-block btn-flat" name="search" type="submit">
              PROCEED
            </button>
          </div>
        </div>
      </form>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">v2.0.5</a>
      </p>
      
    </div>

    <!-- /.login-card-body -->

  </div>
 
</div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>













