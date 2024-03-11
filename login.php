<?php
include('config.php');
error_reporting(0);
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
	$msg = 0;
	
    $sql = "SELECT * FROM admin_users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $msg = 0;
		$_SESSION['user_id'] = 1;
		header("Location: dashboard.php");
    } else {
        $msg = 1;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin || Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container login-form">
	  
	  <h2 class='text-center'>
		<img src="assets/logo.jpg" alt="Logo"><br>
			Welcome to Admin Panel
		</h2>
		<br>
	  <form action="login.php" method="POST">
		<strong class='text-danger'>
			<?php 
				if($msg == 1){
					echo 'Invalid Credentials';
				}
			?>
		</strong>
		<div class="form-group">
		  <input type="email" class="form-control" placeholder="Enter your email" name="email">
		</div>
		<div class="form-group">
		  <input type="password" class="form-control" placeholder="Enter your password" name="password">
		</div>
		<button type="submit" class="btn btn-default btn-block">Login</button>
	  </form>
	</div>
	
	<style>
		.login-form{
			width: 30%;
			box-shadow: 0px 0px 10px 0px #ddd;
			border-radius: 4px;
			padding: 30px;
			margin: 0 auto;
			margin-top: 10%;
		}
		.btn-default{
			background: #841c94;
			color: #fff;
			font-weight: bold;
			font-size: 18px;
			letter-spacing: 2px;
		}
		.btn-default:hover{
			background: #60106c;
			color: #fff;
			font-weight: bold;
			font-size: 18px;
			letter-spacing: 2px;
		}
	<style>
	
</body>
</html>
