
<?php include('includes/header.php'); ?>





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


   
    $aptnumber = mt_rand(100000000, 999999999);
    
    // var_dump($_POST);
   

  
    $pdf_directory = '../admin/uploads/';
    $pdf_name = time().'__'.$_FILES['file']['name'];
    $complete_pdf = $pdf_directory.time().'__'.$_FILES['file']['name'];
  
    // saving into folder
    move_uploaded_file($_FILES['file']['tmp_name'], $complete_pdf);



    $sql = "INSERT INTO `tblappointment` (`ID`, `AptNumber`, `fname`, `lname`, `mname`, `age`, `sex`, `purok`, `muni`, `brgy`, `prov`, `purok1`, `muni1`, `brgy1`, `prov1`, `birthdate`, `birthplace`, `school_name`, `School_address`, `current_y_level`, `gwa`, `question`, `question2`, `question3`, `father_name`, `address1`, `contact_no1`, `employer`, `occupation`, `mother_name`, `address2`, `contact_no2`, `employer2`, `occupation1`, `number_f_mem`, `income`, `Email`, `PhoneNumber`, `file` )
            VALUES ('', '{$aptnumber}', '{$fname}', '{$lname}', '{$mname}', '{$age}', '{$sex}', '{$purok}', '{$muni}', '{$brgy}', '{$prov}', '{$purok1}', '{$muni1}', '{$brgy1}', '{$prov1}', '{$birthdate}', '{$birthplace}', '{$school_name}', '{$School_address}', '{$current_y_level}', '{$gwa}', '{$question}', '{$question2}', '{$question3}', '{$father_name}', '{$address1}', '{$contact_no1}', '{$employer}', '{$occupation}', '{$mother_name}', '{$address2}', '{$contact_no2}', '{$employer2}', '{$occupation1}', '{$number_f_mem}', '{$income}', '{$Email}', '{$PhoneNumber}', '{$pdf_name}') ";

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





?>
  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <!--  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"> </li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->
    <!-- /.content-header -->

    <!-- Main content -->
    <br>
    <section class="content">
      <div class="container-fluid">

       
       


         
             <div class="card card-success">
              <div class="card-header">

             <i class="fa fa-book"></i> APPLICATION FORM

                 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i> Maximize Page
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="add_scholar.php" method="post" class="appointment-form" enctype="multipart/form-data">
                  <div class="row">

                  <div class="card-body">
                 <div class="row">
                  <div class="col-5">
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required="">
                  </div>
                  <div class="col-5">
                    <input type="text" class="form-control" name="fname" placeholder="First Name" required="">
                  </div>
                  <div class="col-2">
                    <input type="text" class="form-control" name="mname" placeholder="Middle initial" required="">
                  </div>
                </div>
                <BR>
                 <div class="row">
                      <div class="col-6">
                    <input type="number" class="form-control" name="age" placeholder="Age" required="">
                  </div>
                  <div class="col-6">
                      <select name="sex" class="form-control wd-450" required="true" required="true" >
               <option value="MALE" selected="true">MALE</option>
               <option value="FEMALE">FEMALE</option>
            </select>
                  </div>
                    </div>   <hr class="card card-success card-outline" >
             
               <div class="row">
                   <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>PRESENT ADDRESS</label>
                     
                      </div>
                    </div>

                      <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>Street/Purok</label>
                           <select name="purok1" class="form-control">
                          <?php $query=mysqli_query($con,"select * from street");
                           while($row=mysqli_fetch_array($query))
                           {?>
                          <option value="<?php echo $row['purok'];?>"><?php echo $row['purok'];?></option>
                        <?php } ?>
                        
                        </select>
                      </div>
                    </div>
                   <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>Barangay</label>
                       <select name="brgy1" class="form-control">
                          <?php $query=mysqli_query($con,"select * from barangay ORDER BY brgy ");
                           while($row=mysqli_fetch_array($query))
                           {?>

                          <option value="<?php echo $row['brgy'];?>"><?php echo $row['brgy'];?></option>
                        <?php } ?>
                        
                        </select>
                      </div>
                    </div>

                       <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Municipality</label>
                      <select name="muni1" class="form-control">
                          <?php $query=mysqli_query($con,"select * from municipality");
                           while($row=mysqli_fetch_array($query))
                           {?>
                        
                          <option value="<?php echo $row['muni'];?>"><?php echo $row['muni'];?></option>
                        <?php } ?>
                        
                        </select>
                      </div>

                    </div>
                       <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Province</label>
                        <select name="prov1" class="form-control">
                          <?php $query=mysqli_query($con,"select * from province");
                           while($row=mysqli_fetch_array($query))
                           {?>
                        
                          <option value="<?php echo $row['prov'];?>"><?php echo $row['prov'];?></option>
                        <?php } ?>
                        
                        </select>
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
                           <select name="purok" class="form-control">
                          <?php $query=mysqli_query($con,"select * from street");
                           while($row=mysqli_fetch_array($query))
                           {?>
                          <option value="<?php echo $row['purok'];?>"><?php echo $row['purok'];?></option>
                        <?php } ?>
                        
                        </select>
                      </div>
                    </div>
                   <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <label>Barangay</label>
                       <select name="brgy" class="form-control">
                          <?php $query=mysqli_query($con,"select * from barangay ORDER BY brgy ");
                           while($row=mysqli_fetch_array($query))
                           {?>

                          <option value="<?php echo $row['brgy'];?>"><?php echo $row['brgy'];?></option>
                        <?php } ?>
                        
                        </select>
                      </div>
                    </div>

                       <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Municipality</label>
                      <select name="muni" class="form-control">
                          <?php $query=mysqli_query($con,"select * from municipality");
                           while($row=mysqli_fetch_array($query))
                           {?>
                        
                          <option value="<?php echo $row['muni'];?>"><?php echo $row['muni'];?></option>
                        <?php } ?>
                        
                        </select>
                      </div>

                    </div>
                       <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Province</label>
                        <select name="prov" class="form-control">
                          <?php $query=mysqli_query($con,"select * from province");
                           while($row=mysqli_fetch_array($query))
                           {?>
                        
                          <option value="<?php echo $row['prov'];?>"><?php echo $row['prov'];?></option>
                        <?php } ?>
                        
                        </select>
                      </div>
                    </div>
                    </div><br>
             





                

                    <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="PhoneNumber" placeholder="Contact Number" required="">
                  </div>
                  <div class="col-8">
                    <input type="email" class="form-control" name="Email" placeholder="Email Address" required="">
                  </div>
                    </div><br>


                    <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="birthdate" placeholder="Birth Date" required="">
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" name="birthplace" placeholder="Birth Place" required="">
                  </div>
                    </div><br>
                        <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="school_name" placeholder="Name Of School" required="">
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" name="School_address" placeholder="School Address" required="">
                  </div>
                    </div><br>

                      <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="current_y_level" placeholder="Current Year Level" required="">
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" name="gwa" placeholder="GWA from Last SEM/S.Y" required="">
                  </div>
                    </div><br>
             
                   <hr class="card card-success card-outline" >
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <p>Are You a recipient of other government aid/scholarship?</p>
                         <div class="col-12">
                       <div class="form-group clearfix">
                       <div class="icheck-success d-inline">
                    <input type="checkbox" value="Yes" name="question"  id="checkboxSuccess1">
                    <label for="checkboxSuccess1">
                      Yes
                    </label>
                  </div>
                  <div class="icheck-success d-inline">
                    <input type="checkbox" value="NO" name="question2" id="checkboxSuccess2">
                    <label for="checkboxSuccess2">
                      No
                    </label>
                  </div>
                  



                     <div class="row">
                      <div class="col-10">
                         <label for="checkboxSuccess2">
                      If yes, From what program and Government Agency?
                    </label>
                    <input type="text" class="form-control" name="question3" placeholder="Agency?">
                  </div>
                
                    </div>
                 
                </div>



              
                        </div>
                     
                      </div>
                    </div>

                     <hr class="card card-success card-outline" >
                

                     <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="father_name" placeholder="Fathers Name" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="occupation" placeholder="Occupation" required="">
                  </div>
                 
                    </div>

                    <br>
                    

                     <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="address1" placeholder="Address" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="contact_no1" placeholder="Contact Number" required="">
                  </div>
                 
                    </div><br>
                    <div class="row">
                      <div class="col-12">
                    <input type="text" class="form-control" name="employer" placeholder="Employer" required="">
                  </div>
                
                    </div>


                    <br>

                       <div class="row">
                      <div class="col-6">
                        <input type="text" class="form-control" name="mother_name" placeholder="Mothers Name" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="occupation1" placeholder="Occupation" required="">
                  </div>
                   
                    </div><br>

                     <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="address2" placeholder="Address" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="contact_no2" placeholder="Contact Number" required="">
                  </div>
                 
                    </div><br>
                    <div class="row">
                      <div class="col-12">
                    <input type="text" class="form-control" name="employer2" placeholder="Employer" required="">
                  </div>
                
                    </div>


                    <br>


                       <div class="row">
                      <div class="col-7">
                    <input type="number" class="form-control" name="number_f_mem" placeholder="Number of Family Member" required="">
                  </div>
                  <div class="col-5">
                    <input type="number" class="form-control" name="income" placeholder="Monthly Income" required="">
                  </div>
                   <!--  <div class="col-7">
                   <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile" required="">
                        <label class="custom-file-label" for="exampleInputFile">Photo(2x2)</label>
                      </div>
                  </div> -->
                    </div><br>
                  
                   </div>
                   <div class="col-4">
                    <button type="submit"  name="submit" value="Make an Appointment" class="btn btn-primary btn-block btn-flat"><i class="fa fa-arrow-down"></i> Submit</button>

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
