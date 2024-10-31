<?php

// this is data base connection of updating student 
session_start();

if(!isset($_SESSION['username']))
{
 header("location:login.php");
}

elseif($_SESSION['usertype']=='student')
{
    
    header("location:login.php");

}

$host="localhost";
$user="root";
$password="";
$db="rsa";

$data=mysqli_connect($host,$user,$password,$db);

$id=$_GET['student_id'];

$sql="SELECT * FROM user WHERE id='$id' ";

$result=mysqli_query($data,$sql);

$info=$result-> fetch_assoc();


//for updating information 

if(isset($_POST['update']))
{
  
    $name=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $course=$_POST['course'];
    $class=$_POST['class'];
    $roll=$_POST['roll'];
    $password=$_POST['password'];


    $query="UPDATE user SET username='$name',email='$email',phone='$phone',course='$course',class='$class',roll='$roll',password='$password' WHERE id='$id' ";

$result2=mysqli_query($data,$query);

if($result2)
{
    echo  header("location:view_student.php");
}

}



?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
         <title>Admin Dashboard</title>

         <?php

           include 'admin_css.php';

          ?>


<style type="text/css">
label
 {

         display: inline-block;
         width: 100px;
         text-align: right;
         padding-top: 10px;
         padding-bottom: 10px;

 }

.div_deg
 {
 
    background-color: skyblue;
    width: 400px;
    padding-bottom: 70px;
    padding-top: 70px;

 }
</style>

    </head>
<body>

<?php

 include'admin_sidebar.php';

?>

  

 <div class="content">
    <center>
<h1> Update Student </h1>
 

<div class="div_deg">

        <form action="#" method="POST" >

<div>
<label>Username</label>
<input type="text" name="name" value="<?php  echo "{$info['username']}"; ?>">
</div>

<div>
<label>Email</label>
<input type="email" name="email"  value="<?php  echo "{$info['email']}"; ?>">
</div>

<div>
<label>Phone</label>
<input type="numbers" name="phone"  value="<?php  echo "{$info['phone']}"; ?>">
</div>



<div>
<label>course</label>
<input type="text" name="course"  value="<?php  echo "{$info['course']}"; ?>">
</div>


<div>
<label>Class</label>
<input type="numbers" name="class"  value="<?php  echo "{$info['class']}"; ?>">
</div>

<div>
<label>Roll.No</label>
<input type="numbers" name="roll"  value="<?php  echo "{$info['roll']}"; ?>">
</div>

<div>
<label>Password</label>
<input type="text" name="password"  value="<?php  echo "{$info['password']}"; ?>">
</div>

<div>
 
<input class="btn btn-success" type="submit" name="update" value="update">
</div>


        </form>

             </div>
    </center>
 </div>


</body>
</html>
