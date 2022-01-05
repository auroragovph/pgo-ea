<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eaid']==0)) {
  header('location:logout.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Export e.Assis</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"><i class="fa fa-home"></i> <span>HOME</span></a>
            </div>

            <div class="clearfix"></div>
         
            <br />

          
            <!-- /sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
           
              <div class="menu_section">
                <h3><i class="fa fa-question"></i> NOTE</h3>
                <ul class="nav side-menu">
                   <li><a href="#">Search And Click your Desired buttons(copy,csv,excel,pdf,print) to export.<span class="label label-success pull-right"></span></a></li>
             
                </ul>
              </div>

            </div>
            <!-- /menu footer buttons -->
        
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
 
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           

            <div class="clearfix"></div>

            <div class="row">
          <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>EXPORT  <small>PAGE</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                   
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                   PLEASE SELECT YOUR DESIRED BUTTONS
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                      <tr>
                    <th>Tracking No.</th>
                  <th>Name</th>
                 
                  <th>Address</th>
                  <th>School</th>
                  
                  <th>Requirements</th>
                  <th>Status</th>
                    <th>Remarks</th>
                 
                 <!--  <th>Action</th> -->
                 
                   
               
                </tr>
                      </thead>

   <tbody>
                  <?php
                      // $query1 = mysqli_query($con,"
                      //                           SELECT * FROM  `tblappointment` t, `attach` s
                      //                           WHERE t.`AptNumber`=s.`tracking_no` ORDER BY lname desc
                      //          ")or die(mysqli_error($con));

                      $query1 = mysqli_query($con,"
                                 SELECT *, `tblappointment`.`AptNumber`, `attach`.`tracking_no`
                                  FROM `tblappointment`
                                  LEFT JOIN  `attach`
                                  ON `tblappointment`.`AptNumber` = `attach`.`tracking_no`
                               
                                   where old = '';
                               ")or die(mysqli_error($con));

                      // echo json_encode(mysqli_fetch_array($query1));

                      // die;

                    while ($row=mysqli_fetch_array($query1)){
                      $id=$row['id'];
                  ?>
                 <tr>
                 <td><?php  echo $AptNumber=$row['AptNumber'];?> </td>
                 <td><?php  echo $lname=$row['lname'];?>, <?php  echo $fname=$row['fname'];?> <?php  echo $mname=$row['mname'];?>   </td>
                  <td><?php  echo $row['purok'];?> <?php  echo $row['brgy'];?>,<?php  echo $row['muni'];?>,<?php  echo $row['prov'];?></td>
                   <td><?php  echo $school_name=$row['school_name'];?> </td>

                    
                   <td>

                    <?php if($row['tracking_no'] == null): ?>

                      <?= 'PLEASE Click to ATTACH ->'?>

                      <?php 
                        echo "
                          <a href='attach2.php?view=".$row['ID']."' class='btn btn-success'>
                            HERE
                          </a>
                        ";
                      ?>



                      <?php else: ?>


                          <?php  echo $req=$row['req'];?>->
                            
                            <?php $files = json_decode($row['file']); ?>

                            <?php foreach($files as $file): ?>
                              <a href="<?php echo '../admin/requirements/'.$file; ?>"><?= $file ?>,</a>
                            <?php endforeach; ?>


                      <?php endif; ?>

                  </td>
                  <td>

                       
                 <div class="info-box-content">
                      <span class="info-box-number text-center text-muted mb-0"
                    <?php  

                               if($row['Status']=="CLAIMED")
                              {
                                echo "<div class='btn btn-xs btn-success'>CLAIMED</div>";
                              }


                              if($row['Status']=="1")
                              {
                                echo "<div class='btn btn-xs btn-default'>FOR ASSESSMENT</div>";
                              }

                            
                              if($row['Status']=="2")
                              {
                               echo "<div class='btn btn-xs btn-warning'>PENDING</div>";
                              }
                                if($row['Status']=="3")
                              {
                               echo "<div class='btn btn-xs btn-danger'>DisApproved</div>";
                              }  if($row['Status']=="4")
                              {
                               echo "<div class='btn btn-xs btn-success'>Approved</div>";
                              }
                              if($row['Status']=="")
                              {
                               echo "<div class='btn btn-xs btn-warning'>ON PROCESS</div>";
                              }

                                   ;?>


                                 </button></td> 
                                 <!--   <td>
                        <?php if($row['status']==""){ ?>
                             
                <form method="post" action="preregistered.php">
                        <input type="text" name="status" class="form-control" value="CLAIMED" placeholder="Enter ..." readonly="" hidden="">
                          <button type="submit" name="submit" class="btn btn-primary btn-sm">CLAIM</button>
                     
                                        </form>
               <?php } else { ?>


                                <?php }?></td> -->

                          <!--      <td>  <a href="view-appointment.php?view=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-sm btn-success mt-1"><i class="fa fa-search"></i> View</button></a>  
                               <a href="view_approved.php?view=<?php echo $row['ID'];?>"><button type="submit" class="btn btn-sm btn-warning mt-1"><i class="fa fa-arrow-right"></i> UPDATE</button></a>            
                                      
                             <button type="submit" onclick="deleteCommu('<?php echo $row['ID']; ?>')" class="btn btn-sm btn-danger mt-1"> <i class="fa fa-times"></i> Delete</button> -->

                              <!--   <button type="button" class="btn btn-sm btn-warning mt-1 edituser" value="<?php echo $row['userid']; ?>"><i class="fa fa-pen"></i> Edit</button>  -->

                          <!--   <button type="button" class="btn btn-warning edituser mt-1" value="<?php echo $row['ID']; ?>"> <i class="fa fa-pen"></i> Status</button> -->
                          <td><?php  echo $Remark=$row['Remark'];?> </td>
                </tr>
             <?php } ?>
               
                </tbody>
             
                    </table>
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>

        
              
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
             MANAGEMENT INFORMATION SYSTEM- <a href="#">AURORA</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
   <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>