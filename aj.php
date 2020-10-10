<?php
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database;
use App\SESSION\Session;
$conn = new Database();
if(isset($_POST["action"])){
	$updateQuery = "update login set  `name` = '".$_POST["pn"]."',  `email` = '".$_POST["pe"]."', `phone` = '".$_POST["pp"]."' , where `id` ='".$_POST["pid"]."' limit 1";
	$conn->rawQuery($updateQuery);	
	}
	///share page start
if (isset($_POST['rreadrecord'])){
	$page = isset($_POST['pagesh'])?$_POST['pagesh']:1;
		$limit= 8;
		$offset= $page * $limit - $limit;
$data='';
	$m= Session::getSessionData("bookid");
	if(isset($_POST['fil'])){
		$filter=$_POST['fil'];
	$displayquery="SELECT * FROM `share` where category='$filter' and `uid`!='$m' order by id desc limit $limit offset $offset";
	$totalRecord = "select count(*) as total from share where category='$filter' and `uid`!='$m'";
	}else{
		$displayquery="SELECT * FROM `share` where `uid`!='$m' order by id desc  limit $limit offset $offset";
		$totalRecord = "select count(*) as total from share where `uid`!='$m'";
	}
	$result=$conn->rawQuery($displayquery);
	$totalRecordResult = $conn->rawQuery($totalRecord);
	$row = $totalRecordResult->fetch_assoc();
	$totalRow = $row['total'];
	$totalPage = ceil($totalRow/$limit);
	if (mysqli_num_rows($result)>0){
	$data.='<div class="row justify-content-center">';
		$number = $offset+1;
		while ($row = mysqli_fetch_array($result)){
			$data.='<div class="col-lg-3 col-md-12 "><br>
            <div class="card border-secondary shadow">
              <a href="uploads/'.$row['pimage'].'" data-lightbox="uploads/'.$row['pimage'].'"><img class="card-img-top" src="uploads/'.$row['pimage'].'" alt=""></a>
              <div class="card-body">
                <h4 class="card-title text-uppercase">'.$row['name'].'</h4>
                <p class="card-text">Sharing Type: '.$row['choice'].'</p>
                <a href="sharefull.php?details='.$row['id'].'" class="btn btn-primary">More info . . .</a>
              </div>
            </div>
          </div>';
	}}
	$data.='</div>';
	echo $data;
			?><br>
		<nav aria-label="pagination" class="d-flex justify-content-center">
		<ul class="pagination">
		<?php 
		if(isset($_POST['fil'])){
			$p = (($page-1)>0?($page-1):1);
		$pdis= ($page==1)?"disabled":"";
		echo '<li class="btn btn-info page-item page-link pagenofilter'.$pdis.'" id="1">First</li>';
		echo '<li class="btn btn-info page-item page-link pagenofilter'.$pdis.'" id="'.$p.'">Previuos</li>';
		for ($i=1; $i<=$totalPage; $i++){
			$a= ($page==$i)?"active":'';
			if (abs($page-$i) < 6){
				echo '<li class="btn btn-info page-item page-link pagenofilter '.$a.'" id="'.$i.'">'.$i.'</li>';
			}
		}
		$n = (($page+1)>0?($page+1):$totalPage);
		$ndis= ($page==$totalPage)?"disabled":"";
		echo '<li class="btn btn-info page-item page-link pagenofilter'.$ndis.'" id="'.$n.'">Next</li>';
		echo '<li class="btn btn-info page-item page-link pagenofilter'.$ndis.'" id="'.$totalPage.'">Last</li>';
	}else{
		$p = (($page-1)>0?($page-1):1);
		$pdis= ($page==1)?"disabled":"";
		echo '<li class="btn btn-info page-item page-link pagenosh'.$pdis.'" id="1">First</li>';
		echo '<li class="btn btn-info page-item page-link pagenosh'.$pdis.'" id="'.$p.'">Previuos</li>';
		for ($i=1; $i<=$totalPage; $i++){
			$a= ($page==$i)?"active":'';
			if (abs($page-$i) < 6){
		echo '<li class="btn btn-info page-item page-link pagenosh '.$a.'" id="'.$i.'">'.$i.'</li>';
	}
}
$n = (($page+1)>0?($page+1):$totalPage);
$ndis= ($page==$totalPage)?"disabled":"";
echo '<li class="btn btn-info page-item page-link pagenosh'.$ndis.'" id="'.$n.'">Next</li>';
echo '<li class="btn btn-info page-item page-link pagenosh'.$ndis.'" id="'.$totalPage.'">Last</li>';
}
		?>
		</ul>
		</nav>
		<?php
	}
	///share page end
///pdf page start
if (isset($_POST['rreadrecordpdf'])){
	$page = isset($_POST['pagesh'])?$_POST['pagesh']:1;
		$limit= 8;
		$offset= $page * $limit - $limit;
$data='';
	$m= Session::getSessionData("bookid");
	if(isset($_POST['fil'])){
		$filter=$_POST['fil'];
	$displayquery="SELECT * FROM `pdf` where category='$filter' order by id desc limit $limit offset $offset";
	$totalRecord = "select count(*) as total from pdf where category='$filter'";
	}else{
		$displayquery="SELECT * FROM `pdf` order by id desc  limit $limit offset $offset";
		$totalRecord = "select count(*) as total from pdf ";
	}
	$result=$conn->rawQuery($displayquery);
	$totalRecordResult = $conn->rawQuery($totalRecord);
	$row = $totalRecordResult->fetch_assoc();
	$totalRow = $row['total'];
	$totalPage = ceil($totalRow/$limit);
	if (mysqli_num_rows($result)>0){
	$data.='<div class="row justify-content-center">';
		$number = $offset+1;
		while ($row = mysqli_fetch_array($result)){
			$data.='<div class="col-md-3">
			<a href="ifram.php?fram='.$row['id'].'"><img src="upload/'.$row['pimage'].'" style="width:200px; height:300px" alt=""></a><br><br>
		  </div>';
	}}
	$data.='</div>';
	echo $data;
			?><br>
		<nav aria-label="pagination" class="d-flex justify-content-center">
		<ul class="pagination">
		<?php 
		if(isset($_POST['fil'])){
			$p = (($page-1)>0?($page-1):1);
		$pdis= ($page==1)?"disabled":"";
		echo '<li class="btn btn-info page-item page-link pdfpagenofilter'.$pdis.'" id="1">First</li>';
		echo '<li class="btn btn-info page-item page-link pdfpagenofilter'.$pdis.'" id="'.$p.'">Previuos</li>';
		for ($i=1; $i<=$totalPage; $i++){
			$a= ($page==$i)?"active":'';
			if (abs($page-$i) < 6){
				echo '<li class="btn btn-info page-item page-link pdfpagenofilter '.$a.'" id="'.$i.'">'.$i.'</li>';
			}
		}
		$n = (($page+1)>0?($page+1):$totalPage);
		$ndis= ($page==$totalPage)?"disabled":"";
		echo '<li class="btn btn-info page-item page-link pdfpagenofilter'.$ndis.'" id="'.$n.'">Next</li>';
		echo '<li class="btn btn-info page-item page-link pdfpagenofilter'.$ndis.'" id="'.$totalPage.'">Last</li>';
	}else{
		$p = (($page-1)>0?($page-1):1);
		$pdis= ($page==1)?"disabled":"";
		echo '<li class="btn btn-info page-item page-link pdfpagenosh'.$pdis.'" id="1">First</li>';
		echo '<li class="btn btn-info page-item page-link pdfpagenosh'.$pdis.'" id="'.$p.'">Previuos</li>';
		for ($i=1; $i<=$totalPage; $i++){
			$a= ($page==$i)?"active":'';
			if (abs($page-$i) < 6){
		echo '<li class="btn btn-info page-item page-link pdfpagenosh '.$a.'" id="'.$i.'">'.$i.'</li>';
	}
}
$n = (($page+1)>0?($page+1):$totalPage);
$ndis= ($page==$totalPage)?"disabled":"";
echo '<li class="btn btn-info page-item page-link pdfpagenosh'.$ndis.'" id="'.$n.'">Next</li>';
echo '<li class="btn btn-info page-item page-link pdfpagenosh'.$ndis.'" id="'.$totalPage.'">Last</li>';
}
		?>
		</ul>
		</nav>
		<?php
	}
	///pdf page end
//// create page start
	if (isset($_POST['rreadr'])){
		$page = isset($_POST['pageval'])?$_POST['pageval']:0;
		$limit= 5;
		$offset= $page * $limit - $limit;
		$data='';
		$displayquery="SELECT * from `creative` where `active`= '2' order by `id` desc limit $limit offset $offset";
		$result=$conn->rawQuery($displayquery);
		$totalRecord = "select count(*) as total from creative where `active`= '2'";
		$totalRecordResult = $conn->rawQuery($totalRecord);
		$row = $totalRecordResult->fetch_assoc();
		$totalRow = $row['total'];
		$totalPage = ceil($totalRow/$limit);
			for ($i=0; $i<mysqli_num_rows($result); $i++){
			while ($query_row = mysqli_fetch_array($result)){
				$a=$query_row['discriptive'];
				$data.='<ul style="list-style:none" class="bg-white">
				<li><a href="creativefull.php?cre='.$query_row['id'].'"><h3><em><strong>'.$query_row['title'].'</strong></em></h3></a></li>
				<li><small id="helpId" class="form-text text-muted">'.$query_row['uname'].' || '. $query_row['created'].'</small></li>
				<li><h6>'.substr($a,0,400)."<a href='creativefull.php?cre=".$query_row['id']."'>"."[...]</a>".'</h6></li>
				</ul>'; 
			}
		}
		echo $data;
		?><br>
		<nav aria-label="pagination" class="d-flex justify-content-center">
		<ul class="pagination">
		<?php 
		$p = (($page-1)>0?($page-1):1);
		$pdis= ($page==1)?"disabled":"";
		echo '<li class="btn btn-info page-item page-link pageno'.$pdis.'" id="1">First</li>';
		echo '<li class="btn btn-info page-item page-link pageno'.$pdis.'" id="'.$p.'">Previuos</li>';
		for ($i=1; $i<=$totalPage; $i++){
			$a= ($page==$i)?"active":'';
			if (abs($page-$i) < 6){
				echo '<li class="btn btn-info page-item page-link pageno '.$a.' " id="'.$i.'">'.$i.'</li>';
			}
		}
		$n = (($page+1)>0?($page+1):$totalPage);
		$ndis= ($page==$totalPage)?"disabled":"";
		echo '<li class="btn btn-info page-item page-link pageno'.$ndis.'" id="'.$n.'">Next</li>';
		echo '<li class="btn btn-info page-item page-link pageno'.$ndis.'" id="'.$totalPage.'">Last</li>';

		?>
		</ul>
		</nav>
		<?php
		}
		////create page end
		extract($_POST);
if (isset($_POST['title'])){
	$ua="1";
	$uid=Session::getSessionData("bookid");
	$unam=Session::getSessionData("bookuser");
    $query="insert into creative(title, discriptive, uid, uname, active) values('$title','$descr','$uid','$unam','$ua')";
	$conn->rawQuery($query);
	// return $mes="Wait for approve";
	echo "Wait for approve.";
}
/////start about
if (isset($_POST['readcom'])){
$data='';
	$displayquery="SELECT * from comment order by id desc limit 3";
	$result=$conn->rawQuery($displayquery);
		for ($i=0; $i<mysqli_num_rows($result); $i++){
		
		while ($query_row = mysqli_fetch_array($result)){
			$data.=' <ul style="list-style:none;">
			<li style="display:inline;"><strong>'.$query_row['uname']." : ".'</strong></li>
			<li style="display:inline;">'.$query_row['text'].'<br></li></ul>'; 
		}
	}
	echo $data;
	}
if (isset($_POST['text'])){
$i=Session::getSessionData('bookid');
$q=Session::getSessionData('bookuser');
$query="insert into comment(uid,uname,text) values('$i','$q','$text')";
$conn->rawQuery($query);
}
/////start end
// profile
	if (isset($_POST['readprosh'])){
		$data='';
		$t = Session::getSessionData("bookid");
		$sq = "SELECT * FROM share where uid='$t'";
		$share = $conn->rawQuery($sq);
		if ($share->num_rows >= 1) {
	$data.='<form action="" method="post"><table class="table table-striped table-inverse table-danger" border="2" style="width:100%; border: 1px solid tomato;">
	<thead class="thead-inverse table-success">
		<tr>
		  <th>Book Name</th>
		  <th>Book Category</th>
		  <th>Descriptive</th>
		  <th>Book Image</th>
		  <th>Sharing Choice</th>
		  <th>Price</th>
		  <th>Mobile</th>
		  <th>Location</th>
		  <th>Action</th>
		  
		</tr>
		</thead>
		<tbody  class="table-info">';
		for ($i = 0; $i < mysqli_num_rows($share); $i++) {
			while ($query_row = mysqli_fetch_assoc($share)) {
			  $a=$query_row['id'];
			  
				$data.='<tr>
				<td scope="row">'. $query_row['name'].'</td>
				<td>'.$query_row['category'].'</td>
				<td>'.$query_row['descriptive'].'</td>
				<td><img src="uploads/'.$query_row['pimage'].'" width="120px"/></td>
				<td>'.$query_row['choice'].'</td>
				<td>'.$query_row['price'].'</td>
				<td>'.$query_row['mobile'].'</td>
				<td>'.$query_row['location'].'</td>
				<td>&nbsp&nbsp<button class="btn" onclick="delsh('.$query_row['id'].')"><i class="fas fa-trash-alt"></i> </button></td>
			
				</tr>'; 
			}
		}
	$data.='</form> 
	</tbody>
	</table>';
	}
		echo $data;
		}
		if(isset($_POST['userdelsh'])){
			$userid=$_POST['userdelsh'];
			$deletequery="delete from share where id='$userid'";
			$conn->rawQuery($deletequery);
		}
		if (isset($_POST['readprocr'])){
			$data='';
			$oo = Session::getSessionData("bookid");
			$cq = "SELECT * FROM creative where uid='$oo'";
			$creat = $conn->rawQuery($cq);
			if ($creat->num_rows >= 1) {
				for ($i = 0; $i < mysqli_num_rows($creat); $i++) {
					while ($row = mysqli_fetch_assoc($creat)) {
						$a = $row['discriptive'];				  
					$data.='<form action="" method="post">
					<ul style="list-style:none" class="bg-white">
					<li><a href="creativefull.php?cre='.$row['id'].'"><h3><em><strong>'.$row['title'].'</strong></em></h3></a></li>
					<li><small id="helpId" class="form-text text-muted">'.$row['uname'] . " || " . $row['created'].'</small></li>
					<li><h6>'.substr($a, 0, 500) . "&nbsp<a href='creativefull.php?cre=" . $row['id'] . "'>" . "[...]</a>&nbsp".'<button class="btn" onclick="delcr('.$row['id'].')"><i class="fas fa-trash-alt"></i> </button></h6></li>
					</ul>
					</form>'; 
				
				}
			}
		}
			echo $data;
			}
			if(isset($_POST['userdelcr'])){
				$userid=$_POST['userdelcr'];
				$deletequery="delete from creative where id='$userid'";
				$conn->rawQuery($deletequery);
			}
	if(isset($_POST['userdetails'])){
		$i = Session::getSessionData("bookid");
$pq = "SELECT * FROM login where id='$i'";
$co = $conn->rawQuery($pq);
if ($co->num_rows == 1) {
	while ($query_row = mysqli_fetch_assoc($co)) {
		$aup=$query_row;
	}}
	echo json_encode($aup);
	}
	if(isset($_POST['nameup'])){
		$id = Session::getSessionData("bookid");
		$nameup=$_POST['nameup'];
		$mobileup=$_POST['mobileup'];
		$emailup=$_POST['emailup'];
	$query="UPDATE `login` SET `name`='$nameup',`phone`='$mobileup',`email`='$emailup' WHERE `id`='$id'";
	$conn->rawQuery($query);
	}
		if (isset($_POST['approved'])){
		$data='';
		// $oo = "wait";
		// $oo = "0";
		// $cq = "SELECT * FROM creative where active='$oo'";
		$cq = "SELECT * FROM creative order by active";
		$creat = $conn->rawQuery($cq);
		if ($creat->num_rows >= 1) {
			for ($i = 0; $i < mysqli_num_rows($creat); $i++) {
				while ($row = mysqli_fetch_assoc($creat)) {
					$a = $row['discriptive'];				  
				$data.='<form action="" method="post">
				<ul style="list-style:none" class="bg-white">
				<li><a href="creativefull.php?cre='.$row['id'].'"><h3><em><strong>'.$row['title'].'</strong></em></h3></a></li>
				<li><small id="helpId" class="form-text text-muted">'.$row['uname'] . " || " . $row['created'].'</small></li>
				<li><h6>'.substr($a, 0, 500) . "&nbsp<a href='creativefull.php?cre=" . $row['id'] . "'>" . "[...]</a>&nbsp".'<button class="btn" onclick="appacc('.$row['id'].')"><i class="fas fa-thumbs-up"></i></button><button class="btn" onclick="appdel('.$row['id'].')"><i class="fas fa-thumbs-down"></i></button></h6></li>
				</ul>
				</form>'; 
			
			}
		}
	}
		echo $data;
		}
		if(isset($_POST['useracc'])){
			$userid=$_POST['useracc'];
			$upd="2";
			// $deletequery="delete from creative where id='$userid'";
			$deletequery="update creative set `active`='$upd' where id='$userid'";
			$conn->rawQuery($deletequery);
		}
		if(isset($_POST['userdel'])){
			$userid=$_POST['userdel'];
			
			// $deletequery="update creative set `active`='$upd' where id='$userid'";
			$deletequery="delete from creative where id='$userid'";
			$conn->rawQuery($deletequery);
		}


		/////start share comment
	if (isset($_POST['textShare'])){
	$i=Session::getSessionData('bookid');
	$q=Session::getSessionData('bookuser');
	$query="insert into sharecomment(uid,uname,text,commentid) values('$i','$q','$textShare','$textval')";
	$conn->rawQuery($query);
	}
	/////share comment end
	/////pdf comment start
if (isset($_GET['readshowpdf'])){
	$shcom=$_GET['readshowpdf'];
	$data='';
		$displayquery="SELECT * from pdfcomment where commentid='$shcom' order by id desc";
		$result=$conn->rawQuery($displayquery);
			for ($i=0; $i<mysqli_num_rows($result); $i++){
			
			while ($query_row = mysqli_fetch_array($result)){
				$data.=' <ul style="list-style:none;">
				<li style="display:inline;"><strong>'.$query_row['uname']." : ".'</strong></li>
				<li style="display:inline;">'.$query_row['text'].'<br></li></ul>'; 
			}
		}
		echo $data;
		}
	if (isset($_POST['textpdf'])){
		$i=Session::getSessionData('bookid');
		$q=Session::getSessionData('bookuser');
		$query="insert into pdfcomment(uid,uname,text,commentid) values('$i','$q','$textpdf','$textval')";
		$conn->rawQuery($query);
		}
	/////pdf comment end
	//////fram start
	if (isset($_GET['readfram'])){
		$shcom=$_GET['readfram'];
		$data='';
			$displayquery="SELECT * from pdf where id='$shcom'";
			$result=$conn->rawQuery($displayquery);
				for ($i=0; $i<mysqli_num_rows($result); $i++){
				while ($query_row = mysqli_fetch_array($result)){
					$data.='<iframe src="'.$query_row['link'].'" width="100%" height="525px" frameborder="0"></iframe>'; 
				}
			}	
			echo $data;
			}
	////fram end