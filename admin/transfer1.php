<?php
	include('includes/dbconnection.php');
	if(isset($_POST['edit'])){
		$ID=$_POST['ID'];
		$status=$_POST['status'];
		
		
		$uq=mysqli_query($con,"select * from `tblappointment` where ID='$ID'");

		// var_dump($POST);
		// die;

		$uqrow=mysqli_fetch_array($uq);
	
		$update = mysqli_query($con,"UPDATE `tblappointment` SET `status` = '".$status."' WHERE `incoming`.`ID` = ".$ID.";");


	}

?>