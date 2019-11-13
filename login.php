<?php
	require("classes/user_validator.php");
	if (isset($_POST['btnLogin'])) {
		$validation = new UserValidator($_POST);
		$errors = $validation->validatorForm();
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		if (!empty($email) && !empty($password)) {
			
		}
		
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>AdminLTE 3 | Log in</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="css/ionicons.min.css" />
	<link rel="stylesheet" href="css/icheck-bootstrap.min.css" />
	<link rel="stylesheet" href="css/adminlte.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?= $_SERVER['PHP_SELF'] ?>"><b>TPD</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign In</p>
				<span class="text-danger"></span>

				<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
					<div class="form-group mb-3">
						<div class="input-group">
							<input type="text" name="email" value="<?php echo $_POST['email'] ?? '' ?>" class="form-control" placeholder="Email" />
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-envelope"></span>
								</div>
							</div>
						</div>
						<span class="text-danger"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
					</div>

					<div class="form-group mb-3">
						<div class="input-group">
							<input type="password" name="password" class="form-control" placeholder="Password" />
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<span class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
					</div>
					
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember" />
								<label for="remember">
									Remember Me
								</label>
							</div>
						</div>
						<div class="col-4">
							<button type="submit" name="btnLogin" class="btn btn-primary btn-block btn-flat">
								Sign In
							</button>
						</div>
					</div>
				</form>

				<div class="social-auth-links text-center mb-3">
					<p>- OR -</p>
					<a href="#" class="btn btn-block btn-primary">
						<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
					</a>
					<a href="#" class="btn btn-block btn-danger">
						<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
					</a>
				</div>
				<!-- /.social-auth-links -->

				<p class="mb-1">
					<a href="#">I forgot my password</a>
				</p>
				<p class="mb-0">
					<a href="register.html" class="text-center">Register a new membership</a>
				</p>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="../../plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>