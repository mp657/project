<?php session_start();
//For new user create
function createUser($user_fname,$user_lname,$user_pnumber,$user_email, $reg_password,$gender)
{
 global $db;
 $stmt = $db->query("select * from users where email='".$_POST['reg_username']."'");
 $rcount = $stmt->rowCount();
	 if($rcount > 0)
	{
		return true;
	}
	else
	{
		$sqlInst = $db->query("insert into users set fname='".$_POST['user_fname']."',lname='".$_POST['user_lname']."',phone='".$_POST['user_pnumber']."',email='".$_POST['reg_username']."',password='".$_POST['reg_password']."',gender='".$_POST['gender']."'");
		return false;
	}
}

//User Login Check In
function isUserValid($user_email, $password)
{
  global $db;
  $stmt = $db->query("select * from users where email='".$user_email."' and password='".$password."'");
  $count=$stmt->rowCount();
  $result = $stmt->fetch();


  if($count == 1){

   $_SESSION["my_id"] =$result['id'];
  $_SESSION["email"] =$result['email'];

        return true;
     }else{

       return false;
     }
}

// Add Todo Item
function addTodoItem($todo_text,$todo_description){
  global $db;
// echo "<pre>";
// print_r($_POST);
// exit();
  $stmt = $db->query("insert into todos set todo_item='".$_POST['todotitle']."',description='".$_POST['description']."',stime='".addslashes($_POST['stime'])."',etime='".addslashes($_POST['etime'])."',
    toda_userid='".$_SESSION['my_id']."',category='".$_POST['category']."'");

}

//List of Todo
function getTodoItems(){
 
global $db;
$query1 = $db->query("select * from todos where  toda_userid='".$_SESSION['my_id']."'");

if($query1->rowCount()>0){
$query = $db->query("select distinct category from todos  where  
  toda_userid='".$_SESSION['my_id']."'");
$res = $query->fetchAll();
$list=array();
$cat=array();
 
foreach ($res as $key => $value) {
$query1 = $db->query("select * from todos where category='".$value['category']."' and  
  toda_userid='".$_SESSION['my_id']."'");
 $catname = $db->query("select * from category where id='".$value['category']."'");
$catval = $catname->fetch();


$res1 = $query1->fetchAll();
$cat=[];
$data=[];
//$data['catid']=$catval['id'];
$data['cat']=$catval['title'];
$data['item']=$res1;
array_push($data,$cat);
array_push($list,$data);
}
//  echo "<pre>";
//  print_r($list);
// exit();
 return $list;

}else{

  return $query1->fetchAll();
}

}


//Delete Todo
function deleteTodoItem($user_id, $todo_id){
  global $db;

//echo $user_id,$todo_id;
$count = $db->exec("DELETE FROM todos WHERE id = '".$todo_id."'");
 }

 //Update Todo
 function updateTodoItem($user_id, $todo_id){
  global $db;

 $query = $db->query("select status from todos where id='".$todo_id."'");
$res = $query->fetch();
 

if($res['status']==1){
$value=0;

}else{

  $value=1;
}
$count = $db->exec("update todos set status='".$value."' WHERE id = '".$todo_id."'");

 }
?>
