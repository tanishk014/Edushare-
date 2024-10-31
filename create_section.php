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

if (isset($_POST['add_section']))
{

    $sec1=$_POST['section1'];
    $sec2=$_POST['section2'];
    $sec3=$_POST['section3'];
    
    


   


$sql="INSERT INTO section( section1,section2,section3 ) VALUES (' $sec1', '  $sec2 ', '  $sec3 ')";

$result=mysqli_query($data,$sql);

if($result)
{
     $_SESSION['message']="Your section added Successfuly";
   
}

else
{
echo"Apply Failed";
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
        border-radius: 6em;
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
<h1 class="main-title" >Add section</h1><br><br>

 <div class="div_deg">

    <form action=" #" method="POST">
 
          <div >
          <label>Add First Section Name</label>
          <input type="text" name="section1">
          </div>

          <br>
          <div>
          <label>Add  Second Section Name</label>
          <input type="text" name=" section2">
          </div>
          
          <br>
          <div>
          <label>Add Third Section Name</label>
          <input type="text" name=" section3">
          </div>
          <br>
       
<div>
              <input type="submit" name="add_section" value="Add section" class="btn btn-primary">
        </div>

        
    </form>
</div>
</center>
 </div>


</body>
</html>








 