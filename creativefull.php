<?php
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database;
use App\SESSION\Session;
if(!Session::checkAuthOwner()){    
  header("location:login.php");    
}
$title= "- Creativity";
if(Session::getSessionData("bookid")=='1'){
  include_once "adminnavbar.php";
}else{
  include_once "navbar.php";
}
?>
<div class="container"><br>
<?php
$conn = new Database();
$aaa=$_GET['cre'];
//start query 
    $qr= "SELECT * from creative where id='$aaa'";
    $so=$conn->rawQuery($qr);
    while ($query_row = mysqli_fetch_assoc($so)){
    ?>
    <h2 style="text-align:center"><?php echo $query_row['title']; ?></h2>
    <small id="helpId" class="form-text text-muted"><?php echo $query_row['uname']." || ". $query_row['created']; ?></small>
    <h6><?php echo $query_row['discriptive']; ?></h6>

    <?php
    }
include_once "navbarfooter.php"; ?>
<?php include_once "jq.php"; ?>