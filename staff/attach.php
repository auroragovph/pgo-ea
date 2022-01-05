<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
<?php


if(isset($_POST['submit'])){

   
   $tracking_no=$_POST['tracking_no'];
  $req=$_POST['req'];
 
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
              if(!file_exists("../admin/requirements/".$txtGalleryName."/upload/".$file_name))
              {  
                $filename=basename($file_name,$ext);
                  $newFileName=$filename.time().".".$ext;
                  move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../admin/requirements/".$txtGalleryName."/".$file_name);
              }
              else
              {
                  $filename=basename($file_name,$ext);
                  $newFileName=$filename.time().".".$ext;
                  move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../admin/requirements/".$txtGalleryName."/".$newFileName);
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



    $sql = "INSERT INTO `attach` (`id`, `tracking_no`, `req`, `file` )
            VALUES ('', '{$tracking_no}', '{$req}', '{$json_file_names}') ";

    $query = $con->query($sql);


    if ($query) {
echo "<script>alert('Attached has been added.');</script>"; 
echo "<script>window.location.href = 'attach.php'</script>"; 
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Attached Requirements</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <a href="dashboard.php"><button type="submit" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</button></a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-md-3">
                <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Add</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="attach.php"  enctype="multipart/form-data">
               
                 
                   <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                        <label>Tracking Number</label>
                        <input type="text" name="tracking_no" class="form-control" placeholder="Enter ..." placeholder="Enter ..." >
                      </div>

                      <!-- text input -->
                      <div class="form-group">
                        <label>Requirements Description</label>
                        <input type="text" name="req" class="form-control" placeholder="Enter ...">
                      </div>
                     
                       <div class="form-group">
                        <label>File</label>
                        <input type="file" name="files[]" class="form-control" placeholder="Enter ..."  multiple>
                      </div>
                    </div>
                  </div>
                
                   <button class="btn btn-primary form-control" name="submit"><i class="fa fa-arrow-right"></i> Submit</button>
                </form>
              </div>
            
          <hr/>

          
            </div>
            
          </div>
          <!-- /.col -->

          <!-- <div class="col-md-9">
            
             <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data</h3>
            </div>
          
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Tracking Number</th>
                   <th>Scholar Name</th>

                  <th>File Name</th>
                  <th>File Attached</th>

                 
                  </tr>
                </thead>
              <tbody>
                  <?php
                $query1=mysqli_query($con,"SELECT * FROM  `tblappointment` t, `attach` s
                               WHERE t.`AptNumber`=s.`tracking_no` ORDER BY lname desc")or die(mysqli_error($con));
                    while ($row=mysqli_fetch_array($query1)){
                      $id=$row['id'];
                  ?>
                 <tr>
                 <td><?php  echo $tracking_no=$row['tracking_no'];?> </td>
                 <td><?php  echo $lname=$row['lname'];?>, <?php  echo $fname=$row['fname'];?> <?php  echo $mname=$row['mname'];?>   </td>
                  <td><?php  echo $req=$row['req'];?> </td>

                   <td>
                      
                      <?php $files = json_decode($row['file']); ?>

                      <?php foreach($files as $file): ?>
                        <a href="<?php echo '../admin/requirements/'.$file; ?>"><?= $file ?>,</a>
                      <?php endforeach; ?>

                  </td>
          
                   
            
                    
           
                 </td> 
                </tr>
             <?php } ?>
               
                </tbody>
             
              </table>
            </div>
         
          </div> -->
          </div> 
          <!-- /.col -->

        
          <!-- /.col -->

          <!-- /.col -->
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
