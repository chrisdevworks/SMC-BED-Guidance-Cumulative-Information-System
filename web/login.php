<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
?>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Login | Welcome to SMC BED Guidance</title>
	<?php include('./header.php'); ?>
	<?php 
	if(isset($_SESSION['login_id'])){
		// header("location:index.php?page=home");
		?><meta http-equiv="refresh" content="0;url=index.php?page=home"><?php
		die();
	}
	?>
	<link href="assets/dist/css/mainpage/style.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
	body {
		width: 100%;
		height: calc(100%);
		position: fixed;
		top: 0;
		left: 0
			/*background: #007bff;*/
	}

	main#main {
		width: 100%;
		height: calc(85%);
		display: flex;
	}

	#myVideo {
		position: fixed;
		right: 0;
		bottom: 0;
		min-width: 100%;
		min-height: 100%;
		/* filter: brightness(50%); */
	}
	video {
		object-fit: contain;
	}
	video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
	}
</style>

<body class="bg-dark">
	<div class="myvid">
	<video disablePictureInPicture controlsList="nodownload" autoplay="" muted="" loop="" id="myVideo" equalizer-state="attached">
	<source src="assets/dist/css/mainpage/backgroundvid.mp4" type="video/mp4">
	</video>
	</div>

	<nav class="navbar navbar-expand-lg bg-smc">
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <div class="navbar-nav mr-auto mb-2 mb-lg-0 mx-auto">
                    <a class="navbar-brand" href="mainpage.php"><img src="assets/dist/css/mainpage/img/logo 1.png"
                        style="width:100%; height:auto; max-width:200px;" /></a>
                </div>
                <div class="navbar-nav mr-auto mb-2 mb-lg-0 mx-auto">
                    <a class="nav-link" href="mailto:info@smciligan.edu.ph" style="margin: auto; width: auto"><i class="bi bi-envelope px-2" style="font-size: 1.2rem; color: cornflowerblue;"></i> info@smciligan.edu.ph</a>
                    <a class="nav-link" href="tel:(063) 221-7134" style="margin: auto; width: auto"><i class="bi bi-phone px-2" style="font-size: 1.2rem; color: cornflowerblue;"></i> (063) 221-7134</a>
                    <a class="nav-link ml-auto" href="https://www.facebook.com/bed.smc/" style="margin: auto; width: auto"><i class="bi bi-facebook px-2" style="font-size: 1.2rem; color: cornflowerblue;"></i> bed.smc</a>
                </div>
				<?php if(!isset($_SESSION['login_id'])): ?>
				<div class="navbar-nav mr-auto mb-2 mb-lg-0 mx-auto">
					<span class="nav-item" id="loginbtn"><a href="mainpage.php"
                        class="nav-link nav-new_user tree-item"><i class="bi bi-house px-2" style="font-size: 1.2rem; color: cornflowerblue;"></i> Back to Main Page</a></span>
				</div>
				<?php endif; ?>
            </div>
        </div>
    </nav>

	<main id="main">
		<div class="align-self-center w-100">
			<h4 class="text-white text-center"><b>Welcome to SMC BED Guidance</b></h4>
			<div id="login-center" class="bg-dark row justify-content-center">
				<div class="card col-md-4">
					<div class="card-body">
						<form id="login-form">
							<div class="form-group">
								<label for="email" class="control-label text-dark">Email</label>
								<input type="text" id="email" name="email" class="form-control form-control-sm">
							</div>
							<div class="form-group">
								<label for="password" class="control-label text-dark">Password</label>
								<input type="password" id="password" name="password"
									class="form-control form-control-sm">
							</div>
							<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
	<footer class="px-auto bg-smc" id="footer">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; <a href target="_blank">St. Michael's College
					Information Technology Center</a> </p> 
					
		</div>
	</footer>

</body>
<script>
	$('#login-form').submit(function (e) {
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'ajax.php?action=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success: function (resp) {
				if (resp == 1) {
					location.href = 'index.php?page=home';
				} else {
					$('#login-form').prepend(
						'<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
	$('.number').on('input', function () {
		var val = $(this).val()
		val = val.replace(/[^0-9 \,]/, '');
		$(this).val(val)
	})

	$('.myvid').click(false);
</script>

</html>