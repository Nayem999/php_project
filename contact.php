<?php
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database;
use App\SESSION\Session;
?>
<?php
$title= "- Contact";
$page="contact";
if(Session::getSessionData("bookid")=='1'){
    include_once "adminnavbar.php";
  }else{
    include_once "navbar.php";
  }
$conn=new Database();
if (isset($_POST['submit'])){
if (empty($_POST['uname']) || empty($_POST['uemail']) ||empty($_POST['umassege']) ){
    $mes="<span style= 'color:red'>Check Required</span >";
}
else {
    $un=$conn->db->real_escape_string($_POST['uname']);
    $ue=$conn->db->real_escape_string($_POST['uemail']);
    $up=$conn->db->real_escape_string($_POST['uphone']);
    $um=$conn->db->real_escape_string($_POST['umassege']);
    $sq= "insert into contact(name, email, phone, text) values('$un','$ue','$up','$um')";
    $conn->rawQuery($sq);
        $mes="<h5>Successfully send your message. <br>Thank you for message.</h5>";
}   
}
?>
<br>
<div class="container">
        <div class="row justify-content-center">
            <div class=" col-sm-offset-3 col-sm-5">
                <form action="#" method ="post">
                    <h3 style="text-align: center;" class="bg-primary">Contact form</h3>
                    <div class="form-group">
                        <label for="Name"> Name </label>
                        <input type="text" class="form-control" required id="exampleInputName1" placeholder="Your Full Name" name="uname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" required id="exampleInputEmail1" placeholder="Enter email" name="uemail">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No</label>
                        <input type="text" class="form-control" id="exampleInputPhone1" placeholder="Enter Your Phone no" name="uphone">
                    </div>
                    <div class="form-group">
                        <label for="massege">Write us a massege</label>
                        <textarea id="" cols="30" rows="5" class="form-control" required name="umassege"> </textarea>
                    </div>
                   <div class="form-group const">
                   <button type="submit" class="btn btn-primary col-sm-5 const" name="submit">Submit</button>
                  </div>
                </form>
                <?php  if (isset($mes)){echo $mes;} ?>
    </div><br>
</div>
</div>
<div class="footer">
<div class="row">
    <div class="col-6">
        <div class="container-fluid" style="color: tomato">
        <h3 style="color: white">Contact us</h3>
        <h5 style="color: tomato">Name: Md. Shaleh Ahmed Nayem</h5>
        <h5 style="color: tomato">E-mail: shalehahmed34@gmail.com</h5>
        <h5 style="color: tomato">Phone: 01684191999</h5>
        <h5 style="color: tomato">Address: Mirpur, Dhake-1216</h5>
        </div>
    </div>
    <div class="col-6">
    <div class="container-fluid">
    <h3 style="color: white">Location</h3>
    <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.1344290369975!2d90.3773050144564!3d23.77822689363081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c74c29ceeafb%3A0xe72ef11d9cf0aeef!2z4KaG4KaH4Kah4Ka_4Kas4Ka_LeCmrOCmv-CmhuCmh-Cmj-CmuOCmh-CmoeCmrOCnjeCmsuCngQ!5e0!3m2!1sbn!2sbd!4v1565856506553!5m2!1sbn!2sbd"
            width="90%" height="180" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
    </div>
</div>
</div>
</div>
<?php include_once "navbarfooter.php";  ?>
<?php include_once "jq.php";  ?>