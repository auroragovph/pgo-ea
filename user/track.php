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
          <div class="col-md-3">
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
           <div class="card card-success card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-square"
                       src="../admin/uploads/<?php echo $row['file']; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php  echo $row['lname'];?>,<?php  echo $row['fname'];?> <?php  echo $row['mname'];?></h3>

                <p class="text-muted text-center">Tracking no.<?php  echo $row['AptNumber'];?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phone Number</b> <a class="float-right"><?php  echo $row['PhoneNumber'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php  echo $row['Email'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b> Date Apply</b> <a class="float-right"><?php  echo $row['ApplyDate'];?></a>
                  </li>
                </ul>

            <!--     <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
             <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  <?php  echo $row['school_name'];?>/<?php  echo $row['School_address'];?>
                 
                </p>
             
                  <p>Current Year Level:<?php  echo $row['current_y_level'];?><p>

                <hr class="card card-success card-outline" >

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted"> Present address:<?php  echo $row['p_address'];?></p>
            

               <hr class="card card-success card-outline" >

                <strong><i class="fas fa-pencil-alt mr-1"></i> Others</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><p>Birthday:<?php  echo $row['birthdate'];?></p></span>
                  <span class="tag tag-success"><p>Birth Place:<?php  echo $row['birthplace'];?><p></span>
                  <span class="tag tag-info"><p>Age:<?php  echo $row['age'];?><p></span>
                  <span class="tag tag-warning"><p>Sex:<?php  echo $row['sex'];?><p></span>
         
                 
                </p>

            

                <hr class="card card-success card-outline" >

              <!--   <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
              Info
              </div><!-- /.card-header -->
                <br>  
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light btn btn-sm btn-success">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Amount</span>
                      <span class="info-box-number text-center text-muted mb-0"><td><?php echo $row['amount']; ?></td></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light btn btn-sm btn-success">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Period Covered</span>
                      <span class="info-box-number text-center text-muted mb-0"><td><?php echo $row['period_covered']; ?></td></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light btn btn-sm btn-success">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">status</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php  
                              if($row['Status']=="1")
                              {
                                echo "APPROVED";
                              }

                              if($row['Status']=="2")
                              {
                               echo "Rejected";
                              }
                              if($row['Status']=="")
                              {
                               echo "ON PROCESS";
                              }

                                   ;?><span>
                    </div>
                  </div>
                
                  <div class="info-box bg-light btn btn-sm btn-success">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Particular</span>
                      <span class="info-box-number text-center text-muted mb-0"><td><?php echo $row['particular']; ?></td></span>
                    </div>
                  </div>
              </div>
                </div>
                


             <hr class="card card-success card-outline" >

              <div class="row">
                <div class="col-12">
                  <h4>Remarks</h4>
                    <div class="post">
                      <div class="user-block">
                      
                       
                        <span class="description">Remark Date - <?php echo $row['RemarkDate']; ?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                    <?php echo $row['Remark']; ?>
                      </p>

                   
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
