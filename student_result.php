  
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

$host="localhost";
$user="root";
$password="";
$db="rsa";


$data=mysqli_connect($host,$user,$password,$db);

$name=$_SESSION['username'];

$sql="SELECT * FROM result WHERE name='$name' ";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);



?>


 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
         <title>Student Dashboard</title>
 
         <?php 
 
 include 'student_css.php'
 
 
 ?>


<style type="text/css">

label
{
    display: inline-block;
    text-align: right;
    width: 100px;
   padding-top: 10px;
   padding-bottom: 10px;
}


.div_deg
{
    background-color: skyblue;
    width: 500px;
    padding-top: 10px;
    padding-bottom: 10px;
    border-radius: 6em;
}

.main-title
{

  background-color:palevioletred;
    color: white;
    text-align: center;
    font-weight: bold;
    width: 400px; 
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 20px;
    border-radius:  5em;
}

 .result
 {
    background-color: cadetblue;
 }
</style>
 



    </head>
<body>

 <?php 
 
 include 'student_sidebar.php'
 
 
 ?>


<div class="content">

<center> 
<h1 class="main-title">My Result</h1>
<br><br>

 <form action="#" method="POST">

 <div class="div_deg">

 <div>
        <label  >Username</label>
        <input type="text" name="username" value="<?php  echo"{$info['name']}" ?>">
    </div>
    
    <div>
        <label >Course</label>
        <input type="text" name="class" value="<?php  echo"{$info['course']}" ?>">
    </div>

    <div>
        <label>Class</label>
        <input type="numbers" name="class" value="<?php  echo"{$info['class']}" ?>">
    </div>

    <div>
        <label>Roll No</label>
        <input type="numbers" name="roll" value="<?php  echo"{$info['roll']}" ?>">
    </div>

    <div>
        <label>Semister</label>
        <input type="text" name="sem" value="<?php  echo"{$info['sem']}" ?>">
    </div>
 <div>

 <div>
        <label>Obt Marks For Sub1</label>
        <input type="text" name="obt1" value="<?php  echo"{$info['obt1']}" ?>">
    </div>
 <div>

 <div>
        <label>Obt Marks For Sub2</label>
        <input type="text" name="obt2" value="<?php  echo"{$info['obt2']}" ?>">
    </div>
 <div>
       

 <div>
        <label>Obt Marks For Sub3</label>
        <input type="text" name="obt3" value="<?php  echo"{$info['obt3']}" ?>">
    </div>
 <div>
       
 <div>
        <label>Total Marks</label>
        <input type="text" name="total" value="<?php  echo"{$info['total']}" ?>">
    </div>
 <div>
      
 <div>
        <label>Result Status</label>
        <input class="result"  type="text" name="status" value="<?php  echo"{$info['status']}" ?>">
    </div>
 <div>
      
      
      

    </div>
 </form>
 </center>
</div>

   


</body>
</html>

