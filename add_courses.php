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

    $host="localhost";
    $user="root";
    $password="";
    $db="rsa";

    $data=mysqli_connect($host,$user,$password,$db);

if (isset($_POST['add_course']))
{

  $c_short=$_POST['cshort'];

  $c_full=$_POST['cfull'];

 

$sql="INSERT INTO course (cshort,cfull) VALUES ('$c_short','$c_full')";

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
    .main-title
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
<h1 class="main-title" >Add Course</h1><br><br>

 <div class="div_deg">

    <form action="#" method="POST"  >
    
 

<div>
          <label  for="course">Course short name</label>
           <select name="cshort" class="input_deg" required>
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
<label>course full name</label>
<select name="cfull" class="input_deg"   required>
		    	<option>Select</option>
		    	<option >Diploma In Engineering</option>
		    	<option >Bachelor Technology</option>
		    	<option >Bachelor of engineering</option>
             <option >Master Technology</option>
		    	<option  >Master in engineering</option>
             <option >Master of Business Admistation</option>
		    	 </select>
    <div>
       <br>      
            <input type="submit" name="add_course" value="Add Course" class="btn btn-primary">
        </div>

        
    </form>
</div>
</center>
 </div>


</body>
</html>
