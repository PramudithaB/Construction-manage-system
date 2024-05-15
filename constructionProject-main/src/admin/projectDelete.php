<?php

include "../config/database.php";

if (isset($_GET['Project_ID'])) {

    $project_id = $_GET['Project_ID'];

    $sql = "DELETE FROM projects WHERE Project_ID ='$project_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record deleted successfully.";
        header('Location: projectRead.php');
    } else {
        echo "Record deleted unsuccessfully.";
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
