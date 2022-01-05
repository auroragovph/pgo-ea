<?php
	include('includes/dbconnection.php');
	if(isset($_POST['edit'])){
		$id=$_POST['ID'];
		$status=$_POST['status'];
      // var_dump($_POST['edit']);
		
		$uq=mysqli_query($conn,"select * from `tblappointment` where ID='$id'");
		$uqrow=mysqli_fetch_array($uq);
		
		
		mysqli_query($conn,"update `tblappointment` set status='status' where ID='$id'");
	}

?>