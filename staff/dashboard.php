<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 10%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
               <!--   <img src="../img/logo1.png" alt="AURORA" class="brand-image img-circle elevation-3"
             style="opacity: 10"> -->
        <!-- <span class="brand-text font-weight-light">
                 <?php
                     $adid=$_SESSION['eaid'];
                     $ret=mysqli_query($con,"select name, level, office from users where id='$adid'");
                     $row=mysqli_fetch_array($ret);
                     $name=$row['name'];
                     $level=$row['level'];
                     $office=$row['office'];
                     ?> 
    <?php  echo $row['name'];?> --></a><!-- -<?php  echo $row['office'];?>   -->
                <center> <?php  echo $row['name'];?></center>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a>  </a></li>
           
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            
               <center><img src="../img/banner3.jpg" alt="User Avatar" class="img-square" width="100%"></center>
                 </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('includes/footer.php'); ?>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>


</html>
