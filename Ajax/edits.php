<?php

require_once "../Models/Connection.php";
require_once("../Models/ServiceModel.php");
require_once("../Models/AboutModel.php");
require_once("../Models/UsersModel.php");
require_once("../Models/ClientsModel.php");
require_once("../Controllers/TemplateController.php");

if(isset($_POST['editservice'])){
		$editservice = $_POST['editservice'];
	$results = ServiceModel::EditService($editservice);
	echo json_encode($results);
}
if(isset($_POST['editabout'])){
			$editaboutid = $_POST['editabout'];
	$results = AboutModel::EditAbout($editaboutid);
	echo json_encode($results);
}
if(isset($_POST['editidusers'])){
	$editidusers = $_POST['editidusers'];
	$results = UsersModel::EditUsers($editidusers);
	echo json_encode($results);
}
if(isset($_POST['editclientsid'])){
	$editclientsid = $_POST['editclientsid'];
	$results = ClientsModel::EditClients($editclientsid);
	echo json_encode($results);
}

?>