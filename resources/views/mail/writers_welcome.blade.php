<style>
	.auth-btn{
		font-weight: 600; background-color: #1d2840; color: white; padding: 7px 12px; border: 1px solid transparent; border-radius: 5px; text-decoration:none;
	}
	.auth-btn:hover{
		background-color: transparent; border: 1px solid #1d2840; color: #1d2840;
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
<h3>Hi {{ $user->username }}</h3>

<p>Welcome to {{ env('APP_NAME')}}.</p>
@php
	$email = $user->email;
	$verification_code = $user->verification_code;
@endphp

	<p>
        We are excited to have you on board as a writer.
        Here, you will connect with other writers, share your writing and thrill thousands of readers around the world.
        We believe that writing is supernatural and powerful, we are committed to helping you develop your skills and achieve your goals as a writer.
    </p>
	<p>
        To get started, we recommend that you take few minutes to explore our website. You can also join our social media channels to stay up-to-date with us.

    </p>

	<p>
        If you have any questions or need assistance, please don't hesitate to reach out to us at <strong>contact@storihom.com</strong>  We are here to support you every step of the way!
    </p>

	<p>
        Thank you for joining our writing community.
    </p>

    <p><strong>Big-Hug!</strong></p>
    <hr>
	<p>This message was sent to you by {{env("APP_NAME")}}</p>

	<p>For support, contact us via <a href="mail-to:contact@{{env('APP_DOMAIN')}}"></a>contact@{{env('APP_DOMAIN')}}</p>
	<img src="{{ asset('assets/img/logo/icon_1.png') }}"  style="width: 60px;">
	<p style="font-size:12px;">Copyright &copy; {{env(APP_NAME)}} - 2023 </p>