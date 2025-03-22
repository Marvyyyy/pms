
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ITBS-PMSv2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>asset/dist/css/adminlte.min.css">
</head>
<style>
	body {
		background-image: url("<?=base_url()?>asset/img/bg.jpg");

		/* Full height */
		height: 100%;

		/* Center and scale the image nicely */
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success"style="border-radius: 1rem;">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h5" style="font-family: 'Poppins', sans-serif;"><b>Project Management System</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in with your credentials.</p>

      <form id="formLogin">
				<div class="row mb-3">
					<div class="col-12">
						<span class="text-danger" id="error_message"></span>
					</div>
				</div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" id="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-tie"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- <div class="col-4"> -->
            <button type="submit" class="btn btn-success btn-block">Sign In</button>
          <!-- </div> -->
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>asset/dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function () {
      $("#formLogin").submit(function (e) {
          e.preventDefault();
          var formData = $(this).serialize();
          $.ajax({
              url: "<?=base_url();?>user/login",
              type: "POST",
              dataType: "json",
              data: formData,
              success: function (data) {
                if(data.response=='yes'){
                  $("#password").val("");
                  window.location.href = '<?=base_url()?>user';
                }else{
									$("#error_message").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+data.response+'</div>');
                  $("#password").val("");
                }
                 
              },
              error: function (jXHR, textStatus, errorThrown) {
                  alert(errorThrown);
              }
          });
      });
  });
</script>
</body>
</html>
