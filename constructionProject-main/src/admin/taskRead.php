<?php
include("../config/database.php");
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tasks</title>
    <link rel="stylesheet" href="../style/table.css">
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Tasks</h1></br>
    <table>
        <tr>
            <thead>
                <tr>
                    <th>Task_ID</th>
                    <th>Task Name</th>
                    <th>Assign Project</th>
                    <th>Due Date</th>
                    <th>Task Status</th>
                    <th>prioritization</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo "T00" . $row['Task_ID']; ?></td>
                            <td><?php echo $row['taskName']; ?></td>
                            <td><?php echo $row['assignTo']; ?></td>
                            <td><?php echo $row['dueDate']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['prioritization']; ?></td>
                            <td><a class="update" href="taskUpdate.php?Task_ID=<?php echo $row['Task_ID']; ?>">update</a></td>
                            <td><a class="delete" href="taskDelete.php?Task_ID=<?php echo $row['Task_ID']; ?>">delete</a></td>
                        </tr>
                <?php        }
                }
                ?>
            </tbody>
        </tr>
    </table>
    <br>

    <a href="taskCreate.php" class="btn1">Add Task</a>
    <a href="taskDashboard.php" class="btn3">Dashboard</a>            
</body>

</html>