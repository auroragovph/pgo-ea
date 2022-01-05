<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
 <?php 

if(isset($_POST['submit']))


  {
    $office_name=$_POST['office_name'];
    $office_des=$_POST['office_des'];


$query=mysqli_query($con, "insert into  office(office_name,office_des) value('$office_name','$office_des')");
    if ($query) {
echo "<script>alert('New Office has been added.');</script>"; 
echo "<script>window.location.href = 'add_office.php'</script>"; 
 } else {
echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
} }
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Office</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <a href="Office.php"><button type="submit" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</button></a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="col-md-3">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="add_office.php">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="office_name" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                 
                   <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="office_des" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                
                   <button class="btn btn-primary form-control" name="submit"><i class="fa fa-arrow-right"></i> Submit</button>
                </form>
              </div>
              
          <hr/>
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
