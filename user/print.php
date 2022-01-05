<?php

include('includes/dbconnection.php');
foreach($_POST['names'] as $name){
  $updatePrint = $con->query('UPDATE tblappointment SET print = 1 WHERE ID = '.$name);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payroll</title>
    <link rel="stylesheet" href="paper/paper.css">
    <link rel="stylesheet" href="paper/style.css">

    <style>
        @page { size: Legal landscape ; }

        table, thead, tbody, tr, td, th{
            border: 2px solid black;
        }

        .letter-box{
            border: 2px solid black;
            margin-left: -2px;
            padding: 0 10px;
            font-weight: bold;
        }

        .-mt-10{
            margin-top: -10px;
        }
         .right{
            margin-top: -90px;
            float: right;
        }

    </style>
</head>
<body class="legal landscape">
    <section class="sheet padding-5mm">


        <div class="card-header">
        <p> PROVINCIAL FORM NO. 36(A)
        <br>(Revised 1986)
         <br>FUND:________</p>
          <br>


          <div class="right">
           <p> Payroll no.________
        
         <br>Sheet________of______Sheets</p>
       </div>
          <br>

              <img class="profile-user-img img-fluid img-circle "
                       src="../image/aurora_logo.png"
                       alt="User profile picture" height="30%" width="6%">
                       <br>
      

          
              </div>
                  
                       <p>We acknoledge reciept of cash shown opposite our full compensation for service rendered for the period covered</p>
                    

                     <br>
              <div class=" invoice-info">
             
                    <table class="table table-bordered table-hover">
                           <thead>
                        <tr> 
                
                  <th>LAST NAME</th>
                  <th>FIRST NAME</th>
                  <th>M.I</th>
                  <th>ADDRESS</th>
                  <th>SCHOOL</th>
                  <th>PARTICULARS</th>
                   <th>PERIOD COVERED</th>

                  <th>AMOUNT</th>
                   <th>SIGNATURE</th>
                   </tr> 
                 </thead> 
                 <tbody>
                      <?php
                  $ret=mysqli_query($con,"select * from tblappointment where print = '4' ");
                    $num=mysqli_num_rows($ret);
                    if($num>0){
                                  $cnt=1;
                                while ($row=mysqli_fetch_array($ret)) {
                               ?>

                            <tr> 
                            <td> <?php  echo $lname=$row['lname'];?></td>
                            <td><?php  echo $fname=$row['fname'];?> </td>
                            <td><?php  echo $mname=$row['mname'];?> </td>
                            <td><?php  echo $row['purok1'];?> <?php  echo $row['brgy1'];?> <?php  echo $row['muni1'];?> <?php  echo $row['prov1'];?> </td>
                            <td><?php  echo $school=$row['school_name'];?> </td>
                            <td><?php  echo $school=$row['particular'];?></td> 
                            <td><?php  echo $row['period_covered'];?></td>
                            <td><?php  echo $school=$row['amount'];?> </td>
                 
                            <td></td>
                          
                              </tr>   <?php 
                        
                                    } } else { ?>
                            <tr>
                            <td colspan="8"> No record found</td>
                                </tr>
                             <?php } ?>
                             
            
                           </tbody>

                             <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>TOTAL</th> 
                  <th></th>
                   <th></th>
                </tr>
                </tfoot>

                            </table> 









        <table>

            <tr class="bbm">
                <td class="brm" width="20%"> 

                    <span class="letter-box">A</span>

                    <br><br>

                    <p class="text-center">GERARDO A. NOVERAS</p>
                    <p class="text-center -mt-10">Governor</p>


                </td>
                <td class="brm" width="50%">
                    <span class="letter-box">B</span>  <span><b>Certified:</b> Supporting documents complete and proper</span>
                    <br><br>
                    <p class="text-center">WILFREDO C. SATURNO</p>
                    <p class="text-center -mt-10">PGDH - Accounting</p>
                </td>
                <td>
                    <span class="letter-box">C</span>  <span><b>Certified:</b> Cash available for the purpose</span>
                    <p class="text-center">MARY ZENCLAIRE N. ONG</p>
                    <p class="text-center -mt-10">OIC - Treasury</p>
                </td>
            </tr>

            <tr class="bbm" width="30%">
                <td class="brm">
                    <span class="letter-box">D</span>  <span><b>APPROVED FOR PAYMENT:</b></span>

                    <br><br>

                    <p class="text-center">GERARDO A. NOVERAS</p>
                    <p class="text-center -mt-10">Governor</p>
                </td>
                <td class="brm">
                    <span class="letter-box">E</span>  <span><b>Certified:</b> Each student whose name appears on the payroll has been paid the amount as indicated opposite his/her name</span>

                    <br><br>

                    <div style="display: flex; justify-content:space-between;">

                        <div class="text-center" style="width: 250px;">
                            <div class="bbm">&nbsp;</div>
                            <br>
                            <p class="-mt-10">Signature over Printed Name</p>
                            <p class="-mt-10">Disbursing Officer</p>
                        </div>
    
                        <div class="text-center" style="width: 100px;" style="margin-left:300px;">
                            <div class="bbm">&nbsp;</div>
                            <br>
                            <p class="-mt-10">Date</p>
                        </div>

                    </div>
                   
                </td>
                <td>
                    <span class="letter-box">F</span>

                    <p class="text-center">CAFOA No.: <b>_____________</b></p>
                    <p class="text-center">Date: <b>_____________</b></p>
                    
                </td>
            </tr>

            <tr>
                <td class="brm" colspan="3">
                    <span class="letter-box">G</span>

                    <br><br>

                    <div style="display: flex; min-width:100%;">

                        <div style=" min-width:50%;">

                            <table style="width: 80%;">
                                <thead>
                                    <tr>
                                        <th>Particulars</th>
                                        <th>Account Code</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                </tbody>
                            </table>

                            <p>Prepared by:</p>

                        </div>

                        <div style="min-width: 50%;">
                            <table style="width: 80%; margin:0 auto;">
                                <thead>
                                    <tr>
                                        <th>Particulars</th>
                                        <th>Account Code</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                </tbody>
                            </table>

                            <p>Certified Correct:</p>

                            <div class="text-center">
                                <p>WILFRED C. SATURNO</p>

                                <p style="margin-top: -30px;"><b>___________________________________</b></p>
                                
                                <p style="margin-top: -10px;">Head, Accounting, Department/Unit</p>
                            </div>

                        </div>

                    </div>

                </td>
            </tr>
        </table>
    </section>
</body>
</html>

      



<?php


$con->query('UPDATE tblappointment SET print = 0');

?>
