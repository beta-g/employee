<?php
session_start();
?>
<html>
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
         <title>Employee Management</title>

  
  <link href="css1/side.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#myForm").on("submit",function(event){
                event.preventDefault();
                var npass=$("#npass").val();
                var cpass=$("#cpass").val();
                //alert(npass.length);
                if(npass.length<3)
                    {
                        alert("Enter New password minimum length 3");
                        return false;
                    }
                if(npass!==cpass)
                    {
                        alert("Password Does Not Match");
                        return false;
                    }
                else
                    {
                        $.ajax({
                            type:"POST",
                            url:"reset_data.php",
                            data:{npass:npass},                            
                            success: function(data)
                            {
                                if(data==1)
                                    {
                                        //window.location="index_test.php";
                                        alert("password Changed !");
                                    }
                                else{
                                    alert("Reset Error :");
                                }
                            }
                        });
                    }
            });
        });
        </script>
    </head>
    
    <body>
         <?php 
        if($_SESSION['uname']){
        ?>
     <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Appic Software </div>
      <div class="list-group list-group-flush">
        <a href="Deshboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="index_test.php" class="list-group-item list-group-item-action bg-light">Employee</a>
        <a href="attendence_view.php" class="list-group-item list-group-item-action bg-light">Attendence</a>
        <a href="reset.php" class="list-group-item list-group-item-action bg-light">Profile</a>
    
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

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
     
      <div class="container-fluid">
          
         <div class="row">
                  <div class="col-md-12"><br>
                      
                          <div id="table-data">
                                          <div style="right:50px;">
                                         <h4 class="text-success ">Change Password: </h4><br>
                                         </div>
                                        <div class="form-group">         
                                            <form id="myForm" method="post" enctype="multipart/form-data">
                                                <div class="row g-3 align-items-center">
                                                      <div class="col-auto">
                                                        <label for="npass" class="col-form-label">New PassWord:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                      </div>
                                                      <div class="col-auto">
                                                        <input type="password" id="npass" name="npass" class="form-control" aria-describedby="passwordHelpInline">
                                                      </div>
                                                      <div class="col-auto">
                                                        <span id="passwordHelpInline" class="form-text">
                                                          Must be 4-8 characters long.
                                                        </span>
                                                      </div>
                                                   </div>
                                                 <br>
                                                <div class="row g-3 align-items-center">
                                                      <div class="col-auto">
                                                        <label for="cpass" class="col-form-label">Confirm PassWord:</label>
                                                      </div>
                                                      <div class="col-auto">
                                                        <input type="password" id="cpass" name="cpass" class="form-control" aria-describedby="passwordHelpInline">
                                                      </div>
                                                      <div class="col-auto">
                                                        <span id="passwordHelpInline" class="form-text">
                                                          Confirm Password.
                                                        </span>
                                                      </div>
                                                   </div>
                                                <br>
                                             <div class="row g-3 align-items-center">
                                                <div class="col-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                 <div class="col-auto"><input type="submit" class="btn btn-primary btn-block" name="submit" value="Reset ">&nbsp;&nbsp;</div>
                                                 <div class="col-auto"></div>
                                            </div>


                                            </form>


                                         </div>
        
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
        
         
         
    
        <?php
        }else
        {
            header("location:index.php");
        }
        ?>
    

    </body>
    
</html>