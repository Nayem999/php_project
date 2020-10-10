<?php
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database;
use App\SESSION\Session;
$title= "- Reading PDF File";
if(Session::getSessionData("bookid")=='1'){
  include_once "adminnavbar.php";
}else{
  include_once "navbar.php";
}
?>
  <br>
<div class="container">
<?php
$conn = new Database();
$bkid= $_GET['details'];
$displayquery="SELECT * FROM `share` where id='$bkid'";
$cou =$conn->rawQuery($displayquery);
?>
<div class="row">
<?php 
while ($query_row = mysqli_fetch_assoc($cou)){
?>
<div class="col-6">
<img src="uploads/<?php echo $query_row['pimage'];?>" style="width:300px; height:400px" alt="">
</div>
<div class="col-6">
<table class="table table-striped table-inverse table-danger">
<tr><th><b>Book Name:</b></th><td><?php echo $query_row['name'];?></td></tr>
<tr><th><b>Book Category:</b></th><td><?php echo $query_row['category'];?></td></tr>
<tr><th><b>Descriptive:</b></th><td><?php echo $query_row['descriptive'];?></td></tr>
<tr><th><b>Sharing Choice:</b></th><td><?php echo $query_row['choice'];?></td></tr>
<tr><th><b>Price:</b></th><td><?php echo $query_row['price'];?></td></tr>
<tr><th><b>Mobile:</b></th><td><?php echo $query_row['mobile'];?></td></tr>
<tr><th><b>Location:</b></th><td><?php echo $query_row['location'];?></td></tr>
</table>
</div>
<?php
}
?>
</div>
<br><br>
<div class="col-lg-12 col-md-4 col-sm-12  bg-white justify-content-center">
<h3>Comment:</h3>
       <form action="" method="post">
       <input type="hidden" name="shareidcom" id="shareidcom" value="<?php echo $bkid;?>">
       <textarea name="textShare" id="textShare" cols="50" rows="3"></textarea><br>
       <?php echo $m??''; ?>
      <button type="button" name="com" onclick="addshareCom()" id="com" class="btn btn-info">Send</button>
       </form>
       <?php  
       $commentquery="SELECT * from sharecomment where commentid='$bkid' order by id desc limit 5";
$result=$conn->rawQuery($commentquery);
  for ($i=0; $i<mysqli_num_rows($result); $i++){
  while ($query_row = mysqli_fetch_array($result)){
    ?>
     <ul style="list-style:none;">
    <li style="display:inline;"><strong><?php echo $query_row['uname']." : ";?></strong></li>
    <li style="display:inline;"><?php echo $query_row['text'];?><br></li></ul>
    <?php
  }
}
?>
       </div>
</div>
<br>
<?php
include_once "navbarfooter.php"; ?>
<?php include_once "jq.php"; ?>