<?php
include 'includes/header.php';
?>
<?php
// var_dump($_POST);

  

  

if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
      $particular=$_POST['particular'];
      $amount=$_POST['amount'];
      $period_covered=$_POST['period_covered'];

     
    
     
   $query=mysqli_query($con, "update  tblappointment set Remark='$remark',Status='$status',particular='$particular',amount='$amount',period_covered='$period_covered' where ID='$cid'");
    if ($query) {
    $msg="All Data has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
  

  ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View  Scholar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
             <!--  <li class="breadcrumb-item active">Category</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
               <?php
               $cid=$_GET['view'];
                 $ret=mysqli_query($con,"select * from  tblappointment where ID='$cid'");
                    $cnt=1;
                 while ($row=mysqli_fetch_array($ret)) {

                   ?> 
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
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
                    <b>Apply Date</b> <a class="float-right"><?php  echo $row['ApplyDate'];?></a>
                  </li>
                </ul>

            <!--     <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  <?php  echo $row['school_name'];?>/<?php  echo $row['School_address'];?>
                 
                </p>
                <p>GWA Last SEM/S.Y:<?php  echo $row['gwa'];?><p>
                  <p>Current Year Level:<?php  echo $row['current_y_level'];?><p>

                <hr class="card card-success card-outline" >

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted">Present address:<?php  echo $row['p_address'];?></p>
                <p class="text-muted">Permanent address:<?php  echo $row['per_address'];?></p>

               <hr class="card card-success card-outline" >

                <strong><i class="fas fa-pencil-alt mr-1"></i> Others</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><p>Birthday:<?php  echo $row['birthdate'];?></p></span>
                  <span class="tag tag-success"><p>Birth Place:<?php  echo $row['birthplace'];?><p></span>
                  <span class="tag tag-info"><p>Age:<?php  echo $row['age'];?><p></span>
                  <span class="tag tag-warning"><p>Sex:<?php  echo $row['sex'];?><p></span>
                     <span class="tag tag-warning"><p>Number Of Family Member:<?php  echo $row['number_f_mem'];?><p></span>
                 
                </p>

                <hr class="card card-success card-outline" >

                 <strong><i class="fas fa-users mr-1"></i> Parents</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><p>Father Name:<?php  echo $row['father_name'];?></p></span>
                  <span class="tag tag-success"><p>Occupation:<?php  echo $row['occupation'];?><p></span>
                  <span class="tag tag-info"><p>Mother Name:<?php  echo $row['mother_name'];?><p></span>
                  <span class="tag tag-warning"><p>Occupation:<?php  echo $row['occupation1'];?><p></span>

                    <span class="tag tag-warning"><p>Monthly Family Income:<?php  echo $row['income'];?><p></span>
                 
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
           <?php if($row['Remark']==""){ ?>


          <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Add Info</h3>
         <form name="submit" method="post" enctype="multipart/form-data"> 
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Particulars</label>
                <input type="text" id="Particulars" name="particular" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Period Covered</label>
                <input type="text" id="PeriodCovered" name="period_covered" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Amount</label>
                <input type="text" id="inputEstimatedDuration" name="amount" class="form-control">
              </div>



               <div class="form-group">
                <label for="inputEstimatedBudget">Remarks</label>
              <textarea name="remark" placeholder="" rows="5" cols="5" class="form-control wd-450" required="true"></textarea>
              </div>
                    

              <div class="form-group">
              <label for="inputEstimatedBudget">Status</label>
           <select name="status" class="form-control wd-450" required="true" >
               <option value="1" selected="true">Approve</option>
               <option value="2">Rejected</option>
            </select>
              </div>

            </div>


            <!-- /.card-body -->
          </div>
            <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Submit" name="submit" class="btn btn-success float-right">
        </div>
      </div>
    </form>
      </div>
          <!-- /.card -->
        </div>
              </div>

              <?php }else { ?>
                   <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
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

                                   ;?><span>
                    </div>
                  </div>
                </div>
              </div>
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

            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Particular</h3>
              <p class="text-muted"><?php echo $row['particular']; ?></p>
              <hr class="card card-success card-outline" >
              <br>
              <div class="text-muted">
                <p class="text-sm">
                  <b class="d-block">REPUBLIC OF THE PHILIPPINES</b>
                </p>
                <p class="text-sm">PROVINCIAL GOVERNMENT OF AURORA
                  <b class="d-block">BALER</b>
                </p>
              </div>
              <hr class="card card-success card-outline" >

              <h5 class="mt-5 text-muted">M.I.S</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"> MANAGEMENT INFORMATION SYSTEM</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"> AURORA</a>
                </li>
               <hr class="card card-success card-outline" >
              </ul>
              <div class="text-center mt-5 mb-3">
            <a href="print_form.php?view=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-success"><i class="fa fa-print"></i> print Form</button></a>
                
              </div>
            </div>
          </div>
        </div>
             <?php } ?>

              
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
          <?php } ?>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>

    <?php include('includes/footer.php'); ?>