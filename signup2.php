<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <title>SignUp Form</title>
<style>
    .signup_form
{
    background-color:#219d9d;
    width: 400px; 
    padding-top: 70px;
    padding-bottom: 70px;


    
}

.login-link
{
    background-color: white;
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
    <body background="school2.jpg" class="body_deg">

    
         <center>


            <div class="form_deg">
                <center class="title_deg">
                    
                    Sign Up Form

                    <h4>
                        <?php
                        error_reporting(0);
                        session_start();
                        session_destroy();
                        echo $_SESSION[ 'loginmessage'];


                        ?>


                    </h4>
                </center>

                <form action="#" method="POST" class="signup_form">

                <div>
                    <label class="label_deg">Name</label>
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
<br>
                 <div>
                     
                    <input class="btn btn-primary" type="Submit" name="Submit" value="signup">
                 </div>
<br>
                 <div>
                    <label>  Already have an account ?<a href="login.php" class="login-link">Login</a></label>
                 </div>


                </form>
            </div>
         </center>
    </body>
</html>