<?php 
$attributes = $_SESSION['attributes'];
$arrayAutorizim = explode(" ",$attributes); 
foreach($arrayAutorizim as $row1){ 
if(strpos($row1,"Appointments")!==false) { 
?>
<main>
	<div class="container-fluid"><br>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 mt-5">
				<div class="card home-card ml-1">
							<h4 class="home-h4 ml-3 mt-3"><b> Pending Schedule Appointmens Online</b></h4>
		<p class="home-h4 ml-3">From this modul you can see your pendign appointmens</p>
					<div class="card-body table-responsive custom-table-appointmens">
						<table class="table table-striped text-nowrap custom-table" id="dtBasicExample" cellspacing="0" width="100%">
							<thead class="thead">
								<tr class="text-left">
									<th scope="col">NAME</th>
									<th scope="col">E-Mail</th>
									<th scope="col">PHONE</th>
									<th scope="col">REASONS</th>
									<th scope="col">DATE</th>
									<th scope="col">TIME</th>
									<th scope="col">Options</th>
								</tr>
							</thead>
							<tbody class="custom-table-body">
								<?php 
								$results = new ClientsModel();

								foreach($results->showappointments() as $appointment){
										if($appointment['status']=="pending"){
								?>
								<tr>
									<td><?php echo $appointment['aname'] ?></td>
									<td><?php echo $appointment['aemail'] ?></td>
									<td><?php echo $appointment['anumber'] ?></td>
									<td><?php echo $appointment['reason'] ?></td>
									<td><?php echo $appointment['adate'] ?></td>
									<td><?php echo $appointment['atime'] ?></td>
									<form action="" method="post">
									<td>
									<button class="btn custom-icon-table-update" name="aproveappointment" value="<?php echo $appointment['appointmentsid']?>"><i class="fas fa-thumbs-up"></i></button>
									<button class="btn custom-icon-table-delete" name="deleteappointment" value="<?php echo $appointment['appointmentsid']?>"><i class="far fa-times-circle"></i></button></td>
									</td>
									</form>
								</tr>
							<?php 	} } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 mt-5">
				<div class="card home-card ml-1">
					<h4 class="home-h4 ml-3 mt-3"><b>Approved Schedule Appointments</b></h4>
					<p class="home-h4 ml-3">From this modul you can see your approved appointmens</p>
					<div class="card-body table-responsive custom-table-appointmens">
						<table class="table table-striped text-nowrap custom-table" id="dtBasicExample" cellspacing="0" width="100%">
							<thead class="thead">
								<tr class="text-left">
									<th scope="col">NAME</th>
									<th scope="col">E-Mail</th>
									<th scope="col">PHONE</th>
									<th scope="col">REASON FOR VISIT</th>
									<th scope="col">DATE</th>
									<th scope="col">TIME</th>
									<th scope="col">Options</th>
								</tr>
							</thead>
							<tbody class="custom-table-body">
								<?php 
								$results = new ClientsModel();
								$status = "aktive";
								foreach($results->showappointments() as $appointment){
									if($appointment['status'] == "active"){
								?>
								<tr>
									<td><?php echo $appointment['aname'] ?></td>
									<td><?php echo $appointment['aemail'] ?></td>
									<td><?php echo $appointment['anumber'] ?></td>
									<td><?php echo $appointment['reason'] ?></td>
									<td><?php echo $appointment['adate'] ?></td>
									<td><?php echo $appointment['atime'] ?></td>
									<form action="" method="post">
									<td>
										<button class="btn custom-icon-table-delete" name="deleteappointment" value="<?php echo $appointment['appointmentsid']?>"><i class="far fa-times-circle"></i></button></td>
										
								</form>
								</tr>
							<?php	
									}
									 } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>	
		</div>
	</div>
</main>
<?php
if(isset($_POST['deleteappointment'])){

	$appointmentsid = $_POST['deleteappointment'];

	$results = new ClientsModel();

	$results->deleteappointment($appointmentsid);
	echo "<script>alert('You deleted successfully an appointment')</script>";
	echo "<script>window.location.href='appointments'</script>";
}

if(isset($_POST['aproveappointment'])){

	$aproveappointment = $_POST['aproveappointment'];

	$results2 = new ClientsModel();

	$results2->appappointment($aproveappointment);

	echo "<script>alert('You approved successfully an appointment')</script>";
	echo "<script>window.location.href='appointments'</script>";
}
?>
<?php 
}else { header("Location:dashboard"); } }
?>