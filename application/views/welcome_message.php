<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Sistem Monitoring Aset | PT. PLN Persero
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.0'); ?>" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?php echo base_url('assets/demo/demo.css'); ?>" rel="stylesheet" />
</head>

<body class="offline-doc">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
		<div class="container-fluid">
			<div class="navbar-wrapper">
				<a class="navbar-brand" href="#Inventaris">Dashboard</a>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="http://www.pln.co.id/" target="_blank">
							Tentang PLN
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
	<div class="page-header clear-filter">
		<div class="page-header-image" style="background-image: url(<?php echo base_url('assets/img/background.jpg'); ?>)"></div>
		<div class="content-center">
			<div class="col-md-8 ml-auto mr-auto">
				<div class="brand">
					<h1 class="title">Monitoring Aset</h1>
					<h3 class="description">Memantau aset perusahaan dengan lebih mudah</h3>
					<div class="btn-group">
						<button class="btn btn-warning btn-lg" type="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#exampleModal">
							Kelola Aset
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel">Masuk</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php echo form_open('autentikasi/login')?>
				<div class="modal-body">
					<div class="form-group">
						<label for="" class="label">Username</label>
						<input type="text" name="username" class="form-control" id="recipient-name">
					</div>
					<div class="form-group">
						<label for="" class="label">Password</label>
						<input type="password" name="password" class="form-control" id="recipient-name">
					</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					<button type="submit" class="btn btn-warning">Masuk</button>
				</div>
				<?php echo form_close()?>
			</div>
		</div>
	</div>

	<footer class="footer">
		<div class="container-fluid">
			<nav class="float-left">
				<ul>
					<li>
						<a href="https://github.com/mohberliannusantara/warehouse-inventory/blob/master/license.txt" target="_blank">
							Licenses
						</a>
					</li>
				</ul>
			</nav>
			<div class="copyright float-right">
				&copy;
				<script>
					document.write(new Date().getFullYear())
				</script>, made with <i class="material-icons">favorite</i> by
				<a href="https://github.com/mohberliannusantara/warehouse-inventory" target="_blank" class="text-warning">Libo Tim</a> for PT. PLN (Persero)
			</div>
		</div>
	</footer>
	<script type="text/javascript">
		function openModal(id) {
			$.ajax({
				url:"{{ base_url('admin/pengguna/get/') }}"+id,
				method: 'post',
				data:null
			}).done(function(data) {
				$('#modal-content').html(data);
				$('#exampleModalCenter').modal('show');
			});
		}
	</script>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url('assets/js/core/jquery.min.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('/assets/js/core/popper.min.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
	<!--  Google Maps Plugin    -->
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
	<!-- Chartist JS -->
	<script src="<?php echo base_url('assets/js/plugins/chartist.min.js') ?>"></script>
	<!--  Notifications Plugin    -->
	<script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="<?php echo base_url('assets/js/material-dashboard.min.js?v=2.1.0') ?>" type="text/javascript"></script>
	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url('assets/demo/demo.js') ?>"></script>
</body>

</html>
