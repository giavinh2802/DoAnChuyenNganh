@extends('layout')
@section('content')
<link href="{{asset('public/backend/css/validation.css')}}" rel="stylesheet"></link>
<section id="form">
	<!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form">
					<!--login form-->
					<h2>Đăng nhập</h2>
					<?php
					//Lấy message
					$message = Session::get('message');

					if ($message) {
						echo '<span class="text-alert" style="color:red;">' . $message . '</span>';
						Session::put('message', null);
					}
					?>
					<form action="{{URL::to('/login-customer')}}" method="GET" id="form-1" class="form">
						{{csrf_field()}}
						<div class="form-group">
							<input id="email_account" name="email_account" type="text" placeholder="VD: email@domain.com" class="form-control">
							<span class="form-message"></span>
						</div>
						<div class="form-group">
							<input id="password_account" name="password_account" type="password" placeholder="Nhập mật khẩu" class="form-control">
							<span class="form-message"></span>
						</div>

						<!-- <input type="text" name="email_account" placeholder="Email*" />
						<input type="password" name="password_account" placeholder="Mật khẩu" /> -->
						<span>
							<input type="checkbox" class="checkbox">
							Ghi nhớ đăng nhập
						</span>
						<button type="submit" class="btn btn-default">Đăng nhập</button>
					</form>
				</div>
				<!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">Hoặc</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form">
					<!--sign up form-->
					<h2>Đăng ký</h2>
					<form action="{{URL::to('/save-customer')}}" method="POST" id="form-2" class="form">
						{{csrf_field()}}
						<div class="form-group">
							<input id="customer_name" name="customer_name" type="text" placeholder="VD: Gia Vinh" class="form-control">
							<span class="form-message"></span>
						</div>

						<div class="form-group">
							<input id="customer_email" name="customer_email" type="text" placeholder="VD: email@domain.com" class="form-control">
							<span class="form-message"></span>
						</div>

						<div class="form-group">
							<input id="customer_password" name="customer_password" type="password" placeholder="Nhập mật khẩu" class="form-control">
							<span class="form-message"></span>
						</div>

						<div class="form-group">
							<input id="customer_phone" name="customer_phone" type="number" placeholder="Số điện thoại" class="form-control">
							<span class="form-message"></span>
						</div>

						<!-- <input type="text" name="customer_name" placeholder="User" />
						<input type="email" name="customer_email" placeholder="Điền email" />
						<input type="password" name="customer_password" placeholder="Mật khẩu" />
						<input type="number" name="customer_phone" placeholder="phone" /> -->
						<button type="submit" class="btn btn-default">Đăng ký</button>
					</form>
				</div>
				<!--/sign up form-->
			</div>
		</div>
	</div>
</section>
<!--/form-->
<!-- Scripts -->
<script src="{{asset('public/backend/js/validation.js')}}"></script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Mong muốn của chúng ta
		Validator({
			form: '#form-1',
			formGroupSelector: '.form-group',
			errorSelector: '.form-message',
			rules: [

				Validator.isEmail('#email_account'),
				Validator.minLength('#password_account', 6),

			],
			onSubmit: function(data) {
				// Call API
				console.log(data);
			}
		});


		Validator({
			form: '#form-2',
			formGroupSelector: '.form-group',
			errorSelector: '.form-message',
			rules: [
				Validator.isRequired('#customer_name'),
				Validator.isEmail('#customer_email'),
				Validator.minLength('#customer_password', 6),
				Validator.isRequired('#customer_phone')
			],
			onSubmit: function(data) {
				// Call API
				console.log(data);
			}
		});
	});
</script>
@endsection