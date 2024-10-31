<?php
session_start(); // Start the session

$host = "localhost";
$user = "root";
$password = "";
$db = "rsa";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user WHERE usertype='student'";
$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        .table_th {
            padding: 10px;
            font-size: 16px;
        }

        .table_td {
            padding: 10px;
            font-size: 14px;
            background-color: skyblue;
        }

        .main-title {
            background-color: #eb185b;
            color: white;
            text-align: center;
            font-weight: bold;
            width: 300px;
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .content {
            margin-left: 250px; /* Adjusted to match the sidebar width */
            padding: 20px;
        }
    </style>
</head>
<body>

<?php
include 'admin_sidebar.php';
?>

<div class="content">
    <h1 class="main-title">Users Data</h1>

    <?php
    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']); // Unset the session message after displaying
    }
    ?>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th class="table_th">Username</th>
                <th class="table_th">Email</th>
                <th class="table_th">Phone</th>
                <th class="table_th">Course</th>
                <th class="table_th">Class</th>
                
                <th class="table_th">Password</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($result && mysqli_num_rows($result) > 0) { // Check if there are rows returned
                while ($info = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="table_td"><?php echo $info['username']; ?></td>
                        <td class="table_td"><?php echo $info['email']; ?></td>
                        <td class="table_td"><?php echo $info['phone']; ?></td>
                        <td class="table_td"><?php echo $info['course']; ?></td>
                        <td class="table_td"><?php echo $info['class']; ?></td>
                        
                        <td class="table_td"><?php echo $info['password']; ?></td>
                        <td class="table_td">
                            <?php echo "<a class='btn btn-danger btn-sm' href='delete.php?student_id={$info['id']}' onclick=\"return confirm('Are You Sure To Delete');\"><i class='fas fa-trash'></i> Delete</a>"; ?>
                        </td>
                        <td class="table_td">
                            <?php echo "<a class='btn btn-primary btn-sm' href='update_student.php?student_id={$info['id']}'><i class='fas fa-edit'></i> Update</a>"; ?>
                        </td>
                    </tr>
                <?php }
            } else {
                echo "<tr><td colspan='10'>No student records found</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
