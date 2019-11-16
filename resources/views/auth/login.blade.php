<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	@include('backend.includes.global-styles')
	<!-- /global stylesheets -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/app.js"></script>

	<script type="text/javascript" src="assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					{{-- @if($errors->any())
						@foreach ($errors->all() as $error)
						<h1>{{ $error }}</h1>
						@endforeach
					@endif --}}
					<form role="form" method="POST" action="{{ url('/login') }}">
            		{{ csrf_field() }}
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div style="padding:10px 0;">
									<img src="{{ asset('images/logo/logo.png') }}" alt="Baznas Kota Bogor" style="height:150px;">
								</div>
								<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Username" name="email" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn bg-pink-400 btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="text-center">
								BAZNAS Kota Bogor @ 2017
							</div>
						</div>
					</form>
					<!-- /simple login form -->

					
					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2017. <a href="#">Badan Amil Zakat Nasional (BAZNAS) Kota Bogor</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
