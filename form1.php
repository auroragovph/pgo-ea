
<?php

include 'dbconnection.php';
include './functions/scholar_checker.php';
include 'main.php';


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

             <i class="fa fa-circle"></i> APPLICATION FORM

                 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i> Maximize Page
                  </button>
                </div>
              </div>
        <div class="card-body">
            <form action="success.php" method="post" class="appointment-form" enctype="multipart/form-data">
                  <div class="row">

                  <div class="card-body">
                 <div class="row">
                  <div class="col-4">
                    <input type="text" class="form-control" name="lname" placeholder="LN" required="">
                  </div>
                  <div class="col-5">
                    <input type="text" class="form-control" name="fname" placeholder="FN" required="">
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" name="mname" placeholder="MI" required="">
                  </div>
                  <br>
                  <br>
                  
                   <div class="col-12">
                    <input type="text" class="form-control" name="civil" placeholder="CIVIL STATUS" required="">
                  </div>
                </div>
                <BR>
                 <div class="row">
                      <div class="col-6">
                    <input type="number" class="form-control" name="age" placeholder="Age" required="">
                  </div>
                  <div class="col-6">
                      <select name="sex" class="form-control wd-450" required="true" required="true" >
               <option value="MALE" selected="true">MALE</option>
               <option value="FEMALE">FEMALE</option>
            </select>
                  </div>
                    </div>


                    <hr class="card card-success card-outline" >
                     <div class="row">
                 <div class="col-7">

                  <div class="form-group">
                  <label>PRESENT ADDRESS</label>
                  <select name="present_ad" class="form-control select2">
                      <option value="#"</option>
                      <option value="Brgy. 1 (Poblacion) , Baler">Brgy. 1 (Poblacion) , Baler</option>
                    <option value="Brgy. 2 (Poblacion) , Baler">Brgy. 2 (Poblacion) , Baler</option>
                    <option value="Brgy. 3 (Poblacion) , Baler">Brgy. 3 (Poblacion) , Baler</option>
                    <option value="Brgy. 4 (Poblacion) , Baler" >Brgy. 4 (Poblacion) , Baler</option>
                    <option value="Brgy. 5 (Poblacion) , Baler">Brgy. 5 (Poblacion) , Baler</option>
                    <option value="Brgy. Buhangin , Baler">Brgy. Buhangin , Baler</option>
                    <option value="Brgy. Calabuanan , Baler">Brgy. Calabuanan , Baler</option>
                    <option value="Brgy. Obligacion , Baler">Brgy. Obligacion , Baler</option>
                    <option value="Brgy. Pingit , Baler"> Brgy. Pingit , Baler</option>
                    <option value="Brgy. Reserva , Baler">Brgy. Reserva , Baler</option>
                    <option value="Brgy. Sabang , Baler">Brgy. Sabang , Baler</option>
                    <option value="Brgy. Suclayin , Baler">Brgy. Suclayin , Baler</option>
                    <option value="Brgy. Zabali , Baler">Brgy. Zabali , Baler</option>


                    <option value="Brgy. 1 (Poblacion) , Casiguran">Brgy. 1 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 2 (Poblacion) , Casiguran">Brgy. 2 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 3 (Poblacion) , Casiguran">Brgy. 3 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 4 (Poblacion) , Casiguran">Brgy. 4 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 5 (Poblacion) , Casiguran">Brgy. 5 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 6 (Poblacion) , Casiguran">Brgy. 6 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 7 (Poblacion) , Casiguran">Brgy. 7 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 8 (Poblacion) , Casiguran">Brgy. 8 (Poblacion) , Casiguran</option>
                    <option value="Brgy. Bianuan , Casiguran">Brgy. Bianuan , Casiguran</option>
                    <option value="Brgy. Calabgan , Casiguran">Brgy. Calabgan , Casiguran</option>
                    <option value="Brgy. Calangcuasan , Casiguran">Brgy. Calangcuasan , Casiguran</option>
                    <option value="Brgy. Calantas , Casiguran">Brgy. Calantas , Casiguran</option>
                    <option value="Brgy. Cozo , Casiguran">Brgy. Cozo , Casiguran</option>
                    <option value="Brgy. Culat , Casiguran">Brgy. Culat , Casiguran</option>
                    <option value="Brgy. Dibacong , Casiguran">Brgy. Dibacong , Casiguran</option>
                    <option value="Brgy. Dibet , Casiguran">Brgy. Dibet , Casiguran</option>
                    <option  value="Brgy. Ditinagyan , Casiguran">Brgy. Ditinagyan , Casiguran</option>
                    <option value="Brgy. Esperanza , Casiguran">Brgy. Esperanza , Casiguran</option>
                    <option value="">Brgy. Esteves , Casiguran</option>
                    <option value="Brgy. Esteves , Casiguran">Brgy. Lual , Casiguran</option>
                    <option value="Brgy. Marikit , Casiguran">Brgy. Marikit , Casiguran</option>
                    <option value="Brgy. Marikit , Casiguran">Brgy. Marikit , Casiguran</option>
                    <option value="Brgy. Tabas , Casiguran">Brgy. Tabas , Casiguran</option>
                    <option value="Brgy. Tinib , Casiguran"> Brgy. Tinib , Casiguran</option>


                    <option value="Brgy. Diagyan , Dilasag"> Brgy. Diagyan , Dilasag</option>
                    <option value="Brgy. Dicabasan , Dilasag">Brgy. Dicabasan , Dilasag</option>
                    <option value="Brgy. Dilaguidi , Dilasag">Brgy. Dilaguidi , Dilasag</option>
                    <option value="Brgy. Dimaseset , Dilasag">Brgy. Dimaseset , Dilasag</option>
                    <option value="Brgy. Diniog , Dilasag">Brgy. Diniog , Dilasag</option>
                    <option value="Brgy. Esperanza , Dilasag">Brgy. Esperanza , Dilasag</option>
                    <option value="Brgy. Lawang , Dilasag">Brgy. Lawang , Dilasag</option>
                    <option value="Brgy. Maligaya , Dilasag">Brgy. Maligaya , Dilasag</option>
                    <option value="Brgy. Manggitahan , Dilasag">Brgy. Manggitahan , Dilasag</option>
                    <option  value="Brgy. Masagana , Dilasag">Brgy. Masagana , Dilasag</option>
                    <option value="Brgy. Ura , Dilasag">Brgy. Ura , Dilasag</option>


                    <option value="Brgy. Abuleg , Dinalungan">Brgy. Abuleg , Dinalungan</option>
                    <option value="Brgy. Dibaraybay , Dinalungan">Brgy. Dibaraybay , Dinalungan</option>
                    <option value="Brgy. Ditawini , Dinalungan">Brgy. Ditawini , Dinalungan</option>
                    <option value="Brgy. Mapalad , Dinalungan">Brgy. Mapalad , Dinalungan</option>
                    <option value="Brgy. Nipoo , Dinalungan">Brgy. Nipoo , Dinalungan</option>
                    <option value="Brgy. Paleg , Dinalungan">Brgy. Paleg , Dinalungan</option>
                    <option value="Brgy. Simbahan , Dinalungan">Brgy. Simbahan , Dinalungan</option>
                    <option value="Brgy. Zone I , Dinalungan">Brgy. Zone I , Dinalungan</option>
                    <option value="Brgy. Zone II , Dinalungan">Brgy. Zone II , Dinalungan</option>


                    <option value="Brgy. Aplaya , Dingalan">Brgy. Aplaya , Dingalan</option>
                    <option value="Brgy. Butas na Bato , Dingalan">Brgy. Butas na Bato , Dingalan</option>
                    <option value="Brgy. Matawe , Dingalan">Brgy. Matawe , Dingalan</option>
                    <option value="Brgy. Caragsacan , Dingalan">Brgy. Caragsacan , Dingalan</option>
                    <option value="Brgy. Davildavilan , Dingalan">Brgy. Davildavilan , Dingalan</option>
                    <option value="Brgy. Dikapanikian , Dingalan">Brgy. Dikapanikian , Dingalan</option>
                    <option value="Brgy. Ibona , Dingalan">Brgy. Ibona , Dingalan</option>
                    <option value="Brgy. Paltic , Dingalan">Brgy. Paltic , Dingalan</option>
                    <option  value="Brgy. Poblacion , Dingalan">Brgy. Poblacion , Dingalan</option>
                    <option value="Brgy. Tanawan , Dingalan">Brgy. Tanawan , Dingalan</option>
                    <option value="Brgy. Umiray , Dingalan">Brgy. Umiray , Dingalan</option>


                    <option  value="Brgy. Bayabas , Dipaculao">Brgy. Bayabas , Dipaculao</option>
                    <option value="Brgy. Borlongan , Dipaculao">Brgy. Borlongan , Dipaculao</option>
                    <option value="Brgy. Buenavista , Dipaculao">Brgy. Buenavista , Dipaculao</option>
                    <option value="Brgy. Calaocan , Dipaculao">Brgy. Calaocan , Dipaculao</option>
                    <option value="Brgy. Diamanen , Dipaculao">Brgy. Diamanen , Dipaculao</option>
                    <option value="Brgy. Dianed , Dipaculao">Brgy. Dianed , Dipaculao</option>
                    <option  value="Brgy. Diarabasin , Dipaculao">Brgy. Diarabasin , Dipaculao</option>
                    <option value="Brgy. Dibutunan , Dipaculao">Brgy. Dibutunan , Dipaculao</option>
                    <option value="Brgy. Dimabuno , Dipaculao">Brgy. Dimabuno , Dipaculao</option>
                    <option value="Brgy. Dinadiawan , Dipaculao">Brgy. Dinadiawan , Dipaculao</option>
                    <option value="Brgy. Ditale , Dipaculao">Brgy. Ditale , Dipaculao</option>
                    <option  value="Brgy. Gupa , Dipaculao">Brgy. Gupa , Dipaculao</option>
                    <option  value="Brgy. Ipil , Dipaculao">Brgy. Ipil , Dipaculao</option>
                    <option value="Brgy. Laboy , Dipaculao">Brgy. Laboy , Dipaculao</option>
                    <option value="Brgy. Lipit , Dipaculao">Brgy. Lipit , Dipaculao</option>
                    <option value="Brgy. Lobbot , Dipaculao">Brgy. Lobbot , Dipaculao</option>
                    <option value="Brgy. Maligaya , Dipaculao">Brgy. Maligaya , Dipaculao</option>
                    <option value="Brgy. Mijares , Dipaculao">Brgy. Mijares , Dipaculao</option>
                    <option value="Brgy. Mucdol , Dipaculao">Brgy. Mucdol , Dipaculao</option>
                    <option value="Brgy. North Poblacion , Dipaculao">Brgy. North Poblacion , Dipaculao</option>
                    <option  value="Brgy. Puangi , Dipaculao">Brgy. Puangi , Dipaculao</option>
                    <option value="Brgy. Salay , Dipaculao">Brgy. Salay , Dipaculao</option>
                    <option  value="Brgy. Sapangkawayan , Dipaculao">Brgy. Sapangkawayan , Dipaculao</option>
                    <option  value="Brgy. South Poblacion , Dipaculao">Brgy. South Poblacion , Dipaculao</option>
                    <option value="Brgy. Toytoyan , Dipaculao">Brgy. Toytoyan , Dipaculao</option>


                    <option value="Brgy. Alcala , Maria Aurora">Brgy. Alcala , Maria Aurora</option>
                    <option value="Brgy. Bagtu , Maria Aurora">Brgy. Bagtu , Maria Aurora</option>
                    <option value="Brgy. Bangco , Maria Aurora">Brgy. Bangco , Maria Aurora</option>
                    <option  value="Brgy. Bannawag , Maria Aurora">Brgy. Bannawag , Maria Aurora</option>
                    <option value="Brgy. 1 , Maria Aurora">Brgy. 1 , Maria Aurora</option>
                    <option  value="Brgy. 2 , Maria Aurora">Brgy. 2 , Maria Aurora</option>
                    <option value="Brgy. 3 , Maria Aurora">Brgy. 3 , Maria Aurora</option>
                    <option  value="Brgy. 4 , Maria Aurora">Brgy. 4 , Maria Aurora</option>
                    <option value="Brgy. Baubo , Maria Aurora">Brgy. Baubo , Maria Aurora</option>
                    <option  value="Brgy. Bayanihan , Maria Aurora">Brgy. Bayanihan , Maria Aurora</option>
                    <option value="Brgy. Bazal , Maria Aurora">Brgy. Bazal , Maria Aurora</option>
                    <option value="Brgy. Cabituculan East , Maria Aurora">Brgy. Cabituculan East , Maria Aurora</option>
                    <option value="Brgy. Cabituculan West , Maria Aurora">Brgy. Cabituculan West , Maria Aurora</option>
                    <option value="Brgy. Cadayacan , Maria Aurora">Brgy. Cadayacan , Maria Aurora</option>
                    <option value="Brgy. Debucao , Maria Aurora">Brgy. Debucao , Maria Aurora</option>
                    <option  value="Brgy. Decoliat , Maria Aurora">Brgy. Decoliat , Maria Aurora</option>
                    <option  value="Brgy. Detailen , Maria Aurora">Brgy. Detailen , Maria Aurora</option>
                    <option  value="Brgy. Diaat , Maria Aurora">Brgy. Diaat , Maria Aurora</option>
                    <option value="Brgy. Dialatman , Maria Aurora">Brgy. Dialatman , Maria Aurora</option>
                    <option value="Brgy. Diaman , Maria Aurora">Brgy. Diaman , Maria Aurora</option>
                    <option  value="Brgy. Dianawan , Maria Aurora">Brgy. Dianawan , Maria Aurora</option>
                    <option  value="Brgy. Dikildit , Maria Aurora">Brgy. Dikildit , Maria Aurora</option>
                    <option  value="Brgy. Dimanpudso , Maria Aurora">Brgy. Dimanpudso , Maria Aurora</option>
                    <option  value="Brgy. Diome , Maria Aurora">Brgy. Diome , Maria Aurora</option>
                    <option  value="Brgy. Estonilo , Maria Aurora">Brgy. Estonilo , Maria Aurora</option>
                    <option value="Brgy. Florida , Maria Aurora">Brgy. Florida , Maria Aurora</option>
                    <option  value="Brgy. Galintuja , Maria Aurora">Brgy. Galintuja , Maria Aurora</option>
                    <option  value="Brgy. Malasin , Maria Aurora">Brgy. Malasin , Maria Aurora</option>
                    <option value="Brgy. Ponglo , Maria Aurora">Brgy. Ponglo , Maria Aurora</option>
                    <option  value="Brgy. Quirino , Maria Aurora">Brgy. Quirino , Maria Aurora</option>
                    <option value="Brgy. Ramada , Maria Aurora">Brgy. Ramada , Maria Aurora</option>
                    <option value="Brgy. San Joaquin , Maria Aurora">Brgy. San Joaquin , Maria Aurora</option>
                    <option value="Brgy. San Jose , Maria Aurora">Brgy. San Jose , Maria Aurora</option>
                    <option value="Brgy. San Juan , Maria Aurora">Brgy. San Juan , Maria Aurora</option>
                    <option  value="Brgy. San Leonardo , Maria Aurora">Brgy. San Leonardo , Maria Aurora</option>
                    <option  value="Brgy. Santa Lucia , Maria Aurora">Brgy. Santa Lucia , Maria Aurora</option>
                    <option value="Brgy. Santo Tomas , Maria Aurora">Brgy. Santo Tomas , Maria Aurora</option>
                    <option  value="Brgy. Suguit , Maria Aurora">Brgy. Suguit , Maria Aurora</option>
                    <option  value="Brgy. Villa Aurora , Maria Aurora">Brgy. Villa Aurora , Maria Aurora</option>
                    <option  value="Brgy. Wenceslao , Maria Aurora">Brgy. Wenceslao , Maria Aurora</option>


                    <option  value="Brgy. Bacong , San Luis">Brgy. Bacong , San Luis</option>
                    <option  value="Brgy. 1 , San Luis">Brgy. 1 , San Luis</option>
                    <option value="Brgy. 2 , San Luis">Brgy. 2 , San Luis</option>
                    <option  value="Brgy. 3 , San Luis">Brgy. 3 , San Luis</option>
                    <option  value="Brgy. 4 , San Luis">Brgy. 4 , San Luis</option>
                    <option  value="Brgy. Dibalo , San Luis">Brgy. Dibalo , San Luis</option>
                    <option  value="Brgy. Dibaybay , San Luis">Brgy. Dibaybay , San Luis</option>
                    <option  value="Brgy. Dibut , San Luis">Brgy. Dibut , San Luis</option>
                    <option  value="Brgy. Dikapinisan , San Luis">Brgy. Dikapinisan , San Luis</option>
                    <option  value="Brgy. Dimanayat , San Luis">Brgy. Dimanayat , San Luis</option>
                    <option  value="Brgy. Diteki , San Luis">Brgy. Diteki , San Luis</option>
                    <option value="Brgy. Ditumabo , San Luis">Brgy. Ditumabo , San Luis</option>
                    <option value="Brgy. L. Pimentel , San Luis">Brgy. L. Pimentel , San Luis</option>
                    <option  value="Brgy. Nonong Senior , San Luis">Brgy. Nonong Senior , San Luis</option>
                    <option value="Brgy. Real , San Luis">Brgy. Real , San Luis</option>
                    <option value="Brgy. San Jose , San Luis">Brgy. San Isidro , San Luis</option>
                    <option value="Brgy. San Jose , San Luis">Brgy. San Jose , San Luis</option>
                    <option  value="Brgy. Zarah , San Luis">Brgy. Zarah , San Luis</option>

                  </select>
                
                </div>
              
          </div>




                  <div class="form-group">
                <label for="dateInput">PERMANENT ADDRESS</label>
                  
                <select name="paddress" class="form-control select2">
                     <option value="#"</option>
                  <option value="Brgy. 1 (Poblacion) , Baler">Brgy. 1 (Poblacion) , Baler</option>
                    <option value="Brgy. 2 (Poblacion) , Baler">Brgy. 2 (Poblacion) , Baler</option>
                    <option value="Brgy. 3 (Poblacion) , Baler">Brgy. 3 (Poblacion) , Baler</option>
                    <option value="Brgy. 4 (Poblacion) , Baler" >Brgy. 4 (Poblacion) , Baler</option>
                    <option value="Brgy. 5 (Poblacion) , Baler">Brgy. 5 (Poblacion) , Baler</option>
                    <option value="Brgy. Buhangin , Baler">Brgy. Buhangin , Baler</option>
                    <option value="Brgy. Calabuanan , Baler">Brgy. Calabuanan , Baler</option>
                    <option value="Brgy. Obligacion , Baler">Brgy. Obligacion , Baler</option>
                    <option value="Brgy. Pingit , Baler"> Brgy. Pingit , Baler</option>
                    <option value="Brgy. Reserva , Baler">Brgy. Reserva , Baler</option>
                    <option value="Brgy. Sabang , Baler">Brgy. Sabang , Baler</option>
                    <option value="Brgy. Suclayin , Baler">Brgy. Suclayin , Baler</option>
                    <option value="Brgy. Zabali , Baler">Brgy. Zabali , Baler</option>


                    <option value="Brgy. 1 (Poblacion) , Casiguran">Brgy. 1 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 2 (Poblacion) , Casiguran">Brgy. 2 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 3 (Poblacion) , Casiguran">Brgy. 3 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 4 (Poblacion) , Casiguran">Brgy. 4 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 5 (Poblacion) , Casiguran">Brgy. 5 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 6 (Poblacion) , Casiguran">Brgy. 6 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 7 (Poblacion) , Casiguran">Brgy. 7 (Poblacion) , Casiguran</option>
                    <option value="Brgy. 8 (Poblacion) , Casiguran">Brgy. 8 (Poblacion) , Casiguran</option>
                    <option value="Brgy. Bianuan , Casiguran">Brgy. Bianuan , Casiguran</option>
                    <option value="Brgy. Calabgan , Casiguran">Brgy. Calabgan , Casiguran</option>
                    <option value="Brgy. Calangcuasan , Casiguran">Brgy. Calangcuasan , Casiguran</option>
                    <option value="Brgy. Calantas , Casiguran">Brgy. Calantas , Casiguran</option>
                    <option value="Brgy. Cozo , Casiguran">Brgy. Cozo , Casiguran</option>
                    <option value="Brgy. Culat , Casiguran">Brgy. Culat , Casiguran</option>
                    <option value="Brgy. Dibacong , Casiguran">Brgy. Dibacong , Casiguran</option>
                    <option value="Brgy. Dibet , Casiguran">Brgy. Dibet , Casiguran</option>
                    <option  value="Brgy. Ditinagyan , Casiguran">Brgy. Ditinagyan , Casiguran</option>
                    <option value="Brgy. Esperanza , Casiguran">Brgy. Esperanza , Casiguran</option>
                    <option value="">Brgy. Esteves , Casiguran</option>
                    <option value="Brgy. Esteves , Casiguran">Brgy. Lual , Casiguran</option>
                    <option value="Brgy. Marikit , Casiguran">Brgy. Marikit , Casiguran</option>
                    <option value="Brgy. Marikit , Casiguran">Brgy. Marikit , Casiguran</option>
                    <option value="Brgy. Tabas , Casiguran">Brgy. Tabas , Casiguran</option>
                    <option value="Brgy. Tinib , Casiguran"> Brgy. Tinib , Casiguran</option>


                    <option value="Brgy. Diagyan , Dilasag"> Brgy. Diagyan , Dilasag</option>
                    <option value="Brgy. Dicabasan , Dilasag">Brgy. Dicabasan , Dilasag</option>
                    <option value="Brgy. Dilaguidi , Dilasag">Brgy. Dilaguidi , Dilasag</option>
                    <option value="Brgy. Dimaseset , Dilasag">Brgy. Dimaseset , Dilasag</option>
                    <option value="Brgy. Diniog , Dilasag">Brgy. Diniog , Dilasag</option>
                    <option value="Brgy. Esperanza , Dilasag">Brgy. Esperanza , Dilasag</option>
                    <option value="Brgy. Lawang , Dilasag">Brgy. Lawang , Dilasag</option>
                    <option value="Brgy. Maligaya , Dilasag">Brgy. Maligaya , Dilasag</option>
                    <option value="Brgy. Manggitahan , Dilasag">Brgy. Manggitahan , Dilasag</option>
                    <option  value="Brgy. Masagana , Dilasag">Brgy. Masagana , Dilasag</option>
                    <option value="Brgy. Ura , Dilasag">Brgy. Ura , Dilasag</option>


                    <option value="Brgy. Abuleg , Dinalungan">Brgy. Abuleg , Dinalungan</option>
                    <option value="Brgy. Dibaraybay , Dinalungan">Brgy. Dibaraybay , Dinalungan</option>
                    <option value="Brgy. Ditawini , Dinalungan">Brgy. Ditawini , Dinalungan</option>
                    <option value="Brgy. Mapalad , Dinalungan">Brgy. Mapalad , Dinalungan</option>
                    <option value="Brgy. Nipoo , Dinalungan">Brgy. Nipoo , Dinalungan</option>
                    <option value="Brgy. Paleg , Dinalungan">Brgy. Paleg , Dinalungan</option>
                    <option value="Brgy. Simbahan , Dinalungan">Brgy. Simbahan , Dinalungan</option>
                    <option value="Brgy. Zone I , Dinalungan">Brgy. Zone I , Dinalungan</option>
                    <option value="Brgy. Zone II , Dinalungan">Brgy. Zone II , Dinalungan</option>


                    <option value="Brgy. Aplaya , Dingalan">Brgy. Aplaya , Dingalan</option>
                    <option value="Brgy. Butas na Bato , Dingalan">Brgy. Butas na Bato , Dingalan</option>
                    <option value="Brgy. Matawe , Dingalan">Brgy. Matawe , Dingalan</option>
                    <option value="Brgy. Caragsacan , Dingalan">Brgy. Caragsacan , Dingalan</option>
                    <option value="Brgy. Davildavilan , Dingalan">Brgy. Davildavilan , Dingalan</option>
                    <option value="Brgy. Dikapanikian , Dingalan">Brgy. Dikapanikian , Dingalan</option>
                    <option value="Brgy. Ibona , Dingalan">Brgy. Ibona , Dingalan</option>
                    <option value="Brgy. Paltic , Dingalan">Brgy. Paltic , Dingalan</option>
                    <option  value="Brgy. Poblacion , Dingalan">Brgy. Poblacion , Dingalan</option>
                    <option value="Brgy. Tanawan , Dingalan">Brgy. Tanawan , Dingalan</option>
                    <option value="Brgy. Umiray , Dingalan">Brgy. Umiray , Dingalan</option>


                    <option  value="Brgy. Bayabas , Dipaculao">Brgy. Bayabas , Dipaculao</option>
                    <option value="Brgy. Borlongan , Dipaculao">Brgy. Borlongan , Dipaculao</option>
                    <option value="Brgy. Buenavista , Dipaculao">Brgy. Buenavista , Dipaculao</option>
                    <option value="Brgy. Calaocan , Dipaculao">Brgy. Calaocan , Dipaculao</option>
                    <option value="Brgy. Diamanen , Dipaculao">Brgy. Diamanen , Dipaculao</option>
                    <option value="Brgy. Dianed , Dipaculao">Brgy. Dianed , Dipaculao</option>
                    <option  value="Brgy. Diarabasin , Dipaculao">Brgy. Diarabasin , Dipaculao</option>
                    <option value="Brgy. Dibutunan , Dipaculao">Brgy. Dibutunan , Dipaculao</option>
                    <option value="Brgy. Dimabuno , Dipaculao">Brgy. Dimabuno , Dipaculao</option>
                    <option value="Brgy. Dinadiawan , Dipaculao">Brgy. Dinadiawan , Dipaculao</option>
                    <option value="Brgy. Ditale , Dipaculao">Brgy. Ditale , Dipaculao</option>
                    <option  value="Brgy. Gupa , Dipaculao">Brgy. Gupa , Dipaculao</option>
                    <option  value="Brgy. Ipil , Dipaculao">Brgy. Ipil , Dipaculao</option>
                    <option value="Brgy. Laboy , Dipaculao">Brgy. Laboy , Dipaculao</option>
                    <option value="Brgy. Lipit , Dipaculao">Brgy. Lipit , Dipaculao</option>
                    <option value="Brgy. Lobbot , Dipaculao">Brgy. Lobbot , Dipaculao</option>
                    <option value="Brgy. Maligaya , Dipaculao">Brgy. Maligaya , Dipaculao</option>
                    <option value="Brgy. Mijares , Dipaculao">Brgy. Mijares , Dipaculao</option>
                    <option value="Brgy. Mucdol , Dipaculao">Brgy. Mucdol , Dipaculao</option>
                    <option value="Brgy. North Poblacion , Dipaculao">Brgy. North Poblacion , Dipaculao</option>
                    <option  value="Brgy. Puangi , Dipaculao">Brgy. Puangi , Dipaculao</option>
                    <option value="Brgy. Salay , Dipaculao">Brgy. Salay , Dipaculao</option>
                    <option  value="Brgy. Sapangkawayan , Dipaculao">Brgy. Sapangkawayan , Dipaculao</option>
                    <option  value="Brgy. South Poblacion , Dipaculao">Brgy. South Poblacion , Dipaculao</option>
                    <option value="Brgy. Toytoyan , Dipaculao">Brgy. Toytoyan , Dipaculao</option>


                    <option value="Brgy. Alcala , Maria Aurora">Brgy. Alcala , Maria Aurora</option>
                    <option value="Brgy. Bagtu , Maria Aurora">Brgy. Bagtu , Maria Aurora</option>
                    <option value="Brgy. Bangco , Maria Aurora">Brgy. Bangco , Maria Aurora</option>
                    <option  value="Brgy. Bannawag , Maria Aurora">Brgy. Bannawag , Maria Aurora</option>
                    <option value="Brgy. 1 , Maria Aurora">Brgy. 1 , Maria Aurora</option>
                    <option  value="Brgy. 2 , Maria Aurora">Brgy. 2 , Maria Aurora</option>
                    <option value="Brgy. 3 , Maria Aurora">Brgy. 3 , Maria Aurora</option>
                    <option  value="Brgy. 4 , Maria Aurora">Brgy. 4 , Maria Aurora</option>
                    <option value="Brgy. Baubo , Maria Aurora">Brgy. Baubo , Maria Aurora</option>
                    <option  value="Brgy. Bayanihan , Maria Aurora">Brgy. Bayanihan , Maria Aurora</option>
                    <option value="Brgy. Bazal , Maria Aurora">Brgy. Bazal , Maria Aurora</option>
                    <option value="Brgy. Cabituculan East , Maria Aurora">Brgy. Cabituculan East , Maria Aurora</option>
                    <option value="Brgy. Cabituculan West , Maria Aurora">Brgy. Cabituculan West , Maria Aurora</option>
                    <option value="Brgy. Cadayacan , Maria Aurora">Brgy. Cadayacan , Maria Aurora</option>
                    <option value="Brgy. Debucao , Maria Aurora">Brgy. Debucao , Maria Aurora</option>
                    <option  value="Brgy. Decoliat , Maria Aurora">Brgy. Decoliat , Maria Aurora</option>
                    <option  value="Brgy. Detailen , Maria Aurora">Brgy. Detailen , Maria Aurora</option>
                    <option  value="Brgy. Diaat , Maria Aurora">Brgy. Diaat , Maria Aurora</option>
                    <option value="Brgy. Dialatman , Maria Aurora">Brgy. Dialatman , Maria Aurora</option>
                    <option value="Brgy. Diaman , Maria Aurora">Brgy. Diaman , Maria Aurora</option>
                    <option  value="Brgy. Dianawan , Maria Aurora">Brgy. Dianawan , Maria Aurora</option>
                    <option  value="Brgy. Dikildit , Maria Aurora">Brgy. Dikildit , Maria Aurora</option>
                    <option  value="Brgy. Dimanpudso , Maria Aurora">Brgy. Dimanpudso , Maria Aurora</option>
                    <option  value="Brgy. Diome , Maria Aurora">Brgy. Diome , Maria Aurora</option>
                    <option  value="Brgy. Estonilo , Maria Aurora">Brgy. Estonilo , Maria Aurora</option>
                    <option value="Brgy. Florida , Maria Aurora">Brgy. Florida , Maria Aurora</option>
                    <option  value="Brgy. Galintuja , Maria Aurora">Brgy. Galintuja , Maria Aurora</option>
                    <option  value="Brgy. Malasin , Maria Aurora">Brgy. Malasin , Maria Aurora</option>
                    <option value="Brgy. Ponglo , Maria Aurora">Brgy. Ponglo , Maria Aurora</option>
                    <option  value="Brgy. Quirino , Maria Aurora">Brgy. Quirino , Maria Aurora</option>
                    <option value="Brgy. Ramada , Maria Aurora">Brgy. Ramada , Maria Aurora</option>
                    <option value="Brgy. San Joaquin , Maria Aurora">Brgy. San Joaquin , Maria Aurora</option>
                    <option value="Brgy. San Jose , Maria Aurora">Brgy. San Jose , Maria Aurora</option>
                    <option value="Brgy. San Juan , Maria Aurora">Brgy. San Juan , Maria Aurora</option>
                    <option  value="Brgy. San Leonardo , Maria Aurora">Brgy. San Leonardo , Maria Aurora</option>
                    <option  value="Brgy. Santa Lucia , Maria Aurora">Brgy. Santa Lucia , Maria Aurora</option>
                    <option value="Brgy. Santo Tomas , Maria Aurora">Brgy. Santo Tomas , Maria Aurora</option>
                    <option  value="Brgy. Suguit , Maria Aurora">Brgy. Suguit , Maria Aurora</option>
                    <option  value="Brgy. Villa Aurora , Maria Aurora">Brgy. Villa Aurora , Maria Aurora</option>
                    <option  value="Brgy. Wenceslao , Maria Aurora">Brgy. Wenceslao , Maria Aurora</option>


                    <option  value="Brgy. Bacong , San Luis">Brgy. Bacong , San Luis</option>
                    <option  value="Brgy. 1 , San Luis">Brgy. 1 , San Luis</option>
                    <option value="Brgy. 2 , San Luis">Brgy. 2 , San Luis</option>
                    <option  value="Brgy. 3 , San Luis">Brgy. 3 , San Luis</option>
                    <option  value="Brgy. 4 , San Luis">Brgy. 4 , San Luis</option>
                    <option  value="Brgy. Dibalo , San Luis">Brgy. Dibalo , San Luis</option>
                    <option  value="Brgy. Dibaybay , San Luis">Brgy. Dibaybay , San Luis</option>
                    <option  value="Brgy. Dibut , San Luis">Brgy. Dibut , San Luis</option>
                    <option  value="Brgy. Dikapinisan , San Luis">Brgy. Dikapinisan , San Luis</option>
                    <option  value="Brgy. Dimanayat , San Luis">Brgy. Dimanayat , San Luis</option>
                    <option  value="Brgy. Diteki , San Luis">Brgy. Diteki , San Luis</option>
                    <option value="Brgy. Ditumabo , San Luis">Brgy. Ditumabo , San Luis</option>
                    <option value="Brgy. L. Pimentel , San Luis">Brgy. L. Pimentel , San Luis</option>
                    <option  value="Brgy. Nonong Senior , San Luis">Brgy. Nonong Senior , San Luis</option>
                    <option value="Brgy. Real , San Luis">Brgy. Real , San Luis</option>
                    <option value="Brgy. San Jose , San Luis">Brgy. San Isidro , San Luis</option>
                    <option value="Brgy. San Jose , San Luis">Brgy. San Jose , San Luis</option>
                    <option  value="Brgy. Zarah , San Luis">Brgy. Zarah , San Luis</option>

                  </select>

                
              </div>





                    </div><br>

            <!--    <div class="row">
                     


                   <div class="col-sm-2">
                    

            
                      <div class="form-group">
                        <label>PRESENT ADDRESS</label>

                      </div>
                    </div>

                      <div class="col-sm-10">
                     
                      <div class="form-group">

                      <input type="text" class="form-control" name="present_ad" placeholder="Complete Present Address(ex. Brgy.2 Purok1, Baler Aurora, Aurora" required="">



                      </div>
                    </div>




                    </div><br> -->
                    <hr class="card card-success card-outline" >


                    













                    <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="contact" placeholder="Contact Number" required="">
                  </div>
                  <div class="col-8">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
                  </div>
                    </div><br>
                        <div class="row">
                     


                   <div class="col-sm-2">
                    

                      <!-- select -->
                      <div class="form-group">
                        <label>BIRTHDATE</label>

                      </div>
                    </div>

                      <div class="col-sm-10">
                      <!-- select -->
                      <div class="form-group">

                     <input type="date" class="form-control" name="bdate" placeholder="Birth Date" required="">



                      </div>
                    </div>




                    </div><br>




                    <div class="row">
                     
                  <div class="col-12">
                    <input type="text" class="form-control" name="bplace" placeholder="Birth Place" required="">
                  </div>
                    </div><br>
                        <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="school" placeholder="Name Of School" required="">
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" name="school_address" placeholder="School Address" required="">
                  </div>
                    </div> <BR>


                    <div class="row">
                      <div class="col-4">
                    <input type="text" class="form-control" name="y_level" placeholder="Current Year Level" required="">
                  </div>
                  <div class="col-8">
                    <input type="text" class="form-control" name="gwa" placeholder="GWA from Last SEM/S.Y" required="">
                  </div>
                    </div><br>




                 

              <!--       <div class="col-sm-12">
                   
                      <div class="form-group">








                     <div class="row">
                      <div class="col-12">
                         <label for="checkboxSuccess2">
                         <p>Are You a recipient of other government aid/scholarship?
                      If yes, From what program and Government Agency, If NO type NO?</p>
                    </label>
                    <input type="text" class="form-control" name="q3" placeholder="Your Answer">
                  </div>

                    </div>

                </div>




                        </div> -->

                      </div>
                    </div>



                    <br>


                    <hr class="card card-success card-outline" >


                     <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="f_name" placeholder="Father`s Full Name" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="occupation" placeholder="Occupation" required="">
                  </div>

                    </div>

                    <br>


                     <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="address" placeholder="Address" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="contact1" placeholder="Contact Number" required="">
                  </div>

                    </div><br>
                    <div class="row">
                      <div class="col-12">
                    <input type="text" class="form-control" name="employer" placeholder="Employer" required="">
                  </div>

                    </div>


                    <br>

                       <div class="row">
                      <div class="col-6">
                        <input type="text" class="form-control" name="m_name" placeholder="Mother`s Full Name" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="occupation2" placeholder="Occupation" required="">
                  </div>

                    </div><br>

                     <div class="row">
                      <div class="col-6">
                    <input type="text" class="form-control" name="address2" placeholder="Address" required="">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="contact2" placeholder="Contact Number" required="">
                  </div>

                    </div><br>
                    <div class="row">
                      <div class="col-12">
                    <input type="text" class="form-control" name="employer2" placeholder="Employer" required="">
                  </div>

                    </div>


                    <br>
                    <div class="row">
                      <div class="col-6">
                    <input type="number" class="form-control" name="f_mem" placeholder="Number of Family Member" required="">
                  </div>
                  <div class="col-6">
                    <input type="number" class="form-control" name="income" placeholder="Monthly Income" required="">
                  </div>

                    </div>
                    <br>

                    <hr class="card card-success card-outline" >

                    <div class="col-12">
                <!--    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile" required="">
                        <label class="custom-file-label" for="exampleInputFile">Photo(2x2) not Higher than file size of 8mb</label>
                      </div> -->
                  </div>
                    <div class="g-recaptcha" data-sitekey="6LeQuZUcAAAAALG8TOQvrHi24ZKIPN4rLU80bM50"></div>
                    <br>

              
                    <div class="col-4 float-right">
                    <button type="submit"  name="submit" value="Make an Appointment" class="btn btn-primary btn-block btn-flat "><i class="fa fa-arrow-right"></i> NEXT</button>
                    <!--  <button type="submit" href="index.php"   class="btn btn-danger btn-block btn-flat"><i class="fa fa-times"></i> CANCEL</button> -->

                         <br>



                    </div>



                

                     <!--    <div class="pull-right col-3">
                    <a href="index.php" class="btn btn-danger btn-block btn-flat"><i class="fa fa-times"></i> Cancel</a></div> -->
                   </div>
                  
                </form>
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



