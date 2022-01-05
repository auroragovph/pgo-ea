<?php include('includes/header.php'); ?>







<?php


if(isset($_POST['submit'])){

   
   $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $mname=$_POST['mname'];
  $age=$_POST['age'];
  $sex=$_POST['sex'];
  $p_address=$_POST['p_address'];
   $per_address=$_POST['per_address'];
  $birthdate=$_POST['birthdate'];
  $birthplace=$_POST['birthplace'];
  $school_name=$_POST['school_name'];
  $school_address=$_POST['school_address'];
  $current_y_level=$_POST['current_y_level'];
  $gwa=$_POST['gwa'];
  $father_name=$_POST['father_name'];
  $occupation=$_POST['occupation'];
  $mother_name=$_POST['mother_name'];
  $occupation1=$_POST['occupation1'];
  $number_f_mem=$_POST['number_f_mem'];
  $income=$_POST['income'];
    $email=$_POST['email'];
   $PhoneNumber=$_POST['PhoneNumber'];
   
    $aptnumber = mt_rand(100000000, 999999999);
    
    // var_dump($_POST);
   

  
    $pdf_directory = '../admin/uploads/';
    $pdf_name = time().'__'.$_FILES['file']['name'];
    $complete_pdf = $pdf_directory.time().'__'.$_FILES['file']['name'];
  
    // saving into folder
    move_uploaded_file($_FILES['file']['tmp_name'], $complete_pdf);



    $sql = "INSERT INTO `tblappointment` (`ID`, `AptNumber`, `fname`, `lname`, `mname`, `age`, `sex`, `p_address`, `per_address`, `birthdate`, `birthplace`, `school_name`, `school_address`, `current_y_level`, `gwa`, `father_name`, `occupation`, `mother_name`, `occupation1`, `number_f_mem`, `income`, `email`, `PhoneNumber`, `file` )
            VALUES ('', '{$aptnumber}', '{$fname}', '{$lname}', '{$mname}', '{$age}', '{$sex}', '{$p_address}', '{$per_address}', '{$birthdate}', '{$birthplace}', '{$school_name}', '{$school_address}', '{$current_y_level}', '{$gwa}', '{$father_name}', '{$occupation}', '{$mother_name}', '{$occupation1}', '{$number_f_mem}', '{$income}', '{$email}', '{$PhoneNumber}', '{$pdf_name}') ";

    $query = $con->query($sql);



    // return die;


      if ($query) {
$ret=mysqli_query($con,"select AptNumber,fname,lname from tblappointment where Email='$email' and  PhoneNumber='$PhoneNumber'");
$result=mysqli_fetch_array($ret);
$_SESSION['aptno']=$result['AptNumber'];
$_SESSION['fname']=$result['fname'];
$_SESSION['lname']=$result['lname'];
 echo "<script>window.location.href='add_scholar.php'</script>";  
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
            <h1 class="m-0 text-dark">ADD SCHOLAR</h1>
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
                    <input type="text" class="form-control" name="sex" placeholder="sex" required="">
                  </div>
                    </div>   <hr class="card card-success card-outline" >
             
                       <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="p_address" placeholder="Present Address" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="per_address" placeholder="Permanent Address" required="">
                  </div>
                    </div><br>





                

                    <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="PhoneNumber" placeholder="Contact Number" required="">
                  </div>
                  <div class="col-8">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
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
                    <input type="text" class="form-control" name="school_address" placeholder="School Address" required="">
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
                

                     <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="father_name" placeholder="Fathers Name" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="occupation" placeholder="Occupation" required="">
                  </div>
                 
                    </div><br>
                       <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="mother_name" placeholder="Mothers Name" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="occupation1" placeholder="Occupation" required="">
                  </div>
                   
                    </div><br>

                       <div class="row">
                      <div class="col-3">
                    <input type="number" class="form-control" name="number_f_mem" placeholder="Number of Family Member" required="">
                  </div>
                  <div class="col-2">
                    <input type="number" class="form-control" name="income" placeholder="Monthly Income" required="">
                  </div>
                    <div class="col-7">
                   <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile" required="">
                        <label class="custom-file-label" for="exampleInputFile">Photo(2x2)</label>
                      </div>
                  </div>
                    </div><br>
                   
                   </div>
                   <div class="col-4">
                    <button type="submit"  name="submit" value="Make an Appointment" class="btn btn-primary btn-block btn-flat"><i class="fa fa-arrow-down"></i> Submit</button>

                         <br>
                       <div class="card success">
                         <div class="card-body login-card-body">
                          
                            <h4 class="w3ls_head"><?php echo $_SESSION['fname'];?> <?php echo $_SESSION['lname'];?> Tracking no is: <center><?php echo $_SESSION['aptno'];?> </center></h4>

                          

     
 
      
                         </div>
    <!-- /.login-card-body -->
  </div>



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
