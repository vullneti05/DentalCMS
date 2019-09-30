<?php
require_once "../Models/Connection.php";
require_once("../Models/ClientsModel.php");
require_once("../Controllers/TemplateController.php");


if(isset($_POST['name'])){
	
$name 		=   $_POST['name'];
$surname 	=   $_POST['surname'];
$title  	= 	$_POST['title'];
$text  		= 	$_POST['text'];

		if(isset($_FILES['image']['name'])){
		$target_dir = "../Views/dist/img/";
		$image         = basename( $_FILES["image"]["name"] );
		$imageFileType = pathinfo( $target_dir . $image, PATHINFO_EXTENSION );
		move_uploaded_file( $_FILES['image']['tmp_name'], $target_dir . $image );
		$results = ClientsModel::InsertClients($name,$surname,$title,$text,$image);
	}else{
		$results = ClientsModel::InsertClientsWithoutImage($name,$surname,$title,$text);
	}
		echo json_encode($results);

}

$rez  = new ClientsModel();

$results = ClientsModel::ShowClients();

foreach($results as $result){
	echo '<tr class="text-center">

			<td>'.$result['name'].''.$result['surname'].'</td>
			<td>'.$result['title'].'</td>
			<td><img src="Views/dist/img/'.$result['image'].'" class="img-fluid" width="100px"></td>
			<td>'.substr($result['tekst'],0,10).'
				<button type="button" class="custom-button-table" data-toggle="popover"  data-trigger="focus" title="Text" data-content="'.$result['tekst'].'" onmouseover="test()"  ><i class="fas fa-ellipsis-h ml-1 mt-1" ></i></button>
			</td>

			<td>
				<button type="button" class="btn custom-icon-table-update"><i class="far fa-edit" onclick="editclients('.$result['idclients'].')" data-toggle="modal" data-target="#exampleModalLong"></i></button>
			';

			if($rez->CountClients()<2){
			echo '<button type="button" class="btn custom-icon-table-delete" onclick="alertdelete()"><i class="far fa-times-circle"></i></button>';
			}else{

			echo '
				<button type="button" class="btn custom-icon-table-delete" onclick="deleteclients('.$result['idclients'].')"><i class="far fa-times-circle"></i></button>

			</td>
		  </tr> ';
}
	}
if(isset($_GET['idclients'])){
	$idclients = $_GET['idclients'];

	$results = ClientsModel::DeleteClientsid($idclients);



}


if(isset($_POST['editname'])){

$editidclients	=	$_POST['idclients'];
$editname		=	$_POST['editname'];
$editsurname	=	$_POST['editsurname'];
$edittitle		=	$_POST['edittitle'];
$edittext		=	$_POST['edittext'];

	    if(isset($_FILES["editimage"]['name'])){
	        $image       = $_FILES["editimage"]["name"];
	        $destination = '../Views/dist/img/';
	        $target_path = $destination . basename( $image );
	        move_uploaded_file( $_FILES['editimage']['tmp_name'], $target_path);
	         $results = ClientsModel::UpdateClients($editidclients,$editname,$editsurname,$edittitle,$edittext,$image);
	    }else{
  			$results = ClientsModel::UpdateClientsWithoutImage($editidclients,$editname,$editsurname,$edittitle,$edittext);
	    }
	 
	    echo json_encode($results);
}



//FRONT SENDING MESSAGES FROM CLIENTS 

if(isset($_POST['contactname'])){

$contactname	 = $_POST['contactname'];

$email		  	 = $_POST['email'];

$textarea		 = $_POST['textarea'];



$results = ClientsModel::InsertContact($contactname,$email,$textarea);

echo json_encode($results);

}

if(isset($_GET['idmesazhi'])){

	$idmesazhi = $_GET['idmesazhi'];

	$results = ClientsModel::DeleteClientsMessage($idmesazhi);

}	

//SUBSCRIBE SENDING EMAIL FROM FRONT CLIENTS

if(isset($_POST['subscribe'])){

	$subscribe = $_POST['subscribe'];
	$results = ClientsModel::InsertSubscribe($subscribe);
	echo json_encode($results);
	
}

if(isset($_POST['aname'])){

	$values		= $_POST['values'];
	$aname		= $_POST['aname'];
	$aemail		= $_POST['aemail'];
	$anumber	= $_POST['anumber'];
	$adate		= $_POST['adate'];
	$atime		= $_POST['atime'];

	$results = ClientsModel::InsertAppointments($values,$aname,$aemail,$anumber,$adate,$atime);

	echo json_encode($results);
}


?>