<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Delivery | Rider</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/dist/css/adminlte.min.css">
  <!-- Custom css -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/dist/css/custom.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Custom css -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/dist/css/custom.css">
	<style>
	.input-rounded {
		border-radius: 25px;
		border: 1px solid #dddddd;
		padding: 20px; 
		width: 200px;
		height: 15px;    
	}
	.btn-rounded{
		border-radius: 5.25rem;
	}
	.modal-rounded {
    	border-radius: 10px 30px ;
    	/* border: 2px solid #609; */
		padding: 30px;
	}
	p {
    	margin-bottom: 0px;
	}
	</style>
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
<body class="hold-transition sidebar-mini">
<!-- loader -->
<div class="loader" id="loader" style="display: none;">
	<!-- <img src="<?php base_url()?>asset/dist/img/motorbikes.gif" alt="Loading..."> -->
	<i class="fas fa-spinner fa-spin" style="color: #25ab1c;"></i>
</div>
<div class="wrapper">

  <!-- Navbar -->
  <?php  include('inc/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php  include('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  	<?php //include('rider_content_header.php'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
			<!-- <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mt-3">
				<div class="card bg-light d-flex flex-fill mb-0">
					<div class="card-header text-muted border-bottom-0">
						Profile Information
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-7">
								<ul class="ml-4 mb-0 fa-ul text-muted">
									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?php //echo $profile_info['address_1'] ?></li>
									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?php //echo $profile_info['contact_no'] ?></li>
								</ul>
							</div>
							<div class="col-5 text-center">
								<img src="../asset/dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column mt-3">
				<div class="card bg-light d-flex flex-fill mb-0">
				<form id="save_form" method="POST" enctype="multipart/form-data">
					<div class="card-header text-muted border-bottom-0">
						Account Information
					</div>
					<div class="card-body pt-0 pb-0">
						<div class="row">
							<div class="col-12">
								<!-- <h2 class="lead"><b>Username:</b></h2> -->
								<div class="form-group row">
									<p class="text-muted text-sm col-3">E-mail: </p>
									<input type="email" class="form-control form-control-border form-control-sm col-9" id="email" name="email" value="<?=$profile_info['email'] ?>" readonly>
									<span class="text-danger mb-0" id="email_error"></span>
									<!-- <p class="text-muted text-sm col-2">edit</p> -->
								</div>
								<div class="form-group row">
									<p class="text-muted text-sm col-3">Username: </p>
									<input type="text" class="form-control form-control-border form-control-sm col-9" id="username" name="username" value="<?php echo $profile_info['username'] ?>" readonly>
									<span class="text-danger mb-0" id="username_error"></span>
									<!-- <p class="text-muted text-sm col-2">edit</p> -->
								</div>
								<div class="form-group row ">
									<p class="text-muted text-sm col-3">Password: </p>
									<div class="input-group col-9 p-0">
										<input type="password" class="form-control form-control-border form-control-sm" id="password" name="password" value="<?php echo $this->session->userdata('password') ?>" readonly>
										<span class="input-group-append input-group-append-sm">
											<button type="button" onclick="togglePasswordVisibility()" class="btn btn-sm btn-flat"><i class="fas fa-eye-slash" id="eye"></i></button>
										</span>
									</div>
									<span class="text-danger mb-0" id="password_error"></span>
									<!-- <p class="text-muted text-sm col-2">edit</p> -->
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer p-1">
						<div class="text-right">
							<!-- <a href="#" class="btn btn-sm bg-teal">
								<i class="fas fa-comments"></i>
							</a> -->
							<a onclick="editBtn()" id="editBtn" class="btn btn-sm bg-teal">
								<i class="fas fa-user-edit"></i> Edit
							</a>
							<a onclick="cancelBtn()" id="cancelBtn" class="btn btn-sm btn-outline-danger" style="display:none;">
								 Cancel
							</a>
							<button onclick="saveBtn()" id="saveBtn" type="submit" class="btn btn-sm bg-success" style="display:none;">
								<i class="fas fa-save"></i> Save
							</button>
						</div>
					</div>
				</form>
				</div>
			</div>
        </div>
        <!-- <div class="row">
					<div class="col-12">
						<div class="card card-success">
							<div class="card-header">
									<h3 class="card-title">Profile Information</h3>
							</div>
							<div class="card-body">
									<input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
									<br>
									<input class="form-control" type="text" placeholder="Default input">
									<br>
									<input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
							</div>
							<div class="card-header">
									<h3 class="card-title">Account Information</h3>
							</div>
							<div class="card-body">
									<input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
									<br>
									<input class="form-control" type="text" placeholder="Default input">
									<br>
									<input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
							</div>
						</div>
					</div>
        </div> -->
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php  include('inc/footer.php'); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url()?>asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>asset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>asset/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>asset/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>asset/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>asset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>asset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>asset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>asset/dist/js/adminlte.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBz_wCJ0Jbmu_Eiih70y9zsBL6eFf9eXrQ"></script>
<!-- Sweetalert -->
<script src="<?=base_url()?>asset/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
	function togglePasswordVisibility(){
		var passwordInput = document.getElementById("password");
		var eye = document.getElementById("eye");
		if (passwordInput.type === "password") {
			passwordInput.type = "text";
			eye.classList.remove("fas", "fa-eye-slash");
			eye.classList.add("fas", "fa-eye");
		} else {
			passwordInput.type = "password";
			eye.classList.remove("fas", "fa-eye");
			eye.classList.add("fas", "fa-eye-slash");
		}
	}
	function editBtn() {
		document.getElementById("email").readOnly = false;
		document.getElementById("username").readOnly = false;
		document.getElementById("password").readOnly = false;
		document.getElementById("editBtn").style.display="none";
		document.getElementById("saveBtn").style.display="";
		document.getElementById("cancelBtn").style.display="";
	}
	function cancelBtn() {
		location.reload();
	}
</script>
<script>
	$(document).ready(function() {
		$("#save_form").submit(function(e) {
			e.preventDefault();
			document.getElementById("loader").style.display = "";
			// $("#exampleModal").modal('hide')
			// var formData = $(this).serialize();
			$.ajax({
				url: "<?= base_url() ?>save_account",
				type: "POST",
				// dataType: "json",
				data: $(this).serialize(),
				success: function(response) {
				setTimeout(function(){ 
					rs = JSON.parse(response);
					if (rs.error === true) {
					document.getElementById("loader").style.display = "none"; 
						$('#email_error').html(rs.email_error);
						$('#username_error').html(rs.username_error);
						$('#password_error').html(rs.password_error);
					}else if (rs.error === false){
					document.getElementById("loader").style.display = "none";
						Swal.fire({
							icon:'success',
							// text: "You have successfully selected the order! You can pickup the Item now!", 
							type: "success",
							confirmButtonColor: '#28a745',
							}).then(function(){ 
								// location.href=data.url;
								location.reload();
							}
						);
					}else{
						alert('failed');
					}
					document.getElementById("loader").style.display = "none"; 
				}, 1000);
				},
				error: function(jXHR, textStatus, errorThrown) {
					alert(errorThrown);
				}
			});
		});
	});
</script>
</body>
</html>
