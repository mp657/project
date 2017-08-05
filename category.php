<?php
session_start();
require_once('db_connection.php');
$query = $db->query("select * from category where userid='".$_SESSION['my_id']."'");
$result = $query->fetchAll();
if(isset($_GET['edit'])){

$get_category_by_id = $db->query("select * from category where id='".$_GET['edit']."'");
$catresult = $get_category_by_id->fetch();
 
}


$message='';
if(isset($_POST['submit']))
{
	$category = trim($_POST['category']);


	$check_category = $db->query("select * from category where title='".$category."' and userid='".$_SESSION['my_id']."'");

	if($check_category->rowCount()<1){

		$insertcategory = $db->query("insert into category (title,userid) values ( '".$category."','".$_SESSION['my_id']."')");
		if($insertcategory){

			$message='Added successfully';

header("location:category.php");
		}
	}else{

		$message="already exist";
	}

}
	
	if(isset($_POST['update']))
{
	$category = trim($_POST['category']);


	$check_category = $db->query("select * from category where title='".$category."' and userid='".$_SESSION['my_id']."'");

	if($check_category->rowCount()<1){ 
 
		$updatecategory = $db->query("update   category set title='".$category."' where id='".$_GET['edit']."' 
			and userid='".$_SESSION['my_id']."'");

		echo "update   category set title='".$category."' where id='".$_GET['edit']."' 
			and userid=".$_SESSION['my_id']."'";
		if($updatecategory){

			$message='updated successfully';
 header("location:category.php");

 		 
	}else{

 header("location:category.php");
	}
}else{
 header("location:category.php");


}
}
	
if(isset($_GET['del'])){

	$delete_category = $db->query("delete from category where id='".$_GET['del']."' and userid='".$_SESSION['my_id']."'");

		$delete_todos = $db->query("delete from todos where category='".$_GET['del']."' and toda_userid	='".$_SESSION['my_id']."'");


if($delete_todos){

$message='deleted';

header("location:category.php");



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
			<div class="col-md-4"><a href="list1.php">Home</a></div>
			<div class="col-md-4"><a href="logout.php">Logout</a></div>
		</div>
		<div class="container">
			<div class="row">
				<div class="panel-heading"><h4>Edit Details</h4></div>
				<form method='post' action=''>
					<div class="form-group row">
						<label for="example-text-input" class="col-md-3 col-form-label">List</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="category" placeholder="List" 

value="<?php 

if(isset($_GET['edit'])){

 echo $catresult['title'];
}
?>">

							 
						

						</div>
					</div>
<?php if(isset($_GET['edit'])){
?>
					<input type="submit" name="update"  class="btn btn-primary" value="Update"/>

<?php 
}
else {?>

					<input type="submit" name="submit"  class="btn btn-primary" value="Save"/>

<?php
}
	?>
					
					<br/>
					<?php echo ucwords($message);?>

					<a href="list1.php" class="btn btn-primary pull-right">Back</a>
<?php if(isset($_GET['edit'])){
	?>
					<a href="category.php" class="btn btn-info pull-right">Add</a>
<?php }?>
				</form>
			</div>









			<table class="table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							List
						</th>
						<th>
							Action						</th>

						</tr>
					</thead>
					<tbody>

						<?php
						$i=1;
						foreach ($result as $key => $value) {
							?>
							<tr class="success">
								<td>
									<?php echo $i;?>
								</td>
								<td>
									<?php echo $value['title'];?>
								</td>
								<td>

								<a  onclick="return confirm('Are you sure want to delete this category ?')"  href="category.php?del=<?php echo $value['id'];?>">Delete</a>

								<a   href="category.php?edit=<?php echo $value['id'];?>">edit</a>


								</td>

							</tr>

							<?php
							$i++;}
							?>

						</tbody>
					</table>

				</div>
			</body>
			</html>