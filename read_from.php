<?php
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database;
use App\SESSION\Session;
if(!Session::checkAuthOwner() || Session::getSessionData("bookid")!='1'){    
  header("location:login.php");    
}
$title= "Sharing Books: Reading";
include_once "adminnavbar.php";
?>
<?php
$conn=new Database();
if (isset($_POST['submit'])){
    $bn=$conn->db->real_escape_string($_POST['na']);
    $ln=$conn->db->real_escape_string($_POST['la']);
    $cat=$conn->db->real_escape_string($_POST['cat']);
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
            if ($fileSize < 10000000){
                $fileNameNew = uniqid(' ',true).".".$actualExt;
                $destination = 'upload/'.$fileNameNew;
                move_uploaded_file($fileTmp, $destination); 
                $sq= "insert into pdf(name, category, pimage, link) values('$bn','$cat','$fileNameNew','$ln')";
                $conn->rawQuery($sq);
                $mes="Upload Successfuly.";
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
?>
<br>
<div class="container justify-content-center">
    <form action="" method="post" enctype="multipart/form-data">
<table>
<tr>
    <td>Name:</td>
    <td><input type="text" class="form-control" name="na"> </td>
</tr>
<tr>
    <td>Cover Image:</td>
    <td><input type="file" accept="image/*;capture=camera" id="productimage" class="form-control" name="file"></td>
</tr>
<tr>
    <td>Drive Link</td>
    <td> <input type="text" class="form-control" name="la"></td>
</tr>
<tr>
    <td>Category</td>
    <td><select  class="form-control" name="cat" id="">
    <option value="">All Category&#9660</option>
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
    </select></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" value="Submit" name="submit"> </td>
</tr>
</table>
    </form>
    <?php echo $mes??'';  ?>
</div>
<?php include_once "navbarfooter.php"  ?>
<?php include_once "jq.php"; ?>
