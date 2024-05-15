<?php
include("../config/database.php");
$sql = "SELECT * FROM projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Projects</title>
    <link rel="stylesheet" href="../style/table.css">
</head>

<body>
    <h1>Projects</h1></br>
    <table>
        <tr>
            <thead>
                <tr>
                    <th>Projectt_ID</th>
                    <th>Project name</th>
                    <th>Project Description</th>
                    <th>Project Manager</th>
                    <th>Client Name</th>
                    <th>Total Budget (M)</th>
                    <th>Client ContactNo</th>
                    <th>Start Date</th>
                    <th>Project Plan</th>
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
                            <td><?php echo "P00" . $row['Project_ID']; ?></td>
                            <td><?php echo $row['pName']; ?></td>
                            <td><?php echo $row['pDescription']; ?></td>
                            <td><?php echo $row['pManager']; ?></td>
                            <td><?php echo $row['cName']; ?></td>
                            <td><?php echo $row['budget']; ?></td>
                            <td><?php echo $row['contactNo']; ?></td>
                            <td><?php echo $row['projectStart']; ?></td>
                            <td><?php echo $row['filename']; ?></td>
                            <td><a class="update" href="projectupdate.php?Project_ID=<?php echo $row['Project_ID']; ?>">update</a></td>
                            <td><a class="delete" href="projectdelete.php?Project_ID=<?php echo $row['Project_ID']; ?>">delete</a></td>

                        </tr>
                <?php        }
                }

                ?>
            </tbody>
        </tr>
    </table>
    <br>
    <a href="projectCreate.php" class="btn1">Add Project</a>
    <a href="projectDocuments.php" class="btn2">view Plans</a>
    <a href="projectDashboard.php" class="btn3">Dashboard</a>
</body>

</html>