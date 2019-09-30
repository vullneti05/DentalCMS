 <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link href="Views/dist/css/login.css" rel="stylesheet">
   <link href="Views/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="Views/dist/css/responsive.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
</head>
<body class="">
   <div class="container">
      <div class="row login-row justify-content-center align-items-center mt-5">
         <div class="col-12 col-md-6 col-xl-5 mt-3">
            <div class="p-2 text-center">
               <h4 class="page-info-title text-center text-secondary"></h4>
               <h4 class="text-center text-primary">
                  Login here</h4>
            </div>
<div class="alert alert-danger alert-dismissible d-none" id="errorlogin">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>*Error! -</strong> Invalid Name or Password.
</div>
            <form method="POST" class="form-section">
               <div class="card px-4 log-box">
                  <div class="card-body">
                     <div class="form-group row">
                        <label for="username" class="col-form-label">Username</label>
                        <input type="text" name="loginname" class="form-control" id="loginname" required>
                     </div>
                     <div class="form-group row">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" name="loginpassword" class="form-control" id="loginpassword" required>
                     </div>
                     <div class="form-group row justify-content-end buttons">
                        <button type="input" name="login" class="btn btn-primary col-6">Login</button>
                     </div>
                  </div>
               </div>
    <!--                <a href="../index.php" class="mt-3 nav-link text-primary"> <i class="fas fa-long-arrow-alt-left"></i>Kthehu
                  mbrapa</a> -->
            </form>
         </div>
      </div>
   </div>
    <script src="Views/dist/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="Views/dist/js/bootstrap.min.js"></script>
    <script src="Views/dist/js/main.js"></script>
</body>
</html>

<?php
$login = new UsersModel();
if(isset($_POST['loginname'])){

	if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['loginname']) &&
	preg_match('/^[a-zA-Z0-9]+$/', $_POST['loginpassword'] )){

    $loginname     = $_POST['loginname'];

  $fjalkalimikryptuar = base64_encode($_POST['loginpassword']);
    $loginpassword = $fjalkalimikryptuar;
		$tedhenat 		 = UsersModel::CompareData($loginname,$loginpassword);

		foreach($tedhenat as $results){

			$results['name'];
			$results['password'];

			if($results['name'] == $_POST['loginname']  &&  $results['password'] == $fjalkalimikryptuar ){

				$_SESSION['user']   	   = "kaqasje";
				$_SESSION['iduser']   	 = $results['iduser'];
				$_SESSION['attributes']  = $results['attributes'];
				$_SESSION['name']   	   = $results['name'];
        $_SESSION['surname']     = $results['surname'];
        $_SESSION['user_image']  = $results['user_image'];

				header("Location:home");
			}
		}

		echo '<script> $("#errorlogin").removeClass("d-none");</script>';

	}

}
?>



