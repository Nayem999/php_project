<?php
require __DIR__ . '/vendor/autoload.php';
use App\SESSION\Session;
if (!Session::checkAuthOwner()) {
    header("location:login.php");
}
$title = "- Profile";
$page="profile";
if(Session::getSessionData("bookid")=='1'){
  include_once "adminnavbar.php";
}else{
  include_once "navbar.php";
}
?>
  <br>
<div class="container">
    <div class="row">
        <div class="col-2  border border-dark text-white">
          <div class="p-2 bg-info text-white">
          <ul style="list-style:none" class="px-0 text-white">
            <li><h3 class="py-2">User Profile</h3></li><hr>
            <li class="btn ppp"><a href="profile.php"> Personal Information</a></li><hr>
            <li class="btn sss"><a href="profile1.php">Sharing Book</a></li><hr>
            <li class="btn ccc"><a href="profile2.php">Personal Creativity</a></li>
          </ul>
          </div>
        </div>
        <div class="col-10">
<div id="profile_updatecr"></div>
</div>
</div>
<?php include_once "navbarfooter.php";?>
<?php include_once "jq.php";?>