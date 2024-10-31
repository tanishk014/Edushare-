<?php
//database 

error_reporting(0);
session_start();

$host="localhost";

$user="root";

$password="";

$db="rsa";


$data=mysqli_connect($host,$user,$password,$db);


if($data===false)
{
    die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST['username'];

    $pass = $_POST['password'];


    $sql="select * from user where username='".$name."' AND password='".$pass."' " ;

    $result=mysqli_query($data, $sql );



    $row=mysqli_fetch_array( $result);

//student 

    if($row[ "usertype"]=="student")
    {
        
        $_SESSION['username']=$name;

        $_SESSION['usertype']="student";

     header("location:studenthome.php");
    }

//admin

    elseif($row[ "usertype"]=="admin")
    {
        $_SESSION['username']=$name;

        $_SESSION['usertype']="admin";

     header("location:adminhome.php");
    }

    //teacher

    elseif($row[ "usertype"]=="teacher")
    {
        $_SESSION['username']=$name;

        $_SESSION['usertype']="teacher";

     header("location:teacherhome.php");
    }

//for showing message

    else
    {
        
        $message= "username and password does not match";
        $_SESSION[ 'loginmessage']=$message;
        header("location:login.php");
    }
}



?>