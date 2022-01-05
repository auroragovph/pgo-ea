
<?php include('includes/header.php'); 
?>










<?php


if(isset($_POST['submit'])){

   
   $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $mname=$_POST['mname'];
  $age=$_POST['age'];
  $sex=$_POST['sex'];

  //permanent address
  $purok=$_POST['purok'];
  $muni=$_POST['muni'];
  $brgy=$_POST['brgy'];
  $prov=$_POST['prov'];
  //pressent address
  $purok1=$_POST['purok1'];
  $muni1=$_POST['muni1'];
  $brgy1=$_POST['brgy1'];
  $prov1=$_POST['prov1'];


  $birthdate=$_POST['birthdate'];
  $birthplace=$_POST['birthplace'];
  $school_name=$_POST['school_name'];
  $School_address=$_POST['School_address'];
  $current_y_level=$_POST['current_y_level'];
  $gwa=$_POST['gwa'];

   $question=$_POST['question'];
    $question2=$_POST['question2'];
     $question3=$_POST['question3'];

  $father_name=$_POST['father_name'];
   $address1=$_POST['address1'];
    $contact_no1=$_POST['contact_no1'];
    $employer=$_POST['employer'];
  $occupation=$_POST['occupation'];
 

  $mother_name=$_POST['mother_name'];
    $address2=$_POST['address2'];
    $contact_no2=$_POST['contact_no2'];
    $employer2=$_POST['employer2'];
  $occupation1=$_POST['occupation1'];

  $number_f_mem=$_POST['number_f_mem'];
  $income=$_POST['income'];
    $Email=$_POST['Email'];
   $PhoneNumber=$_POST['PhoneNumber'];


   
    $AptNumber = $_POST['AptNumber'];
    $file = $_POST['file'];
    
    // var_dump($_POST);
   



    $sql = "INSERT INTO `tblappointment` (`ID`, `AptNumber`, `fname`, `lname`, `mname`, `age`, `sex`, `purok`, `muni`, `brgy`, `prov`, `purok1`, `muni1`, `brgy1`, `prov1`, `birthdate`, `birthplace`, `school_name`, `School_address`, `current_y_level`, `gwa`, `question`, `question2`, `question3`, `father_name`, `address1`, `contact_no1`, `employer`, `occupation`, `mother_name`, `address2`, `contact_no2`, `employer2`, `occupation1`, `number_f_mem`, `income`, `Email`, `PhoneNumber`, `file` )
            VALUES ('', '{$AptNumber}', '{$fname}', '{$lname}', '{$mname}', '{$age}', '{$sex}', '{$purok}', '{$muni}', '{$brgy}', '{$prov}', '{$purok1}', '{$muni1}', '{$brgy1}', '{$prov1}', '{$birthdate}', '{$birthplace}', '{$school_name}', '{$School_address}', '{$current_y_level}', '{$gwa}', '{$question}', '{$question2}', '{$question3}', '{$father_name}', '{$address1}', '{$contact_no1}', '{$employer}', '{$occupation}', '{$mother_name}', '{$address2}', '{$contact_no2}', '{$employer2}', '{$occupation1}', '{$number_f_mem}', '{$income}', '{$Email}', '{$PhoneNumber}', '{$file}') ";

    $query = $con->query($sql);



    // return die;

    if ($query) {


      // get the last ID

      $sql = "SELECT AptNumber FROM tblappointment ORDER BY ID DESC LIMIT 1";
      $query2 = mysqli_query($con, $sql);

      $AptNumber = mysqli_fetch_row($query2);

    $msg='<div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> SUCCESS!</h5>
                  REGISTRATION SUCCESS! Your TRACKING NO. is <h1>'.$AptNumber[0].'</h1>
                </div>';
  }
  else
    {
       $msg='<div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Alert!</h5>
                  SOMETHING WENT WRONG
                </div>';
    }
  }



     
$con->query('UPDATE scholar SET status = 1');

?>
  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">VERIFY SCHOLAR</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <a href="scholar.php"><button type="submit" class="btn btn-warning"><i class="fa fa-arrow-left"></i> BACK</button></a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

            <?php
               $cid=$_GET['view'];
                 $ret=mysqli_query($con,"select * from  scholar where ID='$cid'");
                    $cnt=1;
                 while ($row=mysqli_fetch_array($ret)) {

                   ?>   
       


         
             <div class="card card-success">
              <div class="card-header">

             <i class="fa fa-book"></i> APPLICATION FORM

                 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i> Maximize Page
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="verify.php" method="post" class="appointment-form" enctype="multipart/form-data">
                  <div class="row">

                  <div class="card-body">
                  	  <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" name="AptNumber" value="<?php  echo $row['ID'];?>" required="">
                  </div>
                
                </div>
                <br>
                 <div class="row">
                  <div class="col-5">
                    <input type="text" class="form-control" name="lname" value="<?php  echo $row['mname'];?>" placeholder="Last Name" required="">
                  </div>
                  <div class="col-5">
                    <input type="text" class="form-control" name="fname" value="<?php  echo $row['fname'];?>" placeholder="First Name" required="">
                  </div>
                  <div class="col-2">
                    <input type="text" class="form-control" name="mname" value="<?php  echo $row['lname'];?>" placeholder="Middle initial" required="">
                  </div>
                </div>
                <BR>
                 <div class="row">
                      <div class="col-6">
                    <input type="number" class="form-control" name="age" value="<?php  echo $row['age'];?>" placeholder="Age" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="sex" value="<?php  echo $row['sex'];?>"  placeholder="sex" required="">
                  </div>
                    </div>   <hr class="card card-success card-outline" >
             
               <div class="row">
                   <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>PRESENT ADDRESS</label>
                     
                      </div>
                    </div>

                     
                  

                     
                       <div class="col-sm-10">
                      <!-- select -->
                      <div class="form-group">
                       
                     <input type="text" class="form-control" name="purok1" value="<?php  echo $row['present_ad'];?>" required="">
                      </div>
                    </div>
                    </div><br>


                     <div class="row">
                   <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>PERMANENT ADDRESS</label>
                     
                      </div>
                    </div>

                      <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>Street/Purok</label>
                            <input type="text" class="form-control" name="purok" value="<?php  echo $row['purok'];?>" required="">
                      </div>
                    </div>
                   <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>Barangay</label>
                     <input type="text" class="form-control" name="brgy" value="<?php  echo $row['brgy'];?>" required="">
                      </div>
                    </div>

                       <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Municipality</label>
                       <input type="text" class="form-control" name="muni" value="<?php  echo $row['muni'];?>" required="">
                      </div>

                    </div>
                   
                    </div><br>
             
              <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="PhoneNumber" value="<?php  echo $row['contact'];?>" required="">
                  </div>
                  <div class="col-8">
                    <input type="email" class="form-control" name="Email" value="<?php  echo $row['email'];?>"  required="">
                  </div>
                    </div><br>


                    <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="birthdate" value="<?php  echo $row['bdate'];?>" required="">
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" name="birthplace" value="<?php  echo $row['bplace'];?>"  required="">
                  </div>
                    </div><br>
                        <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="school_name" value="<?php  echo $row['school'];?>"required="">
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" name="School_address" value="<?php  echo $row['school_address'];?>" required="">
                  </div>
                    </div><br>

                      <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="current_y_level" value="<?php  echo $row['y_level'];?>" placeholder="Current Year Level" required="">
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" name="gwa" value="<?php  echo $row['gwa'];?>" placeholder="GWA from Last SEM/S.Y" required="">
                  </div>
                    </div><br>
             
                   <hr class="card card-success card-outline" >
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <p>Are You a recipient of other government aid/scholarship?</p>
                         <div class="col-12">
                       <div class="form-group clearfix">
                       
                    <input type="text" name="question" value="<?php  echo $row['q2'];?>">
                  
                  
               
                  



                     <div class="row">
                      <div class="col-10">
                         <label for="checkboxSuccess2">
                      If yes, From what program and Government Agency?
                    </label>
                    <input type="text" name="question2" value="<?php  echo $row['q3'];?>">
                  </div>
                
                    </div>
                 
                </div>



              
                        </div>
                     
                      </div>
                    </div>

                     <hr class="card card-success card-outline" >
                

                     <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="father_name" value="<?php  echo $row['f_name'];?>" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="occupation" value="<?php  echo $row['occupation'];?>" required="">
                  </div>
                 
                    </div>

                    <br>
                    

                     <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="address1" value="<?php  echo $row['address'];?>" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="contact_no1" value="<?php  echo $row['contact1'];?>" required="">
                  </div>
                 
                    </div><br>
                    <div class="row">
                      <div class="col-12">
                    <input type="text" class="form-control" name="employer" value="<?php  echo $row['employer'];?>" required="">
                  </div>
                
                    </div>


                    <br>

                       <div class="row">
                      <div class="col-6">
                        <input type="text" class="form-control" name="mother_name" value="<?php  echo $row['m_name'];?>" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="occupation1" value="<?php  echo $row['contact2'];?>" required="">
                  </div>
                   
                    </div><br>

                     <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="address2" value=" <?php  echo $row['address2'];?>" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="contact_no2" value="<?php  echo $row['occupation2'];?>" required="">
                  </div>
                 
                    </div><br>
                    <div class="row">
                      <div class="col-12">
                    <input type="text" class="form-control" name="employer2" value="<?php  echo $row['employer2'];?>" required="">
                  </div>
                
                    </div>


                    <br>


                       <div class="row">
                      <div class="col-3">
                    <input type="number" class="form-control" name="number_f_mem" value="<?php  echo $row['f_mem'];?>" required="">
                  </div>
                  <div class="col-2">
                    <input type="text" class="form-control" name="income" value="<?php  echo $row['income'];?>" required="">
                  </div>
                    <div class="col-7">
                   <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile" required="">
                        <label class="custom-file-label" for="exampleInputFile">Photo(2x2)</label>
                      </div>
                  </div>
                    </div><br>
                    <?php }?>
                   </div>
                   <div class="col-4">
                    <button type="submit"  name="submit" value="Make an Appointment" class="btn btn-warning btn-block btn-flat"><i class="fa fa-arrow-down"></i> VERIFY</button>

                         <br>
                       <?php echo  @$msg;?>


                    </div>
                     <!--    <div class="pull-right col-3">
                    <a href="index.php" class="btn btn-danger btn-block btn-flat"><i class="fa fa-times"></i> Cancel</a></div> -->
                   </div>
                </form>

               </div>
           
           </div>
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
