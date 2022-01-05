  <?php include"includes/header.php";?>
<?php


if(isset($_POST['submit'])){


   
    $date_issued = $_POST['date_issued'];
    $date_received = $_POST['date_received'];
    $issuing_office = $_POST['issuing_office'];
    $signatory = $_POST['signatory'];
    $receiving_office = $_POST['receiving_office'];
    $address = $_POST['address'];
    $subject = $_POST['subject'];
    $remarks = $_POST['remarks'];
    $office = $_POST['office'];
 
  json_encode(extract($_POST));

    $error=array();
    $extension=array("jpeg","jpg","png","gif","pdf");
    $filenames = array();
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){

          $file_name=$_FILES["files"]["name"][$key];
          $file_tmp=$_FILES["files"]["tmp_name"][$key];
          $ext=pathinfo($file_name,PATHINFO_EXTENSION);
          if(in_array($ext,$extension))
          {
              if(!file_exists("../admin/pdf/".@$txtGalleryName."/upload/".$file_name))
              {
                  move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../admin/pdf/".@$txtGalleryName."/".$file_name);
              }
              else
              {
                  $filename=basename($file_name,$ext);
                  $newFileName=$filename.time().".".$ext;
                  move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../admin/pdf/".@$txtGalleryName."/".$newFileName);
              }    array_push($filenames, $file_name);

          }


      


          else
          {
              array_push($error,"$file_name, ");
          }
    }

    $json_file_names = json_encode($filenames);

 

   
   
    
    // var_dump($_POST);
   


    // $pdf_directory = '../admin/uploads/';
    // $pdf_name = time().'__'.$_FILES['file']['name'];
    // $complete_pdf = $pdf_directory.time().'__'.$_FILES['file']['name'];
  
    // saving into folder
    // move_uploaded_file($_FILES['file']['tmp_name'], $complete_pdf);



    $sql = "INSERT INTO `incoming` (`id`, `date_issued`, `date_received`, `issuing_office`, `signatory`, `receiving_office`, `address`, `subject`, `remarks`, `file`)
            VALUES ('', '{$date_issued}', '{$date_received}', '{$issuing_office}', '{$signatory}', '{$receiving_office}', '{$address}', '{$subject}', '{$remarks}', '{$json_file_names}') ";

    $query = $conn->query($sql);


    if ($query) {
echo "<script>alert('Incoming has been added.');</script>"; 
echo "<script>window.location.href = 'incoming.php'</script>"; 
 } else {
echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
}



    // return die;

  //   if ($query) {

  //     // get the last ID

  //     $sql = "SELECT AptNumber FROM tblappointment ORDER BY ID DESC LIMIT 1";
  //     $query2 = mysqli_query($con, $sql);

  //     $AptNumber = mysqli_fetch_row($query2);

  //   $msg='<div class="alert alert-info alert-dismissible">
  //                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  //                 <h5><i class="icon fas fa-info"></i> SUCCESS!</h5>
  //                 REGISTRATION SUCCESS! Your TRACKING NO. is <h1>'.$AptNumber[0].'</h1>
  //               </div>';
  // }
  // else
  //   {
  //      $msg='<div class="alert alert-info alert-dismissible">
  //                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  //                 <h5><i class="icon fas fa-info"></i> Alert!</h5>
  //                 SOMETHING WENT WRONG
  //               </div>';
  //   }
  }





?>



<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php include"includes/nav.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">MEDIA GALLERY</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     
<div class="col-12">
            <div class="card card-primary">
              
              <div class="card-header center">
                <div class="card-title">
               <i class="fa fa-smile"></i>
                </div>
              </div>
              
              
              <div class="card-body">
                <div class="row">
      <?php
      $query=mysqli_query($con,"select * from `tblappointment` order by school_name,lname asc");
      while($row=mysqli_fetch_array($query)){
      ?>
           <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
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
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="view-appointment.php?view=<?php echo $row['ID'];?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>

       <?php }     ?>


               
                 
                </div>
              </div>
            </div>
          </div>




      </section>





       

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
<?php include"includes/footer2.php";?>
</div>
<!-- ./wrapper -->
<?php include"includes/footer.php";?>
</body>
</html>
