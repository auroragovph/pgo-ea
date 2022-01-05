<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tracking </h1>
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
          <div class="col-md-12">
          <?php
         if(isset($_POST['search']))
          { 

         $sdata=$_POST['searchdata'];
            ?>
            <!-- Profile Image -->

             <?php
             $ret=mysqli_query($con,"select *from  tblappointment where AptNumber like '%$sdata%' || AptNumber like '%$sdata%' || PhoneNumber like '%$sdata%'");
             $num=mysqli_num_rows($ret);
             if($num>0){
             $cnt=1;
             while ($row=mysqli_fetch_array($ret)) {

             ?>
   
              <div class="card-header center">
                <div class="card-title">
               <i class="fa fa-smile"></i>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
           <div class="col-12 col-sm-12 col-md-6 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <?php  echo $school_name=$row['school_name'];?> 
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php  echo $lname=$row['lname'];?>, <?php  echo $fname=$row['fname'];?> <?php  echo $mname=$row['mname'];?> </b></h2>
                      <p class="text-muted text-sm"><b>Tracking Number: </b> <?php  echo $AptNumber=$row['AptNumber'];?>  </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address:<?php  echo $row['purok1'];?> <?php  echo $row['brgy1'];?>,<?php  echo $row['muni1'];?>,<?php  echo $row['prov1'];?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #:<?php  echo $PhoneNumber=$row['PhoneNumber'];?> </li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../admin/uploads/<?php  echo $file=$row['file'];?>" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-question"></i><?php
                         if($row['Status']=="1")
                              {
                                echo "FOR ASSESSMENT";
                              }

                              if($row['Status']=="2")
                              {
                               echo "PENDING";
                              }

                                   ;?>
                    </a>
                    <a href="view-appointment.php?view=<?php echo $row['ID'];?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>






                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <h4><i class="fa fa-exclamation"></i></h4>
    <td colspan="12"> Sorry Your Scholarship Record was not Found! Please check your Tracking Number We provide, THANK YOU.</td>

  </tr>
</tbody>
</table>
</div>

              

              </div>
               <?php } }?>
               
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
