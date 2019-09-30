<?php
require_once ("../Models/Connection.php");
require_once("../Models/HomeModel.php");
if(isset($_POST['quote'])){
	session_start();
	$quote  = $_POST['quote'];
	$iduser = $_SESSION['iduser'];
	var_dump($iduser);
	if(isset($_FILES['image']['name'])){
		$target_dir = "../Views/dist/img/";
		$image         = basename( $_FILES["image"]["name"] );
		$imageFileType = pathinfo( $target_dir . $image, PATHINFO_EXTENSION );
		move_uploaded_file( $_FILES['image']['tmp_name'], $target_dir . $image );
		$results = HomeModel::InsertHome($quote,$image,$iduser);
		echo json_encode($results);
	}
}		

$rez = new HomeModel();
$results  = HomeModel::ShowHome();
foreach ($results as $result){
	if($rez->CountHome()<=1){
		echo '<div class="col-md-6">
		<div class="card home-card">
		<div class="card-body">

		<div class="col-md-6 mt-3">
		<button type="button" class="close custom-button-close" aria-label="Close" onclick="deletehome()">
		<span aria-hidden="true">&times;</span>
		</button>
		<div class="">
		<img src="Views/dist/img/'.$result['image'].'" alt="'.$result['image'].'" width="380px;"height="250px;">
		</div>
		<div class="card home-card home-card-top">
		<div class="navbar-collapse">
		<ul class="list-group">
		<a class="nav-link img-card-home mt-1" style="margin-bottom:-20px">
		<img src="Views/dist/img/'.$result['user_image'].'" class="img-fluid rounded-circle" alt="profil">
		<span>'.$result['name'].' '.$result['surname'].'</span>
		</a>
		<button class="btn custom-btn-use btn-sm text-center mr-2" type="button" onclick="usethis('.$result['idhome'].')">Use</button>
		<label class="ml-3" style="color: #2076B7;margin-bottom:;"><b>Quote</b></label>
		<p class="ml-3" style="font-size: 12px">'.$result['quote'].'</p>

		</ul>
		</div>
		</div>
		</div>

		</div>
		</div>
		</div>	';
	}else{
		echo '<div class="col-md-6">
		<div class="card home-card">
		<div class="card-body">

		<div class="col-md-6 mt-3">
		<button type="button" class="close custom-button-close" aria-label="Close" onclick="deletequote('.$result['idhome'].')">
		<span aria-hidden="true">&times;</span>
		</button>
		<div class="">
		<img src="Views/dist/img/'.$result['image'].'" alt="'.$result['image'].'" width="380px;"height="250px;">
		</div>
		<div class="card home-card home-card-top">
		<div class="navbar-collapse">
		<ul class="list-group">
		<a class="nav-link img-card-home mt-1" style="margin-bottom:-20px">
		<img src="Views/dist/img/'.$result['user_image'].'" class="img-fluid rounded-circle" alt="profil">
		<span>'.$result['name'].' '.$result['surname'].'</span>
		</a>
		<button class="btn custom-btn-use btn-sm text-center mr-2" type="button" onclick="usethis('.$result['idhome'].')">Use</button>
		<label class="ml-3" style="color: #2076B7;margin-bottom:;"><b>Quote</b></label>
		<p class="ml-3" style="font-size: 12px">'.$result['quote'].'</p>

		</ul>
		</div>
		</div>
		</div>

		</div>
		</div>
		</div>	';
	}
}
if(isset($_GET['deleteidquote'])){
	$deleteidquote = $_GET['deleteidquote'];
	$results = HomeModel::DeleteQuote($deleteidquote);
}
if(isset($_POST['idhome'])){
	$idhome = $_POST['idhome'];
	echo "<script>alert('$idhome')</script>";
	$results = HomeModel::UpdateHome($idhome);
	echo json_encode($results);
}
?>
<style>
	.custom-button-close{
		position: absolute;
		z-index: 1;
		margin-top: 23px;
		margin-left: 62px;
		margin-left: 34px;
	}
</style>