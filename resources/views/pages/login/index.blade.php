<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - INNOVATIVE GOVERNMENT AWARD SULAWESI SELATAN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/login/images/logo-sulsel.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	@include('sweetalert::alert')
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/login/images/kantor.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="{{ route('login.proses') }}">
					@csrf
					<span class="login100-form-logo">
						<img src="/login/images/logo-sulsel.png" alt="" style="height: 80px;">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						<b>SELAMAT DATANG</b>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
						@error('username')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" id="password-login">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
						@error('password')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>

					<div class="form-check px-4 text-white mb-4">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
						<label class="form-check-label px-2" for="flexCheckDefault">
						  Show password
						</label>
					</div>

					<div class="row mb-4">
						<div class="col-lg-7 col-7">
							<div class="form-check text-white">
								<div class="captcha">
									{{-- <span>{!! captcha_img('flat') !!}</span> --}}
									<span class="">{!! captcha_img('flat') !!}</span>
									<button type="button" class="btn btn-danger btn-lg reload" id="reload">
										&#x21bb;
									</button>
								</div>
							</div>
						</div>

						<div class="col-lg-5 col-5 mt-1">
							<div class="">
								<input type="text" name="captcha" id="" placeholder="Captcha" class="form-control w-100 @error('captcha') is-invalid @enderror">
								@error('captcha')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					</div>
			
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	<script src="/assets/js/jquery.js"></script>
	<script src="/assets/js/script.js"></script>

<!--===============================================================================================-->
	<script src="/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/login/vendor/bootstrap/js/popper.js"></script>
	<script src="/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/login/js/main.js"></script>

</body>
</html>


