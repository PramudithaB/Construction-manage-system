<?php
include("../config/database.php");

if (isset($_POST['submit'])) {
    $taskName = $_POST['taskName'];
    $assignTo = $_POST['assignTo'];
    $dueDate = $_POST['dueDate'];
    $status = $_POST['status'];
    $prioritization = $_POST['prioritization'];

    $sql = "INSERT INTO Tasks (taskName,assignTo,dueDate,status,prioritization)
    VALUES ('$taskName','$assignTo','$dueDate','$status','$prioritization')";

    $results = $conn->query($sql);

    if ($results == TRUE) {
        echo "Task added";
        header('Location: taskRead.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Form</title>
    <link rel="stylesheet" type="text/css" href="../style/taskCreate.css">
</head>

<body>
    <div class="container">
        <div class="left">
            <h2>Add Task</h2>
            <form action="taskCreate.php" method="post">
                <div class="form-group">
                    <label for="taskName">Task Name:</label>
                    <input type="text" id="taskName" name="taskName" required>
                </div>
                <div class="form-group">
                    <label for="assignTo">Assign Project:</label>
                    <select name="assignTo">
                        <option value="empty" selected>Select project</option>
                        <?php
                        $sql = "SELECT pName FROM projects";
                        $presult = $conn->query($sql);
                        if ($presult->num_rows > 0) {
                            while ($row = $presult->fetch_assoc()) { ?>
                                <option value="<?php echo $row['pName'] ?>"><?php echo $row['pName']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dueDate">Due Date:</label>
                    <input type="date" id="dueDate" name="dueDate" required>
                </div>
                <div class="form-group">
                    <label>Status:</label><br>
                    <label for="complete">Complete</label>
                    <input type="radio" id="complete" name="status" value="complete" required>
                    <label for="incomplete">Incomplete</label>
                    <input type="radio" id="incomplete" name="status" value="incomplete" required>
                </div>
                <div class="form-group">
                    <label for="prioritization">Prioritization:</label>
                    <input type="number" id="prioritization" name="prioritization" min="1" max="5" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" name="submit">
                </div>
            </form>
        </div>
        <div class="right">
            <img src="../images/taskcreate.jpg" alt="Photo">
        </div>
    </div>
</body>

</html>