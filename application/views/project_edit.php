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
				<form id="edit_form">
				<input type="hidden" name="update" id="ID" value="<?=$project['pID']?>">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="inputName">Project Name</label>
								<input type="text" class="form-control" name="name" id="name" value="<?=$project['project_name']?>">
								<span class="text-danger" id="name_error"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="inputDescription">Project Description</label>
								<textarea class="form-control" rows="4" name="description" id="description" value="<?=$project['project_desc']?>"><?=$project['project_desc']?></textarea>
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
											<?php foreach($status as $item){ ?>
											<?php if($project['project_status_id'] == $item['id']){$selected = 'selected';}else{$selected = '';} ?>
											<option value="<?=$item['id']?>" <?=$selected?>><?=$item['status']?></option>
											<?php } ?>
										</select>
										<span class="text-danger" id="status_error"></span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="deadline">Target Date</label>
										<input type="date" class="form-control " data-target="#reservationdate" name="deadline" id="deadline" value="<?=$project['target_date']?>">
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
								<input type="text" id="inputClientCompany" class="form-control" name="client" id="client" value="<?=$project['client']?>">
								<span class="text-danger" id="client_error"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="p_manager">Project Leader</label>
								<select class="form-control custom-select" data-placeholder="Select a members" name="p_manager" id="p_manager">
									<?php foreach($p_manager as $item){ ?>
									<?php if($project['project_manager_id'] == $item['id']){$selected = 'selected';}else{$selected = '';} ?>
									<option value="<?=$item['id']?>" <?=$selected?>><?=$item['first_name'].' '.$item['middle_name'].' '.$item['last_name']?></option>
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
									<?php 	
									foreach($members as $item){ ?>
									<?php 	
										foreach($p_members as $p_member){
											if($p_member['user_id']==$item['id']){
												$selected = 'selected';
											}else{
												$selected = '';
											}
									?>
									<option value="<?=$item['id']?>" <?=$selected?>><?=$item['first_name'].' '.$item['middle_name'].' '.$item['last_name']?></option>
									<?php
										} 
									} 
									?>
									</select>
									<span class="text-danger" id="member_error"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<label for="inputName" id="systemCreds">Modules</label>
							<div class="row" style="font-size: x-small;">
								<div class="col-md-11 col-12">
									<p class="mb-0" for="inputName"><i>Module names</i></p>
								</div>
								<div class="col-md-1 col-12">
								</div>
							</div>
							<div id="input_fields_container_3">
							<?php foreach($modules as $item){?>
								<div class="row">
									<div class="col-md-11 col-12">
										<div class="form-group">
											<input type="hidden" class="form-control" name="moduleID[]" id="moduleID" placeholder="Usertype" value="<?=$item['id']?>">
											<input type="text" class="form-control" name="module[]" id="module" placeholder="Module name" value="<?=$item['module_name']?>">
											<span class="text-danger" id="module_error"></span>
										</div>
									</div>
									<a class="remove_field_3 p-1 col-md-1 col-12">
										<button type="button" class="btn btn-xs btn-warning">remove</button>
									</a>
								</div>
							<?php } ?>
							</div>
							<div id="input_fields_container_add_3">
							</div>

							<a type="button" id="add_field_button_3" class="add_field_button_3">Add Modules</a>
						</div>
						<div class="col-md-6 col-sm-12">
							<label for="inputName" id="systemCreds">System Credentials</label>
							<div class="row" style="font-size: x-small;">
								<div class="col-md-4 col-12">
									<p class="mb-0" for="inputName"><i>Usertype</i></p>
								</div>
								<div class="col-md-4 col-12">
									<p class="mb-0" for="inputName"><i>Username</i></p>
								</div>
								<div class="col-md-3 col-12">
									<p class="mb-0" for="inputName"><i>Password</i></p>
								</div>
								<div class="col-md-1 col-12">
								</div>
							</div>
							<div id="input_fields_container_1">
							<?php foreach($creds as $item){?>
								<div class="row">
									<div class="col-md-4 col-12">
										<div class="form-group">
											<input type="hidden" class="form-control" name="credsID[]" id="credsID" placeholder="Usertype" value="<?=$item['id']?>">
											<input type="text" class="form-control" name="usertype[]" id="usertype" placeholder="Usertype" value="<?=$item['user_type']?>">
											<span class="text-danger" id="name_error"></span>
										</div>
									</div>
									<div class="col-md-4 col-12">
										<div class="form-group">
											<input type="text" class="form-control" name="username[]" id="username" placeholder="Username" value="<?=$item['username']?>">
											<span class="text-danger" id="name_error"></span>
										</div>
									</div>
									<div class="col-md-3 col-12">
										<div class="form-group">
											<input type="text" class="form-control" name="password[]" id="password" placeholder="Password" value="<?=$item['password']?>">
											<span class="text-danger" id="name_error"></span>
										</div>
									</div>
									<a class="remove_field_1 p-1 col-md-1 col-12">
										<button type="button" class="btn btn-xs btn-warning">remove</button>
									</a>
								</div>
							<?php } ?>
							</div>
							<div id="input_fields_container_add_1">
							</div>

							<a type="button" id="add_field_button_1" class="add_field_button_1">Add System Credentials</a>
						</div>
						<div class="col-md-6 col-sm-12">
							<label for="inputName"id="projLinks">Project Links</label>
							<div id="input_fields_container_2">
							<div class="row" style="font-size: x-small;">
								<div class="col-md-11 col-12">
									<p class="mb-0" for="inputName"><i>Please provide a complete URL.</i></p>
								</div>
								<div class="p-1 col-md-1 col-12">
								</div>
							</div>
							<?php foreach($links as $item){?>
								<div class="row">
									<div class="col-md-11 col-12">
										<div class="form-group">
											<input type="hidden" class="form-control" name="linksID[]" id="linksID" placeholder="Link for project system" value="<?=$item['id']?>">
											<input type="text" class="form-control" name="links[]" id="links" placeholder="Link for project system" value="<?=$item['links']?>">
											<span class="text-danger" id="name_error"></span>
										</div>
									</div>
									<a class="remove_field_2 p-1 col-md-1 col-12">
										<button type="button" class="btn btn-xs btn-warning">remove</button>
									</a>
								</div>
							<?php } ?>
							</div>
							<div id="input_fields_container_add_2">

							</div>
							<a type="button" id="add_field_button_2" class="add_field_button2">Add Project Links</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<input type="submit" value="Save" class="btn btn-success float-right">
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
		$('#edit_form').on('submit', function(e) {
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
						text: "Successfully saved!", 
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
	});
</script>
<script>
$(document).ready(function(){
    var container_1 = $('#input_fields_container_1');

    $(container_1).on('click', '.remove_field_1', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
		document.getElementById("usertype")(this).value = "";
    });
    var container_2 = $('#input_fields_container_2');

    $(container_2).on('click', '.remove_field_2', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
		document.getElementById("links")(this).value = "";
    });
    var container_3 = $('#input_fields_container_3');

    $(container_3).on('click', '.remove_field_3', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
		document.getElementById("module")(this).value = "";
    });
});
</script>
<script>
$(document).ready(function(){
    var container_add_1 = $('#input_fields_container_add_1');
    var container_add_2 = $('#input_fields_container_add_2');
    var container_add_3 = $('#input_fields_container_add_3');
    var add_button_1 = $('#add_field_button_1');
    var add_button_2 = $('#add_field_button_2');
    var add_button_3 = $('#add_field_button_3');

    var field_html_1 = '<div class="row"><div class="col-md-4 col-12"><div class="form-group"><input type="text" class="form-control" name="usertype_add[]" id="usertype_add" placeholder="Usertype"><span class="text-danger" id="usertype_add_error"></span></div></div><div class="col-md-4 col-12"><div class="form-group"><input type="text" class="form-control" name="username_add[]" id="username_add" placeholder="Username"><span class="text-danger" id="username_add_error"></span></div></div><div class="col-md-3 col-12"><div class="form-group"><input type="text" class="form-control" name="password_add[]" id="password_add" placeholder="Password"><span class="text-danger" id="password_add_error"></span></div></div><a class="remove_field_add_1 p-1 col-md-1 col-12"><button type="button" class="btn btn-xs btn-warning">remove</button></a></div>';

    var field_html_2 = '<div class="row"><div class="col-md-11 col-12"><div class="form-group"><input type="text" class="form-control" name="links_add[]" id="links_add" placeholder="Link for project system"><span class="text-danger" id="links_error"></span></div></div><a class="remove_field_add_2 p-1 col-md-1 col-12"><button type="button" class="btn btn-xs btn-warning">remove</button></a></div>';

    var field_html_3 = '<div class="row"><div class="col-md-11 col-12"><div class="form-group"><input type="text" class="form-control" name="module_add[]" id="module_add" placeholder="Module name"><span class="text-danger" id="module_add"></span></div></div><a class="remove_field_add_3 p-1 col-md-1 col-12"><button type="button" class="btn btn-xs btn-warning">remove</button></a></div>';

    $(add_button_1).click(function(e){
        e.preventDefault();
		document.getElementById("systemCreds").style.display = "";
        $(container_add_1).append(field_html_1);
    });

    $(add_button_2).click(function(e){
        e.preventDefault();
		document.getElementById("projLinks").style.display = "";
        $(container_add_2).append(field_html_2);
    });

    $(add_button_3).click(function(e){
        e.preventDefault();
		document.getElementById("projLinks").style.display = "";
        $(container_add_3).append(field_html_3);
    });

    $(container_add_1).on('click', '.remove_field_add_1', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
    });
    $(container_add_2).on('click', '.remove_field_add_2', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
    });
    $(container_add_3).on('click', '.remove_field_add_3', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
    });
});
</script>
</body>
</html>
