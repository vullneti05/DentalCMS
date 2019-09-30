<?php
require_once "../Models/Connection.php";
require_once("../Models/ContactModel.php");
require_once("../Controllers/TemplateController.php");



$results = ContactModel::showcontact();

foreach ($results as $result) {
	echo '	<div class="col-lg-6 col-md-6 col-sm-12 mt-5">
				<h4 class="home-h4-card ml-3">Company Info</h4>
				<div class="card home-card">
					<div class="card-body">
						<div class="form-group d-flex card-body-home">
							<label for="username"  class="mt-3 custom-label-size"><b>Location</b></label>
							<input  class="form-control costum-input-home" type="text" id="location" name="location" placeholder="NY 12" value="'.$result['location'].'">
							<div class="input-group-append">
								<button class="btn input-group-text custom-icon-table-update bg-transparent border-0 custom-btn-update-contact"><i class="far fa-edit"   onclick="locate();"></i></button>
							</div>
						</div>
						<div class="form-group d-flex card-body-home"  >
							<label for="username" class="mt-3 custom-label-size"><b>Phone number</b></label>
							<input class="form-control costum-input-home"  type="number"  placeholder="Phone number" id="phonenumber" name="phonenumber" value="'.$result['phonenumber'].'" >
							<div class="input-group-append">
								<button class="btn input-group-text custom-icon-table-update bg-transparent border-0 custom-btn-update-contact"><i class="far fa-edit"></i></button>
							</div>
						</div>
						<div class="form-group d-flex card-body-home">
							<label for="username" class="mt-3 custom-label-size"><b>Email</b></label>
							<input class="form-control costum-input-home" type="email" id="email" value="'.$result['email'].'" oninput="checkInput()">
						
							<div class="input-group-append">
								<button class="btn input-group-text custom-icon-table-update bg-transparent border-0 custom-btn-update-contact"><i class="far fa-edit"></i></button>
							</div>
						</div>
						<button class="btn btn-success-custom-service btn-sm float-right mt-4" type="button" onclick="update()" id="submit" disabled>Update</button>
					</div>
				</div>
			</div>

	';
}
$results1 = ContactModel::showSocialMedia();

foreach ($results1 as $Showsocial) {
echo '
<div class="col-lg-6 col-md-6 col-sm-12 mt-5">
				<h4 class="home-h4-card ml-3">Social Media</h4>
				<div class="card home-card">
          <div class="card-body">
            <div class="form-group d-flex card-body-home">
              <label for="username"  class="mt-3 custom-label-size"><b>Facebook</b></label>
              <input  class="form-control costum-input-home" type="text" id="facebook" name="facebook" placeholder="facebook"  value='.$Showsocial['facebook'].'>
              <div class="input-group-append">
                <button class="btn input-group-text custom-icon-table-update bg-transparent border-0 custom-btn-update-contact"><i class="far fa-edit"   onclick="locate();"></i></button>
              </div>
            </div>
            <div class="form-group d-flex card-body-home"  >
              <label for="username" class="mt-3 custom-label-size"><b>Instagram</b></label>
              <input class="form-control costum-input-home"  type="text" id="instagram" name="Instagram" placeholder="Instagram"   value='.$Showsocial['instagram'].' >
              <div class="input-group-append">
                <button class="btn input-group-text custom-icon-table-update bg-transparent border-0 custom-btn-update-contact"><i class="far fa-edit"></i></button>
              </div>
            </div>
            <div class="form-group d-flex card-body-home">
              <label for="username" class="mt-3 custom-label-size"><b>Twitter</b></label>
              <input class="form-control costum-input-home" type="text" id="twitter" name="twitter" placeholder="Twitter"   value='.$Showsocial['twitter'].'>
            
              <div class="input-group-append">
                <button class="btn input-group-text custom-icon-table-update bg-transparent border-0 custom-btn-update-contact"><i class="far fa-edit"></i></button>
              </div>
            </div>
            <button class="btn btn-success-custom-service btn-sm float-right mt-4" type="button" onclick="Csocialmedia()" id="submit" >Update</button>
          </div>
          </div>
          </div>
          </div>
';
}
if(isset($_POST['facebook'])){
	$facebook = $_POST['facebook'];
	$instagram = $_POST['instagram'];
	$twitter = $_POST['twitter'];

	$results  = ContactModel::UpdateSocialMedia($facebook,$instagram,$twitter);
	 echo json_encode($results);
}



if(isset($_POST['location'])){

$location		=	$_POST['location'];
$phonenumber	=	$_POST['phonenumber'];
$email			=	$_POST['email'];

  			$results = ContactModel::UpdateContact($location,$phonenumber,$email);
	   		 echo json_encode($results);
}

?>
<script>

 
</script>
<script>


	var inputMail = document.getElementById("email");
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var button = document.querySelector('#submit');
  function checkInput() {
     if (inputMail.value.match(mailformat)) {
        button.disabled = false;
     } else {
         
        button.disabled = true;
     }
  }
	
</script>