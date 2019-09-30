<?php
$attributes = $_SESSION['attributes'];
$arrayAutorizim = explode(" ",$attributes);
foreach($arrayAutorizim as $row1){
	if(strpos($row1,"Service")!==false) {
		?>
		<main>
			<div class="container-fluid"><br>
				<h4 class="home-h4 ml-3"><b>Service</b></h4>
				<p class="home-h4 ml-3">From this modul you can change edit and add a new service</p>
			</div>
			<div class="container-fluid">
				<div class="alert alert-success alert-dismissible  d-none" id="insertservice">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success! -</strong>  Registered Successfully .
				</div>
				<div class="alert alert-success alert-dismissible  d-none" id="updateservice">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Updated! -</strong>  Updated Successfully .
				</div>
				<div class="alert alert-danger alert-dismissible  d-none" id="errorservice">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>*Error! -</strong> All fields are required .
				</div>
				<div class="alert alert-warning alert-dismissible d-none" id="deleteservice">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Deleted! -</strong> Deleted Successfully .
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 mt-5">
						<h4 class="home-h4-card ml-3"></h4>
						<div class="card home-card">
							<div class="card-body">
								<div class="form-group d-flex card-body-home custom-file " required>
									<label for="username" class="mt-3 mr-3 res-labe"><b>Image</b></label>
									<div class="custom-file">
										<input type="file" class="custom-file-input ml-3 " id="image" name="image" onchange="ServiceHome(event)">
										<label class="custom-file-label costum-input-home" for="inputGroupFile04"><span class="custom-label-image">Background Image</span></label>
									</div>
								</div>
								<div class="row text-center" style="margin-bottom:30px;">
									<div class="card-body">
										<img src="Views/dist/img/bb.jpg" id="output" class="foto img-radius img-custom-back  col-4" />
									</div>
								</div>
								<div class="form-group d-flex card-body-home">
									<label for="username" class="mt-3 res-labe"><b>Tittle</b></label>
									<input class="form-control costum-input-home ml-4 res-bi" type="text" name="title" id="title" placeholder="Write the tittle of your services">
								</div>
								<?php
						$len = 10;   // komplet numrat
						$min = 11;  // minimumi
						$max = 100;  // maximumi
						$range = []; // inicializimi i arres
						foreach (range(0, $len - 1) as $i) {
							while(in_array($num = mt_rand($min, $max), $range));
							$range[] = $num;
							$a = implode('', $range);
						}
						?>
						<input type="text" name="count" id="count" value="<?php echo $a;?>" >
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group d-flex">
									<label for="username" class="mt-3">Detalis</label>
									<input class="form-control costum-input-home ml-4 details" type="text" id="details" name="details[]" placeholder="">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group d-flex">
									<label for="username" class="mt-3">Detalis</label>
									<input class="form-control costum-input-home ml-4 details" type="text" id="details" name="details[]" placeholder="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group d-flex">
									<label for="username" class="mt-3">Detalis</label>
									<input class="form-control costum-input-home ml-4 details" type="text"  id="details" name="details[]" placeholder="">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group d-flex">
									<label for="username" class="mt-3">Detalis</label>
									<input class="form-control costum-input-home ml-4 details" type="text" id="details" name="details[]" placeholder="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group d-flex">
									<label for="username" class="mt-3">Detalis</label>
									<input class="form-control costum-input-home ml-4 details" type="text" id="details" name="details[]" placeholder="">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group d-flex">
									<label for="username" class="mt-3">Detalis</label>
									<input class="form-control costum-input-home ml-4 details" type="text" id="details" name="details[]" placeholder="">
								</div>
							</div>
						</div>
						<button class="btn btn-success-custom-service btn-sm float-right mt-4" type="button" onclick="addservice()" >Add Service</button>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 mt-5">
				<h4 class="home-h4-card ml-4"></h4>
				<div class="card home-card ml-1">
					<div class="card-body table-responsive">
						<table class="table table-striped text-nowrap card-body-home" id="myTables" >
							<thead class="thead custom-table-head">
								<tr class="custom-tr-table text-center">
									<th scope="col" class="w-25">TITTLE</th>
									<th scope="col" class="w-25">DETAILS</th>
									<th scope="col" class="w-25">IMAGES</th>
									<th scope="col" class="w-25">OPTIONS</th>
								</tr>
							</thead>
							<tbody class="custom-table-body" id="thoseservices" >
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<script>
			</script>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="col-lg-12 col-md-12 col-sm-12 mt-5">
								<p style="color:red">* please seperate details only with commas or spaces</p>
								<h4 class="home-h4-card ml-3">Add new service</h4>
								<input type="text" name="editserviceid" id="editserviceid" class="d-none">
								<div class="card home-card">
									<div class="card-body card">
										<div class="custom-file" >
											<input type="file" id="editimage" name="editimage" class="custom-file-input  form-control "  onchange="UploadSImage(event)" >
											<label for="image" class="custom-file-label costum-input-home col-form-label"><span class="custom-label-image">Background Image</span></label>
										</div>
										<div class="row text-center" style="margin-bottom:30px;margin-top: 10px">
											<div class="card-body">
												<img src="Views/dist/img/user.png" id="output2" class="foto img-radius img-custom-back col-4 imgtable" />
												<input type="hidden" id="editimage" name="editimage" class="is imgtable"  >
											</div>
										</div>
										<div class="form-group d-flex card-body-home" style="margin-top: -20px">
											<label for="username" class="mt-3"><b>Tittle</b></label>
											<input class="form-control costum-input-home ml-4 custom-responsive " type="text" name="edittitle" id="edittitle" placeholder="Write the tittle of your services">
										</div>
										<div class="form-group d-flex">
											<label for="exampleFormControlTextarea2"><b>Details</b></label>
											<textarea class="form-control card-body-textarea rounded-0 ml-5" id="editdetails" name="editdetails" rows="3"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" onclick="updateservice()">Save changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</main>
<script>
	$("#count").addClass('d-none');
	$(document).ready( function () {
		$('#myTables').DataTable();
	});
	ShowServices();
	function ShowServices(){
		$.ajax({
			method: 'POST',
			url: "Ajax/serviceAJAX.php",
			success: function(results) {
				$("#thoseservices").html(results);
			}
		});
	}
	function deleteservice(deleteid){
		var deleteid = deleteid;
		$.ajax({
			type: 'GET',
			url: 'Ajax/serviceAJAX.php',
			data: {
				'deleteid': deleteid
			},
			success: function(results) {
				$("#insertservice").addClass("d-none");
				$("#errorservice").addClass("d-none");
				$("#deleteservice").removeClass("d-none");
				$("#updateservice").addClass("d-none");
				ShowServices();
			}
		});
	}
	var ServiceHome = function(event){
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	}
	var UploadSImage = function(event){
		var output2 = document.getElementById('output2');
		output2.src = URL.createObjectURL(event.target.files[0]);
	}
	function addservice(){
// Declare a checkbox array
var chkArray = [];
// Look for all checkboxes that have a specific class and was checked
$(".details").each(function() {
	chkArray.push($(this).val());
});
// Join the array separated by the comma
var details = chkArray.filter(Boolean).join(',');
var title 		= $("#title").val();
var files_data 	= $('#image').prop('files')[0];
var image 		= $("#image").val();
var count 		= $("#count").val();
var form_about = new FormData();
form_about.append("details", JSON.stringify(details));
form_about.append('count', count);
form_about.append('title', title);
form_about.append('image', files_data);
form_about.append('image', image);
if(title !=""&& image !=""){
	$.ajax({
		url: 'Ajax/serviceAJAX.php',
		cache: false,
		contentType: false,
		processData: false,
		data: form_about,
		title: title,
		count: count,
		details: details,
		image: image,
		dataType:"text",
		type: 'post',
		success: function(results){
			var title 		= $("#title").val("");
			$("#insertservice").removeClass("d-none");
			$("#errorservice").addClass("d-none");
			$("#deleteservice").addClass("d-none");
			$("#updateservice").addClass("d-none");
			ShowServices();
		}
	});
}else{
	$("#errorservice").removeClass("d-none");
	$("#insertservice").addClass("d-none");
	$("#deleteservice").addClass("d-none");
	$("#updateservice").addClass("d-none");
}
}
function editservice(editidservice){
	var editservice = editidservice;
	data = new FormData();
	data.append("editservice", editservice);
	$.ajax({
		url: 'Ajax/edits.php',
		method: "POST",
		data: data,
		editservice:editservice,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success: function(results) {
			$("#editserviceid").val(results["idservice"]);
			$("#edittitle").val(results["title"]);
			$("#editdetails").val(results["details"]);
			$("#editimage").val(results["image"]);
			if(results["image"] !=""){
				$(".foto").attr('src',"Views/dist/img/"+results["editimage"]);
			}else{
				$(".is").attr('src',"Views/dist/img/"+results["image"]);
			}
		}
	});
}
function updateservice(){
	var editserviceid 		= 			$('#editserviceid').val();
	var edittitle 			= 			$('#edittitle').val();
	var editdetails 		= 			$('#editdetails').val();
	var editfiles_data 		= 			$('#editimage').prop('files')[0];
	var editimage 			= 			$("#editimage").val();
	var form_data = new FormData();
	form_data.append('editserviceid', editserviceid);
	form_data.append('edittitle', edittitle);
	form_data.append('editdetails', editdetails);
	form_data.append('editimage', editimage);
	form_data.append('editimage', editfiles_data);
	$.ajax({
		url: "Ajax/serviceAJAX.php",
		type: "POST",
		data: form_data,
		contentType: false,
		processData: false,
		cache:false,
		dataType: "text",
		success: function(results){
			$("#insertservice").addClass("d-none");
			$("#errorservice").addClass("d-none");
			$("#deleteservice").addClass("d-none");
			$("#updateservice").removeClass("d-none");
			$('#exampleModal').modal('hide');
			ShowServices();
		}
	});
}
</script>
<?php
}else { header("Location:dashboard"); } }
?>