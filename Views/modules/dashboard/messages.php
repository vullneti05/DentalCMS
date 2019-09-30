<main>
	<div class="container-fluid" style="margin-bottom: 150px;"><br>
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<h4 class="home-h4 mt-3"><b>Messages</b></h4>
				<div class="card home-card" style="margin-top: 40px!important;">
					<div class="card-body table-responsive custom-responsive-table">
						<table class="table table-striped text-nowrap mt-5">
							<thead class="thead custom-table-head">
								<tr>
									<th scope="col" class="w-25">NAME</th>
									<th scope="col" class="w-25">EMAIL</th>
									<th scope="col" class="w-25">TEXT</th>
									<th scope="col" class="w-25">OPTIONS</th>
								</tr>
							</thead>
							<tbody class="custom-table-body">
								<?php
								$results = new ClientsModel();
								foreach ($results->ShowMessages() as $message) {
							
								echo '
								<tr>
								
									<td>'.$message['name'].'</td>
									<td>'.$message['email'].'</td>
									<td>'.substr($message['description'],0,10).'
										<button type="button" class="custom-button-table" data-toggle="popover"  data-trigger="focus" title="Text" data-content="'.$message['description'].'" onmouseover="test()"><i class="fas fa-ellipsis-h ml-1 mt-1" ></i></button>
									</td>
									<td>
										<a href="#" class="text-decoration-none text-danger ml-4" name="fshije"  id="delmsg" onclick=deletemsg('.$message['messagesid'].')>
											<i class="far fa-trash-alt"></i>
										</a>
									</td>
								</tr>
								';
								}
								 ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="w-100">
					<h4 class="home-h4 mt-3"><b>Subscribes</b></h4>
					<h5 class="custom-messages-underline ml-3 mt-2"><span class="custom-service-underline">Em</span>ails</h5>
					<ul class="list-group list-group-flush custom-ul-message mt-5" style="margin-top: 76px!important">
						<li class="list-group-item custom-subscribe">
							<?php
							
							$subscribes = new ClientsModel();

							foreach ($subscribes->ShowSubscribe() as  $subscribe) {
							echo '<a href="" class="custom-email-message text-secondary">'.$subscribe['subscribe'].'</a><hr>';
							}

							?>
							
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</main>



<script>


function deletemsg(idmesazhi){
	var idmesazhi = idmesazhi;
 var data = new FormData();
    $.ajax({
        url:"Ajax/clientsAJAX.php",

        method:"GET",
           data: {
            'idmesazhi': idmesazhi
        },
        dataType: "text",

        success: function(tedhenat){
        	alert("You deleted Successfully");
        	 document.location.href = 'messages';
        }
    });
}


</script>


