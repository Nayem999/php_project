<?php
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database;
use App\SESSION\Session;
if(Session::checkAuthOwner()){    
    header("location:index.php");    
}
$conn=new Database();
$page="login";
if (isset($_POST['signin'])){
    $un=$conn->db->real_escape_string($_POST['name']);
    $up=$_POST['pass'];
    $sq= "select * from login where email='$un' limit 1";
    $sr=$conn->rawQuery($sq);
    if ($sr->num_rows == 1){
        $row = $sr->fetch_assoc();
        if (password_verify($up,$row['password'])){
            Session::setSessionData("bookuser",$row['name']);
            Session::setSessionData("bookid",$row['id']);
            Session::setSessionData("book",TRUE);
            header("location: index.php");
        }
        else{
            $mes=" password or email invalid";
        }
    }
    else {
        $mes=" email invalid";
    }
}
$title= "- Login";
include_once "navbarheader.php";
?>
<style>
    html,
    body {
        height: 100%;
    }
    .ar{
        text-align: center;
        width: 400px;
    }
    .lg {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .lgbg{
        background-image: url('pic/log.jpg');
        background-repeat: no-repeat;
        background-size: cover; 
    }
    .tom{
        margin-top: 50%;
    }
    .opa{
  opacity: .75;
}
    </style>
</head>
<body class="lgbg">

<nav class="navbar opa navbar-expand-lg navbar-dark sticky-top p-2 navber-togler-icon" style="background-color: #0f466d; margin-top:0%;">  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
            <a class="nav-link <?php if($page=='home'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='home'){echo 'salmon';} ?>" href="index.php"><i class="fas fa-home" > Home</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='about'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='about'){echo 'salmon';} ?>" href="about.php"><i class="far fa-address-card"></i> About us</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link <?php if($page=='read'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='read'){echo 'salmon';} ?>" href="read.php"><i class="fas fa-book"></i> Reading</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link <?php if($page=='share'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='share'){echo 'salmon';} ?>" href="share.php"><i class="fas fa-share-alt" ></i> Sharing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='create'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='create'){echo 'salmon';} ?>" href="creative.php"><i class="fas fa-marker" ></i> Show talent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='contact'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='contact'){echo 'salmon';} ?>" href="contact.php"><i class="far fa-address-book"></i> Contact us</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 my-md-0">
        <?php
if(Session::checkAuthOwner()){    
?>
          <span class="my-2 my-sm-0"><a href="profile.php" class="<?php if($page=='profile'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='profile'){echo 'salmon';} ?>"><i class="fas fa-user-circle fa-2x"></i></a></span>
            <button class="btn my-2 my-sm-0" type="button"><a href="logout.php">Log out</a></button>

            <?php  
}
else{
?>
<button class="btn my-2 my-sm-0 <?php if($page=='login'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='login'){echo 'salmon';} ?>" type="button"><a href="login.php">Log in</a></button>
<?php  
}
?>
        </form>
      </div>    
    </nav>
<div class="splash-container lg">
        <div class="card tom  d-flex justify-content-center">
            <div class="card-header text-center"><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="POST">
                   <div class="text-danger"> <?php echo $mes??'';  ?></div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="name" id="username" type="text" placeholder="Email" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input  class="form-control form-control-lg" id="password" type="password" name="pass" placeholder="Password" required>
                    </div>
                    <button type="submit" name="signin" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered text-center">
                    <a href="singup.php" class="footer-link">Create an account. </a>It's quick and easy.</div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>