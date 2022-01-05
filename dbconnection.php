
 <?php
 $con=mysqli_connect("database", "root",  $_ENV['MYSQL_ROOT_PASSWORD'], "e_assis");
 if(mysqli_connect_errno()){
 echo "Connection Fail try to contact your Developer".mysqli_connect_error();
 }

 ?>
