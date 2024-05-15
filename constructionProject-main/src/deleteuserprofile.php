<?php
session_start();

include "./config/database.php";

if(isset($_GET['ID']) && !empty($_GET['ID'])) {
    $userID = $_GET['ID'];

    // SQL to delete a record
    $sql = "DELETE FROM `user` WHERE ID = $userID";

    if(mysqli_query($conn, $sql)) {
        // Redirect back to the order details page after deletion
        header("Location: userdashboard.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid order ID.";
}
?>
