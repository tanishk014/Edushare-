<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Form</title>
<style>
    .register-link
    {
        color:black;
        font-size: medium;
        
        padding-top: 10px;
        padding-bottom:10px ;
    }
</style>
        <link rel="stylesheet" type="text/css" href="style.css">

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body background=".jpg" class="body_deg">
 
    
         <center>


            <div class="form_deg">
                <center class="title_deg">
                  <h4>  
                    Sign up Form
                    <h4>
                </center>

                <form action="signup_check.php" method="POST" class="login_form">

                <div>
                    <label class="label_deg">Username</label>
                    <input type="text" name="username">
                 </div>
                 
                 <div>
                    <label class="label_deg">Email</label>
                    <input type="email" name="email" value="yourmail@gmail.com">
                 </div>
                
                 <div>
                    <label class="label_deg">Password</label>
                    <input type="password" name="password">
           </div>

<div>
                    <label class="label_deg">Confirm Password</label>
                    <input type="password" name="password">
                 </div>

                 <div>
                     
                    <input class="btn btn-primary" type="Submit" name="Submit" value="login">
                 </div>

                 <div>
                    <label>  Already have an account ? <a href="login.php" class="register-link">login Here</a></label>
                 </div>

                </form>
            </div>
         </center>
    </body>
</html>