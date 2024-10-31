<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit(); // Exit after redirection to prevent further execution
} elseif ($_SESSION['usertype'] == 'student') {
    header("location: login.php");
    exit(); // Exit after redirection to prevent further execution
}

$host = "localhost";
$user = "root";
$password = "";
$db = "rsa";

$data = mysqli_connect($host, $user, $password, $db);

$id = $_GET['student_id'];

$sql = "SELECT * FROM admission WHERE id='$id'";

$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc();

if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_course = $_POST['course'];
    $user_class = $_POST['class'];
    $user_password = $_POST['password'];
    $usertype = "student";

    $check = "SELECT * FROM admission WHERE name='$username'";
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 100) {
        echo "<script type='text/javascript'>
        alert('Username Already Exists. Try Another one');
        </script>";
    } else {
        $sql = "INSERT INTO user(username, email, phone, course, class, usertype, password) VALUES ('$username', '$user_email', '$user_phone', '$user_course', '$user_class', '$usertype', '$user_password')";
        $result = mysqli_query($data, $sql);
        if ($result) {
            echo "<script type='text/javascript'>
            alert('Data Upload Success');
            </script>";
        } else {
            echo "Upload Failed";
        }
    }
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
        /* Your CSS styles */
        .main-title {
            background-color: #eb185b;
            color: white;
            text-align: center;
            font-weight: bold;
            width: 450px;
            padding: 10px;
            font-size: 20px;
            border-radius: 6em;
            margin: 20px auto;
        }
        .form-container {
            background-color: skyblue;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
            width: 450px; /* Adjusted form width */
            height: auto; 
        }
        .form-label {
            font-weight: bold;
        }
        .content {
            margin-left: 220px; /* Adjust based on sidebar width */
            padding: 20px;
        }



    </style>
</head>
<body> 
    <?php include 'admin_sidebar.php'; ?>
    <div>
        <main role="main" class="col-md-10 ml-sm-auto px-4 content">
            <center>
                <h1 class="main-title">Add Student</h1>
                <div class="form-container">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <!-- Your form fields -->

                        <div class="form-group">
                                <label class="form-label" for="name">Username <i class="fas fa-user"></i></label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $info['name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email <i class="fas fa-envelope"></i></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $info['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone <i class="fas fa-phone"></i></label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $info['phone']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="course">Course <i class="fas fa-book"></i></label>
                                <input type="text" class="form-control" id="course" name="course" value="<?php echo $info['course']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="class">Class <i class="fas fa-school"></i></label>
                                <input type="text" class="form-control" id="class" name="class" value="<?php echo $info['class']; ?>" required>
                            </div>
                            

                            <div class="form-group">
                                <label class="form-label" for="password">Password <i class="fas fa-lock"></i></label>
                                <input type="text" class="form-control" id="password" name="password" value="<?php echo $info['password']; ?>" required>
                            </div>

                            <div>



                        <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                    </form>
                </div>
            </center>
        </main>
    </div>
    <!-- Your JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
