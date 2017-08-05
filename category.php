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