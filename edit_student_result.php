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

if(isset($_POST['add_result']))
{
  
    $name=$_POST['name'];

    $course=$_POST['course'];

    $class=$_POST['class'];

    $roll=$_POST['roll'];

    $sem=$_POST['sem'];

    $sub1=$_POST['sub1'];
    $sub2=$_POST['sub2'];
    $sub3=$_POST['sub3'];

    $obt1=$_POST['obt1'];
    $obt2=$_POST['obt2'];
    $obt3=$_POST['obt3'];

    $total=$_POST['total'];
    $status=$_POST['status'];

    $sql2="INSERT INTO result ( name, course,class,roll,sem,sub1,sub2,sub3,obt1,obt2,obt3,total,status) VALUES ( '$name', '$course','$class','$roll','$sem','$sub1','$sub2','$sub3','$obt1','$obt2','$obt3','$total','$status')";

$result2=mysqli_query($data,$sql2);

if($result2)
{
     $_SESSION['message']="Your Result is added Successfuly";
   
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

         <?php

           include 'teacher_css.php';

          ?>


<style type="text/css">

 

.div_deg
 {
 
    background-color: skyblue;
    max-width: 700px;
    padding: 50px 60px;
border-radius: 15px;
 }
 
 .div_deg form .user-details
 {
display: flex;
flex-wrap: wrap;
justify-content: space-between;
margin: 20px 0 12px  0;
 }

 form .user-details .input-box
 {
    margin-bottom: 20px 0 12px ;
    width: calc(100% / 2 - 20px);
 }

 .user-details .input-box .user-details{
    display: block;
    font-weight: 500;
    margin-bottom: 5px;

 }

.user-details .input-box input
{
height: 45px;
width: 100%;
outline: none;
border-radius: 5px;
border: 1px solid #ccc;
padding-left: 15px;
font-size: 16px;
border-bottom-width: 2px;
transition: all 0.3s ease;
}

.user-details .input-box input:focus,
.user-details .input-box input:valid
{
border-color: #9b59b6;

}



</style>

    </head>

<body>

<?php

 include'teacher_sidebar.php';

?>

  

 <div class="content">
    <center>
<h1> Create Result </h1>
 

<div class="div_deg">

        <form action="#" method="POST" >

<div class="user-details">

<div class="input-box">
<label class="details">Username</label>
<input type="text" name="name" value="<?php  echo "{$info['username']}"; ?>">
</div>

<div class="input-box">
<label class="details">course</label>
<input type="text" name="course"  value="<?php  echo "{$info['course']}"; ?>">
</div>


<div class="input-box">
<label class="details">Class</label>
<input type="numbers" name="class"  value="<?php  echo "{$info['class']}"; ?>">
</div>

<div class="input-box">
<label class="details" >Roll.No</label>
<input type="numbers" name="roll"  value="<?php  echo "{$info['roll']}"; ?>">
</div>

<!---main Data For Result-->

<div class="input-box">
<label class="details" >Semister</label>
<input type="text" name="sem"  placeholder="Even/odd" >
</div>

 <div class="input-box">
<label class="details" >Enter Details </label>
<input type="text" placeholder="Enter Data in Below Tables"  >
</div>

<div class="input-box">
<label class="details" >Subject Name</label>
<input type="text" name="sub1" placeholder="Subject1" >
</div>

<div class="input-box">
<label class="details" >Obtained Marks</label>
<input type="text" name="obt1" placeholder="max100" >
</div>

<div class="input-box">
<label class="details" >Subject Name</label>
<input type="text" name="sub2" placeholder="Subject2" >
</div>

<div class="input-box">
<label class="details" >Obtained Marks</label>
<input type="text" name="obt2"   placeholder="max100">
</div>

<div class="input-box">
<label class="details" >Subject Name</label>
<input type="text" name="sub3" placeholder="Subject3" >
</div>

<div class="input-box">
<label class="details" >Obtained Marks</label>
<input type="text" name="obt3" placeholder="max100" >
</div>

<div class="input-box">
<label class="details" >Total Marks Marks</label>
<input type="text" name="total"placeholder="Enter Total Marks" >
</div>

<div class="input-box">
<label class="details" >Result Status</label>
<input type="text" name="status" placeholder="Pass/Fail">
 
</div>

</center>


<br> 
 <center>     
<div>
 <input class="btn btn-success" type="submit" name="add_result" value="Submit Result">
</div>
<center>
</form>
 </div>
     
 </div>
</div>


</body>
</html>
