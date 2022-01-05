
<?php
//login.php
session_start();
error_reporting(0);
include('dbconnection.php');
include 'main.php';

  session_start();
  function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AptNumber=check_input($_POST['AptNumber']);
    
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
      $_SESSION['msg'] = "Username should not contain space and special characters!"; 
      header('location: test.php');
    }
    else{
      
    $fusername=$AptNumber;
    
    
    
    $query=mysqli_query($con,"select * from `tblappointment` where AptNumber='$fusername'");
    
    if(mysqli_num_rows($query)==0){
      $_SESSION['msg'] = "Login Failed, Invalid Input!";
      header('location: test.php');

      
    }
    else{
      
      $row=mysqli_fetch_array($query);
      if ($row['status']==1){
          $user_data = array();
        $user_data['ID'] = $row['ID'];
        $user_data['username'] = $row['username'];
        $user_data['fname'] = $row['fname'];
        $
        $user_data['STATUS'] = $row['STATUS'];
        $_SESSION['ID']=$row['ID'];
        $_SESSION['user_info'] = $user_data;
                  
        ?>
        <script>
          window.alert('Login Success, Welcome Admin!');
          window.location.href='admin/dashboard.php';
        </script>
        <?php
      }
      else{
    
        $user_data = array();
        $user_data['ID'] = $row['ID'];
        $user_data['username'] = $row['username'];
        $user_data['fname'] = $row['fname'];
        $
        $user_data['STATUS'] = $row['STATUS'];
        $_SESSION['ID']=$row['ID'];
        $_SESSION['user_info'] = $user_data;
        ?>
        <script>
          window.alert('Login Success,Welcome User! press Ok To Continue');
          window.location.href='thank-you.php';
        </script>
        <?php
      }
    }
    
    }
  }
  ?>