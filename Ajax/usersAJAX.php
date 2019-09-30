<?php
require_once "../Models/Connection.php";
require_once("../Models/usersModel.php");
require_once("../Controllers/TemplateController.php");


if(isset($_POST['name'])){

 $name  	  			= $_POST['name'];
 $surname  	  			= $_POST['surname'];
 $attributes    		= $_POST['selected'];
 $count 				= $_POST['count'];
 $fjalkalimikryptuar 	= base64_encode($_POST["password"]);
 $password 		 		= $fjalkalimikryptuar;

 if(is_array($attributes)){
 	$attributes 		= implode(',', $_POST['selected']);
 }
 
 if(isset($_FILES['image']['name'])){
		$target_dir = "../Views/dist/img/";
		$upload_file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		$image         = basename( $count.$_FILES["image"]["name"] );
	
		move_uploaded_file( $_FILES['image']['tmp_name'], $target_dir . $image );
	$results = UsersModel::InsertUsers($name,$surname,$password,$attributes,$image);
	}else{
		$results = UsersModel::InsertUsersWithoutImage($name,$surname,$attributes);
	}

		echo json_encode($results);
}
$rez  = new UsersModel;
$rez->CountUsers();
$results  = UsersModel::showusers();

foreach($results as $result){

echo '<tr class="text-center">
		<td>'.$result['name'].' '.$result['surname'].'</td>
		<td>********</td>
<td>'.substr($result['attributes'],0,23)."...".'

</td>
		<td><img src="Views/dist/img/'.$result['user_image'].'" class="img-fluid"</td>
		<td>';
	if($rez->CountUsers()<=1){
			echo '<button type="button" class="btn custom-icon-table-delete" onclick="alertdelete()"><i class="far fa-times-circle"></i></button>
<button type="button" class="btn custom-icon-table-update" data-toggle="modal" data-target="#exampleModalLong" onclick="editusers('.$result['iduser'].')" ><i class="far fa-edit"></i></button>

			';
			}else{
			echo	'

			<button type="button" class="btn custom-icon-table-update" data-toggle="modal" data-target="#exampleModalLong" onclick="editusers('.$result['iduser'].')" ><i class="far fa-edit"></i></button>
			<button type="button" class="btn custom-icon-table-delete" onclick="deleteuser('.$result['iduser'].')"><i class="far fa-times-circle"></i></button>';

		}
			echo '</td>
					</tr>';
	

}
if(isset($_GET['iduser'])){
	$deleteuserid = $_GET['iduser'];
	$results = UsersModel::DeleteUserid($deleteuserid);
}
if(isset($_POST['editiduser'])){

	$editidusers 	= $_POST['editiduser'];
	$editname		= $_POST['editname'];	
	$editsurname	= $_POST['editsurname'];
	$editfjalkalimikryptuar = base64_encode($_POST["editpassword"]);
	$editpassword	= $editfjalkalimikryptuar;	
	$editattributes	= $_POST['selected2'];	


		if(is_array($editattributes)){
			
			$editattributes = implode(',',$_POST["selected2"]);
			
		}

	    if(isset($_FILES["editimage"]['name'])){
	        $image       = $_FILES["editimage"]["name"];
	        $destination = '../Views/dist/img/';
	        $target_path = $destination . basename( $image );
	        move_uploaded_file( $_FILES['editimage']['tmp_name'], $target_path);
	         $results = UsersModel::UpdateUsers($editidusers,$editname,$editsurname,$editpassword,$editattributes,$image);
	    }else{
  			$results = UsersModel::UpdateUsersWithoutImage($editidusers,$editname,$editsurname,$editattributes,$editpassword);
	    }
	 
	    echo json_encode($results);
}


if(isset($_POST['idaccount'])){

		$idaccount			= $_POST['idaccount'];
		$name				= $_POST['name'];
		$surname			= $_POST['surname'];
		$fjalkalimikryptuar = base64_encode($_POST["password"]);
		$password 			= $fjalkalimikryptuar;
		$selectedacc		 = $_POST['selectedacc'];	



	if(is_array($selectedacc)){
			
			$selectedacc = implode(' ,' , $_POST["selectedacc"]);
			
		}
	    if(isset($_FILES["eimage"]['name'])){
	        $image       = $_FILES["eimage"]["name"];
	        $destination = '../Views/dist/img/';
	        $target_path = $destination . basename( $image );
	        move_uploaded_file( $_FILES['eimage']['tmp_name'], $target_path);
	         $results = UsersModel::UpdateAccount($idaccount,$name,$surname,$password,$selectedacc,$image);
	    }else{
  			$results = UsersModel::UpdateAccountWithoutImage($idaccount,$name,$surname,$password,$selectedacc);
	    }
	 
	    echo json_encode($results);
}




?>

<script>
	function alertdelete(){
		$("#errordelete").removeClass("d-none");
	}

</script>














