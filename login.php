<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./Resources/Stylesheets/login.css">
	<title>Login - New Victory Motors</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="#">New Victory Motors</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav ml-auto">
      			<li class="nav-item active">
      			 	<a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
      			</li>
    		</ul>
  		</div>
	</nav>
	<div class="login_box">
		<h2>Login</h2><br>
		<form action="./Resources/PHP/login.php" method="POST">
		<div id="login_box" class="container">
			<label>Username</label><br>
			<i class="fa fa-user"></i>&nbsp<input placeholder="Enter Username" type="text" class="login_inputs" name="username" required=""><br>
			<hr>
			<label>Password</label><br>
			<i class="fa fa-key" aria-hidden="true"></i>&nbsp<input placeholder="Enter Password" type="Password" class="login_inputs" name="password" required=""><br>
			<hr>
			<button type="submit" class="btn btn-outline-success login_button"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
		</div>
		</form>
	</div>
<?php	
if(isset($_GET['error']))
{
	echo '
		<div class="alert alert-danger alert-dismissible" id="alert">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<span id="alert_text"><strong>Login Failed!</strong> Incorrect Username or Password</span>
		</div>
	';
}
?>
</body>
</html>
