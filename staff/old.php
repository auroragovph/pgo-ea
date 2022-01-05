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
              <h3 class="card-title">OLD SCHOLAR</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Initial</th>
                  <th>Address</th>
                  <th>School</th>
                  <th>Status</th>
                  
                   <th>Action</th>
               
                </tr>
                </thead>
              <tbody>
                  <?php
                $query1=mysqli_query($con,"
                  select * from tblappointment where old ='1' ;                 
                ")or die(mysqli_error($con));
                    while ($row=mysqli_fetch_array($query1)){
                      $ID=$row['ID'];
                  ?>
                 <tr>
                  <td> <?php  echo $lname=$row['lname'];?></td>
                    <td><?php  echo $fname=$row['fname'];?> </td>
                    <td><?php  echo $mname=$row['mname'];?> </td>
                    <td><?php  echo $address=$row['p_address'];?> </td>
                     <td><?php  echo $school=$row['school_name'];?> </td>
                     <td><?php     if($row['Status']=="1")
                              {
                                echo "Accepted";
                              }

                              if($row['Status']=="2")
                              {
                               echo "Rejected";
                              }

                                   ;?></td> 
                        
                 <!--     <td><a href="print.php?editid=<?php echo $row['id'];?>"><input type="checkbox" name="names[]" value="<?php echo $row['id'];?>" class="success"></a> </td> -->

                     <td><a href="view-appointment.php?view=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-success">View</button></a>
                    
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
