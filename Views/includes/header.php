
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
    <link href="Views/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Views/dist/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="Views/dist/css/jquery.dataTables.min.css">
    <link href="Views/dist/css/main.css" rel="stylesheet">
    <link href="Views/dist/css/responsive.css" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,600,700&display=swap" rel="stylesheet">
    <script src="Views/dist/js/jquery-3.3.1.js"></script>
    <script src = "Views/dist/js/jquery.dataTables.min.js"></script>
    <script src = "Views/dist/js/dataTables.bootstrap4.min.js"></script>
  </head>
  <div class="d-flex" id="wrapper">
    <?php include("sidebar.php")?>
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-light bg-light border-bottom">
        <div class="collapse navbar-collapse custom-navbar-dorp" id="myNavbar">
          <i class="fas fa-search active" aria-hidden="true"></i>
          <form action="dashboard" method="POST">
          <input class="form-control form-control-sm ml-3 w-75 custom-search-navbar bg-transparent" type="text" placeholder="search" id="search" name="search" aria-label="Search">
        </form>
          <ul class="list-group ml-auto mt-lg-0 mt-sm-0">
            <a class="nav-link img-navbar">
              <img src="Views/dist/img/<?php echo $_SESSION['user_image'] ?>" class="img-fluid rounded-circle mb-1" alt="profil">
             <?php echo $_SESSION['name']." ".$_SESSION['surname'];?>
            </a>
          </ul>
          <div class="dropdown">
            <button class="btn custom-myaccount-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu custom-myaccount-dropdown" aria-labelledby="dropdownMenuButton">
              <a class="custom-navbar-logout ml-2 d-flex mb-2" href="my-account">My Account</a>
              <a class="custom-navbar-logout ml-2" href="logout">Log out</a>
            </div>
          </div>
        </div>
        <ul class="list-group ml-auto mt-2 mt-lg-0 mt-sm-0 custom-dropdown float-right d-none">
          <li class="list-group dropdown c-d">
            <a class="la nav-link dropdown-toggle mr-1" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
              <span class="navbar-toggler-icon"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <i class="fas fa-search custom-responsive-icon active" aria-hidden="true"></i>
              <input class="form-control form-control-sm ml-3 w-75 custom-search-navbar bg-transparent" type="text" placeholder="Search" aria-label="Search">
              <ul class="list-group ml-auto mt-lg-0 mt-sm-0">
                <a class="nav-link img-navbar">
                  <img src="Views/dist/img/NoPath - Copy (29).png" class="img-fluid rounded-circle mb-1 custom-responsive-img" alt="profil">
                  <?php echo $_SESSION['name']." ".$_SESSION['surname'];?>
                </a>
                <a class="nav-link d-flex custom-responsive-myaccount" href="my-account"><i class="fas fa-user-circle custom-responsive-icon-account"></i>My Account</a>
              </ul>
              <a class="custom-navbar-logout mb-1" href="logout">Log out</a>
            </div>
          </li>
        </ul>
      </nav>