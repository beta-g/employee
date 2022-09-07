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
    </head>
   <body>
     <div class="container">
         <br>
        <h1 class="text-primary text-uppercase text-center"> EMPLOYE MANAGEMENT SYSTEM</h1>
               <br><br>
         <h3 class="text-primary text-uppercase "> SIGN UP</h3>
         <div id="records_content">
         </div><br>
   
  <form id="myForm" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col">
      <label>first Name:</label><span id="error-name"></span>
            <input type="text" name="firstname" class="form-control " id="name">
    </div>
    <div class="col">
      <label>last Name:</label><span id="error-name"></span>
            <input type="text" name="lastname" class="form-control " id="name">
    </div>
    <div class="col">
      <label>Email:</label><span id="error-email"></span>
            <input type="email" name="email" class="form-control" id="email">
    </div>
      <div class="col">
      <label>Password:</label><span id="error-pass"></span>
            <input type="password" name="password" class="form-control" id="password">
    </div>
  </div><br>
    <div class="row">
    <div class="col">
       <label>Mobile:</label><span id="error-mobile"></span>
            <input type="text" name="mobile" class="form-control" id="mobile">
    </div>
    <div class="col">
      <label>Address:</label><span id="error-address"></span>
            <input type="text" name="address"  class="form-control" id="address">
    </div>
        <div class="col">
      <label>gender:</label><span id="error-post"></span>
            <input type="text" name="post" class="form-control" id="post">
    </div>  
    <div class="col">
      <label>Date of birth:</label><span id="error-address"></span>
            <input type="text" name="address"  class="form-control" id="address">
    </div>      
  </div><br>

    <div class="row">    
    
         
   
    <div class="col">
    <label>Image:</label><span id="error-sid"></span>
            <input type="file" name="img"  class="form-control" id="img"></div>
  </div>
   <br>
      
    <div class="row">
        <!--<div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>-->
        <input type="submit" class="btn btn-primary btn-block " id="submit" name="submit"  value="submit">
         
        
  </div>
</form>
         <div class="row">
         <a href="index.php" class="btn btn-primary btn-block">Login</a>
         </div>
       <p id="empt"></p>
    </div>
 
        <script>
             $(document).ready(function(){ 
            $("#myForm").validate({        
        rules: {
            firstname:"required",
            firstname:"required",
            
            img: {
              required: true,
            },
            password:{
                required:true,
                minlength:5
            },
            
            
            address:"required",
            
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                
            }
        },
        message: {
           firstname: "Please enter your first Name",
            lastname:"Please enter your last name,
            
            email:"please enter a valid email address",
            mobile: "please enter your mobile",
            
                   address:"Please enter your address"
            },
        submitHandler: function(form,e){      
            e.preventDefault();
                var data1=new FormData($("#myForm")[0]);
               //alert(data1.get('name'));
             $.ajax({
                    type:"POST",
                    url:"register.php",
                    data: data1,
                    contentType:false,
                    processData:false,
                    success: function(data)
                    {
                        if(data==1){
                          alert("Successfully Register ");
                          $("#empt").delay(3000).show(0);
                          window.location="index.php";
                        }
                        else{
                          alert("Email Already Register ");
                          $("#empt").delay(3000).show(0);
                          $("#myForm")[0].reset();
                        }
                        
                         
                        
                       } 
                }); 
                return false; 
            
             }        
    });
            });
        </script>
    
    </body>
</html>
