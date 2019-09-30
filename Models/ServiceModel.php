<?php
class ServiceModel{
	public function ShowServices(){
		$results = Connection::dbconnect()->prepare("SELECT * FROM service ORDER by idservice");
		$results->execute();
		return $results->fetchAll();
}
	public function InsertService($title,$det,$image){
		

	$results = Connection::dbconnect()->prepare("INSERT INTO service(title , details,image) VALUES ('$title' ,'$det','$image')");
	$results->execute(array(
		'title' => $title,		
		'details' => $det,
		'image' => $image,

	));
	return $results;

	}



public function DeleteService($deleteid){

	$results = 	Connection::dbconnect()->prepare("DELETE FROM service WHERE idservice = '$deleteid'");

	$results->execute(array('idservice'=>$deleteid));


}

public function EditService($editservice){
	  $results = Connection::dbconnect()->prepare("SELECT * FROM service WHERE idservice = '$editservice'");
  $results->execute(array('idservice'=>$editservice));
  return $results->fetch();


}


public function UpdateService($editserviceid,$edittitle,$editdetails,$image){

$results = Connection::dbconnect()->prepare("UPDATE service SET title = '$edittitle', details = '$editdetails' , image = '$image' WHERE idservice = '$editserviceid'");
		$results->execute();
		return $results;


}
public function UpdateServiceWithoutImage($editserviceid,$edittitle,$editdetails){
	$results = Connection::dbconnect()->prepare("UPDATE service SET title = '$edittitle', details = '$editdetails'  WHERE idservice = '$editserviceid'");
		$results->execute();
		return $results;
}




}




?>