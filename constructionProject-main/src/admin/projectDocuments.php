<?php
include("../config/database.php");
$sql = "SELECT * FROM projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style/projectdocument.css">
</head>

<body>
    <h1>Projects Plans</h1>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="gallery">
                <a target="_blank" href="<?php echo $row['filename']; ?>">
                    <img src="../images/projectimage/<?php echo $row['filename']; ?>" alt="Cinque Terre" width="600" height="400">
                </a>
                <div class="desc"><?php echo "P00" . $row['Project_ID'] . " - " . $row['pName'] . " plan"; ?></div>
            </div>
    <?php
        }
    }
    ?>
</body>

</html>