<!DOCTYPE html>
<html>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill9/dist/polyfill.js"></script>

	<head>
		<meta charset="utf-8">
		<title>Login Form</title>
		<style>

            body{
                background-color: #83c8f0
            }
		.login-form {
			width: 300px;
			margin: 0 auto;
			font-family: Tahoma, Geneva, sans-serif;
		}
		.login-form h1 {
			text-align: center;
			color: #4d4d4d;
			font-size: 24px;
			padding: 20px 0 20px 0;
		}
		.login-form input[type="password"],
		.login-form input[type="text"] {
			width: 100%;
			padding: 15px;
			border: 2px solid #850404;
			margin-bottom: 15px;
			box-sizing:border-box;
		}
		.login-form input[type="submit"] {
			width: 100%;
			padding: 15px;
			background-color: #535b63;
			border: 0;
			box-sizing: border-box;
			cursor: pointer;
			font-weight: bold;
			color: #56f4fa;
		}
		</style>
	</head>
	<body>
		<div class="login-form">
			<h1>Teacher Login</h1>
			<form action="{{ URL::to('post/teacher/login')}}" method="POST">
                @csrf

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

				<input type="text" name="email" placeholder="Email" >
				<input type="password" name="password" placeholder="Password" >
				<input type="submit" value="Log In" onclick="click()">
				<script>
					function click(){
						swal ("You are logged in");
					}
				</script>
				<br>
			</form>
		</div>
		<script src="assets/js/jquery-3.2.1.min.js"></script>
	</body>
</html>
