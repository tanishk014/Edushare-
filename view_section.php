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

$sql="SELECT * FROM section ";

$result=mysqli_query($data,$sql);

if($_GET['section_id'])
{

    $t_id=$_GET['section_id'];
    $sql2="DELETE FROM  section WHERE id='$s_id' ";
    $result2=mysqli_query($data,$sql2);

    if($result2)
    {

        header('location:view_section.php');
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
   
}

.add
{
    background-color: black;
color: white;
text-align: center;
font-weight: bold;
width: 400px;
padding-top: 10px;
padding-bottom: 10px;
padding-left: 40px;
padding-right:40px ;
font-size: 20px;
 
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


<li><a href="create_section.php" class="add">+Add Sections</a></li>

    <center> 
<h1 class="main-title" >View All Sections</h1>
 <br>
<table border="1px">
    <tr>
      
        <th class="table_th">First Section Name</th>
        <th class="table_th">Second Section Name</th>
        <th class="table_th">Third Section Name</th>
        <th class="table_th">Delete</th>
        <th class="table_th">Update</th>
    </tr>


<?php 
while($info=$result->fetch_assoc())
{ 
?> 

    <tr>
           
        <td class="table_td">    <?php echo "{$info['section1']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['section2']}" ?>    </td>
        <td class="table_td">    <?php echo "{$info['section3']}" ?>    </td>
         
         
        <td class="table_td"> 
        <?php echo"
          <a  onclick=\"javascript:return confirm ( 'Are You Sure To Delete This');\" class='btn btn-danger'
          href='view_section.php?section_id={$info['sid']}'>
          Delete
         </a> ";
         ?>
        </td>

        <td class="table_td">
            <?php 
            echo"
                  <a href='update_section.php?section_id={$info['sid']}' class='btn btn-primary' >Update</a>"
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
