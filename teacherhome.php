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
         <title>Teacher Dashboard</title>
 
         <?php 
 
 include 'teacher_css.php'
 
 
 ?>
 



    </head>
<body>

 <?php 
 
 include 'teacher_sidebar.php'
 
 
 ?>

  
 
 <div class="container">

<center> 

 <div class="container">
<h1>Teacher Dashboard</h1>
 

<div class="container">

    <div class="card">
      <h2>Result</h2>
      <a href="" > Create Result</a>
      <br><br>
      <a href="">  View Result</a>
    </div>

  <div class="card">
      <h2>Attendance</h2> 
      <a href="">Add Attendance</a>
      <br><br>
      <a href="">View Attendance</a>
    </div>
  </div>

  </center>



</div>

</body>
</html>

