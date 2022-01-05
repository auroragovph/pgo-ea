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

                <p>TOTAL Scholars</p>
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

                <p>Pending</p>
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

                <p>For Assesment </p>
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
            <?php $query3=mysqli_query($con,"Select * from tblappointment where Status= 'CLAIMED' ");
            $scholar3=mysqli_num_rows($query3);
                    ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $scholar3;?></h3>

                <p>CLAIMED</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
 


                    <?php $query10=mysqli_query($con,"Select * from tblappointment where muni= 'BALER' ");
            $baler=mysqli_num_rows($query10);
                    ?>


                    <?php $query11=mysqli_query($con,"Select * from tblappointment where muni= 'CASIGURAN' ");
            $casiguran=mysqli_num_rows($query11);
                    ?>


                    <?php $query12=mysqli_query($con,"Select * from tblappointment where muni= 'DIPACULAO' ");
            $dipaculao=mysqli_num_rows($query12);
                    ?>


                    <?php $query13=mysqli_query($con,"Select * from tblappointment where muni= 'SAN LUIS' ");
            $sanluis=mysqli_num_rows($query13);
                    ?>


                    <?php $query14=mysqli_query($con,"Select * from tblappointment where muni= 'DILASAG' ");
            $dilasag=mysqli_num_rows($query14);
                    ?>

                      <?php $query17=mysqli_query($con,"Select * from tblappointment where muni= 'DINALUNGAN' ");
            $dinalungan=mysqli_num_rows($query17);
                    ?>


                    <?php $query15=mysqli_query($con,"Select * from tblappointment where muni= 'DINGALAN' ");
            $dingalan=mysqli_num_rows($query15);
                    ?>


                    <?php $query16=mysqli_query($con,"Select * from tblappointment where muni= 'MARIA AURORA' ");
            $maria=mysqli_num_rows($query16);
                    ?>



<div class="row">
          <div class="col-md-8">

               <div class="card-body">
                 <center><img src="../img/banner3.jpg" alt="User Avatar" class="img-square" width="100%" style="height: 570PX;"></center>
              </div>
         
        
        </div>

          <div class="col-md-4">
                  <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  GRAPH REPORT PER MUNICIPALITY
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
          
              <div class="card-body">
                <div id="donut-chart" style="height: 500PX;"></div>
              </div>

              
              <!-- /.card-body-->
            </div>
            
          </div>





     
      </div>

      <div class="card-footer">
                <div class="row">
                  <div class="col-sm-1 col-4 " style="height: 100%;
                      background: #00cc00; ">
                    <div class="description-block border-right">
                    
                      <h5 class="description-header"><?php echo $baler;?></h5>
                      <span class="description-text">BALER</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                    <div class="col-sm-1 col-6" style="height: 100%;
                      background: #9933ff; ">
                    <div class="description-block border-right" >
                    
                      <h5 class="description-header"><?php echo $casiguran;?></h5>
                      <span class="description-text">CASIGURAN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                    <div class="col-sm-1 col-6 " style="height: 100%;
                      background: #00ff00; ">
                    <div class="description-block border-right">
                    
                      <h5 class="description-header"><?php echo $dipaculao;?></h5>
                      <span class="description-text">DIPACULAO</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                    <div class="col-sm-1 col-6" style="height: 100%;
                      background: #00c0ef; ">
                    <div class="description-block border-right">
                    
                      <h5 class="description-header"><?php echo $sanluis;?></h5>
                      <span class="description-text">SAN LUIS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                    <div class="col-sm-2 col-4" style="height: 100%;
                      background: #990033; ">
                    <div class="description-block border-right">
                    
                      <h5 class="description-header text-light">
                        <?php echo $dilasag;?></h5>
                      <span class="description-text text-light">DILASAG</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                    <div class="col-sm-2 col-4" style="height: 100%;
                      background: #ff3300; ">
                    <div class="description-block border-right">
                    
                      <h5 class="description-header"><?php echo $dinalungan;?></h5>
                      <span class="description-text">DINALUNGAN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                    <div class="col-sm-2 col-6" style="height: 100%;
                      background: #ff66cc; ">
                    <div class="description-block border-right">
                    
                      <h5 class="description-header"><?php echo $dingalan;?></h5>
                      <span class="description-text">DINGALAN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                   <div class="col-sm-2 col-6 bg-blue">
                    <div class="description-block border-right">
                    
                      <h5 class="description-header"><?php echo $maria;?></h5>
                      <span class="description-text">MARIA AURORA</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                 
               
               
                </div>
                <!-- /.row -->
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
