 
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

$id=$_GET['student_id'];

$sql="SELECT * FROM user WHERE id='$id' ";

$result=mysqli_query($data,$sql);

$info=$result-> fetch_assoc();


if(isset($_POST['add_attendance']))
{
    $username=$_POST['username'];
    $user_course=$_POST['course'];
    $user_class=$_POST['class'];
    $user_roll=$_POST['roll'];
    $user_sub=$_POST['subject'];
    $user_section=$_POST['section'];
    $user_date=$_POST['date'];
    $user_status=$_POST['status'];
     
    



    

    if($row_count==50)
    {   
        
        

    }

    else
    {

    

    $sql="INSERT INTO attendance (username,course,class,roll,subject,section,date,status) VALUES ('$username', '$user_course', '$user_class','$user_roll','$user_sub','$user_section','$user_date','$user_status')";
   
    $result=mysqli_query($data,$sql);


    if($result)
    {
        echo "<script type='text/javascript' >
        alert('Your Attendance Is Added Succesfully);
        </script>";
    }
    
    else
    {
       echo "Upload Failed";
    }
    }
}

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
         <title>Admin Dashboard</title>

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
        width: 400px;
        padding-top: 70px;
        padding-bottom: 70px;
      }

.label_text
{

    display: inline-block;
    width: 100px;
    text-align: right;
    padding-right: 10px;
}

 
.adm_int
{
    background-color: skyblue;
    padding-top: 10px;

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
<h1>Add Attendance</h1>
 
        <div class="div_deg">

          <form action="#" method="POST">

          <div>
          <label>Username</label>
          <input type="text" name="username"  value="<?php  echo "{$info['username']}"; ?>" required>
          </div>

          <div>
		    <label>Course</label>
		    <input type="text" name="course"  value="<?php  echo "{$info['course']}"; ?>" required>
	  	</div>
               
          <div class="adm_int">
		    <label  >Class</label>
		    <input type="numbers" name="class"  value="<?php  echo "{$info['class']}"; ?>" required>
	  	</div>


          <div>
          <label>Roll.No</label>
          <input type="numbers" name="roll"  value="<?php  echo "{$info['roll']}"; ?>" placeholder="Create Student Roll No" required>
          </div>

         <div>
          <label>Subject</label>
          <input type="text" name="subject"  required>
          </div>

         

          <div>
        <label>Section</label>
        <select name="section"   required>
		    	<option>Select</option>
		    	<option >  Section 1</option>
		    	<option  >Section 2</option>
		    	<option >Section 3</option>
             </select>
            <div>

          <div>
          <label>Date</label>
          <input type="date" name="date"  required>
          </div>

          <div>
          <label>Status</label>
           <select name="status" id="status">
           <option >Select</option>
            <option >Present</option>
            <option >Absent</option>
           </select>
          </div>

          

          <div>
          
          <input type="submit" class="btn btn-primary" name="add_attendance" value="Add Attendance">
          </div>
              
              </form>


           </div>

           </center>
 </div>


</body>
</html>
