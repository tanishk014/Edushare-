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

if (isset($_POST['add_class']))
{

  $c_short=$_POST['cl_short'];

  $c_full=$_POST['cl_full'];

 

$sql="INSERT INTO class (cl_short,cl_full) VALUES ('$c_short','$c_full')";

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
<h1 class="main-title" >Add Class</h1><br><br>

 <div class="div_deg">

    <form action="#" method="POST"  >
    
 

<div>
          <label  for="course">Class short name</label>
           <select name="cl_short" class="input_deg" required>
		    	<option>Select</option>
                <option>Fy </option>
                <option>Sy</option>
                <option>Ty</option>
                <option>Btech</option>
		  </select>
        </div>
<br>

<div>
<label>Class full name</label>
<select name="cl_full" class="input_deg"   required>
		    	<option>Select</option>
		    	<option > First Year</option>
		    	<option >Second Year</option>
		    	<option >Third Year</option>
             <option >Last Year(Btech)</option>
</select>
    <div>
       <br>      
            <input type="submit" name="add_class" value="Add Class" class="btn btn-primary">
        </div>

        
    </form>
</div>
</center>
 </div>


</body>
</html>
