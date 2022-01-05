<?php

include 'dbconnection.php';
include './functions/scholar_checker.php';
require './recaptcha/autoload.php';

if (isset($_POST['submit'])) {

     // Get a key from https://www.google.com/recaptcha/admin/create
    $publickey = "6LeQuZUcAAAAALG8TOQvrHi24ZKIPN4rLU80bM50";
    $privatekey = "6LeQuZUcAAAAAIHe3Jby1e6N96JqCIYv_3Kbduig";

    // recaptcha
    $recaptcha = new \ReCaptcha\ReCaptcha($privatekey);

    $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                    ->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

    if(!$resp->isSuccess()){
      // header('Location: error.php?form=error_robot');


        var_dump($resp);
        exit;
    }




    $check_scholar = scholar_checker($_POST);

    if ($check_scholar !== 0) {
        header('Location: error.php?form=error');
        exit;
    }

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

    $sql = "INSERT INTO `scholar` (`ID`, `fname`, `lname`, `mname`, `age`, `sex`, `paddress`, `present_ad`, `contact`, `email`, `bdate`, `bplace`, `school`, `civil`, `school_address`, `y_level`, `gwa`, `f_name`, `address`, `contact1`, `occupation`, `employer`, `m_name`, `address2`, `contact2`, `occupation2`, `employer2`, `f_mem`, `income` )
            VALUES ('', '{$fname}', '{$lname}', '{$mname}', '{$age}', '{$sex}', '{$paddress}', '{$present_ad}', '{$contact}', '{$email}', '{$bdate}', '{$bplace}', '{$school}', ' {$civil}', '{$school_address}', '{$y_level}', '{$gwa}', '{$f_name}', '{$address}', '{$contact1}', '{$occupation}', '{$employer}', '{$m_name}', '{$address2}', '{$contact2}', '{$occupation2}', '{$employer2}', '{$f_mem}', '{$income}') ";

    $query = $con->query($sql);

    // return die;

    
    if ($query) {

        // get the last ID

        $sql    = "SELECT ID FROM scholar ORDER BY ID DESC LIMIT 1";
        $query2 = mysqli_query($con, $sql);

        $ID = mysqli_fetch_row($query2);

        // var_dump($ID);
        // die;

        $msg = '
   

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
<body class="hold-transition layout-top-nav">


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
      </div>
       
      <!-- /.container-fluid -->
    </div>
<div class="wrapper">
 <div class="content">
      <div class="container">
        <div class="row">
          <div class="card card-success">
              <div class="card-header">

                 <i class="fa fa-play"></i> APPLICATION FORM

                 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i> Maximize Page
                  </button>
                </div>
              </div>
            <div class="card-body">

         
           <form role="form" method="POST" action="form2.php"  enctype="multipart/form-data">
           
                    <div class="col-sm-12">
                        <div class="form-group">
                        <br><br><div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> SUCCESS!</h5>
                  STEP 1 REGISTRATION SUCCESS! <h1>' . $fname. '</h1>   please answer the question below, Do not Refresh this page thank you..
                </div> 
                         
                        <input type="text" name="form_no" class="form-control" value="' . $ID[0] . '"" placeholder="Enter ..." hidden="">
                      </div>
                      <div class="row">
                      <div class="col-12">
                         <label for="checkboxSuccess2">
                         <p>1.)IKAW BA AY WORKING STUDENT?</p>
                    </label>
                    <input type="text" class="form-control" name="q6" placeholder="Your Answer">
                  </div>

                    </div><br>

                        <div class="row">
                      <div class="col-12">
                         <label for="checkboxSuccess2">
                         <p>2.)NAG-APPLY KA NA BA SA PGA EDUCATIONAL ASSISTANCE PROGRAM NOON? KUNG OO, ANONG SEMESTER AT YEAR ITO?</p>
                    </label>
                    <input type="text" class="form-control" name="q1" placeholder="Your Answer">
                  </div>

                    </div><br>
                      <div class="row">
                      <div class="col-12">
                         <label for="checkboxSuccess2">
                         <p>2.)NAG-APPLY KA NA RIN BA SA IBA PANG EDUCATIONAL ASSISTANCE PROGRAM NG GOBYERNO? KUNG OO, SAAN?</p>
                    </label>
                    <input type="text" class="form-control" name="q8" placeholder="Your Answer">
                  </div>

                    </div><br>

                   <div class="row">
                      <div class="col-12">
                         <label for="checkboxSuccess2">
                         <p>3.)ANU-ANO ANG MGA PAG-AARI NG INYONG PAMILYA? example "BUKID, BANGKA, TRICYCLE, ATBP."</p>
                    </label>
                    <input type="text" class="form-control" name="q2" placeholder="Your Answer">
                  </div>

                    </div><br>

                   <div class="row">
                      <div class="col-12">
                         <label for="checkboxSuccess2">
                         <p>4.)NANINIRAHAN KA BA KASAMA ANG IYONG MGA MAGULANG?</p>
                    </label>
                    <input type="text" class="form-control" name="q3" placeholder="Your Answer">
                  </div>

                    </div><br>


                   <div class="row">
                      <div class="col-12">
                         <label for="checkboxSuccess2">
                         <p>5.)KUNG MAY MGA KAPATID NA NAG-AARAL PA, ILAN AT ANONG GRADE/YEAR LEVEL NA NILA?</p>
                    </label>
                    <input type="text" class="form-control" name="q4" placeholder="Your Answer">
                  </div>

                    </div><br>


                   <div class="row">
                      <div class="col-12">
                         <label for="checkboxSuccess2">
                         <p>6.)KUNG MAYROONG MGA KAPATID NA NAGSUSUSTENTO SA INYONG PAMILYA, ANO ANG KANILANG TRABAHO AT MAGKANO ANG KANILANG BUWANANG KITA?</p>
                    </label>
                    <input type="text" class="form-control" name="q5" placeholder="Your Answer">
                  </div>

                    </div><br>


                   


                   <div class="row">
                      <div class="col-12">
                         <label for="checkboxSuccess2">
                         <p>7.)ANO ANG IYONG GAMIT PARA SA ONLINE/DISTANCE LEARNING? Owned,Borrowed or Shared Device (Computer,Cellphone,Laptop ,Tablet mobile`s) with or without WIFI or Mobile Data please specify: example Owned-cellphone-wifi</p>
                    </label>
                    <input type="text" class="form-control" name="q7" placeholder="Your Answer">
                  </div>

                    </div><br>

                     
                 
                
                   <button class="btn btn-primary form-control" name="submit"><i class="fa fa-arrow-right"></i> Submit</button>
                 </div>
                </form>
              </div>
            </div>
</div>
</div>
</div>

</div>
</body>
';

 } else {
        $msg = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Alert!</h5>
                  SOMETHING WENT WRONG
                </div>';
    }
}

?>

<?php echo @$msg; ?>


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