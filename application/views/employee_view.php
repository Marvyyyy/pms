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
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-3">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
			<div class="row">
				<div class="col-12 col-md-12 col-lg-8 order-2 order-md-2">
					<div class="row">
						<div class="col-12 col-sm-4">
						<div class="info-box bg-light">
							<div class="info-box-content">
							<span class="info-box-text text-center text-muted">Tasks</span>
							<span class="info-box-number text-center text-muted mb-0"><?=$task_count?></span>
							</div>
						</div>
						</div>
						<!-- <div class="col-12 col-sm-4">
						<div class="info-box bg-light">
							<div class="info-box-content">
							<span class="info-box-text text-center text-muted">Total amount spent</span>
							<span class="info-box-number text-center text-muted mb-0">2000</span>
							</div>
						</div>
						</div>
						<div class="col-12 col-sm-4">
						<div class="info-box bg-light">
							<div class="info-box-content">
							<span class="info-box-text text-center text-muted">Estimated project duration</span>
							<span class="info-box-number text-center text-muted mb-0">20</span>
							</div>
						</div>
						</div> -->
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
												<th>Project</th>
												<th>Task</th>
												<th>Module</th>
												<th>Priority Level</th>
												<th>Target Date</th>
												<th>Status</th>
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
				</div>
				<div class="col-12 col-md-12 col-lg-4 order-1 order-md-1">
					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<!-- <div class="text-center">
							<img class="profile-user-img img-fluid img-circle"
								src="../../dist/img/user4-128x128.jpg"
								alt="User profile picture">
							</div> -->

							<h3 class="profile-username text-center"><?=$users['first_name'].' '.$users['middle_name'].' '.$users['last_name'] ?></h3>

							<p class="text-muted text-center"><?=$users['role_name']?></p>

							<ul class="list-group list-group-unbordered mb-3">
							<li class="list-group-item">
								<b>Email</b> <a class="float-right"><?=$users['email']?></a>
							</li>
							<li class="list-group-item">
								<b>Contact</b> <a class="float-right"><?=$users['contact']?></a>
							</li>
							<li class="list-group-item">
								<b>Last Time-In</b> <a class="float-right"></a>
							</li>
							</ul>

							<!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
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
				"url": "<?php echo base_url(); ?>employees/get_all_task/<?=$this->uri->segment(3)?>",
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
