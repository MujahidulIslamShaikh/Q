<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Qaswa Telecom</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/f-icon.png">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/all.min.css">

<!-- Select2 CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">

<!-- Datepicker CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datetimepicker.min.css">

<!-- Datatables CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/datatables.min.css">

<!-- Main CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-datepicker.css">
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>
	<body>
	
		<!-- Main Wrapper -->
		<div class="main-wrapper login-body">
			<div class="login-wrapper">
				<div class="container">
				
					<img class="img-fluid logo-dark" src="<?= base_url('assets/img/logo.png') ?>" alt="Logo">
					<!-- <h3 class="text-center">LOGO</h3> -->
					<div class="loginbox">
						
						<div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
                        <!-- Display validation errors here -->
                        <?php if (isset($validation)): ?>
                            <div class="alert alert-danger">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>

                        <!-- Display custom error message here -->
                        <?php if (session()->has('error')): ?>
                            <div class="alert alert-danger">
                                <?= session('error') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->has('success')): ?>
                            <div class="alert alert-success">
                                <?= session('success') ?>
                            </div>
                        <?php endif; ?>
														
								<form action="<?= base_url('/admin') ?>" method="post" enctype="multipart/form-data">
									<?= csrf_field() ?>
									<div class="form-group">
										<label class="form-control-label">Username</label>
										<input type="text" name="username"class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Password</label>
										<div class="pass-group">
											<input type="password" name="password" class="form-control pass-input">
											<span class="fas fa-eye toggle-password"></span>
										</div>
									</div>
									
									<button class="btn btn-lg btn-primary btn-block w-100 mt-3" type="submit">Login</button>
									
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
<script src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- Feather Icon JS -->
<script src="<?= base_url() ?>assets/js/feather.min.js"></script>

<!-- Slimscroll JS -->
<script src="<?= base_url() ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Datatables JS -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/datatables.min.js"></script>

<!-- Chart JS -->
<script src="<?= base_url() ?>assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/apexchart/chart-data.js"></script>

<!-- Select2 JS -->
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.min.js"></script>

<!-- Datepicker Core JS -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Custom JS -->
<script src="<?= base_url() ?>assets/js/script.js"></script>

<script src="<?=base_url() ?>assets/js/bootstrap-datepicker.min?>"></script>

	</body>
</html>