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

if (isset($_POST['add_subject']))
{


    $c_short=$_POST['cshort'];

    $c_full=$_POST['cfull'];
  
    $sub1=$_POST['subject1'];
    $sub2=$_POST['subject2'];
    $sub3=$_POST['subject3'];
    
    


   


$sql="INSERT INTO subject( cshort,cfull,subject1,subject2,subject3 ) VALUES ( '$c_short','$c_full',' $sub1', '  $sub2 ', '  $sub3 ')";

$result=mysqli_query($data,$sql);

if($result)
{
     $_SESSION['message']="Your subject added Successfuly";
     header("location:add_subject.php");
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
<h1 class="main-title" >Add Subject</h1><br><br>

 <div class="div_deg">

    <form action=" #" method="POST">

    <div class="adm_int">
		    <label  for="course" class="label_text">Course Short Name</label>
		    <select name="cshort" class="input_deg" id="cshort" required>
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

<div class="adm_int">
		    <label  for="course" class="label_text">Course Full Name </label>
		    <select name="cfull" class="input_deg" id="cfull" required>
		    	<option>Select</option>
                <option >Diploma In Engineering</option>
		    	<option >Bachelor Technology</option>
		    	<option >Bachelor of engineering</option>
             <option >Master Technology</option>
		    	<option  >Master in engineering</option>
             <option >Master of Business Admistation</option>
                 </select>
	  	</div>

<br>
          <div >
          <label>Subject 1</label>
          <input type="text" name="subject1" required>
          </div>

          <br>

          <div>
          <label>Subject 2</label>
          <input type="text" name=" subject2" required>
          </div>
          
          <br>

          <div>
          <label>Subject 3</label>
          <input type="text" name=" subject3" required>
          <div>

          <br>
       
<div>
    <input type="submit" name="add_subject" value="Add subject" class="btn btn-primary">
</div>

        </form>
</div>

</center>
 </div>


</body>
</html>








 