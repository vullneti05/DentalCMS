<?php 
class UsersModel{
	public function InsertUsers($name,$surname,$password,$attributes,$image){

		$results = Connection::dbconnect()->prepare("INSERT INTO users(name,surname,password,attributes,user_image) VALUES ('$name' ,'$surname','$password','$attributes','$image')");
		$results->execute(array(
			'name' => $name,
			'surname' => $surname,
			'password' => $password,
			'attributes' => $attributes,
			'user_image' => $image,
		));
		return $results;
	}
	public function InsertUsersWithoutImage($name,$surname,$attributes){
			$results = Connection::dbconnect()->prepare("INSERT INTO users(name,surname,attributes) VALUES ('$name' ,'$surname','$attributes')");
		$results->execute(array(
			'name' => $name,
			'surname' => $surname,
			'attributes' => $attributes,
		));
		return $results;
	}
	public function showusers(){

		$results = Connection::dbconnect()->prepare("SELECT * FROM users");

		$results->execute();


		return $results->fetchAll();
	}
			public function CountUsers(){
		$results = Connection::dbconnect()->prepare("SELECT COUNT(iduser) AS 'count' FROM users");
		$results->execute();
		return $results->fetchColumn();

	}
	public function DeleteUserid($deleteuserid){
		$results = 	Connection::dbconnect()->prepare("DELETE FROM users WHERE iduser = '$deleteuserid'");

		$results->execute(array('iduser'=>$deleteuserid));
	}
	public function CompareData($loginname,$loginpassword){
		$results = Connection::dbconnect()->prepare("SELECT * FROM users WHERE name = '$loginname' AND password = '$loginpassword'");
			$results->bindParam(":name",$loginname, PDO::PARAM_STR);
			$results->bindParam(":password",$loginpassword, PDO::PARAM_STR);
			$results->execute();
			return $results;
	}
	public function EditUsers($editidusers){
				$results = Connection::dbconnect()->prepare("SELECT * FROM users WHERE iduser = '$editidusers'");
			  $results->execute(array('iduser'=>$editidusers));
			  return $results->fetch();
	}
	public function UpdateUsers($editidusers,$editname,$editsurname,$editpassword,$editattributes,$image){
	$results = Connection::dbconnect()->prepare("UPDATE users SET name = '$editname', surname = '$editsurname' , password = '$editpassword' , attributes = '$editattributes' , user_image = '$image' WHERE iduser = '$editidusers'");
		$results->execute();
		return $results;
	}

  	public function	UpdateUsersWithoutImage($editidusers,$editname,$editsurname,$editattributes,$editpassword){
  	$results = Connection::dbconnect()->prepare("UPDATE users SET name = '$editname', surname = '$editsurname' , password = '$editpassword' , attributes = '$editattributes' WHERE iduser = '$editidusers'");
		$results->execute();
		return $results;
	}

public function showtheuser(){
	$id = $_SESSION['iduser'];
	$results = Connection::dbconnect()->prepare("SELECT * FROM users WHERE iduser = '$id'");
			$results->bindParam(":iduser",$id);
			$results->execute();
			return $results->fetchAll();
}
public function UpdateAccount($idaccount,$name,$surname,$password,$selectedacc,$image){
	$results = Connection::dbconnect()->prepare("UPDATE users SET name = '$name', surname = '$surname' , password = '$password' , attributes = '$selectedacc' , user_image= '$image' WHERE iduser = '$idaccount'");
		$results->execute();
		return $results;
}
public function UpdateAccountWithoutImage($idaccount,$name,$surname,$password,$selectedacc){
	$results = Connection::dbconnect()->prepare("UPDATE users SET name = '$name', surname = '$surname' , password = '$password' , attributes = '$selectedacc' WHERE iduser = '$idaccount'");
		$results->execute();
		return $results;
}

}
?>