<?php

session_start();

if(!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif($_SESSION['usertype']=='admin') {
    header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="rsa";

$data=mysqli_connect($host,$user,$password,$db);

$name=$_SESSION['username'];

$sql="SELECT * FROM user WHERE username='$name' ";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);

if(isset($_POST['update_profile'])) {
    $s_name=$_POST['username'];
    $s_email=$_POST['email'];
    $s_phone=$_POST['phone'];
    $s_course=$_POST['course'];
    $s_class=$_POST['class'];
    $s_password=$_POST['password'];

    $sql2="UPDATE user SET username='$s_name',email='$s_email', phone='$s_phone',course='$s_course',class='$s_class', password='$s_password' WHERE username='$name' ";

    $result2=mysqli_query($data,$sql2);

    if($result2) {
        header('location:student_profile.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        .header .btn {
            color: white;
            font-size: 18px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        aside {
            width: 250px;
            position: fixed;
            top: 60px;
            bottom: 0;
            left: 0;
            padding: 15px;
            background-color: #343a40;
            border-right: 1px solid #dee2e6;
        }
        aside ul {
            padding: 0;
            list-style: none;
        }
        aside a {
            color: white;
            font-size: 18px;
            padding: 10px;
            display: block;
            text-decoration: none;
            border: 1px solid transparent;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        aside a:hover {
            background-color: #495057;
            border-color: #6c757d;
        }
        .btn-block {
            display: block;
            width: 100%;
            text-align: left;
            font-size: 18px;
        }
        .btn-outline-primary {
            border-color: #6c757d;
            color: #6c757d;
        }
        .btn-outline-primary:hover {
            background-color: #6c757d;
            color: white;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
            padding-top: 80px; /* Adjust for fixed header */
        }
        .main-title {
            background-color: #eb185b;
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 10px;
            font-size: 24px;
            border-radius: 10px;
        }
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Reduced size */
            width: 100%;
            margin: auto;
        }
        .form-container label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<header class="header d-flex justify-content-between align-items-center">
    <a href="#" class="btn btn-primary"><i class="fas fa-tachometer-alt"></i> Student Dashboard</a>
    <h1>Resource Sharing Application</h1>
    <div class="logout">
        <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</header>

<aside>
    <ul class="list-unstyled">
        <li>
            <a href="studenthome.php" class="btn btn-outline-primary btn-block"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li>
            <a href="student_profile.php" class="btn btn-outline-primary btn-block"><i class="fas fa-user"></i> My Profile</a>
        </li>
        <li>
            <a href="seenotesstudent.php" class="btn btn-outline-primary btn-block"><i class="fas fa-book"></i> See Notes</a>
        </li>
        <li>
            <a href="uploadnotesstudent.php" class="btn btn-outline-primary btn-block"><i class="fas fa-upload"></i> Upload Notes</a>
        </li>
        <li>
            <a href="change_student_password.php" class="btn btn-outline-primary btn-block"><i class="fas fa-lock"></i> Change Password</a>
        </li>
    </ul>
</aside>

<div class="content">
    <center>
        <h1 class="main-title">Student Profile</h1>
        <br><br>
        <div class="form-container">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input type="text" id="username" name="username" value="<?php echo $info['username']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $info['email']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone"></i> Phone</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $info['phone']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="course"><i class="fas fa-book"></i> Course</label>
                    <input type="text" id="course" name="course" value="<?php echo $info['course']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="class"><i class="fas fa-school"></i> Class</label>
                    <input type="text" id="class" name="class" value="<?php echo $info['class']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="text" id="password" name="password" value="<?php echo $info['password']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="update_profile">Update Profile</button>
                </div>
            </form>
        </div>
    </center>
</div>

</body>
</html>
