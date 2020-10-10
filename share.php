<?php
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database;
use App\SESSION\Session;
//use App\classes\ImageResize;
if(!Session::checkAuthOwner()){    
  header("location:login.php");    
}
$title= "- Reading";
$page="share";
if(Session::getSessionData("bookid")=='1'){
  include_once "adminnavbar.php";
}else{
  include_once "navbar.php";
}
$conn = new Database();
if (isset($_POST['submit'])){
  if(empty($_POST['na'])||empty($_POST['la'])||empty($_POST['mo'])||empty($_POST['ca'])){
    $mes="<span style= 'color:red'>Please fill up all information</span>";
  }else{
      $i= Session::getSessionData("bookid");
  $bn=$conn->db->real_escape_string($_POST['na']);
  $cn=$conn->db->real_escape_string($_POST['ca']);
  $de=$conn->db->real_escape_string($_POST['de']);
  $loc=$conn->db->real_escape_string($_POST['location']);
if($conn->db->real_escape_string($_POST['la'])=="Free"){
  $ln=$conn->db->real_escape_string($_POST['la']);
  $pr="0";
}else{
  $ln=$conn->db->real_escape_string($_POST['la']);
  $pr=$conn->db->real_escape_string($_POST['price']);
}
  $mb=$conn->db->real_escape_string($_POST['mo']);
  $file= $_FILES['file'];
  $fileName= $_FILES['file']['name'];
  $fileTmp= $_FILES['file']['tmp_name'];
  $fileSize= $_FILES['file']['size'];
  $fileError= $_FILES['file']['error'];
  $fileType= $_FILES['file']['type'];
  $ext= explode('.', $fileName );
  $actualExt= strtolower(end($ext));
  $allow= array('jpg');
  if(in_array($actualExt, $allow)){
      if ($fileError === 0 ){
          if ($fileSize < 1024000){
              $fileNameNew = uniqid(' ',true).".".$actualExt;
              $destination = 'uploads/'.$fileNameNew;
              move_uploaded_file($fileTmp, $destination);
             // $image = new ImageResize($destination);
             // $image->resizeToWidth(800);
             // $image->save($destination); 
              $sq= "insert into share(name,category,descriptive, mobile, pimage, choice, price, uid, location) values('$bn','$cn','$de','$mb','$fileNameNew','$ln','$pr','$i','$loc')";
              $conn->rawQuery($sq);
              if($conn->db->affected_rows == 1){
                $mes="Upload Successfuly. See in your profile.";
                $_POST['na']="";
                $_POST['la']="";
                $_POST['price']="";
                $_POST['mo']="";
                $mes="Uploaded. Check your Profile.";
              }
          }
          else{
              $mes= "<b style='color:red'>File size is big</br>";
          }
      }
      else{
          $mes="<b style='color:red'>Some error problem given. Try again later.</b>";
      }
  }
  else{
      $mes= "<b style='color:red'>File extension is not correct</b>";
  }
}
}
//share upload query end
?>
<div class="container justify-content-center"><br>
<h5 class="text-success"><?php echo $mes??'';  ?></h5>
<div class="float-left">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Book
</button></div><br>
<div class="d-flex justify-content-end">
<div class="p-1">Filter by: &nbsp &nbsp &nbsp</div>
<form action="">
<div class="form-group">
        <select class="form-control" name="" id="filter">
        <option value="">All Category &#9660</option>
              <optgroup label="School">
              <option value="c1">Class 1</option>
              <option value="c2">Class 2</option>
              <option value="c3">Class 3</option>
              <option value="c4">Class 4</option>
              <option value="c5">Class 5</option>
              <option value="c6">Class 6</option>
              <option value="c7">Class 7</option>
              <option value="c8">Class 8</option>
              <option value="c9">Class 9 & 10</option>
              </optgroup>
        <option value="College">College</option>
        <option value="University">University</option>
        <option value="BCS">BCS</option>
        <option value="Job Related">Job Related</option>
        <option value="ShortStory">Short Story</option>
        <option value="Novel">Novel</option>
        <option value="Poem">Poem</option>
        <option value="Religion">Religion</option>
        <option value="Kids">Kids</option>
        <option value="Comics">Comics</option>
        <option value="Computer & Tech">Computer & Tech</option>
        <option value="Cooking">Cooking</option>
        <option value="Health & Fitness">Health & Fitness</option>
        <option value="History">History</option>
        <option value="Medical">Medical</option>
        <option value="Mysteries">Mysteries</option>
        <option value="Romance">Romance</option>
        <option value="Science & Math">Science & Math</option>
        <option value="Self-Help">Self-Help</option>
        <option value="Sci-Fi & Fantasy">Sci-Fi & Fantasy</option>
        <option value="Travel">Travel</option>
        <option value="Others">Others</option>
        </select>
        </div>
</form>
</div>
<div id="records_contant"></div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Book</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Book Name:</label>
        <input type="text" name="na" id="na" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="ca">Sharing Category:</label>
        <select class="form-control" name="ca" id="ca">
        <option >Choice Category</option>
        <option value="School">School</option>
        <option value="College">College</option>
        <option value="University">University</option>
        <option value="BCS">BCS</option>
        <option value="Job Related">Job Related</option>
        <option value="ShortStory">Short Story</option>
        <option value="Novel">Novel</option>
        <option value="Poem">Poem</option>
        <option value="Religion">Religion</option>
        <option value="Kids">Kids</option>
        <option value="Comics">Comics</option>
        <option value="Computer & Tech">Computer & Tech</option>
        <option value="Cooking">Cooking</option>
        <option value="Health & Fitness">Health & Fitness</option>
        <option value="History">History</option>
        <option value="Medical">Medical</option>
        <option value="Mysteries">Mysteries</option>
        <option value="Romance">Romance</option>
        <option value="Science & Math">Science & Math</option>
        <option value="Self-Help">Self-Help</option>
        <option value="Sci-Fi & Fantasy">Sci-Fi & Fantasy</option>
        <option value="Travel">Travel</option>
        <option value="Others">Others</option>
        </select>
        </div>
        <div class="form-group">
        <label for="de">Descriptive:</label>
        <input type="text" name="de" id="de" class="form-control" placeholder="No more than 50 letters" maxlength="50" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="mo">Mobile Number:</label>
        <input type="text" name="mo" id="mo" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="file">Cover Image:</label>
        <input type="file" class="form-control-file" name="file" accept="image/*;capture=camera" id="file" placeholder="" aria-describedby="fileHelpId">
        <span>It should be below 125kb. <a class="text-danger" target="_blank" href="https://picresize.com/">Resize</a></span>
      </div>
            <div class="form-group">
        <label for="la">Sharing Option:</label>
        <select class="form-control" name="la" id="la">
        <option>Choice Sharing Option</option>
        <option value="Free">Free</option>
        <option value="Rent">Rent</option>
        <option value="Sale">Sale</option>
        </select>
        </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
            </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="submit" >Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<?php
include_once "navbarfooter.php"
?>
<?php include_once "jq.php"; ?>