<footer id="footer-home">
	<div class="container">
		<div class="row ml-5 custom-footer">
			<div class="col-xs-12 col-sm-3 col-md-3 custom-col-footer">
				<div class="alert alert-success alert-dismissible d-none" id="insertsubscribe">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success! </strong>
				</div>
				<div class="alert alert-danger alert-dismissible d-none" id="errorsubscribe">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error! </strong>
				</div>
				<h5 class="text-white">Dental.com</h5>
				<p class="text-white" style="font-size: 12px;">Subcribe for news</p>
				<div class="form-group">
					<input type="email" id="subscribe" class="form-control border-0 bg-transparent custom-input-footer" placeholder="E-mail">
					<div class="form-group">
						<button type="button" class="btn float-right mt-2 mb-2 custom-button-footer" onclick="Subscribe()">Subscribe</button>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 custom-col-footer">
				<h5 class="text-white custom-h5-responsive-footer">Company</h5>
				<ul class="navbar-footer custom-navbar-responsive">
					<li class="mt-2"><a href="#homepage">Home</a></li>
					<li class="mt-2"><a href="#service">Service</a></li>
					<li class="mt-2"><a href="#aboutus">About Us</a></li>
					<li class="mt-2"><a href="#clients">Clients</a></li>
					<li class="mt-2"><a href="#contact">Contacts</a></li>
					<li class="mt-2"><a href="#appointmens">Appointmens</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 custom-col-footer">
				<h5 class="text-white mt-2">Contact</h5>
			<?php 
					$results = new ContactModel();
					foreach ($results->showcontact() as $contact) {
					?>
				<a href="" class="text-white a-footer"><i class="far fa-envelope mr-1"></i><?php echo $contact['email']?></a>
				<br>
				<a href="" class="text-white a-footer"><i class="far fa-map mr-1"></i><?php echo $contact['location']?></a>
			<?php } ?>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 custom-col-footer-social-media">
				<h5 class="ml-3 text-white custom-h5-responsive-socialmedia-footer">Social media</h5>
				<?php 

					foreach ($results->showSocialMedia() as $socialmedia) {
					?>
				<a href="<?php echo $socialmedia['facebook']?>" class="ml-4 text-white custom-a" target="_blank"><i class="fab fa-facebook-f"></i></a>
				<a href="<?php echo $socialmedia['instagram']?>" class="ml-4 text-white custom-a" target="_blank"><i class="fab fa-instagram"></i></a>
				<a href="<?php echo $socialmedia['twitter']?>" class="ml-4 text-white custom-a" target="_blank"><i class="fab fa-twitter"></i></a>
			<?php }?>
			</div>
		</div>
	</div>
	<hr class="custom-hr-footer">
	<div class="row ml-5">
		<p class="custom-p-footer"><i class="far fa-copyright mr-2"></i>otreks.com</p>
	</div>
</footer>

<script>
function Subscribe(){
	var subscribe = $("#subscribe").val();


	 var form_about  = new FormData();  

    form_about.append('subscribe', subscribe);


    if(subscribe !=""){

    $.ajax({

        url: 'Ajax/clientsAJAX.php', 
        cache: false,
        contentType: false,
        processData: false,
        data: form_about, 
        subscribe: subscribe,        
        dataType:"text",                  
        type: 'post',

        success: function(results){
    
	        var subscribe = $("#subscribe").val("");  

           $("#insertsubscribe").removeClass("d-none");
           $("#errorsubscribe").addClass("d-none");
        }
     });
        }else{
          $("#errorsubscribe").removeClass("d-none");
          $("#insertsubscribe").addClass("d-none");
  }
}
</script>
<a class="go-top" href="#homepage">Go to Top</a>
</body>
<!-- ./Footer -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
crossorigin="anonymous"></script>
<script type="text/javascript" src="Views/dist/js/main.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXaVWORgCzVXIlnwlaHBT_5h0T-7VMjLU&callback=initMap"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="Views/dist/js/bootstrap.min.js"></script>
    <script src="Views/dist/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
</html>