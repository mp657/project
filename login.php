<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
		<label for="example-text-input" class="col-md-3 col-form-label">username</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="reg_uname" placeholder="Enter Email Address" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">Password</label>
		<div class="col-md-8">
			<input class="form-control" type="password" name="reg_password" placeholder="Enter Password" id="example-text-input">
			<input type="hidden" name="action" value="test_user"/>
		</div>
	</div>
	<button id="ed_submit" name="submit" class="btn btn-primary">Login</button>
  </form>
  <br/>
  Not have an account? <a href="register.php">Click here</a> 
</div>
</div>
</body>
</html>
