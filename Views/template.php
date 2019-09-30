<?php

if(isset($_GET['route'])){
  if($_GET['route'] == "homepage" ||
     $_GET['route'] == "login" ||
     $_GET['route'] == "logout"){
    include("Views/includes/frontheader.php");
      include("modules/".$_GET['route'].".php");
    include("Views/includes/frontfooter.php");
   }else if($_GET['route'] == "dashboard"       || 
         $_GET['route'] == "aboutus"            ||
         $_GET['route'] == "appointments"       ||
         $_GET['route'] == "clients"            ||
         $_GET['route'] == "contact"            ||
         $_GET['route'] == "home"               ||
         $_GET['route'] == "service"            ||
         $_GET['route'] == "users"              ||
         $_GET['route'] == "my-account"         ||
         $_GET['route'] == "messages"
      ){
    session_start();
 
if(isset($_SESSION['user']) && $_SESSION['user']=="kaqasje"){

        include("Views/includes/header.php");
         include("modules/dashboard/".$_GET['route'].".php");
         include("Views/includes/footer.php");
}   else{
     include("modules/login.php"); 
} 
}else{
   include("modules/dashboard/404.php"); 
}
}
?>

