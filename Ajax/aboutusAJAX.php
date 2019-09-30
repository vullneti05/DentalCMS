<?php

require_once "../Models/Connection.php";
require_once("../Models/AboutModel.php");
require_once("../Controllers/TemplateController.php");

if(isset($_POST['name'])){

 $name  		= $_POST['name'];
 $surname  		= $_POST['surname'];
 $description  	= $_POST['description'];
 $title			= $_POST['title'];

	if(isset($_FILES['image']['name'])){
		$target_dir = "../Views/dist/img/";
		$image         = basename( $_FILES["image"]["name"]  );
		$imageFileType = pathinfo( $target_dir . $image, PATHINFO_EXTENSION );
		move_uploaded_file( $_FILES['image']['tmp_name'], $target_dir . $image );
	}
		$results = AboutModel::InsertAbout($name,$surname,$description,$title,$image);
		echo json_encode($results);

}



$results = AboutModel::SelectAbout();

foreach($results as $result){
	echo '						<tr class="text-center">
									<td>'.$result['name'].'</td>
									<td>'.$result['surname'].'</td>
									<td>'.$result['title'].'</td>
									<td>'.substr($result['description'],0,10).'
									<button type="button" class="custom-button-table" data-toggle="popover"  data-trigger="focus" title="Description" data-content="'.$result['description'].'" onmouseover="test()"  >
								    <i class="fas fa-ellipsis-h ml-1 mt-1" ></i>
									</button>
									</td>
									<td><img src="Views/dist/img/'.$result['image'].'" class="img-fluid"></td>
									<td>
										<button type="button" class="btn custom-icon-table-update" data-toggle="modal" data-target="#exampleModalScrollable"><i class="far fa-edit" onclick="editabout('.$result['idaboutus'].')"></i></button>
										<button type="button" class="btn custom-icon-table-delete" onclick="deleteabout('.$result['idaboutus'].')"><i class="far fa-times-circle"></i></button>
									</td>
								</tr>';
}


if(isset($_GET['deleteaboutid'])){
	$deleteid = $_GET['deleteaboutid'];
	$results = AboutModel::DeleteAboutus($deleteid);
}


if(isset($_POST['aboutid'])){

$aboutidupdate 	=	$_POST['aboutid'];
$editname 		=	$_POST['editname'];
$edittitle 		=	$_POST['edittitle'];
$editsurname 	=	$_POST['editsurname'];
$editdescription=	$_POST['editdescription'];
	    if(isset($_FILES["editimage"]['name'])){
	        $image       = $_FILES["editimage"]["name"];
	        $destination = '../Views/dist/img/';
	        $target_path = $destination . basename( $image );
	        move_uploaded_file( $_FILES['editimage']['tmp_name'], $target_path);
	         $results = AboutModel::UpdateAbout($aboutidupdate,$editname,$editdescription,$edittitle,$editsurname,$image);
	    }else{
  			$results = AboutModel::UpdateAboutWithoutImage($aboutidupdate,$editname,$editdescription,$edittitle,$editsurname);
	    }
	 
	    echo json_encode($results);
}
?>