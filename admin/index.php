<?php
			require('inc/config.php');
			session_start();
			
			if(isset($_POST['login']))
			{
			extract($_POST);
			$qs="select * from login_details where uname='$username' and pwd='$pass'";
			$data=mysqli_query($con,$qs) or die(mysqli_error($con));
			if(mysqli_num_rows($data)>0)
			{
				$rec=mysqli_fetch_array($data);
				$_SESSION['admin_id']=$rec['id'];
				header('location:dashboard.php');
				
			}
			else
			{
			echo "<script>alert('Incorrect Username/Password')</script>";
			}
			}
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
   
    <meta name="author" content="SM Web Solutions" />
	 <meta name="robots" content="no-follow" />
    <title>Admin Login </title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="assets/plugins/iconic/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="assets/css/pages/extra_pages.css">
	<!-- favicon -->
   
</head>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-34 p-t-27">
						NEWS JAGGA
					</span>
					<span class="login100-form-logo">
					<div class="sidebar-userpic">
                                                <img src="img/logo.jpeg" class="img-responsive" alt=""> </div>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Admin Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" requierd>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>
					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- start js include path -->
    <script src="assets/plugins/jquery/jquery.min.js" ></script>
    <!-- bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/js/pages/extra_pages/login.js" ></script>
    <!-- end js include path -->
</body>
</html>