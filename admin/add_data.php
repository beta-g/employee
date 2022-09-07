<?php
session_start();
if($_POST['name'])
{
    $firstname=$_POST['firstname'];

    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    
    $dateofbirth=$_POST['DOB'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $file_name=$_FILES['img']['name'];
    $file_tmp_loc=$_FILES['img']['tmp_name'];
    $file_store="uploads/".$file_name;

    require_once "config.php";
    $check=getimagesize($file_tmp_loc);
    if($check)
    {
        if(move_uploaded_file($file_tmp_loc,$file_store))
        {
            
        }
        else{
            echo "error :";
        }
    }else{
        echo "file not image";
    }

    $sql="INSERT INTO employee(firstname,lastname,email,mobile,address,gender,DOB,password,img_path) VALUES".
         "('$firstname','$lastname','$email','$mobile','$address','$gender','$dateofbirth','$password','$file_store')";

     if(mysqli_query($conn,$sql))
            {
                echo "EMPLOYEEE ADDED ";
            }
            else
            {
                echo " Error : 2 ".mysqli_error($conn);
            }
    }
  
?>
