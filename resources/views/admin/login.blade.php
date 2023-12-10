<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign In</title>
  <link rel="icon" href="{{asset('admin-assets/images/logo.png')}}">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
<link rel="stylesheet" href="{{asset('admin-assets/css/login.css')}}">

</head>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content">
		<form action="{{route('admin.authenticate')}}" method="post">
			@csrf
                <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="email" class="login__input" placeholder="Email" value="{{old('email')}}" name="email">
				</div>
                @error('email')
								<span class="text-danger">
									{{$message}}
								</span>
							@enderror
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Password" name="password" value="{{old('password')}}">
				</div>
                @error('password')
								<span class="text-danger">
									{{$message}}
								</span>
							@enderror
				<button class="button login__submit" type="submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				<h3>Login Via</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<!-- partial -->
  
</body>
</html>
