

<?php
//login.php
include './dbconnection.php';


$message = 'error';
if(isset($_POST['submit']))
  {
  $time=time()-30;
  $ip_address=getIpAddr();
  $check_login_row=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total_count from login_log where try_time>$time and ip_address='$ip_address'"));
  $total_count=$check_login_row['total_count'];
  if($total_count==3){
    $msg="To many failed login attempts. Please login after 30 sec";
    header('location:login.php');
  }else{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select * from users where  userName='$username' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['eaid']=$ret['id'];
      $_SESSION['level']=$ret['level'];

     switch($_SESSION['level']) {
        case 'Admin':
          header('location:admin/dashboard.php');  
        break;
        case 'user':  
          header('location:user/dashboard.php');  
        break;

         case 'staff':  
          header('location:staff/dashboard.php');  
        break;
      }
       
    }else{
      $total_count++;
      $rem_attm=3-$total_count;
      if($rem_attm==0){
        $msg="To many failed login attempts. Please login after 30 sec";
      }else{
        $msg="Please enter valid login details.<br/>$rem_attm attempts remaining";
        header('location:login.php');
      }
      $try_time=time();
      mysqli_query($con,"insert into login_log(ip_address,try_time) values('$ip_address','$try_time')");
      
    }
  }
}



function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
       $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
       $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
       $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
   return $ipAddr;
}
  ?>
  <?php echo  @$msg;?>
