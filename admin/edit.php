    <?php
    session_start();
    ?>
    <?php

        if(!isset($_POST['submit']))
        {
            $id=$_REQUEST['id'];
            session_start();
            $_SESSION['id']=$id;
            require_once "config.php";

            $sql =" Select * from employee where id=$id";

            $result =mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0)
            {
                $row=mysqli_fetch_array($result);            
                $name=$row['name'];
                $email=$row['email'];
                $mobile=$row['mobile'];
                $address=$row['address'];
                $gender=$row['gender'];
                $dateofbirth=$row['DOB'];
                
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
       <body>
           <?php 
            if($_SESSION['uname']){
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
                <?php echo $_SESSION['uname'];?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">Logout</a>
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
                                      <label>Name:</label><span id="error-name"></span>
                                            <input type="text" name="name" class="form-control " id="name" value="<?php echo $name;?>">
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
                                    <div class="row">
                                    <div class="col">
                                      <label>Date of birth:</label><span id="error-post"></span>
                                            <input type="text" name="post" class="form-control" id="post" value="<?php echo $job_name;?>">
                                    </div>
                                   
                                            
                              
                                  </div><br>
                                    <div class="row">
                                    <div class="col">
                                      <label>Joining Date:</label><span id="error-jdate"></span>
                                            <input type="date" name="j_date"  class="form-control" id="j_date" value="<?php echo $j_date;?>">
                                    </div>
                                    <div class="col">
                                      <label>Status:</label><span id="error-status"></span>
                                        <select class="form-control" name="status" required>
                                        <option value="<?php echo $status;?>"><?php echo $status;?></option>
                                        <option value="Active">Active</option>
                                        <option value="Deactive">Deactive</option>      
                                    </select>
                                    </div>
                                  </div><br>
                                      
                            </form>
        
                           </div>
                       </div>
                </div>
          </div>
      </div>
   </div>
              

    <?php

            if(isset($_POST['submit']))
            {
                session_start();            
                $id1=$_SESSION['id'];            
                $name=$_POST['name'];
                $email=$_POST['email'];
                $mobile=$_POST['mobile'];
                $address=$_POST['address'];
                $gender=$_POST['gender'];
                $dateofbirth=$_POST['DOB'];
              
               

                require_once "config.php";
                
                $sql ="UPDATE employee SET name='$name', email='$email',". "mobile='$mobile',address='$address' WHERE id=$id1";

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
                   
           <script>

           $(document).ready(function(){ 
            $("#myForm").validate({        
            rules: {
                    name:"required",
                    eid:"required",
                    
                    j_date:"required",
                    address:"required",
                    dept:"required",
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,                
                    },
                    post:{
                        required: true,
                    }
                },
           message: {
                name: "Please enter your Name",
              
                email:"please enter a valid email address",
                mobile: "please enter your mobile",
                address:"Please enter your address"
                },
           submitHandler: function(form){      
              form.submit();
             }        
    });
           });
           </script>
             <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
      </script>  
        <?php
            }else
            {
                header("location:index.php");
            }
            ?>
        </body>
        

    </html>
