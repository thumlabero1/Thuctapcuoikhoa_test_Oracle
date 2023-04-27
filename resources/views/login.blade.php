<!DOCTYPE html>
<html>
<head>
  <meta name="google-signin-client_id" content="YOUR_CLIENT_ID">
	<style>
		form {
			width: 300px;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="text"], input[type="password"] {
			width: 100%;
			padding: 5px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
    /* CSS cho nút đăng nhập bằng Google */
  .google-btn {
    background: #4285F4;
    color: white;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    padding: 10px;
    box-shadow: 0px 2px 5px -1px rgba(0,0,0,0.2);
  }
  .google-btn:hover {
    background: #357AE8;
  }
  .google-icon-wrapper {
    width: 20px;
    height: 20px;
    margin-right: 10px;
    display: inline-block;
    background-color: white;
    border-radius: 5px;
    padding: 5px;
    box-shadow: 1px 1px 1px grey;
  }
  .google-icon {
    width: 100%;
    height: 100%;
  }
	</style>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
	<form class="mx-auto" action="/login/storeuser" method="post">
		<label for="username">Tên đăng nhập:</label>
		<input type="text" id="username" name="username" >
		<label for="password">Mật khẩu:</label>
		<input type="password" id="password" name="password" >
		<button type="submit" class="btn btn-success" value="Đăng nhập">Đăng nhập</button>
    <br>
</br>
    <!-- Thêm nút đăng nhập bằng Google -->
    <a href="{{ url('auth/google') }}" class="btn btn-google">
    <i class="fas fa-google-plus-g"></i> Đăng nhập bằng Google
	</a>
	<a href="/" class="btn btn-google">
    <i class="fas fa-google-plus-g"></i> Trở về trang chính
	</a>
	</form>
</body>
<!-- Thêm đoạn script để hiển thị nút đăng nhập bằng Google -->

</html>
