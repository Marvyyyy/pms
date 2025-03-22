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
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div>
    </section> -->

    <!-- Main content -->
    <section class="content pt-3">

      <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Project Lists</h3>
								
								<?php if($this->session->userdata('role_id')==3){ ?>
								<div class="card-tools">
                <a href="<?=base_url()?>project/project_add" type="button" class="btn btn-success btn-sm" >Add Project
                </a>
              	</div>
								<?php } ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="project_tbl" class="table table-sm table-hover table-head-fixed text-nowrap">
                  <thead class="">
                  <tr>
                    <th>Project Name</th>
                    <th>Progress</th>
                    <th>Status</th>
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
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?=base_url()?>asset/dist/js/demo.js"></script> -->
<script>
  $(function () {
    $('#project_tbl').DataTable({
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
				"url": "<?php echo base_url(); ?>project/get_all_project",
				"type": "POST",
			},
    });
  });
</script>
</body>
</html>
