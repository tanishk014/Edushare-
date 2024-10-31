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
        .btn-block {
            display: block;
            width: 100%;
            text-align: left;
        }
    </style>
</head>
<body>
    <header class="header d-flex justify-content-between align-items-center p-3 bg-light">
        <a href="#" class="btn btn-primary"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</a>
       
        <h1>Resource Sharing Application</h1>
        <div class="logout">
            <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </header>

    <aside class="bg-light p-3">
        <ul class="list-unstyled">
            <li class="mb-2">
                <a href="adminhome.php" class="btn btn-outline-primary btn-block"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li class="mb-2">
                <a href="admission.php" class="btn btn-outline-primary btn-block"><i class="fas fa-user-graduate"></i> See Enrollments</a>
            </li>
            <li class="mb-2">
                <a href="viewnotesadmin.php" class="btn btn-outline-primary btn-block"><i class="fas fa-sticky-note"></i> View Notes</a>
            </li>
            <li class="mb-2">
                <a href="view_student.php" class="btn btn-outline-primary btn-block"><i class="fas fa-users"></i> View Users</a>
            </li>
            <li class="mb-2">
                <a href="uploadnotesadmin.php" class="btn btn-outline-primary btn-block"><i class="fas fa-upload"></i> Upload Notes</a>
            </li>
        </ul>
    </aside>
</body>
</html>
