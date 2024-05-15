<?php
include("../config/database.php");

if (isset($_POST['submit'])) {
    $pName = $_POST['pName'];
    $pDescription = $_POST['pDescription'];
    $pManager = $_POST['pManager'];
    $cName = $_POST['cName'];
    $budget = $_POST['budget'];
    $contactNo = $_POST['contactNo'];
    $projectStart = $_POST['projectStart'];
    $filename = $_FILES["imgfile"]["name"];
    $tempname = $_FILES["imgfile"]["tmp_name"];
    $image = "../images/projectimage/" . $filename;

    $sql = "INSERT INTO projects (pName,pDescription,pManager,cName,budget,contactNo,projectStart,filename)
    VALUES ('$pName','$pDescription','$pManager','$cName','$budget','$contactNo','$projectStart','$filename')";

    $results = $conn->query($sql);

    if ($results == TRUE && move_uploaded_file($tempname, $image)) {
        echo "user added";
        header('Location: projectRead.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Add Project</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />
    <link rel="stylesheet" href="../style/projectcreate.css" />
</head>

<body>
    <div class="container">
        <h1 class="form-title">Project Create</h1>
        <form action="projectCreate.php" method="post" enctype="multipart/form-data">
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="fname">Project name</label>
                    <input type="text" id="pName" name="pName" value="" placeholder="Enter Full Name" />
                </div>
                <div class="user-input-box">
                    <label for="fname">Project Description</label>
                    <textarea id="pDescription" name="pDescription" rows="4" cols="40" placeholder="Enter Description"></textarea>
                </div>
                <div class="user-input-box">
                    <label for="project-manager-info">Project Manager Info</label>
                    <input type="text" id="project-manager-info" name="pManager" placeholder="Enter Project Manager Info" />
                </div>
                <div class="user-input-box">
                    <label for="client-name">Client Name</label>
                    <input type="text" id="client-name" name="cName" placeholder="Enter Client Name" />
                </div>
                <div class="user-input-box">
                    <label for="total-budget">Total Budget (M)</label>
                    <input type="number" id="total-budget" name="budget" placeholder="Enter Total Budget" />
                </div>
                <div class="user-input-box">
                    <label for="project-start">Project Start Date</label>
                    <input type="date" id="project-start" name="projectStart" />
                </div>
                <div class="user-input-box">
                    <label for="client-contact">Client Contact Number</label>
                    <input type="tel" id="client-contact" name="contactNo" placeholder="Enter Contact Number" />
                </div>
                <div class="user-input-box">
                    <label for="client-contact">Project plan(images)</label>
                    <input class="image" type="file" name="imgfile" value="">
                </div>

            </div>
            <div class="form-submit-btn">
                <input type="submit" value="Submit" name="submit" />
            </div>
        </form>
    </div>
</body>

</html>