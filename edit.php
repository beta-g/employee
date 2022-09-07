    <?php
    session_start();
    ?>
    <?php

        if(!isset($_POST['submit']))
        {
            $id=$_REQUEST['id'];
            session_start();
            $_SESSION['id']=$id;
            require_once "conn.php";

            $sql =" Select * from employee where email='$id'";

            $result =mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0)
            {
                $row=mysqli_fetch_array($result);            
                $firstname=$row['firstname'];
                $lastname=$row['lastname'];
                $email=$row['email'];
                $mobile=$row['mobile'];
                $address=$row['address'];
                
                $dateofbirth=$row['DOB'];
                $gender=$row['geneder'];
                
            }
            else
            {
                echo " 0 result";
            }
     }

    ?>
    <html>
    <head>
        <style>
            form .error{
                        color: coral;
                       }    
        </style>
                <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    

               <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> 

                <title>Employee Management</title>

          <!-- Bootstrap core CSS 
          <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

              <!-- Custom styles for this template -->
              <link href="css1/side.css" rel="stylesheet">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        </head>
        <body class="hold-transition login-page">
    <?php 
        if($_SESSION['name']){
           $email=$_SESSION['name'];
          require_once "conn.php";
          $sql="SELECT * from employee where email='$email'";
          $rs=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($rs);
          $url=$row['img_path'];
        ?>
    
    <div class="d-flex" id="wrapper">

   
   
   
    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo $url;?>" style="height: 35px;width: 30px" class="img-fluid rounded-circle"></img>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">Logout</a>
                <a class="dropdown-item" href="change_pass.php">Change Password</a>
                <a class="dropdown-item" href="change_profile.php">Change Image</a>
               <!-- <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>-->
              </div>
            </li>
          </ul>
        </div>
      </nav>
<br>
      <div class="container-fluid">
         <div class="row">
                  <div class="col-md-12">
                          <div id="table-data">
                               <form id="myForm" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <div class="row">
        <div class="col">
          <label>first Name:</label><span id="error-name"></span>
                <input type="text" name="name" class="form-control " id="name" value="<?php echo $firstname;?>">
        </div>
        <div class="col">
          <label>last Name:</label><span id="error-name"></span>
                <input type="text" name="name" class="form-control " id="name" value="<?php echo $lastname;?>">
        </div>
        <div class="col">
          <label>Email:</label><span id="error-email"></span>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $email;?>">
        </div>
      </div><br>
        <div class="row">
        <div class="col">
           <label>Mobile:</label><span id="error-mobile"></span>
                <input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo $mobile;?>">
        </div>
        <div class="col">
          <label>Address:</label><span id="error-address"></span>
                <input type="text" name="address"  class="form-control" id="address" value="<?php echo $address;?>">
        </div>
      </div><br>
         <br>
        <div class="row">
         &nbsp;&nbsp;&nbsp; <input type="submit" class="btn btn-primary" id="submit" name="submit"  value="submit" >
      </div>
    </form>
        
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
        <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
      </script>    
      <script>
      $(document).ready(function(){
        $("#myForm").submit(function(e) {
          e.preventDefault();
          var data=new FormData($("#myForm")[0]);
          $.ajax({
            type: "post",
            url: "edit_data.php",
            data: data,
            contentType:false,
            processData:false,
            success: function (response) {
              alert(response);
            }
          });
          
        })
      })
      </script>      

    <?php

            if(isset($_POST['submit']))
            {
                session_start();            
                $id1=$_SESSION['id'];            
                $name=$_POST['name'];
                $email=$_POST['email'];
                $mobile=$_POST['mobile'];
                $address=$_POST['address'];
                $dateofbirth=$_POST['DOB'];
                $gender=$_POST['gender'];
                

                require_once "conn.php";
                
                $sql ="UPDATE employee SET firstname='$firstname', lastname='$lastname',email='$email',". "mobile='$mobile',address='$address',gender='$job_name',DOB='$birthdate' WHERE email='$id1'";

                $result=mysqli_query($conn,$sql);

                if($result)
                    {
                        echo " <p id='alert'>Data Updated </p>";
                    }
                else
                    {
                    echo "Error :  ".mysqli_error($conn);
                    }
            }

    ?>
          
        <?php
            }else
            {
                header("location:index.php");
            }
            ?>
        </body>
        

    </html>
