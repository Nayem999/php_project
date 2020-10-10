<?php
require __DIR__ . '/vendor/autoload.php';
use App\SESSION\Session;
$title= "- Approved";
include_once "adminnavbar.php";
if(!Session::checkAuthOwner() || Session::getSessionData("bookid")!='1'){    
  header("location:login.php");    
}
?>
<div class="container justify-content-center"><br>
    <?php echo $mes??'';  ?>
<br>
<div id="approved"></div>
</div>
<?php include_once "navbarfooter.php";?>
<?php include_once "jq.php"; ?>