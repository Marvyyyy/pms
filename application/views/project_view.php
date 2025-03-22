<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Add</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>asset/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Custom css -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/dist/css/custom.css">
</head>
<style>
	.dt-center {
  text-align: center;
}

</style>
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
  	<?php 
		if($this->session->userdata('role_id') == 1){
			$disable = 'readonly';
		}else{
			$disable = '';
		}
  	?>
  <div class="content-wrapper">
	<!-- Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<form id="edit_task_form">
			<div class="modal-content">
			<!-- <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div> -->
				<div class="modal-body">
					<input type="hidden" class="form-control form-control-sm" name="update" id="editID">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Modules</label>
								<div class="select2-cyan">
									<select class="form-control form-control-sm " data-placeholder="Select a members" style="width: 100%;" name="modules_edit" id="modules_edit"<?=$disable?>>
										<?php foreach($modules as $item){ ?>
										<option value="<?=$item['id']?>"><?=$item['module_name']?></option>
										<?php } ?>
									</select>
									<span class="text-danger" id="member_edit_error"></span>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="inputName">Task Name</label>
								<input type="text" class="form-control form-control-sm" name="task_edit" id="task_edit" <?=$disable?>>
								<span class="text-danger" id="task_edit_error"></span> 
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Assigned to</label>
								<div class="select2-cyan">
									<select class="form-control form-control-sm " data-placeholder="Select a members" style="width: 100%;" name="member_edit" id="member_edit" <?=$disable?>>
										<?php foreach($p_members as $item){ ?>
										<option value="<?=$item['id']?>"><?=$item['first_name'].' '.$item['middle_name'].' '.$item['last_name']?></option>
										<?php } ?>
									</select>
									<span class="text-danger" id="member_edit_error"></span>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Priority Level</label>
								<div class="select2-cyan">
									<select class="form-control form-control-sm " data-placeholder="Select a members" style="width: 100%;" name="priority_edit" id="priority_edit" <?=$disable?>>
										<?php foreach($priority as $item){ ?>
										<option value="<?=$item['id']?>"><?=$item['priority_name']?></option>
										<?php } ?>
									</select>
									<span class="text-danger" id="priority_edit_error"></span>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Status</label>
								<div class="select2-cyan">
									<select class="form-control form-control-sm" data-placeholder="Select status" style="width: 100%;" name="status_edit" id="status_edit">
										<option selected disabled>Choose</option>
										<?php foreach($status as $item){ ?>
										<option value="<?=$item['id']?>"><?=$item['status']?></option>
										<?php } ?>
									</select>
									<span class="text-danger" id="status_error"></span>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Date:</label>
								<input type="date" class="form-control  form-control-sm" name="deadline_edit" id="deadline_edit" <?=$disable?>>
								<span class="text-danger" id="deadline_edit_error"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer p-0">
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success btn-sm" >Save changes</button>
				</div>
			</div>
		</form>
	</div>
	</div>

    <!-- Main content -->
    <section class="content pt-3">
      <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header">
				<h3 class="card-title">Project Details</h3>
				<!-- <div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
					<i class="fas fa-times"></i>
					</button>
				</div> -->
				</div>
				<div class="card-body">
				<div class="row">
					<div class="col-12 col-md-12 col-lg-9 order-2 order-md-1">
						<div class="row">
							<div class="col-12 col-sm-4">
							<div class="info-box bg-light">
								<div class="info-box-content">
								<span class="info-box-text text-center text-muted">Tasks</span>
								<span class="info-box-number text-center text-muted mb-0"><?=$task_completed_count?>/<?=$task_count?></span>
								</div>
							</div>
							</div>
							<div class="col-12 col-sm-4">
							<div class="info-box bg-light">
								<div class="info-box-content">
								<span class="info-box-text text-center text-muted">Findings/Errors/Bugs</span>
								<span class="info-box-number text-center text-muted mb-0"><?=$errors_count?></span>
								</div>
							</div>
							</div>
							<div class="col-12 col-sm-4">
							<div class="info-box bg-light">
								<div class="info-box-content">
								<span class="info-box-text text-center text-muted">In QA</span>
								<span class="info-box-number text-center text-muted mb-0"><?=$qa_count?></span>
								</div>
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="card">
								<div class="card-header">
									<h3 class="card-title"><?=$progress_percent?>% Project progress</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="progress">
									<div class="progress-bar bg-lightblue progress-bar-striped" role="progressbar"
										aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?=$progress_percent?>%">
										<span class="sr-only"><?=$progress_percent?>% Complete (success)</span>
									</div>
									</div>
								</div>
								<!-- /.card-body -->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
							<h4>Task Activities</h4>
								<!-- <div class="post"> -->
									<div class="card p-0">
										<!-- <div class="card-header">
											<h3 class="card-title">Project Lists</h3>
											<div class="card-tools">
												<a href="<?=base_url()?>project/project_add" type="button" class="btn btn-success btn-sm" >Add Project
												</a>
											</div>
										</div> -->
										<div class="card-body p-0">
											<table id="task_tbl" class="table table-borderless table-sm table-hover">
											<thead class="">
											<tr>
												<th>Task</th>
												<th>Modules</th>
												<th>Assigned to</th>
												<th>Priority Level</th>
												<th>Target Date</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
											</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								<!-- </div> -->
							</div>
						</div>
						<?php if($this->session->userdata('role_id')!=1){ ?>
						<div class="row">
							<div class="col-12">
								<div id="accordion">
									<div class="card card-warning">
										<div class="card-header">
										<h4 class="card-title w-100">
											<a class="d-block w-100" data-toggle="collapse" href="#collapseOne" style="text-align: center;">
											Add New Task
											</a>
										</h4>
										</div>
										<div id="collapseOne" class="collapse" data-parent="#accordion">
										<div class="card-body">
										<form id="add_task_form">
										<input type="hidden" name="insert" id="ID2" value="<?=$project['pID']?>">
											<div id="input_fields_container_2">

											</div>
											<a type="button" id="add_field_button" class="add_field_button">Add Row</a>
											<div class="row">
												<div class="col-12">
													<input type="submit" value="Save" class="btn btn-success float-right">
													<button  type="button" class="btn btn-secondary float-right mr-2"  data-toggle="collapse" href="#collapseOne" >Cancel</button>
												</div>
											</div>
										</form>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="col-12 col-md-12 col-lg-3 order-1 order-md-2">
						<h3 class="text-primary"><i class="fas fa-paint-brush"></i> <?=$project['project_name']?></h3>
						<p class="text-muted"><?=$project['project_desc']?></p>
						<br>
						<div class="text-muted">
							<p class="text-sm">Client Company
							<b class="d-block"><?=$project['client']?></b>
							</p>
							<p class="text-sm">Project Leader
							<b class="d-block"><?=$project['first_name'].' '.$project['middle_name'].' '.$project['last_name']?></b>
							</p>
							<p class="text-sm">Project Members
								<?php foreach($p_members as $a){ ?>
								<b class="d-block"><?=$a['first_name'].' '.$a['middle_name'].' '.$a['last_name']?></b>
								<?php } ?>
							</p>
							<?php if($links != null){ ?>
							<p class="text-sm">Project Links
								<?php foreach($links as $a){ ?>
								<a href="<?=$a['links']?>"target="_blank" class="d-block"><?=$a['links']?></a>
								<?php } ?>
							</p>
							<?php } ?>
							<?php if($creds != null){ ?>
							<p class="text-sm mb-0">Software System Credentials
								<?php foreach($creds as $a){ ?>
								<p class="d-block text-sm mb-0 pl-3">For:<strong><?=$a['user_type']?></strong></p>
								<p class="d-block text-sm mb-0 pl-5">Username:<strong><?=$a['username']?></strong></p>
								<p class="d-block text-sm mb-0 pl-5">Password:<strong><?=$a['password']?></strong></p>
								<?php } ?>
							</p>
							<?php } ?>
						</div>

						<!-- <h5 class="mt-5 text-muted">Project files</h5>
						<ul class="list-unstyled">
							<li>
							<a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
							</li>
							<li>
							<a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
							</li>
							<li>
							<a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
							</li>
							<li>
							<a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
							</li>
							<li>
							<a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
							</li>
						</ul> -->
						<div class="text-center mt-5 mb-3">
							<a href="<?=base_url()?>project/edit_project/<?=$project['pID']?>" class="btn btn-sm btn-primary">Edit Project</a>
							<!-- <a href="#" class="btn btn-sm btn-warning">Report contact</a> -->
						</div>
					</div>
				</div>
				</div>
				<!-- /.card-body -->
			</div>
          <!-- /.card -->
        </div>
      </div>
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
<!-- Select2 -->
<script src="<?=base_url()?>asset/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url()?>asset/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>asset/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url()?>asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="<?=base_url()?>asset/dist/js/demo.js"></script> -->
<script>
  $(function () {
    var table = $('#task_tbl').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": false,
			"autoWidth": false,
			"responsive": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?php echo base_url(); ?>project/get_all_task/<?=$this->uri->segment(3)?>",
				"type": "POST",
			},
			columnDefs: [
				{
					targets: [1, 2,3,4,5], // select the second and third columns
					className: 'dt-center', // apply the 'dt-center' class
					
				},
				// { "width": "25%","orderable": false, "targets": 0 },
				// { "width": "10%","orderable": false, "targets": 1 },
				// { "width": "20%","orderable": false, "targets": 2 },
				// { "width": "10%","orderable": false, "targets": 3 },
				// { "width": "10%","orderable": false, "targets": 4 },
				// { "width": "10%","orderable": false, "targets": 5 },
			],
    })
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    })

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } })
  })
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#add_form').on('submit', function(e) {
			e.preventDefault();
			document.getElementById("loader").style.display = "";
			$.ajax({
				url: "<?php echo base_url()?>project/add_data",
				method: "post",
				data: $(this).serialize(),
				success: function(response) {
				document.getElementById("loader").style.display = "none";
					rs = JSON.parse(response);
					if(rs.error === true) {
						$('#name_error').html(rs.name_error);
						$('#description_error').html(rs.description_error);
						$('#status_error').html(rs.status_error);
						$('#client_error').html(rs.client_error);
						$('#p_manager_error').html(rs.p_manager_error);
						$('#member_error').html(rs.member_error);
					} else if(rs.error === false) {
						// window.location.href = "<?php echo base_url()?>main/dashboard";
						// $("#addModal").modal('hide')
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
		$('#add_task_form').on('submit', function(e) {
			e.preventDefault();
			document.getElementById("loader").style.display = "";
			$.ajax({
				url: "<?php echo base_url()?>project/add_task/<?=$this->uri->segment(4)?>",
				method: "post",
				data: $(this).serialize(),
				success: function(response) {
				document.getElementById("loader").style.display = "none";
					rs = JSON.parse(response);
					if(rs.error === true) {
						$('#task_error').html(rs.task_error);
						$('#member_error').html(rs.member_error);
						$('#priority_error').html(rs.priority_error);
						$('#status_error').html(rs.status_error);
						$('#deadline_error').html(rs.deadline_error);
					} else if(rs.error === false) {
						// window.location.href = "<?php echo base_url()?>main/dashboard";
						// $("#addModal").modal('hide')
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
		$('#edit_task_form').on('submit', function(e) {
			e.preventDefault();
			document.getElementById("loader").style.display = "";
			$.ajax({
				url: "<?php echo base_url()?>project/add_task",
				method: "post",
				data: $(this).serialize(),
				success: function(response) {
				document.getElementById("loader").style.display = "none";
					rs = JSON.parse(response);
					if(rs.error === true) {
						$('#task_error').html(rs.task_error);
						$('#member_error').html(rs.member_error);
						$('#priority_error').html(rs.priority_error);
						$('#status_error').html(rs.status_error);
						$('#deadline_error').html(rs.deadline_error);
					} else if(rs.error === false) {
						// window.location.href = "<?php echo base_url()?>main/dashboard";
						$("#editModal").modal('hide')
						Swal.fire({
						icon:'success',
						text: "Successfully saved!", 
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
	});
	function edit_task(tID){
		$.ajax({
			url: "<?php echo base_url('project/view_task/'); ?>",
			method:"POST",
			data:{idd:tID},
			dataType:"json",
			success:function(response)
			{
				$('#editID').val(response.tID);
				$('#modules_edit').val(response.mID);
				$('#task_edit').val(response.task_name);
				$('#member_edit').val(response.uID);
				$('#priority_edit').val(response.plID);
				$('#status_edit').val(response.tsID);
				$('#deadline_edit').val(response.date_end);
				$('#editModal').modal({
					// backdrop:"static",
					// keyboard:false
				});
				
			}
		})
	}
</script>
<script>
$(document).ready(function(){
    var container_2 = $('#input_fields_container_2');
	const box = document.getElementById('input_fields_container_2');
    var add_button = $('#add_field_button');

    var field_html = '<div class="row"><div class="col-md-2 col-sm-12"><div class="form-group"><label>Modules</label><div class="select2-cyan"><select class="form-control form-control-sm " data-placeholder="Select a members" style="width: 100%;" name="modules[]" id="modules"><option selected disabled>Choose</option><?php foreach($modules as $item){ ?><option value="<?=$item['id']?>"><?=$item['module_name']?></option><?php } ?></select><span class="text-danger" id="member_error"></span></div></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><label for="inputName">Task Name</label><input type="text" class="form-control form-control-sm" name="task[]" id="task"><span class="text-danger" id="task_error"></span> </div></div><div class="col-md-2 col-sm-12"><div class="form-group"><label>Assigned to</label><div class="select2-cyan"><select class="form-control form-control-sm " data-placeholder="Select a members" style="width: 100%;" name="member[]" id="member"><option selected disabled>Choose</option><?php foreach($p_members as $item){ ?><option value="<?=$item['id']?>"><?=$item['first_name'].' '.$item['middle_name'].' '.$item['last_name']?></option><?php } ?></select><span class="text-danger" id="member_error"></span></div></div></div><div class="col-md-2 col-sm-12"><div class="form-group"><label>Priority Level</label><div class="select2-cyan"><select class="form-control form-control-sm " data-placeholder="Select a members" style="width: 100%;" name="priority[]" id="priority" onchange="changeColorPriority()"><option selected disabled>Choose</option><?php foreach($priority as $item){ ?><option value="<?=$item['id']?>"><?=$item['priority_name']?></option><?php } ?></select><span class="text-danger" id="priority_error"></span></div></div></div><div class="col-md col-sm-12"><div class="form-group"><label>Status</label><div class="select2-cyan"><select class="form-control form-control-sm" data-placeholder="Select status" style="width: 100%;" name="status[]" id="status"><option selected disabled>Choose</option><?php foreach($status as $item){ ?><option value="<?=$item['id']?>"><?=$item['status']?></option><?php } ?></select><span class="text-danger" id="status_error"></span></div></div></div><div class="col-md col-sm-12"><div class="form-group"><label>Date:</label><input type="date" class="form-control  form-control-sm" name="deadline[]" id="deadline"/><span class="text-danger" id="deadline_error"></span></div></div><a class="remove_field_2" style="display: flex;align-items: center;"><label>X</label></a>';
    $(add_button).click(function(e){
        e.preventDefault();
        $(container_2).append(field_html);
    });
    $(container_2).on('click', '.remove_field_2', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
    });
	if ($('#input_fields_container_2').text() != '') {
	$(container_2).append(field_html);
	} else {
	}
});
</script>
<script>
	function changeColorPriority() {
		var selectElement = document.getElementById("priority");
		var selectedValue = selectElement.options[selectElement.selectedIndex].value;

		if (selectedValue == 1) {
			selectElement.style.backgroundColor = "yellow";
			selectElement.style.color = "black";
		} else if (selectedValue == 2) {
			selectElement.style.backgroundColor = "orange";
			selectElement.style.color = "white";
		} else if (selectedValue == 3) {
			selectElement.style.backgroundColor = "red";
			selectElement.style.color = "white";
		}
	}
</script>
</body>
</html>
