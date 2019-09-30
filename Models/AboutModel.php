<?php
class AboutModel{
	public function InsertAbout($name,$surname,$description,$title,$image){


		$results = Connection::dbconnect()->prepare("INSERT INTO aboutus(name,surname,description,title,image) VALUES ('$name' ,'$surname', '$description','$title','$image')");
		$results->execute(array(
			'name' 		  => $name,
			'surname' 	  => $surname,
			'description' => $description,
			'title' 	  => $title,
			'image' 	  => $image
		));
		return $results;

	}

	public function SelectAbout(){
		$results = Connection::dbconnect()->prepare("SELECT * FROM aboutus");
		$results->execute();
		return $results->fetchAll();
	}
	public function SelectAbout2(){
		$results = Connection::dbconnect()->prepare("SELECT * FROM aboutus ORDER BY idaboutus DESC LIMIT 6");
		$results->execute();
		return $results->fetchAll();
	}
	// public function CountAbout(){
	// 	$results = Connection::dbconnect()->prepare("SELECT count(*) FROM aboutus ORDER by idaboutus");
	// 	$results->execute();
	
	// 	return $results->fetchColumn();

	// }
	public function DeleteAboutus($deleteid){
			$results = 	Connection::dbconnect()->prepare("DELETE FROM aboutus WHERE idaboutus = '$deleteid'");

	$results->execute(array('idaboutus'=>$deleteid));

	}
	public function EditAbout($editaboutid){
			  $results = Connection::dbconnect()->prepare("SELECT * FROM aboutus WHERE idaboutus = '$editaboutid'");
  $results->execute(array('idaboutus'=>$editaboutid));
  return $results->fetch();

	}
public function UpdateAbout($aboutidupdate,$editname,$editdescription,$editsurname,$edittitle,$image){

	$results = Connection::dbconnect()->prepare("UPDATE aboutus SET name = '$editname', description = '$editdescription' ,surname = '$editsurname' , title = '$edittitle' , image= '$image' WHERE idaboutus = '$aboutidupdate'");
		$results->execute();
		return $results;


}
public function UpdateAboutWithoutImage($aboutidupdate,$editname,$editdescription,$editsurname,$edittitle){
	$results = Connection::dbconnect()->prepare("UPDATE aboutus SET name = '$editname', description = '$editdescription' , surname = '$editsurname' , title = '$edittitle' WHERE idaboutus = '$aboutidupdate'");
		$results->execute();
		return $results;
}


}
?>