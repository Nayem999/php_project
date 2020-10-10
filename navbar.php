<?php
require __DIR__ . '/vendor/autoload.php';
use App\SESSION\Session;
?>
<?php
include_once "navbarheader.php"
?>
<style>
.bglg{
  background-image: url('pic/stripe.png');
  background-repeat: repeat;
}
.opa{
  opacity: .75;
}
.const{
  text-align: center;
}
.footer {
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #0f466d;
}
* {
      padding: 0px;
      margin: 0px;
    }
.leftside {
      position: fixed;
      top: 40%;
      left: -30px;
      z-index: 1;
    }
    .leftside li {
      list-style-type: none;
      transition: 1s;
      position: relative;
    }
    .leftside li:hover {
      left: 30px;
    }
</style>
</head>
<body class="bglg">
<div class="leftside">
    <ul>
      <li><a href="https://www.facebook.com/" title="Facebook" target="_blanck"><img src="pic/f1.jpg" alt=""
            width="50px" height="40px"></a></li>
      <li><a href="https://twitter.com/" title="Twitter" target="_blanck"><img src="pic/t1.png" alt="" width="50px"
            height="40px"></a></li>
      <li><a href="https://www.linkedin.com/" title="Linkedin" target="_blanck"><img src="pic/l1.png" alt=""
            width="50px" height="40px"></a></li>
      <li><a href="https://aboutme.google.com/u/0/?referer=gplus" title="Google+" target="_blanck"><img src="pic/g1.png"
            alt="" width="50px" height="40px"></a></li>
    </ul>
  </div>
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
          <li class="nav-item"  style="background-color: #0f466d; ">
            <a class="nav-link <?php if($page=='read'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='read'){echo 'salmon';} ?>" href="read.php"><i class="fas fa-book"></i> Reading</a>   
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='share'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='share'){echo 'salmon';} ?>" href="share.php"><i class="fas fa-share-alt" ></i> Sharing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='create'){echo 'active';}else{echo 'text-white';} ?>" style="color: <?php if($page=='create'){echo 'salmon';} ?>" href="creative.php"><i class="fas fa-marker" ></i> Blog</a>
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
<button class="btn my-2 my-sm-0"type="button"><a class="<?php if($page=='login'){echo 'active';}else{echo 'text-white';} ?>" href="login.php"  style="color: <?php if($page=='login'){echo 'salmon';} ?>" >Log in</a></button>
<?php  
}
?>
        </form>
      </div>
    </nav>