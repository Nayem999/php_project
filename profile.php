<?php
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database;
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
            <li class="btn"><a href="profile.php"> Personal Information</a></li><hr>
            <li class="btn"><a href="profile1.php">Sharing Book</a></li><hr>
            <li class="btn"><a href="profile2.php">Personal Creativity</a></li>
          </ul>
          </div>
        </div>
        <div class="col-10">
        <?php
$conn = new Database();
?>
<div class="user">
   <form action="" method="post">
<table class="table table-striped table-inverse" border="2" style="width:100%;">      
<tr>
        <td>Name</td>
        <td > <input type="text" class="form-control form-control-lg" name="name" id="naup" placeholder=""></td>
        </tr>
        <tr>
        <td>Phone</td>
        <td>  <input type="text" class="form-control form-control-lg" name="phone" id="phup" placeholder=""></td>
        </tr>
        <td>Email</td>
        <td>  <input type="email" class="form-control form-control-lg" name="email" id="emup" placeholder=""></td>
        </tr><tr>
        <td></td>
        <td><input type="submit" value="Update" onclick="updateuserdetail()" name="update" class="btn btn-success" ></td>
        </tr>
</form>
</table>
</div>
<div id="profile_update"></div>
    </div>
</div>
<?php include_once "navbarfooter.php";?>
<?php include_once "jq.php";?>