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
          <!--    <a href="/csv2/upload.php"><button type="submit" class="btn btn-warning"><i class="fa fa-arrow-down"></i> UPLOAD CSV</button></a> -->
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
              <h1 class="card-title">VERIFY SCHOLAR</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>TRACKING NO.</th>
                  <th>Date of application</th>
                  
                  <th>Information</th>
                  
                  <th>Pag-aari ng Pamilya</th>
                  <th>Naninirahan Kasama Ang Magulang?</th>
                   <th>Kapatid na nag aaral</th>
                   <th>Kapatid nag susustento</th>
                   <th>WORKING STUDENT?</th>
                   <th>Gamit Sa pag aaral</th>
                  
                  
                   <th>Action</th>
               
                </tr>
                </thead>
              <tbody>
                  <?php
                $query1=mysqli_query($con,"SELECT *, `scholar`.`ID`, `attach`.`tracking_no`, `question`.`form_no`
                                  FROM `scholar`
                                  LEFT JOIN  `attach`
                                  ON `scholar`.`ID` = `attach`.`tracking_no`
                                  LEFT JOIN  `question`
                                  ON `scholar`.`ID` = `question`.`form_no`
                                  ")or die(mysqli_error($con));
                    while ($row=mysqli_fetch_array($query1)){
                      $ID=$row['ID'];
                  ?>
                 <tr>
                  <td> <?php  echo $ID=$row['ID'];?></td>
                  <td> <?php echo date('M d, Y h:i A',strtotime($applydate=$row['applydate'])); ?></td>
                  <td> <?php  echo $lname=$row['lname'];?>,
                    <?php  echo $fname=$row['fname'];?> 
                   <?php  echo $mname=$row['mname'];?> <br>

                       <!-- <td><?php  echo $row['purok1'];?> <?php  echo $row['brgy1'];?>,<?php  echo $row['muni1'];?>,<?php  echo $row['prov1'];?></td> -->
                        <?php  echo $present_ad=$row['present_ad'];?> <br>
                     <?php  echo $school=$row['school'];?> </td>
                      <td><?php  echo $q2=$row['q2'];?> </td>
                      <td><?php  echo $q3=$row['q3'];?> </td>
                       <td><?php  echo $q4=$row['q4'];?> </td>
                       <td><?php  echo $q5=$row['q5'];?> </td>
                       <td><?php  echo $q6=$row['q6'];?> </td>
                        <td><?php  echo $q7=$row['q7'];?> </td>
                   
                        
                 <!--     <td><a href="print.php?editid=<?php echo $row['id'];?>"><input type="checkbox" name="names[]" value="<?php echo $row['id'];?>" class="success"></a> </td> -->

                     <td><a href="verify.php?view=<?php echo $row['ID'];?>" ><button type="submit" class="btn btn-sm btn-warning" name="names[]" value="<?php echo $row['ID'];?>"> <i class="fa fa-book-open"></i> REVIEW SCHOLAR</button></a>
                        <button type="submit" onclick="deleteCommu2('<?php echo $row['ID']; ?>')" class="btn btn-sm btn-danger mt-1"> <i class="fa fa-times"></i> DISQUALIFIED</button>
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
   if(confirm('DISQUALIFIED this? IT WILL PERMANENTLY REMOVED')){
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
