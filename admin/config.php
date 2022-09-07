<?php
$server="localhost";
$user="root";
$pass="8233639160@Aa";
$db="employee_managment";

$conn=mysqli_connect($server,$user,$pass,$db);
if(!$conn){
    echo "Error : Not Connected";
}



?>

