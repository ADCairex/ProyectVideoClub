<!DOCTYPE html>
<html>
<head>
	<title>Insert data in MySQL database using Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/styleIndex.css">
	    <!-- Cargo el Script Javascript que gestiona la vista -->
		<script type = "text/javascript" src = "../src/js/login.js"></script>			

</head>
<body>
 <?php
include '../src/php/sqlFunctions.php';
include '../src/php/utils.php';
?> 
<div class="containerPrincipal">
<div class="containerForm">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<div class="containerFormButtons">
	<button type="button" class="btn btn-success btn-sm" id="register">Register</button> 
	<button type="button" class="btn btn-success btn-sm" id="login">Login</button>
</div>
<form id="register_form" name="form1" method="post">
	<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" class="form-control" id="username" placeholder="Username" name="username">
		</div>
		<div class="form-group">
			<label for="email">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		</div>
		<div class="form-group">
			<label for="surname">Surname:</label>
			<input type="text" class="form-control" id="surname" placeholder="Surname" name="surname">
		</div>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pass" placeholder="Password" name="pass">
		</div>
		<input type="button" name="save" class="btn btn-primary" value="Register" id="butsave">
	</form>
	<form id="login_form" name="form1"  style="display:none;" onsubmit="return doLogin();">
		
		<div class="form-group">
			<label for="pwd">Username:</label>
			<input type="text" class="form-control" id="usernameLog" placeholder="Email" name="usernameLog">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password_log" placeholder="Password" name="password_log">
		</div>
		<!-- <input type="button" name="save" class="btn btn-primary" value="Login" id="butlogin"> -->
		<button class="w-100 btn btn-lg btn-primary signin-button" type="submit">Login</button>


		<p id="login-ok" style="display: none;">¡Login correcto!</p>
    	<p id="login-ko" style="display: none;">¡Login incorrecto! Comprueba el email y la contraseña</p>
	</form>
	</div>
</div>

<script>
$(document).ready(function() {
	$('#login').on('click', function() {
		$("#login_form").show();
		$("#register_form").hide();
	});
	$('#register').on('click', function() {
		$("#register_form").show();
		$("#login_form").hide();
	});
});
</script>

<!-- <?php
            include '../../templates/footer.php';
        ?> -->
</body>
</html>    