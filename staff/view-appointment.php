<?php
include 'includes/header.php';
?>
<?php
// var_dump($_POST);

  

if(isset($_POST['submit']))
  {
    
    $cid=$_GET['view'];
      $remark=$_POST['remark'];
      $remark_by=$_POST['remark_by'];
      $status=$_POST['status'];
      $particular=$_POST['particular'];
      $amount=$_POST['amount'];
      $period_covered=$_POST['period_covered'];

     
    
     
   $query=mysqli_query($con, "update  tblappointment set Remark='$remark',Remark_by='$remark_by',Status='$status',particular='$particular',amount='$amount',period_covered='$period_covered' where AptNumber='$cid'");
    if ($query) {
    $msg="Scholar has been Remarks.";
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
                   $ret=mysqli_query($con,"
                                  SELECT *, `tblappointment`.`AptNumber`, `attach`.`tracking_no`, `question`.`form_no`
                                  FROM `tblappointment`
                                  LEFT JOIN   `attach`
                                  ON `tblappointment`.`AptNumber` = `attach`.`tracking_no`
                                   LEFT JOIN  `question`
                                  ON `tblappointment`.`AptNumber` = `question`.`form_no`
                                   where AptNumber='$cid' ;
                               ")or die(mysqli_error($con));
                   $cnt=1;
                   while ($row=mysqli_fetch_array($ret)) {

                    // echo json_encode($row, JSON_PRETTY_PRINT);
                       
                  ?>


            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <!-- <img class="profile-user-img img-fluid img-square"
                       src="../admin/uploads/<?php echo $row['file']; ?>"
                       alt="User profile picture"> -->
                     <img class="profile-user-img img-fluid img-circle"
                       src="../img/logo1.png"
                       alt="User profile picture" style="height: 10%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); ">
                       <!-- 
                       <a href="https://drive.google.com/u/0/open?usp=forms_web&id=1TsYo0W4Z5Kfe16kCiM0wpoEsFjA3PPDv"></a> -->
                </div>

                <h3 class="profile-username text-center"><?php  echo $row['lname'];?>,<?php  echo $row['fname'];?> <?php  echo $row['mname'];?></h3>
                  <!-- <p class="text-muted text-center">Tracking no.<?php  echo $row['form_no'];?></p> -->

                <p class="text-muted text-center">Tracking no.<?php  echo $row['AptNumber'];?></p>
                 <p class="text-muted text-center"> <a href="print_form.php?view=<?php echo $row['AptNumber'];?>"><button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Print Form</button></a></p>
            
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phone Number</b> <a class="float-right"><?php  echo $row['PhoneNumber'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a href="" class="float-right"><?php  echo $row['Email'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Civil Status</b> <a class="float-right"><?php  echo $row['civil'];?></a>
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
           <?php if($row['Remark']==""){ ?>


         <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Add Info</h3>
           
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                   <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i> Maximize Page
                  </button>
              </div>
            </div>
             <form name="submit" method="post" enctype="multipart/form-data"> 
               <?php
                     $adid=$_SESSION['eaid'];
                     $ret=mysqli_query($con,"select name, level from users where id='$adid'");
                     $row=mysqli_fetch_array($ret);
                     $name=$row['name'];
                     $level=$row['level'];
                     ?> 
            <div class="card-body">
                <div class="form-group">
            
           <select name="remark_by" class="form-control wd-450" required="true" required="true" hidden="" >
               <option value="<?php  echo $row['name'];?>" selected="true"><?php  echo $row['name'];?></option>
              
            </select>
              </div>


              <div class="form-group">
                <label for="inputEstimatedBudget">Particulars</label>
                <input type="text" id="Particulars" name="particular" value="EDUCATIONAL ASSISTANCE" class="form-control" readonly="">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Period Covered</label>
                <input type="text" id="PeriodCovered" name="period_covered" class="form-control" >
              </div>
               <div class="form-group">
              <label for="inputEstimatedBudget">AMOUNT</label>
           <select name="amount" class="form-control wd-450" required="true" required="true" >
               <option value="1000" selected="true">1000</option>
               <option value="2000">2000</option>
                  <option value="3000">3000</option>
                     <option value="4000">4000</option>
                     <option value="5000">5000</option>
                     <option value="6000">6000</option>
                     <option value="7000">7000</option>
                     <option value="8000">8000</option>
                     <option value="9000">9000</option>
                     <option value="10000">10000</option>
            </select>
              </div>



               <div class="form-group">
                <label for="inputEstimatedBudget">Remarks</label>
              <textarea name="remark" placeholder=""  rows="5" cols="5" class="form-control wd-450" required="true"></textarea>
              </div>
                    

              <div class="form-group">
              <label for="inputEstimatedBudget">Status</label>
           <select name="status" class="form-control wd-450" required="true" required="true" >
               <option value="1" selected="true">FOR ASSESSMENT</option>
               <option value="2">PENDING</option>
                  <option value="3">DISAPPROVED</option>
                     <option value="4">APPROVED</option>
            </select>
              </div>

            </div>


            <!-- /.card-body -->
             <div class="row">
        <div class="col-6">
          
          <input type="submit" value="Submit" name="submit" class="btn btn-success float-right">
        </div>
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
                  
                  <button type="button" class="info-box bg-light btn btn-sm btn-success " value="<?php echo $row['AptNumber']; ?>">
                 <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">status</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php  
                              if($row['Status']=="1")
                              {
                                echo "FOR ASSESSMENT";
                              }

                              if($row['Status']=="2")
                              {
                               echo "PENDING";
                              }
                               if($row['Status']=="3")
                              {
                               echo "DISAPPROVED";
                              }
                               if($row['Status']=="4")
                              {
                               echo "APPROVED";
                              }
                                 if($row['Status']=="CLAIMED")
                              {
                               echo "CLAIMED";
                              }


                                   ;?><span>
                    </div>
            

                </button>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Remarks</h4>
                    <div class="post">
                      <div class="user-block">
                      
                       
                        <span class="description">Remarks by <?php echo $row['remark_by']; ?> on Date - <?php echo $row['RemarkDate']; ?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                    <?php echo $row['Remark']; ?>
                      </p>
                       <p>
                       <?php echo  @$msg;?>
                     </p>
                   
                    </div>

                  
                
                </div>
              </div>
            </div>



            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Particular</h3>
              <p class="text-muted"><?php echo $row['particular']; ?></p>
              <hr class="card card-success card-outline" >
              <ol class="breadcrumb float-sm-right">
            
             <!--  <li class="breadcrumb-item active">Category</li> -->
            </ol>
              <br>
               <div class="text-muted">
                <p class="text-sm">
                  <b class="d-block">OTHER INFORMATION</b>
                </p>
                <p class="text-sm">
                  <b class="d-block">1.)Pag-aari ng Pamilya<br><?php  echo $q2=$row['q2'];?></b>
                </p>
                <p class="text-sm">
                  <b class="d-block">2.)Naninirahan Kasama Ang Magulang?<br><?php  echo $q3=$row['q3'];?></b>
                </p>
                 <p class="text-sm">
                  <b class="d-block">3.)Kapatid na nag aaral<br><?php  echo $q4=$row['q4'];?></b>
                </p>
                 <p class="text-sm">
                  <b class="d-block">4.)Kapatid nag susustento<br><?php  echo $q5=$row['q5'];?></b>
                </p>
                 <p class="text-sm">
                  <b class="d-block">5.)WORKING STUDENT?<br><?php  echo $q6=$row['q6'];?></b>
                </p>
                <p class="text-sm">
                  <b class="d-block">6.)Gamit Sa pag aaral<br><?php  echo $q7=$row['q7'];?></b>
                </p>
                <p class="text-sm">
                  <b class="d-block">7.)NAG APPLY SA IBA PANG EDUCATIONAL ASSISTANCE PROGRAM NG GOBYERNO<br><?php  echo $q8=$row['q8'];?></b>
                </p>

           
              </div>
              <hr class="card card-success card-outline" >




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
</div>

    <?php include('includes/footer.php'); ?>



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