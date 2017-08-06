<?php
session_start();
require_once('db_connection.php');

$query =$db->query("select * from todos where id='".$_GET['edit']."'");
$feth=$query->fetch();

$catname = $db->query("select * from category where userid='".$_SESSION['my_id']."'");
$result_cat = $catname->fetchAll();

if(isset($_POST['submit']))
{
	$todotitle = $_POST['todotitle'];
	$description = $_POST['description'];
	$stime = $_POST['stime'];
	$etime = $_POST['etime'];

	$category = $_POST['category'];

	$sqlUp = $db->query("update todos set todo_item='".$todotitle."',
		description='".$description."',stime='".$stime."',etime='".$etime."',category='".$category."' where id='".$_GET['edit']."'");
	if($sqlUp)
	{
		echo '<script>window.location.href="list1.php"</script>';
	}
	else
	{
		echo '<script>window.location.href="list1.php?msg1=Error! Not update&edit='.$_GET['edit'].'"</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit | To do List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<body>
<div class="container">
<div class="col-md-8"><h4>Welcome, <?php echo  $_SESSION['email'];

 ?></h4></div>
<div class="col-md-4"><a href="logout.php">Logout</a></div>
</div>
<div class="container">
<div class="row">
<div class="panel-heading"><h4>Edit Details</h4></div>
<form method='post' action=''>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">To Do Title</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="todotitle" value="<?php echo $feth['todo_item']?>" placeholder="Enter To Do Title" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">Description</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="description" value="<?php echo $feth['description']?>" placeholder="Enter Description" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">Start Time</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="stime" value="<?php echo $feth['stime']?>" placeholder="Enter Start Time" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">End Time</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="etime" value="<?php echo $feth['etime']?>" placeholder="Enter Start Time" id="example-text-input">
		</div>
</div>

	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">List</label>
		<div class="col-md-8">

		<select name="category" class="form-control">
	 <?php
foreach ($result_cat as $key => $value) {
	# code...
?>

<option 
<?php
if($feth['category']==$value['id']){

	echo 'selected="selected"';
}

?>
 value="<?php echo $value['id']?>"><?php echo $value['title']?></option>
<?php

}
	 ?>
	</select>
</div> 
	</div>

	<input type="submit" name="submit"  class="btn btn-primary" value="Update"/>


	<a href="list1.php" class="btn btn-primary pull-right">Back</a>
	</form>
		</div>
</div>
</body>
</html>
