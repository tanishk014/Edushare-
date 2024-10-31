<?php

session_start();

$host="localhost";

$user="root";

$password="";

$db="rsa";

$data=mysqli_connect($host,$user,$password,$db);

if($data==false)
{
die("connection error");

}


if(isset($_POST['apply']))
{
$data_name=$_POST['name'];
$data_email=$_POST['email'];
$data_course=$_POST['course'];
$data_class=$_POST['class'];

//start
//to upload the image in the database
$file=$_FILES['idcard']['name'];
$dst="./idcard/".$file; // thhis is for to store images in idcards named folder 
$dst_db="idcard/".$file; //------ this is for database     --------- 
move_uploaded_file($_FILES['idcard']['tmp_name'],$dst );
//end 

$data_idcard=$_POST['idcard'];
$data_phone=$_POST['phone'];
$data_password=$_POST['password'];

$sql="INSERT INTO admission(name,email,course,class,idcard,phone,password) VALUES('$data_name','$data_email','$data_course','$data_class','$dst_db','$data_phone','$data_password')";

$result=mysqli_query($data,$sql);

if($result)
{
    $_SESSION['message']="Your Application Submitted Successfuly";
    header("location:register.php");
}

else
{
echo"Apply Failed";
}

}


