<?php
require __DIR__ . '/vendor/autoload.php';
use App\SESSION\Session;
$title= "- Reading PDF File";
if(Session::getSessionData("bookid")=='1'){
  include_once "adminnavbar.php";
}else{
  include_once "navbar.php";
}
$bkid= $_GET['fram'];
?>
  <br>
<div class="container">
<div id="showfram"></div>
<div class="col-lg-12 col-md-4 col-sm-12  bg-white justify-content-center">
<h3>Comment:</h3>
       <form action="" method="post">
       <input type="hidden" name="pdfidcom" id="pdfidcom" value="<?php echo $bkid;?>">
       <textarea name="textpdf" id="textpdf" cols="50" rows="3"></textarea><br>
       <?php echo $m??''; ?>
      <button type="button" name="com" onclick="addpdfCom()" id="com" class="btn btn-info">Send</button>
       </form>
       <?php  
?>
<div id="showpdf"></div>
       </div>
</div>
<?php
include_once "navbarfooter.php"; ?>
<?php include_once "jq.php"; ?>