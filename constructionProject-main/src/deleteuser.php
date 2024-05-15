<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: logIn.php'); // Redirect to the login page or any other page
    exit;
}

// Include database connection
require_once './config/database.php';

// Get user ID
$user_id = $_SESSION['user_id'];

// Delete user from the database
$query = "DELETE FROM user WHERE id='$user_id'";
$result = mysqli_query($conn, $query);

if ($result) {
    // User deleted successfully
    session_unset();
    session_destroy();
    header('Location: logIn.php'); // Redirect to the login page or any other page
    exit;
} else {
    // Error deleting user
    echo "Error deleting user: " . mysqli_error($conn);
}
?>
