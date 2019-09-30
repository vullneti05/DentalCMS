<?php

class ClientsModel{
	public function InsertClients($name,$surname,$title,$text,$image){
	$results = Connection::dbconnect()->prepare("INSERT INTO clients(name,surname,title,tekst,image) VALUES ('$name' ,'$surname','$title','$text','$image')");
		$results->execute(array(
			'name' => $name,
			'surname' => $surname,
			'title' => $title,
			'text' => $text,
			'image' => $image,
		));
		return $results;
	}
	public function ShowClients(){
		$results = Connection::dbconnect()->prepare("SELECT * from clients ORDER BY idclients");
		$results->execute();
		return $results->fetchAll();
	}
		public function CountClients(){
		$results = Connection::dbconnect()->prepare("SELECT COUNT(idclients) AS 'count' FROM clients");
		$results->execute();
	
		return $results->fetchColumn();

	}
		public function ShowClients2(){
		$results = Connection::dbconnect()->prepare("SELECT * FROM clients ORDER BY idclients DESC LIMIT 6");
		$results->execute();
		return $results->fetchAll();
	}
	public function DeleteClientsid($idclients){
		$results = 	Connection::dbconnect()->prepare("DELETE FROM clients WHERE idclients = '$idclients'");
		if($results <1){
			echo " you cant delete";
		}else{
	$results->execute(array('idclients'=>$idclients));
		}
	
	}

	public function EditClients($editclientsid){
		$results = Connection::dbconnect()->prepare("SELECT * FROM clients WHERE idclients = '$editclientsid'");
			  $results->execute(array('idclients'=>$editclientsid));
			  return $results->fetch();
	}

	public function UpdateClients($editidclients,$editname,$editsurname,$edittitle,$edittext,$image){
		$results = Connection::dbconnect()->prepare("UPDATE clients SET name = '$editname', surname = '$editsurname' , title = '$edittitle' , tekst= '$edittext' , image = '$image' WHERE idclients = '$editidclients'");
		$results->execute();
		return $results;
	}
	public function UpdateClientsWithoutImage($editidclients,$editname,$editsurname,$edittitle,$edittext){
		$results = Connection::dbconnect()->prepare("UPDATE clients SET name = '$editname', surname = '$editsurname' , title = '$edittitle' , tekst= '$edittext'  WHERE idclients = '$editidclients'");
		$results->execute();
		return $results;
	}

	public function InsertContact($contactname,$email,$textarea){

		$results = Connection::dbconnect()->prepare("INSERT into messages_tbl(name,email,description) VALUES ('$contactname','$email','$textarea')");

		$results->execute(array(
		'name' => $contactname,
		'email' => $email,
		'description' => $textarea
	));


		return $results;
	}
	public function ShowMessages(){
		$results = Connection::dbconnect()->prepare("SELECT * FROM messages_tbl");
		$results->execute();
		return $results->fetchAll();
	}
	public function DeleteClientsMessage($idmesazhi){
		$results = Connection::dbconnect()->prepare("DELETE FROM messages_tbl WHERE messagesid='$idmesazhi'");
		$results->execute(array('messagesid'=>$idmesazhi));

	}
	public function InsertSubscribe($subscribe){
		$results = Connection::dbconnect()->prepare("INSERT into subscribes(subscribe) VALUES ('$subscribe')");

		$results->bindParam('subscribe',$subscribe);

		$results->execute();

		return $results;	
	}
	public function ShowSubscribe(){
		$results = Connection::dbconnect()->prepare("SELECT * FROM subscribes");
		$results->execute();
		return $results->fetchAll();
	}
	public function InsertAppointments($values,$aname,$aemail,$anumber,$adate,$atime){

		$results = Connection::dbconnect()->prepare("INSERT into appointments_tbl(reason,aname,aemail,anumber,adate,atime) VALUES ('$values','$aname','$aemail','$anumber','$adate','$atime')");

		$results->bindParam('values' ,$values);
		$results->bindParam('aname'	 ,$aname);
		$results->bindParam('aemail' ,$aemail);
		$results->bindParam('anumber',$anumber);
		$results->bindParam('adate'  ,$adate);
		$results->bindParam('atime'  ,$atime);

		$results->execute();

		return $results;
	}

	public function showappointments(){
		$results = Connection::dbconnect()->prepare("SELECT * FROM appointments_tbl");
		$results->execute();
		return $results->fetchAll();
	}

		public function deleteappointment($appointmentsid){
		$results = Connection::dbconnect()->prepare("DELETE FROM appointments_tbl WHERE appointmentsid = '$appointmentsid'");
		$results->execute(array('appointmentsid'=>$appointmentsid));
		return $results;
	}

		public function appappointment($aproveappointment){
					$results2 = Connection::dbconnect()->prepare("UPDATE appointments_tbl SET status='active' WHERE appointmentsid='$aproveappointment'");
		$results2->execute();
		return $results2;
		}
}

?>