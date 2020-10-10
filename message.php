<?php
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database;
use App\SESSION\Session;
if(!Session::checkAuthOwner() || Session::getSessionData("bookid")!='1'){    
  header("location:login.php");    
}
$title= "- Message";
include_once "adminnavbar.php";
?>
<div class="container justify-content-center"><br>
    <?php echo $mes??'';  ?>
<br>
<?php
    $conn = new Database();
    $qr= "SELECT * FROM contact order by id desc"; 
    $so = $conn->rawQuery($qr);
    if ($so->num_rows >= 1) {
?>
<form action="" method="post">
<table class="table table-striped table-inverse table-active" border="2" style="width:100%;">
  <thead class="thead-inverse table-success">
    <tr>
      <th>Name</th>
      <th>Message</th>     
      <th>Email</th>     
      <th>Phone</th>     
      <th>Time</th>     
    </tr>
    </thead>
    <tbody class="table-info">
    <?php
    for ($i=0; $i<mysqli_num_rows($so); $i++){
   while ($query_row = mysqli_fetch_assoc($so)){
    $uap=$query_row['id']; 
      ?>
      <tr>    
        <td><?php echo $query_row['name']; ?></td>
        <td><?php echo $query_row['text']; ?></td>
        <td><?php echo $query_row['email']; ?></td>
        <td><?php echo $query_row['phone']; ?></td>
        <td><?php echo $query_row['time']; ?></td>
        </tr>
      <?php
   }  
  }
}
      ?>
    </tbody>
</table>
</form>
</div>
<?php include_once "navbarfooter.php";?>
<?php include_once "jq.php"; ?>