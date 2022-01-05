<?php
include 'includes/header.php';
?>
<?php
// var_dump($_POST);

  

if(isset($_POST['submit']))
  {
    
    $cid=$_GET['view'];
    
      $status=$_POST['status'];
    

     
    
     
   $query=mysqli_query($con, "update  tblappointment set Status='$status' where ID='$cid'");
    if ($query) {
    $msg="Scholar has  CLAIMED.";
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
            <h1 class="m-0 text-dark">Scholar</h1>
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

  
<? echo @$msg?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
 <?php
                   $cid=$_GET['view'];
                   $ret=mysqli_query($con,"select * from tblappointment where ID='$cid'");
                   $cnt=1;
                   while ($row=mysqli_fetch_array($ret)) {

                    // echo json_encode($row, JSON_PRETTY_PRINT);

                  ?>


            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                       src="../img/logo1.png"
                       alt="User profile picture" style="height: 10%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
                 <!--  <img class="profile-user-img img-fluid img-square"
                       src="../admin/uploads/<?php echo $row['file']; ?>"
                       alt="User profile picture"> --><!-- 
                       <a href="https://drive.google.com/u/0/open?usp=forms_web&id=1TsYo0W4Z5Kfe16kCiM0wpoEsFjA3PPDv"></a> -->
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
                  <!-- <li class="list-group-item">
                    <b>Apply Date</b> <a class="float-right"><?php  echo $row['ApplyDate'];?></a>
                  </li> -->
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

                <p class="text-muted">Present address:<?php  echo $row['purok1'];?> <?php  echo $row['brgy1'];?>,<?php  echo $row['muni1'];?>,<?php  echo $row['prov1'];?></p>
                <p class="text-muted">Permanent address:<?php  echo $row['purok'];?> <?php  echo $row['brgy'];?>,<?php  echo $row['muni'];?>,<?php  echo $row['prov'];?></p>

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
                    <span class="tag tag-success"><p>Address:<?php  echo $row['address1'];?><p></span>
                  <span class="tag tag-success"><p>Contact Number:<?php  echo $row['contact_no1'];?><p></span>
                     <span class="tag tag-success"><p>Employer:<?php  echo $row['employer'];?><p></span><br>
                  <span class="tag tag-info"><p>Mother Name:<?php  echo $row['mother_name'];?><p></span>
                     <span class="tag tag-warning"><p>Occupation:<?php  echo $row['occupation1'];?><p></span>
                     <span class="tag tag-success"><p>Address:<?php  echo $row['address2'];?><p></span>
                  <span class="tag tag-success"><p>Contact Number:<?php  echo $row['contact_no2'];?><p></span>
                     <span class="tag tag-success"><p>Employer:<?php  echo $row['employer2'];?><p></span>
                 

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
           <?php if($row['Status']=="1"){ ?>
           <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">UPDATE STATUS</h3>
           
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                   <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i> Maximize Page
                  </button>
              </div>
            </div>
          <form method="post" >
                 <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                  <div class="form-group">+
 
                <select name="status" class="form-control wd-450" required="true" required="true"" >
              
               <option value="3">DISAPPROVED</option>
                <option value="4">APPROVED</option>
                <option value="CLAIMED">CLAIMED</option>
                 
            </select>
              </div>
                    </div>
                  </div>
                   <tr align="center">
                 <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-block">UPDATE STATUS?</button></td>
                     </tr>
               </form>
      </div>
          <!-- /.card -->
        </div>
              </div>

              <div class="col-md-9">
           <?php }elseif($row['Status']=="4") {
           ?>
           <div class="col-md-12">
          <div class="card card-secondary">
            <?php  

                               if($row['Status']=="CLAIMED")
                              {
                                echo "<div class='btn btn-lg btn-success'>EDUCATIONAL ASSISTANCE WAS CLAIMED</div>";
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
                               echo "<div class='btn btn-lg btn-danger'>EDUCATIONAL ASSISTANCE WAS DisApproved</div>";
                              }  if($row['Status']=="4")
                              {
                               echo "<div class='btn btn-lg btn-success'>EDUCATIONAL ASSISTANCE WAS Approved</div>";
                              }
                              if($row['Status']=="")
                              {
                               echo "<div class='btn btn-lg btn-warning'>EDUCATIONAL ASSISTANCE WAS ON PROCESS</div>";
                              }

                                   ;?>
                                   <br>
            <div class="card-header">
              <h3 class="card-title">UPDATE STATUS</h3>
           
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                   <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i> Maximize Page
                  </button>
              </div>
            </div>
          <form method="post" >
                 <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                  <div class="form-group">+
 
                <select name="status" class="form-control wd-450" required="true" required="true" >
              
               
                <option value="CLAIMED">CLAIMED</option>
                 
            </select>
              </div>
                    </div>
                  </div>
                   <tr align="center">
                 <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-block">UPDATE STATUS?</button></td>
                     </tr>
               </form>
      </div>
          <!-- /.card -->
        </div>
              </div>

              <?php }else { ?>
                   <div class="card-body">
         <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">STATUS</h3>
               
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                   <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i> Maximize Page
                  </button>
              </div>
            </div>
              


                <?php  

                               if($row['Status']=="CLAIMED")
                              {
                                echo "<div class='btn btn-lg btn-success'>EDUCATIONAL ASSISTANCE WAS CLAIMED</div>";
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
                               echo "<div class='btn btn-lg btn-danger'>EDUCATIONAL ASSISTANCE WAS DisApproved</div>";
                              }  if($row['Status']=="4")
                              {
                               echo "<div class='btn btn-lg btn-success'>EDUCATIONAL ASSISTANCE WAS Approved</div>";
                              }
                              if($row['Status']=="")
                              {
                               echo "<div class='btn btn-lg btn-warning'>EDUCATIONAL ASSISTANCE WAS ON PROCESS</div>";
                              }

                                   ;?>



                                    <form method="post" >
                 <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                  <div class="form-group">+
 
                <select name="status" class="form-control wd-450" required="true" required="true"" >
              
               <option value="3">DISAPPROVED</option>
                <option value="4">APPROVED</option>
                <option value="CLAIMED">CLAIMED</option>
                 
            </select>
              </div>
                    </div>
                  </div>
                   <tr align="center">
                 <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-block">UPDATE STATUS?</button></td>
                     </tr>
               </form>
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