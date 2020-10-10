<?php
require __DIR__ . '/vendor/autoload.php';
use App\SESSION\Session;
$title= "- Reading";
$page="read";
if(Session::getSessionData("bookid")=='1'){
  include_once "adminnavbar.php";
}else{
  include_once "navbar.php";
}
if(Session::getSessionData("bookid")=='1'){
  include_once "adminnavbar.php";
?>
<a href="read_from.php" class="btn btn-outline-danger m-3">Link</a>
<?php
}
?>
<br>
 <div class="container">
 <div class="d-flex justify-content-end">
<div class="p-1">Filter by: &nbsp &nbsp &nbsp</div>
<form action="">
<div class="form-group">
<select class="form-control" name="" id="filterpdf">
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
<div id="pdfread"></div>
<?php include_once "navbarfooter.php"; ?>
<?php include_once "jq.php"; ?>