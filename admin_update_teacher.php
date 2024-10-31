<?php


session_start();
error_reporting(0);


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

if($_GET['teacher_id'])
{

$t_id=$_GET['teacher_id'];

$sql="SELECT * FROM teacher WHERE id='$t_id'";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();
}


if(isset($_POST['update_teacher']))
{

$id=$_POST['id']; 
    
$t_name=$_POST['name'];
$t_email=$_POST['email'];
$t_phone=$_POST['phone'];
$t_course=$_POST['course'];
$t_class=$_POST['class'];
$t_password=$_POST['password'];

$file=$_FILES['image']['name'];

$dst="./image/".$file;

$dst_db="image/".$file;

move_uploaded_file($_FILES['image'] ['tmp_name'],$dst);


if($file)
{
    $sql2="UPDATE teacher SET name='$t_name' , email='$t_email',phone='$t_phone',course='$t_course' ,class='$t_class',password='$t_password' image='$dst_db' WHERE id='$id ' "; 
}

 else
 {

    $sql2="UPDATE teacher SET name='$t_name' ,email='$t_email',phone='$t_phone',course='$t_course' ,class='$t_class',password='$t_password'   WHERE id='$id ' ";
 }

$result2=mysqli_query($data, $sql2);

if($result2)
{
     header('location:admin_view_teacher.php');
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

<!--This is style tag  section-->

<style>

    label
    {
        display: inline-block;
        width: 150px;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;

    }

    .form_deg
    {
        background-color: skyblue;
        width: 600px;
        padding-top: 70px;
        padding-bottom: 70px;
    }
</style>

    </head>
<body>

<?php

 include'admin_sidebar.php';

?>

  

 <div class="content">

 <center>

<h1>Update Teachers Data</h1>

  <br>

<form class="form_deg" action="admin_update_teacher.php" method="POST" enctype="multipart/form-data"> 

<input type="text" name="id" value="<?php  echo"{$info['id']}" ?>" hidden>

<div>
    <label>Teacher Name</label>
    <input type="text" name="name" value="<?php  echo"{$info['name']}" ?>">
</div>

<div>
    <label>Teacher Email</label>
   <textarea name="email"><?php  echo"{$info['email']}" ?></textarea>
</div>

<div>
    <label>Teacher Phone</label>
   <textarea name="phone"><?php  echo"{$info['phone']}" ?></textarea>
</div>
<div>
    <label>Teacher Course</label>
   <textarea name="course"><?php  echo"{$info['course']}" ?></textarea>
</div>
<div>
    <label>Teacher Class</label>
   <textarea name="class"><?php  echo"{$info['class']}" ?></textarea>
</div>
<div>
    <label>Teacher Password</label>
   <textarea name="password"><?php  echo"{$info['password']}" ?></textarea>
</div>

<div>
    <label>Teacher Old Image</label>
    <img  width="100px" height="100px" src="<?php  echo"{$info['image']}" ?>">
</div>

<div>
    <label>Teacher New Image</label>
    <input type="file" name="image">
</div>

<div>
    <input type="submit" name="update_teacher" class="btn btn-primary">
</div>

</form>
 </center>
 </div>


</body>
</html>
