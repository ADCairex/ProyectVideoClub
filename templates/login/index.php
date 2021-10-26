<!DOCTYPE html>
<html>
<head>
	<title>Insert data in MySQL database using Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../../css/styleIndex.css">

</head>
<body>
<!-- <?php

include '../../templates/header.php';
?> -->
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
			<input type="password" class="form-control" id="password" placeholder="Password" name="password">
		</div>
		<input type="button" name="save" class="btn btn-primary" value="Register" id="butsave">
	</form>
	<form id="login_form" name="form1" method="post" style="display:none;">
		
		<div class="form-group">
			<label for="pwd">Username:</label>
			<input type="text" class="form-control" id="usernameLog" placeholder="Email" name="usernameLog">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password_log" placeholder="Password" name="password_log">
		</div>
		<input type="button" name="save" class="btn btn-primary" value="Login" id="butlogin">
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
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var username = $('#username').val();
		var name = $('#name').val();
		var surname = $('#surname').val();
		var email = $('#email').val();
		var pass = $('#password').val();
		if(name!="" && username!="" && surname!="" && email!="" && pass!="" ){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					type: 1,
					username: username,
					name: name,
					surname: surname,
					email: email,
					pass: pass						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#register_form').find('input:text').val('');
						$("#success").show();
						$('#success').html('Registration successful !'); 						
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Email ID already exists !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
	$('#butlogin').on('click', function() {
		var username = $('#usernameLog').val();
		var pass = $('#password_log').val();
		if(username!="" && pass!="" ){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					type:2,
					username: username,
					pass: pass						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						location.href = "welcome.php";						
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Invalid EmailId or Password !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>

<!-- <?php

            include '../../templates/footer.php';
        ?> -->
</body>
</html>    