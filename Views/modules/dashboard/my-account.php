<main>
	<div class="container-fluid"><br>
		<h4 class="home-h4 ml-2 mt-2"><b>My Account</b></h4>
		
	</div>
	<div class="container-fluid">
		<form>
			<div class="alert alert-primary alert-dismissible  d-none" id="updateusers">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Update! -</strong>  Updated Successfully .
			</div>
			<div class="alert alert-danger alert-dismissible  d-none" id="errorusers">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>*Error! -</strong> All fields are required .
			</div>
			<div class="row">
				<?php
				$results = new UsersModel();
				foreach($results->showtheuser() as $user ){
				?>
				<input type="text" id="idaccount" value="<?php echo $user['iduser']?>" >
				<div class="card home-card mt-2">
					<div class="card-body">
						<div class="row">
							<div class="card ml-4">
								<div class="card-body">
									<img src="Views/dist/img/<?php echo $user['user_image']?>" width="240px" height="400px"  id="output6" width="240px" height="400px"  class=" foto img-fluid  img-radius" >
								</div>
							</div>
						</div>
						<div class="form-group d-flex card-body-home custom-file " required>
						<label for="username" class="mt-3 mr-3"><b></b></label>
						<div class="custom-file">
							<input type="file" class="custom-file-input ml-3" id="eimage" name="eimage" onchange="Updateimg(event)">
							<label class="custom-file-label costum-input-home-account" for="inputGroupFile04"><span class="custom-label-image">Background Image</span></label>
						</div>
					</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 mt-0 ml-5 custom-col-responsive">
					<div class="row">
						<div class="col-md-6 col-sm-6 custom-col-responsive">
							<div class="form-group card-body-home">
								<label for="username" class="mt-3"><b>Name</b></label>
								<input class="form-control costum-input-home-account custom-responsive" type="text" id="name" placeholder="Name" value="<?php echo $user['name']?>">
							</div>
							<div class="form-group card-body-home">
								<label for="username" class="mt-3"><b>Password</b></label>
								<input class="form-control costum-input-home-account custom-responsive" type="password" id="password" placeholder="Password" value="<?php echo  base64_decode($user['password'])?>">
							</div>
						</div>
						<div class="col-md-6 col-sm-6 custom-col-responsive">
							<div class="form-group card-body-home">
								<label for="username" class="mt-3 custum-label-res"><b>Surname</b></label>
								<input class="form-control costum-input-home-account custom-responsive" type="text" id="surname" placeholder="Name" value="<?php echo $user['surname']?>">
							</div>
							<div class="form-group col-sm-11 mt-5" >
								<?php
								foreach($results->showtheuser() as $user ){
									$attributes = $user['attributes'];
															$Service			= "";
															$AboutUs			= "";
															$Clients			= "";
															$Contact			= "";
													$Appointments		= "";
															$users			    = "";
									if(strpos($attributes, "Service")){
										$Service  = "checked";
									}if (strpos($attributes, "AboutUs")){
										$AboutUs = "checked";
									}if (strpos($attributes, "Clients")){
										$Clients = "checked";
									}if(strpos($attributes, "Contact")){
										$Contact  = "checked";
									}if (strpos($attributes, "Appointments")){
										$Appointments = "checked";
									}if(strpos($attributes, "users")){
										$users  = "checked";
									}
								}
								?>
							</div>
							<div class="form-group card-body-home custom-checkbox">
								<label for="username" class="mt-3"><b>Attributes</b></label><br>
								<div class="form-group ml-4">
									<input type="checkbox"  class="theval custom-control-input" value="Service"     <?php echo $Service ?>   id="Service" />
									<label class="custom-control-label" for="Service">Service</label>
								</div>
								<div class="form-group ml-4">
									<input type="checkbox"  class="theval custom-control-input" value="AboutUs"     <?php echo $AboutUs ?>   id="AboutUs"/>
									<label class="custom-control-label" for="AboutUs">About Us</label>
								</div>
								<div class="form-group ml-4">
									<input type="checkbox"  class="theval custom-control-input" value="Clients"     <?php echo $Clients ?>    id="Clients"/
									><label class="custom-control-label" for="Clients">Clients</label>
								</div>
								<div class="form-group ml-4">
									<input type="checkbox"  class="theval custom-control-input" value="Contact"     <?php echo $Contact ?>    id="Contact"/>
									<label class="custom-control-label" for="Contact">Contact</label>
								</div>
								<div class="form-group ml-4">
									<input type="checkbox"  class="theval custom-control-input" value="Appointments" <?php echo $Appointments ?> id="Appointments"/>
									<label class="custom-control-label" for="Appointments">Appointments</label>
								</div>
								<div class="form-group ml-4">
									<input type="checkbox"  class="theval custom-control-input" value="users"     <?php echo $users ?>    id="users"/>
									<label class="custom-control-label" for="users">Users</label>
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-success-custom-service btn-sm float-right mt-4 mb-3" type="button" onclick="updateuser()">Change</button>
				</div>
				<?php
				}
				?>
			</div>
		</main>
		<script>
			$("#idaccount").addClass("d-none");
			var Updateimg = function(event){
				var output4 = document.getElementById('output6');
				output4.src = URL.createObjectURL(event.target.files[0]);
			}
			function updateuser(){
		// Declare a checkbox array
		var accArray = [];
		
		// Look for all checkboxes that have a specific class and was checked
		$(".theval:checked").each(function() {
			accArray.push($(this).val());
		});
		
		// Join the array separated by the comma
		var selectedacc;
		selectedacc = accArray.join(',') ;
		
												var idaccount 		= 			  $("#idaccount").val();
														var name 			=			  $('#name').val();
														var surname 			= 			  $('#surname').val();
												var password 		= 			  $('#password').val();
														var eimage 			= 			  $("#eimage").val();
												var files_data 		= 			  $('#eimage').prop('files')[0];
		var form_data = new FormData();
		form_data.append('idaccount', idaccount);
		form_data.append('name', name);
		form_data.append('surname', surname);
		form_data.append('password', password);
		form_data.append("selectedacc", JSON.stringify(selectedacc));
		form_data.append('eimage', eimage);
		form_data.append('eimage', files_data);
		if(name !="" &&  surname !="" && password !="" ){
			$.ajax({
				url: "Ajax/usersAJAX.php",
				type: "POST",
				data: form_data,
				contentType: false,
				processData: false,
				cache:false,
				dataType: "text",
				success: function(results){
					$("#errorusers").addClass("d-none");
					$("#updateusers").removeClass("d-none");
				}
			});
		}else{
			$("#errorusers").removeClass("d-none");
			$("#updateusers").addClass("d-none");
		}
		}
		</script>