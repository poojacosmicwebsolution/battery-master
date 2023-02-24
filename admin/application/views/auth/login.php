<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Spruha -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin,dashboard,panel,bootstrap admin template,bootstrap dashboard,dashboard,themeforest admin dashboard,themeforest admin,themeforest dashboard,themeforest admin panel,themeforest admin template,themeforest admin dashboard,cool admin,it dashboard,admin design,dash templates,saas dashboard,dmin ui design">

		<!-- Favicon -->
		<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>
<?php
		$settings = $this->common_model->getSetting('web_settings',true);
?>
		<!-- Title -->
		<title>Login <?php if(isset($settings['site_title'])){
			echo " | ".$settings['site_title'];
		}; ?></title>

		<!-- Bootstrap css-->
		<link href="<?php echo ASSETS; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="<?php echo ASSETS; ?>assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
		<link href="<?php echo ASSETS; ?>assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo ASSETS; ?>assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>

		<!-- Style css-->
		<link href="<?php echo ASSETS; ?>assets/css/style.css" rel="stylesheet">
		<link href="<?php echo ASSETS; ?>assets/css/skins.css" rel="stylesheet">
		<link href="<?php echo ASSETS; ?>assets/css/dark-style.css" rel="stylesheet">
		<link href="<?php echo ASSETS; ?>assets/css/colors/default.css" rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo ASSETS; ?>assets/css/colors/color.css">

	</head>

	<body class="main-body leftmenu">

		<!-- Loader -->
		<div id="global-loader">
			<img src="<?php echo ASSETS; ?>assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page main-signin-wrapper">

			<!-- Row -->
			<div class="row signpages text-center">
				<div class="col-md-12">
					<?php if($this->session->flashdata('error')){ ?>
					<div class="alert alert-danger" role="alert">
						<button aria-label="Close" class="close" data-dismiss="alert" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
						<?php echo $this->session->flashdata('error'); ?>
					</div>
					<?php } ?>

					<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success" role="alert">
						<button aria-label="Close" class="close" data-dismiss="alert" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
						<?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php } ?>

					<div class="card">
						<div class="row row-sm">
							<div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
								<div class="mt-5 pt-4 p-2 pos-absolute">
									<?php if(isset($settings['web_logo'])){ ?>
			
									<img src="<?php echo base_url().$settings['web_logo']; ?>" class="header-brand-img mb-4" alt="logo" height="60" >
										<?php }else{ ?>

									<img src="<?php echo ASSETS; ?>assets/img/brand/logo-light.png" class="header-brand-img mb-4" alt="logo">
										<?php } ?>
									<div class="clearfix"></div>
									<img src="<?php echo ASSETS; ?>assets/img/svgs/user.svg" class="ht-100 mb-0" alt="user">
									<h5 class="mt-4 text-white">Login</h5>
									<span class="tx-white-6 tx-13 mb-5 mt-xl-0">Signin to your account and manage all you business at your fingertips.</span>
								</div>
							</div>
							<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
								<div class="container-fluid">
									<div class="row row-sm">
										<div class="card-body mt-2 mb-2">
											<img src="<?php echo ASSETS; ?>assets/img/brand/logo.png" class=" d-lg-none header-brand-img text-left float-left mb-4" alt="logo">
											<div class="clearfix"></div>
											<form method="POST">
												<h5 class="text-left mb-2">Signin to Your Account</h5>
												<p class="mb-4 text-muted tx-13 ml-0 text-left">Signin to your account and manage all you business at your fingertips.</p>
												<div class="form-group text-left">
													<label>Username</label>
													<input class="form-control" placeholder="Enter your username" type="text" name="username">
												</div>
												<div class="form-group text-left">
													<label>Password</label>
													<input class="form-control" placeholder="Enter your password" type="password" name="password">
												</div>
												<button class="btn ripple btn-main-primary btn-block" type="submit" name="submit">Sign In</button>
											</form>
											<!-- <div class="text-left mt-5 ml-0">
												<div class="mb-1"><a href="">Forgot password?</a></div>
												<div>Don't have an account? <a href="#">Register Here</a></div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->

		</div>
		<!-- End Page -->

		<!-- Jquery js-->
		<script src="<?php echo ASSETS; ?>assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap js-->
		<script src="<?php echo ASSETS; ?>assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Select2 js-->
		<script src="<?php echo ASSETS; ?>assets/plugins/select2/js/select2.min.js"></script>

		<!-- Custom js -->
		<script src="<?php echo ASSETS; ?>assets/js/custom.js"></script>

	</body>
</html>