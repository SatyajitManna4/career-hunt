<?php
session_start();
error_reporting(0);
include( '../functions.php' );
$userid = current_adminid();
$userrole = user_adminrole();
if ( !empty( $userid ) ) {
	header( "Location: leads.php" );
}
$message = '';
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
	if ( isset( $_POST[ 'submit' ] ) ) {
		if ( !empty( $_POST[ 'username' ] ) ) {
			if ( !empty( $_POST[ 'password' ] ) ) {

				$mymailid = mysqli_real_escape_string( $conn, $_POST[ 'username' ] );
				$mypassword = mysqli_real_escape_string( $conn, $_POST[ 'password' ] );
				$row = runQuery( "SELECT * FROM superadmin WHERE email = '$mymailid'" );
				if ( !empty( $row[ 'ID' ] ) ) {
					if ( $mypassword== $row[ 'password' ] ) {
						$_SESSION[ 'global_adminid' ] = $row[ 'ID' ];
						$_SESSION[ 'global_adminrole' ] = 'superadmin';
						header( "location: leads.php" );
					} else {
						$message .= "Your Login password is invalid";
					}
				} else {
					$message .= "Your Login email invalid";
				}

			} else {
				$message .= "Enter your password";
			}
		} else {
			$message .= "Enter your email";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Career Hunt</title>
<!-- core:css -->
<link rel="stylesheet" href="assets/vendors/core/core.css">
<!-- endinject --> 
<!-- plugin css for this page --> 
<!-- end plugin css for this page --> 
<!-- inject:css -->
<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
<!-- endinject --> 
<!-- Layout styles -->
<link rel="stylesheet" href="assets/css/demo_1/style.css">
<!-- End layout styles -->
<link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
<div class="main-wrapper">
	<div class="page-wrapper full-page">
		<div class="page-content d-flex align-items-center justify-content-center">
			<div class="row w-100 mx-0 auth-page">
				<div class="col-md-8 col-xl-6 mx-auto">
					<div class="card">
						<div class="row">
							<div class="col-md-4 pr-md-0">
								<div class="auth-left-wrapper"> </div>
							</div>
							<div class="col-md-8 pl-md-0">
								<div class="auth-form-wrapper px-4 py-5"> <a href="#" class="noble-ui-logo d-block mb-2">Career<span>Hunt</span></a>
									<h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
									<? if(!empty($message)){?>
									<div class="alert alert-danger">
										<?=$message;?>
									</div>
									<? }?>
									<form method="post" action="" class="forms-sample">
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" name="username" class="form-control" id="exampleInputEmail1" required placeholder="Email">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" name="password"  class="form-control" id="exampleInputPassword1" required autocomplete="current-password" placeholder="Password">
										</div>
										<div class="mt-3">
											<button class="btn btn-primary mr-2 mb-2 mb-md-0 text-white" type="submit" name="submit" value="submit">Login</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- core:js --> 
<script src="assets/vendors/core/core.js"></script> 
<!-- endinject --> 
<!-- plugin js for this page --> 
<!-- end plugin js for this page --> 
<!-- inject:js --> 
<script src="assets/vendors/feather-icons/feather.min.js"></script> 
<script src="assets/js/template.js"></script> 
<!-- endinject --> 
<!-- custom js for this page --> 
<!-- end custom js for this page -->
</body>
</html>