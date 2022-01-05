<?php

 require_once("includes/dbconnection.php");

$id = mysqli_real_escape_string($con,$_GET['ID']);
 // var_dump($_GET['ID'])

mysqli_query($con,"DELETE FROM tblappointment WHERE ID='$id'")or die(mysql_error());
echo "<script type='text/javascript'>alert('Deleted File!');document.location='preregistered.php'</script>";

?>
