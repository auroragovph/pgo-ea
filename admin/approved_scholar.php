<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Approved Scholars</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
            <div class="card-header">
              <h3 class="card-title">Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tracking Number</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Initial</th>
                  <th>Address</th>
                  <th>School</th>
                  <th>Particular</th>
                   <th>Period Covered</th>

                  <th>Amount</th>
                  <th>Requirements</th>
                   <th>Action</th>
               
                </tr>
                </thead>
              <tbody>
                  <?php
                $query1=mysqli_query($con,"SELECT * FROM  `tblappointment` t, `attach` s
                               WHERE t.`AptNumber`=s.`tracking_no` ORDER BY lname desc")or die(mysqli_error($con));
                    while ($row=mysqli_fetch_array($query1)){
                      $ID=$row['ID'];
                  ?>
                 <tr>
                  <td> <?php  echo $AptNumber=$row['AptNumber'];?></td>
                  <td> <?php  echo $lname=$row['lname'];?></td>
                    <td><?php  echo $fname=$row['fname'];?> </td>
                    <td><?php  echo $mname=$row['mname'];?> </td>
                    <td><?php  echo $row['purok1'];?> <?php  echo $row['brgy1'];?>,<?php  echo $row['muni1'];?>,<?php  echo $row['prov1'];?></td>
                     <td><?php  echo $school=$row['school_name'];?> </td>
                     <td><?php  echo $school=$row['particular'];?></td> 
                            <td><?php  echo $row['period_covered'];?></td>
                            <td><?php  echo $school=$row['amount'];?> </td>
                            <td> <?php $files = json_decode($row['file']); ?>

                      <?php foreach($files as $file): ?>
                        <a class="btn btn-xs btn-primary" target="_blank" href="<?php echo '../admin/requirements/'.$file; ?>"><?= $file ?>,</a>
                      <?php endforeach; ?> </td>
                         
                     <td><a href="view_approved.php?view=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-sm btn-success mt-1"><i class="fa fa-search"></i> View</button></a>
                    <!--   <a href="print_form.php?view=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> Print</button></a> -->
                    
             <!--   <a href="scholarship_data.php?editid=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-danger">Delete</button></a>
                 </td> -->

                </tr>
             <?php } ?>
               
                </tbody>
             
              </table>
            </div>
            <!-- /.card-body -->
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
