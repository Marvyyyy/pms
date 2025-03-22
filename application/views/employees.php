<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Projects</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>asset/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
<body class="hold-transition sidebar-mini">
<!-- loader -->
<div class="loader" id="loader" style="display: none;">
	<!-- <img src="<?php base_url()?>asset/dist/img/motorbikes.gif" alt="Loading..."> -->
	<i class="fas fa-spinner fa-spin" style="color: #25ab1c;"></i>
</div>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php  include('inc/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php  include('inc/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

		<!-- Modal -->
		<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl">
				<div class="modal-content">
					<form id="add_form">
						<input type="hidden" name="insert" id="ID" value="insert">
						<div class="modal-header">
							<h5 class="modal-title" id="addModalLabel">Add User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12 col-md-4">
									<div class="form-group">
										<label for="inputName">First Name</label>
										<input type="text" id="inputName" class="form-control" name="fname" id="fname">
										<span class="text-danger" id="fname_error"></span>
									</div>
								</div>
								<div class="col-sm-12 col-md-4">
									<div class="form-group">
										<label for="inputName">Middle Name</label>
										<input type="text" id="inputName" class="form-control" name="mname" id="mname">
										<span class="text-danger" id="mname_error"></span>
									</div>
								</div>
								<div class="col-sm-12 col-md-4">
									<div class="form-group">
										<label for="inputName">Last Name</label>
										<input type="text" id="inputName" class="form-control" name="lname" id="lname">
										<span class="text-danger" id="lname_error"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div class="form-group">
										<label for="inputName">Email</label>
										<input type="email" id="inputName" class="form-control" name="email" id="email">
										<span class="text-danger" id="email_error"></span>
									</div>
								</div>
								<div class="col-sm-12 col-md-6">
									<div class="form-group">
										<label for="inputName">Contact</label>
										<input type="number" id="inputName" class="form-control" name="contact" id="contact">
										<span class="text-danger" id="contact_error"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="role">Role Access</label>
										<select class="form-control custom-select" name="role" id="role">
											<option selected disabled value="">Select one</option>
											<?php foreach($role as $item){ ?>
											<option value="<?=$item['id']?>"><?=$item['role_name']?></option>
											<?php } ?>
										</select>
										<span class="text-danger" id="role_error"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-success">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

    <!-- Main content -->
    <section class="content pt-3">

      <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employees List</h3>
								<div class="card-tools">
                <a href="<?=base_url()?>employees/employee_add" type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#addModal">Add User
                </a>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="project_tbl" class="table table-sm table-hover">
					<thead>
						<tr>
							<th>Employee</th>
							<th>Access Role</th>
							<th>Loads</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      <!-- /.card -->

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
<!-- Sweetalert -->
<script src="<?=base_url()?>asset/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?=base_url()?>asset/dist/js/demo.js"></script> -->
<script>
  $(function () {
    var table = $('#project_tbl').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": "<?php echo base_url(); ?>employees/get_all_employees",
			"type": "POST",
		},
    });
  });
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#add_form').on('submit', function(e) {
			e.preventDefault();
			document.getElementById("loader").style.display = "";
			$.ajax({
				url: "<?php echo base_url()?>employees/add_data",
				method: "post",
				data: $(this).serialize(),
				success: function(response) {
				document.getElementById("loader").style.display = "none";
					rs = JSON.parse(response);
					if(rs.error === true) {
						$('#fname_error').html(rs.fname_error);
						$('#mname_error').html(rs.mname_error);
						$('#lname_error').html(rs.lname_error);
						$('#email_error').html(rs.email_error);
						$('#contact_error').html(rs.contact_error);
						$('#role_error').html(rs.role_error);
					} else if(rs.error === false) {
						// window.location.href = "<?php echo base_url()?>main/dashboard";
						$("#addModal").modal('hide')
						Swal.fire({
						icon:'success',
						text: "Successfully added!", 
						type: "success",
						confirmButtonColor: '#28a745',
						}).then(function(){ 
							// location.href=data.url;
							location.reload();
						}
						);
					} else {
						$('#errors').html('An error has occured.');
					}
				}
			});
		});
		$('#edit_form').on('submit',function(e){
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url()?>subjects/add_data",
					method : "post",
					data : $(this).serialize(),
					success: function(response) {
						rs = JSON.parse(response);
						if(rs.error === true) {
						$('#subject_error_edit').html(rs.subject_error);
						$('#subj_code_error_edit').html(rs.subj_code_error);
						} else if(rs.error === false) {
						$("#editModal").modal('hide')
						$("#successModal").modal('show')
						} else {
							$('#errors').html('An error has occured.');
						}
					}
				});
				return false;
			});
		$('#delete_form').on('submit',function(e){
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url()?>subjects/delete_data",
					method : "post",
					data : $(this).serialize(),
					success: function(response) {
						$("#deleteModal").modal('hide')
						$("#successModal").modal('show')
					}
				});
				return false;
			});
	});
</script>
</body>
</html>
