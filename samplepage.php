<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:student_login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "rsa";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM adminnotes";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View Notes</title>
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
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
                <a href="uploadnotes.php" class="btn btn-outline-primary btn-block"><i class="fas fa-upload"></i> Upload Notes</a>
            </li>
            <li>
                <a href="change_student_password.php" class="btn btn-outline-primary btn-block"><i class="fas fa-lock"></i> Change Password</a>
            </li>
        </ul>
    </aside>
<div class="content">
    <button class="btn btn-light mr-2" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Back</button>
    <div class="container">
        <h2>Uploaded Notes</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>Subject</th>
                    <th>File</th>
                    <th>Type</th>
                    <th>Size (KB)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['department']}</td>
                                <td>{$row['semester']}</td>
                                <td>{$row['subject']}</td>
                                <td><a href='{$row['file_path']}' target='_blank'>View File</a></td>
                                <td>{$row['file_type']}</td>
                                <td>" . round($row['file_size'] / 1024, 2) . "</td>
                                <td>
                                    <a href='delete_note.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this note?\");'>
                                        <i class='fas fa-trash'></i> Delete
                                    </a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No notes found</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
