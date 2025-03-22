<nav class="main-header navbar navbar-expand navbar-secondary navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

	<!-- Success modal vertically centered -->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- <div class="modal-header">
					<h4 class="modal-title">Success Modal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div> -->
				<div class="modal-body">
					<h5>Are you sure you want to log out?</h5>
				</div>
				<div class="modal-footer justify-content-between p-1">
					<div class="row" style="display: contents;">
						<div class="col-6" style="display: grid;">
							<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
						</div>
						<div class="col-6" style="display: grid;">
							<a href="<?=base_url()?>user/logout" class="btn btn-success" >Yes</a>
						</div>
					</div>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
