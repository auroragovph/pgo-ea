














<?php

include './dbconnection.php';
include './functions/scholar_checker.php';
include './main.php';


?>





<?php

if (isset($_POST['submit'])) {

    



    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $mname   = $_POST['mname'];
    $age     = $_POST['age'];
    $sex     = $_POST['sex'];
    $contact = $_POST['contact'];
    $email   = $_POST['email'];
      $civil   = $_POST['civil'];

    $bdate          = $_POST['bdate'];
    $bplace         = $_POST['bplace'];
    $school         = $_POST['school'];
    $school_address = $_POST['school_address'];
    $y_level        = $_POST['y_level'];
    $gwa            = $_POST['gwa'];

    //permanent address
    $paddress = $_POST['paddress'];

    //pressent address
    $present_ad = $_POST['present_ad'];



    //parents father
    $f_name     = $_POST['f_name'];
    $address    = $_POST['address'];
    $contact1   = $_POST['contact1'];
    $employer   = $_POST['employer'];
    $occupation = $_POST['occupation'];

    //mother

    $m_name      = $_POST['m_name'];
    $address2    = $_POST['address2'];
    $contact2    = $_POST['contact2'];
    $employer2   = $_POST['employer2'];
    $occupation2 = $_POST['occupation2'];

    $f_mem  = $_POST['f_mem'];
    $income = $_POST['income'];

    // var_dump($_POST);

    // $pdf_directory = 'admin/uploads/';
    // $pdf_name      = time() . '__' . $_FILES['file']['name'];
    // $complete_pdf  = $pdf_directory . time() . '__' . $_FILES['file']['name'];

    // saving into folder
    // move_uploaded_file($_FILES['file']['tmp_name'], $complete_pdf);

    $sql = "INSERT INTO `scholar` (`ID`, `fname`, `lname`, `mname`, `age`, `sex`, `paddress`, `present_ad`, `contact`, `email`, `bdate`, `bplace`, `school`, `school_address`, `y_level`, `gwa`, `f_name`, `address`, `contact1`, `occupation`, `employer`, `m_name`, `address2`, `contact2`, `occupation2`, `employer2`, `f_mem`, `income` )
            VALUES ('', '{$fname}', '{$lname}', '{$mname}', '{$age}', '{$sex}', '{$paddress}', '{$present_ad}', '{$contact}', '{$email}', '{$bdate}', '{$bplace}', '{$school}', '{$school_address}', '{$y_level}', '{$gwa}', '{$f_name}', '{$address}', '{$contact1}', '{$occupation}', '{$employer}', '{$m_name}', '{$address2}', '{$contact2}', '{$occupation2}', '{$employer2}', '{$f_mem}', '{$income}') ";

    $query = $con->query($sql);

    // return die;

    if ($query) {

        // get the last ID

        $sql    = "SELECT ID FROM scholar ORDER BY ID DESC LIMIT 1";
        $query2 = mysqli_query($con, $sql);

        $ID = mysqli_fetch_row($query2);

        $msg = '<div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> SUCCESS!</h5>
                  REGISTRATION SUCCESS! Your TRACKING NO. is <h1>' . $ID[0] . '</h1> Please keep Your Tracking Number.
                </div>';
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Alert!</h5>
                  SOMETHING WENT WRONG
                </div>';
    }
}

?>


<!DOCTYPE html>
<!--
hoy hoy bat mo binubuksan.
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
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>


<script language="javascript" type="text/javascript" src="chromeless_35.js"></script>
 <script language="javascript">
    function openIT(u,W,H,X,Y,n,b,x,m,r) {

        var cU  ='close.gif'        //gif for close on normal state.
        var cO  ='close.gif'        //gif for close on mouseover.
        var cL  ='clock.gif'        //gif for loading indicator.
        var mU  ='minimize.gif'     //gif for minimize to taskbar on normal state.
        var mO  ='minimize.gif'     //gif for minimize to taskbar on mouseover.
        var xU  ='max.gif'          //gif for maximize normal state.
        var xO  ='max.gif'          //gif for maximize on mouseover.
        var rU  ='restore.gif'      //gif for minimize on normal state.
        var rO  ='restore.gif'      //gif for minimize on mouseover.
        var tH  ='<font face=verdana size=2>M.I.S</font>'   //title for the title bar in html format.
        var tW  ='IGIPESS'   //title for the task bar of Windows.
        var wB  ='#000099'   //Border color.
        var wBs ='#D5D5FF'   //Border color on window drag.
        var wBG ='#FFCCCC'   //Background of the title bar.
        var wBGs='#D5D5FF'   //Background of the title bar on window drag.
        var wNS ='toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0'  //Html parameters for Netscape.
        var fSO ='scrolling=auto noresize'   //Html parameters for main content frame.
        var brd =b||5;      //Extra border size.
        var max =x||false;  //Maxzimize option (true|false).
        var min =m||false;  //Minimize to taskbar option (true|false).
        var res =r||false;  //Resizable window (true|false).
        var tsz =50;   //Height of title bar.
        var W=screen.width;
        var H=screen.height;
        return chromeless(u,n,W,H,X,Y,cU,cO,cL,mU,mO,xU,xO,rU,rO,tH,tW,wB,wBs,wBG,wBGs,wNS,fSO,brd,max,min,res,tsz)
    }
    </script>



<body class="hold-transition layout-top-nav">
<div class="wrapper">




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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

    <div class="content">
      <div class="container">
        <div class="row">
<!--     <?php echo @$msg; ?> -->
        <!--      <div class="col-4">
          <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Reminders</h5>
                  <b>STEP 1.</b> FILL ON ALL THE NEEDED DATA and click next for the step 2 form. do not leave blank instead type "N/A".<br>
                   <b>STEP 2.</b>  Do not Refresh the Page<br> or Go back to Step 1.Answer the questionsand click submit. Do not leave <br>blank instead type "N/A".<br>
                  <b>STEP 3.</b> The System Will provide you tracking Number in order to track or follow up <br>of your application For<br> Educational Assistance Program Of Provincial Government Of Aurora.<br>
                     <b>FOR MORE INFO:</b> just Visit  facebook.com/pga.educ.assistance or <Email us to pga.educ.assistance@gmail.com<br> 
                </div>
              </div> -->
         <div class="col-10">
    <div class="card card-success">
              <div class="card-header">

             <i class="fa fa-square"></i> Privacy Policy

                 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i> Maximize Page
                  </button>
                </div>
              </div>
       <div class="card-body">

                <h5>Introduction</h5>
                <hr>
                <p>
                    The Provincial Government of Aurora respects your individual privacy and protects any personal information that you share with us. We commit to secure the individual’s right to privacy and ensure the trustworthiness of processing of individual’s personal information.
                </p>
                <p>
                    The Provincial Government of Aurora strives to comply with the Data Privacy Act of 2012 that is designed to protect your privacy. We intend to adhere to the principles set forth in this Privacy Statement and recognize your need for appropriate protection and management of any personal information. In other words, our goal is to provide protection for your privacy regardless of what types of device or application to access our Services. By using our Services, you consent to the collection, storage, processing, transferring, disclosure, and other usage of the Information described in this Privacy Statement and Terms of Service Agreement.
                </p>

                <h5>Information Collection</h5>
                <hr>
                <p>We may collect, store and transfer the following information:</p>
                <ul>
                    <li>name and address</li>
                    <li>contact information including email address</li>
                    <li>demographic information such as postcode, preferences and interests</li>
                    <li>other information relevant to individual’s request and/or offers</li>
                </ul>

                <h5>Purpose of Collected Data</h5>
                <hr>
                <p>You consent that your collected Personal Information may be used:</p>
                <ul>
                    <li>To help improve our data and services and customize user experience;</li>
                    <li>To participate in and facilitate transactions; </li>
                    <li>To engage in data mining and build up activities;</li>
                    <li>To deliver the products and services that you have requested;</li>
                    <li>To perform research and analysis about your use of, or interest in, our products, services, or content, or products, services or content offered by others;</li>
                    <li>To communicate about relevant services, ads and/or advisories through whichever means are available to the Provincial Government; </li>
                    <li>To provide better customer experience to the Provincial Government clients and improve, develop, identify and implement services; </li>
                    <li>To follow safety, security, public service or legal requirements and processes; </li>
                    <li>To process information for statistical, analytical, and research purposes; and</li>
                    <li>To identify and prevent errors and inefficiencies due to misuse of the platform;</li>
                    <li>To enforce our terms and conditions;</li>
                </ul>

                <h5>Security</h5>
                <hr>
                <p>We are committed to ensuring that your information is secure. In order to prevent unauthorized access or disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect.</p>

                <h5>Our Disclosure of your Personal Information to Third Parties</h5>
                <hr>
                <p>
                    We may share your personal information with third parties only in the ways that are described in this Privacy Statement:
                </p>
                <ul>
                    <li>we may provide your information to our sub-processors who perform functions on our behalf;</li>
                    <li>third party contractors may have access to our databases. These contractors sign a standard confidentiality agreement and data sharing agreement;</li>
                    <li>we may share your data with any parent company, subsidiaries, joint ventures, other entities under a common control or third party acquirers. We expect these other entities will honor this Privacy Policy;</li>
                    <li>we may allow a potential acquirer or merger partner to review our databases, although we would restrict their use and disclosure of this data during the diligence phase;</li>
                    <li>as required by law enforcement, government officials, or other third parties pursuant to a subpoena, court order, or other legal process or requirement applicable to our Agency;</li>
                    <li>we may transfer personal information to third parties for any legally permissible purpose at our sole discretion; and</li>
                    <li>we may share your information with third parties with your consent or direction to do so.</li>
                </ul>

                <h5>Limiting Use, Disclosure, Retention</h5>
                <hr>
                <p>The Provincial Government of Aurora identifies the purposes for which the information is being collected before or at the time of collection. The collection of your personal information will be limited to that which is needed for the purposes identified by us. Unless you consent or we are required by law, we will only use the information for the purposes for which it was collected. If we will be processing your personal data for another purpose later on, we will seek your further legal permission or consent; except where the other purpose is compatible with the original purpose. We will keep your personal data only as long as required to serve those purposes. We will also retain and use your personal data for as long as necessary to comply with our legal obligations, resolve disputes, and enforce our agreements.

                </p>

                <h5>Accuracy of Personal data</h5>
                <hr>
                <p>We do our best to ensure that the personal data we hold and use is accurate. We rely on the clients we do business with to disclose to us all relevant information and to inform us of any changes.</p>

                <h5>Additional Rights (RA 10173 Data Privacy Act of 2012)</h5>
                <hr>
                <ul>
                    <li>Right of erasure or blocking. You may have a broader right to erasure of personal data that we hold about you.</li>
                    <li>Right to object. You may have the right to request that we stop processing your personal data and/or to stop sending you marketing communications.</li>
                    <li>Right to restrict processing. You may have the right to request that we restrict processing of your personal data in certain circumstances.</li>
                    <li>Right to access. In certain circumstances, you may have the right to be provided with your personal data in a structured, machine readable and commonly used format and to request that we transfer the personal data to another data controller without hindrance.</li>
                    <li>If you would like to exercise any of the above rights, please contact our support team or contact our Data Protection Officer. We will consider your request in accordance with applicable laws. To protect your privacy and security, we may take steps to verify your identity before complying with the request.</li>
                    <li>You also have the right to complain to a data protection authority about our collection and use of your personal data.</li>
                </ul>


                <h5>Changes to our Privacy Statement</h5>
                <hr>
                <p>The Provincial Government of Aurora may amend this statement at any time by posting a new version. It is your responsibility to review this statement periodically as your continued use of our products and services represents your agreement with the then-current statement.</p>


                 <h5>BY CLICKING NEXT </h5>
                <hr>
                <p>BY CLICKING <b>"NEXT"</b> YOU ARE AGREE WITH TERM`s AND CONDITION FOR  APPLICATION OF EDUCATIONAL ASSISTANCE OF PROVINCIAL GOVERNMENT OF AURORA.</p>

                <div class="col-4 float-right">
                   <a href="form1.php"><button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-arrow-right"></i> NEXT</button></a> 
                    <!--  <button type="submit" href="index.php"   class="btn btn-danger btn-block btn-flat"><i class="fa fa-times"></i> CANCEL</button> -->

                         <br>



                    </div>

            </div>
                 </div>
               </div>
           </div>
      

    </div>







  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      "We keep innovating-M.I.S Team"
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020-2021 <a href="#">MANAGEMENT INFORMATION SYSTEM-AURORA</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->



<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/inputmask/jquery.inputmask.bundle.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
    $('.select2').select2();
    $('#example1').DataTable({
      "scrollX": true
    });
  })


   $('.select2').select2({
      theme: 'bootstrap4'
    })
</script>

</body>
</html>



