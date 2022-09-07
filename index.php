<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    
    <style>
   form .error{
                    color: coral;
                   }  
    table {
  display: table;
  border-collapse: separate;
  border-spacing: 5px;
  border-color: gray;
}
    </style>
    </head>
    <script>
      $(document).ready(function(){ 
            $("#myForm").validate({        
             rules: {
                  uname:"required",
                  pass: {
                         required: true,
                         minlength: 3
                      }
                    },
            message: {
                uname: "Please enter your UserName",
                pass: {
                   required:"please enter password",
                   minlenght:"enter min lenght password"
                 }
            },
            submitHandler: function(form,e){      
                    e.preventDefault();
                var data1=new FormData($("#myForm")[0]);
               //alert(data1.get('uname'));
                $.ajax({
                    type:"POST",
                    url:"login_check.php",
                    data: data1,
                    contentType:false,
                    processData:false,
                    success: function(data){
                        if(data==1)
                        {window.location="index.php";}
                        else{
                            alert("Invalid UserName and Password");
                        }
                       } 
                }); 
                return false; 
            
             }        
    });
            });
  </script>    
    <body>
     <div class="container">
         <br>
        <h1 class="text-primary text-uppercase text-center"> EMPLOYE MANAGEMENT SYSTEM</h1>
         <br><br>
         <h3 class="text-primary text-uppercase text-center" >Employee Login</h3>
         <br>
        <div class="form-group   ">
            <form id="myForm" method="post" enctype="multipart/form-data">
                
              <div class="row">
                  <div class="col"> </div>
                  <div class="col">
               <label>UserName:</label><span id="error-name"></span>
              <input type="text" name="uname" class="form-control " id="uname">
                <br>
                  </div>
                  <div class="col">
                  
                    </div>
                </div>
                <div class="row">
                    <div class="col"> </div>
                <div class="col">
                    <label>Password:</label><span id="error-email"></span>
                      <input type="password" name="pass" class="form-control" id="pass"><br>
                    </div>
                    <div class="col"> </div>
                    
                </div>
                <div class="row">
                    <div class="col"> </div>
                <div class="col">
                    <input type="submit" class="btn btn-primary btn-block" name="submit" value="Login ">
        
                    </div>
                     <div class="col">
                  
                    </div>
                </div>
            </form>
            <div class="row">
            <div class="col"> </div>
                <div class="col"> <p>
  		Not yet a member? <a href="signup.php" class="btn btn-primary">Sign up</a>
  	    </p></div>
                <div class="col"> </div>
            
            </div>
         
             
  
         </div>
         
        </div>

    </body>
    <!-- 
<table align='center'>
             
            <form id="myForm" method="post" enctype="multipart/form-data">
            <tr>
              <th> <label>UserName:</label><span id="error-name"></span></th>
              <td><input type="text" name="uname" class="form-control " id="uname"></td>
                <br><br>
             </tr>
             <tr>
                 <th> <label>Password:</label><span id="error-email"></span></th>
             <td><input type="password" name="pass" class="form-control" id="pass"></td><br><br>
             </tr>
                <tr>
                    <td colspan="2"> 
                        <input type="submit" class="btn btn-primary btn-block" name="submit" value="Login ">
                    </td>
               
             </tr>
            </form>
             </table>


-->
</html>