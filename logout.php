<?php
unset($_COOKIE['login']);
setcookie('login', false);
setcookie('islogged', false);
setcookie('my_id', false);
setcookie('myfname', false);
setcookie('mylname', false);
setcookie('mylname', false);
setcookie('myemail', false);
header("location:index.php");

exit;
?>