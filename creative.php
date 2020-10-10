<?php
require __DIR__ . '/vendor/autoload.php';
use App\SESSION\Session;
$title= "- Creativity";
$page="create";
if(Session::getSessionData("bookid")=='1'){
  include_once "adminnavbar.php";
}else{
  include_once "navbar.php";
}
?>
<div class="container justify-content-center"><br>
<?php
if(Session::checkAuthOwner()){    
?>
<div class="sharehide">
<form action="" method="post">
    <div class="form-group">
      <label for="tit">Titel:</label>
      <input type="text" name="tit" id="tit" class="form-control" placeholder="" aria-describedby="helpId">
      <label for="des">Descriptive:</label>
      <textarea class="tx form-control" name="des" id="des" rows="10"></textarea><br>
    <button type="submit" class="btn btn-primary" onclick="addRecordCreate()" name="sub" id="sub">Upload</button>
    &nbsp<div class="hideadd btn text-white bg-success">Hidde</div>
    </div>
    </form>
</div>
    <div class="add_book btn text-white bg-success p-2" >Add Creativity</div>
    <br><br>
<?php
echo $mes??'';
?>
<div id="alert"></div>
<?php  
}
?>
<div id="records_create"></div>
<?php  
      ?>
</div>
<?php include_once "navbarfooter.php";?>
<?php include_once "jq.php"; ?>