<?php 
class ContactModel{


public function showcontact(){
	$results = Connection::dbconnect()->prepare("SELECT * FROM contacts");
	$results->execute();
	return $results->fetchAll();
}
public function showSocialMedia(){
	$results = Connection::dbconnect()->prepare("SELECT * FROM social_medias_tbl");
	$results->execute();
	return $results->fetchAll();
}

public function UpdateContact($location,$phonenumber,$email){
	$results = Connection::dbconnect()->prepare("UPDATE contacts SET location = '$location', phonenumber = '$phonenumber' , email = '$email' WHERE idcontact = 1");
		$results->execute();
		return $results;
}
public function UpdateSocialMedia($facebook,$instagram,$twitter){
	$results = Connection::dbconnect()->prepare("UPDATE social_medias_tbl SET facebook = '$facebook', instagram = '$instagram', twitter ='$twitter' WHERE socialmediaid = 1");
		$results->execute();
		return $results;
}
}


?>