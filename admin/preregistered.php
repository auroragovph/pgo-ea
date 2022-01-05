<?php include('includes/header.php'); 



    if(isset($_POST['submit']))
  {

$cid=$_GET['view'];
 
$status=$_POST['status'];
 $query=mysqli_query($con,"update tblappointment set status='$status' where  ID='$cid'");
 

    if ($query) {
    $msg="Status Remark has been Updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}



?>

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Scholars</h1>
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
                    <th>Tracking No.</th>
                  <th>Name</th>
                 
                  <th>Address</th>
                  <th>School</th>
                  
                  <th>Requirements</th>
                  <th>Status</th>
                 
                  <th>Action</th>
                 
                   
               
                </tr>
                </thead>
             <tbody>
                  <?php
                      // $query1 = mysqli_query($con,"
                      //                           SELECT * FROM  `tblappointment` t, `attach` s
                      //                           WHERE t.`AptNumber`=s.`tracking_no` ORDER BY lname desc
                      //          ")or die(mysqli_error($con));

                      $query1 = mysqli_query($con,"
                                  SELECT *, `tblappointment`.`AptNumber`, `attach`.`tracking_no`
                                  FROM `tblappointment`
                                  LEFT JOIN  `attach`
                                  ON `tblappointment`.`AptNumber` = `attach`.`tracking_no`
                                  ORDER BY RemarkDate
                               ")or die(mysqli_error($con));

                      // echo json_encode(mysqli_fetch_array($query1));

                      // die;

                    while ($row=mysqli_fetch_array($query1)){
                      $id=$row['id'];
                  ?>
                 <tr>
                 <td><?php  echo $AptNumber=$row['AptNumber'];?> </td>
                 <td><?php  echo $lname=$row['lname'];?>, <?php  echo $fname=$row['fname'];?> <?php  echo $mname=$row['mname'];?>   </td>
                  <td><?php  echo $row['purok'];?> <?php  echo $row['brgy'];?>,<?php  echo $row['muni'];?>,<?php  echo $row['prov'];?></td>
                   <td><?php  echo $school_name=$row['school_name'];?> </td>

                    
                   <td>

                    <?php if($row['tracking_no'] == null): ?>

                      <?= 'PLEASE Click to ATTACH ->'?>

                      <?php 
                        echo "
                          <a href='attach2.php?view=".$row['ID']."' class='btn btn-success'>
                            HERE
                          </a>
                        ";
                      ?>



                      <?php else: ?>


                          <?php  echo $req=$row['req'];?>->
                            
                            <?php $files = json_decode($row['file']); ?>

                            <?php foreach($files as $file): ?>
                              <a href="<?php echo '../admin/requirements/'.$file; ?>"><?= $file ?>,</a>
                            <?php endforeach; ?>


                      <?php endif; ?>

                  </td>
                  <td>

                       
                 <div class="info-box-content">
                      <span class="info-box-number text-center text-muted mb-0"
                    <?php  

                               if($row['Status']=="CLAIMED")
                              {
                                echo "<div class='btn btn-xs btn-success'>CLAIMED</div>";
                              }


                              if($row['Status']=="1")
                              {
                                echo "<div class='btn btn-xs btn-default'>FOR ASSESSMENT</div>";
                              }

                            
                              if($row['Status']=="2")
                              {
                               echo "<div class='btn btn-xs btn-warning'>PENDING</div>";
                              }
                                if($row['Status']=="3")
                              {
                               echo "<div class='btn btn-xs btn-danger'>DisApproved</div>";
                              }  if($row['Status']=="4")
                              {
                               echo "<div class='btn btn-xs btn-success'>Approved</div>";
                              }
                              if($row['Status']=="")
                              {
                               echo "<div class='btn btn-xs btn-warning'>ON PROCESS</div>";
                              }

                                   ;?>


                                 </button></td> 
                                 <!--   <td>
                        <?php if($row['status']==""){ ?>
                             
                <form method="post" action="preregistered.php">
                        <input type="text" name="status" class="form-control" value="CLAIMED" placeholder="Enter ..." readonly="" hidden="">
                          <button type="submit" name="submit" class="btn btn-primary btn-sm">CLAIM</button>
                     
                                        </form>
               <?php } else { ?>


                                <?php }?></td> -->

                               <td>  <a href="view-appointment.php?view=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-sm btn-success mt-1"><i class="fa fa-search"></i> View</button></a>  
                               <a href="view_approved.php?view=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-sm btn-warning mt-1"><i class="fa fa-arrow-right"></i> UPDATE</button></a>            
                                      
                             <button type="submit" onclick="deleteCommu('<?php echo $row['ID']; ?>')" class="btn btn-sm btn-danger mt-1"> <i class="fa fa-times"></i> Delete</button>

                              <!--   <button type="button" class="btn btn-sm btn-warning mt-1 edituser" value="<?php echo $row['userid']; ?>"><i class="fa fa-pen"></i> Edit</button>  -->

                          <!--   <button type="button" class="btn btn-warning edituser mt-1" value="<?php echo $row['ID']; ?>"> <i class="fa fa-pen"></i> Status</button> -->
                </tr>
             <?php } ?>
               
                </tbody>
             
              </table>
            </div>
            <!-- /.card-body -->
          </div>





      </div>
    </section>


<!-- Edit User -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Update To</h4></center>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
       
       
          <div class="form-group">+
              <label for="inputEstimatedBudget">STATUS</label>
                <select name="status" class="form-control wd-450" required="true" required="true" id="status" >
               <option value="1" selected="true">FOR ASSESSMENT</option>
               <option value="2">PENDING</option>
               <option value="3">DISAPPROVED</option>
                <option value="4">APPROVED</option>
                 
            </select>
              </div>
                </div> 


        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="button" class="btn btn-success" id="confirm_update"><span class="glyphicon glyphicon-check"></span> Update</button>
        
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- /.content -->
  </div>


 
  <!-- /.content-wrapper -->
  <?php include('includes/footer.php'); ?>

          <script type="text/javascript">
       function deleteCommu(id){
   if(confirm('Delete this?')){
     window.location = 'delete.php?ID='+id;
   }
 }


</script>




    <script>
$(document).ready(function(){
$(document).on('click', '.edit', function(){
    var rid=$(this).val();
    var status=$('#status'+rid).val();
    
    $('#edit').modal('show');
    $('.modal-body #status').val(status);
  
    $('.modal-footer #confirm_update').val(rid);
  });
  
  $(document).on('click', '#confirm_update', function(){
    var nrid=$(this).val();
    var status=$('#status').val();


    $('#edit').modal('hide');
    // $('body').removeClass('modal-open');
    // $('.modal-backdrop').remove();
      $.ajax({
        url:"transfer1.php",
        method:"POST",
        data:{
          ID: nrid,
          status: status,
          edit: 1
        },
        success:function(){

          // window.location.href='preregistered.php';
        }
      });
  });
 
});
</script>
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
