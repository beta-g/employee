<?php
session_start(); 
if(isset($_POST['email']))
{
               
    $id1=$_SESSION['id'];            
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $datofbirth=$_POST['DOB'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];

    require_once "conn.php";
    
    $sql ="UPDATE employee SET firstname='$name',lastname='$name', email='$email', gender='$gender',". "mobile='$mobile',address='$address' WHERE email='$id1'";

    $result=mysqli_query($conn,$sql);

    if($result)
        {
            echo "Profile Updated";
        }
    else
        {
        echo "Error :  ".mysqli_error($conn);
        }
}

?>