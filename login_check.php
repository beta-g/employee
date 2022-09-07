<?php
session_start();
$user1=$_POST['uname'];
$pass1=$_POST['pass'];

$user1=stripslashes($user1);
//
$pass1=stripslashes($pass1);
require_once "conn.php";
$sql="SELECT * FROM employee where email='$user1' and password='$pass1' ";

$result= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
$count= mysqli_num_rows($result);
if($count == 1)
{
    $_SESSION['name']=$user1;
    $_SESSION['id']=$row['id'];
    echo 1;
}
else{
    echo 0;
}
   
?>