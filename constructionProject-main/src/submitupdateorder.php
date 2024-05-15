<?php
session_start();
include_once './config/database.php';

if (isset($_GET['submit'])) {
    $ID = $_SESSION['user_id'];
    $ProjectName = $_GET['pname'];
    $StartDate = $_GET['sdate'];
    $EndDate = $_GET['edate'];
    $ClientName = $_GET['cname'];
    $Budget = $_GET['budget'];
    $Description = $_GET['description'];


    $query = "UPDATE `order` SET 
    `pname`='$ProjectName',
    `sdate`='$StartDate',
    `edate`='$EndDate',
    `cname`='$ClientName',
    `budget`='$Budget',
    `description`='$Description' WHERE id=$ID";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Record Updated!!')</script>";
header("Location: orderdashboard.php");
    } else {
        echo "<script>alert('Error in Update')</script>";
    }
}

mysqli_close($conn);
?>