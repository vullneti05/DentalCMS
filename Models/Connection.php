<?php
class Connection{
	static public function dbconnect(){
		$pdo = new PDO("mysql:host=localhost;dbname=dentalCMS","root","");

		$pdo->exec("set names utf8");

		return $pdo;
	}
}
?>