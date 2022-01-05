<?php include('includes/header.php'); ?>

  <!-- Main Sidebar Container -->
 <?php 

if(isset($_POST['submit']))


  {
    $name=$_POST['name'];
    $office=$_POST['office'];
   $username=$_POST['username'];
    $password=md5($_POST['password']);
$level=$_POST['level'];
$query=mysqli_query($con, "insert into  users(name,office,username,password,level) value('$name','$office','$username','$password','$level')");
    if ($query) {
echo "<script>alert('New System user has been added.');</script>"; 
echo "<script>window.location.href = 'users.php'</script>"; 
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
            <h1 class="m-0 text-dark">System Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <a href="users.php"><button type="submit" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</button></a>
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
                <form role="form" method="POST" action="add_users.php">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                 
                   <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                     <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Office</label>
                        <select name="level" class="form-control">
                          <?php $query=mysqli_query($con,"select * from office");
                           while($row=mysqli_fetch_array($query))
                           {?>
                          <option value="<?php echo $row['office_name'];?>"><?php echo $row['office_name'];?></option>
                        <?php } ?>
                        
                        </select>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>User Level</label>
                        <select name="level" class="form-control">
                          <?php $query=mysqli_query($con,"select * from level");
                           while($row=mysqli_fetch_array($query))
                           {?>
                          <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                        <?php } ?>
                        
                        </select>
                      </div>
                    </div>
                  </div>
                   <button class="btn btn-primary form-control" name="submit">Submit</button>
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
