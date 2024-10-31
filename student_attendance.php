 
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

$name=$_SESSION['username'];


if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  $searchTerm = $_POST["search"];}

  $sql = "SELECT * FROM user WHERE course LIKE '%$searchTerm%'";

  $result = $data->query($sql);

 

 //second data for updating
 // Process the update form submission
 
 {
if(isset($_POST['add']))

$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data2=mysqli_connect($host,$user,$password,$db);

 {
 
  $username = $_POST["studentname"];
  $user_course = $_POST["course"];
  $user_class = $_POST["class"];
  $user_subject = $_POST["subject"];
  $user_section = $_POST["section"];
  $user_date = $_POST["atdate"];
  $user_status= $_POST["status"];



  // You may want to sanitize and validate the input before using it in a query

    // Perform the update query (modify based on your database schema)
    $sql2="INSERT INTO attendance (studentname,course,class,subject,section,atdate,status ) VALUES ('$username','$user_course', '$user_class','$user_subject','$user_section','$user_date','$user_status')";
   
    $result2=mysqli_query($data2,$sql2);
  
  }
  

  
  if($result2)
  {
      echo "<script type='text/javascript' >
      alert('Your Attendance is Added Successfuly');
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

         <?php

           include 'admin_css.php';

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
        </style>

    </head>
<body>

<?php

 include'admin_sidebar.php';

?>

  

 <div class="content">



 <form action="#" method="post" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Enter search term">
                <button class="btn btn-primary">Search</button>
            </div>
        </form>


 <br><br> 

<table border="1px">

<tr>
     
<th class="table_th">Username</th>
<th class="table_th">Course</th>
<th class="table_th">Class</th>
 <th class="table_th">Subject</th>
<th class="table_th">Section</th>
<th class="table_th">Date</th>
<th class="table_th">Status</th>
<th class="table_th">Submit</th>


 

</tr>

<?php
if ($result->num_rows > 0)

while($info=$result->fetch_assoc() )

{
?>

<tr>

<td class="table_td"><?php  echo"{$info['username'] }"; ?>
</td>

<td class="table_td"><?php  echo"{$info['course'] }"; ?>
</td>

<td class="table_td"><?php  echo"{$info['class'] }"; ?>
</td>

<td class="table_td"><?php  echo"{$info['roll'] }"; ?>
</td>
 
<td class="table_td" <?php    echo "<label for='name'>Subject:</label>";
        echo "<input type='text' name='subject' value='" . $row["subject"] . "' class='form-control'>";  ?> 
</td>
 
<td class="table_td"  <?php   echo "<label for='name'>Section:</label>";
        echo "<input type='text' name='section' value='" . $row["section"] . "' class='form-control'>";  ?>
</td>
 
<td class="table_td"  <?php  echo "<label for='date'>Date:</label>";
        echo "<input type='date' name='atdate' value='" . $row["atdate"] . "' class='form-control'>";   ?> 
</td>
 
<td class="table_td" <?php   echo "<label for='status'>status:</label>";
        echo "<input type='text' name='status' value='" . $row["status"] . "' class='form-control'>";  ?>
</td>
 
<td class="table_td" <?php       
            echo "<input type='hidden'  value='submit'" . "'>";
            echo "<button type='submit'  name='add'  class='btn btn-success'>Submit</button>";
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
