<?php

error_reporting(0);

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

$sql=" SELECT * FROM user WHERE usertype='student' " ;

$result=mysqli_query($data,$sql);


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
        
        .table_th
        {
            padding: 20px;
            font-size: 20px;
        }
        

        .table_td
        {
          padding: 20px;
         background-color: skyblue;
        }

        .main_Text
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

 include'teacher_sidebar.php';

?>

  

 <div class="content">

<center>

<h1 class="main_Text">STUDENTS DATA</h1>

<?php

if($_SESSION['message'])
{

echo $_SESSION['message'];

}


unset($_SESSION['message']);

?>



 <br><br> 

<table border="1px">

<tr>
     
<th class="table_th">Username</th>
<th class="table_th">Email</th>
<th class="table_th">Phone</th>
<th class="table_th">Course</th>
<th class="table_th">Class</th>
<th class="table_th">Roll.No</th>
 
<th class="table_th">Create Result</th>
 
 

</tr>

<?php

while($info=$result->fetch_assoc() )

{
?>

<tr>

<td class="table_td"><?php  echo"{$info['username'] }"; ?>
</td>

<td class="table_td"><?php  echo"{$info['email'] }"; ?>
</td>

<td class="table_td"><?php  echo"{$info['phone'] }"; ?>
</td>

<td class="table_td"><?php  echo"{$info['course'] }"; ?>
</td>

<td class="table_td"><?php  echo"{$info['class'] }"; ?>
</td>

<td class="table_td"><?php  echo"{$info['roll'] }"; ?>
</td>

 

<td class="table_td"><?php  echo"<a  onClick=\"javascript:return confirm('Are You Sure To Create Result');\" class='btn btn-primary' href='edit_Student_result.php?student_id={$info['id']}'> Create Result</a>"; ?>
</td>

 
 


</tr>

<?php
}
?>

</table>
</center>
 </div>


</body>
</html>
