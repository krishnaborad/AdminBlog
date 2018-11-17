<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRM</title>
  <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url ('l-vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url ('l-fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url ('l-fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url ('l-vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url ('l-vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url ('l-vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url ('l-vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url ('l-vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url ('l-css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url ('l-css/main.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<div class="limiter">
    <a href="{{url('/')}}"><i class="fa fa-arrow-circle-left" style="font-size:48px;color:white"></i><font color="white" size=""> Home</font></a>

		<div class="container-login100" >
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">

				<form class="login100-form validate-form flex-sb flex-w"  method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
					<span class="login100-form-title p-b-53">
						Sign In With
					</span>

					<a href="#" class="btn-face m-b-20">
						<i class="fa fa-facebook-official"></i>Facebook
					</a>

					<a href="#" class="btn-google m-b-20">
						<img src="{{url('l-images/icons/icon-google.png')}}" alt="GOOGLE">Google
					</a>

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Username
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100 {{ $errors->has('name') ? ' is-invalid' : '' }}"  type="text" name="name" value="{{ old('name') }}" required>
						<span class="focus-input100"></span>
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
					</div>
					<div class="p-t-31 p-b-9">
						<span class="txt1">
                Email
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" >
						<span class="focus-input100"></span>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Re-Enter Password
						</span>

					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password_confirmation" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button type="submit" class="login100-form-btn">
							{{ __('Register') }}
						</button>
					</div>

					<div class="w-full text-center p-t-55">

            <div class="col-md-12">

                Have an account ? &nbsp;<a href="{{ route('login') }}">LOGIN<a>
            </div>


					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{asset ('l-vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('l-vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('l-vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset ('l-vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('l-vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('l-vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset ('l-vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('l-vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('l-js/main.js')}}"></script>

</body>
</html>
