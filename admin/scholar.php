<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Verify Scholars</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <a href="/csv2/upload.php"><button type="submit" class="btn btn-warning"><i class="fa fa-arrow-down"></i> UPLOAD CSV</button></a>
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
                  <th>TRACKING NO.</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Initial</th>
                  <th>Address</th>
                  <th>School</th>
                  
                  
                   <th>Action</th>
               
                </tr>
                </thead>
              <tbody>
                  <?php
                $query1=mysqli_query($con,"
                  select * from scholar order by lname;
                ")or die(mysqli_error($con));
                    while ($row=mysqli_fetch_array($query1)){
                      $ID=$row['ID'];
                  ?>
                 <tr>
                  <td> <?php  echo $ID=$row['ID'];?></td>
                  <td> <?php  echo $mname=$row['mname'];?></td>
                    <td><?php  echo $fname=$row['fname'];?> </td>
                    <td><?php  echo $lname=$row['lname'];?> </td>
                       <!-- <td><?php  echo $row['purok1'];?> <?php  echo $row['brgy1'];?>,<?php  echo $row['muni1'];?>,<?php  echo $row['prov1'];?></td> -->
                         <td><?php  echo $present_ad=$row['present_ad'];?> </td>
                     <td><?php  echo $school=$row['school'];?> </td>
                   
                        
                 <!--     <td><a href="print.php?editid=<?php echo $row['id'];?>"><input type="checkbox" name="names[]" value="<?php echo $row['id'];?>" class="success"></a> </td> -->

                     <td><a href="verify.php?view=<?php echo $row['ID'];?>" ><button type="submit" class="btn btn-warning" name="names[]" value="<?php echo $row['ID'];?>">VERIFY</button></a>
                        <button type="submit" onclick="deleteCommu2('<?php echo $row['ID']; ?>')" class="btn btn-sm btn-danger mt-1"> <i class="fa fa-times"></i> Delete</button>
             <!--   <a href="scholarship_data.php?editid=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-danger">Delete</button></a>
                 </td> -->
               </td>

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
<script type="text/javascript">
 function deleteCommu2(id){
   if(confirm('Delete this?')){
     window.location = 'delete_scholar.php?ID='+id;
   }
 }
 </script>
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
