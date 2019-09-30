<?php


/*======================================

Thirrja e Kontrollerave (interaktivi me Klienta)

========================================*/
require_once "Controllers/TemplateController.php";


/*======================================

Thirrja e Modelave ( interaktivi me Databaze )

========================================*/
require_once "Models/Connection.php";

require_once "Models/ServiceModel.php";
require_once "Models/HomeModel.php";
require_once "Models/AboutModel.php";
require_once "Models/UsersModel.php";
require_once "Models/Contactmodel.php";
require_once "Models/ClientsModel.php";


$Template = new TemplateController();

$Template->ViewTemplate();

?>