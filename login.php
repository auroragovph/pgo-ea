

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
          header('location:/admin/dashboard.php');  
        break;
        case 'user':  
          header('location:/user/dashboard.php');  
        break;

         case 'staff':  
          header('location:/staff/dashboard.php');  
        break;
      }
       
    }else{
      $total_count++;
      $rem_attm=3-$total_count;
      if($rem_attm==0){
        $msg="To many failed login attempts. Please login after 30 sec";
      }else{
        $msg="Please enter valid login details.<br/>$rem_attm attempts remaining";
      
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

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Educational| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="plugins/jquery/jquery.min.js"></script>

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
<style type="text/css">
*{
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
html, body{
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: transparent;
    overflow: hidden;
}
canvas{
    background-color: transparent;
}

#brand{
    background-color: transparent;
   color: red;

}

</style>
  



<!-- AdminLTE App -->
  <!-- Google Font: Source Sans Pro -->
 <!--  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
</head>

<body class="hold-transition login-page bg-black">
<div class="login-box">
  <div class="login-logo" >
    <a href="login.php" class="img-square">


        <div id="brand"><b>e_ASSIS </b> v2</a></div>
      
  </div>
  <!-- /.login-logo -->
  <div class="card"><br>
  <center ><img src="image/aurora_logo.png" alt="AURORA" class="profile-user-img img-responsive img-circle btn-success" width="40%"></center>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      

       <?php echo  @$msg;?>
      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="test" class="form-control" name="username" placeholder="Username" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-block btn-success" >LOG IN</button>
          </div>

        
          <!-- /.col -->
        </div>
      </form>
       <div class="social-auth-links text-center mb-3">
       <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a id="quiz" style="font-size: 15px;"  href="#" class="btn btn-block btn-success" onclick="mywin001=openIT('form1.php',1250,900,null,null,'mywin001',5,false,false,false);return false">
          <i class="fab fa-send mr-2"></i> Register new Scholar
        </a>



        
          <a href="tracking.php" class="btn btn-block btn-warning">
          <i class="fab fa-send mr-2"></i> Track Status
        </a>
        
      </div>
      </div>

      <div class="social-auth-links text-center mb-3">
      
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">v2.0.5</a>
      </p>
      
    </div>

    <!-- /.login-card-body -->

  </div>
 
</div>
<!-- /.login-box -->
 <!-- <canvas id="nokey" width="20" height="20">
    Your Browser Don't Support Canvas, Please Download Chrome ^_^``
    </canvas>
 -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
  
var canvas = document.getElementById('nokey'),
   can_w = parseInt(canvas.getAttribute('width')),
   can_h = parseInt(canvas.getAttribute('height')),
   ctx = canvas.getContext('2d');

// console.log(typeof can_w);

var ball = {
      x: 0,
      y: 0,
      vx: 0,
      vy: 0,
      r: 0,
      alpha: 1,
      phase: 0
   },
   ball_color = {
       r: 207,
       g: 255,
       b: 4
   },
   R = 2,
   balls = [],
   alpha_f = 0.03,
   alpha_phase = 0,
    
// Line
   link_line_width = 0.8,
   dis_limit = 260,
   add_mouse_point = true,
   mouse_in = false,
   mouse_ball = {
      x: 0,
      y: 0,
      vx: 0,
      vy: 0,
      r: 0,
      type: 'mouse'
   };

// Random speed
function getRandomSpeed(pos){
    var  min = -4,
       max = 4;
    switch(pos){
        case 'top':
            return [randomNumFrom(min, max), randomNumFrom(0.1, max)];
            break;
        case 'right':
            return [randomNumFrom(min, -0.1), randomNumFrom(min, max)];
            break;
        case 'bottom':
            return [randomNumFrom(min, max), randomNumFrom(min, -0.1)];
            break;
        case 'left':
            return [randomNumFrom(0.1, max), randomNumFrom(min, max)];
            break;
        default:
            return;
            break;
    }
}
function randomArrayItem(arr){
    return arr[Math.floor(Math.random() * arr.length)];
}
function randomNumFrom(min, max){
    return Math.random()*(max - min) + min;
}
console.log(randomNumFrom(0, 10));
// Random Ball
function getRandomBall(){
    var pos = randomArrayItem(['top', 'right', 'bottom', 'left']);
    switch(pos){
        case 'top':
            return {
                x: randomSidePos(can_w),
                y: -R,
                vx: getRandomSpeed('top')[0],
                vy: getRandomSpeed('top')[1],
                r: R,
                alpha: 1,
                phase: randomNumFrom(0, 30)
            }
            break;
        case 'right':
            return {
                x: can_w + R,
                y: randomSidePos(can_h),
                vx: getRandomSpeed('right')[0],
                vy: getRandomSpeed('right')[1],
                r: R,
                alpha: 1,
                phase: randomNumFrom(0, 10)
            }
            break;
        case 'bottom':
            return {
                x: randomSidePos(can_w),
                y: can_h + R,
                vx: getRandomSpeed('bottom')[0],
                vy: getRandomSpeed('bottom')[1],
                r: R,
                alpha: 1,
                phase: randomNumFrom(0, 10)
            }
            break;
        case 'left':
            return {
                x: -R,
                y: randomSidePos(can_h),
                vx: getRandomSpeed('left')[0],
                vy: getRandomSpeed('left')[1],
                r: R,
                alpha: 1,
                phase: randomNumFrom(0, 10)
            }
            break;
    }
}
function randomSidePos(length){
    return Math.ceil(Math.random() * length);
}

// Draw Ball
function renderBalls(){
    Array.prototype.forEach.call(balls, function(b){
       if(!b.hasOwnProperty('type')){
           ctx.fillStyle = 'rgba('+ball_color.r+','+ball_color.g+','+ball_color.b+','+b.alpha+')';
           ctx.beginPath();
           ctx.arc(b.x, b.y, R, 0, Math.PI*2, true);
           ctx.closePath();
           ctx.fill();
       }
    });
}

// Update balls
function updateBalls(){
    var new_balls = [];
    Array.prototype.forEach.call(balls, function(b){
        b.x += b.vx;
        b.y += b.vy;
        
        if(b.x > -(50) && b.x < (can_w+50) && b.y > -(50) && b.y < (can_h+50)){
           new_balls.push(b);
        }
        
        // alpha change
        b.phase += alpha_f;
        b.alpha = Math.abs(Math.cos(b.phase));
        // console.log(b.alpha);
    });
    
    balls = new_balls.slice(0);
}

// loop alpha
function loopAlphaInf(){
    
}

// Draw lines
function renderLines(){
    var fraction, alpha;
    for (var i = 0; i < balls.length; i++) {
        for (var j = i + 1; j < balls.length; j++) {
           
           fraction = getDisOf(balls[i], balls[j]) / dis_limit;
            
           if(fraction < 1){
               alpha = (1 - fraction).toString();

               ctx.strokeStyle = 'rgba(150,150,150,'+alpha+')';
               ctx.lineWidth = link_line_width;
               
               ctx.beginPath();
               ctx.moveTo(balls[i].x, balls[i].y);
               ctx.lineTo(balls[j].x, balls[j].y);
               ctx.stroke();
               ctx.closePath();
           }
        }
    }
}

// calculate distance between two points
function getDisOf(b1, b2){
    var  delta_x = Math.abs(b1.x - b2.x),
       delta_y = Math.abs(b1.y - b2.y);
    
    return Math.sqrt(delta_x*delta_x + delta_y*delta_y);
}

// add balls if there a little balls
function addBallIfy(){
    if(balls.length < 20){
        balls.push(getRandomBall());
    }
}

// Render
function render(){
    ctx.clearRect(0, 0, can_w, can_h);
    
    renderBalls();
    
    renderLines();
    
    updateBalls();
    
    addBallIfy();
    
    window.requestAnimationFrame(render);
}

// Init Balls
function initBalls(num){
    for(var i = 1; i <= num; i++){
        balls.push({
            x: randomSidePos(can_w),
            y: randomSidePos(can_h),
            vx: getRandomSpeed('top')[0],
            vy: getRandomSpeed('top')[1],
            r: R,
            alpha: 1,
            phase: randomNumFrom(0, 10)
        });
    }
}
// Init Canvas
function initCanvas(){
    canvas.setAttribute('width', window.innerWidth);
    canvas.setAttribute('height', window.innerHeight);
    
    can_w = parseInt(canvas.getAttribute('width'));
    can_h = parseInt(canvas.getAttribute('height'));
}
window.addEventListener('resize', function(e){
    console.log('Window Resize...');
    initCanvas();
});

function goMovie(){
    initCanvas();
    initBalls(30);
    window.requestAnimationFrame(render);
}
goMovie();

// Mouse effect
canvas.addEventListener('mouseenter', function(){
    console.log('mouseenter');
    mouse_in = true;
    balls.push(mouse_ball);
});
canvas.addEventListener('mouseleave', function(){
    console.log('mouseleave');
    mouse_in = false;
    var new_balls = [];
    Array.prototype.forEach.call(balls, function(b){
        if(!b.hasOwnProperty('type')){
            new_balls.push(b);
        }
    });
    balls = new_balls.slice(0);
});
canvas.addEventListener('mousemove', function(e){
    var e = e || window.event;
    mouse_ball.x = e.pageX;
    mouse_ball.y = e.pageY;
    // console.log(mouse_ball);
});








</script>
  
<script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script>
<script>
if (annyang) {
  // Let's define our first command. First the text we expect, and then the function it should call
  var commands = {
    'show tps report': function() {
      $('#tpsreport').animate({bottom: '-100px'});
    }
  };

  // Add our commands to annyang
  annyang.addCommands(commands);

  // Start listening. You can call this here, or attach this call to an event, button, etc.
  annyang.start();
}
</script>

<script>
var commands = {
  // annyang will capture anything after a splat (*) and pass it to the function.
  // e.g. saying "Show me Batman and Robin" is the same as calling showFlickr('Batman and Robin');
  'show me *tag': showFlickr,

  // A named variable is a one word variable, that can fit anywhere in your command.
  // e.g. saying "calculate October stats" will call calculateStats('October');
  'calculate :month stats': calculateStats,

  // By defining a part of the following command as optional, annyang will respond to both:
  // "say hello to my little friend" as well as "say hello friend"
  'say hello (to my little) friend': greeting
};

var showFlickr = function(tag) {
  var url = 'http://api.flickr.com/services/rest/?tags='+tag;
  $.getJSON(url);
}

var calculateStats = function(month) {
  $('#stats').text('Statistics for '+month);
}

var greeting = function() {
  $('#greeting').text('Hello!');
}

</script>



</script>

</body>

</html>
