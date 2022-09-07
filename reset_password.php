<?php
session_start();
if(isset($_POST['npass']))
{
    $email=$_SESSION['name'];
    $pass1=$_POST['npass'];
    require_once "conn.php";
    
    $sql="UPDATE employee SET password='$pass1' where email='$email' ";
    if(mysqli_query($conn,$sql))
    {
        echo 1;
    }
    else
    {
        echo 0;
    }

}
?>