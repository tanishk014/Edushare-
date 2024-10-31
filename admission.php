<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "rsa";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM admission";
$result = mysqli_query($data, $sql);
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
        .main-title {
            background-color: #eb185b;
            color: white;
            text-align: center;
            font-weight: bold;
            width: 400px;
            padding: 10px;
            font-size: 20px;
            border-radius: 6em;
            margin: 20px auto;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .sidebar {
            background-color: #f8f9fa;
            padding: 15px;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
         
            
                <?php include 'admin_sidebar.php'; ?>
          
            <main role="main" class="col-md-10 ml-sm-auto px-4">
                <center>
                    <h1 class="main-title">Users Enrolled</h1>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name <i class="fas fa-user"></i></th>
                                    <th>Email <i class="fas fa-envelope"></i></th>
                                    <th>Course <i class="fas fa-book"></i></th>
                                    <th>Class <i class="fas fa-school"></i></th>
                                    <th>idcard <i class="fas fa-id-card"></i></th>
                                    <th>Phone <i class="fas fa-phone"></i></th>
                                    <th>Password <i class="fas fa-lock"></i></th>
                                    <th>Add Student <i class="fas fa-user-plus"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($info = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $info['name']; ?></td>
                                    <td><?php echo $info['email']; ?></td>
                                    <td><?php echo $info['course']; ?></td>
                                    <td><?php echo $info['class']; ?></td>
                                    <td><?php echo $info['idcard']; ?></td>
                                    <td><?php echo $info['phone']; ?></td>
                                    <td><?php echo $info['password']; ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="add_student.php?student_id=<?php echo $info['id']; ?>">
                                            Add Student <i class="fas fa-user-plus"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </center>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
