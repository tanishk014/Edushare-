<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        aside {
            width: 250px;
            position: fixed;
            top: 60px; /* Adjust this if your header height changes */
            bottom: 0;
            left: 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }
        .main-content {
            margin-left: 270px; /* Adjust this to the width of your sidebar */
            padding: 20px;
        }
        .card-deck .card {
            min-width: 200px;
            flex: 1;
        }
        .btn-block {
            display: block;
            width: 100%;
            text-align: left;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .card {
            background-color: #007bff;
            border-radius: 1em 2em;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            flex: 1;
            min-width: 300px;
            color: white;
        }
        @media (max-width: 600px) { 
            .container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
 

    <?php include 'admin_sidebar.php'; ?>

    <main class="main-content">
        <center>
             
            <div class="container">
                <div class="card">
                     
                    <a href="admission.php">See Enrollments</a>
                </div>
                <div class="card">
                    
                    <a href="viewnotesadmin.php">View Notes</a>
                </div>
                <div class="card">
                    
                    <a href="view_student.php">View Users</a>
                </div>
                <div class="card">
                     
                    <a href="uploadnotesadmin.php">Upload Notes</a>
                </div>
            </div>
        </center>
    </main>
</body>
</html>
