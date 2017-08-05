<?php   
  $category = $db->query("select * from category where userid='".$_SESSION['my_id']."'");
$result_cat = $category->fetchAll();?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>To do List</title>
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

<div class="col-md-4">
<a href="category.php">List</a>
<a href="logout.php">Logout</a></div>
 
</div>
<div class="container">
<div class="row">
	<div id="no-more-tables">
      <table class="col-md-12 table-bordered table-striped table-condensed cf">
        <thead class="cf">
          <tr>
           <th>ID</th>
           <th>Title</th>
           <th>Description</th>
           <th colspan="2">Status</th>
          </tr>
       </thead>
		<tbody>
		<?php
		$i = 1;
		//echo "<pre>";
		//print_r($result);
		//echo "</pre>";
		
		foreach($result as $value){?>
		
  
<tr>
<td colspan="4"><?php  echo $value['cat'];?></td>
</tr>
 
<?php 
foreach ($value['item'] as $key => $res) {
 
?>
 
  

			<tr>
            <td><?php echo $i;?></td>
            <td><a href="view-details.php?id=<?php echo $res['id'];?>"><?php echo $res['todo_item'];?></a></td>
            <td><?php echo $res['description'];?></td>
    <td><a href ="javascript:;" onclick="update('<?php echo $res['id'];?>')"><?php

              if($res['status']==1){

                  echo 'Completed';
              }else{
				  echo 'In progress';
              }
               ?></a>

    |



	<a  href="javascript:;" onclick="deletemsg('<?php echo $res['id'];?>')" >Delete</a> | <a href="edit.php?edit=<?php echo $res['id'];?>">Edit</a>
<form   method='post' id="updatefrm_<?php echo $res['id'];?>" action='index.php'>

	<input type='hidden' name='item_id' value='<?php echo $res['id'];?>'><br>
	<input type='hidden' name='action' value='update'><br>
	</form>

 <form  method='post' id="deletefrm_<?php echo $res['id'];?>" action='index.php'>

	<input type='hidden' name='item_id' value='<?php echo $res['id'];?>'><br>
	<input type='hidden' name='action' value='delete'><br>
	</form> </td>
                  </tr>

		<?php
		$i++;
}
}
		
	     ?>
        </tbody>
      </table>
    </div>


<script type="text/javascript">

function deletemsg(str){

var con =confirm("Are you sure want to delete?")

if(con==true){

	$("#deletefrm_"+str).submit();

return true;
}else{

	return false;
}

}

function update(str){


	$("#updatefrm_"+str).submit();


}




</script>
<p>&nbsp;</p>
	<form method='post' action='index.php'>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">To Do Title</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="todotitle" placeholder="Enter To Do Title" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">Description</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="description" placeholder="Enter Description" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">Start Time</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="stime" placeholder="Enter Start Time" id="example-text-input">
		</div>
	</div>
	<div class="form-group row">
		<label for="example-text-input" class="col-md-3 col-form-label">End Time</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="etime" placeholder="Enter Start Time" id="example-text-input">
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

<option value="<?php echo $value['id']?>"><?php echo $value['title']?></option>
<?php

}
	 ?>
 	</div>
	</div>
	<input type='hidden' name='action' value='add'><br>
	<input type="submit"  class="btn btn-primary" value="Add To Do"/>
	</form>
</div>
</div>
 </body>
</html>
