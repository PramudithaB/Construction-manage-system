<?php

include "../config/database.php";

if (isset($_GET['Task_ID'])) {

    $task_id = $_GET['Task_ID'];

    $sql = "DELETE FROM tasks WHERE Task_ID ='$task_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record deleted successfully.";
        header('Location: taskRead.php');
    } else {
        echo "Record deleted unsuccessfully.";
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
