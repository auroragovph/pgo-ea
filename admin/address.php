<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
 <?php 

if(isset($_POST['submit']))


  {
   
    $purok=$_POST['purok'];


$query=mysqli_query($con, "insert into  street(purok) value('$purok')");
    if ($query) {
echo "<script>alert('New System Street has been added.');</script>"; 
echo "<script>window.location.href = 'add_purok.php'</script>"; 
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
            <h1 class="m-0 text-dark">Manage Address</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <a href="level.php"><button type="submit" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</button></a>
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
        <?php
        include 'add_purok.php';


        ?>
            
          </div>
          <!-- /.col -->

          <div class="col-md-3">
              <?php
        include 'add_barangay.php';


        ?>
            
          </div>
          <!-- /.col -->

          <div class="col-md-3">
          <?php
        include 'add_municipality.php';


        ?>
          </div>
          <!-- /.col -->

          <div class="col-md-3">
           <?php
        include 'add_province.php';


        ?>
          </div>
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
