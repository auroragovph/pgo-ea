<?php

include 'dbconnection.php';
// include './functions/scholar_checker.php';



?>





<?php

if (isset($_POST['submit'])) {

    
    $form_no   = $_POST['form_no'];
    $q1   = $_POST['q1'];
    $q2   = $_POST['q2'];
    $q3   = $_POST['q3'];
    $q4   = $_POST['q4'];
    $q5   = $_POST['q5'];
    $q6   = $_POST['q6'];
    $q7   = $_POST['q7'];
     $q8   = $_POST['q8'];

    
    // var_dump($_POST);

    

    $sql = "INSERT INTO `question` (`ID`, `form_no`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`)
            VALUES ('', '{$form_no}', '{$q1}', '{$q2}', '{$q3}', '{$q4}', '{$q5}', '{$q6}', '{$q7}', '{$q8}' )";

    $query = $con->query($sql);

    // return die;

    if ($query) {

        // get the last ID

        $sql    = "SELECT form_no FROM question ORDER BY ID DESC LIMIT 1";
        $query2 = mysqli_query($con, $sql);

        $form_no = mysqli_fetch_row($query2);

        $msg = '<br><br><div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> SUCCESS!</h5>
                  REGISTRATION SUCCESS!  Your TRACKING NO. is <h1>' . $form_no[0] . '</h1> And ready for Verification, Please keep Your Tracking Number.
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
      <div class="container">
        <div class="row">

<?php echo @$msg; ?>
</div>
</div>
</div>

</div>
</body>
