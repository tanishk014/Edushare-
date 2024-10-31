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

$sql="SELECT * FROM teacher";

$result=mysqli_query($data,$sql);

if($_GET['teacher_id'])
{

    $t_id=$_GET['teacher_id'];
    $sql2="DELETE FROM  teacher WHERE id='$t_id' ";
    $result2=mysqli_query($data,$sql2);

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

</style>

<!--here the style tag is end-->
</head>
<body>

<?php

 include'admin_sidebar.php';

?>

  
 <!--here we can view teachers data here we create a table to show teachers data -->

<!-- tr: table rows th: table header  td: table data-->


 <div class="content">
    <center> 
<h1>View All Teacher Data</h1>
 <br>
<table border="1px">
    <tr>
        <th class="table_th">Name </th>
        <th class="table_th">Email </th>
        <th class="table_th">Phone</th>
        <th class="table_th">Course </th>
        <th class="table_th">Class</th>
        <th class="table_th">Password </th>
        <th class="table_th">Image </th>
        <th class="table_th">Delete</th>
        <th class="table_th">Update</th>
    </tr>


<?php 
while($info=$result->fetch_assoc())
{ 
?> 

    <tr>
        <td class="table_td">    <?php echo "{$info['name']}" ?>           </td>
        <td class="table_td">    <?php echo "{$info['email']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['phone']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['course']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['class']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['password']}" ?>    </td>
        <td class="table_td">  <img height="100px" width="100px" src=" <?php echo "{$info['image']}" ?> " >  </td>

        <td class="table_td"> 
        <?php echo"
          <a  onclick=\"javascript:return confirm ( 'Are You Sure To Delete This');\" class='btn btn-danger'
          href='admin_view_teacher.php?teacher_id={$info['id']}'>
          Delete
         </a> ";
         ?>
        </td>

        <td class="table_td">
            <?php 
            echo"
                  <a href='admin_update_teacher.php?teacher_id={$info['id']}' class='btn btn-primary' >Update</a>"
            ?>
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
