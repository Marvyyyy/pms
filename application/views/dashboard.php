<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/summernote/summernote-bs4.min.css">
  <!-- Custom css -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/dist/css/custom.css">
</head>
<style>
	.content-wrapper {
		background-image: url("<?=base_url()?>asset/img/bg.jpg");

		/* Full height */
		height: 100%;

		/* Center and scale the image nicely */
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- loader -->
<div class="loader" id="loader" style="display: none;">
	<!-- <img src="<?php base_url()?>asset/dist/img/motorbikes.gif" alt="Loading..."> -->
	<i class="fas fa-spinner fa-spin" style="color: #25ab1c;"></i>
</div>
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url()?>asset/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <?php  include('inc/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php  include('inc/sidebar.php'); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-3">
      <div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="row">
						<div class="col-6">
							<!-- small box -->
							<div class="small-box bg-warning">
								<div class="inner">
									<?php $count_employees = $this->globalmodel->countrows('*','users',"",array("role_id !=" =>'3')); ?>
									<?php if($count_employees != null){$c_employees = $count_employees;}else{$c_employees = 0;}?>
									<h3><?=$c_employees?></h3>
									<p>Employees</p>
								</div>
								<div class="icon">
									<i class="ion ion-person"></i>
								</div>
								<a href="<?=base_url()?>employees" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-6">
							<!-- small box -->
							<div class="small-box bg-danger">
								<div class="inner">
									<?php $count_projects = $this->globalmodel->countrows('*','project',"",array()); ?>
									<?php if($count_projects != null){$c_projects = $count_projects;}else{$c_projects = 0;}?>
									<h3><?=$c_projects?></h3>
									<p>Project</p>
								</div>
								<div class="icon">
									<i class="ion ion-pie-graph"></i>
								</div>
								<a href="<?=base_url()?>project" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card bg-gradient-success">
						<div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

							<h3 class="card-title">
								<i class="far fa-calendar-alt"></i>
								Calendar
							</h3>
							<!-- tools card -->
							<div class="card-tools">
								<button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
							<!-- /. tools -->
						</div>
						<!-- /.card-header -->
							<div class="card-body pt-0">
								<!--The calendar -->
								<div id="calendar" style="width: 100%"></div>
							</div>
						<!-- /.card-body -->
					</div>
				</div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	
  <?php  include('inc/footer.php'); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url()?>asset/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>asset/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>asset/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url()?>asset/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url()?>asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>asset/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url()?>asset/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url()?>asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url()?>asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>asset/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?=base_url()?>asset/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>asset/dist/js/pages/dashboard.js"></script>
</body>
</html>
