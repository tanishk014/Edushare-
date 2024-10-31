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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['notes'])) {
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $username = $_SESSION['username'];

    $file_name = $_FILES['notes']['name'];
    $file_tmp = $_FILES['notes']['tmp_name'];
    $file_type = $_FILES['notes']['type'];
    $file_size = $_FILES['notes']['size'];
    $file_ext_array = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext_array));

    $extensions = array("pdf", "doc", "docx");

    if (in_array($file_ext, $extensions) === false) {
        echo "Extension not allowed, please choose a PDF, DOC, or DOCX file.";
        exit();
    }

    if ($file_size > 2097152) {
        echo "File size must be less than 2 MB";
        exit();
    }

    $upload_directory = "uploads/";
    if (!is_dir($upload_directory)) {
        mkdir($upload_directory, 0777, true);
    }

    $file_path = $upload_directory . basename($file_name);

    if (move_uploaded_file($file_tmp, $file_path))
    {

        $direct_link = mysqli_real_escape_string($conn, $_POST['link']);


        $sql = "INSERT INTO adminnotes (username, department, semester, subject, file_path, file_type, file_size , direct_link )
                VALUES ('$username', '$department', '$semester', '$subject', '$file_path', '$file_type', '$file_size' ,'$direct_link')";

        if (mysqli_query($conn, $sql)) {
            echo "Notes successfully uploaded.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload file.";
    }
} else {
    echo "Invalid request or no file uploaded.";
}

mysqli_close($conn);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Notes</title>
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
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        select, input[type="file"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            cursor: pointer;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
 
<header class="header d-flex justify-content-between align-items-center p-3 ">
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

<div class="content">
    <button class="btn btn-light mr-2" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Back</button>
    <div class="container">
        <h2> Admin Upload Notes</h2>

        <form action="uploadnotesadmin.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="department">Select Department:</label>
                <select id="department" name="department" onchange="updateSubjects()">
                    <option value="CSE">Computer Science Engineering (CSE)</option>
                    <option value="Mech">Mechanical Engineering (Mech)</option>
                    <option value="Civil">Civil Engineering (Civil)</option>
                    <option value="E&TC">Electronics & Telecommunication Engineering (E&TC)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="semester">Select Semester:</label>
                <select id="semester" name="semester" onchange="updateSubjects()">
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                    <option value="8">Semester 8</option>
                </select>
            </div>

            <div class="form-group">
                <label for="subject">Select Subject:</label>
                <select id="subject" name="subject"></select>
            </div>

            <div class="form-group">
                <label for="notes">Choose Notes File:</label>
                <input type="file" id="notes" name="notes" accept=".pdf,.doc,.docx">
            </div>
  <!-- New input field for sharing link -->
  <div class="form-group">
                <label for="link">Direct Link to Share:</label>
                <input type="text" id="link" name="link">
            </div>


            <input type="submit" value="Upload Notes"   >
        </form>
    </div>
</div>

<script>
    function updateSubjects() {
        var department = document.getElementById("department").value;
        var semester = document.getElementById("semester").value;
        var subjectSelect = document.getElementById("subject");
        subjectSelect.innerHTML = ""; // Clear existing options
        
        var subjects = [];
        
        if (department === "CSE") {
            subjects = getCSESubjects(semester);
        } else if (department === "Mech") {
            subjects = getMechSubjects(semester);
        } else if (department === "Civil") {
            subjects = getCivilSubjects(semester);
        } else if (department === "E&TC") {
            subjects = getEtcSubjects(semester);
        }
        
        subjects.forEach(function(subject) {
            var option = document.createElement("option");
            option.text = subject;
            option.value = subject;
            subjectSelect.add(option);
        });
    }
    
    function getCSESubjects(semester) {
        switch(semester) {
            case "1":
                return ["Mathematics-I", "Physics-I", "Chemistry", "Introduction to Programming", "Engineering Graphics"];
            case "2":
                return ["Mathematics-II", "Physics-II", "Environmental Science", "Programming in C", "Communication Skills"];
            // Add cases for other semesters
            default:
                return [];
        }
    }
    
    function getMechSubjects(semester) {
        switch(semester) {
            case "1":
                return ["Mathematics-I", "Physics-I", "Chemistry", "Engineering Mechanics", "Basic Electrical Engineering"];
            case "2":
                return ["Mathematics-II", "Physics-II", "Environmental Science", "Engineering Thermodynamics", "Engineering Drawing"];
            // Add cases for other semesters
            default:
                return [];
        }
    }
    
    function getCivilSubjects(semester) {
        switch(semester) {
            case "1":
                return ["Mathematics-I", "Physics-I", "Chemistry", "Engineering Mechanics", "Basic Electrical Engineering"];
            case "2":
                return ["Mathematics-II", "Physics-II", "Environmental Science", "Building Materials", "Engineering Drawing"];
            // Add cases for other semesters
            default:
                return [];
        }
    }
    
    function getEtcSubjects(semester) {
        switch(semester) {
            case "1":
                return ["Mathematics-I", "Physics-I", "Chemistry", "Basic Electronics", "Engineering Mechanics"];
            case "2":
                return ["Mathematics-II", "Physics-II", "Environmental Science", "Electrical Circuits", "Communication Skills"];
            // Add cases for other semesters
            default:
                return [];
        }
    }
</script>
</body>
</html>
