<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
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

$department = isset($_GET['department']) ? mysqli_real_escape_string($conn, $_GET['department']) : '';

$sql = "SELECT * FROM adminnotes";
if ($department) {
    $sql .= " WHERE department = '$department'";
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
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
        .content {
            margin-left: 270px;
            padding: 20px;
            padding-top: 80px; /* Adjust for fixed header */
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .note {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
        }
        .note h4 {
            margin: 0 0 10px;
        }
    </style>
</head>
<body>


<header class="header d-flex justify-content-between align-items-center">
        <a href="seenotesstudent.php" class="btn btn-primary"><i class="fas fa-tachometer-alt"></i> Student Dashboard</a>
        <h1>Resource Sharing Application</h1>
        <div class="logout">
            <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </header>

<aside class="bg-light p-3">
    <ul class="list-unstyled">
        <li class="mb-2">
            <a href="seenotesstudent.php?department=CSE" class="btn btn-outline-primary btn-block"><i class="fas fa-laptop-code"></i> Computer Science Engineering</a>
        </li>
        <li class="mb-2">
            <a href="seenotesstudent.php?department=Mech" class="btn btn-outline-primary btn-block"><i class="fas fa-cogs"></i> Mechanical Engineering</a>
        </li>
        <li class="mb-2">
            <a href="seenotesstudent.php?department=Civil" class="btn btn-outline-primary btn-block"><i class="fas fa-building"></i> Civil Engineering</a>
        </li>
        <li class="mb-2">
            <a href="seenotesstudent.php?department=E&TC" class="btn btn-outline-primary btn-block"><i class="fas fa-broadcast-tower"></i> Electronics & Telecommunication</a>
        </li>
    </ul>
</aside>

<div class="content">
        <div class="container">
            <h2>View Notes - <?php echo htmlspecialchars($department); ?></h2>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="note">';
                    echo '<h4>' . htmlspecialchars($row['subject']) . '</h4>';
                    echo '<p>Semester: ' . htmlspecialchars($row['semester']) . '</p>';
                    echo '<p>Uploaded by: ' . htmlspecialchars($row['username']) . '</p>';
                    echo '<p><a href="' . htmlspecialchars($row['file_path']) . '" target="_blank">Download</a></p>';
                    // Display direct link
                    if (!empty($row['direct_link'])) {
                        echo '<p><a href="' . htmlspecialchars($row['direct_link']) . '" target="_blank">Direct Link</a></p>';
                    }
                    echo '</div>';
                }
            } else {
                echo '<p>No notes found for this department.</p>';
            }
            ?>
    </div>
</div>

</body>
</html>
