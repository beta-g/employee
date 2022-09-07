<?php

if(isset($_POST['npass']))
{
    $pass1=$_POST['npass'];
    require_once "config.php";
    
    $sql="UPDATE admin SET pass='$pass1' where 1";
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