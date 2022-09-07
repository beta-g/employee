<?php
session_start();
?>
<html>
 <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

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
        <style>
        form .error
            {
                color: brown;
            }
        </style>
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
      </nav><br><br>

      <div class="container-fluid">
         <div class="row">
                  <div class="col-md-12">
                          <div id="table-data">
                               <div id="records_content">
                                         <h3>&nbsp;&nbsp;&nbsp;&nbsp;Welcome Admin</h3>
                                </div>



                                      <?php
                                        require_once "config.php";
                                        $sql="SELECT * FROM employee";
                                        $result=mysqli_query($conn,$sql);
                                        $count=mysqli_num_rows($result);

                                      ?>
                              
                                     <div class="row mb-3">&nbsp;&nbsp;&nbsp;&nbsp;
                                     <div class="col-xl-3 col-sm-6 py-2">
                                                <div class="card bg-success text-white h-100">
                                                    <div class="card-body bg-success">
                                                        <div class="rotate">
                                                            <i class="fa fa-user fa-4x"></i>
                                                        </div>
                                                        <h6 class="text-uppercase">TOTAL EMPLOYEE</h6>
                                                        <h1 class="display-4"><?php echo $count ;?></h1>
                                                    </div>
                                                </div>
                                            </div>
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
</html