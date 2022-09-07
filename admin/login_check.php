<?php
session_start();
$user1=$_POST['uname'];
$pass1=$_POST['pass'];

$user1=stripslashes($user1);

$pass1=stripslashes($pass1);
require_once "config.php";

$sql="SELECT * FROM admin where user_name='$user1' and pass='$pass1' ";

$result= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
$count= mysqli_num_rows($result);
if($count == 1)
{
    $_SESSION['uname']=$user1;
    echo 1;
}else{
    echo 0;
}
   
?>