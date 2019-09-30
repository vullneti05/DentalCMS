<?php
class HomeModel{

	public function InsertHome($quote,$image,$iduser){

	$results = Connection::dbconnect()->prepare("INSERT INTO home(quote , image , iduser) VALUES ('$quote','$image','$iduser')");
	$results->execute(array(
		'quote' => $quote,
		'image' => $image,
		'iduser' => $iduser
	));
	return $results;
	}

public function ShowHome(){
  $results = Connection::dbconnect()->prepare("SELECT * FROM home h , users u WHERE h.iduser = u.iduser");
  $results->execute();
  return $results->fetchAll();
}

public function ShowHome2(){
  $results = Connection::dbconnect()->prepare("SELECT * FROM home WHERE status = 'active' ORDER BY permirsimi DESC LIMIT 1");
  $results->execute();
  return $results->fetchAll();
}
public function DeleteQuote($deleteidquote){
	     $results = Connection::dbconnect()->prepare("DELETE FROM home WHERE idhome = '$deleteidquote'");
    $results->execute(array('idhome'=>$deleteidquote));
}
public function Search($search){
$statement = Connection::dbconnect()->prepare("SELECT * FROM clients WHERE name LIKE '%".$search."%'");
$statement->bindValue(':name', $search);
 
$statement->execute();
 
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
return $results;
}
public function UpdateHome($idhome){
	$results = Connection::dbconnect()->prepare("UPDATE home SET status = 'active' , permirsimi = CURRENT_TIMESTAMP WHERE idhome = '$idhome' ");
	$results->execute();
	return $results;
}
			public function CountHome(){
		$results = Connection::dbconnect()->prepare("SELECT COUNT(idhome) AS 'count' FROM home");
		$results->execute();
		return $results->fetchColumn();

	}
}

?>