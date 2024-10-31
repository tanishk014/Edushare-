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
            top: 60px; /* Adjust this if your header height changes */
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
</body>
</html>
