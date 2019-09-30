<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
	<script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
	<link href="Views/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="Views/dist/css/main.css" rel="stylesheet">
	<link href="Views/dist/css/responsive.css" rel="stylesheet">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://codepen.io/yangg/pen/vONKyd">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.css">
	<script src="Views/dist/js/jquery-3.3.1.js"></script>
</head>
<body  id="home"data-target="#main-nav" class="body">
	<header id="homepage">
		<?php
		$results = new HomeModel();

		foreach ($results->ShowHome2() as $value) {
			?>
			<div class="bg-img" style="background-image: linear-gradient(#000000dd, #000000dd), url('Views/dist/img/<?php echo $value['image']?>')">
			<?php } ?>
			<nav class="navbar navbar-expand-lg " id="main-nav">
				<a class="navbar-brand text-white img-custom-logo ml-5" href="#">LOGO</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-align-justify text-white"></i>
				</button>
				<div class="collapse navbar-collapse topnav justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav center-content-navbar">
						<li class="nav-item active">
							<a class="nav-link style-navbar" href="#homepage">HOME</a>
						</li>
						<li class="nav-item">
							<a class="nav-link style-navbar" href="#service">SERVICE</a>
						</li>
						<li class="nav-item">
							<a class="nav-link style-navbar" href="#aboutus">ABOUT US</a>
						</li>
						<li class="nav-item">
							<a class="nav-link style-navbar" href="#clients">CLIENTS</a>
						</li>
						<li class="nav-item">
							<a class="nav-link style-navbar" href="#contact">CONTACT US</a>
						</li>
						<li class="nav-item">
							<a class="nav-link style-navbar" href="#appointmens">APPOINTMENS</a>
						</li>
					</ul>
				</div>
			</nav>
			<div class="container-fluid">
				<div class="home-section ">
					<div class="center-content">
						<?php
						$results = new HomeModel();

						foreach ($results->ShowHome2() as $value) {
							?>
							<h4 class="text-left h4-custom mt-5"><span class="span-custom"><?php echo $value['quote']; ?></span></h4>
						<?php }?>
						<button type="button" class="btn float-right mt-5 custom-button-schedule">
							<a href="#appointmens" style="color:#fff;text-decoration: none;">Schedule Appointmens</a>
						</button>
					</div>
				</div>
			</div>
		</div>
	</header>