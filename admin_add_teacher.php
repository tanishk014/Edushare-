<?php
session_start();

if(!isset($_SESSION['username']))

{
 header("location:login.php");
}

elseif($_SESSION['usertype']=='student')

{
 header("location:login.php");
}

elseif($_SESSION['usertype']=='teacher')

{
 header("location:login.php");
}

    $host="localhost";
    $user="root";
    $password="";
    $db="rsa";

    $data=mysqli_connect($host,$user,$password,$db);

if (isset($_POST['add_teacher']))
{

  $t_name=$_POST['name'];
  $t_email=$_POST['email'];
  $t_phone=$_POST['phone'];
  $t_course=$_POST['course'];
  $t_class=$_POST['class'];
  $t_password=$_POST['password'];
  $file=$_FILES['image']['name'];
  $dst="./image/".$file;
  $dst_db="image/".$file;

move_uploaded_file($_FILES['image']['tmp_name'], $dst);

$sql="INSERT INTO teacher (name,email,phone,course,class,password,image) VALUES ('$t_name','$t_email','$t_phone','$t_course','$t_class','$t_password','$dst_db')";

$result=mysqli_query($data,$sql);

 
 
if($result)
{
    echo "<script type='text/javascript' >
    alert('Data Upload Success');
    </script>";
}

else
{
   echo "Upload Failed";
}
}





?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
         <title>Admin Dashboard</title>


<style type="text/css">

    .div_deg
    {
        background-color: skyblue;
        padding-top: 70px;
        padding-bottom: 70px;
        width: 500px;
    }
 

 
</style>



         <?php

           include 'admin_css.php';

          ?>

    </head>
<body>

<?php

 include'admin_sidebar.php';

?>

  
 <div class="content">

 <center> 
<h1>Add Teacher</h1><br><br>

 <div class="div_deg">

    <form action="#" method="POST" enctype="multipart/form-data">
    
        <div>
            <label>Name:</label>
            <input type="text" name="name">
        </div>
<br>
        <div>
            <label> email:</label>
           <input type="text" name="email">
        </div>
<br>
<div>
            <label> phone:</label>
            <input type="numbers" name="phone">
        </div>
<br>

<div>
         
           <label  for="course" class="label_text">Course</label>
           <select name="course" class="input_deg" id="course" required="">
		    	<option>Select</option>
		    	<option >Diploma</option>
		    	<option >Btech</option>
		    	<option >Be</option>
             <option >Mtech</option>
		    	<option  >Me</option>
             <option >MBA</option>
		    	 </select>
        </div>
<br>
<div>

            <label  for="class" class="label_text">Class</label>
            <select name="class" class="input_deg" id="class" required="">
		    	<option>Select</option>
		    	<option >Fy</option>
		    	<option >Sy</option>
		    	<option >Ty</option>
		    	 </select>
        </div>
<br>
<div>
            <label> Password:</label>
            <input type="text" name="password">
        </div>
<br>
 

        <div>
            <label>Image:</label>
            <input type="file" name="image">
        </div>
<br>
        <div>
             
            <input type="submit" name="add_teacher" value="Add Teacher" class="btn btn-primary">
        </div>

        
    </form>
</div>
</center>
 </div>


</body>
</html>
