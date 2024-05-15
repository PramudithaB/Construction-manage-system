<?php
include("../config/database.php");

if (isset($_POST['update'])) {
    $taskName = $_POST['taskName'];
    $assignTo = $_POST['assignTo'];
    $dueDate = $_POST['dueDate'];
    $status = $_POST['status'];
    $prioritization = $_POST['prioritization'];
    $task_id = $_POST['task_id'];

    $sql = "UPDATE tasks SET taskName ='$taskName', assignTo = '$assignTo', dueDate = '$dueDate',
            status = '$status', prioritization = '$prioritization' WHERE Task_ID = '$task_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record update suceesfully!";
        header('Location: taskRead.php');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['Task_ID'])) {
    $task_id = $_GET['Task_ID'];
    $sql = "SELECT * FROM tasks WHERE Task_ID = '$task_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $taskName = $row['taskName'];
            $assignTo = $row['assignTo'];
            $dueDate = $row['dueDate'];
            $status = $row['status'];
            $prioritization = $row['prioritization'];
            $Task_ID = $row['Task_ID'];
        }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Task</title>
            <link rel="stylesheet" type="text/css" href="../style/taskCreate.css">
        </head>

        <body>
            <div class="container">
                <div class="left">
                    <h2>Update Task Form</h2>
                    <form action="taskUpdate.php" method="post">
                        <input type="hidden" name="task_id" value="<?php echo $Task_ID; ?>">
                        <div class="form-group">
                            <label for="taskName">Task Name:</label>
                            <input type="text" id="taskName" name="taskName" value="<?php echo $taskName; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="assignTo">Assign Project:</label>
                            <select name="assignTo">
                                <option value="empty">Select project</option>
                                <?php
                                $sql = "SELECT pName FROM projects";
                                $presult = $conn->query($sql);
                                if ($presult->num_rows > 0) {
                                    while ($row = $presult->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['pName']; ?>" <?php if ($assignTo == $row['pName']) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $row['pName']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dueDate">Due Date:</label>
                            <input type="date" id="dueDate" name="dueDate" value="<?php echo $dueDate; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Status:</label><br>
                            <label for="complete">Complete</label>
                            <input type="radio" id="complete" name="status" value="complete" <?php if ($status == "complete") {
                                                                                                    echo "checked";
                                                                                                } ?> required>
                            <label for="incomplete">Incomplete</label>
                            <input type="radio" id="incomplete" name="status" value="incomplete" <?php if ($status == "incomplete") {
                                                                                                        echo "checked";
                                                                                                    } ?> required>
                        </div>
                        <div class="form-group">
                            <label for="prioritization">Prioritization:</label>
                            <input type="number" id="prioritization" name="prioritization" value="<?php echo $prioritization; ?>" min="1" max="5" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" name="update">
                        </div>
                    </form>
                </div>
                <div class="right">
                    <img src="../images/taskcreate.jpg" alt="Photo">
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        header('Location: taskRead.php');
    }
}
?>