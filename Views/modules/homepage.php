<section id="service" class="service" >
	<div class="container-fluid">
		<h4 class="mt-5 ml-5 mb-5 custom-h4-nav"><b><span class="custom-service-underline">Se</span>rvice</b></h4>
	</div>
	<div class="container">
		<div class="row custom-col-service">
			
			<?php
			$results = new ServiceModel();
			$results->ShowServices();
			foreach($results->ShowServices() as $service){
				$image = $service['image'];
				$title  = $service['title'];
				$service = $service['details'];
				$myArray = explode(',', trim($service, '"'));
				
				
				
				?>

				<div class="col-lg-6 col-md-6">
					<div class="mt-5 ml-5 mr-3">
						<div class="card-group ">
							<div class="card custom-card">
								<div class="card card-body custom-card-body-service">
									<img src="Views/dist/img/<?php echo $image ?>" class="imgg img-fluid img-responsive" alt="...">
								</div>
							</div>
							<div class="card custom-card-service">
								<div class="card-body">
									<h6 class="card-title  ml-4"><b>&nbsp;<?php echo " ".$title?></b></h6>
									<div class="col-lg-12">
										<p class="mt-4 ml-3 custom-p-card-service">
											<?php
											foreach($myArray as $arr2){
												if($arr2 !=""){
													echo $arr2." <i class='far fa-check-circle ml-4 custom-icon-card'></i><br><br>";
												}
											}
											?>
										</p>

										<button type="button" class="btn btn-primary btn-sm custom-button-card-service mr-4">
										<a href="#appointmens" style="text-decoration: none"><b>Appointmens</b></a>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</section>
	<section id="aboutus">
		<div class="container-fluid">
			<h4 class="mt-5 ml-5 mb-5 custom-h4-nav"><b><span class="custom-service-underline">Ab</span>out us</b></h4>
		</div>
		<div id="aboutus-slider" class="container carousel slide" >
			<a class="carousel-control-prev custom-prev" href="#aboutus-slider" role="button" data-slide="prev">
				<i class="far fa-arrow-alt-circle-left mr-auto custom-i-pagination"></i></i>
			</a>
			<a class="carousel-control-next custom-next" href="#aboutus-slider" role="button" data-slide="next">
				<i class="far fa-arrow-alt-circle-right ml-auto custom-i-pagination"></i></i>
			</a>
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<div class="row">
						<?php
						$count = 1;
						$key = 0;
						$results = new AboutModel();
						foreach ($results->SelectAbout2() as $key=>$about) {
							$key = $key+1;
							$count++;
							if($count <= 4){
								?>
								<div class="col-lg-4 col-md-4 custom-col">
									<div class="card custom-card mt-4">
										<img src="Views/dist/img/<?php echo $about['image'] ?> " width="240px" height="400px" class="ml-3 img-radius" alt="...">
										<div href="#<?php echo $key ;?>" class="custom-content"data-toggle="collapse" data-parent="#accordion" aria-expanded="false" class="collapsed">
											<div class="label">
												<h5 class="custom-span-aboutus"><?php echo $about['name'] . " " . $about['surname']?> </h5>
											</div>
											<div id="<?php echo $key ;?>" class="collapse custom-description">
												<p>The know-how for any task – from troubleshooting and cyber defense to documentation and change validation – can be programmed without scripts.</p>
											</div>
											<p class="custom-p-aboutus-s"><?php echo $about['title']?> </p>
										</div>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
				<div class="carousel-item">
					<div class="row">
						<?php
						$count = 1;
						$key1 = 0;
						$results = new AboutModel();
						foreach ($results->SelectAbout2() as $key1=>$about) {
							$key1 = $key1+1;
							$count++;
							if($count >= 5){
								?>
								<div class="col-lg-4 col-md-4 custom-col">
									<div class="card custom-card mt-4">
										<img src="Views/dist/img/<?php echo $about['image']?> " width="240px" height="400px" class="ml-3 img-radius" alt="...">
										<div href="#<?php echo $key1 ;?>" class="custom-content"data-toggle="collapse" data-parent="#accordion" aria-expanded="false" class="collapsed">
											<div class="label">
												<h5 class="custom-span-aboutus"><?php echo $about['name'] . " " . $about['surname']?> </h5>
											</div>
											<div id="<?php echo $key1 ;?>" class="collapse custom-description">
												<p>The know-how for any task – from troubleshooting and cyber defense to documentation and change validation – can be programmed without scripts.</p>
											</div>
											<p class="custom-p-aboutus-s"><?php echo $about['title']?> </p>
										</div>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="clients">
		<div class="container-fluid">
			<h4 class="mt-5 ml-5 mb-5 custom-h4-nav"><b><span class="custom-service-underline">Cl</span>ients</b></h4>
		</div>
		<div id="clients-slider" class="container carousel slide" >
			<a class="carousel-control-prev custom-prev" href="#clients-slider" role="button" data-slide="prev">
				<i class="far fa-arrow-alt-circle-left mr-auto custom-i-pagination"></i></i>
			</a>
			<a class="carousel-control-next custom-next" href="#clients-slider" role="button" data-slide="next">
				<i class="far fa-arrow-alt-circle-right ml-auto custom-i-pagination"></i></i>
			</a>
			<div class="caraousel carousel-inner" role="listbox" id="your-carousel-id"  data-interval="false" >
				<div class="carousel-item active"  >
					<div class="row">
						<?php
						$count = 1;
						
						$results = new ClientsModel();
						$a = 500;
						foreach ($results->ShowClients2() as $idja=>$about) {
							$idja = $idja+1+$a;
							$count++;
							if($count <= 4){
								?>
								<div class="col-lg-4 col-md-4 custom-col">
									<div class="card custom-card mt-4">
										<img src="Views/dist/img/<?php echo $about['image'] ?> " width="240px" height="400px" class="ml-3 img-radius" alt="...">
										<div href="#<?php echo $idja?>" class="custom-content-clients mb-0"data-toggle="collapse" data-parent="#accordion" aria-expanded="false" class="collapsed" data-interval="false">
											<div class="label">
												<h5 class="custom-span-aboutus"><?php echo  $about['name']." ".$about['surname']?></h5>
												<p class="custom-p-clients-h5">Best doctors in US I suggest to
												everyone</p>
											</div>
											<div id="<?php echo $idja?>" class="collapse custom-description">
												<p class="custom-text-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum qui debitis officiis, beatae. Molestiae facilis quia, quaerat iusto quisquam officiis eos! Facilis explicabo odio eius consequuntur, earum enim quibusdam ipsam?</p>
											</div>
											<p class="custom-p-clients-bottom"><?php echo $about['title']?></p>
										</div>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
				<div class="carousel-item">
					<div class="row">
						<?php
						$count = 1;
						$b = 800;
						$results = new ClientsModel();
						foreach ($results->ShowClients2() as $idja2=>$about) {
							$idja2 = $idja2+1+$b;
							$count++;
							if($count >= 5){
								?>
								<div class="col-lg-4 col-md-4 custom-col">
									<div class="card custom-card mt-4">
										<img src="Views/dist/img/<?php echo $about['image']?> " width="240px" height="400px" class="ml-3 img-radius" alt="...">
										<div href="#<?php echo $idja2 ?>" class="custom-content-clients mb-0"data-toggle="collapse" data-parent="#accordion" aria-expanded="false" class="collapsed" data-interval="false">
											<div class="label">
												<h5 class="custom-span-aboutus"><?php echo  $about['name']." ".$about['surname']?></h5>
												<p class="custom-p-clients-h5">Best doctors in US I suggest to
												everyone</p>
											</div>
											<div id="<?php echo $idja2 ?>" class="collapse custom-description">
												<p class="custom-text-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum qui debitis officiis, beatae. Molestiae facilis quia, quaerat iusto quisquam officiis eos! Facilis explicabo odio eius consequuntur, earum enim quibusdam ipsam?</p>
											</div>
											<p class="custom-p-clients-bottom"><?php echo $about['title']?></p>
										</div>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="contact">
		<div class="container-fluid">
			<h4 class="mt-5 ml-5 mb-5 custom-h4-nav"><b><span class="custom-service-underline">Co</span>ntacts</b></h4>
		</div>
		<div class="clients-body">
			<div class="container">
				<div class="row ml-5">
					<div class="col-md-3 col-sm-3 mt-5 mb-5 custom-col-contact">
						<?php
						$results = new ContactModel();
						foreach ($results->showcontact() as $contact) {
							?>
							<p class="pt-3 ml-1"><i class="ml-1 fas fa-map-marker custom-icon-contact"></i><span class="ml-3 text-white"><?php echo  $contact['location']?></span></p>
							<p class="pt-3 ml-1"><i class="fas fa-phone custom-icon-contact"></i><span class="ml-3 text-white"><?php echo  $contact['phonenumber']?></span></p>
							<p class="pt-3 ml-1"><i class="fas fa-envelope custom-icon-contact"></i><span class="ml-3 text-white"><?php echo  $contact['email']?></span></p>
						<?php }?>
					</div>
					<div class="col-md-4 col-sm-4 mt-5 mb-5 mr-5 mt-5">
						<div id="map" class="mt-2"></div>
					</div>
					<div class="col-md-4 col-sm-4 mt-5 mb-5 mt-5">
						<div class="bd-example">
							
							<div class="alert alert-success alert-dismissible d-none" id="insertcontact">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Success! -</strong>  Message Send  Successfully .
							</div>
							<div class="alert alert-danger alert-dismissible d-none" id="errorcontact">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Error! -</strong> all fields are required.
							</div>
							<div class="alert alert-danger alert-dismissible d-none" id="validemail">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Error! -</strong> email not valid.
							</div>
							<div class="form-group">
								<label for="contactname" class="custom-col-label-contact">Name</label>
								<input type="text" class="form-control custom-col-input-contact" name="contactname" id="contactname" placeholder="Name">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1" class="custom-col-label-contact">E-mail</label>
								<input type="text" class="form-control custom-col-input-contact" name="email" id="email" placeholder="E-mail">
							</div>
							<div class="form-group">
								<label for="textarea" class="custom-col-label-contact">Text</label>
								<textarea id="textarea" name="textarea"class="custom-textarea-col-contact" style="font-size: 13px;font-family: poppins"></textarea>
								<input type="button" class="btn custom-btn-col-contact" onclick="sendcontact();" id="sendcontact"  value="Submit">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="appointmens" style="margin-top:100px!important;">
		<div class="container-fluid">
			<h4 class="mt-5 ml-5 mb-5 custom-h4-nav"><b><span class="custom-service-underline">Ap</span>pointmens</b></h4>
			<div class="alert alert-success alert-dismissible d-none" id="insertappointment">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success! -</strong> please wait our staff will notice you if your appointment is Approved or DisAproved.
			</div>
			<div class="alert alert-danger alert-dismissible d-none" id="errorappointment">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error! -</strong> all fields are required.
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="username" class="mt-3">REASON FOR VISIT</label>
						<div class="dropdown">
							<select class="form-control" id="values">
								<option  value="">Select Reason</option>
								<?php
								
								$result2 = new ServiceModel();
								foreach($result2->ShowServices() as $service2){
									$myString = $service2['details'];
									$myArray = explode(',', trim($myString, '"'));
									
									foreach($myArray as $arr){
										
										echo '<option  value="'.$arr.'">'.$arr.'</option>';
										
										?>

										<?php

									}
								}
								?>
							</select>
							
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="mt-3">NAME</label>
						<input class="form-control border-0 custom-appoitmens-input" type="text" id="aname" placeholder="NAME">
					</div>
					<div class="form-group">
						<label for="email" class="mt-3">E-MAIL</label>
						<input class="form-control border-0 custom-appoitmens-input" type="email" id="aemail" placeholder="E-MAIL">
					</div>
					<div class="form-group">
						<label for="number" class="mt-3">PHONE NUMBER</label>
						<input class="form-control border-0 custom-appoitmens-input" type="number" id="anumber" placeholder="PHONE NUMBER">
					</div>
				</div>
				<div class="col-md-6" style="margin-bottom: 200px!important">
					<div class="form-group">
						<label for="username" class="mt-3">Date</label>
						<input class="form-control border-0 custom-appoitmens-input" type="date" id="adate" placeholder="">
					</div>
					<div class="form-group">
						<label for="username" class="mt-3">Time</label>
						<input class="form-control border-0 custom-appoitmens-input" type="time" id="atime" placeholder="">
					</div>
					<div class="m-5">
						<button class="btn btn-success-custom-service btn-sm float-right" type="button" onclick="confirmappointment()">CONFRIM</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		function confirmappointment(){
			var values	=	$("#values").val();
			var aname	=	$("#aname").val();
			var aemail	=	$("#aemail").val();
			var anumber	=	$("#anumber").val();
			var adate	=	$("#adate").val();
			var atime	=	$("#atime").val();
			var form_about  = new FormData();
			form_about.append('values'	,	values);
			form_about.append('aname'	,	aname);
			form_about.append('aemail'	,	aemail);
			form_about.append('anumber'	,	anumber);
			form_about.append('adate'	,	adate);
			form_about.append('atime'	,	atime);
			if(values !="" && aname !="" && aemail !="" && anumber !="" && adate !="" && atime !=""){
				$.ajax({
					url: 'Ajax/clientsAJAX.php',
					cache: false,
					contentType: false,
					processData: false,
					data: form_about,
					values: values,
					aname: aname,
					aemail: aemail,
					anumber: anumber,
					adate: adate,
					atime: atime,
					dataType:"text",
					type: 'post',
					success: function(results){
						
						
						var values 	= $("#values").val("");
						var aname 	= $("#aname").val("");
						var aemail 	= $("#aemail").val("");
						var anumber = $("#anumber").val("");
						var adate 	= $("#adate").val("");
						var atime 	= $("#atime").val("");
						
						$("#insertappointment").removeClass("d-none");
						$("#errorappointment").addClass("d-none");
					}
				});
			}else{
				$("#errorappointment").removeClass("d-none");
				$("#insertappointment").addClass("d-none");
			}
		}
		$(window).load(function() {
			$('.carousel').carousel('pause');
		});
		function sendcontact(){
			var contactname = $("#contactname").val();
			var email =   $('#email').val();
			var textarea =   $('#textarea').val();
			if (email.indexOf('@') >=1) {
				var form_about  = new FormData();
				form_about.append('contactname' , contactname);
				form_about.append('email'		, email);
				form_about.append('textarea'	, textarea);
				if(contactname !="" && email !="" && textarea !=""){
					$.ajax({
						url: 'Ajax/clientsAJAX.php',
						cache: false,
						contentType: false,
						processData: false,
						data: form_about,
						contactname: contactname,
						email: email,
						textarea: textarea,
						dataType:"text",
						type: 'post',
						success: function(results){
							
							var contactname = $("#contactname").val("");
							var email 		= $("#email").val("");
							var textarea 	= $("#textarea").val("");
							$("#insertcontact").removeClass("d-none");
							$("#errorcontact").addClass("d-none");
							$("#validemail").addClass("d-none");
						}
					});
				}else{
					$("#errorcontact").removeClass("d-none");
					$("#insertcontact").addClass("d-none");
					$("#validemail").addClass("d-none");
				}
			}else{
				$("#errorcontact").removeClass("d-none");
				$("#insertcontact").addClass("d-none");
			}
		}
		
		
		
	</script>