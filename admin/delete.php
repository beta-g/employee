<?php

$id=$_POST['id'];
require_once "config.php";

$sql="Delete from employee where id=$id";
$sql1="Delete from attendance where employee_id=$id";


$result=mysqli_query($conn,$sql);
        
        if($result)
        {
            mysqli_query($conn,$sql1);
            echo " Data Deleted :";
            //header("Location: view.php");
        }
         else
            {
                echo "Error :  ".mysqli_error($conn);
            }
?>
