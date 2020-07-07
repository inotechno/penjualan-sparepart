<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register - SPSC PT. Yamaha</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/cs-skin-elastic.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/toast/dist/jquery.toast.min.css') ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="<?= base_url('assets/images/logo.png') ?>" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form id="form-register" method="POST">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" name="confirmpswd" placeholder="Konfirmasi Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="agreeterms"> Agree the terms and policy
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="#"> Sign in</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/toast/dist/jquery.toast.min.js') ?>"></script>
    <script type="text/javascript">
    	$(function() {
    		$('#form-register').on('submit', function() {
    			
	    		if ($('[name="fname"]').val().length == 0){
			        $('[name="fname"]').addClass('border-danger');
			        $('[name="fname"]').focus();
			        return false;
			    }
			    
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
			    if ($('[name="confirmpswd"]').val() != $('[name="password"]').val()){
			        $('[name="confirmpswd"]').addClass('border-danger');
			        $('[name="confirmpswd"]').focus();
			        return false;
			    }
			    if ($('[name="agreeterms"]').val().length == 0){
			        $('[name="agreeterms"]').addClass('border-danger');
			        $('[name="agreeterms"]').focus();
			        return false;
			    }

			    var fname    = $('[name="fname"]').val();
			    var lname    = $('[name="lname"]').val();
			    var password = $('[name="password"]').val();
			    var email    = $('[name="email"]').val();

			    $.ajax({
			    	url: '<?= base_url('Register/registration') ?>',
			    	type: 'POST',
			    	dataType: 'JSON',
			    	data: {fname:fname, lname:lname, email:email, password:password},
			    	beforeSend: function()
				    { 
				    	$("#btn-register").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
				    },
				    success: function (response) {
				    	$("#btn-register").html('Register');

                        if (response.status == 'success') {
    				    	$.toast({
    						    heading: 'success',
    						    text: response.message,
    						    showHideTransition: 'plain',
    						    icon: 'success',
    						    position: 'top-left',
        						stack: false
    						});
                        }else{
                            $.toast({
                                heading: 'error',
                                text: response.message,
                                showHideTransition: 'plain',
                                icon: 'error',
                                position: 'top-left',
                                stack: false
                            });
                        }

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
