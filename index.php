<?php
require __DIR__ . '/vendor/autoload.php';
use App\SESSION\Session;
?>
<?php
$title= "- Home";
$page="home";
if(Session::getSessionData("bookuser")=='Admin'){
  include_once "adminnavbar.php";
}else{
  include_once "navbar.php";
}
?>
<br>
<div class="container">
<h1 class="text-uppercase text-center">Welcome To <?php  echo Session::getSessionData("bookuser"); ?><br> World Bigest Public Sharing Book Library</h1>
<div class="row justify-content-center">
<div class="col-lg-10 col-md-4 col-sm-12">
        <div class="row">
          <div class="col-lg-4 col-md-12" title="Reading"><br>
            <div class="card border-secondary shadow">
              <a data-lightbox="read" href="pic/read.jpg"><img class="card-img-top" src="pic/read.jpg"
                  alt=""></a>
              <div class="card-body">
                <h4 class="card-title">Reading</h4>
                <p class="card-text">Lot of books</p>
                <a href="read.php" class="btn btn-primary">Get More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 " title="Sharing"><br>
            <div class="card border-secondary shadow">
              <a href="pic/share.jpg" data-lightbox="share"><img class="card-img-top" data-lightbox="002" src="pic/share.jpg"
                  alt=""></a>
              <div class="card-body">
                <h4 class="card-title">Sharing</h4>
                <p class="card-text">Book share in your location</p>
                <a href="share.php" class="btn btn-primary">Get More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12" title="Creativity"><br>
            <div class="card border-secondary shadow">
              <a href="pic/create.jpg" data-lightbox="create"><img class="card-img-top" data-lightbox="003" src="pic/create.jpg"
                  alt=""></a>
              <div class="card-body">
                <h4 class="card-title">Blog</h4>
                <p class="card-text">Looking Creativity</p>
                <a href="creative.php" class="btn btn-primary">Get More</a>
              </div>
            </div>
          </div>
        </div>
      </div><br>
      </div>
</div>
<?php include_once "navbarfooter.php"; ?>
<?php include_once "jq.php"; ?>