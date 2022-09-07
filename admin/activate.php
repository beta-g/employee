<?php

$id=$_POST['id'];
$status=$_POST['status'];
$atvs='';
    if($status=='Active')
    {
      $atvs='Deactive';   
    }
    else//($status=='deactive')
    {
       $atvs='Active';  
    }

require_once "config.php";
$sql="UPDATE employee SET status='$atvs' where id=$id";
$result=mysqli_query($conn,$sql);
 if($result)
        {
            echo " Activate :";
        }
  else
      {
       echo "Error :  ".mysqli_error($conn);
      }
?>