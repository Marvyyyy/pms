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
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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

    <!-- Main content -->
    <section class="content pt-3">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Add Project</h3>
              <!-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div> -->
            </div>
            <div class="card-body">
				<form id="add_form">
				<input type="hidden" name="insert" id="ID" value="insert">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="inputName">Project Name</label>
								<input type="text" class="form-control" name="name" id="name">
								<span class="text-danger" id="name_error"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="inputDescription">Project Description</label>
								<textarea class="form-control" rows="4" name="description" id="description"></textarea>
								<span class="text-danger" id="description_error"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="inputStatus">Status</label>
										<select class="form-control custom-select" name="status" id="status">
											<option selected disabled>Select one</option>
											<?php foreach($status as $item){ ?>
											<option value="<?=$item['id']?>"><?=$item['status']?></option>
											<?php } ?>
										</select>
										<span class="text-danger" id="status_error"></span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="inputStatus">Target Date</label>
										<div class="input-group date" id="reservationdate" data-target-input="nearest">
											<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="deadline" id="deadline"/>
											<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>
										</div>
										<span class="text-danger" id="deadline_error"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="inputClientCompany">Client Company</label>
								<input type="text" id="inputClientCompany" class="form-control" name="client" id="client">
								<span class="text-danger" id="client_error"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="p_manager">Project Leader</label>
								<select class="form-control custom-select" data-placeholder="Select a members" name="p_manager" id="p_manager">
									<option selected disabled>Select a Project Manager</option>
									<?php foreach($p_manager as $item){ ?>
									<option value="<?=$item['id']?>"><?=$item['first_name'].' '.$item['middle_name'].' '.$item['last_name']?></option>
									<?php } ?>
								</select>
								<span class="text-danger" id="p_manager_error"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Project Members</label>
								<div class="select2-cyan">
									<select class="select2" multiple="multiple" data-placeholder="Select a members" style="width: 100%;" name="member[]" id="member">
										<?php foreach($p_members as $item){ ?>
										<option value="<?=$item['id']?>"><?=$item['first_name'].' '.$item['middle_name'].' '.$item['last_name']?></option>
										<?php } ?>
									</select>
									<span class="text-danger" id="member_error"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 mb-3">
							<label for="inputName" style="display:none;" id="projMods">Project Modules</label>
							<div id="input_fields_container3">

							</div>
							<a type="button" id="add_field_button3" class="add_field_button3">Add Project Modules</a>
						</div>
						<div class="col-md-6 col-sm-12">
							<label for="inputName" style="display:none;" id="systemCreds">System Credentials</label>
							<!-- <div class="row">
								<div class="col-md-4 col-12">
									<div class="form-group">
										<input type="text" class="form-control" name="usertype[]" id="usertype" placeholder="Usertype">
										<span class="text-danger" id="name_error"></span>
									</div>
								</div>
								<div class="col-md-4 col-12">
									<div class="form-group">
										<input type="text" class="form-control" name="username[]" id="username" placeholder="Username">
										<span class="text-danger" id="name_error"></span>
									</div>
								</div>
								<div class="col-md-3 col-12">
									<div class="form-group">
										<input type="text" class="form-control" name="password[]" id="password" placeholder="Password">
										<span class="text-danger" id="name_error"></span>
									</div>
								</div>
								<div class="col-md-1 col-12">
									<a class="remove_field p-1">
										<button type="button" class="btn btn-xs btn-warning">remove</button>
									</a>
								</div>
							</div> -->
							<div id="input_fields_container">

							</div>
							<a type="button" id="add_field_button" class="add_field_button">Add System Credentials</a>
						</div>
						<div class="col-md-6 col-sm-12">
							<label for="inputName" style="display:none;" id="projLinks">Project Links</label>
							<!-- <div class="row">
								<div class="col-md-11 col-12">
									<div class="form-group">
										<input type="text" class="form-control" name="links[]" id="links" placeholder="Link for project system">
										<span class="text-danger" id="name_error"></span>
									</div>
								</div>
								<div class="col-md-1 col-12">
									<a class="remove_field2 p-1">
										<button type="button" class="btn btn-xs btn-warning">remove</button>
									</a>
								</div>
							</div> -->
							<div id="input_fields_container2">

							</div>
							<a type="button" id="add_field_button2" class="add_field_button2">Add Project Links</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<input type="submit" value="Create new Project" class="btn btn-success float-right">
							<button  class="btn btn-secondary float-right mr-2" onclick="history.back()">Cancel</button>
						</div>
					</div>
				</form>
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
						$('#deadline_error').html(rs.deadline_error);
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
							location.href=rs.url;
							// location.reload();
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
<script>
$(document).ready(function(){
    var container = $('#input_fields_container');
    var add_button = $('#add_field_button');

    var field_html = '<div class="row"><div class="col-md-4 col-12"><div class="form-group"><input type="text" class="form-control" name="usertype[]" id="usertype" placeholder="Usertype"><span class="text-danger" id="usertype_error"></span></div></div><div class="col-md-4 col-12"><div class="form-group"><input type="text" class="form-control" name="username[]" id="username" placeholder="Username"><span class="text-danger" id="username_error"></span></div></div><div class="col-md-3 col-12"><div class="form-group"><input type="text" class="form-control" name="password[]" id="password" placeholder="Password"><span class="text-danger" id="password_error"></span></div></div><a class="remove_field p-1 col-md-1 col-12"><button type="button" class="btn btn-xs btn-warning">remove</button></a></div>';
    $(add_button).click(function(e){
        e.preventDefault();
		document.getElementById("systemCreds").style.display = "";
        $(container).append(field_html);
    });

    $(container).on('click', '.remove_field', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
    });

    var container2 = $('#input_fields_container2');
    var add_button2 = $('#add_field_button2');

    var field_html2 = '<div class="row"><div class="col-md-11 col-12"><div class="form-group"><input type="text" class="form-control" name="links[]" id="links" placeholder="Link for project system"><span class="text-danger" id="links_error"></span></div></div><a class="remove_field_2 p-1 col-md-1 col-12"><button type="button" class="btn btn-xs btn-warning">remove</button></a></div>';
    $(add_button2).click(function(e){
        e.preventDefault();
		document.getElementById("projLinks").style.display = "";
        $(container2).append(field_html2);
    });

    $(container2).on('click', '.remove_field_2', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
    });

    var container3 = $('#input_fields_container3');
    var add_button3 = $('#add_field_button3');

    var field_html3 = '<div class="row"><div class="col-md-11 col-12"><div class="form-group"><input type="text" class="form-control" name="modules[]" id="modules" placeholder="Please enter modules of the project"><span class="text-danger" id="links_error"></span></div></div><a class="remove_field_3 p-1 col-md-1 col-12"><button type="button" class="btn btn-xs btn-warning">remove</button></a></div>';
    $(add_button3).click(function(e){
        e.preventDefault();
		document.getElementById("projMods").style.display = "";
        $(container3).append(field_html3);
    });

    $(container3).on('click', '.remove_field_3', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
    });
});
</script>
</body>
</html>
