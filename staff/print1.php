<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">PRINT PAYROLL</h3>
            </div>
            <!-- /.card-header -->
              <form role="form" method="POST" action="print.php">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Initial</th>
                  <th>Address</th>
                  <th>School</th>
                  <th>Particular</th>
                   <th>Period Covered</th>

                  <th>Amount</th>
                   <th>Action</th>

               
                </tr>
                </thead>
              <tbody>
                  <?php $x = 1; ?>
                  <?php
                $query1=mysqli_query($con,"
                  select * from tblappointment where status = '4' AND OLD = '' ;
                ")or die(mysqli_error($con));
                    while ($row=mysqli_fetch_array($query1)){
                      $ID=$row['ID'];
                  ?>
                 <tr>
                   <td><?php echo $x++; ?></td>
                  <td> <?php  echo $lname=$row['lname'];?></td>
                    <td><?php  echo $fname=$row['fname'];?> </td>
                    <td><?php  echo $mname=$row['mname'];?> </td>
                    <td><?php  echo $purok=$row['purok'];?> </td>
                     <td><?php  echo $school=$row['school_name'];?> </td>
                     <td><?php  echo $school=$row['particular'];?></td> 
                            <td><?php  echo $row['period_covered'];?></td>
                            <td><?php  echo $school=$row['amount'];?> </td>
                 
                 <td><a href="print.php?editid=<?php echo $row['ID'];?>" class="icheck-success d-inline" ><input class="icheck-success d-inline" type="checkbox" name="names[]" value="<?php echo $row['ID'];?>" ></a> </td>
                  

                </tr>
             <?php } ?>
               
                </tbody>
             
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    <button class="btn btn-primary form-control" name="search"><i class="fa fa-print"></i>Select</button>

             </form>



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
