  
<?php

session_start();

if(!isset($_SESSION['username']))
{
 header("location:login.php");
}


elseif($_SESSION['usertype']=='admin')
{
    
    header("location:login.php");

}

$host="localhost";
$user="root";
$password="";
$db="rsa";


$data=mysqli_connect($host,$user,$password,$db);

$name=$_SESSION['username'];

$sql="SELECT * FROM attendance WHERE username='$name' ";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);


?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
         <title>Student Dashboard</title>

         <?php

           include 'student_css.php';

          ?>
<!--here we declare the style tag-->
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

.table_r
{
    padding: 20px;
    background-color: black;
    color:white;
    border-radius: 1pc;
  
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

<!--here the style tag is end-->
</head>
<body>

<?php

 include'student_sidebar.php';

?>

  
 <!--here we can view teachers data here we create a table to show teachers data -->

<!-- tr: table rows th: table header  td: table data-->


 <div class="content">

 

    <center> 
<h1 class="main-title" >View  Attendance</h1>
 <br>
<table border="1px"  >
    <tr>
      
        <th class="table_th">Student Name</th>
        <th class="table_th">Course</th>
        <th class="table_th">Class</th>
        <th class="table_th">Subject</th>
        <th class="table_th">Section</th>
        <th class="table_th">date</th>
        <th class="table_th">Status</th>
         
    </tr>


<?php 
while($info=$result->fetch_assoc())
{ 
?> 

    <tr>
           
        <td class="table_td">    <?php echo "{$info['username']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['course']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['class']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['subject']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['section']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['date']}" ?>    </td>
        <td class="table_r" >    <?php echo "{$info['status']}" ?>    </td>
         
     

       


    </tr>

<?php
}
?>


</table>


</center>
 </div>


</body>
</html>
