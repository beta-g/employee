<?php
session_start();
if(isset($_FILES['cimg']))
{
    $email=$_SESSION['name'];
    $file_name=$_FILES['cimg']['name'];
    $file_tmp_loc=$_FILES['cimg']['tmp_name'];
    $file_store="admin/uploads/".$file_name;
    require_once "conn.php";


    $check=getimagesize($file_tmp_loc);
    if($check)
    {
        if(move_uploaded_file($file_tmp_loc,$file_store))
        {
            
        }else{
            echo "error ";
        }
    }else{
        echo "file not image";
    }
        
    $sql="UPDATE employee SET img_path='$file_store' where email='$email' ";
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