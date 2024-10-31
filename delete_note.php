<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:admin_login.php");
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

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Get the file path from the database
    $sql = "SELECT file_path FROM notes WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $file_path = $row['file_path'];

        // Delete the file from the server
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Delete the record from the database
        $sql = "DELETE FROM notes WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['message'] = "Note deleted successfully.";
        } else {
            $_SESSION['message'] = "Error deleting note: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['message'] = "Note not found.";
    }
}

mysqli_close($conn);

header("Location: viewnotesadmin.php");
exit();
?>
