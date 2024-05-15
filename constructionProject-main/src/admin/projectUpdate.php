<?php
include("../config/database.php");

if (isset($_POST['update'])) {
    $pName = $_POST['pName'];
    $pDescription = $_POST['pDescription'];
    $pManager = $_POST['pManager'];
    $cName = $_POST['cName'];
    $budget = $_POST['budget'];
    $contactNo = $_POST['contactNo'];
    $projectStart = $_POST['projectStart'];
    $project_id = $_POST['project_id'];
    $filename = $_FILES["imgfile"]["name"];
    $tempname = $_FILES["imgfile"]["tmp_name"];
    $image = "../images/projectimage/" . $filename;

    $sql = "UPDATE projects SET pName ='$pName', pDescription = '$pDescription', pManager = '$pManager',
            cName = '$cName', budget = '$budget', contactNo = '$contactNo', projectStart = '$projectStart', 
            filename = '$filename' WHERE Project_ID = '$project_id'";

    $result = $conn->query($sql);

    if ($result == TRUE && move_uploaded_file($tempname, $image)) {
        echo "Record update suceesfully!";
        header('Location: projectRead.php');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['Project_ID'])) {
    $project_id = $_GET['Project_ID'];
    $sql = "SELECT * FROM projects WHERE Project_ID = '$project_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $pName = $row['pName'];
            $pDescription = $row['pDescription'];
            $pManager = $row['pManager'];
            $cName = $row['cName'];
            $budget = $row['budget'];
            $contactNo = $row['contactNo'];
            $projectStart = $row['projectStart'];
            $filename = $row['filename'];
            $Project_ID = $row['Project_ID'];
        }
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8" />
            <title>Project Create</title>
            <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />
            <link rel="stylesheet" href="../style/projectcreate.css" />
        </head>

        <body>
            <div class="container">
                <h1 class="form-title">Project Update</h1>
                <form action="projectUpdate.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="project_id" value="<?php echo $Project_ID; ?>">
                    <div class="main-user-info">
                        <div class="user-input-box">
                            <label for="fname">Project name</label>
                            <input type="text" id="pName" name="pName" value="<?php echo $pName; ?>" placeholder="Enter Full Name" />
                        </div>
                        <div class="user-input-box">
                            <label for="fname">Project Description</label>
                            <textarea id="pDescription" name="pDescription" rows="4" cols="40" placeholder="Enter Description"><?php echo $pDescription; ?></textarea>
                        </div>
                        <div class="user-input-box">
                            <label for="project-manager-info">Project Manager Info</label>
                            <input type="text" id="project-manager-info" name="pManager" value="<?php echo $pManager; ?>" placeholder="Enter Project Manager Info" />
                        </div>
                        <div class="user-input-box">
                            <label for="client-name">Client Name</label>
                            <input type="text" id="client-name" name="cName" value="<?php echo $cName; ?>" placeholder="Enter Client Name" />
                        </div>
                        <div class="user-input-box">
                            <label for="total-budget">Total Budget (M)</label>
                            <input type="number" id="total-budget" name="budget" value="<?php echo $budget; ?>" placeholder="Enter Total Budget" />
                        </div>
                        <div class="user-input-box">
                            <label for="project-start">Project Start Date</label>
                            <input type="date" id="project-start" name="projectStart" value="<?php echo $projectStart; ?>" name="contactNo" />
                        </div>
                        <div class="user-input-box">
                            <label for="client-contact">Client Contact Number</label>
                            <input type="tel" id="client-contact" name="contactNo" value="<?php echo $contactNo; ?>" placeholder="Enter Contact Number" />
                        </div>
                        <div class="user-input-box">
                            <label for="client-contact">Project plan(images)</label>
                            <input class="image" type="file" name="imgfile"><span><?php echo $filename; ?></span>
                        </div>
                    </div>
                    <div class="form-submit-btn">
                        <input type="submit" value="Submit" name="update" />
                    </div>
                </form>
            </div>
        </body>

        </html>
<?php
    } else {
        header('Location: projectRead.php');
    }
}
?>