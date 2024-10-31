<?php

session_start();

if(!isset($_SESSION['username']))
{
 header("location:login.php");
}


elseif($_SESSION['usertype']=='admin')
{
    
    header("location:login.php");

}


?>



 
<!DOCTYPE html>
<html>
    <head>
      <style>
 .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      padding: 20px;
    }

    .card {
      background-color: black;
      border-radius: 1em 2em ;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 10px;
      padding: 20px;
      flex: 1;
      min-width: 300px;
      color: white;
    }

    @media (max-width: 600px) { 
      .container {
        flex-direction: column;
      }
    }
 
      </style>
        <meta charset="utf-8">
         <title>Student Dashboard</title>
 
         
         <?php 
 
 include 'student_css.php'
 
 
 ?>
 



    </head>
<body>

 <?php 
 
 include 'student_sidebar.php'
 
 
 ?>
 
 <div class="container">

<center> 

 <div class="container">
<h1>Student Dashboard</h1>
 

 

  </center>



</div>
  </div>


</body>
</html>

