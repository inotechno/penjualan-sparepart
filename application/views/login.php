
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/assets/img/favicon.png') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Components Documentation - Paper Dashboard 2 by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?= base_url('assets/assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/assets/css/paper-dashboard.css?v=2.0.1') ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url('assets/assets/demo/demo.css') ?>" rel="stylesheet" />
</head>

<body class="offline-doc">
  
  <div class="page-header clear-filter">
    <div class="page-header-image" style="background-image: url('assets/assets/img/jan-sendereks.jpg')"></div>
    <div class="container text-center">
      <div class="col-md-4 ml-auto mr-auto">
        <img src="<?= base_url('assets/assets/img/logo.png') ?>">
        <div class="card py-4">
            <div class="card-body">
                <form method="post" id="form-login">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="password" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
                  

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>  
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-black  footer-white ">
    <div class="container-fluid">
      <div class="row">
        <nav class="footer-nav">
          <ul>
            <li><a href="https://www.creative-tim.com" target="_blank">BasisCoding</a></li>
            <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
            <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
          </ul>
        </nav>
        <div class="credits ml-auto">
          <span class="copyright">
            © <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="fa fa-heart heart"></i> by BasisCoding
          </span>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/assets/js/core/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?= base_url('assets/assets/js/plugins/chartjs.min.js') ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/assets/js/plugins/bootstrap-notify.js') ?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/assets/js/paper-dashboard.min.js?v=2.0.1') ?>" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?= base_url('assets/assets/demo/demo.js') ?>"></script>
    <script type="text/javascript">
    	$(function() {
    		$('#form-login').on('submit', function() {
    			
			    if ($('[name="email"]').val().length == 0){
			        $('[name="email"]').addClass('border-danger');
			        $('[name="email"]').focus();
			        return false;
			    }
			    if ($('[name="password"]').val().length == 0){
			        $('[name="password"]').addClass('border-danger');
			        $('[name="password"]').focus();
			        return false;
			    }

			    var password = $('[name="password"]').val();
			    var email    = $('[name="email"]').val();

			    $.ajax({
			    	url: '<?= base_url('Login/proses_login') ?>',
			    	type: 'POST',
			    	dataType: 'JSON',
			    	data: {email:email, password:password},
			    	beforeSend: function()
				    { 
				    	$("#btn-login").html('<span class="fa fa-space-shuttle"></span>   sending ...');
				    },
				    success: function (response) {
				    	$("#btn-login").html('Sign In');

				    	$.notify({
                          icon: "nc-icon nc-bell-55",
                          message: response.message

                        }, {
                          type: response.status,
                          timer: 8000,
                          placement: {
                            from: 'top',
                            align: 'center'
                          }
                        });
                        

                        setTimeout(function(){ 
                          window.location.href = response.redirect;
                        }, 1500);
				    }
			    });

                return false;
    		});
    	});
    </script>
</body>
</html>
