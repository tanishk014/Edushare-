 
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

$sql="SELECT * FROM user WHERE username='$name' ";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);


if(isset($_POST['update_profile']))

{
    $t_name=$_POST['username'];
    $t_email=$_POST['email'];
    $t_phone=$_POST['phone'];
    $t_course=$_POST['course'];
    $t_class=$_POST['class'];
    $t_password=$_POST['password'];


    $sql2="UPDATE user SET username='$t_name',email='$t_email', phone='$t_phone',course='$t_course',class='$t_class',,password='$t_password' WHERE username='$name' ";

    $result2=mysqli_query($data,$sql2);

if($result2)
{
   header('location:teacher_profile.php');
}
    

}



?>


 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
         <title>Admin Dashboard</title>
 
         <?php 
 
 include 'teacher_css.php'
 
 
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
    padding-top: 70px;
    padding-bottom: 70px;
    border-radius: 6em;
}

.teacher
{
    background-color:#eb185b;
    color: white;
    text-align: center;
    font-weight: bold;
    width: 400px; 
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 20px;
    border-radius: 6em;
}

 
</style>
 



    </head>
<body>

 <?php 
 
 include 'teacher_sidebar.php'
 
 
 ?>


<div class="content">

<center> 
<h1 class="teacher">Teacher Profile</h1>
<br><br>

 <form action="#" method="POST">

 <div class="div_deg">

  

 <div>
        <label  >Username</label>
        <input type="text" name="username" value="<?php  echo"{$info['username']}" ?>">
    </div>
    
    <div>
        <label   >Email</label>
        <input type="email" name="email" value="<?php  echo"{$info['email']}" ?>">
    </div>

    
    <div>
        <label>Phone</label>
        <input type="numbers" name="phone" value="<?php  echo"{$info['phone']}" ?>">
    </div>
 
   
    <div hidden>
        <label>Course</label>
        <input type="text" name="course" value="<?php  echo"{$info['course']}" ?>">
    </div>

    <div hidden> 
        <label>class</label>
        <input type="text" name="class" value="<?php  echo"{$info['class']}" ?>">
    </div>

    
    <div>
        <label>Password</label>
        <input type="text" name="password" value="<?php  echo"{$info['password']}" ?>">
    </div>

    <div>
         
        <input type="submit" class="btn btn-primary" name="update_profile" value="Update profile">
    </div>

    </div>
 </form>
 </center>
</div>



</body>
</html>

