<?php

include('dbconnection.php');


?>
<!DOCTYPE html>
<!--
Wag mong Buksan.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>e.Assis | Form</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->

</head>


<script src="file://///10.149.45.1/htdocs/logic/assets/bootstrap.min.js"></script>
<script type="text/javascript" src="file://///10.149.45.1/htdocs/logic/assets/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
  document.oncontextmenu=RightMouseDown;
  document.onmousedown = mouseDown;
  function mouseDown(e) {
      if (e.which==3) {//righClick
      alert("Disabled - do not use mouse right click..");
   }
}
function RightMouseDown() { return false;}
</script>
<script>
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
    window.onhashchange=function(){window.location.hash="no-back-button";}
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
 <div class="content">

  <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> EDUCATIONAL ASSISTANCE <small></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">M</a></li>
              <li class="breadcrumb-item"><a href="#">I</a></li>
              <li class="breadcrumb-item active">S</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  <?php
if (isset($_POST['search'])) {

    $tracking = $_POST['searchdata'];

    $appointment_query = "SELECT * FROM `tblappointment` WHERE `AptNumber` = {$tracking}";
    $appointment_sql = mysqli_query($con, $appointment_query);
    $appointment_data = mysqli_fetch_array($appointment_sql);

    $attachment_query = "SELECT * FROM `attached` WHERE `tracking` = {$tracking} order by `date`";
    $attachment_sql = mysqli_query($con, $attachment_query);


    $fetched = $appointment_data['AptNumber'] ?? null;

}

?>
      <div class="container">
        <div class="row">

  <div class="col-md-12">
           

    <?php if (isset($_POST['search']) && $fetched !== null): ?>

          
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">

                  <center ><img src="image/aurora_logo.png" alt="User Avatar" class="profile-user-img img-responsive img-circle btn-success" width="40%" style="height: 100%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%);"></center>

                <h3 class="profile-username text-center">
          
                  <?= $appointment_data['lname'] ?>,<?= $appointment_data['fname'] ?> <?= $appointment_data['mname'] ?>
                    

                  </h3>

                <p class="text-muted text-center">Tracking no.<?= $appointment_data['AptNumber'] ?></p>
                  
                <ul class="list-group list-group-unbordered mb-3">
                   <li class="list-group-item">
                    <b>Particular</b> <a class="float-right"><?= $appointment_data['particular'] ?></a>
                  </li>
                <!--   <li class="list-group-item">
                    <b>Amount</b> <a class="float-right"><?= $appointment_data['amount'] ?></a>
                  </li> -->
                     
                    <b>STATUS</b>  <?php  

                               if($appointment_data['Status']=="CLAIMED")
                              {
                                echo "<div class='btn btn-lg btn-success'  >EDUCATIONAL ASSISTANCE WAS CLAIMED</div>";
                              }


                              if($appointment_data['Status']=="1")
                              {
                                echo "<div class='btn btn-lg btn-default' style='height: 100%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); '>APPLICATION WAS FOR ASSESSMENT</div>";
                              }

                            
                              if($appointment_data['Status']=="2")
                              {
                               echo "<div class='btn btn-xs btn-warning'>APPLICATION WAS PENDING</div>";
                              }
                                if($appointment_data['Status']=="3")
                              {
                               echo "<div class='btn btn-lg btn-danger'>APPLICATION WAS DISAPPROVED</div>";
                              }  if($appointment_data['Status']=="4")
                              {
                               echo "<div class='btn btn-lg btn-success'>APPLICATION WAS APPROVED AND WAIT FOR CLAIMING</div>";
                              }
                              if($appointment_data['Status']=="")
                              {
                               echo "<div class='btn btn-lg btn-warning' style='height: 100%;
                      background: linear-gradient(to top left, #6699ff 41%, #ff9966 101%); '>APPLICATION WAS REVIEWED AND ON PROCESS</div>";
                              }

                                   ;?></a> 
                 
                  
                  <!-- <li class="list-group-item">
                    <b>Apply Date</b> <a class="float-right"><?php  echo $row['ApplyDate'];?></a>
                  </li> -->
                </ul>







          </div>
        </div>`
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
           <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                      
                    <th>REMARKS</th>
                      <th>REMARKS DATE</th>
                      
                   
                    <!-- <th>BRGY</th> -->




                </tr>
              </thead>

              <tbody>
              
                  <tr>
                    
                    <td><?= $appointment_data['Remark'] ?>-Remarks by: <?= $appointment_data['remark_by'] ?> </td>
                      <td><?= $appointment_data['RemarkDate'] ?></td>
                    
                  
                  </tr> 


                  
             

              </tbody>

           </table>
           
           </div>
        </div>
      </div>

    </div>

                    <?php else: ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 
              <h1><i class="fa fa-question"></i>  YOUR APPLICATION WAS UNDER REVIEWING PROCESS</h1>
                </div>
                  <?php endif;?>


</div>











</div>
</div>
</div>

</div>
</body>