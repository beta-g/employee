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

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Appic Software </div>
      <div class="list-group list-group-flush">
        <a href="attendence.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        
        <a href="attendence_view.php" class="list-group-item list-group-item-action bg-light">Attendence</a>
        <a href="edit.php?id=<?php echo $_SESSION['name'];?>" class="list-group-item list-group-item-action bg-light">Profile</a>    
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

      <div class="container-fluid">
         <div class="row">
                  <div class="col-md-12">
                          <div id="table-data">
                               <div class="login-box">        
  	<div class="login-box-body">
        <br><br>
    	<h4 class="login-box-msg text-center">Enter Employee ID</h4>

    	<form id="attendance">
            
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="form-group">
                  <select class="form-control" name="status">
                    <option value="in">Time In</option>
                    <option value="out">Time Out</option>
                    </select>
                </div>
            </div>
            <div class="col"></div>
        </div><br>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="form-group has-feedback">
                    <select class="form-control" name="employee">
                    <option value="0">-select-</option>
                    <?php
                      require_once "conn.php";
                      $email=$_SESSION['name'];
                      $sql="select * from employee where email='$email'";
                      $rs=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_assoc($rs);
                      echo "<option value='".$row['employee_id']."'>".$row['employee_id']."</option>";
                    ?>
                    </select>
        		
      		</div></div>
            <div class="col"></div>
        </div>
          
      		
      		<div class="row"><div class="col"></div>
    			<div class="col">
          			<button type="submit" id="mark" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> Mark Attendence</button>
        		</div>
                <div class="col"></div>
      		</div>
    	</form>
  	</div>
    
		<div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
		<div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div>  		
</div>
        
                           </div>
    </div>
  </div>
</div>
      </div>
      <p id="empt"></p>
    </div>
        <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
      </script>	

<script type="text/javascript">
$(function() {  
  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = new FormData($("#attendance")[0]);
    //$( "#mark" ).prop( "disabled",true );
    
      //alert(attendance.get('status'));
    $.ajax({
      type: 'POST',
      url: 'attendence_mt_add.php',
      data: attendance,
      dataType: 'json',
        processData:false,
        contentType:false,
      success: function(response){
          
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
          
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
         
          
        }
        
        
        
      }
    });
  });
    
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