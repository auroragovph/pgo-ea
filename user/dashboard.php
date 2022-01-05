<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
              <?php $query3=mysqli_query($con,"Select * from tblappointment ");
            $scholar=mysqli_num_rows($query3);
                    ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $scholar;?></h3>

                <p>Scholars</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
              <?php $query3=mysqli_query($con,"Select * from tblappointment where status= '2' ");
            $scholar1=mysqli_num_rows($query3);
                    ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $scholar1;?><sup style="font-size: 20px"></sup></h3>

                <p>DisApproved</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <?php $query3=mysqli_query($con,"Select * from tblappointment where status= '1' ");
            $scholar2=mysqli_num_rows($query3);
                    ?>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $scholar2;?></h3>

                <p>APPROVED </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php $query3=mysqli_query($con,"Select * from tblappointment where remark= '' ");
            $scholar3=mysqli_num_rows($query3);
                    ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $scholar3;?></h3>

                <p>PRE-REGISTERED SCHOLAR</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="col-md-12">
            <div class="card card-gray">
              <div class="card-header">
                <center><h1><b>Eduactional Assistance</b> Management System</h1>
                </center>
                 <center><img src="../image/aurora_logo.png" alt="User Avatar" class="img-circle" width="20%"></center>
            <!-- <canvas id="nokey">
                  Your Browser Don't Support Canvas, Please Download Chrome ^_^``
              </canvas> -->
          </div>
        </div>
      </div>






      </div>
    </section>
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
