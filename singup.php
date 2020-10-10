<?php
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database;
use App\SESSION\Session;
$conn = new Database();
$conn->table_name= "login";
if (Session::checkAuthOwner()){
    header("location:index.php");
}
$conn=new Database();
if (isset($_POST['signup'])){
if (empty($_POST['name']) || empty($_POST['email']) ||empty($_POST['pass']) ){
    $mes="<span style= 'color:red'>Please fill up all information</span>";
}
else{
    $un=$conn->db->real_escape_string($_POST['name']);
    $ue=$conn->db->real_escape_string($_POST['email']);
    $upo=$conn->db->real_escape_string($_POST['phone']);
    $up=$_POST['pass'];
    $upre=$_POST['repass'];
    $upp= password_hash($up, PASSWORD_DEFAULT);
if ($up == $upre){
    $sq= "insert into login(name, email, phone, password) values('$un','$ue', '$upo','$upp')";
    $conn->rawQuery($sq);
        header("location:login.php");
}
else {
    $mes="<span style= 'color:red'>Re-check your password</span >";
}
    
}
}
$title= "- Singup";
include_once "navbarheader.php";
?>
<style>
       .lg {
        padding-top: 20px;
        padding-bottom: 20px;
    }
    </style>
</head>
<body style="background:darkgray">


<div class="splash-container lg">
        <div class="card w-600px">
            <div class="card-header text-center"><span class="splash-description">Please enter your information.</span></div>
            <div class="card-body">
                <form method="POST">
                    <?php
                    echo $mes??'';
                    ?>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Name:</td>
                                <td><div class="form-group">
                        <input class="form-control form-control-lg" name="name" id="username" type="text" placeholder="name" autocomplete="off">
                    </div></td>
                            </tr>
                            <tr>  
                                <td>Email:</td>
                                <td><div class="form-group">
                        <input class="form-control form-control-lg" id="email"  type="email" name="email" placeholder="Email">
                    </div></td>
                            </tr>
                            <tr>  
                                <td>Phone:</td>
                                <td><div class="form-group">
                        <input class="form-control form-control-lg" id="phone"  type="text" name="phone" placeholder="Phone">
                    </div></td>
                            </tr>
                            <tr>
                               <td>Password:</td>
                               <td><div class="form-group">
                        <input class="form-control form-control-lg" id="password"  type="password" name="pass" placeholder="Password">
                        </div></td>
                           </tr>
                           <tr>
                               <td>Re-Password:</td>
                               <td><div class="form-group">
                        <input class="form-control form-control-lg" id="repassword"  type="password" name="repass" placeholder="Re-Password">
                        </div></td>
                           </tr>
                           <tr>  
                               <td><button class="btn btn-success btn-lg btn-block"><a href="login.php" class="text-white">Back</a></button></td>
                               <td><button type="submit" name="signup" class="btn btn-primary btn-lg btn-block">Sign up</button></td>
                           </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
