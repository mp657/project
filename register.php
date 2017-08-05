<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<body>
	<div class="container">&nbsp;</div>
<div class="container">
<div class="row">
<form method="post" action="index.php" name="form1">
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">First Name</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="user_fname" placeholder="Enter First Name" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">Last Name</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="user_lname" placeholder="Enter Last Name" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">Phone</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="user_pnumber" placeholder="Enter Phone" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">Email</label>
		<div class="col-md-8">
			<input class="form-control" type="email" name="reg_username" placeholder="Enter Email" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">Password</label>
		<div class="col-md-8">
			<input class="form-control" type="password" name="reg_password" placeholder="Enter Password" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">Gender</label>
		<div class="col-md-8">
			 <select class="form-control" name="gender">
			  <option value="volvo">Select Gender</option>
			  <option value="Male">Male</option>
			  <option value="Female">Female</option>
			</select> 
		</div>
	</div>
	<button class="btn btn-primary">Register</button>
	<input type="hidden" name="action" value="registrar">
  </form>
  <br/>
	Already have an account? <a href="login.php">Click here</a>
	
</div>
</div>
</body>
</html>

