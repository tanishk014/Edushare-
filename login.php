<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Form</title>
<style>
    .register-link
    {
        background-color: white;
        font-size: medium;
        border-radius: 6em;
        padding-top: 10px;
        padding-bottom:10px ;
    }

    .password-container {
      position: relative;
      margin-bottom: 20px;
    }

    .password-input {
      padding: 10px;
      width: 100%;
    }

    .toggle-password {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }
</style>
        <link rel="stylesheet" type="text/css" href="style.css">

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
    // JavaScript function to toggle the password visibility
    function togglePassword() {
      var passwordInput = document.getElementById('passwordInput');
      var togglePasswordButton = document.querySelector('.toggle-password');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePasswordButton.textContent = 'Hide';

      } else {
        passwordInput.type = 'password';
        togglePasswordButton.textContent = 'Show';
      }
    }
  </script>

  
<ul>
    <li><a href="index.php" class="btn btn-success">Home</a> </li>
        </ul>
       

    </head>
    <body background="school2.jpg" class="body_deg">

    
         <center>


            <div class="form_deg">
                <center class="title_deg">
                    
                    Login Form

                    <h4>
                        <?php
                        error_reporting(0);
                        session_start();
                        session_destroy();
                        echo $_SESSION[ 'loginmessage'];


                        ?>


                    </h4>
                </center>

                <form action="login_check.php" method="POST" class="login_form">

                <div>
                    <label class="label_deg">Username</label>
                    <input type="text" name="username">
                 </div>

                 <div class="password-container">
                    <label class="label_deg">Password</label>
                    <input type="password" id="passwordInput" name="password">
                    <span class="toggle-password" onclick="togglePassword()">Show</span>
                </div>

                 <div>
                     <input class="btn btn-primary" type="Submit" name="Submit" value="login">
                 </div>
<br>
                 <div>
                    <label>  Dont have an account ?<a href="register.php" class="btn btn-primary">Register Here</a></label>
                 </div>

                </form>
            </div>

         </center>






         
    </body>
</html>