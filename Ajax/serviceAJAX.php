<?php

require_once "../Models/Connection.php";
require_once("../Models/ServiceModel.php");
require_once("../Controllers/TemplateController.php");

if(isset($_POST['title']) && isset($_POST['image'])){


	$count  = $_POST['count'];
	$title  = $_POST['title'];
	$id 	= $_POST['idservice'];
	$det 	= $_POST['details'];
 if(is_array($det)){
 	
 	$det 		= implode(',', $details);
 }
 		if(isset($_FILES['image']['name'])){
		$target_dir    =  "../Views/dist/img/";
		$image         = basename( $count.$_FILES["image"]["name"]);
		move_uploaded_file( $_FILES['image']['tmp_name'], $target_dir . $image );
		$results = ServiceModel::InsertService($title,$det,$image);
		echo json_encode($results);
	}

}

$results = ServiceModel::ShowServices();

foreach ($results as $result) {
echo '<tr class="text-center">
			<td>'.$result['title'].'</td>
			<td>'.trim(substr($result['details'],0,10)).'</td>
			<td><img src="Views/dist/img/'.$result['image'].'" class="img-fluid rounded-circle serviceimg" width="60px;" ></td>
			<td>
<button type="button" class="btn custom-icon-table-update" data-toggle="modal" data-target="#exampleModal"  onclick="editservice('.$result['idservice'].')"><i class="far fa-edit"></i></button>


			<button type="button" class="btn custom-icon-table-delete" onclick="deleteservice('.$result['idservice'].')"><i class="far fa-times-circle" ></i></button>
			</td>
	   </tr>
';
}


if(isset($_GET['deleteid'])){
	$deleteid = $_GET['deleteid'];
	$results = ServiceModel::DeleteService($deleteid);
}


if(isset($_POST['editserviceid'])){
	
	$editserviceid 		= $_POST['editserviceid'];
	$edittitle			= $_POST['edittitle'];	
	$det2 				= array($_POST['editdetails']); 
 	$de3 				= str_replace(' ', ',', $det2);

 	$editdetails		= implode(',', $de3);

	    if(isset($_FILES["editimage"]['name'])){
	        $image       = $_FILES["editimage"]["name"];
	        $destination = '../Views/dist/img/';
	        $target_path = $destination . basename($image);
	        move_uploaded_file( $_FILES['editimage']['tmp_name'], $target_path);
	         $results = ServiceModel::UpdateService($editserviceid,$edittitle,$editdetails,$image);
	    }else{
  			$results = ServiceModel::UpdateServiceWithoutImage($editserviceid,$edittitle,$editdetails);
	    }
	    echo json_encode($results);

}
?>