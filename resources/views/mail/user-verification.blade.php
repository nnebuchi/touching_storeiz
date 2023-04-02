<style>
	.auth-btn{
		font-weight: 600; background-color: #FF8219; color: white; padding: 7px 12px; border: 1px solid transparent; border-radius: 5px; text-decoration:none;
	}
	.auth-btn:hover{
		background-color: transparent; border: 1px solid #FF8219; color: #FF8219;
	}
	.text-skezzole{
		color: #FF8219;
	}
</style>
<div class="row">
	<div  class="col-12 text-left">
		<img src="{{ asset('assets/img/logo/logo_1.png') }}"  style="width: 180px; margin-top: 20px;">
	</div>
</div>
<h3>Hey {{ $user->username }}</h3>

<p>Thank you for signing up on {{ env('APP_NAME')}}! You are off to an amazing start!</p>
@php
	$email = $user->email;
	$verification_code = $user->verification_code;
@endphp


	<p>As an extra security measure, please verify your email address for your account.
		Click the button below:
	</p>

	<p><a href="{{ url('verify-email/'.$email.'/'.$verification_code) }}" class="auth-btn">Verify Email</a></p>

	<p>OR</p>
	<p>Copy the link below and paste it in your favourite browser and hit the enter button</p>

	<a href="{{ url('verify-email/'.$email.'/'.$verification_code) }}">{{ url('verify-email/'.$email.'/'.$verification_code) }}</a>
	
	<hr>
	<p>This message was sent to you by {{env("APP_NAME")}}</p>

	<p>For support, contact us via <a href="mail-to:{{"contact@"}}{{env('APP_DOMAIN')}}">{{"contact@"}}{{env("APP_DOMAIN")}}</a></p>
	<img src="{{ asset('assets/img/logo/icon_1.png') }}"  style="width: 60px;">
	<p style="font-size:12px;">Copyright &copy; {{env("APP_NAME")}} - 2023 </p>